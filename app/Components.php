<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $fillable = ['name', 'type_id', 'device_id'];

    public function type() {
        return $this->belongsToMany(Types::class);
    }

    public function device() {
        return $this->belongsToMany(Devices::class);
    }

}
