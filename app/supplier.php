<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = "supplier";
    protected $fillable = ['nama','keterangan'];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }
}
