<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyectos;
use App\Clientes;
use App\Dominios;
use App\User;
use App\Tipo;
use App\Roles;
use App\Avances;
use App\Master;
use App\GrupoEtapas;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;

class ProyectosController extends Controller {

	public function __construct(){
		$this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
	}

	public function find(Route $route){
		$this->proyecto = Proyectos::find($route->getParameter('proyectos'));
	}

	public function index(){
		$proyectos = Proyectos::where('habilitado_proyecto',1)->orderBy('id_proyecto', 'desc')->paginate(10);
		return view('proyectos.list',['proyectos'=>$proyectos]);
	}

	public function create(){
		$clientes = Clientes::all();
		
		$usuarios = User::all();
		$maestro = Master::where('nombre_maestro','Roles')->first();
		if (!$maestro){
			$id_maestro = Master::create(['nombre_maestro','Roles'])->id_maestro;
		}else{
			$id_maestro = $maestro->id_maestro;
		};
		$roles = Tipo::where('id_maestro',$id_maestro)->get();
		$grupo_etapas = GrupoEtapas::all();
		return view('proyectos.create',compact('clientes', 'usuarios', 'roles','grupo_etapas'));
	}

	public function edit($id){
		return view('proyectos.edit', ['proyecto'=>$this->proyecto]);
	}

	public function show($id_proyecto){
		$rol = Roles::where('id_proyecto',$id_proyecto)->get();
		/*
		if (!$rol){
			return redirect('mis-proyectos/');
		}
		*/
		$proyecto = Proyectos::find($id_proyecto);
		$etapas = GrupoEtapas::find($proyecto->id_grupo_etapas);


		return view('proyectos.detalle',compact('proyecto','id_proyecto', 'rol', 'etapas'));
	}

	public function store(Request $request){
		//$request["fecha_avance"] = Carbon::now();
		//dd($request->all());
		$proyecto = Proyectos::create($request->all());
		if ($request['id_dominio']){			
		 	Dominios::where('id_dominio',$request['id_dominio'])->update(['habilitado_dominio'=>0]);
		};

		if ($request->cantidad>0){
			foreach (range(0, $request->cantidad-1) as $index) {
				Roles::create(['id_usuario' => $request['id_usuario'.$index],
							'id_tipo_rol' => $request['id_rol'.$index],
							'id_proyecto'=> $proyecto->id_proyecto]);
						};
		};
		
		Session::flash('mensaje', 'Proyecto creado exitosamente');
		return redirect('/proyectos');
	}

	public function update($id, Request $request){
		//$request["fecha_avance"] = Carbon::now();
		Session::flash('mensaje', 'Proyecto creado exitosamente');
		return redirect('/proyectos');
	}	

	public function destroy($id){
		$proyecto = Proyectos::find($id);
		Avances::where('id_proyecto',$proyecto->id_proyecto)->delete();
		Roles::where('id_proyecto',$proyecto->id_proyecto)->delete();
		Dominios::where('id_proyecto',$proyecto->id_proyecto)->update(['habilitado_dominio'=>1, 'id_proyecto' => NULL]);
		$proyecto->delete();

		return redirect('/proyectos');
	}		
}
