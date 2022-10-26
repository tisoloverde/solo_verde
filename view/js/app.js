var lineaTiempo = '';
var personalPropio = '';
var app = angular.module("WPApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/home", {
        controller: "homeController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idLoad=205"
    })
    .when("/equipo", {
        controller: "personalController",
        controllerAs: "vm",
        templateUrl : "view/personal/personal.html?idLoad=205"
    })
    .when("/personalInterno", {
        controller: "personalInternoController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/personalInterno.html?idLoad=205"
    })
    .when("/usuarios", {
        controller: "usuariosController",
        controllerAs: "vm",
        templateUrl : "view/usuario/usuarios.html?idLoad=205"
    })
    .when("/perfiles", {
        controller: "perfilesController",
        controllerAs: "vm",
        templateUrl : "view/usuario/perfiles.html?idLoad=205"
    })
    .when("/conceptos_remuneraciones",{
        controller: "conceptosRemuneracionesController",
        controllerAs: "wm",
        templateUrl: "view/adminPersonal/componentes_sueldo.html?idLoad=205"
    })
    .when("/sindicatos",{
        controller: "sindicatosController",
        controllerAs: "wm",
        templateUrl: "view/adminPersonal/sindicato.html?idLoad=205"
    })
    .when("/logout", {
        controller: "logoutController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idLoad=205"
    })
    .when("/proyectos",{
        controller: "proyectosController",
        controllerAs: "wm",
        templateUrl: "view/controlling/proyecto.html?idLoad=205"
    })
    //Aseguradora
    .when("/aseguradoras", {
      controller: "aseguradoraController",
      controllerAs: "vm",
      templateUrl : "view/flota/aseguradora.html?idLoad=205"
    })
    // Tipo de Vehiculo
    .when("/tipoVehiculo", {
      controller: "tipoVehiculoController",
      controllerAs: "vm",
      templateUrl : "view/flota/tipoVehiculo.html?idLoad=205"
    })
    // Taller
    .when("/talleres", {
      controller: "tallerController",
      controllerAs: "vm",
      templateUrl : "view/flota/taller.html?idLoad=205"
    })
    // Marca Modelo
    .when("/marcaModelo", {
      controller: "marcaModeloController",
      controllerAs: "vm",
      templateUrl : "view/flota/marcaModelo.html?idLoad=205"
    })
    // Sucursales
    .when("/sucursales", {
      controller: "sucursalController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/sucursal.html?idLoad=205"
    })
    // Vehiculo
    .when("/listadoVehiculos", {
      controller: "vehiculoController",
      controllerAs: "vm",
      templateUrl : "view/flota/vehiculo.html?idLoad=205"
    })
    // Proveedores
    .when("/flotaProveedores", {
      controller: "proveedoresController",
      controllerAs: "vm",
      templateUrl : "view/flota/proveedores.html?idLoad=205"
    })
    // Asignaciones
    .when("/asignacionVehiculo", {
      controller: "asignacionController",
      controllerAs: "vm",
      templateUrl : "view/flota/asignacion.html?idLoad=205"
    })
    // Desasignaciones
    .when("/desasignacionFlotaVehiculo", {
      controller: "desasignacionController",
      controllerAs: "vm",
      templateUrl : "view/flota/desasignacion.html?idLoad=205"
    })
    // Clausulas
    .when("/clausulas", {
      controller: "clausulasController",
      controllerAs: "vm",
      templateUrl : "view/flota/clausulas.html?idLoad=205"
    })
    // Siniestros
    .when("/siniestros", {
      controller: "siniestrosController",
      controllerAs: "vm",
      templateUrl : "view/flota/siniestros.html?idLoad=205"
    })
    // Mantencion
    .when("/mantencion", {
      controller: "mantencionController",
      controllerAs: "vm",
      templateUrl : "view/flota/mantencion.html?idLoad=205"
    })
    // Rango Mantencion
    .when("/rango", {
      controller: "rangoMantencionController",
      controllerAs: "vm",
      templateUrl : "view/flota/rangoMantencion.html?idLoad=205"
    })
    // Listado Obras
    .when("/listadoObras", {
      controller: "listadoObrasController",
      controllerAs: "vm",
      templateUrl : "view/obras/listadoObras.html?idLoad=205"
    })
    // Contratos
    .when("/contratos", {
      controller: "contratosController",
      controllerAs: "vm",
      templateUrl : "view/obras/contratos.html?idLoad=205"
    })
    // Agencias
    .when("/agencias", {
      controller: "agenciasController",
      controllerAs: "vm",
      templateUrl : "view/obras/agencias.html?idLoad=205"
    })
    // Mantenedor especialidad
    .when("/mantenedorEspecialidad", {
      controller: "especialidadController",
      controllerAs: "vm",
      templateUrl : "view/obras/especialidad.html?idLoad=205"
    })
    // Mantenedor unidad de obra
    .when("/mantenedorUo", {
      controller: "unidadObraController",
      controllerAs: "vm",
      templateUrl : "view/logistica/unidadObra.html?idLoad=205"
    })
    // Mantenedor mano de obra
    .when("/mantenedorMo", {
      controller: "manoObraController",
      controllerAs: "vm",
      templateUrl : "view/obras/manoObra.html?idLoad=205"
    })
    // Mantenedor valor mano de obra
    .when("/mantenedorValorMo", {
      controller: "valorManoObraController",
      controllerAs: "vm",
      templateUrl : "view/obras/manoObraValor.html?idLoad=205"
    })
    // Listado Ordenes Trabajo
    .when("/OrdenesTrabajoObras", {
      controller: "listadoOrdenesTrabajoController",
      controllerAs: "vm",
      templateUrl : "view/obras/listadoOrdenesTrabajo.html?idLoad=205"
    })
    // Listado Solicitud Materiales Obra
    .when("/solicitudMateriales", {
      controller: "solicitudMatObrasController",
      controllerAs: "vm",
      templateUrl : "view/logistica/solicitudMaterialesObra.html?idLoad=205"
    })
    .when("/tarCombustible", {
        controller: "tarjetasCombustibleController",
        controllerAs: "vm",
        templateUrl : "view/flota/tarjetasCom.html?idLoad=205"
    })
    .when("/gestionJefatura", {
      controller: "jefaturaController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/gestionJefatura.html?idLoad=205"
    })
    .when("/orgCorporativo", {
      controller: "orgCorporativoController",
      controllerAs: "vm",
      templateUrl : "view/organigrama/corporativo.html?idLoad=205"
    })
    .when("/formularios", {
      controller: "formulariosController",
      controllerAs: "vm",
      templateUrl : "view/practicas/formularios.html?idLoad=205"
    })
    .when("/formulariosRealizados", {
      controller: "formulariosRealizadosController",
      controllerAs: "vm",
      templateUrl : "view/practicas/formulariosRealizados.html?idLoad=205"
    })
    .when("/notificaciones", {
      controller: "notificacionController",
      controllerAs: "vm",
      templateUrl : "view/cuenta/notificaciones.html?idLoad=205"
    })
    .when("/createPass2FA", {
      controller: "createPass2FAController",
      controllerAs: "vm",
      templateUrl : "view/cuenta/createPass2FA.html?idLoad=205"
    })
    .when("/changePass", {
        controller: "changePassController",
        controllerAs: "vm",
        templateUrl : "view/home/changePass.html?idLoad=205"
    })
    .when("/informesPracticaGlobal", {
        controller: "informesPracticaGlobalController",
        controllerAs: "vm",
        templateUrl : "view/practicas/informeGlobal.html?idLoad=205"
    })
    .when("/informesPracticaEvolucion", {
        controller: "informesPracticaEvolucionController",
        controllerAs: "vm",
        templateUrl : "view/practicas/informeEvolucion.html?idLoad=205"
    })
    .when("/personalExterno", {
        controller: "personalExternoController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/personalExterno.html?idLoad=205"
    })
    .when("/exPersonal", {
        controller: "exPersonalController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/exPersonal.html?idLoad=205"
    })
    .when("/subcontratistas", {
        controller: "subcontratistasController",
        controllerAs: "vm",
        templateUrl : "view/controlling/subcontratistas.html?idLoad=205"
    })
    .when("/capacitaciones", {
      controller: "capacitacionesController",
      controllerAs: "vm",
      templateUrl : "view/cuenta/capacitaciones.html?idLoad=205"
    })
    .when("/metaPractica", {
        controller: "metaPracticaController",
        controllerAs: "vm",
        templateUrl : "view/practicas/metaPracticas.html?idLoad=205"
    })
    .when("/informeDisponibilidad", {
        controller: "informeDisponibilidadController",
        controllerAs: "vm",
        templateUrl : "view/personal/informeDisponibilidad.html?idLoad=205"
    })
    .when("/informePracticaMetas", {
        controller: "informePracticaMetasController",
        controllerAs: "vm",
        templateUrl : "view/practicas/informePracticaMetas.html?idLoad=205"
    })
    .when("/nuevaIncidencia", {
      controller: "incidenciasController",
      controllerAs: "vm",
      templateUrl : "view/incidencias/incidencias.html?idLoad=205"
    })
    .when("/listadoIncidencia", {
      controller: "incidenciasAsignadasController",
      controllerAs: "vm",
      templateUrl : "view/incidencias/incidenciasAsignadas.html?idLoad=205"
    })
    .when("/configuracionIncidencia", {
      controller: "incidenciasConfiguracionController",
      controllerAs: "vm",
      templateUrl : "view/incidencias/incidenciasConfiguracion.html?idLoad=205"
    })
    .when("/informeFallasPractica", {
        controller: "informeFallasPracticaController",
        controllerAs: "vm",
        templateUrl : "view/practicas/informeFallaPractica.html?idLoad=205"
    })
    .when("/dash", {
        controller: "dashController",
        controllerAs: "vm",
        templateUrl : "view/practicas/dash.html?idLoad=205"
    })
    .when("/mantenedorZonasOrden", {
        controller: "mantenedorZonasOrdenController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/mantenedorZonas.html?idLoad=205"
    })
    .when("/ordenesHome", {
        controller: "ordenesController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/ordenes.html?idLoad=205"
    })
    .when("/lineaTiempo", {
        controller: "ordenesAsignadasController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/ordenesAsignadas.html?idLoad=205"
    })
    .when("/mantenedorTipoOrden", {
        controller: "mantenedorTipoOrdenController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/mantenedorTipo.html?idLoad=205"
    })
    .when("/mantenedorCategoriaOrden", {
        controller: "mantenedorCategoriaOrdenController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/mantenedorCategoria.html?idLoad=205"
    })
    .when("/mantenedorEstadosOrden", {
        controller: "mantenedorEstadosOrdenController",
        controllerAs: "vm",
        templateUrl : "view/ordenes/mantenedorEstados.html?idLoad=205"
    })
    .when("/mantenedorZonasObra", {
        controller: "mantenedorZonasObraController",
        controllerAs: "vm",
        templateUrl : "view/obras/mantenedorZonas.html?idLoad=205"
    })
    .when("/mantenedorFinancieras", {
      controller: "mantenedorFinancierasController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorFinancieras.html?idLoad=205"
    })
    .when("/mantenedorGestion", {
      controller: "mantenedorGestionController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorGestion.html?idLoad=205"
    })
    .when("/mantenedorMateriales", {
      controller: "mantenedorMaterialesController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorMateriales.html?idLoad=205"
    })
    .when("/mantenedorProveedores", {
      controller: "mantenedorProveedoresController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorProveedores.html?idLoad=205"
    })
    .when("/mantenedorServicios", {
      controller: "mantenedorServiciosController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorServicios.html?idLoad=205"
    })
    .when("/mantenedorPeticiones", {
      controller: "mantenedorPeticionesController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorPeticiones.html?idLoad=205"
    })
    .when("/solicitudCombustible", {
      controller: "solicitudCombustibleController",
      controllerAs: "vm",
      templateUrl : "view/flota/solicitudCombustible.html?idLoad=205"
    })
    .when("/mantenedorResponsables", {
      controller: "mantenedorResponsablesController",
      controllerAs: "vm",
      templateUrl : "view/compras/mantenedorResponsables.html?idLoad=205"
    })
    .when("/mantenedorPracticas", {
      controller: "mantenedorPracticasController",
      controllerAs: "vm",
      templateUrl : "view/practicas/mantenedorPracticas.html?idLoad=205"
    })
    .when("/mantenedorDiasObra", {
        controller: "mantenedorDiasObraController",
        controllerAs: "vm",
        templateUrl : "view/obras/mantenedorDiasObra.html?idLoad=205"
    })
    .when("/paises", {
        controller: "mantenedorPaisesController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/paises.html?idLoad=205"
    })
    .when("/areaFuncional", {
        controller: "mantenedorAreaFuncionalController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/areaFuncional.html?idLoad=205"
    })
    .when("/login", {
        controller: "loginController",
        controllerAs: "vm",
        templateUrl : "view/home/login.html?idLoad=205"
    })
    .when("/ticketCompras", {
        controller: "ticketComprasController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/ticketCompras.html?idLoad=205"
    })
    .when("/combustibleReporte", {
        controller: "combustibleReporteController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/combustible.html?idLoad=205"
    })
    .when("/flotaReporte", {
        controller: "flotaReporteController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/flota.html?idLoad=205"
    })
    .when("/proveedoresReporte", {
        controller: "proveedoresReporteController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/proveedores.html?idLoad=205"
    })
    .when("/cargosInformatica", {
        controller: "cargosInformaticaController",
        controllerAs: "vm",
        templateUrl : "view/informatica/mantenedorCargos.html?idLoad=205"
    })
    .when("/asignarCargoTI", {
        controller: "asignarCargoTIController",
        controllerAs: "vm",
        templateUrl : "view/informatica/asignarCargos.html?idLoad=205"
    })
    .when("/directorioProveedores", {
        controller: "directorioProveedoresController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/directorioProveedores.html?idLoad=205"
    })
    .when("/disponibilidadAsistencia", {
        controller: "disponibilidadAsistenciaController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/disponibilidad.html?idLoad=205"
    })
    .when("/finiquitosSolicitudes", {
        controller: "finiquitosSolicitudesController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/finiquitos.html?idLoad=205"
    })
    .when("/ticketMDA", {
        controller: "ticketMDAController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/ticketMDA.html?idLoad=205"
    })
    .when("/sgenDash", {
        controller: "sgenDashController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/sgen.html?idLoad=205"
    })
    .when("/gerencia", {
        controller: "gerenciaController",
        controllerAs: "vm",
        templateUrl : "view/controlling/gerencia.html?idLoad=205"
    })
    .when("/estadoProyecto", {
        controller: "estadoProyectoController",
        controllerAs: "vm",
        templateUrl : "view/controlling/estadoProyecto.html?idLoad=205"
    })
    .when("/clienteProyecto", {
        controller: "clienteController",
        controllerAs: "vm",
        templateUrl : "view/controlling/cliente.html?idLoad=205"
    })
    .when("/facturacionDash", {
        controller: "facturacionDashController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/facturacion.html?idLoad=205"
    })
    .when("/cxpDash", {
        controller: "cxpDashController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/cxpreporte.html?idLoad=205"
    })
    .when("/dotacionDash", {
        controller: "dotacionDashController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/dotacion.html?idLoad=205"
    })
    .when("/discrepanciaRRHH", {
        controller: "discrepanciaRRHHController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/discrepanciasRRHH.html?idLoad=205"
    })
    .when("/ticketMallPlaza", {
        controller: "ticketMallPlazaController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/ticketMallPlaza.html?idLoad=205"
    })
    .when("/PriorizacionMallPlaza", {
        controller: "PriorizacionMallPlazaController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/priorizacionMallPlaza.html?idLoad=205"
    })
    .when("/GeovictoriaSeguimiento", {
        controller: "GeovictoriaSeguimientoController",
        controllerAs: "vm",
        templateUrl : "view/reporteria/govictoriaSeguimiento.html?idLoad=205"
    })
    .when("/DBOProyecto", {
      controller: "DBOProyectoController",
      controllerAs: "vm",
      templateUrl : "view/reporteria/dboProyecto.html?idLoad=205"
    })
    .otherwise({redirectTo: '/home'});

    $locationProvider.hashPrefix('');
});

app.controller("changePassController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    setTimeout(function(){
      $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
      $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
      $('#modalAlertasSplash').modal('show');
    },200);
    var path = window.location.href.split('#/')[1];
    var parametros = {
      "path": path
    }
    $.ajax({
      url:   'controller/accesoCorrecto.php',
      type:  'post',
      data: parametros,
      success: function (response) {
        // console.log(response);
        if(response === "NO"){
          alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
          setTimeout(function(){
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            window.location.href = "?idLog=" + random + "#/login";
          },1500);
        }
        else if(response === "DESCONECTADO"){
            window.location.href = "#/home";
        }
        else{
          setTimeout(async function(){
              $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
              $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
              $('#modalAlertasSplash').modal('show');
              $('#contenido').show();
              $('#menu-lateral').show();
              $('#footer').parent().show();
              $('#footer').show();

              $("#guardarChangePass").css("width",$("#passNuevoConfirmar").width()+100);

              addCambiaPass();

              await esconderMenu();
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },2000);
              menuElegant();
          },200);
        }
      }
    });
});

app.controller("createPass2FAController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
            $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
            $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
            $('#modalAlertasSplash').modal('show');
            $('#contenido').show();
            $('#menu-lateral').show();
            $('#footer').parent().show();
            $('#footer').show();

            $("#optionFirmaLogin").prop("checked", false);
            $("#optionFirmaPDF").prop("checked", false);

            $.ajax({
              url:   'controller/datosUsuarioGA.php',
              type:  'post',
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if (p.aaData[0]['TOKEN_G_AT']) {
                  $('#codeGA').remove();
                  $('#validaCodeGA').remove();
                  $('#messageGA').show();
                  $('#optionsFirma').show();
                  $("#titleGA").remove();
                  $("#qrGA").remove();
                  $("#messageGAValid").remove();

                  if (p.aaData[0]['LOGIN_2FA'] === '1') {
                    $("#optionFirmaLogin").prop("checked", true);
                  }
                  if (p.aaData[0]['FIRMA_2FA'] === '1') {
                    $("#optionFirmaPDF").prop("checked", true);
                  }
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },2000);
                }
                else {
                  $('#messageGA').hide();
                  var url = window.location.origin;

                  $.ajax({
                    url:   'controller/datosTestGA.php',
                    type:  'post',
                    data:  {
                      "url": url
                    },
                    success: function (response) {
                      if(response != 'Error'){
                        $("#qrGA").attr("src",response);
                        $("#titleGA").css("display","inline");
                        $("#codeGA").css("display","inline");
                        $("#validaCodeGA").css("display","inline");
                        $("#messageGAValid").css("display","inline");
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },4000);
                      }
                    }
                  });
                }
              }
            });

            await esconderMenu();
            menuElegant();
        },200);
      }
    }
  });
});

app.controller("homeController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  if( !/AppMovil/i.test(navigator.userAgent) ) {
    $("#divRecordarDatosLogin").remove();
  }
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  setTimeout(async function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
      $('#contenido').show();
      $('#menu-lateral').show();

      var url = window.location.origin;

      $("#imgLlave").attr("src","controller/cargarLogo.php?url=" + url);

      await $.ajax({
        url:   'controller/datosImgTam.php',
        type:  'post',
        success: function (response) {
          var p = jQuery.parseJSON(response);
          if(p.aaData.length !== 0) {
            if(p.aaData[0].img_tam === 'v'){
              $("#imgLlave").css("height","100pt");
            }
            else{
              $("#imgLlave").css("width","200pt");
            }
          }
        }
      });

      await esconderMenu();
      $("#logoMenu").hide();
      // $('#menu-lateral').hover(function(){
      //     $("#menu-lateral").css("width","200px");
      // },
      // function() {
      //     $("#menu-lateral").css("width","45px");
      // });
      $("#loginSystem").show("slide", {direction: "up"}, 800);
      setTimeout(function(){
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          $('#footer').parent().show();
          $('#footer').show();
        },2000);
        menuElegant();
      },2000);
  },500);
});

app.controller("personalController", function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          $('#tablaPersonal').DataTable( {
              ajax: {
                  url: "controller/datosPersonal.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'DNI' } ,
                  { data: 'NOMBRE' },
                  { data: 'RUTA_IMG_PERFIL', className: "centerDataTable"},
                  { data: 'ESTADO_CONTROL', className: "centerDataTable"},
                  { data: 'ESTADO_GEO', className: "centerDataTable"},
                  { data: 'ESTADO_GESTPER', className: "centerDataTable"},
                  { data: 'ASIGNACION' },
                  { data: 'NIVEL', className: "centerDataTable"},
                  { data: 'AREA' },
                  { data: 'TURNO' },
                  { data: 'ENTRADA' },
                  { data: 'SALIDA' },
                  { data: 'PERMISO' },
                  { data: 'CARGO' },
                  { data: 'FECHA_INICIO_CONTRATO' , render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                  { data: 'CLASIFICACION' },
                  { data: 'CENTRO_COSTO' },
                  { data: 'GERENCIA' },
                  { data: 'SUBGERENCIA' },
                  { data: 'CLIENTE' },
                  { data: 'COMUNA' },
                  { data: 'REGION' },
                  { data: 'EMPRESA' },
                  { data: 'NOMBREJEFE' },
                  { data: 'CELULAR' },
                  { data: 'PATENTE' },
                  { data: 'SALDOVAC' },
                  { data: 'FECHANAC' },
                  { data: 'DNI2' },
                  { data: 'ESTADO_CONTROL2' },
                  { data: 'ESTADO_GEO2' },
                  { data: 'ESTADO_GESTPER2' },
                  { data: 'ASIGNACION2' },
                  { data: 'EMAIL' },
                  { data: 'RUTJEFEDIRECTO' },
                  { data: 'IDPERSONAL' }
              ],
              //
              buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 29,	6,	30,	31,	32,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27, 28],
                      format: {
                          body: function(data, row, column, node) {
                             return column == 12 ? data.replace( '.', '' ).replace( ',', '.' ) : data.replace('.','').replace(',','.');

                          }
                      }
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                },
                {
                  text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                  action: function ( e, dt, node, config ) {
                    var table = $('#tablaPersonal').DataTable();
                    $("#disponiblePersonal").attr("disabled","disabled");
            				$("#ausentePersonal").attr("disabled","disabled");
            				$("#transferirJefatura").attr("disabled","disabled");
            				$("#transferirJefaturaRespuesta").attr("disabled","disabled");
            				$("#solicitarJefaturaRespuesta").attr("disabled","disabled");
                    $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
                    table.rows().deselect();
                  }
                },
                {
                  text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosPersonal"></span>&nbsp;&nbsp;Filtros',
                  action: function(){
                    if($("#filtrosPersonal").height() > 100){
                      $("#filtrosPersonal").css("height","0");
                      $("#filtrosPersonal").fadeOut();
                      $("#spanButtonFiltrosPersonal").removeClass("fas fa-arrow-alt-circle-up");
                      $("#spanButtonFiltrosPersonal").addClass("fas fa-arrow-alt-circle-down");
                    }
                    else{
                      if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        $("#filtrosPersonal").css("height","270pt");
                      }
                      else{
                        $("#filtrosPersonal").css("height","730pt");
                      }
                      $("#filtrosPersonal").fadeIn();
                      $("#spanButtonFiltrosPersonal").removeClass("fas fa-arrow-alt-circle-down");
                      $("#spanButtonFiltrosPersonal").addClass("fas fa-arrow-alt-circle-up");
                      setTimeout(function(){
                        $('#infoInformePersonal').DataTable().columns.adjust();
                      },500);
                    }
                  }
                }
              ],
              fixedColumns:   {
                leftColumns: 2
              },
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 29 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 30 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 31 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 32 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 33 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 34 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 35 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 36 ]
                }
              ],
              "select": {
                  style: 'multi',
                  selector: 'td:not(:nth-child(2))'
              },
              "scrollX": true,
              // "responsive": {
              //     details: {
              //         renderer: function ( api, rowIdx, columns ) {
              //             var data = $.map( columns, function ( col, i ) {
              //                 return col.hidden ?
              //                     '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
              //                         '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
              //                         '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
              //                     '</tr>' :
              //                     '';
              //             } ).join('');
              //
              //             return data ?
              //                 $('<table/>').append( data ) :
              //                 false;
              //         }
              //     }
              // },
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 2, "asc" ]],
              "info": true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                  "zeroRecords": "No tiene personal bajo su cargo",
                  "info": "Registro _START_ de _END_ de _TOTAL_",
                  "infoEmpty": "No tiene personal bajo su cargo",
                  "paginate": {
                      "previous": "Anterior",
                      "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)",
                  "loadingRecords": "&nbsp;",
                  "processing": "Loading..."
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
                $('#modalAlertasSplash').modal('show');
                var table = $('#tablaPersonal').DataTable();

                var vac = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Vacaciones' ? true : false;
                });
                var lic = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Licencia' ? true : false;
                });
                var des = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Desvinculado' ? true : false;
                });
                var pre = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Presente' ? true : false;
                });
                var pre_in = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Presente Inducción' ? true : false;
                });
                var pre_tel = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Presente Teletrabajo' ? true : false;
                });
                var pre_in_tel = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Presente Inducción Teletrabajo' ? true : false;
                });
                var ren = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Renuncia' ? true : false;
                });
                var per = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Permiso' ? true : false;
                });
                var aus = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Ausente' ? true : false;
                });
                var sin = table
                    .column(30, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == 'Sin marca' ? true : false;
                });
                var total = table
                    .column(30, {search: 'applied'})
                    .data();
                var yo = table
                    .column(2, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value.includes('*') ? true : false;
                });
                var directos = table
                    .column(24, {search: 'applied'})
                    .data()
                    .filter( function ( value, index ) {
                        return value == yo[0].replace("*","") ? true : false;
                });

                if(typeof yo[0] !== 'undefined'){
                  $("#nombreUsuarioPersonal").val(yo[0].replace("*",""));
                }

                var boingFiltro = '';

                var tablaInf = $('#infoInformePersonal').DataTable( {
                  "select": {
                      style: 'single'
                  },
                  columnDefs: [
                    {
                        targets: 0,
                        className: 'leftDataTableCant'
                    },
                    {
                        targets: 1,
                        className: 'centerDataTableCant'
                    }
                  ],
                  "scrollX": true,
                  "paging": false,
                  "searching": false,
                  "ordering": false,
                  "scrollCollapse": true,
                  "order": [[ 0, "asc" ]],
                  "info": true,
                  "dom": 'frtp',
                  "destroy": true,
                  "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                      },
                      "search": "Buscar: ",
                      "select": {
                          "rows": "- %d registros seleccionados"
                      },
                      "infoFiltered": "(Filtrado de _MAX_ registros)"
                  },
                  "destroy": true,
                  "autoWidth": false,
                  "initComplete": async function( settings, json){
                    $(this.api().column(1).footer()).html(total.count());
                    await esconderMenu();
                    setTimeout(function(){
                      setTimeout(function(){
                        setTimeout(function(){
                          $("#filtrosPersonal").css("height","0");
                          $("#filtrosPersonal").fadeOut();
                          setTimeout(function(){
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #8b00ff; font-size: 10pt;"></b>&nbsp;&nbsp;Vacaciones', vac.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #0165ff; font-size: 10pt;"></b>&nbsp;&nbsp;Licencia', lic.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #black; font-size: 10pt;"></b>&nbsp;&nbsp;Desvinculado', des.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente', pre.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente inducción', pre_in.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente Teletrabajo', pre_tel.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente inducción Teletrabajo', pre_in_tel.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #black; font-size: 10pt;"></b>&nbsp;&nbsp;Renuncia', ren.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #fff038; font-size: 10pt;"></b>&nbsp;&nbsp;Permiso', per.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #ffae20; font-size: 10pt;"></b>&nbsp;&nbsp;Ausente', aus.count()]);
                            tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #dedede; font-size: 10pt;"></b>&nbsp;&nbsp;Sin marca', sin.count()]);
                            tablaInf.draw();

                            if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                              $("#datoSubordinadosDirectos").css("margin-top","20pt");
                            }
                            else{
                              $("#datoSubordinadosDirectos").css("margin-top","5pt");
                            }

                            $("#qDirectos").html(directos.count());
                            $("#qOtros").html(total.count() - directos.count());

                            var manoPersonal = '';
                            manoPersonal += '<option selected value="Todos">Todos</option>';
                            for(var i = 0; i < table.column(16).data().unique().length; i++){
                              if(table.column(16).data().unique()[i] !== null){
                                manoPersonal += '<option value="' + table.column(16).data().unique()[i] + '">' + table.column(16).data().unique()[i] + '</option>';
                              }
                            }
                            $("#manoPersonal").html(manoPersonal);

                            var cecoPersonal = '';
                            cecoPersonal += '<option selected value="Todos">Todos</option>';
                            for(var i = 0; i < table.column(17).data().unique().length; i++){
                              if(table.column(17).data().unique()[i] !== null){
                                cecoPersonal += '<option value="' + table.column(17).data().unique()[i] + '">' + table.column(17).data().unique()[i] + '</option>';
                              }
                            }
                            $("#cecoPersonal").html(cecoPersonal);

                            var estadoPersonal = '';
                            estadoPersonal += '<option selected value="Todos">Todos</option>';
                            for(var i = 0; i < table.column(32).data().unique().length; i++){
                              if(table.column(32).data().unique()[i] !== null){
                                estadoPersonal += '<option value="' + table.column(32).data().unique()[i] + '">' + table.column(32).data().unique()[i] + '</option>';
                              }
                            }
                            $("#estadoPersonal").html(estadoPersonal);

                            var controlPersonal = '';
                            controlPersonal += '<option selected value="Todos">Todos</option>';
                            for(var i = 0; i < table.column(30).data().unique().length; i++){
                              if(table.column(30).data().unique()[i] !== null){
                                controlPersonal += '<option value="' + table.column(30).data().unique()[i] + '">' + table.column(30).data().unique()[i] + '</option>';
                              }
                            }
                            $("#controlPersonal").html(controlPersonal);

                            if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                              $("#manoPersonal").select2({
                                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                              });
                              $("#cecoPersonal").select2({
                                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                              });
                              $("#estadoPersonal").select2({
                                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                              });
                              $("#controlPersonal").select2({
                                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                              });
                            }

                            $('#contenido').show();
                            $('#menu-lateral').show();
                            $('#footer').parent().show();
                            $('#footer').show();

                            setTimeout(function(){
                              setTimeout(function(){
                                $("#spanButtonFiltrosPersonal").click();
                                setTimeout(function(){
                                  $('#modalAlertasSplash').modal('hide');
                                  setTimeout(function(){
                                    $('#tablaPersonal').DataTable().columns.adjust();
                                    $('#infoInformePersonal').DataTable().columns.adjust();
                                  },500);
                                },200);
                              },100);
                            },100);
                          },100);
                        },100);
                      },100);
                      menuElegant();
                    },100);
                  }
                });

                setTimeout(async function(){
                  await $.ajax({
                    url:   'controller/datosNotificacionesUsuario.php',
                    type:  'post',
                    success: function (response2) {
                      var p2 = jQuery.parseJSON(response2);
                      if(p2.aaData.length !== 0){
                        for(var i = 0; i < p2.aaData.length; i++){
                          var url = p2.aaData[i].URL;
                          toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": false,
                            // "onclick": function() {
                            //   var random = Math.round(Math.random() * (1000000 - 1) + 1);
                            //   window.location.href = "?idLog=" + random + url;
                            // },
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "10000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp"
                          }
                          toastr["info"](p2.aaData[i].NOTIFICACION + "<br><br><i style='font-size: 8pt;'>Hora: " + p2.aaData[i].FECHA + " " + p2.aaData[i].HORA + "</i>");
                        }
                      }
                    }
                  });
                  $('#alertNotTransferAllow').hide();
                },3000);
              }
          });
        },200);

        personalPropio = setInterval(async function(){
          var table = $('#tablaPersonal').DataTable();
          table.ajax.reload();
        },300000);
      }
    }
  });
});

