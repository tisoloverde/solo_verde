$(window).resize(function()
{
   var viewportWidth = $(window).width();
   var viewportHeight = $(window).height();
});

$(window).on("load",function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  $('body').on('show.bs.modal', function() {
    $('.modal-body').overlayScrollbars({
  	  className: "os-theme-round-dark",
      autoUpdate: true,
      overflowBehavior: {
        x: 'hidden'
      },
      resize: "none",
      scrollbars: {
        autoHide: "never"
      }
  	});
    if($("#modalCaratulaObras").is(':visible') == false){
      setTimeout(function(){
        $(".os-viewport.os-viewport-native-scrollbars-invisible").scrollTop(0,0);
      },200);
    }
  });
  $('body').on('hidden.bs.modal',function(){
    $('#contenido').overlayScrollbars({
      className: "os-theme-round-dark",
      autoUpdate: true,
      nativeScrollbarsOverlaid : {
        showNativeScrollbars   : false,
        initialize             : true
      },
      overflowBehavior: {
        x: 'hidden',
        y : "scroll"
      },
      resize: "none",
      scrollbars: {
        autoHide: "never",
        touchSupport: true,
      }
    });
  });
  $(document).bind("click keydown keyup mousemove", function() {
    tiempo2 = moment(new Date());
    if(tiempo2.diff(moment(localStorage['tokenTime']), 'seconds') > 20){
      // console.log("vuelta");
      // console.log(localStorage['tokenTime']);
      // console.log(tiempo2);
      localStorage['tokenTime'] = tiempo2;
    }
	});
  document.addEventListener('touchstart', function(event){
  //Comprobamos si hay varios eventos del mismo tipo
    if (event.targetTouches.length == 1) {
    var touch = event.targetTouches[0];
    // con esto solo se procesa UN evento touch
      tiempo2 = moment(new Date());
      if(tiempo2.diff(moment(localStorage['tokenTime']), 'seconds') > 20){
        //console.log("vuelta");
        // console.log(localStorage['tokenTime']);
        // console.log(tiempo2);
        localStorage['tokenTime'] = tiempo2;
      }
    }
  });
  $.ajax({
      url:   'controller/checkToken.php',
      type:  'post',
      success: function (response) {
        if(response === 'TOKEN_NO'){
          localStorage.clear();
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
        else{
          localStorage['tokenTime'] = moment(new Date());
          var path = window.location.href.split('#/')[1];
          var parametros = {
            "path": path
          }
          if(path !== "login"){
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

                        $('#menu-lateral').show();
                        menuElegant();
                        // $('#modalAlertasSplash').modal('hide');
                      }
                      else{
                        setTimeout(function(){
                          $('#menu-lateral').show();
                          menuElegant();
                          // esconderMenu();
                          // $('#modalAlertasSplash').modal('hide');
                        },5000);
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
          }
        }
      },
      complete: function(){
        // $('#contenido').show();
        // $('#footer').show();
        // $('#menu-lateral').show();
      }
  });
  setInterval(function(){
    $.ajax({
      url: 'controller/keepAlive.php',
      type: 'post',
      success: function (response){
      }
    });
  },600000);
  $.ajax({
    url:   'controller/datosRefresh.php',
    type:  'post',
    success: async function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData.length !== 0){
        if(p.aaData['ESTADO'] === 'Activo' && p.aaData['TIPO'] === 'COMUN'){
          setInterval(function(){
            // console.log("interval");
            tiempo2 = moment(new Date());
            if(tiempo2.diff(moment(localStorage['tokenTime']), 'seconds') > 300){
              // console.log("Desconectando Sistema");
              $.ajax({
                  url:   'controller/cerraSesion.php',
                  type:  'post',
                  success: function (response) {
                    clearInterval(lineaTiempo);
                    $(".modal").modal("hide");
                    $('.modal-backdrop').remove();
                    $(".contenedor-logos").css("display","none");
                    $(".contenedor-logos").find('li').css("display","none");
                    $("#sesionActiva").val("0");
                    $("#sesionActivaUso").val("0");
                    window.location.href = "#/home";
                    setTimeout(function(){
                      $("#cerradoInactivo").show();
                    },300);
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
                    localStorage.clear();
                    setTimeout(function(){
                      $("#modalAlertasSplash").modal("hide");
                    },5000);
                  }
              });
            }
            else{
              $.ajax({
                url:   'controller/cookie.php',
                type:  'post',
                success: function (response) {
                }
              });
            }
          },60000);
        }
      }
    }
  });

  setInterval(async function(){
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
  },300000);
});

//Splash open
function splashOpen(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $('#modalAlertasSplash').modal('show');
}

//Funcion de menu
function menuElegant(){
  setTimeout(function(){
    $('#contenido').overlayScrollbars({
      className: "os-theme-thin-dark",
      autoUpdate: true,
      nativeScrollbarsOverlaid : {
        showNativeScrollbars   : false,
        initialize             : true
      },
      overflowBehavior: {
        x: 'hidden',
        y : "scroll"
      },
      resize: "none",
      scrollbars: {
        autoHide: "never",
        touchSupport: true,
      }
    });
  },500);
}

//Alertas Toast
function alertasToast(texto){
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
  }
  if(texto.includes("check.gif") == true){
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","");
    toastr["success"](texto);
  }
  else if(texto.includes("info.png") == true){
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","");
    toastr["info"](texto);
  }
  else if(texto.includes("error.gif") == true){
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","");
    toastr["error"](texto);
  }
  else{
    toastr["info"](texto);
  }
}

//Verificar input quita borde rojo
$("#loginSystem-rut").on('input', function(){
  $(this).removeClass("is-invalid");
});

//Verifica rut
function Rut()
{
  var texto = window.document.getElementById("loginSystem-rut").value;
  var tmpstr = "";
  for ( i=0; i < texto.length ; i++ )
    if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
      tmpstr = tmpstr + texto.charAt(i);
  texto = tmpstr;
  largo = texto.length;

  if(texto == ""){
    return false;
  }
  else if ( largo < 2 )
  {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe ingresar el DNI completo");
    window.document.getElementById("loginSystem-rut").value = "";
    $("#loginSystem-rut").addClass("is-invalid");
    window.document.getElementById("loginSystem-rut").focus();
    window.document.getElementById("loginSystem-rut").select();
    return false;
  }

  for (i=0; i < largo ; i++ )
  {
    if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
    {
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Los datos ingresados no corresponden a un DNI válido");
      window.document.getElementById("loginSystem-rut").value = "";
      $("#loginSystem-rut").addClass("is-invalid");
      window.document.getElementById("loginSystem-rut").focus();
      window.document.getElementById("loginSystem-rut").select();
      return false;
    }
  }

  var invertido = "";
  for ( i=(largo-1),j=0; i>=0; i--,j++ )
    invertido = invertido + texto.charAt(i);
  var dtexto = "";
  dtexto = dtexto + invertido.charAt(0);
  dtexto = dtexto + '-';
  cnt = 0;

  for ( i=1,j=2; i<largo; i++,j++ )
  {
    //alert("i=[" + i + "] j=[" + j +"]" );
    if ( cnt == 3 )
    {
      dtexto = dtexto + '.';
      j++;
      dtexto = dtexto + invertido.charAt(i);
      cnt = 1;
    }
    else
    {
      dtexto = dtexto + invertido.charAt(i);
      cnt++;
    }
  }

  invertido = "";
  for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )
    invertido = invertido + dtexto.charAt(i);
  window.document.getElementById("loginSystem-rut").value = invertido.toUpperCase()
  if ( revisarDigito(texto) )
    return true;

  return false;
}

function revisarDigito2( dvr )
{
  dv = dvr + ""
  if ( dv != "" && dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')
  {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe ingresar un digito verificador válido");
    $("#loginSystem-rut").addClass("is-invalid");
    window.document.getElementById("loginSystem-rut").focus();
    window.document.getElementById("loginSystem-rut").select();
    return false;
  }
  return true;
}

function revisarDigito( crut )
{
  largo = crut.length;
  if(crut == ""){
    return false;
  }
  else if ( largo < 2)
  {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe ingresar el DNI completo");
    window.document.getElementById("loginSystem-rut").value = "";
    $("#loginSystem-rut").addClass("is-invalid");
    window.document.getElementById("loginSystem-rut").focus();
    window.document.getElementById("loginSystem-rut").select();
    return false;
  }
  if ( largo > 2 )
    rut = crut.substring(0, largo - 1);
  else
    rut = crut.charAt(0);
  dv = crut.charAt(largo-1);
  revisarDigito2( dv );

  if ( rut == null || dv == null )
    return 0

  var dvr = '0'
  suma = 0
  mul  = 2

  for (i= rut.length -1 ; i >= 0; i--)
  {
    suma = suma + rut.charAt(i) * mul
    if (mul == 7)
      mul = 2
    else
      mul++
  }
  res = suma % 11
  if (res==1)
    dvr = 'k'
  else if (res==0)
    dvr = '0'
  else
  {
    dvi = 11-res
    dvr = dvi + ""
  }
  if ( dvr != dv.toLowerCase() )
  {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Los datos ingresados no corresponden a un DNI válido");
    window.document.getElementById("loginSystem-rut").value = "";
    $("#loginSystem-rut").addClass("is-invalid");
    window.document.getElementById("loginSystem-rut").focus();
    window.document.getElementById("loginSystem-rut").select();
    return false
  }

  return true
}

//Guarda codigo 2FA según QR
$("#guardarCrear2fa").unbind('click').click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalCrear2fa").modal("hide");
  $.ajax({
    url:   'controller/validaTestGACrear.php',
    type:  'post',
    data:  {
      "codigo": $("#codigoCrear2fa").val()
    },
    success: async function (response) {
      if(response != 'Error'){
        await $.ajax({
          url:   'controller/ingresarCodeGA.php',
          type:  'post',
          data: {
            "login2fa": 1,
            "firma2fa": 0,
            "codigo": $("#codigoCrear2fa").val()
          },
          success: function (resp) {
            if(resp != 'Error'){
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Contraseña 2FA creada correctamente, accediendo al sistema.");

              setTimeout(function(){
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                window.location.href = "?idLog=" + random + "#/login";
              },4000);
            }
          }
        });
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Código incorrecto");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          $("#modalCrear2fa").modal("show");
        },500);
      }
    }
  });
});

//Login a sistema
$("#loginSystem-submit").unbind('click').click(function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    var URLactual = window.location;
    var gc = 0;
    if($("#recordarDatosLogin").prop("checked")){
      gc = 1;
    }
    var parametros = {
        "pass" : $("#loginSystem-pass").val(),
        "rut" : $("#loginSystem-rut").val().replace('.','').replace('.',''),
        "url" : URLactual.toString(),
        "gc": gc
    };
    $.ajax({
        data:  parametros,
        url:   'controller/datosUsuarioConectado.php',
        type:  'post',
        success: function (response) {
          var p = jQuery.parseJSON(response);
          if(p.aaData.length !== 0){
            if(p.aaData[0]['CHECK'] == 'NO'){
              $.ajax({
                  data:  parametros,
                  url:   'controller/datosPreLogin.php',
                  type:  'post',
                  success: async function (response) {
                    var p = jQuery.parseJSON(response);
                    if(p.aaData.length !== 0){
                      if(p.aaData['ESTADO'] === 'Activo'){
                        if(p.aaData['LOGIN_2FA'] === '1'){
                          $("#secretLogin2fa").val(p.aaData['TOKEN_G_AT']);
                          $("#nombreLogin2fa").val(p.aaData['NOMBRE']);
                          $("#codigoLogin2fa").val('');
                          setTimeout(function(){
                            $('#modalAlertasSplash').modal('hide');
                            $("#modalLogin2fa").modal({backdrop: 'static', keyboard: false});
                            $("#modalLogin2fa").modal("show");
                          },500);
                        }
                        else{
                          var url = window.location.origin;

                          $.ajax({
                            url:   'controller/datosTestGA.php',
                            type:  'post',
                            data:  {
                              "url": url
                            },
                            success: function (response) {
                              if(response != 'Error'){
                                $("#qrGACrear2fa").attr("src",response);
                                setTimeout(function(){
                                  $('#modalAlertasSplash').modal('hide');
                                  $("#modalCrear2fa").modal({backdrop: 'static', keyboard: false});
                                  $("#modalCrear2fa").modal("show");
                                },4000);
                              }
                            }
                          });
                        }
                      }
                      else{
                        var random = Math.round(Math.random() * (1000000 - 1) + 1);
                        alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El usuario ingresado no se encuentra activo en sistema");
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },500);
                      }
                    }
                    else{
                      var random = Math.round(Math.random() * (1000000 - 1) + 1);
                      alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Datos de acceso incorrectos o no registrados en sistema");
                      setTimeout(function(){
                        $('#modalAlertasSplash').modal('hide');
                      },500);
                    }
                  }
              });
            }
            else{


              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El usuario ingresado ya se encuentra conectado al sistema");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);

            }
          }
          else{


            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Datos de acceso incorrectos o no registrados en sistema");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },500);

          }
        }
    });
});

$("#validarLogin2fa").unbind("click").click(async function(e){
  e.preventDefault();
  valida2faEnter();
});

$("#codigoLogin2fa").on('input', function(){
  $(this).removeClass("is-invalid");
});

