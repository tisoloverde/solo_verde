var __GJ_AFILIACION_PREVISION = "";
var __GJ_AFILIACION_SALUD = "";
var __GJ_FORM_IS_VALID = false;

function initPersonal() {
  $("#gj__rut").val(""); // input
  $("#gj__provisorio").prop("checked", false); // checkbox
  $("#gj__email").val(""); // input
  $("#gj__nombres").val(""); // input
  $("#gj__apellidos").val(""); // input
  $("#gj__domicilio").val(""); // input
  $("#gj__comuna").val("-1"); // select
  $("#gj__ciudad").val(""); // input
  $("#gj__fono").val(""); // input
  $("#gj__fechaNacimiento").val(""); // input
  $("#gj__nacionalidad").val("-1"); // select
  $("#gj__sexo").val("-1"); // select
  $("#gj__esPuebloOriginario").prop("checked", false); // checkbox
  $("#gj__puebloOriginario").val(""); // input
  $("#gj__esHispanoHablante").prop("checked", false); // checkbox
  $("#gj__nivelEstudios").val("-1"); // select
  $("#gj__sabeLeer").prop("checked", false); // checkbox
  $("#gj__sabeEscribir").prop("checked", false); // checkbox
  $("#gj__tieneLicencia").prop("checked", false); // checkbox
  $("#gj__claseLicencia").val("-1"); // select
  $("#gj__fechaVencimientoLicencia").val(""); // input
  $("#gj__estadoCivil").val("-1"); // select
  $("#gj__nombreContactoEmergencia").val(""); // input
  $("#gj__fonoContactoEmergencia").val(""); // input
  $("#gj__talla_camisa").val(""); // input
  $("#gj__talla_guantes").val(""); // input
  $("#gj__talla_pantalon").val(""); // input
  $("#gj__talla_zapatos").val(""); // input
  $("#gj__talla_casco").val(""); // input
  // tallaOverol: null,
  $("#gj__talla_otros").val(""); // input
  $("#gj__otraTallaUniforme").val(""); // input
  $("#gj__tieneFamiliarEmpresa").prop("checked", false); // checkbox
  $("#gj__nombreFamiliarEmpresa").val(""); // input
  $("#gj__cargoFamiliarEmpresa").val(""); // input
  $("#gj__parentescoFamiliarEmpresa").val("-1"); // select
  $("#gj__otroParentescoFamiliarEmpresa").val(""); // input
  $("#gj__esRepitente").prop("checked", false); // checkbox
  $("#gj__cargoRepitente").val(""); // input
  $("#gj__razonRepitente").val(""); // input
  $("input[name='gj__afiliacion_prevision']").prop("checked", false); // radio
  $("#gj__nombreAfiliacionPrevision_FONASA").val("-1"); // select
  $("#gj__nombreAfiliacionPrevision_ISAPRE").val("-1"); // select
  $("#gj__nombreAfiliacionPrevision_FONASA").css("display", "none");
  $("#gj__nombreAfiliacionPrevision_ISAPRE").css("display", "none");
  $("input[name='gj__afiliacion_salud']").prop("checked", false); // radio
  $("#gj__nombreAfiliacionSalud_AFP").val("-1"); // select
  $("#gj__nombreAfiliacionSalud_INP").val("-1"); // select
  $("#gj__nombreAfiliacionSalud_AFP").css("display", "none");
  $("#gj__nombreAfiliacionSalud_INP").css("display", "none");
  $("#gj__banco").val("-1"); // select
  $("#gj__tipoCuenta").val("-1"); // select
  $("#gj__nroCuenta").val(""); // input
  $("#gj__certificados_estudios").prop("checked", false); // checkbox
  $("#gj__certificados_antecedentes").prop("checked", false); // checkbox
  $("#gj__certificados_deExcencion").prop("checked", false); // checkbox
  $("#gj__certificados_residencia").prop("checked", false); // checkbox
  $("#gj__certificados_pension").prop("checked", false); // checkbox
  $("#gj__certificados_discapacidad").prop("checked", false); // checkbox
  $("#gj__certificados_afp").prop("checked", false); // checkbox
  $("#gj__certificados_fonasa").prop("checked", false); // checkbox
  $("#gj__certificados_isapre").prop("checked", false); // checkbox
  $("#gj__certificados_seguroCovid19").prop("checked", false); // checkbox
  $("#gj__certificados_conadi").prop("checked", false); // checkbox
  $("#gj__certificados_cursoOS10").prop("checked", false); // checkbox
  $("#gj__certificados_cursoSupervisor").prop("checked", false); // checkbox
  $("#gj__certificados_certificadoVacunas").prop("checked", false); // checkbox
  $("#gj__certificados_otros_cedulaDeIdentidad").prop("checked", false); // checkbox
  $("#gj__certificados_otros_licenciaDeConducir").prop("checked", false); // checkbox
  $("#gj__certificados_otros_curriculum").prop("checked", false); // checkbox
  $("#gj__certificados_otros_hojaDeVida").prop("checked", false); // checkbox
  $("#gj__tieneClaveUnica").prop("checked", false); // checkbox
  $("#gj__fechaIngresoEmprea").val(""); // input
  $("#gj__tipoContrato").val("-1"); // select
  $("#gj__cargo").val("-1"); // select
  $("#gj__duracionInicialContrato").val(""); // input
  $("#gj__cargoGenerico").val("-1"); // select
  $("#gj__jeas").val(""); // input
  $("#gj__ref1").val("-1"); // select
  $("#gj__ref2").val("-1"); // select
  $("#gj__plaza").val(""); // input
  $("#gj__sucursal").val("-1"); // select
  $("#gj__empresa").val("-1"); // select
  $("#gj__centroCosto").val("-1"); // select

  $("#gj__fechaNacimiento").datepicker(__CONFIG.datePicker);

  $("#gj__fechaVencimientoLicencia").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

$("#ingresarNuevoJefatura")
  .unbind("click")
  .click(async function () {
    initPersonal();

    $("#modalAlertasSplash").modal({ backdrop: "static", keyboard: false });
    $("#textoModalSplash").html(
      "<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>"
    );
    $("#modalAlertasSplash").modal("show");
    await $.ajax({
      url: "controller/datosSucursal.php",
      type: "post",
      dataType: "json",
      success: function (response) {
        var html = '<option selected value="-1">Sin asignar</option>';
        response.aaData.forEach((item) => {
          html += `<option value="${item.IDSUCURSAL}">${item.COMUNA} - ${item.SUCURSAL}</option>`;
        });
        $("#gj__sucursal").html(html);
      },
    });
    await $.ajax({
      url: "controller/datosSubcontratistasVehiculoInterno.php",
      type: "post",
      dataType: "json",
      success: function (response) {
        var html = '<option selected value="-1">Sin asignar</option>';
        response.aaData.forEach((item) => {
          html += `<option value="${item.IDSUBCONTRATO}">${item.NOMBRE_SUBCONTRATO}</option>`;
        });
        $("#gj__empresa").html(html);
      },
    });

    await $.ajax({
      url: "controller/datosCecoEmpresa.php",
      type: "post",
      dataType: "json",
      success: function (response) {
        var html = "<option selected value='-1'>Sin asignar</option>";
        response.aaData.forEach((item) => {
          html += `<option value="${item.IDESTRUCTURA_OPERACION}">${item.NOMENCLATURA}</option>`;
        });
        $("#gj__centroCosto").html(html);
      },
    });
    await $.ajax({
      url: "controller/datosComunesPersonal.php",
      type: "get",
      dataType: "json",
      success: function (response) {
        var html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["areaFuncional"].forEach((item) => {
          html += `<option value="${item.IDAREAFUNCIONAL}">${item.COMUNA}</option>`;
        });
        $("#gj__comuna").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["nacionalidad"].forEach((item) => {
          html += `<option value="${item.NACIONALIDAD}">${item.NACIONALIDAD}</option>`;
        });
        $("#gj__nacionalidad").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["nivelEstudios"].forEach((item) => {
          html += `<option value="${item.IDNIVEL_EDUCACIONAL}">${item.NIVEL_EDUCACIONAL}</option>`;
        });
        $("#gj__nivelEstudios").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["tipoLicencia"].forEach((item) => {
          html += `<option value="${item.IDTIPO_LICENCIA}">${item.TIPO_LICENCIA}</option>`;
        });
        $("#gj__claseLicencia").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["estadoCivil"].forEach((item) => {
          html += `<option value="${item.IDESTADO_CIVIL}">${item.ESTADO_CIVIL}</option>`;
        });
        $("#gj__estadoCivil").html(html);

        var htmlISAPRE = '<option selected value="-1">Sin asignar</option>';
        var htmlFONASA = '<option selected value="-1">Sin asignar</option>';
        response.aaData["prevision"].forEach((item) => {
          if (item.SALUD != "Fonasa") {
            htmlISAPRE += `<option value="${item.IDSALUD}">${item.SALUD}</option>`;
          } else {
            htmlFONASA += `<option value="${item.IDSALUD}">${item.SALUD}</option>`;
          }
        });
        $("#gj__nombreAfiliacionPrevision_ISAPRE").html(htmlISAPRE);
        $("#gj__nombreAfiliacionPrevision_FONASA").html(htmlFONASA);

        var htmlAFP = '<option selected value="-1">Sin asignar</option>';
        var htmlINP = '<option selected value="-1">Sin asignar</option>';
        response.aaData["salud"].forEach((item) => {
          if (item.AFP != "I.N.P") {
            htmlAFP += `<option value="${item.IDAFP}">${item.AFP}</option>`;
          } else {
            htmlINP += `<option value="${item.IDAFP}">${item.AFP}</option>`;
          }
        });
        $("#gj__nombreAfiliacionSalud_AFP").html(htmlAFP);
        $("#gj__nombreAfiliacionSalud_INP").html(htmlINP);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["banco"].forEach((item) => {
          html += `<option value="${item.IDBANCO}">${item.BANCO}</option>`;
        });
        $("#gj__banco").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["tipoContrato"].forEach((item) => {
          html += `<option value="${item.IDTIPO_CONTRATO}">${item.TIPO_CONTRATO}</option>`;
        });
        $("#gj__tipoContrato").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["cargoGenericoUnificado"].forEach((item) => {
          html += `<option value="${item.CODIGO}" family="${item.CLASIFICACION}">${item.CARGO_GENERICO_UNIFICADO}</option>`;
        });
        $("#gj__cargoGenerico").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["referencia1"].forEach((item) => {
          html += `<option value="${item.IDREFERENCIA1}">${item.REFERENCIA1}</option>`;
        });
        $("#gj__ref1").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["referencia2"].forEach((item) => {
          html += `<option value="${item.IDREFERENCIA2}">${item.REFERENCIA2}</option>`;
        });
        $("#gj__ref2").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["cargoLiquidacion"].forEach((item) => {
          // html += `<option value="${item.IDCARGO_LIQUIDACION}">${item.CARGO}</option>`;
          html += `<option value="${item.CARGO}">${item.CARGO}</option>`;
        });
        $("#gj__cargo").html(html);
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log("--asdasd--");
        console.log(errorThrown);
      },
    });

    if (validarNavegador(navigator)) {
      $("#cecoIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#sucursalIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#patenteIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#empresaIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#nivelIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#moIngresarPersonalOperaciones").select2(__CONFIG.select2);
      $("#gj__comuna").select2(__CONFIG.select2);
      $("#gj__nacionalidad").select2(__CONFIG.select2);
      $("#gj__sexo").select2(__CONFIG.select2);
      $("#gj__nivelEstudios").select2(__CONFIG.select2);
      $("#gj__claseLicencia").select2(__CONFIG.select2);
      $("#gj__estadoCivil").select2(__CONFIG.select2);
      $("#gj__parentescoFamiliarEmpresa").select2(__CONFIG.select2);
      /*$("select[name='gj__nombreAfiliacionPrevision_FONASA']").select2(__CONFIG.select2);
    $("select[name='gj__nombreAfiliacionPrevision_ISAPRE']").select2(__CONFIG.select2);
    $("select[name='gj__nombreAfiliacionSalud_AFP']").select2(__CONFIG.select2);
    $("select[name='gj__nombreAfiliacionSalud_INP']").select2(__CONFIG.select2);*/
      $("#gj__banco").select2(__CONFIG.select2);
      $("#gj__tipoCuenta").select2(__CONFIG.select2);
      $("#gj__tipoContrato").select2(__CONFIG.select2);
      $("#gj__cargoGenerico").select2(__CONFIG.select2);
      $("#gj__ref1").select2(__CONFIG.select2);
      $("#gj__ref2").select2(__CONFIG.select2);
      $("#gj__cargo").select2(__CONFIG.select2);
      $("#gj__sucursal").select2(__CONFIG.select2);
      $("#gj__empresa").select2(__CONFIG.select2);
      $("#gj__centroCosto").select2(__CONFIG.select2);
    }

    $("#gj__nombreAfiliacionPrevision_FONASA").hide();
    $("#gj__nombreAfiliacionPrevision_ISAPRE").hide();
    $("#gj__nombreAfiliacionSalud_AFP").hide();
    $("#gj__nombreAfiliacionSalud_INP").hide();

    setTimeout(function () {
      var h = $(window).height() - 200;
      $("#bodyIngresarPersonalOperaciones").css("height", h);
      $("#modalAlertasSplash").modal("hide");
      $("#modalIngresarPersonalOperaciones").modal("show");
    }, 3000);
  });

$("#gj__esPuebloOriginario").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__esPuebloOriginario").is(":checked")) {
    $("#gj__puebloOriginario").removeAttr("disabled");
    // $("#gj__esHispanoHablante").removeAttr("disabled");
  } else {
    $("#gj__esHispanoHablante").prop("checked", false);
    $("#gj__puebloOriginario").attr("disabled", "disabled");
    // $("#gj__esHispanoHablante").attr("disabled", "disabled");
  }
});

