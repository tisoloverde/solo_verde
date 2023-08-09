<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
    <link  rel="icon"   href="view/img/favicon.ico" type="image/png" />

    <!-- CSS Librerias -->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/OverlayScrollbars.css">
    <link rel="stylesheet" href="view/css/os-theme-round-dark.css">
    <link rel="stylesheet" href="view/css/os-theme-thin-dark.css">
    <link rel="stylesheet" href="view/css/jquery-ui.min.css">
    <link rel="stylesheet" href="view/css/toastr.min.css">
    <link rel="stylesheet" href="view/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="view/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" href="view/css/rowReorder.dataTables.min.css"/>
    <link rel="stylesheet" href="view/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="view/css/select.dataTables.min.css">
    <link rel="stylesheet" href="view/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="view/css/fancy.min.css">
    <link rel="stylesheet" href="view/css/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="view/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="view/css/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="view/css/multi-select.css">
    <link rel="stylesheet" type="text/css" href="view/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="libs/Editor-2.0.10/css/editor.dataTables.min.css" />

    <!-- JS Librerias -->
    <script src="view/js/jquery-3.4.1.min.js"></script>
    <script src="view/js/jquery-ui.min.js"></script>
    <script src="view/js/jquery.fancybox.min.js"></script>
    <script src="view/js/angular.min.js"></script>
    <script src="view/js/angular-route.min.js"></script>
    <script src="view/js/angular-animate.min.js"></script>
    <script src='view/js/a076d05399.js'></script>
    <script src="view/js/bootstrap.min.js"></script>
    <script src="view/js/jquery.overlayScrollbars.js"></script>
    <script src="view/js/toastr.min.js"></script>
    <script src="view/js/jquery.dataTables.min.js"></script>
    <script src="view/js/dataTables.responsive.min.js"></script>
    <script src="view/js/dataTables.rowReorder.min.js"></script>
    <script src="view/js/dataTables.select.min.js"></script>
    <script src="view/js/dataTables.buttons.min.js"></script>
    <script src="view/js/dataTables.fixedColumns.min.js"></script>
    <script src="view/js/dataTables.rowReorder.min.js"></script>
    <script src="libs/Editor-2.0.10/js/dataTables.editor.min.js"></script>
    <script src="view/js/sum().js"></script>
    <script src="view/js/jszip.min.js"></script>
    <script src="view/js/pdfmake.min.js"></script>
    <script src="view/js/vfs_fonts.js"></script>
    <script src="view/js/buttons.html5.min.js"></script>
    <script src="view/js/buttons.print.min.js"></script>
    <script src="view/js/buttons.flash.min.js"></script>
    <script src="view/js/popper.min.js"></script>
    <script src="view/js/moment.min.js"></script>
    <script src="view/js/datetime-moment.js"></script>
    <script src="view/js/datetime.js"></script>
    <script src="view/js/accounting.js"></script>
    <script src="view/js/jquery.rut.min.js"></script>
    <script src="view/js/select2.min.js"></script>
    <script src="view/js/jquery.multi-select.js"></script>
    <script src="view/js/jquery.quicksearch.js"></script>
    <script type="text/javascript" src="view/js/daterangepicker.min.js"></script>
    <script src="view/js/jquery.ui.touch-punch.min.js"></script>
    <script src="view/js/fancy.min.js"></script>
    <script src="view/js/moment.min.js"></script>
    <script src="view/js/auto-hiding-bootstrap-navbar.js"></script>

    <link rel="stylesheet" href="view/css/style.css?idLoad=90">

    <script src="view/js/helpers/constants.js?idLoad=90"></script>
    <script src="view/js/helpers/config.js?idLoad=90"></script>
    <script src="view/js/helpers/validations.js?idLoad=90"></script>
    <script src="view/js/helpers/functions.js?idLoad=90"></script>

    <script src="view/js/funciones.js?idLoad=90"></script>
    <script src="view/js/app.js?idLoad=90"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb15rFHKSkFxmZbQIo6KVes2-GR3N-LcQ&libraries=places&callback">
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Solo Verde</title>
  </head>
  <header>
  </header>
  <body ng-app="WPApp">
    <div id="modales" ng-include="'view/estructura/modales.php?idLoad=90'">
  	</div>
    <nav class="navbar navbar-expand-md navbar-dark bg-custom fixed-top" style="display: none;">
      <a class="navbar-brand" href="#">
        <img
        <?php
          echo "src='" . $_POST['url'] .  "controller/cargarLogoMenu.php?url=" . $_SERVER['SERVER_NAME'] . "'";
        ?>
        style="width: 120px;" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto" id="DivPrincipalMenuH">

        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown user-dropdown">
              <k class="nav-link dropdown-toggle" href="#/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img style="width: 30px; height: 30px;" alt="User-img" id="imgPerfil">
              Cuenta
            </k>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownUser" id="liCuenta">
              <!-- <a id="perfil" class="dropdown-item" href="#/perfil"><i class="fas fa-user"></i> Perfil</a>
              <a id="configuracion" class="dropdown-item" href="#/configuracion"><i class="fas fa-cog"></i> Configuración</a>
              <div class="dropdown-divider"></div>
              <a id="logout" class="dropdown-item" href="#/cerrar-sesion"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a> -->
            </div>
          </li>
        </ul>
      </div>
    </nav>
  	<div id="contenido" ng-view class="view-animate page-wrap" style="padding-top: 70px;">
   	</div>
  	<br />
  </body>
  <footer>
    <div style="display: none;" id="footer" ng-include="'view/estructura/footer.html'" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	</div>
  </footer>
</html>
