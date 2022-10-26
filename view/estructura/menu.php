<script type="text/javascript">
  // $("div.sub-menu li").css("display","block");
  // $(".contenedor-logos").show();
  $("#iconoLogoMenu").hover(
    function() {
      $("#iconoLogoMenu").addClass("blink_me");
    }, function() {
      $("#iconoLogoMenu").removeClass("blink_me");
    }
  );

  $("#logoMenu").unbind("click").click(async function(){
    $("#logoLinkWeb").hide();
    $("#logoMenu").hide();
    $('#menu-lateral').overlayScrollbars({
  	  className: "os-theme-thin-dark",
      overflowBehavior: {
        x: 'hidden'
      },
      resize: "none",
    	paddingAbsolute: true,
    	scrollbars: {
    		clickScrolling: true,
        autoHide: "leave"
    	}
  	});
    if($("#menu-lateral").width() > 100){
      $("#contenido").css("margin-left","0px");
      $("#contenido").css("margin-right","0px");
      //Cierra todo
      $("div.sub-menu").parent().css("height", "37px");
      $("div.sub-menu").parent().css("background","rgba(30, 0, 0, 0.0)");
      $("div.sub-menu").fadeOut();
      $("div.sub-menu").parent().find("p").css("color", "white");

      $("#menu-lateral").css("width","37px");
      // $("#menu-lateral").css("z-index",-1000);
      $("#menu-lateral").css("background","rgba(30, 0, 0, 0.0)");
      $("#logoMenu").css("color","white");
      $("#iconoLogoMenu").css("border","1px solid white");
      $("#iconoLogoMenu").css("background","rgba(0, 56, 101, 1.0)");
      $("#lineaMenu").fadeOut();
      $(".contenedor-logos").css("display","none");
      $(".contenedor-logos").find('li').css("display","none");
      $("#logoMenu").fadeIn();
      $("#iconoLogoMenu").attr("class","imgMenu fas fas fa-bars");
    }
    else{
      //Mover contenido completo
      $("#contenido").css("margin-left","0px");
      $("#contenido").css("margin-right","0px");

      $("#menu-lateral").css("width","190px");
      $("#menu-lateral").css("background","#003865");
      // $("#menu-lateral").css("z-index",1000);
      $("#logoMenu").css("color","white");
      $("#iconoLogoMenu").css("border","0px");
      $("#iconoLogoMenu").css("background","rgba(255, 255, 255, 0.0)");
      $("#logoLinkWeb").hide();
      $("#logoMenu").hide();
      if($("#sesionActiva").val() == 1){
        $(".contenedor-logos").css("display","block");
        $(".contenedor-logos").find('li').css("display","block");
        $("#lineaMenu").fadeIn();
        $("#logoLinkWeb").fadeIn();
        $("#logoMenu").fadeIn();
        $("#iconoLogoMenu").attr("class","imgMenu fas fa-times");
        $("#regresarMenu").css("display","none");
        $(".logo").fadeIn();
      }
    }
  });
</script>


<div id="logo-menu">
  <a id="logoLinkWeb" class="title-menu">
    <img
      <?php
        echo "src='" . $_POST['url'] .  "controller/cargarLogoMenu.php?url=" . $_SERVER['SERVER_NAME'] . "'";
      ?>
    style="width: 130px; margin-bottom: 6px;">
  </a>
  <span id="logoMenu" class="logo2">
    <span id="iconoLogoMenu" class="imgMenu fas fas fa-bars"></span>
  </span>
</div>

<div>
  <hr id="lineaMenu" style="display: none; background-color: #FFFFFF; width: 95%; height: 1px;">
</div>

<div id="DivPrincipalMenu">
</div>