$("#gj__tieneLicencia").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__tieneLicencia").is(":checked")) {
    $("#gj__claseLicencia").removeAttr("disabled");
    $("#gj__fechaVencimientoLicencia").removeAttr("disabled");
  } else {
    $("#gj__claseLicencia").attr("disabled", "disabled");
    $("#gj__fechaVencimientoLicencia").attr("disabled", "disabled");
  }
});

$("#gj__tieneFamiliarEmpresa").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__tieneFamiliarEmpresa").is(":checked")) {
    $("#gj__nombreFamiliarEmpresa").removeAttr("disabled");
    $("#gj__cargoFamiliarEmpresa").removeAttr("disabled");
    $("#gj__parentescoFamiliarEmpresa").removeAttr("disabled");
    $("#gj__otroParentescoFamiliarEmpresa").removeAttr("disabled");
  } else {
    $("#gj__nombreFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__cargoFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__parentescoFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__otroParentescoFamiliarEmpresa").attr("disabled", "disabled");

    $("#gj__nombreFamiliarEmpresa").removeClass("is-invalid");
    $("#gj__nombreFamiliarEmpresa").val("");
    validarFormularioPersonalPlanilla();
  }
});

$("#gj__banco").on("change", function (e) {
  var banco = $("#gj__banco option:selected").text();
  if (["Vale vista", "Contado"].includes(banco)) {
    $("#gj__tipoCuenta").val("NoAplica");
    if (validarNavegador(navigator)) {
      $("#gj__tipoCuenta").select2(__CONFIG.select2);
    }
    $("#gj__tipoCuenta").attr("disabled", "disabled");
    $("#gj__nroCuenta").attr("disabled", "disabled");
    $("#gj__nroCuenta").val("");
  } else {
    $("#gj__nroCuenta").removeAttr("disabled");
  }
});

