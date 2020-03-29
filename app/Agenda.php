<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'email'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'my_agenda';
}
