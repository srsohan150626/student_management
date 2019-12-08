<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
  protected $table='receipt_details';
  protected $fillable=['receipt_id','student_id','transact_id'];
  public $timestamps=false;
}
