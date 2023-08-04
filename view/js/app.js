var lineaTiempo = '';
var personalPropio = '';
var app = angular.module("WPApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/login", {
        controller: "loginController",
        controllerAs: "vm",
        templateUrl : "view/home/login.html?idLoad=82"
    })
    .when("/home", {
        controller: "homeController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idLoad=82"
    })
    .when("/logout", {
        controller: "logoutController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idLoad=82"
    })
    .when("/changePass", {
        controller: "changePassController",
        controllerAs: "vm",
        templateUrl : "view/home/changePass.html?idLoad=82"
    })
    .when("/usuarios", {
        controller: "usuariosController",
        controllerAs: "vm",
        templateUrl : "view/usuario/usuarios.html?idLoad=82"
    })
    .when("/perfiles", {
        controller: "perfilesController",
        controllerAs: "vm",
        templateUrl : "view/usuario/perfiles.html?idLoad=82"
    })
    .when("/dotacion", {
        controller: "dotacionController",
        controllerAs: "vm",
        templateUrl : "view/personal/dotacion.html?idLoad=82"
    })
    .when("/subcontratistas", {
        controller: "subcontratistasController",
        controllerAs: "vm",
        templateUrl : "view/controlling/subcontratistas.html?idLoad=82"
    })
    .when("/gerencia", {
        controller: "gerenciaController",
        controllerAs: "vm",
        templateUrl : "view/controlling/gerencia.html?idLoad=82"
    })
    .when("/estadoProyecto", {
        controller: "estadoProyectoController",
        controllerAs: "vm",
        templateUrl : "view/controlling/estadoProyecto.html?idLoad=82"
    })
    .when("/clienteProyecto", {
        controller: "clienteController",
        controllerAs: "vm",
        templateUrl : "view/controlling/cliente.html?idLoad=82"
    })
    .when("/centro_costos",{
        controller: "proyectosController",
        controllerAs: "wm",
        templateUrl: "view/controlling/proyecto.html?idLoad=82"
    })
    .when("/gestionJefatura", {
      controller: "jefaturaController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/gestionJefatura.html?idLoad=82"
    })
    .when("/areaFuncional", {
        controller: "mantenedorAreaFuncionalController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/areaFuncional.html?idLoad=82"
    })
    // Sucursales
    .when("/sucursales", {
      controller: "sucursalController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/sucursal.html?idLoad=82"
    })
    .when("/paises", {
        controller: "mantenedorPaisesController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/paises.html?idLoad=82"
    })
    .when("/equipo", {
        controller: "personalController",
        controllerAs: "vm",
        templateUrl : "view/personal/personal.html?idLoad=82"
    })
    .when("/planillaAsistencia", {
      controller: "planillaAsistenciaController",
      controllerAs: "vm",
      templateUrl : "view/personal/planillaAsistencia.html?idLoad=82"
    })
    .when("/indicadorAusentismo", {
      controller: "indicadorAusentismoController",
      controllerAs: "vm",
      templateUrl : "view/reporteria/ausentismo.html?idLoad=82"
    })
    // Inicio Flota
    .when("/tipoVehiculo", {
      controller: "tipoVehiculoController",
      controllerAs: "vm",
      templateUrl : "view/flota/tipoVehiculo.html?idLoad=82"
    })
    .when("/marcaModelo", {
      controller: "marcaModeloController",
      controllerAs: "vm",
      templateUrl : "view/flota/marcaModelo.html?idLoad=82"
    })
    .when("/aseguradoras", {
      controller: "aseguradoraController",
      controllerAs: "vm",
      templateUrl : "view/flota/aseguradora.html?idLoad=82"
    })
    .when("/flotaProveedores", {
      controller: "proveedoresController",
      controllerAs: "vm",
      templateUrl : "view/flota/proveedores.html?idLoad=82"
    })
    .when("/listadoVehiculos", {
      controller: "vehiculoController",
      controllerAs: "vm",
      templateUrl : "view/flota/vehiculo.html?idLoad=82"
    })
    .when("/tarCombustible", {
        controller: "tarjetasCombustibleController",
        controllerAs: "vm",
        templateUrl : "view/flota/tarjetasCom.html?idLoad=82"
    })
    // Fin Flota
    .otherwise({redirectTo: '/home'});

    $locationProvider.hashPrefix('');
});

