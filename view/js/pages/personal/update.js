var __GJ_AFILIACION_PREVISION_ = "";
var __GJ_AFILIACION_SALUD_ = "";
var __GJ_FORM_IS_VALID_ = false;

function initPersonal_() {
  $("#gj__rut_").val(""); // input
  $("#gj__provisorio_").prop("checked", false); // checkbox
  $("#gj__email_").val(""); // input
  $("#gj__nombres_").val(""); // input
  $("#gj__apellidos_").val(""); // input
  $("#gj__domicilio_").val(""); // input
  $("#gj__comuna_").val("-1"); // select
  $("#gj__ciudad_").val(""); // input
  $("#gj__fono_").val(""); // input
  $("#gj__fechaNacimiento_").val(""); // input
  $("#gj__nacionalidad_").val("-1"); // select
  $("#gj__sexo_").val("-1"); // select
  $("#gj__esPuebloOriginario_").prop("checked", false); // checkbox
  $("#gj__puebloOriginario_").val(""); // input
  $("#gj__esHispanoHablante_").prop("checked", false); // checkbox
  $("#gj__nivelEstudios_").val("-1"); // select
  $("#gj__sabeLeer_").prop("checked", false); // checkbox
  $("#gj__sabeEscribir_").prop("checked", false); // checkbox
  $("#gj__tieneLicencia_").prop("checked", false); // checkbox
  $("#gj__claseLicencia_").val("-1"); // select
  $("#gj__fechaVencimientoLicencia_").val(""); // input
  $("#gj__estadoCivil_").val("-1"); // select
  $("#gj__nombreContactoEmergencia_").val(""); // input
  $("#gj__fonoContactoEmergencia_").val(""); // input
  $("#gj__talla_camisa_").val(""); // input
  $("#gj__talla_guantes_").val(""); // input
  $("#gj__talla_pantalon_").val(""); // input
  $("#gj__talla_zapatos_").val(""); // input
  $("#gj__talla_casco_").val(""); // input
  // tallaOverol: null,
  $("#gj__talla_otros_").val(""); // input
  $("#gj__otraTallaUniforme_").val(""); // input
  $("#gj__tieneFamiliarEmpresa_").prop("checked", false); // checkbox
  $("#gj__nombreFamiliarEmpresa_").val(""); // input
  $("#gj__cargoFamiliarEmpresa_").val(""); // input
  $("#gj__parentescoFamiliarEmpresa_").val("-1"); // select
  $("#gj__otroParentescoFamiliarEmpresa_").val(""); // input
  $("#gj__esRepitente_").prop("checked", false); // checkbox
  $("#gj__cargoRepitente_").val(""); // input
  $("#gj__razonRepitente_").val(""); // input
  $("input[name='gj__afiliacion_prevision']_").prop("checked", false); // radio
  $("#gj__nombreAfiliacionPrevision_FONASA_").val("-1"); // select
  $("#gj__nombreAfiliacionPrevision_ISAPRE_").val("-1"); // select
  $("#gj__nombreAfiliacionPrevision_FONASA_").css("display", "none");
  $("#gj__nombreAfiliacionPrevision_ISAPRE_").css("display", "none");
  $("input[name='gj__afiliacion_salud']_").prop("checked", false); // radio
  $("#gj__nombreAfiliacionSalud_AFP_").val("-1"); // select
  $("#gj__nombreAfiliacionSalud_INP_").val("-1"); // select
  $("#gj__nombreAfiliacionSalud_AFP_").css("display", "none");
  $("#gj__nombreAfiliacionSalud_INP_").css("display", "none");
  $("#gj__banco_").val("-1"); // select
  $("#gj__tipoCuenta_").val("-1"); // select
  $("#gj__nroCuenta_").val(""); // input
  $("#gj__certificados_estudios_").prop("checked", false); // checkbox
  $("#gj__certificados_antecedentes_").prop("checked", false); // checkbox
  $("#gj__certificados_deExcencion_").prop("checked", false); // checkbox
  $("#gj__certificados_residencia_").prop("checked", false); // checkbox
  $("#gj__certificados_pension_").prop("checked", false); // checkbox
  $("#gj__certificados_discapacidad_").prop("checked", false); // checkbox
  $("#gj__certificados_afp_").prop("checked", false); // checkbox
  $("#gj__certificados_fonasa_").prop("checked", false); // checkbox
  $("#gj__certificados_isapre_").prop("checked", false); // checkbox
  $("#gj__certificados_seguroCovid19_").prop("checked", false); // checkbox
  $("#gj__certificados_conadi_").prop("checked", false); // checkbox
  $("#gj__certificados_cursoOS10_").prop("checked", false); // checkbox
  $("#gj__certificados_cursoSupervisor_").prop("checked", false); // checkbox
  $("#gj__certificados_certificadoVacunas_").prop("checked", false); // checkbox
  $("#gj__certificados_otros_cedulaDeIdentidad_").prop("checked", false); // checkbox
  $("#gj__certificados_otros_licenciaDeConducir_").prop("checked", false); // checkbox
  $("#gj__certificados_otros_curriculum_").prop("checked", false); // checkbox
  $("#gj__certificados_otros_hojaDeVida_").prop("checked", false); // checkbox
  $("#gj__tieneClaveUnica_").prop("checked", false); // checkbox
  $("#gj__fechaIngresoEmprea_").val(""); // input
  $("#gj__tipoContrato_").val("-1"); // select
  $("#gj__cargo_").val("-1"); // select
  $("#gj__duracionInicialContrato_").val(""); // input
  $("#gj__cargoGenerico_").val("-1"); // select
  $("#gj__jeas_").val(""); // input
  $("#gj__ref1_").val("-1"); // select
  $("#gj__ref2_").val("-1"); // select
  $("#gj__plaza_").val(""); // input
  $("#gj__sucursal_").val("-1"); // select
  $("#gj__empresa_").val("-1"); // select
  $("#gj__centroCosto_").val("-1"); // select

  $("#gj__fechaNacimiento_").datepicker(__CONFIG.datePicker);

  $("#gj__fechaVencimientoLicencia_").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

function initPersonal_disabled() {
  $("#gj__rut_").attr("disabled", true); // input
  $("#gj__provisorio_").attr("disabled", true); // checkbox
  $("#gj__email_").attr("disabled", true); // input
  $("#gj__nombres_").attr("disabled", true); // input
  $("#gj__apellidos_").attr("disabled", true); // input
  $("#gj__domicilio_").attr("disabled", true); // input
  $("#gj__comuna_").attr("disabled", true); // select
  $("#gj__ciudad_").attr("disabled", true); // input
  $("#gj__fono_").attr("disabled", true); // input
  $("#gj__fechaNacimiento_").attr("disabled", true); // input
  $("#gj__nacionalidad_").attr("disabled", true); // select
  $("#gj__sexo_").attr("disabled", true); // select
  $("#gj__esPuebloOriginario_").attr("disabled", true); // checkbox
  $("#gj__puebloOriginario_").attr("disabled", true); // input
  $("#gj__esHispanoHablante_").attr("disabled", true); // checkbox
  $("#gj__nivelEstudios_").attr("disabled", true); // select
  $("#gj__sabeLeer_").attr("disabled", true); // checkbox
  $("#gj__sabeEscribir_").attr("disabled", true); // checkbox
  $("#gj__tieneLicencia_").attr("disabled", true); // checkbox
  $("#gj__claseLicencia_").attr("disabled", true); // select
  $("#gj__fechaVencimientoLicencia_").attr("disabled", true); // input
  $("#gj__estadoCivil_").attr("disabled", true); // select
  $("#gj__nombreContactoEmergencia_").attr("disabled", true); // input
  $("#gj__fonoContactoEmergencia_").attr("disabled", true); // input
  $("#gj__talla_camisa_").attr("disabled", true); // input
  $("#gj__talla_guantes_").attr("disabled", true); // input
  $("#gj__talla_pantalon_").attr("disabled", true); // input
  $("#gj__talla_zapatos_").attr("disabled", true); // input
  $("#gj__talla_casco_").attr("disabled", true); // input
  // tallaOverol: null,
  $("#gj__talla_otros_").attr("disabled", true); // input
  $("#gj__otraTallaUniforme_").attr("disabled", true); // input
  $("#gj__tieneFamiliarEmpresa_").attr("disabled", true); // checkbox
  $("#gj__nombreFamiliarEmpresa_").attr("disabled", true); // input
  $("#gj__cargoFamiliarEmpresa_").attr("disabled", true); // input
  $("#gj__parentescoFamiliarEmpresa_").attr("disabled", true); // select
  $("#gj__otroParentescoFamiliarEmpresa_").attr("disabled", true); // input
  $("#gj__esRepitente_").attr("disabled", true); // checkbox
  $("#gj__cargoRepitente_").attr("disabled", true); // input
  $("#gj__razonRepitente_").attr("disabled", true); // input
  $("#gj__afiliacion_prevision_fonasa_").attr("disabled", true); // radio
  $("#gj__afiliacion_prevision_isapre_").attr("disabled", true); // radio
  $("#gj__nombreAfiliacionPrevision_FONASA_").attr("disabled", true); // select
  $("#gj__nombreAfiliacionPrevision_ISAPRE_").attr("disabled", true); // select
  $("#gj__afiliacion_salud_afp_").attr("disabled", true); // radio
  $("#gj__afiliacion_salud_inp_").attr("disabled", true); // radio
  $("#gj__nombreAfiliacionSalud_AFP_").attr("disabled", true); // select
  $("#gj__nombreAfiliacionSalud_INP_").attr("disabled", true); // select
  $("#gj__banco_").attr("disabled", true); // select
  $("#gj__tipoCuenta_").attr("disabled", true); // select
  $("#gj__nroCuenta_").attr("disabled", true); // input
  $("#gj__certificados_estudios_").attr("disabled", true); // checkbox
  $("#gj__certificados_antecedentes_").attr("disabled", true); // checkbox
  $("#gj__certificados_deExcencion_").attr("disabled", true); // checkbox
  $("#gj__certificados_residencia_").attr("disabled", true); // checkbox
  $("#gj__certificados_pension_").attr("disabled", true); // checkbox
  $("#gj__certificados_discapacidad_").attr("disabled", true); // checkbox
  $("#gj__certificados_afp_").attr("disabled", true); // checkbox
  $("#gj__certificados_fonasa_").attr("disabled", true); // checkbox
  $("#gj__certificados_isapre_").attr("disabled", true); // checkbox
  $("#gj__certificados_seguroCovid19_").attr("disabled", true); // checkbox
  $("#gj__certificados_conadi_").attr("disabled", true); // checkbox
  $("#gj__certificados_cursoOS10_").attr("disabled", true); // checkbox
  $("#gj__certificados_cursoSupervisor_").attr("disabled", true); // checkbox
  $("#gj__certificados_certificadoVacunas_").attr("disabled", true); // checkbox
  $("#gj__certificados_otros_cedulaDeIdentidad_").attr("disabled", true); // checkbox
  $("#gj__certificados_otros_licenciaDeConducir_").attr("disabled", true); // checkbox
  $("#gj__certificados_otros_curriculum_").attr("disabled", true); // checkbox
  $("#gj__certificados_otros_hojaDeVida_").attr("disabled", true); // checkbox
  $("#gj__tieneClaveUnica_").attr("disabled", true); // checkbox
  $("#gj__fechaIngresoEmprea_").attr("disabled", true); // input
  $("#gj__tipoContrato_").attr("disabled", true); // select
  $("#gj__cargo_").attr("disabled", true); // select
  $("#gj__duracionInicialContrato_").attr("disabled", true); // input
  $("#gj__cargoGenerico_").attr("disabled", true); // select
  $("#gj__jeas_").attr("disabled", true); // input
  $("#gj__ref1_").attr("disabled", true); // select
  $("#gj__ref2_").attr("disabled", true); // select
  $("#gj__plaza_").attr("disabled", true); // input
  $("#gj__sucursal_").attr("disabled", true); // select
  $("#gj__empresa_").attr("disabled", true); // select
  $("#gj__centroCosto_").attr("disabled", true); // select

  $("#gj__fechaNacimiento_").datepicker(__CONFIG.datePicker);

  $("#gj__fechaVencimientoLicencia_").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

function initPersonal_enabled() {
  $("#gj__rut_").removeAttr("disabled"); // input
  $("#gj__provisorio_").removeAttr("disabled"); // checkbox
  $("#gj__email_").removeAttr("disabled"); // input
  $("#gj__nombres_").removeAttr("disabled"); // input
  $("#gj__apellidos_").removeAttr("disabled"); // input
  $("#gj__domicilio_").removeAttr("disabled"); // input
  $("#gj__comuna_").removeAttr("disabled"); // select
  $("#gj__ciudad_").removeAttr("disabled"); // input
  $("#gj__fono_").removeAttr("disabled"); // input
  $("#gj__fechaNacimiento_").removeAttr("disabled"); // input
  $("#gj__nacionalidad_").removeAttr("disabled"); // select
  $("#gj__sexo_").removeAttr("disabled"); // select
  $("#gj__esPuebloOriginario_").removeAttr("disabled"); // checkbox
  $("#gj__puebloOriginario_").removeAttr("disabled"); // input
  $("#gj__esHispanoHablante_").removeAttr("disabled"); // checkbox
  $("#gj__nivelEstudios_").removeAttr("disabled"); // select
  $("#gj__sabeLeer_").removeAttr("disabled"); // checkbox
  $("#gj__sabeEscribir_").removeAttr("disabled"); // checkbox
  $("#gj__tieneLicencia_").removeAttr("disabled"); // checkbox
  $("#gj__claseLicencia_").removeAttr("disabled"); // select
  $("#gj__fechaVencimientoLicencia_").removeAttr("disabled"); // input
  $("#gj__estadoCivil_").removeAttr("disabled"); // select
  $("#gj__nombreContactoEmergencia_").removeAttr("disabled"); // input
  $("#gj__fonoContactoEmergencia_").removeAttr("disabled"); // input
  $("#gj__talla_camisa_").removeAttr("disabled"); // input
  $("#gj__talla_guantes_").removeAttr("disabled"); // input
  $("#gj__talla_pantalon_").removeAttr("disabled"); // input
  $("#gj__talla_zapatos_").removeAttr("disabled"); // input
  $("#gj__talla_casco_").removeAttr("disabled"); // input
  // tallaOverol: null,
  $("#gj__talla_otros_").removeAttr("disabled"); // input
  $("#gj__otraTallaUniforme_").removeAttr("disabled"); // input
  $("#gj__tieneFamiliarEmpresa_").removeAttr("disabled"); // checkbox
  $("#gj__nombreFamiliarEmpresa_").removeAttr("disabled"); // input
  $("#gj__cargoFamiliarEmpresa_").removeAttr("disabled"); // input
  $("#gj__parentescoFamiliarEmpresa_").removeAttr("disabled"); // select
  $("#gj__otroParentescoFamiliarEmpresa_").removeAttr("disabled"); // input
  $("#gj__esRepitente_").removeAttr("disabled"); // checkbox
  $("#gj__cargoRepitente_").removeAttr("disabled"); // input
  $("#gj__razonRepitente_").removeAttr("disabled"); // input
  $("#gj__afiliacion_prevision_fonasa_").removeAttr("disabled"); // radio
  $("#gj__afiliacion_prevision_isapre_").removeAttr("disabled"); // radio
  $("#gj__nombreAfiliacionPrevision_FONASA_").removeAttr("disabled"); // select
  $("#gj__nombreAfiliacionPrevision_ISAPRE_").removeAttr("disabled"); // select
  $("#gj__afiliacion_salud_afp_").removeAttr("disabled"); // radio
  $("#gj__afiliacion_salud_inp_").removeAttr("disabled"); // radio
  $("#gj__nombreAfiliacionSalud_AFP_").removeAttr("disabled"); // select
  $("#gj__nombreAfiliacionSalud_INP_").removeAttr("disabled"); // select
  $("#gj__banco_").removeAttr("disabled"); // select
  $("#gj__tipoCuenta_").removeAttr("disabled"); // select
  $("#gj__nroCuenta_").removeAttr("disabled"); // input
  $("#gj__certificados_estudios_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_antecedentes_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_deExcencion_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_residencia_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_pension_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_discapacidad_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_afp_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_fonasa_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_isapre_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_seguroCovid19_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_conadi_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_cursoOS10_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_cursoSupervisor_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_certificadoVacunas_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_otros_cedulaDeIdentidad_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_otros_licenciaDeConducir_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_otros_curriculum_").removeAttr("disabled"); // checkbox
  $("#gj__certificados_otros_hojaDeVida_").removeAttr("disabled"); // checkbox
  $("#gj__tieneClaveUnica_").removeAttr("disabled"); // checkbox
  $("#gj__fechaIngresoEmprea_").removeAttr("disabled"); // input
  $("#gj__tipoContrato_").removeAttr("disabled"); // select
  $("#gj__cargo_").removeAttr("disabled"); // select
  $("#gj__duracionInicialContrato_").removeAttr("disabled"); // input
  $("#gj__cargoGenerico_").removeAttr("disabled"); // select
  $("#gj__jeas_").removeAttr("disabled"); // input
  $("#gj__ref1_").removeAttr("disabled"); // select
  $("#gj__ref2_").removeAttr("disabled"); // select
  $("#gj__plaza_").removeAttr("disabled"); // input
  $("#gj__sucursal_").removeAttr("disabled"); // select
  $("#gj__empresa_").removeAttr("disabled"); // select
  $("#gj__centroCosto_").removeAttr("disabled"); // select

  $("#gj__fechaNacimiento_").datepicker(__CONFIG.datePicker);

  $("#gj__fechaVencimientoLicencia_").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

$("#editarJefatura")
  .unbind("click")
  .click(async function () {
    initPersonal_();
    initPersonal_enabled();
    $("#guardarEditaPersonalOperaciones").show();
    $("#tituloModalPersonal").text("Editar personal");

    $("#modalAlertasSplash").modal({ backdrop: "static", keyboard: false });
    $("#textoModalSplash").html(
      "<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>"
    );
    $("#modalAlertasSplash").modal("show");
    var table = $("#tablaJefatura").DataTable();
    var rut = $.map(table.rows(".selected").data(), function (item) {
      return item.DNI;
    });
    var parametros = {
      rut: rut[0],
    };

    await $.ajax({
      url:
        "controller/checkImgPerfil.php?rut=" +
        rut[0] +
        "&id=" +
        Math.round(Math.random() * (1000000 - 1) + 1),
      type: "get",
      success: function (response2) {
        if (response2 == 1) {
          $("#imagenFichaPersonal").attr(
            "src",
            "controller/cargarImgPerfil.php?rut=" +
              rut[0] +
              "&id=" +
              Math.round(Math.random() * (1000000 - 1) + 1)
          );
        } else {
          $("#imagenFichaPersonal").attr("src", "view/img/no_foto.jpg");
        }
      },
    });

    await $.ajax({
      url: "controller/datosSucursal.php",
      type: "post",
      dataType: "json",
      success: function (response) {
        var html = '<option selected value="-1">Sin asignar</option>';
        response.aaData.forEach((item) => {
          html += `<option value="${item.IDSUCURSAL}">${item.COMUNA} - ${item.SUCURSAL}</option>`;
        });
        $("#gj__sucursal_").html(html);
      },
    });

    await $.ajax({
      url: "controller/datosSubcontratistasVehiculoInterno.php", // 'controller/datosPatentesAsignar.php',
      type: "post",
      data: parametros,
      dataType: "json",
      success: function (response) {
        var html = '<option selected value="-1">Sin asignar</option>';
        response.aaData.forEach((item) => {
          html += `<option value="${item.IDSUBCONTRATO}">${item.NOMBRE_SUBCONTRATO}</option>`;
        });
        $("#gj__empresa_").html(html);
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
        $("#gj__centroCosto_").html(html);
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
        $("#gj__comuna_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["nacionalidad"].forEach((item) => {
          html += `<option value="${item.NACIONALIDAD}">${item.NACIONALIDAD}</option>`;
        });
        $("#gj__nacionalidad_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["nivelEstudios"].forEach((item) => {
          html += `<option value="${item.IDNIVEL_EDUCACIONAL}">${item.NIVEL_EDUCACIONAL}</option>`;
        });
        $("#gj__nivelEstudios_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["tipoLicencia"].forEach((item) => {
          html += `<option value="${item.IDTIPO_LICENCIA}">${item.TIPO_LICENCIA}</option>`;
        });
        $("#gj__claseLicencia_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["estadoCivil"].forEach((item) => {
          html += `<option value="${item.IDESTADO_CIVIL}">${item.ESTADO_CIVIL}</option>`;
        });
        $("#gj__estadoCivil_").html(html);

        var htmlISAPRE = '<option selected value="-1">Sin asignar</option>';
        var htmlFONASA = '<option selected value="-1">Sin asignar</option>';
        response.aaData["prevision"].forEach((item) => {
          if (item.SALUD != "Fonasa") {
            htmlISAPRE += `<option value="${item.IDSALUD}">${item.SALUD}</option>`;
          } else {
            htmlFONASA += `<option value="${item.IDSALUD}">${item.SALUD}</option>`;
          }
        });
        $("#gj__nombreAfiliacionPrevision_ISAPRE_").html(htmlISAPRE);
        $("#gj__nombreAfiliacionPrevision_FONASA_").html(htmlFONASA);

        var htmlAFP = '<option selected value="-1">Sin asignar</option>';
        var htmlINP = '<option selected value="-1">Sin asignar</option>';
        response.aaData["salud"].forEach((item) => {
          if (item.AFP != "I.N.P") {
            htmlAFP += `<option value="${item.IDAFP}">${item.AFP}</option>`;
          } else {
            htmlINP += `<option value="${item.IDAFP}">${item.AFP}</option>`;
          }
        });
        $("#gj__nombreAfiliacionSalud_AFP_").html(htmlAFP);
        $("#gj__nombreAfiliacionSalud_INP_").html(htmlINP);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["banco"].forEach((item) => {
          html += `<option value="${item.IDBANCO}">${item.BANCO}</option>`;
        });
        $("#gj__banco_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["tipoContrato"].forEach((item) => {
          html += `<option value="${item.IDTIPO_CONTRATO}">${item.TIPO_CONTRATO}</option>`;
        });
        $("#gj__tipoContrato_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["cargoGenericoUnificado"].forEach((item) => {
          html += `<option value="${item.CODIGO}" family="${item.CLASIFICACION}">${item.CARGO_GENERICO_UNIFICADO}</option>`;
        });
        $("#gj__cargoGenerico_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["referencia1"].forEach((item) => {
          html += `<option value="${item.IDREFERENCIA1}">${item.REFERENCIA1}</option>`;
        });
        $("#gj__ref1_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["referencia2"].forEach((item) => {
          html += `<option value="${item.IDREFERENCIA2}">${item.REFERENCIA2}</option>`;
        });
        $("#gj__ref2_").html(html);

        html = '<option selected value="-1">Sin asignar</option>';
        response.aaData["cargoLiquidacion"].forEach((item) => {
          // html += `<option value="${item.IDCARGO_LIQUIDACION}">${item.CARGO}</option>`;
          html += `<option value="${item.CARGO}">${item.CARGO}</option>`;
        });
        $("#gj__cargo_").html(html);
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log("--asdasd--");
        console.log(errorThrown);
      },
    });

    await $.ajax({
      url: "controller/datosPersonalDetalle.php",
      type: "post",
      data: parametros,
      dataType: "json",
      success: function (response) {
        var dt = response.aaData;
        $("#gj__rut_").val(dt.rut);
        $("#gj__provisorio_").prop("checked", `${dt.esProvisorio}` == "1");
        $("#gj__email_").val(dt.mail);
        $("#gj__nombres_").val(dt.nombres);
        $("#gj__apellidos_").val(dt.apellidos);
        $("#gj__domicilio_").val(dt.domicilio);
        $("#gj__comuna_").val(dt.comuna);
        $("#gj__ciudad_").val(dt.ciudad);
        $("#gj__fono_").val(dt.fono);
        // ciudad: "",
        $("#gj__fechaNacimiento_").val(dt.fechaNacimiento);
        $("#gj__nacionalidad_").val(dt.nacionalidad);
        $("#gj__sexo_").val(dt.sexo);
        $("#gj__esPuebloOriginario_").prop(
          "checked",
          Boolean(dt.puebloOriginario)
        );
        if (dt.puebloOriginario) {
          $("#gj__puebloOriginario_").removeAttr("disabled");
          $("#gj__esHispanoHablante_").removeAttr("disabled");
        }
        $("#gj__puebloOriginario_").val(dt.puebloOriginario);
        $("#gj__esHispanoHablante_").prop("checked", dt.esHispanoHablante);
        $("#gj__nivelEstudios_").val(dt.nivelEstudios);
        $("#gj__sabeLeer_").prop("checked", dt.sabeLeer);
        $("#gj__sabeEscribir_").prop("checked", dt.sabeEscribir);
        $("#gj__tieneLicencia_").prop("checked", dt.tieneLicencia);
        if (dt.tieneLicencia) {
          $("#gj__claseLicencia_").removeAttr("disabled");
          $("#gj__fechaVencimientoLicencia_").removeAttr("disabled");
        }
        $("#gj__claseLicencia_").val(dt.claseLicencia);
        $("#gj__fechaVencimientoLicencia_").val(dt.fechaVencimientoLicencia);
        $("#gj__estadoCivil_").val(dt.estadoCivil);
        $("#gj__esRepitente_").prop(
          "checked",
          Boolean(dt.nombreContactoEmergencia || dt.fonoContactoEmergencia)
        );
        $("#gj__nombreContactoEmergencia_").val(dt.nombreContactoEmergencia);
        $("#gj__fonoContactoEmergencia_").val(dt.fonoContactoEmergencia);
        $("#gj__talla_camisa_").val(dt.tallaPolera);
        $("#gj__talla_guantes_").val(dt.tallaGuantes);
        $("#gj__talla_pantalon_").val(dt.tallaPantalon);
        $("#gj__talla_zapatos_").val(dt.tallaZapatos);
        $("#gj__talla_casco_").val(dt.tallaLegionario);
        $("#gj__talla_overol_").val(dt.tallaOverol);
        /* Begin - Talla Otros */
        // tallaOtros: $("input[name='gj__talla_otros']").val() + "|" + $("input[name='gj__otraTallaUniforme']").val(),
        if (dt.tallaOtros && dt.tallaOtros != "") {
          var aux1 = dt.tallaOtros.split("|");
          if (aux1.length > 1) {
            $("#gj__talla_otros_").val(aux1[0]);
            $("#gj__otraTallaUniforme_").val(aux1[1]);
          }
        }
        /* End - Talla Otros */
        var tieneFamiliarEmpresa =
          dt.tieneFamiliarEmpresa && dt.tieneFamiliarEmpresa?.toString() != "0";
        $("#gj__tieneFamiliarEmpresa_").prop("checked", tieneFamiliarEmpresa);
        if (tieneFamiliarEmpresa) {
          $("#gj__nombreFamiliarEmpresa_").removeAttr("disabled");
          $("#gj__cargoFamiliarEmpresa_").removeAttr("disabled");
          $("#gj__parentescoFamiliarEmpresa_").removeAttr("disabled");
        }
        $("#gj__nombreFamiliarEmpresa_").val(dt.nombreFamiliarEmpresa);
        $("#gj__cargoFamiliarEmpresa_").val(dt.cargoFamiliarEmpresa);
        $("#gj__parentescoFamiliarEmpresa_").val(dt.parentescoFamiliarEmpresa);
        var esRepitente = dt.esRepitente && dt.esRepitente?.toString() != "0";
        $("#gj__esRepitente_").prop("checked", esRepitente);
        if (esRepitente) {
          $("#gj__cargoRepitente_").removeAttr("disabled");
          $("#gj__razonRepitente_").removeAttr("disabled");
        }
        $("#gj__cargoRepitente_").val(dt.cargoRepitente);
        $("#gj__razonRepitente_").val(dt.razonRepitente);
        /* Begin - Afiliacion */
        // nombreAfiliacionAFP: $("select[name='gj__nombreAfiliacionAFP']").val(),
        // nombreAfiliacionIsapre: $("select[name='gj__nombreAfiliacionISAPRE']").val(),
        if (dt.afiliacionPrevision) {
          if (dt.afiliacionPrevisionNombre == "Fonasa") {
            // $("input[name='gj__afiliacion_prevision_']").val('fonasa');
            $("#gj__afiliacion_prevision_fonasa_").prop("checked", true);
            $("#gj__nombreAfiliacionPrevision_FONASA_").css("display", "block");
            $("#gj__nombreAfiliacionPrevision_ISAPRE_").css("display", "none");
          } else {
            // $("input[name='gj__afiliacion_prevision_']").val('isapre');
            $("#gj__afiliacion_prevision_isapre_").prop("checked", true);
            $("#gj__nombreAfiliacionPrevision_FONASA_").css("display", "none");
            $("#gj__nombreAfiliacionPrevision_ISAPRE_").css("display", "block");
          }
          $("#gj__nombreAfiliacionPrevision_FONASA_").val(
            dt.afiliacionPrevision
          );
          $("#gj__nombreAfiliacionPrevision_ISAPRE_").val(
            dt.afiliacionPrevision
          );
        }
        if (dt.afiliacionSalud) {
          if (dt.afiliacionSaludNombre == "I.N.P") {
            // $("input[name='gj__afiliacion_salud_']").val('inp');
            $("#gj__afiliacion_salud_inp_").prop("checked", true);
            $("#gj__nombreAfiliacionSalud_INP_").css("display", "block");
            $("#gj__nombreAfiliacionSalud_AFP_").css("display", "none");
          } else {
            // $("input[name='gj__afiliacion_salud_']").val('afp');
            $("#gj__afiliacion_salud_afp_").prop("checked", true);
            $("#gj__nombreAfiliacionSalud_INP_").css("display", "none");
            $("#gj__nombreAfiliacionSalud_AFP_").css("display", "block");
          }
          $("#gj__nombreAfiliacionSalud_AFP_").val(dt.afiliacionSalud);
          $("#gj__nombreAfiliacionSalud_INP_").val(dt.afiliacionSalud);
        }
        /* End - Afiliacion */
        $("#gj__banco_").val(dt.banco);
        $("#gj__tipoCuenta_").val(dt.tipoCuenta);
        $("#gj__nroCuenta_").val(dt.nroCuenta);
        /* Begin - Certificados */
        // lstCertificados: "",
        // lstCertificadosOtros: "",
        if (dt.lstCertificados && dt.lstCertificados != "") {
          var aux2 = dt.lstCertificados.split("|");
          if (aux2.length > 0) {
            aux2.forEach((aux) => {
              $(`#${aux}`).prop("checked", true);
            });
          }
        }
        if (dt.lstCertificadosOtros && dt.lstCertificadosOtros != "") {
          var aux3 = dt.lstCertificadosOtros.split("|");
          if (aux3.length > 0) {
            aux3.forEach((aux) => {
              $(`#${aux}`).prop("checked", true);
            });
          }
        }
        /* End - Certificados */
        $("#gj__tieneClaveUnica_").prop("checked", Boolean(dt.tieneClaveUnica)),
          $("#gj__fechaIngresoEmprea_").val(dt.fechaIngresoEmpresa);
        $("#gj__tipoContrato_").val(dt.tipoContrato);
        $("#gj__cargo_").val(dt.cargo);
        $("#gj__duracionInicialContrato_").val(dt.duracionContrato);
        $("#gj__cargoGenerico_").val(dt.cargoGenerico);
        $("#gj__jeas_").val(dt.jeas);
        $("#gj__ref1_").val(dt.ref1);
        $("#gj__ref2_").val(dt.ref2);
        $("#gj__plaza_").val(dt.plaza);

        $("#gj__sucursal_").val(dt.sucursal);
        $("#gj__empresa_").val(dt.subcontrato);
        $("#gj__centroCosto_").val(dt.idCeco);
      },
    });

    if (validarNavegador(navigator)) {
      $("#cecoEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#sucursalEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#patenteEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#empresaEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#nivelEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#moEditaPersonalOperaciones").select2(__CONFIG.select2);
      $("#gj__comuna_").select2(__CONFIG.select2);
      $("#gj__nacionalidad_").select2(__CONFIG.select2);
      $("#gj__sexo_").select2(__CONFIG.select2);
      $("#gj__nivelEstudios_").select2(__CONFIG.select2);
      $("#gj__claseLicencia_").select2(__CONFIG.select2);
      $("#gj__estadoCivil_").select2(__CONFIG.select2);
      $("#gj__parentescoFamiliarEmpresa_").select2(__CONFIG.select2);
      /*$("select[name='gj__nombreAfiliacionPrevision_FONASA']").select2(__CONFIG.select2);
     $("select[name='gj__nombreAfiliacionPrevision_ISAPRE']").select2(__CONFIG.select2);
     $("select[name='gj__nombreAfiliacionSalud_AFP']").select2(__CONFIG.select2);
     $("select[name='gj__nombreAfiliacionSalud_INP']").select2(__CONFIG.select2);*/
      $("#gj__banco_").select2(__CONFIG.select2);
      $("#gj__tipoCuenta_").select2(__CONFIG.select2);
      $("#gj__tipoContrato_").select2(__CONFIG.select2);
      $("#gj__cargoGenerico_").select2(__CONFIG.select2);
      $("#gj__ref1_").select2(__CONFIG.select2);
      $("#gj__ref2_").select2(__CONFIG.select2);
      $("#gj__cargo_").select2(__CONFIG.select2);
      $("#gj__sucursal_").select2(__CONFIG.select2);
      $("#gj__empresa_").select2(__CONFIG.select2);
      $("#gj__centroCosto_").select2(__CONFIG.select2);
    }
    setTimeout(function () {
      var h = $(window).height() - 200;
      $("#bodyEditaPersonalOperaciones").css("height", h);
      $("#modalAlertasSplash").modal("hide");
      $("#modalEditaPersonalOperaciones").modal("show");
    }, 500);
  });