$("#gj__esRepitente").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__esRepitente").is(":checked")) {
    $("#gj__cargoRepitente").removeAttr("disabled");
    $("#gj__razonRepitente").removeAttr("disabled");
  } else {
    $("#gj__cargoRepitente").attr("disabled", "disabled");
    $("#gj__razonRepitente").attr("disabled", "disabled");
  }
});

$("input[name='gj__afiliacion_prevision']").on("change", function (e) {
  switch (this.value) {
    case "fonasa":
      $("#gj__nombreAfiliacionPrevision_FONASA").css("display", "block");
      $("#gj__nombreAfiliacionPrevision_ISAPRE").css("display", "none");
      __GJ_AFILIACION_PREVISION = "fonasa";
      break;
    case "isapre":
      $("#gj__nombreAfiliacionPrevision_FONASA").css("display", "none");
      $("#gj__nombreAfiliacionPrevision_ISAPRE").css("display", "block");
      __GJ_AFILIACION_PREVISION = "isapre";
      break;
    default:
      break;
  }
});

$("input[name='gj__afiliacion_salud']").on("change", function (e) {
  switch (this.value) {
    case "afp":
      $("#gj__nombreAfiliacionSalud_AFP").show();
      $("#gj__nombreAfiliacionSalud_INP").hide();
      __GJ_AFILIACION_SALUD = "afp";
      break;
    case "inp":
      $("#gj__nombreAfiliacionSalud_AFP").hide();
      $("#gj__nombreAfiliacionSalud_INP").show();
      __GJ_AFILIACION_SALUD = "inp";
      break;
    default:
      break;
  }
});

