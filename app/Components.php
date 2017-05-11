<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $fillable = ['name', 'type_id', 'device_id'];

    public function type() {
        return $this->belongsTo(Types::class,'type_id');
    }

    public function device() {
        return $this->belongsTo(Devices::class, 'device_id');
    }
}
