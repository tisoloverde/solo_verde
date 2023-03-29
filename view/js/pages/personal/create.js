var __GJ_AFILIACION_PREVISION = "";
var __GJ_AFILIACION_SALUD = "";

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

  $("#gj__fechaNacimiento").datepicker({
    maxDate: subtractYears(new Date(), 18),
    ...__CONFIG.datePicker,
  });

  $("#gj__fechaVencimientoLicencia").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

$("#ingresarNuevoJefatura")
  .unbind("click")
  .click(async function () {
    initPersonal();
    $("#guardarIngresarPersonalOperaciones").show();
    loading(true);

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
      loading(false);
      var h = $(window).height() - 200;
      $("#bodyIngresarPersonalOperaciones").css("height", h);
      $("#modalIngresarPersonalOperaciones").modal("show");
    }, 3000);
  });

async function validaPersonalExistente(type, text) {
  return await $.ajax({
    url: "controller/personal/validaPersonalExistente.php", // 'controller/datosPatentesAsignar.php',
    type: "post",
    data: { type, text },
    dataType: "json",
    success: function (response) {
      return response;
    },
  });
}

$("#gj__rut").on("blur", function (e) {
  e.stopImmediatePropagation();
  var rut = $("#gj__rut").val();
  var isValid = rut ? validarRUT(rut) : false;
  if (!isValid) {
    alertInvalid("gj__rut", "DNI");
  } else {
    $("#modalIngresarPersonalOperaciones").modal("hide");
    loading(true);
    validaPersonalExistente("rut", rut).then((res) => {
      if (res.aaData.length) {
        alertField("gj__rut", "¡Este RUT ya se encuentra registrado!");
      } else {
        $("#gj__rut").removeClass("is-invalid");
      }
      loading(false);
      $("#modalIngresarPersonalOperaciones").modal("show");
    });
  }
});

$("#gj__email").on("blur", function (e) {
  e.stopImmediatePropagation();
  var email = $("#gj__email").val();
  var isValid = email ? validarEmail(email) : false;
  if (!isValid) alertInvalid("gj__email", "Email");
  else $("#gj__email").removeClass("is-invalid");
});

$("#gj__nombres").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombres").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombres", "Nombres");
  else $("#gj__nombres").removeClass("is-invalid");
});

$("#gj__apellidos").on("blur", function (e) {
  e.stopImmediatePropagation();
  var apellidos = $("#gj__apellidos").val();
  var isValid = apellidos ? validarNombresApellidos(apellidos) : false;
  if (!isValid) alertInvalid("gj__apellidos", "Apellidos");
  else $("#gj__apellidos").removeClass("is-invalid");
});

$("#gj__fono").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fono").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fono", "Teléfono");
  else $("#gj__fono").removeClass("is-invalid");
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
    // $("#gj__otroParentescoFamiliarEmpresa").removeAttr("disabled");
  } else {
    $("#gj__nombreFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__cargoFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__parentescoFamiliarEmpresa").attr("disabled", "disabled");
    $("#gj__otroParentescoFamiliarEmpresa").attr("disabled", "disabled");

    $("#gj__nombreFamiliarEmpresa").removeClass("is-invalid");
    $("#gj__nombreFamiliarEmpresa").val("");
  }
});

$("#gj__parentescoFamiliarEmpresa").on("change", function (e) {
  var parentesco = $("#gj__parentescoFamiliarEmpresa option:selected").text();
  if (parentesco == "Otro") {
    $("#gj__otroParentescoFamiliarEmpresa").removeAttr("disabled");
  } else {
    $("#gj__otroParentescoFamiliarEmpresa").attr("disabled", "disabled");
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

$("#gj__nombreContactoEmergencia").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombreContactoEmergencia").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreContactoEmergencia", "Nombres");
  else $("#gj__nombreContactoEmergencia").removeClass("is-invalid");
});

$("#gj__fonoContactoEmergencia").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fonoContactoEmergencia").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fonoContactoEmergencia", "Teléfono");
  else $("#gj__fonoContactoEmergencia").removeClass("is-invalid");
});

$("#gj__nombreFamiliarEmpresa").on("blur", function (e) {
  e.stopImmediatePropagation();
  if (!$("#gj__tieneFamiliarEmpresa").is(":checked")) return true;

  var nombres = $("#gj__nombreFamiliarEmpresa").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreFamiliarEmpresa", "Nombres");
  else $("#gj__nombreFamiliarEmpresa").removeClass("is-invalid");
});

