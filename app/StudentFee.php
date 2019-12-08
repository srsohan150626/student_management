<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
  protected $table= 'studentfees';
  protected $fillable=['fee_id','student_id','program_id','amount','discount'];
  protected $primaryKey='s_fee_id';
  public $timestamps=false;
}
