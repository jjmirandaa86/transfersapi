<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Usercenter;

class UsercenterController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $user = Usercenter::select("*")
            ->orderBy('idCenter', 'asc')
            ->paginate(20);

        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['id', 'state', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X IDUSER
    //======================
    public function showIdUser($idUser)
    {
        $user = Usercenter::select("*")
            ->where("idUser", $idUser)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['id', 'state', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }
}
