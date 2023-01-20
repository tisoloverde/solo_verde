$(window).resize(function()
{
   var viewportWidth = $(window).width();
   var viewportHeight = $(window).height();
   menuElegant();
});

$(window).on("load",function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  $("body").css("height",$(window).height());
  $("#contenido").css("height",$(window).height()-10); menuElegant();
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
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","").replace("<img src='view/img/check.gif' class='splash_load'><br />","");
    toastr["success"](texto);
  }
  else if(texto.includes("info.png") == true){
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br />","");
    toastr["info"](texto);
  }
  else if(texto.includes("error.gif") == true){
    texto = texto.replace("<img src='view/img/check.gif' class='splash_load'><br/>","").replace("<img src='view/img/info.png' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br/>","").replace("<img src='view/img/error.gif' class='splash_load'><br />","");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
                                      $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  setTimeout(function(){
    $("body").css("height",$(window).height());
    $("#contenido").css("height",$(window).height()-10); menuElegant();
  },1000);
  var path = window.location.href.split('#/')[1];
  return path;
}

function loading(flag) {
  if (flag) {
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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

/* *************************************** */
/* *************** DOTACION ************** */
/* *************************************** */
var _LAST_ID_DOTACION = 0;
var _DATA_DOTACION = [];
var _TABLE_DOTACION = $('#tablaListadoDotacion');
var _COMUNES_DOTACION = {};
var _LST_MONTHS = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SETIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
var _SEARCH_DOTACION = '';
var _SORT_DOTACION = '';
var _ORDER_DOTACION = '';

async function listComunesDotacion() {
  $.ajax({
    url: 'controller/datosComunesDotacion.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      _COMUNES_DOTACION = response.aaData;
    },
  })
}

async function listDotacionPeriodos() {
  $.ajax({
    url: 'controller/datosPeriodos.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      var data = response.aaData;
      var html = "<option selected value='select' disabled>Seleccione</option>";
      data.forEach((item) => {
        html += `<option value="${item.ANHO}">${item.ANHO}</option>`;
      });
      $('#selectListaPeriodos').html(html);
    },
  })
}

async function listDotacionLugares() {
  $.ajax({
    url: 'controller/datosCentrosDeCostos.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      _LAST_ID_DOTACION = Number(response.idLastDotacion);

      var data = response.aaData;
      var html = "<option selected value='select' disabled>Seleccione</option>";
      data.forEach((item) => {
        html += `<option value="${item.DEFINICION}">${item.DEFINICION} - ${item.NOMENCLATURA}</option>`;
      });
      $('#selectListaLugares').html(html);
    },
  })
}

async function listDotacion(periodo, codigoCC) {
  var largo = Math.trunc(($(window).height() - ($(window).height()/100)*50)/30);
  await _TABLE_DOTACION.DataTable({
    /*serverSide: false,
    processing: true,*/
    // search: { return: true },
    ajax: {
      url: "controller/datosListadoDotacion.php",
      type: 'POST',
      data: {
        periodo, codigoCC,
        // search: _SEARCH_DOTACION, sort: _SORT_DOTACION, order: _ORDER_DOTACION,
      },
    },
    columns: [
      { data: 'IDDOTACION' },
      { data: 'PERSONAL_OFERTADOS' }, // editField: 'personalOfertado' },
      { data: 'FAMILIA' },
      { data: 'CARGO_MANDANTE' },
      { data: 'CARGO_GENERICO_UNIFICADO_FAMILIA' },
      { data: 'CLASIFICACION' },
      { data: 'REFERENCIA1' },
      { data: 'REFERENCIA2' },
      { data: 'ENERO' },
      { data: 'FEBRERO' },
      { data: 'MARZO' },
      { data: 'ABRIL' },
      { data: 'MAYO' },
      { data: 'JUNIO' },
      { data: 'JULIO' },
      { data: 'AGOSTO' },
      { data: 'SETIEMBRE' },
      { data: 'OCTUBRE' },
      { data: 'NOVIEMBRE' },
      { data: 'DICIEMBRE' },
    ],
    buttons: [],
    fixedColumns:   {
      leftColumns: 6
    },
    columnDefs: [
      { width: "5px", targets: 0 },
      /*{ orderable: false, className: 'select-checkbox', targets: [ 0 ] },*/
      /*{ visible: false, searchable: false, targets: [ 2 ] },*/
      { targets: "_all", className: "dt-center" },
      { targets: [8,9,10,11,12,13,14,15,16,17,18,19], className: "onlyNumbers" },
      { orderable: false, targets: [8,9,10,11,12,13,14,15,16,17,18,19] },
    ],
    // select: { style: 'single' },
    select: {
      style: 'single',
      // selector: 'td:not(:nth-child(8),:nth-child(11))'
      selector: disableSelectionCols([2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
    },
    scrollX: true,
    paging: true,
    searching: false,
    ordering: true,
    scrollCollapse: true,
    // "order": [[ 3, "asc" ]],
    info: true,
    lengthMenu: [[largo], [largo]],
    dom: 'Bfrtip',
    language: {
      zeroRecords: "Seleccionar periodo y centro de costo",
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
        _DATA_DOTACION = json.aaData;
        _TABLE_DOTACION.DataTable().columns.adjust();
        loading(false);
      },500);
    }
  });
}

function getCodigoYNombreCC() {
  var id = $('#selectListaLugares').val();
  var opt = $('#selectListaLugares option:selected').text();
  var aux = opt.split(" - ");
  return [id, aux[aux.length - 1]];
}

$('#selectListaPeriodos').on('change', function (e) {
  e.stopImmediatePropagation();
  filtrosDotacion();
})

$('#selectListaLugares').on('change', function (e) {
  e.stopImmediatePropagation();
  filtrosDotacion();
})

function filtrosDotacion() {
  var periodo = $('#selectListaPeriodos').val();
  var codigoCC = $('#selectListaLugares').val();
  if (Boolean(periodo) && Boolean(codigoCC)) {
    loading(true);
    $("#newDotacion").removeAttr("disabled");
    listDotacion(periodo, codigoCC);
  }
}

function dotacionGetId(strid) {
  var splitted = strid.split('-');
  if (splitted.length > 3) {
    // return Number(splitted[2]);
    return splitted[3];
  }
  return "0";
}

$(document).on('keypress', '.onlyNumbers', function (e) {
  var charCode = (e.which) ? e.which : event?.keyCode;
  if (String.fromCharCode(charCode).match(/[^0-9]/g)) {
    return false;
  }
});

/*$(document).on('keydown', '.dataTables_filter input', function (e) {
  e.stopImmediatePropagation();
  if (e.keyCode == 13) {
    _SEARCH_DOTACION = $('.dataTables_filter input').val();
    filtrosDotacion()
  }
});*/

$(document).on('change', '.dotacion-select-col2', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idPersonalOfertado = this.value;

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    _DATA_DOTACION[dotacionIdx]['IDPERSONAL_OFERTADOS'] = idPersonalOfertado;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-select-col3', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idFamilia = this.value;
  var html = "";

  /* Begin - Select Col 4 */
  html = `<select id='dotacion-select-col4-${idDotacion}' class='dotacion-select-col4'>`;
  _COMUNES_DOTACION.cargoMandante.forEach((item) => {
    if (Number(item['IDFAMILIA']) == Number(idFamilia)) {
      html += "<option value='" + item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] + "'>" + item['CARGO_GENERICO_UNIFICADO'] + "</option>";
    }
  })
  html += "</select>";
  $(`#dotacion-select-col4-${idDotacion}`).html(html);
  /* End - Select Col 4 */

  /* Begin - Select Col 5 */
  html = `<select id='dotacion-select-col5-${idDotacion}' class='dotacion-select-col5'>`;
  _COMUNES_DOTACION.cargoMandante.forEach((item) => {
    if (Number(item['IDFAMILIA']) == Number(idFamilia)) {
      html += "<option value='" + item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] + "'>" + item['CARGO_GENERICO_UNIFICADO'] + "</option>";
    }
  })
  html += "</select>";
  $(`#dotacion-select-col5-${idDotacion}`).html(html);
  /* End - Select Col 5 */

  var idCargoMandante = $(`#dotacion-select-col4-${idDotacion}`).val();
  var idCargoGenericoUnificadoFamilia = $(`#dotacion-select-col5-${idDotacion}`).val();
  var cargoGenericoUnificadoFamilia = _COMUNES_DOTACION.cargoMandante.find((item) => Number(item['IDCARGO_GENERICO_UNIFICADO_FAMILIA']) == Number(idCargoGenericoUnificadoFamilia));
  // var idReferencia1 = cargoGenericoUnificadoFamilia['IDREFERENCIA1'];

  /* Begin - Text Col 6 */
  $(`#dotacion-text-col6-${idDotacion}`).text(cargoGenericoUnificadoFamilia['CLASIFICACION']);
  /* End - Text Col 6 */

  /* Begin - Text Col 7 */
  // $(`#dotacion-text-col7-${idDotacion}`).text(cargoGenericoUnificadoFamilia['REFERENCIA1']);
  /* End - Text Col 7 */

  /* Begin - Select Col 8
  html = `<select id='dotacion-select-col8-${idDotacion}' class='dotacion-select-col8'>`;
  _COMUNES_DOTACION.referencia2.forEach((item) => {
    if (Number(item['IDREFERENCIA1']) == Number(cargoGenericoUnificadoFamilia['IDREFERENCIA1'])) {
      html += "<option value='" + item['IDREFERENCIA2'] + "'>" + item['REFERENCIA2'] + "</option>";
    }
  })
  html += "</select>";
  $(`#dotacion-select-col8-${idDotacion}`).html(html);
  End - Select Col 8 */

  // var idReferencia2 = $(`#dotacion-select-col8-${idDotacion}`).val();

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    _DATA_DOTACION[dotacionIdx]['IDFAMILIA'] = idFamilia;
    _DATA_DOTACION[dotacionIdx]['IDCARGO_MANDANTE'] = idCargoMandante;
    _DATA_DOTACION[dotacionIdx]['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] = idCargoGenericoUnificadoFamilia;
    _DATA_DOTACION[dotacionIdx]['CLASIFICACION_TEXT'] = cargoGenericoUnificadoFamilia['CLASIFICACION'];
    // dotacionData[dotacionIdx]['IDREFERENCIA1'] = idReferencia1;
    // dotacionData[dotacionIdx]['REFERENCIA1'] = cargoGenericoUnificadoFamilia['REFERENCIA1'];
    // dotacionData[dotacionIdx]['IDREFERENCIA2'] = idReferencia2;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-select-col4', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idCargoMandante = this.value;

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    _DATA_DOTACION[dotacionIdx]['IDCARGO_MANDANTE'] = idCargoMandante;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-select-col5', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idCargoGenericoUnificadoFamilia = this.value;
  var html = "";

  var cargoGenericoUnificadoFamilia = _COMUNES_DOTACION.cargoMandante.find((item) => Number(item['IDCARGO_GENERICO_UNIFICADO_FAMILIA']) == Number(idCargoGenericoUnificadoFamilia))
  // var idReferencia1 = cargoGenericoUnificadoFamilia['IDREFERENCIA1'];

  /* Begin - Text Col 6 */
  $(`#dotacion-text-col6-${idDotacion}`).text(cargoGenericoUnificadoFamilia['CLASIFICACION']);
  /* End - Text Col 6 */

  /* Begin - Text Col 7 */
  // $(`#dotacion-text-col7-${idDotacion}`).text(cargoGenericoUnificadoFamilia['REFERENCIA1']);
  /* End - Text Col 7 */

  /* Begin - Select Col 8
  html = `<select id='dotacion-select-col8-${idDotacion}' class='dotacion-select-col8'>`;
  comunesDotacion.referencia2.forEach((item) => {
    if (Number(item['IDREFERENCIA1']) == Number(cargoGenericoUnificadoFamilia['IDREFERENCIA1'])) {
      html += "<option value='" + item['IDREFERENCIA2'] + "'>" + item['REFERENCIA2'] + "</option>";
    }
  })
  html += "</select>";
  $(`#dotacion-select-col8-${idDotacion}`).html(html);
  End - Select Col 8 */

  // var idReferencia2 = $(`#dotacion-select-col8-${idDotacion}`).val();

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    _DATA_DOTACION[dotacionIdx]['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] = idCargoGenericoUnificadoFamilia;
    _DATA_DOTACION[dotacionIdx]['CLASIFICACION_TEXT'] = cargoGenericoUnificadoFamilia['CLASIFICACION'];
    // _DATA_DOTACION[dotacionIdx]['IDREFERENCIA1'] = idReferencia1;
    // _DATA_DOTACION[dotacionIdx]['REFERENCIA1_TEXT'] = cargoGenericoUnificadoFamilia['REFERENCIA1'];
    // _DATA_DOTACION[dotacionIdx]['IDREFERENCIA2'] = idReferencia2;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-select-col7', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idReferencia1 = this.value;

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    _DATA_DOTACION[dotacionIdx]['IDREFERENCIA1'] = idReferencia1;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-select-col8', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var idDotacion = dotacionGetId(this.id);
  var idReferencia2 = this.value;

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    console.log(dotacionIdx)
    _DATA_DOTACION[dotacionIdx]['IDREFERENCIA2'] = idReferencia2;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.dotacion-input', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  $("#saveDotacion").removeAttr("disabled");

  var [col, idDotacion] = personalGetColAndId(this.id);
  var val = this.value;

  var dotacionIdx = _DATA_DOTACION.findIndex(({ IDDOTACION }) => `${IDDOTACION}` == `${idDotacion}`)
  if (dotacionIdx >= 0) {
    var key = _LST_MONTHS[col-8-1];
    _DATA_DOTACION[dotacionIdx][`__${key}`] = val;
    _DATA_DOTACION[dotacionIdx]['__isEdited'] = true;
  }
});

$(document).on('keypress', '.dotacion-input', function(e){
  if(e.keyCode == 13) {
    e.preventDefault();
    e.target.blur();
  }
});

$('#newAnho').on('click', function () {
  loading(true);
  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#modalIngresoAnho").modal("show");
    loading(false);
  }, 500);
});

$('#guardarIngresoAnho').on('click', async function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  $("#modalIngresoAnho").modal("hide");
  loading(true);
  await $.ajax({
    url:   'controller/ingresaAnhoAperturado.php',
    type:  'post',
    data:  { anho: $('#anhoIngresoAnho').val() },
    success:  function (response) {
      $('#anhoIngresoAnho').val('');
      if (response == 'OK') {
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Año agregado correctamente");
        setTimeout(function(){
          loading(false);
        }, 500);
      } else {
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>" + response);
        setTimeout(function(){
          loading(false);
        }, 500);
      }
    },
  });

  listDotacionPeriodos();
});