app.controller("homeController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  if( !/AppMovil/i.test(navigator.userAgent) ) {
    $("#divRecordarDatosLogin").remove();
  }
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },200);
  $.ajax({
    url:   'controller/checkLoginHome.php',
    type:  'post',
    success: function (response) {
      if(response === 'Ok'){
        window.location.href = "#/login";
      }
      else{
        setTimeout(async function(){
          splashOpen();
            $('#contenido').show();

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

            $("#loginSystem").show("slide", {direction: "up"}, 800);
            setTimeout(function(){
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                $('#footer').parent().show();
                $('#footer').show();
              },2000);

              $("#DivPrincipalMenuH").empty();
              $("#DivPrincipalMenuH").parent().parent().hide();
              marcarMenuActivo(); menuElegant();
            },2000);
        },500);
      }
    }
  });
});

app.controller("loginController", function(){
  setTimeout(function(){
    marcarMenuActivo(); menuElegant();
  },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
  setTimeout(function(){
    var url = window.location.origin;
    marcarMenuActivo(); menuElegant();

    var url = window.location.origin;

    $("#imgLogin").attr("src","controller/cargarLogo.php?url=" + url);

    var margH = $(window).height()/2 - 200;

    $("#msgDatos").css("margin-top",margH);

    $('#contenido').show();
    $(".contenedor-logos").css("display","none");
    $(".contenedor-logos").find('li').css("display","none");
    $("#sesionActiva").val("1");
    $("#sesionActivaUso").val("0");
    $("#logoMenu").show();

    $.ajax({
        url:   'controller/datosRefresh.php',
        type:  'post',
        success: async function (response) {
          var p = jQuery.parseJSON(response);
          if(p.aaData.length !== 0){
            if(p.aaData['ESTADO'] === 'Activo'){
              if($("#DivPrincipalMenuH").children().length <= 0){
                await $.ajax({
                  url:   'controller/datosAreasComunesPadresSolo.php',
                  type:  'post',
                  success: function (response2) {
                    var p2 = jQuery.parseJSON(response2);
                    if(p2.aaData.length !== 0){
                      for(var i = 0; i < p2.aaData.length; i++){
                        if(p2.aaData[i].TEXTOPADRE != "Cuenta"){
                          var padre = `<li class="nav-item dropdown general-dropdown">
                            <k class="nav-link dropdown-toggle fuck" href="#/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="` + p2.aaData[i].ICONOPADRE + `"></i> ` + p2.aaData[i].TEXTOPADRE + `
                            </k>
                            <div class="dropdown-menu" aria-labelledby="` + p2.aaData[i].PADRE + `" id="` + p2.aaData[i].PADRE + `">

                            </div>
                          </li>`;

                          $("#DivPrincipalMenuH").append(padre)
                        }
                      }
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
                            var hijo = `<a id="` + p2.aaData[i].NOMBRE + `" class="dropdown-item" href="` + p2.aaData[i].RUTA + `"><i class="` + p2.aaData[i].ICONO + `"></i> ` + p2.aaData[i].TEXTO + `</a>`;
                            insert = 1;
                        }
                        else if(p2.aaData[i].TEXTO === "Firma Documentos"){
                          if(p.aaData['FIRMA_2FA'] === "1"){
                            var hijo = `<a id="` + p2.aaData[i].NOMBRE + `" class="dropdown-item" href="` + p2.aaData[i].RUTA + `"><i class="` + p2.aaData[i].ICONO + `"></i> ` + p2.aaData[i].TEXTO + `</a>`;
                            insert = 1;
                          }
                          else{
                            insert = 0;
                          }
                        }
                        else{
                          var hijo = `<a id="` + p2.aaData[i].NOMBRE + `" class="dropdown-item" href="` + p2.aaData[i].RUTA + `"><i class="` + p2.aaData[i].ICONO + `"></i> ` + p2.aaData[i].TEXTO + `</a>`;
                          insert = 1;
                        }

                        if(insert === 1){
                          $("#" + p2.aaData[i].PADRE).append(hijo);
                        }
                      }

                      $("#sesionActiva").val("1");
                      $("#sesionActivaUso").val("0");

                      n = p.aaData['NOMBRE'].split(" ");
                      if(n.length <= 3){
                        $("#nombrePerfil").html(p.aaData['NOMBRE']);
                        $("#usuarioLogin").html(p.aaData['NOMBRE']);
                      }
                      else{
                        $("#nombrePerfil").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                        $("#usuarioLogin").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                      }

                      n = p.aaData['NOMBRE'].split(" ");
                      if(n.length <= 3){
                        $("#nombrePerfil").html(p.aaData['NOMBRE']);
                      }
                      else{
                        $("#nombrePerfil").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                      }

                      setTimeout(function(){
                        marcarMenuActivo(); menuElegant();
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },500);
                      },2000);
                    }
                  }
                });
                await $.ajax({
                  url:   'controller/cargarImgPerfilSession.php',
                  type:  'get',
                  success: function (responseImg) {
                    if(responseImg == "Sin datos"){
                      $("#imgPerfil").attr('src',"view/img/no_foto.jpg");
                    }
                    else{
                      $("#imgPerfil").attr('src',"controller/cargarImgPerfilSession.php");
                    }
                  }
                });

                $("#DivPrincipalMenuH").parent().parent().show();
                marcarMenuActivo(); menuElegant();
              }
              else{
                setTimeout(function(){
                  marcarMenuActivo(); menuElegant();
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                },3000);
              }
            }
            else{
              window.location.href = "#/home";
              $("#DivPrincipalMenuH").empty();
            }
          }
          else{
            window.location.href = "#/home";
            $("#DivPrincipalMenuH").empty();
          }
        }
    });
  },500);
});