app.controller("personalInternoController", function(){
    clearInterval(lineaTiempo);
    clearInterval(personalPropio);
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    setTimeout(function(){
      $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
      $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
      $('#modalAlertasSplash').modal('show');
    },200);

    var path = window.location.href.split('#/')[1];
    var parametros = {
      "path": path
    }
    $.ajax({
      url:   'controller/accesoCorrecto.php',
      type:  'post',
      data: parametros,
      success: function (response) {
        // console.log(response);
        if(response === "NO"){
          alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
          setTimeout(function(){
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            window.location.href = "?idLog=" + random + "#/login";
          },1500);
        }
        else if(response === "DESCONECTADO"){
            window.location.href = "#/home";
        }
        else{
          setTimeout(async function(){
            $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
            $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
            $('#modalAlertasSplash').modal('show');
            var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

            if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
              $("#manoPersonalInterno").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
              $("#cecoPersonalInterno").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
              $("#estadoPersonalInterno").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
            }
            await $('#tablaPersonalInterno').DataTable( {
                ajax: {
                    url: "controller/datosPersonalInterno.php",
                    type: 'POST'
                },
                columns: [
                    { data: 'S'},
                    { data: 'RUTA_IMG_PERFIL', className: "centerDataTable"},
                    { data: 'DNI' } ,
                    { data: 'NOMBRE' },
                    { data: 'NIVEL', className: "centerDataTable"},
                    { data: 'AREA' },
                    { data: 'TAM' , className: "centerDataTable"},
                    { data: 'TPM' , className: "centerDataTable"},
                    { data: 'TURNO' },
                    { data: 'ESTADO_CONTROL', className: "centerDataTable"},
                    { data: 'ESTADO_GEO', className: "centerDataTable"},
                    { data: 'ESTADO_GESTPER', className: "centerDataTable"},
                    { data: 'ASIGNACION' },
                    { data: 'ENTRADA' },
                    { data: 'SALIDA' },
                    { data: 'PERMISO' },
                    { data: 'CARGO' },
                    { data: 'FECHA_INICIO_CONTRATO' , render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                    { data: 'CLASIFICACION' },
                    { data: 'CENTRO_COSTO' },
                    { data: 'SERVICIO' },
                    { data: 'CLIENTE' },
                    { data: 'ACTIVIDAD' },
                    { data: 'COMUNA' },
                    { data: 'REGION' },
                    { data: 'EMPRESA' },
                    { data: 'NOMBREJEFE' },
                    { data: 'CARGOS' },
                    { data: 'SALDOVAC' },
                    { data: 'FECHANAC' },
                    { data: 'DNI2' },
                    { data: 'ESTADO_CONTROL2' },
                    { data: 'ESTADO_GEO2' },
                    { data: 'ESTADO_GESTPER2' },
                    { data: 'ASIGNACION2' }
                ],
                //
                buttons: [
                  {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 2,3,4,5,6,7,8,31,32,33,34,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
                        format: {
                            body: function(data, row, column, node) {
                               return column == 13 ? data.replace( '.', '' ).replace( ',', '.' ) : data.replace('.','').replace(',','.');

                            }
                        }
                      },
                      title: null,
                      text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaPersonalInterno').DataTable();
                      $("#estadoPersonalInternoB").attr("disabled","disabled");
                      $("#liquidacionPersonalInterno").attr("disabled","disabled");
              				$("#remuneracionPersonalInterno").attr("disabled","disabled");
              				$("#cargasPersonalInterno").attr("disabled","disabled");
              				$("#editarPersonalInterno").attr("disabled","disabled");
              				$("#imagenPersonalInterno").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  }
                ],
                "columnDefs": [
                  {
                    "width": "5px",
                    "targets": 0
                  },
                  {
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets": [ 0 ]
                  },
                  {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 30 ]
                  },
                  {
                    "visible": false,
                    "searchable": true,
                    "targets": [ 31 ]
                  },
                  {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 32 ]
                  },
                  {
                    "visible": false,
                    "searchable": true,
                    "targets": [ 33 ]
                  },
                  {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 34 ]
                  }
                ],
                "select": {
                  style: 'single',
                  selector: 'td:not(:nth-child(2))'
                },
                "scrollX": true,
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                // "order": [[ 3, "asc" ]],
                "info":     true,
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                    "zeroRecords": "No tiene personal bajo su cargo",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No tiene personal bajo su cargo",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    "select": {
                        "rows": "- %d registros seleccionados"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function(){
                  var table = $('#tablaPersonalInterno').DataTable();

                  var manoPersonal = '';
                  manoPersonal += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(18).data().unique().length; i++){
                    if(table.column(18).data().unique()[i] !== null){
                      manoPersonal += '<option value="' + table.column(18).data().unique()[i] + '">' + table.column(18).data().unique()[i] + '</option>';
                    }
                  }
                  $("#manoPersonalInterno").html(manoPersonal);

                  var cecoPersonal = '';
                  cecoPersonal += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(19).data().unique().length; i++){
                    if(table.column(19).data().unique()[i] !== null){
                      cecoPersonal += '<option value="' + table.column(19).data().unique()[i] + '">' + table.column(19).data().unique()[i] + '</option>';
                    }
                  }
                  $("#cecoPersonalInterno").html(cecoPersonal);

                  var estadoPersonal = '';
                  estadoPersonal += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(33).data().unique().length; i++){
                    if(table.column(33).data().unique()[i] !== null){
                      estadoPersonal += '<option value="' + table.column(33).data().unique()[i] + '">' + table.column(33).data().unique()[i] + '</option>';
                    }
                  }
                  $("#estadoPersonalInterno").html(estadoPersonal);

                  var controlPersonal = '';
                  controlPersonal += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(31).data().unique().length; i++){
                    if(table.column(31).data().unique()[i] !== null){
                      controlPersonal += '<option value="' + table.column(31).data().unique()[i] + '">' + table.column(31).data().unique()[i] + '</option>';
                    }
                  }
                  $("#controlPersonalInterno").html(controlPersonal);

                  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $("#manoPersonalInterno").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#cecoPersonalInterno").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#estadoPersonalInterno").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#controlPersonalInterno").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                  }

                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
                  $('#footer').show();
                  $('#tablaPersonalInterno').DataTable().columns.adjust();

                  setTimeout(function(){
                    var path = window.location.href.split('#/')[1];
                    var parametros = {
                      "path": path
                    }

                    setTimeout(async function(){
                      await $.ajax({
                        url:   'controller/datosAccionesVisibles.php',
                        type:  'post',
                        data: parametros,
                        success: function (response) {
                          var p = jQuery.parseJSON(response);
                          if(p.aaData.length !== 0){
                            for(var i = 0; i < p.aaData.length; i++) {
                              if(p.aaData[i].VISIBLE == 1){
                                if(p.aaData[i].ENABLE == 1){
                                  $("#accionesPersonalInterno").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                }
                                else{
                                  $("#accionesPersonalInterno").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                }
                              }
                            }
                          }
                        }
                      });

                      setTimeout(function(){
                        var js = document.createElement('script');
                        js.src = 'view/js/funciones.js?idLoad=205';
                        document.getElementsByTagName('head')[0].appendChild(js);
                      },500);
                    },100);
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },2000);
                  },1000);
                  menuElegant();
                }
            });
            await esconderMenu();
          },200);
        }
      }
    });
});

app.controller("usuariosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaListadoUsuarios').DataTable( {
              ajax: {
                  url: "controller/datosUsuarios.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUT' } ,
                  { data: 'NOMBRE' },
                  { data: 'EMAIL'},
                  { data: 'PERFIL' },
                  { data: 'ESTADO' }
              ],
              /*rowReorder: {
                selector: 'td:nth-child(2)'
              },*/

              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                /*{
                  "visible": false,
                  "searchable": false,
                  "targets": [ 29 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 30 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 31 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 32 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 33 ]
                }*/
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              // "order": [[ 3, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                setTimeout(function(){
                  var path = window.location.href.split('#/')[1];
                  var parametros = {
                    "path": path
                  }

                  setTimeout(async function(){
                    await $.ajax({
                      url:   'controller/datosAccionesVisibles.php',
                      type:  'post',
                      data: parametros,
                      success: function (response) {
                        var p = jQuery.parseJSON(response);
                        if(p.aaData.length !== 0){
                          for(var i = 0; i < p.aaData.length; i++) {
                            if(p.aaData[i].VISIBLE == 1){
                              if(p.aaData[i].ENABLE == 1){
                                $("#accionesUsuarios").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                              else{
                                $("#accionesUsuarios").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                            }
                          }
                        }
                      }
                    });

                    setTimeout(function(){
                      var js = document.createElement('script');
                      js.src = 'view/js/funciones.js?idLoad=205';
                      document.getElementsByTagName('head')[0].appendChild(js);
                    },500);
                  },100);
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaListadoUsuarios').DataTable().columns.adjust();
                    },500);
                  },2000);
                },1000);
                menuElegant();
              }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("conceptosRemuneracionesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
            $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
            $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
            $('#modalAlertasSplash').modal('show');
            var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
            await $('#tablaListadoComponenteRemuneracion').DataTable( {
                ajax: {
                    url: "controller/datosComponenteRemuneracion.php",
                    type: 'POST'
                },
                columns: [
                    { data: 'S'},
                    { data: 'CONCEPTO' },
                    { data: 'TIPO' },
                    { data: 'LIQUIDACION' },
                    { data: 'ORDEN', className: "centerDataTable"},
                ],
                /*rowReorder: {
                    selector: 'td:nth-child(2)'
                },*/
                //

                buttons: [
                    {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 1,2,3,4 ]
                      },
                      title: null,
                      text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                    }
                ],
                "columnDefs": [
                    {
                      "width": "5px",
                      "targets": 0
                    },
                    {
                      "orderable": false,
                      "className": 'select-checkbox',
                      "targets": [ 0 ]
                    },
                    {
                      "visible": false,
                      "searchable": false,
                      "targets": [ 2 ]
                    }
                    /*{
                    "visible": false,
                    "searchable": false,
                    "targets": [ 30 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 31 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 32 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 33 ]
                    }*/
                ],
                // "select": {
                //     style: 'multi'
                // },
                "scrollX": true,
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                // "order": [[ 3, "asc" ]],
                "info":     true,
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    // "select": {
                    //     "rows": "- %d registros seleccionados"
                    // },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json){
                    $('#contenido').show();
                    $('#menu-lateral').show();
                    $('#footer').parent().show();
$('#footer').show();


                    setTimeout(function(){
                      var path = window.location.href.split('#/')[1];
                      var parametros = {
                        "path": path
                      }

                      setTimeout(async function(){
                        await $.ajax({
                          url:   'controller/datosAccionesVisibles.php',
                          type:  'post',
                          data: parametros,
                          success: function (response) {
                            var p = jQuery.parseJSON(response);
                            if(p.aaData.length !== 0){
                              for(var i = 0; i < p.aaData.length; i++) {
                                if(p.aaData[i].VISIBLE == 1){
                                  if(p.aaData[i].ENABLE == 1){
                                    $("#accionesCompRemuneracion").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                  }
                                  else{
                                    $("#accionesCompRemuneracion").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                  }
                                }
                              }
                            }
                          }
                        });

                        setTimeout(function(){
                          var js = document.createElement('script');
                          js.src = 'view/js/funciones.js?idLoad=205';
                          document.getElementsByTagName('head')[0].appendChild(js);
                        },500);
                      },100);
                      setTimeout(function(){
                        $('#modalAlertasSplash').modal('hide');
                        setTimeout(function(){
                          $('#tablaListadoComponenteRemuneracion').DataTable().columns.adjust();
                        },500);
                      },2000);
                    },1000);
                    menuElegant();
                }
            });
            await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("sindicatosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
            var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
            await $('#tablaListadoSindicato').DataTable( {
                ajax: {
                    url: "controller/datosSindicato.php",
                    type: 'POST'
                },
                columns: [
                    { data: 'S'},
                    { data: 'SINDICATO' },
                    { data: 'DESCRIPCION' },
                ],
                /*rowReorder: {
                    selector: 'td:nth-child(2)'
                },*/
                //

                buttons: [
                    {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 1,2 ]
                      },
                      title: null,
                      text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                    }
                ],
                "columnDefs": [
                    {
                      "width": "5px",
                      "targets": 0
                    },
                    {
                      "orderable": false,
                      "className": 'select-checkbox',
                      "targets": [ 0 ]
                    }
                    /*{
                    "visible": false,
                    "searchable": false,
                    "targets": [ 29 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 30 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 31 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 32 ]
                    },
                    {
                    "visible": false,
                    "searchable": false,
                    "targets": [ 33 ]
                    }*/
                ],
                // "select": {
                //     style: 'multi'
                // },
                "scrollX": true,
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                // "order": [[ 3, "asc" ]],
                "info":     true,
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    // "select": {
                    //     "rows": "- %d registros seleccionados"
                    // },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json){
                    $('#contenido').show();
                    $('#menu-lateral').show();
                    $('#footer').parent().show();
                    $('#footer').show();
                }
            });
            await esconderMenu();
            setTimeout(function(){
              var path = window.location.href.split('#/')[1];
              var parametros = {
                "path": path
              }

              setTimeout(async function(){
                await $.ajax({
                  url:   'controller/datosAccionesVisibles.php',
                  type:  'post',
                  data: parametros,
                  success: function (response) {
                    var p = jQuery.parseJSON(response);
                    if(p.aaData.length !== 0){
                      for(var i = 0; i < p.aaData.length; i++) {
                        if(p.aaData[i].VISIBLE == 1){
                          if(p.aaData[i].ENABLE == 1){
                            $("#accionesSindicato").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                          }
                          else{
                            $("#accionesSindicato").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                          }
                        }
                      }
                    }
                  }
                });

                setTimeout(function(){
                  var js = document.createElement('script');
                  js.src = 'view/js/funciones.js?idLoad=205';
                  document.getElementsByTagName('head')[0].appendChild(js);
                },500);
              },100);
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                setTimeout(function(){
                  $('#tablaListadoSindicato').DataTable().columns.adjust();
                },500);
              },2000);
            },1000);
            menuElegant();
        },200);
      }
    }
  });
});

app.controller("perfilesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaListadoPerfiles').DataTable( {
              ajax: {
                  url: "controller/datosListaPerfiles.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'NOMBRE' },
                  { data: 'IDPERFIL' },
                  { data: 'NRO_PERMISOS' },
                  { data: 'ASIGNACION' },
                  { data: 'DESCRIPCION' },
                  { data: 'INFOR_DISP' },
                  { data: 'INFOR_META' }
              ],
              /*rowReorder: {
                selector: 'td:nth-child(2)'
              },*/
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,4,5 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 2 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 3 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 6 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 7 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              // "order": [[ 3, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(function(){
                  setTimeout(function(){
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                      setTimeout(function(){
                        $('#tablaListadoPerfiles').DataTable().columns.adjust();
                      },500);
                    },2000);
                  },1000);
                  menuElegant();
                },500);
              }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("logoutController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $.ajax({
      url:   'controller/cerraSesion.php',
      type:  'post',
      success: function (response) {
        $(".contenedor-logos").css("display","none");
        $(".contenedor-logos").find('li').css("display","none");
        $("#sesionActiva").val("0");
        $("#sesionActivaUso").val("0");
        $("#logoLinkWeb").hide();
        $("#logoMenu").hide();
        $("#lineaMenu").hide();
        $("#iconoLogoMenu").attr("class","imgMenu fas fas fa-bars");
        $("#menu-lateral").css("width","45px");
        $("#menu-lateral").css("background","rgba(30, 0, 0, 0.0)");
        $("#logoMenu").css("color","black");
        $("#iconoLogoMenu").css("border","1px solid #b5b5b5");
        $("#iconoLogoMenu").css("background","rgba(255, 255, 255, 1.0)");
        $("#DivPrincipalMenu").empty();
        localStorage.clear();
        window.location.href = "#/home";
      }
  });
});

app.controller("proyectosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
            var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/24);
            await $('#tablaListadoProyecto').DataTable( {
                ajax: {
                    url: "controller/datosEstructuraOperacionSide.php",
                    type: 'POST'
                },
                processing: true,
                search: {
                    return: true,
                },
                serverSide: true,
                columns: [
                    { data: 'S'},
                    { data: 'FOLIO' , className: "centerDataTable" },
                    { data: 'PEP_PADRE' },
                    { data: 'PEP' },
                    { data: 'COD_CRM' },
                    { data: 'NOMBRE_PADRE' },
                    { data: 'NOMBRE' },
                    { data: 'COD_SOCIEDAD' , className: "centerDataTable" },
                    { data: 'NOM_SOCIEDAD' },
                    { data: 'CLIENTE' },
                    { data: 'SUB_CLIENTE' },
                    { data: 'ESTADO' },
                    { data: 'GERENCIA' },
                    { data: 'SUBGERENCIA' },
                    { data: 'GERENTE' },
                    { data: 'SUBGERENTE' },
                    { data: 'ADMIN_CONTRATO' },
                    { data: 'CONTROLLER' },
                    { data: 'FECHA_INICIO_CONTRATO' },
                    { data: 'FECHA_FIN_CONTRATO' },
                    { data: 'FECHA_INICIO_OPERACION' },
                    { data: 'FECHA_FIN_OPERACION' },
                    { data: 'Q_PERSONAL' , className: "centerDataTable" },
                ],
                buttons: [
                    {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22 ]
                      },
                      title: null,
                      text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                    },
                    {
                      text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                      action: function ( e, dt, node, config ) {
                        var table = $('#tablaListadoProyecto').DataTable();
                        $("#editarProyecto").attr("disabled", "disabled");
                        table.rows().deselect();
                      }
                    }
                ],
                "columnDefs": [
                    {
                      "width": "5px",
                      "targets": 0
                    },
                    // {
                    //   "orderable": false,
                    //   "className": 'select-checkbox',
                    //   "targets": [ 0 ]
                    // }
                ],
                "select": {
                    style: 'single'
                },
                "scrollX": false,
                "responsive": {
                    details: {
                        renderer: function ( api, rowIdx, columns ) {
                            var data = $.map( columns, function ( col, i ) {
                                return col.hidden ?
                                    '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                        '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                        '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                    '</tr>' :
                                    '';
                            } ).join('');

                            return data ?
                                $('<table/>').append( data ) :
                                false;
                        }
                    }
                },
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                "order": [[ 1, "asc" ]],
                "info":     true,
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    "searchPlaceholder": "Presione enter para buscar",
                    "select": {
                        "rows": "- %d registros seleccionados"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json){

                }
            });
            await esconderMenu();
            setTimeout(async function(){
              var path = window.location.href.split('#/')[1];
              var parametros = {
                "path": path
              }

              await $.ajax({
                url:   'controller/datosAccionesVisibles.php',
                type:  'post',
                data: parametros,
                success: function (response) {
                  var p = jQuery.parseJSON(response);
                  if(p.aaData.length !== 0){
                    for(var i = 0; i < p.aaData.length; i++) {
                      if(p.aaData[i].VISIBLE == 1){
                        if(p.aaData[i].ENABLE == 1){
                          $("#accionesProyectos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                        else{
                          $("#accionesProyectos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                      }
                    }
                  }
                }
              });

              setTimeout(function(){
                var js = document.createElement('script');
                js.src = 'view/js/funciones.js?idLoad=205';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);

              $('#contenido').show();
              $('#menu-lateral').show();
              $('#footer').parent().show();
              $('#footer').show();

              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                setTimeout(function(){
                  $('#tablaListadoProyecto').DataTable().columns.adjust();
                },500);
              },2000);
            },1000);
            menuElegant();
        },200);
      }
    }
  });
});