$('#newDotacion').on('click', function (e) {
  e.preventDefault();
  e.stopImmediatePropagation();
  $("#saveDotacion").removeAttr("disabled");

  _LAST_ID_DOTACION++;
  var IDDOTACION = `_${_LAST_ID_DOTACION}`; // Prefijo Dotacion || Sufijo Dotacion

  /* Begin - Select col 2 */
  var PERSONAL_OFERTADOS = `<select id='dotacion-select-col2-${IDDOTACION}' class='dotacion-select-col2'>`;
  _COMUNES_DOTACION.personalOfertado.forEach((item) => {
    PERSONAL_OFERTADOS += "<option value='" + item['IDPERSONAL_OFERTADOS'] + "'>" + item['NOMBRE'] + "</option>";
  })
  PERSONAL_OFERTADOS += "</select>";
  /* End - Select col 2 */

  /* Begin - Select col 3 */
  var FAMILIA = `<select id='dotacion-select-col3-${IDDOTACION}' class='dotacion-select-col3'>`;
  _COMUNES_DOTACION.familia.forEach((item) => {
    FAMILIA += "<option value='" + item['IDFAMILIA'] + "'>" + item['NOMBRE'] + "</option>";
  })
  FAMILIA += "</select>";
  /* End - Select col 3 */

  /* Begin - Select col 4 */
  var CARGO_MANDANTE = `<select id='dotacion-select-col4-${IDDOTACION}' class='dotacion-select-col4'>`;
  _COMUNES_DOTACION.cargoMandante.forEach((item) => {
    var idFamilia = _COMUNES_DOTACION.familia[0]['IDFAMILIA'];
    if (Number(item['IDFAMILIA']) == Number(idFamilia)) {
      CARGO_MANDANTE += "<option value='" + item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] + "'>" + item['CARGO_GENERICO_UNIFICADO'] + "</option>";
    }
  })
  CARGO_MANDANTE += "</select>";
  /* End - Select col 4 */

  /* Begin - Select col 5 */
  var CARGO_GENERICO_UNIFICADO_FAMILIA = `<select id='dotacion-select-col5-${IDDOTACION}' class='dotacion-select-col5'>`;
  _COMUNES_DOTACION.cargoMandante.forEach((item) => {
    var idFamilia = _COMUNES_DOTACION.familia[0]['IDFAMILIA'];
    if (Number(item['IDFAMILIA']) == Number(idFamilia)) {
      CARGO_GENERICO_UNIFICADO_FAMILIA += "<option value='" + item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] + "'>" + item['CARGO_GENERICO_UNIFICADO'] + "</option>";
    }
  })
  CARGO_GENERICO_UNIFICADO_FAMILIA += "</select>";
  /* End - Select col 5 */

  /* Begin - Text col 6 */
  var CLASIFICACION = `<span id='dotacion-text-col6-${IDDOTACION}'>` + _COMUNES_DOTACION.cargoMandante[0]['CLASIFICACION'] + "</span>";
  /* End - Text col 6 */

  /* Begin - Text col 7 */
  var REFERENCIA1 = `<select id='dotacion-select-col7-${IDDOTACION}' class='dotacion-select-col7'>`;
  _COMUNES_DOTACION.referencia1.forEach((item) => {
    REFERENCIA1 += "<option value='" + item['IDREFERENCIA1'] + "'>" + item['REFERENCIA1'] + "</option>";
  })
  REFERENCIA1 += "</select>";
  /* End - Text col 7 */

  /* Begin - Select col 8 */
  var REFERENCIA2 = `<select id='dotacion-select-col8-${IDDOTACION}' class='dotacion-select-col8'>`;
  _COMUNES_DOTACION.referencia2.forEach((item) => {
    REFERENCIA2 += "<option value='" + item['IDREFERENCIA2'] + "'>" + item['REFERENCIA2'] + "</option>";
  })
  REFERENCIA2 += "</select>";
  /* End - Select col 8 */

  var dt = {
    IDDOTACION,
    PERSONAL_OFERTADOS,
    FAMILIA,
    CARGO_MANDANTE,
    CARGO_GENERICO_UNIFICADO_FAMILIA,
    CLASIFICACION,
    REFERENCIA1,
    REFERENCIA2,
    ENERO: '',
    FEBRERO: '',
    MARZO: '',
    ABRIL: '',
    MAYO: '',
    JUNIO: '',
    JULIO: '',
    AGOSTO: '',
    SETIEMBRE: '',
    OCTUBRE: '',
    NOVIEMBRE: '',
    DICIEMBRE: '',
    IDPERSONAL_OFERTADOS: _COMUNES_DOTACION.personalOfertado[0].IDPERSONAL_OFERTADOS,
    IDFAMILIA: _COMUNES_DOTACION.familia[0].IDFAMILIA,
    IDCARGO_MANDANTE: _COMUNES_DOTACION.cargoMandante[0].IDCARGO_GENERICO_UNIFICADO_FAMILIA,
    IDCARGO_GENERICO_UNIFICADO_FAMILIA: _COMUNES_DOTACION.cargoMandante[0].IDCARGO_GENERICO_UNIFICADO_FAMILIA,
    IDREFERENCIA1: _COMUNES_DOTACION.referencia1[0].IDREFERENCIA1,
    IDREFERENCIA2: _COMUNES_DOTACION.referencia2[0].IDREFERENCIA2,
    __type: 'new',
  };

  /* Begin - Months */
  _LST_MONTHS.forEach((item, idx) => {
    dt[item] = `<input id='dotacion-input-col${idx+9}-${IDDOTACION}' class='dotacion-input onlyNumbers' style='border: none; text-align: center;'>`;
  });
  /* End - Months */

  _DATA_DOTACION.push(dt);
  _TABLE_DOTACION.DataTable().row.add(dt).draw(false);
});

$("#saveDotacion").on('click', async (e) => {
  e.stopImmediatePropagation();
  e.preventDefault();

  var dataAdd = [];
  var dataUpd = [];

  _DATA_DOTACION.forEach(({
    IDDOTACION,
    IDPERSONAL_OFERTADOS,
    IDCARGO_MANDANTE,
    IDCARGO_GENERICO_UNIFICADO_FAMILIA,
    IDREFERENCIA1, IDREFERENCIA2,
    __ENERO, __FEBRERO, __MARZO, __ABRIL, __MAYO, __JUNIO, __JULIO,
    __AGOSTO, __SETIEMBRE, __OCTUBRE, __NOVIEMBRE, __DICIEMBRE,
    __type,
  }) => {
    var aux = {
      DEFINICION_ESTRUCTURA_OPERACION: $('#selectListaLugares').val(),
      IDPERSONAL_OFERTADOS,
      IDCARGO_MANDANTE,
      IDCARGO_GENERICO_UNIFICADO_FAMILIA,
      IDREFERENCIA1, IDREFERENCIA2,
      PERIODO: {
        ANHO: $('#selectListaPeriodos').val(),
        ENERO: __ENERO, FEBRERO: __FEBRERO, MARZO: __MARZO, ABRIL: __ABRIL, MAYO: __MAYO, JUNIO: __JUNIO,
        JULIO: __JULIO, AGOSTO: __AGOSTO, SETIEMBRE: __SETIEMBRE, OCTUBRE: __OCTUBRE, NOVIEMBRE: __NOVIEMBRE,
        DICIEMBRE: __DICIEMBRE,
      }
    }
    switch (__type) {
      case 'new':
        dataAdd.push(aux);
        break;
      case 'old':
        aux.IDDOTACION = IDDOTACION;
        dataUpd.push(aux);
        break;
      default:
        break;
    }
  })

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

  await listDotacion($('#selectListaPeriodos').val(), $('#selectListaLugares').val());
})
/* *************************************** */
/* *************** DOTACION ************** */
/* *************************************** */

$("#agregarSubcontratista").unbind("click").click(async function(){
  $("#modalIngresoSubcontratista").find("input,textarea,select").val("");
  $("#rutIngresoSubcontratista").removeClass("is-invalid");
  $("#nombreIngresoSubcontratista").removeClass("is-invalid");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");

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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  setTimeout(function(){
    $("#modalAlertasSplash").modal("hide");
    $("#modalCrearEstadoProyecto").modal("show");
  },2000);
});

$("#editarEstadoProyecto").unbind("click").click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");

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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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

  $("#tituloEditarProyecto").html("<br>Identificador de centro de costo: " + folio);
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
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
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

$("#ingresarNuevoJefatura").unbind("click").click(async function(){
  $("#rutIngresarPersonalOperaciones").val('');
  $("#nombresIngresarPersonalOperaciones").val('');
  $("#apellidosIngresarPersonalOperaciones").val('');
  $("#funcionIngresarPersonalOperaciones").val('');
  $("#fonoIngresarPersonalOperaciones").val('');
  $("#emailIngresarPersonalOperaciones").val('');
  $("#esSubcontratistaIngresarPersonalOperaciones").prop("checked",false);
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#rutIngresarPersonalOperaciones").removeClass("is-invalid");
  $("#nombresIngresarPersonalOperaciones").removeClass("is-invalid");
  $("#apellidosIngresarPersonalOperaciones").removeClass("is-invalid");
  await $.ajax({
    url:   'controller/datosNivelFuncional.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoF = '';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          if((i+1) == p2.aaData.length){
            cuerpoF += '<option selected value="' + p2.aaData[i].IDNIVELFUNCIONAL + '">(' + p2.aaData[i].NUMERO + ') ' + p2.aaData[i].NIVEL + '</option>';
          }
          else{
            cuerpoF += '<option value="' + p2.aaData[i].IDNIVELFUNCIONAL + '">(' + p2.aaData[i].NUMERO + ') ' + p2.aaData[i].NIVEL + '</option>';
          }
        }
        $("#nivelIngresarPersonalOperaciones").html(cuerpoF);
      }
    }
  });
  await $.ajax({
    url:   'controller/datosSucursal.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoS = '';
      cuerpoS += '<option selected value="-1">Sin asignar</option>';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoS += '<option value="' + p2.aaData[i].IDSUCURSAL + '">' + p2.aaData[i].COMUNA + ' - ' + p2.aaData[i].SUCURSAL + '</option>';
        }
        $("#sucursalIngresarPersonalOperaciones").html(cuerpoS);
      }
      else{
        $("#sucursalIngresarPersonalOperaciones").html(cuerpoS);
      }
    }
  });
  await $.ajax({
    url:   'controller/datosPatentesAsignar.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoP = '';
      cuerpoP += '<option selected value="-1">Sin asignar</option>';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoP += '<option value="' + p2.aaData[i].IDPATENTE + '">' + p2.aaData[i].PATENTE + ' - ' + p2.aaData[i].ESTADO + '</option>';
        }
        $("#patenteIngresarPersonalOperaciones").html(cuerpoP);
      }
      else{
        $("#patenteIngresarPersonalOperaciones").html(cuerpoP);
      }
    }
  });
  await $.ajax({
    url:   'controller/datosSubcontratistasVehiculoInterno.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoE = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
        }
        $("#empresaIngresarPersonalOperaciones").html(cuerpoE);
      }
    }
  });

  await $.ajax({
    url:   'controller/datosCecoEmpresa.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCeco = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoCeco += '<option value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + '</option>';
        }
        $("#cecoIngresarPersonalOperaciones").html(cuerpoCeco);
      }
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#cecoIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#sucursalIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#patenteIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#empresaIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#nivelIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#moIngresarPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#bodyIngresarPersonalOperaciones").css("height",h);
    $('#modalAlertasSplash').modal('hide');
    $("#modalIngresarPersonalOperaciones").modal("show");
  },500);
});

$("input#rutIngresarPersonalOperaciones").rut({
  formatOn: 'blur',
  minimumLength: 8,
  validateOn: 'change'
}).on('rutInvalido', function(e) {
  if($("#rutIngresarPersonalOperaciones").val() !== ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>El RUT ingresado no es válido");
    $("#rutIngresarPersonalOperaciones").val("");
    $("#rutIngresarPersonalOperaciones").addClass("is-invalid");
  }
});

$("#empresaIngresarPersonalOperaciones").unbind("click").change(async function(e){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#modalIngresarPersonalOperaciones").modal("hide");
  e.stopImmediatePropagation();
  e.preventDefault();

  var parametros = {
    "idEmpresa": $("#empresaIngresarPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosCecoEmpresa.php',
    type:  'post',
    data: parametros,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCeco = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoCeco += '<option value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + ' | ' + p2.aaData[i].NOMBRE + ' | ' + p2.aaData[i].AREA + '</option>';
        }
        $("#cecoIngresarPersonalOperaciones").html(cuerpoCeco);
      }
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#cecoIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#sucursalIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#patenteIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#empresaIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#nivelIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#moIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  $('#modalAlertasSplash').modal('hide');
  $("#modalIngresarPersonalOperaciones").modal("show");
});

$("#servicioIngresarPersonalOperaciones").unbind("click").change(async function(e){
  e.stopImmediatePropagation();
  e.preventDefault();
  var parametrosCliente = {
    "idcontratodepto": $("#servicioIngresarPersonalOperaciones").val(),
    "idsubcontrato": $("#empresaIngresarPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosCliente.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCl = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoCl += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + '</option>';
        }
        $("#clienteIngresarPersonalOperaciones").html(cuerpoCl);
      }
    }
  })
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#clienteIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  parametrosCliente['idcliente'] = $("#clienteIngresarPersonalOperaciones").val();
  await $.ajax({
    url:   'controller/datosActividad.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoAC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoAC += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
        }
        $("#actividadIngresarPersonalOperaciones").html(cuerpoAC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#actividadIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#servicioIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
});

$("#clienteIngresarPersonalOperaciones").unbind("click").change(async function(e){
  e.stopImmediatePropagation();
  e.preventDefault();
  var parametrosCliente = {
    "idcontratodepto": $("#servicioIngresarPersonalOperaciones").val(),
    "idcliente": $("#clienteIngresarPersonalOperaciones").val(),
    "idsubcontrato": $("#empresaIngresarPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosActividad.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoAC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoAC += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
        }
        $("#actividadIngresarPersonalOperaciones").html(cuerpoAC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#actividadIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#clienteIngresarPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
});

$("#esSubcontratistaIngresarPersonalOperaciones").unbind("click").change(async function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  if($("#esSubcontratistaIngresarPersonalOperaciones").prop("checked") == true){
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculo.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        if(p2.aaData.length !== 0){
          var cuerpoE = '';
          for(var i = 0; i < p2.aaData.length; i++){
            cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
          $("#empresaIngresarPersonalOperaciones").html(cuerpoE);
        }
      }
    });
    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $("#empresaIngresarPersonalOperaciones").select2('destroy').select2({
          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
      });
    }
  }
  else{
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculoInterno.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        if(p2.aaData.length !== 0){
          var cuerpoE = '';
          for(var i = 0; i < p2.aaData.length; i++){
            cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
          $("#empresaIngresarPersonalOperaciones").html(cuerpoE);
        }
      }
    });
    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $("#empresaIngresarPersonalOperaciones").select2('destroy').select2({
          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
      });
    }
  }
});

$("#guardarIngresarPersonalOperaciones").unbind("click").click(function(){
  var rut = $("#rutIngresarPersonalOperaciones").val();
  var apellidos = $("#apellidosIngresarPersonalOperaciones").val();
  var nombres = $("#nombresIngresarPersonalOperaciones").val();
  if(rut == '' || apellidos == '' || nombres == ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe ingresar los valores obligatorios (*)");

    if(rut == ''){
      $("#rutIngresarPersonalOperaciones").addClass("is-invalid");
    }
    if(apellidos == ''){
    $("#apellidosIngresarPersonalOperaciones").addClass("is-invalid");
    }
    if(nombres == ''){
      $("#nombresIngresarPersonalOperaciones").addClass("is-invalid");
    }
  }
  else{
    $('#modalIngresarPersonalOperaciones').modal('hide');
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    var sucursal = $("#sucursalIngresarPersonalOperaciones").val();
    var funcion = $("#funcionIngresarPersonalOperaciones").val();
    var externo = 0;
    if($("#esSubcontratistaIngresarPersonalOperaciones").prop("checked") == true){
      externo = 1;
    }
    else{
      externo = 0;
    }
    var patente = $("#patenteIngresarPersonalOperaciones").val();
    var fono = $("#fonoIngresarPersonalOperaciones").val();
    var mail = $("#emailIngresarPersonalOperaciones").val();
    var empresa = $("#empresaIngresarPersonalOperaciones").val();
    var nivel = $("#nivelIngresarPersonalOperaciones").val();
    var mano = $("#moIngresarPersonalOperaciones").val();
    var idCeco = $("#cecoIngresarPersonalOperaciones").val();
    var parametros = {
      "rut": rut.replace(".","").replace(".",""),
      "rutPExterno": rut.replace(".","").replace(".",""),
      "apellidos": apellidos,
      "nombres": nombres,
      "sucursal": sucursal,
      "funcion": funcion,
      "externo": externo,
      "patente": patente,
      "fono": fono,
      "mail": mail,
      "empresa": empresa,
      "nivel": nivel,
      "mano": mano,
      "idCeco": idCeco
    }

    $.ajax({
      url:   'controller/datosChequeaPExterno.php',
      type:  'post',
      data:  parametros,
      success:  function (response) {
        var p = response.split(",");
        if(response.localeCompare("Sin datos")!= 0 && response != ""){
          if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
            alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Ya existe una persona ingresada con ese DNI");
            setTimeout(function(){
              $('#modalIngresarPersonalOperaciones').modal('show');
              $('#modalAlertasSplash').modal('hide');
            },1000);
          }
        }
        else{
          $.ajax({
            url: "controller/ingresaPersonalGestOper.php",
            type: 'POST',
            data: parametros,
            success:  function (response) {
              var p = response.split(",");
              if(response.localeCompare("Sin datos")!= 0 && response != ""){
                if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                  var table = $('#tablaJefatura').DataTable();
                  //table.rows('.selected').remove().draw();
                  table.ajax.reload();
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Personal ingresado correctamente");
                  setTimeout(function(){
                    $('#modalAlertasSplash').modal('hide');
                  },1000);
                }
                else{
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar personal, si el problema persiste favor comuniquese con soporte");
                  setTimeout(function(){
                    $('#modalIngresarPersonalOperaciones').modal('show');
                    $('#modalAlertasSplash').modal('hide');
                  },1000);
                }
              }
              else{
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar personal, si el problema persiste favor comuniquese con soporte");
                setTimeout(function(){
                  $('#modalIngresarPersonalOperaciones').modal('show');
                  $('#modalAlertasSplash').modal('hide');
                },1000);
              }
            }
          });
        }
      }
    });
  }
});

