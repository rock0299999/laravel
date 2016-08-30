<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrdermeta extends Model {
	public $timestamps = false;
	protected $table = 'product_ordermeta';
	protected $primaryKey = 'iId';
}
