<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
  protected $table = 'keterangan';
  protected $primaryKey = 'id_pesanan';
  public $timestamps = false;
}