$("#rutIngresarPersonalOperaciones").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#nombresIngresarPersonalOperaciones").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#apellidosIngresarPersonalOperaciones").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#guardarEditaPersonalOperaciones").unbind("click").click(function(){
  var rut = $("#rutEditaPersonalOperaciones").val();
  var apellidos = $("#apellidosEditaPersonalOperaciones").val();
  var nombres = $("#nombresEditaPersonalOperaciones").val();
  if(rut == '' || apellidos == '' || nombres == ''){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe ingresar los valores obligatorios (*)");

    if(rut == ''){
      $("#rutEditaPersonalOperaciones").addClass("is-invalid");
    }
    if(apellidos == ''){
      $("#apellidosEditaPersonalOperaciones").addClass("is-invalid");
    }
    if(nombres == ''){
      $("#nombresEditaPersonalOperaciones").addClass("is-invalid");
    }
  }
  else{
    $('#modalEditaPersonalOperaciones').modal('hide');
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    var sucursal = $("#sucursalEditaPersonalOperaciones").val();
    var funcion = $("#funcionEditaPersonalOperaciones").val();
    var externo = 0;
    if($("#esSubcontratistaEditaPersonalOperaciones").prop("checked") == true){
      externo = 1;
    }
    else{
      externo = 0;
    }
    var patente = $("#patenteEditaPersonalOperaciones").val();
    var fono = $("#fonoEditaPersonalOperaciones").val();
    var mail = $("#emailEditaPersonalOperaciones").val();
    var empresa = $("#empresaEditaPersonalOperaciones").val();
    var nivel = $("#nivelEditaPersonalOperaciones").val();
    var mano = $("#moEditaPersonalOperaciones").val();
    var idCeco = $("#cecoEditaPersonalOperaciones").val();

    var table = $('#tablaJefatura').DataTable();
    var patAnterior = $.map(table.rows('.selected').data(), function (item) {
        return item.PATENTE;
    });

    var parametros = {
      "rut": rut.replace(".","").replace(".",""),
      "rutPExterno": rut.replace(".","").replace(".",""),
      "apellidos": apellidos,
      "nombres": nombres,
      "sucursal": sucursal,
      "funcion": funcion,
      "externo": externo,
      "patente": patente,
      "fono": fono,
      "mail": mail,
      "empresa": empresa,
      "patAnterior": patAnterior[0],
      "nivel": nivel,
      "mano": mano,
      "idCeco": idCeco
    }

    $.ajax({
      url: "controller/editarPersonalGestOper.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        var p = response.split(",");
        if(response.localeCompare("Sin datos")!= 0 && response != ""){
          if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
            var table = $('#tablaJefatura').DataTable();
            //table.rows('.selected').remove().draw();
            table.ajax.reload();
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Personal actualizado correctamente");
            $("#editarJefatura").attr("disabled","disabled");
            $("#imagenJefatura").attr("disabled","disabled");
            $("#cambiarJefatura").attr("disabled","disabled");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },1000);
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar personal, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },1000);
          }
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar personal, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
        }
      }
    });
  }
});

$("#nombresEditaPersonalOperaciones").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#apellidosEditaPersonalOperaciones").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarJefatura").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#rutEditaPersonalOperaciones").removeClass("is-invalid");
  $("#nombresEditaPersonalOperacionestPersonalOperaciones").removeClass("is-invalid");
  $("#apellidosEditaPersonalOperaciones").removeClass("is-invalid");
  var table = $('#tablaJefatura').DataTable();
  var rut = $.map(table.rows('.selected').data(), function (item) {
      return item.DNI;
  });
  var patente = $.map(table.rows('.selected').data(), function (item) {
      return item.PATENTE;
  });
  var externo = $.map(table.rows('.selected').data(), function (item) {
      return item.EXTERNO;
  });
  var empresa = $.map(table.rows('.selected').data(), function (item) {
      return item.IDEMPRESA;
  });
  var idCeco = $.map(table.rows('.selected').data(), function (item) {
      return item.IDESTRUCTURA_OPERACION;
  });
  var nombres = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRES;
  });
  var apellidos = $.map(table.rows('.selected').data(), function (item) {
      return item.APELLIDOS;
  });
  var cargo = $.map(table.rows('.selected').data(), function (item) {
      return item.CARGO;
  });
  var email = $.map(table.rows('.selected').data(), function (item) {
      return item.EMAIL;
  });
  var telefono = $.map(table.rows('.selected').data(), function (item) {
      return item.TELEFONO;
  });
  var nomen = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMENCLATURA;
  });
  var sucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.SUCURSAL;
  });
  var nivel = $.map(table.rows('.selected').data(), function (item) {
      return item.NIVEL;
  });
  var mano = $.map(table.rows('.selected').data(), function (item) {
      return item.CLASIFICACION;
  });
  var parametros = {
    "rut": rut[0]
  }

  $("#rutEditaPersonalOperaciones").val(rut[0]);
  $("#nombresEditaPersonalOperaciones").val(nombres[0]);
  $("#apellidosEditaPersonalOperaciones").val(apellidos[0]);
  $("#funcionEditaPersonalOperaciones").val(cargo[0]);
  $("#emailEditaPersonalOperaciones").val(email[0]);
  $("#fonoEditaPersonalOperaciones").val(telefono[0]);
  $("#moEditaPersonalOperaciones").val(mano[0]);

  await $.ajax({
    url:   "controller/checkImgPerfil.php?rut=" + rut[0] + "&id=" + Math.round(Math.random() * (1000000 - 1) + 1),
    type:  'get',
    success: function (response2) {
      if(response2 == 1){
        $("#imagenFichaPersonal").attr("src","controller/cargarImgPerfil.php?rut=" + rut[0] + "&id=" + Math.round(Math.random() * (1000000 - 1) + 1));
      }
      else{
        $("#imagenFichaPersonal").attr("src","view/img/no_foto.jpg");
      }
    }
  });



  await $.ajax({
    url:   'controller/datosNivelFuncional.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoF = '';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          if(nivel[0] === p2.aaData[i].NUMERO){
            cuerpoF += '<option selected value="' + p2.aaData[i].IDNIVELFUNCIONAL + '">(' + p2.aaData[i].NUMERO + ') ' + p2.aaData[i].NIVEL + '</option>';
          }
          else{
            cuerpoF += '<option value="' + p2.aaData[i].IDNIVELFUNCIONAL + '">(' + p2.aaData[i].NUMERO + ') ' + p2.aaData[i].NIVEL + '</option>';
          }
        }
        $("#nivelEditaPersonalOperaciones").html(cuerpoF);
      }
    }
  });
  await $.ajax({
    url:   'controller/datosSucursal.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoS = '';
      cuerpoS += '<option selected value="-1">Sin asignar</option>';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].SUCURSAL === sucursal[0]){
            cuerpoS += '<option selected value="' + p2.aaData[i].IDSUCURSAL + '">' + p2.aaData[i].COMUNA + ' - ' + p2.aaData[i].SUCURSAL + '</option>';
          }
          else{
            cuerpoS += '<option value="' + p2.aaData[i].IDSUCURSAL + '">' + p2.aaData[i].COMUNA + ' - ' + p2.aaData[i].SUCURSAL + '</option>';
          }
        }
        $("#sucursalEditaPersonalOperaciones").html(cuerpoS);
      }
      else{
        $("#sucursalEditaPersonalOperaciones").html(cuerpoS);
      }
    }
  });
  await $.ajax({
    url:   'controller/datosPatentesAsignar.php',
    type:  'post',
    data:  parametros,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      var cuerpoP = '';
      cuerpoP += '<option selected value="-1">Sin asignar</option>';
      if(p2.aaData.length !== 0){
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].PATENTE === patente[0]){
            cuerpoP += '<option selected value="' + p2.aaData[i].IDPATENTE + '">' + p2.aaData[i].PATENTE + ' - ' + p2.aaData[i].ESTADO + '</option>';
          }
          else{
            cuerpoP += '<option value="' + p2.aaData[i].IDPATENTE + '">' + p2.aaData[i].PATENTE + ' - ' + p2.aaData[i].ESTADO + '</option>';
          }
        }
        $("#patenteEditaPersonalOperaciones").html(cuerpoP);
      }
      else{
        $("#patenteEditaPersonalOperaciones").html(cuerpoP);
      }
    }
  });
  if(externo[0] == 1){
    $("#esSubcontratistaEditaPersonalOperaciones").prop("checked",true);
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculo.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        if(p2.aaData.length !== 0){
          var cuerpoE = '';
          for(var i = 0; i < p2.aaData.length; i++){
            if(p2.aaData[i].IDSUBCONTRATO == empresa[0]){
              cuerpoE += '<option selected value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
            }
            else{
              cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
            }
          }
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
      }
    });
  }
  else{
    $("#esSubcontratistaEditaPersonalOperaciones").prop("checked",false);
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculoInterno.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        if(p2.aaData.length !== 0){
          var cuerpoE = '';
          for(var i = 0; i < p2.aaData.length; i++){
            if(p2.aaData[i].IDSUBCONTRATO == empresa[0]){
              cuerpoE += '<option selected value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
            }
            else{
              cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
            }
          }
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
      }
    });
  }

  await $.ajax({
    url:   'controller/datosCecoEmpresa.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCeco = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].IDESTRUCTURA_OPERACION == idCeco[0]){
            cuerpoCeco += '<option selected value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + '</option>';
          }
          else{
            cuerpoCeco += '<option value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + '</option>';
          }
        }
        $("#cecoEditaPersonalOperaciones").html(cuerpoCeco);
      }
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#cecoEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#sucursalEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#patenteEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#empresaEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#nivelEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#moEditaPersonalOperaciones").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#bodyEditaPersonalOperaciones").css("height",h);
    $('#modalAlertasSplash').modal('hide');
    $("#modalEditaPersonalOperaciones").modal("show");
  },500);
});

$("#servicioEditaPersonalOperaciones").unbind("click").change(async function(e){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#modalEditaPersonalOperaciones").modal("hide");
  e.stopImmediatePropagation();
  e.preventDefault();
  var parametrosCliente = {
    "idcontratodepto": $("#servicioEditaPersonalOperaciones").val(),
    "idsubcontrato": $("#empresaEditaPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosCliente.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCl = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoCl += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + '</option>';
        }
        $("#clienteEditaPersonalOperaciones").html(cuerpoCl);
      }
    }
  })
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#clienteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  parametrosCliente['idcliente'] = $("#clienteEditaPersonalOperaciones").val();
  await $.ajax({
    url:   'controller/datosActividad.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoAC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoAC += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
        }
        $("#actividadEditaPersonalOperaciones").html(cuerpoAC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#actividadEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#servicioEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  $('#modalAlertasSplash').modal('hide');
  $("#modalEditaPersonalOperaciones").modal("show");
});

$("#clienteEditaPersonalOperaciones").unbind("click").change(async function(e){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#modalEditaPersonalOperaciones").modal("hide");
  e.stopImmediatePropagation();
  e.preventDefault();
  var parametrosCliente = {
    "idcontratodepto": $("#servicioEditaPersonalOperaciones").val(),
    "idcliente": $("#clienteEditaPersonalOperaciones").val(),
    "idsubcontrato": $("#empresaEditaPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosActividad.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoAC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoAC += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
        }
        $("#actividadEditaPersonalOperaciones").html(cuerpoAC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#actividadEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#clienteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  $('#modalAlertasSplash').modal('hide');
  $("#modalEditaPersonalOperaciones").modal("show");
});

$("#empresaEditaPersonalOperaciones").unbind("click").change(async function(e){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#modalEditaPersonalOperaciones").modal("hide");
  e.stopImmediatePropagation();
  e.preventDefault();
  var table = $('#tablaJefatura').DataTable();
  var rut = $.map(table.rows('.selected').data(), function (item) {
      return item.DNI;
  });
  var patente = $.map(table.rows('.selected').data(), function (item) {
      return item.PATENTE;
  });
  var externo = $.map(table.rows('.selected').data(), function (item) {
      return item.EXTERNO;
  });
  var idCeco = $.map(table.rows('.selected').data(), function (item) {
      return item.IDESTRUCTURA_OPERACION;
  });
  var empresa = $.map(table.rows('.selected').data(), function (item) {
      return item.EMPRESA;
  });
  var nombres = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRES;
  });
  var apellidos = $.map(table.rows('.selected').data(), function (item) {
      return item.APELLIDOS;
  });
  var cargo = $.map(table.rows('.selected').data(), function (item) {
      return item.CARGO;
  });
  var email = $.map(table.rows('.selected').data(), function (item) {
      return item.EMAIL;
  });
  var telefono = $.map(table.rows('.selected').data(), function (item) {
      return item.TELEFONO;
  });
  var nomen = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMENCLATURA;
  });
  var sucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.SUCURSAL;
  });
  var nivel = $.map(table.rows('.selected').data(), function (item) {
      return item.NIVEL;
  });
  var mano = $.map(table.rows('.selected').data(), function (item) {
      return item.CLASIFICACION;
  });

  var parametros = {
    "idEmpresa": $("#empresaEditaPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosCecoEmpresa.php',
    type:  'post',
    data: parametros,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCeco = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].IDESTRUCTURA_OPERACION == idCeco[0]){
            cuerpoCeco += '<option selected value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + ' | ' + p2.aaData[i].NOMBRE + ' | ' + p2.aaData[i].AREA + '</option>';
          }
          else{
            cuerpoCeco += '<option value="' + p2.aaData[i].IDESTRUCTURA_OPERACION + '">' + p2.aaData[i].NOMENCLATURA + ' | ' + p2.aaData[i].NOMBRE + ' | ' + p2.aaData[i].AREA + '</option>';
          }
        }
        $("#cecoEditaPersonalOperaciones").html(cuerpoCeco);
      }
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#cecoEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#sucursalEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#patenteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#empresaEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#servicioEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#clienteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#actividadEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#nivelEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#moEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  setTimeout(function(){
    $('#modalAlertasSplash').modal('hide');
    $("#modalEditaPersonalOperaciones").modal("show");
  },500);
});

$("#esSubcontratistaEditaPersonalOperaciones").unbind("click").change(async function(e){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#modalEditaPersonalOperaciones").modal("hide");
  e.stopImmediatePropagation();
  e.preventDefault();

  var table = $('#tablaJefatura').DataTable();
  var rut = $.map(table.rows('.selected').data(), function (item) {
      return item.DNI;
  });
  var patente = $.map(table.rows('.selected').data(), function (item) {
      return item.PATENTE;
  });
  var externo = $.map(table.rows('.selected').data(), function (item) {
      return item.EXTERNO;
  });
  var empresa = $.map(table.rows('.selected').data(), function (item) {
      return item.EMPRESA;
  });
  var nombres = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRES;
  });
  var apellidos = $.map(table.rows('.selected').data(), function (item) {
      return item.APELLIDOS;
  });
  var cargo = $.map(table.rows('.selected').data(), function (item) {
      return item.CARGO;
  });
  var email = $.map(table.rows('.selected').data(), function (item) {
      return item.EMAIL;
  });
  var telefono = $.map(table.rows('.selected').data(), function (item) {
      return item.TELEFONO;
  });
  var servicio = $.map(table.rows('.selected').data(), function (item) {
      return item.SERVICIO;
  });
  var cliente = $.map(table.rows('.selected').data(), function (item) {
      return item.CLIENTE;
  });
  var actividad = $.map(table.rows('.selected').data(), function (item) {
      return item.ACTIVIDAD;
  });
  var nomen = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMENCLATURA;
  });
  var sucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.SUCURSAL;
  });
  var nivel = $.map(table.rows('.selected').data(), function (item) {
      return item.NIVEL;
  });
  var mano = $.map(table.rows('.selected').data(), function (item) {
      return item.CLASIFICACION;
  });
  var parametros = {
    "rut": rut[0]
  }

  if($("#esSubcontratistaEditaPersonalOperaciones").prop("checked") == true){
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculo.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        var cuerpoE = '';
        if(p2.aaData.length !== 0){
          for(var i = 0; i < p2.aaData.length; i++){
            cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
        else{
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
      }
    });
    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $("#empresaEditaPersonalOperaciones").select2('destroy').select2({
          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
      });
    }
  }
  else{
    await $.ajax({
      url:   'controller/datosSubcontratistasVehiculoInterno.php',
      type:  'post',
      success: function (response2) {
        var p2 = jQuery.parseJSON(response2);
        var cuerpoE = '';
        if(p2.aaData.length !== 0){
          for(var i = 0; i < p2.aaData.length; i++){
            cuerpoE += '<option value="' + p2.aaData[i].IDSUBCONTRATO + '">' + p2.aaData[i].NOMBRE_SUBCONTRATO + '</option>';
          }
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
        else{
          $("#empresaEditaPersonalOperaciones").html(cuerpoE);
        }
      }
    });
    if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $("#empresaEditaPersonalOperaciones").select2('destroy').select2({
          theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
      });
    }
  }

  var parametrosCliente = {
    "idsubcontrato": $("#empresaEditaPersonalOperaciones").val()
  }
  await $.ajax({
    url:   'controller/datosContratoDepto.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCo = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].SERVICIO == servicio[0]){
            cuerpoCo += '<option selected value="' + p2.aaData[i].IDSERVICIO + '">' + p2.aaData[i].SERVICIO + '</option>';
          }
          else{
            cuerpoCo += '<option value="' + p2.aaData[i].IDSERVICIO + '">' + p2.aaData[i].SERVICIO + '</option>';
          }
        }
        $("#servicioEditaPersonalOperaciones").html(cuerpoCo);
      }
    }
  });
  parametrosCliente['idcontratodepto'] = $("#servicioEditaPersonalOperaciones").val();
  await $.ajax({
    url:   'controller/datosCliente.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoCl = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].CLIENTE == cliente[0]){
            cuerpoCl += '<option selected value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + '</option>';
          }
          else{
            cuerpoCl += '<option value="' + p2.aaData[i].IDCLIENTE + '">' + p2.aaData[i].CLIENTE + '</option>';
          }
        }
        $("#clienteEditaPersonalOperaciones").html(cuerpoCl);
      }
    }
  });
  parametrosCliente['idcliente'] = $("#clienteEditaPersonalOperaciones").val();
  await $.ajax({
    url:   'controller/datosActividad.php',
    type:  'post',
    data: parametrosCliente,
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoAC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].ACTIVIDAD == (actividad[0] + " / " + nomen[0])){
            cuerpoAC += '<option selected value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
          }
          else{
            cuerpoAC += '<option value="' + p2.aaData[i].IDACTIVIDAD + '">' + p2.aaData[i].ACTIVIDAD + '</option>';
          }
        }
        $("#actividadEditaPersonalOperaciones").html(cuerpoAC);
      }
    }
  });

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#sucursalEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#patenteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#empresaEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#servicioEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#clienteEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#actividadEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#nivelEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#moEditaPersonalOperaciones").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  $('#modalAlertasSplash').modal('hide');
  $("#modalEditaPersonalOperaciones").modal("show");
});

