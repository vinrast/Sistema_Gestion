@extends('base-admin')

@section('js')
    <script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
@endsection


@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="AvanceController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope"  >

		<!--<ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url( '/mis-proyectos/[[proyecto.id_proyecto]]' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Detalle">
                        <i class="fa fa-list"></i>
                    </a>
                </div>
            </div>
        </ol>-->
        <div ng-init="urlRedirect='{{ url('mis-proyectos/') }}'"></div>
        <h1 class="page-header">Crear avance en el Proyecto.</h1>
        <div ng-init="urlAction='{{ url('/mis-proyectos/avances/'.$id_proyecto.'/create') }}'"></div>
        <form class="form-horizontal" action="" id="formulario" name="formulario" method="POST">       

            <div class="row">
                <!-- begin col-12 -->
                <div class="col-12 ui-sortable">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading-2">
                            <div class="panel-heading-btn">
                                <!--<a href="#ayuda" class="btn btn-ayuda" data-toggle="modal"><i class="fa fa-question"></i></a>-->
                            </div>
                            <h4 class="panel-title">Crear avance</h4>
                        </div>

                        <div class="panel-body">
    							
							<div class="from-group">
								<label class="col-md-4 control-label">Etapa: </label>
								<div class="col-md-5"> 
									<h6 class="text-success">{{$proyecto->getEstatus()}}</h6>
								</div>
								<input type="hidden" class="form-control" name="id_etapa" ng-value='{{$proyecto->getIdEtapa()}}'>
							</div>			

							<div class="form-group">
                                <label class="col-md-4 control-label">¿Avance de cierre de etapa?</label>
                                <div class="col-md-5">
                                    <label class="radio-inline">
                                        <input type="radio" name="check_cierre_etapa" value="1">
                                        si
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="check_cierre_etapa" value="0" checked="checked">
                                        no
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
								<label class="col-md-4 control-label"> Asunto </label>
								<div class="col-md-5">
									<input type="text" class="form-control" ng-model="avance.notificacion_avance" name="asunto_avance" ng-required="true" oninvalid="setCustomValidity(' ')">
                                    <div class="error campo-requerido" ng-show="formulario.asunto_avance.$invalid && (formulario.asunto_avance.$touched || submitted)">
                                        <small class="error" ng-show="formulario.asunto_avance.$error.required">
                                            * Campo requerido.
                                        </small>
                                    </div>                                      
                                </div>
							</div>
                            @if(!$proyecto->proyecto_interno)
    							<div class="form-group">
                                    <label class="col-md-4 control-label">¿Con copia al cliente?</label>
                                    <div class="col-md-5">
                                        <label class="radio-inline">
                                            <input type="radio" name="check_copia_cliente_avance" ng-model="check" value="1" ng-click='pantilla(check)'>
                                            si
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="check_copia_cliente_avance" ng-model="check" value="0" checked="checked">
                                            no
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group" ng-if="check==1">
    								<label class="control-label col-md-4">Plantillas</label>
    								<div class="col-md-5">
    								    <select class="form-control js-example-data-array" name="id_plantilla" ng-model="id_plantilla" ng-required="true" oninvalid="setCustomValidity(' ')">
                                            <option class="option" value="">Seleccione una plantilla</option>
                                            @foreach($plantillas as $plantilla)
    												<option class="option" value="{{$plantilla->id_plantilla}}">
    													{{ $plantilla->nombre_plantilla }}
    												</option>							
    										@endforeach	
                                        </select>
                                        <div class="error campo-requerido" ng-show="formulario.id_plantilla.$invalid && (formulario.id_plantilla.$touched || submitted)">
                                            <small class="error" ng-show="formulario.id_plantilla.$error.required">
                                                * Campo requerido.
                                            </small>
                                        </div>                                          
                                    </div>
                                    <div class="col-md-2">
    									<a class="btn btn-sm btn-success" ng-if="id_plantilla" target="_blank" href="{{ url( '/plantillas/preview/'.$proyecto->id_proyecto.'/[[id_plantilla]]/' ) }}"> preview <i class="fa fa-eye"></i></a>
    								</div>
    							</div>
    						@endif
    					</div><!-- boby -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-inverse" data-sortable-id="form-wysiwyg-1">
                        <div class="panel-heading-2">
                            <div class="panel-heading-btn">
                                
                            </div>
                            <h4 class="panel-title">Descripción</h4> 
                        </div>
                        <div class="panel-body panel-form">
                            <textarea class="ckeditor" ck-editor id="editor1" rows="30" ng-model="avance.descripcion_avance" name="descripcion_avance" ng-required="true" oninvalid="setCustomValidity(' ')">
                            
                            </textarea>
                            <div class="error campo-requerido" ng-show="formulario.descripcion_avance.$invalid && (formulario.descripcion_avance.$touched || submitted)">
                                <small class="error" ng-show="formulario.descripcion_avance.$error.required">
                                    * Campo requerido.
                                </small>
                            </div>                                 
                        </div>
                    </div>
                </div>

            </div>
        <center>
            <button class="btn btn-success m-r-5 m-b-5" type="button" ng-click="submit(formulario.$valid)">
                Registrar <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
            </button>
        </center>
        </form>
        

    </div><!-- content -->
	
    @include('modals/ayuda')

</div>
@endsection