<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loans extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
