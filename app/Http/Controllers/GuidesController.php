<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidesController extends Controller
{
    public function getGuides($local) {
        return view('guides');
    }

    public function getGuidesBySlug($local,$slug) {
        return view('guides_inner');
    }
}