async function valida2faEnter(){
  if($("#codigoLogin2fa").val().length == 6){
    $('#modalLogin2fa').modal('hide');
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    var URLactual = window.location;
    var gc = 0;
    if($("#recordarDatosLogin").prop("checked")){
      gc = 1;
    }
    var parametros = {
      "codigo": $("#codigoLogin2fa").val(),
      "secret": $("#secretLogin2fa").val(),
      "pass" : $("#loginSystem-pass").val(),
      "rut" : $("#loginSystem-rut").val().replace('.','').replace('.',''),
      "url" : URLactual.toString(),
      "gc": gc
    }

    await $.ajax({
      data:  parametros,
      url:   'controller/datosLogin.php',
      type:  'post',
      success: async function (response) {
        var p = jQuery.parseJSON(response);
      }
    });
    await $.ajax({
      url:   'controller/validaTestGA.php',
      type:  'post',
      data:   parametros,
      success: async function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          $('#contenido').show();
          $('#menu-lateral').show();
          $('#footer').parent().show();
          $('#footer').show();

          $('#modalLogin2fa').modal('hide');
          localStorage['tokenTime'] = moment(new Date());
          // console.log(localStorage['tokenTime']);

          $("#sesionActiva").val("1");
          $("#sesionActivaUso").val("0");
          $("#logoMenu").show();

          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          window.location.href = "?idLog=" + random + "#/login";
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Clave 2fa no coincidente<br>Si tiene problemas favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
    });
  }
  else{
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>El código 2FA debe contener 6 caracteres exactos");
    $("#codigoLogin2fa").addClass("is-invalid");
  }
}

function esconderMenu(){
  $("#logoLinkWeb").hide();
  $("#menu-lateral").css("width","37px");
  $("#menu-lateral").css("background","rgba(30, 0, 0, 0.0)");
  $("#logoMenu").css("color","white");
  $("#iconoLogoMenu").css("border","1px solid white");
  $("#iconoLogoMenu").css("background","#0E1D1A");
  if($("#sesionActiva").val() == 1){
    $("#lineaMenu").hide();
    $(".contenedor-logos").css("display","none");
    $(".contenedor-logos").find('li').css("display","none");
  }
  $("#iconoLogoMenu").attr("class","imgMenu fas fas fa-bars");
  $("#logoMenu").show();
  $(".logo").hide();
}

function addCambiaPass(){
    $("#guardarChangePass").unbind();
    $("#guardarChangePass").unbind('click').click(function(){
        var pass1 = $("#passNuevo").val();
        var pass2 = $("#passNuevoConfirmar").val();
        if(pass1 == "" && pass2 == "")
        {
            $("#passNuevo").addClass("is-invalid");
            $("#passNuevoConfirmar").addClass("is-invalid");
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Ingrese todos los campos");
        }
        else if(pass1 == ""){
            $("#passNuevo").addClass("is-invalid");
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Ingrese todos los campos");
        }
        else if(pass2 == ""){
            $("#passNuevoConfirmar").addClass("is-invalid");
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Ingrese todos los campos");
        }
        else if(pass1 == pass2){
            var parametros = {
                "pass" :  $("#passNuevo").val()
            };
            //Chequeo mismo pass
            $.ajax({
                data:  parametros,
                url:   'controller/checkPassIgual.php',
                type:  'post',
                success:  function (response) {
                    var p = response.split(",");
                    if(p != null){
                        if(p[0] != "Sin datos" && p[0] != "" && p[0] != 'Error'){
                            if(p[0] == "Igual"){
                                $("#passNuevo").addClass("is-invalid");
                                $("#passNuevoConfirmar").addClass("is-invalid");
                                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                                alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Contraseña igual a la actual");
                            }
                            else{
                                $.ajax({
                                  data:  parametros,
                                  url:   'controller/actualizaPass.php',
                                  type:  'post',
                                  beforeSend: function(){
                                      $("#modalChangePass").modal("hide");
                                      $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                                      $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
                                      $('#modalAlertasSplash').modal('show');
                                  },
                                  success:  function (response) {
                                      var p = response.split(",");
                                      if(p != null){
                                          if(p[0] != "Sin datos" && p[0] != "" && p[0] != 'Error'){
                                              $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
                                              var random = Math.round(Math.random() * (1000000 - 1) + 1);
                                              alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Contraseña actualizada correctamente");
                                              $('#modalAlertasSplash').modal('show');
                                              $("#passNuevo").removeClass("is-invalid");
                                              $("#passNuevoConfirmar").removeClass("is-invalid");
                                              $("#passNuevo").val("");
                                              $("#passNuevoConfirmar").val("");
                                              $("#mensajeCambioPass").hide();
                                              $.ajax({
                                                  url:   'controller/cerraSesion.php',
                                                  type:  'post',
                                                  success: function (response) {
                                                    $(".modal").modal("hide");
                                                    $(".contenedor-logos").css("display","none");
                                                    $(".contenedor-logos").find('li').css("display","none");
                                                    $("#sesionActiva").val("0");
                                                    $("#sesionActivaUso").val("0");
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
                                                    localStorage.clear();
                                                    window.location.href = "#/home";
                                                    setTimeout(function(){
                                                      $('.modal-backdrop').remove();
                                                      $('#modalAlertasSplash').modal('hide');
                                                    },2000);
                                                  }
                                              });
                                          }
                                          else{
                                            $('#modalAlertasSplash').modal('hide');
                                            var random = Math.round(Math.random() * (1000000 - 1) + 1);
                                            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error en la actualización si el problema persiste<br/>favor comuniquese con soporte");
                                          }
                                      }
                                      else{
                                        $('#modalAlertasSplash').modal('show');
                                        var random = Math.round(Math.random() * (1000000 - 1) + 1);
                                        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error en la actualización si el problema persiste<br/>favor comuniquese con soporte");
                                      }
                                    }
                                  });
                            }
                        }
                    }
                }
            });
        }
        else{
            $("#passNuevo").addClass("is-invalid");
            $("#passNuevoConfirmar").addClass("is-invalid");
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Las contraseñas no coinciden");
        }
    });
}

$("#passNuevo").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#passNuevoConfirmar").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#agregarPerfil").unbind('click').click(function(){
  $("#perfilInformeDisponibilidad").prop("checked", false);
  $("#perfilInformeMetas").prop("checked", false);
  $("#modalIngresoPerfil").find("input").val("");
  $("#nombreIngresoPerfil").removeClass("is-invalid");
  var h = $(window).height() - 200;
  $("#bodyIngresoPerfil").css("height",h);
  $("#modalIngresoPerfil").modal('show');
});

$("#guardarIngresoPerfil").unbind('click').click(async function(){
  var informeDisponibilidad = 0;
  var informeMetas = 0;
  var nombrePerfil = $("#nombreIngresoPerfil").val();
  if($("#nombreIngresoPerfil").val().length == 0){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar los campos");
    $("#nombreIngresoPerfil").addClass("is-invalid");
  }
  else{
    $("#modalIngresoPerfil").modal("hide");
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    if($("#perfilInformeDisponibilidad").prop("checked") == true && $("#perfilInformeMetas").prop("checked") == true){
      informeDisponibilidad = 1;
      informeMetas = 1;
    }
    else if ($("#perfilInformeDisponibilidad").prop("checked") == true && $("#perfilInformeMetas").prop("checked") == false){
      informeDisponibilidad = 1;
      informeMetas = 0;
    }
    else if ($("#perfilInformeDisponibilidad").prop("checked") == false && $("#perfilInformeMetas").prop("checked") == true){
      informeDisponibilidad = 0;
      informeMetas = 1;
    }
    else{
      informeDisponibilidad = 0;
      informeMetas = 0;
    }
    parametros = {
      "nombrePerfil": nombrePerfil,
      "descripcionPerfil": $("#descripcionIngresoPerfil").val(),
      "informeDisponibilidad": informeDisponibilidad,
      "informeMetas": informeMetas
    }
    await $.ajax({
        url:   'controller/datosChequeaPerfil.php',
        type:  'post',
        data:  parametros,
        success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
            if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El nombre del perfil ya existe");
              setTimeout(function(){
                $('#modalIngresoPerfil').modal('show');
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
          }
          else{
            $.ajax({
              url: "controller/ingresaPerfil.php",
              type: 'POST',
              data: parametros,
              success:  function (response) {
                var p = response.split(",");
                if(response.localeCompare("Sin datos")!= 0 && response != ""){
                  if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var table = $('#tablaListadoPerfiles').DataTable();
                    table.ajax.reload();
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Perfil ingresado correctamente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                  }
                  else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el perfil, si el problema persiste favor comuniquese con soporte");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                  }
                }
                else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el perfil, si el problema persiste favor comuniquese con soporte");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                }
              }
            });
          }
        }
    });
  }
});

$("#nombreIngresoPerfil").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarPerfil").unbind('click').click(function(){
  var table = $('#tablaListadoPerfiles').DataTable();
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  var asignacion = $.map(table.rows('.selected').data(), function (item) {
      return item.ASIGNACION;
  });
  var descripcion = $.map(table.rows('.selected').data(), function (item) {
      return item.DESCRIPCION;
  });
  var informeDisponibilidad = $.map(table.rows('.selected').data(), function (item) {
      return item.INFOR_DISP;
  });
  var informeMetas = $.map(table.rows('.selected').data(), function (item) {
      return item.INFOR_META;
  });

  if(informeDisponibilidad == 1 &&  informeMetas == 1){
    $("#perfilEditInformeDisponibilidad").prop("checked", true);
    $("#perfilEditInformeMetas").prop("checked", true);
  }
  else if(informeDisponibilidad == 1 &&  informeMetas == 0){
    $("#perfilEditInformeDisponibilidad").prop("checked", true);
    $("#perfilEditInformeMetas").prop("checked", false);
  }
  else if(informeDisponibilidad == 0 &&  informeMetas == 1){
    $("#perfilEditInformeDisponibilidad").prop("checked", false);
    $("#perfilEditInformeMetas").prop("checked", true);
  }
  else{
    $("#perfilEditInformeDisponibilidad").prop("checked", false);
    $("#perfilEditInformeMetas").prop("checked", false);
  }

  $("#nombreEditarPerfil").val(nombre);
  $("#asignacionEditarPerfil").val(asignacion);
  $("#descripcionEditarPerfil").val(descripcion);
  var h = $(window).height() - 200;
  $("#bodyEditarPerfil").css("height",h);
  $('#modalEditarPerfil').modal('show');
});

$("#nombreEditarPerfil").on('keyup', function(){
    if($(this).val() != ''){
        $("#validacionEditarPerfil").addClass("d-none");
    }
});

$("#guardarEditarPerfil").unbind('click').click(async function(){
  var informeDisponibilidad = 0;
  var informeMetas = 1;
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  if($("#nombreEditarPerfil").val() == ''){
      $("#validacionEditarPerfil").removeClass("d-none");
      return;
  }
  else{
    $("#modalEditarPerfil").modal("hide");
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    if($("#perfilEditInformeDisponibilidad").prop("checked") == true && $("#perfilEditInformeMetas").prop("checked") == true){
      informeDisponibilidad = 1;
      informeMetas = 1;
    }
    else if ($("#perfilEditInformeDisponibilidad").prop("checked") == true && $("#perfilEditInformeMetas").prop("checked") == false){
      informeDisponibilidad = 1;
      informeMetas = 0;
    }
    else if ($("#perfilEditInformeDisponibilidad").prop("checked") == false && $("#perfilEditInformeMetas").prop("checked") == true){
      informeDisponibilidad = 0;
      informeMetas = 1;
    }
    else{
      informeDisponibilidad = 0;
      informeMetas = 0;
    }
    parametros = {
      "nombre":  $("#nombreEditarPerfil").val(),
      "idPerfil": idPerfil[0],
      "descripcion": $("#descripcionEditarPerfil").val(),
      "informeDisponibilidad": informeDisponibilidad,
      "informeMetas": informeMetas
    }

    await $.ajax({
      url: "controller/editarPerfil.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        var p = response.split(",");
        if(response.localeCompare("Sin datos")!= 0 && response != ""){
          if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
            var table = $('#tablaListadoPerfiles').DataTable();
            table.ajax.reload();
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Perfil editado correctamente");
            $("#editarPerfil").attr("disabled","disabled");
            $("#asignarAreasPerfil").attr("disabled","disabled");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar el perfil, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar el perfil, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
    });
  }
});

$("#asignarAreasPerfil").unbind('click').click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#asignarPermisosPerfil").attr("disabled","disabled");
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  var nombrePerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  $("#nombrePerfilAreas").val(nombrePerfil);
  var h = $(window).height() - 200;
  $("#bodyAreasPerfil").css("height",h);
  parametros = {
    "idPerfil": idPerfil[0]
  }
  //console.log(parametros);
  setTimeout(async function(){
    var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/40);
    // console.log(largo);
    await $('#tablaListadoAreasPerfiles').DataTable( {
        ajax: {
            url: "controller/datosListaAreasPerfiles.php",
            type: 'POST',
            data: parametros,
        },
        columns: [
            { data: 'S'},
            { data: 'IDAREAWEB' },
            { data: 'TEXTOPADRE' },
            { data: 'TEXTO' },
            { data: 'TIPO_PERMISO' },
            { data: 'BASICO' },
            { data: 'FILTRO' }
        ],
        //responsive: true,
        buttons: [
          {
            extend: 'excel',
            title: null,
            text: '<span class="far fa-file-excel"></span>&nbsp;&nbsp;Excel'
          }
        ],
        "columnDefs": [
          {
            "orderable": false,
            "className": 'select-checkbox',
            "targets": [ 0 ]
          },
          {
            "width": "5px",
            "targets": 0
          },
          {
            "visible": false,
            "searchable": false,
            "targets": [ 1 ]
          },
          {
            "visible": false,
            "searchable": false,
            "targets": [ 5 ]
          },
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
            $("#modalAreasPerfil").modal('show');
            $('#modalAlertasSplash').modal('hide');
            setTimeout(function(){
              $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
            },500);
          },200);
        }
    });
    if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      var h = $(window).height() - 300;
      $("#bodyAreasPerfil").css("height",h);
    }
    await esconderMenu();
  },100);
});

