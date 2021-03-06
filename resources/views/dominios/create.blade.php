@extends('base-admin')

@section('js')
	<script src="{{ asset('/js/controllers/helper.js') }}"></script>
	<script src="{{ asset('/js/controllers/dominio.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="DominioController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope" ng-controller="SubmitController">
		
		<div ng-init="urlRedirect='{{ url('dominios/') }}'"></div>

		@if($dominio)
        <h1 class="page-header">Editar Dominio </h1>
        
        <div ng-init="dominio={{$dominio}}"></div>
		<div ng-init="urlAction='{{ url('dominios/'.$dominio->id_dominio) }}'"></div>
		<form class="form-horizontal" action="{{ url('dominios/'.$dominio->id_dominio) }}" method="POST" name="formulario" id="formulario">
		<input type="hidden" name="_method" value="PUT">
		@else
		<div ng-init="urlAction='{{ url('dominios/') }}'"></div>
		<h1 class="page-header">Crear Dominio </h1>
		<form class="form-horizontal" action="{{ url('dominios/') }}" method="POST" name="formulario" id="formulario">
		@endif

	        <div class="row">
	            <!-- begin col-12 -->
	            <div class="col-12 ui-sortable">
	                <!-- begin panel -->
	                <div class="panel panel-inverse">
	                    <div class="panel-heading-2">
	                        <div class="panel-heading-btn">
	                        	<!--<a href="#dominio-ayuda" class="btn btn-ayuda" data-toggle="modal"><i class="fa fa-question"></i></a>-->
	                        </div>
	                        <h4 class="panel-title">Dominio</h4>
	                    </div>

	                    <div class="panel-body">

	                    	<br>

							@if($proyecto)
								<center>
									<label>Proyecto: </label>
									<label>{{$proyecto->nombre_proyecto}} - {{$proyecto->getCliente()->nombre_cliente}}</label>
								</center>
								<br>
							@else

	                    	<div class="form-group">
	                            <label class="col-md-4 control-label">Proyecto</label>
	                            <div class="col-md-5">
						            <select class="form-control js-example-data-array" ng-model="dominio.id_proyecto" name="id_proyecto" oninvalid="setCustomValidity(' ')">
										<option class="option" value="">Seleccione un proyecto</option>
										@foreach($proyectos as $key)
											<option class="option" value="{{$key->id_proyecto}}">
												{{$key->nombre_proyecto}} - {{$key->getCliente()->nombre_cliente}}</option>
										@endforeach
									</select>
									<div class="error campo-requerido" ng-show="formulario.id_proyecto.$invalid && (formulario.id_proyecto.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.id_proyecto.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                            <div class="col-md-3">
                                	<a href="{{ url('/proyectos/create') }}" class="btn btn-success btn-sm p-l-10 p-r-10" data-toggle="tooltip" data-title="Agregar Tipo de Proyecto">
				                        <i class="fa fa-plus"></i>
				                    </a>
                                </div>
	                        </div>

	                        @endif

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Empresa proveedora</label>
	                            <div class="col-md-5">
	                                <select class="form-control js-example-data-array" name="id_empresa_proveedora" ng-required="true" oninvalid="setCustomValidity(' ')">
										<option class="option" value="">Seleccione una empresa proveedora</option>
										@foreach($empresas_proveedoras as $key)
											<option ng-if="dominio.id_empresa_proveedora=={{$key->id_empresa_proveedora}}" class="option" value="{{$key->id_empresa_proveedora}}"selected >{{$key->nombres_empresa_proveedora}}</option>
											<option ng-if="dominio.id_empresa_proveedora!={{$key->id_empresa_proveedora}}" class="option" value="{{$key->id_empresa_proveedora}}" >{{$key->nombres_empresa_proveedora}}</option>
										@endforeach
									</select>
									<div class="error campo-requerido" ng-show="formulario.id_empresa_proveedora.$invalid && (formulario.id_empresa_proveedora.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.id_empresa_proveedora.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                            <div class="col-md-3">
                                	<a href="{{ url('/empresas_proveedoras/create') }}" class="btn btn-success btn-sm p-l-10 p-r-10" data-toggle="tooltip" data-title="Agregar Tipo de Proyecto">
				                        <i class="fa fa-plus"></i>
				                    </a>
                                </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Nombre dominio</label>
	                            <div class="col-md-5">
	                                <input type="url" class="form-control" ng-model="dominio.nombre_dominio" name="nombre_dominio" ng-required="true" oninvalid="setCustomValidity(' ')">
	                            	<div class="error campo-requerido" ng-show="formulario.nombre_dominio.$invalid && (formulario.nombre_dominio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.nombre_dominio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                                    <small class="error" ng-show="formulario.nombre_dominio.$error.url">
	                                    	* URL inválido http://ejemplo.com
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Espacio de disco asignado</label>
	                            <div class="col-md-5">
	                             	<select class="form-control js-example-data-array" name="espacio_asignado_dominio" ng-required="true" oninvalid="setCustomValidity(' ')" required>
										<option class="option" value="">Seleccione un tamaño</option>
										@foreach($tamanos as $key=> $value)
											<option ng-if="dominio.espacio_asignado_dominio=={{$key}}" selected class="option" value="{{$key}}">{{$value}}</option>
											<option ng-if="dominio.espacio_asignado_dominio!={{$key}}" class="option" value="{{$key}}">{{$value}}</option>
										@endforeach
									</select>
									<div class="error campo-requerido" ng-show="formulario.espacio_asignado_dominio.$invalid && (formulario.espacio_asignado_dominio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.espacio_asignado_dominio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Fecha de creacion de dominio</label>
	                            <div class="col-md-5">
	                             	<input type="text" id="daterangepicker" class="form-control" ng-value="dominio.fecha_dominio" name="fecha_dominio" ng-required="true" oninvalid="setCustomValidity(' ')">
	                            	<div class="error campo-requerido" ng-show="formulario.fecha_dominio.$invalid && (formulario.fecha_dominio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.fecha_dominio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <br>
							
							<center>
								@if($dominio)
									<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">
										Actualizar <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
									</button>
								@else
									<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">
										Registrar <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
									</button>
								@endif
							</center>
							
						</div><!-- boby -->
	                </div>
	            </div>
	        </div><!-- row -->
		
		</form>
    </div><!-- content -->
	
	@include('modals/ayudas/dominio')

</div>

@endsection