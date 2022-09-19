<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MenuController extends Controller
{
    public function index()
    {
       // $recipes = Http::get("https://www.fakerestapi.com/datasets/api/v1/clean-recipes-dataset.json")->body();
        return view('menu.index');
    }
}