$("#asignarAreaPerfil").unbind('click').click(async function(){
  $("#modalAreasPerfil").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#selectArea").removeAttr("disabled");
  $("#dispoArea").removeAttr("disabled");
  $("#selectArea").val('');
  $("#dispoArea").val('');
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  var nombrePerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  $("#nombreAgregarAreaPerfil").val(nombrePerfil);
  parametros = {
    "idPerfil": idPerfil[0]
  }

  var table = $("#tablaListadoAreasPerfiles").DataTable();
  var datos = table.rows().data();

  await $.ajax({
    url:   'controller/datosAreas.php',
    type:  'post',
    data: parametros,
    success:  function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData.length !== 0){
        var cuerpoEpp = "";
        for(var i = 0; i < p.aaData.length; i++){
          cuerpoEpp += "<option value=" + p.aaData[i].IDAREAWEB + ">&nbsp;&nbsp;" + p.aaData[i].AREA + "</option>";
        }
        $("#areaPerfil").html(cuerpoEpp);

        if(datos.length > 0){
          for(j = 0; j < datos.length; j++){
              // console.log(datos[j].IDAREAWEB);
              $("#areaPerfil option[value=" + datos[j].IDAREAWEB + "]").prop("selected", true);
          };
        }
        setTimeout(function(){
          $("#modalAgregarAreaPerfil").modal('show');
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });

  $("#areaPerfil").multiSelect({
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
});

$("#guardarAgregarAreaPerfil").unbind('click').click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalAgregarAreaPerfil").modal('hide');
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });

  var parametros = [];
  parametros.push(idPerfil[0]);
  parametros.push($("#areaPerfil").val());
  $.ajax({
    url:   'controller/ingresaMultiseleccionAreas.php',
    type:  'post',
    data:  {'parametros': JSON.stringify(parametros)},
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoAreasPerfiles').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Actualizado correctamente");
          if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            var h = $(window).height() - 300;
            $("#bodyAreasPerfil").css("height",h);
          }
          setTimeout(function(){
            $("#modalAgregarAreaPerfil").modal('hide');
            $("#modalAreasPerfil").modal('show');
            $('#modalAlertasSplash').modal('hide');
            setTimeout(function(){
              $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
            },200);
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al agregar areas, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $("#modalAgregarAreaPerfil").modal('show');
            $('#modalAlertasSplash').modal('hide');
            setTimeout(function(){
              $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
            },200);
          },500);
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al agregar areas, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $("#modalAgregarAreaPerfil").modal('show');
          $('#modalAlertasSplash').modal('hide');
          setTimeout(function(){
            $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
          },200);
        },500);
      }
    }
  });
  $("#areaPerfil").multiSelect('deselect_all');
  $("#dispoArea").val('');
  $("#selectarea").val('');
});

$("#cancelarAgregarAreaPerfil").unbind("click").click(function(){
  $("#areaPerfil").multiSelect('deselect_all');
  $("#dispoArea").val('');
  $("#selectarea").val('');
  if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var h = $(window).height() - 300;
    $("#bodyAreasPerfil").css("height",h);
  }
  $("#modalAreasPerfil").modal('show');
  setTimeout(function(){
    $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
  },200);
});

$("#asignarPermisosPerfil").unbind('click').click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalAreasPerfil").modal('hide');
  $("#divAccionesPerfil").html('');
  $("#divAccionesPerfil").hide();
  $("#checkJefaturaPermisos").prop("checked",false);
  $("#checkJefaturaPermisos").removeAttr("disabled");
  $("#checkTodosPermisos").prop("checked",false);
  $("#checkTodosPermisos").removeAttr("disabled");
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  var nombrePerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  var table = $('#tablaListadoAreasPerfiles').DataTable();
  var nombreArea = $.map(table.rows('.selected').data(), function (item) {
      return item.TEXTO;
  });
  var tipoPermiso = $.map(table.rows('.selected').data(), function (item) {
      return item.TIPO_PERMISO;
  });
  var idAreaWeb = $.map(table.rows('.selected').data(), function (item) {
      return item.IDAREAWEB;
  });
  var basico = $.map(table.rows('.selected').data(), function (item) {
      return item.BASICO;
  });
  var filtro = $.map(table.rows('.selected').data(), function (item) {
      return item.FILTRO;
  });

  $("#divProyecto").html('');
  $("#divAreaFuncional").html('');

  $("#divProyecto").append('<label style="font-weight: bold; color: gray; font-size: 14pt;">Proyectos</label><select multiple="multiple" id="proyectoPerfil" name="proyectoPerfil" class="form-control custom"></select>');
  $("#divAreaFuncional").append('<label style="font-weight: bold; color: gray; font-size: 14pt;">Areas Geográficas</label><select multiple="multiple" id="areaFuncionalPerfil" name="areaFuncionalPerfil" class="form-control custom"></select>');

  if(basico[0] === "jefatura"){
    $("#tituloPermisosPerfil").html("<br>Este módulo solo puede tener permiso \"JEFATURA\"");
    $("#tituloPermisosPerfil").css("color","red");
    $("#nombrePerfilPermiso").val(nombrePerfil);
    $("#nombreAreaPermiso").val(nombreArea);
    $("#filtroInformePermisos").val(filtro);
    $("#checkTodosPermisos").attr("disabled","disabled");
    $("#checkJefaturaPermisos").attr("disabled","disabled");

    $("#checkTodosPermisos").prop("checked",false);
    $("#checkJefaturaPermisos").prop("checked",true);
    var parametros = {
      "idPerfil": idPerfil[0],
      "idAreaWeb": idAreaWeb[0]
    }
    $("#proyectoPerfil").attr("disabled","disabled");
    $("#areaFuncionalPerfil").attr("disabled","disabled");
    await $.ajax({
      url:   'controller/datosProyecto.php',
      type:  'post',
      data: parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          var cuerpoEpp = "";
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].IDESTRUCTURA_OPERACION !== null){
              cuerpoEpp += "<option selected value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
            }
            else{
              cuerpoEpp += "<option value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
            }
          }
          $("#proyectoPerfil").html(cuerpoEpp);
          $("#proyectoPerfil").multiSelect({
            selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
            selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
            selectableHeader: "<input id='dispoProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input id='selectProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
      url:   'controller/datosAreaFuncionalPermisos.php',
      type:  'post',
      data: parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          var cuerpoEpp = "";
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].IDPERMISOS_AE !== null){
              cuerpoEpp += "<option selected value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
            }
            else{
              cuerpoEpp += "<option value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
            }
          }
          $("#areaFuncionalPerfil").html(cuerpoEpp);
          $("#areaFuncionalPerfil").multiSelect({
            selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
            selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
            selectableHeader: "<input id='dispoAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input id='selectAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
      url:   'controller/datosAccionesAreaWebPerfil.php',
      type:  'post',
      data:   parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          $("#divAccionesPerfil").append('<hr class="hr-separador"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><label style="font-weight: bold; color: gray; font-size: 14pt;">Tareas</label></div>');
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].VISIBLE == 1){
              $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" checked="checked" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
            }
            else{
              $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
            }
          }
          $("#divAccionesPerfil").show();
        }
        else{
          $("#divAccionesPerfil").html('');
          $("#divAccionesPerfil").hide();
        }
      }
    });
    var h = $(window).height() - 200;
    $("#bodyPermisosPerfil").css("height",h);
    $("#modalAreasPerfil").modal('hide');
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
      $("#modalPermisosPerfil").modal('show');
    },1500);
  }
  else if(basico[0] === "todos"){
    $("#tituloPermisosPerfil").html("<br>Este módulo solo puede tener permiso \"TODOS\"");
    $("#tituloPermisosPerfil").css("color","red");
    $("#nombrePerfilPermiso").val(nombrePerfil);
    $("#nombreAreaPermiso").val(nombreArea);
    $("#filtroInformePermisos").val(filtro);
    $("#checkTodosPermisos").attr("disabled","disabled");
    $("#checkJefaturaPermisos").attr("disabled","disabled");

    $("#checkTodosPermisos").prop("checked",true);
    $("#checkJefaturaPermisos").prop("checked",false);
    var parametros = {
      "idPerfil": idPerfil[0],
      "idAreaWeb": idAreaWeb[0]
    }
    $("#proyectoPerfil").attr("disabled","disabled");
    $("#areaFuncionalPerfil").attr("disabled","disabled");
    await $.ajax({
      url:   'controller/datosAreaFuncionalPermisos.php',
      type:  'post',
      data: parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          var cuerpoEpp = "";
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].IDPERMISOS_AE !== null){
              cuerpoEpp += "<option selected value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
            }
            else{
              cuerpoEpp += "<option value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
            }
          }
          $("#areaFuncionalPerfil").html(cuerpoEpp);
          $("#areaFuncionalPerfil").multiSelect({
            selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
            selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
            selectableHeader: "<input id='dispoAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input id='selectAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
      url:   'controller/datosAccionesAreaWebPerfil.php',
      type:  'post',
      data:   parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          $("#divAccionesPerfil").append('<hr class="hr-separador"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><label style="font-weight: bold; color: gray; font-size: 14pt;">Tareas</label></div>');
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].VISIBLE == 1){
              $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" checked="checked" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
            }
            else{
              $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
            }
          }
          $("#divAccionesPerfil").show();
        }
        else{
          $("#divAccionesPerfil").html('');
          $("#divAccionesPerfil").hide();
        }
      }
    });
    await $.ajax({
      url:   'controller/datosProyecto.php',
      type:  'post',
      data: parametros,
      success:  function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData.length !== 0){
          var cuerpoEpp = "";
          for(var i = 0; i < p.aaData.length; i++){
            if(p.aaData[i].IDESTRUCTURA_OPERACION !== null){
              cuerpoEpp += "<option selected value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
            }
            else{
              cuerpoEpp += "<option value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
            }
          }
          $("#proyectoPerfil").html(cuerpoEpp);
          $("#proyectoPerfil").multiSelect({
            selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
            selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
            selectableHeader: "<input id='dispoProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input id='selectProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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

    var h = $(window).height() - 200;
    $("#bodyPermisosPerfil").css("height",h);
    $("#modalAreasPerfil").modal('hide');
    setTimeout(function(){
      $('#modalAlertasSplash').modal('hide');
      $("#modalPermisosPerfil").modal('show');
    },1500);
  }
  else{
    $("#tituloPermisosPerfil").html('');
    $("#checkTodosPermisos").removeAttr("disabled");
    $("#checkJefaturaPermisos").removeAttr("disabled");
    $("#nombrePerfilPermiso").val(nombrePerfil);
    $("#nombreAreaPermiso").val(nombreArea);
    $("#filtroInformePermisos").val(filtro);
    setTimeout(async function(){
      if (tipoPermiso[0] === 'JEFATURA'){
        $("#checkJefaturaPermisos").prop("checked",true);
        $("#checkTodosPermisos").prop("checked",false);
        var parametros = {
          "idPerfil": idPerfil[0],
          "idAreaWeb": idAreaWeb[0]
        }
        $("#proyectoPerfil").attr("disabled","disabled");
        $("#areaFuncionalPerfil").attr("disabled","disabled");
        await $.ajax({
          url:   'controller/datosProyecto.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDESTRUCTURA_OPERACION !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
              }
              $("#proyectoPerfil").html(cuerpoEpp);
              $("#proyectoPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAreaFuncionalPermisos.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDPERMISOS_AE !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
              }
              $("#areaFuncionalPerfil").html(cuerpoEpp);
              $("#areaFuncionalPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAccionesAreaWebPerfil.php',
          type:  'post',
          data:   parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              $("#divAccionesPerfil").append('<hr class="hr-separador"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><label style="font-weight: bold; color: gray; font-size: 14pt;">Tareas</label></div>');
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].VISIBLE == 1){
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" checked="checked" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
                else{
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
              }
              $("#divAccionesPerfil").show();
            }
            else{
              $("#divAccionesPerfil").html('');
              $("#divAccionesPerfil").hide();
            }
          }
        });

        var h = $(window).height() - 200;
        $("#bodyPermisosPerfil").css("height",h);
        $("#modalAreasPerfil").modal('hide');
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          $("#modalPermisosPerfil").modal('show');
        },1500);
      }
      else if (tipoPermiso[0] === 'TODOS'){
        $("#checkTodosPermisos").prop("checked",true);
        $("#checkJefaturaPermisos").prop("checked",false);
        var parametros = {
          "idPerfil": idPerfil[0],
          "idAreaWeb": idAreaWeb[0]
        }
        $("#proyectoPerfil").attr("disabled","disabled");
        $("#areaFuncionalPerfil").attr("disabled","disabled");
        await $.ajax({
          url:   'controller/datosProyecto.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDESTRUCTURA_OPERACION !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
              }
              $("#proyectoPerfil").html(cuerpoEpp);
              $("#proyectoPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAreaFuncionalPermisos.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDPERMISOS_AE !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
              }
              $("#areaFuncionalPerfil").html(cuerpoEpp);
              $("#areaFuncionalPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAccionesAreaWebPerfil.php',
          type:  'post',
          data:   parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              $("#divAccionesPerfil").append('<hr class="hr-separador"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><label style="font-weight: bold; color: gray; font-size: 14pt;">Tareas</label></div>');
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].VISIBLE == 1){
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" checked="checked" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
                else{
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
              }
              $("#divAccionesPerfil").show();
            }
            else{
              $("#divAccionesPerfil").html('');
              $("#divAccionesPerfil").hide();
            }
          }
        });

        var h = $(window).height() - 200;
        $("#bodyPermisosPerfil").css("height",h);
        $("#modalAreasPerfil").modal('hide');
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          $("#modalPermisosPerfil").modal('show');
        },1500);
      }
      else{
        $("#checkTodosPermisos").prop("checked",false);
        $("#checkJefaturaPermisos").prop("checked",false);
        var parametros = {
          "idPerfil": idPerfil[0],
          "idAreaWeb": idAreaWeb[0]
        }

        await $.ajax({
          url:   'controller/datosProyecto.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDESTRUCTURA_OPERACION !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].ID_ESTRUCTURA + ">&nbsp;&nbsp;" + p.aaData[i].PROYECTO + "</option>";
                }
              }
              $("#proyectoPerfil").html(cuerpoEpp);
              $("#proyectoPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectProyecto' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAreaFuncionalPermisos.php',
          type:  'post',
          data: parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              var cuerpoEpp = "";
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].IDPERMISOS_AE !== null){
                  cuerpoEpp += "<option selected value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
                else{
                  cuerpoEpp += "<option value=" + p.aaData[i].IDAREAFUNCIONAL + ">&nbsp;&nbsp;" + p.aaData[i].COMUNA + "</option>";
                }
              }
              $("#areaFuncionalPerfil").html(cuerpoEpp);
              $("#areaFuncionalPerfil").multiSelect({
                selectableFooter: "<div class='custom-header'>&nbsp;Disponibles</div>",
                selectionFooter: "<div class='custom-header'>&nbsp;Seleccionadas</div>",
                selectableHeader: "<input id='dispoAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
                selectionHeader: "<input id='selectAreaFun' type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
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
          url:   'controller/datosAccionesAreaWebPerfil.php',
          type:  'post',
          data:   parametros,
          success:  function (response) {
            var p = jQuery.parseJSON(response);
            if(p.aaData.length !== 0){
              $("#divAccionesPerfil").append('<hr class="hr-separador"><div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;"><label style="font-weight: bold; color: gray; font-size: 14pt;">Tareas</label></div>');
              for(var i = 0; i < p.aaData.length; i++){
                if(p.aaData[i].VISIBLE == 1){
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" checked="checked" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
                else{
                  $("#divAccionesPerfil").append('<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 input-group-sm"><label style="font-weight: bold;">' + p.aaData[i].TEXTO + '</label><br><label class="switch"><input id="id_' + p.aaData[i].IDBOTON + '" type="checkbox" title="' + p.aaData[i].TEXTO + '"><span class="slider round"></span></label></div>');
                }
              }
              $("#divAccionesPerfil").show();
            }
            else{
              $("#divAccionesPerfil").html('');
              $("#divAccionesPerfil").hide();
            }
          }
        });

        var h = $(window).height() - 200;
        $("#bodyPermisosPerfil").css("height",h);
        $("#modalAreasPerfil").modal('hide');
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          $("#modalPermisosPerfil").modal('show');
        },1500);
      }
    },100);
  }
});

