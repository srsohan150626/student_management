<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
  protected $table= 'fees';
  protected $fillable=['academic_id','program_id','fee_type_id','fee_heading','amount'];
  protected $primaryKey='fee_id';
  public $timestamps=false;
}