app.controller("logoutController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
  $.ajax({
      url:   'controller/cerraSesion.php',
      type:  'post',
      success: function (response) {
        localStorage.clear();
        window.location.href = "#/home";
      }
  });
});

app.controller("changePassController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
    splashOpen();
    setTimeout(function(){
      splashOpen();
    },5);
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
              $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
              $('#modalAlertasSplash').modal('show');
              $('#contenido').show();
              $('#footer').parent().show();
              $('#footer').show();

              $("#guardarChangePass").css("width",$("#passNuevoConfirmar").width()+100);

              addCambiaPass();

              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },2000);
              marcarMenuActivo(); menuElegant();
          },200);
        }
      }
    });
});

app.controller("usuariosController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                      js.src = 'view/js/funciones.js?idLoad=82';
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
                marcarMenuActivo(); menuElegant();
              }
          });
        },200);
      }
    }
  });
});

app.controller("perfilesController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                  marcarMenuActivo(); menuElegant();
                },500);
              }
          });
        },200);
      }
    }
  });
});

app.controller("dotacionController", function(){
  setTimeout(function(){
    marcarMenuActivo(); menuElegant();
  },1000);
  var path = initScreen();
  var theme = {
    theme: 'bootstrap4',
    width: $(this).data('width')
      ? $(this).data('width')
      : $(this).hasClass('w-100')
        ? '100%'
        : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
    closeOnSelect: !$(this).attr('multiple'),
    sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
  }
  loading(true);

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaPeriodos").select2(theme);
  }

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaLugares").select2(theme);
  }

  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: { path },
    success: function (response) {
      if (response === "NO") {
        restricted();
      } else if (response === "DESCONECTADO") {
        window.location.href = "#/home";
      } else {
        setTimeout(async function() {
          await listDotacionLugares();
          await listDotacionPeriodos();
          await listComunesDotacion();
          await listDotacion('null', 'null');
          marcarMenuActivo(); menuElegant();
        }, 500);
      }
    }
  });
});

