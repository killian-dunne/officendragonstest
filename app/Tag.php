<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'text', 
        'category'
    ];

    public function companies() {
        return $this->belongsToMany(Company::class);
    }
}