app.controller("tarjetasCombustibleController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/40);
          var parametros = {
            "path": path
          }
          var tableTarjetas = await $('#tablaTarjetaCombustible').DataTable( {
            ajax: {
                url: "controller/datosTarjetasCom.php",
                type: 'POST',
                data: parametros
            },
            columns: [
                { data: 'S'},
                { data: 'NUMERO' },
                { data: 'ESTADO_COLOR' },
                { data: 'PRODUCTO', className: "centerDataTable" },
                { data: 'TIPO' },
                { data: 'PATENTE' },
                { data: 'SALDO_INICIAL' , render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                { data: 'DEVOLUCION' , render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                { data: 'ABONO' , render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                { data: 'CONSUMO' , render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                { data: 'SALDO' , render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                { data: 'DNI' },
                { data: 'USUARIO_ASIGNADO' },
                { data: 'ESTADO_CONTROL', className: "centerDataTable" },
                { data: 'ESTADO_GEO', className: "centerDataTable"  },
                { data: 'ESTADO_GESTPER', className: "centerDataTable"  },
                { data: 'SERVICIO' },
                { data: 'CLIENTE' },
                { data: 'ACTIVIDAD' },
                { data: 'BODEGA' },
                { data: 'ESTADO' },
                { data: 'ESTADO_CONTROL2' },
                { data: 'ESTADO_GEO2' },
                { data: 'ESTADO_GESTPER2' }
            ],
            /*rowReorder: {
              selector: 'td:nth-child(2)'
            },*/
            fixedColumns:   {
              leftColumns: 5
            },
            buttons: [
              {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,19,3,4,5,6,7,8,9,10,11,19,20,21,15,16,17,18,19],
                    format: {
                        body: function(data, row, column, node) {
                           return column == 15 ? data.replace( '$ ', '' ) : data.replace('$ ','');
                        }
                    }
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              },
              {
                text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                action: function ( e, dt, node, config ) {
                  var table = $('#tablaTarjetaCombustible').DataTable();
                  $("#asignarTarjetaCombustible").attr("disabled","disabled");
        					$("#desasignarTarjetaCombustible").attr("disabled","disabled");
        					$("#editarTarjetaCombustible").attr("disabled","disabled");
        					$("#solicitarTarjetaCombustible").attr("disabled","disabled");
        					$("#devolucionTarjetaCombustible").attr("disabled","disabled");
                  table.rows().deselect();
                }
              },
              {
                text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosTarjetaCombustible"></span>&nbsp;&nbsp;Filtros',
                action: function(){
                  if($("#filtrosTarjetaCombustible").height() > 100){
                    $("#filtrosTarjetaCombustible").css("height","0");
                    $("#filtrosTarjetaCombustible").fadeOut();
                    $("#spanButtonFiltrosTarjetaCombustible").removeClass("fas fa-arrow-alt-circle-up");
                    $("#spanButtonFiltrosTarjetaCombustible").addClass("fas fa-arrow-alt-circle-down");
                  }
                  else{
                    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                      $("#filtrosTarjetaCombustible").css("height","210pt");
                    }
                    else{
                      $("#filtrosTarjetaCombustible").css("height","400pt");
                    }
                    $("#filtrosTarjetaCombustible").fadeIn();
                    $("#spanButtonFiltrosTarjetaCombustible").removeClass("fas fa-arrow-alt-circle-down");
                    $("#spanButtonFiltrosTarjetaCombustible").addClass("fas fa-arrow-alt-circle-up");
                  }
                }
              }
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              // {
              //   "orderable": false,
              //   "className": 'select-checkbox',
              //   "targets": [ 0 ]
              // },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 20 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 21 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 22 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 23 ]
              }
            ],
            "select": {
                style: 'single'
            },
            "scrollX": false,
            "responsive": {
                details: {
                    renderer: function ( api, rowIdx, columns ) {
                        var data = $.map( columns, function ( col, i ) {
                            return col.hidden ?
                                '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                    '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                    '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                '</tr>' :
                                '';
                        } ).join('');

                        return data ?
                            $('<table/>').append( data ) :
                            false;
                    }
                }
            },
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            // "order": [[ 3, "asc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
              "zeroRecords": "No hay datos disponibles",
              "info": "Registro _START_ de _END_ de _TOTAL_",
              "infoEmpty": "No hay datos disponibles",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Siguiente"
              },
              "search": "Buscar: ",
              "select": {
                  "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                setTimeout(function(){
                  setTimeout(function(){
                    $("#filtrosTarjetaCombustible").css("height","0");
                    $("#filtrosTarjetaCombustible").fadeOut();
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $("#spanButtonFiltrosTarjetaCombustible").click();
                    },100);
                    setTimeout(function(){
                      $('#tablaTarjetaCombustible').DataTable().columns.adjust();
                    },500);
                  },2000);
                  menuElegant();
                },300);
              }
          });

          tableTarjetas.on( 'search.dt', function () {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChartTarjetaMov);

            async function drawChartTarjetaMov() {
              //Gráfica 1
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Tipo');
              data.addColumn('number', 'Monto');
              data.addColumn({type:'string', role:'annotation'});

              var tableTar = $('#tablaTarjetaCombustible').DataTable();
              var datosTar = tableTar.rows({search:'applied'}).data();

              var devolucion = 0;
              var asignacion = 0;
              var consumo = 0;
              var saldo = 0;

              for(var k = 0; k < datosTar.length; k++){
                if(datosTar[k].DEVOLUCION === null){
                  devolucion += 0;
                }
                else{
                  devolucion += parseInt(datosTar[k].DEVOLUCION.replace("$ ","").replace(",","").replace(".","").replace(".","").replace(".",""));
                }
                if(datosTar[k].SALDO === null){
                  saldo += 0;
                }
                else{
                  saldo += parseInt(datosTar[k].SALDO.replace("$ ","").replace(",","").replace(".","").replace(".","").replace(".",""));
                }
                if(datosTar[k].CONSUMO === null){
                  consumo += 0;
                }
                else{
                  consumo += parseInt(datosTar[k].CONSUMO.replace("$ ","").replace(",","").replace(".","").replace(".","").replace(".",""));
                }
                if(datosTar[k].ABONO === null){
                  asignacion += 0;
                }
                else{
                  asignacion += parseInt(datosTar[k].ABONO.replace("$ ","").replace(",","").replace(".","").replace(".","").replace(".",""));
                }
              }

              var max = 0;
              if(max < -1*devolucion){
                max = devolucion*-1;
              }
              if(max < asignacion){
                max = asignacion;
              }
              if(max < consumo){
                max = consumo;
              }
              if(max < saldo){
                max = saldo;
              }

              max = max + max*0.25;
              var min = devolucion + devolucion*0.25;

              data.addRow(['Devolución', devolucion, accounting.formatMoney(devolucion, "$ ", 0)]);
              data.addRow(['Asignación', asignacion, accounting.formatMoney(asignacion, "$ ", 0)]);
              data.addRow(['Consumo', consumo, accounting.formatMoney(consumo, "$ ", 0)]);
              data.addRow(['Saldo', saldo, accounting.formatMoney(saldo, "$ ", 0)]);

              var w = $(window).width()/3;

              var options = {
                height: '100%',
                width: '100%',
                chartArea: {
                  // left: 150,
                  top: 0,
                  bottom: 20,
                  // width: '70%',
                  // height: '100%'
                },
                annotations: {
                  textStyle: {
                    fontSize: 10,
                    bold: true
                  }
                },
                legend: {
                  position: "none"
                },
                hAxis : {
                  textStyle : {
                    fontSize: 11 // or the number you want
                  },
                  viewWindow: {
                      min: min,
                      max: max
                  }
                }
              };

              var chart = new google.visualization.BarChart(document.getElementById('graficaMovimientosMontos'));

              //Gráfica 2
              var data2 = new google.visualization.DataTable();
              data2.addColumn('string', 'Tipo');
              data2.addColumn('number', 'Cantidad');
              data2.addColumn({type:'string', role:'annotation'});

              var asignada = 0;
              var disponible = 0;
              var backup = 0;
              var eliminada = 0;
              var bloqueada = 0;

              for(var k = 0; k < datosTar.length; k++){
                if(datosTar[k].ESTADO === 'Asignada'){
                  asignada++;
                }
                else if(datosTar[k].ESTADO === 'Disponible'){
                  disponible++;
                }
                else if(datosTar[k].ESTADO === 'Backup'){
                  backup++;
                }
                else if(datosTar[k].ESTADO === 'eliminada'){
                  eliminada++;
                }
                else if(datosTar[k].ESTADO === 'Bloqueada'){
                  bloqueada++;
                }
              }

              var max2 = 0;
              if(max2 < asignada){
                max2 = asignada;
              }
              if(max2 < disponible){
                max2 = disponible;
              }
              if(max2 < backup){
                max2 = backup;
              }
              if(max2 < eliminada){
                max2 = eliminada;
              }
              if(max2 < bloqueada){
                max2 = bloqueada;
              }

              data2.addRow(['Asignada', asignada, asignada.toString()]);
              data2.addRow(['Disponible', disponible, disponible.toString()]);
              data2.addRow(['Backup', backup, backup.toString()]);
              data2.addRow(['Eliminada', eliminada, eliminada.toString()]);
              data2.addRow(['Bloqueada', bloqueada, bloqueada.toString()]);

              max2 = max2 + max2*0.25;
              var min2 = 0;

              var options2 = {
                height: '100%',
                width: '100%',
                chartArea: {
                  // left: 150,
                  top: 0,
                  bottom: 20,
                  // width: '70%',
                  // height: '100%'
                },
                annotations: {
                  textStyle: {
                    fontSize: 10,
                    bold: true
                  }
                },
                legend: {
                  position: "none"
                },
                hAxis : {
                  textStyle : {
                    fontSize: 11 // or the number you want
                  },
                  viewWindow: {
                      min: min2,
                      max: max2
                  }
                }
              };

              var chart2 = new google.visualization.BarChart(document.getElementById('graficaTarjetaResumen'));

              //Gráfica 3
              var data3 = new google.visualization.DataTable();
              data3.addColumn('string', 'Tipo');
              data3.addColumn('number', 'Cantidad');
              data3.addColumn({type:'string', role:'annotation'});

              var libre = 0;
              var conConductor = 0;
              var sinConductor = 0;

              for(var k = 0; k < datosTar.length; k++){
                if(datosTar[k].DNI === null && datosTar[k].ESTADO === 'Asignada'){
                  sinConductor++;
                }
                else if(datosTar[k].DNI !== ''){
                  conConductor++;
                }
                else{
                  libre++;
                }
              }

              var max3 = 0;
              if(max3 < libre){
                max3 = libre;
              }
              if(max3 < sinConductor){
                max3 = sinConductor;
              }
              if(max3 < conConductor){
                max3 = conConductor;
              }

              data3.addRow(['Libre', libre, libre.toString()]);
              data3.addRow(['Sin conductor', sinConductor, sinConductor.toString()]);
              data3.addRow(['Con conductor', conConductor, conConductor.toString()]);

              max3 = max3 + max3*0.25;
              var min3 = 0;

              var options3 = {
                height: '100%',
                width: '100%',
                chartArea: {
                  left: 100,
                  top: 0,
                  bottom: 20,
                  // width: '70%',
                  // height: '100%'
                },
                annotations: {
                  textStyle: {
                    fontSize: 10,
                    bold: true
                  }
                },
                legend: {
                  position: "none"
                },
                hAxis : {
                  textStyle : {
                    fontSize: 11 // or the number you want
                  },
                  viewWindow: {
                      min: min3,
                      max: max3
                  }
                }
              };

              var chart3 = new google.visualization.BarChart(document.getElementById('graficaTarjetaResumenConductor'));

              setTimeout(function(){
                chart.draw(data, options);
                chart2.draw(data2, options2);
                chart3.draw(data3, options3);
              },500);
            }
          });

          setTimeout(async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesTarjetasCombustible").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesTarjetasCombustible").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("jefaturaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/22);
          await $('#tablaJefatura').DataTable( {
            ajax: {
              url: "controller/datosJefaturaSide.php",
              type: 'POST'
            },
            processing: true,
            search: {
                return: true,
            },
            serverSide: true,
            columns: [
              { data: 'S'},
              { data: 'RUTA_IMG_PERFIL', className: "centerDataTable" },
              { data: 'DNI'},
              { data: 'NOMBRES' },
              { data: 'APELLIDOS' },
              { data: 'EMPRESA'},
              { data: 'CLASIFICACION', className: "centerDataTable" },
              { data: 'NIVEL', className: "centerDataTable" },
              { data: 'GERENCIA'},
              { data: 'SUBGERENCIA'},
              { data: 'CLIENTE'},
              { data: 'NOMENCLATURA'},
              { data: 'DENOMINACION'},
              { data: 'COMUNA'},
              { data: 'REGION'},
              { data: 'CARGO' },
              { data: 'PATENTE' },
              { data: 'EMAIL' },
              { data: 'TELEFONO' },
              { data: 'SOLICITUD'},
              { data: 'JEFE' },
              { data: 'IDPERSONAL' },
              { data: 'EXTERNO' },
              { data: 'SUCURSAL' }
            ],
            buttons: [
              {
                text: 'Excel',
                action: function ( e, dt, node, config ){
                  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'><span class='fas fa-file-excel'></span>&nbsp;&nbsp;Generando documento Excel</font>");
                  $('#modalAlertasSplash').modal('show');

                  $.ajax({
                    url:   'controller/generaExcelGestionOperativa.php',
                    type:  'post',
                    data:  parametros,
                    success:  function (response) {
                      $('#modalAlertasSplash').modal('hide');
                      var random = Math.round(Math.random() * (1000000 - 1) + 1);
                      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Documento generado correctamente<br><font style='font-size: 9pt;'>(Si el documento no es descargado, favor verifique no tener bloqueadas las ventanas emergentes)</font>");
                      window.open(window.location.toString().split("#/")[0].split('?')[0] + '/controller/repositorio/temp/' + response, '_blank');
                    }
                  });
                }
              },
              {
                text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                action: function ( e, dt, node, config ) {
                  var table = $('#tablaJefatura').DataTable();
                  $("#cambiarJefatura").attr("disabled", "disabled");
                  $("#transferirJefatura").attr("disabled", "disabled");
                  $("#transferirJefaturaRespuesta").attr("disabled", "disabled");
                  table.rows().deselect();
                }
              }
            ],
            "columnDefs": [
              // {
              //   "width": "5px",
              //   "targets": 0
              // },
              // {
              //   "orderable": false,
              //   "className": 'select-checkbox',
              //   "targets": [ 0 ]
              // },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 21 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 22 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 23 ]
              },
            ],
            "select": {
              style: 'multi',
              selector: 'td:not(:nth-child(2))'
            },
            "scrollX": false,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            "responsive": {
                details: {
                    renderer: function ( api, rowIdx, columns ) {
                        var data = $.map( columns, function ( col, i ) {
                            return col.hidden ?
                                '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                    '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                    '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                '</tr>' :
                                '';
                        } ).join('');

                        return data ?
                            $('<table/>').append( data ) :
                            false;
                    }
                }
            },
            "info": true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
              "zeroRecords": "No hay datos disponibles",
              "info": "Registro _START_ de _END_ de _TOTAL_",
              "infoEmpty": "No hay datos disponibles",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Siguiente"
                },
                "search": "Buscar: ",
                "searchPlaceholder": "Presione enter para buscar",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function( settings, json) {

            }
          });

          await esconderMenu();
          setTimeout(async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesGestionOperativa").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesGestionOperativa").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            var table = $('#tablaJefatura').DataTable();

            $('#contenido').show();
            $('#menu-lateral').show();
            $('#footer').parent().show();
            $('#footer').show();

            $('#modalAlertasSplash').modal('hide');
            setTimeout(function(){
              $('#tablaJefatura').DataTable().columns.adjust();
            },500);
          },1000);
          menuElegant();
        }, 200);
      }
    }
  });
});

app.controller("orgCorporativoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          $("#idNivelesOrganigrama").val(2);

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#idNivelesOrganigrama").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            await dibujaOrgCorp();
            var element = document.getElementById('contenido');
            // new ResizeSensor(element, async function() {
            //   await dibujaOrgCorp();
            // });
          }
          else{
            $("#idNivelesOrganigrama").remove();
            $("#labelNivelesOrganigrama").remove();
            $("#divOrganigramaCorporativo").append('<h5 style="color: gray; font-weight: bold;">Para ver este organigrama debe acceder desde un computador</h5>');
            $("#divOrganigramaCorporativo").css("margin-top","0");
          }

          await esconderMenu();

          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();
        },200);
      }
    }
  });
});

app.controller("formulariosController", function() {
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
$('#footer').show();

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#selectTiposAuditorias").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#selectTiposServicios").select2({
              theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          await $.ajax({
            url:   'controller/datosPersonalTodos.php',
            type:  'post',
            success: async function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                var cuerpo = '';
                for(var i = 0; i < p.aaData.length; i++) {
                  cuerpo += `<option id="${p.aaData[i].IDPERSONAL}" value="${p.aaData[i].IDPERSONAL}">${p.aaData[i].DNI} - ${p.aaData[i].PERSONA}</option>`;
                }
                $("#selectMultiPersonal").html(cuerpo);

                $("#selectMultiPersonal").multiSelect({
                  selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                  selectionFooter: "<div class='custom-header'>&nbsp;Seleccionados</div>",
                  selectableHeader: "<input id='dispoPerMul' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                  selectionHeader: "<input id='selecPerMul' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                  afterInit: function(ms){
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                      if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                      }
                    });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                      if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                      }
                    });
                  },
                  afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                  },
                  afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                  }
                });
              }
            }
          });

          await $.ajax({
            url:   'controller/datosTiposAuditorias.php',
            type:  'post',
            success: async function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                var cuerpo = '';
                for(var i = 0; i < p.aaData.length; i++) {
                  cuerpo += '<option id="' + p.aaData[i].TITULO + '" value="' + p.aaData[i].id + '">' + p.aaData[i].TITULO + '</option>';
                }
                $("#selectTiposAuditorias").html(cuerpo);
                await cargarFormulario(p.aaData[0].id);
              }
            }
          });
          var parametros = {
            'id': $("#selectTiposAuditorias").val()
          }
          await $.ajax({
            url:   'controller/datosTiposServicios.php',
            type:  'post',
            data:  parametros,
            success: function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                var cuerpo = '';
                for(var i = 0; i < p.aaData.length; i++) {
                  cuerpo += '<option id="' + p.aaData[i].TITULO + '" value="' + p.aaData[i].id + '">' + p.aaData[i].TITULO + '</option>';
                }
                $("#selectTiposServicios").html(cuerpo);
              }
            }
          });
          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path
          }

          await esconderMenu();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
        }, 200);
      }
    }
  });
});

app.controller("formulariosRealizadosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $.ajax({
            url:   'controller/datosInformePracticasGlobalPeriodo.php', // 'controller/datosFiltrosFormulario.php',
            type:  'post',
            success: async function (responseFiltros) {
              var pFecha = jQuery.parseJSON(responseFiltros);
              if(pFecha.aaData.length !== 0) {
                var cuerpoPeriodo = '';
                for(var i = 0; i < pFecha.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + pFecha.aaData[i].PERIODO + '">' + pFecha.aaData[i].PERIODO + '</option>';
                }
                $("#periodoTablaFormularios").html(cuerpoPeriodo);
              }
              else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoTablaFormularios").html(cuerpoPeriodo);
              }
              var [ fecIni, fecEnd ] = formatoRangoFecha(`${$("#periodoTablaFormularios").val()}-01`);
              await $('#tablaFormulario').DataTable( {
                ajax: {
                  url: "controller/datosFormulario.php",
                  type: 'POST',
                  data: {
                    path: '/' + window.location.href.split('#/')[1],
                    fecIni: fecIni,
                    fecEnd: fecEnd
                  }
                },
                columns: [
                  { data: 'S'},
                  { data: 'idFORMULARIO', className: "centerDataTable"},
                  { data: 'AUDITORIA'},
                  { data: 'SERVICIO'},
                  { data: 'RUT'},
                  { data: 'NOMBRE'},
                  { data: 'FECHA'},
                  { data: 'HORA'},
                  { data: 'TAREA' },
                  { data: 'DIRECCIONCLIENTE' },
                  { data: 'RUTCLIENTE' },
                  { data: 'FECHAINSTALACION' },
                  { data: 'RUT_AUDITOR' },
                  { data: 'NOMBRE_AUDITOR' },
                  { data: 'NOTA', className: "centerDataTable" },
                  { data: 'PDF', className: "centerDataTable" }
                ],
                buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFormulariosRealizados"></span>&nbsp;&nbsp;Filtros',
                    action: function(){
                      if($("#filtrosFormulariosRealizados").height() > 60){
                        $("#filtrosFormulariosRealizados").css("height","0");
                        $("#filtrosFormulariosRealizados").fadeOut();
                        $("#spanButtonFormulariosRealizados").removeClass("fas fa-arrow-alt-circle-up");
                        $("#spanButtonFormulariosRealizados").addClass("fas fa-arrow-alt-circle-down");
                      }
                      else{
                        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                          $("#filtrosFormulariosRealizados").css("height","90pt");
                        }
                        else{
                          $("#filtrosFormulariosRealizados").css("height","220pt");
                        }
                        $("#filtrosFormulariosRealizados").fadeIn();
                        $("#spanButtonFormulariosRealizados").removeClass("fas fa-arrow-alt-circle-down");
                        $("#spanButtonFormulariosRealizados").addClass("fas fa-arrow-alt-circle-up");
                      }
                    }
                  }
                ],
                "columnDefs": [
                  {
                    "width": "5px",
                    "targets": 0
                  },
                  {
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets": [ 0 ]
                  }
                ],
                "select": {
                  style: 'multi',
                  selector: 'td:not(:nth-child(16))'
                },
                fixedColumns:   {
                  leftColumns: 2
                },
                "scrollX": true,
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                "info":     true,
                "order": [[ 1, "desc" ]],
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                  "zeroRecords": "No hay datos disponibles",
                  "info": "Registro _START_ de _END_ de _TOTAL_",
                  "infoEmpty": "No hay datos disponibles",
                  "paginate": {
                      "previous": "Anterior",
                      "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    "select": {
                        "rows": "- %d registros seleccionados"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json) {
                  var table = $('#tablaFormulario').DataTable();

                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
                  $('#footer').show();

                  var table = $('#tablaFormulario').DataTable();

                  var cuerpoAuditoria = '';
                  cuerpoAuditoria += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(2).data().unique().length; i++){
                    if(table.column(2).data().unique()[i] !== null){
                      cuerpoAuditoria += '<option value="' + table.column(2).data().unique()[i] + '">' + table.column(2).data().unique()[i] + '</option>';
                    }
                  }
                  $("#auditoriaTablaFormularios").html(cuerpoAuditoria);

                  var cuerpoServicio = '';
                  cuerpoServicio += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(3).data().unique().length; i++){
                    if(table.column(3).data().unique()[i] !== null){
                      cuerpoServicio += '<option value="' + table.column(3).data().unique()[i] + '">' + table.column(3).data().unique()[i] + '</option>';
                    }
                  }
                  $("#servicioTablaFormularios").html(cuerpoServicio);

                  setTimeout(function(){
                    $("#filtrosFormulariosRealizados").css("height","0");
                    $("#filtrosFormulariosRealizados").fadeOut();
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaFormulario').DataTable().columns.adjust();
                    },500);
                  },2000);
                }
              });
              await esconderMenu();
              if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $("#periodoTablaFormularios").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                });
              }
              if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $("#auditoriaTablaFormularios").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                });
              }
              if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $("#servicioTablaFormularios").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                });
              }
              menuElegant();
            }
          });
        }, 200);
      }
    }
  });
});

app.controller("notificacionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaNotificacion').DataTable( {
            ajax: {
              url: "controller/datosNotificacionesUsuarioTabla.php",
              type: 'POST'
            },
            columns: [
              { data: 'S'},
              { data: 'TIPO'},
              { data: 'CATEGORIA'},
              { data: 'FECHA' },
              { data: 'HORA' },
              { data: 'LEIDO' },
              { data: 'CUERPO' },
              { data: 'BOTON', className: 'centerDataTable' }
            ],
            buttons: [
              {
                extend: 'excel',
                exportOptions: {
                  columns: [ 1,2,3,4,5 ]
                },
                title: null,
                text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              },
              {
                text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                action: function ( e, dt, node, config ) {
                  var table = $('#tablaNotificacion').DataTable();
                  $("#leidoNotificacion").attr("disabled", "disabled");
                  table.rows().deselect();
                }
              }
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "width": "5px",
                "targets": 7
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 5 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 6 ]
              },
            ],
            "select": {
              style: 'multi',
              selector: 'td:not(:nth-child(6))'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            "order": [[ 3, "desc" ],[ 4, "desc" ]],
            "info": true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
              "zeroRecords": "No hay datos disponibles",
              "info": "Registro _START_ de _END_ de _TOTAL_",
              "infoEmpty": "No hay datos disponibles",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function( settings, json) {
              var table = $('#tablaJefatura').DataTable();

              $('#contenido').show();
              $('#menu-lateral').show();
              $('#footer').parent().show();
$('#footer').show();

              setTimeout(function(){
                $('#tablaNotificacion').DataTable().columns.adjust();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                },2000);
              },1000);
              menuElegant();
            }
          });
          await esconderMenu();
        }, 200);
      }
    }
  });
});

// Consulta Aseguradora Mantenedor
app.controller("aseguradoraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoAseguradora').DataTable( {
              ajax: {
                  url: "controller/datosAseguradora.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUT' },
                  { data: 'NOMBRE' },
                  { data: 'MONEDA' },
                  { data: 'DIRECCION' },
                  { data: 'COMUNA' },
                  { data: 'TELEFONO'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(function(){
                    $('#tablaListadoAseguradora').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesAseguradora").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesAseguradora").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

//Consulta Tipo Vehiculo Mantenedor
app.controller("tipoVehiculoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoTipoVehiculo').DataTable( {
              ajax: {
                  url: "controller/datosTipoVehiculo.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'NOMBRE' },
                  { data: 'LICENCIA'},
                  { data: 'CHECKTIPO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoTipoVehiculo').DataTable().columns.adjust();
                  },1500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesTipoVehiculo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesTipoVehiculo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Taller Mantenedor
app.controller("tallerController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoTaller').DataTable( {
              ajax: {
                  url: "controller/datosTaller.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUT' },
                  { data: 'NOMBRE'},
                  { data: 'MONEDA'},
                  { data: 'DIRECCION' },
                  { data: 'COMUNA'},
                  { data: 'CONTACTO'},
                  { data: 'EMAIL'},
                  { data: 'TELEFONO'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  $('#tablaListadoTaller').DataTable().columns.adjust();
                },500);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesTalleres").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesTalleres").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Marca Modelo Mantenedor
app.controller("marcaModeloController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoMarcaModelo').DataTable( {
              ajax: {
                  url: "controller/datosMarcaModelo.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'MARCA' },
                  { data: 'MODELO'},
                  { data: 'LITROS_ESTANQUE'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  $('#tablaListadoMarcaModelo').DataTable().columns.adjust();
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },2000)
                },500);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesMarcaModelo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesMarcaModelo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Sucursales Mantenedor
app.controller("sucursalController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoSucursal').DataTable( {
              ajax: {
                  url: "controller/datosSucursal.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S', className: "centerDataTable" },
                  { data: 'IDSUCURSAL', className: "centerDataTable" },
                  { data: 'IMG' , className: "centerDataTable" },
                  { data: 'NOMBRE' },
                  { data: 'DIRECCION' },
                  { data: 'COMUNA'},
                  { data: 'OFICINA', className: "centerDataTable" },
                  { data: 'CAPACIDAD_PERSONAL', className: "centerDataTable" },
                  { data: 'CAPACIDAD_ESTACIONAMIENTO', className: "centerDataTable" },
                  { data: 'BODEGA_FLOTA', className: "centerDataTable" },
                  { data: 'BODEGA_LOGISTICA', className: "centerDataTable" },
                  { data: 'BODEGA_LOGISTICA_TIPO', className: "centerDataTable" },
                  { data: 'ESTADO', className: "centerDataTable" }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,3,4,5,6,7,8,9,10,11,12 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single',
                  selector: 'td:not(:nth-child(5))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                setTimeout(function(){
                  var path = window.location.href.split('#/')[1];
                  var parametros = {
                    "path": path
                  }

                  setTimeout(async function(){
                    await $.ajax({
                      url:   'controller/datosAccionesVisibles.php',
                      type:  'post',
                      data: parametros,
                      success: function (response) {
                        var p = jQuery.parseJSON(response);
                        if(p.aaData.length !== 0){
                          for(var i = 0; i < p.aaData.length; i++) {
                            if(p.aaData[i].VISIBLE == 1){
                              if(p.aaData[i].ENABLE == 1){
                                $("#accionesSucursales").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                              else{
                                $("#accionesSucursales").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                            }
                          }
                        }
                      }
                    });

                    setTimeout(function(){
                      var js = document.createElement('script');
                      js.src = 'view/js/funciones.js?idLoad=205';
                      document.getElementsByTagName('head')[0].appendChild(js);
                    },500);
                  },100);
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(async function(){
                      $('#tablaListadoSucursal').DataTable().columns.adjust();
                    },500);
                  },2000);
                },1000);
                menuElegant();
              }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});
// Fin Consulta Sucursales Mantenedor

//Informe global de practicas
app.controller("informesPracticaGlobalController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          await $.ajax({
            url:   'controller/datosInformePracticasGlobalPeriodo.php',
            type:  'post',
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoPeriodo = '';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + p2.aaData[i].PERIODO + '">' + p2.aaData[i].PERIODO + '</option>';
                }
                $("#periodoTablaInformes").html(cuerpoPeriodo);
              }
              else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoTablaInformes").html(cuerpoPeriodo);
              }
            }
          });

          var parametrosSemana = {
            'periodo': $("#periodoTablaInformes").val()
          }

          await $.ajax({
            url:   'controller/datosInformePracticasGlobalSemana.php',
            type:  'post',
            data:  parametrosSemana,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              var cuerpoSemana = '<option selected value="0">Todas</option>';
              if(p2.aaData.length !== 0){
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoSemana += '<option value="' + p2.aaData[i].SEMANA + '">' + p2.aaData[i].SEMANA + '</option>';
                }
                $("#semanaTablaInformesComun").html(cuerpoSemana);
              }
              else{
                $("#semanaTablaInformesComun").html(cuerpoSemana);
              }
            }
          });

          parametrosSemana.semana = $("#semanaTablaInformesComun").val();
          parametrosSemana.servicio = '0';

          await $.ajax({
            url:   'controller/datosInformePracticasGlobalAuditoria.php',
            type:  'post',
            data:  parametrosSemana,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              var cuerpoAuditoria= '<option selected value="0">Todas</option>';
              if(p2.aaData.length !== 0){

                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoAuditoria += '<option value="' + p2.aaData[i].ID + '">' + p2.aaData[i].AUDITORIA + '</option>';
                }
                $("#auditoriaTablaInformesComun").html(cuerpoAuditoria);
              }
              else{
                $("#auditoriaTablaInformesComun").html(cuerpoAuditoria);
              }
            }
          });

          parametrosSemana.auditoria = $("#auditoriaTablaInformesComun").val();

          await $.ajax({
            url:   'controller/datosInformePracticasGlobalServicio.php',
            type:  'post',
            data:  parametrosSemana,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              var cuerpoServicio = '<option selected value="0">Todas</option>';
              if(p2.aaData.length !== 0){
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoServicio += '<option value="' + p2.aaData[i].SERVICIO + '">' + p2.aaData[i].SERVICIO + '</option>';
                }
                $("#servicioTablaInformesComun").html(cuerpoServicio);
              }
              else{
                $("#servicioTablaInformesComun").html(cuerpoServicio);
              }
            }
          });

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#periodoTablaInformes").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#semanaTablaInformesComun").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#auditoriaTablaInformesComun").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#servicioTablaInformesComun").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          var fecha = new Date();

          var parametros = {
            "path": path,
            "mes": $("#periodoTablaInformes").val().split("-")[1],
            "ano": $("#periodoTablaInformes").val().split("-")[0],
            'semana': $("#semanaTablaInformesComun").val(),
            'auditoria': $("#auditoriaTablaInformesComun").val(),
            'servicio': $("#servicioTablaInformesComun").val()
          }

          await $('#tablaInformes').DataTable( {
            ajax: {
                url: "controller/datosInformePracticasGlobal.php",
                type: 'POST',
                data: parametros
            },
            columns: [
                { data: 'S'},
                { data: 'DNI' },
                { data: 'NOMBRE' },
                { data: 'JEFE' },
                { data: 'COMUNA' },
                { data: 'EMPRESA' },
                { data: 'SERVICIO' },
                { data: 'CLIENTE' },
                { data: 'ACTIVIDAD' },
                { data: 'BUENAS', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 0, '' )},
                { data: 'BUENAS_POR', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 2, '' )},
                { data: 'MALAS', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 0, '' )},
                { data: 'MALAS_POR', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 2, '' )},
                { data: 'TOTAL', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 0, '' )},
                { data: 'CALIFICACION', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 2, '' )},
                { data: 'BUENAS', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 0, '' )},
                { data: 'BUENAS_POR', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 2, '' )},
                { data: 'MALAS', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 0, '' )},
                { data: 'MALAS_POR', className: "centerDataTable", render: $.fn.dataTable.render.number( '', '.', 2, '' )},
            ],
            /*rowReorder: {
              selector: 'td:nth-child(2)'
            },*/
            buttons: [
              {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,15,16,17,18,13,14 ]
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              }
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 15 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 16 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 17 ]
              },
              {
                "visible": false,
                "searchable": false,
                "targets": [ 18 ]
              }
            ],
            "select": {
                style: 'single'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            "order": [[ 14, "desc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
              "zeroRecords": "No hay datos disponibles",
              "info": "Registro _START_ de _END_ de _TOTAL_",
              "infoEmpty": "No hay datos disponibles",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json){
                  var table = $('#tablaInformes').DataTable();
                  var sin_problemas = table.column(9, { search:'applied' }).data().sum();
                  var con_problemas = table.column(11, { search:'applied' }).data().sum();
                  var total = table.column(13, { search:'applied' }).data().sum()

                  if(total == 0){
                    sin_problemas = 1;
                    total = 1;
                  }

                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Estado');
                    data.addColumn('number', 'Porcentaje');
                    data.addRow(['Con problemas', con_problemas/total]);
                    data.addRow(['Sin problemas', sin_problemas/total]);

                    var options = {
                      title: '',
                      // is3D: true,
                      // pieSliceText: 'label',
                      legend: {
                        position: "right"
                      },
                      chartArea: {
                        'width': '100%',
                        'height': '100%',
                        'bottom': 10,
                        'top': 10
                      },
                      slices: {
                        0: { color: '#c44e4e' },
                        1: { color: '#095700' }
                      }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('graficaTablaInformes'));

                    chart.draw(data, options);
                  }

                  var jefaturaInformeGlobal = '';
                  jefaturaInformeGlobal += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(3).data().unique().length; i++){
                    if(table.column(3).data().unique()[i] !== null){
                      jefaturaInformeGlobal += '<option value="' + table.column(3).data().unique()[i] + '">' + table.column(3).data().unique()[i] + '</option>';
                    }
                  }
                  $("#jefaturaTablaInformes").html(jefaturaInformeGlobal);

                  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $("#jefaturaTablaInformes").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    var h = $("#filtrosTablaInformes").height()
                    $("#graficaTablaInformes").css("height",h);
                  }
                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
$('#footer').show();

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaInformes').DataTable().columns.adjust();
                    },500);
                  },1000);
                  menuElegant();
                }
            });
          await esconderMenu();
        },200);
      }
    }
  });
});

