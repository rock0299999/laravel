<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {
	public $timestamps = false;
	protected $table = 'files';
	protected $primaryKey = 'iId';
}