function validarFormularioPersonalPlanilla() {
  // Begin - Validar datos requeridos
  if (!$("#gj__rut").val()) {
    alertRequired("gj__rut", "RUT");
    return;
  }
  if (!$("#gj__email").val()) {
    alertRequired("gj__email", "Email");
    return;
  }
  if (!$("#gj__sucursal").val() || `${$("#gj__sucursal").val()}` == "-1") {
    alertRequired("gj__sucursal", "Sucursal");
    return;
  }
  if (!$("#gj__empresa").val() || `${$("#gj__empresa").val()}` == "-1") {
    alertRequired("gj__empresa", "Empresa");
    return;
  }
  if (
    !$("#gj__centroCosto").val() ||
    `${$("#gj__centroCosto").val()}` == "-1"
  ) {
    alertRequired("gj__centroCosto", "Centro de Costo");
    return;
  }
  // End - Validar datos requeridos

  var isValidRut = $("#gj__rut").val()
    ? validarRUT($("#gj__rut").val())
    : false;
  var isValidEmail = $("#gj__email").val()
    ? validarEmail($("#gj__email").val())
    : false;
  var isValidNombres = $("#gj__nombres").val()
    ? validarNombresApellidos($("#gj__nombres").val())
    : true;
  var isValidApellidos = $("#gj__apellidos").val()
    ? validarNombresApellidos($("#gj__apellidos").val())
    : true;
  var isValidTelefono = $("#gj__fono").val()
    ? validarTelefono($("#gj__fono").val())
    : true;
  var isValidNombreContacto = $("#gj__nombreContactoEmergencia").val()
    ? validarNombresApellidos($("#gj__nombreContactoEmergencia").val())
    : true;
  var isValidTelefonoContacto = $("#gj__fonoContactoEmergencia").val()
    ? validarTelefono($("#gj__fonoContactoEmergencia").val())
    : true;

  var isValid =
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

    isValid = isValid && isValidNombreFamiliar;
  }

  return isValid;
}

