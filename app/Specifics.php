<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifics extends Model
{
    protected $fillable = ['name', 'component_id', 'component_other__id'];

    public function component() {
        return $this->belongsTo(Components::class,'component_id');
    }

    public function component_other() {
        return $this->belongsTo(Components::class, 'component_other__id');
    }
}
