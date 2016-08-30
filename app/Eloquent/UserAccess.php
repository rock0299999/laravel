<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model {
	public $timestamps = false;
	protected $table = 'user_access';
	protected $primaryKey = 'iId';
}
