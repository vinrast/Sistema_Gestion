<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProyectos extends Model {

	protected $table = "t_tipo_proyecto";
	protected $primaryKey = "id_tipo_proyecto";
	protected $fillable = ['id_tipo_proyecto','nombre_tipo_proyecto'];
	public $timestamps = false;




}