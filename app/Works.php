<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
   protected $fillable=['title','url','introduce','hard','published_at'];

}
