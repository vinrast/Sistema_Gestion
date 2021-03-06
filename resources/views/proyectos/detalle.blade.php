@extends('base-admin')

@section('js')
    <script src="{{ asset('/js/controllers/helper.js') }}"></script>
    <script src="{{ asset('/js/controllers/proyecto_detalle.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ProyectoDetalleController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
    @include('alerts.mensaje_success')
    @include('alerts.mensaje_error') 
	
	<div id="content" class="content ng-scope" ng-controller="SubmitController">
        
        @include('modals/eliminar')

        <ol class="breadcrumb pull-right">
        	
            <div class="btn-toolbar">
                @if($proyecto->habilitado_proyecto)
                <div class="btn-group">
                	<form action="/proyectos/finalizar/{{$proyecto->id_proyecto}}" method="post">
	                    <button type="submit" class="btn btn-list p-l-20 p-r-20" data-toggle="tooltip" data-title="Finalizar Proyecto">
	                        <i class="fa fa-thumbs-up"></i>
	                    </button>
                    </form>
                </div>
                @else
                <div class="btn-group">
                	<form action="/proyectos/reabrir/{{$proyecto->id_proyecto}}" method="post">
	                    <button  class="btn btn-list p-l-20 p-r-20" data-toggle="tooltip" data-title="Habilitar Proyecto">
	                        <i class="fa fa-unlock"></i>
	                    </button>
                    </form>
                </div>
          		@endif
                <div class="btn-group">
                    <div ng-init="eliminar_url='/proyectos/{{$proyecto->id_proyecto}}/destroy'"></div>
                    <a ng-click="eliminar(eliminar_url)" href="#eliminar" class="btn btn-list p-l-20 p-r-20" data-toggle="modal" data-title="Eliminar Proyecto">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
                
			</div>
        </ol>
        

        <h1 class="page-header">Dellate del Proyecto </h1>
        
		<div class="row">
            
            <!-- begin col-12 -->
            <div class="col-md-6 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading-2">
                        <h4 class="panel-title">Información del Proyecto</h4>
                    </div>

                    <div class="panel-body">
                    	<div class="table-responsive">
                            <table class="table table-profile">
                                <tbody>
                                    <tr>
                                        <td class="field">Nombre</td>
                                        <td>{{ $proyecto->nombre_proyecto }}</td>
                                    </tr>
                                    <tr>
                                        <td class="field">Etapa Actual</td>
                                        <td>{{ $proyecto->getEstatus()}}</td>
                                    </tr>
                                    @if($proyecto->getNombreDominio() != "No asignado")
                                    <tr>
                                        <td class="field">Dominio</td>
                                        <td><a href="{{ $proyecto->getNombreDominio() }}" target="_blank">{{ $proyecto->getNombreDominio() }}</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

					</div><!-- boby -->
                </div>

                 <!-- begin panel -->
                @if( $proyecto->proyecto_interno )
                    <div class="panel panel-inverse">
                        <div class="panel-heading-2">
                            <h4 class="panel-title">Información de Lider de proyecto</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <tbody>
                                        <tr>
                                            <td class="field">Lider</td>
                                            <td>{{ $proyecto->nombre_lider_proyecto }}</td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- boby -->
                    </div>
                @else
                    <div class="panel panel-inverse">
                        <div class="panel-heading-2">
                            <h4 class="panel-title">Información del Cliente</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <tbody>
                                        <tr>
                                            <td class="field">Nombre</td>
                                            <td>{{ $proyecto->getCliente()->nombre_cliente }}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Telefono 1</td>
                                            <td><i class="fa fa-mobile fa-lg m-r-5"></i> {{ $proyecto->getCliente()->telefono_cliente}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Telefono 2</td>
                                            <td>
                                                <i class="fa fa-mobile fa-lg m-r-5"></i> 
                                                @if($proyecto->getCliente()->telefono_2_cliente)
                                                    {{ $proyecto->getCliente()->telefono_2_cliente}}
                                                @else
                                                    No tiene
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Correo</td>
                                            <td><a href="email:{{ $proyecto->getCliente()->email_cliente}}">{{ $proyecto->getCliente()->email_cliente}}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- boby -->
                    </div>
                @endif



            </div>

            <!-- begin col-12 -->
            <div class="col-md-6 ui-sortable">
                <div class="panel panel-inverse">
                    <div class="panel-heading-2">
                        <h4 class="panel-title">Integrantes</h4>
                    </div>
                    <div class="panel-body">
                    @if( $proyecto->proyecto_interno )
                        <div class="height-custon-proyectos-lider" data-scrollbar="true">
                    @else
                        <div class="height-custon-proyectos" data-scrollbar="true">
                    @endif
                            <br>
                            <div ng-init="urlRedirect='{{ url('proyectos/'.$proyecto->id_proyecto) }}'"></div>
                            <div ng-init="urlAction='{{ url('/integrantes') }}'"></div>

                            <form class="form-horizontal" id="formulario" name="formulario" action="/integrantes" method="POST">
                                    
                                <input type="hidden" name="id_proyecto" value="{{$proyecto->id_proyecto}}">
                                <input type="hidden" name="redirect" value="{{url('/proyectos/'.$proyecto->id_proyecto )}}">
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label ng-binding">Integrante</label>
                                    <div class="col-md-4">
                                        <select class="form-control js-example-data-array" name="id_usuario" ng-model="id_usuario" ng-required="true">
                                            <option value="">Seleccione un Usuario</option>
                                            @foreach($usuarios as $usuario)
                                                <option class="option" value="{{$usuario->id_usuario}}">
                                                    {{ $usuario->getFullName()}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="error campo-requerido" ng-show="formulario.id_usuario.$invalid && (formulario.id_usuario.$touched || submitted)">
                                            <small class="error" ng-show="formulario.id_usuario.$error.required">
                                                * Campo requerido.
                                            </small>
                                        </div>
                                    </div>
                                    <label class="col-md-1 control-label ng-binding">Rol</label>
                                    <div class="col-md-4">
                                        <select class="form-control js-example-data-array" name="id_tipo_rol" ng-model="id_tipo_rol" ng-required="true">
                                            <option value="">Seleccione un rol</option>
                                            @foreach($roles as $rols)
                                                <option value="{{$rols->id_tipo_rol }}">
                                                    {{ $rols->nombre_tipo_rol }} 
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="error campo-requerido" ng-show="formulario.id_tipo_rol.$invalid && (formulario.id_tipo_rol.$touched || submitted)">
                                            <small class="error" ng-show="formulario.id_tipo_rol.$error.required">
                                                * Campo requerido.
                                            </small>
                                        </div>
                                    </div>
                                    <div>
                                        <button  type="button" ng-click="submit(formulario.$valid)" class="btn btn-list"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                            </form>
                            
                            <hr>
                           
                            <ul class="registered-users-list clearfix">
                                @foreach($rol as $integrante)
                                <li>
                                    <form class="eliminar-integrante" action="/integrantes/{{$integrante->id_rol_usuario}}" method="POST">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="redirect" value="{{url('/proyectos/'.$proyecto->id_proyecto )}}">
                                        <button type="submit" class="btn btn-sm btn-danger btn-eliminar-integrante" data-toggle="tooltip" data-title="Eliminar"><i class="fa fa-remove"></i></button >
                                    </form>  
                                    <a href="javascript:;"><img src="{{ url('/img/user.jpg') }}" alt=""></a>
                                    <h4 class="username text-ellipsis">
                                        {{$integrante->getUser()->getFullName()}}
                                        <small class="text-ellipsis">{{$integrante->getRolName()}}</small>
                                    </h4>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

        <center>
            <h3 class="title">Etapas</h3>
        </center>

        <br>

        <div class="row">
            <!--<div class="col-md-5 col-md-offset-1">
                <select class="form-control js-example-data-array">
                    <option value="">Filtrar etapa</option>
                    @foreach($etapas->getEtapas() as $etapa)
                        @if ($etapa->getAvances($proyecto->id_proyecto)->count()>0)
                            <option class="option" value="{{$etapa->nombre_etapa}}">
                                {{$etapa->nombre_etapa}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>-->
            <div class="col-md-5 col-md-offset-3">
                <div class="progress progress-striped active">
                    <div class="progress-bar" style="width: {{$progress}}%; padding-top: 6px;">{{$progress}}%</div>
                </div>
            </div>
        </div>
        <br>
        <div class="stepwizard">
            <div class="stepwizard-row">
                @foreach($etapas->getEtapas() as $etapa)
                    <div class="stepwizard-step">
                        <button type="button" 
                        @if($etapa->numero_orden_etapa > $proyecto->estatus_proyecto)
                            class="btn btn-circle-time"
                        @else
                            class="btn btn-circle-time-x"
                        @endif
                        di-timesabled="disabled"  data-toggle="tooltip" data-title="{{$etapa->nombre_etapa}}"></button>
                        <p>{{$etapa->numero_orden_etapa}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        
        <div class="row">
            @foreach($etapas->getEtapas() as $etapa)
                @if ($etapa->getAvances($proyecto->id_proyecto)->count()>0)

                    <div class="col-md-6 col-md-push-3">
                        <ul class="pager">
                            <li><a href="#">{{$etapa->nombre_etapa}}</a></li>
                        </ul>
                    </div>
                    
                @endif
                <table class="table table-email table-hover">
                    <tbody class="email-content">
                        @foreach($etapa->getAvances($proyecto->id_proyecto) as $avance)                                                        
                        
                            <tr href="#{{$avance->id_avance}}" data-toggle="collapse">
                                <td class="email-select col-md-1"><span class="userimage"><img width="20" height="20" src="{{url('img/user.jpg')}}" alt=""></span></td>
                                <td class="email-sender col-md-3">
                                    {{$avance->getNombreCreador()}} 
                                </td>
                                <td>
                                    <i class="fa fa-file-text-o"></i>
                                </td>
                                <td class="email-subject col-md-6">
                                    {{$avance->asunto_avance}}
                                </td>
                                <td class="email-date col-md-2">{{$avance->fecha_creacion_avance}} </td>
                            </tr>
                            <tr class="collapse" id="{{$avance->id_avance}}">                                    
                                <td colspan="5">
                                    {!!$avance->descripcion_avance!!}
                                </td>
                            </tr>
                        
                            <!--<div class="col-md-12">
                                <div class="timeline-body">
                                    <div class="timeline-header">
                                        <span class="userimage"><img width="34" height="34" src="{{url('img/user.png')}}" alt=""></span>
                                        <a class="name"><big>{{$avance->getNombreCreador()}}</a></big> ha colocado como asunto del mensaje: 
                                        <big> {{$avance->asunto_avance}}</big> el día <big>{{$avance->fecha_creacion_avance}}</big>  
                                    </div>
                                    <a class="f-s-20 col-md-2 col-md-push-5" href="#{{$avance->id_avance}}" data-toggle="collapse"><i class="fa fa-ellipsis-h"></i></a>
                                    <div class="timeline-content collapse" id="{{$avance->id_avance}}">
                                        <br>
                                        <p>
                                            {!!$avance->descripcion_avance!!}
                                        </p>
                                        <br>
                                    </div>
                                    <div class="timeline-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p> Asunto: {{$avance->asunto_avance}} </p>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>

        <br>
					
    </div><!-- content -->
	
</div>
@endsection