$("#gj__cargoGenerico").on("change", function (e) {
  var familia = $("#gj__cargoGenerico").find(":selected").attr("family");
  $("#gj__jeas").val(familia);
});

$("#gj__rut").on("blur", function (e) {
  e.stopImmediatePropagation();
  var rut = $("#gj__rut").val();
  var isValid = rut ? validarRUT(rut) : false;
  if (!isValid) alertInvalid("gj__rut", "DNI");
  else $("#gj__rut").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__email").on("blur", function (e) {
  e.stopImmediatePropagation();
  var email = $("#gj__email").val();
  var isValid = email ? validarEmail(email) : false;
  if (!isValid) alertInvalid("gj__email", "Email");
  else $("#gj__email").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__nombres").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombres").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombres", "Nombres");
  else $("#gj__nombres").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__apellidos").on("blur", function (e) {
  e.stopImmediatePropagation();
  var apellidos = $("#gj__apellidos").val();
  var isValid = apellidos ? validarNombresApellidos(apellidos) : false;
  if (!isValid) alertInvalid("gj__apellidos", "Apellidos");
  else $("#gj__apellidos").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__fono").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fono").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fono", "Teléfono");
  else $("#gj__fono").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__nombreContactoEmergencia").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombreContactoEmergencia").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreContactoEmergencia", "Nombres");
  else $("#gj__nombreContactoEmergencia").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__fonoContactoEmergencia").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fonoContactoEmergencia").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fonoContactoEmergencia", "Teléfono");
  else $("#gj__fonoContactoEmergencia").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

