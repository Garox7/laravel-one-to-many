<?php

namespace App;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Slugger;

    // Non importo i timestamp nel db
    public $timestamp = false;

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
