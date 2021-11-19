<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Center;
use App\Models\Region;
use App\Models\Usercenter;

class PersonalizedController extends Controller
{
    //======================
    public function showDataUser($idUser)
    {
        $arrayData = array();

        //Busca Center
        $userCenter = Usercenter::select("idCenter")
            ->where("idUser", $idUser)
            ->get();
        //Buscar Data Center
        //********************** 
        $center = Center::select("*")
            ->whereIn('idCenter', $userCenter)
            ->get();
        $center = $center->makeHidden(['created_at', 'updated_at']);
        $arrayData[] = $center;
        $new = $center;

        //Buscar Data Region
        //********************** 
        $regionFind = $new->makeHidden(['idCenter', 'name', 'state', 'created_at', 'updated_at']);
        $region = Region::select("*")
            ->whereIn('idRegion', $regionFind)
            ->get();
        $arrayData[] = $region;
        //$arrayData[] = $region->makeHidden(['created_at', 'updated_at']);
        return $arrayData;
    }
}
