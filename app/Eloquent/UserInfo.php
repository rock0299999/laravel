<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model {
	public $timestamps = false;
	protected $table = 'userinfo';
	protected $primaryKey = 'iUserId';
}
