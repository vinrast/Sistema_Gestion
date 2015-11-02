// Declare use of strict javascript
'use strict';

coreApp.controller('ClienteController', function ($scope, $log) {
	console.log("cliente");
	$scope.cliente = {};
});

coreApp.controller('DominioController', function ($scope, $log) {
	console.log("dominio");
	$scope.dominio={};
	$scope.init= function(data){
		if(data){
			$scope.dominio = data;
			console.log(data);
			$scope.dominio.id_empresa_proveedora = $scope.dominio.id_empresa_proveedora.toString();
		}
	};
});

coreApp.controller('ProveedorController', function ($scope, $log) {
	console.log("proveedor");
	$scope.proveedor={};
});

coreApp.controller('AvanceController', function ($scope, $log) {
	console.log("Avance");
	$scope.avance={};
	$scope.check=0;
});

coreApp.controller('ProyectoController', function ($scope, $log) {
	console.log("Proyecto");
	$scope.personas=[];
	$scope.cantidad=0;
	$scope.proyecto={};
	
	$scope.agregar_integrantes= function(argument) {
		$scope.personas.push(1);
		$scope.cantidad = $scope.personas.length;
	};

	$scope.eliminar_integrantes= function(argument) {
		$scope.personas.pop();
		$scope.cantidad = $scope.personas.length;
	};
});

coreApp.controller('PerfilController', function ($scope, $log) {
	console.log("perfil");
	$scope.perfil={};
});

coreApp.controller('PlantillasController', function ($scope, $log) {
	console.log("plantillas");
	$scope.plantilla={};
});

coreApp.controller('GrupoEtapasController', function ($scope, $log) {
	console.log("Grupo de etapas");
	$scope.etapas=[];
	$scope.cantidad=0;
	$scope.GrpEtapas={};
	
	$scope.agregar_etapa= function(argument) {
		$scope.etapas.push(1);
		$scope.cantidad = $scope.etapas.length;
	};

	$scope.eliminar_etapa= function(argument) {
		$scope.etapas.pop();
		$scope.cantidad = $scope.etapas.length;
	};
});