$("#imagenJefatura").unbind("click").click(function(){
  var table = $('#tablaJefatura').DataTable();
  var dni = $.map(table.rows('.selected').data(), function (item) {
      return item.DNI;
  });
  var nombres = $.map(table.rows('.selected').data(), function (item) {
      return item.NOMBRES;
  });
  var apellidos = $.map(table.rows('.selected').data(), function (item) {
      return item.APELLIDOS;
  });

  $("#tituloCargarImgPersonal").html('&squf;&nbsp;&nbsp;' + nombres + ' ' + apellidos + ' - ' + dni);

  $("#fotoCargarImgPersonal").val('');
  $("#inputFotoCargarImgPersonal").val('');
  $("#inputFotoCargarImgPersonal").removeClass("is-invalid");
  $("#modalCargaImgPersonal").modal("show");
});

$("#guardarCargarImgPersonal").unbind("click").click(function(){
  if($("#inputFotoCargarImgPersonal").val() === ''){
    $("#inputFotoCargarImgPersonal").addClass("is-invalid");
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No se ha cargado ninguna fotografia");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalCargaImgPersonal").modal("hide");
    var table = $('#tablaJefatura').DataTable();
    var dni = $.map(table.rows('.selected').data(), function (item) {
        return item.DNI;
    });
    var id = $.map(table.rows('.selected').data(), function (item) {
        return item.IDPERSONAL;
    });

    var formdata = new FormData();
    formdata.append('dni',dni);
    formdata.append('id',id);
    formdata.append('foto',$("#fotoCargarImgPersonal")[0].files[0]);

    $.ajax({
      url: "controller/ingresaPersonalFoto.php",
      type: 'POST',
      data: formdata,
      cache: false,
      contentType: false,
      processData: false,
      success: async function (response) {
        var p = response.split(",");
        if(response.localeCompare("Sin datos")!= 0 && response != ""){
          if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
            var table = $('#tablaJefatura').DataTable();
            table.ajax.reload();
            // var rows = table.rows( '.selected' ).remove().draw();
            // var p2 = jQuery.parseJSON(response);
            // await ingresaModificacionJefatura(p2);
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },1000);
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Fotografia cargada correctamente");
          }
          else{
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al cargar la fotografia usuario, si el problema persiste favor comuniquese con soporte");
            setTimeout(function(){
              $('#modalAlertasSplash').modal('hide');
            },1000);
          }
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al cargar la fotografia usuario, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
        }
      }
    });
  }
});

$("#rutIngresoUsuario").unbind("click").change(async function(e){
  e.stopImmediatePropagation();
  e.preventDefault();
  parametros = {
    "rut": $("#rutIngresoUsuario").val().replace(".","").replace(".","")
  }
  await $.ajax({
    url:   'controller/datosPersonalUsuarioSeleccionado.php',
    type:  'post',
    data: parametros,
    success: function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData.length !== 0){
        $("#nombresIngresoUsuario").val(p.aaData[0].NOMBRES);
        $("#apellidosIngresoUsuario").val(p.aaData[0].APELLIDOS);
      }
    }
  });
});

$("#fotoCargarImgPersonal" ).on('change', function(e){
  var file = e.target.files[0].name;
  $("#inputFotoCargarImgPersonal").val(file);
  $("#inputFotoCargarImgPersonal").removeClass("is-invalid");
});

$("#cambiarJefatura").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  await $.ajax({
    url:   'controller/datosJefes.php',
    type:  'get',
    success: function (jefes) {
      var jf = jQuery.parseJSON(jefes);
      if(jf.aaData.length !== 0){
        var cuerpoJF = '';
        for(var i = 0; i < jf.aaData.length; i++) {
          cuerpoJF += '<option id="' + jf.aaData[i].EMAIL + '" value="' + jf.aaData[i].RUTJEFEDIRECTO + '">' + jf.aaData[i].RUTJEFEDIRECTO + ' - ' + jf.aaData[i].JEFE + '</option>';
        }
        $("#selectJefes").html(cuerpoJF);
        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          $("#selectJefes").select2({
            theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
          });
        }
      }
    }
  });

  setTimeout(function(){
    var h = $(window).height() - 200;
    // $("#bodyIngresoPersonalInterno").css("height",h);
    $("#modalCambiarJefatura").modal("show");
    $("#modalCambiarJefatura").css("z-index", "1050");
    $('#modalAlertasSplash').modal('hide');
    // setTimeout(function(){
    //  $('#bodyIngresoPersonalInterno').animate({ scrollTop: 0 }, 'fast');
    // }, 200);
  }, 500);
});

$("#guardarCambiarJefatura").unbind('click').click(async function() {
  $("#modalCambiarJefatura").modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $("#tablaJefatura").DataTable();
  var datos = table.rows('.selected').data();

  var jsonExJefes = {};
  var strlstPersonal = { nombres: [], ids: [] };
  for(var i = 0; i < datos.length; i++) {
    if(datos[i].CONTACTO) jsonExJefes[datos[i].CONTACTO] = `${jsonExJefes[datos[i].CONTACTO] ?? ''} <br />${datos[i].NOMBRES}, ${datos[i].APELLIDOS}`;
    strlstPersonal['ids'] = `${strlstPersonal['ids']}, '${datos[i].IDPERSONAL}'`;
    strlstPersonal['nombres'] = `${strlstPersonal['nombres']} <br />${datos[i].NOMBRES}, ${datos[i].APELLIDOS}`;
  }
  strlstPersonal['ids'] = strlstPersonal['ids'].substring(1);
  strlstPersonal['nombres'] = strlstPersonal['nombres'].substring(1);

  var nombreNuevoJefe = $("#selectJefes option:selected").html().split(' - ')[1];
  var emailNuevoJefe = $("#selectJefes option:selected").attr("id");
  var rutNuevoJefe = $("#selectJefes option:selected").val();

  await $.ajax({
    url:   'controller/editarJefatura.php',
    type:  'POST',
    data:  {
      "rutNuevoJefe": rutNuevoJefe,
      "strlstPersonal": strlstPersonal
    },
    success: async function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaJefatura').DataTable();
          table.ajax.reload();
          setTimeout(function(){
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Jefaturas cambiadas correctamente");
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          setTimeout(function(){
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al cambiar las jefaturas, si el problema persiste favor comuniquese con soporte");
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        setTimeout(function(){
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al cambiar las jefaturas, si el problema persiste favor comuniquese con soporte");
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    },
  });

  await $.ajax({
    url:   'controller/editarJefaturaNotify.php',
    type:  'POST',
    data:  {
      "nombreNuevoJefe": nombreNuevoJefe,
      "emailNuevoJefe": emailNuevoJefe,
      "strlstPersonal": strlstPersonal,
      "lstExJefes": Object.entries(jsonExJefes)
    },
    complete: async function(){
    }
  });
});

// FUNCION PARA MODAL INGRESAR SUCURSAL
$("#agregarSucursal").unbind("click").click(async function(){
  $("#modalIngresoSucursal").find("input,textarea,select").val("");
  $("#sucursalIngresoSucursal").removeClass("is-invalid");
  $("#bodegaIngresoSucursal").html('<option value="SI">SI</option>,<option value="NO">NO</option>');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  // Funcion para desplegar selector de Comuna desde BD
  await $.ajax({
    url:   'controller/datosAreaFuncional.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoEC += '<option value="' + p2.aaData[i].IDAREAFUNCIONAL + '">' + p2.aaData[i].COMUNA + '</option>';
        }
        $("#comunaIngresoSucursal").html(cuerpoEC);
        setTimeout(function(){
          $("#modalIngresoSucursal").modal("show");
          $('#modalAlertasSplash').modal('hide');
          setTimeout(function(){
            $('#bodyIngresoSucursal').animate({ scrollTop: 0 }, 'fast');
          },200);
        },500);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#comunaIngresoSucursal").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#bodegaIngresoSucursal").select2({
      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
});

// Funcion para el evento del boton guardaSucursal del modal
$("#guardarIngresoSucursal").unbind('click').click(function(){
  if($("#sucursalIngresoSucursal").val().length == 0){
    alertasToast("Debe completar todos los campos");
    if ($("#sucursalIngresoSucursal").val().length == 0){
      $("#sucursalIngresoSucursal").addClass("is-invalid");
    }
  }
  else {
  $("#modalIngresoSucursal").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  parametros = {
    "sucursalIngreso": $("#sucursalIngresoSucursal").val(),
    "comuna":  $("#comunaIngresoSucursal").val(),
    "bodega": $("#bodegaIngresoSucursal").val()
  }

  $.ajax({
    url:   'controller/datosChequeaSucursal.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          alertasToast("La Sucursal ya existe");
          $("#sucursalIngresoSucursal").addClass("is-invalid");
          setTimeout(function(){
            $('#modalIngresoSucursal').modal('show');
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      // Ingrasamos la sucursal despues de verificar
      else {
        $.ajax({
          url: "controller/ingresaSucursal.php",
          type: 'POST',
          data: parametros,
          success:  function (response) {
            var p = response.split(",");
            if(response.localeCompare("Sin datos")!= 0 && response != ""){
              if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
                var table = $('#tablaListadoSucursal').DataTable();
                table.ajax.reload();
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Sucursal Creado correctamente");
                $("#editarSucursal").attr("disabled","disabled");
                $("#eliminarSucursal").attr("disabled","disabled");
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                },500);
              }
              else{
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear Sucursal, si el problema persiste favor comuniquese con soporte");
                setTimeout(function(){
                  $('#modalAlertasSplash').modal('hide');
                },500);
              }
            }
            else{
              setTimeout(function(){
                $('#modalAlertasSplash').modal('hide');
              },500);
              var random = Math.round(Math.random() * (1000000 - 1) + 1);
              alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al crear Sucursal, si el problema persiste favor comuniquese con soporte");
            }
          }
        });
      }
    }
  });
}
});

$("#sucursalIngresoSucursal").on('input', function(){   // Removemos el is-invalid que se activo por dejar campo en blanco
  $(this).removeClass("is-invalid");
});
// FIN FUNCION PARA MODAL INGRESAR SUCURSAL

// FUNCION PARA MODAL EDITAR SUCURSAL
$("#editarSucursal").unbind('click').click( async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoSucursal').DataTable();
  var sucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.SUCURSAL;
  });
  var bodega = $.map(table.rows('.selected').data(), function (item) {
    return item.BODEGA_FLOTA;
  });
  var comuna = $.map(table.rows('.selected').data(), function (item) {
    return item.COMUNA;
  });

  await $.ajax({
    url:   'controller/datosAreaFuncional.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(p2.aaData[i].COMUNA == comuna){
            cuerpoEC += '<option selected value="' + p2.aaData[i].IDAREAFUNCIONAL + '">' + p2.aaData[i].COMUNA + '</option>';
            $("#comunaEditarSucursal").html(cuerpoEC);
          }
          else{
            cuerpoEC += '<option value="' + p2.aaData[i].IDAREAFUNCIONAL + '">' + p2.aaData[i].COMUNA + '</option>';
          }
        }
        $("#comunaEditarSucursal").html(cuerpoEC);
      }
    }
  });
  $("#sucursalEditarSucursal").val(sucursal);
  if (bodega[0] == "SI"){
    $("#bodegaEditarSucursal").html('<option value="SI">SI</option>,<option value="NO">NO</option>');
  }
  else {
    $("#bodegaEditarSucursal").html('<option value="NO">NO</option>,<option value="SI">SI</option>');
  }
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#comunaEditarSucursal").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#bodegaEditarSucursal").select2({
      theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  setTimeout(function(){
    $('#modalEditarSucursal').modal('show');
    $('#modalAlertasSplash').modal('hide');
  },500);
});

// Funcion para guardar editar Sucursal
$("#guardarEditarSucursal").unbind('click').click(function(){
  var table = $('#tablaListadoSucursal').DataTable();
  var idSucursal = $.map(table.rows('.selected').data(), function (item) {
    return item.IDSUCURSAL;
  });
  parametros = {
    "idSucursal": idSucursal[0],
    "sucursal":  $("#sucursalEditarSucursal").val(),
    "comuna": $("#comunaEditarSucursal").val(),
    "bodega": $("#bodegaEditarSucursal").val()
  }
  $("#modalEditarSucursal").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $.ajax({
    url: "controller/editarSucursal.php",
    type: 'POST',
    data: parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoSucursal').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Sucursal Editado correctamente");
          $("#editarSucursal").attr("disabled","disabled");
          $("#eliminarSucursal").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar Sucursal, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar Sucursal, si el problema persiste favor comuniquese con soporte");
      }
    }
  });
});
// FIN FUNCION PARA MODAL EDITAR SUCURSAL

// FUNCION PARA MODAL DESACTIVAR SUCURSAL
$("#eliminarSucursal").unbind('click').click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoSucursal').DataTable();
  var sucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.SUCURSAL;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
    return item.ESTADO;
  });
  var idSucursal = $.map(table.rows('.selected').data(), function (item) {
    return item.IDSUCURSAL;
  });
  // Verificamos que la sucursal no este siendo usada por un personal
  parametros = {
    "idSucursal": idSucursal[0]
  }
  $.ajax({
    url:   'controller/sucursalPersonal.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Sucursal no se puede eliminar ya que tiene datos asociados (personal, patente u otros)");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else {
        if ((estado[0] == "Desactivado")){
          $("#textoNewEstadoSucursal").html("Activar");
          $("#tituloDesactivarSucursal").html("Activar Sucursal");
        }
        else {
          $("#textoNewEstadoSucursal").html("Desactivar");
          $("#tituloDesactivarSucursal").html("Desactivar Sucursal");
        }
        $("#textoDesactivarSucursal").html(sucursal);
        setTimeout(function(){
          $('#modalDesactivarSucursal').modal('show');
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});

$("#guardarDesactivarSucursal").unbind('click').click(async function(){
  $("#modalDesactivarSucursal").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $('#tablaListadoSucursal').DataTable();
  var idSucursal = $.map(table.rows('.selected').data(), function (item) {
      return item.IDSUCURSAL;
  });
  var estado = $.map(table.rows('.selected').data(), function (item) {
    return item.ESTADO;
  });
  parametros = {
    "idSucursal": idSucursal[0],
    "estado": estado[0]
  }
  await $.ajax({
    url:   'controller/desactivarSucursal.php',
    type:  'post',
    data:  parametros,
    success:  function (response) {
      var p = response.split(",");
      if(response.localeCompare("Sin datos")!= 0 && response != ""){
        if(p[0].localeCompare("Sin datos") != 0 && p[0] != ""){
          var table = $('#tablaListadoSucursal').DataTable();
          table.ajax.reload()
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          if (estado[0] == "Activo"){
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Sucursal Desactivado correctamente");
          }
          else {
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Sucursal Activado correctamente");
          }
          $("#editarSucursal").attr("disabled","disabled");
          $("#eliminarSucursal").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al desactivar la Sucursal, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },500);
        }
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al desactivar la Sucursal, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
      }
    }
  });
});
// FIN FUNCION PARA MODAL DESACTIVAR SUCURSAL

