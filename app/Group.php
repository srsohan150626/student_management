<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table= 'groups';
  protected $fillable=['group_id','groups'];
  protected $primaryKey='group_id';
  public $timestamps=false;
}