$("#gj__nombreFamiliarEmpresa").on("blur", function (e) {
  e.stopImmediatePropagation();
  if (!$("#gj__tieneFamiliarEmpresa").is(":checked")) return true;

  var nombres = $("#gj__nombreFamiliarEmpresa").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreFamiliarEmpresa", "Nombres");
  else $("#gj__nombreFamiliarEmpresa").removeClass("is-invalid");
  validarFormularioPersonalPlanilla();
  return isValid;
});

function validarFormularioPersonalPlanilla() {
  var isValidRut = $("#gj__rut").val()
    ? validarRUT($("#gj__rut").val())
    : false;
  var isValidEmail = $("#gj__email").val()
    ? validarEmail($("#gj__email").val())
    : false;
  var isValidNombres = $("#gj__nombres").val()
    ? validarNombresApellidos($("#gj__nombres").val())
    : false;
  var isValidApellidos = $("#gj__apellidos").val()
    ? validarNombresApellidos($("#gj__apellidos").val())
    : false;
  var isValidTelefono = $("#gj__fono").val()
    ? validarTelefono($("#gj__fono").val())
    : false;
  var isValidNombreContacto = $("#gj__nombreContactoEmergencia").val()
    ? validarNombresApellidos($("#gj__nombreContactoEmergencia").val())
    : false;
  var isValidTelefonoContacto = $("#gj__fonoContactoEmergencia").val()
    ? validarTelefono($("#gj__fonoContactoEmergencia").val())
    : false;
  var __GJ_FORM_IS_VALID =
    isValidRut &&
    isValidEmail &&
    isValidNombres &&
    isValidApellidos &&
    isValidTelefono &&
    isValidNombreContacto &&
    isValidTelefonoContacto;

  if ($("#gj__tieneFamiliarEmpresa").is(":checked")) {
    var isValidNombreFamiliar = $("#gj__nombreFamiliarEmpresa").val()
      ? validarNombresApellidos($("#gj__nombreFamiliarEmpresa").val())
      : false;
    __GJ_FORM_IS_VALID = __GJ_FORM_IS_VALID && isValidNombreFamiliar;
  }

  if (__GJ_FORM_IS_VALID) {
    $("#guardarIngresarPersonalOperaciones").removeAttr("disabled");
  } else {
    $("#guardarIngresarPersonalOperaciones").attr("disabled", "disabled");
  }
}

