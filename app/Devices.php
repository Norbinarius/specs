<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $fillable = ['company_name', 'model_name', 'image_id'];

    public function image() {
        return $this->belongsTo(Image::class,'image_id');
    }
}
