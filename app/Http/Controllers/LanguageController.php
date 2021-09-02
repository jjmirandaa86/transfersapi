<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $language =
            Language::orderBy('name', 'asc')
            ->paginate(20);

        $data = $language;
        //Oculto datos que no quiero mostrar
        $language = $language->makeHidden(['created_at', 'updated_at']);
        $data->data = $language;
        return $data;
    }
}
