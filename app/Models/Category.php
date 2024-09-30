<?php

namespace App\Models;

use App\Models\ItemCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [];

    public function itemCat()
    {
        return $this->hasMany(ItemCategory::class);
    }
}
