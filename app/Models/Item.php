<?php

namespace App\Models;

use App\Models\Loans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'condition',
    ];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
}
