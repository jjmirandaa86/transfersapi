<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Bank::orderBy('name', 'asc')
            ->paginate(20);
    }


    // GET DATA X COUNTRY
    //======================
    public function getDataXidCountry($idCountry)
    {
        return Bank::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        try {

            $bank = new Bank();
            $bank->idCountry = $request->input('idCountry');
            $bank->name = $request->input('name');
            $bank->state = $request->input('state');
            $bank->save();
            $bank = $bank->makeHidden(['created_at', 'updated_at']);

            return json_encode([
                'msg' => 'Creación con exito',
                'err' => false,
                'data' => $bank
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
    public function destroyXIdBank($idBank)
    {
        try {
            $bank = Bank::select("*")
                ->where("idBank", $idBank)
                ->get();

            if (count($bank) == 0) {
                return json_encode([
                    'msg' => [
                        'errorInfo' => [
                            "acertijo.dev",
                            0,
                            "No existe banco a eliminar"
                        ]
                    ],
                    'err' => true,
                    'data' => null
                ]);
            } else {
                $bank = Bank::select("*")
                    ->where("idBank", $idBank);
                $bank->delete();

                return json_encode([
                    'msg' => 'Exito eliminación',
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
}