$("#agregarAreaFuncional").unbind('click').click(async function(){
  $("#modalAgregarAreaFuncional").find("input,textarea,select").val("");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  await $.ajax({
    url:   'controller/datosListadoPaises.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          cuerpoEC += '<option value="' + p2.aaData[i].IDPAIS + '">' + p2.aaData[i].NOMBRE + '</option>';
        }
        $("#paisAgregarAreaFuncional").html(cuerpoEC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#paisAgregarAreaFuncional").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  setTimeout(async function(){
    $("#modalAgregarAreaFuncional").modal('show');
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarAgregarAreaFuncional").unbind('click').click(async function(){
  if($.trim($("#comunaAgregarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#comunaAgregarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#provinciaAgregarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#provinciaAgregarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#regionAgregarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#regionAgregarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#codigoAgregarPostalAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#codigoAgregarPostalAreaFuncional").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalAgregarAreaFuncional").modal("hide");
    parametros = {
      "comuna": $("#comunaAgregarAreaFuncional").val(),
      "provincia": $("#provinciaAgregarAreaFuncional").val(),
      "region": $("#regionAgregarAreaFuncional").val(),
      "codigoPostal": $("#codigoAgregarPostalAreaFuncional").val(),
      "idPais": $("#paisAgregarAreaFuncional").val()
    }

    await $.ajax({
      url: "controller/ingresaAreaFuncional.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        if(response.localeCompare("Sin datos") != 0 && response != ""){
          $('#modalAlertasSplash').modal('hide');
          var table = $('#tablaAreaFuncional').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Comuna agregada correctamente");
          //$("#editarArea").attr("disabled","disabled");
          }
        else{
          $('#modalAlertasSplash').modal('hide');
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>La comuna ingresada ya existe en sistema");
        }
      }
    });
  }
});

$("#comunaAgregarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#provinciaAgregarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#regionAgregarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#codigoAgregarPostalAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarAreaFuncional").unbind('click').click(async function(){
  var table = $('#tablaAreaFuncional').DataTable();
  var datos = table.rows('.selected').data();
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  $("#comunaEditarAreaFuncional").val(datos[0].COMUNA);
  $("#provinciaEditarAreaFuncional").val(datos[0].PROVINCIA);
  $("#regionEditarAreaFuncional").val(datos[0].REGION);
  $("#codigoEditarPostalAreaFuncional").val(datos[0].CODIGOPOSTAL);
  $("#estadoEditarPostalAreaFuncional").val(datos[0].ESTADO);

  await $.ajax({
    url:   'controller/datosListadoPaises.php',
    type:  'post',
    success: function (response2) {
      var p2 = jQuery.parseJSON(response2);
      if(p2.aaData.length !== 0){
        var cuerpoEC = '';
        for(var i = 0; i < p2.aaData.length; i++){
          if(datos[0].PAIS === p2.aaData[i].NOMBRE){
            cuerpoEC += '<option selected value="' + p2.aaData[i].IDPAIS + '">' + p2.aaData[i].NOMBRE + '</option>';
          }
          else{
            cuerpoEC += '<option value="' + p2.aaData[i].IDPAIS + '">' + p2.aaData[i].NOMBRE + '</option>';
          }
        }
        $("#paisEditarAreaFuncional").html(cuerpoEC);
      }
    }
  });
  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#paisEditarAreaFuncional").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
    $("#estadoEditarAreaFuncional").select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }
  setTimeout(async function(){
    $("#modalEditarAreaFuncional").modal('show');
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarEditarAreaFuncional").unbind('click').click(async function(){
  var table = $('#tablaAreaFuncional').DataTable();
  var datos = table.rows('.selected').data();
  if($.trim($("#comunaEditarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#comunaEditarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#provinciaEditarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#provinciaEditarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#regionEditarAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#regionEditarAreaFuncional").addClass("is-invalid");
  }
  else if($.trim($("#codigoEditarPostalAreaFuncional").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#codigoEditarPostalAreaFuncional").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalEditarAreaFuncional").modal("hide");
    parametros = {
      "comuna": $("#comunaEditarAreaFuncional").val(),
      "provincia": $("#provinciaEditarAreaFuncional").val(),
      "region": $("#regionEditarAreaFuncional").val(),
      "codigoPostal": $("#codigoEditarPostalAreaFuncional").val(),
      "idPais": $("#paisEditarAreaFuncional").val(),
      "estado": $("#estadoEditarAreaFuncional").val(),
      "idAreaFuncional": datos[0].IDAREAFUNCIONAL
    }

    await $.ajax({
      url: "controller/editarAreaFuncional.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        if(response.localeCompare("Sin datos") != 0 && response != ""){
          var table = $('#tablaAreaFuncional').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Área Funcional editada correctamente");
          $("#editarAreaFuncional").attr("disabled","disabled");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
          }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar Área Funcional");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
        }
      }
    });
  }
});

$("#comunaEditarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#provinciaEditarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#regionEditarAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#codigoEditarPostalAreaFuncional").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#agregarPais").unbind('click').click(function(){
  $("#modalAgregarPais").find("input,textarea,select").val("");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  setTimeout(async function(){
    $("#modalAgregarPais").modal('show');
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarAgregarPais").unbind('click').click(async function(){
  if($.trim($("#abreviaturaAgregarPais").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#abreviaturaAgregarPais").addClass("is-invalid");
  }
  else if($.trim($("#nombreAgregarPais").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#nombreAgregarPais").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalAgregarPais").modal("hide");
    parametros = {
      "abreviaturaPais": $("#abreviaturaAgregarPais").val(),
      "nombrePais": $("#nombreAgregarPais").val()
    }

    await $.ajax({
      url: "controller/ingresaPais.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        if(response.localeCompare("Sin datos") != 0 && response != ""){
          $('#modalAlertasSplash').modal('hide');
          var table = $('#tablaMantenedorPaises').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>País agregado correctamente");
          $("#editarPais").attr("disabled","disabled");
          }
        else{
          $('#modalAlertasSplash').modal('hide');
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al agregar País");
        }
      }
    });
  }
});

$("#abreviaturaAgregarPais").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#nombreAgregarPais").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#editarPais").unbind('click').click(function(){
  var table = $('#tablaMantenedorPaises').DataTable();
  var datos = table.rows('.selected').data();
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  $("#abreviaturaEditarPais").val(datos[0].ABREVIATURA);
  $("#nombreEditarPais").val(datos[0].NOMBRE);
  setTimeout(async function(){
    $("#modalEditarPais").modal('show');
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#guardarEditarPais").unbind('click').click(async function(){
  var table = $('#tablaMantenedorPaises').DataTable();
  var datos = table.rows('.selected').data();
  if($.trim($("#abreviaturaEditarPais").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#abreviaturaEditarPais").addClass("is-invalid");
  }
  else if($.trim($("#nombreEditarPais").val()) === ""){
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar todos los campos en rojo");
    $("#nombreEditarPais").addClass("is-invalid");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalEditarPais").modal("hide");
    parametros = {
      "abreviaturaPais": $("#abreviaturaEditarPais").val(),
      "nombrePais": $("#nombreEditarPais").val(),
      "idPais": datos[0].IDPAIS
    }

    await $.ajax({
      url: "controller/editarPais.php",
      type: 'POST',
      data: parametros,
      success:  function (response) {
        if(response.localeCompare("Sin datos") != 0 && response != ""){
          $('#modalAlertasSplash').modal('hide');
          var table = $('#tablaMantenedorPaises').DataTable();
          table.ajax.reload();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>País editado correctamente");
          $("#editarPais").attr("disabled","disabled");
          }
        else{
          $('#modalAlertasSplash').modal('hide');
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al editar País");
        }
      }
    });
  }
});

$("#abreviaturaEditarPais").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#nombreEditarPais").on('input', function(){
  $(this).removeClass("is-invalid");
});

$("#disponiblePersonal").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $("#tablaPersonal").DataTable()
  var datos = table.rows('.selected').data();
  var parametros = [];
  if(table.rows('.selected').data().length > 0){
    var continua = 'NO';
    for(var i = 0; i < datos.length; i++){
      if(datos[i].ESTADO_CONTROL2 === 'Sin marca'){
        parametros.push(datos[i].DNI);
        continua = 'SI';
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Ha seleccionado personal con disponibilidad ya indicada");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },2000);
        continua = 'NO';
        break;
      }
    }
    if(continua === 'SI'){
      setTimeout(function(){
        $('#modalAlertasSplash').modal('hide');
        $("#modalDisponibilidad").modal("show");
      },500);
    }
  }
});

$("#guardarDisponibilidad").unbind("click").click(async function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  $("#modalDisponibilidad").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  //initialize the plugin and get its instance
  var instance = OverlayScrollbars(document.getElementById('contenido'), { });

  //destroy the instance
  instance.destroy();

  var table = $('#infoInformePersonal').DataTable().clear().draw();

  var induccion = 0;
  var teletrabajo = 0;
  if($("#induccionDisponibilidad").prop("checked") == true){
    induccion = 1;
  }
  else{
    induccion = 0;
  }
  if($("#teletrabajoDisponibilidad").prop("checked") == true){
    teletrabajo = 1;
  }
  else{
    teletrabajo = 0;
  }

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var parametros = [];
  parametros.push(induccion);
  parametros.push(teletrabajo);
  for(var i = 0; i < datos.length; i++){
      parametros.push(datos[i].DNI);
  }

  await $.ajax({
    url:   'controller/ingresaDisponibilidad.php',
    type:  'post',
    data:  {array : parametros},
    success: async function (response) {
      var p = jQuery.parseJSON(response);
      if(p.aaData.length !== 0){
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Disponibilidad ingresada correctamente");
        var table = $('#tablaPersonal').DataTable();
        var rows = table.rows( '.selected' ).remove().draw();
        await ingresaModificacionPersonal(p);
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
        $("#disponiblePersonal").attr("disabled","disabled");
        $("#ausentePersonal").attr("disabled","disabled");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },1000);
      }
      else{
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar la disponibilidad, si el problema persiste favor comuniquese con soporte");
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },1000);
      }
    }
  });

  var table = $("#tablaPersonal").DataTable();
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
  var directos = table
      .column(24, {search: 'applied'})
      .data()
      .filter( function ( value, index ) {
          return value == $("#nombreUsuarioPersonal").val() ? true : false;
  });

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
    "initComplete": function( settings, json){
      $(this.api().column(1).footer()).html(total.count());
    }
  });
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


  $("#qDirectos").html(directos.count());
  $("#qOtros").html(total.count() - directos.count());

  menuElegant();
});

$("#ausentePersonal").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $("#tablaPersonal").DataTable()
  var datos = table.rows('.selected').data();
  var parametros = [];
  if(table.rows('.selected').data().length > 0){
    var continua = 'NO';
    for(var i = 0; i < datos.length; i++){
      if(datos[i].ESTADO_CONTROL2 === 'Sin marca'){
        parametros.push(datos[i].DNI);
        continua = 'SI';
      }
      else{
        setTimeout(function(){
          $('#modalAlertasSplash').modal('hide');
        },500);
        var random = Math.round(Math.random() * (1000000 - 1) + 1);
        alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Ha seleccionado personal con disponibilidad ya indicada");
        continua = 'NO';
        break;
      }
    }
    if(continua === 'SI'){
      setTimeout(async function(){
        var table = $('#tablaPersonal').DataTable();
        var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
            return item.DNI;
        });
        var nombre = $.map(table.rows('.selected').data(), function (item) {
            return item.NOMBRE;
        });
        $("#tituloAusencia").html(rutUsuario[0] + ' , ' +nombre[0]);

        var min = new Date();
        $("#fechaInicioAusencia").datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          minDate: min,
          maxDate: min,
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

        $("#fechaFinAusencia").datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          minDate: min,
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

        var y = moment().format('YYYY-MM-DD');
        $("#fechaInicioAusencia").attr("disabled","disabled");
        $("#fechaInicioAusencia").val(y.toString());

        await $.ajax({
          url:   'controller/datosEstadoOper.php',
          type:  'post',
          success: function (response2) {
            var p2 = jQuery.parseJSON(response2);
            if(p2.aaData.length !== 0){
              var cuerpoEstadoOper = '';
              for(var i = 0; i < p2.aaData.length; i++){
                cuerpoEstadoOper += '<option value="' + p2.aaData[i].ID + '">' + p2.aaData[i].ESTADO + '</option>';
              }
              $("#tipoAusencia").html(cuerpoEstadoOper);
              if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $("#tipoAusencia").select2({
                    theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
                });
              }
            }
          }
        });

        $("#observacionAusencia").val('');
        // $("#fechaInicioAusencia").val('');
        $("#fechaFinAusencia").val('');
        setTimeout(function(){
          $("#modalAusencia").modal("show");
          $('#modalAlertasSplash').modal('hide');
        },500);
      },500);
    }
  }
});

$("#tipoAusencia").unbind("click").change(function(){
  var valor = $(this).val(); // Capturamos el valor del select
  var texto = $(this).find('option:selected').text();
  if(texto === "Renuncia" || texto === "Desvinculado" || texto === "Presente" || texto === "Ausente"){
    $("#fechaFinAusencia").attr("disabled","disabled");
  }
  else{
    $("#fechaFinAusencia").removeAttr("disabled");
  }
});

$("#guardarAusencia").unbind("click").click(async function(){
  if($("#fechaFinAusencia").val() === '' && $("#tipoAusencia").find('option:selected').text() !== 'Desvinculado' && $("#tipoAusencia").find('option:selected').text() !== 'Renuncia' && $("#tipoAusencia").find('option:selected').text() !== 'Ausente'){
    $("#fechaFinAusencia").addClass("is-invalid");
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Favor ingrese la fecha de termino de la ausencia.");
  }
  else{
    $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
    $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
    $('#modalAlertasSplash').modal('show');
    $("#modalAusencia").modal("hide");

    //initialize the plugin and get its instance
    var instance = OverlayScrollbars(document.getElementById('contenido'), { });

    //destroy the instance
    instance.destroy();

    var table = $('#infoInformePersonal').DataTable().clear().draw();

    var table = $('#tablaPersonal').DataTable();
    var rutUsuario = $.map(table.rows('.selected').data(), function (item) {
        return item.DNI;
    });

    var valor = $("#tipoAusencia").val(); // Capturamos el valor del select
    var tipoTexto = $("#tipoAusencia").find('option:selected').text();

    var parametros = {
      "rut": rutUsuario[0],
      "tipo": $("#tipoAusencia").val(),
      "observacion": $("#observacionAusencia").val(),
      "ini": $("#fechaInicioAusencia").val(),
      "fin": $("#fechaFinAusencia").val(),
      "tipoTexto": tipoTexto
    }

    await $.ajax({
      url:   'controller/ingresaAusencia.php',
      type:  'post',
      data:  parametros,
      success: async function (response) {
        var p = jQuery.parseJSON(response);
        $('#modalAlertasSplash').modal('hide');
        if(p.aaData.length !== 0){
          var table = $('#tablaPersonal').DataTable();
          var rows = table.rows( '.selected' ).remove().draw();
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Ausencia ingresada correctamente");
          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          await ingresaModificacionPersonal(p);
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
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
        }
        else{
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar la ausencia, si el problema persiste favor comuniquese con soporte");
          setTimeout(function(){
            $('#modalAlertasSplash').modal('hide');
          },1000);
        }
      }
    });

    var table = $("#tablaPersonal").DataTable();
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
    var directos = table
        .column(24, {search: 'applied'})
        .data()
        .filter( function ( value, index ) {
            return value == $("#nombreUsuarioPersonal").val() ? true : false;
    });

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
      "initComplete": function( settings, json){
        $(this.api().column(1).footer()).html(total.count());
      }
    });
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


    $("#qDirectos").html(directos.count());
    $("#qOtros").html(total.count() - directos.count());

    menuElegant();
  }
});

