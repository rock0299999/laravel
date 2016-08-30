<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public $timestamps = false;
	protected $table = 'sys_category';
	protected $primaryKey = 'iId';
}