$("#checkJefaturaPermisos").unbind('click').change(function(){
  if($("#checkJefaturaPermisos").prop("checked") == true){
    $("#proyectoPerfil").attr("disabled","disabled");
    $("#proyectoPerfil").multiSelect('refresh');
    //$("#checkTodosPermisos").multiSelect('refresh');
    setTimeout(function(){
      $(".search-input.form-control").attr("disabled","disabled");
    },100);
    $("#areaFuncionalPerfil").attr("disabled","disabled");
    $("#areaFuncionalPerfil").multiSelect('refresh');
    // $("#checkTodosPermisos").attr("disabled","disabled");
    $("#checkTodosPermisos").prop("checked",false);
  }
  else{
    $("#proyectoPerfil").removeAttr("disabled");
    $("#proyectoPerfil").multiSelect('refresh');
    $(".search-input.form-control").removeAttr("disabled");
    $("#areaFuncionalPerfil").removeAttr("disabled");
    $("#areaFuncionalPerfil").multiSelect('refresh');
    $("#checkTodosPermisos").removeAttr("disabled");
  }
});

$("#checkTodosPermisos").unbind('click').change(function(){
  if($("#checkTodosPermisos").prop("checked") == true){
    $("#proyectoPerfil").attr("disabled","disabled");
    $("#proyectoPerfil").multiSelect('refresh');
    //$("#checkTodosPermisos").multiSelect('refresh');
    setTimeout(function(){
      $(".search-input.form-control").attr("disabled","disabled");
    },100);
    $("#areaFuncionalPerfil").attr("disabled","disabled");
    $("#areaFuncionalPerfil").multiSelect('refresh');
    // $("#checkJefaturaPermisos").attr("disabled","disabled");
    $("#checkJefaturaPermisos").prop("checked",false);
  }
  else{
    $("#proyectoPerfil").removeAttr("disabled");
    $("#proyectoPerfil").multiSelect('refresh');
    $(".search-input.form-control").removeAttr("disabled");
    $("#areaFuncionalPerfil").removeAttr("disabled");
    $("#areaFuncionalPerfil").multiSelect('refresh');
    $("#checkJefaturaPermisos").removeAttr("disabled");
  }
});

$("#guardarPermisoPerfil").unbind('click').click(async function(){
  var table = $('#tablaListadoPerfiles').DataTable();
  var idPerfil = $.map(table.rows('.selected').data(), function (item) {
      return item.IDPERFIL;
  });
  var table = $('#tablaListadoAreasPerfiles').DataTable();
  var idArea = $.map(table.rows('.selected').data(), function (item) {
      return item.IDAREAWEB;
  });
  var filtro = $("#filtroInformePermisos").val();
  var todos = 0;
  var jefatura = 0;

  if($("#checkJefaturaPermisos").prop('checked') == false && $("#checkTodosPermisos").prop('checked') == false && $("#proyectoPerfil").val().length === 0 &&
  $("#areaFuncionalPerfil").val().length === 0)
  {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No puede guardar sin seleccionar ningún permiso");
  }
  else{
    $("#modalPermisosPerfil").modal("hide");
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    if($("#checkJefaturaPermisos").prop('checked')){
      var parametros = {
        "idPerfil": idPerfil[0],
        "idArea": idArea[0],
        "jefatura": 1,
        "todos": 0,
        "filtro": filtro
      }

      $("input[id^='id_']").each(function(){
    	    if($(this).prop("checked") === true){
            parametros["accion_" + $(this).attr("id").split("_")[1]] = '1';
          }
          else{
            parametros["accion_" + $(this).attr("id").split("_")[1]] = '0';
          }
    	});

      console.log(parametros);
      $.ajax({
        url:   'controller/ingresaPermisosAreas.php',
        type:  'post',
        data:  parametros,
        success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
            if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
              var table = $('#tablaListadoAreasPerfiles').DataTable();
              table.ajax.reload();
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var h = $(window).height() - 300;
                $("#bodyAreasPerfil").css("height",h);
              }

              $.ajax({
                url:   'controller/ingresarPermisoAccionesPerfil.php',
                type:  'post',
                data:  parametros,
                success:  function (response) {
                  setTimeout(function(){
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Asignado correctamente");
                    $("#modalAreasPerfil").modal('show');
                    $('#modalPermisosPerfil').modal('hide');
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
                    },500);
                  },1500);
                }
              });
            }
            else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al asignar permisos, si el problema persiste favor comuniquese con soporte");
              setTimeout(function(){
                $("#modalAreasPerfil").modal('show');
                $('#modalPermisosPerfil').modal('hide');
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al asignar permisos, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $("#modalAreasPerfil").modal('show');
              $('#modalPermisosPerfil').modal('hide');
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
        }
      });
    }
    else if($("#checkTodosPermisos").prop('checked')){
      var parametros = {
        "idPerfil": idPerfil[0],
        "idArea": idArea[0],
        "jefatura": 0,
        "todos": 1,
        "filtro": filtro
      }

      $("input[id^='id_']").each(function(){
    	    if($(this).prop("checked") === true){
            parametros["accion_" + $(this).attr("id").split("_")[1]] = '1';
          }
          else{
            parametros["accion_" + $(this).attr("id").split("_")[1]] = '0';
          }
    	});

      // console.log(parametros);
      $.ajax({
        url:   'controller/ingresaPermisosAreas.php',
        type:  'post',
        data:  parametros,
        success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
            if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
              var table = $('#tablaListadoAreasPerfiles').DataTable();
              table.ajax.reload();
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var h = $(window).height() - 300;
                $("#bodyAreasPerfil").css("height",h);
              }

              $.ajax({
                url:   'controller/ingresarPermisoAccionesPerfil.php',
                type:  'post',
                data:  parametros,
                success:  function (response) {
                  setTimeout(function(){
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Asignado correctamente");
                    $("#modalAreasPerfil").modal('show');
                    $('#modalPermisosPerfil').modal('hide');
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
                    },500);
                  },1500);
                }
              });
            }
            else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al asignar permisos, si el problema persiste favor comuniquese con soporte");
              setTimeout(function(){
                $("#modalAreasPerfil").modal('show');
                $('#modalPermisosPerfil').modal('hide');
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al asignar permisos, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $("#modalAreasPerfil").modal('show');
              $('#modalPermisosPerfil').modal('hide');
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
        }
      });
    }
    else{
      var parametros = [];
      parametros.push(idPerfil[0]);
      parametros.push($("#areaFuncionalPerfil").val());
      parametros.push($("#proyectoPerfil").val());
      parametros.push(idArea[0]);
      $.ajax({
        url:   'controller/ingresaMultiseleccionPermisos.php',
        type:  'post',
        data:  {'parametros': JSON.stringify(parametros)},
        success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
            if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
              var table = $('#tablaListadoAreasPerfiles').DataTable();
              table.ajax.reload();
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var h = $(window).height() - 300;
                $("#bodyAreasPerfil").css("height",h);
              }

              var parametros2 = {
                "idPerfil": idPerfil[0],
                "idArea": idArea[0]
              }

              $("input[id^='id_']").each(function(){
            	    if($(this).prop("checked") === true){
                    parametros2["accion_" + $(this).attr("id").split("_")[1]] = '1';
                  }
                  else{
                    parametros2["accion_" + $(this).attr("id").split("_")[1]] = '0';
                  }
            	});

              $.ajax({
                url:   'controller/ingresarPermisoAccionesPerfil.php',
                type:  'post',
                data:  parametros2,
                success:  function (response) {
                  setTimeout(function(){
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Permisos asignados correctamente");
                    $("#modalAreasPerfil").modal('show');
                    $('#modalPermisosPerfil').modal('hide');
                    $('#modalAlertasSplash').modal('hide');
                    setTimeout(function(){
                      $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
                    },500);
                  },1500);
                }
              });
            }
            else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar permisos, si el problema persiste favor comuniquese con soporte");
              setTimeout(function(){
                $("#modalAreasPerfil").modal('show');
                $('#modalPermisosPerfil').modal('hide');
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el permisos, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $("#modalAreasPerfil").modal('show');
              $('#modalPermisosPerfil').modal('hide');
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
        }
      });
    }
  }
});

$("#cancelarPermisoPerfil").unbind('click').click(function(){
  $("#proyectoPerfil").multiSelect('deselect_all');
  $("#areaFuncionalPerfil").multiSelect('deselect_all');
  $("#checkJefaturaPermisos").prop("checked",false);
  $("#checkJefaturaPermisos").removeAttr("disabled");
  $("#checkTodosPermisos").prop("checked",false);
  $("#checkTodosPermisos").removeAttr("disabled");
  if( /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var h = $(window).height() - 300;
    $("#bodyAreasPerfil").css("height",h);
  }
  $("#modalAreasPerfil").modal('show');
  setTimeout(function(){
    $('#tablaListadoAreasPerfiles').DataTable().columns.adjust();
  },200);
});

