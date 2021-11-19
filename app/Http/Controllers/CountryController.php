<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

use function Ramsey\Uuid\v1;

class CountryController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $country = Country::orderBy('name', 'asc')->paginate(20);
        $data = $country;
        //Oculto datos que no quiero mostrar
        $country = $country->makeHidden(['created_at', 'updated_at']);
        $data->data = $country;
        return $data;
    }

    // GET DATA X IDCOUNTRY
    //======================
    public function showIdCountry($idCountry)
    {
        $country = Country::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
        $data = $country;
        // //Oculto datos que no quiero mostrar
        $country = $country->makeHidden(['created_at', 'updated_at']);
        $data->data = $country;
        return $data;
    }

    // GET DATA X VARIOS ID
    //======================
    public function showSeveralIdCountrys(Request $request)
    {
        $country = Country::select("*")
            ->whereIn('idCountry', $request->input('idsCountry'))
            ->paginate(20);
        $data = $country;
        //Oculto datos que no quiero mostrar
        $country = $country->makeHidden(['created_at', 'updated_at']);
        $data->data = $country;
        return $data;
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        try {
            $country = new Country();
            $country->idCountry = $request->input('idCountry');
            $country->name = $request->input('name');
            $country->currency = $request->input('currency');
            $country->simbol = $request->input('simbol');
            $country->state = $request->input('state');
            $country->save();

            $country = $country->makeHidden(['created_at', 'updated_at']);

            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $country
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
    public function destroy($idCountry)
    {
        try {
            $country = Country::select("*")
                ->where("idCountry", $idCountry)
                ->get();

            if (count($country) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe el pais a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                Country::select("*")
                    ->where("idCountry", $idCountry)
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
        // try {
        //     //$country = Country::find($request->input('idCountry'));

        //     $country = Country::select("*")
        //         ->where("idCountry", $request->input('idCountry'))
        //         ->get();

        //     if (!(array)$country) {
        //         return json_encode([
        //             'msg' => [
        //                 'errorInfo' => [
        //                     "acertijo.dev",
        //                     0,
        //                     "Error, pais no existe"
        //                 ]
        //             ],
        //             'err' => true,
        //             'data' => null
        //         ]);
        //     } else {
        //         $country->idCountry = $request->input('idCountry');
        //         $country->name = $request->input('name');
        //         $country->currency = $request->input('currency');
        //         $country->simbol = $request->input('simbol');
        //         $country->state = $request->input('state');

        //         $country->save();
        //         $country = $country->makeHidden(['created_at', 'updated_at']);

        //         return json_encode([
        //             'msg' => 'Modificación con exito',
        //             'err' => false,
        //             'data' => $country
        //         ]);
        //     }
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return json_encode([
        //         'msg' => $e,
        //         'err' => true,
        //         'data' => null
        //     ]);
        // }
    }
}
