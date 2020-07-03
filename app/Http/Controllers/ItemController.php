<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;

class ItemController extends Controller
{
    //
    public function index(){
        $items = ItemModel::get_all();
        // dd($items);
        return view('item.index', compact('items'));
    }

    public function create() {
        return view('item.form');
    }

    public function store(Request $request){
        // dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        $item = ItemModel::save($data);
        if($item){
            return redirect('/items');
        }
    }
    
}
