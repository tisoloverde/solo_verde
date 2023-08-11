<script>
	function randomTextoLoadJs(){
	  var str = '';
	  var ref = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789';
	  for (var i = 0; i < 8 ; i++)
	  {
	    str += ref.charAt(Math.floor(Math.random()*ref.length));
	  }
	  return str;
	}
  var js = document.createElement('script');
  js.src = 'view/js/funciones.js?idLoad=92';
  document.getElementsByTagName('head')[0].appendChild(js);
</script>

<?php
include "./modales/personal/create.php";
include "./modales/personal/update.php";
?>

<!-- Modal de splash -->
<div id="modalAlertasSplash" class="modal modal-fullscreen fade" role="dialog" style="z-index: 2800;">
  <div class="modal-dialog" role="document">

    <div class="modal-content-t">
      <div class="modal-body alerta-modal-body">
        <h4 id="textoModalSplash">
					<img src='view/img/logo_home.png' class='splash_charge_logo'>
					<img src='view/img/loading6.gif' class='splash_charge_logo' style="margin-top: -50px;">
					<!-- <font style='font-size: 10pt; font-color: gray; font-style: italic;'>Cargando</font> -->
				</h4>
        <button id="buttonAceptarAlertaSplash" style="margin-top: 10px; display: none;" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
        <button id="botonAceptarCambioPassSplash" style="margin-top: 10px; display: none;" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal de notificaciones -->
<div id="modalNotificacion" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog " role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-circle"></span>&nbsp;&nbsp;Notificación</h5>
      </div>
      <div class="modal-body alerta-modal-body" style="text-align: left;">
        <h6 id="textoModalNotificacion"></h6>
			</div>
			<div class="modal-footer">
        <button id="buttonAceptarAlertaNotificacion" style="margin-top: 10px; display: none;" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal ingreso de personal interno -->
<div id="modalIngresoPersonalInterno" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoPersonalInterno"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Ingreso personal interno</h5>
      </div>
      <div id="bodyIngresoPersonalInterno" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos básicos</label>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI (*)</label>
            <input id="rutIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Apellidos (*)</label>
            <input id="apellidosIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombres (*)</label>
            <input id="nombresIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. nacimiento (*)</label>
            <input id="fechaNacIngresoPersonalInterno" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sexo</label>
						<select id="sexoIngresoPersonalInterno" class="form-control">
							<option value="Mujer">Mujer</option>
							<option value="Hombre">Hombre</option>
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado civil</label>
            <select id="estadoCivilIngresoPersonalInterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Situacion militar</label>
            <select id="sitMilitarIngresoPersonalInterno" class="form-control">
              <option value="Pendiente">Pendiente</option>
              <option value="Al día">Al día</option>
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono</label>
            <input id="telefonoIngresoPersonalInterno" class="form-control input-number" type="text" value="">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono emergencia</label>
            <input id="telefonoEmergenciaIngresoPersonalInterno" class="form-control input-number" type="text" value="">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Contacto emergencia</label>
            <input id="contactoIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nacionalidad</label>
            <select id="nacionalidadIngresoPersonalInterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Región</label>
            <select disabled id="regionIngresoPersonalInterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Provincia</label>
            <select disabled id="provinciaIngresoPersonalInterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaIngresoPersonalInterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos educacionales</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Nivel</label>
            <select id="nivelEduIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Profesión</label>
            <input id="profesionIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Especialidad</label>
            <input id="especialidadIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos laborales</label>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Centro costo</label>
            <select id="cecoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Servicio o Depto.</label>
            <select id="contratoDeptoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cliente</label>
            <select id="clienteIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Actividad</label>
            <select id="actividadIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha ingreso</label>
            <input id="fechaIngIngresoPersonalInterno" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Mano de obra</label>
            <select id="clasificacionIngresoPersonalInterno" class="form-control">
							<option value="MOD">MOD</option>
							<option value="MOI">MOI</option>
							<option value="MOE">MOE</option>
            </select>
          </div>
					<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cargo</label>
            <input id="cargoIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Nivel funcional</label>
            <select id="nivelFuncionalIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo contrato</label>
            <select id="tipoContratoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Requiere uniforme</label>
            <select id="requiereUniformeIngresoPersonalInterno" class="form-control">
							<option value="SI">Si</option>
							<option value="NO">No</option>
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Talla uniforme</label>
            <input id="tallaIngresoPersonalInterno" class="form-control" type="number" value="30" min="34" max="60">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Posee licencia</label>
            <select id="poseeLicenciaIngresoPersonalInterno" class="form-control">
							<option value="SI">Si</option>
							<option value="NO">No</option>
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo licencia</label>
            <select id="tipoLicenciaIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Sucursal</label>
            <select id="sucursalIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Sindicato</label>
            <select id="sindicatoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo jornada</label>
            <select id="tipoJornadaIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos salariales</label>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Sueldo base (bruto)</label>
            <input id="sueldoBaseIngresoPersonalInterno" class="form-control input-money" type="text" value="$ 0">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Forma pago</label>
						<select id="formaPagoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Banco</label>
						<select id="bancoPagoIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cuenta banco</label>
            <input id="cuentaBancoIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos previsionales</label>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">AFP</label>
						<select id="afpIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">(%) AFP</label>
            <input disabled id="afpPorcentajeIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">(%) SIS</label>
            <input disabled id="sisPorcentajeIngresoPersonalInterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Salud</label>
						<select id="saludIngresoPersonalInterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cargas fam.</label>
						<select id="cargasIngresoPersonalInterno" class="form-control">
							<option value="SI">Si</option>
							<option value ="NO">No</option>
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cant. Cargas</label>
            <input id="cantidadCargasIngresoPersonalInterno" class="form-control" type="number" value="0" min="0">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Plan APV</label>
            <input id="planAPVIngresoPersonalInterno" class="form-control" type="text">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Monto APV</label>
            <input id="montoAPVIngresoPersonalInterno" class="form-control input-money" type="text" value="$ 0">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoPersonalInterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoPersonalInterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESO DE USUARIO -->

<div id="modalIngresoUsuario" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoUsuario"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Ingreso usuario</h5>
      </div>
      <div id="bodyIngresoUsuario" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutIngresoUsuario" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Apellidos</label>
            <input id="apellidosIngresoUsuario" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombres</label>
            <input id="nombresIngresoUsuario" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-Mail</label>
            <input id="emailUsuario" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Perfil</label>
						<select id="perfilUsuario" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDesactivarUsuario" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDesactivarUsuario"><span class="fas fa-ban"></span>&nbsp;&nbsp;Desactivar usuario</h5>
      </div>
			<div id="bodyDesactivarUsuario" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea desactivar al usuario?</font>
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea desactivar al usuario?</br><i style="font-weight: normal; font-size: 11pt;" id="textoDesactivarUsuario"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDesactivarUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDesactivarUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarUsuario" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content editar usuario -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoUsuario"><span class="fas fa-user-edit"></span>&nbsp;&nbsp;Editar usuario</h5>
      </div>
      <div id="bodyEditarUsuario" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input disabled id="rutEditarUsuario" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre completo</label>
            <input id="nombreEditarUsuario" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-Mail</label>
            <input id="emailEditarUsuario" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Perfil</label>
						<select id="perfilEditarUsuario" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"  style="margin-top: 10pt;">
						<label style="font-weight: bold;">Estado</label>
						<select id="estadoEditarUsuario" class="form-control">
							<option value="Activo">Activo</option>
							<option value="Desactivado">Desactivado</option>
						</select>
					</div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODALES CONCEPTO REMUNERACIONES -->
<div id="modalIngresoConceptoRemuneracion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoConceptoRemuneracion"><span class="fas fa-plus"></span>&nbsp;&nbsp;Ingreso concepto de remuneración</h5>
      </div>
      <div id="bodyIngresoConceptoRemuneracion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Concepto</label>
            <input id="conceptoIngresoConceptoRemuneracion" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <select id="tipoIngresoConceptoRemuneracion" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Liquidación</label>
            <input id="liquidacionIngresoConceptoRemuneracion" class="form-control" disabled/>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Orden</label>
            <input id="ordenIngresoConceptoRemuneracion" class="form-control" disabled />
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarConceptoRemuneracion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarConceptoRemuneracion"><span class="fas fa-plus"></span>&nbsp;&nbsp;Editar concepto de remuneración</h5>
      </div>
      <div id="bodyEditarConceptoRemuneracion" class="modal-body alerta-modal-body">
        <input type="hidden" id="idComponenteEditarConceptoRemuneracion">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Concepto</label>
            <input id="conceptoEditarConceptoRemuneracion" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <select id="tipoEditarConceptoRemuneracion" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Liquidación</label>
            <input id="liquidacionEditarConceptoRemuneracion" class="form-control" disabled/>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Orden</label>
            <input id="ordenEditarConceptoRemuneracion" class="form-control" disabled/>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEliminarConceptoRemuneracion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarConceptoRemuneracion"><span class="fas fa-plus"></span>&nbsp;&nbsp;Eliminar concepto de remuneración</h5>
      </div>
      <div id="bodyEliminarConceptoRemuneracion" class="modal-body alerta-modal-body">
        <input type="hidden" id="idComponenteEliminarConceptoRemuneracion">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">¿Está seguro de querer eliminar el concepto <b><span id="conceptoEliminar"></span></b>?</label>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
        <button id="cancelarEliminarConceptoRemuneracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalResetPassUsuario" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloResetPassUsuario"><span class="fas fa-user-lock"></span>&nbsp;&nbsp;Resetear Contraseña usuario</h5>
      </div>
			<div id="bodyResetPassUsuario" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea resetear la contraseña del usuario?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloDesvincular"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarResetPassUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarResetPassUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODALES SINDICATO -->
<div id="modalIngresoSindicato" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray;" id="tituloIngresoSindicato"><span class="fas fa-plus"></span>&nbsp;&nbsp;Ingreso sindicato</h5>
            </div>
            <div id="bodyIngresoSindicato" class="modal-body alerta-modal-body">
                <div class="row" style="text-align: left; margin-bottom: 20pt;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Sindicato</label>
                        <input id="sindicatoIngresoSindicato" class="form-control" type="text" value="">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Descripción</label>
                        <input id="descripcionIngresoSindicato" class="form-control" type="text" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="guardarIngresoSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cancelarIngresoSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalEditarSindicato" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray;" id="tituloEditarSindicato"><span class="fas fa-plus"></span>&nbsp;&nbsp;Editar sindicato</h5>
            </div>
            <div id="bodyEditarSindicato" class="modal-body alerta-modal-body">
                <input type="hidden" id="idSindicatoEditarSindicato">
                <div class="row" style="text-align: left; margin-bottom: 20pt;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Sindicato</label>
                        <input id="sindicatoEditarSindicato" class="form-control" type="text" value="">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Descripción</label>
                        <input id="descripcionEditarSindicato" class="form-control" type="text" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="guardarEditarSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cancelarEditarSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalEliminarSindicato" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray;" id="tituloEliminarSindicato"><span class="fas fa-plus"></span>&nbsp;&nbsp;Eliminar sindicato</h5>
            </div>
            <div id="bodyEliminarSindicato" class="modal-body alerta-modal-body">
                <input type="hidden" id="idSindicatoEliminarSindicato">
                <div class="row" style="text-align: left; margin-bottom: 20pt;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label style="font-weight: bold; color: gray; font-size: 14pt;">¿Está seguro de querer eliminar el sindicato <b><span id="sindicatoEliminar"></span></b>?</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="guardarEliminarSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
                <button id="cancelarEliminarSindicato" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalIngresoPerfil" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray;" id="tituloIngresoPerfil"><span class="fas fa-plus"></span>&nbsp;&nbsp;Nuevo perfil</h5>
            </div>
            <div id="bodyIngresoPerfil" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
                <div class="row" style="text-align: left; margin-bottom: 20pt;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos:</label>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Nombre perfil</label>&nbsp;<labeL id="validacionIngresoPerfil" class="text-danger d-none">* Este campo no puede ir vacío</label>
                        <input id="nombreIngresoPerfil" class="form-control" type="text" value="">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Descripción</label>
                        <input id="descripcionIngresoPerfil" class="form-control" type="text" value="">
                    </div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt; display: none;">
											<label for="perfilInformeDisponibilidad">Informe Disponibilidad </label>
											<label class="switch">
												<input id="perfilInformeDisponibilidad" type="checkbox">
												<span class="slider round"></span>
											</label>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt;">
											<label for="perfilInformeMetas">Informe de Metas </label>&nbsp;&nbsp;
											<label class="switch">
												<input id="perfilInformeMetas" type="checkbox" >
												<span class="slider round"></span>
											</label>
										</div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="guardarIngresoPerfil" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cancelarIngresoPerfil" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalEditarPerfil" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray;" id="tituloEditarPerfil"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar perfil</h5>
            </div>
            <div id="bodyEditarPerfil" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
                <div class="row" style="text-align: left; margin-bottom: 20pt;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos:</label>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Nombre perfil</label>&nbsp;<labeL id="validacionEditarPerfil" class="text-danger d-none">* Este campo no puede ir vacío</label>
                        <input id="nombreEditarPerfil" class="form-control" type="text" value="">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
                        <label style="font-weight: bold;">Descripción</label>
                        <input id="descripcionEditarPerfil" class="form-control" type="text" value="">
                    </div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
					            <label style="font-weight: bold;">Asignación</label>
											<input disabled id="asignacionEditarPerfil" class="form-control">
					            </select>
					          </div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt; display: none;">
											<label for="perfilEditInformeDisponibilidad">Informe Disponibilidad </label>
											<label class="switch">
												<input id="perfilEditInformeDisponibilidad" type="checkbox">
												<span class="slider round"></span>
											</label>
										</div>
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt;">
											<label for="perfilEditInformeMetas">Informe de Metas </label>&nbsp;&nbsp;
											<label class="switch">
												<input id="perfilEditInformeMetas" type="checkbox" >
												<span class="slider round"></span>
											</label>
										</div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="guardarEditarPerfil" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cancelarEditarPerfil" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal listado areas de Perfil-->
<div id="modalAreasPerfil" class="modal modal-fullscreen fade" role="dialog">
	<script>
		$('#tablaListadoAreasPerfiles tbody').on( 'click', 'tr', function () {
			var table = $('#tablaListadoAreasPerfiles').DataTable();
			if ( $(this).hasClass('selected') ) {
	        $("#asignarPermisosPerfil").attr("disabled","disabled");
			}
			else {
					table.$('tr.selected').removeClass('selected');
	        $("#asignarPermisosPerfil").removeAttr("disabled");
			}
		});
	</script>

  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray;" id="tituloEditarPerfil"><span style="color: gray;" class="fas fa-user-friends">&nbsp;&nbsp;Listado de menú</span></h5>
				</div>
				<div id="bodyAreasPerfil" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Perfil</label>
							<input disabled id="nombrePerfilAreas" class="form-control">
							</input>
						</div>
						<div id="divTablaListadoAreasPerfiles" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; text-align: left;">
						  <table id="tablaListadoAreasPerfiles" class="cell-border compact" style="width: 100%;">
						    <thead>
						      <tr>
										<th class="celdaColor" style="border: 1pt solid white;">S</th>
										<th class="celdaColor" style="border: 1pt solid white;">IDAREA</th>
						        <th class="celdaColor" style="border: 1pt solid white;">Menú</th>
						        <th class="celdaColor" style="border: 1pt solid white;">Sub-Menú</th>
										<th class="celdaColor" style="border: 1pt solid white;">Tipo permiso</th>
										<th class="celdaColor" style="border: 1pt solid white;">Basico</th>
										<th class="celdaColor" style="border: 1pt solid white;">Filtro</th>
						      </tr>
						    </thead>
						    <tbody id="cuerpoTablaListadoAreasPerfiles" style="text-align: left;">
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="asignarAreaPerfil">
							<span class="fas fa-plus"></span>&nbsp;&nbsp;Agregar menú
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="asignarPermisosPerfil" disabled>
							<span class="fas fa-edit"></span>&nbsp;&nbsp;Permisos
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="cancelarAreaPerfil" data-dismiss="modal">
							Cerrar
						</button>
					</div>
				</div>
	  </div>
  </div>
</div>

<!-- Modal indica disponibilidad -->
<div id="modalDisponibilidad" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray;" id="tituloDisponibilidad"><span style="color: gray;" class="far fa-check-square">&nbsp;&nbsp;Disponibilidad</span></h5>
				</div>
				<div id="bodyDisponibilidad" class="modal-body alerta-modal-body" style="">
					<h6 id="textoDisponibilidad">¿Desea indicar disponible a las personas seleccionadas?</h6>
					<div class="input-group-sm" style="margin-top: 10pt;">
						<label>Teletrabajo</label>
						<br>
						<label class="switch">
							<input id="teletrabajoDisponibilidad" type="checkbox" title="Teletrabajo">
							<span class="slider round"></span>
						</label>
						<br>
						<br>
						<label>Proceso de inducción</label>
						<br>
						<label class="switch">
							<input id="induccionDisponibilidad" type="checkbox" title="Proceso de inducción">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarDisponibilidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarDisponibilidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<!-- Modal indica ausencia -->
<div id="modalAusencia" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="far fa-window-close"></span>&nbsp;&nbsp;
							<span>Ausencia</span>
							<span id="tituloAusencia" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyAusencia" class="modal-body alerta-modal-body" style="text-align: left;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Tipo ausencia</label>
							<select id="tipoAusencia" class="form-control">

	            </select>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <input id="observacionAusencia" class="form-control" type="text" value="">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. inicio</label>
	            <input id="fechaInicioAusencia" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. término</label>
	            <input id="fechaFinAusencia" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarAusencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarAusencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<div id="modalAgregarAreaPerfil" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray;" id="tituloAgregarAreaPerfil"><span style="color: gray;" class="fas fa-user-friends">&nbsp;&nbsp;Agregar menú</span></h5>
				</div>
					<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Perfil</label>
						<input disabled id="nombreAgregarAreaPerfil" class="form-control">
						</input>
					</div>
				<div id="bodyAreasPerfil" class="modal-body alerta-modal-body" style="overflow-y: scroll; margin-top: 10pt;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; margin-bottom: 10pt;">
							<label style="font-weight: bold; color: gray; font-size: 14pt;">Menú</label>
							<select multiple="multiple" id="areaPerfil" name="areaPerfil" class="form-control custom">
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="guardarAgregarAreaPerfil">Guardar</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="cancelarAgregarAreaPerfil" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
	  </div>
  </div>
</div>

<div id="modalPermisosPerfil" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-friends"></span>&nbsp;&nbsp;
							<span>Editar permisos</span>
							<span id="tituloPermisosPerfil" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyPermisosPerfil" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
					<div class="row" style="text-align: left;">
						<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Perfil</label>
							<input disabled id="nombrePerfilPermiso" class="form-control">
							</input>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Menú</label>
							<input disabled id="nombreAreaPermiso" class="form-control">
							</input>
						</div>
						<div style="margin-top: 10pt; text-align: center;" class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
	            <span>Jefatura</span>
							<br>
							<label style="margin-top: 10pt;" class="switch">
							  <input id="checkJefaturaPermisos" type="checkbox" title="Jefatura">
							  <span class="slider round"></span>
							</label>
	          </div>
						<div style="margin-top: 10pt; text-align: left;" class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
	            <span>Todos</span>
							<br>
							<label style="margin-top: 10pt;" class="switch">
							  <input id="checkTodosPermisos" type="checkbox" title="Jefatura">
							  <span class="slider round"></span>
							</label>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Filtro Informe</label>
							<input id="filtroInformePermisos" class="form-control">
							</input>
						</div>
					</div>
					<div class="row" style="text-align: left; margin-bottom: 10pt; margin-top: 10pt;">
						<div id="divProyecto" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; margin-bottom: 10pt;">
							<label style="font-weight: bold; color: gray; font-size: 14pt;">Centros de Costo</label>
							<select multiple="multiple" id="proyectoPerfil" name="proyectoPerfil" class="form-control custom">
							</select>
						</div>
					</div>
					<div class="row" style="text-align: left; margin-bottom: 10pt;">
						<div id="divAreaFuncional" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; margin-bottom: 10pt;">
							<label style="font-weight: bold; color: gray; font-size: 14pt;">Comunas</label>
							<select multiple="multiple" id="areaFuncionalPerfil" name="areaFuncionalPerfil" class="form-control custom">
							</select>
						</div>
					</div>
					<div id="divAccionesPerfil" class="row" style="text-align: left; margin-bottom: 10pt;">
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="guardarPermisoPerfil">Guardar</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="cancelarPermisoPerfil" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
	  </div>
  </div>
</div>

<div id="modalCambiarJefatura" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloCambiarJefatura"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Cambiar Jefatura</h5>
      </div>

			<div id="bodyCambiarJefatura" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Jefes</label>
            <select id="selectJefes" class="form-control">
            </select>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCambiarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarCambiarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalTransferirJefatura" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloTransferirJefatura"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Transferir Personal</h5>
      </div>

			<div id="bodyTransferirJefatura" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Jefatura</label>
            <select id="selectJefesTransfer" class="form-control">
            </select>
          </div>
        </div>
      </div>
<!--
      <label id="advertenciaTransferirJefatura1" style="color: red;">1 ó más personal no puede ser asignado al mismo jefe actualmente asignado</label>
      <label id="advertenciaTransferirJefatura2" style="color: red;">1 ó más personal no puede ser asignado a sí mismo como jefe</label>
 -->
			<div class="modal-footer" style="text-align: left;">
        <button disabled id="guardarTransferirJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarTransferirJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalTransferirJefaturaRespuesta" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

			<div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-check"></span>&nbsp;&nbsp;
					<span>Respuesta Transferencia Jefatura</span>
					<!-- <span id="tituloTransferirJefaturaRespuesta" style="font-size: 12pt;"></span> -->
				</h5>
      </div>

			<div id="bodyTransferirJefaturaRespuesta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						¿Desea aceptar la transferencia de:
						<span id="tituloTransferirJefaturaRespuesta"></span>?
					</div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
				<button id="aceptarTransferirJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
				<button id="rechazarTransferirJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Rechazar</button>
        <button id="cancelarTransferirJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalSolicitarJefatura" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloCambiarJefatura"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Solicitar Personal</h5>
      </div>

			<div id="bodySolicitarJefatura" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Personal</label>
            <table id="tablaPersonalSolicitar" class="cell-border compact" style="width: 100%;">
              <thead>
                <tr>
                  <th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="IDPERSONAL">IDPERSONAL</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="DNI">DNI</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="NOMBRES" >Nombres</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="APELLIDOS" >Apellidos</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="ESTADO" >Estado</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="RUTJEFEDIRECTO" >RUTJEFEDIRECTO</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="JEFE" >Jefatura</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="E-Mail" >E-Mail</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="ESTADO" >ESTADO</th>
                </tr>
              </thead>
              <tbody id="tablaPersonalSolicitar" style="text-align: left;">

              </tbody>
            </table>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarSolicitarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Solicitar</button>
        <button id="cancelarSolicitarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalSolicitarJefaturaRespuesta" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

			<div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-check"></span>&nbsp;&nbsp;
					<span>Respuesta Solicitud Jefatura</span>
					<!-- <span id="tituloTransferirJefaturaRespuesta" style="font-size: 12pt;"></span> -->
				</h5>
      </div>

			<div id="bodySolicitarJefaturaRespuesta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						¿Desea aceptar la solicitud de:
						<span id="tituloSolicitarJefaturaRespuesta"></span>?
					</div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
				<button id="aceptarSolicitarJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
				<button id="rechazarSolicitarJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Rechazar</button>
        <button id="cancelarSolicitarJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal ingreso proyecto -->
<div id="modalEliminarProyecto" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
								<h5 style="color:gray; font-weight: bold;"><span class="far fa-window-close"></span>&nbsp;&nbsp;
									<span>Eliminar Proyecto</span>
									<span id="tituloEliminarProyecto" style="font-size: 12pt; font-weight: bold;"></span>
								</h5>
            </div>
            <div id="bodyEliminarProyecto" class="modal-body alerta-modal-body">
							<font style="font-size: 12pt;">¿Esta seguro que desea eliminar el proyecto?</font>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="eliminarEliminarProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
                <button id="cancelarEliminarProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal listado cargas familiares-->
