<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $office = Office::orderBy('name', 'asc')->paginate(20);
        $data = $office;
        //Oculto datos que no quiero mostrar
        $office = $office->makeHidden(['created_at', 'updated_at']);
        $data->data = $office;
        return $data;
    }

    // GET DATA X ID
    //======================
    public function showIdOffice($idOffice)
    {
        $office = Office::select("*")
            ->where("idOffice", $idOffice)
            ->paginate(20);
        $data = $office;
        // //Oculto datos que no quiero mostrar
        $office = $office->makeHidden(['created_at', 'updated_at']);
        $data->data = $office;
        return $data;
    }

    // GET DATA X VARIOS ID
    //======================
    public function showSeveralIdOffice(Request $request)
    {
        $office = Office::select("*")
            ->whereIn('idCenter', $request->input('idsCenter'))
            ->paginate(20);
        $data = $office;
        //Oculto datos que no quiero mostrar
        $office = $office->makeHidden(['created_at', 'updated_at']);
        $data->data = $office;
        return $data;
    }

    // GET DATA ID
    //======================
    public function showIdCenter($idCenter)
    {
        $office = Office::select("*")
            ->where("idCenter", $idCenter)
            ->paginate(20);
        $data = $office;
        // //Oculto datos que no quiero mostrar
        $office = $office->makeHidden(['created_at', 'updated_at']);
        $data->data = $office;
        return $data;
    }

    // // // CREATE
    // // //======================
    public function create(Request $request)
    {
        try {
            $office = new Office();
            $office->idOffice = $request->input('idOffice');
            $office->idCenter = $request->input('idCenter');
            $office->name = $request->input('name');
            $office->state = $request->input('state');
            $office->save();

            $office = $office->makeHidden(['created_at', 'updated_at']);

            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $office
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
    public function destroy($idOffice)
    {
        try {
            $office = Office::select("*")
                ->where("idOffice", $idOffice)
                ->get();

            if (count($office) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe la Oficina a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                Office::select("*")
                    ->where("idOffice", $idOffice)
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
