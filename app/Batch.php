<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  protected $table= 'batches';
  protected $fillable=['batch_id','batch'];
  protected $primaryKey='batch_id';
  public $timestamps=false;
}
