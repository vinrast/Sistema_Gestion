@extends('base-admin')

@section('js')
    <script src="{{ asset('/js/controllers/dominio.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="DominioController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')

    @include('alerts.mensaje_success')
	@include('alerts.mensaje_error')

    @include('modals/eliminar')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url( '/dominios/create' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Agregar Dominio">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <!--<div class="btn-group">
                    <a href="{{ url( '/dominios/updateData' ) }}" class="btn btn-danger btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Actualizar">
                        <i class="fa fa-repeat"></i>
                    </a>
                </div>-->
            </div>
        </ol>

        <h1 class="page-header">Lista de Dominios</h1>

        <div ng-init="dominios={{$dominios}}"></div>
		<div ng-init="url='{{url()}}'"></div>
		
        <div class="row">
            <div class="col-12">
                <div class="panel-group" id="accordion">
                	<div class="row text-list">
                		<div class="col-sm-3"> 
                			<div class="row">
                				<div class="col-sm-3">N° </div>
                				<div class="col-sm-9">
                        			Dominio
                        		</div>
                			</div>
                		</div>
                		<div class="col-sm-3">
							Proyecto
                		</div>
                		<div class="col-sm-3">
							Proveedor
                		</div>
                		<div class="col-sm-3">
							Cliente
                		</div>
                	</div>

                	<br>
                    
                    <div class="panel panel-inverse overflow-hidden custon-list" ng-repeat="dominio in dominios| filter:opciones.buscador | orderBy:sort:reverse  track by $index">
                        <div class="panel-heading">
                            <h3 class="panel-title list-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#[[$index+1]]">
                                    <i class="fa fa-plus pull-right"></i> 
                                </a>	
                            </h3>
                            <div class="box-button-list">
		        				<a class="btn btn-list" ng-href="{{ url( '/dominios/[[dominio.id_dominio]]/edit' ) }}" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
		        			</div>
                            <h3 class="panel-title list-title">
                            	<div class="row">
                            		<div class="col-sm-3"> 
                            			<div class="row">
                            				<div class="col-sm-3"> [[$index+1]] </div>
                            				<div class="col-sm-9">
		                            			<a href="[[dominio.nombre_dominio]]">[[dominio.nombre_dominio]]</a>
		                            		</div>
                            			</div>
                            		</div>

                            		<div class="col-sm-3">
										[[dominio.nombre_proyecto | noAsignado ]]
                            		</div>

                            		<div class="col-sm-3">
										[[dominio.nombres_empresa_proveedora]]
                            		</div>

                            		<div class="col-sm-2">
										[[dominio.nombre_cliente]]
                            		</div>

                            	</div>                           	 
                            </h3>
                        </div>
                        <div id="[[$index+1]]" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<p>Fecha de creación: [[dominio.fecha_creacion_dominio]]</p>
                            	<p>Espacio Usado: [[dominio.espacio_asignado_dominio | formatSize]]</p>
								<div ng-init="eliminar_url='/dominios/'+[[dominio.id_dominio]]+'/destroy'"></div>
                                <a class="btn btn-list pull-right" ng-click="eliminar(eliminar_url)" href="#eliminar"  data-toggle="modal"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- content -->
	
</div>

@endsection