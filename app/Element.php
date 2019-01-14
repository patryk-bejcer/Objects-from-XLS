<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
	protected $fillable = ['name', 'year_id', 'city_id', 'street_id'];
}