<div id="modalListadoCargas" class="modal modal-fullscreen fade" role="dialog">
	<script>
		$('#tablaListadoCargas tbody').on( 'click', 'tr', function () {
			var table = $('#tablaListadoCargas').DataTable();
			if ( $(this).hasClass('selected') ) {
	        $("#desvincularCargaPersonal").attr("disabled","disabled");
			}
			else {
					table.$('tr.selected').removeClass('selected');
	        $("#desvincularCargaPersonal").removeAttr("disabled");
			}
		});
	</script>

  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray;" id="tituloListadoCargas"><span style="color: gray;" class="fas fa-user-friends">&nbsp;&nbsp;Listado de cargas familiares</span></h5>
				</div>
				<div id="bodyListadoCargas" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Personal</label>
							<input disabled id="nombrePersonalCargas" class="form-control">
							</input>
						</div>
						<div id="divTablaListadoCargas" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; text-align: left;">
						  <table id="tablaListadoCargas" class="cell-border compact" style="width: 100%;">
						    <thead>
						      <tr>
										<th class="celdaColor" style="border: 1pt solid white;">S</th>
										<th class="celdaColor" style="border: 1pt solid white;">DNI</th>
						        <th class="celdaColor" style="border: 1pt solid white;">Nombre</th>
										<th class="celdaColor" style="border: 1pt solid white;">Fecha nacimiento</th>
										<th class="celdaColor" style="border: 1pt solid white;">Parentesco</th>
										<th class="celdaColor" style="border: 1pt solid white;">IDCARGAFAMILIAR</th>
						      </tr>
						    </thead>
						    <tbody id="cuerpoTablaListadoCargas" style="text-align: left;">
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="agregarCargaPersonal">
							<span class="fas fa-plus"></span>&nbsp;&nbsp;Agregar carga
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="desvincularCargaPersonal" disabled>
							<span class="fas fa-user-times"></span>&nbsp;&nbsp;Desvincular carga
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button class="form-control btn btn-secondary botonComun" id="cancelarCargaPersonal" data-dismiss="modal">
							Cerrar
						</button>
					</div>
				</div>
	  </div>
  </div>
</div>

<div id="modalAgregarCargaFamiliar" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAgregarCargaFamiliar"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Agregar carga familiar</h5>
      </div>
      <div id="bodyAgregarCargaFamiliar" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutAgregarCargaFamiliar" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre Completo</label>
            <input id="nombreAgregarCargaFamiliar" class="form-control" type="text" value="" placeholder="Ej: Elizabeth Alejandra Lopez Prado">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Nacimiento</label>
            <input id="fechaNacimientoAgregarCargaFamiliar" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Parentesco</label>
						<select id="parentescoAgregarCargaFamiliar" class="form-control">
							<option value="Hijo">Hijo(a)</option>
							<option value="Conyuge">Cónyuge</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarCargaFamiliar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarCargaFamiliar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div id="modalEliminarCargaFamiliar" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarCargaFamiliar"><span class="fas fa-user-times"></span>&nbsp;&nbsp;Eliminar carga familiar</h5>
      </div>
			<div id="bodyEliminarCargaFamiliar" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar esta carga familiar?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloDesvincularCargaFamiliar"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarCargaFamiliar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarCargaFamiliar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESO SUCURSAL -->
<div id="modalIngresoSucursal" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoSucursal"><span class="fas fa-map-marker-alt"></span>&nbsp;&nbsp;Ingreso Sucursal</h5>
      </div>
      <div id="bodyIngresoSucursal" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sucursal</label>
            <input id="sucursalIngresoSucursal" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaIngresoSucursal" class="form-control">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <select id="bodegaIngresoSucursal" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDITAR SUCURSAL -->
<div id="modalEditarSucursal" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarSucursal"><span class="fas fa-map-marker"></span>&nbsp;&nbsp;Editar Sucursal</h5>
      </div>
      <div id="bodyEditarSucursal" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sucursal</label>
            <input id="sucursalEditarSucursal" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaEditarSucursal" class="form-control">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <select id="bodegaEditarSucursal" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- AUTOCOMPLETADO DE GOOGLE MAPS PARA INGRESAR Y EDITAR SUCURSAL -->
<script>
  var input = document.getElementById('sucursalEditarSucursal');
  var input1 = document.getElementById('sucursalIngresoSucursal');
  var input2 = document.getElementById('direccionIngresoTaller');
  var input3 = document.getElementById('direccionEditarTaller');
  var input4 = document.getElementById('direccionIngresoAseguradora');
  var input5 = document.getElementById('direccionEditarAseguradora');
  var input6 = document.getElementById('direccionSiniestros');
  var input7 = document.getElementById('direccionPersonalSiniestros');
  var input8 = document.getElementById('direccionIngOrden');
  var input9 = document.getElementById('direccionMantProveedores');
  var autocomplete = new google.maps.places.Autocomplete(input);
  var autocomplete1 = new google.maps.places.Autocomplete(input1);
  var autocomplete2 = new google.maps.places.Autocomplete(input2);
  var autocomplete3 = new google.maps.places.Autocomplete(input3);
  var autocomplete4 = new google.maps.places.Autocomplete(input4);
  var autocomplete5 = new google.maps.places.Autocomplete(input5);
  var autocomplete6 = new google.maps.places.Autocomplete(input6);
  var autocomplete7 = new google.maps.places.Autocomplete(input7);
  var autocomplete8 = new google.maps.places.Autocomplete(input8);
  var autocomplete9 = new google.maps.places.Autocomplete(input9);
  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
  });
  $("#sucursalEditarSucursal").attr("placeholder","");
  $("#sucursalIngresoSucursal").attr("placeholder","");
  $("#direccionIngresoTaller").attr("placeholder","");
  $("#direccionEditarTaller").attr("placeholder","");
  $("#direccionIngresoAseguradora").attr("placeholder","");
  $("#direccionEditarAseguradora").attr("placeholder","");
  $("#direccionSiniestros").attr("placeholder","");
  $("#direccionPersonalSiniestros").attr("placeholder","");
  $("#direccionIngOrden").attr("placeholder","");
  $("#direccionMantProveedores").attr("placeholder","");
</script>
<!-- FIN AUTOCOMPLETADO -->

<!-- MODAL DESACTIVAR SUCURSAL -->
<div id="modalDesactivarSucursal" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDesactivarSucursal">&nbsp;&nbsp;</h5>
      </div>
			<div id="bodyDesactivarSucursal" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea <i id="textoNewEstadoSucursal"></i> la Sucursal?</font>
            <font style="font-weight: bold; font-size: 11pt;"></br><i style="font-weight: normal; font-size: 11pt;" id="textoDesactivarSucursal"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDesactivarSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDesactivarSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL TOMAR FOTO -->
<div id="modalTomarFoto" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloTomarFoto"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Tomar Foto</h5>
      </div>

			<div id="bodyTomarFoto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="camaraFormulario" style="width: 320px; height: 240px; border: 1px solid black;"></div>
            <div id="fotografias"></div>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCambiarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarCambiarJefatura" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL EDITAR TIPOVEHICULO -->
<div id="modalEditarTipoVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarTipoVehiculo"><span class="fas fa-car-alt"></span>&nbsp;&nbsp;Editar Tipo Vehiculo</h5>
      </div>
      <div id="bodyEditarTipoVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarTipoVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Licencia</label>
            <select id="licenciaEditarTipoVehiculo" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">CheckTipo</label>
            <select id="checkTipoEditarTipoVehiculo" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESO TALLERES -->
<div id="modalIngresoTaller" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoTaller"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Talleres</h5>
      </div>
      <div id="bodyIngresoTaller" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutIngresoTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Moneda</label>
            <select id="monedaIngresoTaller">
            </select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionIngresoTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaIngresoTaller" class="form-control"></select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Contacto</label>
            <input id="contactoIngresoTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-mail</label>
            <input id="emailIngresoTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Telefono</label>
            <input id="telefonoIngresoTaller" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoTaller" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoTaller" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDITAR TALLERES -->
<div id="modalEditarTaller" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarTaller"><span class="fas fa-toolbox"></span>&nbsp;&nbsp;Editar Taller</h5>
      </div>
      <div id="bodyEditarTaller" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutEditarTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Moneda</label>
            <select id="monedaEditarTaller">
            </select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionEditarTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaEditarTaller" class="form-control"></select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Contacto</label>
            <input id="contactoEditarTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-mail</label>
            <input id="emailEditarTaller" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Telefono</label>
            <input id="telefonoEditarTaller" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarTaller" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarTaller" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL RECUPERAR CONTRASEÑA -->
<div id="modalRecuperarContraseña" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog " role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloRecuperarContraseña"><span class="fas fa-user-lock"></span>&nbsp;&nbsp;Recuperación de contraseña</h5>
      </div>
      <div id="bodyRecuperarContraseña" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Ingrese su DNI</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <input id="dniRecuperarContraseña" class="form-control" type="text" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="solicitarRecuperarContraseña" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Solicitar</button>
        <button id="cancelarRecuperarContraseña" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL INGRESO ASEGURADORAS -->
<div id="modalIngresoAseguradora" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoAseguradora"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Aseguradora</h5>
      </div>
      <div id="bodyIngresoAseguradora" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutIngresoAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Moneda</label>
            <select id="monedaIngresoAseguradora">
            </select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionIngresoAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaIngresoAseguradora" class="form-control"></select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Telefono</label>
            <input id="telefonoIngresoAseguradora" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL EDITAR ASEGURADORAS -->
<div id="modalEditarAseguradora" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarAseguradora"><span class="fas fas fa-ambulance"></span>&nbsp;&nbsp;Editar Aseguradora</h5>
      </div>
      <div id="bodyEditarAseguradora" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutEditarAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Moneda</label>
            <select id="monedaEditarAseguradora">
            </select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionEditarAseguradora" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaEditarAseguradora" class="form-control"></select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Telefono</label>
            <input id="telefonoEditarAseguradora" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL ELIMINAR ASEGURADORA -->
<div id="modalEliminarAseguradora" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarAseguradora"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Aseguradora</h5>
      </div>
			<div id="bodyEliminarAseguradora" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea Eliminar la Aseguradora?</font>
            <font style="font-weight: bold; font-size: 11pt;"></br><i style="font-weight: normal; font-size: 11pt;" id="textoEliminarAseguradora"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarAseguradora" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div id="modalDesasignarJefaturaRespuesta" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

			<div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-check"></span>&nbsp;&nbsp;
					<span>Desasignar Personal</span>
					<!-- <span id="tituloTransferirJefaturaRespuesta" style="font-size: 12pt;"></span> -->
				</h5>
      </div>
			<div id="bodyDesasignarJefaturaRespuesta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						¿Desea desasignar de su jefatura los siguientes colaborares?
						<br>
						<span id="tituloDesasignarJefaturaRespuesta"></span>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<button id="aceptarDesasignarJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
				<button id="cancelarDesasignarJefaturaRespuesta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edita estado RRHH -->
<div id="modalEstadoRRHHInterno" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="fas fa-address-card"></span>&nbsp;&nbsp;
							<span>Estado RRHH</span>
							<span id="tituloEstadoRRHHInterno" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyEstado" class="modal-body alerta-modal-body" style="text-align: left;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Personal</label>
							</br>
							<span id="nombrePersonalInternoEstado" style="font-size: 11pt;"></span>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Estado RRHH</label>
							<select id="tipoEstadoRRHH" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <input id="observacionEstadoRRHH" class="form-control" type="text" value="">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. inicio</label>
	            <input id="fechaInicioEstadoRRHH" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. término</label>
	            <input id="fechaFinEstadoRRHH" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarEstadoRRHHInterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarEstadoRRHHInterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>


<!-- MODAL INGRESO PROVEEDORES -->
<div id="modalIngresoProveedores" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoProveedores"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Proveedores</h5>
      </div>
      <div id="bodyIngresoProveedores" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutIngresoProveedores" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoProveedores" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Propiedad</label>
						<select id="propiedadProveedores" class="form-control">
						</select>
					</div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nro. Contrato</label>
            <input id="contratoProveedores" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal activar ex personal/ desvinculados -->
<div id="modalActivarDesvinculado" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloActivarDesvinculado"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Activar Ex personal</h5>
      </div>
			<div id="bodyActivarDesvinculado" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea activar a este ex colaborador?</br><i style="font-weight: normal; font-size: 11pt;" id="datosActivarDesvinculado"></i></font>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold; font-size: 11pt;">Observación</label>
	            <input id="observacionActivarDesvinculado" class="form-control" type="text" value="">
	        </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarActivarDesvinculador" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarActivarDesvinculado" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal ingreso subcontratista -->
<div id="modalIngresoSubcontratista" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoSubcontratista"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Empresa</h5>
      </div>
      <div id="bodyIngresoSubcontratista" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutIngresoSubcontratista" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Subcontratista</label>
						<br>
						<label class="switch">
							<input id="esSubcontratoIngresoSubcontratista" type="checkbox" title="Subcontratista">
							<span class="slider round"></span>
						</label>
					</div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre Empresa</label>
            <input id="nombreIngresoSubcontratista" class="form-control" type="text" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoSubcontratista" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoSubcontratista" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL EDITAR PROVEEDORES -->
<div id="modalEditarProveedores" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarProveedores"><span class="fab fa-product-hunt"></span>&nbsp;&nbsp;Editar Proveedores </h5>
      </div>
      <div id="bodyEditarProveedores" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input id="rutEditarProveedores" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarProveedores" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Propiedad</label>
						<select id="propiedadEditarProveedores" class="form-control">
						</select>
					</div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nro. Contrato</label>
            <input id="contratoEditarProveedores" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar subcontratista -->
<div id="modalEditarSubcontratista" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarSubcontratista"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar empresa</h5>
      </div>
      <div id="bodyEditarSubcontratista" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
            </div>
          <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">RUT</label>
            <input disabled id="rutEditarSubcontratista" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Subcontratista</label>
						<br>
						<label class="switch">
							<input id="esSubcontratoEditarSubcontratista" type="checkbox" title="Subcontratista">
							<span class="slider round"></span>
						</label>
					</div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre subcontratista</label>
            <input id="nombreEditarSubcontratista" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12"  style="margin-top: 10pt;">
						<label style="font-weight: bold;">Estado</label>
						<select id="estadoEditarSubcontratista" class="form-control">
							<option value="Activo">Activo</option>
							<option value="Desactivado">Desactivado</option>
						</select>
					</div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarSubcontratista" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarSubcontratista" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edita estado RRHH Personal Externo -->
<div id="modalEstadoRRHHExterno" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="fas fa-address-card"></span>&nbsp;&nbsp;
							<span>Estado RRHH2</span>
							<span id="tituloEstadoRRHHExterno" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyEstado" class="modal-body alerta-modal-body" style="text-align: left;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Personal</label>
							</br>
							<span id="nombrePersonalExternoEstado" style="font-size: 11pt;"></span>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Estado RRHH</label>
							<select id="tipoEstadoRRHH2" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <input id="observacionEstadoRRHH2" class="form-control" type="text" value="">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. inicio</label>
	            <input id="fechaInicioEstadoRRHH2" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">F. término</label>
	            <input id="fechaFinEstadoRRHH2" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarEstadoRRHHExterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarEstadoRRHHExterno " style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<div id="modalAgregarMeta" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
							<span>Agregar Meta Práctica</span>
							<span id="tituloAgregarMeta" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyAgregarMeta" class="modal-body alerta-modal-body" style="text-align: left;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Perfil</label>
							<select id="perfilAgregarMeta" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Periodo</label>
	            <input id="periodoAgregarMeta" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Auditoria</label>
							<select id="auditoriaAgregarMeta" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Meta</label>
	            <input id="metaAgregarMeta" class="form-control" type="number" value="1" min="1">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Ciclo</label>
							<select id="cicloAgregarMeta" class="form-control">
								<option value="Diaria">Diaria</option>
								<option value="Semanal">Semanal</option>
								<option value="Mensual">Mensual</option>
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Permanente</label>
							<select id="permanenteAgregarMeta" class="form-control">
								<option value="1">Si</option>
								<option value="2">No</option>
	            </select>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <textarea id="observacionAgregarMeta" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
	          </div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarAgregarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarAgregarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<div id="modalEditarMeta" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
							<span>Editar Meta Práctica</span>
							<span id="tituloEditarMeta" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyEditarMeta" class="modal-body alerta-modal-body" style="text-align: left;">
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Perfil</label>
							<select disabled id="perfilEditarMeta" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Periodo</label>
	            <input disabled id="periodoEditarMeta" class="form-control" type="text" value="" onfocus="blur();">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Auditoria</label>
							<select disabled id="auditoriaEditarMeta" class="form-control">
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Meta</label>
	            <input id="metaEditarMeta" class="form-control" type="number" value="1" min="1">
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Ciclo</label>
							<select id="cicloEditarMeta" class="form-control">
								<option value="Diaria">Diaria</option>
								<option value="Semanal">Semanal</option>
								<option value="Mensual">Mensual</option>
	            </select>
	          </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Permanente</label>
							<select id="permanenteEditarMeta" class="form-control">
								<option value="1">Si</option>
								<option value="2">No</option>
	            </select>
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <textarea id="observacionEditarMeta" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
	          </div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarEditarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarEditarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<div id="modalEliminarMeta" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;
						<span>Eliminar Meta Práctica</span>
						<span id="tituloEliminarMeta" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyEliminarMeta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">¿Está seguro de querer eliminar la meta seleccionada?</label>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
        <button id="cancelarEliminarMeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalPDFApp" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog modal-lg" style="text-align: center;" id="modalPDFAPPMed">
		<div class="modal-content">
			<div class="modal-body alerta-modal-body">
	      <div id="bodyModalPDFAPPMed">
	        <object id="loadPDFApp" type="" data="">

	        </object>
	      </div>
			</div>
    </div>
  </div>
</div>

<div id="modalPracticaMetaDetalle" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="fas fa-clipboard-list"></span>&nbsp;&nbsp;
						<span>Avance Metas - Detalle</span>
						<br>
						<span id="tituloPracticaMetaDetalle" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyPracticaMetaDetalle" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<table id="tablaPracticaMetaDetalle" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="Tipo Auditoria">Tipo Auditoria</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="Ciclo">Ciclo</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="Meta Mensual" >Meta Mensual</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM1"># Sem1</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM2"># Sem2</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM3"># Sem3</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM4"># Sem4</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM5"># Sem5</th>
					        <th class="celdaColor" style="border: 1pt solid white;" title="SEM6"># Sem6</th>
				          <th class="celdaColor" style="border: 1pt solid white;" title="# Realizadas "># Total</th>
				          <th class="celdaColor" style="border: 1pt solid white;" title="Cumplimiento semanal">Cumplimiento semanal</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoPracticaMetaDetalle" style="text-align: left;">

					    </tbody>
					  </table>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="cerrarPracticaMetaDetalle" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalCargaImgPersonal" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="far fa-image"></span>&nbsp;&nbsp;
						<span>Cargar imagen de personal</span>
						<br>
						<span id="tituloCargarImgPersonal" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyCargarImgPersonal" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label style="font-weight: bold;">Subir imagen</label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-camera"></span>&nbsp;&nbsp;Foto<input type="file" id='fotoCargarImgPersonal' accept="image/*" style="display: none;">
									</span>
							</label>
							<input disabled id='inputFotoCargarImgPersonal' type="text" class="form-control" readonly>
						</div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCargarImgPersonal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCargarImgPersonal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalFallasPracticasPersonas" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="fas fa-users-cog"></span>&nbsp;&nbsp;
						<span>Detalle Fallas Por Colaborador</span>
						<br>
						<span id="tituloFallasPracticasPersonas" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyFallasPracticasPersonas" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div id="tablaFallasPracticasPersonasPadre" style="text-align: right;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				  </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="cerrarFallasPracticasPersonas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESO PERSONAL EXTERNO -->
<div id="modalIngresoPersonalExterno" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoPersonalExterno"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Ingreso personal externo</h5>
      </div>
      <div id="bodyIngresoPersonalExterno" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos básicos</label>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutIngresoPersonalExterno" class="form-control" type="text" value="" placeholder="Ej: 12345678-9">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Apellidos</label>
            <input id="apellidosIngresoPersonalExterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombres</label>
            <input id="nombresIngresoPersonalExterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. nacimiento </label>
            <input id="fechaNacIngresoPersonalExterno" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sexo</label>
						<select id="sexoIngresoPersonalExterno" class="form-control">
							<option value="Mujer">Mujer</option>
							<option value="Hombre">Hombre</option>
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado civil</label>
            <select id="estadoCivilIngresoPersonalExterno" class="form-control">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Situacion militar</label>
            <select id="sitMilitarIngresoPersonalExterno" class="form-control">
              <option value="Pendiente">Pendiente</option>
              <option value="Al día">Al día</option>
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono</label>
            <input id="telefonoIngresoPersonalExterno" class="form-control input-number" type="text" value="">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono emergencia</label>
            <input id="telefonoEmergenciaIngresoPersonalExterno" class="form-control input-number" type="text" value="">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Contacto emergencia</label>
            <input id="contactoIngresoPersonalExterno" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nacionalidad</label>
            <select id="nacionalidadIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos laborales</label>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Centro costo</label>
            <select id="cecoIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Servicio o Depto.</label>
            <select id="contratoDeptoIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cliente</label>
            <select id="clienteIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Actividad</label>
            <select id="actividadIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha ingreso</label>
            <input id="fechaIngIngresoPersonalExterno" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Mano de obra</label>
            <select id="clasificacionIngresoPersonalExterno" class="form-control">
							<option value="MOD">MOD</option>
							<option value="MOI">MOI</option>
							<option value="MOE">MOE</option>
            </select>
          </div>
					<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cargo</label>
            <input id="cargoIngresoPersonalExterno" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Nivel funcional</label>
            <select id="nivelFuncionalIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo contrato</label>
            <select id="tipoContratoIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Requiere uniforme</label>
            <select id="requiereUniformeIngresoPersonalExterno" class="form-control">
							<option value="SI">Si</option>
							<option value="NO">No</option>
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Talla uniforme</label>
            <input id="tallaIngresoPersonalExterno" class="form-control" type="number" value="30" min="34" max="60">
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Posee licencia</label>
            <select id="poseeLicenciaIngresoPersonalExterno" class="form-control">
							<option value="SI">Si</option>
							<option value="NO">No</option>
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo licencia</label>
            <select id="tipoLicenciaIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Sucursal</label>
            <select id="sucursalIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo jornada</label>
            <select id="tipoJornadaIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Subcontrato</label>
            <select id="subcontratoIngresoPersonalExterno" class="form-control">
            </select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <hr class="hr-separador">
          </div>
      </div>
    	</div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoPersonalExterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoPersonalExterno" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
  </div>
</div>
</div>


<!-- MODAL CREAR ASIGNACION VEHICULO -->
<div id="modalAsignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h5 style="color:gray;" id="tituloAsignacionVehiculo"><span class="fas fa-clipboard-check"></span>&nbsp;&nbsp;Asignar Vehiculo</h5><br>
          <h5 style="color:red; font-weight: Semi-bold; font-size: 18px; margin-top: -20px;">Licencia:&nbsp;<span id="licenciaAsignacionVehiculo"></span></h5><br>
          <h5 style="color:red; font-weight: Semi-bold; font-size: 18px; margin-top: -30px;">Proyecto Colaborador:&nbsp;<span id="proyectoAsignacionVehiculo"></span> </h5>
        </div>
      </div>
      <div id="bodyAsignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <select id="patenteAsignacionVehiculo" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Teléfono</label>
            <input id="telefonoAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <input id="bodegaAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje</label>
            <input id="kilometrajeAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Área de Negocio</label>
            <input id="negocioAsignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="observacionAsignacionVehiculo" class="form-control" rows="3" style="resize: none;" maxlength="1000"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 25pt;">
            <label style="font-weight: bold; color: black;">Chequeo de Elementos</label><br>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="row" id ="checkbox"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ASIGNACION VEHICULO -->

<!-- MODAL SUBIR PDF ASIGNACION VEHICULO -->
<div id="modalSubirPdfAsignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfAsignacionVehiculo" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirPdfAsignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Checklist (firmado) <b><span id="spanChecklist" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaChecklist' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfChecklist' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Licencia de Conducir <b><span id="spanLicencia" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaLicencia' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfLicencia' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF Asignación (firmado) <b><span id="spanAsignacion" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaAsignacion' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfAsignacion' type="text" class="form-control" readonly>
						</div>
          </div>
        </div>
        <div class="modal-footer" style="text-align: left;">
        <button id="guardarSubirPdfAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirPdfAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SUBIR PDF ASIGNACION VEHICULO -->

<!-- MODAL VALIDAR ASIGNACION VEHICULO  -->
<div id="modalValidarAsignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloValidarAsignacionVehiculo"><span class="fas fa-check"></span>&nbsp;&nbsp;Validar Asignacion</h5>
      </div>
			<div id="bodyValidarAsignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea Validar la Asignación?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br>Patente <i style="font-weight: normal; font-size: 14pt;" id="patenteValidarAsignacion"></i> asignada a <i style="font-weight: normal; font-size: 14pt;" id="personalValidarAsignacion"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarValidarAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarValidarAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL VALIDAR ASIGNACION VEHICULO -->


<!-- MODAL ANULAR ASIGNACION VEHICULO -->
<div id="modalAnularAsignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloAnularAsignacionVehiculo"><span class="far fa-window-close"></span>&nbsp;&nbsp;Anular Asignación</h5>
      </div>
			<div id="bodyAnularAsignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea Anular la Asignación?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br>Patente <i style="font-weight: normal; font-size: 14pt;" id="patenteAnularAsignacion"></i> asignada a <i style="font-weight: normal; font-size: 14pt;" id="personalAnularAsignacion"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAnularAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAnularAsignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ANULAR ASIGNACION VEHICULO -->