$("#gj__esPuebloOriginario_").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__esPuebloOriginario_").is(":checked")) {
    $("#gj__puebloOriginario_").removeAttr("disabled");
    // $("#gj__esHispanoHablante_").removeAttr("disabled");
  } else {
    $("#gj__esHispanoHablante_").prop("checked", false);
    $("#gj__puebloOriginario_").attr("disabled", "disabled");
    // $("#gj__esHispanoHablante_").attr("disabled", "disabled");
  }
});

$("#gj__tieneLicencia_").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__tieneLicencia_").is(":checked")) {
    $("#gj__claseLicencia_").removeAttr("disabled");
    $("#gj__fechaVencimientoLicencia_").removeAttr("disabled");
  } else {
    $("#gj__claseLicencia_").attr("disabled", "disabled");
    $("#gj__fechaVencimientoLicencia_").attr("disabled", "disabled");
  }
});

$("#gj__banco_").on("change", function (e) {
  var banco = $("#gj__banco_ option:selected").text();
  if (["Vale vista", "Contado"].includes(banco)) {
    $("#gj__tipoCuenta_").val("NoAplica");
    if (
      !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      )
    ) {
      $("#gj__tipoCuenta_").select2(_THEME_SELECT2);
    }
    $("#gj__tipoCuenta_").attr("disabled", "disabled");
    $("#gj__nroCuenta_").attr("disabled", "disabled");
    $("#gj__nroCuenta_").val("");
  } else {
    $("#gj__nroCuenta_").removeAttr("disabled");
  }
});