//Informe evolución de practicas
app.controller("informesPracticaEvolucionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          $('#rangoTablaEvolucion').dateRangePicker(
            {
            	autoClose: false,
            	format: 'YYYY-MM-DD',
            	separator: ' al ',
              startOfWeek: 'monday',// or monday
              startDate: false,
      	      endDate: false,
              time: {
            		enabled: false
            	},
              autoClose: true,
              language: 'es',
              showTopbar: true,
              monthSelect: true,
              yearSelect: true
            }
          ).bind('datepicker-change',async function(event,obj){
            recargaGraficoEvolucion();
          });

          $('#rangoTablaEvolucion').val(moment().subtract(12, 'months').startOf('month').format('YYYY-MM-DD').toString() + ' al ' + moment().endOf('month').format('YYYY-MM-DD').toString());

          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          var parametros = {
            "path": path,
            "inicio": $('#rangoTablaEvolucion').val().split(" al ")[0],
            "fin": $('#rangoTablaEvolucion').val().split(" al ")[1],
            'auditoria': 0,
            'servicio': 0,
            'jefatura': '0',
            'personal': '0',
            'comuna': 0,
            'servicioPro': 0,
            'clientePro': 0,
            'actividadPro': 0
          }

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionAuditoria.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoAuditoria= '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoAuditoria += '<option value="' + p2.aaData[i].ID + '">' + p2.aaData[i].AUDITORIA + '</option>';
                }
                $("#auditoriaTablaEvolucionComun").html(cuerpoAuditoria);
              }
              else{
                var cuerpoAuditoria= '<option selected value="0">Todas</option>';
                $("#auditoriaTablaEvolucionComun").html(cuerpoAuditoria);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionServicio.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoServicio = '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoServicio += '<option value="' + p2.aaData[i].SERVICIO + '">' + p2.aaData[i].SERVICIO + '</option>';
                }
                $("#servicioTablaEvolucionComun").html(cuerpoServicio);
              }
              else{
                var cuerpoServicio= '<option selected value="0">Todas</option>';
                $("#servicioTablaEvolucionComun").html(cuerpoServicio);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionJefatura.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoJefatura = '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoJefatura += '<option value="' + p2.aaData[i].DNI + '">' + p2.aaData[i].DNI + ' - ' + p2.aaData[i].JEFE + '</option>';
                }
                $("#jefaturaTablaEvolucion").html(cuerpoJefatura);
              }
              else{
                var cuerpoJefatura= '<option selected value="0">Todas</option>';
                $("#jefaturaTablaEvolucion").html(cuerpoJefatura);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionPersonal.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoPersonal = '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoPersonal += '<option value="' + p2.aaData[i].RUTPERSONAL + '">' + p2.aaData[i].RUTPERSONAL + ' - ' + p2.aaData[i].NOMBREPERSONAL + '</option>';
                }
                $("#personalTablaEvolucion").html(cuerpoPersonal);
              }
              else{
                var cuerpoPersonal= '<option selected value="0">Todas</option>';
                $("#personalTablaEvolucion").html(cuerpoPersonal);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionComuna.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoComuna = '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoComuna += '<option value="' + p2.aaData[i].IDAREAFUNCIONAL + '">' + p2.aaData[i].COMUNA + '</option>';
                }
                $("#comunaProTablaEvolucion").html(cuerpoComuna);
              }
              else{
                var cuerpoComuna= '<option selected value="0">Todas</option>';
                $("#comunaProTablaEvolucion").html(cuerpoComuna);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionServicioPro.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoServicioPro= '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoServicioPro += '<option value="' + p2.aaData[i].IDSERVICIO + '">' + p2.aaData[i].SERVICIO + '</option>';
                }
                $("#servicioProTablaEvolucion").html(cuerpoServicioPro);
              }
              else{
                var cuerpoServicioPro= '<option selected value="0">Todas</option>';
                $("#servicioProTablaEvolucion").html(cuerpoServicioPro);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionClientePro.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoClientePro= '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoClientePro += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + '</option>';
                }
                $("#clienteProTablaEvolucion").html(cuerpoClientePro);
              }
              else{
                var cuerpoClientePro= '<option selected value="0">Todas</option>';
                $("#clienteProTablaEvolucion").html(cuerpoClientePro);
              }
            }
          });

          await $.ajax({
            url:   'controller/datosInformePracticasEvolucionActividadPro.php',
            type:  'post',
            data:  parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoActividadPro= '<option selected value="0">Todas</option>';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoActividadPro += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
                }
                $("#actividadProTablaEvolucion").html(cuerpoActividadPro);
              }
              else{
                var cuerpoActividadPro= '<option selected value="0">Todas</option>';
                $("#actividadProTablaEvolucion").html(cuerpoActividadPro);
              }
            }
          });

          $("#auditoriaTablaEvolucionComun").val(parametros['auditoria']);
          $("#servicioTablaEvolucionComun").val(parametros['servicio']);
          $("#jefaturaTablaEvolucion").val(parametros['jefatura']);
          $("#personalTablaEvolucion").val(parametros['personal']);
          $("#comunaProTablaEvolucion").val(parametros['comuna']);
          $("#servicioProTablaEvolucion").val(parametros['servicioPro']);
          $("#clienteProTablaEvolucion").val(parametros['clientePro']);
          $("#actividadProTablaEvolucion").val(parametros['actividadPro']);

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#auditoriaTablaEvolucionComun").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#servicioTablaEvolucionComun").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#jefaturaTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#personalTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#comunaProTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#servicioProTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#clienteProTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#actividadProTablaEvolucion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          function graficaEvolucionPractica(){
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChartPracticaEvolutivo);

            async function drawChartPracticaEvolutivo() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Periodo');
              data.addColumn('number', 'Sin problemas');
              data.addColumn({type:'string', role:'annotation'});
              data.addColumn('number', 'Con problemas');
              data.addColumn({type:'string', role:'annotation'});
              data.addColumn('number', 'Total');
              data.addColumn({type:'string', role:'annotation'});

              await $.ajax({
                url:   'controller/datosInformePracticasEvolucion.php',
                type:  'post',
                data:  parametros,
                success: function (response2) {
                  var p2 = jQuery.parseJSON(response2);
                  if(p2.aaData.length !== 0){
                    for(var i = 0; i < p2.aaData.length; i++){
                      data.addRow([p2.aaData[i].PERIODO, parseInt(p2.aaData[i].BUENAS), p2.aaData[i].BUENAS.toString(), parseInt(p2.aaData[i].MALAS), p2.aaData[i].MALAS.toString(), parseInt(p2.aaData[i].TOTAL), p2.aaData[i].TOTAL.toString()]);
                    }
                  }
                }
              });

              var options = {
                title: '',
                // curveType: 'function',
                legend: {
                  position: "top"
                },
                annotations: {
                     textStyle: {
                         color: 'black',
                         fontSize: 11,
                     },
                     alwaysOutside: true
                },
                hAxis : {
                    textStyle : {
                        fontSize: 12 // or the number you want
                    }

                },
                vAxis : {
                    textStyle : {
                        fontSize: 12 // or the number you want
                    }

                },
                chartArea: {
                  'width': '100%',
                  'height': '70%',
                  'top': '50',
                  'bottom': '20',
                  'right': '15',
                  'left': '22'
                },
                series: {
                  2: { color: '#00219c' },
                  1: { color: '#c44e4e' },
                  0: { color: '#095700' }
                }
              };

              var chart = new google.visualization.LineChart(document.getElementById('graficaTablaEvolucion'));

              chart.draw(data, options);
            }
          }

          graficaEvolucionPractica();

          await esconderMenu();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            var h = $(window).height() - $("#filtrosTablaEvolucion").height() - 150;
            $("#graficaTablaEvolucion").css("height",h);
          }
          else{
            var h = $(window).height() - 250;
            $("#graficaTablaEvolucion").css("height",h);
          }
        },200);
      }
    }
  });
});

app.controller("personalExternoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#estadoPersonalExterno").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }
          await $('#tablaPersonalExterno').DataTable( {
              ajax: {
                  url: "controller/datosPersonalExterno.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUTA_IMG_PERFIL', className: "centerDataTable"},
                  { data: 'DNI' } ,
                  { data: 'NOMBRE' },
                  { data: 'NIVEL', className: "centerDataTable"},
                  { data: 'AREA' },
                  { data: 'TAM' , className: "centerDataTable"},
                  { data: 'TPM' , className: "centerDataTable"},
                  { data: 'TURNO' },
                  { data: 'ESTADO_CONTROL', className: "centerDataTable"},
                  { data: 'ESTADO_GEO', className: "centerDataTable"},
                  { data: 'ESTADO_GESTPER', className: "centerDataTable"},
                  { data: 'ASIGNACION' },
                  { data: 'ENTRADA' },
                  { data: 'SALIDA' },
                  { data: 'PERMISO' },
                  { data: 'CARGO' },
                  { data: 'FECHA_INICIO_CONTRATO' , render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                  { data: 'CLASIFICACION' },
                  { data: 'CENTRO_COSTO' },
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE' },
                  { data: 'ACTIVIDAD' },
                  { data: 'COMUNA' },
                  { data: 'REGION' },
                  { data: 'EMPRESA' },
                  { data: 'NOMBREJEFE' },
                  { data: 'CARGOS' },
                  { data: 'SALDOVAC' },
                  { data: 'FECHANAC' },
                  { data: 'DNI2' },
                  { data: 'ESTADO_CONTROL2' },
                  { data: 'ESTADO_GEO2' },
                  { data: 'ESTADO_GESTPER2' },
                  { data: 'ASIGNACION2' }
              ],
              //
              buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 2,3,4,5,6,7,8,31,32,33,34,13,14,15,16,17,18,20,21,22,23,24,25,26,27,28,29],
                      format: {
                          body: function(data, row, column, node) {
                             return column == 13 ? data.replace( '.', '' ).replace( ',', '.' ) : data.replace('.','').replace(',','.');

                          }
                      }
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                },
                {
                  text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                  action: function ( e, dt, node, config ) {
                    var table = $('#tablaPersonalExterno').DataTable();
                    $("#estadoPersonalExterno2").attr("disabled","disabled");
                    $("#editarPersonalExterno").attr("disabled","disabled");
                    table.rows().deselect();
                  }
                }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 19 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 30 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 31 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 32 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 33 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 34 ]
                }
              ],
              "select": {
                style: 'multi',
                selector: 'td:not(:nth-child(2))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                  "zeroRecords": "No hay registros de personal externo",
                  "info": "Registro _START_ de _END_ de _TOTAL_",
                  "infoEmpty": "No hay registros de personal externo",
                  "paginate": {
                      "previous": "Anterior",
                      "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaPersonalExterno').DataTable();

                var estadoPersonal = '';
                estadoPersonal += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(31).data().unique().length; i++){
                  if(table.column(31).data().unique()[i] !== null){
                    estadoPersonal += '<option value="' + table.column(31).data().unique()[i] + '">' + table.column(31).data().unique()[i] + '</option>';
                  }
                }
                $("#estadoPersonalExterno").html(estadoPersonal);

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

                  $("#estadoPersonalExterno").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }

                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                $('#tablaPersonalExterno').DataTable().columns.adjust();

                setTimeout(function(){
                  var path = window.location.href.split('#/')[1];
                  var parametros = {
                    "path": path
                  }

                  setTimeout(async function(){
                    await $.ajax({
                      url:   'controller/datosAccionesVisibles.php',
                      type:  'post',
                      data: parametros,
                      success: function (response) {
                        var p = jQuery.parseJSON(response);
                        if(p.aaData.length !== 0){
                          for(var i = 0; i < p.aaData.length; i++) {
                            if(p.aaData[i].VISIBLE == 1){
                              if(p.aaData[i].ENABLE == 1){
                                $("#accionesPersonalExterno").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                              else{
                                $("#accionesPersonalExterno").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                            }
                          }
                        }
                      }
                    });

                    setTimeout(function(){
                      var js = document.createElement('script');
                      js.src = 'view/js/funciones.js?idLoad=205';
                      document.getElementsByTagName('head')[0].appendChild(js);
                    },500);
                  },100);
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },2000);
                },1000);
                menuElegant();
              }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});

// Consulta Vehiculo
app.controller("vehiculoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/40);
          var parametros = {
            "path": path
          }
          var table = await $('#tablaListadoVehiculo').DataTable( {
              ajax: {
                  url: "controller/datosVehiculo.php",
                  type: 'POST',
                  data: parametros
              },
              columns: [
                  { data: 'S', className: "centerDataTable" },
                  { data: 'PATENTE', className: "centerDataTable" },
                  { data: 'PATENTE_REEMPLAZO', className: "centerDataTable" },
                  { data: 'M'},
                  { data: 'ESTADO_COLOR'},
                  { data: 'OPERACION'},
                  { data: 'TIPO' },
                  { data: 'PROPIEDAD'},
                  { data: 'MARCA'},
                  { data: 'MODELO'},
                  { data: 'CECO' },
                  { data: 'PERSONAL'},
                  { data: 'DNI'},
                  { data: 'ESTADO_CONTROL' },
                  { data: 'ESTADO_PERSONAL' },
                  { data: 'PROVEEDOR' },
                  { data: 'SUCURSAL'},
                  { data: 'COMUNA'},
                  { data: 'GERENCIA' },
                  { data: 'SUBGERENCIA' },
                  { data: 'CLIENTE' },
                  { data: 'ESTADO_TEXTO', className: "centerDataTable"},
                  { data: 'ANO' },
                  { data: 'VIN' },
                  { data: 'NRO_MOTOR' },
                  { data: 'COLOR' },
                  { data: 'FINICIO' },
                  { data: 'FTERMINO' },
                  { data: 'GERENTE' },
                  { data: 'ADMINCONTRATO' },
                  { data: 'RTEC' },
                  { data: 'PCIR' },
                  { data: 'ASEG' },
                  { data: 'EMISION' },
                  { data: 'OTROS' },
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,21,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,22,23,24,25,26,27,28,29 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaListadoVehiculo').DataTable();
                      $("#editarVehiculo").attr("disabled","disabled");
                      $("#subirPdfVehiculo").attr("disabled","disabled");
                      $("#historialVehiculo").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  },
                  {
                    text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosListadoVehiculo"></span>&nbsp;&nbsp;Filtros',
                    action: function(){
                      if($("#filtrosListadoVehiculo").height() > 100){
                        $("#filtrosListadoVehiculo").css("height","0");
                        $("#filtrosListadoVehiculo").fadeOut();
                        $("#spanButtonFiltrosListadoVehiculo").removeClass("fas fa-arrow-alt-circle-up");
                        $("#spanButtonFiltrosListadoVehiculo").addClass("fas fa-arrow-alt-circle-down");
                      }
                      else{
                        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                          $("#filtrosListadoVehiculo").css("height","300pt");
                        }
                        else{
                          $("#filtrosListadoVehiculo").css("height","400pt");
                        }
                        $("#filtrosListadoVehiculo").fadeIn();
                        $("#spanButtonFiltrosListadoVehiculo").removeClass("fas fa-arrow-alt-circle-down");
                        $("#spanButtonFiltrosListadoVehiculo").addClass("fas fa-arrow-alt-circle-up");
                      }
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                // {
                //   "orderable": false,
                //   "className": 'select-checkbox',
                //   "targets": [ 0 ]
                // },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 21 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "responsive": {
                  details: {
                      renderer: function ( api, rowIdx, columns ) {
                          var data = $.map( columns, function ( col, i ) {
                              return col.hidden ?
                                  '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                      '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                      '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                  '</tr>' :
                                  '';
                          } ).join('');

                          return data ?
                              $('<table/>').append( data ) :
                              false;
                      }
                  }
              },
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                var table = $('#tablaListadoVehiculo').DataTable();

                var tablaInf = $('#informeListadoVehiculo').DataTable( {
                  ajax: {
                      url: "controller/datosVehiculoQEstados.php",
                      type: 'POST',
                      data: parametros
                  },
                  columns: [
                      { data: 'COLOR'},
                      { data: 'Q' }
                  ],
                  "select": {
                      style: 'single'
                  },
                  columnDefs: [
                    {
                        targets: 0,
                        className: 'leftDataTableCant'
                    },
                    {
                        targets: 1,
                        className: 'leftDataTableCant'
                    }
                  ],
                  "scrollX": true,
                  "paging": false,
                  "searching": false,
                  "ordering": false,
                  "scrollCollapse": true,
                  "order": [[ 0, "asc" ]],
                  "info": true,
                  "dom": 'frtp',
                  "destroy": true,
                  "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                      },
                      "search": "Buscar: ",
                      "select": {
                          "rows": "- %d registros seleccionados"
                      },
                      "infoFiltered": "(Filtrado de _MAX_ registros)"
                  },
                  "destroy": true,
                  "autoWidth": false,
                  "initComplete": async function( settings, json){
                    var total = 0;
                    await google.charts.load('current', {'packages':['corechart']});
                    await google.charts.setOnLoadCallback(drawChartFlota);
                    $(this.api().column(1).footer()).html(total);

                    function drawChartFlota() {
                      var data = new google.visualization.DataTable();
                      data.addColumn('string', 'Estado');
                      data.addColumn('number', 'Q');
                      data.addColumn({type:'string', role:'style'});
                      data.addColumn({type:'string', role:'annotation'});

                      var tableFlota = $('#informeListadoVehiculo').DataTable();
                      var datosFlota = tableFlota.rows().data();

                      for(var k = 0; k < datosFlota.length; k++){
                        data.addRow([datosFlota[k].ESTADO_TEXTO, parseInt(datosFlota[k].Q), datosFlota[k].COLOR_PLANO, datosFlota[k].Q]);
                        total = total + parseInt(datosFlota[k].Q);
                      }

                      var w = $(window).width()/3;

                      var options = {
                        height: '100%',
                        width: '100%',
                        chartArea: {
                          left: 150,
                          top: 0,
                          bottom: 0,
                          width: '70%',
                          height: '100%'
                        },
                        legend: {
                          position: "none"
                        },
                        vAxis : {
                          textStyle : {
                            fontSize: 11 // or the number you want
                          }
                        }
                      };

                      var chart = new google.visualization.BarChart(document.getElementById('graficaListadoVehiculo'));

                      setTimeout(function(){
                        chart.draw(data, options);
                      },500);
                    }

                    $('#contenido').show();
                    $('#menu-lateral').show();
                    $('#footer').parent().show();
                    $('#footer').show();
                    setTimeout(async function(){
                      setTimeout(function(){
                        $("#filtrosListadoVehiculo").css("height","0");
                        $("#filtrosListadoVehiculo").fadeOut();
                        $('#modalAlertasSplash').modal('hide');
                        setTimeout(function(){
                          $("#spanButtonFiltrosListadoVehiculo").click();
                        },100);
                        setTimeout(function(){
                          $('#tablaListadoVehiculo').DataTable().columns.adjust();
                          $('#informeListadoVehiculo').DataTable().columns.adjust();
                        },500);
                      },100);
                    },100);
                  }
                });
              }
          });
          table.on( 'search.dt', function () {
              $('#tablaListadoVehiculo').DataTable().columns.adjust();
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesVehiculos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesVehiculos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Vehiculo

app.controller("exPersonalController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaExPersonal').DataTable( {
              ajax: {
                  url: "controller/datosExPersonal.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUTA_IMG_PERFIL', className: "centerDataTable"},
                  { data: 'DNI' } ,
                  { data: 'NOMBRE' },
                  { data: 'NIVEL', className: "centerDataTable"},
                  { data: 'AREA' },
                  { data: 'TAM' , className: "centerDataTable"},
                  { data: 'TPM' , className: "centerDataTable"},
                  { data: 'TURNO' },
                  { data: 'ESTADO_CONTROL', className: "centerDataTable"},
                  { data: 'ESTADO_GEO', className: "centerDataTable"},
                  { data: 'ESTADO_GESTPER', className: "centerDataTable"},
                  { data: 'ASIGNACION' },
                  { data: 'ENTRADA' },
                  { data: 'SALIDA' },
                  { data: 'PERMISO' },
                  { data: 'CARGO' },
                  { data: 'FECHA_INICIO_CONTRATO' , render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                  { data: 'CLASIFICACION' },
                  { data: 'CENTRO_COSTO' },
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE' },
                  { data: 'ACTIVIDAD' },
                  { data: 'COMUNA' },
                  { data: 'REGION' },
                  { data: 'EMPRESA' },
                  { data: 'NOMBREJEFE' },
                  { data: 'CARGOS' },
                  { data: 'SALDOVAC' },
                  { data: 'FECHANAC' },
                  { data: 'DNI2' },
                  { data: 'ESTADO_CONTROL2' },
                  { data: 'ESTADO_GEO2' },
                  { data: 'ESTADO_GESTPER2' },
                  { data: 'ASIGNACION2' }
              ],
              //
              buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 2,3,4,5,6,7,8,31,32,33,34,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
                      format: {
                          body: function(data, row, column, node) {
                             return column == 13 ? data.replace( '.', '' ).replace( ',', '.' ) : data.replace('.','').replace(',','.');

                          }
                      }
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                },
                {
                  text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                  action: function ( e, dt, node, config ) {
                    var table = $('#tablaExPersonal').DataTable();
                    $("#activarExPersonal").attr("disabled","disabled");
                    table.rows().deselect();
                  }
                }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 30 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 31 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 32 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 33 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 34 ]
                }
              ],
              "select": {
                style: 'single',
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                  "zeroRecords": "No hay registros de ex-personal",
                  "info": "Registro _START_ de _END_ de _TOTAL_",
                  "infoEmpty": "No hay registros de ex-personal",
                  "paginate": {
                      "previous": "Anterior",
                      "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                $('#tablaExPersonal').DataTable().columns.adjust();

                setTimeout(function(){
                  var path = window.location.href.split('#/')[1];
                  var parametros = {
                    "path": path
                  }

                  setTimeout(async function(){
                    await $.ajax({
                      url:   'controller/datosAccionesVisibles.php',
                      type:  'post',
                      data: parametros,
                      success: function (response) {
                        var p = jQuery.parseJSON(response);
                        if(p.aaData.length !== 0){
                          for(var i = 0; i < p.aaData.length; i++) {
                            if(p.aaData[i].VISIBLE == 1){
                              if(p.aaData[i].ENABLE == 1){
                                $("#accionesExPersonal").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                              else{
                                $("#accionesExPersonal").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                              }
                            }
                          }
                        }
                      }
                    });

                    setTimeout(function(){
                      var js = document.createElement('script');
                      js.src = 'view/js/funciones.js?idLoad=205';
                      document.getElementsByTagName('head')[0].appendChild(js);
                    },500);
                  },100);
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },2000);
                },1000);
                menuElegant();
              }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("subcontratistasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaSubcontratista').DataTable( {
            ajax: {
                url: "controller/datosSubcontratistas.php",
                type: 'POST'
            },
            columns: [
                { data: 'S'},
                { data: 'RUT' } ,
                { data: 'NOMBRE_SUBCONTRATO' } ,
                { data: 'ESTADO' },
                { data: 'TIPO' }
            ],
            buttons: [
              {
                extend: 'excel',
                exportOptions: {
                  columns: [ 1,2,3]

                },
                title: null,
                text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              }
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              }
            ],
            "select": {
              style: 'single',
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
                "zeroRecords": "No hay registros de subcontratistas",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay registros de subcontratistas",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function(){
              $('#contenido').show();
              $('#menu-lateral').show();
              $('#footer').parent().show();
              $('#footer').show();

              setTimeout(function(){
                var path = window.location.href.split('#/')[1];
                var parametros = {
                  "path": path
                }

                setTimeout(async function(){
                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesSubcontratistas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesSubcontratistas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);
                },100);
              },1000);
              menuElegant();
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                setTimeout(function(){
                  $('#tablaSubcontratista').DataTable().columns.adjust();
                },500);
              },2000);
            }
          });
          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("capacitacionesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          await $.ajax({
            url:   'controller/datosTipoCap.php',
            type:  'post',
            success: async function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                var cuerpoTipo = '';
                for(var i = 0; i < p.aaData.length; i++) {
                  cuerpoTipo += '<option value="' + p.aaData[i].TIPO + '">' + p.aaData[i].TIPO + '</option>';
                }
                $("#tipoCapacitacion").html(cuerpoTipo);
              }
            }
          });
          var parametros = {
            'tipo': $("#tipoCapacitacion").val()
          }
          await $.ajax({
            url:   'controller/datosCapCap.php',
            type:  'post',
            data: parametros,
            success: async function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                var cuerpoCap = '';
                for(var i = 0; i < p.aaData.length; i++) {
                  cuerpoCap += '<option value="' + p.aaData[i].URL + '">' + p.aaData[i].NOMBRE + '</option>';
                }
                $("#capCapacitacion").html(cuerpoCap);
              }
            }
          });

          $("#videoCapacitacion").attr("src",$("#capCapacitacion").val());
          $("#videoCapacitacion").css("height",$(window).height() - 250);
          $("#videoCapacitacion").css("width","100%");

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#tipoCapacitacion").select2({
              theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#capCapacitacion").select2({
              theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          await esconderMenu();
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
$('#footer').show();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Proveedores Mantenedor
app.controller("proveedoresController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoProveedores').DataTable( {
              ajax: {
                  url: "controller/datosProveedores.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'RUT'},
                  { data: 'PROVEEDOR' },
                  { data: 'PROPIEDAD' },
                  { data: 'NRO_CONTRATO' }

              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(async function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(function(){
                    $('#tablaListadoProveedores').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesProveedores").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesProveedores").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin Consulta Proveedores Mantenedor

app.controller("metaPracticaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          await $.ajax({
            url:   'controller/datosMetaPeriodo.php',
            type:  'post',
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoPeriodo = '';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + p2.aaData[i].PERIODO + '">' + p2.aaData[i].PERIODO + '</option>';
                }
                $("#periodoMetaPractica").html(cuerpoPeriodo);
              }
              else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoMetaPractica").html(cuerpoPeriodo);
              }
            }
          });

          var parametros = {
            'mes': $("#periodoMetaPractica").val().split('-')[1],
            'ano': $("#periodoMetaPractica").val().split('-')[0]
          }

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaMetaPractica').DataTable( {
              ajax: {
                  url: "controller/datosMetaMesAno.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'PERFIL' },
                  { data: 'AUDITORIA' },
                  { data: 'META', className: "centerDataTable" },
                  { data: 'CICLO' },
                  { data: 'TIPO' },
                  { data: 'OBSERVACION' },
                  { data: 'IDPERFIL' },
                  { data: 'IDAUDITORIA' },
                  { data: 'PERMANENTE' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1, 2, 3, 4, 5, 6 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosMetaPractica"></span>&nbsp;&nbsp;Filtros',
                    action: function(){
                      if($("#filtrosMetaPractica").height() > 100){
                        $("#filtrosMetaPractica").css("height","0");
                        $("#filtrosMetaPractica").fadeOut();
                        $("#spanButtonFiltrosMetaPractica").removeClass("fas fa-arrow-alt-circle-up");
                        $("#spanButtonFiltrosMetaPractica").addClass("fas fa-arrow-alt-circle-down");
                      }
                      else{
                        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                          $("#filtrosMetaPractica").css("height","100pt");
                        }
                        else{
                          $("#filtrosMetaPractica").css("height","180pt");
                        }
                        $("#filtrosMetaPractica").fadeIn();
                        $("#spanButtonFiltrosMetaPractica").removeClass("fas fa-arrow-alt-circle-down");
                        $("#spanButtonFiltrosMetaPractica").addClass("fas fa-arrow-alt-circle-up");
                      }
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 7 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 8 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 9 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();

                var table = $('#tablaMetaPractica').DataTable();

                var perfilMeta = '';
                perfilMeta += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(1).data().unique().length; i++){
                  if(table.column(1).data().unique()[i] !== null){
                    perfilMeta += '<option value="' + table.column(1).data().unique()[i] + '">' + table.column(1).data().unique()[i] + '</option>';
                  }
                }
                $("#perfilMetaPractica").html(perfilMeta);

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#periodoMetaPractica").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#perfilMetaPractica").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }

                setTimeout(async function(){
                  setTimeout(function(){
                    var path = window.location.href.split('#/')[1];
                    var parametros = {
                      "path": path
                    }

                    setTimeout(async function(){
                      await $.ajax({
                        url:   'controller/datosAccionesVisibles.php',
                        type:  'post',
                        data: parametros,
                        success: function (response) {
                          var p = jQuery.parseJSON(response);
                          if(p.aaData.length !== 0){
                            for(var i = 0; i < p.aaData.length; i++) {
                              if(p.aaData[i].VISIBLE == 1){
                                if(p.aaData[i].ENABLE == 1){
                                  $("#accionesMetaPractica").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                }
                                else{
                                  $("#accionesMetaPractica").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                                }
                              }
                            }
                          }
                        }
                      });

                      setTimeout(function(){
                        var js = document.createElement('script');
                        js.src = 'view/js/funciones.js?idLoad=205';
                        document.getElementsByTagName('head')[0].appendChild(js);

                        setTimeout(function(){
                          $("#filtrosMetaPractica").css("height","0");
                          $("#filtrosMetaPractica").fadeOut();
                          $('#modalAlertasSplash').modal('hide');
                          setTimeout(function(){
                            $('#tablaMetaPractica').DataTable().columns.adjust();
                          },500);
                        },2000);
                      },500);
                    },100);
                  },1000);
                  menuElegant();
                },500);
              }
          });

          await esconderMenu();

        }, 200);
      }
    }
  });
});