app.controller("subcontratistasController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                    js.src = 'view/js/funciones.js?idLoad=82';
                    document.getElementsByTagName('head')[0].appendChild(js);
                  },500);
                },100);
              },1000);
              marcarMenuActivo(); menuElegant();
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                setTimeout(function(){
                  $('#tablaSubcontratista').DataTable().columns.adjust();
                },500);
              },2000);
            }
          });
        },200);
      }
    }
  });
});

app.controller("gerenciaController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                js.src = 'view/js/funciones.js?idLoad=82';
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

        },200);
      }
    }
  });
});

app.controller("estadoProyectoController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                js.src = 'view/js/funciones.js?idLoad=82';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);
            },100);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },2000);
          },1000);

        },200);
      }
    }
  });
});

app.controller("clienteController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                js.src = 'view/js/funciones.js?idLoad=82';
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

        },200);
      }
    }
  });
});

app.controller("proyectosController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                    { data: 'PEP' , className: "centerDataTable" },
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
                js.src = 'view/js/funciones.js?idLoad=82';
                document.getElementsByTagName('head')[0].appendChild(js);
              },500);

              $('#contenido').show();
              $('#footer').parent().show();
              $('#footer').show();

              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                setTimeout(function(){
                  $('#tablaListadoProyecto').DataTable().columns.adjust();
                },500);
              },2000);
            },1000);
            marcarMenuActivo(); menuElegant();
        },200);
      }
    }
  });
});

app.controller("jefaturaController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
          $('#modalAlertasSplash').modal('show');
          var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/22);
          await $('#tablaJefatura').DataTable( {
            ajax: {
              // url: "controller/personal/listaPersonal.php",
              url: 'controller/personal/datosJefaturaSide.php',
              type: 'POST',
              dataType: 'json',
            },
            processing: true,
            search: {
                return: true,
            },
            serverSide: true,
            columns: [
              { data: 'S'},
              { data: 'IDPERSONAL', className: "centerDataTable" },
              { data: 'RUTA_IMG_PERFIL', className: "centerDataTable"},
              { data: 'DNI'},
              { data: 'EMPRESA' },
              { data: 'NOMBRES' },
              { data: 'APELLIDOS'},
              { data: 'CARGO', className: "centerDataTable" },
              { data: 'EMAIL', className: "centerDataTable" },
              { data: 'FECHA_INGRESO'},
              { data: 'AFP'},
              { data: 'SALUD'},
              { data: 'TELEFONO'},
              { data: 'COMUNA'},
              { data: 'REGION'},
              { data: 'SUCURSAL' },
              { data: 'CODIGO_CECO' },
              { data: 'CECO' },
            ],
            buttons: [
              {
                text: 'Excel',
                action: function ( e, dt, node, config ){
                  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                  $("#textoModalSplash").html("<img src='view/img/loading6.gif' class='splash_charge_logo'><font style='font-size: 12pt;'><span class='fas fa-file-excel'></span>&nbsp;&nbsp;Generando documento Excel</font>");
                  $('#modalAlertasSplash').modal('show');

                  $.ajax({
                    url:   'controller/generaExcelGestionOperativa.php',
                    type:  'post',
                    data:  {
                      search: $("#inputRodrigo").val(),
                      ...parametros,
                    },
                    success:  function (response) {
                      $('#modalAlertasSplash').modal('hide');
                      var random = Math.round(Math.random() * (1000000 - 1) + 1);
                      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Documento generado correctamente<br><font style='font-size: 9pt;'>(Si el documento no es descargado, favor verifique no tener bloqueadas las ventanas emergentes)</font>");
                      window.open(window.location.toString().split("#/")[0].split('?')[0] + '/controller/repositorio/temp/' + response, '_blank');
                    }
                  });
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
                "targets": [ 1 ]
              },
            ],
            "select": {
              style: 'single',
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

          $('#tablaJefatura').on('search.dt', function() {
            var value = $('.dataTables_filter input').val();
            $("#inputRodrigo").val(value);
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

            var lst = [
              'view/js/helpers/constants.js',
              'view/js/helpers/config.js',
              'view/js/helpers/validations.js',
              'view/js/helpers/functions.js',
              'view/js/pages/personal/create.js',
              'view/js/pages/personal/update.js',
              'view/js/pages/personal/obtain.js',
              'view/js/funciones.js',
            ];
            lst.forEach((fl, idx) => {
              setTimeout(function(){
                var idload = 29 + idx;
                var js = document.createElement('script');
                js.src = `${fl}?idload=${idload}`;
                document.getElementsByTagName('head')[0].appendChild(js);
              }, 1000);
            });

            $('#contenido').show();
            $('#footer').parent().show();
            $('#footer').show();

            $('#modalAlertasSplash').modal('hide');
            setTimeout(function(){
              $('#tablaJefatura').DataTable().columns.adjust();
            },500);
          },1000);
          marcarMenuActivo(); menuElegant();
        }, 200);
      }
    }
  });
});

