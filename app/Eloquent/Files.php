<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {
	public $timestamps = false;
	protected $table = 'files';
	protected $primaryKey = 'iId';
}
