<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Optionally, you can define relationships if needed
    // public function category() {
    //     return $this->belongsTo(Category::class);
    // }
}
