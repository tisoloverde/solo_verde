var lineaTiempo = '';
var personalPropio = '';
var app = angular.module("WPApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/login", {
        controller: "loginController",
        controllerAs: "vm",
        templateUrl : "view/home/login.html?idload=26"
    })
    .when("/home", {
        controller: "homeController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idload=26"
    })
    .when("/logout", {
        controller: "logoutController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idload=26"
    })
    .when("/changePass", {
        controller: "changePassController",
        controllerAs: "vm",
        templateUrl : "view/home/changePass.html?idload=26"
    })
    .when("/usuarios", {
        controller: "usuariosController",
        controllerAs: "vm",
        templateUrl : "view/usuario/usuarios.html?idload=26"
    })
    .when("/perfiles", {
        controller: "perfilesController",
        controllerAs: "vm",
        templateUrl : "view/usuario/perfiles.html?idload=26"
    })
    .when("/dotacion", {
        controller: "dotacionController",
        controllerAs: "vm",
        templateUrl : "view/personal/dotacion.html?idload=26"
    })
    .when("/subcontratistas", {
        controller: "subcontratistasController",
        controllerAs: "vm",
        templateUrl : "view/controlling/subcontratistas.html?idload=26"
    })
    .when("/gerencia", {
        controller: "gerenciaController",
        controllerAs: "vm",
        templateUrl : "view/controlling/gerencia.html?idload=26"
    })
    .when("/estadoProyecto", {
        controller: "estadoProyectoController",
        controllerAs: "vm",
        templateUrl : "view/controlling/estadoProyecto.html?idload=26"
    })
    .when("/clienteProyecto", {
        controller: "clienteController",
        controllerAs: "vm",
        templateUrl : "view/controlling/cliente.html?idload=26"
    })
    .when("/centro_costos",{
        controller: "proyectosController",
        controllerAs: "wm",
        templateUrl: "view/controlling/proyecto.html?idload=26"
    })
    .when("/gestionJefatura", {
      controller: "jefaturaController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/gestionJefatura.html?idload=26"
    })
    .when("/areaFuncional", {
        controller: "mantenedorAreaFuncionalController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/areaFuncional.html?idload=26"
    })
    // Sucursales
    .when("/sucursales", {
      controller: "sucursalController",
      controllerAs: "vm",
      templateUrl : "view/adminPersonal/sucursal.html?idload=26"
    })
    .when("/paises", {
        controller: "mantenedorPaisesController",
        controllerAs: "vm",
        templateUrl : "view/adminPersonal/paises.html?idload=26"
    })
    .when("/equipo", {
        controller: "personalController",
        controllerAs: "vm",
        templateUrl : "view/personal/personal.html?idload=26"
    })
    .when("/planillaAsistencia", {
      controller: "planillaAsistenciaController",
      controllerAs: "vm",
      templateUrl : "view/personal/planillaAsistencia.html?idload=26"
    })
    .when("/indicadorAusentismo", {
      controller: "indicadorAusentismoController",
      controllerAs: "vm",
      templateUrl : "view/reporteria/ausentismo.html?idload=26"
    })
    .otherwise({redirectTo: '/home'});

    $locationProvider.hashPrefix('');
});

app.controller("homeController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
      }
    }
  });
});

app.controller("loginController", function(){
  setTimeout(function(){
    $("body").css("height",$(window).height());
    $("#contenido").css("height",$(window).height()-10); menuElegant();
  },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
  setTimeout(function(){
    var url = window.location.origin;
    menuElegant();

    var url = window.location.origin;

    $("#imgLogin").attr("src","controller/cargarLogo.php?url=" + url);

    var margH = $(window).height()/2 - 200;

    $("#msgDatos").css("margin-top",margH);

    $("#menu-lateral").show();
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

                      n = p.aaData['NOMBRE'].split(" ");
                      if(n.length <= 3){
                        $("#nombrePerfil").html(p.aaData['NOMBRE']);
                        $("#usuarioLogin").html(p.aaData['NOMBRE']);
                      }
                      else{
                        $("#nombrePerfil").html(n[0] + ' ' + n[2] + ' ' + n[3]);
                        $("#usuarioLogin").html(n[0] + ' ' + n[2] + ' ' + n[3]);
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
                            a = a*28 + 30;
                          }
                          else{
                            a = a*25 + 30;
                          }
                          $(this).css("height", a + "pt");
                          $(this).css("background-color","#1E3E37");
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
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },500);
                      },2000);
                    }
                  }
                });
              }
              else{
                setTimeout(function(){
                  $('#menu-lateral').show();
                  menuElegant();
                  esconderMenu();
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
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
  },500);
});

app.controller("logoutController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
    },1000);
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
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

app.controller("changePassController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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

app.controller("usuariosController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                      js.src = 'view/js/funciones.js?idload=26';
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

app.controller("perfilesController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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

app.controller("dotacionController", function(){
  setTimeout(function(){
    $("body").css("height",$(window).height());
    $("#contenido").css("height",$(window).height()-10); menuElegant();
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
          esconderMenu();
          menuElegant();
        }, 500);
      }
    }
  });
});

app.controller("subcontratistasController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                    js.src = 'view/js/funciones.js?idload=26';
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

app.controller("gerenciaController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                js.src = 'view/js/funciones.js?idload=26';
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

app.controller("estadoProyectoController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                js.src = 'view/js/funciones.js?idload=26';
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

app.controller("clienteController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                js.src = 'view/js/funciones.js?idload=26';
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

app.controller("proyectosController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                js.src = 'view/js/funciones.js?idload=26';
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

app.controller("jefaturaController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                  $("#textoModalSplash").html("<img src='view/img/loading6.gif' class='splash_charge_logo'><font style='font-size: 12pt;'><span class='fas fa-file-excel'></span>&nbsp;&nbsp;Generando documento Excel</font>");
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
              js.src = 'view/js/funciones.js?idload=26';
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

app.controller("sucursalController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                      js.src = 'view/js/funciones.js?idload=26';
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

app.controller("mantenedorAreaFuncionalController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                    js.src = 'view/js/funciones.js?idload=26';
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

app.controller("mantenedorPaisesController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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
                    js.src = 'view/js/funciones.js?idload=26';
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

app.controller("personalController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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

app.controller("planillaAsistenciaController", function(){
    setTimeout(function(){
      $("body").css("height",$(window).height());
      $("#contenido").css("height",$(window).height()-10); menuElegant();
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

          await listComunesPlanilla();
          await listCentrosDeCostos();
          await listCalendario();
          await listPlanillaAsistencia('null', 'null', 'null');
          esconderMenu();
          menuElegant();
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
        $('#menu-lateral').show();
        $('#footer').parent().show();
        $('#footer').show();

        // var params = {
        //   "ds46.usuario": response
        // };

        $("#ausentismoBI").attr("src",'https://datastudio.google.com/embed/reporting/031d202f-a3ed-445e-86e0-0f2818c09c0a/page/CpqAD');
        setTimeout(function(){
          $("#ausentismoBI").attr("width","98%");
          $("#ausentismoBI").attr("height",$(window).height()-30);
          setTimeout(function(){
            loading(false);
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
