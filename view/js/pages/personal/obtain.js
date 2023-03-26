$("#verUsuario")
  .unbind("click")
  .click(async function () {
    initPersonal_();
    $("#guardarEditaPersonalOperaciones").hide();
    $("#tituloModalPersonal").text("Ficha Personal");

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
          html += `<option value="${item.CODIGO}" family="${item.FAMILIA}">${item.CARGO_GENERICO_UNIFICADO}</option>`;
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
          html += `<option value="${item.IDCARGO_LIQUIDACION}">${item.CARGO}</option>`;
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

    var theme = {
      theme: "bootstrap4",
      width: $(this).data("width")
        ? $(this).data("width")
        : $(this).hasClass("w-100")
        ? "100%"
        : "style",
      placeholder: $(this).data("placeholder"),
      allowClear: Boolean($(this).data("allow-clear")),
      closeOnSelect: !$(this).attr("multiple"),
      // sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
    };

    if (
      !/AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        navigator.userAgent
      )
    ) {
      $("#cecoEditaPersonalOperaciones").select2(theme);
      $("#sucursalEditaPersonalOperaciones").select2(theme);
      $("#patenteEditaPersonalOperaciones").select2(theme);
      $("#empresaEditaPersonalOperaciones").select2(theme);
      $("#nivelEditaPersonalOperaciones").select2(theme);
      $("#moEditaPersonalOperaciones").select2(theme);
      $("#gj__comuna_").select2(theme);
      $("#gj__nacionalidad_").select2(theme);
      $("#gj__sexo_").select2(theme);
      $("#gj__nivelEstudios_").select2(theme);
      $("#gj__claseLicencia_").select2(theme);
      $("#gj__estadoCivil_").select2(theme);
      $("#gj__parentescoFamiliarEmpresa_").select2(theme);
      /*$("select[name='gj__nombreAfiliacionPrevision_FONASA']").select2(theme);
    $("select[name='gj__nombreAfiliacionPrevision_ISAPRE']").select2(theme);
    $("select[name='gj__nombreAfiliacionSalud_AFP']").select2(theme);
    $("select[name='gj__nombreAfiliacionSalud_INP']").select2(theme);*/
      $("#gj__banco_").select2(theme);
      $("#gj__tipoCuenta_").select2(theme);
      $("#gj__tipoContrato_").select2(theme);
      $("#gj__cargoGenerico_").select2(theme);
      $("#gj__ref1_").select2(theme);
      $("#gj__ref2_").select2(theme);
      $("#gj__cargo_").select2(theme);
      $("#gj__sucursal_").select2(theme);
      $("#gj__empresa_").select2(theme);
      $("#gj__centroCosto_").select2(theme);
    }

    initPersonal_disabled();

    setTimeout(function () {
      var h = $(window).height() - 200;
      $("#bodyEditaPersonalOperaciones").css("height", h);
      $("#modalAlertasSplash").modal("hide");
      $("#modalEditaPersonalOperaciones").modal("show");
    }, 500);
  });