<!-- MODAL INGRESO CLAUSULAS -->
<div id="modalIngresoClausulas" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoClausulas"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Cláusulas</h5>
      </div>
      <div id="bodyIngresoClausulas" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cláusula</label>
            <textarea id="clausulaIngresoClausulas" class="form-control" rows="4" style="resize: none;" maxlength="9900"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO CLAUSULAS -->

<!-- MODAL EDITAR CLAUSULAS -->
<div id="modalEditarClausulas" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarClausulas"><span class="far fa-file-alt"></span>&nbsp;&nbsp;Editar Cláusula </h5>
      </div>
      <div id="bodyEditarClausulas" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cláusula</label>
            <textarea id="clausulaEditarClausulas" class="form-control" rows="4"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR CLAUSULAS -->

<!-- MODAL ELIMINAR CLAUSULAS -->
<div id="modalEliminarClausulas" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarClausulas"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Cláusula</h5>
      </div>
			<div id="bodyEliminarClausulas" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea Eliminar la Cláusula?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="clausulaEliminarClausulas"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarClausulas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR CLAUSULAS -->

<!-- MODAL CREAR DESASIGNACION VEHICULO -->
<div id="modalDesasignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <h5 style="color:gray;" id="tituloDesasignacionVehiculo"><span class="far fa-calendar-times"></span>&nbsp;&nbsp;Desasignar Vehiculo</h5><br>
          <h5 style="color:red; font-weight: Semi-bold; font-size: 18px; margin-top: -20px;">Licencia:&nbsp;<span id="licenciaDesasignacionVehiculo"></span></h5><br>
          <h5 style="color:red; font-weight: Semi-bold; font-size: 18px; margin-top: -30px;">Proyecto Colaborador:&nbsp;<span id="proyectoDesasignacionVehiculo"></span> </h5>
					<input id="idAsigDesasignacionVehiculo" type="hidden" name="" value="">
        </div>
      </div>
      <div id="bodyDesasignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input id="patenteDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Teléfono</label>
            <input id="telefonoDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <input id="bodegaDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje</label>
            <input id="kilometrajeDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Área de Negocio</label>
            <input id="negocioDesasignacionVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="observacionDesasignacionVehiculo" class="form-control" rows="3" style="resize: none;" maxlength="1000"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 25pt;">
            <label style="font-weight: bold; color: black;">Chequeo de Elementos</label><br>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="row" id ="checkboxDesasigancion"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DEASIGNACION VEHICULO -->

<!-- MODAL SUBIR PDF DESASIGNACION VEHICULO -->
<div id="modalSubirPdfDesasignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfDesasignacionVehiculo" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirPdfDesasignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Checklist (firmado) <b><span id="spanChecklistDes" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id="pdfCargaChecklistDes" style="display: none;">
									</span>
							</label>
							<input disabled id="inputPdfChecklistDes" type="text" class="form-control" readonly>
						</div>
          </div>
        </div>
        <div class="modal-footer" style="text-align: left;">
        <button id="guardarSubirPdfDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirPdfDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SUBIR PDF DESASIGNACION VEHICULO -->

<div id="modalNuevaConfiguracion" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloCambiarJefatura"><span class="far fa-plus-square"></span>&nbsp;&nbsp;Asignar Configuración</h5>
      </div>

			<div id="bodyNuevaConfiguracion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label class="labelComun">Resolutor</label>
            <select id="selectIncidenciaUsuario" class="form-control" title="Usuario">
            </select>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label class="labelComun">SLA</label>
            <select id="selectIncidenciaSLATipo" class="form-control" title="Usuario">
            </select>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label class="labelComun">Cantidad</label>
            <select id="selectIncidenciaSLAQuantity" class="form-control" title="Usuario">
            </select>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="enviarIncidenciaConfiguracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarNuevaConfiguracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarConfiguracion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-minus-square"></span>&nbsp;&nbsp;
          <span>Eliminar configuración</span>
          <br>
          <span id="tituloEliminarConfiguracion" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarConfiguracion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar estas configuraciones seleccionadas?</font>
            <font style="font-weight: nomal; font-size: 11pt;"></br><i style="font-weight: normal; font-size: 14pt;"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarConfiguracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
        <button id="cancelarEliminarConfiguracion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalCambiarIncidenciaEstado" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloCambiarIncidenciaEstado"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Cambiar Estado</h5>
      </div>

			<div id="bodyCambiarIncidenciaEstado" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Estados</label>
            <select id="selectIncidenciaEstados" class="form-control">
            </select>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
          <label style="font-weight: bold; color: gray; font-size: 14pt;">Comentarios:</label>
            <textarea id="comentarioIncidenciaEstados" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCambiarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarCambiarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalConfirmarIncidenciaEstado" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloConfirmarIncidenciaEstado"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Confirmar Incidencia Resuelta</h5>
      </div>

			<div id="bodyConfirmarIncidenciaEstado" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Estados</label>
            <select id="selectIncidenciaEstados2" class="form-control">
            </select>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Comentarios:</label>
            <textarea id="comentarioIncidenciaConfirmar" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarConfirmarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarConfirmarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalReactivarIncidenciaEstado" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloRactivarIncidenciaEstado"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Reactivar Incidencia Rechazada</h5>
      </div>

			<div id="bodyReactivarIncidenciaEstado" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>¿Está seguro que desea reactivar la incidencia?</label>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
          <label style="font-weight: bold; color: gray; font-size: 14pt;">Comentarios:</label>
            <textarea id="comentarioIncidenciaReactivar" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarReactivarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarReactivarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalDerivarIncidenciaEstado" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDerivarIncidenciaEstado"><span class="fas fa-exchange-alt"></span>&nbsp;&nbsp;Derivar Incidencia</h5>
      </div>

			<div id="bodyDerivarIncidenciaEstado" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Usuarios</label>
            <select id="selectUsuarios" class="form-control">
            </select>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
          <label style="font-weight: bold; color: gray; font-size: 14pt;">Comentarios:</label>
            <textarea id="comentarioIncidenciaDerivar" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDerivarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarDerivarEstadoIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalHistorialIncidencia" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

			<div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-double"></span>&nbsp;&nbsp;
					<span>Historial Incidencia</span>
					<br>
					<span id="tituloHistorialIncidencia" style="font-size: 12pt;"></span>
				</h5>
      </div>

			<div id="bodyHistorialIncidencia" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Cambios</label>

            <div id="divTablaHistorialIncidencia" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; text-align: left;">
              <table id="tablaHistorialIncidencia" class="cell-border compact" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Folio">Folio</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Estado">Estado</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Area">Area</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Item">Item</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Elemento">Elemento</tH>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Anomalia">Anomal&iacute;a</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Departamento">Departamento</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Alerta" >Alerta</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Prioridad">Prioridad</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Servicio" >Servicio</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Cliente" >Cliente</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Actividad" >Actividad</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Generador" >Generador</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Resolutor" >Resolutor</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Fecha" >Fecha</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Hora" >Hora</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Ejecutor" >Ejecutor</th>
                    <th class="celdaColor" style="border: 1pt solid white;" title="Observaciones" >Observaciones</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTablaHistorialIncidencia" style="text-align: left;">

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarHistorialIncidencia" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarZonaOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-eraser"></span>&nbsp;&nbsp;
          <span>Eliminar zona</span>
          <br>
          <span id="tituloEliminarZonaOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarZonaOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar estas zonas seleccionadas?</font>
            <font style="font-weight: nomal; font-size: 11pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="detalleEliminarZonaOrden"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarZonaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
        <button id="cancelarEliminarZonaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalActivarZonaOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-double"></span>&nbsp;&nbsp;
          <span id="tituloActivarZonaOrden"></span>
        </h5>
      </div>
			<div id="bodyActivarZonaOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleActivarZonaOrden"></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarActivarZonaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarActivarZonaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalConfigurarZonas" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Configurar zonas</span>
          <br>
          <span id="tituloConfigurarZonas" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyConfigurarZonas" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
						<select id="proyectoConfigurarZonas" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Area</label>
						<input disabled id="areaConfigurarZonas" class="form-control" type="text" value=" ">
          </div>
					<div id="divZonaConfigurarZonas" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">

          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarConfigurarZonas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarConfigurarZonas" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ANULAR DESASIGNACION VEHICULO -->
<div id="modalAnularDesasignacionVehiculo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloAnularDesasignacionVehiculo"><span class="far fa-window-close"></span>&nbsp;&nbsp;Anular Desasignación</h5>
      </div>
			<div id="bodyAnularDesasignacionVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea Anular la Desasignación?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br>Patente <i style="font-weight: normal; font-size: 14pt;" id="patenteAnularDesasignacion"></i> asignada a <i style="font-weight: normal; font-size: 14pt;" id="personalAnularDesasignacion"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAnularDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAnularDesasignacionVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ANULAR DESASIGNACION VEHICULO -->

<!--- Modal Agendar OT -->
<div id="modalAsignarAgendarOrden" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="far fa-calendar-check"></span>&nbsp;&nbsp;
									<span>Agendar Orden</span>
									<br>
									<span id="tituloAsignarAgendarOrden" style="font-size: 12pt; weight: bold;"></span>
								</h5>
            </div>
            <div id="bodyAsignarAgendarOrden" class="modal-body alerta-modal-body" style="text-align: left; overflow-y: scroll;">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
									<label style="font-weight: bold;">Fecha agenda</label>
			            <input id="fechaCompromisoAgendarOrden" class="form-control" type="text" value="" onfocus="blur();">
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
			            <label style="font-weight: bold;">Tramo</label>
									<select id="rangoAgendarOrden" class="form-control">

			            </select>
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
									<label style="font-weight: bold;">DNI</label>
			            <input disabled id="rutClienteAgendarOrden" class="form-control" type="text" value="">
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
									<label style="font-weight: bold;">Nombre</label>
			            <input disabled id="clienteAgendarOrden" class="form-control" type="text" value="">
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
			            <label style="font-weight: bold;">Region</label>
									<select disabled id="regionAgendarOrden" class="form-control">

			            </select>
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
			            <label style="font-weight: bold;">Comuna</label>
									<select disabled  id="comunaAgendarOrden" class="form-control">

			            </select>
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
									<label style="font-weight: bold;">Dirección</label>
			            <input disabled id="direccionAgendarOrden" class="form-control" type="text" value="">
			          </div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
									<label style="font-weight: bold;">Fono</label>
			            <input id="fonoAgendarOrden" class="form-control" type="text" value="">
			          </div>
							</div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarAgendarOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarAgendarOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Mapa orednes -->
<div id="modalMapaOrden" class="modal modal-fullscreen fade" role="dialog" style="z-index: 2500;">
    <div class="modal-dialog modal-dialog-box modal-xl" role="document">

        <!-- Modal content-->
        <div class="modal-content">
						<div class="modal-header">
								<h5 style="color:gray; font-weight: bold;"><span class="fas fa-map-marked-alt"></span>&nbsp;&nbsp;
									<span>Mapa Orden</span>
									<br>
									<span id="tituloMapaOrden" style="font-size: 12pt; weight: bold;"></span>
								</h5>
						</div>
            <div id="bodyMapaOrden" class="modal-body alerta-modal-body">
                <input type="hidden" id="idmodalMapaOrden">
                <div id="mapaOrdenGoogle" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="cerrarModalMapaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DESCUENTO SINIESTROS -->
<div id="modalDescuentoSiniestros" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloDescuentoSiniestros"><span class="fas fa-dollar-sign"></span>&nbsp;&nbsp;Excepción / Descuento</h5>
      </div>
      <div id="bodyDescuentoSiniestros" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Excepción / Descuento</label>
            <select id="selectDescuentoSiniestros" class="form-control">
              <option value="Excepción">Excepción</option>
							<option value="Descuento">Descuento</option>
              <option value="Descuento Proyecto">Descuento Proyecto</option>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Costo Total</label>
            <input id="costoTotalSiniestros" type="number" class="form-control" min="0" value="0">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto Descuento</label>
            <input id="montoDescuentoSiniestros" type="number" class="form-control" min="0" value="0">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Generar PDF</label>
            <br>
            <label class="switch" style="margin-top: 5pt; text-align: center;">
              <input id="checkboxGenerarPdfDesc" type="checkbox" title="Generar Pdf Descuento">
              <span class="slider round"></span>
            </label>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarDescuentoSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDescuentoSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DESCUENTO SINIESTROS -->

<!-- MODAL N_SINIESTRO SINIESTROS -->
<div id="modalNumeroSiniestros" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloNumeroSiniestros"><span class="fas fa-file-invoice"></span>&nbsp;&nbsp;Ingresar Número de Siniestro</h5>
      </div>
      <div id="bodyNumeroSiniestros" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número de Siniestro</label>
            <input id="ingresoNumeroSiniestros" type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarNumeroSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarNumeroSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL N_SINIESTRO SINIESTROS -->

<!-- MODAL N_FACTURA SINIESTROS -->
<div id="modalFacturaSiniestros" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloFacturaSiniestros"><span class="fas fa-file-invoice-dollar"></span>&nbsp;&nbsp;Ingresar Número de Factura</h5>
      </div>
      <div id="bodyFacturaSiniestros" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número de Factura</label>
            <input id="ingresoFacturaSiniestros" type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarFacturaSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFacturaSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL N_FACTURA SINIESTROS -->

<!-- MODAL SUBIR PDF SINIESTROS -->
<div id="modalSubirPdfSiniestros" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfSiniestros" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirPdfSiniestros" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Siniestro <b><span id="spanSiniestro" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaSiniestro' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfSiniestro' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Declaración <b><span id="spanDeclaracion" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaDeclaracion' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfDeclaracion' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF Decl. Aseg. <b><span id="spanDeclAseg" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaDeclAseg' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfDeclAseg' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Licencia <b><span id="spanLicencia" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaLicenciaSiniestro' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfLicenciaSiniestro' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF Descuento <b><span id="spanDescuento" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaDescuento' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfDescuento' type="text" class="form-control" readonly>
						</div>
          </div>

        </div>
        <div class="modal-footer" style="text-align: left;">
        <button id="guardarSubirPdfSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirPdfSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SUBIR PDF SINIESTROS -->

<!-- MODAL INGRESO SINIESTROS -->
<div id="modalIngresoSiniestros" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray; font-weight: bold;"><span class="fas fa-car-crash"></span>&nbsp;&nbsp;
          <span>Ingreso Siniestros</span>
          <br>
          <span id="cantSiniestrosPersonal" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodyIngresoSiniestros" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos Personales</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutPersonalSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombrePersonalSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Correo</label>
            <input id="correoPersonalSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección</label>
            <input id="direccionPersonalSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaPersonalSiniestros" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Celular</label>
            <input id="celularPersonalSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt;">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos del Vehículo</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input id="patenteVehiculoSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaVehiculoSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloVehiculoSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoVehiculoSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Piezas dañadas</label>
            <textarea id="piezasDañadasVehiculoSiniestros" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt;">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos del Siniestro</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Siniestro</label>
            <input id="fechaSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Hora Siniestro</label>
            <input id="horaSiniestros" class="form-control" type="time" value=" ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección Siniestro</label>
            <input id="direccionSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo Siniestro</label>
            <select id="tipoSiniestros" class="form-control">
              <option value="Menor">Menor</option>
							<option value="Leve">Leve</option>
              <option value="Mayor">Mayor</option>
              <option value="Pérdida Total">Pérdida Total</option>
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">N° Parte</label>
            <input id="parteSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comisaria</label>
            <input id="comisariaSiniestros" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaSiniestros" class="form-control"></select>
          </div>
          <div style="margin-bottom: 10pt; margin-top: 20pt; text-align: left;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos del Tercero</label>
            <br>
            <label class="switch" style="margin-top: 5pt; text-align: center;">
              <input id="checkboxDatosTerceroSiniestros" type="checkbox" title="Mostrar datos del tercero">
              <span class="slider round"></span>
            </label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row" id ="datosTerceroSiniestros"></div>
          </div>

          <div style="margin-bottom: 10pt; margin-top: 20pt; text-align: left;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Daños a infraestructura</label>
            <br>
            <label class="switch" style="margin-top: 5pt; text-align: center;">
              <input id="checkboxDanosInfra" type="checkbox" title="Mostrar datños a infraestructura">
              <span class="slider round"></span>
            </label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row" id ="datosDanoInfra"></div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 15pt;">
            <label style="font-weight: bold;">Descripción</label>
            <textarea id="descripcionSiniestros" class="form-control" rows="3" style="resize: none;" maxlength="500"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoSiniestros" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO SINIESTROS -->

<!-- Modal asignar despacho a ordenes -->
<div id="modalAsignarDespachoOrdenes" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="fas fa-headset"></span>&nbsp;&nbsp;
									<span>Asignar despacho</span>
									<br>
									<span id="tituloAsignarDespachoOrdenes" style="font-size: 12pt;"></span>
								</h5>
            </div>
            <div id="bodyAsignarDespachoOrdenes" class="modal-body alerta-modal-body" style="text-align: left;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <label style="font-weight: bold;">Despacho</label>
								<select id="despachoAsignarDespachoOrdenes" class="form-control">

		            </select>
		          </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarDespachoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarDespachoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal asignar técnico a ordenes -->
<div id="modalAsignarTecnicoOrdenes" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-alt"></span>&nbsp;&nbsp;
									<span>Asignar técnico</span>
									<br>
									<span id="tituloAsignarTecnicoOrdenes" style="font-size: 12pt;"></span>
								</h5>
            </div>
            <div id="bodyAsignarTecnicoOrdenes" class="modal-body alerta-modal-body" style="text-align: left;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <label style="font-weight: bold;">Técnico</label>
								<select id="despachoAsignarTecnicoOrdenes" class="form-control">

		            </select>
		          </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarTecnicoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarTecnicoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Configurar personal en zonas de trabajo orden -->
<div id="modalConfigurarZonasPersonal" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-alt"></span>&nbsp;&nbsp;
          <span>Asignar personal</span>
          <br>
          <span id="tituloConfigurarZonasPersonal" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyConfigurarZonasPersonal" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Personal</label>
            <select id="personalConfigurarZonasPersonal" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rol</label>
            <select id="funcionConfigurarZonasPersonal" class="form-control">
							<option value="Tecnico">Técnico</option>
							<option value="Despacho">Despacho</option>
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">&nbsp;</label>
						<button id="agregarConfigurarZonasPersonal" type="button" class="form-control btn btn-secondary">Agregar</button>
					</div>
					<div id="divTablaConfigurarZonasPersonal" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
					  <table id="tablaConfigurarZonasPersonal" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="DNI">DNI</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Nombre</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Perfil">Perfil</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Rol">Rol</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Borrar">Borrar</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaConfigurarZonasPersonal" style="text-align: left;">

					    </tbody>
					  </table>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarConfigurarZonasPersonal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal asignar ESTADO a ordenes -->
<div id="modalAsignarEstadoOrdenes" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
									<span>Cambiar estado ordenes</span>
									<br>
									<span id="tituloAsignarEstadoOrdenes" style="font-size: 12pt;"></span>
								</h5>
            </div>
            <div id="bodyAsignarEstadoOrdenes" class="modal-body alerta-modal-body" style="text-align: left;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <label style="font-weight: bold;">Estado</label>
								<select id="despachoAsignarEstadoOrdenes" class="form-control">

		            </select>
		          </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarEstadoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarEstadoOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal asignar observacion a ordenes -->
<div id="modalAsignarObservacionOrdenes" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="fas fa-pencil-alt"></span>&nbsp;&nbsp;
									<span>Ingresar observación</span>
									<br>
									<span id="tituloAsignarObservacionOrdenes" style="font-size: 12pt;"></span>
								</h5>
            </div>
            <div id="bodyAsignarObservacionOrdenes" class="modal-body alerta-modal-body" style="text-align: left;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <label style="font-weight: bold;">Observación</label>
		            <textarea id="observacionObservacionOrdenes" class="form-control" rows="5" style="resize: none;" maxlength="4000"></textarea>
		          </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarObservacionOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarObservacionOrdenes" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal completar orden -->
<div id="modalCompletarOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="fas fa-pencil-alt"></span>&nbsp;&nbsp;
						<span>Completar orden</span>
						<br>
						<span id="tituloCompletarOrden" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyCompletarOrden" class="modal-body alerta-modal-body">
				<input type="hidden" id="idCompletarOrden">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">¿Está seguro de completar la orden <b><span id="ordenCompletarOrden"></span></b>?</label>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCompletarOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarCompletarOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ingresar Orden-->
<div id="modalIngOrden" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-xl" role="document">

    <!-- Modal content-->
		<div class="modal-content">
				<div class="modal-header">
						<h5 style="color:gray; font-weight: bold;"><span class="far fa-plus-square"></span>&nbsp;&nbsp;
							<span>Ingresar orden manual</span>
							<br>
							<span id="tituloIngOrden" style="font-size: 12pt;"></span>
						</h5>
				</div>
				<div id="bodyIngOrden" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
					<label style="color: red; margin-left: 10px; display: none; font-size: 12px;">Observación</label>
					<div class="row" style="text-align: left; margin-bottom: 20pt;">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Folio</label>
	            <input id="folioIngOrden" class="form-control" type="text" value="">
						</div>
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Proyecto</label>
							<select id="proyectoIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Fecha/Hora agenda</label>
	            <input id="fechaHoraIngOrden" class="form-control" type="text" value="" onfocus="blur();">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Tramo</label>
							<select id="tramoIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">DNI Cliente</label>
	            <input id="rutIngOrden" class="form-control" type="text" value="">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Nombre Cliente</label>
	            <input id="clienteIngOrden" class="form-control" type="text" value="">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Fono Cliente</label>
	            <input id="fonoIngOrden" class="form-control" type="number" value="">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Dirección Cliente</label>
	            <input id="direccionIngOrden" class="form-control" type="text" value="">
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Comuna</label>
							<select id="comunaRegionIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Empresa</label>
							<select id="empresaIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Tipo</label>
							<select id="tipoIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Categoria</label>
							<select id="categoriaIngOrden" class="form-control">
	            </select>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold;">Tecnología</label>
	            <input id="tecnologiaIngOrden" class="form-control" type="text" value="">
						</div>
					</div>
				</div>
				<div class="modal-footer" style="text-align: left;">
	      <!-- Botones -->
				<button id="guardarIngOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarIngOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	  		</div>
  	</div>
	</div>
</div>

<!-- Modal Agregar Tipos de orden -->
<div id="modalAgregarTipoOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Agregar tipo orden</span>
          <br>
          <span id="tituloAgregarTipoOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyAgregarTipoOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<input id="nombreAgregarTipoOrden" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
						<select id="proyectoAgregarTipoOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Clasificación</label>
						<select id="clasificacionAgregarTipoOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Minutos</label>
						<input id="minutosAgregarTipoOrden" class="form-control" type="number" value=" ">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Tipos de orden -->
<div id="modalEditarTipoOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
          <span>Editar tipo orden</span>
          <br>
          <span id="tituloEditarTipoOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEditarTipoOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<input id="nombreEditarTipoOrden" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
						<select id="proyectoEditarTipoOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Clasificación</label>
						<select id="clasificacionEditarTipoOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Minutos</label>
						<input id="minutosEditarTipoOrden" class="form-control" type="number" value=" ">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar orden tipo -->
<div id="modalEliminarOrdenTipo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;
          <span>Eliminar tipo orden</span>
          <br>
          <span id="tituloEliminarTipoOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarTipoOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Esta seguro que desea eliminar el tipo de orden seleccionado?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloEliminarTipoOrden"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarTipoOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL AGREGAR MANTENCION -->
<div id="agregarMantencion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-wrench"></span>&nbsp;&nbsp;Agregar Mantención</div>
      <div id="bodyAgregarMantencion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input id="rutAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Correo</label>
            <input id="correoAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Celular</label>
            <input id="celularAgregarMantencion" class="form-control" type="text" value=" ">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input id="patenteAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoAgregarMantencion" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">KM</label>
            <input id="kilometrajeAgregarMantencion" class="form-control" type="number" min="0">
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha</label>
            <input id="fechaAgregarMantencion" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Hora</label>
            <select id="horaAgregarMantencion" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Motivo</label>
            <select id="motivoAgregarMantencion" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Siniestro (Folio)</label>
            <select id="siniestroAgregarMantencion" class="form-control"></select>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sucursal</label>
            <select id="sucursalAgregarMantencion" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color Letra</label>
            <input id="colorLetraAgregarMantencion" class="form-control" type="color" value="#000000">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color Fondo</label>
            <input id="colorFondoAgregarMantencion" class="form-control" type="color" value="#00aae4">
          </div>

          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Taller</label>
            <select id="tallerAgregarMantencion" class="form-control"></select>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dirección (taller)</label>
            <input id="direccionTallerAgregarMantencion" class="form-control" type="text" value="">
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="observacionAgregarMantencion" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL AGREGAR MANTENCION -->

