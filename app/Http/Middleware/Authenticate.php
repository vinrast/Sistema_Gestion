<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Authenticate {


	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if ($this->auth->guest()){

			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('/login');
			}

		}

		if(!$this->auth->user()->getHabiltiadoEmpresa()){
			if (!$this->auth->user()->isSuperAdmin()){
				Session::flash('mensaje-error', 'Empresa Baneada.');
				return redirect()->guest('/login');
			}
		}		

		if($this->auth->user()->habilitado_usuario==0){
			Session::flash('mensaje-error', 'Usuario deshabilitado.');
			return redirect()->guest('/login');
		}

		if($this->auth->user()->activado_usuario==0){
			Session::flash('mensaje-error', 'Usuario sin activar, sino recibió el correo de activación use la opción "Olvido su contraseña?" para reenviarlo.');
			return redirect()->guest('/login');
		}

		if($this->auth->user()->validacionVencimiento() ){
			Session::flash('mensaje-7-dias', 'A vencido su periodo de prueba de 7 dias, 
				para obtener el servicio completo envie un correo con sus datos de contacto
				a info@keygestion.com.ve y lo antes posible nos estaremos comunicando con usted.');
			return redirect()->guest('/login');
		}		

		return $next($request);
	}

}
