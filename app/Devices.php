<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $fillable = ['company_name', 'model_name'];

    public function component() {
        return $this->hasMany(Components::class, 'id');
    }
}
