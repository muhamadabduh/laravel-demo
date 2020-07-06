<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table="items";

    // whitelist
    // protected $fillable = ["name", "description", "price", "stock", "category_id"];

    // blacklist
    protected $guarded = [];

    // public static function simpan($request){
    //     $new_item = new Item;
    //     $new_item->name = $request->name;

    //     $new_item->save();
    //     return $new_item;
    // }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'item_tag', 'item_id', 'tag_id');
    }
}
