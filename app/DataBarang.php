<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
  protected $table = 'data_barang';
  protected $primaryKey = 'id_barang';
  public $timestamps = false;

}