<!-- MODAL VER EVENTO MANTENCION -->
<div id="modalVerEvento" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content -->
    <div class="modal-content">

			<div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-wrench"></span>&nbsp;&nbsp;Detalle Mantención
			</div>
      <div id="bodyVerEvento" class="modal-body alerta-modal-body">
				<div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: black; font-size: 14pt;">Detalle de mantención</label>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <label style="font-weight: bold;">Patente:&nbsp;</label><span id="patenteMantencion"></span><br>
            <label style="font-weight: bold;">Marca:&nbsp;</label><span id="marcaMantencion"></span><br>
            <label style="font-weight: bold;">Modelo:&nbsp;</label><span id="modeloMantencion"></span>
        	</div>

	        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
	            <label style="font-weight: normal;">Personal:&nbsp;</label><span id="personalMantencion"></span><br>
	            <label style="font-weight: normal;">Correo:&nbsp;</label><span id="correoMantencion"></span><br>
	            <label style="font-weight: normal;">Teléfono:&nbsp;</label><span id="telefonoMantencion"></span>
	        </div>

	        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
	            <label style="font-weight: normal;">Fecha:&nbsp;</label><span id="fechaMantencion"></span><br>
	            <label style="font-weight: normal;">Hora:&nbsp;</label><span id="horaMantencion"></span><br>
	            <label style="font-weight: normal;">Estado:&nbsp;</label><span id="estadoMantencion"></span>
	        </div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <hr class="hr-separador">
		      </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: black; font-size: 14pt;">Datos de mantención</label>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <label style="font-weight: normal;">Sucursal:&nbsp;</label><span id="sucursalMantencion"></span><br>
            <label style="font-weight: normal;">Taller:&nbsp;</label><span id="tallerMantencion"></span><br>
            <label style="font-weight: normal;">Dirección:&nbsp;</label><span id="direccionMantencion"></span>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
              <label style="font-weight: normal;">Motivo:&nbsp;</label><span id="motivoMantencion"></span><br>
              <label style="font-weight: normal;">Folio (Siniestro):&nbsp;</label><span id="folioSiniestroMantencion"></span><br>
              <label style="font-weight: normal;">Folio (Mantención):&nbsp;</label><span id="folioMantencion"></span><br>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt;">
            <label style="font-weight: bold; color: black; font-size: 14pt;">Documentos</label>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <label style="font-weight: normal;">Agenda: </label><br>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <button id="agendaVerMantencion"  type="button" class="form-control btn btn-secondary btn-sm" disabled><span id="colorAgendaVerMantencion" class="far fa-file-pdf" style="color: gray;"></span></button><br>
          </div>

					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <label style="font-weight: normal;">Diagnóstico: </label><br>
          </div>

					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <button id="diagnosticoVerMantencion"  type="button" class="form-control btn btn-secondary btn-sm" disabled><span id="colorDiagnosticoVerMantencion" class="far fa-file-pdf" style="color: gray;"></span></button><br>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
              <label style="font-weight: normal;">Factura: </label><br>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <button id="facturaVerMantencion"  type="button" class="form-control btn btn-secondary btn-sm" disabled><span id="colorFacturaVerMantencion" class="far fa-file-pdf" style="color: gray;"></span></button><br>
          </div>

					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
              <label style="font-weight: normal;">OC: </label><br>
          </div>

					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5pt; text-align: left;">
            <button id="ocVerMantencion"  type="button" class="form-control btn btn-secondary btn-sm" disabled><span id="colorOcVerMantencion" class="far fa-file-pdf" style="color: gray;"></span></button><br>
          </div>

        </div>
	     </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="subirPdfMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Subir PDF</button>
        <button id="ingregoTallerMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Ingreso a taller</button>
        <button id="completarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Completar</button>
        <button id="cancelarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Rechazar</button>
        <button id="cerrarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL VER EVENTO MANTENCION -->

<!-- Modal Agregar Categoria de orden -->
<div id="modalAgregarCategoriaOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Agregar categoria orden</span>
          <br>
          <span id="tituloAgregarCategoriaOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyAgregarCategoriaOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Categoría</label>
						<input id="nombreAgregarCategoriaOrden" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>&nbsp;<label style="font-weight: italic; font-size: 10pt;">(solo aparecerán proyectos con tipo de orden configurada)</label>
						<select id="proyectoAgregarCategoriaOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<select id="tipoAgregarCategoriaOrden" class="form-control">
            </select>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar orden tipo -->
<div id="modalEliminarOrdenCategoria" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;
          <span>Eliminar categoria orden</span>
          <br>
          <span id="tituloEliminarCategoriaOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarCategoriaOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Esta seguro que desea eliminar la categoria de orden seleccionada?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloEliminarCategoriaOrden"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarCategoriaOrden" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Editar categoria orden</span>
          <br>
          <span id="tituloEditarCategoriaOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEditarCategoriaOrden" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Categoría</label>
						<input id="nombreEditarCategoriaOrden" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>&nbsp;<label style="font-weight: italic; font-size: 10pt;">(solo aparecerán proyectos con tipo de orden configurada)</label>
						<select disabled id="proyectoEditarCategoriaOrden" class="form-control">
            </select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<select id="tipoEditarCategoriaOrden" class="form-control">
            </select>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarCategoriaOrden" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Mapa orednes -->
<div id="modalMapaAsignadasTecnico" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-xl" role="document">

        <!-- Modal content-->
        <div class="modal-content">
						<div class="modal-header">
								<h5 style="color:gray; font-weight: bold;"><span class="fas fa-map-marked-alt"></span>&nbsp;&nbsp;
									<span>Mapa ordenes asignadas</span>
									<br>
									<span id="tituloMapaAsignadasTecnico" style="font-size: 12pt; weight: bold;"></span>
								</h5>
						</div>
            <div id="bodyMapaAsignadasTecnico" class="modal-body alerta-modal-body">
							<div class="row" style="text-align: left;">
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<label style="font-weight: bold;">Técnico</label>
									<select id="idTecnicoMapaAsignadasTecnico" class="form-control">
									</select>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" id="padreGoogleMapaAsignadasTecnico">

                </div>
            </div>
					</div>
          <div class="modal-footer" style="text-align: left;">
              <button id="cerrarModalMapaAsignadasTecnico" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>

<!-- Modal Login 2FA -->
<div id="modalLogin2fa" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloLogin2fa"><span class="fas fa-key"></span>&nbsp;&nbsp;Clave 2fa</h5>
      </div>
			<div id="bodyHabDeshRangoMantenciones" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<input id="secretLogin2fa" type="hidden" name="" value="">
						<input id="nombreLogin2fa" type="hidden" name="" value="">
						<label style="font-weight: bold;">Ingrese clave 2fa</label>
            <input id="codigoLogin2fa" class="form-control" type="password" maxlength="6">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="validarLogin2fa" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Validar</button>
        <button id="cancelarLogin2fa" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalConfigurarZonasObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Configurar zonas</span>
          <br>
          <span id="tituloConfigurarZonasObra" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyConfigurarZonasObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
						<select id="proyectoConfigurarZonasObra" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Area</label>
						<input disabled id="areaConfigurarZonasObra" class="form-control" type="text" value=" ">
          </div>
					<div id="divZonaConfigurarZonasObra" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">

          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarConfigurarZonasObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarConfigurarZonasObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEliminarZonaObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-eraser"></span>&nbsp;&nbsp;
          <span>Eliminar zona</span>
          <br>
          <span id="tituloEliminarZonaObra" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarZonaObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar estas zonas seleccionadas?</font>
            <font style="font-weight: nomal; font-size: 11pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="detalleEliminarZonaObra"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarZonaObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Eliminar</button>
        <button id="cancelarEliminarZonaObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalActivarZonaObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-double"></span>&nbsp;&nbsp;
          <span id="tituloActivarZonaObra"></span>
        </h5>
      </div>
			<div id="bodyActivarZonaObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleActivarZonaObra"></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarActivarZonaObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Aceptar</button>
        <button id="cancelarActivarZonaObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL CANCELAR MANTENCION-->
<div id="modalCancelarMantencion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-times-circle"></span>&nbsp;&nbsp;Cancelar Mantención</h5>
      </div>
			<div id="bodyCancelarMantencion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Motivo</label>
            <select id="motivoCancelarMantencion" class="form-control">
              <option value="Taller">Taller</option>
							<option value="Personal">Personal</option>
              <option value="Flota">Flota</option>
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="observacionCancelarMantencion" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt; text-align: center;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea cancelar la mantención?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCancelarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCancelarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL CANCELAR MANTENCION -->

<!-- MODAL COMPLETAR MANTENCION-->
<div id="modalCompletarMantencion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check"></span>&nbsp;&nbsp;Completar Mantención</h5>
      </div>
			<div id="bodyCompletarMantencion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado de vehículo</label>
						<select id="estadoVehiculoCompletarMantencion" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="observacionCompletarMantencion" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt; text-align: center;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea completar la mantención?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCompletarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCompletarMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL COMPLETAR MANTENCION -->

<!-- MODAL SOLICITAR CARGA -->
<div id="modalSolicitarCarga" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloSolicitarCarga"><span class="fas fa-gas-pump"></span>&nbsp;&nbsp;Solicitar Carga</h5>
      </div>
      <div id="bodySolicitarCarga" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
						<input disabled id="rutSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
						<input disabled id="nombreSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado RRHH</label>
						<input disabled id="estadoSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
						<input disabled id="patenteSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número Tarjeta</label>
						<input disabled id="tarjetaSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Producto</label>
						<input disabled id="productoSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<input disabled id="tipoSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comunas consumo</label>
						<input disabled id="bodegaSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Servicio</label>
						<input disabled id="servicioSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cliente</label>
						<input disabled id="clienteSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Actividad</label>
						<input disabled id="actividadSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto($)</label>
						<input  id="montoSolicitarCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
						<textarea rows="3" id="obsSolicitarCarga" class="form-control" style="resize: none;" maxlength="500">
						</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarSolicitarCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSolicitarCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SOLICITAR CARGA -->

<!-- MODAL DEVOLUCION CARGA -->
<div id="modalDevolucionCarga" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloDevolucionCarga"><span class="fas fa-hand-holding-usd"></span>&nbsp;&nbsp;Devolución Carga</h5>
      </div>
      <div id="bodyDevolucionCarga" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
						<input disabled id="rutDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
						<input disabled id="nombreDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado RRHH</label>
						<input disabled id="estadoDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
						<input disabled id="patenteDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número Tarjeta</label>
						<input disabled id="tarjetaDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Producto</label>
						<input disabled id="productoDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<input disabled id="tipoDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
						<input disabled id="bodegaDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Servicio</label>
						<input disabled id="servicioDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cliente</label>
						<input disabled id="clienteDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Actividad</label>
						<input disabled id="actividadDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto($)</label>
						<input id="montoDevolucionCarga" class="form-control" type="text">
						</input>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
						<textarea rows="3" id="obsDevolucionCarga" class="form-control" type="text" style="resize: none;" maxlength="500">
						</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarDevolucionCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDevolucionCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL SUBIR PDF MANTENCION -->
<div id="modalSubirPdfMantencion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfMantencion" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirPdfMantencion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Agenda <b><span id="spanAgenda" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaAgenda' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfAgenda' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Diagnóstico <b><span id="spanDiagnostico" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaDiagnostico' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfDiagnostico' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF Factura <b><span id="spanFactura" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaFactura' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfFactura' type="text" class="form-control" readonly>
						</div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF OC <b><span id="spanOc" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaOc' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfOc' type="text" class="form-control" readonly>
						</div>
          </div>

        </div>
        <div class="modal-footer" style="text-align: left;">
        <button id="guardarSubirPdfMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirPdfMantencion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SUBIR PDF MANTENCION -->

<!-- Configurar personal en zonas de trabajo orden -->
<div id="modalConfigurarZonasPersonalObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-alt"></span>&nbsp;&nbsp;
          <span>Definición de roles</span>
          <br>
          <span id="tituloConfigurarZonasPersonalObra" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyConfigurarZonasPersonalObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Personal</label>
            <select id="personalConfigurarZonasPersonalObra" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rol</label>
            <select id="funcionConfigurarZonasPersonalObra" class="form-control">
							<option value="Jefe proyecto">Jefe proyecto</option>
							<option value="Proyectista">Proyectista</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Jefe brigada">Jefe brigada</option>
							<option value="Certificador">Certificador</option>
              <option value="Gestor permisos">Gestor permisos</option>
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">&nbsp;</label>
						<button id="agregarConfigurarZonasPersonalObra" type="button" class="form-control btn btn-secondary">Agregar</button>
					</div>
					<div id="divTablaConfigurarZonasPersonalObra" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
					  <table id="tablaConfigurarZonasPersonalObra" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="DNI">DNI</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Nombre</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Perfil">Perfil</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Rol">Rol</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Borrar">Borrar</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaConfigurarZonasPersonalObra" style="text-align: left;">

					    </tbody>
					  </table>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarConfigurarZonasPersonalObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESO CONTRATOS OBRAS -->
<div id="modalIngresoContratos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoContratos"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Contratos</h5>
      </div>
      <div id="bodyIngresoContratos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoContratos" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoIngresoContratos" class="form-control" type="number" min="2020">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">ID Contrato</label>
            <input id="idContratoIngresoContratos" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO CONTRATOS OBRAS -->

<!-- MODAL EDITAR CONTRATOS OBRAS -->
<div id="modalEditarContratos" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarContratos"><span class="fas fa-file-contract"></span>&nbsp;&nbsp;Editar Contratos </h5>
      </div>
      <div id="bodyEditarContratos" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarContratos" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoEditarContratos" class="form-control" type="number" min="2000">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">ID Contrato</label>
            <input id="idContratoEditarContratos" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR CONTRATOS OBRAS -->

<!-- MODAL ELIMINAR CONTRATOS OBRAS -->
<div id="modalEliminarContratos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarContratos"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Contratos</h5>
      </div>
			<div id="bodyEliminarContratos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar el contrato?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarContratos"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarContratos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR CONTRATOS OBRAS -->

<!-- MODAL CARATULA OBRAS -->
<div id="modalCaratulaObras" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 95%; max-width: 95%;">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header" style="padding-right: 0;">
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tituloCaratulaObras" style="text-align: left; padding-right: 0; line-height: 1em; font-size: 0.875em;">

        </div>
      </div>
			<div id="bodyCaratulaObras" style="padding-right: 0; padding-left: 0; padding-top: 0;" class="modal-body alerta-modal-body">
        <div id="cuerpoCaratulaObras" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; line-height: 1em; font-size: 0.875em;">
        </div>
				<div id="divTablaCaratulaObras" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 0; text-align: left;">
					<table id="tablaCaratulaObras" class="cell-border compact" style="width: 100%;">
						<thead>
							<tr>
								<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="OT">OT</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="Tipo">Tipo</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="Estado">Estado</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="Empresa">Empresa</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="Jefe brigada">Jefe brigada</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="F. ini. ejecución">F. ini. ejecución</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="F. fin ejecución">F. fin ejecución</th>
								<th class="celdaColor" style="border: 1pt solid white;" title="Avance ejecución">Avance ejecución</th>
							</tr>
						</thead>
						<tbody id="cuerpoTablaCaratulaObras" style="text-align: left;">
						</tbody>
					</table>
				</div>

				<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0; margin-bottom: 10pt;">
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button disabled class="form-control btn btn-secondary botonComun" id="asignarFecTerOtCaratulaObras">
							Asignar Fecha Terreno
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button disabled class="form-control btn btn-secondary botonComun" id="asignarBrigadaOtCaratulaObras">
							Asignar Brigada
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button disabled class="form-control btn btn-secondary botonComun" id="duplicarOtCaratulaObras">
							Duplicar OT
						</button>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button disabled class="form-control btn btn-secondary botonComun" id="elimnarOtCaratulaObras">
							Eliminar OT
						</button>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
						<button disabled class="form-control btn btn-secondary botonComun" id="pedirMaterialCaratulaObras">
							Pedir Material
						</button>
					</div>
			  </div>

        <div id="cuerpoCaratulaObrasCubicacion" class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; line-height: 1em; font-size: 0.875em; padding-right: 0;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 10pt;">
            <span style="font-weight: bold; color:gray; font-size: 1.2em;">Cubicación</span>
          </div>
          <div id="tablaCaratulaObrasCubicacion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15pt; padding-right: 0;"></div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarCaratulaObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL CARATULA OBRAS -->

<!-- MODAL DETALLE HISTORIAL ORDEN ATC -->
<div id="modalDetalleOrdenAtc" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="width: 80%; min-width: 80%; max-width: 80%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header" style="padding-right: 0;">
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tituloDetalleOrdenAtc" style="text-align: left; padding-right: 0; line-height: 0.9em; font-size: 0.875em;">

        </div>
      </div>
			<div id="bodyDetalleOrdenAtc" style="padding-right: 0;" class="modal-body alerta-modal-body">
        <div id="cuerpoDetalleOrdenAtc" class="row row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;  padding-right: 0; line-height: 0.9em; font-size: 0.875em;">
        </div>
	      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <hr class="hr-separador">
	      </div>
				<div class="row row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; padding-right: 0; font-weight: bold; margin-top: 10pt;">
					<div style='padding-bottom: 0;' class='col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12'>
						<div style='padding-bottom: 0;' class='row'>
							<div style='padding-bottom: 0;' class='col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12'>
								<span style="color:gray; font-weight: bold; font-size: 15pt;">
									Historial
								</span>
							</div>
						</div>
					</div>
        </div>
				<div id="divTablaDetalleOrdenAtc" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; text-align: left;">
					<table id="tablaDetalleOrdenAtc" class="cell-border compact" style="width: 100%;">
						<thead>
							<tr>
								<th class="celdaColor" style="border: 1pt solid white;">S</th>
								<th class="celdaColor" style="border: 1pt solid white;">ID</th>
								<th class="celdaColor" style="border: 1pt solid white;">Fecha</th>
								<th class="celdaColor" style="border: 1pt solid white;">Hora</th>
								<th class="celdaColor" style="border: 1pt solid white;">Historia</th>
								<th class="celdaColor" style="border: 1pt solid white;">Observación</th>
								<th class="celdaColor" style="border: 1pt solid white;">Ejecutor</th>
								<th class="celdaColor" style="border: 1pt solid white;">Estado</th>
								<th class="celdaColor" style="border: 1pt solid white;">Sub estado</th>
								<th class="celdaColor" style="border: 1pt solid white;">Técnico</th>
								<th class="celdaColor" style="border: 1pt solid white;">Despacho</th>
							</tr>
						</thead>
						<tbody id="cuerpoDetalleOrdenAtc" style="text-align: left;">
						</tbody>
					</table>
				</div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarDetalleOrdenAtc" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DETALLE HISTORIAL ORDEN ATC -->

<!-- MODAL VALIDAR SOLICITUD COMBUSTIBLE -->
<div id="modalValidarSolCombustible" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloValidarSolCombustible"><span class="fas fa-check"></span>&nbsp;&nbsp;Validar Solicitud</h5>
      </div>
      <div id="bodyValidarSolCombustible" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
            <input disabled id="rutValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input disabled id="nombreValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado RRHH</label>
            <input disabled id="estadoValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input disabled id="patenteValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número Tarjeta</label>
            <input disabled id="tarjetaValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Producto</label>
            <input disabled id="productoValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <input disabled id="tipoValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <input disabled id="bodegaValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <hr class="hr-separador">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto($)</label>
            <input id="montoValidarSolCombustible" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación Solicitud</label>
            <textarea disabled rows="3" id="obsValidarSolCombustible1" class="form-control" style="resize: none;" maxlength="500">
            </textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación Validación</label>
            <textarea rows="3" id="obsValidarSolCombustible2" class="form-control" style="resize: none;" maxlength="500">
            </textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarValidarSolCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarValidarSolCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL VALIDAR SOLICITUD COMBUSTIBLE -->


<!-- MODAL RECHAZAR SOLICITUD COMBUSTIBLE -->
<div id="modalRechazarSolCombustible" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloRechazarSolCombustible"><span class="fas fa-minus"></span>&nbsp;&nbsp;Rechazar Solicitud</h5>
      </div>
      <div id="bodyRechazarSolCombustible" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Desea rechazar la solicitud N°: <span id="TarjetaRechazarSolCombustible"></span>?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloRechazarSolCombustible"></i></font>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarRechazarSolCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarRechazarSolCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL RECHAZAR SOLICITUD COMBUSTIBLE -->

