<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tipo;
use App\Master;
use App\Proyectos;
use App\Roles;
use App\Avances;
use App\Dominios;
use Input;
use App\Perfil;
use App\Clientes;
use App\GrupoEtapas;
use App\Plantillas;
use Session;
use URL;
use Illuminate\Http\Request;
use Gate;


class MisProyectosController extends Controller {


	public function perfil(Request $request){
		$perfil = Perfil::where('id_usuario', $request->user()->id_usuario)->first();
		return view('mis_proyectos.perfil',['perfil'=>$perfil]);
	}

	public function postPerfil(Request $request){
		Perfil::where('id_usuario', $request->user()->id_usuario)->update($request->all());
		Session::flash('mensaje', 'Perfil actualizado exitosamente');
		return redirect("/gestion");
	}

	public function roles(){
		return view('mis_proyectos.rol');
	}

	public function postRoles(){
		$master = Master::where('nombre_maestro','Roles')->first();
		if(!$master){
			$master = Master::create(['nombre_maestro'=>'Roles']);
		}

		Tipo::create(['id_maestro'  => $master->id_maestro,
					  'nombre_tipo' => Input::get('nombre_tipo')]);

		Session::flash('mensaje', 'Rol creado exitosamente');
		return redirect("proyectos/create");	
	}	

	public function misProyectos(){
		$user = Auth::user();
		//FORMA DE LISTAR LAS COLUMNAS ESPECIFICAS COMO UN ARREGLO UNIDIMENCIONAL (SOLO VALUE)

		$proyectos = json_encode(\DB::select('CALL p_busquedas(?,?,?)',array('listar_mis_proyectos',$user->id_usuario, $user->getIdEmpresa())));
		// $proyectos_id = Roles::where('id_usuario',$user->id_usuario)->lists('id_proyecto');
		// $proyectos = Proyectos::where('habilitado_proyecto',1)
		// 						->whereIn('id_proyecto',$proyectos_id)
		// 						->orderBy('id_avance', 'asc')
		// 						->paginate(10);

		return view('mis_proyectos.list',compact('proyectos'));
	}


	public function detalleMisProyectos($id_proyecto){

		$proyecto = Proyectos::where('id_proyecto',$id_proyecto)
								->where('id_empresa', Auth::user()->getIdEmpresa())
								->first();

		if (!$proyecto){
			Session::flash('mensaje-error', 'No tiene permisos para ver ese registro');
			return redirect('/mis-proyectos');
		}
		$rol = Roles::where('id_proyecto',$id_proyecto)
						->where('id_empresa',Auth::user()->getIdEmpresa())
						->get();
	
		$etapas = GrupoEtapas::where('id_grupo_etapas',$proyecto->id_grupo_etapas)
								->where('id_empresa', Auth::user()->getIdEmpresa())
								->first();

		$user = Auth::user();
		/*
		if (!$rol){
			return redirect('mis-proyectos/');
		}
		*/
		
		return view('mis_proyectos.detalle_proyecto',compact('proyecto','id_proyecto', 'rol', 'etapas' ));
	}

	//__________________________________ CRUD AVANCES ____________________
	public function avancesMisProyectos($id_proyecto){

		$avances  = Avances::where('id_proyecto',$id_proyecto)
								->where('id_empresa',$user->getIdEmpresa())
								->orderBy('id_proyecto', 'desc')->paginate(10);

		return view('avances.list',compact('avances', 'id_proyecto'));
	}

	public function createAvancesMisProyectos($id_proyecto){
		$user = Auth::user();

		$proyecto = Proyectos::where('id_proyecto',$id_proyecto)
								->where('id_empresa',$user->getIdEmpresa())
								->first();
		if (!$proyecto){
			Session::flash('mensaje-error', 'No tiene permisos para ver ese registro');
			return redirect('mis-proyectos');
		}

		$plantillas = Plantillas::where('id_empresa',$user->getIdEmpresa())
								->get();

		$etapas = GrupoEtapas::find($proyecto->id_grupo_etapas)->getEtapas();

		$dominio = Dominios::find($proyecto->id_dominio);
		$mis_datos = Auth::user()->getPerfil();
		$mi_correo = Auth::user()->correo_usuario;
		return view('avances.create',compact('id_proyecto','proyecto','plantillas','etapas', 'mi_correo', 'mis_datos', 'dominio'));
	}	

	public function postCreateAvancesMisProyectos(Request $request,$id_proyecto){

		$proyecto = Proyectos::where('id_proyecto',$id_proyecto)
								->where('id_empresa',$user->getIdEmpresa())
								->first();

		$plantilla = Plantillas::where('id_plantilla',$request->id_plantilla)
								->where('id_empresa',$user->getIdEmpresa())
								->first();								

		if (!$proyecto || !$plantilla){
			Session::flash('mensaje-error', 'No tiene permisos para registrar avance en ese proyecto');
			return redirect('mis-proyectos');
		}

		$dominio = Dominios::find($proyecto->id_dominio);
		$mis_datos = Auth::user()->getPerfil();
		$mi_correo = Auth::user()->correo_usuario;

		if ($request->check_cierre_etapa==1){
			$proyecto->estatus_proyecto = $proyecto->estatus_proyecto + 1;
		}

		$cliente = Clientes::find($proyecto->id_cliente);

		if ($request->check_copia_cliente_avance){

			$parametros_plantilla = ['proyecto'=>$proyecto,
									 'cliente' =>$cliente,
									 'dominio' =>$dominio,
									 'mis_datos' =>$mis_datos,
									 'mi_correo' =>$mi_correo,
									 'data'    =>$request->descripcion_avance];			
			Helper::SendEmail(
							$cliente->email_cliente,
							$cliente->persona_contacto_cliente,
							$request->asunto_avance,
							'emails.'.$plantilla->nombre_plantilla,
							$parametros_plantilla
							);
		};
		$request['id_usuario'] = Auth::user()->id_usuario;
		$request['id_empresa'] = Auth::user()->getIdEmpresa();
		$avances = Avances::firstOrCreate($request->except('check_cierre_etapa'));

		$proyecto->id_avance = $avances->id_avance;
		$proyecto->save();

		Session::flash('mensaje', 'Avance creado exitosamente');
		return redirect('/mis-proyectos/'.$id_proyecto);
	}

	public function previewRealDataPlantillas( $id_proyecto,$id_plantilla){

		$plantilla = Plantillas::where('id_plantilla',$id_plantilla)
								->where('id_empresa',Auth::user()->getIdEmpresa())
								->first();

		$proyecto = Proyectos::where('id_proyecto',$id_proyecto)
								->where('id_empresa',Auth::user()->getIdEmpresa())
								->first();

		if (!$proyecto || !$plantilla){
			Session::flash('mensaje-error', 'No tiene permisos para ver ese registro');
			return redirect('mis-proyectos');
		}
		$cliente = Clientes::find($proyecto->id_cliente);
		$dominio = Dominios::find($proyecto->id_dominio);
		$mis_datos = Auth::user()->getPerfil();
		$mi_correo = Auth::user()->correo_usuario;		
		$data = "<Strong>Aqui va la descripcion del mensaje</strong>";
		return view('emails.'.$plantilla->nombre_plantilla,compact('proyecto','cliente','data','dominio','mis_datos','mi_correo'));
	}		
	//__________________________________END CRUD AVANCES ____________________
}

