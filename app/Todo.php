<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table="todos";

    protected $guarded = [];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