<div id="modalAgregarMantFinanciera" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar dimensión financiera</h5>
      </div>

      <div id="bodyAgregarMantFinanciera" class="modal-body alerta-modal-body">
				<div class="row" style="text-align: left;">
	          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Clasificacion</label>
	            <select id="selectComprasFinanzasClasif" class="form-control">
								<option value="SER">Servicio</option>
								<option value="MAT">Material</option>
							</select>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <hr class="hr-separador">
	          </div>
				</div>
        <div class="row" style="text-align: left; margin-top: 10pt;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Grupo</label>
            <select id="selectComprasFinanzasDim1" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nuevo grupo</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasFinanzasDim1" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasFinanzasDim1" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="text-align: left; margin-top: 10pt;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Sub grupo</label>
            <select id="selectComprasFinanzasDim2" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nuevo Sub grupo</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasFinanzasDim2" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasFinanzasDim2" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="text-align: left; margin-top: 10pt;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Cuenta</label>
            <select id="selectComprasFinanzasDim3" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nueva cuenta</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasFinanzasDim3" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasFinanzasDim3" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarMantFinanciera" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus"></span>&nbsp;&nbsp;Editar Financiera</h5>
      </div>

      <div id="bodyEditarMantFinanciera" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarMantFinanciera" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus"></span>&nbsp;&nbsp;Eliminar Financiera</h5>
      </div>

      <div id="bodyEliminarMantFinanciera" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleEliminarMantFinanciera"></font>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantFinanciera" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAgregarMantGestion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar dimensión de gestión</h5>
      </div>

      <div id="bodyAgregarMantGestion" class="modal-body alerta-modal-body">
				<div class="row" style="text-align: left;">
	          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Clasificacion</label>
	            <select id="selectComprasGestionClasif" class="form-control">
								<option value="SER">Servicio</option>
								<option value="MAT">Material</option>
							</select>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <hr class="hr-separador">
	          </div>
				</div>
	      <div class="row" style="text-align: left;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Familia</label>
            <select id="selectComprasGestionDim1" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nueva familia</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasGestionDim1" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasGestionDim1" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="text-align: left;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Segmento</label>
            <select id="selectComprasGestionDim2" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nueva segmento</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasGestionDim2" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasGestionDim2" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="text-align: left;margin-bottom: 10pt;">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; margin-bottom: 30pt; color: gray; font-size: 1.2em;">Clave</label>
            <select id="selectComprasGestionDim3" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold; color: gray; font-size: 1.2em;">Nueva clave</label>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Código</label>
                <input id="codigoComprasGestionDim3" class="form-control" type="text" value="">
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label style="font-weight: bold;">Nombre</label>
                <input id="nombreComprasGestionDim3" class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarMantGestion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus"></span>&nbsp;&nbsp;Editar Gestión</h5>
      </div>

      <div id="bodyEditarMantGestion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarMantGestion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;Eliminar dimensión de gestión</h5>
      </div>

      <div id="bodyEliminarMantGestion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleEliminarMantGestion"></font>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantGestion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAgregarMantMateriales" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Materiales</h5>
      </div>

      <div id="bodyAgregarMantMateriales" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Material base</label>
	            <select id="baseAgregarMantMateriales" class="form-control">
							</select>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Empresa (Sociedad)</label>
	            <select id="selectComprasMaterialSBC" class="form-control">
							</select>
					</div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <hr class="hr-separador">
	        </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código</label>
            <input id="codigoMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color</label>
            <input id="colorMantMateriales" class="form-control" type="color" value="#000000"/>
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <input id="tipoMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Material Fabricado</label>
            <input id="matMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Talla</label>
            <input id="tallaMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Envase</label>
            <input id="envaseMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Precio Mín.</label>
            <input id="preciominMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Precio Máx.</label>
            <input id="preciomaxMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Voltaje</label>
            <input id="voltajeMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Potencia</label>
            <input id="potenciaMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Calibre</label>
            <input id="calibreMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Ancho</label>
            <input id="anchoMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Alto</label>
            <input id="altoMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Largo</label>
            <input id="largoMantMateriales" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observaciones</label>
            <input id="observacionMantMateriales" class="form-control" type="text" />
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<hr class="hr-separador">
					</div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dim. Gestión</label>
            <select id="selectComprasMaterialGD3" class="form-control"></select>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dim. Finanzas</label>
            <select id="selectComprasMaterialFE" class="form-control"></select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarMantMateriales" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
				  <span>Editar Material</span>
				  <br>
				  <span id="tituloEditarMantMateriales" style="font-size: 12pt; weight: bold;"></span>
				</h5>
      </div>

      <div id="bodyEditarMantMateriales" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código</label>
            <input id="codigoMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color</label>
            <input id="colorMantMateriales_upd" class="form-control" type="color" value="#000000"/>
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <input id="tipoMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Material Fabricado</label>
            <input id="matMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Talla</label>
            <input id="tallaMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Envase</label>
            <input id="envaseMantMateriales_upd" class="form-control" type="text" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Precio Mín.</label>
            <input id="preciominMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Precio Máx.</label>
            <input id="preciomaxMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Voltaje</label>
            <input id="voltajeMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Potencia</label>
            <input id="potenciaMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Calibre</label>
            <input id="calibreMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Ancho</label>
            <input id="anchoMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Alto</label>
            <input id="altoMantMateriales_upd" class="form-control" type="number" />
          </div>

          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Largo</label>
            <input id="largoMantMateriales_upd" class="form-control" type="number" />
          </div>

					<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Observación</label>
						<textarea id="observacionMantMateriales_upd" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<hr class="hr-separador">
					</div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dim. Gestión</label>
            <select id="selectComprasMaterialGD3_upd" class="form-control"></select>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Dim. Finanzas</label>
            <select id="selectComprasMaterialFE_upd" class="form-control"></select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarMantMateriales" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus"></span>&nbsp;&nbsp;Eliminar Materiales</h5>
      </div>

      <div id="bodyEliminarMantMateriales" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleEliminarMantMateriales"></font>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantMateriales" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarMantProveedores" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-eye"></span>&nbsp;&nbsp;Datos Proveedor</h5>
      </div>

      <div id="bodyEditarMantProveedores" class="modal-body alerta-modal-body">
				<ul class="nav nav-tabs" id="tabEditarMantProveedores" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="basicosEditarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="basicosEditarMantProveedores" aria-selected="true">Datos generales</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="clasificacionEditarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="clasificacionEditarMantProveedores" aria-selected="false">Clasificación</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="evaluacionEditarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="evaluacionEditarMantProveedores" aria-selected="false">Evaluación</a>
				  </li>
				  <li style="display: none;"  class="nav-item">
				    <a class="nav-link" id="ocEditarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="ocEditarMantProveedores" aria-selected="false">Ord. Compras</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="criticosEditarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="criticosEditarMantProveedores" aria-selected="false">Crítico</a>
				  </li>
				</ul>
				<div class="tab-content" id="tabAgregarMantProveedoresContent">
					<div class="tab-pane fade show active" id="basicosEditarMantProveedores" role="tabpanel" aria-labelledby="basicosEditarMantProveedores-tab">
		        <div class="row" style="text-align: left; margin-bottom: 20pt;">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">BP</label>
		            <input id="bpMantProveedores_upd" class="form-control" type="text"/>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">RUT</label>
		            <input id="rutMantProveedores_upd" class="form-control" type="text" disabled/>
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Nombre</label>
		            <input id="nombreMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha solicitud</label>
		            <input id="fechaSolicitudMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Contacto</label>
		            <input id="contactoMantProveedores_upd" class="form-control" type="text" />
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">E-Mail Contacto</label>
		            <input id="emailMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fono Contacto</label>
		            <input id="fonoMantProveedores_upd" class="form-control" type="text" />
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Dirección comercial</label>
		            <input id="direccionMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Comprador</label>
								<select id="compradorMantProveedores_upd" class="form-control">

								</select>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Cond. Pago</label>
								<select id="condPagoMantProveedores_upd" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Moneda Pago</label>
		            <select id="selectComprasProveedoresMoneda_upd" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">SAP</label>
		            <select id="bloqueoMantProveedores_upd" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Contrato</label>
		            <select id="contratoMantProveedores_upd" class="form-control">
									<option value="9">Sin seleccionar</option>
									<option value="0">No</option>
									<option value="1">Si</option>
								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha inicio contrato</label>
		            <input id="fechaInicioContratoMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha fin contrato</label>
		            <input id="fechaFinContratoMantProveedores_upd" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt; display: none;">
		            <label style="font-weight: bold;">Nexcel</label>
		            <select id="acreditadoMantProveedores_upd" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Crítico</label>
		            <select id="criticoMantProveedores_upd" class="form-control">
									<option selected value="9">Sin selecionar</option>
									<option value="0">No</option>
									<option value="1">Si</option>
								</select>
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <hr class="hr-separador">
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Nexcel (Proceso / Estado / % Avance)</label>
								<div id="nexcelMantProveedores_upd" style="height: 150px; border: 1px solid #bbbbbb; padding-top: 10px;">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="clasificacionEditarMantProveedores" role="tabpanel" aria-labelledby="clasificacionEditarMantProveedores-tab">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
							<!-- Selector de Tipo -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Tipo</label>
								<select multiple="multiple" id="tipoMantProveedores_upd" name="tipoMantProveedores_upd" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Sociedad -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Sociedad</label>
								<select multiple="multiple" id="sociedadMantProveedores_upd" name="sociedadMantProveedores_upd" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Comunas -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Comuna donde opera</label>
								<select multiple="multiple" id="comunaMantProveedores_upd" name="comunaMantProveedores_upd" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Actividad -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Actividad</label>
								<select multiple="multiple" id="actividadMantProveedores_upd" name="actividadMantProveedores_upd" class="form-control custom">
								</select>
							</div>

		        </div>
					</div>
					<div class="tab-pane fade" id="evaluacionEditarMantProveedores" role="tabpanel" aria-labelledby="evaluacionEditarMantProveedores-tab">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Evaluación <a id="periodoEvalMantProveedores_upd"></a></label>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<input disabled id="campoEvaluadorMantProveedores_upd" class="form-control" type="text" value="Evaluador"/>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<input disabled id="nombreEvaluadorMantProveedores_upd" class="form-control" type="text"/>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Plazo (%)</label>
		            <input id="evalPlazoMantProveedores_upd" min="0" max="100" step="5" class="form-control input-number" type="number" value="0"/>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Calidad (%)</label>
		            <input id="evalCalidadMantProveedores_upd" min="0" max="100" step="5" class="form-control input-number" type="number" value="0"/>
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <hr class="hr-separador">
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Historial</label>
								<table id="historialEvalMantProveedores_upd" class="cell-border compact" style="width: 100%;">
		              <thead>
		                <tr>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Folio">Folio</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Usuario">Usuario</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Perfil">Perfil</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Plazo (%)">Plazo (%)</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Calidad (%)">Calidad (%)</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Ponderado (%)">Ponderado (%)</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Periodo">Periodo</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Fecha">Fecha</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Hora">Hora</th>
		                </tr>
		              </thead>
		              <tbody id="tablaHistorialEvalMantProveedores_upd" style="text-align: left;">

		              </tbody>
		            </table>
							</div>
						</div>
					</div>
					<div style="display: none;" class="tab-pane fade" id="ocEditarMantProveedores" role="tabpanel" aria-labelledby="ocEditarMantProveedores-tab">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
						</div>
					</div>
					<div class="tab-pane fade" id="criticosEditarMantProveedores" role="tabpanel" aria-labelledby="criticosEditarMantProveedores-tab">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Evaluación final</label>
								<input disabled id="jefeComprasCriticoMantProveedores_upd" class="form-control" type="text"/>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Crítico</label>
								<input disabled id="estdoCriticoComprasMantProveedores_upd" class="form-control" type="text"/>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <hr class="hr-separador">
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Historial</label>
								<table id="historialCriticoComprasMantProveedores_upd" class="cell-border compact" style="width: 100%;">
		              <thead>
		                <tr>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Folio">Folio</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Usuario">Usuario</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Perfil">Perfil</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Crítico">Crítico</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Fecha">Fecha</th>
		                  <th class="celdaColor" style="border: 1pt solid white;" title="Hora">Hora</th>
		                </tr>
		              </thead>
		              <tbody id="tablaHistorialCriticoComprasMantProveedores_upd" style="text-align: left;">

		              </tbody>
		            </table>
							</div>
						</div>
					</div>
				</div>
      </div>

      <div class="modal-footer" style="text-align: left;">
				<input type="hidden" id="tipoIngresoDatos" value="1">
				<input type="hidden" id="perfilEvaluador" value="">
				<input type="hidden" id="aplicaEvaluador" value="">
        <button id="guardarEditarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAgregarMantProveedores" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Proveedor</h5>
      </div>

      <div id="bodyAgregarMantProveedores" class="modal-body alerta-modal-body">
				<ul class="nav nav-tabs" id="tabAgregarMantProveedores" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="basicosAgregarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="basicosAgregarMantProveedores" aria-selected="true">Datos generales</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="clasificacionAgregarMantProveedores-tab" data-toggle="tab" role="tab" aria-controls="clasificacionAgregarMantProveedores" aria-selected="false">Clasificación</a>
				  </li>
				</ul>
				<div class="tab-content" id="tabAgregarMantProveedoresContent">
					<div class="tab-pane fade show active" id="basicosAgregarMantProveedores" role="tabpanel" aria-labelledby="basicosAgregarMantProveedores-tab">
		        <div class="row" style="text-align: left; margin-bottom: 20pt;">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">BP</label>
		            <input id="bpMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">RUT</label>
		            <input id="rutMantProveedores_agr" class="form-control" type="text"/>
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Nombre</label>
		            <input id="nombreMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha solicitud</label>
		            <input id="fechaSolicitudMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Contacto</label>
		            <input id="contactoMantProveedores_agr" class="form-control" type="text" />
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">E-Mail Contacto</label>
		            <input id="emailMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fono Contacto</label>
		            <input id="fonoMantProveedores_agr" class="form-control" type="text" />
		          </div>
		          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Dirección comercial</label>
		            <input id="direccionMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Comprador</label>
								<select id="compradorMantProveedores_agr" class="form-control">

								</select>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Cond. Pago</label>
								<select id="condPagoMantProveedores_agr" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Moneda Pago</label>
		            <select id="selectComprasProveedoresMoneda_agr" class="form-control">
								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">SAP</label>
		            <select id="bloqueoMantProveedores_agr" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Contrato</label>
		            <select id="contratoMantProveedores_agr" class="form-control">
									<option selected value="9">Sin selecionar</option>
									<option value="0">No</option>
									<option value="1">Si</option>
								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha inicio contrato</label>
		            <input id="fechaInicioContratoMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Fecha fin contrato</label>
		            <input id="fechaFinContratoMantProveedores_agr" class="form-control" type="text" />
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt; display: none;">
		            <label style="font-weight: bold;">Nexcel</label>
		            <select id="acreditadoMantProveedores_agr" class="form-control">

								</select>
		          </div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
		            <label style="font-weight: bold;">Crítico</label>
		            <select id="criticoMantProveedores_agr" class="form-control">
									<option selected value="9">Sin selecionar</option>
									<option value="0">No</option>
									<option value="1">Si</option>
								</select>
		          </div>
						</div>
					</div>
					<div class="tab-pane fade" id="clasificacionAgregarMantProveedores" role="tabpanel" aria-labelledby="clasificacionAgregarMantProveedores-tab">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
							<!-- Selector de Tipo -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Tipo</label>
								<select multiple="multiple" id="tipoMantProveedores_agr" name="tipoMantProveedores_agr" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Sociedad -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Sociedad</label>
								<select multiple="multiple" id="sociedadMantProveedores_agr" name="sociedadMantProveedores_agr" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Comunas -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Comuna donde opera</label>
								<select multiple="multiple" id="comunaMantProveedores_agr" name="comunaMantProveedores_agr" class="form-control custom">
								</select>
							</div>

							<!-- Selector de Actividad -->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
								<label style="font-weight: bold;">Actividad</label>
								<select multiple="multiple" id="actividadMantProveedores_agr" name="actividadMantProveedores_agr" class="form-control custom">
								</select>
							</div>

		        </div>
					</div>
				</div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarMantProveedores" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;Eliminar Proveedores</h5>
      </div>

      <div id="bodyEliminarMantProveedores" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;" id="detalleEliminarMantProveedores"></font>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantProveedores" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Agregar Servicion Compras -->
<div id="modalAgregarMantServicios" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
				  <span>Agregar Servicio</span>
				  <br>
				  <span id="tituloAsignarAgendarOrden" style="font-size: 12pt; weight: bold;"></span>
				</h5>
      </div>
			<div id="bodyAgregarMantServicios" class="modal-body alerta-modal-body" style="text-align: left; overflow-y: scroll;">
				<div class="row" style="text-align: left;">
	          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Servicio base</label>
	            <select id="baseAgregarMantServicios" class="form-control">
							</select>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
							<label style="font-weight: bold; margin-bottom: 10pt; color: gray; font-size: 1.2em;">Empresa (Sociedad)</label>
	            <select id="subcontratoAgregarMantServicios" class="form-control">
							</select>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <hr class="hr-separador">
	          </div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cod. contable</label>
						<input id="codigoAgregarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Nombre</label>
						<input id="nombreAgregarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Marca</label>
						<input id="marcaAgregarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Modelo</label>
						<input id="modeloAgregarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo</label>
						<input id="tipoAgregarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Precio min.</label>
						<input id="precioMinAgregarMantServicios" class="form-control" type="number" min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Precio Max.</label>
						<input id="precioMaxAgregarMantServicios" class="form-control" type="number" min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Potencia</label>
						<input id="potenciaAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Peso</label>
						<input id="pesoAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Capacidad</label>
						<input id="capacidadAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Area (M2)</label>
						<input id="areaAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Ancho</label>
						<input id="anchoAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Alto</label>
						<input id="altoAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Largo</label>
						<input id="largoAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Temperatura (°C)</label>
						<input id="temperaturaAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Humedad</label>
						<input id="humedadAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Precisión</label>
						<input id="presicionAgregarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Unidad de Medida</label>
						<input id="unidadMedidaAgregarMantServicios" class="form-control" type='text'>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Observación</label>
						<textarea id="observacionAgregarMantServicios" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<hr class="hr-separador">
					</div>
			</div>
			<div class="row" style="margin-bottom:  20pt;">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Dim. Gestión</label>
						<select id="gestionAgregarMantServicios" class="form-control">

						</select>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Dim. Finanzas</label>
						<select id="finanzasAgregarMantServicios" class="form-control">

						</select>
					</div>
				</div>
			</div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAgregarMantPeticiones" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 99%; max-width: 99%">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Nueva petición de compra</span>
          <br>
          <span id="tituloAgregarMantPeticiones" style="font-size: 12pt;"></span>
        </h5>
      </div>

      <div id="bodyAgregarMantPeticiones" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">

          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <div class="row" style="padding-left: 0px; padding-right: 0px;">

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Proyecto</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <select id="proyectoAgregarMantPeticiones" class="form-control"></select>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Cliente</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="clienteAgregarMantPeticiones" class="form-control" disabled/>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">PEP</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="pepAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Rep. Cliente</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="representanteAgregarMantPeticiones" class="form-control" disabled/>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <hr class="hr-separador"/>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Área</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="areaAgregarMantPeticiones" class="form-control" disabled/>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Sub Área</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="subareaAgregarMantPeticiones" class="form-control" disabled/>
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Nombre Cliente Interno</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="internoAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <hr class="hr-separador"/>
              </div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Proveedores Sugeridos</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="sugeridosAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-xl-2 col-lg-2 d-none d-md-none d-lg-block" style="margin-top: 10pt;">

          </div>

          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <div class="row" style="padding-left: 0px; padding-right: 0px;">

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Lugar de Entrega</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="lugarAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Fecha Límite</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="fechaLimiteAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Bodega</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="bodegaAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Código Almacén</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="codigoAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Es refacturable</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="refacturableAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Es regularizacion</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="regularizacionAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Por qué hace falta</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="motivoAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Comuna</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
										<select id="comunaAgregarMantPeticiones" class="form-control"></select>
                  </div>
                </div>
              </div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <hr class="hr-separador"/>
              </div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 " style=" padding-right: 0px;">
                    <label class="input-group-text" style="font-weight: bold; color: gray;">Proveedores Descartados</label>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 " style=" padding-left: 0px;">
                    <input id="descartadosAgregarMantPeticiones" class="form-control" />
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div id="divTablaMantenedorPeticionesModal" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; text-align: left;">
            <table id="tablaMantenedorPeticionesModal" class="cell-border compact" style="width: 100%;">
              <thead>
                <tr>
                  <th class="celdaColor" style="border: 1pt solid white;" title="S">S</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Folio">Folio</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Clase">Clase</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Categoría">Categoría</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Subcategoría">Subcategoría</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Tipo">Tipo</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Producto">Producto</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Marca">Marca</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Modelo">Modelo</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="U.M.">U.M.</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Cantidad">Cantidad</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Especificaciones">Especificaciones</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Anexos">Anexos</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Precio Máx.">Precio Máx.</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Material Sugerido">Material Sugerido</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Material Descartado">Material Descartado</th>
                </tr>
              </thead>
              <tbody id="cuerpoTablaMantenedorPeticiones" style="text-align: left;">

              </tbody>
            </table>
          </div>

				</div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantPeticiones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantPeticiones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<!-- MODAL SUBIR PDF CARATULA OBRAS -->
<div id="modalSubirXmlCaratulaObras" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-import"></span>&nbsp;&nbsp;
          <span>Ingresar orden de ejecución</span>
          <br>
          <span id="tituloSubirXmlCaratulaObras" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirXmlCaratulaObras" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Empresa asignada</label>
						<select id="selectObraEmpresaAsigCaratula" class="form-control">
            </select>
          </div>
					<!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto (interno)</label>
						<select id="selectObraProyectoCaratula" class="form-control">
            </select>
          </div> -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">XML Carátula <b><span id="spanCaratulaObras" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanCaratula" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-import"></span>&nbsp;&nbsp;XML<input type="file" id="xmlCargaCaratulaObras" style="display: none;" accept=".xml">
									</span>
							</label>
							<input disabled id="inputXmlCaratulaObras" type="text" class="form-control" readonly>
						</div>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">XML Cubicación <b><span id="spanCubicacionObras" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanCubicacion" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-import"></span>&nbsp;&nbsp;XML<input type="file" id="xmlCargaCubicacionObras" style="display: none;" accept=".xml">
									</span>
							</label>
							<input disabled id="inputXmlCubicacionObras" type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Jefe proyecto</label>
						<select id="jefeProyectoCaratula" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Supervisor</label>
						<select id="superisorCaratula" class="form-control">
            </select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyectista</label>
						<select id="proyectistaCaratula" class="form-control">
            </select>
          </div>
        </div>
        <div class="modal-footer" style="text-align: left;">
        <button disabled id="asignarSubirXmlCaratulaObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Asignar</button>
        <button id="guardarSubirXmlCaratulaObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirXmlCaratulaObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="hidden" id="nombreOeAsignarPers">
      </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL SUBIR PDF CARATULA OBRAS -->

<!-- MODAL INGRESO AGENCIAS OBRAS -->
<div id="modalIngresoAgencias" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoAgencias"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Agencias</h5>
      </div>
      <div id="bodyIngresoAgencias" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoAgencias" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">ID Agencia</label>
            <input id="idAgenciaIngresoAgencias" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO AGENCIAS OBRAS -->

<!-- MODAL EDITAR AGENCIAS OBRAS -->
<div id="modalEditarAgencias" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarAgencias"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Agencias </h5>
      </div>
      <div id="bodyEditarAgencias" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarAgencias" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">ID Agencia</label>
            <input id="idAgenciaEditarAgencias" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR AGENCIAS OBRAS -->

<!-- MODAL ELIMINAR AGENCIAS OBRAS -->
<div id="modalEliminarAgencias" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarAgencias"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Agencias</h5>
      </div>
			<div id="bodyEliminarAgencias" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la agencia?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarAgencia"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarAgencias" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR AGENCIAS OBRAS -->

<!-- Modal eliminar compras servicios -->
<div id="modalEliminarMantServicios" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;
          <span>Eliminar servicio</span>
          <br>
          <span id="tituloEliminarCategoriaOrden" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarMantServicios" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Esta seguro que desea eliminar el servicio seleccionado?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloEliminarMantServicios"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar Editar Servicios -->
<div id="modalEditarMantServicios" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
				  <span>Editar Servicio</span>
				  <br>
				  <span id="tituloEditarMantServicios" style="font-size: 12pt; weight: bold;"></span>
				</h5>
      </div>
			<div id="bodyEditarMantServicios" class="modal-body alerta-modal-body" style="text-align: left; overflow-y: scroll;">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cod. contable</label>
						<input id="codigoEditarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Nombre</label>
						<input id="nombreEditarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Marca</label>
						<input id="marcaEditarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Modelo</label>
						<input id="modeloEditarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo</label>
						<input id="tipoEditarMantServicios" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Precio min.</label>
						<input id="precioMinEditarMantServicios" class="form-control" type="number" min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Precio Max.</label>
						<input id="precioMaxEditarMantServicios" class="form-control" type="number" min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Potencia</label>
						<input id="potenciaEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Peso</label>
						<input id="pesoEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Capacidad</label>
						<input id="capacidadEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Area (M2)</label>
						<input id="areaEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Ancho</label>
						<input id="anchoEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Alto</label>
						<input id="altoEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Largo</label>
						<input id="largoEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Temperatura (°C)</label>
						<input id="temperaturaEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Humedad</label>
						<input id="humedadEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Precisión</label>
						<input id="presicionEditarMantServicios" class="form-control" type='number' step='0.01' min="0">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;" min="0">
						<label style="font-weight: bold;">Unidad de Medida</label>
						<input id="unidadMedidaEditarMantServicios" class="form-control" type='text'>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Observación</label>
						<textarea id="observacionEditarMantServicios" class="form-control" rows="3" style="resize: none;" maxlength="4000"></textarea>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<hr class="hr-separador">
					</div>
			</div>
			<div class="row" style="margin-bottom:  20pt;">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Dim. Gestión</label>
						<select id="gestionEditarMantServicios" class="form-control">

						</select>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Dim. Finanzas</label>
						<select id="finanzasEditarMantServicios" class="form-control">

						</select>
					</div>
				</div>
			</div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantServicios" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<!-- Configurar personal en Obras -->
<div id="modalConfigurarPersonalObras" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="fas fa-project-diagram"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Definición de roles</span>
          <br>
					<div style="padding-top: 5pt; padding-bottom: 0pt; margin-bottom: 0pt;">
						<span id="oeConfigurarPersonalObras" style="font-weight: bold; color: gray; font-size: 14pt;"></span>
						<br>
						<span id="proyectoConfigurarPersonalObras" style="font-weight: bold; color: gray; font-size: 14pt;"></span>
					</div>
        </h5>
      </div>
			<div id="bodyConfigurarPersonalObras" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Tipo:</label>
						<span style="font-weight: bold; color: gray; font-size: 14pt;" id="tipoConfigurarPersonalObras"></span>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rol</label>
            <select id="funcionConfigurarPersonalObras" class="form-control">
            </select>
          </div>
					<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Personal</label>
            <select id="personalConfigurarPersonalObras" class="form-control">
            </select>
          </div>
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">&nbsp;</label>
						<button id="agregarConfigurarPersonalObras" type="button" class="form-control btn btn-secondary">Agregar</button>
					</div>
					<div id="divTablaConfigurarPersonalObras" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
					  <table id="tablaConfigurarPersonalObras" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="DNI">DNI</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Nombre</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Rol">Rol</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Borrar">Borrar</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaConfigurarPersonalObras" style="text-align: left;">
					    </tbody>
					  </table>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarConfigurarPersonalObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Configurar responsable proyecto en compras -->
<div id="modalAgregarResponsableProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Agregar Responsable Proyecto</span>
          <br>
          <span id="tituloAgregarResponsableProyecto" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyAgregarResponsableProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
            <select id="proyectoAgregarResponsableProyecto" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nom. Proyecto</label>
	          <input disabled id="nomProyectoAgregarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
	          <input id="dniAgregarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
	          <input id="nombreAgregarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-Mail</label>
	          <input id="emailAgregarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono</label>
	          <input id="fonoAgregarResponsableProyecto" class="form-control" type="text" value="">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar responsable proyecto en compras -->
<div id="modalEditarResponsableProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span>Editar Responsable Proyecto</span>
          <br>
          <span id="tituloEditarResponsableProyecto" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEditarResponsableProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
            <select disabled id="proyectoEditarResponsableProyecto" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nom. Proyecto</label>
	          <input disabled id="nomProyectoEditarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI</label>
	          <input id="dniEditarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
	          <input id="nombreEditarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">E-Mail</label>
	          <input id="emailEditarResponsableProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fono</label>
	          <input id="fonoEditarResponsableProyecto" class="form-control" type="text" value="">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar responsable compras -->
<div id="modalEliminarResponsableProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;
          <span>Eliminar responsable proeycto</span>
          <br>
          <span id="cabeceraEliminarResponsableProyecto" style="font-size: 12pt;"></span>
        </h5>
      </div>
			<div id="bodyEliminarResponsableProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Esta seguro que desea eliminar el responsable de este proyecto?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloEliminarResponsableProyecto"></i></font>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarResponsableProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Configurar checks en tipo de vehiculo -->