function ingresaModificacionPersonal(p){
  var table2 = $('#tablaPersonal').DataTable();
  for(var k = 0; k < p.aaData.length; k++){
    table2.rows.add([{
      'S': p.aaData[k].S,
      'RUTA_IMG_PERFIL': p.aaData[k].RUTA_IMG_PERFIL,
      'ESTADO_CONTROL': p.aaData[k].ESTADO_CONTROL,
      'ESTADO_GEO': p.aaData[k].ESTADO_GEO,
      'ESTADO_GESTPER': p.aaData[k].ESTADO_GESTPER,
      'DNI': p.aaData[k].DNI,
      'NOMBRE': p.aaData[k].NOMBRE,
      'ASIGNACION': p.aaData[k].ASIGNACION,
      'NIVEL': p.aaData[k].NIVEL,
      'AREA': p.aaData[k].AREA,
      'TURNO': p.aaData[k].TURNO,
      'ENTRADA': p.aaData[k].ENTRADA,
      'SALIDA': p.aaData[k].SALIDA,
      'PERMISO': p.aaData[k].PERMISO,
      'CARGO': p.aaData[k].CARGO,
      'FECHA_INICIO_CONTRATO': p.aaData[k].FECHA_INICIO_CONTRATO,
      'CLASIFICACION': p.aaData[k].CLASIFICACION,
      'CENTRO_COSTO': p.aaData[k].CENTRO_COSTO,
      'GERENCIA': p.aaData[k].GERENCIA,
      'SUBGERENCIA': p.aaData[k].SUBGERENCIA,
      'CLIENTE': p.aaData[k].CLIENTE,
      'COMUNA': p.aaData[k].COMUNA,
      'REGION': p.aaData[k].REGION,
      'EMPRESA': p.aaData[k].EMPRESA,
      'NOMBREJEFE': p.aaData[k].NOMBREJEFE,
      'CELULAR': p.aaData[k].CELULAR,
      'PATENTE': p.aaData[k].PATENTE,
      'SALDOVAC': p.aaData[k].SALDOVAC,
      'FECHANAC': p.aaData[k].FECHANAC,
      'DNI2': p.aaData[k].DNI2,
      'ESTADO_CONTROL2': p.aaData[k].ESTADO_CONTROL2,
      'ESTADO_GEO2': p.aaData[k].ESTADO_GEO2,
      'ESTADO_GESTPER2': p.aaData[k].ESTADO_GESTPER2,
      'ASIGNACION2': p.aaData[k].ASIGNACION2,
      'EMAIL': p.aaData[k].EMAIL,
      'RUTJEFEDIRECTO': p.aaData[k].RUTJEFEDIRECTO,
      'IDPERSONAL': p.aaData[k].IDPERSONAL
    }]).draw();
  }
}

$("#transferirJefatura").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  await $.ajax({
    url:   'controller/datosJefes.php',
    type:  'get',
    success: function (jefes) {
      var jf = jQuery.parseJSON(jefes);
      if(jf.aaData.length !== 0){
        var cuerpoJF = '<option value="0">Sin selección</option>';
        for(var i = 0; i < jf.aaData.length; i++) {
          cuerpoJF += '<option id="' + jf.aaData[i].EMAIL + '" value="' + jf.aaData[i].RUTJEFEDIRECTO + '">' + jf.aaData[i].RUTJEFEDIRECTO + ' - ' + jf.aaData[i].JEFE + '</option>';
        }
        $("#selectJefesTransfer").html(cuerpoJF);
        if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          $("#selectJefesTransfer").select2({
            theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
          });
        }
      }
    }
  });

  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#modalTransferirJefatura").modal("show");
    $("#modalTransferirJefatura").css("z-index", "1050");
    $('#modalAlertasSplash').modal('hide');
  }, 500);
});

$('#selectJefesTransfer').change(function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();

  if( !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $("#selectJefesTransfer").select2('destroy').select2({
        theme: 'bootstrap4', width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style', placeholder: $(this).data('placeholder'), allowClear: Boolean($(this).data('allow-clear')), closeOnSelect: !$(this).attr('multiple')
    });
  }

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();

  var jsonExJefes = {};
  var strlstPersonal = { nombres: [], dnis: [] };
  for(var i = 0; i < datos.length; i++) {
    if(datos[i].EMAIL) jsonExJefes[datos[i].EMAIL] = `${jsonExJefes[datos[i].EMAIL] ?? ''} <br />${datos[i].NOMBRE}`;
    strlstPersonal['dnis'] = `${strlstPersonal['dnis']},${datos[i].DNI}`;
    strlstPersonal['nombres'] = `${strlstPersonal['nombres']} <br />${datos[i].NOMBRE}`;
  }
  strlstPersonal['dnis'] = strlstPersonal['dnis'].substring(1);
  strlstPersonal['nombres'] = strlstPersonal['nombres'].substring(1);

  var nombreNuevoJefe = $("#selectJefesTransfer option:selected").html().split(' - ')[1];
  var emailNuevoJefe = $("#selectJefesTransfer option:selected").attr("id");
  var rutNuevoJefe = $("#selectJefesTransfer option:selected").val();

  // Advertencia Caso 1: No se puede transferir al mismo jefe
  if((Object.keys(jsonExJefes)).includes(emailNuevoJefe)) {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No puede transferir personal a la jefatura que ya tiene asignada, una o más personas seleccionadas tienen esta condición");
    $('#guardarTransferirJefatura').attr("disabled","disabled");
  }
  else if((strlstPersonal['dnis'].split(',')).includes(rutNuevoJefe)) {
    var random = Math.round(Math.random() * (1000000 - 1) + 1);
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>No puede transferir personal a si mismo como jefatura, uno de los seleccionados tiene esta condición");
    $('#guardarTransferirJefatura').attr("disabled","disabled");
  }
  else {
    $('#guardarTransferirJefatura').removeAttr("disabled");
  }
})

$("#guardarTransferirJefatura").unbind('click').click(async function() {
  $("#modalTransferirJefatura").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  //initialize the plugin and get its instance
  var instance = OverlayScrollbars(document.getElementById('contenido'), { });

  //destroy the instance
  instance.destroy();

  var table = $('#infoInformePersonal').DataTable().clear().draw();

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();

  var jsonExJefes = {};
  var strlstPersonal = { nombres: [], dnis: [], ids: [] };
  for(var i = 0; i < datos.length; i++) {
    if(datos[i].EMAIL) jsonExJefes[datos[i].EMAIL] = `${jsonExJefes[datos[i].EMAIL] ?? ''} <br />${datos[i].NOMBRE}`;
    strlstPersonal['dnis'] = `${strlstPersonal['dnis']},'${datos[i].DNI}'`;
    strlstPersonal['nombres'] = `${strlstPersonal['nombres']} <br />${datos[i].NOMBRE}`;
    strlstPersonal['ids'] = `${strlstPersonal['ids']}, ${datos[i].IDPERSONAL}`;
  }
  strlstPersonal['dnis'] = strlstPersonal['dnis'].substring(1);
  strlstPersonal['nombres'] = strlstPersonal['nombres'].substring(1);
  strlstPersonal['ids'] = strlstPersonal['ids'].substring(1);

  var nombreNuevoJefe = $("#selectJefesTransfer option:selected").html().split(' - ')[1];
  var emailNuevoJefe = $("#selectJefesTransfer option:selected").attr("id");
  var rutNuevoJefe = $("#selectJefesTransfer option:selected").val();

  var response2;

  await $.ajax({
    url:   'controller/editarJefaturaTransfer.php',
    type:  'POST',
    data:  {
      "rutNuevoJefe": rutNuevoJefe,
      "strlstPersonal": strlstPersonal
    },
    success: function (response) {
      response2 = jQuery.parseJSON(response);
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      setTimeout(async function(){
        if(response2.aaData.length >= 0){
          var table = $('#tablaPersonal').DataTable();
          table.rows( '.selected' ).remove().draw();
          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
          // ingresaModificacionPersonal(response2);
        }

        await $.ajax({
          url:   'controller/editarPersonalNotify.php',
          type:  'POST',
          data:  {
            "nombreNuevoJefe": nombreNuevoJefe,
            "emailNuevoJefe": emailNuevoJefe,
            "strlstPersonal": strlstPersonal,
            "lstExJefes": Object.entries(jsonExJefes)
          },
          complete: function(){
          }
        });

        var table = $("#tablaPersonal").DataTable();

        table.search( '' ).columns().search( '' ).draw();

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
        var directos = table
            .column(24, {search: 'applied'})
            .data()
            .filter( function ( value, index ) {
                return value == $("#nombreUsuarioPersonal").val() ? true : false;
        });

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
          "initComplete": function( settings, json){
            $(this.api().column(1).footer()).html(total.count());
          }
        });
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


        $("#qDirectos").html(directos.count());
        $("#qOtros").html(total.count() - directos.count());

        menuElegant();

        setTimeout(function(){
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Jefaturas transferidas correctamente");
          $('#modalAlertasSplash').modal('hide');
        },1000);
      },1000);
    },
  });
});

$("#transferirJefaturaRespuesta").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();

  $("#tituloTransferirJefaturaRespuesta").html(datos[0].NOMBRE);

  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#modalTransferirJefaturaRespuesta").modal("show");
    $("#modalTransferirJefaturaRespuesta").css("z-index", "1050");
    $('#modalAlertasSplash').modal('hide');
  }, 500);
});

$("#aceptarTransferirJefaturaRespuesta").unbind("click").click(async function(){
  $('#modalTransferirJefaturaRespuesta').modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var dniPersonal = datos[0].DNI;

  var response2;

  await $.ajax({
    url:   'controller/editarJefaturaTransferOk.php',
    type:  'POST',
    data:  {
      "dniPersonal": dniPersonal
    },
    success: function (response) {
      response2 = jQuery.parseJSON(response);
      $('#transferirJefaturaRespuesta').attr("disabled","disabled");
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      setTimeout(function(){
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Jefaturas cambiadas correctamente");
        if(response2.aaData.length >= 0){
          var table = $('#tablaPersonal').DataTable();
          table.rows( '.selected' ).remove().draw();
          ingresaModificacionPersonal(response2);

          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
        }
        $('#modalAlertasSplash').modal('hide');
      },1000);
    }
  });

  var dataNotify = {
    "nombreNuevoJefe": response2.aaData2[0]['NUEVOJEFE'],
    "emailNuevoJefe": response2.aaData2[0]['EMAILNUEVOJEFE'],
    "strlstPersonal": {
      nombres: response2.aaData2[0]['PERSONAL'] ?? '',
      dnis: response2.aaData2[0]['DNI'] ?? ''
    },
    "lstExJefes": [ response2.aaData2[0]['EMAILANTIGUOJEFE'] ?? '' ]
  };
  // console.log(dataNotify);
  await $.ajax({
    url:   'controller/editarPersonalNotifyOk.php',
    type:  'POST',
    data:  dataNotify,
    complete: function(){
    }
  });
});

$("#rechazarTransferirJefaturaRespuesta").unbind("click").click(async function(){
  $('#modalTransferirJefaturaRespuesta').modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var dniPersonal = datos[0].DNI;

  var response2;

  await $.ajax({
    url:   'controller/editarJefaturaTransferNot.php',
    type:  'POST',
    data:  {
      "dniPersonal": dniPersonal
    },
    success: function (response) {
      response2 = jQuery.parseJSON(response);
      $('#transferirJefaturaRespuesta').attr("disabled","disabled");
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      setTimeout(function(){
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Jefaturas cambiadas correctamente");
        if(response2.aaData.length >= 0){
          var table = $('#tablaPersonal').DataTable();
          table.rows( '.selected' ).remove().draw();
          // ingresaModificacionPersonal(response2);

          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
        }
        $('#modalAlertasSplash').modal('hide');
      },1000);
    }
  });

  var dataNotify = {
    "nombreNuevoJefe": response2.aaData2[0]['NUEVOJEFE'],
    "emailNuevoJefe": response2.aaData2[0]['EMAILNUEVOJEFE'],
    "strlstPersonal": {
      nombres: response2.aaData2[0]['PERSONAL'] ?? '',
      dnis: response2.aaData2[0]['DNI'] ?? ''
    },
    "lstExJefes": [ response2.aaData2[0]['EMAILANTIGUOJEFE']??'' ]
  };
  // console.log(dataNotify);
  await $.ajax({
    url:   'controller/editarPersonalNotifyNot.php',
    type:  'POST',
    data:  dataNotify,
    complete: function(){
    }
  });
});

$("#solicitarJefatura").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  $("#guardarSolicitarJefatura").attr("disabled", "disabled");

  var largo = Math.trunc(($(window).height() - ($(window).height()/70)*50)/30);
  await $('#tablaPersonalSolicitar').DataTable({
    ajax: {
        url: 'controller/datosPersonalSolicitud.php',
        type: 'POST'
    },
    columns: [
        { data: 'S'},
        { data: 'IDPERSONAL', className: "centerDataTable"},
        { data: 'RUT' } ,
        { data: 'NOMBRES' },
        { data: 'APELLIDOS' },
        { data: 'COLOR' },
        { data: 'RUTJEFEDIRECTO' },
        { data: 'JEFE' },
        { data: 'EMAIL' },
        { data: 'ESTADO' }
    ],
    //
    buttons: [
    ],
    // fixedColumns:   {
    //   leftColumns: 3
    // },
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
        "targets": [ 6 ]
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
        style: 'multi',
        selector: 'td:not(:nth-child(2))'
    },
    "scrollX": true,
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
      setTimeout(function(){
        $("#modalSolicitarJefatura").modal("show");
        $("#modalSolicitarJefatura").css("z-index", "1050");
        $('#modalAlertasSplash').modal('hide');
        setTimeout(function(){
          var table = $('#tablaPersonalSolicitar').DataTable();
          $('#tablaPersonalSolicitar').DataTable().columns.adjust();
        },500);
      }, 500);
    }
  });
});

$('#tablaPersonalSolicitar tbody').on( 'click', 'tr', function () {
  setTimeout(async function(){
    var table = $('#tablaPersonalSolicitar').DataTable();
    var datos = table.rows('.selected').data();
    if(datos.length) {
      $("#guardarSolicitarJefatura").removeAttr("disabled");
    } else {
      $("#guardarSolicitarJefatura").attr("disabled", "disabled");
    }
  }, 100);
});

$("#guardarSolicitarJefatura").unbind('click').click(async function() {
  $("#modalSolicitarJefatura").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  //initialize the plugin and get its instance
  var instance = OverlayScrollbars(document.getElementById('contenido'), { });

  //destroy the instance
  instance.destroy();

  var table = $('#infoInformePersonal').DataTable().clear().draw();

  var table = $("#tablaPersonalSolicitar").DataTable();
  var datos = table.rows('.selected').data();

  var jsonExJefes = {};
  var strlstPersonalLibre = { nombresLibre: [], dnisLibre: [], idsLibre: [] };
  var strlstPersonal = { nombres: [], dnis: [], ids: [] };
  for(var i = 0; i < datos.length; i++) {
    if(datos[i].ESTADO === 'Libre'){
      strlstPersonalLibre['dnisLibre'] = `${strlstPersonalLibre['dnisLibre']},'${datos[i].RUT}'`;
      strlstPersonalLibre['nombresLibre'] = `${strlstPersonalLibre['nombresLibre']} <br />${datos[i].NOMBRES + ', ' + datos[i].APELLIDOS}`;
      strlstPersonalLibre['idsLibre'] = `${strlstPersonalLibre['idsLibre']}, ${datos[i].IDPERSONAL}`;
    }
    else{
      if(datos[i].EMAIL) jsonExJefes[datos[i].EMAIL] = `${jsonExJefes[datos[i].EMAIL] ?? ''} <br />${datos[i].NOMBRES + ', ' + datos[i].APELLIDOS}`;
      strlstPersonal['dnis'] = `${strlstPersonal['dnis']},'${datos[i].RUT}'`;
      strlstPersonal['nombres'] = `${strlstPersonal['nombres']} <br />${datos[i].NOMBRES + ', ' + datos[i].APELLIDOS}`;
      strlstPersonal['ids'] = `${strlstPersonal['ids']}, ${datos[i].IDPERSONAL}`;
    }
  }
  if(strlstPersonal['dnis'].length > 0){
    strlstPersonal['dnis'] = strlstPersonal['dnis'].substring(1);
    strlstPersonal['nombres'] = strlstPersonal['nombres'].substring(1);
    strlstPersonal['ids'] = strlstPersonal['ids'].substring(1);
  }
  if(strlstPersonalLibre['dnisLibre'].length > 0){
    strlstPersonalLibre['dnisLibre'] = strlstPersonalLibre['dnisLibre'].substring(1);
    strlstPersonalLibre['nombresLibre'] = strlstPersonalLibre['nombresLibre'].substring(1);
    strlstPersonalLibre['idsLibre'] = strlstPersonalLibre['idsLibre'].substring(1);
  }

  var response;

  if(strlstPersonalLibre['dnisLibre'].length > 0){
    setTimeout(async function(){
      await $.ajax({
        url:   'controller/editarJefaturaSolicitLibre.php',
        type:  'POST',
        data:  {
          "strlstPersonalLibre": strlstPersonalLibre
        },
        success: function (res1) {
          response = jQuery.parseJSON(res1);
          ingresaModificacionPersonal(response);
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Personal solicitado correctamente");
          setTimeout(function(){
            var table = $("#tablaPersonal").DataTable();
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
            var directos = table
                .column(24, {search: 'applied'})
                .data()
                .filter( function ( value, index ) {
                    return value == $("#nombreUsuarioPersonal").val() ? true : false;
            });

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
              "initComplete": function( settings, json){
                $(this.api().column(1).footer()).html(total.count());
              }
            });
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


            $("#qDirectos").html(directos.count());
            $("#qOtros").html(total.count() - directos.count());

            menuElegant();

            $('#modalAlertasSplash').modal('hide');
          },500);

          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
        },
      });
    },100);
  }

  if(strlstPersonal['dnis'].length > 0){
    setTimeout(async function(){
      await $.ajax({
        url:   'controller/editarJefaturaSolicit.php',
        type:  'POST',
        data:  {
          "strlstPersonal": strlstPersonal
        },
        success: function (res2) {
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");

          setTimeout(async function(){
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Personal solicitado correctamente");
            await $.ajax({
              url:   'controller/editarPersonalSolicNotify.php',
              type:  'POST',
              data:  {
                "strlstPersonal": strlstPersonal,
                "lstExJefes": Object.entries(jsonExJefes)
              },
              complete: function(){
              }
            });

            var table = $("#tablaPersonal").DataTable();
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
            var directos = table
                .column(24, {search: 'applied'})
                .data()
                .filter( function ( value, index ) {
                    return value == $("#nombreUsuarioPersonal").val() ? true : false;
            });

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
              "initComplete": function( settings, json){
                $(this.api().column(1).footer()).html(total.count());
              }
            });
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


            $("#qDirectos").html(directos.count());
            $("#qOtros").html(total.count() - directos.count());

            menuElegant();

            $('#modalAlertasSplash').modal('hide');
          },1000);
        },
      });
    },100);
  }
});

