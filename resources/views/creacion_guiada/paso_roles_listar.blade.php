@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-header-fixed">
	
	@include('layouts/navbar-admin')

	@include('alerts.mensaje_success')
	@include('alerts.mensaje_error')

    <div ng-init="models={{$roles}}"></div>
    <div ng-init="url='{{url()}}'"></div>

	<div id="content" class="content content-asistente ng-scope">

		<ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group list-none-click" ng-show="!models">
                    <h4>Haga click aqui para registrar <i class="fa fa-arrow-right"></i></h4>
                </div>
                <div class="btn-group">
                    <a href="{{ url( 'asistente/paso4/create' ) }}" class="btn btn-success" data-toggle="tooltip" data-title="Crear Tipo Proyecto">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>

        <section id="do_action" ng-show="!models">
            <div class="container center">
                <div class="row">
                    <div class="col-md-12 list-none">
                        <i class="fa fa-ban"></i>
                        <h1> No tiene Roles de Usuarios registrados.</h1>
                    </div>
                </div>
            </div>
        </section>

        <h1 class="page-header" ng-show="models">Lista de Roles </h1>
		
		<div class="row" ng-show="models">
            <div class="col-12">
                <div class="panel-group" id="accordion">
                	<div class="row text-list">
                		<div class="col-sm-5"> 
                			<div class="row">
                				<div class="col-sm-3">N° </div>
                				<div class="col-sm-9">
                        			<a href="#" ng-click="changeSort('nombre_tipo_rol')">Nombre de rol</a>
                        		</div>
                			</div>
                		</div>
                	</div>

                	<br>
                    
                    <div class="panel panel-inverse overflow-hidden" ng-repeat="model in models| filter:opciones.buscador | orderBy:sort:reverse  track by $index">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title list-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion" href="#[[$index+1]]">
                                    <i class="fa fa-plus pull-right"></i> 
                                </a>	
                            </h3>-->
                            <div class="box-button-list">
		        				<!--<a class="btn btn-list" ng-href="{{ url( '/roles/[[model.id_tipo_rol]]/edit' ) }}" data-toggle="tooltip" data-title="Editar"><i class="fa  fa-pencil-square-o"></i></a>-->
		        				<!--<a class="btn btn-sm btn-inverse" ng-href="{{ url( '/roles/[[model.id_tipo_rol]]') }}" data-toggle="tooltip" data-title="Gestionar"><i class="fa fa-cogs"></i></a>-->
		        			</div>
                            <h3 class="panel-title list-title">
                            	<div class="row">
                            		<div class="col-sm-5"> 
                            			<div class="row">
                            				<div class="col-sm-3"> [[$index+1]] </div>
                            				<div class="col-sm-9">
		                            			[[model.nombre_tipo_rol]]
		                            		</div>
                            			</div>
                            		</div>
                            	</div>                           	 
                            </h3>
                        </div>
                        <div id="[[$index+1]]" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<p>Descripción: [[model.descripcion_tipo_rol]]</p>
                            	
                            	<a class="btn btn-sm btn-danger pull-right" href="{{ url( '/roles/[[model.id_tipo_rol]]/destroy') }}" data-toggle="tooltip" data-title="Eliminar"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br><br>

        </div>

    </div>

    <!-- Navbar fixed bottom -->
	<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	  	<div class="container">
	    	<div class="navbar-header">
	      		<a class="navbar-brand" href="#">Paso 4/5 Roles</a>
	    	</div>
	    	<div class="navbar-collapse">
	      		<!-- Right nav -->
	      		<ul class="nav-siguiente navbar-right">
	        		<li><a href="{{ url('asistente/paso5/create') }}" class="btn btn-success m-r-5 m-b-5" ng-disabled="!models">Siguiente</a></li>
	      		</ul>
	      		<ul class="nav-siguiente navbar-right">
	        		<li><a href="{{ url('asistente/paso3/list') }}" class="btn btn-success m-r-5 m-b-5">Atras</a></li>
	      		</ul>
	    	</div><!--/.nav-collapse -->
	  	</div><!--/.container -->
	</div>

</div>
@endsection