$("#gj__tieneFamiliarEmpresa_").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__tieneFamiliarEmpresa_").is(":checked")) {
    $("#gj__nombreFamiliarEmpresa_").removeAttr("disabled");
    $("#gj__cargoFamiliarEmpresa_").removeAttr("disabled");
    $("#gj__parentescoFamiliarEmpresa_").removeAttr("disabled");
    $("#gj__otroParentescoFamiliarEmpresa_").removeAttr("disabled");
  } else {
    $("#gj__nombreFamiliarEmpresa_").attr("disabled", "disabled");
    $("#gj__cargoFamiliarEmpresa_").attr("disabled", "disabled");
    $("#gj__parentescoFamiliarEmpresa_").attr("disabled", "disabled");
    $("#gj__otroParentescoFamiliarEmpresa_").attr("disabled", "disabled");

    $("#gj__nombreFamiliarEmpresa_").removeClass("is-invalid");
    $("#gj__nombreFamiliarEmpresa_").val("");
    validarFormularioPersonalPlanilla_();
  }
});

$("#gj__esRepitente_").on("change", function (e) {
  e.stopImmediatePropagation();
  e.preventDefault();
  if ($("#gj__esRepitente_").is(":checked")) {
    $("#gj__cargoRepitente_").removeAttr("disabled");
    $("#gj__razonRepitente_").removeAttr("disabled");
  } else {
    $("#gj__cargoRepitente_").attr("disabled", "disabled");
    $("#gj__razonRepitente_").attr("disabled", "disabled");
  }
});

