<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TmpendaftarModel extends Model
{
    //
    public    $incrementing = false;
    protected $table        = 'tmpendaftar';
    public $guarded = [];
    public $timestamps = false;

}