app.controller("informeDisponibilidadController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          $("#fechaInformeDisponibilidad").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:2040',
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
          });

          $("#fechaInformeDisponibilidadJefatura").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:2040',
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
          });

          $("#fechaInformeDisponibilidad").val(moment().format('YYYY-MM-DD').toString());
          $("#fechaInformeDisponibilidadJefatura").val(moment().format('YYYY-MM-DD').toString());

          $('#rangoEvoluInformeDisponibilidad').dateRangePicker(
            {
            	autoClose: false,
            	format: 'YYYY-MM-DD',
            	separator: ' al ',
              startOfWeek: 'monday',// or monday
              startDate: false,
      	      endDate: false,
              time: {
            		enabled: false
            	},
              autoClose: true,
              language: 'es',
              showTopbar: true,
              monthSelect: true,
              yearSelect: true
            }
          ).bind('datepicker-change',async function(event,obj){
            recargaGraficoDisponibilidadEvo();
          });

          $('#rangoEvoluInformeDisponibilidad').val(moment().startOf('week').add(1, 'days').format('YYYY-MM-DD').toString() + ' al ' + moment().format('YYYY-MM-DD').toString());

          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          var parametros = {
            "path": path,
            "inicio": $('#rangoEvoluInformeDisponibilidad').val().split(" al ")[0],
            "fin": $('#rangoEvoluInformeDisponibilidad').val().split(" al ")[1]
          }

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          function graficaDispoEvolucion(){
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChartPracticaEvolutivo);

            async function drawChartPracticaEvolutivo() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Fecha');
              data.addColumn('number', 'Vacaciones');
              data.addColumn('number', 'Licencia');
              data.addColumn('number', 'Desvinculado');
              data.addColumn('number', 'Presente');
              data.addColumn('number', 'Renuncia');
              data.addColumn('number', 'Permiso');
              data.addColumn('number', 'Ausente');
              data.addColumn('number', 'Sin marca');
              data.addColumn({type:'string', role:'annotation'});

              var max = 0;

              await $.ajax({
                url:   'controller/datosInformeDisponibilidadEvol.php',
                type:  'post',
                data:  parametros,
                success: function (response2) {
                  var p2 = jQuery.parseJSON(response2);
                  if(p2.aaData.length !== 0){
                    for(var i = 0; i < p2.aaData.length; i++){
                      data.addRow([p2.aaData[i].FECHA,parseInt(p2.aaData[i].VACACIONES),parseInt(p2.aaData[i].LICENCIA),parseInt(p2.aaData[i].DESVINCULADO),parseInt(p2.aaData[i].PRESENTE),parseInt(p2.aaData[i].RENUNCIA),parseInt(p2.aaData[i].PERMISO),parseInt(p2.aaData[i].AUSENTE),parseInt(p2.aaData[i].SIN_MARCA),(parseInt(p2.aaData[i].VACACIONES) + parseInt(p2.aaData[i].LICENCIA) + parseInt(p2.aaData[i].PRESENTE) + parseInt(p2.aaData[i].PERMISO) + parseInt(p2.aaData[i].AUSENTE) + parseInt(p2.aaData[i].SIN_MARCA)).toString()]);

                      if((parseInt(p2.aaData[i].VACACIONES) + parseInt(p2.aaData[i].LICENCIA) + parseInt(p2.aaData[i].PRESENTE) + parseInt(p2.aaData[i].PERMISO) + parseInt(p2.aaData[i].AUSENTE) + parseInt(p2.aaData[i].SIN_MARCA)) > max){
                        max = (parseInt(p2.aaData[i].VACACIONES) + parseInt(p2.aaData[i].LICENCIA) + parseInt(p2.aaData[i].PRESENTE) + parseInt(p2.aaData[i].PERMISO) + parseInt(p2.aaData[i].AUSENTE) + parseInt(p2.aaData[i].SIN_MARCA));
                      }
                    }
                  }
                }
              });

              var options = {
                title: '',
                // curveType: 'function',
                legend: {
                  position: "top"
                },
                isStacked: true,
                annotations: {
                     textStyle: {
                         color: 'black',
                         fontSize: 11,
                     },
                     alwaysOutside: true
                },
                hAxis : {
                    textStyle : {
                        fontSize: 12 // or the number you want
                    }

                },
                vAxis : {
                    textStyle : {
                        fontSize: 12 // or the number you want
                    },
                    viewWindow: {
                        min: 0,
                        max: max+5,
                    }
                },
                chartArea: {
                  'width': '100%',
                  'height': '90%',
                  'top': '50',
                  'bottom': '20',
                  'right': '15',
                  'left': '40'
                },
                series: {
                  0: { color: '#8b00ff' },
                  1: { color: '#0165ff' },
                  2: { color: 'black' },
                  3: { color: '#4bdc34' },
                  4: { color: 'black' },
                  5: { color: '#fff038' },
                  6: { color: '#ffae20' },
                  7: { color: '#dedede' }
                }
              };

              var chart = new google.visualization.ColumnChart(document.getElementById('evoluInformDisponibilidad'));

              chart.draw(data, options);

              var path = window.location.href.split('#/')[1];
              var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
              var parametrosDispoJefe = {
                "path": path,
                "fecha":  $("#fechaInformeDisponibilidadJefatura").val()
              }

              await $('#InformeDisponibilidadJefatura').DataTable( {
                  ajax: {
                      url: "controller/datosInformeDisponibilidadJefatura.php",
                      type: 'POST',
                      data: parametrosDispoJefe,
                  },
                  columns: [
                      { data: 'S'},
                      { data: 'EMPRESA' },
                      { data: 'NOMBRE' },
                      { data: 'VACACIONES', className: "centerDataTable" },
                      { data: 'LICENCIA' , className: "centerDataTable" },
                      { data: 'DESVINCULADO', className: "centerDataTable" },
                      { data: 'PRESENTE', className: "centerDataTable" },
                      { data: 'RENUNCIA' , className: "centerDataTable" },
                      { data: 'PERMISO' , className: "centerDataTable" },
                      { data: 'AUSENTE' , className: "centerDataTable" },
                      { data: 'SIN_MARCA', className: "centerDataTable" },
                      { data: 'TOTAL' , className: "centerDataTable" }
                  ],
                  buttons: [
                      {
                        extend: 'excel',
                        exportOptions: {
                          columns: [ 1, 2, 3, 4, 5, 6, 7 ,8, 9, 10, 11 ]
                        },
                        title: null,
                        text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                      }
                  ],
                  "columnDefs": [
                    {
                      "width": "5px",
                      "targets": 0
                    },
                    {
                      "orderable": false,
                      "className": 'select-checkbox',
                      "targets": [ 0 ]
                    }
                  ],
                  "select": {
                      style: 'single'
                  },
                  "scrollX": true,
                  "paging": true,
                  "ordering": true,
                  "scrollCollapse": true,
                  "info":     true,
                  "lengthMenu": [[largo], [largo]],
                  "dom": 'Bfrtip',
                  "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                      },
                      "search": "Buscar: ",
                      "select": {
                          "rows": "- %d registros seleccionados"
                      },
                      "infoFiltered": "(Filtrado de _MAX_ registros)"
                  },
                  "destroy": true,
                  "autoWidth": false
              });

              var parametrosDispo = {
                "path": path,
                "fecha":  $("#fechaInformeDisponibilidad").val()
              }

              await $('#InformeDisponibilidad').DataTable( {
                  ajax: {
                      url: "controller/datosInformeDisponibilidad.php",
                      type: 'POST',
                      data: parametrosDispo,
                  },
                  columns: [
                      { data: 'S'},
                      { data: 'DNI' },
                      { data: 'NOMBRE' },
                      { data: 'ESTADO_CONTROL'},
                      { data: 'SERVICIO' },
                      { data: 'CLIENTE' },
                      { data: 'ACTIVIDAD' },
                      { data: 'COMUNA' },
                      { data: 'EMPRESA' },
                      { data: 'FUNCION' },
                      { data: 'NOMBREJEFE' },
                      { data: 'ESTADO_CONTROL2' }
                  ],
                  buttons: [
                      {
                        extend: 'excel',
                        exportOptions: {
                          columns: [ 1, 2, 11, 4, 5, 6, 7 ,8, 9, 10 ]
                        },
                        title: null,
                        text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                      }
                  ],
                  "columnDefs": [
                    {
                      "width": "5px",
                      "targets": 0
                    },
                    {
                      "orderable": false,
                      "className": 'select-checkbox',
                      "targets": [ 0 ]
                    },
                    {
                      "visible": false,
                      "searchable": false,
                      "targets": [ 11 ]
                    }
                  ],
                  "select": {
                      style: 'single'
                  },
                  "scrollX": true,
                  "paging": true,
                  "ordering": true,
                  "scrollCollapse": true,
                  "info":     true,
                  "lengthMenu": [[largo], [largo]],
                  "dom": 'Bfrtip',
                  "language": {
                    "zeroRecords": "No hay datos disponibles",
                    "info": "Registro _START_ de _END_ de _TOTAL_",
                    "infoEmpty": "No hay datos disponibles",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                      },
                      "search": "Buscar: ",
                      "select": {
                          "rows": "- %d registros seleccionados"
                      },
                      "infoFiltered": "(Filtrado de _MAX_ registros)"
                  },
                  "destroy": true,
                  "autoWidth": false,
                  "initComplete": function( settings, json){
                    var table = $('#InformeDisponibilidad').DataTable();
                    var vac = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Vacaciones' ? true : false;
                    });
                    var lic = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Licencia' ? true : false;
                    });
                    var des = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Desvinculado' ? true : false;
                    });
                    var pre = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Presente' ? true : false;
                    });
                    var pre_in = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Presente Inducción' ? true : false;
                    });
                    var ren = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Renuncia' ? true : false;
                    });
                    var per = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Permiso' ? true : false;
                    });
                    var aus = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Ausente' ? true : false;
                    });
                    var sin = table
                        .column(11, {search: 'applied'})
                        .data()
                        .filter( function ( value, index ) {
                            return value == 'Sin marca' ? true : false;
                    });
                    var total = table
                        .column(11, {search: 'applied'})
                        .data();

                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                      var data = new google.visualization.DataTable();
                      data.addColumn('string', 'Estado');
                      data.addColumn('number', 'Porcentaje');
                      data.addRow(['Vacaciones', vac.count()]);
                      data.addRow(['Licencia', lic.count()]);
                      data.addRow(['Desvinculado', des.count()]);
                      data.addRow(['Presente', pre.count() + pre_in.count()]);
                      data.addRow(['Renuncia', ren.count()]);
                      data.addRow(['Permiso', per.count()]);
                      data.addRow(['Ausente', aus.count()]);
                      data.addRow(['Sin marca', sin.count()]);

                      var options = {
                        title: '',
                        // is3D: true,
                        // pieSliceText: 'label',
                        legend: 'none',
                        chartArea: {
                          'width': '100%',
                          'height': '100%',
                          'bottom': 10,
                          'top': 10
                        },
                        slices: {
                          0: { color: '#8b00ff' },
                          1: { color: '#0165ff' },
                          2: { color: 'black' },
                          3: { color: '#4bdc34' },
                          4: { color: 'black' },
                          5: { color: '#fff038' },
                          6: { color: '#ffae20' },
                          7: { color: '#dedede' }
                        }
                      };

                      var chart = new google.visualization.PieChart(document.getElementById('graficaInformeDisponibilidad'));

                      chart.draw(data, options);

                      var tablaInf = $('#infoInformeDisponibilidad').DataTable( {
                        "select": {
                            style: 'single'
                        },
                        columnDefs: [
                          {
                              targets: 0,
                              className: 'leftDataTableCant'
                          },
                          {
                              targets: 1,
                              className: 'centerDataTableCant'
                          }
                        ],
                        "scrollX": true,
                        "paging": false,
                        "searching": false,
                        "ordering": false,
                        "scrollCollapse": true,
                        "order": [[ 0, "asc" ]],
                        "info": true,
                        "dom": 'frtp',
                        "destroy": true,
                        "language": {
                          "zeroRecords": "No hay datos disponibles",
                          "info": "Registro _START_ de _END_ de _TOTAL_",
                          "infoEmpty": "No hay datos disponibles",
                          "paginate": {
                              "previous": "Anterior",
                              "next": "Siguiente"
                            },
                            "search": "Buscar: ",
                            "select": {
                                "rows": "- %d registros seleccionados"
                            },
                            "infoFiltered": "(Filtrado de _MAX_ registros)"
                        },
                        "destroy": true,
                        "autoWidth": false,
                        "initComplete": function( settings, json){
                          $(this.api().column(1).footer()).html(total.count());
                        }
                      });
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #8b00ff; font-size: 10pt;"></b>&nbsp;&nbsp;Vacaciones', vac.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #0165ff; font-size: 10pt;"></b>&nbsp;&nbsp;Licencia', lic.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #black; font-size: 10pt;"></b>&nbsp;&nbsp;Desvinculado', des.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente', pre.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #4bdc34; font-size: 10pt;"></b>&nbsp;&nbsp;Presente inducción', pre_in.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #black; font-size: 10pt;"></b>&nbsp;&nbsp;Renuncia', ren.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #fff038; font-size: 10pt;"></b>&nbsp;&nbsp;Permiso', per.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #ffae20; font-size: 10pt;"></b>&nbsp;&nbsp;Ausente', aus.count()]);
                      tablaInf.row.add(['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="fa fa-circle" style="color: #dedede; font-size: 10pt;"></b>&nbsp;&nbsp;Sin marca', sin.count()]);
                      tablaInf.draw();
                    }

                    var cuerpoJefe = '';
                    cuerpoJefe += '<option selected value="Todos">Todos</option>';
                    for(var i = 0; i < table.column(10).data().unique().length; i++){
                      if(table.column(10).data().unique()[i] !== null){
                        cuerpoJefe += '<option value="' + table.column(10).data().unique()[i] + '">' + table.column(10).data().unique()[i] + '</option>';
                      }
                    }
                    $("#jefaturaInformeDisponibilidad").html(cuerpoJefe);

                    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                      $("#jefaturaInformeDisponibilidad").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                      });
                    }

                    setTimeout(async function(){
                      setTimeout(function(){
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                          setTimeout(function(){
                            $('#InformeDisponibilidad').DataTable().columns.adjust();
                            $('#infoInformeDisponibilidad').DataTable().columns.adjust();
                            $('#InformeDisponibilidadJefatura').DataTable().columns.adjust();
                          },500);
                        },2000);
                      },1000);
                      menuElegant();
                    },500);
                  }
              });
            }
          }

          graficaDispoEvolucion();

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            var h = $(window).height() - 350;
            $("#evoluInformDisponibilidad").css("height",h);
          }
          else{
            var h = $(window).height() - 250;
            $("#evoluInformDisponibilidad").css("height",h);
          }

          await esconderMenu();
        }, 200);
      }
    }
  });
});

app.controller("informePracticaMetasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
$('#footer').show();

          await $.ajax({
            url:   'controller/datosInformePracticasGlobalPeriodo.php',
            type:  'post',
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoPeriodo = '';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + p2.aaData[i].PERIODO + '">' + p2.aaData[i].PERIODO + '</option>';
                }
                $("#periodoPracticaMetas").html(cuerpoPeriodo);
              }
              else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoPracticaMetas").html(cuerpoPeriodo);
              }
            }
          });

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#periodoPracticaMetas").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          var path = window.location.href.split('#/')[1];

          var parametros = {
            'mes': $("#periodoPracticaMetas").val().split('-')[1],
            'ano': $("#periodoPracticaMetas").val().split('-')[0],
            'path': path
          }

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          var tablaPM = await $('#tablaPracticaMetas').DataTable( {
            ajax: {
                url: "controller/datosAvanceMetaPractica.php",
                type: 'POST',
                data: parametros
            },
            buttons: [
              {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8,9 ]
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              },
              {
                text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosOcultPracticaMeta"></span>&nbsp;&nbsp;Filtros',
                action: function(){
                  if($("#filtrosOcultPracticaMeta").height() > 100){
                    $("#filtrosOcultPracticaMeta").css("height","0");
                    $("#filtrosOcultPracticaMeta").fadeOut();
                    $("#spanButtonFiltrosOcultPracticaMeta").removeClass("fas fa-arrow-alt-circle-up");
                    $("#spanButtonFiltrosOcultPracticaMeta").addClass("fas fa-arrow-alt-circle-down");
                  }
                  else{
                    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                      $("#filtrosOcultPracticaMeta").css("height","190pt");
                    }
                    else{
                      $("#filtrosOcultPracticaMeta").css("height","350pt");
                    }
                    $("#filtrosOcultPracticaMeta").fadeIn();
                    $("#spanButtonFiltrosOcultPracticaMeta").removeClass("fas fa-arrow-alt-circle-down");
                    $("#spanButtonFiltrosOcultPracticaMeta").addClass("fas fa-arrow-alt-circle-up");
                  }
                }
              }
            ],
            "columns": [
              {
                data: 'S',
                width: "5px",
                orderable: false,
                className: 'select-checkbox',
                targets: [ 0 ]
              },
              {
                data: 'RUT'
              },
              {
                data: 'NOMBRE'
              },
              {
                data: 'PERFIL'
              },
              {
                data: 'SERVICIO'
              },
              {
                data: 'CLIENTE'
              },
              {
                data: 'ACTIVIDAD'
              },
              {
                data: 'COMUNA'
              },
              {
                data: 'META_MENSUAL',
                className: "centerDataTable"
              },
              {
                data: 'AVANCE',
                className: "centerDataTable"
              },
              {
                orderable: true,
                width: '250px',
                data: 'POR_AVANCE',
                render: function(data, type, row, meta) {
                    return '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight: bold; font-size: 8pt; width:' + row['POR_AVANCE'].toString() + '%;">' + row['POR_AVANCE'].toString() + ' %</div></div>';
                }
              }
            ],
            fixedColumns:   {
              leftColumns: 2
            },
            "select": {
                style: 'single'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            "order": [[ 10, "desc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
              "zeroRecords": "No hay datos disponibles",
              "info": "Registro _START_ de _END_ de _TOTAL_",
              "infoEmpty": "No hay datos disponibles",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json){
                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
$('#footer').show();

                  setTimeout(function(){
                    $("#filtrosOcultPracticaMeta").css("height","0");
                    $("#filtrosOcultPracticaMeta").fadeOut();
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },2000);
                    $('#tablaPracticaMetas').DataTable().columns.adjust();
                    $('#infoInformePracticaMetas').DataTable().columns.adjust();
                  },1000);
                  menuElegant();
                }
            });

          tablaPM.on( 'search.dt', function () {
            graficarCampiosMetaPractica();
          });

          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("incidenciasController", function() {
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarIncidencia();

          await esconderMenu();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();


        }, 200);
      }
    }
  });
});

app.controller("incidenciasAsignadasController", function() {
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $.ajax({
            url:   'controller/datosIncidenciasPeriodos.php', // 'controller/datosFiltrosFormulario.php',
            type:  'post',
            success: async function (responseFiltros) {
              var pFecha = jQuery.parseJSON(responseFiltros);
              if(pFecha.aaData.length !== 0) {
                var cuerpoPeriodo = '';
                for(var i = 0; i < pFecha.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + pFecha.aaData[i].PERIODO + '">' + pFecha.aaData[i].PERIODO + '</option>';
                }
                $("#periodoTablaIncidencias").html(cuerpoPeriodo);
              } else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoTablaIncidencias").html(cuerpoPeriodo);
              }
              var [ fecIni, fecEnd ] = formatoRangoFecha(`${$("#periodoTablaIncidencias").val()}-01`);
              await $('#tablaIncidencia').DataTable({
                ajax: {
                  url: "controller/datosIncidencias.php",
                  type: 'POST',
                  data: {
                    fecIni: fecIni,
                    fecEnd: fecEnd
                  }
                },
                columns: [
                  { data: 'S'},
                  { data: 'IDINCIDENCIA_RESULTADO', className: "centerDataTable"},
                  { data: 'ESTADO' },
                  { data: 'FECHA' },
                  { data: 'HORA' },
                  { data: 'SLA' },
                  { data: 'DIFF' },
                  { data: 'AREA', className: "centerDataTable"},
                  { data: 'ITEM'},
                  { data: 'ELEME'},
                  { data: 'ANOMA'},
                  { data: 'DEPAR'},
                  { data: 'ALERT'},
                  { data: 'PRIORIDAD', className: "centerDataTable"},
                  { data: 'SERV'},
                  { data: 'CLIE' },
                  { data: 'ACT' },
                  { data: 'RUT_AUDITOR' },
                  { data: 'RESOLUTOR' },
                  { data: 'FILE', className: 'centerDataTable' }
                ],
                buttons: [
                    {
                      extend: 'excel',
                      exportOptions: {
                        columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18 ]
                      },
                      title: null,
                      text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                    },
                    {
                      text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                      action: function ( e, dt, node, config ) {
                        var table = $('#tablaIncidencia').DataTable();
                        $("#cambiarEstadoIncidencia").attr("disabled","disabled");
                        $("#derivarIncidencia").attr("disabled","disabled");
                        $("#confirmarIncidencia").attr("disabled","disabled");
                        $("#reactivarIncidencia").attr("disabled","disabled");
                        $("#historialIncidencia").attr("disabled","disabled");
                        table.rows().deselect();
                      }
                    }
                ],
                "columnDefs": [
                  {
                    "width": "5px",
                    "targets": 0
                  },
                  {
                    "orderable": false,
                    "className": 'select-checkbox',
                    "targets": [ 0 ]
                  }
                ],
                "select": {
                  style: 'single',
                  selector: 'td:not(:nth-child(20))'
                },
                fixedColumns:   {
                  leftColumns: 2
                },
                "scrollX": true,
                "paging": true,
                "ordering": true,
                "scrollCollapse": true,
                "info":     true,
                "order": [[ 1, "desc" ]],
                "lengthMenu": [[largo], [largo]],
                "dom": 'Bfrtip',
                "language": {
                  "zeroRecords": "No hay datos disponibles",
                  "info": "Registro _START_ de _END_ de _TOTAL_",
                  "infoEmpty": "No hay datos disponibles",
                  "paginate": {
                      "previous": "Anterior",
                      "next": "Siguiente"
                    },
                    "search": "Buscar: ",
                    "select": {
                        "rows": "- %d registros seleccionados"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros)"
                },
                "destroy": true,
                "autoWidth": false,
                "initComplete": function( settings, json) {
                  var table = $('#tablaIncidencia').DataTable();

                  var estadoInc = '';
                  estadoInc += '<option selected value="Todos">Todos</option>';
                  for(var i = 0; i < table.column(2).data().unique().length; i++){
                    if(table.column(2).data().unique()[i] !== null){
                      estadoInc += '<option value="' + table.column(2).data().unique()[i] + '">' + table.column(2).data().unique()[i] + '</option>';
                    }
                  }
                  $("#estadoTablaIncidencias").html(estadoInc);

                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
$('#footer').show();

                  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $("#periodoTablaIncidencias").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#estadoTablaIncidencias").select2({
                        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                  }

                  esconderMenu();
                  menuElegant();
                  setTimeout(async function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaIncidencia').DataTable().columns.adjust();
                    },500);
                  },2000);
                }
              });
            }
          });

          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path
          }

          await $.ajax({
            url:   'controller/datosAccionesVisibles.php',
            type:  'post',
            data: parametros,
            success: function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                for(var i = 0; i < p.aaData.length; i++) {
                  if(p.aaData[i].VISIBLE == 1){
                    if(p.aaData[i].ENABLE == 1){
                      $("#accionesIncidencia").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                    }
                    else{
                      $("#accionesIncidencia").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                    }
                  }
                }
              }
            }
          });

          setTimeout(function(){
            var js = document.createElement('script');
            js.src = 'view/js/funciones.js?idLoad=205';
            document.getElementsByTagName('head')[0].appendChild(js);
          },500);
        }, 200);
      }
    }
  });
});

app.controller("incidenciasConfiguracionController", function() {
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          await cargarIncidenciaTablaSinConfiguracion(); // CC2
          await esconderMenu();
        }, 200);
      }
    }
  });
});

app.controller("informeFallasPracticaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
$('#footer').show();

          await $.ajax({
            url:   'controller/datosInformePracticasGlobalPeriodo.php',
            type:  'post',
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoPeriodo = '';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoPeriodo += '<option value="' + p2.aaData[i].PERIODO + '">' + p2.aaData[i].PERIODO + '</option>';
                }
                $("#periodoInformeFallas").html(cuerpoPeriodo);
              }
              else{
                var cuerpoPeriodo = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoInformeFallas").html(cuerpoPeriodo);
              }
            }
          });

          var largo = Math.trunc($(window).height() - 300);
          var path = window.location.href.split('#/')[1];

          var parametros = {
            'mes': $("#periodoInformeFallas").val().split('-')[1],
            'ano': $("#periodoInformeFallas").val().split('-')[0],
            'path': path
          }

          await $.ajax({
            url:   'controller/datosProblemasPracticasAuditoria.php',
            type:  'post',
            data:   parametros,
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                var cuerpoAudit = '';
                for(var i = 0; i < p2.aaData.length; i++){
                  cuerpoAudit += '<option selected value="' + p2.aaData[i].IDAUDITORIA + '">&nbsp;&nbsp;' + p2.aaData[i].AUDITORIA + '</option>';
                }
                $("#auditoriaInformeFallas").html(cuerpoAudit);
              }
            }
          });

          $("#auditoriaInformeFallas").multiSelect({
            selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
            selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
            selectableHeader: "<input id='dispoArea' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input id='selectArea' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            afterInit: function(ms){
              var that = this,
                  $selectableSearch = that.$selectableUl.prev(),
                  $selectionSearch = that.$selectionUl.prev(),
                  selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                  selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

              that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
              .on('keydown', function(e){
                if (e.which === 40){
                  that.$selectableUl.focus();
                  return false;
                }
              });

              that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
              .on('keydown', function(e){
                if (e.which == 40){
                  that.$selectionUl.focus();
                  return false;
                }
              });
            },
            afterSelect: function(){
              this.qs1.cache();
              this.qs2.cache();
            },
            afterDeselect: function(){
              this.qs1.cache();
              this.qs2.cache();
            }
          });

          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#periodoInformeFallas").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
            $("#graficoInformeFallas").css("height",$("#filtrosInformeFallas").height());
          }

          await graficaInformeFalla();

          await esconderMenu();
        },200);
      }
    }
  });
});

// Consulta Asignaciones
app.controller("asignacionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          await $.ajax({
            url:   'controller/datosSelectorPeriodosAsignaciones.php',
            type:  'post',
            success: function (response) {
              var p = jQuery.parseJSON(response);
              var cuerpoSelect = '';
              if(p.aaData.length !== 0) {
                for(var i = 0; i < p.aaData.length; i++){
                  if(i == 0){
                    cuerpoSelect += '<option select value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                  else{
                    cuerpoSelect += '<option value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                }
                $("#fechaAsignacion").html(cuerpoSelect);
              }
              else{
                cuerpoSelect = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#fechaAsignacion").html(cuerpoSelect);
              }
            }
          });

          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path,
            "ano": $("#fechaAsignacion").val().split("-")[0],
            "mes": $("#fechaAsignacion").val().split("-")[1]
          }

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaListadoAsignacion').DataTable( {
              ajax: {
                  url: "controller/datosAsignacionVehiculo.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDPATENTE_ASIGNACIONES' },
                  { data: 'CODIGO'},
                  { data: 'FECHA'},
                  { data: 'HORA' },
                  { data: 'TIPO' },
                  { data: 'COMUNA' },
                  { data: 'DNI'},
                  { data: 'PERSONAL'},
                  { data: 'TELEFONO'},
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD'},
                  { data: 'ESTADO'},
                  { data: 'CHECKLIST', className: "centerDataTable" },
                  { data: 'LIC', className: "centerDataTable" },
                  { data: 'ASIG', className: "centerDataTable" }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              // "responsive": {
              //     details: {
              //         renderer: function ( api, rowIdx, columns ) {
              //             var data = $.map( columns, function ( col, i ) {
              //                 return col.hidden ?
              //                     '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
              //                         '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
              //                         '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
              //                     '</tr>' :
              //                     '';
              //             } ).join('');
              //
              //             return data ?
              //                 $('<table/>').append( data ) :
              //                 false;
              //         }
              //     }
              // },
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaListadoAsignacion').DataTable();

                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#fechaAsignacion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }

                setTimeout(async function(){
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaListadoAsignacion').DataTable().columns.adjust();
                    },500);
                  },2000)
                },1500);
              }
          });

          await esconderMenu();
          setTimeout(async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }
            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesAsignacionFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesAsignacionFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            if ($('#filtroEstadoAsignacion').prop('checked') ) {
              var table = $("#tablaListadoAsignacion").DataTable();
              table.columns('13').search('').draw();
            }
            else{
              var table = $("#tablaListadoAsignacion").DataTable();

              var val = [];

              val.push("Generada");
              val.push("En Revisión");

              var data = val.join('|');

              table.column('13').search( data ? data : '', true, false ).draw();
            }
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Asignacion