$("input[name='gj__afiliacion_prevision_']").on("change", function (e) {
  switch (this.value) {
    case "fonasa":
      $("#gj__nombreAfiliacionPrevision_FONASA_").css("display", "block");
      $("#gj__nombreAfiliacionPrevision_ISAPRE_").css("display", "none");
      __GJ_AFILIACION_PREVISION_ = "fonasa";
      break;
    case "isapre":
      $("#gj__nombreAfiliacionPrevision_FONASA_").css("display", "none");
      $("#gj__nombreAfiliacionPrevision_ISAPRE_").css("display", "block");
      __GJ_AFILIACION_PREVISION_ = "isapre";
      break;
    default:
      break;
  }
});

$("input[name='gj__afiliacion_salud_']").on("change", function (e) {
  switch (this.value) {
    case "afp":
      $("#gj__nombreAfiliacionSalud_AFP_").show();
      $("#gj__nombreAfiliacionSalud_INP_").hide();
      __GJ_AFILIACION_SALUD_ = "afp";
      break;
    case "inp":
      $("#gj__nombreAfiliacionSalud_AFP_").hide();
      $("#gj__nombreAfiliacionSalud_INP_").show();
      __GJ_AFILIACION_SALUD_ = "inp";
      break;
    default:
      break;
  }
});

