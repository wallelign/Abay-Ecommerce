<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class Localization extends Controller
{
    public function setlang($locale){
        App::setlocale($locale);
        session()->put('locale',$locale);
        return redirect()->back();
    }
}
