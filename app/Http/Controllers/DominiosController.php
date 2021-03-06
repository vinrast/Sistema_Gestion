<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dominios;
use App\Clientes;
use App\Proyectos;
use App\Roles;
use App\Avances;
use App\EmpresasProveedoras;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Session;
use Gate;
use Auth;

class DominiosController extends Controller {

	public function __construct(){
		$this->beforeFilter('@permisos');
		$this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
	}

	public function find(Route $route){

		$this->dominio = Dominios::where('id_dominio',$route->getParameter('dominios'))
									->where('id_empresa', Auth::user()->getIdEmpresa())
									->first();

		if(!$this->dominio){
			return redirect('/dominios');
		}									
	}

	public function permisos(Route $route){
		if(Gate::denies('dominios', $route->getName()) ){
			Session::flash("mensaje-error","No tiene permisos para acceder al modulo: ".$route->getName());
			return redirect('/mis-proyectos');
		};
	}

	
	public function index(){

		$dominios = json_encode(Dominios::where('habilitado_dominio','=',1)
				 					->where('id_empresa', Auth::user()->getIdEmpresa())
				 					->orderBy('id_dominio','desc')
				 					->get());

		return view('dominios.list', compact('dominios'));
	}

	public function create(){
		$dominio = "";
		$proyecto = "";
		$empresas_proveedoras = EmpresasProveedoras::where('id_empresa', Auth::user()->getIdEmpresa())
													->where('habilitado_empresa_proveedora',1)
													->get();
		$proyectos = Proyectos::where('usable_proyecto',1)
								->where('id_empresa', Auth::user()->getIdEmpresa())
								->get();
		$tamanos = ["4294967296"=>"4 GB",
					"2147483648"=>"2 GB",
					"1073741824"=>"1 GB",
					"536870912" =>"512 MB",
					"268435456" =>"256 MB",
					"134217728" =>"128 MB",
					"67108864"  =>"64 MB",
					"33554432"  =>"32 MB",];
		return view('dominios.create', compact('dominio', 'empresas_proveedoras', 'proyectos','proyecto', 'tamanos'));
	}

	public function store(Request $request){

		$request['id_usuario'] = Auth::user()->id_usuario;
		$request['id_empresa'] = Auth::user()->getIdEmpresa();
		if($request->has('id_proyecto')){
			Proyectos::find($request->id_proyecto)->update(['usable_proyecto'=>0,]);		
			$dominio = Dominios::create($request->all());
		}else{
			$dominio = Dominios::create($request->except('id_proyecto'));
		}
		Session::flash('mensaje', 'Dominio creado exitosamente');
		return redirect('/dominios');
	}

	public function show($id){
		return view('dominios.detalle', ['dominio'=>$this->dominio]);
	}

	public function edit($id){
		$dominio = $this->dominio;


		$proyecto = "";
		$tamanos = ["4294967296"=>"4 GB",
					"2147483648"=>"2 GB",
					"1073741824"=>"1 GB",
					"536870912" =>"512 MB",
					"268435456" =>"256 MB",
					"134217728" =>"128 MB",
					"67108864"  =>"64 MB",
					"33554432"  =>"32 MB",
					"0"  =>"0 MB"
					];		
		if ($dominio->id_proyecto){
			$proyecto = Proyectos::find($dominio->id_proyecto);
			if ($proyecto->espacio_asignado_dominio>0){

				$tamanos= [$proyecto->espacio_asignado_dominio=>'Select'] + $tamanos;
			};
		};
		$empresas_proveedoras = EmpresasProveedoras::where('id_empresa', Auth::user()->getIdEmpresa())->get();
		$proyectos = Proyectos::where('usable_proyecto',1)
								->where('id_empresa', Auth::user()->getIdEmpresa())
								->get();
		return view('dominios.create', compact('dominio','empresas_proveedoras','proyectos','proyecto','tamanos'));
	}

	public function update($id, Request $request){
		$request['id_usuario'] = Auth::user()->id_usuario;
		if ($request->has('id_proyecto')){
			Proyectos::find($request->id_proyecto)->update(['usable_proyecto'=>0,]);
			Dominios::find($id)->update($request->all());
		}else{
			Dominios::find($id)->update($request->except('id_proyecto'));
		}
		Session::flash('mensaje', 'Dominio editado exitosamente');
		return redirect("/dominios");
	}

	public function destroy($id){
		//Dominios::find($id)->delete();
		$proyecto = Proyectos::find($this->dominio->id_proyecto);
		$this->dominio->delete();
		if(!$proyecto){
			return redirect("/dominios");
		}
		$roles = Roles::where('id_proyecto',$proyecto->id_proyecto);
		if ($roles){
			$roles->delete();
		};
		
		$avances = Avances::where('id_proyecto',$proyecto->id_proyecto);
		if ($avances){
			$avances->delete();		
		};
		if ($proyecto){
			$proyecto->delete();
		}
		return redirect("/dominios");
	}

	public function actualizarEspacioUsado(){
		$dominios = Dominios::all();
		//dd($dominios);
		foreach ($dominios as $dominio) {
			$size = -1;
			$ruta = '/home/keypan5/public_html/'.$dominio->nombre_dominio;

			if (is_dir($ruta)){
				 $size =  Helper::folderSize( $ruta );	
			}
			$dominio->espacio_usado_dominio = $size;
			$dominio->save();
		}
		Session::flash('mensaje', 'Actualizacion exitosa');
		return redirect("/dominios");
	}
}
