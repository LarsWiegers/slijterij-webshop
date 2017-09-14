<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'address',
		'postcode',
		'city',
		'country',
		'telephone_number',
		'email',
		'password'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 *
	 * Checks if the current user is an admin and
	 *
	 * @param       none
	 * @return      Boolean
	 *
	 */
	public function isAdmin() {
		foreach ( Role::all() as $role ) {
			if ( $role->name == "Admin" && $role->id == $this->role_id ) {
				return true;
			}
		}

		return false;
	}
}