<div id="modalConfigChecksTipoVeh" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 80%; max-width: 80%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-wrench"></span>&nbsp;&nbsp;<span>Configuración de Checks</span>
        </h5>
      </div>
			<div id="bodyConfigChecksTipoVeh" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">

					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo Vehiculo</label>
            <select id="selectorTipoConfigChecksTipoVeh" class="form-control">
            </select>
          </div>

					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">&nbsp;</label>
						<button id="agregarCheckTipoConfigChecksTipoVeh" type="button" class="form-control btn btn-secondary">Agregar CheckTipo</button>
					</div>
					<div id="divTablaConfigChecksTipoVeh" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
					  <table id="tablaConfigChecksTipoVeh" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="DNI">Folio</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Item</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Tipo</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Rol">Indispensable</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Borrar">Descontable</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaConfigChecksTipoVeh" style="text-align: left;">

					    </tbody>
					  </table>
					</div>

          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
            <button class="form-control btn btn-secondary botonComun" id="agregarCheck" disabled>
              <span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar
            </button>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
            <button class="form-control btn btn-secondary botonComun" id="editarCheck" disabled>
              <span class="fas fa-edit"></span>&nbsp;&nbsp;Editar
            </button>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
            <button class="form-control btn btn-secondary botonComun" id="eliminarCheck" disabled>
              <span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar
            </button>
          </div>

        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarConfigChecksTipoVeh" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INGRESAR DOCUMENTOS A OBRA -->
<div id="modalIngresarDocumentosObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Documentos</span>
          <br>
          <span id="folioIngresarDocumentosObra" style="font-size: 12pt;"></span>
          <br>
          <span id="oeIngresarDocumentosObra" style="font-size: 12pt;"></span>
					<br>
          <span id="tipoIngresarDocumentosObra" style="font-size: 12pt;"></span>
        </h5>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
          <label style="font-weight: bold;">Tipo (para ingreso de documentos)</label>
          <select id="selectTipoIngresarDocumentosObra" class="form-control">
          </select>
        </div>
      </div>
			<div id="bodyIngresarDocumentosObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h5 style="color:gray; font-weight: bold;"><span>Carga de archivo</span>
          </div>
          <br>
          </h5>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Nombre</label>
	            <input id="nombrePdfIngresarDocumentosObra" type="text" class="form-control">
	          </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Observación</label>
	            <textarea id="observacionIngresarDocumentosObra" class="form-control" rows="2" style="resize: none;" maxlength="3000"></textarea>
	          </div>

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
	            <label style="font-weight: bold;">Documento <b></b> </label>
	            <div class="input-group">
								<label class="input-group-btn">
										<span id="sintomasSpanIngresarDocumentosObra" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
												<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id="pdfCargaIngresarDocumentosObra" style="display: none;">
										</span>
								</label>
								<input disabled id="inputPdfIngresarDocumentosObra" type="text" class="form-control" readonly>
							</div>
						</div>

          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
            <button class="form-control btn btn-secondary botonComun" id="guardarPDfIngresarDocumentosObra">
              Guardar
            </button>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
            <button class="form-control btn btn-secondary botonComun" id="validarPDfIngresarDocumentosObra">
              Validar
            </button>
          </div>
          <div id="divTablaIngresarDocumentosObra" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
					  <table id="tablaIngresarDocumentosObra" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Folio">Folio</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Nombre">Nombre</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Archivo">Archivo</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Tipo archivo">Tipo archivo</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Documento">Documento</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Validado">Validado</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Tipo">Tipo</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Observación">Observación</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaIngresarDocumentosObra" style="text-align: left;">
					    </tbody>
					  </table>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarIngresarDocumentosObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESAR DOCUMENTOS A OBRA -->

<!-- MODAL VISTA CUBICACION -->
<div id="modalDetalleCubicacion" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
          <span>Detalle Cubicación</span>
          <br>
          <span id="folioObraDetalleCubicacion" style="font-size: 12pt;"></span>
          <br>
          <span id="oeDetalleCubicacion" style="font-size: 12pt;"></span>
          <br>
          <span id="codigoCubDetalleCubicacion" style="font-size: 12pt;"></span>
					<input id="idTablaCubDetalleCubicacion"  type="hidden" name="" value="">
					<input id="changeSelectorTipo"  type="hidden" name="" value="">
        </h5>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
          <label style="font-weight: bold;">Tipo</label>
          <select id="tipoFiltroObra" class="form-control">
          </select>
        </div>
      </div>
			<div id="bodyDetalleCubicacion" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div id="divTablaDetalleCubicacion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">

					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<button id="cancelarDetalleCubicacion" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL VISTA CUBICACION -->

<!-- MODAL INGRESO MANTENEDOR ESPECIALIDAD OBRAS -->
<div id="modalIngresoMantEspecialidad" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoMantEspecialidad"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Especialidad</h5>
      </div>
      <div id="bodyIngresoMantEspecialidad" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Especialidad</label>
            <input id="nombreIngresoMantEspecialidad" class="form-control" type="text">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. Especialidad</label>
            <input id="codigoIngresoMantEspecialidad" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO MANTENEDOR ESPECIALIDAD OBRAS -->

<!-- MODAL EDITAR MANTENEDOR ESPECIALIDAD OBRAS -->
<div id="modalEditarMantEspecialidad" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarMantEspecialidad"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Especialidad </h5>
      </div>
      <div id="bodyEditarMantEspecialidad" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarMantEspecialidad" class="form-control" type="text">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">ID Agencia</label>
            <input id="codigoEditarMantEspecialidad" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR MANTENEDOR ESPECIALIDAD OBRAS -->

<!-- MODAL ELIMINAR MANTENEDOR ESPECIALIDAD OBRAS -->
<div id="modalEliminarMantEspecialidad" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarMantEspecialidad"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Especialidad</h5>
      </div>
			<div id="bodyEliminarMantEspecialidad" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la especialidad?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarMantEspecialidad"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantEspecialidad" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR MANTENEDOR ESPECIALIDAD OBRAS -->

<!-- MODAL INGRESO MANTENEDOR UNIDAD DE OBRA OBRAS -->
<div id="modalIngresoMantUnidadObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoMantUnidadObra"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Unidad de Obra</h5>
      </div>
      <div id="bodyIngresoMantUnidadObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoMantUnidadObra" class="form-control" type="text">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">UM</label>
						<select id="umIngresoMantUnidadObra" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor</label>
            <input id="valorIngresoMantUnidadObra" class="form-control" type="number"  min="0">
          </div>

					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proveedor</label>
            <select id="proveedorIngresoMantUnidadObra" class="form-control">
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. UO (Cliente)</label>
						<input id="codUoIngresoMantUnidadObra" class="form-control" type="text">
					</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. SIMA (Cliente)</label>
						<input id="codMatIngresoMantUnidadObra" class="form-control" type="text">
					</div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. SAP (Cliente)</label>
            <input id="codClienteIngresoMantUnidadObra" class="form-control" type="text">
          </div>

					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. SAP (Interno)</label>
						<input id="cod1IngresoMantUnidadObra" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. 2 (Interno)</label>
						<input id="cod2IngresoMantUnidadObra" class="form-control" type="text">
					</div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. 3 (Interno)</label>
            <input id="cod3IngresoMantUnidadObra" class="form-control" type="text">
          </div>


        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO MANTENEDOR UNIDAD DE OBRA OBRAS -->

<!-- MODAL EDITAR MANTENEDOR UNIDAD DE OBRA OBRAS -->
<div id="modalEditarMantUnidadObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloEditarMantUnidadObra"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Unidad de Obra</h5>
      </div>
      <div id="bodyEditarMantUnidadObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarMantUnidadObra" class="form-control" type="text">
          </div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">UM</label>
						<select id="umEditarMantUnidadObra" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor</label>
            <input id="valorEditarMantUnidadObra" class="form-control" type="number"  min="0">
          </div>

					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proveedor</label>
            <select id="proveedorEditarMantUnidadObra" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. UO (Cliente)</label>
            <input id="codUoEditarMantUnidadObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. SIMA (Cliente)</label>
            <input id="codMatEditarMantUnidadObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. SAP (Cliente)</label>
            <input id="codClienteEditarMantUnidadObra" class="form-control" type="text">
          </div>

					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. SAP (Interno)</label>
						<input id="cod1EditarMantUnidadObra" class="form-control" type="text">
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Cód. 2 (Interno)</label>
						<input id="cod2EditarMantUnidadObra" class="form-control" type="text">
					</div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cód. 3 (Interno)</label>
            <input id="cod3EditarMantUnidadObra" class="form-control" type="text">
          </div>


        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR MANTENEDOR UNIDAD DE OBRA OBRAS -->

<!-- MODAL ELIMINAR MANTENEDOR UNIDAD DE OBRA -->
<div id="modalEliminarMantUnidadObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarMantUnidadObra"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Unidad de Obra</h5>
      </div>
			<div id="bodyEliminarMantUnidadObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la unidad de obra?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarMantUnidadObra"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantUnidadObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR MANTENEDOR UNIDAD DE OBRA -->


<!-- MODAL INGRESO MANTENEDOR MANO DE OBRA OBRAS -->
<div id="modalIngresoMantManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoMantManoObra"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Mano de Obra</h5>
      </div>
      <div id="bodyIngresoMantManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoMantManoObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código</label>
            <input id="codigoIngresoMantManoObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Especialidad</label>
						<select id="especialidadIngresoMantManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">UM</label>
						<select id="umIngresoMantManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cantidad</label>
            <input id="cantidadIngresoMantManoObra" class="form-control" type="number"  min="0">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PB</label>
            <input id="pbIngresoMantManoObra" class="form-control" type="number"  min="0" step="0.01">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO MANTENEDOR MANO DE OBRA OBRAS -->

<!-- MODAL EDITAR MANTENEDOR MANO DE OBRA OBRAS -->
<div id="modalEditarMantManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloEditarMantManoObra"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Mano de Obra</h5>
      </div>
      <div id="bodyEditarMantManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarMantManoObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código</label>
            <input id="codigoEditarMantManoObra" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Especialidad</label>
						<select id="especialidadEditarMantManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">UM</label>
						<select id="umEditarMantManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cantidad</label>
            <input id="cantidadEditarMantManoObra" class="form-control" type="number"  min="0">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PB</label>
            <input id="pbEditarMantManoObra" class="form-control" type="number"  min="0" step="0.01">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR MANTENEDOR MANO DE OBRA OBRAS -->

<!-- MODAL ELIMINAR MANTENEDOR MANO DE OBRA -->
<div id="modalEliminarMantManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarMantManoObra"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Mano de Obra</h5>
      </div>
			<div id="bodyEliminarMantManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la mano de obra?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarMantManoObra"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR MANTENEDOR MANO DE OBRA -->


<!-- MODAL INGRESO MANTENEDOR VALOR MANO DE OBRA OBRAS -->
<div id="modalIngresoMantValorManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoMantValorManoObra"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Valor Mano de Obra</h5>
      </div>
      <div id="bodyIngresoMantValorManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
						<select id="comunaIngresoMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Agencia</label>
						<select id="agenciaIngresoMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Especialidad</label>
						<select id="especialidadIngresoMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor</label>
            <input id="valorIngresoMantValorManoObra" class="form-control" type="number"  min="0">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL INGRESO MANTENEDOR VALOR MANO DE OBRA OBRAS -->

<!-- MODAL EDITAR MANTENEDOR VALOR MANO DE OBRA OBRAS -->
<div id="modalEditarMantValorManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloEditarMantValorManoObra"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Valor Mano de Obra</h5>
      </div>
      <div id="bodyEditarMantValorManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
						<select id="comunaEditarMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Agencia</label>
						<select id="agenciaEditarMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Especialidad</label>
						<select id="especialidadEditarMantValorManoObra" class="form-control"></select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor</label>
            <input id="valorEditarMantValorManoObra" class="form-control" type="number"  min="0">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL EDITAR MANTENEDOR VALOR MANO DE OBRA OBRAS -->

<!-- MODAL ELIMINAR MANTENEDOR VALOR MANO DE OBRA -->
<div id="modalEliminarMantValorManoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarMantValorManoObra"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Valor Mano de Obra</h5>
      </div>
			<div id="bodyEliminarMantValorManoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar el valor de mano de obra?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreEliminarMantValorManoObra"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantValorManoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ELIMINAR MANTENEDOR VALOR MANO DE OBRA -->

<!-- MODAL ASIGNAR SUBCC OBRAS -->
<div id="modalAsignarSubccObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloAsignarSubccObra"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Asignar brigada</h5>
      </div>
      <div id="bodyAsignarSubccObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Jefe Brigada</label>
						<select id="brigadaAsignarSubccObra" class="form-control"></select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignarSubccObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarSubccObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ASIGNAR SUBCC OBRAS -->


<!-- MODAL AGREGAR PAIS -->
<div id="modalAgregarPais" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAgregarPais"><span class="fas fa-plus"></span>&nbsp;&nbsp;Agregar País</h5>
      </div>
      <div id="bodyAgregarPais" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Abreviatura</label>
            <input id="abreviaturaAgregarPais" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">País</label>
            <input id="nombreAgregarPais" class="form-control" type="text">
            </input>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarPais" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarPais" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL AGREGAR PAIS -->

<!-- MODAL EDITAR PAIS -->
<div id="modalEditarPais" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarPais"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar País</h5>
      </div>
      <div id="bodyEditarPais" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Abreviatura</label>
            <input id="abreviaturaEditarPais" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">País</label>
            <input id="nombreEditarPais" class="form-control" type="text">
            </input>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarPais" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarPais" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL EDITAR PAIS -->

<!-- MODAL ASIGNAR PROYECTO INTERNO OBRAS -->
<div id="modalAsignarProyInternoObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 0pt;">
				<h5><span class="fas fa-project-diagram"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Asignar Proyecto Interno</span>
          <br>
					<div style="padding-top: 5pt; padding-bottom: 0pt; margin-bottom: 0pt;">
						<span id="oeAsignarProyInternoObra" style="font-weight: bold; color: gray; font-size: 14pt;"></span>
						<br>
						<span id="proyectoOrdenEjecucionSimple" style="font-weight: bold; color: gray; font-size: 14pt;"></span>
					</div>
        </h5>
      </div>
      <div id="bodyAsignarProyInternoObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Tipo:</label>
						<span style="font-weight: bold; color: gray; font-size: 14pt;" id="tipoOrdenEjecucionSimple"></span>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Empresa</label>
						<select id="nombreProyInternoObra" class="form-control"></select>
          </div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row" id ="datosOrdenFull"></div>
          </div>

        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignarProyInternoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarProyInternoObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ASIGNAR PROYECTO INTERNO OBRAS -->

<!-- MODAL DUPLICAR OT -->
<div id="modalDuplicarOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDuplicarOt"><span class="far fa-clone"></span>&nbsp;&nbsp;Duplicar orden de trabajo</h5>
      </div>
			<div id="bodyDuplicarOt" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold;">Cantidad</label>
            <input id="cantidadDuplicarOt" class="form-control input-number" type="number"  min="1" step="1" value="1">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea duplicar la orden de trabajo?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="detalleDuplicarOt"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDuplicarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDuplicarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DUPLICAR OT  -->

<div id="modalAsignarOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Asociar orden de trabajo</span>
          <br>
					<div>
						<span id="detalleAsignarOt" style="font-size: 11pt;"></span>
					</div>
          <br>
					<div>
						<span id="detalle2AsignarOt" style="font-size: 11pt;"></span>
					</div>
					<br>
          <input id="idObraCubicacionAsignarOts"  type="hidden" name="" value="">
					<input id="folioAsignatOts"  type="hidden" name="" value="">
          <input id="idTablaCubAsignatOts"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyAsignarOt" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 20pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea asociar la orden de trabajo?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="detalleAsignarOt"></i></font>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold;">OTs</label>
            <select id="otsAsignarOt"></select>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDistribuirOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Distribuir cubicación</span>
          <br>
          <span id="correlativoDistribuirOt" style="font-size: 11pt;"></span>
          <br>
          <span id="idCubicacionDistribuirOt" style="font-size: 11pt;"></span>
          <br>
          <span id="mObraDistribuirOt" style="font-size: 11pt;"></span>
          <br>
          <span id="uObraDistribuirOt" style="font-size: 11pt;"></span>
					<input id="idObraDistribuirOt"  type="hidden" name="" value="">
          <input id="idTablaCubDistribuirOt"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyDistribuirOt" class="modal-body alerta-modal-body">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div id="rowDistribuirOt" class="row emphasis" style="text-align: left;">

	        </div>
				</div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDistribuirOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Distribuir</button>
        <button id="cancelarDistribuirOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL AGREGAR AREA FUNCIONAL -->
<div id="modalAgregarAreaFuncional" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAgregarAreaFuncional"><span class="fas fa-plus"></span>&nbsp;&nbsp;Agregar Comuna</h5>
      </div>
      <div id="bodyAgregarAreaFuncional" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <input id="comunaAgregarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Provincia</label>
            <input id="provinciaAgregarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Región</label>
            <input id="regionAgregarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código Postal</label>
            <input id="codigoAgregarPostalAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">País</label>
						<select id="paisAgregarAreaFuncional" class="form-control"></select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarAreaFuncional" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarAreaFuncional" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL AGREGAR AREA FUNCIONAL -->

<!-- MODAL EDITAR AREA FUNCIONAL -->
<div id="modalEditarAreaFuncional" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarAreaFuncional"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Comuna</h5>
      </div>
      <div id="bodyEditarAreaFuncional" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <input id="comunaEditarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Provincia</label>
            <input id="provinciaEditarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Región</label>
            <input id="regionEditarAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Código Postal</label>
            <input id="codigoEditarPostalAreaFuncional" class="form-control" type="text">
            </input>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">País</label>
						<select id="paisEditarAreaFuncional" class="form-control"></select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
						<select id="estadoEditarAreaFuncional" class="form-control">
							<option value="Activa">Activa</option>
							<option value="Desactivada">Desactivada</option>
						</select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarAreaFuncional" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarAreaFuncional" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL EDITAR AREA FUNCIONAL -->

<!-- MODAL EDITAR DIAS OBRA -->
<div id="modalEditarDiasObras" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarDiasObras"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Rango Días</h5>
      </div>
      <div id="bodyEditarDiasObras" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Días Faltantes</label>
            <input id="nroDiasEditarDiasObras" class="form-control" type="text">
            </input>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarDiasObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarDiasObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL EDITAR DIAS OBRA -->

<!-- MODAL VALIDAR DOCUMENTOS OBRA -->
<div id="modalValidarDocumentosObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloValidarDocumentosObra"><span class="fas fa-check"></span>&nbsp;&nbsp;Validar Documento</h5>
      </div>
			<div id="bodyValidarDocumentosObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea validar el documento?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="nombreValidarDocumentosObra"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarValidarDocumentosObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarValidarDocumentosObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL VALIDAR DOCUMENTOS OBRA -->

<div id="modalAddFormularioAuditoria" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Auditoría</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <label style="font-weight: bold;">Titulo</label>
            <input id="auditoriaTitulo" class="form-control" type="text">
            </input>

          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarFormularioAuditoriaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFormularioAuditoriaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalDelFormularioAuditoria" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;Eliminar Auditoría</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la auditoría?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;"></i></font>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarFormularioAuditoriaDel" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFormularioAuditoriaDel" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAddFormularioCategoria" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Elemento</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Item</label>
            <select id="formularioFamilia" class="form-control">
            </select>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nuevo Item</label>
            <input id="formularioFamiliaNuevo" class="form-control" type="text">
            </input>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Elemento</label>
            <input id="formularioCategoriaAdd" class="form-control" type="text">
            </input>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarFormularioCategoriaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFormularioCategoriaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAddFormularioFalla" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Anomalía</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <input id="idFormularioEstructura" class="form-control" type="hidden">
            </input>

            <label style="font-weight: bold;">Anomalía</label>
            <input id="inpFormularioFalla" class="form-control" type="text">
            </input>

          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarFormularioFallaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFormularioFallaAdd" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDelFormularioFalla" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;Eliminar Elemento/Anomalía</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar los items seleccionados?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;"></i></font>
            <input id="catsFormEstruct" type="hidden">
            <input id="idsFallsFormEstruc" type="hidden">
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarFormularioEstructuraDel" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarFormularioEstructuraDel" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAsignarFechaTerrenoOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAsignarFechaTerrenoOt"><span class="far fa-calendar-plus"></span>&nbsp;&nbsp;Asignar Fechas de Ejecución </h5>
      </div>
      <div id="bodyAsignarFechaTerrenoOt" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Inicio Ejecución</label>
            <input id="fechaInicioAsignarFechaTerrenoOt" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Fin Ejecución</label>
            <input id="fechaFinAsignarFechaTerrenoOt" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarAsignarFechaTerrenoOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarFechaTerrenoOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEliminarOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarOt"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar órden de trabajo</h5>
      </div>
			<div id="bodyEliminarOt" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la orden de trabajo?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="datosEliminarOt"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalAsignarFechaTerrenoOtDesdeOe" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAsignarFechaTerrenoOtDesdeOe"><span class="far fa-calendar-plus"></span>&nbsp;&nbsp;Asignar Fechas de Ejecución </h5>
      </div>
      <div id="bodyAsignarFechaTerrenoOtDesdeOe" class="modal-body alerta-modal-body">
      <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Inicio Ejecución</label>
            <input id="fechaInicioAsignarFechaTerrenoOtDesdeOe" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Fin Ejecución</label>
            <input id="fechaFinAsignarFechaTerrenoOtDesdeOe" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarAsignarFechaTerrenoOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarFechaTerrenoOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalAsignarSubccObraDesdeOe" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloAsignarSubccObraDesdeOe"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Asignar brigada</h5>
      </div>
      <div id="bodyAsignarSubccObraDesdeOe" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Jefe Brigada</label>
						<select id="brigadaAsignarSubccObraDesdeOe" class="form-control"></select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignarSubccObraDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarSubccObraDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div id="modalDuplicarOtDesdeOe" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDuplicarOtDesdeOe"><span class="far fa-clone"></span>&nbsp;&nbsp;Duplicar orden de trabajo</h5>
      </div>
			<div id="bodyDuplicarOtDesdeOe" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold;">Cantidad</label>
            <input id="cantidadDuplicarOtDesdeOe" class="form-control input-number" type="number"  min="1" step="1" value="1">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea duplicar la orden de trabajo?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="detalleDuplicarOtDesdeOe"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDuplicarOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDuplicarOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEliminarOtDesdeOe" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarOtDesdeOe"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar órden de trabajo</h5>
      </div>
			<div id="bodyEliminarOtDesdeOe" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar la orden de trabajo?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="datosEliminarOtDesdeOe"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarOtDesdeOe" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DETALLE ORDEN TRABAJO -->
<div id="modalDetalleOrdenTrabajo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 95%; max-width: 95%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header" style="padding-right: 0;">
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tituloDetalleOrdenTrabajo" style="text-align: left; padding-right: 0; line-height: 1em; font-size: 0.875em;">
        </div>
      </div>
			<div id="bodyDetalleOrdenTrabajo" style="padding-right: 0; padding-left: 0; padding-top: 0;" class="modal-body alerta-modal-body">
        <div id="cuerpoDetalleOrdenTrabajo" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; line-height: 1em; font-size: 0.875em;">
        </div>

        <div id="cuerpoDetalleOrdenTrabajoCubicacion" class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; line-height: 1em; font-size: 0.875em; padding-right: 0;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 10pt;">
            <span style="font-weight: bold; color:gray; font-size: 1.2em;">Cubicación</span>
          </div>
          <div id="tablaDetalleOrdenTrabajoCubicacion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15pt; padding-right: 0;">
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="cancelarDetalleOrdenTrabajo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL DETALLE ORDEN TRABAJO -->

<!-- MODAL ANTICIPO MATERIAL OBRAS DESDE OE  -->
<div id="modalAnticipoMatObras" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
          <span>Anticipar Material</span>
          <br>
          <span id="folioObraAnticipoMatObras" style="font-size: 12pt;"></span>
          <br>
          <span id="oeAnticipoMatObras" style="font-size: 12pt;"></span>
          <br>
          <span id="codigoCubAnticipoMatObras" style="font-size: 12pt;"></span>
					<input id=""  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyAnticipoMatObras" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div id="divTablaAnticipoMatObras" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">

					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<!--<button id="guardarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Enviar</button>-->
				<button id="cancelarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL ANTICIPO MATERIAL OBRAS DESDE OE-->

<div id="modalGuardarAnticipoMatObras" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Anticipar Materiales</span>
          <br>
					<div class="" style="width: 750px;">
						<span id="detalleGuardarAnticipoMatObras" style="font-size: 11pt;"></span>
					</div>
          <br>
					<input id="idCubGuardarAnticipoMatObras"  type="hidden" name="" value="">
					<input id="foliGuardarAnticipoMatObras"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyGuardarAnticipoMatObras" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 20pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea anticipar los materiales?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarGuardarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PEDIR MATERIAL OBRAS DESDE OT -->