$("#agregarUsuario").unbind("click").click(async function(){
  $("#modalIngresoUsuario").find("input,textarea,select").val("");
  $("#rutIngresoUsuario").removeClass("is-invalid");
  $("#apellidosIngresoUsuario").removeClass("is-invalid");
  $("#nombresIngresoUsuario").removeClass("is-invalid");
  $("#emailUsuario").removeClass("is-invalid");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  await $.ajax({
    url:   'controller/datosPersonalUsuario.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData.length !== 0){
        var listaPersonalUsuario = [];
        for(var i = 0; i < p.aaData.length; i++) {
          listaPersonalUsuario.push(p.aaData[i].DNI);
        }
        $('#rutIngresoUsuario').autocomplete({
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
              matches = $.grep(listaPersonalUsuario, function (item) {
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
    url:   'controller/datosPerfilTipos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoEC += '<option value="' + p2.aaData[i].IDPERFIL + '">' + p2.aaData[i].NOMBRE + '</option>';
        }
        $("#perfilUsuario").html(cuerpoEC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#perfilUsuario").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  setTimeout(function(){
    $("#modalIngresoUsuario").modal("show");
    $('#modalAlertasSplash').modal('hide');
    setTimeout(function(){
      $('#bodyIngresoUsuario').animate({ scrollTop: 0 }, 'fast');
    },200);
  },500);
});

$("input#rutIngresoUsuario").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutIngresoUsuario").val() !== ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
    $("#rutIngresoUsuario").val("");
    $("#rutIngresoUsuario").addClass("is-invalid");
  }
});

$("#guardarIngresoUsuario").unbind('click').click(function(){
  if($("#rutIngresoUsuario").val().length == 0 || $("#apellidosIngresoUsuario").val().length == 0 || $("#nombresIngresoUsuario").val().length == 0 || $("#emailUsuario").val().length == 0){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos");
    if ($("#rutIngresoUsuario").val().length == 0){
      $("#rutIngresoUsuario").addClass("is-invalid");
    }
    else if ($("#apellidosIngresoUsuario").val().length == 0){
      $("#apellidosIngresoUsuario").addClass("is-invalid");
    }
    else if ($("#nombresIngresoUsuario").val().length == 0){
      $("#nombresIngresoUsuario").addClass("is-invalid");
    }
    else if ($("#emailUsuario").val().length == 0){
      $("#emailUsuario").addClass("is-invalid");
    }
  }
  else {
    $("#modalIngresoUsuario").modal("hide");
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    parametros = {
      "rutIngreso":   $.trim($("#rutIngresoUsuario").val().replace('.','').replace('.','')),
      "apellidos":  $("#apellidosIngresoUsuario").val(),
      "nombres": $("#nombresIngresoUsuario").val(),
      "email": $("#emailUsuario").val(),
      "perfilUsuario": $("#perfilUsuario").val(),
      "passUsuario": randomTexto()
    }
    //console.log(parametros);
    $.ajax({
        url:   'controller/datosChequeaUsuario.php',
        type:  'post',
        data:  parametros,
        success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
            if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El DNI del usuario ya existe");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
                $("#modalIngresoUsuario").modal("show");
              },500);
            }
          }
          else{
            $.ajax({
              url:   'controller/datosChequeaEmail.php',
              type:  'post',
              data:  parametros,
              success:  function (response) {
                var p = response.split(",");
                if(response.localeCompare("Sin datos")!= 0 && response != ""){
                  if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Ya existe un usuario creado con ese email");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                      $("#modalIngresoUsuario").modal("show");
                    },500);
                  }
                }
                else {
                  $.ajax({
                    url: "controller/ingresaUsuario.php",
                    type: 'POST',
                    data: parametros,
                    success:  function (response) {
                      var p = response.split(",");
                      if(response.localeCompare("Sin datos")!= 0 && response != ""){
                        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                          var table = $('#tablaListadoUsuarios').DataTable();
                          //table.rows('.selected').remove().draw();
                          table.ajax.reload();
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Usuario creado correctamente");
                          $("#editarUsuario").attr("disabled","disabled");
                          $("#usuarioResetPass").attr("disabled","disabled");
                          setTimeout(function(){
                            $("#modalAlertasSplash").modal("hide");
                          },500);
                        }
                        else{
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear usuario, si el problema persiste favor comuniquese con soporte");
                        }
                      }
                      else{
                        var random = Math.round(Math.random() * (1000000 - 1) + 1);
                        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear usuario, si el problema persiste favor comuniquese con soporte");
                      }
                    }
                  });
                }
              }
            });
          }
        }
      });
  }
});

$("#rutIngresoUsuario").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#apellidosIngresoUsuario").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#nombresIngresoUsuario").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#emailUsuario").unbind('click').click(function(){
  $(this).removeClass("is-invalid");
});

$("#desactivarUsuario").unbind('click').click(function(){
  var table = $('#tablaListadoUsuarios').DataTable();
  var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  $("#textoDesactivarUsuario").html(rutUsuario[0] + ' , ' +nombre[0]);
  $('#modalDesactivarUsuario').modal('show');
});

$("#guardarDesactivarUsuario").unbind('click').click(async function(){
  $("#modalDesactivarUsuario").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoUsuarios').DataTable();
  var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });

  parametros = {
    "rutUsuario": rutUsuario[0]
  }
  //console.log(parametros);
  await $.ajax({
    url:   'controller/desactivarUsuario.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoUsuarios').DataTable();
          //table.rows('.selected').remove().draw();
          table.ajax.reload()
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Usuario desactivado correctamente");
          $("#editarUsuario").attr("disabled","disabled");
          $("#usuarioResetPass").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al desactivar al usuario, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al desactivar al usuario, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
  $('#modalDesactivarUsuario').modal('hide');
});

$("#editarUsuario").unbind('click').click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoUsuarios').DataTable();
  var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  var email = $.map(table.rows('.selected').data(), function (item) {
      return item.EMAIL;
  });
  var perfil = $.map(table.rows('.selected').data(), function (item) {
      return item.PERFIL;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
      return item.ESTADO;
  });
  await $.ajax({
    url:   'controller/datosPerfilTipos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(perfil[0] === p2.aaData[i].NOMBRE){
            cuerpoEC += '<option selected value="' + p2.aaData[i].IDPERFIL + '">' + p2.aaData[i].NOMBRE + '</option>';
          }
          else{
            cuerpoEC += '<option value="' + p2.aaData[i].IDPERFIL + '">' + p2.aaData[i].NOMBRE + '</option>';
          }
        }
        $("#perfilEditarUsuario").html(cuerpoEC);
        setTimeout(function(){
          $('#modalEditarUsuario').modal('show');
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#perfilEditarUsuario").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#estadoEditarUsuario").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  $("#rutEditarUsuario").val(rutUsuario);
  $("#nombreEditarUsuario").val(nombre);
  $("#emailEditarUsuario").val(email);
  $("#estadoEditarUsuario").val(estado);
});
// Funcion para verificar RUT
$("input#rutEditarUsuario").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutIngresoUsuario").val() !== ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
  }
});

$("#guardarEditarUsuario").unbind('click').click(async function(){
  $("#modalEditarUsuario").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  parametros = {
    "rutEditar":   $("#rutEditarUsuario").val(),
    "nombre":  $("#nombreEditarUsuario").val(),
    "email": $("#emailEditarUsuario").val(),
    "estado": $("#estadoEditarUsuario").val(),
    "perfilUsuario": $("#perfilEditarUsuario").val()
  }
  //console.log(parametros);
  await $.ajax({
    url: "controller/editarUsuario.php",
    type: 'POST',
    data: parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoUsuarios').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Usuario editado correctamente");
          $("#editarUsuario").attr("disabled","disabled");
          $("#usuarioResetPass").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar al usuario, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar al usuario, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});

$("#usuarioResetPass").unbind('click').click(async function(){
  var table = $('#tablaListadoUsuarios').DataTable();
  var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  $("#tituloDesvincular").html(rutUsuario[0] + ' , ' +nombre[0]);
  $('#modalResetPassUsuario').modal('show');
});

$("#guardarResetPassUsuario").unbind('click').click(async function(){
  $('#modalResetPassUsuario').modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoUsuarios').DataTable();
  var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  var email = $.map(table.rows('.selected').data(), function (item) {
      return item.EMAIL;
  });

  parametros = {
    "rutUsuario": rutUsuario[0],
    "nombreUsuario": nombre[0],
    "mailUsuario": email[0],
    "passUsuario": randomTexto()
  }
  await $.ajax({
    url:   'controller/resetPass.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoUsuarios').DataTable();
          //table.rows('.selected').remove().draw();
          table.ajax.reload()
          $("#editarUsuario").attr("disabled","disabled");
          $("#usuarioResetPass").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Contraseña reseteada correctamente");
          },500);
        }
        else{
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al resetear contraseña, si el problema persiste favor comuniquese con soporte");
          },500);
        }
      }
      else{
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al resetear contraseña, si el problema persiste favor comuniquese con soporte");
        },500);
      }
    }
  });
});

function randomTexto(){
  var str = '';
  var ref = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789';
  for (var i = 0; i < 8 ; i++)
  {
    str += ref.charAt(Math.floor(Math.random()*ref.length));
  }
  return str;
}

$("#buttonRecuperarContraseña").unbind("click").click(function(){
  $("#dniRecuperarContraseña").val('');
  $("#modalRecuperarContraseña").modal("show");
});

$("input#dniRecuperarContraseña").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#dniRecuperarContraseña").val() !== ''){


    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");

    $("#dniRecuperarContraseña").val("");
    $("#dniRecuperarContraseña").addClass("is-invalid");
  }
});

$("#dniRecuperarContraseña").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#solicitarRecuperarContraseña").unbind("click").click(async function(){
  setTimeout(function(){
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  },100);
  parametros = {
    "rutUsuario": $("#dniRecuperarContraseña").val().replace('.','').replace('.',''),
    "passUsuario": randomTexto()
  }
  $("#modalRecuperarContraseña").modal("hide");
  await $.ajax({
    url:   'controller/recuperarPass.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin_usuario") == 0){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El DNI ingresado no posee una cuenta de usuario");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Su contraseña fue enviada a su correo electrónico registrado: " + response);
        }
        else{
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al recuperar su contraseña, si el problema persiste favor comuniquese con soporte");
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al recuperar su contraseña, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});

function initScreen() {
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height());
  var path = window.location.href.split('#/')[1];
  return path;
}

function loading(flag) {
  if (flag) {
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
  } else {
    $('#modalAlertasSplash').modal('hide');
  }
}

function restricted() {
  alertasToast("No tiene acceso al módulo seleccionado, redirigiendo a módulo principal");
  setTimeout(function() {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    window.location.href = "?idLog=" + random + "#/login";
  }, 1500);
}

var lastIdDotacionToUse = 0;
var dotacionData = [];
var dotacionSelects = {};
var dotacionListUpdated = {};
var tableDotacion = $("#tablaListadoDotacion");
var comunesDotacion = {};
var editorDotacion = new $.fn.dataTable.Editor({
  // ajax: "controller/actualizarListadoDotacion.php",
  table: "#tablaListadoDotacion",
  idSrc: 'id',
  fields: [
    { label: 'personalOfertado', name: 'personalOfertado' }, //, type: "select" },
    { label: 'cargoMandante', name: 'cargoMandante' },
    { label: 'cargoGenericoUnificado', name: 'cargoGenericoUnificado' },
    { label: 'familia', name: 'familia' },
    { label: 'jeasGeas', name: 'jeasGeas' },
    { label: 'ref1', name: 'ref1' },
    { label: 'ref2', name: 'ref2' },
    { label: 'ene22', name: 'ene22' },
    { label: 'feb22', name: 'feb22' },
    { label: 'mar22', name: 'mar22' },
    { label: 'abr22', name: 'abr22' },
    { label: 'may22', name: 'may22' },
    { label: 'jun22', name: 'jun22' },
    { label: 'jul22', name: 'jul22' },
    { label: 'ago22', name: 'ago22' },
    { label: 'set22', name: 'set22' },
    { label: 'oct22', name: 'oct22' },
    { label: 'nov22', name: 'nov22' },
    { label: 'dic22', name: 'dic22' },
  ],
  formOptions: { inline: { submit: 'all' } },
});

async function listDotacion(codigoCC) {
  var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
  loading(true);
  await tableDotacion.DataTable({
    ajax: {
      url: "controller/datosListadoDotacion.php",
      type: 'POST',
      data: { codigoCC },
      /*dataSrc: function (json) {
        return json.data;
      },*/
    },
    columns: [
      { data: 'id' },
      { data: 'personalOfertado' }, // editField: 'personalOfertado' },
      { data: 'cargoMandante' },
      { data: 'cargoGenericoUnificado' },
      { data: 'familia' },
      { data: 'jeasGeas' },
      { data: 'ref1' },
      { data: 'ref2' },
      { data: 'ene22' },
      { data: 'feb22' },
      { data: 'mar22' },
      { data: 'abr22' },
      { data: 'may22' },
      { data: 'jun22' },
      { data: 'jul22' },
      { data: 'ago22' },
      { data: 'set22' },
      { data: 'oct22' },
      { data: 'nov22' },
      { data: 'dic22' },
    ],
    buttons: [],
    columnDefs: [
      { width: "5px", targets: 0 },
      /*{ orderable: false, className: 'select-checkbox', targets: [ 0 ] },*/
      { visible: false, searchable: false, targets: [ 2 ] },
      { targets: "_all", className: "dt-center" }
    ],
    select: { style: 'single' },
    scrollX: true,
    paging: true,
    ordering: true,
    scrollCollapse: true,
    // "order": [[ 3, "asc" ]],
    info: true,
    lengthMenu: [[largo], [largo]],
    dom: 'Bfrtip',
    language: {
      zeroRecords: "Seleccionar centro de costo",
      info: "Registro _START_ de _END_ de _TOTAL_",
      infoEmpty: "No hay datos disponibles",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },
      search: "Buscar: ",
      select: {
        rows: "- %d registros seleccionados",
      },
      infoFiltered: "(Filtrado de _MAX_ registros)",
    },
    destroy: true,
    autoWidth: false,
    initComplete: function (settings, json) {
      $('#contenido').show();
      $('#menu-lateral').show();
      $('#footer').parent().show();
      $('#footer').show();
      setTimeout(function() {
        dotacionData = json.aaData;
        tableDotacion.DataTable().columns.adjust();
        loading(false);
      },500);
    }
  });
}

async function listComunesDotacion() {
  $.ajax({
    url: 'controller/datosComunesDotacion.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      comunesDotacion = response.aaData;
    },
  })
}

async function listDotacionLugares() {
  $.ajax({
    url: 'controller/datosLugares.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      lastIdDotacionToUse = Number(response.idLastDotacion);

      var data = response.aaData;
      var html = "<option selected value='select' disabled>Seleccione</option>";
      data.forEach((item) => {
        html += `<option value="${item.codigo}">${item.codigo} - ${item.nombre}</option>`;
      });
      $('#selectListaLugares').html(html);
    },
  })
}

function getCodigoYNombreCC() {
  var id = $('#selectListaLugares').val();
  var opt = $('#selectListaLugares option:selected').text();
  var aux = opt.split(" - ");
  return [id, aux[aux.length - 1]];
}

