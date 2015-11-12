@extends('layouts.base')

@section('content')
<div class="container">

	@if($proyecto->habilitado_proyecto)
		<form action="/proyectos/finalizar/{{$proyecto->id_proyecto}}" method="post">
			<button type="submit" class="btn btn-sm btn-success">Finalizar Proyecto</button>
		</form>
	@else
		<form action="/proyectos/reabrir/{{$proyecto->id_proyecto}}" method="post">
			<button type="submit" class="btn btn-sm btn-success">Habilitar Proyecto</button>
		</form>
	@endif
	<br>
	<h2>INFORMACION PROYECTO</h2><br>
	nombre: {{ $proyecto->nombre_proyecto }} <br>
	descripcion: {{ $proyecto->direccion_proyecto}} <br>
	Etapa actual de proyecto: {{ $proyecto->getEstatus()}} <br><br><br>

	<h2>INFORMACION CLIENTE</h2><br>
	nombre: {{ $proyecto->getCliente()->nombre_cliente }} <br>
	persona Contacto: {{ $proyecto->getCliente()->persona_contacto_cliente}} <br>
	telefono 1: {{ $proyecto->getCliente()->telefono_cliente}} <br>
	telefono 2: {{ $proyecto->getCliente()->telefono_cliente}} <br>
	correo electronico: {{ $proyecto->getCliente()->email_cliente}} <br>
 
	<br><br><br>

	<h2>INFORMACION DOMINIO</h2><br>
	nombre: {{ $proyecto->getNombreDominio() }} <br>
 
	<br><br><br>

	<h2>ETAPAS</h2><br>
	@foreach($etapas->getEtapas() as $etapa)
		{{$etapa->nombre_etapa}} <br>
		@if ($etapa->getAvances($proyecto->id_proyecto)->first())
		  -- Avances:<br>
		@endif
		@foreach($etapa->getAvances($proyecto->id_proyecto) as $avance)
			---- {{$avance->asunto_avance}} - {{$avance->descripcion_avance}} - {{$avance->fecha_creacion_avance}} - {{$avance->getNombreCreador()}}<br>
		@endforeach
		<br>
	@endforeach

	<br><br><br>
	<h2>INTEGRANTES</h2><br>
	@foreach($rol as $integrante)
		{{$integrante->getUser()->getFullName()}} - {{$integrante->getRolName()}} 
		<form action="/integrantes/{{$integrante->id_rol_usuario}}" method="POST">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="redirect" value="{{url('/proyectos/'.$proyecto->id_proyecto )}}">
			<button type="submit" class="btn btn-sm btn-danger">Eliminar integrante</button >
		</form>
		 <br>
		 <br>
		 <br>
	@endforeach
	Agregar integrante
	<form action="/integrantes" method="POST">
		<div class="from-group">
			<input type="hidden" name="id_proyecto" value="{{$proyecto->id_proyecto}}">
			<input type="hidden" name="redirect" value="{{url('/proyectos/'.$proyecto->id_proyecto )}}">

			<label for="">Integrante </label>
			<select class="form-control" name="id_usuario">
				<option class="option" value="">Seleccione un Usuario</option>
				@foreach($usuarios as $usuario)
					<option class="option" value="{{$usuario->id_usuario}}">
						{{ $usuario->getFullName()}}
					</option>
				@endforeach
			</select>
			<label for="">Rol que cumplirá</label>
			<select class="form-control" name="id_tipo_rol">
				<option class="option" value="">Seleccione un Rol</option>
				@foreach($roles as $rol)
					<option class="option" value="{{$rol->id_tipo}}">
						{{ $rol->nombre_tipo }} 
					</option>
				@endforeach
			</select>
			<button type="submit" class="btn btn-sm btn-success">Agregar</button >				
		</div>
	</form>
	
	<br><br>
	<br><br>
	<br><br>
	<form action="/proyectos/{{$proyecto->id_proyecto}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<button type="submit" class="btn btn-sm btn-danger">Eliminar Proyecto</button>
	</form>
	
</div>
@stop