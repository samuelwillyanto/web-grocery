<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function index_lang($lang){
        App::setlocale($lang);
        return view('index');
    }

    public function home(){
        $items = DB::table('items')->paginate(12);
        return view('home', compact('items'));
    }
}
