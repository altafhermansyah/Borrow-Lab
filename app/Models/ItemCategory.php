<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemCategory extends Model
{
    use HasFactory;

    protected $table = 'item_categories';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