$("#solicitarJefaturaRespuesta").unbind("click").click(async function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();

  $("#tituloSolicitarJefaturaRespuesta").html(datos[0].NOMBRE);

  setTimeout(function(){
    var h = $(window).height() - 200;
    $("#modalSolicitarJefaturaRespuesta").modal("show");
    $("#modalSolicitarJefaturaRespuesta").css("z-index", "1050");
    $('#modalAlertasSplash').modal('hide');
  },500);
});

$("#aceptarSolicitarJefaturaRespuesta").unbind("click").click(async function(){
  $('#modalSolicitarJefaturaRespuesta').modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  //initialize the plugin and get its instance
  var instance = OverlayScrollbars(document.getElementById('contenido'), { });

  //destroy the instance
  instance.destroy();

  var table = $('#infoInformePersonal').DataTable().clear().draw();

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var dniPersonal = datos[0].DNI;

  var response2;

  await $.ajax({
    url:   'controller/editarJefaturaSolicitOk.php',
    type:  'POST',
    data:  {
      "dniPersonal": dniPersonal
    },
    success: function (response) {
      response2 = jQuery.parseJSON(response);
      $('#solicitarJefaturaRespuesta').attr("disabled","disabled");
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      setTimeout(async function(){
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Solicitud aceptada correctamente");
        if(response2.aaData.length >= 0){
          var table = $('#tablaPersonal').DataTable();
          table.rows( '.selected' ).remove().draw();
          // ingresaModificacionPersonal(response2);

          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
        }
        await $.ajax({
          url:   'controller/editarPersonalSolicNotifyOk.php',
          type:  'POST',
          data:  dataNotify,
          complete: function(){
          }
        });

        var table = $("#tablaPersonal").DataTable();
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
        var directos = table
            .column(24, {search: 'applied'})
            .data()
            .filter( function ( value, index ) {
                return value == $("#nombreUsuarioPersonal").val() ? true : false;
        });

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
          "initComplete": function( settings, json){
            $(this.api().column(1).footer()).html(total.count());
          }
        });
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


        $("#qDirectos").html(directos.count());
        $("#qOtros").html(total.count() - directos.count());

        menuElegant();
        $('#modalAlertasSplash').modal('hide');
      },1000);
    }
  });

  var dataNotify = {
    "nombreNuevoJefe": response2.aaData2[0]['NUEVOJEFE'],
    "emailNuevoJefe": response2.aaData2[0]['EMAILNUEVOJEFE'],
    "strlstPersonal": {
      nombres: response2.aaData2[0]['PERSONAL'] ?? '',
      dnis: response2.aaData2[0]['DNI'] ?? ''
    },
    "lstExJefes": [ response2.aaData2[0]['EMAILANTIGUOJEFE'] ?? '' ]
  };
});

$("#rechazarSolicitarJefaturaRespuesta").unbind("click").click(async function(){
  $('#modalSolicitarJefaturaRespuesta').modal('hide');
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var dniPersonal = datos[0].DNI;

  var response2;

  await $.ajax({
    url:   'controller/editarJefaturaSolicitNot.php',
    type:  'POST',
    data:  {
      "dniPersonal": dniPersonal
    },
    success: function (response) {
      response2 = jQuery.parseJSON(response);
      $('#solicitarJefaturaRespuesta').attr("disabled","disabled");
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      setTimeout(function(){
        alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Solicitud rechazada correctamente");
        if(response2.aaData.length >= 0){
          var table = $('#tablaPersonal').DataTable();
          table.rows( '.selected' ).remove().draw();
          ingresaModificacionPersonal(response2);

          $("#disponiblePersonal").attr("disabled","disabled");
          $("#ausentePersonal").attr("disabled","disabled");
          $("#transferirJefatura").attr("disabled","disabled");
          $("#transferirJefaturaRespuesta").attr("disabled","disabled");
          $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
          $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
        }
        $('#modalAlertasSplash').modal('hide');
      },1000);
    }
  });

  var dataNotify = {
    "nombreNuevoJefe": response2.aaData2[0]['NUEVOJEFE'],
    "emailNuevoJefe": response2.aaData2[0]['EMAILNUEVOJEFE'],
    "strlstPersonal": {
      nombres: response2.aaData2[0]['PERSONAL'] ?? '',
      dnis: response2.aaData2[0]['DNI'] ?? ''
    },
    "lstExJefes": [ response2.aaData2[0]['EMAILANTIGUOJEFE']??'' ]
  };
  // console.log(dataNotify);
  await $.ajax({
    url:   'controller/editarPersonalSolicNotifyNot.php',
    type:  'POST',
    data:  dataNotify,
    complete: function(){
    }
  });
});

$("#desasignarJefaturaRespuesta").unbind('click').click(function(){
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');
  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();
  var personas = '';
  for(var i = 0; i < datos.length; i++) {
    personas = `${personas} <br />${datos[i].NOMBRE}`;
  }
  $("#tituloDesasignarJefaturaRespuesta").html(personas);
  setTimeout(function(){
    $("#modalAlertasSplash").modal('hide');
    $("#modalDesasignarJefaturaRespuesta").modal("show");
  },500);
});

$("#cancelarDesasignarJefaturaRespuesta").unbind("click").click(function() {
  $("#modalAlertasSplash").modal('hide');
  $("#modalDesasignarJefaturaRespuesta").modal("show");
});

$("#aceptarDesasignarJefaturaRespuesta").unbind('click').click(async function() {
  $("#modalDesasignarJefaturaRespuesta").modal("hide");
  $("#modalAlertasSplash").modal({backdrop: 'static', keyboard: false});
  $("#textoModalSplash").html("<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>");
  $('#modalAlertasSplash').modal('show');

  //initialize the plugin and get its instance
  var instance = OverlayScrollbars(document.getElementById('contenido'), { });

  //destroy the instance
  instance.destroy();

  var table = $('#infoInformePersonal').DataTable().clear().draw();

  var table = $("#tablaPersonal").DataTable();
  var datos = table.rows('.selected').data();

  var strlstPersonalDni = '';
  for(var i = 0; i < datos.length; i++) {
    if(i === 0){
      strlstPersonalDni = `'${datos[i].DNI}'`;
    }
    else{
      strlstPersonalDni = `${strlstPersonalDni},'${datos[i].DNI}'`;
    }
  }

  // console.log(strlstPersonalDni);

  await $.ajax({
    url:   'controller/desasignarPersonalJefatura.php',
    type:  'POST',
    data:  {
      "strlstPersonalDni": strlstPersonalDni
    },
    success: async function (response) {
      var table = $('#tablaPersonal').DataTable();
      var rows = table.rows( '.selected' ).remove().draw();
      var random = Math.round(Math.random() * (1000000 - 1) + 1);
      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Persoal desasignado correctamente");
      setTimeout(function(){
        $('#modalAlertasSplash').modal('hide');
      },500);
    },
  });

  var table = $("#tablaPersonal").DataTable();
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
  var directos = table
      .column(24, {search: 'applied'})
      .data()
      .filter( function ( value, index ) {
          return value == $("#nombreUsuarioPersonal").val() ? true : false;
  });

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
    "initComplete": function( settings, json){
      $(this.api().column(1).footer()).html(total.count());
    }
  });
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


  $("#qDirectos").html(directos.count());
  $("#qOtros").html(total.count() - directos.count());

  menuElegant();

  setTimeout(function(){
    $('#modalAlertasSplash').modal('hide');
    $("#disponiblePersonal").attr("disabled","disabled");
    $("#ausentePersonal").attr("disabled","disabled");
    $("#transferirJefatura").attr("disabled","disabled");
    $("#transferirJefaturaRespuesta").attr("disabled","disabled");
    $("#solicitarJefaturaRespuesta").attr("disabled","disabled");
    $("#desasignarJefaturaRespuesta").attr("disabled","disabled");
  },1500);
});

/* *************************************** */
/* ********** PLANILLA ASISTENCIA ******** */
/* *************************************** */
var _DATA_PLANILLA = [];
var _TABLE_PLANILLA = $('#tablaListadoPlanillaAsistencia');
var _CALENDARIO_PLANILLA = [];
var _DIAS_PLANILLA = [];
var _LARGO = Math.trunc(($(window).height() - ($(window).height()/100)*50)/40);
var _LST_NULLS = ['Seleccione', 0, '0'];
var _COMUNES_PLANILLA = {};

var _MODAL_PLANILLA_USUARIOS_TEMPORALES = [];
var _MODAL_PLANILLA_DIAS_A_ASIGNAR = [];

async function listUsuariosTemporales() {
  $.ajax({
    url: 'controller/datosListaPersonalTemporales.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      _MODAL_PLANILLA_USUARIOS_TEMPORALES = response.aaData;
    },
  })
}

async function listDiasReemplazoTemporal(idPersonal, fecIni, fecFin) {
  await $.ajax({
    url:   'controller/datosListaDiasReemplazoTemporal.php',
    type:  'post',
    data: { idPersonal, fecIni, fecFin },
    dataType: 'json',
    success:  function (response) {
      _MODAL_PLANILLA_DIAS_A_ASIGNAR = response.aaData;
    }
  });
}

async function listComunesPlanilla() {
  $.ajax({
    url: 'controller/datosComunesPlanilla.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      _COMUNES_PLANILLA = response.aaData;
    },
  })
}

async function listCentrosDeCostos() {
  $.ajax({
    url: 'controller/datosCentrosDeCostos.php',
    type: 'get',
    dataType: 'json',
    success: function (response) {
      var data = response.aaData;
      var html = "<option value='0'>Seleccione</option>";
      data.forEach((item) => {
        html += `<option value="${item.IDESTRUCTURA_OPERACION}">${item.DEFINICION} - ${item.NOMENCLATURA}</option>`;
      });
      $('#selectListaCentrosDeCostos').html(html);
    },
  })
}

async function listCalendario() {
  await $.ajax({
    url:   'controller/datosCalendario2.php',
    type:  'get',
    dataType: 'json',
    success:  function (response) {
      if (!response.aaData?.length) return
      var dt = {}
      response.aaData.forEach(({ ANHO, ...item }) => {
        if (!dt[ANHO]) dt[ANHO] = []
        dt[ANHO].push(item)
      });
      _CALENDARIO_PLANILLA = dt;

      var html = "<option value='0'>Seleccione</option>";
      Object.keys(_CALENDARIO_PLANILLA).forEach((item) => {
        html += `<option value='${item}'>${item}</option>`;
      });
      $('#selectListaAnhos').html(html);

      initSemanas();
    }
  })
}

async function listDiasPorSemana(anho, nsemana) {
  await $.ajax({
    url:   'controller/datosCalendarioDias.php',
    type:  'post',
    data: { anho, nsemana },
    dataType: 'json',
    success:  function (response) {
      _DIAS_PLANILLA = response.aaData;
    }
  });
}

function initSemanas() {
  var html = "<option value='0'>Seleccione</option>";
  Object.keys(_CALENDARIO_PLANILLA).forEach((anho) => {
    _CALENDARIO_PLANILLA[anho].forEach((item, idx) => html += `<option value='${anho}_${idx}'>${item.LABEL}</option>`);
  });
  $('#selectListaSemanas').html(html);
}

$('#selectListaAnhos').on('change', function (e) {
  e.stopImmediatePropagation();
  if (!this.value || isNaN(this.value) || Number(this.value) <= 0) {
    initSemanas();
    filtrosPlanilla();
    return;
  }
  var html = "<option value='0'>Seleccione</option>";
  _CALENDARIO_PLANILLA[this.value].forEach((item, idx) => {
    if ((Number(this.value) == new Date().getFullYear() && item.ES_ACTUAL > 0)
        || (Number(this.value) != new Date().getFullYear() && idx == _CALENDARIO_PLANILLA[this.value].length - 1)) {
      html += `<option value='${this.value}_${idx}' selected>${item.LABEL}</option>`;
    } else {
      html += `<option value='${this.value}_${idx}'>${item.LABEL}</option>`;
    }
  })
  $('#selectListaSemanas').html(html);
  listSemanas($('#selectListaSemanas').val());
})

$('#selectListaSemanas').on('change', function (e) {
  e.stopImmediatePropagation();
  listSemanas(this.value);
})

function listSemanas(val) {
  var [anho, idx] = val.split('_');
  listDiasPorSemana(anho, _CALENDARIO_PLANILLA[anho][idx].SEMANA);

  var html = "<option value='0'>Seleccione</option>";
  Object.keys(_CALENDARIO_PLANILLA).forEach((item) => {
    if (`${item}` == `${anho}`) {
      html += `<option value='${item}' selected>${item}</option>`;
    } else {
      html += `<option value='${item}'>${item}</option>`;
    }
  });
  $('#selectListaAnhos').html(html);

  filtrosPlanilla();
}

function disableSelectionCols(lst) {
  var str = '';
  lst.forEach((el) => {
    str = str + `:not(:nth-child(${el}))`;
  });
  return `td${str}`;
}

