<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
	protected $table = 'places';
	protected $fillable = [
			'name', 'street','city', 'latitude','longitude', 'created_at', 'updated_at'
	];
}
