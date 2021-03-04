<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',


    ];
    use HasFactory, SoftDeletes;
    public function posts()
    {
        $this->hasMany(Category::class);
    }
}
