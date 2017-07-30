<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usr extends Model
{
    protected $table = 'user';

    protected $fillable=['name','picture','phone','email','wechat'];

}
