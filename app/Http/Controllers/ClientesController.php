<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Clientes;
use Session;
use redirect;
use Gate;
use Auth;


class ClientesController extends Controller {

	public function __construct(){
		$this->beforeFilter('@permisos');
		$this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
	}

	public function find(Route $route){
		$this->cliente = Clientes::where('id_cliente',$route->getParameter('clientes'))
									->where('id_empresa', Auth::user()->getIdEmpresa())
									->first();
		if(!$this->cliente){
			Session::flash('mensaje-error', 'No puede acceder ese registro');
			return redirect('/clientes');
		}

	}

	public function permisos(Route $route){
		if(Gate::denies('clientes', $route->getName()) ){
			Session::flash("mensaje-error","No tiene permisos para acceder al modulo: ".$route->getName());
			return redirect('/mis-proyectos');
		};
	}

	public function index(){

		$clientes = json_encode(\DB::table('t_clientes')
									->select('t_clientes.*', 't_proyectos.nombre_proyecto')
				 					->where('t_clientes.habilitado_cliente','=',1)
				 					->where('t_clientes.id_empresa', Auth::user()->getIdEmpresa())
				 					->leftjoin('t_proyectos', 't_proyectos.id_cliente', '=', 't_clientes.id_cliente')
				 					->orderBy('t_clientes.id_cliente','desc')
				 					->get());

		// $clientes = Clientes::where('id_empresa', Auth::user()->getIdEmpresa())
		// 						->orderBy('id_cliente', 'desc')
		// 						->paginate(10);
		return view('clientes.list', compact('clientes'));
	}

	public function create(){
		$cliente = "";
		return view('clientes.create', compact('cliente'));
	}

	public function store(Request $request){
		$request['id_usuario'] = Auth::user()->id_usuario;
		$request['id_empresa'] = Auth::user()->getIdEmpresa();
		Clientes::create($request->all());
		Session::flash('mensaje', 'Cliente creado exitosamente');
		return redirect('/clientes');
	}

	public function show($id){
		return view('clientes.detalle',['cliente'=>$this->cliente]);
	}

	public function edit($id){
		return view('clientes.create',['cliente'=>$this->cliente]);
	}

	public function update($id, Request $request){
		$request['id_usuario'] = Auth::user()->id_usuario;
		$cliente = Clientes::find($id)->update($request->all());
		Session::flash('mensaje', 'Cliente editado exitosamente');
		return redirect("/clientes");
	}

	public function destroy($id){
		Clientes::find($id)->delete();
		return redirect("/clientes");
	}
}