async function listPlanillaAsistencia(idEstructuraOperacion, fecIni, fecFin) {
  await _TABLE_PLANILLA.DataTable({
    serverSide: true,
    processing: true,
    search: { return: true },
    ajax: {
      url: "controller/datosListadoPlanillaAsistencia.php",
      type: 'POST',
      data: { idEstructuraOperacion, fecIni, fecFin },
    },
    columns: [
      { data: 'S' , className: 'dt-center' },
      { data: 'RUT' },
      { data: 'NOMBRES' },
      { data: 'CARGO_LIQUIDACION' },
      { data: 'CARGO_GENERICO_UNIFICADO' },
      { data: 'CLASIFICACION' , className: 'dt-center' },
      { data: 'REFERENCIA1' , className: 'dt-center' },
      { data: 'REFERENCIA2' , className: 'dt-center' },
      { data: 'CARGO_GENERICO_UNIFICADO_B' },
      { data: 'CLASIFICACION_B' },
      { data: 'REFERENCIA1_B' },
      { data: 'REFERENCIA2_B' },
      { data: 'RUT_REEMPLAZO' , className: 'dt-center' },
      // { data: 'FECHA_REEMPLAZO' },
      { data: 'Lunes' , className: 'dt-center' },
      { data: 'Martes' , className: 'dt-center' },
      { data: 'Miercoles' , className: 'dt-center' },
      { data: 'Jueves' , className: 'dt-center' },
      { data: 'Viernes' , className: 'dt-center' },
      { data: 'Sabado' , className: 'dt-center' },
      { data: 'Domingo' , className: 'dt-center' },
      { data: 'NDIAS' , className: 'dt-center' },
      { data: 'HE50' , className: 'dt-center' },
      { data: 'HE100' , className: 'dt-center' },
      { data: 'ATRASO' , className: 'dt-center' }
    ],
    buttons: [],
    fixedColumns:   {
      leftColumns: 3
    },
    columnDefs: [
      { orderable: false, className: 'select-checkbox', targets: [ 0 ], width: "5px" },
      { width: "5px", targets: 1 },
      { targets: "_all" },
      { orderable: false, targets: [8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] },
    ],
    scrollX: true,
    paging: true,
    ordering: true,
    scrollCollapse: true,
    info: true,
    lengthMenu: [[_LARGO], [_LARGO]],
    dom: 'Bfrtip',
    language: {
      zeroRecords: "Seleccionar semana y centro de costo",
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
    select: {
      style: 'multi',
      // selector: 'td:not(:nth-child(8),:nth-child(11))'
      selector: disableSelectionCols([9,11,12,13,14,15,16,17,18,19,20,22,23,24]),
    },
    destroy: true,
    autoWidth: false,
    initComplete: function (settings, json) {
      //Recargamos la funcion para guardado ya que si no se ingresa a veces no funciona el guardado
      $(document).on('click', '#editarPlanillaAsistencia', async (e) => {
        e.stopImmediatePropagation();
        e.preventDefault();

        if (!_DATA_PLANILLA.length || !_DATA_PLANILLA.some((item) => item['__isEdited'])) return;

        var dataUpd = [];

        _DATA_PLANILLA.forEach(({
          IDPERSONAL,
          IDCARGO_GENERICO_UNIFICADO_B,
          IDREFERENCIA1_B,
          IDREFERENCIA2_B,
          __DIAS_PLN,
          __HE50,
          __HE100,
          __ATRASO,
          __isEdited,
        }) => {
          var aux = {
            IDPERSONAL,
            IDCARGO_GENERICO_UNIFICADO_B,
            IDREFERENCIA1_B,
            IDREFERENCIA2_B,
            FECHA_BASE: _DIAS_PLANILLA[0]['fecha'],
            DIAS: _DIAS_PLANILLA.map(({ fecha }) => fecha),
            DIAS_PLANILLA: __DIAS_PLN,
          }
          if (__HE50) aux['HE50'] = __HE50;
          if (__HE100) aux['HE100'] = __HE100;
          if (__ATRASO) aux['ATRASO'] = __ATRASO;
          if (__isEdited) dataUpd.push(aux);
        })

        console.log(dataUpd)

        loading(true);
        await $.ajax({
          url:   'controller/actualizarListadoPlanilla.php',
          type:  'post',
          data: { dataUpd },
          success:  function (response) {
            alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Planilla actualizada correctamente");
            setTimeout(function(){
              _TABLE_PLANILLA.DataTable().ajax.reload();
              loading(false);
            },1000);
          }
        })
      });

      $('#contenido').show();
      $('#menu-lateral').show();
      $('#footer').parent().show();
      $('#footer').show();
      setTimeout(function() {
        _DATA_PLANILLA = json.aaData.map((item) => ({ DIAS_PLANILLA: [], ...item }));
        _TABLE_PLANILLA.DataTable().columns.adjust();
        loading(false);
      },500);
    },
    rowCallback:function(row,data){
      // Lunes
      try {
        if(data["Lunes"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[13]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[13]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Lunes"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[13]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[13]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[13]).css("border-top","6px solid red");
        }
      }
      // Martes
      try {
        if(data["Martes"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[14]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[14]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Martes"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[14]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[14]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[14]).css("border-top","6px solid red");
        }
      }
      // Miercoles
      try {
        if(data["Miercoles"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[15]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[15]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Miercoles"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[15]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[15]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[15]).css("border-top","6px solid red");
        }
      }
      // Jueves
      try {
        if(data["Jueves"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[16]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[16]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Jueves"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[16]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[16]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[16]).css("border-top","6px solid red");
        }
      }
      // Viernes
      try {
        if(data["Viernes"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[17]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[17]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Viernes"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[17]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[17]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[17]).css("border-top","6px solid red");
        }
      }
      // Sabado
      try {
        if(data["Sabado"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[18]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[18]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Sabado"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[18]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[18]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[18]).css("border-top","6px solid red");
        }
      }
      // Domingo
      try {
        if(data["Domingo"].split("selected>")[1].split("</option>")[0] != ""){
          $($(row).find("td")[19]).css("border-top","6px solid green");
        }
        else{
          $($(row).find("td")[19]).css("border-top","6px solid red");
        }
      } catch (error) {
        try {
          if(data["Domingo"].split("disabled")[1].split("</option>")[0] != ""){
            $($(row).find("td")[19]).css("border-top","6px solid green");
          }
          else{
            $($(row).find("td")[19]).css("border-top","6px solid red");
          }
        } catch (error) {
          $($(row).find("td")[19]).css("border-top","6px solid red");
        }
      }

      //Bloqueamos rut de ser necesario
      var flagDSR = 0;
      try {
        if(data["Lunes"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Martes"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Miercoles"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Jueves"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Viernes"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Sabado"].split("<option>")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
      try {
        if(data["Domingo"].split("<option> ")[1].split("</option>")[0].localeCompare("DSR") == 0){
          $($(row).find("td")[12]).find("button").removeAttr("disabled");
        }
      }
      catch{
        // No se ejecuta acción
      }
    }
  });
}

/*_TABLE_PLANILLA.DataTable().on('preDraw', function () {
  var isEdited = _DATA_PLANILLA.some(({ __isEdited }) => __isEdited);
  if (isEdited) {
    return false;
  }
})*/

$('#selectListaCentrosDeCostos').on('change', function (e) {
  e.stopImmediatePropagation();
  filtrosPlanilla();
})

function filtrosPlanilla() {
  var idEstructuraOperacion = $('#selectListaCentrosDeCostos').val();
  var week = $("#selectListaSemanas").val();

  if (_LST_NULLS.includes(idEstructuraOperacion) || _LST_NULLS.includes(week)) return;

  var semanaInicio = '2021-01-01';
  var semanaFin = '2025-01-01';
  if (week && week != '0' && week != 'Seleccione') {
    var [anho, idx] = week.split('_');
    semanaInicio = _CALENDARIO_PLANILLA[anho][idx].SEMANA_INICIO;
    semanaFin = _CALENDARIO_PLANILLA[anho][idx].SEMANA_FIN;
  } else {
    if (anho != 'Seleccione' && anho > 0) {
      semanaInicio = _CALENDARIO_PLANILLA[anho][0].SEMANA_INICIO;
      semanaFin = _CALENDARIO_PLANILLA[anho][_CALENDARIO_PLANILLA[anho].length - 1].SEMANA_FIN;
    }
  }

  loading(true);
  listPlanillaAsistencia(
    idEstructuraOperacion,
    semanaInicio,
    semanaFin
  );
}

function personalGetColAndId(strid) {
  var splitted = strid.split('-');
  if (splitted.length > 3) {
    return [Number(splitted[2].replace('col', '')), Number(splitted[3])];
  }
  return [0, 0];
}

$(document).on('change', '.planilla-select-col9', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  var [_, idPersonal] = personalGetColAndId(this.id);
  var idCargoGenericoUnificado = this.value;
  var html = "";

  var cargoGenericoUnificado = _COMUNES_PLANILLA.cargoGenericoUnificado.find((item) => Number(item['IDCARGO_GENERICO_UNIFICADO']) == Number(idCargoGenericoUnificado));
  var idReferencia1 = cargoGenericoUnificado['IDREFERENCIA1'];
  var referencia1 = cargoGenericoUnificado['REFERENCIA1'];
  var clasificacion = cargoGenericoUnificado['CLASIFICACION'];

  /* Begin - Text Col 9 */
  $(`#planilla-text-col10-${idPersonal}`).text(clasificacion);
  /* End - Text Col 9 */

  /* Begin - Text Col 10 */
  $(`#planilla-text-col11-${idPersonal}`).text(referencia1);
  /* End - Text Col 10 */

  /* Begin - Select Col 11 */
  /*html = `<select id='planilla-select-col11-${idPersonal}' class='planilla-select-col11'>`;
  _COMUNES_PLANILLA.referencia2.forEach((item) => {
    if (Number(item['IDREFERENCIA1']) == Number(idReferencia1)) {
      html += "<option value='" + item['IDREFERENCIA2'] + "'>" + item['REFERENCIA2'] + "</option>";
    }
  })
  html += "</select>";
  $(`#planilla-select-col11-${idPersonal}`).html(html);*/
  /* End - Select Col 11 */

  // var idReferencia2 = $(`#planilla-select-col11-${idPersonal}`).val();

  var planillaIdx = _DATA_PLANILLA.findIndex(({ IDPERSONAL }) => `${IDPERSONAL}` == `${idPersonal}`)
  if (planillaIdx >= 0) {
    _DATA_PLANILLA[planillaIdx]['IDCARGO_GENERICO_UNIFICADO_B'] = idCargoGenericoUnificado;
    _DATA_PLANILLA[planillaIdx]['CLASIFICACION_B_TEXT'] = clasificacion;
    _DATA_PLANILLA[planillaIdx]['IDREFERENCIA1_B'] = idReferencia1;
    _DATA_PLANILLA[planillaIdx]['REFERENCIA1_B_TEXT'] = referencia1;
    // _DATA_PLANILLA[planillaIdx]['IDREFERENCIA2_B'] = idReferencia2;
    _DATA_PLANILLA[planillaIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.planilla-select-col11', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  var [_, idPersonal] = personalGetColAndId(this.id);
  var idReferencia1 = this.value;

  var planillaIdx = _DATA_PLANILLA.findIndex(({ IDPERSONAL }) => `${IDPERSONAL}` == `${idPersonal}`)
  if (planillaIdx >= 0) {
    _DATA_PLANILLA[planillaIdx]['IDREFERENCIA1_B'] = idReferencia1;
    _DATA_PLANILLA[planillaIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.planilla-select-col12', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  var [_, idPersonal] = personalGetColAndId(this.id);
  var idReferencia2 = this.value;

  var planillaIdx = _DATA_PLANILLA.findIndex(({ IDPERSONAL }) => `${IDPERSONAL}` == `${idPersonal}`)
  if (planillaIdx >= 0) {
    _DATA_PLANILLA[planillaIdx]['IDREFERENCIA2_B'] = idReferencia2;
    _DATA_PLANILLA[planillaIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.planilla-select-day', function(e){
  e.preventDefault();
  e.stopImmediatePropagation();

  var [col, idPersonal] = personalGetColAndId(this.id);
  var idPec = this.value;

  var planillaIdx = _DATA_PLANILLA.findIndex(({ IDPERSONAL }) => `${IDPERSONAL}` == `${idPersonal}`)
  if (planillaIdx >= 0) {
    var idx = col - 14;
    _DATA_PLANILLA[planillaIdx]['__DIAS_PLN'].push({ id: idPec, fecha: _DIAS_PLANILLA[idx]['fecha']});
    _DATA_PLANILLA[planillaIdx]['__isEdited'] = true;
  }
});

$(document).on('change', '.planilla-input', function(e){
  var [col, idPersonal] = personalGetColAndId(this.id);
  var val = this.value;

  var planillaIdx = _DATA_PLANILLA.findIndex(({ IDPERSONAL }) => `${IDPERSONAL}` == `${idPersonal}`)
  if (planillaIdx >= 0) {
    var key = col == 22 ? 'HE50' : col == 23 ? 'HE100' : 'ATRASO';
    _DATA_PLANILLA[planillaIdx][`__${key}`] = val;
    _DATA_PLANILLA[planillaIdx]['__isEdited'] = true;
  }
});

$(document).on('keypress', '.planilla-input', function(e){
  if(e.keyCode == 13) {
    e.preventDefault();
    e.target.blur();
  }
});

$(document).on('click', '.planilla-modal', async function(e){
  e.stopImmediatePropagation();
  e.preventDefault();
  var idPersonal = Number(this.id.replace('planilla-input-', ''));
  var fecIni = _DIAS_PLANILLA[0]['fecha'];
  var fecFin = _DIAS_PLANILLA[_DIAS_PLANILLA.length - 1]['fecha'];

  loading(true);
  await listUsuariosTemporales();
  await listDiasReemplazoTemporal(idPersonal, fecIni, fecFin);
  setTimeout(function() {
    // var h = $(window).height() - 200;
    var html = `<div style='display: flex; justify-content: space-between; align-items: center; width: 100%;'>
      <span style="width: 30%; text-align: center; font-weight: bold; font-size: 18px">Días a reemplazar</span>
      <span style="width: 30%; text-align: center; font-weight: bold; font-size: 18px">Rut</span>
      <span style="width: 40%; text-align: center; font-weight: bold; font-size: 18px">Nombre</span>
    </div>`;
    _MODAL_PLANILLA_DIAS_A_ASIGNAR.forEach((item, index) => {
      var select = `<select id='planilla-modal-personal-${item.IDPERSONAL_ESTADO}' class='planilla-modal-personal' style='width: 30%;'>`
      select += `<option value='0'>Seleccione</option>`;
      _MODAL_PLANILLA_USUARIOS_TEMPORALES.forEach((el) => {
        if (el.RUT == item.RUT_REEMPLAZO) {
          select += `<option value='${el.RUT}' selected>${el.RUT}</option>`;
        } else {
          select += `<option value='${el.RUT}'>${el.RUT}</option>`;
        }
      })
      select += `</select>`;

      html += `<div style='display: flex; justify-content: space-between; align-items: center; width: 100%;'>
        <span style="width: 30%; text-align: center;">${item.FECHA_INICIO}</span>
        ${select}
        <span id="planilla-modal-personal-nombre-${item.IDPERSONAL_ESTADO}" style="width: 40%; padding-left: 10px;">${item.REEMPLAZO ?? ''}</span>
      </div>`;
    })
    $('#personalTemporalPlanilla').html(html);

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
    if(!/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      $(".planilla-modal-personal").select2(theme);
    }

    $("#modalIngresoTemporalPlanilla").modal("show");
    loading(false);
  }, 500);
});

$(document).on('change', '.planilla-modal-personal', async (e) => {
  e.stopImmediatePropagation();
  e.preventDefault();

  var idPersonalEstado = Number(e.target.id.replace('planilla-modal-personal-', ''));
  var rut = $(`#${e.target.id}`).val();
  var reemplazo = _MODAL_PLANILLA_USUARIOS_TEMPORALES.find((item) => item.RUT == rut)
  $(`#planilla-modal-personal-nombre-${idPersonalEstado}`).text(reemplazo ? reemplazo.FULLNAME : '');
});

$('#guardarIngresoTemporalPlanilla').on('click', async function(e) {
  e.stopImmediatePropagation();
  e.preventDefault();

  var lst = [];
  $('.planilla-modal-personal').each(function () {
    var idPersonalEstado = Number(this.id.replace('planilla-modal-personal-', ''));
    var rutReemplazo = $(`#${this.id}`).val();
    if (`${rutReemplazo}` != '0') lst.push({ idPersonalEstado, rutReemplazo });
  })
  $("#modalIngresoTemporalPlanilla").modal("hide");
  loading(true);
  await $.ajax({
    url:   'controller/actualizarPlanillaRutReemplazo.php',
    type:  'post',
    data: { lst },
    success:  function (response) {
      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Planilla actualizada correctamente");
      setTimeout(function(){
        loading(false);
      },1000);
    }
  })
});

$(document).on('click', '#editarPlanillaAsistencia', async (e) => {
  e.stopImmediatePropagation();
  e.preventDefault();

  var selecteds = _TABLE_PLANILLA.DataTable().rows('.selected').data();

  // if (!_DATA_PLANILLA.length || !_DATA_PLANILLA.some((item) => item['__isEdited'])) return;
  if (!_DATA_PLANILLA.length || !selecteds.length) return;

  var dataUpd = [];

  _DATA_PLANILLA.forEach(({
    IDPERSONAL,
    IDCARGO_GENERICO_UNIFICADO_B,
    IDREFERENCIA1_B,
    IDREFERENCIA2_B,
    __DIAS_PLN,
    __HE50,
    __HE100,
    __ATRASO,
    // __isEdited,
  }) => {
    var aux = {
      IDPERSONAL,
      IDCARGO_GENERICO_UNIFICADO_B,
      IDREFERENCIA1_B,
      IDREFERENCIA2_B,
      FECHA_BASE: _DIAS_PLANILLA[0]['fecha'],
      DIAS: _DIAS_PLANILLA.map(({ fecha }) => fecha),
      DIAS_PLANILLA: __DIAS_PLN,
    }
    if (__HE50) aux['HE50'] = __HE50;
    if (__HE100) aux['HE100'] = __HE100;
    if (__ATRASO) aux['ATRASO'] = __ATRASO;
    // if (__isEdited) dataUpd.push(aux);

    // var isSelected = selecteds.find((itm) => `${itm.IDPERSONAL}` == `${IDPERSONAL}`)
    for (var i=0; i<selecteds.length; i++) {
      if (selecteds[i].IDPERSONAL == IDPERSONAL) dataUpd.push(aux);
    }
  })

  console.log(dataUpd)

  return;
  loading(true);
  await $.ajax({
    url:   'controller/actualizarListadoPlanilla.php',
    type:  'post',
    data: { dataUpd },
    success:  function (response) {
      alertasToast("<img src='view/img/check.gif' class='splash_load'><br/>Planilla actualizada correctamente");
      setTimeout(function(){
        _TABLE_PLANILLA.DataTable().ajax.reload();
        loading(false);
      },1000);
    }
  })
});
/* *************************************** */
/* ********** PLANILLA ASISTENCIA ******** */
/* *************************************** */
