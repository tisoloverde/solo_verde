var lineaTiempo = '';
var personalPropio = '';
var app = angular.module("WPApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/login", {
        controller: "loginController",
        controllerAs: "vm",
        templateUrl : "view/home/login.html?idload=9"
    })
    .when("/home", {
        controller: "homeController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idload=9"
    })
    .when("/logout", {
        controller: "logoutController",
        controllerAs: "vm",
        templateUrl : "view/home/home.html?idload=9"
    })
    .when("/changePass", {
        controller: "changePassController",
        controllerAs: "vm",
        templateUrl : "view/home/changePass.html?idload=9"
    })
    .when("/usuarios", {
        controller: "usuariosController",
        controllerAs: "vm",
        templateUrl : "view/usuario/usuarios.html?idload=9"
    })
    .when("/perfiles", {
        controller: "perfilesController",
        controllerAs: "vm",
        templateUrl : "view/usuario/perfiles.html?idload=9"
    })
    .when("/dotacion", {
        controller: "dotacionController",
        controllerAs: "vm",
        templateUrl : "view/personal/dotacion.html?idload=9"
    })
    .otherwise({redirectTo: '/home'});

    $locationProvider.hashPrefix('');
});

app.controller("homeController", function(){
  if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#footerLogin").removeAttr("src");
  }
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
  splashOpen();
  setTimeout(function(){
    splashOpen();
  },5);
  setTimeout(async function(){
    await $.ajax({
      url:   'controller/datosImgTam.php',
      type:  'post',
      success: function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0) {
          if(p.aaData[0].img_tam === 'v'){
            $("#footerLogin").css("height","90px");
          }
          else{
            $("#footerLogin").css("width","160px");
          }
        }
      }
    });
    menuElegant();
    $("#menu-lateral").hide();
    $('#contenido').show();
    $(".contenedor-logos").css("display","none");
    $(".contenedor-logos").find('li').css("display","none");
    $("#sesionActiva").val("0");
    $("#sesionActivaUso").val("0");
    $("#logoMenu").show();

    setTimeout(function(){
      $("#menu-lateral").hide();
      $('#modalAlertasSplash').modal('hide');
    },2000);
  },500);
});

app.controller("loginController", function(){
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
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
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
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

app.controller("usuariosController", function(){
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
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
                      js.src = 'view/js/funciones.js?idload=9';
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
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
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

app.controller("dotacionController", function(){
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
    closeOnSelect: !$(this).attr('multiple')
  }
  loading(true);

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
          // await listDotacion();
          esconderMenu();
          menuElegant();
          loading(false);
        }, 200);
      }
    }
  });
});
