<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;


class RegionController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $region = Region::orderBy('name', 'asc')->paginate(20);
        $data = $region;
        //Oculto datos que no quiero mostrar
        $region = $region->makeHidden(['created_at', 'updated_at']);
        $data->data = $region;
        return $data;
    }

    // GET DATA X IDRegion
    //======================
    public function showIdRegion($idRegion)
    {
        $region = Region::select("*")
            ->where("idRegion", $idRegion)
            ->paginate(20);
        $data = $region;
        // //Oculto datos que no quiero mostrar
        $country = $region->makeHidden(['created_at', 'updated_at']);
        $data->data = $region;
        return $data;
    }

    // GET DATA X VARIOS ID
    //======================
    public function showSeveralIdRegions(Request $request)
    {
        $region = Region::select("*")
            ->whereIn('idRegion', $request->input('idsRegion'))
            ->paginate(20);
        $data = $region;
        //Oculto datos que no quiero mostrar
        $region = $region->makeHidden(['created_at', 'updated_at']);
        $data->data = $region;
        return $data;
    }

    // GET DATA X PADRE COUNTRY
    //======================
    public function showCountry($idCountry)
    {
        $region = Region::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
        $data = $region;
        // //Oculto datos que no quiero mostrar
        $country = $region->makeHidden(['created_at', 'updated_at']);
        $data->data = $region;
        return $data;
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        try {
            $region = new Region();
            $region->idCountry = $request->input('idCountry');
            $region->name = $request->input('name');
            $region->state = $request->input('state');
            $region->save();

            $region = $region->makeHidden(['created_at', 'updated_at']);

            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $region
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
    public function destroy($idRegion)
    {
        try {
            $region = Region::select("*")
                ->where("idRegion", $idRegion)
                ->get();

            if (count($region) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe la region a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                Region::select("*")
                    ->where("idRegion", $idRegion)
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
