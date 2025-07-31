<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    //
    public function changeLanguage(Request $request, $lang)
    {
        Session::put('lang', $lang);
        return redirect()->back();
    }
}
