<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Accessuser;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $user = User::select("*")
            ->orderBy('lastName', 'asc')
            ->paginate(20);

        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['password', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X IDUSER
    //======================
    public function showIdUser($idUser)
    {
        $user = User::select("*")
            ->where("idUser", $idUser)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X EMAIL
    //======================
    public function showEmail($email)
    {
        $user = User::select("*")
            ->where("email", $email)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        try {
            $user = new User();
            $user->idUser = $request->input('idUser');
            $user->idCentre = $request->input('idCentre');
            $user->firtsName = $request->input('firtsName');
            $user->lastName = $request->input('lastName');
            $user->position = $request->input('position');
            $user->profile = $request->input('profile');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            //$user->api_token = Str::random(255);
            $user->state = $request->input('state');
            $user->save();

            $user = $user->makeHidden(['api_token', 'password']);
            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $user
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return json_encode([
                'msg' => $e,
                'err' => true,
                'data' => null
            ]);
        }
    }

    // DELETE
    //======================
    public function destroy($idUser)
    {
        try {
            $user = User::select("*")
                ->where("idUser", $idUser)
                ->get();

            if (count($user) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe usuario a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                User::select("*")
                    ->where("idUser", $idUser)
                    ->delete();

                return json_encode([
                    'msg' => 'exito eliminación',
                    'err' => false,
                    'data' => null
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return json_encode([
                'msg' => $e,
                'err' => true,
                'data' => null
            ]);
        }
    }

    // EDIT
    //======================
    public function update(Request $request)
    {
        try {
            $user = User::find($request->input('idUser'));
            //return !empty($user);
            if (!(array)$user) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "Error, usuario no existe"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                $user->idCentre = $request->input('idCentre');
                $user->idUser = $request->input('idUser');
                $user->firtsName = $request->input('firtsName');
                $user->lastName = $request->input('lastName');
                $user->position = $request->input('position');
                $user->profile = $request->input('profile');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                // $user->api_token = $request->input('api_token');
                $user->state = $request->input('state');
                $user->save();
                $user = $user->makeHidden(['api_token', 'password', 'created_at', 'updated_at']);

                return json_encode([
                    'msg' => 'Modificación con exito',
                    'err' => false,
                    'data' => $user
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return json_encode([
                'msg' => $e,
                'err' => true,
                'data' => null
            ]);
        }
    }

    // VALIDATE EMAIL y PASSWORD
    //======================
    public function login(Request $request)
    {
        try {
            $accessuser = Accessuser::where("idUser", $request->input('idUser'))
                ->first();
            if (is_null($accessuser)) {
                $user = User::where("idUser", $request->input('idUser'))
                    ->first();
                if (!is_null($user) && Hash::check($request->input('password'), $user->password)) {

                    //Almaceno el login y token 
                    $accessuser = new Accessuser();
                    $accessuser->idUser = $user->idUser;
                    $accessuser->macAddress = substr(shell_exec('getmac'), 159, 20); //substr(exec('getmac'), 0, 17);
                    $accessuser->ipAddress = $request->ip();
                    $accessuser->save();

                    //Actualizo
                    $user = User::find($request->input('idUser'));
                    $user->api_token = Str::random(255);
                    $user->save();

                    $val = DB::table('users')
                        ->join('accessusers', 'accessusers.idUser', '=', 'users.idUser')
                        ->join('centers', 'centers.idCentre', '=', 'users.idCentre')
                        ->join('regions', 'regions.idRegion', '=', 'centers.idRegion')
                        ->join('countries', 'countries.idCountry', '=', 'regions.idCountry')
                        ->select(
                            "users.idUser",
                            "users.firtsName",
                            "users.lastName",
                            "users.position",
                            "users.profile",
                            "users.email",
                            "users.api_token",
                            "users.state",
                            "centers.idCentre",
                            "centers.name as centreName",
                            "regions.idRegion",
                            "regions.name as regionsName",
                            "countries.idCountry",
                            "countries.name as countryName",
                            "countries.currency",
                            "countries.simbol"
                        )
                        ->where("users.idUser", $request->input('idUser'))
                        ->get();

                    return json_encode([
                        'msg' => 'Login Exitoso',
                        'err' => false,
                        'data' => $val,
                    ]);
                } else {
                    return json_encode([
                        'msg' => [
                            'errorInfo' => [
                                "acertijo.dev",
                                0,
                                "Usuario o contraseña invalida"
                            ]
                        ],
                        'err' => true,
                        'data' => null
                    ]);
                }
            } else {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "Usuario ya realizo login, si no fuiste tu contacta a tu jefe inmediato"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return json_encode([
                'msg' => $e,
                'error' => true,
                'data' => null
            ]);
        }
    }
}
