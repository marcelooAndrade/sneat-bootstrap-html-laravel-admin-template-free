<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('content.pages.welcome');
    }

    public function empresa($slug)
    {
        $empresaString = Str::replace('-', ' ', $slug);
        $empresa = Empresa::where('nome', 'LIKE', '%' . $empresaString . '%')->first();
        dd($empresa);
    }
}
