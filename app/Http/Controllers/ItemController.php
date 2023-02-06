<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function detail($item_id) {
        $product_detail = Item::find($item_id);

        return view('detail', compact('product_detail'));
    }
}
