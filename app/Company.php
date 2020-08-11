<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 
        'description'
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