app.controller("sucursalController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                  { data: 'DIRECCION' },
                  { data: 'COMUNA'},
                  { data: 'BODEGA_FLOTA', className: "centerDataTable" },
                  { data: 'ESTADO', className: "centerDataTable" }
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
                  "width": "5px",
                  "targets": 1
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
                      js.src = 'view/js/funciones.js?idLoad=82';
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
                marcarMenuActivo(); menuElegant();
              }
          });
        },200);
      }
    }
  });
});

app.controller("mantenedorAreaFuncionalController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                  { data: 'PAIS' },
                  { data: 'ESTADO' }
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 2,3, 4, 5, 6, 7, 8 ]
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
                    js.src = 'view/js/funciones.js?idLoad=82';
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

        },200);
        marcarMenuActivo(); menuElegant();
      }
    }
  });
});

app.controller("mantenedorPaisesController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                    js.src = 'view/js/funciones.js?idLoad=82';
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

        },200);
        marcarMenuActivo(); menuElegant();
      }
    }
  });
});

app.controller("personalController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                      marcarMenuActivo(); menuElegant();
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

app.controller("planillaAsistenciaController", function(){
    setTimeout(function(){
      marcarMenuActivo(); menuElegant();
    },1000);
  var path = initScreen();
  var theme = {
    theme: 'bootstrap4',
    width: $(this).data('width')
      ? $(this).data('width')
      : $(this).hasClass('w-100')
        ? '100%'
        : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
    closeOnSelect: !$(this).attr('multiple'),
    // sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
  }
  loading(true);

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaCentrosDeCostos").select2(theme);
  }

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaAnhos").select2(theme);
  }

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaMeses").select2(theme);
  }

  if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $("#selectListaSemanas").select2(theme);
  }

  var html = "<option value='0'>Seleccione</option>";
  $("#selectListaAnhos").html(html);
  $("#selectListaMeses").html(html);
  $("#selectListaSemanas").html(html);

  $.ajax({
    url:   'controller/accesoCorrecto.php',
    type:  'post',
    data: { path },
    success: function (response) {
      if (response === "NO") {
        restricted();
      } else if (response === "DESCONECTADO") {
        window.location.href = "#/home";
      } else {
        setTimeout(async function() {
          await $.ajax({
            url:   'controller/datosAccionesVisibles.php',
            type:  'post',
            data: { path, },
            success: function (response) {
              var p = jQuery.parseJSON(response);
              if(p.aaData.length !== 0){
                for(var i = 0; i < p.aaData.length; i++) {
                  if(p.aaData[i].VISIBLE == 1){
                    if(p.aaData[i].ENABLE == 1){
                      $("#accionesPlanilla").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                    } else{
                      $("#accionesPlanilla").append('<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding-right: 0;"><button disabled class="form-control btn btn-secondary botonComun" id="' + p.aaData[i].IDBOTON + '"><span class="' + p.aaData[i].ICONO + '"></span>&nbsp;&nbsp;' + p.aaData[i].TEXTO + '</button></div>');
                    }
                  }
                }
              }
            }
          });

          $("#informeRexmasAsistencia").unbind("click").click(async function(){
            splashOpen();
            var path = window.location.href.split('#/')[1];
            var parametros = {
              "path": path
            }
            await $.ajax({
              url: 'controller/datosCentrosDeCostosPerfil.php',
              type: 'post',
              dataType: 'json',
              data: parametros,
              success: function (response) {
                var data = response.aaData;
                var html = "<option selected value='0'>Seleccione</option>";
                html += "<option value='-1'>Todos</option>";
                data.forEach((item) => {
                  html += `<option value="${item.DEFINICION}">${item.DEFINICION} - ${item.NOMENCLATURA}</option>`;
                });
                $('#cecoGeneraInformeRexmas1').html(html);
              },
            });

            await $("#rangoGeneraInformeRexmas1").daterangepicker({
              drops: 'up',
              timePicker: true,
              startDate: moment().startOf('hour'),
              endDate: moment().startOf('hour'),
              locale: {
                format: 'Y-M-D'
              }
            });

            if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
              $("#cecoGeneraInformeRexmas1").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
              $("#tipoInformeGeneraInformeRexmas1").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
            }

            setTimeout(function(){
              $("#modalAlertasSplash").modal("hide");
              $("#modalGeneraInformeRexmas1").modal({backdrop: 'static', keyboard: false});
              $("#modalGeneraInformeRexmas1").modal("show");
            },500);
          });

          //Llamado a generaciónd e informes
          $("#generarGeneraInformeRexmas1").click(async function(){
            if($("#cecoGeneraInformeRexmas1").val() == 0){
              alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe seleccionar una opción de CECO");
            }
            else{
              if($("#tipoInformeGeneraInformeRexmas1").val() == "faltas"){
                $("#modalGeneraInformeRexmas1").modal("hide");

                splashOpen();

                var parametros2 = {
                  "ceco": $("#cecoGeneraInformeRexmas1").val(),
                  "fechaInicio": $("#rangoGeneraInformeRexmas1").val().split(" - ")[0],
                  "fechaFin": $("#rangoGeneraInformeRexmas1").val().split(" - ")[1],
                  "tipo": $("#tipoInformeGeneraInformeRexmas1").val()
                }

                $.ajax({
                  url:   'controller/solicitudInformeRexmas.php',
                  type:  'post',
                  data: parametros2,
                  success: function (response) {
                    setTimeout(function(){
                      $("#modalAlertasSplash").modal("hide");
                      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Informe solicitado, una vez generado será enviado a su e-mail registrado");
                    },500);
                  }
                });
              }
              else if($("#tipoInformeGeneraInformeRexmas1").val() == "heAtrasos"){
                var he50 = 0;
                var he100 = 0;
                var atraso = 0;

                if($('#he50GeneraInformeRexmas1').is(':checked')){
                  he50 = 1;
                }
                if($('#he100GeneraInformeRexmas1').is(':checked')){
                  he100 = 1;
                }
                if($('#atrasoGeneraInformeRexmas1').is(':checked')){
                  atraso = 1;
                }

                if(he50 == 0 && he100 == 0 && atraso == 0){
                  alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe seleccionar una opción de hora extra y/o atraso");
                }
                else{
                  $("#modalGeneraInformeRexmas1").modal("hide");

                  splashOpen();

                  var parametros2 = {
                    "ceco": $("#cecoGeneraInformeRexmas1").val(),
                    "fechaInicio": $("#rangoGeneraInformeRexmas1").val().split(" - ")[0],
                    "fechaFin": $("#rangoGeneraInformeRexmas1").val().split(" - ")[1],
                    "tipo": $("#tipoInformeGeneraInformeRexmas1").val(),
                    "he50": he50,
                    "he100": he100,
                    "atraso": atraso
                  }

                  $.ajax({
                    url:   'controller/solicitudInformeRexmas.php',
                    type:  'post',
                    data: parametros2,
                    success: function (response) {
                      setTimeout(function(){
                        $("#modalAlertasSplash").modal("hide");
                        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Informe solicitado, una vez generado será enviado a su e-mail registrado");
                      },500);
                    }
                  });
                }
              }
              else if($("#tipoInformeGeneraInformeRexmas1").val() == "general"){
                $("#modalGeneraInformeRexmas1").modal("hide");

                splashOpen();

                var parametros2 = {
                  "ceco": $("#cecoGeneraInformeRexmas1").val(),
                  "fechaInicio": $("#rangoGeneraInformeRexmas1").val().split(" - ")[0],
                  "fechaFin": $("#rangoGeneraInformeRexmas1").val().split(" - ")[1],
                  "tipo": $("#tipoInformeGeneraInformeRexmas1").val()
                }

                $.ajax({
                  url:   'controller/solicitudInformeRexmas.php',
                  type:  'post',
                  data: parametros2,
                  success: function (response) {
                    setTimeout(function(){
                      $("#modalAlertasSplash").modal("hide");
                      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Informe solicitado, una vez generado será enviado a su e-mail registrado");
                    },500);
                  }
                });
              }
              else if($("#tipoInformeGeneraInformeRexmas1").val() == "generalMensual"){
                var fecha = $("#mesGeneraInformeRexmas1").val();
                var formatoValido = /^\d{4}-\d{2}$/.test(fecha);
                var fechaValida = false;

                if (formatoValido) {
                  var partes = fecha.split('-');
                  var year = parseInt(partes[0]);
                  var month = parseInt(partes[1]);
                  fechaValida = (year >= 2000 && year <= 2035 && month >= 1 && month <= 12);
                }

                if (formatoValido && fechaValida) {
                  $(this).removeClass('is-invalid');
                  $("#modalGeneraInformeRexmas1").modal("hide");

                  splashOpen();

                  var parametros2 = {
                    "ceco": $("#cecoGeneraInformeRexmas1").val(),
                    "anoMes": $("#mesGeneraInformeRexmas1").val(),
                    "tipo": $("#tipoInformeGeneraInformeRexmas1").val()
                  }

                  $.ajax({
                    url:   'controller/solicitudInformeRexmas.php',
                    type:  'post',
                    data: parametros2,
                    success: function (response) {
                      setTimeout(function(){
                        $("#modalAlertasSplash").modal("hide");
                        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Informe solicitado, una vez generado será enviado a su e-mail registrado");
                      },500);
                    }
                  });
                } else {
                  $(this).addClass('is-invalid');
                  alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El valor ingresado no cumple con el patrón YYYY-MM");
                }
              }
            }
          });

          $("#tipoInformeGeneraInformeRexmas1").unbind("click").change(async function(e){
            e.preventDefault()
            e.stopImmediatePropagation();
            if($("#tipoInformeGeneraInformeRexmas1").val() == "heAtrasos"){
              $("#selTipoInformeGeneraInformeRexmas1").show();
            }
            else{
              $("#selTipoInformeGeneraInformeRexmas1").hide();
            }

            if($("#tipoInformeGeneraInformeRexmas1").val() == "generalMensual"){
              $("#rangoGeneraInformeRexmas1").parent().hide();
              $("#mesGeneraInformeRexmas1").parent().show();
            }
            else{
              $("#rangoGeneraInformeRexmas1").parent().show();
              $("#mesGeneraInformeRexmas1").parent().hide();
            }

            if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
              $("#cecoGeneraInformeRexmas1").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
              $("#tipoInformeGeneraInformeRexmas1").select2({
                  theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
              });
            }
          });

          $("#mesGeneraInformeRexmas1").blur(function(e) {
            e.preventDefault()
            e.stopImmediatePropagation();
            var fecha = $(this).val();
            var formatoValido = /^\d{4}-\d{2}$/.test(fecha);
            var fechaValida = false;

            if (formatoValido) {
              var partes = fecha.split('-');
              var year = parseInt(partes[0]);
              var month = parseInt(partes[1]);
              fechaValida = (year >= 2000 && year <= 2035 && month >= 1 && month <= 12);
            }

            if (formatoValido && fechaValida) {
              $(this).removeClass('is-invalid');
            } else {
              $(this).addClass('is-invalid');
              alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El valor ingresado no cumple con el patrón YYYY-MM");
            }
          });

          await listComunesPlanilla();
          await listCentrosDeCostos();
          await listCalendarioSegunPerfil(path);
          await listPlanillaAsistencia('null', 'null', 'null');
          marcarMenuActivo(); menuElegant();
        }, 500);
      }
    }
  });
});

