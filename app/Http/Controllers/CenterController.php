<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $center = Center::orderBy('name', 'asc')->paginate(20);
        $data = $center;
        //Oculto datos que no quiero mostrar
        $center = $center->makeHidden(['created_at', 'updated_at']);
        $data->data = $center;
        return $data;
    }

    // GET DATA X ID
    //======================
    public function showIdCenter($idCenter)
    {
        $center = Center::select("*")
            ->where("idCenter", $idCenter)
            ->paginate(20);
        $data = $center;
        // //Oculto datos que no quiero mostrar
        $center = $center->makeHidden(['created_at', 'updated_at']);
        $data->data = $center;
        return $data;
    }

    // GET DATA X VARIOS ID
    //======================
    public function showSeveralIdCenter(Request $request)
    {
        $center = Center::select("*")
            ->whereIn('idCenter', $request->input('idsCenter'))
            ->paginate(20);
        $data = $center;
        //Oculto datos que no quiero mostrar
        $center = $center->makeHidden(['created_at', 'updated_at']);
        $data->data = $center;
        return $data;
    }

    // // GET DATA ID
    // //======================
    public function showIdRegion($idRegion)
    {
        $center = Center::select("*")
            ->where("idRegion", $idRegion)
            ->paginate(20);
        $data = $center;
        // //Oculto datos que no quiero mostrar
        $center = $center->makeHidden(['created_at', 'updated_at']);
        $data->data = $center;
        return $data;
    }

    // // CREATE
    // //======================
    public function create(Request $request)
    {
        try {
            $center = new Center();
            $center->idCenter = $request->input('idCenter');
            $center->idRegion = $request->input('idRegion');
            $center->name = $request->input('name');
            $center->state = $request->input('state');
            $center->save();

            $center = $center->makeHidden(['created_at', 'updated_at']);

            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $center
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return json_encode([
                'msg' => $e,
                'err' => true,
                'data' => null
            ]);
        }
    }

    // // DELETE
    // //======================
    public function destroy($idCenter)
    {
        try {
            $center = Center::select("*")
                ->where("idCenter", $idCenter)
                ->get();

            if (count($center) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe la centro a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                Center::select("*")
                    ->where("idCenter", $idCenter)
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
        return ("falta implementar");
        // $region = Region::where('idRegion', '=', $request->input('idRegion'));
        // $region->update($request->all());

        // return json_encode([
        //     'msg' => 'Modificación con exito',
        //     'data' => Region::select("*")
        //         ->where("idRegion", $request->input('idRegion'))
        //         ->get()
        // ]);
    }
}