$("#guardarIngresarPersonalOperaciones")
  .unbind("click")
  .click(function () {
    var parametros = {
      rut: $("#gj__rut").val(), // rut.replace(".","").replace(".",""),
      rutPExterno: $("#gj__rut").val(), // rut.replace(".","").replace(".",""),
      apellidos: $("#gj__apellidos").val(),
      nombres: $("#gj__nombres").val(),
      funcion: $("#gj__cargo").val(),
      // "externo": $("#esSubcontratistaIngresarPersonalOperaciones").prop("checked") ? 1 : 0,
      // "patente": patente,
      fono: $("#gj__fono").val(),
      mail: $("#gj__email").val(),
      // "nivel": nivel,
      // "mano": mano,
      sucursal: $("#gj__sucursal").val(),
      empresa: $("#gj__empresa").val(),
      idCeco: $("#gj__centroCosto").val(),
    };

    /* Begin - New Params Personal */
    var certificados = [];
    $(".gj__certificados").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) {
        certificados.push(self.attr("id"));
      }
    });
    var certificadosOtros = [];
    $(".gj__certificados_otros").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) {
        certificadosOtros.push(self.attr("id"));
      }
    });

    var news = {
      esProvisorio: $("#gj__provisorio").is(":checked") ? 1 : 0,
      domicilio: $("#gj__domicilio").val(),
      comuna: $("#gj__comuna").val() != "-1" ? $("#gj__comuna").val() : null,
      ciudad: $("#gj__ciudad").val(),
      fechaNacimiento: $("#gj__fechaNacimiento").val(),
      nacionalidad:
        $("#gj__nacionalidad").val() != "-1"
          ? $("#gj__nacionalidad").val()
          : null,
      sexo: $("#gj__sexo").val() != "-1" ? $("#gj__sexo").val() : null,
      puebloOriginario: $("#gj__esPuebloOriginario").is(":checked")
        ? $("#gj__puebloOriginario").val()
        : null,
      esHispanoHablante: $("#gj__esHispanoHablante").is(":checked"),
      nivelEstudios:
        $("#gj__nivelEstudios").val() != "-1"
          ? $("#gj__nivelEstudios").val()
          : null,
      sabeLeer: $("#gj__sabeLeer").is(":checked"),
      sabeEscribir: $("#gj__sabeEscribir").is(":checked"),
      tieneLicencia: $("#gj__tieneLicencia").is(":checked"),
      claseLicencia:
        $("#gj__claseLicencia").val() != "-1"
          ? $("#gj__claseLicencia").val()
          : null,
      fechaVencimientoLicencia: $("#gj__fechaVencimientoLicencia").val(),
      estadoCivil:
        $("#gj__estadoCivil").val() != "-1"
          ? $("#gj__estadoCivil").val()
          : null,
      nombreContactoEmergencia: $("#gj__nombreContactoEmergencia").val(),
      fonoContactoEmergencia: $("#gj__fonoContactoEmergencia").val(),
      tallaPolera: $("#gj__talla_camisa").val(),
      tallaGuantes: $("#gj__talla_guantes").val(),
      tallaPantalon: $("#gj__talla_pantalon").val(),
      tallaZapatos: $("#gj__talla_zapatos").val(),
      tallaLegionario: $("#gj__talla_casco").val(),
      tallaOverol: null,
      tallaOtros:
        $("#gj__talla_otros").val() != "" &&
        $("#gj__otraTallaUniforme").val() != ""
          ? $("#gj__talla_otros").val() +
            "|" +
            $("#gj__otraTallaUniforme").val()
          : null,
      tieneFamiliarEmpresa: $("#gj__tieneFamiliarEmpresa").is(":checked"),
      nombreFamiliarEmpresa: $("#gj__nombreFamiliarEmpresa").val(),
      cargoFamiliarEmpresa: $("#gj__cargoFamiliarEmpresa").val(),
      parentescoFamiliarEmpresa:
        $("#gj__parentescoFamiliarEmpresa").val() == "Otro"
          ? $("#gj__otroParentescoFamiliarEmpresa").val()
          : $("#gj__parentescoFamiliarEmpresa").val(),
      esRepitente: $("#gj__esRepitente").is(":checked"),
      cargoRepitente: $("#gj__cargoRepitente").val(),
      razonRepitente: $("#gj__razonRepitente").val(),

      afiliacionPrevision:
        __GJ_AFILIACION_PREVISION == "fonasa"
          ? $("#gj__nombreAfiliacionPrevision_FONASA").val()
          : __GJ_AFILIACION_PREVISION == "isapre"
          ? $("#gj__nombreAfiliacionPrevision_ISAPRE").val()
          : null,
      afiliacionSalud:
        __GJ_AFILIACION_SALUD == "afp"
          ? $("#gj__nombreAfiliacionSalud_AFP").val()
          : __GJ_AFILIACION_SALUD == "inp"
          ? $("#gj__nombreAfiliacionSalud_INP").val()
          : null,

      banco: $("#gj__banco").val(),
      tipoCuenta: $("#gj__tipoCuenta").val(),
      nroCuenta: $("#gj__nroCuenta").val(),
      lstCertificados: certificados.join("|"),
      lstCertificadosOtros: certificadosOtros.join("|"),
      tieneClaveUnica: $("#gj__tieneClaveUnica").is(":checked"),
      fechaIngresoEmpresa: $("#gj__fechaIngresoEmprea").val(),
      tipoContrato: $("#gj__tipoContrato").val(),
      duracionContrato: $("#gj__duracionInicialContrato").val(),
      cargoGenerico: $("#gj__cargoGenerico").val(),
      jeas: "",
      ref1: $("#gj__ref1").val(),
      ref2: $("#gj__ref2").val(),
      plaza: $("#gj__plaza").val(),
    };
    /* End - New Params Personal */

    console.log("---data--");
    console.log(parametros);
    console.log(news);
    console.log(__GJ_FORM_IS_VALID);

    /* Begin - Validacion */
    /*if (!__GJ_FORM_IS_VALID) {
    alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar los datos del formualario");
    return;
  }*/
    /* End - Validacion */

    $("#modalIngresarPersonalOperaciones").modal("hide");
    $("#modalAlertasSplash").modal({ backdrop: "static", keyboard: false });
    $("#textoModalSplash").html(
      "<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>"
    );
    $("#modalAlertasSplash").modal("show");

    $.ajax({
      url: "controller/datosChequeaPExterno.php",
      type: "post",
      data: parametros,
      success: function (response) {
        var p = response.split(",");
        if (response.localeCompare("Sin datos") != 0 && response != "") {
          if (p[0].localeCompare("Sin datos") != 0 && p[0] != "") {
            alertasToast(
              "<img src='view/img/info.png' class='splash_load'><br/>Ya existe una persona ingresada con ese DNI"
            );
            setTimeout(function () {
              $("#modalIngresarPersonalOperaciones").modal("show");
              $("#modalAlertasSplash").modal("hide");
            }, 1000);
          }
        } else {
          $.ajax({
            url: "controller/ingresaPersonalGestOperEvol.php",
            type: "POST",
            data: { ...parametros, ...news },
            success: function (response) {
              var p = response.split(",");
              if (response.localeCompare("Sin datos") != 0 && response != "") {
                if (p[0].localeCompare("Sin datos") != 0 && p[0] != "") {
                  var table = $("#tablaJefatura").DataTable();
                  //table.rows('.selected').remove().draw();
                  table.ajax.reload();
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast(
                    "<img src='view/img/check.gif' class='splash_load'><br/>Personal ingresado correctamente"
                  );
                  setTimeout(function () {
                    $("#modalAlertasSplash").modal("hide");
                  }, 1000);
                } else {
                  var random = Math.round(Math.random() * (1000000 - 1) + 1);
                  alertasToast(
                    "<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar personal, si el problema persiste favor comuniquese con soporte"
                  );
                  setTimeout(function () {
                    $("#modalIngresarPersonalOperaciones").modal("show");
                    $("#modalAlertasSplash").modal("hide");
                  }, 1000);
                }
              } else {
                var random = Math.round(Math.random() * (1000000 - 1) + 1);
                alertasToast(
                  "<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar personal, si el problema persiste favor comuniquese con soporte"
                );
                setTimeout(function () {
                  $("#modalIngresarPersonalOperaciones").modal("show");
                  $("#modalAlertasSplash").modal("hide");
                }, 1000);
              }
            },
          });
        }
      },
    });
    // }
  });