app.controller("indicadorAusentismoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  loading(true);
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    loading(true);
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
        $('#footer').parent().show();
        $('#footer').show();

        // var params = {
        //   "ds46.usuario": response
        // };

        var d = new Date();
        var ano = d.getFullYear();
        var mes = d.getMonth();

        $("#ausentismoBI").attr("src",'https://lookerstudio.google.com/embed/u/0/reporting/1d0af53c-4379-4b05-8955-2d45d4a7860b/page/SAyWD?params={"df5":"include%EE%80%801%EE%80%80IN%EE%80%80' + ano.toString() + '","df6":"include%EE%80%801%EE%80%80IN%EE%80%80' + mes.toString() + '"}');
        setTimeout(function(){
          $("#ausentismoBI").attr("width","98%");
          $("#ausentismoBI").attr("height",$(window).height()-30);
          setTimeout(function(){
            loading(false);
          },2000);
        },2000);
        setTimeout(async function(){
          marcarMenuActivo();
        },2000);
      }
    }
  });
});

// Inicio Flota
app.controller("tipoVehiculoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
              js.src = 'view/js/funciones.js?idLoad=82';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
          marcarMenuActivo(); menuElegant();
        },200);
      }
    }
  });
});

app.controller("marcaModeloController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
      			    js.src = 'view/js/funciones.js?idLoad=82';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          marcarMenuActivo(); menuElegant();
        },200);
      }
    }
  });
});