$("#gj__cargoGenerico_").on("change", function (e) {
  var familia = $("#gj__cargoGenerico_").find(":selected").attr("family");
  $("#gj__jeas_").val(familia);
});

$("#gj__rut_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var rut = $("#gj__rut_").val();
  var isValid = rut ? validarRUT(rut) : false;
  if (!isValid) alertInvalid("gj__rut_", "DNI");
  else $("#gj__rut_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__email_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var email = $("#gj__email_").val();
  var isValid = email ? validarEmail(email) : false;
  if (!isValid) alertInvalid("gj__email_", "Email");
  else $("#gj__email_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__nombres_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombres_").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombres_", "Nombres");
  else $("#gj__nombres_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__apellidos_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var apellidos = $("#gj__apellidos_").val();
  var isValid = apellidos ? validarNombresApellidos(apellidos) : false;
  if (!isValid) alertInvalid("gj__apellidos_", "Apellidos");
  else $("#gj__apellidos_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__fono_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fono_").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fono_", "Teléfono");
  else $("#gj__fono_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__nombreContactoEmergencia_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var nombres = $("#gj__nombreContactoEmergencia_").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreContactoEmergencia_", "Nombres");
  else $("#gj__nombreContactoEmergencia_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__fonoContactoEmergencia_").on("blur", function (e) {
  e.stopImmediatePropagation();
  var telefono = $("#gj__fonoContactoEmergencia_").val();
  var isValid = telefono ? validarTelefono(telefono) : false;
  if (!isValid) alertInvalid("gj__fonoContactoEmergencia_", "Teléfono");
  else $("#gj__fonoContactoEmergencia_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

$("#gj__nombreFamiliarEmpresa_").on("blur", function (e) {
  e.stopImmediatePropagation();
  if (!$("#gj__tieneFamiliarEmpresa_").is(":checked")) return true;

  var nombres = $("#gj__nombreFamiliarEmpresa_").val();
  var isValid = nombres ? validarNombresApellidos(nombres) : false;
  if (!isValid) alertInvalid("gj__nombreFamiliarEmpresa_", "Nombres");
  else $("#gj__nombreFamiliarEmpresa_").removeClass("is-invalid");
  validarFormularioPersonalPlanilla_();
  return isValid;
});

function validarFormularioPersonalPlanilla_() {
  var isValidRut = $("#gj__rut_").val()
    ? validarRUT($("#gj__rut_").val())
    : false;
  var isValidEmail = $("#gj__email_").val()
    ? validarEmail($("#gj__email_").val())
    : false;
  var isValidNombres = $("#gj__nombres_").val()
    ? validarNombresApellidos($("#gj__nombres_").val())
    : false;
  var isValidApellidos = $("#gj__apellidos_").val()
    ? validarNombresApellidos($("#gj__apellidos_").val())
    : false;
  var isValidTelefono = $("#gj__fono_").val()
    ? validarTelefono($("#gj__fono_").val())
    : false;
  var isValidNombreContacto = $("#gj__nombreContactoEmergencia_").val()
    ? validarNombresApellidos($("#gj__nombreContactoEmergencia_").val())
    : false;
  var isValidTelefonoContacto = $("#gj__fonoContactoEmergencia_").val()
    ? validarTelefono($("#gj__fonoContactoEmergencia_").val())
    : false;
  var __GJ_FORM_IS_VALID_ =
    isValidRut &&
    isValidEmail &&
    isValidNombres &&
    isValidApellidos &&
    isValidTelefono &&
    isValidNombreContacto &&
    isValidTelefonoContacto;

  if ($("#gj__tieneFamiliarEmpresa_").is(":checked")) {
    var isValidNombreFamiliar = $("#gj__nombreFamiliarEmpresa_").val()
      ? validarNombresApellidos($("#gj__nombreFamiliarEmpresa_").val())
      : false;
    __GJ_FORM_IS_VALID_ = __GJ_FORM_IS_VALID_ && isValidNombreFamiliar;
  }

  if (__GJ_FORM_IS_VALID_) {
    $("#guardarEditaPersonalOperaciones").removeAttr("disabled");
  } else {
    $("#guardarEditaPersonalOperaciones").attr("disabled", "disabled");
  }
}

$("#guardarEditaPersonalOperaciones")
  .unbind("click")
  .click(function () {
    var parametros = {
      rut: $("#gj__rut_").val(), // rut.replace(".","").replace(".",""),
      rutPExterno: $("#gj__rut_").val(), // rut.replace(".","").replace(".",""),
      apellidos: $("#gj__apellidos_").val(),
      nombres: $("#gj__nombres_").val(),
      funcion: $("#gj__cargo_").val(),
      // "externo": externo,
      // "patente": patente,
      fono: $("#gj__fono_").val(),
      mail: $("#gj__email_").val(),
      // "nivel": nivel,
      // "mano": mano,
      sucursal: $("#gj__sucursal_").val(),
      empresa: $("#gj__empresa_").val(),
      idCeco: $("#gj__centroCosto_").val(),
    };

    /* Begin - New Params Personal */
    var certificados = [];
    $(".gj__certificados_").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) {
        certificados.push(self.attr("id"));
      }
    });
    var certificadosOtros = [];
    $(".gj__certificados_otros_").each(function (e) {
      var self = $(this);
      if (self.is(":checked")) {
        certificadosOtros.push(self.attr("id"));
      }
    });

    var news = {
      esProvisorio: $("#gj__provisorio_").is(":checked") ? 1 : 0,
      domicilio: $("#gj__domicilio_").val(),
      comuna: $("#gj__comuna_").val() != "-1" ? $("#gj__comuna_").val() : null,
      ciudad: $("#gj__ciudad_").val(),
      fechaNacimiento: $("#gj__fechaNacimiento_").val(),
      nacionalidad:
        $("#gj__nacionalidad_").val() != "-1"
          ? $("#gj__nacionalidad_").val()
          : null,
      sexo: $("#gj__sexo_").val() != "-1" ? $("#gj__sexo_").val() : null,
      puebloOriginario: $("#gj__esPuebloOriginario_").is(":checked")
        ? $("#gj__puebloOriginario_").val()
        : null,
      esHispanoHablante: $("#gj__esHispanoHablante_").is(":checked"),
      nivelEstudios:
        $("#gj__nivelEstudios_").val() != "-1"
          ? $("#gj__nivelEstudios_").val()
          : null,
      sabeLeer: $("#gj__sabeLeer_").is(":checked"),
      sabeEscribir: $("#gj__sabeEscribir_").is(":checked"),
      tieneLicencia: $("#gj__tieneLicencia_").is(":checked"),
      claseLicencia:
        $("#gj__claseLicencia_").val() != "-1"
          ? $("#gj__claseLicencia_").val()
          : null,
      fechaVencimientoLicencia: $("#gj__fechaVencimientoLicencia_").val(),
      estadoCivil:
        $("#gj__estadoCivil_").val() != "-1"
          ? $("#gj__estadoCivil_").val()
          : null,
      nombreContactoEmergencia: $("#gj__nombreContactoEmergencia_").val(),
      fonoContactoEmergencia: $("#gj__fonoContactoEmergencia_").val(),
      tallaPolera: $("#gj__talla_camisa_").val(),
      tallaGuantes: $("#gj__talla_guantes_").val(),
      tallaPantalon: $("#gj__talla_pantalon_").val(),
      tallaZapatos: $("#gj__talla_zapatos_").val(),
      tallaLegionario: $("#gj__talla_casco_").val(),
      tallaOverol: null,
      tallaOtros:
        $("#gj__talla_otros_").val() != "" &&
        $("#gj__otraTallaUniforme_").val() != ""
          ? $("#gj__talla_otros_").val() +
            "|" +
            $("#gj__otraTallaUniforme_").val()
          : null,
      tieneFamiliarEmpresa: $("#gj__tieneFamiliarEmpresa_").is(":checked"),
      nombreFamiliarEmpresa: $("#gj__nombreFamiliarEmpresa_").val(),
      cargoFamiliarEmpresa: $("#gj__cargoFamiliarEmpresa_").val(),
      parentescoFamiliarEmpresa:
        $("#gj__parentescoFamiliarEmpresa_").val() == "Otro"
          ? $("#gj__otroParentescoFamiliarEmpresa_").val()
          : $("#gj__parentescoFamiliarEmpresa_").val(),
      esRepitente: $("#gj__esRepitente_").is(":checked"),
      cargoRepitente: $("#gj__cargoRepitente_").val(),
      razonRepitente: $("#gj__razonRepitente_").val(),

      afiliacionPrevision:
        __GJ_AFILIACION_PREVISION_ == "fonasa"
          ? $("#gj__nombreAfiliacionPrevision_FONASA_").val()
          : __GJ_AFILIACION_PREVISION_ == "isapre"
          ? $("#gj__nombreAfiliacionPrevision_ISAPRE_").val()
          : null,
      afiliacionSalud:
        __GJ_AFILIACION_SALUD_ == "afp"
          ? $("#gj__nombreAfiliacionSalud_AFP_").val()
          : __GJ_AFILIACION_SALUD_ == "inp"
          ? $("#gj__nombreAfiliacionSalud_INP_").val()
          : null,

      banco: $("#gj__banco_").val(),
      tipoCuenta: $("#gj__tipoCuenta_").val(),
      nroCuenta: $("#gj__nroCuenta_").val(),
      lstCertificados: certificados.join("|"),
      lstCertificadosOtros: certificadosOtros.join("|"),
      tieneClaveUnica: $("#gj__tieneClaveUnica_").is(":checked"),
      fechaIngresoEmpresa: $("#gj__fechaIngresoEmprea_").val(),
      tipoContrato: $("#gj__tipoContrato_").val(),
      duracionContrato: $("#gj__duracionInicialContrato_").val(),
      cargoGenerico: $("#gj__cargoGenerico_").val(),
      jeas: "",
      ref1: $("#gj__ref1_").val(),
      ref2: $("#gj__ref2_").val(),
      plaza: $("#gj__plaza_").val(),
    };
    /* End - New Params Personal */

    console.log("---data--");
    console.log(parametros);
    console.log(news);
    console.log(__GJ_FORM_IS_VALID_);

    /* Begin - Validacion */
    /*if (!__GJ_FORM_IS_VALID_) {
     alertasToast("<img src='view/img/info.png' class='splash_load'><br/>Debe completar los datos del formualario");
     return;
   }*/
    /* End - Validacion */

    $("#modalEditaPersonalOperaciones").modal("hide");
    $("#modalAlertasSplash").modal({ backdrop: "static", keyboard: false });
    $("#textoModalSplash").html(
      "<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>"
    );
    $("#modalAlertasSplash").modal("show");

    $.ajax({
      url: "controller/editarPersonalGestOperEvol.php",
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
              "<img src='view/img/check.gif' class='splash_load'><br/>Personal actualizado correctamente"
            );
            $("#editarJefatura").attr("disabled", "disabled");
            $("#imagenJefatura").attr("disabled", "disabled");
            $("#cambiarJefatura").attr("disabled", "disabled");
            $("#verUsuario").attr("disabled", "disabled");
            setTimeout(function () {
              $("#modalAlertasSplash").modal("hide");
            }, 1000);
          } else {
            var random = Math.round(Math.random() * (1000000 - 1) + 1);
            alertasToast(
              "<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar personal, si el problema persiste favor comuniquese con soporte"
            );
            setTimeout(function () {
              $("#modalAlertasSplash").modal("hide");
            }, 1000);
          }
        } else {
          var random = Math.round(Math.random() * (1000000 - 1) + 1);
          alertasToast(
            "<img src='view/img/error.gif' class='splash_load'><br/>Error al actualizar personal, si el problema persiste favor comuniquese con soporte"
          );
          setTimeout(function () {
            $("#modalAlertasSplash").modal("hide");
          }, 1000);
        }
      },
    });
    // }
  });
