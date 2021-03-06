@extends('base-admin')

@section('js')
    <script src="{{ asset('/js/controllers/plantilla.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="PlantillasController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	@include('alerts.mensaje_error')
	@include('alerts.mensaje_success')

    @include('modals/eliminar')

	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url( '/plantillas/create' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Crear Pantilla">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header">Lista de Plantillas </h1>
        
        <div ng-init="plantillas={{$plantillas}}"></div>
        <div ng-init="url='{{url()}}'"></div>

		<div class="row">
            <div class="col-12">
                <div class="panel-group" id="accordion">
                	<div class="row text-list">
                		<div class="col-sm-6"> 
                			<div class="row">
                				<div class="col-sm-2" align="center">N° </div>
                				<div class="col-sm-10">
                        			Nombre plantilla
                        		</div>
                			</div>
                		</div>
                		<div class="col-sm-4">
							Fecha de creación
                		</div>
                	</div>

                	<br>
                    
                    <div class="panel panel-inverse overflow-hidden custon-list" ng-repeat="plantilla in plantillas | filter:opciones.buscador | orderBy:sort:reverse  track by $index">
                        <div class="panel-heading">
                            <h3 class="panel-title list-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#[[$index+1]]">
                                    <i class="fa fa-plus pull-right"></i> 
                                </a>	
                            </h3>
                            <div class="box-button-list">
		        				<a class="btn btn-list" ng-href="{{ url( '/plantillas/[[plantilla.id_plantilla]]/edit' ) }}" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
		        				<a class="btn btn-list" target="_blank" ng-href="{{ url( '/plantillas/preview/[[plantilla.id_plantilla]]' ) }}" data-toggle="tooltip" data-title="Preview"><i class="fa fa-eye"></i></a>
		        			</div>
                            <h3 class="panel-title list-title">
                            	<div class="row">
                            		<div class="col-sm-6"> 
                            			<div class="row">
                            				<div class="col-sm-2"> [[$index+1]] </div>
                            				<div class="col-sm-10 text-ellipsis">
		                            			[[plantilla.nombre_plantilla]]
		                            		</div>
                            			</div>
                            		</div>

                            		<div class="col-sm-4">
										[[plantilla.fecha_creacion_plantilla ]]
                            		</div>

                            	</div>                           	 
                            </h3>
                        </div>
                        <div id="[[$index+1]]" class="panel-collapse collapse">
                            <div class="panel-body">
                            	[[plantilla.descripcion_plantilla]]
                                <div ng-init="eliminar_url='/plantillas/'+[[plantilla.id_plantilla]]+'/destroy'"></div>
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