$('#selectListaLugares').on('change', function (e) {
  e.stopImmediatePropagation();
  var codigoCC = $('#selectListaLugares').val();
  if (codigoCC != 'select') {
    $("#newDotacion").removeAttr("disabled");
    // $("#saveDotacion").removeAttr("disabled");
    listDotacion(codigoCC);
  }
})

function dotacionGetId(strid) {
  var splitted = strid.split('-');
  if (splitted.length > 2) {
    return Number(splitted[2]);
  }
  return 0;
}

$(document).on('change', '.dotacion-select', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  var idDotacion = dotacionGetId(this.id);
  var dotacionValue = this.value;
  var dotacionText = $(`#${this.id} option:selected`).text();
  dotacionSelects[`${idDotacion}`] = { idPersonalOfertado: dotacionValue, personalOfertado: dotacionText };

  $("#saveDotacion").removeAttr("disabled");
});

$('#tablaListadoDotacion').on('click', 'tbody td:not(:first-child, :nth-child(2))', function (e) {
  editorDotacion.inline(this);
});

editorDotacion.on('preSubmit', function (e, o, action) {
  if (o.action == 'edit') {
    var [[k, v]] = Object.entries(o.data);
    dotacionListUpdated[k] = v;

    $("#saveDotacion").removeAttr("disabled");
  }
});

editorDotacion.on('postEdit', function (e, o, action) {
  var index = dotacionData.findIndex((item) => `${item.id}` === `${action.id}`)
  if (index >= 0) {
    $(`#dotacion-select-${action.id}`).val(dotacionSelects[action.id]?.idPersonalOfertado);
  }
});

$("#saveDotacion").on('click', async (e) => {
  e.stopImmediatePropagation();
  e.preventDefault();
  var keys = Object.keys(dotacionListUpdated);

  keys.forEach((key) => {
    var selectsWithChanges = Object.keys(dotacionSelects);
    if (selectsWithChanges.includes(key)) {
      dotacionListUpdated[key].personalOfertado = dotacionSelects[key].personalOfertado;
    }
  })

  var dataUpd = [];
  var dataAdd = [];
  keys.forEach((key) => {
    var json = dotacionListUpdated[key];
    if (key.includes('*')) {
      var aux = getCodigoYNombreCC();
      json.codigoCC = aux[0];
      json.nombreCC = aux[1];
      dataAdd.push(json);
    } else {
      json.id = key;
      dataUpd.push(json);
    }
  });

  loading(true);
  await $.ajax({
    url:   'controller/actualizarListadoDotacion.php',
    type:  'post',
    data:  { dataAdd, dataUpd },
    success:  function (response) {
      // loading(false);
      alertasToast("<img src='view/img/check.gif' class='splash_load'><br />Dotación actualizada correctamente");
    }
  })

  await listDotacion($('#selectListaLugares').val());

  loading(false);
})

function modelarSelectDotacion(id, items) {
  var select = "<select id='dotacion-select-" + id + "' class='dotacion-select'>";
  items.forEach((item) => {
    var code = item['codigo'];
    var name = item['nombre'];
    select += `<option value='${code}'>${name}</option>`;
  })
  select += "</select>";
  return select;
}

$('#newDotacion').on('click', function (e) {
  e.stopImmediatePropagation();
  lastIdDotacionToUse++;
  var cId = `${lastIdDotacionToUse}*`;
  var dt = {
    id: cId,
    personalOfertado: modelarSelectDotacion(cId, comunesDotacion.personalOfertado),
    cargoMandante: '',
    cargoGenericoUnificado: '',
    familia: '',
    jeasGeas: '',
    ref1: '',
    ref2: '',
    ene22: '',
    feb22: '',
    mar22: '',
    abr22: '',
    may22: '',
    jun22: '',
    jul22: '',
    ago22: '',
    set22: '',
    oct22: '',
    nov22: '',
    dic22: '',
  };

  dotacionData.push(dt);
  tableDotacion.DataTable().row.add(dt).draw(true);
});

$("#agregarSubcontratista").unbind("click").click(async function(){
  $("#modalIngresoSubcontratista").find("input,textarea,select").val("");
  $("#rutIngresoSubcontratista").removeClass("is-invalid");
  $("#nombreIngresoSubcontratista").removeClass("is-invalid");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');

  setTimeout(function(){
    $("#modalIngresoSubcontratista").modal("show");
    $('#modalAlertasSplash').modal('hide');
    setTimeout(function(){
      $('#modalIngresoSubcontratista').animate({ scrollTop: 0 }, 'fast');
    },200);
  },500);
});

$("input#rutIngresoSubcontratista").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutIngresoSubcontratista").val() !== ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
    $("#rutIngresoSubcontratista").val("");
    $("#rutIngresoSubcontratista").addClass("is-invalid");
  }
});

$("#guardarIngresoSubcontratista").unbind('click').click(function(){
  if($("#rutIngresoSubcontratista").val().length == 0 || $("#nombreIngresoSubcontratista").val().length == 0){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos");
    if ($("#rutIngresoSubcontratista").val().length == 0){
      $("#rutIngresoSubcontratista").addClass("is-invalid");
    }
    else if ($("#nombreIngresoSubcontratista").val().length == 0){
      $("#nombreIngresoSubcontratista").addClass("is-invalid");
    }
  }
  else {
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalIngresoSubcontratista").modal("hide");
    var interno = 0;
    if($("#esSubcontratoIngresoSubcontratista").prop("checked") === true){
      interno = 0;
    }
    else{
      interno  = 1;
    }
    parametros = {
      "rutIngreso":   $.trim($("#rutIngresoSubcontratista").val().replace('.','').replace('.','')),
      "nombre":  $("#nombreIngresoSubcontratista").val(),
      "interno": interno
    }
    //console.log(parametros);
    $.ajax({
      url:   'controller/datosChequeaSubcontratista.php',
      type:  'post',
      data:  parametros,
      success:  function (response) {
        var p = response.split(",");
        if(response.localeCompare("Sin datos")!= 0 && response != ""){
          if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El rut de la empresa ya existe");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
              $("#modalIngresoSubcontratista").modal("show");
            },500);
          }
        }
        else {
          $.ajax({
            url: "controller/ingresaSubcontratista.php",
            type: 'POST',
            data: parametros,
            success:  function (response) {
              var p = response.split(",");
              if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                  var table = $('#tablaSubcontratista').DataTable();
                  //table.rows('.selected').remove().draw();
                  table.ajax.reload();
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Empresa creada correctamente");
                  $("#editarSubcontratista").attr("disabled","disabled");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                }
                else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear la empresa, si el problema persiste favor comuniquese con soporte");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                }
              }
              else{
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear la empresa, si el problema persiste favor comuniquese con soporte");
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                },500);
              }
            }
          });
        }
      }
    });
  }
});

$("#nombreIngresoSubcontratista").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarSubcontratista").unbind('click').click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaSubcontratista').DataTable();
  var rutSubcontratista = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT;
  });
  var nombre = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE_SUBCONTRATO;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
      return item.ESTADO;
  });
  var tipo = $.map(table.rows('.selected').data(), function (item) {
      return item.TIPO;
  });
  $("#rutEditarSubcontratista").val(rutSubcontratista);
  $("#nombreEditarSubcontratista").val(nombre);
  $("#estadoEditarSubcontratista").val(estado);
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#estadoEditarSubcontratista").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  if(tipo[0] == 'Subcontratista'){
    $("#esSubcontratoEditarSubcontratista").prop("checked",true);
  }
  else{
    $("#esSubcontratoEditarSubcontratista").prop("checked",false);
  }
  setTimeout(function(){
    $('#modalAlertasSplash').modal('hide');
    $('#modalEditarSubcontratista').modal('show');
  },500);
});

$("#guardarEditarSubcontratista").unbind('click').click(async function(){
  $("#modalEditarSubcontratista").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var interno = 0;
  if($("#esSubcontratoEditarSubcontratista").prop("checked") == true){
    interno = 0;
  }
  else{
    interno = 1;
  }
  parametros = {
    "rutEditar":   $("#rutEditarSubcontratista").val(),
    "nombre":  $("#nombreEditarSubcontratista").val(),
    "estado": $("#estadoEditarSubcontratista").val(),
    "interno": interno
  }
  //console.log(parametros);
  await $.ajax({
    url: "controller/editarSubcontratista.php",
    type: 'POST',
    data: parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaSubcontratista').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Subcontratista editado correctamente");
          $("#editarSubcontratista").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar subcontratista, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar al subcontratista, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});

$("#crearGerencia").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");

  $("#gerenciaCrearGerenciaControlling").val("");
  $("#subGerenciaCrearGerenciaControlling").val("");
  $("#gerenciaCrearGerenciaControlling").removeClass("is-invalid");
  $("#subGerenciaCrearGerenciaControlling").removeClass("is-invalid");

  await $.ajax({
    url:   'controller/datosPersonalParaAsignar.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      var cuerpoGer = '<option selected value="0">Sin seleccionar</option>';
      var cuerpoSubGer = '<option selected value="0">Sin seleccionar</option>';
      for(var i = 0; i < p.aaData.length; i++){
        cuerpoGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        cuerpoSubGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
      }
      $("#gerenteCrearGerenciaControlling").html(cuerpoGer);
      $("#subgerenteCrearGerenciaControlling").html(cuerpoSubGer);
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#gerenteCrearGerenciaControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#subgerenteCrearGerenciaControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalCrearGerenciaControlling").modal("show");
  },2000);
});

$("#editarGerencia").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaGerencia').DataTable();
  var idGerencia = $.map(table.rows('.selected').data(), function (item) {
      return item.IDGERENCIA;
  });
  var idGerente = $.map(table.rows('.selected').data(), function (item) {
      return item.IDGERENTE;
  });
  var idSubgerente = $.map(table.rows('.selected').data(), function (item) {
      return item.IDSUBGERENTE;
  });
  var gerencia = $.map(table.rows('.selected').data(), function (item) {
      return item.GERENCIA;
  });
  var subGerencia = $.map(table.rows('.selected').data(), function (item) {
      return item.SUBGERENCIA;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
      return item.ESTADO;
  });

  $("#tituloEditarGerenciaControlling").html("<br>Identificador de gerencia: " + idGerencia);
  $("#idEditarGerenciaControlling").val(idGerencia);
  $("#gerenciaEditarGerenciaControlling").val(gerencia);
  $("#subGgerenciaEditarGerenciaControlling").val(subGerencia);

  await $.ajax({
    url:   'controller/datosPersonalParaAsignar.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      var cuerpoGer = '<option selected value="0">Sin seleccionar</option>';
      var cuerpoSubGer = '<option selected value="0">Sin seleccionar</option>';
      for(var i = 0; i < p.aaData.length; i++){
        if(idGerente[0] === p.aaData[i].IDPERSONAL){
          cuerpoGer += '<option selected value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        else{
          cuerpoGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        if(idSubgerente[0] === p.aaData[i].IDPERSONAL){
          cuerpoSubGer += '<option selected value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        else{
          cuerpoSubGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
      }
      $("#gerenteEditarGerenciaControlling").html(cuerpoGer);
      $("#subgerenteEditarGerenciaControlling").html(cuerpoSubGer);
    }
  });

  $("#estadoEditarGerenciaControlling").val(estado);

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#gerenteEditarGerenciaControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#subgerenteEditarGerenciaControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#estadoEditarGerenciaControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalEditarGerenciaControlling").modal("show");
  },2000);
});

$("#guardarCrearGerenciaControlling").unbind("click").click(async function(){
  if($("#gerenciaCrearGerenciaControlling").val() === "" || $("#subGerenciaCrearGerenciaControlling").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar la gerencia y subgerencia");
    $("#gerenciaCrearGerenciaControlling").addClass("is-invalid");
    $("#subGerenciaCrearGerenciaControlling").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalCrearGerenciaControlling").modal("hide");

    var gerencia = $("#gerenciaCrearGerenciaControlling").val();
    var subGerencia = $("#subGerenciaCrearGerenciaControlling").val();
    var idGerente = $("#gerenteCrearGerenciaControlling").val();
    var idSubgerente = $("#subgerenteCrearGerenciaControlling").val();

    var parametros = {
      "gerencia": gerencia,
      "subGerencia": subGerencia,
      "idGerente": idGerente,
      "idSubgerente": idSubgerente
    }

    await $.ajax({
      url:   'controller/datosGerenciaSubgerencia.php',
      type:  'post',
      data: parametros,
      success: function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData[0].CANTIDAD === '0'){
          $.ajax({
              url: "controller/ingresarGerenciaSubgerencia.php",
              type: 'POST',
              data: parametros,
              success:  function (response) {
                  var p = response.split(",");
                  if(response.localeCompare("Sin datos")!= 0 && response != ""){
                      if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                          var table = $('#tablaGerencia').DataTable();
                          table.ajax.reload();
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Gerencia ingresada correctamente");
                          setTimeout(function(){
                            $('#modalAlertasSplash').modal('hide');
                          },500);
                      }
                      else{
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar la gerencia");
                          setTimeout(function(){
                            $('#modalAlertasSplash').modal('hide');
                          },500);
                      }
                  }else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el estado");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                  }
              }
          });
        }
        else{
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>La gerencia ingresada ya existe");
          setTimeout(function(){
            $("#modalCrearGerenciaControlling").modal("show");
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
    });
  }
});

$("#guardarEditarGerenciaControlling").unbind("click").click(function(){
  if($("#gerenciaEditarGerenciaControlling").val() === "" || $("#subGgerenciaEditarGerenciaControlling").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar la gerencia y subgerencia");
    $("#gerenciaEditarGerenciaControlling").addClass("is-invalid");
    $("#subGgerenciaEditarGerenciaControlling").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalEditarGerenciaControlling").modal("hide");

    var gerencia = $("#gerenciaEditarGerenciaControlling").val();
    var subGerencia = $("#subGgerenciaEditarGerenciaControlling").val();
    var idGerente = $("#gerenteEditarGerenciaControlling").val();
    var idSubgerente = $("#subgerenteEditarGerenciaControlling").val();
    var idGerencia = $("#idEditarGerenciaControlling").val();
    var estado = $("#estadoEditarGerenciaControlling").val();

    var parametros = {
      "gerencia": gerencia,
      "subGerencia": subGerencia,
      "idGerente": idGerente,
      "idSubgerente": idSubgerente,
      "idGerencia": idGerencia,
      "estado": estado
    }

    $.ajax({
        url: "controller/actualizaGerenciaSubgerencia.php",
        type: 'POST',
        data: parametros,
        success:  function (response) {
            var p = response.split(",");
            if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var table = $('#tablaGerencia').DataTable();
                    table.ajax.reload();
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Gerencia actualizada correctamente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
                else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar la gerencia");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
            }else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar la gerencia");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
        }
    });
  }
});

