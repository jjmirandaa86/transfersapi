<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    // GET DATA X TIPE
    //======================
    public function showStatesIdCountry(Request $request)
    {
        $states = State::select("*")
            ->whereIn('idCountry', $request->input('idsCountry'))
            ->paginate(100);
        $data = $states;
        // //Oculto datos que no quiero mostrar
        $states = $states->makeHidden(['created_at', 'updated_at']);
        $data->data = $states;
        return $data;
    }
}
