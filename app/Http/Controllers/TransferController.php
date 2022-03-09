<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Region;
use App\Models\Center;
use App\Models\Office;

class TransferController extends Controller
{
    // GET DATA X IDUSER
    //======================
    public function showTransferIdUser($idUser)
    {
        return $transfer = Transfer::select("*")
            ->where("idUser", $idUser)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    // GET DATA X FILTER
    //======================
    public function showTransferIdUserFilter(Request $request)
    {
        $transfer = DB::table("transfers")
            ->join("users", "users.idUser", "=", "transfers.idUser")
            ->join("usercenters", "usercenters.idUser", "=", "users.idUser")
            ->select('transfers.*', 'users.*', 'usercenters.*')
            ->where("idUser", $request->input('idUser'))
            ->get();
        /*
            ->join("regions", "regions.idRegion", "=", "transfers.idRegion")
            ->join("centers", "centers.idCenter", "=", "transfers")
            ->join("offices", "offices.idOffice", "=", "transfers")
            
            
            ->orWhere('idCountry', $request->input('idCountry'))
            ->orWhere('idBank', $request->input('idBank'))
            ->orWhere('idRoute', $request->input('idRoute'))
            ->orWhere('idState', $request->input('idState'))
            ->whereBetween('created_at', [$request->input('dateStart'), $request->input('dateEnd')])
            ->orWhere('idRegion', $request->input('idRegion'))
            ->orWhere('idCenter', $request->input('idCenter'))
            ->orWhere('idOffice', $request->input('idOffice'))*/

        // ->paginate(20);
        return $transfer;

        /*
$transfer->idCountry = $request->input('idCountry');
        $transfer->idUser = $request->input('idUser');
        $transfer->idBank = $request->input('idBank');
        $transfer->idCustomer = $request->input('idCustomer');
        $transfer->nameCustomer = $request->input('nameCustomer');
        $transfer->voucher = $request->input('voucher');
        $transfer->amount = $request->input('amount');
        $transfer->route = $request->input('route');
        $transfer->image = $request->input('image');
        $transfer->state = $request->input('state');
*/
    }

    // UPLOAD FILE
    //======================
    public function saveImage(Request $request)
    {
        $directorio = $request->input("folder");
        $year = $request->input("year");
        $month = $request->input("month");
        $day = $request->input("day");
        $idCountry = $request->input("idCountry");
        $idCustomer = $request->input("idCustomer");
        $idBank = $request->input("idBank");
        $pathImage = $directorio . '/' . $year . '/' . $month . '/' . $day .  '/';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            //$filename = $idCountry . '-' . $year . $month . $day . '-' . $idCustomer . '-' . date('His');
            $filename = $idCountry . '-' . $idCustomer . '-' . $year . $month . $day  . '-' . date('His');

            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $name_File = str_replace(" ", "_", $filename);
            $extension = $file->getClientOriginalExtension();
            $picture = $name_File . '.' . $extension;
            $file->move(public_path($pathImage), $picture);
            return  response()->json(["exito" => true, "urlFile" => $pathImage . $picture]);
        } else {

            return  response()->json(["exito" => false, "urlFile" => null]);
        }
    }

    // CREATE
    //======================
    public function save(Request $request)
    {
        //Guarda en BD
        $transfer = new Transfer();
        //idExpense
        $transfer->idCountry = $request->input('idCountry');
        $transfer->idUser = $request->input('idUser');
        $transfer->idBank = $request->input('idBank');
        $transfer->idCustomer = $request->input('idCustomer');
        $transfer->nameCustomer = $request->input('nameCustomer');
        $transfer->voucher = $request->input('voucher');
        $transfer->amount = $request->input('amount');
        $transfer->route = $request->input('route');
        $transfer->image = $request->input('image');
        $transfer->state = $request->input('state');
        $transfer->save();
        return json_encode(["exito" => true, 'msg' => 'exito creación']);
    }

    // UPDATE STATE
    //======================
    public function changeStatus(Request $request)
    {
        $transfer = Transfer::find($request->input('idTransfer'));
        $transfer->state = $request->input('state');
        $transfer->save();

        return json_encode([
            'msg' => 'Modificación con exito',
            'data' => $transfer
        ]);
    }
}
