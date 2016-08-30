<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model {
	public $timestamps = false;
	protected $table = 'product_order';
	protected $primaryKey = 'iId';
}
