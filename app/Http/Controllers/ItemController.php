<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model Custom
use App\Models\ItemModel;

//Model Eloquent
use App\Item;
use App\Category;
use App\Models\Tag;

class ItemController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('item.form', compact('categories'));
    }

    public function store(Request $request){
        // dd($request->all());
        // cara custom Model
        // $new_item = ItemModel::save($request->all());

        //cara eloquent new instance
        // $new_item = new Item;
        // $new_item->name = $request["name"];
        // $new_item->description = $request["description"];
        // $new_item->stock = $request["stock"];
        // $new_item->price = $request["price"];

        // $new_item->save();

        // create item baru
        $new_item = Item::create([
            "name" => $request["name"],
            "description" => $request["description"],
            "price" => $request["price"],
            "stock" => $request["stock"],
            "category_id" => $request["category_id"]
        ]);

        $tagArr = explode(',', $request->tags);
        $tagsMulti  = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["tag_name"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        // dd($tagsMulti);
        // Create Tags baru
        foreach($tagsMulti as $tagCheck){
            $tag = Tag::firstOrCreate($tagCheck);
            $new_item->tags()->attach($tag->id);
        }
        
        return redirect('/items');
    }

    public function index() {
        // $items = ItemModel::get_all();
        // dd($items);
        $items = Item::all();
        // dd($items);
        return view('item.index', compact('items'));
    }

    public function show($id){
        // $item = ItemModel::find_by_id($id);

        $item = Item::find($id);
        // dd($item->tags);
        return view('item.show', compact('item'));
    }

    public function edit($id) {
        $item = ItemModel::find_by_id($id);
        $categories = Category::all();
        return view('item.edit', compact('item', 'categories'));
    }

    public function update($id, Request $request) {
        // dd($request->all());
        $item = ItemModel::update($id, $request->all());
        return redirect('/items');
    }

    public function destroy($id) {
        $deleted = ItemModel::destroy($id);

        return redirect('/items');
    }
}