$("#asignarGerenteSub").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  var table = $('#tablaGerencia').DataTable();
  var idGerencia = $.map(table.rows('.selected').data(), function (item) {
      return item.IDGERENCIA;
  });

  var gerencias = "";
  var gerenciasBD = "";

  for(var i = 0; i < idGerencia.length; i++){
    if(i == idGerencia.length - 1){
      gerencias = gerencias + idGerencia[i];
    }
    else{
      gerencias = gerencias + idGerencia[i] + ",";
    }
  }

  for(var i = 0; i < idGerencia.length; i++){
    if(i == idGerencia.length - 1){
      gerenciasBD = gerenciasBD + "'" + idGerencia[i] + "'";
    }
    else{
      gerenciasBD = gerenciasBD + "'" + idGerencia[i] + "',";
    }
  }

  $("#idAsignarGerenteControlling").val(gerenciasBD);
  $("#tituloAsignarGerenteControlling").html("<br>Identificador de gerencias a asignar: " + gerencias);

  await $.ajax({
    url:   'controller/datosPersonalParaAsignar.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      var cuerpoGer = '<option selected value="0">Sin seleccionar</option>';
      var cuerpoSubGer = '<option selected value="0">Sin seleccionar</option>';
      for(var i = 0; i < p.aaData.length; i++){
        cuerpoGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        cuerpoSubGer += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
      }
      $("#gerenteAsignarGerenteControlling").html(cuerpoGer);
      $("#subgerenteAsignarGerenteControlling").html(cuerpoSubGer);
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#gerenteAsignarGerenteControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#subgerenteAsignarGerenteControlling").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalAsignarGerenteControlling").modal("show");
  },2000);
});

$("#guardarAsignarGerenteControlling").unbind("click").click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalAsignarGerenteControlling").modal("hide");

  var idGerente = $("#gerenteAsignarGerenteControlling").val();
  var idSubgerente = $("#subgerenteAsignarGerenteControlling").val();
  var gerencias = $("#idAsignarGerenteControlling").val();

  var parametros = {
    "gerencias": gerencias,
    "idGerente": idGerente,
    "idSubgerente": idSubgerente
  }

  $.ajax({
      url: "controller/actualizaGerenteSubgerenteMasivo.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
              if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                  var table = $('#tablaGerencia').DataTable();
                  table.ajax.reload();
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Gerencias actualizadas correctamente");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
              }
              else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar las gerencias");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
              }
          }else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar las gerencias");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
      }
  });
});

$("#crearEstadoProyecto").unbind("click").click(function(){
  $("#estadoEditarEstadoProyecto").val('');
  $("#descripcionEditarEstadoProyecto").val('');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalCrearEstadoProyecto").modal("show");
  },2000);
});

$("#editarEstadoProyecto").unbind("click").click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaEstadoProyecto').DataTable();
  var idEstado = $.map(table.rows('.selected').data(), function (item) {
      return item.IDESTRUCTURA_OPERACION_ESTADO;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
      return item.ESTADO;
  });
  var description = $.map(table.rows('.selected').data(), function (item) {
      return item.DESCRIPCION;
  });

  $("#tituloEditarEstadoProyecto").html("<br>Identificador de estado: " + idEstado);
  $("#estadoEditarEstadoProyecto").val(estado);
  $("#descripcionEditarEstadoProyecto").val(description);
  $("#idEditarEstadoProyecto").val(idEstado);

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalEditarEstadoProyecto").modal("show");
  },2000);
});

$("#guardarCrearEstadoProyecto").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalCrearEstadoProyecto").modal("hide");

  var estado = $("#estadoCrearEstadoProyecto").val();
  var descripcion = $("#descripcionCrearEstadoProyecto").val();

  var parametros = {
    "estado": estado,
    "descripcion": descripcion
  }

  await $.ajax({
    url:   'controller/datosEstadoProyectoNombre.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData[0].CANTIDAD === '0'){
        $.ajax({
            url: "controller/ingresarEstadoProyecto.php",
            type: 'POST',
            data: parametros,
            success:  function (response) {
                var p = response.split(",");
                if(response.localeCompare("Sin datos")!= 0 && response != ""){
                    if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                        var table = $('#tablaEstadoProyecto').DataTable();
                        table.ajax.reload();
                        var random = Math.round(Math.random() * (1000000 - 1) + 1);
                        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Estado ingresado correctamente");
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },500);
                    }
                    else{
                        var random = Math.round(Math.random() * (1000000 - 1) + 1);
                        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el estado");
                        setTimeout(function(){
                          $('#modalAlertasSplash').modal('hide');
                        },500);
                    }
                }else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el estado");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
                }
            }
        });
      }
      else{
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>El estado ingresado ya existe");
        setTimeout(function(){
          $("#modalCrearEstadoProyecto").modal("show");
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});

$("#guardarEditarEstadoProyecto").unbind("click").click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');
  $("#modalEditarEstadoProyecto").modal("hide");

  var estado = $("#estadoEditarEstadoProyecto").val();
  var descripcion = $("#descripcionEditarEstadoProyecto").val();
  var idEstado = $("#idEditarEstadoProyecto").val();

  var parametros = {
    "estado": estado,
    "descripcion": descripcion,
    "idEstado": idEstado
  }

  $.ajax({
      url: "controller/actualizarEstadoProyecto.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
          var p = response.split(",");
          if(response.localeCompare("Sin datos")!= 0 && response != ""){
              if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                  var table = $('#tablaEstadoProyecto').DataTable();
                  table.ajax.reload();
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Estado actualizado correctamente");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
              }
              else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el estado");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },500);
              }
          }else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el estado");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },500);
          }
      }
  });
});

$("#crearClienteProyecto").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");

  $("#rutCrearClienteProyecto").val("");
  $("#clienteCrearClienteProyecto").val("");
  $("#holdingCrearClienteProyecto").val("");
  $("#rutCrearClienteProyecto").removeClass("is-invalid");
  $("#clienteCrearClienteProyecto").removeClass("is-invalid");
  $("#holdingCrearClienteProyecto").removeClass("is-invalid");

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalCrearClienteProyecto").modal("show");
  },2000);
});

$("#rutCrearClienteProyecto").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutCrearClienteProyecto").val() !== ''){rutIngOrden
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
    $("#rutCrearClienteProyecto").val("");
    $("#rutCrearClienteProyecto").addClass("is-invalid");
  }
});

$("#gerenciaCrearGerenciaControlling").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#subGerenciaCrearGerenciaControlling").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#gerenciaEditarGerenciaControlling").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#subGgerenciaEditarGerenciaControlling").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#rutCrearClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#clienteCrearClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#holdingCrearClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#guardarCrearClienteProyecto").unbind("click").click(async function(){
  if($("#rutCrearClienteProyecto").val() === "" || $("#clienteCrearClienteProyecto").val() === "" || $("#holdingCrearClienteProyecto").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar rut, cliente y holding");
    $("#rutCrearClienteProyecto").addClass("is-invalid");
    $("#clienteCrearClienteProyecto").addClass("is-invalid");
    $("#holdingCrearClienteProyecto").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalCrearClienteProyecto").modal("hide");

    var rut = $("#rutCrearClienteProyecto").val().replace('.','').replace('.','');
    var cliente = $("#clienteCrearClienteProyecto").val();
    var holding = $("#holdingCrearClienteProyecto").val();

    var parametros = {
      "rut": rut,
      "cliente": cliente,
      "holding": holding
    }

    await $.ajax({
      url:   'controller/datosClienteProyectoRut.php',
      type:  'post',
      data: parametros,
      success: function (response) {
        var p = jQuery.parseJSON(response);
        if(p.aaData[0].CANTIDAD === '0'){
          $.ajax({
              url: "controller/ingresarClienteProyecto.php",
              type: 'POST',
              data: parametros,
              success:  function (response) {
                  var p = response.split(",");
                  if(response.localeCompare("Sin datos")!= 0 && response != ""){
                      if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                          var table = $('#tablaCliente').DataTable();
                          table.ajax.reload();
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Cliente ingresado correctamente");
                          setTimeout(function(){
                            $('#modalAlertasSplash').modal('hide');
                          },500);
                      }
                      else{
                          var random = Math.round(Math.random() * (1000000 - 1) + 1);
                          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el cliente");
                          setTimeout(function(){
                            $('#modalAlertasSplash').modal('hide');
                          },500);
                      }
                  }else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el cliente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                  }
              }
          });
        }
        else{
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>El cliente ingresado ya existe");
          setTimeout(function(){
            $("#modalCrearClienteProyecto").modal("show");
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
    });
  }
});

$("#editarClienteProyecto").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $("#modalAlertasSplash").modal("show");
  $("#rutEditarClienteProyecto").removeClass("is-invalid");
  $("#clienteEditarClienteProyecto").removeClass("is-invalid");
  $("#holdingEditarClienteProyecto").removeClass("is-invalid");

  var table = $('#tablaCliente').DataTable();
  var idCliente = $.map(table.rows('.selected').data(), function (item) {
      return item.IDCLIENTE;
  });
  var rut = $.map(table.rows('.selected').data(), function (item) {
      return item.RUT_CLIENTE;
  });
  var cliente = $.map(table.rows('.selected').data(), function (item) {
      return item.SUB_CLIENTE;
  });
  var holding = $.map(table.rows('.selected').data(), function (item) {
      return item.CLIENTE;
  });

  $("#rutEditarClienteProyecto").val(rut);
  $("#clienteEditarClienteProyecto").val(cliente);
  $("#holdingEditarClienteProyecto").val(holding);
  $("#tituloEditarClienteProyecto").html("Identificador de cliente: " + idCliente);
  $("#idEditarClienteProyecto").val(idCliente);

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalEditarClienteProyecto").modal("show");
  },2000);
});

$("#rutEditarClienteProyecto").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutEditarClienteProyecto").val() !== ''){rutIngOrden
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
    $("#rutEditarClienteProyecto").val("");
    $("#rutEditarClienteProyecto").addClass("is-invalid");
  }
});

$("#rutEditarClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#clienteEditarClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#holdingEditarClienteProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#guardarEditarClienteProyecto").unbind("click").click(function(){
  if($("#rutEditarClienteProyecto").val() === "" || $("#clienteEditarClienteProyecto").val() === "" || $("#holdingEditarClienteProyecto").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar rut, cliente y holding");
    $("#rutEditarClienteProyecto").addClass("is-invalid");
    $("#clienteEditarClienteProyecto").addClass("is-invalid");
    $("#holdingEditarClienteProyecto").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalEditarClienteProyecto").modal("hide");

    var rut = $("#rutEditarClienteProyecto").val();
    var cliente = $("#clienteEditarClienteProyecto").val();
    var holding = $("#holdingEditarClienteProyecto").val();
    var idCliente = $("#idEditarClienteProyecto").val();

    var parametros = {
      "rut": rut,
      "cliente": cliente,
      "holding": holding,
      "idCliente": idCliente
    }

    $.ajax({
        url: "controller/actualizarClienteProyecto.php",
        type: 'POST',
        data: parametros,
        success:  function (response) {
            var p = response.split(",");
            if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var table = $('#tablaCliente').DataTable();
                    table.ajax.reload();
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Cliente actualizado correctamente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
                else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el cliente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
            }else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el cliente");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
        }
    });
  }
});

