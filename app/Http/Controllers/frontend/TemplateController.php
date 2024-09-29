<?php

namespace App\Http\Controllers\frontend;

use App\Models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
     public function index()
    {
        $CMS = CMS::find(1);
        // dd($CMS);
        return view('frontend.layout.home', compact('CMS'));

    }
}