app.controller("aseguradoraController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
      			    js.src = 'view/js/funciones.js?idLoad=82';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          marcarMenuActivo(); menuElegant();
        },200);
      }
    }
  });
});

app.controller("proveedoresController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
      			    js.src = 'view/js/funciones.js?idLoad=82';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
          marcarMenuActivo(); menuElegant();
        },200);
      }
    }
  });
});

app.controller("vehiculoController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                  { data: 'OPERACION_VALIDA'},
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
                  { data: 'MONTO', render: $.fn.dataTable.render.number( '', '.', 2, '' ), "defaultContent": '0' },
                  { data: 'TIPOMONTO' },
              ],
              buttons: [
                  {
                    extend: 'excel',
                    exportOptions: {
                      columns: [ 1,2,3,22,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25,26,27,28,29,30,36,37 ]
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
                          setTimeout(function(){
                            marcarMenuActivo();
                            menuElegant();
                          },2500);
                        },500);
                      },100);
                    },100);
                  }
                });
              }
          });
          table.on( 'search.dt', function () {
              setTimeout(function(){
                $('#tablaListadoVehiculo').DataTable().columns.adjust();
              },100);
          });

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
      			    js.src = 'view/js/funciones.js?idLoad=82';
      			    document.getElementsByTagName('head')[0].appendChild(js);
      			  },500);
      			},100);
          },1000);
        },200);
      }
    }
  });
});

app.controller("tarjetasCombustibleController", function(){
  clearInterval(lineaTiempo);
  clearInterval(personalPropio);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
          $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                $('#footer').parent().show();
                $('#footer').show();

                setTimeout(function(){
                  setTimeout(function(){
                    $("#filtrosTarjetaCombustible").css("height","0");
                    $("#filtrosTarjetaCombustible").fadeOut();
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      marcarMenuActivo();
                      menuElegant();
                    },500);
                    setTimeout(function(){
                      $("#spanButtonFiltrosTarjetaCombustible").click();
                    },100);
                    setTimeout(function(){
                      $('#tablaTarjetaCombustible').DataTable().columns.adjust();
                    },500);
                  },2000);
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
              js.src = 'view/js/funciones.js?idLoad=82';
              document.getElementsByTagName('head')[0].appendChild(js);
            },500);
          },1000);
        },200);
      }
    }
  });
});
// Fin Flota