$("#guardarIngresarPersonalOperaciones")
  .unbind("click")
  .click(function () {
    if (!validarFormularioPersonalPlanilla()) {
      return;
    }

    var afiliacionPrevision =
      __GJ_AFILIACION_PREVISION == "fonasa"
        ? $("#gj__nombreAfiliacionPrevision_FONASA").val()
        : __GJ_AFILIACION_PREVISION == "isapre"
        ? $("#gj__nombreAfiliacionPrevision_ISAPRE").val()
        : null;
    if (!afiliacionPrevision || `${afiliacionPrevision}` == "-1") {
      alertRequiredMany(
        [
          "gj__nombreAfiliacionPrevision_FONASA",
          "gj__nombreAfiliacionPrevision_ISAPRE",
        ],
        "Afiliación a Previsión"
      );
      return;
    } else {
      $("#gj__nombreAfiliacionPrevision_FONASA").removeClass("is-invalid");
      $("#gj__nombreAfiliacionPrevision_ISAPRE").removeClass("is-invalid");
    }

    var afiliacionSalud =
      __GJ_AFILIACION_SALUD == "afp"
        ? $("#gj__nombreAfiliacionSalud_AFP").val()
        : __GJ_AFILIACION_SALUD == "inp"
        ? $("#gj__nombreAfiliacionSalud_INP").val()
        : null;
    if (!afiliacionSalud || `${afiliacionSalud}` == "-1") {
      alertRequiredMany(
        ["gj__nombreAfiliacionSalud_AFP", "gj__nombreAfiliacionSalud_INP"],
        "Afiliación a Salud"
      );
      return;
    } else {
      $("#gj__nombreAfiliacionSalud_AFP").removeClass("is-invalid");
      $("#gj__nombreAfiliacionSalud_INP").removeClass("is-invalid");
    }

    var parametros = {
      rut: $("#gj__rut").val() ? `'${$("#gj__rut").val()}'` : "null",
      apellidos: $("#gj__apellidos").val()
        ? `'${$("#gj__apellidos").val()}'`
        : "null",
      nombres: $("#gj__nombres").val()
        ? `'${$("#gj__nombres").val()}'`
        : "null",
      funcion: $("#gj__cargo").val() ? `'${$("#gj__cargo").val()}'` : "null",
      fono: $("#gj__fono").val() ? `'${$("#gj__fono").val()}'` : "null",
      mail: $("#gj__email").val() ? `'${$("#gj__email").val()}'` : "null",
      sucursal: $("#gj__sucursal").val(),
      idsubcontrato: $("#gj__empresa").val()
        ? `'${$("#gj__empresa").val()}'`
        : "null",
      idCeco: $("#gj__centroCosto").val()
        ? `'${$("#gj__centroCosto").val()}'`
        : -1,
    };

    /* Begin - New Params Personal */
    var certificados = [];
    $(".gj__certificados").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) certificados.push(self.attr("id") + "_");
    });
    var certificadosOtros = [];
    $(".gj__certificados_otros").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) certificadosOtros.push(self.attr("id") + "_");
    });

    var news = {
      esProvisorio: $("#gj__provisorio").is(":checked") ? 1 : 0,
      domicilio: $("#gj__domicilio").val()
        ? `'${$("#gj__domicilio").val()}'`
        : "null",
      comuna: conditionNeg1AndEmpty($("#gj__comuna").val())
        ? $("#gj__comuna").val()
        : "null",
      ciudad: $("#gj__ciudad").val() ? `'${$("#gj__ciudad").val()}'` : "null",
      fechaNacimiento: $("#gj__fechaNacimiento").val()
        ? `'${$("#gj__fechaNacimiento").val()}'`
        : "null",
      nacionalidad: conditionNeg1AndEmpty($("#gj__nacionalidad").val())
        ? `'${$("#gj__nacionalidad").val()}'`
        : "null",
      sexo: conditionNeg1AndEmpty($("#gj__sexo").val())
        ? `'${$("#gj__sexo").val()}'`
        : "null",
      puebloOriginario: $("#gj__esPuebloOriginario").is(":checked")
        ? `'${$("#gj__puebloOriginario").val()}'`
        : "null",
      esHispanoHablante: $("#gj__esHispanoHablante").is(":checked") ? 1 : 0,
      nivelEstudios: conditionNeg1AndEmpty($("#gj__nivelEstudios").val())
        ? $("#gj__nivelEstudios").val()
        : "null",
      sabeLeer: $("#gj__sabeLeer").is(":checked") ? 1 : 0,
      sabeEscribir: $("#gj__sabeEscribir").is(":checked") ? 1 : 0,
      tieneLicencia: $("#gj__tieneLicencia").is(":checked") ? 1 : 0,
      claseLicencia: conditionNeg1AndEmpty($("#gj__claseLicencia").val())
        ? $("#gj__claseLicencia").val()
        : "null",
      fechaVencimientoLicencia: $("#gj__fechaVencimientoLicencia").val()
        ? `'${$("#gj__fechaVencimientoLicencia").val()}'`
        : "null",
      estadoCivil: conditionNeg1AndEmpty($("#gj__estadoCivil").val())
        ? $("#gj__estadoCivil").val()
        : "null",
      nombreContactoEmergencia: $("#gj__nombreContactoEmergencia").val()
        ? `'${$("#gj__nombreContactoEmergencia").val()}'`
        : "null",
      fonoContactoEmergencia: $("#gj__fonoContactoEmergencia").val()
        ? `'${$("#gj__fonoContactoEmergencia").val()}'`
        : "null",
      tallaPolera: $("#gj__talla_camisa").val()
        ? `'${$("#gj__talla_camisa").val()}'`
        : "null",
      tallaGuantes: $("#gj__talla_guantes").val()
        ? `'${$("#gj__talla_guantes").val()}'`
        : "null",
      tallaPantalon: $("#gj__talla_pantalon").val()
        ? `'${$("#gj__talla_pantalon").val()}'`
        : "null",
      tallaZapatos: $("#gj__talla_zapatos").val()
        ? `'${$("#gj__talla_zapatos").val()}'`
        : "null",
      tallaLegionario: $("#gj__talla_casco").val()
        ? `'${$("#gj__talla_casco").val()}'`
        : "null",
      tallaOverol: "null",
      tallaOtros:
        $("#gj__talla_otros").val() != "" &&
        $("#gj__otraTallaUniforme").val() != ""
          ? `'${$("#gj__talla_otros").val()}|${$(
              "#gj__otraTallaUniforme"
            ).val()}'`
          : "null",
      tieneFamiliarEmpresa: $("#gj__tieneFamiliarEmpresa").is(":checked")
        ? 1
        : 0,
      nombreFamiliarEmpresa: $("#gj__nombreFamiliarEmpresa").val()
        ? `'${$("#gj__nombreFamiliarEmpresa").val()}'`
        : "null",
      cargoFamiliarEmpresa: $("#gj__cargoFamiliarEmpresa").val()
        ? `'${$("#gj__cargoFamiliarEmpresa").val()}'`
        : "null",
      parentescoFamiliarEmpresa:
        $("#gj__parentescoFamiliarEmpresa").val() == "Otro"
          ? `'Otro|${$("#gj__otroParentescoFamiliarEmpresa").val()}'`
          : `'${$("#gj__parentescoFamiliarEmpresa").val()}'`,
      esRepitente: $("#gj__esRepitente").is(":checked") ? 1 : 0,
      cargoRepitente: $("#gj__cargoRepitente").val()
        ? `'${$("#gj__cargoRepitente").val()}'`
        : "null",
      razonRepitente: $("#gj__razonRepitente").val()
        ? `'${$("#gj__razonRepitente").val()}'`
        : "null",

      afiliacionPrevision: afiliacionPrevision,
      afiliacionSalud: afiliacionSalud,

      banco: conditionNeg1AndEmpty($("#gj__banco").val())
        ? $("#gj__banco").val()
        : "null",
      tipoCuenta: $("#gj__tipoCuenta").val()
        ? `'${$("#gj__tipoCuenta").val()}'`
        : "null",
      nroCuenta: $("#gj__nroCuenta").val()
        ? `'${$("#gj__nroCuenta").val()}'`
        : "null",
      lstCertificados: certificados.length
        ? `'${certificados.join("|")}'`
        : "null",
      lstCertificadosOtros: certificadosOtros.length
        ? `'${certificadosOtros.join("|")}'`
        : "null",
      tieneClaveUnica: $("#gj__tieneClaveUnica").is(":checked") ? `'1'` : `'0'`,
      fechaIngresoEmpresa: $("#gj__fechaIngresoEmprea").val()
        ? `'${$("#gj__fechaIngresoEmprea").val()}'`
        : "null",
      tipoContrato: conditionNeg1AndEmpty($("#gj__tipoContrato").val())
        ? $("#gj__tipoContrato").val()
        : "null",
      duracionContrato: $("#gj__duracionInicialContrato").val()
        ? `'${$("#gj__duracionInicialContrato").val()}'`
        : "null",
      cargoGenerico: $("#gj__cargoGenerico").val()
        ? `'${$("#gj__cargoGenerico").val()}'`
        : "null",
      ref1: $("#gj__ref1").val() ? `'${$("#gj__ref1").val()}'` : "null",
      ref2: $("#gj__ref2").val() ? `'${$("#gj__ref2").val()}'` : "null",
      plaza: $("#gj__plaza").val() ? `'${$("#gj__plaza").val()}'` : "null",
    };
    /* End - New Params Personal */

    $("#modalIngresarPersonalOperaciones").modal("hide");
    loading(true);
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
              loading(false);
            }, 1000);
          }
        } else {
          createPersonalPlanilla({ ...parametros, ...news });
        }
      },
    });
  });

function createPersonalPlanilla(data) {
  $.ajax({
    url: "controller/personal/ingresaPersonalGestOperEvol.php",
    type: "POST",
    data: data,
    dataType: "json",
    success: function (response) {
      if (response["error"] != null) {
        error();
      } else {
        success();
      }
    },
  });
}

function success() {
  var table = $("#tablaJefatura").DataTable();
  table.ajax.reload();
  alertasToast(
    "<img src='view/img/check.gif' class='splash_load'><br/>Personal ingresado correctamente"
  );
  setTimeout(function () {
    loading(false);
  }, 1000);
}

function error() {
  alertasToast(
    "<img src='view/img/error.gif' class='splash_load'><br/>Error al ingresar personal, si el problema persiste favor comuniquese con soporte"
  );
  setTimeout(function () {
    $("#modalIngresarPersonalOperaciones").modal("show");
    loading(false);
  }, 1000);
}
