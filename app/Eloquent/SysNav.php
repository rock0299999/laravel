<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class SysNav extends Model
{
    //
	public $timestamps = false;
	protected $table = 'sys_nav';
	protected $primaryKey = 'iId';    
}
