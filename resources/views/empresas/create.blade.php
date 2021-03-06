@extends('base-admin')

@section('js')
	<script src="{{ asset('/js/controllers/helper.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="EmpresaController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope" ng-controller="SubmitController">
        <div ng-init="urlRedirect='{{ url('admin_empresas/') }}'"></div>
        @if($empresa)
        <h1 class="page-header">Editar Empresa </h1>
        
        <div ng-init="model={{$empresa}}"></div>
		<div ng-init="usuario={{$usuario}}"></div>
		<div ng-init="urlAction='{{ url('admin_empresas/'.$empresa->id_empresa) }}'"></div>|
		<form class="form-horizontal" action="{{ url('admin_empresas/'.$empresa->id_empresa) }}" method="POST" name="formulario" id="formulario" >
		<input type="hidden" name="_method" value="PUT">
        
        @else
		<div ng-init="urlAction='{{ url('admin_empresas/') }}'"></div>
        <h1 class="page-header">Crear Empresa </h1>
		<form class="form-horizontal" action="{{ url('admin_empresas/') }}" method="POST" name="formulario" id="formulario">	

		@endif
        
	        <div class="row">
	            <!-- begin col-12 -->
	            <div class="col-12 ui-sortable">
	                <!-- begin panel -->
	                <div class="panel panel-inverse">
	                    <div class="panel-heading-2">
	                        <div class="panel-heading-btn">
	                        	
	                        </div>
	                        <h4 class="panel-title">Empresas</h4>
	                    </div>

	                    <div class="panel-body">

	                    	<br>

	                    	<div class="form-group">
	                            <label class="col-md-4 control-label">Nombre de empresa</label>
	                            <div class="col-md-5">
	                            	<input type="text" text-num-only class="form-control" ng-model="model.nombre_empresa" name="nombre_empresa" ng-required="true" oninvalid="setCustomValidity(' ')">
									<div class="error campo-requerido" ng-show="formulario.nombre_empresa.$invalid && (formulario.nombre_empresa.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.nombre_empresa.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>		                            	
	                            </div>                            
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Identificador de empresa</label>
	                            <div class="col-md-5">
	                            	<input type="text" ng-remote-validate="{{url('/valididentificador')}}" ng-pattern="/^[A-Z]*[0-9]*$/"  ng-required="true" class="form-control" ng-model="model.rif_empresa" name="rif_empresa" >
	                            	<div class="error campo-requerido" ng-show="formulario.rif_empresa.$invalid && (formulario.rif_empresa.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.rif_empresa.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                                    <small class="error" ng-show="formulario.rif_empresa.$error.pattern">
	                                        * Formato de identificador inválido. Solo debe introducir mayusculas y números. Ejemplo: J123456789.
	                                    </small>
	                                    <small class="error" ng-show="formulario.rif_empresa.$error.ngRemoteValidate">
	                                        * Identificador ya esta siendo usado en el sistema, utilice otro o contacte a soporte técnico (contacto@keygestion.com.ve).
	                                    </small>		                                    
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Correo de administrador</label>
	                            <div class="col-md-5">
	                            	<input type="email" class="form-control" ng-model="model.correo_empresa" name="correo_empresa" ng-required="true" oninvalid="setCustomValidity(' ')">
									<div class="error campo-requerido" ng-show="formulario.correo_empresa.$invalid && (formulario.correo_empresa.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.correo_empresa.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                                    <small class="error" ng-show="formulario.correo_empresa.$error.email">
	                                    	* Correo inválido correo@ejemplo.com
	                                    </small>
	                            	</div>			                            	
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Teléfono de administrador</label>
	                            <div class="col-md-5">
	                            	<input type="text" telef placeholder="+58-212-8610000" class="form-control" ng-model="model.telefono_empresa" name="telefono_empresa" ng-required="true" oninvalid="setCustomValidity(' ')">
 									<div class="error campo-requerido" ng-show="formulario.telefono_empresa.$invalid && (formulario.telefono_empresa.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.telefono_empresa.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>			                            	
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Dirección</label>
	                            <div class="col-md-5">
	                            	<textarea rows="5" class="form-control" ng-model="model.direccion_empresa" name="direccion_empresa" ng-required="true" oninvalid="setCustomValidity(' ')"></textarea>
									<div class="error campo-requerido" ng-show="formulario.direccion_empresa.$invalid && (formulario.direccion_empresa.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.direccion_empresa.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>			                            	
	                            </div>
	                        </div>

							<div class="from-group">
								<center><label class="control-label">Datos de autenticación</label></center>
							</div>
							<br>

							<div class="form-group">
	                            <label class="col-md-4 control-label">Correo de usuario</label>
	                            <div class="col-md-5">
	                            	<input type="email" class="form-control" ng-model="usuario.correo_usuario" name="correo_usuario" ng-required="true" oninvalid="setCustomValidity(' ')">
									<div class="error campo-requerido" ng-show="formulario.correo_usuario.$invalid && (formulario.correo_usuario.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.correo_usuario.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                                    <small class="error" ng-show="formulario.correo_usuario.$error.email">
	                                    	* Correo inválido correo@ejemplo.com
	                                    </small>
	                            	</div>			                            	
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Contraseña</label>
	                            <div class="col-md-5">
	                            	<input type="textarea" class="form-control" ng-model="usuario.password" name="password" ng-required="true" oninvalid="setCustomValidity(' ')">
									<div class="error campo-requerido" ng-show="formulario.password.$invalid && (formulario.password.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.password.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>			                            	
	                            </div>
	                        </div>

							<br>
							<center>
								@if($empresa)
								<button class="btn btn-success m-r-5 m-b-5" type="button" ng-click="submit(formulario.$valid)">
									Actualizar <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
								</button>
								@else
								<button class="btn btn-success m-r-5 m-b-5" type="button" ng-click="submit(formulario.$valid)">
									Registrar <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
								</button>
								@endif
							</center>
							
			
		
						</div><!-- boby -->
	                </div>
	            </div>
	        </div>
		</form>
    </div><!-- content -->
	
</div>
@endsection