app.controller("dashController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#dashB").attr("src","https://datastudio.google.com/embed/reporting/9b8ae9c1-188f-4664-b94d-37711a78f407/page/p_gockl5etnc");
  setTimeout(function(){
    $("#dashB").attr("width","98%");
    $("#dashB").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

// Consulta Clausulas
app.controller("clausulasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          var parametros = {
            "path": path
          }
          await $('#tablaListadoClausulas').DataTable( {
              ajax: {
                  url: "controller/datosClausulas.php",
                  type: 'POST',
                  data: parametros
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDPATENTE_CLAUSULAS'},
                  { data: 'CLAUSULA' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(async function(){
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },2000);
                  $('#tablaListadoClausulas').DataTable().columns.adjust();
                },500);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesClausulas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesClausulas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Clausulas

// Consulta Desasignaciones
app.controller("desasignacionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          await $.ajax({
            url:   'controller/datosSelectorPeriodoDesasignaciones.php',
            type:  'post',
            success: function (response) {
              var p = jQuery.parseJSON(response);
              var cuerpoSelect = '';
              if(p.aaData.length !== 0) {
                for(var i = 0; i < p.aaData.length; i++){
                  if(i == 0){
                    cuerpoSelect += '<option select value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                  else{
                    cuerpoSelect += '<option value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                }
                $("#fechaDesasignacion").html(cuerpoSelect);
              }
              else{
                cuerpoSelect = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#fechaDesasignacion").html(cuerpoSelect);
              }
            }
          });

          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          var parametros = {
            "path": path,
            "ano": $("#fechaDesasignacion").val().split("-")[0],
            "mes": $("#fechaDesasignacion").val().split("-")[1]
          }
          if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#fechaDesasignacion").select2({
                theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
            });
          }

          await $('#tablaListadoDesasignacion').DataTable( {
              ajax: {
                  url: "controller/datosDesasignacionVehiculo.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDPATENTE_DESASIGNACIONES' },
                  { data: 'CODIGO'},
                  { data: 'FECHA'},
                  { data: 'HORA' },
                  { data: 'TIPO' },
                  { data: 'COMUNA' },
                  { data: 'DNI'},
                  { data: 'PERSONAL'},
                  { data: 'TELEFONO'},
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD'},
                  { data: 'ESTADO'},
                  { data: 'CHECKLIST', className: "centerDataTable" }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              // "responsive": {
              //     details: {
              //         renderer: function ( api, rowIdx, columns ) {
              //             var data = $.map( columns, function ( col, i ) {
              //                 return col.hidden ?
              //                     '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
              //                         '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
              //                         '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
              //                     '</tr>' :
              //                     '';
              //             } ).join('');
              //
              //             return data ?
              //                 $('<table/>').append( data ) :
              //                 false;
              //         }
              //     }
              // },
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaListadoDesasignacion').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoDesasignacion').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout( async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesDesasignacionFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesDesasignacionFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            if ($('#filtroEstadoDesasignacion').prop('checked') ) {
              var table = $("#tablaListadoDesasignacion").DataTable();
              table.columns('13').search('').draw();
            }
            else{
              var table = $("#tablaListadoDesasignacion").DataTable();

              var val = [];

              val.push("Generada");
              val.push("En Revisión");

              var data = val.join('|');

              table.column('13').search( data ? data : '', true, false ).draw();
            }
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Desasignacion

app.controller("mantenedorZonasOrdenController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorZonas').DataTable( {
              ajax: {
                  url: "controller/datosZonasOrdenes.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO' } ,
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD' },
                  { data: 'COMUNA' },
                  { data: 'ACTIVA' },
                  { data: 'IDESTRUCTURA_OPERACION' },
                  { data: 'IDAREAFUNCIONAL' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorZonas').DataTable();
                      $("#eliminarZonaOrden").attr("disabled","disabled");
                      $("#activarZonaOrden").attr("disabled","disabled");
                      $("#asignarPersonalZonaOrden").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 7 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 8 ]
                }
              ],
              "select": {
                  style: 'multi'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorZonas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorZonas").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorZonas').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("ordenesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#fechaOrden").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:2040',
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
          });

          $("#fechaOrden").val(moment().format('YYYY-MM-DD').toString());

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          var parametros = {
            "fecha": $("#fechaOrden").val(),
            "path": window.location.href.split('#/')[1]
          }

          await $('#tablaOrdenes').DataTable( {
              ajax: {
                  url: "controller/datosOrdenesFecha.php",
                  type: 'POST',
                  data: parametros
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'PROYECTO'},
                  { data: 'COMUNA'},
                  { data: 'CATEGORIA'},
                  { data: 'TIPO'},
                  { data: 'SUB_TIPO'},
                  { data: 'TECNOLOGIA'},
                  { data: 'ESTADO'},
                  { data: 'SUB_ESTADO'},
                  { data: 'Q_AGENDA', className: "centerDataTable"},
                  { data: 'FECHA_CREACION', render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                  { data: 'FECHA_AGENDA', render: $.fn.dataTable.render.moment( 'YYYY-MM-DD', 'DD-MM-YYYY' )},
                  { data: 'HORA_AGENDA', className: "centerDataTable"},
                  { data: 'TRAMO'},
                  { data: 'FECHA_ATENCION'},
                  { data: 'HORA_INICIO'},
                  { data: 'HORA_FIN'},
                  { data: 'DIRECCION'},
                  { data: 'DNI_CLIENTE'},
                  { data: 'NOMBRE_CLIENTE'},
                  { data: 'FONO_CLIENTE'},
                  { data: 'EMPRESA'},
                  { data: 'DESPACHO'},
                  { data: 'TECNICO'},
                  { data: 'IDORDEN'},
                  { data: 'LATITUD'},
                  { data: 'LONGITUD'},
                  { data: 'ESTADO_TEXTO'},
                  { data: 'SUB_ESTADO_TEXTO'},
                  { data: 'DNI_DESPACHO'},
                  { data: 'RUT_TECNICO'},
                  { data: 'IDESTRUCTURA_OPERACION'},
                  { data: 'IDAREAFUNCIONAL'},
                  { data: 'DIRECCIONLIMPIA'},
                  { data: 'IDORDEN_ESTADO'},
                  { data: 'OBSERVACION'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23, 24 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaOrdenes').DataTable();
                      $("#agendarOrden").attr("disabled", "disabled");
                      $("#asignarDespachoOrden").attr("disabled", "disabled");
                      $("#asignarTecnicoOrden").attr("disabled", "disabled");
                      $("#botonEstadoOrden").attr("disabled", "disabled");
                      $("#completarOrden").attr("disabled", "disabled");
                      $("#observacionOrden").attr("disabled", "disabled");
                      $("#historialOrden").attr("disabled", "disabled");
                      table.rows().deselect();
                    }
                  },
                  {
                    text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosOrden"></span>&nbsp;&nbsp;Filtros',
                    action: function(){
                      if($("#filtrosOrden").height() > 100){
                        $("#filtrosOrden").css("height","0");
                        $("#filtrosOrden").fadeOut();
                        $("#spanButtonFiltrosOrden").removeClass("fas fa-arrow-alt-circle-up");
                        $("#spanButtonFiltrosOrden").addClass("fas fa-arrow-alt-circle-down");
                      }
                      else{
                        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                          $("#filtrosOrden").css("height","150pt");
                        }
                        else{
                          $("#filtrosOrden").css("height","720pt");
                        }
                        $("#filtrosOrden").fadeIn();
                        $("#spanButtonFiltrosOrden").removeClass("fas fa-arrow-alt-circle-down");
                        $("#spanButtonFiltrosOrden").addClass("fas fa-arrow-alt-circle-up");
                      }
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 25 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 26 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 27 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 28 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 29 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 30 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 31 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 32 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 33 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 34 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 35 ]
                },
                {
                  "visible": false,
                  "searchable": true,
                  "targets": [ 36 ]
                }
              ],
              fixedColumns:   {
                leftColumns: 2
              },
              "select": {
                  style: 'multi'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": true,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                var table = $('#tablaOrdenes').DataTable();

                var comunaOr = '';
                comunaOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(3).data().unique().length; i++){
                  if(table.column(3).data().unique()[i] !== null){
                    comunaOr += '<option value="' + table.column(3).data().unique()[i] + '">' + table.column(3).data().unique()[i] + '</option>';
                  }
                }
                $("#comunaOrden").html(comunaOr);

                var categoriaOr = '';
                categoriaOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(4).data().unique().length; i++){
                  if(table.column(4).data().unique()[i] !== null){
                    categoriaOr += '<option value="' + table.column(4).data().unique()[i] + '">' + table.column(4).data().unique()[i] + '</option>';
                  }
                }
                $("#categoriaOrden").html(categoriaOr);

                var tipoOr = '';
                tipoOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(5).data().unique().length; i++){
                  if(table.column(5).data().unique()[i] !== null){
                    tipoOr += '<option value="' + table.column(5).data().unique()[i] + '">' + table.column(5).data().unique()[i] + '</option>';
                  }
                }
                $("#tipoOrden").html(tipoOr);

                var estadoOr = '';
                estadoOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(28).data().unique().length; i++){
                  if(table.column(28).data().unique()[i] !== null){
                    estadoOr += '<option value="' + table.column(28).data().unique()[i] + '">' + table.column(28).data().unique()[i] + '</option>';
                  }
                }
                $("#estadoOrden").html(estadoOr);

                var subEstadoOr = '';
                subEstadoOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(29).data().unique().length; i++){
                  if(table.column(29).data().unique()[i] !== null){
                    subEstadoOr += '<option value="' + table.column(29).data().unique()[i] + '">' + table.column(29).data().unique()[i] + '</option>';
                  }
                }
                $("#subEstadoOrden").html(subEstadoOr);

                var tramoOr = '';
                tramoOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(14).data().unique().length; i++){
                  if(table.column(14).data().unique()[i] !== null){
                    tramoOr += '<option value="' + table.column(14).data().unique()[i] + '">' + table.column(14).data().unique()[i] + '</option>';
                  }
                }
                $("#tramoOrden").html(tramoOr);

                var agendasOr = '';
                agendasOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(10).data().unique().length; i++){
                  if(table.column(10).data().unique()[i] !== null){
                    agendasOr += '<option value="' + table.column(10).data().unique()[i] + '">' + table.column(10).data().unique()[i] + '</option>';
                  }
                }
                $("#reagendamientoOrden").html(agendasOr);

                var proyectoOr = '';
                proyectoOr += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(2).data().unique().length; i++){
                  if(table.column(2).data().unique()[i] !== null){
                    proyectoOr += '<option value="' + table.column(2).data().unique()[i] + '">' + table.column(2).data().unique()[i] + '</option>';
                  }
                }
                $("#proyectoOrden").html(proyectoOr);

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#comunaOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#categoriaOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#tipoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#tramoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#estadoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#subEstadoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#reagendamientoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'),
                      sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
                  });
                  $("#proyectoOrden").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesOrdenes").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesOrdenes").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);
                  //
                  $("#filtrosOrden").css("height","0");
                  $("#filtrosOrden").fadeOut();
                  setTimeout(function(){
                    $("#spanButtonFiltrosOrden").click();
                  },200);
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaOrdenes').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();

        },200);
        menuElegant();
      }
    }
  });
});

// Consulta Siniestros
app.controller("siniestrosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          await $.ajax({
            url:   'controller/datosSelectorPeriodoSiniestros.php',
            type:  'post',
            success: function (response) {
              var p = jQuery.parseJSON(response);
              var cuerpoSelect1 = '';
              if(p.aaData.length !== 0) {
                for(var i = 0; i < p.aaData.length; i++){
                  if(i == 0){
                    cuerpoSelect1 += '<option select value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                  else{
                    cuerpoSelect1 += '<option value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                }
                $("#periodoFiltroSiniestros").html(cuerpoSelect1);
              }
              else{
                cuerpoSelect1 = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoFiltroSiniestros").html(cuerpoSelect1);
              }
            }
          });

          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path,
            "ano": $("#periodoFiltroSiniestros").val().split("-")[0],
            "mes": $("#periodoFiltroSiniestros").val().split("-")[1]
          }

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaListadoSiniestros').DataTable( {
              ajax: {
                  url: "controller/datosSiniestros.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDPATENTE_SINIESTROS', className: "centerDataTable" },
                  { data: 'CODIGO'},
                  { data: 'ESTADO'},
                  { data: 'PATENTE_REEMPLAZO'},
                  { data: 'N_SINIESTRO', className: "centerDataTable"},
                  { data: 'N_FACTURA', className: "centerDataTable"},
                  { data: 'FECHA'},
                  { data: 'HORA' },
                  { data: 'GRAVEDAD' },
                  { data: 'DNI'},
                  { data: 'PERSONAL'},
                  { data: 'TELEFONO'},
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD'},
                  { data: 'COMUNA'},
                  { data: 'DESCUENTO'},
                  { data: 'MONTODESC', render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                  { data: 'COSTOTOTAL', render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                  { data: 'USUARIO'},
                  { data: 'PDF_SINIESTRO', className: "centerDataTable" },
                  { data: 'PDF_DECLARACION', className: "centerDataTable" },
                  { data: 'PDF_DECLARACION_ASEG', className: "centerDataTable" },
                  { data: 'PDF_LIC_CED', className: "centerDataTable" },
                  { data: 'PDF_DESCUENTO', className: "centerDataTable" }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              fixedColumns:   {
                leftColumns: 3
              },
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                // {
                //   "orderable": false,
                //   "className": 'select-checkbox',
                //   "targets": [ 0 ]
                // },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": false,
              "responsive": {
                  details: {
                      renderer: function ( api, rowIdx, columns ) {
                          var data = $.map( columns, function ( col, i ) {
                              return col.hidden ?
                                  '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                      '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                      '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                  '</tr>' :
                                  '';
                          } ).join('');

                          return data ?
                              $('<table/>').append( data ) :
                              false;
                      }
                  }
              },
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaListadoSiniestros').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                var gravedadSel = '';
                gravedadSel += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(7).data().unique().length; i++){
                  if(table.column(7).data().unique()[i] !== null){
                    gravedadSel += '<option value="' + table.column(7).data().unique()[i] + '">' + table.column(7).data().unique()[i] + '</option>';
                  }
                }
                $("#tipoFiltroSiniestros").html(gravedadSel);

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#periodoFiltroSiniestros").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#tipoFiltroSiniestros").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }

                setTimeout(async function(){
                  $('#tablaListadoSiniestros').DataTable().columns.adjust();
                },1500);
              }
          });
          await esconderMenu();
          setTimeout( async function(){

            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesSiniestrosFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesSiniestrosFlota").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Siniestro

app.controller("ordenesAsignadasController", function(){
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(function(){
          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          w = $(document).width();
          h = $(document).height() - 150;

          $("#timelineOrdenesAsignadas").css("height", h);

          var hoy = moment().format('YYYY-MM-DD');
          $("#fechaOrdenesAsignadas").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            // minDate: min,
            // maxDate: min,
            yearRange: '1920:2040',
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
          });
          $("#fechaOrdenesAsignadas").val(hoy.toString());

          dibujaTimeline($("#fechaOrdenesAsignadas").val());

          lineaTiempo = setInterval(function() {
            dibujaTimeline($("#fechaOrdenesAsignadas").val());
          }, 60000);

          $.ajax({
            url:   'controller/datosOrdenColorTimeline.php',
            type:  'post',
            success: function (response2) {
              var p2 = jQuery.parseJSON(response2);
              if(p2.aaData.length !== 0){
                for(var i = 0; i < p2.aaData.length; i++){
                  $("#padreColoresOrdenAsignadas").append('<b class="fa fa-circle" style="color: '+ p2.aaData[i].COLOR_TIMELINE +'; font-size: 10pt; margin-top: 10pt;"></b>&nbsp;&nbsp;<span style="margin-right: 10pt; margin-top: 30pt;">'+ p2.aaData[i].SUB_ESTADO +'</span>');
                }
              }
            }
          });
          menuElegant();
        },200);
      }
    }
  });
});

app.controller("mantenedorTipoOrdenController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorTipos').DataTable( {
              ajax: {
                  url: "controller/datosOrdenTipo.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDORDEN_TIPO' , className: "centerDataTable" },
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD' },
                  { data: 'CLASIFICACION' },
                  { data: 'TIPO' },
                  { data: 'MINUTOS', className: "centerDataTable" },
                  { data: 'IDESTRUCTURA_OPERACION' },
                  { data: 'IDORDEN_CLASIFICACION' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorTipos').DataTable();
                      $("#eliminarTipoOrden").attr("disabled","disabled");
              				$("#editarTipoOrden").attr("disabled", "disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 8 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 9 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorTipos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorTipos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorTipos').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

// Consulta mantencion
app.controller("mantencionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          var calendarEl = document.getElementById('calendario');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'standard',
            height: $(window).height() - 120,
            timezoneParam: 'America/Santiago',
            locale: 'es',
            firstDay: 1,
            buttonIcons: true,
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: true,
            selectable: false,
            weekNumbers: false,
            eventDisplay: 'block',
            titleFormat: { year: 'numeric', month: 'numeric' },
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth'
            },
            events: "controller/datosCalendar.php",
            dateClick: async function(info){
                var dia = info.dateStr;
                var actual = moment().format('YYYY-MM-DD').toString();
                $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
                $('#modalAlertasSplash').modal('show');
                if(moment(dia).isSameOrAfter(actual, 'day')){
                  $("#horaAgregarMantencion").html("");
                  $("#guardarAgregarMantencion").attr("disabled","disabled");
                  $("#rutAgregarMantencion").val("");
                  $("#nombreAgregarMantencion").val("");
                  $("#direccionTallerAgregarMantencion").val("")
                  $("#correoAgregarMantencion").val("");
                  $("#celularAgregarMantencion").val("");
                  $("#patenteAgregarMantencion").val("");
                  $("#marcaAgregarMantencion").val("");
                  $("#modeloAgregarMantencion").val("");
                  $("#anoAgregarMantencion").val("");
                  $("#kilometrajeAgregarMantencion").val("");
                  $("#siniestroAgregarMantencion").val("");
                  $("#observacionAgregarMantencion").val("");
                  $("#motivoAgregarMantencion").html('<option value="Mantencion_correctiva">Mantención correctiva</option>,<option value="Mantencion_preventiva">Mantención preventiva</option>,<option value="Siniestro">Siniestro</option>');
                  $("#nombreAgregarMantencion").attr("disabled","disabled");
                  $("#patenteAgregarMantencion").removeAttr("disabled","disabled");
                  $("#marcaAgregarMantencion").attr("disabled","disabled");
                  $("#modeloAgregarMantencion").attr("disabled","disabled");
                  $("#direccionTallerAgregarMantencion").attr("disabled","disabled");
                  $("#anoAgregarMantencion").attr("disabled","disabled");
                  $("#rutAgregarMantencion").removeAttr("disabled","disabled");
                  $("#rutAgregarMantencion").removeClass("is-invalid");
                  $("#patenteAgregarMantencion").removeClass("is-invalid");
                  $("#celularAgregarMantencion").removeClass("is-invalid");
                  $("#kilometrajeAgregarMantencion").removeClass("is-invalid");
                  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    $("#motivoAgregarMantencion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#horaAgregarMantencion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#sucursalAgregarMantencion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#siniestroAgregarMantencion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                    $("#tallerAgregarMantencion").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                    });
                  }

                  if($('select[id="motivoAgregarMantencion"] option:selected').text() === "Mantención correctiva" || $('select[id="motivoAgregarMantencion"] option:selected').text() === "Mantención preventiva"){
                    $("#siniestroAgregarMantencion").html('<option value="Ninguno">Ninguno</option>');
                    $("#siniestroAgregarMantencion").attr("disabled","disabled");
                  }
                  else{
                    $("#siniestroAgregarMantencion").removeAttr("disabled");
                  }

                  $("#motivoAgregarMantencion").unbind("click").change(async function(){
                    if($('select[id="motivoAgregarMantencion"] option:selected').text() === "Mantención correctiva" || $('select[id="motivoAgregarMantencion"] option:selected').text() === "Mantención preventiva"){
                      $("#siniestroAgregarMantencion").html('<option value="Ninguno">Ninguno</option>');
                      $("#siniestroAgregarMantencion").attr("disabled","disabled");
                    }
                    else{
                      $("#siniestroAgregarMantencion").removeAttr("disabled");
                    }
                  });

                  await $.ajax({
                    url:   'controller/datosSucursal.php',
                    type:  'post',
                    success: function (response2) {
                      var p2 = jQuery.parseJSON(response2);
                      if(p2.aaData.length !== 0){
                        var cuerpoS = '';
                        for(var i = 0; i < p2.aaData.length; i++){
                          if(p2.aaData[i].BODEGA_FLOTA === "SI"){
                            cuerpoS += '<option value="' + p2.aaData[i].IDSUCURSAL + '">' + p2.aaData[i].COMUNA + ' - ' + p2.aaData[i].SUCURSAL + '</option>';
                          }
                        }
                        $("#sucursalAgregarMantencion").html(cuerpoS);
                      }
                    }
                  });

                  var parametros = {
                    "fecha": info.dateStr
                  }
                  await $.ajax({
                    url:   'controller/datosRangoHoraMantencion.php',
                    type:  'post',
                    data: parametros,
                    success: function (response3) {
                      var p2 = jQuery.parseJSON(response3);
                      if(p2.aaData.length !== 0){
                        var cuerpoR = '';
                        for(var i = 0; i < p2.aaData.length; i++){
                          cuerpoR += '<option value="' + p2.aaData[i].IDMANTENCION_RANGOS + '">' + p2.aaData[i].RANGO + '</option>';
                        }
                        $("#horaAgregarMantencion").html(cuerpoR);
                      }
                    }
                  });

                  var param = {
                    "idSucursal": $("#sucursalAgregarMantencion").val(),
                  }
                  await $.ajax({
                    url:   'controller/datosTallerMantencion.php',
                    type:  'post',
                    data: param,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        var cuerpoM = '<option selected value=0>Seleccionar Taller</option>';
                        for(var i = 0; i < p.aaData.length; i++){
                          cuerpoM += '<option value="' + p.aaData[i].IDPATENTE_TALLER + '">' + p.aaData[i].NOMBRE + ' - ' + p.aaData[i].DIRECCION + '</option>';
                        }
                        $("#tallerAgregarMantencion").html(cuerpoM);
                      }
                      else{
                        $("#tallerAgregarMantencion").html('<option selected value=0>Seleccionar Taller</option>');
                      }
                    }
                  });

                  await $.ajax({
                    url:   'controller/datosRutForMantencion.php',
                    type:  'post',
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        var listaPersonalSiniestro = [];
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].CODIGO === null){
                            listaPersonalSiniestro.push(p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRE);
                          }else{
                            listaPersonalSiniestro.push(p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRE + ' - ' + p.aaData[i].CODIGO);
                          }
                        }
                        $('#rutAgregarMantencion').autocomplete({
                          // req will contain an object with a "term" property that contains the value
                          // currently in the text input.  responseFn should be invoked with the options
                          // to display to the user.
                          source: function (req, responseFn) {
                            // Escape any RegExp meaningful characters such as ".", or "^" from the
                            // keyed term.
                            var term = $.ui.autocomplete.escapeRegex(req.term),
                              // '^' is the RegExp character to match at the beginning of the string.
                              // 'i' tells the RegExp to do a case insensitive match.
                              matcher = new RegExp(term, 'i'),
                              // Loop over the options and selects only the ones that match the RegExp.
                              matches = $.grep(listaPersonalSiniestro, function (item) {
                                return matcher.test(item);
                              });
                            // Return the matched options.
                            responseFn(matches);
                          }
                        });
                      }
                    }
                  });

                  await $.ajax({
                    url:   'controller/datosPatenteForMantencion.php',
                    type:  'post',
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        var listaPersonalSiniestro = [];
                        for(var i = 0; i < p.aaData.length; i++) {
                          listaPersonalSiniestro.push(p.aaData[i].CODIGO);
                        }
                        $('#patenteAgregarMantencion').autocomplete({
                          // req will contain an object with a "term" property that contains the value
                          // currently in the text input.  responseFn should be invoked with the options
                          // to display to the user.
                          source: function (req, responseFn) {
                            // Escape any RegExp meaningful characters such as ".", or "^" from the
                            // keyed term.
                            var term = $.ui.autocomplete.escapeRegex(req.term),
                              // '^' is the RegExp character to match at the beginning of the string.
                              // 'i' tells the RegExp to do a case insensitive match.
                              matcher = new RegExp(term, 'i'),
                              // Loop over the options and selects only the ones that match the RegExp.
                              matches = $.grep(listaPersonalSiniestro, function (item) {
                                return matcher.test(item);
                              });
                            // Return the matched options.
                            responseFn(matches);
                          }
                        });
                      }
                    }
                  });

                  $("#fechaAgregarMantencion").val(info.dateStr);
                  $("#fechaAgregarMantencion").attr("disabled","disabled");

                  setTimeout(function(){
                    hora = $("#horaAgregarMantencion").val();
                    if(hora === null){
                      $("#buttonAceptarAlerta").css("display","inline");
                      $("#modalAlertas").modal({backdrop: 'static', keyboard: false});
                      var random = Math.round(Math.random() * (1000000 - 1) + 1);
                      alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No se puede ingresar una mantención por que no hay horario disponible");
                      setTimeout(function(){
                        $('#modalAlertasSplash').modal('hide');
                      },500);
                    }
                    else{
                      var h = $(window).height() - 200;
                      $("#bodyAgregarMantencion").css("height",h);
                      setTimeout(function(){
                        $('#modalAlertasSplash').modal('hide');
                        $("#agregarMantencion").modal("show");
                      },1000);
                    }
                    setTimeout(function(){
                      $('#bodyAgregarMantencion').animate({ scrollTop: 0 }, 'fast');
                    },200);
                  },500);
                }
                else{
                  $("#buttonAceptarAlerta").css("display","inline");
                  $("#modalAlertas").modal({backdrop: 'static', keyboard: false});
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No puede ingresar una agenda de mantención en días anteriores a hoy");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                }

            },
            eventClick: async function(calEvent){
              id = calEvent.event.extendedProps.descripcion.split("@@@@@")[0];
              $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
              $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
              $('#modalAlertasSplash').modal('show');
              parametros = {
                "idMantencion": id
              }
              await $.ajax({
                url:   'controller/datosCalendarSelect.php',
                type:  'post',
                data: parametros,
                success: function (response3) {
                  var p3 = jQuery.parseJSON(response3);
                  if(response3.localeCompare("Sin datos") != 0){
                    $("#patenteMantencion").html(p3.aaData[0].CODIGO);
                    $("#marcaMantencion").html(p3.aaData[0].MARCA);
                    $("#modeloMantencion").html(p3.aaData[0].MODELO);
                    $("#personalMantencion").html(p3.aaData[0].PERSONAL);
                    $("#correoMantencion").html(p3.aaData[0].CORREO_PERSONAL);
                    $("#telefonoMantencion").html(p3.aaData[0].CELULAR_PERSONAL);
                    $("#fechaMantencion").html(p3.aaData[0].FECHA);
                    $("#horaMantencion").html(p3.aaData[0].RANGO);
                    $("#sucursalMantencion").html(p3.aaData[0].SUCURSAL);
                    $("#tallerMantencion").html(p3.aaData[0].NOMBRE);
                    $("#direccionMantencion").html(p3.aaData[0].DIRECCION);
                    $("#motivoMantencion").html(p3.aaData[0].MOTIVO);
                    $("#folioSiniestroMantencion").html(p3.aaData[0].SINIESTRO);
                    $("#estadoMantencion").html(p3.aaData[0].ESTADO_FINAL);
                    $("#folioMantencion").html(id);

                    if(p3.aaData[0].PDF_AGENDA != null){
                      $("#agendaVerMantencion").removeAttr("disabled","disabled");
                      $("#colorAgendaVerMantencion").css("color","red");
                      $("#agendaVerMantencion").attr("onclick","pdf_Mantencion('/agenda/"+ p3.aaData[0].PDF_AGENDA + "');");
                    }
                    else{
                      $("#agendaVerMantencion").attr("disabled","disabled");
                      $("#colorAgendaVerMantencion").css("color","gray");
                    }

                    if(p3.aaData[0].PDF_DIAG != null){
                      $("#diagnosticoVerMantencion").removeAttr("disabled","disabled");
                      $("#colorDiagnosticoVerMantencion").css("color","red");
                      $("#diagnosticoVerMantencion").attr("onclick","pdf_Mantencion('/diagnostico/"+ p3.aaData[0].PDF_DIAG + "');");
                    }
                    else{
                      $("#diagnosticoVerMantencion").attr("disabled","disabled");
                      $("#colorDiagnosticoVerMantencion").css("color","gray");
                    }

                    if(p3.aaData[0].PDF_FACTURA != null){
                      $("#facturaVerMantencion").removeAttr("disabled","disabled");
                      $("#colorFacturaVerMantencion").css("color","red");
                      $("#facturaVerMantencion").attr("onclick","pdf_Mantencion('/factura/"+ p3.aaData[0].PDF_FACTURA + "');");
                    }
                    else{
                      $("#facturaVerMantencion").attr("disabled","disabled");
                      $("#colorFacturaVerMantencion").css("color","gray");
                    }

                    if(p3.aaData[0].PDF_OC != null){
                      $("#ocVerMantencion").removeAttr("disabled","disabled");
                      $("#colorOcVerMantencion").css("color","red");
                      $("#ocVerMantencion").attr("onclick","pdf_Mantencion('/oc/"+ p3.aaData[0].PDF_OC + "');");
                    }
                    else{
                      $("#ocVerMantencion").attr("disabled","disabled");
                      $("#colorOcVerMantencion").css("color","gray");
                    }

                    if(p3.aaData[0].ESTADO === "Agendada" && p3.aaData[0].SUBESTADO === "Agendada"){
                      if(p3.aaData[0].PDF_AGENDA != null && p3.aaData[0].PDF_DIAG != null && p3.aaData[0].PDF_FACTURA != null &&  p3.aaData[0].PDF_OC != null){
                        $("#subirPdfMantencion").attr("disabled","disabled");
                        $("#cancelarMantencion").removeAttr("disabled","disabled");
                        $("#completarMantencion").removeAttr("disabled","disabled");
                      }
                      else{
                        $("#subirPdfMantencion").removeAttr("disabled","disabled");
                        $("#completarMantencion").removeAttr("disabled","disabled");
                        $("#cancelarMantencion").removeAttr("disabled","disabled");
                      }
                    }
                    else if(p3.aaData[0].ESTADO === "Taller" && p3.aaData[0].SUBESTADO === "Ingresado"){
                      $("#subirPdfMantencion").removeAttr("disabled","disabled");
                      $("#completarMantencion").removeAttr("disabled","disabled");
                      $("#cancelarMantencion").attr("disabled","disabled");
                      $("#ingregoTallerMantencion").attr("disabled","disabled");
                    }
                    else{
                      $("#subirPdfMantencion").attr("disabled","disabled");
                      $("#completarMantencion").attr("disabled","disabled");
                      $("#cancelarMantencion").attr("disabled","disabled");
                    }
                  }
                }
              });
              setTimeout(function(){
                var h = $(window).height() - 250;
                $("#bodyVerEvento").css("height",h);
                $('#modalAlertasSplash').modal('hide');
                $('#modalVerEvento').modal('show');
              },2000);
            },
            loading: async function(bool) {
              if(bool === false){
                var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
                var parametros = {
                  "mes": $("#fc-dom-1").html().split("/")[0],
                  "ano": $("#fc-dom-1").html().split("/")[1]
                }
                await $('#tablaCalendario').DataTable( {
                    ajax: {
                        url: "controller/datosPatenteMantencionLista.php",
                        type: 'POST',
                        data: parametros
                    },
                    columns: [
                        { data: 'S', className: "centerDataTable" },
                        { data: 'FOLIO', className: "centerDataTable" },
                        { data: 'ESTADO', className: "centerDataTable" },
                        { data: 'FECHA_HORA_AGENDA'},
                        { data: 'FECHA_INGRESO'},
                        { data: 'MOTIVO'},
                        { data: 'PATENTE' },
                        { data: 'COLABORADOR'},
                        { data: 'CORREO_PERSONAL'},
                        { data: 'CELULAR_PERSONAL'},
                        { data: 'TALLER' },
                        { data: 'DIRECCION_TALLER'},
                        { data: 'CONTACTO_TALLER'},
                        { data: 'FONO_TALLER' },
                        { data: 'PDF_AGENDA_D', className: "centerDataTable" },
                        { data: 'PDF_DIAG_D' , className: "centerDataTable" },
                        { data: 'PDF_FACTURA_D', className: "centerDataTable" },
                        { data: 'PDF_OC_D' , className: "centerDataTable" },
                        { data: 'PDF_AGENDA' },
                        { data: 'PDF_DIAG' },
                        { data: 'PDF_FACTURA'},
                        { data: 'PDF_OC' }
                    ],
                    buttons: [
                        {
                          extend: 'excel',
                          exportOptions: {
                            columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,18,19,20,21 ]
                          },
                          title: null,
                          text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                        },
                        {
                          text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                          action: function ( e, dt, node, config ) {
                            var table = $('#tablaCalendario').DataTable();
                            table.rows().deselect();
                          }
                        }
                    ],
                    "columnDefs": [
                      {
                        "width": "5px",
                        "targets": 0
                      },
                      // {
                      //   "orderable": false,
                      //   "className": 'select-checkbox',
                      //   "targets": [ 0 ]
                      // },
                      {
                        "visible": false,
                        "searchable": false,
                        "targets": [ 18 ]
                      },
                      {
                        "visible": false,
                        "searchable": false,
                        "targets": [ 19 ]
                      },
                      {
                        "visible": false,
                        "searchable": false,
                        "targets": [ 20 ]
                      },
                      {
                        "visible": false,
                        "searchable": false,
                        "targets": [ 21 ]
                      },
                    ],
                    "select": {
                        style: 'single'
                    },
                    "paging": true,
                    "ordering": true,
                    "scrollCollapse": true,
                    "scrollX": false,
                    "responsive": {
                        details: {
                            renderer: function ( api, rowIdx, columns ) {
                                var data = $.map( columns, function ( col, i ) {
                                    return col.hidden ?
                                        '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                            '<td style="font-weight: bold; min-width: 150px;">'+col.title+':'+'</td> '+
                                            '<td style="min-width: 150px; text-align: center;">'+col.data+'</td>'+
                                        '</tr>' :
                                        '';
                                } ).join('');

                                return data ?
                                    $('<table/>').append( data ) :
                                    false;
                            }
                        }
                    },
                    "info":     true,
                    "lengthMenu": [[largo], [largo]],
                    "dom": 'Bfrtip',
                    "language": {
                      "zeroRecords": "No hay datos disponibles",
                      "info": "Registro _START_ de _END_ de _TOTAL_",
                      "infoEmpty": "No hay datos disponibles",
                      "paginate": {
                          "previous": "Anterior",
                          "next": "Siguiente"
                        },
                        "search": "Buscar: ",
                        "select": {
                            "rows": "- %d registros seleccionados"
                        },
                        "infoFiltered": "(Filtrado de _MAX_ registros)"
                    },
                    "destroy": true,
                    "autoWidth": false,
                    "initComplete": function( settings, json){
                      setTimeout(function(){
                        $('#modalAlertasSplash').modal('hide');
                        setTimeout(function(){
                          $('#tablaCalendario').DataTable().columns.adjust();
                        },200);
                      },1000);
                    },
                    "drawCallback": function( settings ) {
                        setTimeout(function(){
                          $('#tablaCalendario').DataTable().columns.adjust();
                        },50);
                    }
                });
              }
              else{
                $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
                $('#modalAlertasSplash').modal('show');
              }
            }
          });

          calendar.render();

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();
          setTimeout(async function(){
            await esconderMenu();
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin Consulta mantencion

app.controller("mantenedorCategoriaOrdenController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorCategorias').DataTable( {
              ajax: {
                  url: "controller/datosOrdenCategoria.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDORDEN_CATEGORIA' , className: "centerDataTable" },
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD' },
                  { data: 'TIPO' },
                  { data: 'CATEGORIA' },
                  { data: 'IDESTRUCTURA_OPERACION' },
                  { data: 'IDORDEN_TIPO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorCategorias').DataTable();
                      $("#eliminarCategoriaOrden").attr("disabled","disabled");
              				$("#editarCategoriaOrden").attr("disabled", "disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 7 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 8 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorCategorias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorCategorias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorCategorias').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

// Consulta Rango Mantencion
app.controller("rangoMantencionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaRangoMantencion').DataTable( {
              ajax: {
                  url: "controller/datosRangoMantencion.php",
                  type: 'POST',
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDMANTENCION_RANGOS', className: "centerDataTable" },
                  { data: 'DIA', className: "centerDataTable"},
                  { data: 'RANGO', className: "centerDataTable"},
                  { data: 'MANTENCION', className: "centerDataTable"},
                  { data: 'TOPE', className: "centerDataTable" }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaRangoMantencion').DataTable();
                      $("#configurarRango").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Seleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaRangoMantencion').DataTable();
                      $("#configurarRango").removeAttr("disabled");
                      table.rows().select();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                style: 'multi',
                selector: 'td:not(:nth-child(2))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  $('#tablaRangoMantencion').DataTable().columns.adjust();
                },1500);
              }
          });
          await esconderMenu();
          setTimeout( async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        var table = $('#tablaRangoMantencion').DataTable();
                        var data = table.rows().count();
                        if (data !== 0 && p.aaData[i].IDBOTON == 'ingresarRango'){

                        }
                        else{
                          $("#accionesRangoMantencion").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                      }
                      else{
                          $("#accionesRangoMantencion").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Rango Mantencion

app.controller("mantenedorEstadosOrdenController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("mantenedorZonasObraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorZonasObra').DataTable( {
              ajax: {
                  url: "controller/datosZonasObras.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO' } ,
                  { data: 'SERVICIO' },
                  { data: 'CLIENTE'},
                  { data: 'ACTIVIDAD' },
                  { data: 'COMUNA' },
                  { data: 'ACTIVA' },
                  { data: 'IDESTRUCTURA_OPERACION' },
                  { data: 'IDAREAFUNCIONAL' },
                  { data: 'CORREO' },
                  { data: 'TELEFONO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorZonas').DataTable();
                      $("#eliminarZonaObra").attr("disabled","disabled");
                      $("#activarZonaObra").attr("disabled","disabled");
                      $("#asignarPersonalZonaObra").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 7 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 8 ]
                }
              ],
              "select": {
                  style: 'multi'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
$('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorZonasObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorZonasObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorZonasObra').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

// Consulta Listado Obras
app.controller("listadoObrasController", function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path,
          }
          await $('#tablaListadoObras').DataTable( {
              ajax: {
                  url: "controller/datosListadoObras.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDOBRA', className: "centerDataTable" },
                  { data: 'NOMBREOE'},
                  { data: 'ESTADO'},
                  { data: 'ESTADO_PERMISOS'},
                  { data: 'INIOE'},
                  { data: 'FINOE' },
                  { data: 'DIAS_FALTANTES', className: "centerDataTable"},
                  { data: 'CLIENTE'},
                  { data: 'DIRECCION' },
                  { data: 'COMUNA'},
                  { data: 'AGENCIA'},
                  { data: 'CENTRAL'},
                  { data: 'TIPO'},
                  { data: 'RED'},
                  { data: 'ITO'},
                  { data: 'PROYECTO'},
                  { data: 'PROYEC_INTER'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single',
                  // selector: 'td:not(:nth-child(3))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaListadoObras').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(async function(){
                  $('#tablaListadoObras').DataTable().columns.adjust();
                },1500);
              }
          });
          await esconderMenu();
          setTimeout( async function(){

           var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesListadoObras").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesListadoObras").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);

            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Listado Obras

// Consulta Contratos Obras
app.controller("contratosController", function(){
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoContratos').DataTable( {
              ajax: {
                  url: "controller/datosListadoContratos.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'NOMBRE'},
                  { data: 'ANO' },
                  { data: 'IDCONTRATO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(async function(){
                $('#tablaListadoContratos').DataTable().columns.adjust();
                },500);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesContratos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesContratos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Contratos Obra

app.controller("mantenedorFinancierasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasFinanzasEstructura();

          menuElegant();
        }, 200);
      }
    }
  });
});

