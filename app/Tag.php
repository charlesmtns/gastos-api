<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['tag'];
}
