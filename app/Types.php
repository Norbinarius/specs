<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $fillable = ['name'];

    public function component() {
        return $this->hasMany(Components::class, 'id');
    }
}