<div id="modalPedirMatObrasOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
          <span>Pedido de Materiales</span>
          <br>
          <span id="folioObraPedirMatObrasOt" style="font-size: 12pt;"></span>
          <br>
          <span id="oePedirMatObrasOt" style="font-size: 12pt;"></span>
          <br>
          <span id="codigoCubPedirMatObrasOt" style="font-size: 12pt;"></span>
					<input id=""  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyPedirMatObrasOts" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div id="divTablaPedirMatObrasOt" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">

					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<!--<button id="guardarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Enviar</button>-->
				<button id="cancelarPedirMatObrasOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL PEDIR MATERIAL OBRAS DESDE OT -->

<div id="modalGuardarPeticionMatObrasOt" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Pedido de Materiales</span>
          <br>
          <span id="detalleGuardarPeticionMatObrasOt" style="font-size: 11pt;"></span>
          <br>
					<span id="detalle2GuardarPeticionMatObrasOt" style="font-size: 11pt;"></span>
					<input id="idCubGuardarPeticionMatObrasOt"  type="hidden" name="" value="">
					<input id="idOtGuardarPeticionMatObrasOt"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyGuardarPeticionMatObrasOt" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 20pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea pedir los materiales?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarPeticionMatObrasOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarGuardarPeticionMatObrasOt" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div id="modalDetalleAgregarMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
          <span>Gestionar Material</span>
          <br>
          <span id="folioAgregarMaterial" style="font-size: 12pt;"></span>
					<br>
					<span id="tipoAgregarMaterial" style="font-size: 12pt;"></span>
					<br>
					<span id="areaAgregarMaterial" style="font-size: 12pt;"></span>
					<input id="tipoSolicitudAgregarMaterial"  type="hidden" name="" value="">
          <br>
        </h5>
      </div>
			<div id="bodyAgregarMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div id="divTablaAgregarMaterial" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">

					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<button id="cancelarAgregarMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalSolicitarClienteSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Solicitar a cliente</span>
          <br>
          <span id="detalleSolicitarClienteSolicitudMaterial" style="font-size: 11pt;"></span>
          <br>
					<input id="idCubSolicitarClienteSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioSolicitarClienteSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoSolicitarClienteSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodySolicitarClienteSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea solicitar al cliente?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarSolicitarClienteSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSolicitarClienteSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PEDIR MATERIAL OBRAS DESDE OE -->
<div id="modalPedirMatObrasOrdenEjec" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="far fa-edit"></span>&nbsp;&nbsp;
          <span>Pedido de Materiales</span>
          <br>
          <span id="folioObraPedirMatObrasOrdenEjec" style="font-size: 12pt;"></span>
          <br>
          <span id="oePedirMatObrasOrdenEjec" style="font-size: 12pt;"></span>
          <br>
          <span id="codigoCubPedirMatObrasOrdenEjec" style="font-size: 12pt;"></span>
					<input id=""  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyPedirMatObrasOrdenEjec" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div id="divTablaPedirMatObrasOrdenEjec" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">

					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<!--<button id="guardarAnticipoMatObras" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Enviar</button>-->
				<button id="cancelarPedirMatObrasOrdenEjec" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL PEDIR MATERIAL OBRAS DESDE OE -->

<div id="modalGuardarPeticionMatObrasOrdenEjec" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Pedido de Materiales</span>
          <br>
          <span id="detalleGuardarPeticionMatObrasOrdenEjec" style="font-size: 11pt;"></span>
          <br>
					<span id="detalle2GuardarPeticionMatObrasOrdenEjec" style="font-size: 11pt;"></span>
					<input id="idCubGuardarPeticionMatObrasOrdenEjec"  type="hidden" name="" value="">
					<input id="idOtGuardarPeticionMatObrasOrdenEjec"  type="hidden" name="" value="">
					<input id="idObraGuardarPeticionMatObrasOrdenEjec"  type="hidden" name="" value="">
          <input id="idTablaGuardarPeticionMatObrasOrdenEjec"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyGuardarPeticionMatObrasOrdenEjec" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; margin-bottom: 20pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea pedir los materiales?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarPeticionMatObrasOrdenEjec" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarGuardarPeticionMatObrasOrdenEjec" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalIngresoContactoClienteZonasObra" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h5><span class="fas fa-address-card"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Contacto Cliente</span>
          <br>
          <span id="folioIngresoContactoClienteZonasObra" style="font-size: 11pt;"></span>
					<br>
					<span id="proyectoIngresoContactoClienteZonasObra" style="font-size: 11pt;"></span>
					<br>
					<span id="comunaIngresoContactoClienteZonasObra" style="font-size: 11pt;"></span>
					<input id="folioIngresoContactoClienteZonasObra2"  type="hidden" name="" value="">
        </h5>
      </div>
      <div id="bodyIngresoContactoClienteZonasObra" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Correo</label>
            <input id="correoIngresoContactoClienteZonasObra" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Teléfono</label>
            <input id="telefonoIngresoContactoClienteZonasObra" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoContactoClienteZonasObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoContactoClienteZonasObra" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEstadoPreparacionSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Materiales en preparación</span>
          <br>
          <span id="detalleEstadoPreparacionSolicitudMaterial" style="font-size: 11pt;"></span>
          <br>
					<input id="idCubEstadoPreparacionSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioEstadoPreparacionSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoEstadoPreparacionSolicitudMaterial"  type="hidden" name="" value="">
					<input id="estadoPreparacionSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyEstadoPreparacionSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="folioCoordPreparacion" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Folio coodinador</label>
            <input id="folioCoordEstadoPreparacionSolicitudMaterial" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<div class="row obtenerBodegasEnPreparacion" id ="datosBodegaEnPreparacion"></div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea cambiar el estado de los materiales en preparación?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left; margin-left: 0pt; padding-left: 0pt;">
				<div id="copiarInputsBodegaPreparacion" style="margin-bottom: 0pt; margin-top: 0pt; margin-left: 0pt; padding-left: 0pt; text-align: left;" class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<label class="switch" style="margin-top: 5pt; text-align: center;">
						<input id="checkboxInputsBodegaPreparacion" type="checkbox" title="Todas las bodegas son iguales">
						<span class="slider round"></span>
					</label>
					<label style="font-weight: bold; color: gray; font-size: 10pt;">Todas las bodegas son iguales</label>
				</div>
        <button id="guardarEstadoPreparacionSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEstadoPreparacionSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEstadoPreparadoSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Materiales preparados</span>
          <br>
          <span id="detalleEstadoPreparadoSolicitudMaterial" style="font-size: 11pt;"></span>
					<br>
					<input id="idCubEstadoPreparadoSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioEstadoPreparadoSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoEstadoPreparadoSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyEstadoPreparadoSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<div class="row obtenerBodegasPreparado" id ="datosBodegaPreparado"></div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea cambiar el estado de los materiales a preparado?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<div id="copiarInputsBodegaPreparado" style="margin-bottom: 0pt; margin-top: 0pt; margin-left: 0pt; padding-left: 0pt; text-align: left;" class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<label class="switch" style="margin-top: 5pt; text-align: center;">
						<input id="checkboxInputsBodegaPreparado" type="checkbox" title="Todas las bodegas son iguales">
						<span class="slider round"></span>
					</label>
					<label style="font-weight: bold; color: gray; font-size: 10pt;">Todas las bodegas son iguales</label>
				</div>
        <button id="guardarEstadoPreparadoSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEstadoPreparadoSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEstadoBodegaSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Materiales en bodega</span>
          <br>
          <span id="detalleEstadoBodegaSolicitudMaterial" style="font-size: 11pt;"></span>
          <br>
					<input id="idCubEstadoBodegaSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioEstadoBodegaSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoEstadoBodegaSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyEstadoBodegaSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<div class="row obtenerBodegasEnBodega" id ="datosBodegaEnBodega"></div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que los materiales se encuentran en bodega?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<div id="copiarInputsBodegaBodega" style="margin-bottom: 0pt; margin-top: 0pt; margin-left: 0pt; padding-left: 0pt; text-align: left;" class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<label class="switch" style="margin-top: 5pt; text-align: center;">
						<input id="checkboxInputsBodegaBodega" type="checkbox" title="Todas las bodegas son iguales">
						<span class="slider round"></span>
					</label>
					<label style="font-weight: bold; color: gray; font-size: 10pt;">Todas las bodegas son iguales</label>
				</div>
        <button id="guardarEstadoBodegaSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEstadoBodegaSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEstadoEntregadoSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="far fa-clone"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Entrega de materiales</span>
          <br>
          <span id="detalleEstadoEntregadoSolicitudMaterial" style="font-size: 11pt;"></span>
          <br>
					<input id="idCubEstadoEntregadoSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioEstadoEntregadoSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoEstadoEntregadoSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
			<div id="bodyEstadoEntregadoSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Guía de despacho</label>
            <input id="guiaDespachoEstadoEntregadoSolicitudMateria" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">Datos del personal que recibe la entrega:</font>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rut</label>
            <input id="rutPersEntregaEstadoEntregadoSolicitudMateria" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombrePersEntregaEstadoEntregadoSolicitudMateria" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Observación</label>
            <textarea id="obserEstadoEntregadoSolicitudMateria" class="form-control" rows="3" style="resize: none;" maxlength="3990"></textarea>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea entregar los materiales?</font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEstadoEntregadoSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEstadoEntregadoSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalSubirPdfGuiaSolicitudMaterial" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfGuiaSolicitudMaterial" style="font-size: 12pt;"></span>
					<input id="idEntregaSubirPdfGuiaSolicitudMaterial"  type="hidden" name="" value="">
          <input id="folioSubirPdfGuiaSolicitudMaterial"  type="hidden" name="" value="">
					<input id="tipoSubirPdfGuiaSolicitudMaterial"  type="hidden" name="" value="">
        </h5>
      </div>
      <div id="bodySubirPdfGuiaSolicitudMaterial" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Entrega Material <b><span id="spanPdfEntregaMaterial" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaEntregaMaterial' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfEntregaMaterial' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Guía despacho <b><span id="spanGuiaDespachoEntregaMaterial" style="color:green;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfGuiaDespachoEntregaMaterial' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfGuiaDespachoEntregaMaterial' type="text" class="form-control" readonly>
						</div>
          </div>
        </div>
        <div class="modal-footer" style="text-align: left;">
        <button id="guardarSubirPdfGuiaSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarSubirPdfGuiaSolicitudMaterial" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal asignar comprador a proveedores -->
<div id="modalAsignarCompradorProveedor" class="modal modal-fullscreen fade" role="dialog">
    <div class="modal-dialog modal-dialog-box modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:gray; font-weight: bold;"><span class="fas fa-headset"></span>&nbsp;&nbsp;
									<span>Asignar comprador</span>
									<br>
									<span id="tituloAsignarCompradorProveedor" style="font-size: 12pt;"></span>
								</h5>
            </div>
            <div id="bodyAsignarCompradorProveedor" class="modal-body alerta-modal-body" style="text-align: left;">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <label style="font-weight: bold;">Comprador</label>
								<select id="compradorAsignarCompradorProveedor" class="form-control">

		            </select>
		          </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
								<button id="guardarAsignarCompradorProveedor" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
                <button id="cerrarAsignarCompradorProveedor" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="modalAgregarMantCargos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Agregar Cargo</h5>
      </div>

      <div id="bodyAgregarMantCargos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Serie</label>
            <input id="serieMantCargos_agr" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">IMEI</label>
            <input id="imeiMantCargos_agr" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Linea</label>
            <input id="lineaMantCargos_agr" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo</label>
						<select id="tipoMantCargos_agr" class="form-control">

						</select>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
						<select id="marcaMantCargos_agr" class="form-control">

						</select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <select id="modeloMantCargos_agr" class="form-control">

						</select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor referencial ($)</label>
            <input id="valroRefMantCargos_agr" class="form-control input-number" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Ingreso</label>
            <input id="fechaIngresoMantCargos_agr" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoMantCargos_agr" class="form-control">
							<option value="Disponible">Disponible</option>
							<option value="Asignado">Asignado</option>
							<option value="Baja">Baja</option>
						</select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Carácteristicas</label>
            <textarea id="caracteristicasCargos_agr" class="form-control" rows="5" style="resize: none;" maxlength="4000"></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarMantCargos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Cargo</h5>
      </div>

      <div id="bodyEditarMantCargos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Serie</label>
            <input id="serieMantCargos_upd" class="form-control" type="text" disabled />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">IMEI</label>
            <input id="imeiMantCargos_upd" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Linea</label>
            <input id="lineaMantCargos_upd" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold;">Tipo</label>
						<select id="tipoMantCargos_upd" class="form-control">

						</select>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
						<select id="marcaMantCargos_upd" class="form-control">

						</select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <select id="modeloMantCargos_upd" class="form-control">

						</select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Valor referencial ($)</label>
            <input id="valroRefMantCargos_upd" class="form-control input-number" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Fecha Ingreso</label>
            <input id="fechaIngresoMantCargos_upd" class="form-control" type="text" />
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoMantCargos_upd" class="form-control">
							<option value="Disponible">Disponible</option>
							<option value="Asignado">Asignado</option>
							<option value="Baja">Baja</option>
						</select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Carácteristicas</label>
            <textarea id="caracteristicasCargos_upd" class="form-control" rows="5" style="resize: none;" maxlength="4000"></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEliminarMantCargos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;"><span class="fas fa-minus-circle"></span>&nbsp;&nbsp;Eliminar Cargo</h5>
      </div>

			<div class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar el cargo seleccionado?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i id="tituloEliminarMantCargos" style="font-weight: normal; font-size: 14pt;"></i></font>
          </div>
        </div>
      </div>

			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarMantCargos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDetalleAsignacionCarga" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="width: 90%; min-width: 90%;">
    <div class="modal-content">

			<div class="modal-header">
				<h5><span class="far fa-file-alt"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Detalle Asignación Cargos</span>
          <br>
					<div style="padding-top: 5pt; padding-bottom: 0pt; margin-bottom: 0pt;">
						<span id="tituloDetalleAsignacionCarga" style="font-weight: bold; color: gray; font-size: 12pt;"></span>
					</div>
        </h5>
      </div>

      <div id="bodyDetalleAsignacionCarga" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<label style="font-weight: bold; font-size: 12pt;">Cargos</label>
						<table id="tablaDetalleAsignacionCarga" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;">S</th>
									<th class="celdaColor" style="border: 1pt solid white;">Tipo</th>
					        <th class="celdaColor" style="border: 1pt solid white;">Serie</th>
					        <th class="celdaColor" style="border: 1pt solid white;">IMEI</th>
									<th class="celdaColor" style="border: 1pt solid white;">Linea</th>
									<th class="celdaColor" style="border: 1pt solid white;">Marca</th>
									<th class="celdaColor" style="border: 1pt solid white;">Modelo</th>
									<th class="celdaColor" style="border: 1pt solid white;">F. Desasignación</th>
									<th class="celdaColor" style="border: 1pt solid white;">Estado</th>
									<th class="celdaColor" style="border: 1pt solid white;">Folio</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaDetalleAsignacionCarga" style="text-align: left;">
					    </tbody>
					  </table>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
				<button id="desasignarTodosDetalleAsignacionCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Desasignar</button>
        <button id="cancelarDetalleAsignacionCarga" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAsignarCargo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="width: 90%; min-width: 90%;">
    <div class="modal-content">

			<div class="modal-header">
				<input type="hidden" id="ocultoCantCargo" value="1">
				<h5><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Asignar Cargos</span>
          <br>
					<div style="padding-top: 5pt; padding-bottom: 0pt; margin-bottom: 0pt;">
						<span id="tituloAsignarCargo" style="font-weight: bold; color: gray; font-size: 12pt;"></span>
					</div>
        </h5>
      </div>

      <div id="bodyAsignarCargo" class="modal-body alerta-modal-body">
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">DNI - Nombre</label>
						<select id="dniAsignarCargo" class="form-control">

            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cargo</label>
            <input disabled id="cargoAsignarCargo" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sociedad</label>
            <input disabled id="sociedadAsignarCargo" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">CECO/Proyecto</label>
            <input disabled id="cecoAsignarCargo" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sucursal</label>
            <input disabled id="sucursalAsignarCargo" class="form-control" type="text" value=" ">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20pt; padding-right: 0;">
						<label style="font-weight: bold; font-size: 12pt;">Seleccione los cargos a asignar</label>
						<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0;">
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									Tipo
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									Serie
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									IMEI
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									Linea
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									Marca
								</div>
								<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-top: 10pt; margin-bottom: 10pt; font-weight: bold;">
									Modelo
								</div>
						</div>
						<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0;" id="elementosAsignarCargo">

						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0; margin-top: 10pt;">
							<label style="font-weight: bold;">Observación</label>
							<textarea id="observacionAsignarCargo" class="form-control" rows="5" style="resize: none;" maxlength="4000"></textarea>
						</div>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
				<button id="agregarAsignarCargo" style="margin-top: 10px; display: block;" type="button" class="btn btn-success">Agregar cargo</button>
				<button id="guardarAsignarCargo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Asignar</button>
        <button id="cancelarAsignarCargo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalCrear2fa" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloCrear2fa"><span class="fas fa-key"></span>&nbsp;&nbsp;Generar Clave 2fa</h5>
      </div>
			<div id="bodyCrear2fa" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: center;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    <label id="subTituloCrear2fa">
				      <h6>1. Escanea el código QR con la app Okta</h6>
				    </label>
				    <br>
				    <br>
				    <img id="qrGACrear2fa" src="" alt="">
				    <br>
						<br>
				    <label id="mensajeCrear2fa">
				      2. Ingrese el código que proporciona la app y presione guardar
				    </label>
				    <br>
				    <br>
				    <input id="codigoCrear2fa" type="text" name="" value="">
				    <br>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarCrear2fa" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCrear2fa" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalCrearEstadoProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Crear proyecto</span>
					<span id="tituloCrearEstadoProyecto" style="font-size: 12pt;"></span>
				</h5>
      </div>

      <div id="bodyCrearEstadoProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <input id="estadoCrearEstadoProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Descripción</label>
            <textarea id="descripcionCrearEstadoProyecto" class="form-control" rows="3" style="resize: none;" maxlength="1000"></textarea>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCrearEstadoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCrearEstadoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarEstadoProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
					<span>Editar proyecto</span>
					<span id="tituloEditarEstadoProyecto" style="font-size: 12pt;"></span>
					<input id="idEditarEstadoProyecto" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyEditarEstadoProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <input id="estadoEditarEstadoProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Descripción</label>
            <textarea id="descripcionEditarEstadoProyecto" class="form-control" rows="3" style="resize: none;" maxlength="1000"></textarea>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarEstadoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarEstadoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalCrearGerenciaControlling" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Crear gerencia</span>
					<span id="tituloCrearGerenciaControlling" style="font-size: 12pt;"></span>
					<input id="idCrearGerenciaControlling" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyCrearGerenciaControlling" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerencia</label>
            <input id="gerenciaCrearGerenciaControlling" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerencia</label>
            <input id="subGerenciaCrearGerenciaControlling" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerente</label>
            <select id="gerenteCrearGerenciaControlling" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerente</label>
            <select id="subgerenteCrearGerenciaControlling" class="form-control">
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCrearGerenciaControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCrearGerenciaControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarGerenciaControlling" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
					<span>Editar gerencia</span>
					<span id="tituloEditarGerenciaControlling" style="font-size: 12pt;"></span>
					<input id="idEditarGerenciaControlling" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyEditarGerenciaControlling" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerencia</label>
            <input id="gerenciaEditarGerenciaControlling" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerencia</label>
            <input id="subGgerenciaEditarGerenciaControlling" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerente</label>
            <select id="gerenteEditarGerenciaControlling" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerente</label>
            <select id="subgerenteEditarGerenciaControlling" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerente</label>
            <select id="estadoEditarGerenciaControlling" class="form-control">
							<option value="Activo">Activo</option>
							<option value="Desactivado">Desactivado</option>
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarGerenciaControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarGerenciaControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalAsignarGerenteControlling" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-user-edit"></span>&nbsp;&nbsp;
					<span>Asignar gerente/subgerente</span>
					<span id="tituloAsignarGerenteControlling" style="font-size: 12pt;"></span>
					<input id="idAsignarGerenteControlling" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyAsignarGerenteControlling" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerente</label>
            <select id="gerenteAsignarGerenteControlling" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Subgerente</label>
            <select id="subgerenteAsignarGerenteControlling" class="form-control">
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAsignarGerenteControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAsignarGerenteControlling" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalCrearClienteProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Crear cliente</span>
					<span id="tituloCrearClienteProyecto" style="font-size: 12pt;"></span>
					<input id="idCrearClienteProyecto" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyCrearClienteProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rut</label>
            <input id="rutCrearClienteProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cliente</label>
            <input id="clienteCrearClienteProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Holding</label>
            <input id="holdingCrearClienteProyecto" class="form-control" type="text" value="">
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCrearClienteProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCrearClienteProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarClienteProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Crear cliente</span>
					<span id="tituloEditarClienteProyecto" style="font-size: 12pt;"></span>
					<input id="idEditarClienteProyecto" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyEditarClienteProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rut</label>
            <input disabled id="rutEditarClienteProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cliente</label>
            <input id="clienteEditarClienteProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Holding</label>
            <input id="holdingEditarClienteProyecto" class="form-control" type="text" value="">
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarClienteProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarClienteProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalCambiarEstadoSiniestro" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Crear estado siniestro</span>
					<span id="tituloCambiarEstadoSiniestro" style="font-size: 12pt;"></span>
					<input id="idCambiarEstadoSiniestro" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyCambiarEstadoSiniestro" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Rut</label>
            <select id="estadoCambiarEstadoSiniestro" class="form-control"></select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCambiarEstadoSiniestro" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCambiarEstadoSiniestro" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalCambiarPatenteReemplazoSiniestro" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Patente reemplazo</span>
					<span id="tituloCambiarPatenteReemplazoSiniestro" style="font-size: 12pt;"></span>
					<input id="idCambiarPatenteReemplazoSiniestro" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyCambiarPatenteReemplazoSiniestro" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente reemplazo</label>
            <input id="patenteCambiarPatenteReemplazoSiniestro" class="form-control" type="text" value="" size="6" maxlength="6">
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarCambiarPatenteReemplazoSiniestro" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarCambiarPatenteReemplazoSiniestro" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalIngresoProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Ingresar Centro Costo</span>
					<span id="tituloIngresoProyecto" style="font-size: 12pt;"></span>
					<input id="idIngresoProyecto" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyIngresoProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cod. Ceco</label>
            <input id="defProyectoIngresoProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Centro de Costo</label>
            <input id="pepIngresoProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cod. CRM</label>
            <input id="crmIngresoProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
            <input id="proyectoIngresoProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Denominación</label>
            <input id="denominacionIngresoProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sociedad</label>
            <select id="sociedadIngresoProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerencia/Subgerencia</label>
            <select id="gerSubIngresoProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Controller</label>
            <select id="controllerIngresoProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Adm. Contrato</label>
            <select id="adminContratoIngresoProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Holding/Cliente</label>
            <select id="clienteSubIngresoProyecto" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ini. Contrato</label>
            <input id="fechaIniContratoIngresoProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Fin Contrato</label>
            <input id="fechaFinContratoIngresoProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ini. Operación</label>
            <input id="fechaIniProyectoIngresoProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Fin Operación</label>
            <input id="fechaFinProyectoIngresoProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoIngresoProyecto" class="form-control">
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalEditarProyecto" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-edit"></span>&nbsp;&nbsp;
					<span>Editar Centro Costo</span>
					<span id="tituloEditarProyecto" style="font-size: 12pt;"></span>
					<input id="idEditarProyecto" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyEditarProyecto" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cod. Ceco</label>
            <input id="defProyectoEditarProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Centro de Costo</label>
            <input id="pepEditarProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Cod. CRM</label>
            <input id="crmEditarProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Proyecto</label>
            <input id="proyectoEditarProyecto" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Denominación</label>
            <input id="denominacionEditarProyecto" class="form-control" type="text" value="">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Sociedad</label>
            <select id="sociedadEditarProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Gerencia/Subgerencia</label>
            <select id="gerSubEditarProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Controller</label>
            <select id="controllerEditarProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Adm. Contrato</label>
            <select id="adminContratoEditarProyecto" class="form-control">
            </select>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Holding/Cliente</label>
            <select id="clienteSubEditarProyecto" class="form-control">
            </select>
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ini. Contrato</label>
            <input id="fechaIniContratoEditarProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Fin Contrato</label>
            <input id="fechaFinContratoEditarProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ini. Operación</label>
            <input id="fechaIniProyectoEditarProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Fin Operación</label>
            <input id="fechaFinProyectoEditarProyecto" class="form-control" type="text" value="" onfocus="blur();">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoEditarProyecto" class="form-control">
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarProyecto" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalMapaSucursal" class="modal modal-fullscreen fade" role="dialog" style="z-index: 2500;">
    <div class="modal-dialog modal-dialog-box modal-xl" role="document">

        <!-- Modal content-->
        <div class="modal-content">
						<div class="modal-header">
								<h5 style="color:gray; font-weight: bold;"><span class="fas fa-map-marked-alt"></span>&nbsp;&nbsp;
									<span>Ubicación sucursal</span>
									<br>
									<span id="tituloMapaSucursal" style="font-size: 12pt; weight: bold;"></span>
								</h5>
						</div>
            <div id="bodyMapaSucursal" class="modal-body alerta-modal-body">
                <input type="hidden" id="idmodalMapaOrden">
                <div id="mapaMapaSucursal" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button id="cerrarMapaSucursal" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN - INGRESO ANHO DOTACION -->
