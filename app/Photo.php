<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   protected $fillable = array('ablum_id', 'description', 'photo', 'title', 'size');
   public function ablum() {
   	return $this->belongsTo('App\Ablum');
   }
}
