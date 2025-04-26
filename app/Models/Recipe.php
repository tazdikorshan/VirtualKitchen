<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'rid';

    protected $fillable = [
        'rid',
        'name',
        'description',
        'type',
        'cookingtime',
        'ingredients',
        'instructions',
        'image',
        'uid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}
