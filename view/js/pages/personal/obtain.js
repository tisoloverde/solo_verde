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

  $("#gj__fechaNacimiento_").datepicker({
    maxDate: subtractYears(new Date(), 18),
    ...__CONFIG.datePicker,
  });

  $("#gj__fechaVencimientoLicencia_").datepicker({
    minDate: new Date(),
    ...__CONFIG.datePicker,
  });
}

async function fillPersonal(parametros) {
  await $.ajax({
    url: "controller/personal/datosPersonalDetalle.php",
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
      $("#gj__esHispanoHablante_").prop(
        "checked",
        `${dt.esHispanoHablante}` == "1"
      );
      $("#gj__nivelEstudios_").val(dt.nivelEstudios);
      $("#gj__sabeLeer_").prop("checked", `${dt.sabeLeer}` == "1");
      $("#gj__sabeEscribir_").prop("checked", `${dt.sabeEscribir}` == "1");
      $("#gj__tieneLicencia_").prop("checked", `${dt.tieneLicencia}` == "1");
      if (`${dt.tieneLicencia}` == "1") {
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

      var parentesco = dt.parentescoFamiliarEmpresa;
      if (parentesco) {
        var aux = parentesco.split("|");
        if (aux.length > 1) {
          $("#gj__parentescoFamiliarEmpresa_").val(aux[0]);
          $("#gj__otroParentescoFamiliarEmpresa_").val(aux[1]);
          // $("#gj__otroParentescoFamiliarEmpresa_").removeAttr("disabled");
        } else {
          $("#gj__parentescoFamiliarEmpresa_").val(parentesco);
          $("#gj__otroParentescoFamiliarEmpresa_").val("");
          // $("#gj__otroParentescoFamiliarEmpresa_").attr("disabled", "disabled");
        }
      }

      var esRepitente = dt.esRepitente && dt.esRepitente?.toString() != "0";
      $("#gj__esRepitente_").prop("checked", esRepitente);
      if (esRepitente) {
        $("#gj__cargoRepitente_").removeAttr("disabled");
        $("#gj__razonRepitente_").removeAttr("disabled");
      }
      $("#gj__cargoRepitente_").val(dt.cargoRepitente);
      $("#gj__razonRepitente_").val(dt.razonRepitente);
      /* Begin - Afiliacion */
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
        $("#gj__nombreAfiliacionPrevision_FONASA_").val(dt.afiliacionPrevision);
        $("#gj__nombreAfiliacionPrevision_ISAPRE_").val(dt.afiliacionPrevision);
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
      if (dt.lstCertificados && dt.lstCertificados != "") {
        var aux2 = dt.lstCertificados.split("|");
        if (aux2.length > 0) {
          aux2.forEach((aux) => $(`#${aux}`).prop("checked", true));
        }
      }
      if (dt.lstCertificadosOtros && dt.lstCertificadosOtros != "") {
        var aux3 = dt.lstCertificadosOtros.split("|");
        if (aux3.length > 0) {
          aux3.forEach((aux) => $(`#${aux}`).prop("checked", true));
        }
      }
      /* End - Certificados */
      $("#gj__tieneClaveUnica_").prop(
        "checked",
        `${dt.tieneClaveUnica}` == "1"
      );
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
}

$("#verUsuario")
  .unbind("click")
  .click(async function () {
    var table = $("#tablaJefatura").DataTable();
    var rut = $.map(table.rows(".selected").data(), (item) => item.DNI);
    var parametros = { rut: rut[0] };

    initPersonal_();
    cleanFieldsPersonal_();
    $("#guardarEditaPersonalOperaciones").hide();
    $("#tituloModalPersonal").text("Ficha Personal");
    loading(true);

    await $.ajax({
      url: `controller/checkImgPerfil.php?rut=${rut[0]}&id=${Math.round(
        Math.random() * (1000000 - 1) + 1
      )}`,
      type: "get",
      success: function (response2) {
        if (response2 == 1) {
          $("#imagenFichaPersonal").attr(
            "src",
            `controller/cargarImgPerfil.php?rut=${rut[0]}&id=${Math.round(
              Math.random() * (1000000 - 1) + 1
            )}`
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
      url: "controller/datosSubcontratistasVehiculoInterno.php",
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
          html += `<option value="${item.CARGO}">${item.CARGO}</option>`;
        });
        $("#gj__cargo_").html(html);
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        console.log(errorThrown);
      },
    });

    await fillPersonal(parametros);

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

    initPersonal_disabled();

    setTimeout(function () {
      loading(false);
      var h = $(window).height() - 200;
      $("#bodyEditaPersonalOperaciones").css("height", h);
      $("#modalEditaPersonalOperaciones").modal("show");
    }, 500);
  });