$("#agregarProyecto").unbind('click').click(async function(){
  $("#defProyectoIngresoProyecto").val("");
  $("#pepIngresoProyecto").val("");
  $("#crmIngresoProyecto").val("");
  $("#proyectoIngresoProyecto").val("");
  $("#denominacionIngresoProyecto").val("");
  $("#fechaIniContratoIngresoProyecto").val("");
  $("#fechaFinContratoIngresoProyecto").val("");
  $("#fechaIniProyectoIngresoProyecto").val("");
  $("#fechaFinProyectoIngresoProyecto").val("");

  $("#modalEditarPerfil").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');

  await $.ajax({
    url:   'controller/datosSubcontratistasVehiculoInterno.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoSub = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoSub += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
        }
        $("#sociedadIngresoProyecto").html(cuerpoSub);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosGerenciaProyecto.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoGer = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoGer += '<option value="' + p2.aaData[i].IDGERENCIA + '">' + p2.aaData[i].GERENCIA + ' - ' + p2.aaData[i].SUBGERENCIA +  '</option>';
        }
        $("#gerSubIngresoProyecto").html(cuerpoGer);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosPersonalParaAsignar.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      var cuerpoController = '';
      var cuerpoAdmin = '';
      for(var i = 0; i < p.aaData.length; i++){
        cuerpoController += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        cuerpoAdmin += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
      }
      $("#controllerIngresoProyecto").html(cuerpoController);
      $("#adminContratoIngresoProyecto").html(cuerpoAdmin);
    }
  });

  await $.ajax({
    url:   'controller/datosClientesProyectos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCl = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoCl += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + ' - ' + p2.aaData[i].SUB_CLIENTE +  '</option>';
        }
        $("#clienteSubIngresoProyecto").html(cuerpoCl);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosEstadosProyectos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEst = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoEst += '<option value="' + p2.aaData[i].IDESTADO + '">' + p2.aaData[i].ESTADO + '</option>';
        }
        $("#estadoIngresoProyecto").html(cuerpoEst);
      }
    }
  });

  $("#fechaIniContratoIngresoProyecto").datepicker({
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

  $("#fechaFinContratoIngresoProyecto").datepicker({
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

  $("#fechaIniProyectoIngresoProyecto").datepicker({
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

  $("#fechaFinProyectoIngresoProyecto").datepicker({
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

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#estadoIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#clienteSubIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#sociedadIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#gerSubIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#controllerIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#adminContratoIngresoProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
  }

  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#bodyIngresoProyecto").css("height",h);
    $("#modalIngresoProyecto").modal("show");
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarIngresoProyecto").unbind("click").click(function(){
  if($("#defProyectoIngresoProyecto").val() === "" || $("#pepIngresoProyecto").val() === "" || $("#proyectoIngresoProyecto").val() === "" || $("#denominacionIngresoProyecto").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar def. Proyecto, PEP, Proyecto y Denominación");
    $("#defProyectoIngresoProyecto").addClass("is-invalid");
    $("#pepIngresoProyecto").addClass("is-invalid");
    $("#proyectoIngresoProyecto").addClass("is-invalid");
    $("#denominacionIngresoProyecto").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalIngresoProyecto").modal("hide");

    var definicion = $("#defProyectoIngresoProyecto").val();
    var pep = $("#pepIngresoProyecto").val();
    var crm = $("#crmIngresoProyecto").val();
    var proyecto = $("#proyectoIngresoProyecto").val();
    var denominacion = $("#denominacionIngresoProyecto").val();
    var sociedad = $("#sociedadIngresoProyecto").val();
    var gerencia = $("#gerSubIngresoProyecto").val();
    var controller = $("#controllerIngresoProyecto").val();
    var adminContrato = $("#adminContratoIngresoProyecto").val();
    var cliente = $("#clienteSubIngresoProyecto").val();
    var fechaIniContrato = $("#fechaIniContratoIngresoProyecto").val();
    var fechaFinContrato = $("#fechaFinContratoIngresoProyecto").val();
    var fechaIniProyecto = $("#fechaIniProyectoIngresoProyecto").val();
    var fechaFinProyecto = $("#fechaFinProyectoIngresoProyecto").val();
    var estado = $("#estadoIngresoProyecto").val();

    var parametros = {
      "definicion": definicion,
      "pep": pep,
      "crm": crm,
      "proyecto": proyecto,
      "denominacion": denominacion,
      "sociedad": sociedad,
      "gerencia": gerencia,
      "controller": controller,
      "adminContrato": adminContrato,
      "cliente": cliente,
      "fechaIniContrato": fechaIniContrato,
      "fechaFinContrato": fechaFinContrato,
      "fechaIniProyecto": fechaIniProyecto,
      "fechaFinProyecto": fechaFinProyecto,
      "estado": estado
    }

    $.ajax({
        url: "controller/ingresarProyectoControlling.php",
        type: 'POST',
        data: parametros,
        success:  function (response) {
            var p = response.split(",");
            if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var table = $('#tablaListadoProyecto').DataTable();
                    table.ajax.reload();
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Proyecto ingresado correctamente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
                else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el proyecto");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
            }else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar el proyecto");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
        }
    });
  }
});

$("#defProyectoIngresoProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#pepIngresoProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#proyectoIngresoProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#denominacionIngresoProyecto").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarProyecto").unbind('click').click(async function(){
  $("#defProyectoIngresoProyecto").val("");
  $("#pepEditarProyecto").val("");
  $("#crmEditarProyecto").val("");
  $("#proyectoEditarProyecto").val("");
  $("#denominacionEditarProyecto").val("");
  $("#fechaIniContratoEditarProyecto").val("");
  $("#fechaFinContratoEditarProyecto").val("");
  $("#fechaIniProyectoEditarProyecto").val("");
  $("#fechaFinProyectoEditarProyecto").val("");

  $("#modalEditarPerfil").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
  $('#modalAlertasSplash').modal('show');

  var table = $('#tablaListadoProyecto').DataTable();
  var folio = $.map(table.rows('.selected').data(), function (item) {
      return item.FOLIO;
  });
  var definicion = $.map(table.rows('.selected').data(), function (item) {
      return item.PEP_PADRE;
  });
  var pep = $.map(table.rows('.selected').data(), function (item) {
      return item.PEP;
  });
  var crm = $.map(table.rows('.selected').data(), function (item) {
      return item.COD_CRM;
  });
  var proyecto = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE_PADRE;
  });
  var denominacion = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRE;
  });
  var idSociedad = $.map(table.rows('.selected').data(), function (item) {
      return item.IDSOCIEDAD;
  });
  var idSubgerencia = $.map(table.rows('.selected').data(), function (item) {
      return item.IDSUBGERENCIA;
  });
  var idController = $.map(table.rows('.selected').data(), function (item) {
      return item.IDCONTROLLER;
  });
  var idAdmin = $.map(table.rows('.selected').data(), function (item) {
      return item.IDADMINCONTRATO;
  });
  var idCliente = $.map(table.rows('.selected').data(), function (item) {
      return item.IDCLIENTE;
  });
  var idEstado = $.map(table.rows('.selected').data(), function (item) {
      return item.IDESTADO;
  });
  var f_ini_contrato = $.map(table.rows('.selected').data(), function (item) {
      return item.FECHA_INICIO_CONTRATO;
  });
  var f_fin_contrato = $.map(table.rows('.selected').data(), function (item) {
      return item.FECHA_FIN_CONTRATO;
  });
  var f_ini_ope = $.map(table.rows('.selected').data(), function (item) {
      return item.FECHA_INICIO_OPERACION;
  });
  var f_fin_ope = $.map(table.rows('.selected').data(), function (item) {
      return item.FECHA_FIN_OPERACION;
  });

  $("#tituloEditarProyecto").html("<br>Identificador de proyecto: " + folio);
  $("#idEditarProyecto").val(folio);

  $("#defProyectoEditarProyecto").val(definicion);
  $("#pepEditarProyecto").val(pep);
  $("#crmEditarProyecto").val(crm);
  $("#proyectoEditarProyecto").val(proyecto);
  $("#denominacionEditarProyecto").val(denominacion);

  await $.ajax({
    url:   'controller/datosSubcontratistasVehiculoInterno.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoSub = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(idSociedad[0] == p2.aaData[i].IDSUBCONTRATO){
              cuerpoSub += '<option selected value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
          else{
              cuerpoSub += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
        }
        $("#sociedadEditarProyecto").html(cuerpoSub);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosGerenciaProyecto.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoGer = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(idSubgerencia[0] == p2.aaData[i].IDGERENCIA){
              cuerpoGer += '<option selected value="' + p2.aaData[i].IDGERENCIA + '">' + p2.aaData[i].GERENCIA + ' - ' + p2.aaData[i].SUBGERENCIA +  '</option>';
          }
          else{
              cuerpoGer += '<option value="' + p2.aaData[i].IDGERENCIA + '">' + p2.aaData[i].GERENCIA + ' - ' + p2.aaData[i].SUBGERENCIA +  '</option>';
          }
        }
        $("#gerSubEditarProyecto").html(cuerpoGer);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosPersonalParaAsignar.php',
    type:  'post',
    success: function (response) {
      var p = jQuery.parseJSON(response);
      var cuerpoController = '';
      var cuerpoAdmin = '';
      for(var i = 0; i < p.aaData.length; i++){
        if(idController[0] == p.aaData[i].IDPERSONAL){
            cuerpoController += '<option selected value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        else{
            cuerpoController += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        if(idAdmin[0] == p.aaData[i].IDPERSONAL){
            cuerpoAdmin += '<option selected value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
        else{
            cuerpoAdmin += '<option value="' + p.aaData[i].IDPERSONAL + '">' + p.aaData[i].DNI + ' - ' + p.aaData[i].NOMBRES + ' ' + p.aaData[i].APELLIDOS + ' - ' + p.aaData[i].CARGO + '</option>';
        }
      }
      $("#controllerEditarProyecto").html(cuerpoController);
      $("#adminContratoEditarProyecto").html(cuerpoAdmin);
    }
  });

  await $.ajax({
    url:   'controller/datosClientesProyectos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCl = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(idCliente[0] == p2.aaData[i].IDCLIENTE){
              cuerpoCl += '<option selected value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + ' - ' + p2.aaData[i].SUB_CLIENTE +  '</option>';
          }
          else{
              cuerpoCl += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + ' - ' + p2.aaData[i].SUB_CLIENTE +  '</option>';
          }
        }
        $("#clienteSubEditarProyecto").html(cuerpoCl);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosEstadosProyectos.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEst = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(idEstado[0] == p2.aaData[i].IDESTADO){
              cuerpoEst += '<option selected value="' + p2.aaData[i].IDESTADO + '">' + p2.aaData[i].ESTADO + '</option>';
          }
          else{
              cuerpoEst += '<option value="' + p2.aaData[i].IDESTADO + '">' + p2.aaData[i].ESTADO + '</option>';
          }
        }
        $("#estadoEditarProyecto").html(cuerpoEst);
      }
    }
  });

  $("#fechaIniContratoEditarProyecto").datepicker({
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

  $("#fechaFinContratoEditarProyecto").datepicker({
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

  $("#fechaIniProyectoEditarProyecto").datepicker({
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

  $("#fechaFinProyectoEditarProyecto").datepicker({
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

  $("#fechaIniContratoEditarProyecto").val(f_ini_contrato);
  $("#fechaFinContratoEditarProyecto").val(f_fin_contrato);
  $("#fechaIniProyectoEditarProyecto").val(f_ini_ope);
  $("#fechaFinProyectoEditarProyecto").val(f_fin_ope);

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#estadoEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#clienteSubEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#sociedadEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#gerSubEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#controllerEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
    $("#adminContratoEditarProyecto").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple'), sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))
    });
  }

  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#bodyEditarProyecto").css("height",h);
    $("#modalEditarProyecto").modal("show");
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarEditarProyecto").unbind("click").click(function(){
  if($("#defProyectoEditarProyecto").val() === "" || $("#pepEditarProyecto").val() === "" || $("#proyectoEditarProyecto").val() === "" || $("#denominacionEditarProyecto").val() === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Debe ingresar def. Proyecto, PEP, Proyecto y Denominación");
    $("#defProyectoEditarProyecto").addClass("is-invalid");
    $("#pepEditarProyecto").addClass("is-invalid");
    $("#proyectoEditarProyecto").addClass("is-invalid");
    $("#denominacionEditarProyecto").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/loading.gif' class='splash_charge_logo'><font style='font-size: 12pt;'>Cargando</font>");
    $('#modalAlertasSplash').modal('show');
    $("#modalEditarProyecto").modal("hide");

    var idProyecto = $("#idEditarProyecto").val();
    var definicion = $("#defProyectoEditarProyecto").val();
    var pep = $("#pepEditarProyecto").val();
    var crm = $("#crmEditarProyecto").val();
    var proyecto = $("#proyectoEditarProyecto").val();
    var denominacion = $("#denominacionEditarProyecto").val();
    var sociedad = $("#sociedadEditarProyecto").val();
    var gerencia = $("#gerSubEditarProyecto").val();
    var controller = $("#controllerEditarProyecto").val();
    var adminContrato = $("#adminContratoEditarProyecto").val();
    var cliente = $("#clienteSubEditarProyecto").val();
    var fechaIniContrato = $("#fechaIniContratoEditarProyecto").val();
    var fechaFinContrato = $("#fechaFinContratoEditarProyecto").val();
    var fechaIniProyecto = $("#fechaIniProyectoEditarProyecto").val();
    var fechaFinProyecto = $("#fechaFinProyectoEditarProyecto").val();
    var estado = $("#estadoEditarProyecto").val();

    var parametros = {
      "idProyecto": idProyecto,
      "definicion": definicion,
      "pep": pep,
      "crm": crm,
      "proyecto": proyecto,
      "denominacion": denominacion,
      "sociedad": sociedad,
      "gerencia": gerencia,
      "controller": controller,
      "adminContrato": adminContrato,
      "cliente": cliente,
      "fechaIniContrato": fechaIniContrato,
      "fechaFinContrato": fechaFinContrato,
      "fechaIniProyecto": fechaIniProyecto,
      "fechaFinProyecto": fechaFinProyecto,
      "estado": estado
    }

    $.ajax({
        url: "controller/editarProyectoControlling.php",
        type: 'POST',
        data: parametros,
        success:  function (response) {
            var p = response.split(",");
            if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                    var table = $('#tablaListadoProyecto').DataTable();
                    table.ajax.reload();
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Proyecto actualizado correctamente");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
                else{
                    var random = Math.round(Math.random() * (1000000 - 1) + 1);
                    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el proyecto");
                    setTimeout(function(){
                      $('#modalAlertasSplash').modal('hide');
                    },500);
                }
            }else{
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar el proyecto");
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);
            }
        }
    });
  }
});