<div id="modalIngresoAnho" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoAnho"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Aperturar Año</h5>
      </div>
      <div id="bodyIngresoAnho" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Año</label>
            <input id="anhoIngresoAnho" class="form-control onlyNumbers" type="text" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoAnho" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoAnho" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- END - INGRESO ANHO DOTACION -->

<!-- BEGIN - INGRESO TEMPORAL PLANILLA -->
<div id="modalIngresoTemporalPlanilla" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog modal-dialog-box modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoTemporalPlanilla">
          <span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
          Registro de Reemplazo - <span id="titleIngresoTemporalPlanilla"></span>
        </h5>
      </div>
      <div id="bodyIngresoTemporalPlanilla" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="personalTemporalPlanilla" style="display: flex; flex-direction: column; justify-content: center; align-items: center;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoTemporalPlanilla" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoTemporalPlanilla" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- END - INGRESO TEMPORAL PLANILLA -->

<!-- Generacion Informe Rexms -->
<div id="modalGeneraInformeRexmas1" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;
					<span>Generar informe Rexmas</span>
					<span id="tituloGeneraInformeRexmas1" style="font-size: 12pt;"></span>
					<input id="idGeneraInformeRexmas1" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyGeneraInformeRexmas1" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">CECO</label>
            <select id="cecoGeneraInformeRexmas1" class="form-control"></select>
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Periodo</label>
            <input id="rangoGeneraInformeRexmas1" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; display: none;">
            <label style="font-weight: bold;">Mes</label>
            <input id="mesGeneraInformeRexmas1" class="form-control" type="text" value="">
          </div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo informe</label>
            <select id="tipoInformeGeneraInformeRexmas1" class="form-control">
							<option value="faltas">Faltas y permisos</option>
							<option value="heAtrasos">Horas extras y atrasos</option>
							<!-- <option value="general">General</option> -->
							<option value="generalMensual">General mensual</option>
						</select>
          </div>
					<div id="selTipoInformeGeneraInformeRexmas1" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt; display: none;">
						<div class="row" style="text-align: left; margin-bottom: 20pt;">
							<div style="margin-top: 10pt; text-align: center;" class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
								<span>HE50</span>
								<br>
								<label style="margin-top: 10pt;" class="switch">
									<input id="he50GeneraInformeRexmas1" type="checkbox" title="HE50" checked="checked">
									<span class="slider round"></span>
								</label>
							</div>
							<div style="margin-top: 10pt; text-align: center;" class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
								<span>HE100</span>
								<br>
								<label style="margin-top: 10pt;" class="switch">
									<input id="he100GeneraInformeRexmas1" type="checkbox" title="HE100" checked="checked">
									<span class="slider round"></span>
								</label>
							</div>
							<div style="margin-top: 10pt; text-align: center;" class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12">
								<span>Atraso</span>
								<br>
								<label style="margin-top: 10pt;" class="switch">
									<input id="atrasoGeneraInformeRexmas1" type="checkbox" title="Atraso" checked="checked">
									<span class="slider round"></span>
								</label>
							</div>
						</div>
					</div>
        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="generarGeneraInformeRexmas1" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Generar</button>
        <button id="cancelarGeneraInformeRexmas1" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
<!-- Fin Generacion Informe Rexms -->

<div id="modalResetQRUsuario" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloResetQRUsuario"><span class="fas fa-qrcode"></span>&nbsp;&nbsp;Resetear QR usuario</h5>
      </div>
			<div id="bodyResetQRUsuario" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea resetear el código QR del usuario?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloQRUsuario"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarResetQRUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarResetQRUsuario" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inicio Flota -->
<div id="modalIngresoTipoVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoTipoVehiculo"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Tipo Vehiculo</h5>
      </div>
      <div id="bodyIngresoTipoVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoTipoVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">CheckTipo</label>
            <select id="checktipoIngresoTipoVehiculo" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Licencia</label>
            <select id="licenciaIngresoTipoVehiculo" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarTipoVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarTipoVehiculo"><span class="fas fa-car-alt"></span>&nbsp;&nbsp;Editar Tipo Vehiculo</h5>
      </div>
      <div id="bodyEditarTipoVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreEditarTipoVehiculo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Licencia</label>
            <select id="licenciaEditarTipoVehiculo" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12 input-group-sm" style="margin-top: 10pt;">
            <label style="font-weight: bold;">CheckTipo</label>
            <select id="checkTipoEditarTipoVehiculo" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarTipoVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalIngresoCheckTipo" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xs" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoCheckTipo"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso CheckTipo</h5>
      </div>
      <div id="bodyIngresoCheckTipo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nombre</label>
            <input id="nombreIngresoCheckTipo" class="form-control" type='text'>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoCheckTipo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoCheckTipo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalIngresoCheck" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoCheck"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Check</h5>
      </div>
      <div id="bodyIngresoCheck" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Item</label>
            <input id="itemIngresoCheck" class="form-control" type='text'>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <input id="tipoIngresoCheck" class="form-control" type='text'>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Indispensable</label>
            <select id="indispensableIngresoCheck" class="form-control">
              <option value="Si">Si</option>
							<option value="No">No</option>
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Descontable</label>
            <select id="descontableIngresoCheck" class="form-control">
              <option value="Si">Si</option>
							<option value="No">No</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarCheck" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloEditarCheck"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Check</h5>
      </div>
      <div id="bodyEditarCheck" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Item</label>
            <input id="itemEditarCheck" class="form-control" type='text'>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
            <input id="tipoEditarCheck" class="form-control" type='text'>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Indispensable</label>
            <select id="indispensableEditarCheck" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Descontable</label>
            <select id="descontableEditarCheck" class="form-control"></select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEliminarCheck" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloEliminarCheck"><span class="fas fa-trash-alt"></span>&nbsp;&nbsp;Eliminar Check</h5>
      </div>
			<div id="bodyEliminarCheck" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Está seguro que desea eliminar el Check?</font>
            <font style="font-weight: nomal; font-size: 14pt;"></br><i style="font-weight: normal; font-size: 14pt;" id="itemEliminarCheck"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarEliminarCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEliminarCheck" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalIngresoMarcaModelo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresoMarcaModelo"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Marca Modelo</h5>
      </div>
      <div id="bodyIngresoMarcaModelo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaIngresoMarcaModelo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloIngresoMarcaModelo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Litros</label>
            <input id="litrosIngresoMarcaModelo" class="form-control" type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoMarcaModelo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoMarcaModelo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarMarcaModelo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarMarcaModelo"><span class="fas fa-tachometer-alt"></span>&nbsp;&nbsp;Editar Marca Modelo </h5>
      </div>
      <div id="bodyEditarMarcaModelo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <input id="marcaEditarMarcaModelo" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <input id="modeloEditarMarcaModelo" class="form-control"type="text" value=" ">
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Litros</label>
            <input id="litrosEditarMarcaModelo" class="form-control"type="text" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
				<button id="guardarEditarMarcaModelo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarMarcaModelo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalIngresoVehiculos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloIngresoVehiculos"><span class="fas fa-plus-circle"></span>&nbsp;&nbsp;Ingreso Vehiculos</h5>
      </div>
      <div id="bodyIngresoVehiculos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input id="patenteIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje</label>
            <input id="kilometrajeIngresoVehiculos" class="form-control" type="number" min="0" value="0">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje a recorrer</label>
            <input id="kilometrajeRecorrerIngresoVehiculos" class="form-control" type="number" min="0" value="0">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <select id="marcaIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <select id="modeloIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoIngresoVehiculos" class="form-control" type="number" min="1980" max="2022" value="1980">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo Vehiculo</label>
            <select id="tipoIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Capacidad estanque (Lts)</label>
            <input disabled id="litrosIngresoVehiculos" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">VIN</label>
            <input id="vinIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nro. Motor</label>
            <input id="nMotorIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color</label>
            <select id="colorIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Propiedad</label>
            <select id="propiedadIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Empresa</label>
            <select id="empresaIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Inicio</label>
            <input id="inicioIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Termino</label>
            <input id="terminoIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Peso / UF</label>
            <select id="tipoMontoIngresoVehiculos">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto</label>
            <input id="montoIngresoVehiculos" class="form-control" type="number" min="0" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <select id="bodegaIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Aseguradora</label>
            <select id="aseguradoraIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto Aseg.<b><span id="tipoMontoAseg"></span></b></label>
            <input id="montoAseguradoraIngresoVehiculos" class="form-control" type="number" min="0" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ult. Mant.</label>
            <input id="mantoIngresoVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoIngresoVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente original</label>
						<select id="patenteOriginalVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">N° Contrato</label>
            <input id="numContratoIngresoVehiculos" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarIngresoVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarIngresoVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarVehiculos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
          <h5 style="color:gray;" id="tituloEditarVehiculos"><span class="fas fa-car-alt"></span>&nbsp;&nbsp;Editar Vehiculo</h5>
      </div>
      <div id="bodyEditarVehiculos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
            <input id="patenteEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje</label>
            <input id="kilometrajeEditarVehiculos" class="form-control" type="number" min="0" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Kilometraje a recorrer</label>
            <input id="kilometrajeRecorrerEditarVehiculos" class="form-control" type="text" min="0" value="0">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Marca</label>
            <select id="marcaEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Modelo</label>
            <select id="modeloEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Año</label>
            <input id="anoEditarVehiculos" class="form-control" type="number" min="1980" max="2022" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo Vehiculo</label>
            <select id="tipoEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Capacidad estanque (Lts)</label>
            <input disabled id="litrosEditarVehiculos" class="form-control" type="text">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">VIN</label>
            <input id="vinEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Nro. Motor</label>
            <input id="nMotorEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Color</label>
            <select id="colorEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Propiedad</label>
            <select id="propiedadEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Empresa</label>
            <select id="empresaEditarVehiculos" class="js-example-disabled-results"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Inicio</label>
            <input id="inicioEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Termino</label>
            <input id="terminoEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Peso / UF</label>
            <select id="tipoMontoEditarVehiculos">
            </select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto</label>
            <input id="montoEditarVehiculos" class="form-control" type="number" min="0" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Bodega</label>
            <select id="bodegaEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Comuna</label>
            <select id="comunaEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Aseguradora</label>
            <select id="aseguradoraEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Monto Aseg.<b><span id="tipoMontoEditarAseg"></span></b></label>
            <input id="montoAseguradoraEditarVehiculos" class="form-control" type="number" min="0" value=" ">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Ult. Mant.</label>
            <input id="mantoEditarVehiculos" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Operación</label>
            <select id="operacionEditarVehiculos" class="form-control">
							<option value="0">Pendiente</option>
							<option value="1">Confirmado</option>
							<option value="2">Rechazado</option>
						</select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente original</label>
						<select id="patenteOriginalEditarVehiculos" class="form-control"></select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">N° Contrato</label>
            <input id="numContratoEditarVehiculos" class="form-control" type="text" min="0" value="0">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalSubirPdfVehiculo" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-pdf"></span>&nbsp;&nbsp;
          <span>Cargar PDF</span>
          <br>
          <span id="tituloSubirPdfVehiculo" style="font-size: 12pt;"></span>
        </h5>
      </div>
      <div id="bodySubirPdfVehiculo" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Revisión Técnica <b><span id="spanRevTec" style="color:gray;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaRevisionTecnica' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfRevisionTecnica' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Realizada </label>
            <input id="rTecFechaRealizadaVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Caducidad </label>
            <input id="rTecFechaCaducidadVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Permiso Circulación <b><span id="spanPermCirc" style="color:gray;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaPermisoCirculacion' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfPermisoCirculacion' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Realizada </label>
            <input id="pCirFechaRealizadVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Caducidad </label>
            <input id="pCirFechaCaducidadVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Emisión de Gases <b><span id="spanEmisGases" style="color:gray;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaEmisionGases' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfEmisionGases' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Realizada </label>
            <input id="emisionGasesFechaRealizadVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">F. Caducidad </label>
            <input id="emisionGasesFechaCaducidadVehiculo" class="form-control" type="text">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;"> PDF Aseguradora <b><span id="spanAseg" style="color:gray;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaAseguradora' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfAseguradora' type="text" class="form-control" readonly>
						</div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">PDF Otros <b><span id="spanOtros" style="color:gray;"></span></b> </label>
            <div class="input-group">
							<label class="input-group-btn">
									<span id="sintomasSpanFoto" class="form-control btn btn-default btn-file" style="text-align: left; color: grey; border: 1px solid #c8c8c8;">
											<span class="fas fa-file-pdf"></span>&nbsp;&nbsp;PDF<input type="file" id='pdfCargaOtros' style="display: none;">
									</span>
							</label>
							<input disabled id='inputPdfOtros' type="text" class="form-control" readonly>
						</div>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
				<button id="guardarSubirPdfVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarSubirPdfVehiculo" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
    </div>
  </div>
</div>

<div id="modalHistorialVehiculos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
					<h5 style="color:gray; font-weight: bold;"><span class="fas fa-file-alt"></span>&nbsp;&nbsp;
						<span>Historial</span>
						<br>
						<span id="tituloHistorialVehiculos" style="font-size: 12pt;"></span>
					</h5>
			</div>
      <div id="bodyHistorialVehiculos" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<table id="tablaHistorialVehiculos" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" >S</th>
									<th class="celdaColor" style="border: 1pt solid white;" >ID</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Observacion</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Fecha</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Hora</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Usuario Sistema</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Estado Veh.</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Estado Control</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Estado RRHH</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Tipo Vehiculo</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Propiedad</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Marca</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Modelo</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Proveedor</th>
				          <th class="celdaColor" style="border: 1pt solid white;" >Personal Asignado</th>
				          <th class="celdaColor" style="border: 1pt solid white;" >DNI Asignado</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Bodega</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Gerencia</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Subgerencia</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Cliente</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Aseguradora</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Subcontratista</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Kilometraje</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Año</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >VIN</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Nro. Motor</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Litros</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Color</th>
				          <th class="celdaColor" style="border: 1pt solid white;" >F. Inicio</th>
				          <th class="celdaColor" style="border: 1pt solid white;" >F. Termino</th>
                  <th class="celdaColor" style="border: 1pt solid white;" >Tipo Monto</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Monto</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Monto Aseg</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >F. Mant</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >RevTec</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >PermCirc</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Aseg</th>
					        <th class="celdaColor" style="border: 1pt solid white;" >Otros</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoHistorialVehiculos" style="text-align: left;">

					    </tbody>
					  </table>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="cerrarHistorialVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEquipamientoVehiculos" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header">
				<h5 style="color:gray; font-weight: bold;"><span class="fas fa-tools"></span>&nbsp;&nbsp;
					<span>Equipamiento</span>
					<span id="tituloEquipamientoVehiculos" style="font-size: 12pt;"></span>
					<input id="idEquipamientoVehiculos" type="hidden" value="">
				</h5>
      </div>

      <div id="bodyEquipamientoVehiculos" class="modal-body alerta-modal-body">
        <div id="bodyEquipamientoVehiculosRow" class="row" style="text-align: left; margin-bottom: 20pt;">

        </div>
      </div>

      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEquipamientoVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEquipamientoVehiculos" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div id="modalTarjetaAsignar" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="Asignación de tarjeta"><span class="fas fa-plus"></span>&nbsp;&nbsp;Asignación de Tarjeta</h5>
      </div>
      <div id="bodyTarjetaAsignar" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <label style="font-weight: bold;">Patente: <b><span id="flotaVehiculoTarSel"></span></b></label>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<label style="font-weight: bold;">Tarj. Asignadas: <span id="flotaVehiculoTarAsig"></span></label>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<label style="font-weight: bold;">Tarj. Backup: <b><span id="flotaVehiculoTarBack"></span></b></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número</label>
            <input disabled id="numeroTarjetaAsignar" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Patente</label>
						<select id="patenteTarjetaAsignar" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
            <select id="estadoTarjetaAsignar" class="form-control">
            </select>
          </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt; display:none;">
						<input type="text" id="TarjetaCantAsignadas" value="0">
            <input type="text" id="TarjetaCantBackup" value="0">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarTarjetaAsignar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarTarjetaAsignar" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDesasignarTarjetaCombustible" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-md" role="document">

    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray;" id="tituloDesasignarTarjetaCombustible"><span class="fas fa-minus"></span>&nbsp;&nbsp;Desasignar Tarjeta</h5>
      </div>
			<div id="bodyDesasignarTarjetaCombustible" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;"></label>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 11pt;">¿Desea desasignar la tarjeta: <span id="TarjetaNumeroDesasignar"></span>?</br><i style="font-weight: normal; font-size: 11pt;" id="tituloDesvincularCargaFamiliar"></i></font>
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarDesasignarTarjetaCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarDesasignarTarjetaCombustible" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalAgregarTarjeta" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloAgregarTarjeta"><span class="fas fa-plus"></span>&nbsp;&nbsp;Ingreso Tarjeta Combustible</h5>
      </div>
      <div id="bodyAgregarTarjeta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número</label>
            <input id="numeroAgregarTarjeta" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
						<input disabled id="estadoAgregarTarjeta" class="form-control" type="text" value="Disponible">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<select id="tipoAgregarTarjeta" class="form-control">
							<option value="Cupon">Cupon</option>
							<option value="TCT">TCT</option>
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Producto</label>
            <select id="productoAgregarTarjeta" class="form-control">
							<option value="PD">PD</option>
							<option value="Gas95">Gas95</option>
							<option value="Gas97">Gas97</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarAgregarTarjeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarAgregarTarjeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEditarTarjeta" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditarTarjeta"><span class="fas fa-edit"></span>&nbsp;&nbsp;Editar Tarjeta Combustible</h5>
      </div>
      <div id="bodyEditarTarjeta" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Número</label>
            <input disabled id="numeroEditarTarjeta" class="form-control" type="text" value=" ">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
						<select id="estadoEditarTarjeta" class="form-control">
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tipo</label>
						<select id="tipoEditarTarjeta" class="form-control">
							<option value="Cupon">Cupon</option>
							<option value="TCT">TCT</option>
            </select>
          </div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Producto</label>
            <select id="productoEditarTarjeta" class="form-control">
							<option value="PD">PD</option>
							<option value="Gas95">Gas95</option>
							<option value="Gas97">Gas97</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarEditarTarjeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarEditarTarjeta" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalHistorialTarjetaCombustible" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 90%; width: 90%;">
    <!-- Modal content-->
    <div class="modal-content">
			<div class="modal-header">
				<h5><span class="fas fa-history"></span>&nbsp;&nbsp;
          <span style="color:gray; font-weight: bold;">Historial Transacciones Combustible</span>
          <br>
					<div style="padding-top: 5pt; padding-bottom: 0pt; margin-bottom: 0pt;">
						<span id="tituloTarjetaCombustible" style="font-weight: bold; color: gray; font-size: 14pt;"></span>
					</div>
        </h5>
      </div>
			<div id="bodyHistorialTarjetaCombustible" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
					<!-- Tabla de consumos -->
					<div id="divTablaHistorialTarjetaCombustible" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
						<label style="font-weight: bold; color: gray; font-size: 14pt; margin-bottom: 10pt;">Consumos</label>
					  <table id="tablaHistorialTarjetaCombustible" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Fecha">Fecha</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Hora">Hora</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Patente">Patente</th>
                  <th class="celdaColor" style="border: 1pt solid white;" title="Comuna">Comuna</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Dirección">Dirección</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Comprobante">Comprobante</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Rut">Rut</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Precio">Precio</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Volumen">Volumen</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Total">Total</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaHistorialTarjetaCombustible" style="text-align: left;">
					    </tbody>
					  </table>
					</div>
					<!-- Tabla de abonos -->
					<div id="divTablaHistorialTarjetaCombustibleAbono" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 15pt; text-align: left;">
						<label style="font-weight: bold; color: gray; font-size: 14pt; margin-bottom: 10pt;">Abonos</label>
					  <table id="tablaHistorialTarjetaCombustibleAbono" class="cell-border compact" style="width: 100%;">
					    <thead>
					      <tr>
									<th class="celdaColor" style="border: 1pt solid white;" title="Selección">S</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Fecha">Fecha</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Hora">Hora</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Patente">Patente</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Comprobante">Comprobante</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Tipo">Tipo</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Monto">Monto</th>
									<th class="celdaColor" style="border: 1pt solid white;" title="Usuario Carga">Usuario Carga</th>
					      </tr>
					    </thead>
					    <tbody id="cuerpoTablaHistorialTarjetaCombustibleAbono" style="text-align: left;">
					    </tbody>
					  </table>
					</div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
					<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<select disabled id="periodoHistorialTarjetaCombustible" class="form-control">
							<option value="2021-01">2021-01</option>
							<option value="2021-02">2021-02</option>
						</select>
					</div>
					<div class="col-xl-1 col-lg-1 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
						<button id="cancelarTarjetaCombustible" style="display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
      </div>
    </div>
  </div>
</div>

<div id="modalConfigRangoMantenciones" class="modal modal-fullscreen fade" role="dialog">

  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-history"></span>&nbsp;&nbsp;Ingresar Rango de Mantenciones</h5>
      </div>
      <div id="bodyConfigRangoMantenciones" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left; margin-bottom: 20pt;">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label style="font-weight: bold; color: gray; font-size: 14pt;">Datos</label>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Minutos</label>
            <input id="minutosConfigRangoMantenciones" class="form-control" type="number" min="0">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Hora Inicio</label>
            <input id="horaInicioConfigRangoMantenciones" class="form-control" type="time" value=" ">
          </div>
          <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Hora Fin</label>
            <input id="horaFinConfigRangoMantenciones" class="form-control" type="time" value=" ">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align: left;">
        <button id="guardarConfigRangoMantenciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarConfigRangoMantenciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalHabDeshRangoMantenciones" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

			<div class="modal-header">
        <h5 style="color:gray;" id="tituloHabDeshRangoMantenciones"><span class="fas fa-wrench"></span>&nbsp;&nbsp;Activar/Desactivar Rangos Mantenciones</h5>
      </div>
			<div id="bodyHabDeshRangoMantenciones" class="modal-body alerta-modal-body">
        <div class="row" style="text-align: left;">
          <!--
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <font style="font-weight: bold; font-size: 14pt;">Rango <span style="color:gray;" id="rangoHabilitado" ></span> de los dias <span style="color:gray;" id="diaHabilitado" ></span> para mantención.</font>
          </div>
          -->
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Estado</label>
						<select id="selectHabDeshRangoMantenciones" class="form-control">
							<option value="Habilitar">Activar</option>
							<option value="Deshabilitar">Desactivar</option>
            </select>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12" style="margin-top: 10pt;">
            <label style="font-weight: bold;">Tope Mantenciones</label>
            <input id="topeMantenciones" class="form-control" type="number" min="0">
          </div>
        </div>
      </div>
			<div class="modal-footer" style="text-align: left;">
        <button id="guardarHabDeshRangoMantenciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
        <button id="cancelarHabDeshRangoMantenciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Flota -->

<div id="modalConfirmaCierre" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-circle"></span>&nbsp;&nbsp;Cierre de Semana</h5>
      </div>
      <div class="modal-body alerta-modal-body" style="text-align: left;">
        <h6>¿Está seguro de querer cerrar esta semana?</h6>
			</div>
			<div class="modal-footer">
        <button id="confirmaCerrarPlanillaAsistencia" style="margin-top: 10px;" type="button" class="btn btn-secondary">Aceptar</button>
        <button style="margin-top: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalConfirmaAprueba" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-circle"></span>&nbsp;&nbsp;Aprobación de Semana</h5>
      </div>
      <div class="modal-body alerta-modal-body" style="text-align: left;">
        <h6>¿Está seguro de querer aprobar esta semana?</h6>
			</div>
			<div class="modal-footer">
        <button id="confirmaAprobarPlanillaAsistencia" style="margin-top: 10px;" type="button" class="btn btn-secondary">Aceptar</button>
        <button style="margin-top: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalConfirmaRechaza" class="modal modal-fullscreen fade" role="dialog" style="z-index: 1800;">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
			<div class="modal-header">
        <h5 style="color:gray; font-weight: bold;"><span class="fas fa-check-circle"></span>&nbsp;&nbsp;Rechazo de Semana</h5>
      </div>
      <div class="modal-body alerta-modal-body" style="text-align: left;">
        <h6>¿Está seguro de querer rechazar esta semana?</h6>
			</div>
			<div class="modal-footer">
        <button id="confirmaRechazarPlanillaAsistencia" style="margin-top: 10px;" type="button" class="btn btn-secondary">Aceptar</button>
        <button style="margin-top: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