app.controller("mantenedorGestionController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasGestion();

          menuElegant();
        }, 200);
      }
    }
  });
});

app.controller("mantenedorMaterialesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasMateriales();

          await esconderMenu();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();

        }, 200);
      }
    }
  });
});

app.controller("mantenedorProveedoresController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasProveedores();

          await esconderMenu();
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
          menuElegant();

        }, 200);
      }
    }
  });
});

app.controller("mantenedorServiciosController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasServicios();

          menuElegant();
        }, 200);
      }
    }
  });
});

app.controller("mantenedorPeticionesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          $('#contenido').fadeIn();
          $('#menu-lateral').fadeIn();
          $('#footer').parent().fadeIn();

          await cargarComprasPeticiones();
        }, 200);
      }
    }
  });
});

app.controller("solicitudCombustibleController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          await $.ajax({
            url:   'controller/datosSelectorPeriodoSolCombustible.php',
            type:  'post',
            success: function (response) {
              var p = jQuery.parseJSON(response);
              var cuerpoSelect1 = '';
              if(p.aaData.length !== 0) {
                for(var i = 0; i < p.aaData.length; i++){
                  if(i == 0){
                    cuerpoSelect1 += '<option select value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                  else{
                    cuerpoSelect1 += '<option value="' + p.aaData[i].PERIODO + '">' + p.aaData[i].PERIODO + '</option>';
                  }
                }
                $("#periodoSolCombustible").html(cuerpoSelect1);
              }
              else{
                cuerpoSelect1 = '<option value="' + moment().format('YYYY-MM').toString() + '">' + moment().format('YYYY-MM').toString() + '</option>';
                $("#periodoSolCombustible").html(cuerpoSelect1);
              }
            }
          });

          var parametros = {
            "ano": $("#periodoSolCombustible").val().split("-")[0],
            "mes": $("#periodoSolCombustible").val().split("-")[1]
          }

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaListadoSolCombustible').DataTable( {
              ajax: {
                  url: "controller/datosListaSolCombustible.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDCARGA_SOLICITADA', className: "centerDataTable" },
                  { data: 'ESTADO_CARGA'},
                  { data: 'CARGA_TIPO', className: "centerDataTable"},
                  { data: 'NOMBRE'},
                  { data: 'RUT'},
                  { data: 'PATENTE'},
                  { data: 'TARJETA' },
                  { data: 'PRODUCTO' },
                  { data: 'TIPO'},
                  { data: 'BODEGA'},
                  { data: 'FECHA_SOLICITUD', className: "centerDataTable"},
                  { data: 'HORA_SOLICITUD' , className: "centerDataTable"},
                  { data: 'FECHA_VALIDACION', className: "centerDataTable"},
                  { data: 'HORA_VALIDACION', className: "centerDataTable"},
                  { data: 'RUT_USUARIO'},
                  { data: 'MONTO', render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
                  { data: 'MONTO_VALIDADO', render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              fixedColumns:   {
                leftColumns: 4
              },
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                var table = $('#tablaListadoSolCombustible').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                var estadodSel = '';
                estadodSel += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(2).data().unique().length; i++){
                  if(table.column(2).data().unique()[i] !== null){
                    estadodSel += '<option value="' + table.column(2).data().unique()[i] + '">' + table.column(2).data().unique()[i] + '</option>';
                  }
                }
                $("#estadoSolicitudCombustible").html(estadodSel);

                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#periodoSolCombustible").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#estadoSolicitudCombustible").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }

                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoSolCombustible').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout( async function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesSolCombustible").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesSolCombustible").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });

            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Agencias Obras
app.controller("agenciasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoAgencias').DataTable( {
              ajax: {
                  url: "controller/datosListadoAgencias.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'NOMBRE'},
                  { data: 'IDAGENCIA' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoAgencias').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesAgencias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesAgencias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Agencias Obra

app.controller("mantenedorResponsablesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaMantenedorResponsables').DataTable( {
              ajax: {
                  url: "controller/datosRespProyectos.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'IDPROYECTO' },
                  { data: 'PROYECTO' },
                  { data: 'NOMENCLATURA' },
                  { data: 'DNI' },
                  { data: 'NOMBRE' },
                  { data: 'EMAIL' },
                  { data: 'FONO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(async function(){
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorResponsables').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesMantenedorResponsables").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesMantenedorResponsables").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

// Consulta Especialidad Obras
app.controller("especialidadController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoEspecialidad').DataTable( {
              ajax: {
                  url: "controller/datosListadoMantenedorEspecialidad.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'ESPECIALIDAD' },
                  { data: 'CODESP' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoEspecialidad').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesEspecialidad").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesEspecialidad").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Especialidad Obra

// Consulta Unidad de Obra
app.controller("unidadObraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoUnidadObra').DataTable( {
              ajax: {
                  url: "controller/datosListadoMantenedorUnidadObra.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'NOMBRE'},
                  { data: 'UM' },
                  { data: 'VALOR'},
                  { data: 'PROVEE'},
                  { data: 'CODUO' },
                  { data: 'CODIGO2_CLIENTE'},
                  { data: 'COD_FIN_CLIENTE' },
                  { data: 'CODIGO1_INTERNO'},
                  { data: 'CODIGO2_INTERNO'},
                  { data: 'CODIGO3_INTERNO'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoUnidadObra').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesUnidadObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesUnidadObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Unidad de Obra

// Consulta mano de Obra
app.controller("manoObraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoManoObra').DataTable( {
              ajax: {
                  url: "controller/datosListadoMantenedorManoObra.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'ESPECIALIDAD' },
                  { data: 'CODMO'},
                  { data: 'DESCRIPCION'},
                  { data: 'UM' },
                  { data: 'CANTIDAD'},
                  { data: 'PB'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoManoObra').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesManoObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesManoObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta mano de Obra

// Consulta valor mano de Obra
app.controller("valorManoObraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaListadoManoObraValor').DataTable( {
              ajax: {
                  url: "controller/datosListadoMantenedorValorManoObra.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'COMUNA' },
                  { data: 'AGENCIA'},
                  { data: 'ESPECIALIDAD'},
                  { data: 'VALOR', render: $.fn.dataTable.render.number( '.', ',', 0, '$ ' ), "defaultContent": '0' },
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoManoObraValor').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesManoObraValor").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesManoObraValor").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta valor mano de Obra

// Consulta Listado Ordenes de trabajo
app.controller("listadoOrdenesTrabajoController", function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path,
          }
          await $('#tablaListadoOrdenesTrabajo').DataTable( {
              ajax: {
                  url: "controller/datosListadoOrdenesTrabajo.php",
                  type: 'POST',
                  data: parametros,
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'IDOBRA'},
                  { data: 'NOMBREOE'},
                  { data: 'ESTADO'},
                  { data: 'TIPO'},
                  { data: 'PRESUPUESTO'},
                  { data: 'CUBICACION'},
                  { data: 'CONTRATO'},
                  { data: 'AGENCIA' },
                  { data: 'GESTOR'},
                  { data: 'SUPERVISOR'},
                  { data: 'EMPRESA_SUBCC' },
                  { data: 'GESTOR_SUBCC'},
                  { data: 'FECHA_TERMINO'},
                  { data: 'FECHA_INI_TERRENO'},
                  { data: 'FECHA_FIN_TERRENO'},
                  { data: 'FECHA_ASIGNACION'},
                  { data: 'FECHA_CREACION'},
                  { data: 'HORA_CREACION'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    //text: '<span class="fas fa-arrow-alt-circle-down" id="spanButtonFiltrosListadoAsignaciones"></span>&nbsp;&nbsp;Filtros',
                    text: 'Ver OT',
                    action: function( e, dt, node, config ){
                      var table = $("#tablaListadoOrdenesTrabajo").DataTable();
                      if(table.rows('.selected').data().length > 0){
                        $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                        $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
                        $('#modalAlertasSplash').modal('show');
                        var datos = table.rows('.selected').data();
                        detalle_Ot(datos[0].FOLIO);
                      }else{
                        alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe seleccionar un elemento");
                      }
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single',
                  // selector: 'td:not(:nth-child(3))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function(){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoOrdenesTrabajo').DataTable().columns.adjust();
                  },1500);
                },2000);
              }
          });

          await esconderMenu();
          setTimeout( async function(){

            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

            await $.ajax({
              url:   'controller/datosAccionesVisibles.php',
              type:  'post',
              data: parametros,
              success: function (response) {
                var p = jQuery.parseJSON(response);
                if(p.aaData.length !== 0){
                  for(var i = 0; i < p.aaData.length; i++) {
                    if(p.aaData[i].VISIBLE == 1){
                      if(p.aaData[i].ENABLE == 1){
                        $("#accionesListadoOrdenesTrabajo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                      else{
                        $("#accionesListadoOrdenesTrabajo").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                      }
                    }
                  }
                }
              }
            });
            setTimeout(function(){
              var js = document.createElement('script');
              js.src = 'view/js/funciones.js?idLoad=205';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});

app.controller("mantenedorPracticasController", function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  setTimeout(function() {
    $('#contenido').show();
    $('#menu-lateral').show();
    $('#footer').parent().show();
    $('#footer').show();
    menuElegant();
    esconderMenu();
    cargarMantenedorPracticas();
  },500);
});

app.controller("mantenedorDiasObraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorDiasObra').DataTable( {
              ajax: {
                  url: "controller/datosDiasObra.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDOBRA_RANGO_DIAS' },
                  { data: 'RANGO' },
                  { data: 'RANGO_DIAS' } ,
                  { data: 'COLOR_RANGO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [3,4]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorDiasObra').DataTable();
                      //$("#eliminarZonaObra").attr("disabled","disabled");
                      //$("#activarZonaObra").attr("disabled","disabled");
                      //$("#asignarPersonalZonaObra").attr("disabled","disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 1 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 2 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorDiasObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorDiasObra").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorDiasObra').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("mantenedorPaisesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaMantenedorPaises').DataTable( {
              ajax: {
                  url: "controller/datosListadoPaises.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDPAIS' },
                  { data: 'ABREVIATURA' } ,
                  { data: 'NOMBRE' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 2,3 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 1 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorPaises").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorPaises").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorPaises').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("mantenedorAreaFuncionalController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          // console.log(largo);
          await $('#tablaAreaFuncional').DataTable( {
              ajax: {
                  url: "controller/datosListadoAreasFuncionales.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDAREAFUNCIONAL' },
                  { data: 'IDPAIS' },
                  { data: 'COMUNA' } ,
                  { data: 'PROVINCIA' },
                  { data: 'REGION' },
                  { data: 'CODIGOPOSTAL' },
                  { data: 'PAIS' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 2,3 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 1 ]
                },
                {
                  "visible": false,
                  "searchable": false,
                  "targets": [ 2 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').show();
                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesAreaFuncional").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesAreaFuncional").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaAreaFuncional').DataTable().columns.adjust();
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("loginController", function(){
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },50);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  var path = window.location.href.split('#/')[1];
  console.log(path);
  var parametros = {
    "path": path
  }
  setTimeout(async function() {

    var url = window.location.origin;

    $("#imgLogin").attr("src","controller/cargarLogo.php?url=" + url);

    var margH = $(window).height()/2 - 200;

    $("#msgDatos").css("margin-top",margH);

    $('#contenido').show();
    $('#menu-lateral').show();
    $('#footer').parent().show();
    $('#footer').show();

    $.ajax({
        url:   'controller/datosRefresh.php',
        type:  'post',
        success: async function (response) {
          var p = jQuery.parseJSON(response);
          var size = Object.size(p.aaData)/2;
          if(size > 0){
            if(p.aaData['ESTADO'] === 'Activo'){
              if($("#DivPrincipalMenu").children().length <= 0){
                await $.ajax({
                  url:   'controller/datosAreasComunesPadresSolo.php',
                  type:  'post',
                  success: function (response2) {
                    var p2 = jQuery.parseJSON(response2);
                    if(p2.aaData.length !== 0){
                      for(var i = 0; i < p2.aaData.length; i++){
                        var padre = "<div id='" + p2.aaData[i].PADRE + "' style='display:none;' class='contenedor-logos'><div class='logo'><span class='imgMenu " + p2.aaData[i].ICONOPADRE + "'></span></div><p class='title-menu'>" + p2.aaData[i].TEXTOPADRE + "</p></div>";

                        $("#DivPrincipalMenu").append(padre);

                        if(p2.aaData[i].PADRE === "liCuenta"){
                          $("#" + p2.aaData[i].PADRE).append("<div class='sub-menu' style='display:none; color: white; font-size: 12px; margin-left: 15px; margin-bottom: 8px;'><div id='imgPerfil' class='div-sub-menu' style='margin-left: 5%; border: 2px solid black; width: 144px; min-width: 144px; max-width: 144px; 'margin-bottom: 10pt;'></div><div id='nombrePerfil' class='div-sub-menu' style='margin-left: 5%; font-weight: bold;'></div></div>");
                          setTimeout(function(){
                            $.ajax({
                              url:   'controller/cargarImgPerfilSession.php',
                              type:  'get',
                              success: function (responseImg) {
                                if(responseImg == "Sin datos"){
                                  $("#imgPerfil").append("<img style='width: 140px; min-width: 140px; max-width: 140px;' src='view/img/no_foto.jpg'>");
                                }
                                else{
                                  $("#imgPerfil").append("<img style='width: 140px; min-width: 140px; max-width: 140px;' src='controller/cargarImgPerfilSession.php'>");
                                }
                              }
                            });
                          },500);
                        }
                        // $('div[id $=' + p2.aaData[i].PADRE + ']').show();
                        // $('li[id $=' + p2.aaData[i].NOMBRE + ']').show();
                        // $('div[id $=' + p2.aaData[i].PADRE + ']').css("display","block");
                        // $('li[id $=' + p2.aaData[i].NOMBRE + ']').css("display","block");
                      }
                      var atras = "<div id='regresarMenu' style='display: none;' class='contenedor-logos'><div class='logo'><span class='imgMenu fas fa-arrow-circle-left'></span></div></div>";

                      $("#DivPrincipalMenu").append(atras);

                      $("#regresarMenu").hover(
                        function() {
                          $("#regresarMenu").addClass("blink_me");
                        }, function() {
                          $("#regresarMenu").removeClass("blink_me");
                        }
                      );
                    }
                  }
                });
                await $.ajax({
                  url:   'controller/datosAreasComunesPadres.php',
                  type:  'post',
                  success: function (response2) {
                    var p2 = jQuery.parseJSON(response2);
                    if(p2.aaData.length !== 0){
                      for(var i = 0; i < p2.aaData.length; i++){
                        var insert = 0;
                        if(p2.aaData[i].TEXTO === "Cambiar contraseña"){
                            var hijo = "<div class='sub-menu' style='display: none; color: white;'><ul><li id='" + p2.aaData[i].NOMBRE + "' style='display: none;'><div class='div-sub-menu'><i class='imgMenu-sub " + p2.aaData[i].ICONO + "'></i><a href='" + p2.aaData[i].RUTA + "' class='title-menu-sub'>" + p2.aaData[i].TEXTO + "</a></div></li></ul></div>";
                            insert = 1;
                        }
                        else if(p2.aaData[i].TEXTO === "Firma Documentos"){
                          if(p.aaData['FIRMA_2FA'] === "1"){
                              var hijo = "<div class='sub-menu' style='display: none; color: white;'><ul><li id='" + p2.aaData[i].NOMBRE + "' style='display: none;'><div class='div-sub-menu'><i class='imgMenu-sub " + p2.aaData[i].ICONO + "'></i><a href='" + p2.aaData[i].RUTA + "' class='title-menu-sub'>" + p2.aaData[i].TEXTO + "</a></div></li></ul></div>";
                              insert = 1;
                          }
                          else{
                            insert = 0;
                          }
                        }
                        else{
                          var hijo = "<div class='sub-menu' style='display: none; color: white;'><ul><li id='" + p2.aaData[i].NOMBRE + "' style='display: none;'><div class='div-sub-menu'><i class='imgMenu-sub " + p2.aaData[i].ICONO + "'></i><a href='" + p2.aaData[i].RUTA + "' class='title-menu-sub'>" + p2.aaData[i].TEXTO + "</a></div></li></ul></div>";
                          insert = 1;
                        }

                        if(insert === 1){
                          $("#" + p2.aaData[i].PADRE).append(hijo);
                        }
                      }
                      $(".contenedor-logos").css("display","none");
                      $(".contenedor-logos").find('li').css("display","none");
                      $("#sesionActiva").val("1");
                      $("#sesionActivaUso").val("0");
                      $("#logoMenu").show();
                      // window.location.href = "#/login";
                    }
                  }
                });

                n = p.aaData['NOMBRE'].split(" ");
                if(n.length <= 3){
                  $("#nombrePerfil").html(p.aaData['NOMBRE']);
                }
                else{
                  $("#nombrePerfil").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                }

                $("#menu-lateral").unbind('click').hover(function(){

                },
                function(){
                  $("div.sub-menu").parent().css("height", "45px");
                  $("div.sub-menu").parent().css("background","rgba(30, 0, 0, 0.0)");
                  $("div.sub-menu").hide();
                  $("div.sub-menu").parent().find("p").css("color", "white");
                });

                $(".title-menu-sub").unbind('click').hover(function(){
                  $(this).css("color", "yellow");
                },
                function(){
                  $(this).css("color", "white");
                });

                $(".contenedor-logos").unbind('click').hover(function(){
                  $(this).css({'cursor': 'pointer'});
                });

                $(".contenedor-logos").unbind('click').click(function(){
                  var a = $(this).find("p").css("color");

                  //Cierra todo
                  $("div.sub-menu").parent().css("height", "45px");
                  $("div.sub-menu").parent().css("background","rgba(30, 0, 0, 0.0)");
                  $("div.sub-menu").hide();
                  $("div.sub-menu").parent().find("p").css("color", "white");

                  $("#DivPrincipalMenu").children().css("display","none");

                  $(this).css("display","block");

                  $("#regresarMenu").css("display","block");

                  if(a !== "rgb(255, 255, 0)"){
                    //Abre el clickado
                    $(this).find("p").css("color", "yellow");
                    $(this).find("div.sub-menu").show();
                    var a = $(this).find('li[style*="block"]').length;
                    if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                      if($(this).attr("id") == 'liCuenta'){
                        a = (a+1)*28 + 30 + 150;
                      }
                      else{
                        a = a*28 + 30;
                      }
                    }
                    else{
                      if($(this).attr("id") == 'liCuenta'){
                        a = (a+1)*25 + 30 + 150;
                      }
                      else{
                        a = a*25 + 30;
                      }
                    }
                    $(this).css("height", a + "pt");
                    $(this).css("background-color","#004379");
                  }
                  else{
                    $("#DivPrincipalMenu").children().css("display","block");
                  }
                });

                $("#regresarMenu").unbind("click").click(function(){
                  $("div.sub-menu").parent().css("height", "45px");
                  $("div.sub-menu").parent().css("background","rgba(30, 0, 0, 0.0)");
                  $("div.sub-menu").hide();
                  $("div.sub-menu").parent().find("p").css("color", "white");
                  $("#DivPrincipalMenu").children().css("display","block");
                  $("#regresarMenu").css("display","none");
                });

                n = p.aaData['NOMBRE'].split(" ");
                if(n.length <= 3){
                  $("#nombrePerfil").html(p.aaData['NOMBRE']);
                }
                else{
                  $("#nombrePerfil").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                }

                setTimeout(function(){
                  $('#menu-lateral').show();
                  menuElegant();
                  esconderMenu();
                  $('#modalAlertasSplash').modal('hide');
                },2000);
              }
              else{
                setTimeout(function(){
                  $('#menu-lateral').show();
                  menuElegant();
                  esconderMenu();
                  $('#modalAlertasSplash').modal('hide');
                },3000);
              }
            }
            else{
              $(".contenedor-logos").css("display","none");
              $(".contenedor-logos").find('li').css("display","none");
              window.location.href = "#/home";
              $("#logoLinkWeb").hide();
              $("#logoMenu").hide();
              $("#lineaMenu").hide();
              $("#iconoLogoMenu").attr("class","imgMenu fas fas fa-bars");
              $("#menu-lateral").css("width","37px");
              $("#menu-lateral").css("background","rgba(30, 0, 0, 0.0)");
              $("#logoMenu").css("color","black");
              $("#iconoLogoMenu").css("border","1px solid #b5b5b5");
              $("#iconoLogoMenu").css("background","rgba(255, 255, 255, 1.0)");
              $("#DivPrincipalMenu").empty();
            }
          }
          else{
            $(".contenedor-logos").css("display","none");
            $(".contenedor-logos").find('li').css("display","none");
            window.location.href = "#/home";
            $("#logoLinkWeb").hide();
            $("#logoMenu").hide();
            $("#lineaMenu").hide();
            $("#iconoLogoMenu").attr("class","imgMenu fas fas fa-bars");
            $("#menu-lateral").css("width","37px");
            $("#menu-lateral").css("background","rgba(30, 0, 0, 0.0)");
            $("#logoMenu").css("color","black");
            $("#iconoLogoMenu").css("border","1px solid #b5b5b5");
            $("#iconoLogoMenu").css("background","rgba(255, 255, 255, 1.0)");
            $("#DivPrincipalMenu").empty();
          }
        }
    });
    // setTimeout(function(){
    //   $('#modalAlertasSplash').modal('hide');
    // },8000);
  },100);
});

// Consulta Solicitud Materiales Obra
app.controller("solicitudMatObrasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          $('#filtroPeriodoSolicitudMateriales').val(moment().startOf('month').format('YYYY-MM-DD').toString() + ' al ' + moment().endOf('month').format('YYYY-MM-DD').toString());

          $('#filtroPeriodoSolicitudMateriales').dateRangePicker(
            {
            	autoClose: false,
            	format: 'YYYY-MM-DD',
            	separator: ' al ',
              startOfWeek: 'monday',// or monday
              startDate: false,
      	      endDate: false,
              time: {
            		enabled: false
            	},
              autoClose: true,
              language: 'es',
              showTopbar: true,
              monthSelect: true,
              yearSelect: true
            }
          ).bind('datepicker-change',async function(event,obj){
            recargaPeriodoSolicitudMateriales();
          });

          var path = window.location.href.split('#/')[1];
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          var parametros = {
            "path": path,
            "inicio": $('#filtroPeriodoSolicitudMateriales').val().split(" al ")[0],
            "fin": $('#filtroPeriodoSolicitudMateriales').val().split(" al ")[1],
          }
          await $('#tablaListadoSolicitudMaterialesObra').DataTable( {
              ajax: {
                  url: "controller/datosListadoSolicitudMatObras.php",
                  type: 'POST',
                  data: parametros
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO'},
                  { data: 'TIPO'},
                  { data: 'FECHA' },
                  { data: 'HORA'},
                  { data: 'SOLICITANTE'},
                  { data: 'ESTADO'},
                  { data: 'AREA'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                }
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                $('#contenido').fadeIn();
                $('#menu-lateral').fadeIn();
                $('#footer').parent().fadeIn();
                var table = $('#tablaListadoSolicitudMaterialesObra').DataTable();
                var tipoSolMat = '';
                tipoSolMat += '<option selected value="0">Todos</option>';
                for(var i = 0; i < table.column(2).data().unique().length; i++){
                  if(table.column(2).data().unique()[i] !== null){
                    tipoSolMat += '<option value="' + table.column(2).data().unique()[i] + '">' + table.column(2).data().unique()[i] + '</option>';
                  }
                }
                $("#tipoSolicitudMaterialesObras").html(tipoSolMat);

                var estadoSolMat = '';
                estadoSolMat += '<option selected value="0">Todos</option>';
                for(var i = 0; i < table.column(6).data().unique().length; i++){
                  if(table.column(6).data().unique()[i] !== null){
                    estadoSolMat += '<option value="' + table.column(6).data().unique()[i] + '">' + table.column(6).data().unique()[i] + '</option>';
                  }
                }
                $("#filtroEstadoSolicitudMateriales").html(estadoSolMat);

                var areaSolMat = '';
                areaSolMat += '<option selected value="0">Todos</option>';
                for(var i = 0; i < table.column(7).data().unique().length; i++){
                  if(table.column(7).data().unique()[i] !== null){
                    areaSolMat += '<option value="' + table.column(7).data().unique()[i] + '">' + table.column(7).data().unique()[i] + '</option>';
                  }
                }
                $("#filtroAreaSolicitudMateriales").html(areaSolMat);


                if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                  $("#tipoSolicitudMaterialesObras").select2({
                      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#filtroEstadoSolicitudMateriales").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                  $("#filtroAreaSolicitudMateriales").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                  });
                }
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                  setTimeout(async function(){
                    $('#tablaListadoSolicitudMaterialesObra').DataTable().columns.adjust();
                  },500);
                },2000);
              }
          });
          await esconderMenu();
          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
      		  var parametros = {
      		    "path": path
      		  }

      			setTimeout(async function(){
      			  await $.ajax({
      			    url:   'controller/datosAccionesVisibles.php',
      			    type:  'post',
      			    data: parametros,
      			    success: function (response) {
      			      var p = jQuery.parseJSON(response);
      			      if(p.aaData.length !== 0){
      			        for(var i = 0; i < p.aaData.length; i++) {
      			          if(p.aaData[i].VISIBLE == 1){
      			            if(p.aaData[i].ENABLE == 1){
      			              $("#accionesListadoSolicitudMaterial").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			            else{
      			              $("#accionesListadoSolicitudMaterial").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
      			            }
      			          }
      			        }
      			      }
      			    }
      			  });

      			  setTimeout(function(){
      			    var js = document.createElement('script');
      			    js.src = 'view/js/funciones.js?idLoad=205';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          menuElegant();
        },200);
      }
    }
  });
});
// Fin consulta Solicitud Materiales Obra

//Ticket compras
app.controller("ticketComprasController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#ticketComprasDash").attr("src","https://datastudio.google.com/embed/reporting/b0f8d091-36c9-41f4-b1fd-6f5c9aad1567/page/hH2eC");
  setTimeout(function(){
    $("#ticketComprasDash").attr("width","98%");
    $("#ticketComprasDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

//combustible
app.controller("combustibleReporteController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#combustibleDash").attr("src","https://datastudio.google.com/embed/reporting/57074849-bc6a-46a1-a6db-240903c10f85/page/hH2eC");
  setTimeout(function(){
    $("#combustibleDash").attr("width","98%");
    $("#combustibleDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

//flota
app.controller("flotaReporteController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#flotaDash").attr("src","https://datastudio.google.com/embed/reporting/99cf216b-ab08-4a9f-b57c-46ee89e0e270/page/hH2eC");
  setTimeout(function(){
    $("#flotaDash").attr("width","98%");
    $("#flotaDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

//proveedores
app.controller("proveedoresReporteController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#proveedoresDash").attr("src","https://datastudio.google.com/embed/reporting/d12336d6-d3de-4bd9-aee9-fb2d965d329e/page/hH2eC");
  setTimeout(function(){
    $("#proveedoresDash").attr("width","98%");
    $("#proveedoresDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("cargosInformaticaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaMantenedorCargos').DataTable( {
              ajax: {
                  url: "controller/datosCargosTI.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDTI_CARGOS' },
                  { data: 'SERIE' },
                  { data: 'IMEI' },
                  { data: 'LINEA' },
                  { data: 'TIPO' } ,
                  { data: 'MARCA' },
                  { data: 'MODELO' },
                  { data: 'VALOR_REFERENCIAL' },
                  { data: 'FECHA_INGRESO' },
                  { data: 'CARACTERISTICAS' },
                  { data: 'ESTADO' },
                  { data: 'QR', className: "centerDataTable"}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10,11,12 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaMantenedorCargos').DataTable();
                      $("#agregarMantenedorCargos").removeAttr("disabled");
                      $("#editarMantenedorCargos").attr("disabled", "disabled");
                      $("#eliminarMantenedorCargos").attr("disabled", "disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                }
              ],
              "select": {
                  style: 'single',
                  selector: 'td:not(:nth-child(13))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                var table = $('#tablaMantenedorCargos').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                var tipoCargos = '';
                tipoCargos += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(5).data().unique().length; i++){
                  if(table.column(5).data().unique()[i] !== null){
                    tipoCargos += '<option value="' + table.column(5).data().unique()[i] + '">' + table.column(5).data().unique()[i] + '</option>';
                  }
                }
                $("#tipoMantenedorCargos").html(tipoCargos);

                var marcaCargos = '';
                marcaCargos += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(6).data().unique().length; i++){
                  if(table.column(6).data().unique()[i] !== null){
                    marcaCargos += '<option value="' + table.column(6).data().unique()[i] + '">' + table.column(6).data().unique()[i] + '</option>';
                  }
                }
                $("#marcaMantenedorCargos").html(marcaCargos);

                var modeloCargos = '';
                modeloCargos += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(7).data().unique().length; i++){
                  if(table.column(7).data().unique()[i] !== null){
                    modeloCargos += '<option value="' + table.column(7).data().unique()[i] + '">' + table.column(7).data().unique()[i] + '</option>';
                  }
                }
                $("#modeloMantenedorCargos").html(modeloCargos);

                var estadoCargos = '';
                estadoCargos += '<option selected value="Todos">Todos</option>';
                for(var i = 0; i < table.column(11).data().unique().length; i++){
                  if(table.column(11).data().unique()[i] !== null){
                    estadoCargos += '<option value="' + table.column(11).data().unique()[i] + '">' + table.column(11).data().unique()[i] + '</option>';
                  }
                }
                $("#estadoMantenedorCargos").html(estadoCargos);

                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesMantenedorCargos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesMantenedorCargos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaMantenedorCargos').DataTable().columns.adjust();
                      if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        $("#tipoMantenedorCargos").select2({
                          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'),
                          sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
                        });
                        $("#marcaMantenedorCargos").select2({
                          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                        });
                        $("#modeloMantenedorCargos").select2({
                          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                        });
                        $("#estadoMantenedorCargos").select2({
                          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                        });
                      }
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("asignarCargoTIController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaAsignarCargos').DataTable( {
              ajax: {
                  url: "controller/datosAsignacionesCargos.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'FOLIO' },
                  { data: 'NOMBRE' },
                  { data: 'ESTADO' },
                  { data: 'FECHA_ASIGNACION' } ,
                  { data: 'FECHA_DESASIGNACION' },
                  { data: 'OBSERVACION' },
                  { data: 'USUARIO_ASIGNA' },
                  { data: 'PDF', className: "centerDataTable"}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  },
                  {
                    text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                    action: function ( e, dt, node, config ) {
                      var table = $('#tablaAsignarCargos').DataTable();
                      $("#asignarAsignarCargos").removeAttr("disabled");
                      $("#desasignarAsignarCargos").attr("disabled", "disabled");
                      $("#detalleAsignarCargos").attr("disabled", "disabled");
                      table.rows().deselect();
                    }
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                }
              ],
              "select": {
                  style: 'single',
                  selector: 'td:not(:nth-child(9))'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "order": [[ 1, "asc" ]],
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                var table = $('#tablaAsignarCargos').DataTable();
                $('#contenido').show();
                $('#menu-lateral').show();
                $('#footer').parent().show();
                $('#footer').show();

                // var tipoCargos = '';
                // tipoCargos += '<option selected value="Todos">Todos</option>';
                // for(var i = 0; i < table.column(4).data().unique().length; i++){
                //   if(table.column(4).data().unique()[i] !== null){
                //     tipoCargos += '<option value="' + table.column(4).data().unique()[i] + '">' + table.column(4).data().unique()[i] + '</option>';
                //   }
                // }
                // $("#tipoMantenedorCargos").html(tipoCargos);
                //
                // var marcaCargos = '';
                // marcaCargos += '<option selected value="Todos">Todos</option>';
                // for(var i = 0; i < table.column(5).data().unique().length; i++){
                //   if(table.column(5).data().unique()[i] !== null){
                //     marcaCargos += '<option value="' + table.column(5).data().unique()[i] + '">' + table.column(5).data().unique()[i] + '</option>';
                //   }
                // }
                // $("#marcaMantenedorCargos").html(marcaCargos);
                //
                // var modeloCargos = '';
                // modeloCargos += '<option selected value="Todos">Todos</option>';
                // for(var i = 0; i < table.column(6).data().unique().length; i++){
                //   if(table.column(6).data().unique()[i] !== null){
                //     modeloCargos += '<option value="' + table.column(6).data().unique()[i] + '">' + table.column(6).data().unique()[i] + '</option>';
                //   }
                // }
                // $("#modeloMantenedorCargos").html(modeloCargos);
                //
                // var estadoCargos = '';
                // estadoCargos += '<option selected value="Todos">Todos</option>';
                // for(var i = 0; i < table.column(10).data().unique().length; i++){
                //   if(table.column(10).data().unique()[i] !== null){
                //     estadoCargos += '<option value="' + table.column(10).data().unique()[i] + '">' + table.column(10).data().unique()[i] + '</option>';
                //   }
                // }
                // $("#estadoMantenedorCargos").html(estadoCargos);

                setTimeout(async function(){
                  var path = window.location.href.split('#/')[1];
            		  var parametros = {
            		    "path": path
            		  }

                  await $.ajax({
                    url:   'controller/datosAccionesVisibles.php',
                    type:  'post',
                    data: parametros,
                    success: function (response) {
                      var p = jQuery.parseJSON(response);
                      if(p.aaData.length !== 0){
                        for(var i = 0; i < p.aaData.length; i++) {
                          if(p.aaData[i].VISIBLE == 1){
                            if(p.aaData[i].ENABLE == 1){
                              $("#accionesAsignarCargos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                            else{
                              $("#accionesAsignarCargos").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                            }
                          }
                        }
                      }
                    }
                  });

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaAsignarCargos').DataTable().columns.adjust();
                      // if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                      //   $("#tipoMantenedorCargos").select2({
                      //     theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'),
                      //     sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
                      //   });
                      //   $("#marcaMantenedorCargos").select2({
                      //     theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                      //   });
                      //   $("#modeloMantenedorCargos").select2({
                      //     theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                      //   });
                      //   $("#estadoMantenedorCargos").select2({
                      //     theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                      //   });
                      // }
                    },500);
                  },2000);
                },500);
              }
          });

          await esconderMenu();
        },200);
        menuElegant();
      }
    }
  });
});

app.controller("directorioProveedoresController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#directorioProveedoresDash").attr("src","https://datastudio.google.com/embed/reporting/34dba99d-7d5b-4a53-b693-ad50a91470bc/page/jIikC");
  setTimeout(function(){
    $("#directorioProveedoresDash").attr("width","98%");
    $("#directorioProveedoresDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("disponibilidadAsistenciaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#disponibilidadDash").attr("src","https://datastudio.google.com/embed/reporting/6b558959-8f4c-4201-9a0e-21d00af3b0ac/page/hH2eC");
  setTimeout(function(){
    $("#disponibilidadDash").attr("width","98%");
    $("#disponibilidadDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("finiquitosSolicitudesController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#finiquitosDash").attr("src","https://datastudio.google.com/embed/u/0/reporting/4f7b7b57-ef8e-4247-bc47-b7f43c8fdcd6/page/hH2eC");
  setTimeout(function(){
    $("#finiquitosDash").attr("width","98%");
    $("#finiquitosDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("ticketMDAController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#ticketMDADash").attr("src","https://datastudio.google.com/embed/u/0/reporting/1fce25e1-08ae-4ac9-8f1b-2eaf99431ddd/page/hH2eC");
  setTimeout(function(){
    $("#ticketMDADash").attr("width","98%");
    $("#ticketMDADash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);
  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("sgenDashController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#sgenDash").attr("src","https://datastudio.google.com/embed/reporting/00e043e7-0b05-4295-aaba-bb680dff16dc/page/Sj5qC");
  setTimeout(function(){
    $("#sgenDash").attr("width","98%");
    $("#sgenDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  menuElegant();

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("gerenciaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaGerencia').DataTable( {
              ajax: {
                  url: "controller/datosGerencias.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDGERENCIA', className: "centerDataTable"},
                  { data: 'GERENCIA' },
                  { data: 'SUBGERENCIA' },
                  { data: 'RUT_GERENTE' },
                  { data: 'GERENTE' },
                  { data: 'RUT_SUBGERENTE' },
                  { data: 'SUBGERENTE' },
                  { data: 'ESTADO' }
              ],
              buttons: [
                {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8 ]
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                },
                {
                  text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                  action: function ( e, dt, node, config ) {
                    var table = $('#tablaGerencia').DataTable();
                    $("#editarGerencia").attr("disabled", "disabled");
            				$("#asignarGerenteSub").attr("disabled", "disabled");
                    table.rows().deselect();
                  }
                },
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              },
              {
                "width": "15px",
                "targets": 1
              }
            ],
            "select": {
              style: 'multi'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            // "order": [[ 3, "asc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
                "zeroRecords": "No tiene personal bajo su cargo",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No tiene personal bajo su cargo",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function(){
            }
          });

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
            var parametros = {
              "path": path
            }

            setTimeout(async function(){
              await $.ajax({
                url:   'controller/datosAccionesVisibles.php',
                type:  'post',
                data: parametros,
                success: function (response) {
                  var p = jQuery.parseJSON(response);
                  if(p.aaData.length !== 0){
                    for(var i = 0; i < p.aaData.length; i++) {
                      if(p.aaData[i].VISIBLE == 1){
                        if(p.aaData[i].ENABLE == 1){
                          $("#accionesGerencias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                        else{
                          $("#accionesGerencias").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                      }
                    }
                  }
                }
              });

              setTimeout(function(){
                var js = document.createElement('script');
                js.src = 'view/js/funciones.js?idLoad=205';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);
            },100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
              setTimeout(function(){
                $('#tablaGerencia').DataTable().columns.adjust();
              },1000);
            },2000);
          },1000);

          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("clienteController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaCliente').DataTable( {
              ajax: {
                  url: "controller/datosClientes.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDCLIENTE', className: "centerDataTable"},
                  { data: 'RUT_CLIENTE' } ,
                  { data: 'SUB_CLIENTE' },
                  { data: 'CLIENTE' },
              ],
              buttons: [
                {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,2,3,4 ]
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
              },
              {
                text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                action: function ( e, dt, node, config ) {
                  var table = $('#tablaCliente').DataTable();
                  $("#editarClienteProyecto").attr("disabled", "disabled");
                  table.rows().deselect();
                }
              },
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              },
              {
                "width": "15px",
                "targets": 1
              }
            ],
            "select": {
              style: 'single'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            // "order": [[ 3, "asc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
                "zeroRecords": "No existen clientes cargados",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No tiene personal bajo su cargo",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function(){

            }
          });

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
            var parametros = {
              "path": path
            }

            setTimeout(async function(){
              await $.ajax({
                url:   'controller/datosAccionesVisibles.php',
                type:  'post',
                data: parametros,
                success: function (response) {
                  var p = jQuery.parseJSON(response);
                  if(p.aaData.length !== 0){
                    for(var i = 0; i < p.aaData.length; i++) {
                      if(p.aaData[i].VISIBLE == 1){
                        if(p.aaData[i].ENABLE == 1){
                          $("#accionesClientes").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                        else{
                          $("#accionesClientes").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                      }
                    }
                  }
                }
              });

              setTimeout(function(){
                var js = document.createElement('script');
                js.src = 'view/js/funciones.js?idLoad=205';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);
            },100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
              setTimeout(function(){
                $('#tablaCliente').DataTable().columns.adjust();
              },1000);
            },2000);
          },1000);

          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("estadoProyectoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');

          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);

          await $('#tablaEstadoProyecto').DataTable( {
              ajax: {
                  url: "controller/datosEstadoProyecto.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'IDESTRUCTURA_OPERACION_ESTADO', className: "centerDataTable"},
                  { data: 'ESTADO' },
                  { data: 'DESCRIPCION' }
              ],
              buttons: [
                {
                  extend: 'excel',
                  exportOptions: {
                    columns: [ 1,2,3 ]
                  },
                  title: null,
                  text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                },
                {
                  text: '<span class="fas fa-broom"></span>&nbsp;&nbsp;Deseleccionar todo',
                  action: function ( e, dt, node, config ) {
                    var table = $('#tablaGerencia').DataTable();
                    $("#editarGerencia").attr("disabled", "disabled");
            				$("#asignarGerenteSub").attr("disabled", "disabled");
                    table.rows().deselect();
                  }
                },
            ],
            "columnDefs": [
              {
                "width": "5px",
                "targets": 0
              },
              {
                "orderable": false,
                "className": 'select-checkbox',
                "targets": [ 0 ]
              },
              {
                "width": "15px",
                "targets": 1
              }
            ],
            "select": {
              style: 'multi'
            },
            "scrollX": true,
            "paging": true,
            "ordering": true,
            "scrollCollapse": true,
            // "order": [[ 3, "asc" ]],
            "info":     true,
            "lengthMenu": [[largo], [largo]],
            "dom": 'Bfrtip',
            "language": {
                "zeroRecords": "No tiene personal bajo su cargo",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No tiene personal bajo su cargo",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                },
                "search": "Buscar: ",
                "select": {
                    "rows": "- %d registros seleccionados"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros)"
            },
            "destroy": true,
            "autoWidth": false,
            "initComplete": function(){
              setTimeout(function(){
                $('#tablaEstadoProyecto').DataTable().columns.adjust();
              },500);
            }
          });

          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          setTimeout(function(){
            var path = window.location.href.split('#/')[1];
            var parametros = {
              "path": path
            }

            setTimeout(async function(){
              await $.ajax({
                url:   'controller/datosAccionesVisibles.php',
                type:  'post',
                data: parametros,
                success: function (response) {
                  var p = jQuery.parseJSON(response);
                  if(p.aaData.length !== 0){
                    for(var i = 0; i < p.aaData.length; i++) {
                      if(p.aaData[i].VISIBLE == 1){
                        if(p.aaData[i].ENABLE == 1){
                          $("#accionesEstadoProyecto").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                        else{
                          $("#accionesEstadoProyecto").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                        }
                      }
                    }
                  }
                }
              });

              setTimeout(function(){
                var js = document.createElement('script');
                js.src = 'view/js/funciones.js?idLoad=205';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);
            },100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);

          await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("facturacionDashController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#facturacionDash").attr("src","https://datastudio.google.com/embed/reporting/0fe194e9-3b20-4c82-803b-adb8d032a148/page/hH2eC");
  setTimeout(function(){
    $("#facturacionDash").attr("width","98%");
    $("#facturacionDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  menuElegant();

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("cxpDashController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#cxpDash").attr("src","https://datastudio.google.com/embed/reporting/436ddb1c-6305-447d-823b-fbd8cacb86f4/page/hH2eC");
  setTimeout(function(){
    $("#cxpDash").attr("width","98%");
    $("#cxpDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  menuElegant();

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("dotacionDashController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  $('#contenido').show();
  $('#menu-lateral').show();
  $('#footer').parent().show();
  $('#footer').show();
  $("#dotacionDash").attr("src","https://datastudio.google.com/embed/reporting/832c6c40-cbb0-4809-9f45-5eb60fbeb4ff/page/hH2eC");
  setTimeout(function(){
    $("#dotacionDash").attr("width","98%");
    $("#dotacionDash").attr("height",$(window).height()-30);
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },2000);

  menuElegant();

  setTimeout(async function(){
    await esconderMenu();
    menuElegant();
    $('#menu-lateral').show();
  },2000);
});

app.controller("discrepanciaRRHHController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        setTimeout(async function(){
          $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
          $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
          await $('#tablaDiscrepanciasRRHH').DataTable( {
              ajax: {
                  url: "controller/datosDiscrepanciaRRHH.php",
                  type: 'POST'
              },
              columns: [
                  { data: 'S'},
                  { data: 'DNI' },
                  { data: 'NOMBRE'},
                  { data: 'DEFINICION'},
                  { data: 'PEP'},
                  { data: 'PROYECTO'},
                  { data: 'DENOMINACION'},
                  { data: 'GERENCIA'},
                  { data: 'SUBGERENCIA'},
                  { data: 'JEFE'},
                  { data: 'JEFE_RRHH'}
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,4,5,6,7,8,9,10 ]
                    },
                    title: null,
                    text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
                  }
              ],
              "columnDefs": [
                {
                  "width": "5px",
                  "targets": 0
                },
                {
                  "orderable": false,
                  "className": 'select-checkbox',
                  "targets": [ 0 ]
                },
              ],
              "select": {
                  style: 'single'
              },
              "scrollX": true,
              "paging": true,
              "ordering": true,
              "scrollCollapse": true,
              "info":     true,
              "lengthMenu": [[largo], [largo]],
              "dom": 'Bfrtip',
              "language": {
                "zeroRecords": "No hay datos disponibles",
                "info": "Registro _START_ de _END_ de _TOTAL_",
                "infoEmpty": "No hay datos disponibles",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                  },
                  "search": "Buscar: ",
                  "select": {
                      "rows": "- %d registros seleccionados"
                  },
                  "infoFiltered": "(Filtrado de _MAX_ registros)"
              },
              "destroy": true,
              "autoWidth": false,
              "initComplete": function( settings, json){
                  $('#contenido').show();
                  $('#menu-lateral').show();
                  $('#footer').parent().show();
                  $('#footer').show();

                  setTimeout(function(){
                    var js = document.createElement('script');
                    js.src = 'view/js/funciones.js?idLoad=205';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);

                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaDiscrepanciasRRHH').DataTable().columns.adjust();
                    },500);
                  },1000);
                }
                // setTimeout(function(){
                //   var path = window.location.href.split('#/')[1];
                //   var parametros = {
                //     "path": path
                //   }
                //
                //   setTimeout(async function(){
                //     await $.ajax({
                //       url:   'controller/datosAccionesVisibles.php',
                //       type:  'post',
                //       data: parametros,
                //       success: function (response) {
                //         var p = jQuery.parseJSON(response);
                //         if(p.aaData.length !== 0){
                //           for(var i = 0; i < p.aaData.length; i++) {
                //             if(p.aaData[i].VISIBLE == 1){
                //               if(p.aaData[i].ENABLE == 1){
                //                 $("#accionesSucursales").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                //               }
                //               else{
                //                 $("#accionesSucursales").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                //               }
                //             }
                //           }
                //         }
                //       }
                //     });
            });
            await esconderMenu();
        },200);
      }
    }
  });
});

app.controller("ticketMallPlazaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        $('#contenido').show();
        $('#menu-lateral').show();
        $('#footer').parent().show();
        $('#footer').show();
        if(response != ""){
            $("#ticketMallPlaza").attr("src",'https://datastudio.google.com/embed/reporting/b715dadc-0350-488c-9426-cea76ba65715/page/hH2eC?params=%7B%22df25%22:%22include%25EE%2580%25800%25EE%2580%2580IN%25EE%2580%2580' + response.replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520").replace(" ", "%2520") + '%22%7D');
        }
        else{
          $("#ticketMallPlaza").attr("src",'https://datastudio.google.com/embed/reporting/b715dadc-0350-488c-9426-cea76ba65715/page/hH2eC');
        }
        setTimeout(function(){
          $("#ticketMallPlaza").attr("width","98%");
          $("#ticketMallPlaza").attr("height",$(window).height()-30);
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
        },2000);
        setTimeout(async function(){
          await esconderMenu();
          menuElegant();
          $('#menu-lateral').show();
        },2000);
      }
    }
  });
});


app.controller("PriorizacionMallPlazaController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        $('#contenido').show();
        $('#menu-lateral').show();
        $('#footer').parent().show();
        $('#footer').show();
        $("#priorizacionMallPlaza").attr("src",'https://datastudio.google.com/embed/reporting/e9d303b4-4339-493e-a74e-33f6ae72cdf4/page/hH2eC');
        setTimeout(function(){
          $("#priorizacionMallPlaza").attr("width","98%");
          $("#priorizacionMallPlaza").attr("height",$(window).height()-30);
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
        },2000);
        setTimeout(async function(){
          await esconderMenu();
          menuElegant();
          $('#menu-lateral').show();
        },2000);
      }
    }
  });
});

app.controller("GeovictoriaSeguimientoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        $('#contenido').show();
        $('#menu-lateral').show();
        $('#footer').parent().show();
        $('#footer').show();

        var params = {
          "ds46.usuario": response
        };
        var paramsAsString = JSON.stringify(params);
        var encodedParams = encodeURIComponent(paramsAsString)

        $("#govictoriaSeguimiento").attr("src",'https://datastudio.google.com/embed/reporting/9db3281d-a2f7-4133-9b21-a69257fb96f4/page/hH2eC?params=' + encodedParams);
        setTimeout(function(){
          $("#govictoriaSeguimiento").attr("width","98%");
          $("#govictoriaSeguimiento").attr("height",$(window).height()-30);
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
        },2000);
        setTimeout(async function(){
          await esconderMenu();
          menuElegant();
          $('#menu-lateral').show();
        },2000);
      }
    }
  });
});
app.controller("DBOProyectoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },200);
  var path = window.location.href.split('#/')[1];
  var parametros = {
    "path": path
  }
  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      // console.log(response);
      if(response === "NO"){
        alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        },1500);
      }
      else if(response === "DESCONECTADO"){
          window.location.href = "#/home";
      }
      else{
        $('#contenido').show();
        $('#menu-lateral').show();
        $('#footer').parent().show();
        $('#footer').show();

        var params = {
          "ds46.usuario": response
        };
        

        $("#dboProyecto").attr("src",'https://datastudio.google.com/embed/reporting/adfc0028-a25b-4214-aeef-ddc447bbf91e/page/hH2eC');
        setTimeout(function(){
          $("#dboProyecto").attr("width","98%");
          $("#dboProyecto").attr("height",$(window).height()-30);
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },2000);
        },2000);
        setTimeout(async function(){
          await esconderMenu();
          menuElegant();
          $('#menu-lateral').show();
        },2000);
      }
    }
  });
});

