<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{

    protected $table = "gastos";
    public $incrementing = true;
    protected $fillable = ['id', 'tag_id', 'nome', 'descricao', 'valor'];
    public $timestamps = true;


    public function tags()
    {
        return $this->hasOne(Tag::class, "gasto_id");
    }
}
