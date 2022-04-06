<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function changeLang($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        $segments = str_replace(url('/'), '', url()->previous());
        $segments = array_filter(explode('/', $segments));
        array_shift($segments);
        array_unshift($segments, $locale);
        return redirect()->to(implode('/', $segments));
    }
}
