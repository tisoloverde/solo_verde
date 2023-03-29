
<div id="modalEditaPersonalOperaciones" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloEditaPersonalOperaciones"><span class="fas fa-user-edit"></span>&nbsp;&nbsp;
          <span id="tituloModalPersonal">Editar personal</span>
        </h5>
      </div>
      <div id="bodyEditaPersonalOperaciones" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <!-- Begin - New -->
        <div class="row" style="margin: 10pt 0; padding-bottom: 10pt; border: 1px solid #efefef; width: 100%; text-align: left;">
            <div class="col-xl-12" style="background-color: #ededed;">
              <h5 style="font-weight: bold;">1. ANTECEDENTES PERSONALES</h5>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">RUT</label>
              <input id="gj__rut_" class="form-control" type="text" value="" disabled>
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Provisorio?</label>
              <label class="switch">
                <input id="gj__provisorio_" type="checkbox" title="Provisorio">
                <span class="slider round"></span>
              </label>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Email</label>
              <input id="gj__email_" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Nombres</label>
              <input id="gj__nombres_" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Apellidos</label>
              <input id="gj__apellidos_" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-12 col-md-12" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Domicilio</label>
              <input id="gj__domicilio_" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Comuna</label>
              <!--<input name="gj__comuna" class="form-control" type="text" value="">-->
              <select id="gj__comuna_" class="form-control"></select>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Ciudad</label>
              <input id="gj__ciudad_" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Fono</label>
              <input id="gj__fono_" class="form-control onlyNumbers" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Fecha Nacimiento</label>
              <input id="gj__fechaNacimiento_" class="form-control" type="text" value="" readonly>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Nacionalidad</label>
              <!--<input name="gj__nacionalidad" class="form-control" type="text" value="">-->
              <select id="gj__nacionalidad_" class="form-control"></select>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Sexo</label>
              <select id="gj__sexo_" class="form-control">
                <option value="-1">Sin asignar</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
              </select>
            </div>

            <div class="col-xl-6 col-md-6" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Pertenece a pueblo originario?</label>
              <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__esPuebloOriginario_" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__puebloOriginario_" class="form-control" type="text" value="" placeholder="Especifique..." disabled>
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Habla español?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__esHispanoHablante_" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Nivel de Estudios</label>
              <select id="gj__nivelEstudios_" class="form-control"></select>
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Lee?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__sabeLeer_" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Escribe?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__sabeEscribir_" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <!--<div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold; color: white">Especifique estudio</label>
              <textarea placeholder="Especifique estudio..."></textarea>
            </div>-->

            <div class="col-xl-4 col-md-4" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Licencia de Conducir?</label>
              <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__tieneLicencia_" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <select id="gj__claseLicencia_" class="form-control" disabled></select>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="margin-top: 10pt;">
              <label>Fecha de Vencimiento</label>
              <input id="gj__fechaVencimientoLicencia_" type="text" class="form-control" readonly disabled />
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Estado Civil</label>
              <select id="gj__estadoCivil_" class="form-control"></select>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Contacto de Emergencia</label>
              <div style="display: flex; gap: 20px;">
                <input id="gj__nombreContactoEmergencia_" type="text" class="form-control" placeholder="Nombre" />
                <input id="gj__fonoContactoEmergencia_" type="text" class="form-control onlyNumbers" placeholder="Fono" />
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tallas Uniforme</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Camisa</span>
                  <input id="gj__talla_camisa_" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Guantes</span>
                  <input id="gj__talla_guantes_" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Pantalón</span>
                  <input id="gj__talla_pantalon_" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Zapatos</span>
                  <input id="gj__talla_zapatos_" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Casco</span>
                  <input id="gj__talla_casco_" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Otros</span>
                  <input id="gj__talla_otros_" type="text" class="form-control" style="width: 100px;">
                </label>
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 68pt;">
              <input id="gj__otraTallaUniforme_" type="text" placeholder="Especifique..." class="form-control" />
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Tiene familiares trabajando en la empresa?</label>
              <div style="display: flex; align-items: center; justify-content: center; gap: 20px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__tieneFamiliarEmpresa_" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__nombreFamiliarEmpresa_" type="text" class="form-control" placeholder="Nombre completo familiar" disabled />
                <input id="gj__cargoFamiliarEmpresa_" type="text" class="form-control" placeholder="Cargo que desempeña" disabled />
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo de Parentesco</label>
              <select id="gj__parentescoFamiliarEmpresa_" class="form-control" disabled>
                <option value="-1">Sin asignar</option>
                <option value="Padre">Padre/Madre</option>
                <option value="Pareja">Pareja</option>
                <option value="Hijo">Hijo(a)</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold; color: white;">Otro</label>
              <input id="gj__otroParentescoFamiliarEmpresa_" type="text" placeholder="Especifique..." class="form-control" disabled />
            </div>
            
            <div class="col-xl-6 col-md-6" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Trabajo anteriormente en la empresa?</label>
              <div style="display: flex; align-items: center; justify-content: center; gap: 20px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__esRepitente_" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__cargoRepitente_" type="text" class="form-control" placeholder="Cargo que desempeñó" disabled />
                <input id="gj__razonRepitente_" type="text" class="form-control" placeholder="Razón Fin Relación Laboral" disabled />
              </div>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">2. ANTECEDENTES PREVISIONALES</h5>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Afiliado a Previsión:</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__afiliacion_prevision_fonasa_" name="gj__afiliacion_prevision_" type="radio" class="form-control" style="width: 20px;" value="fonasa">
                  <span>FONASA</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__afiliacion_prevision_isapre_" name="gj__afiliacion_prevision_" type="radio" class="form-control" style="width: 20px;" value="isapre">
                  <span>ISAPRE</span>
                </label>
              </div>
              <select id="gj__nombreAfiliacionPrevision_FONASA_" class="form-control"></select>
              <select id="gj__nombreAfiliacionPrevision_ISAPRE_" class="form-control"></select>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Afiliado a Salud:</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__afiliacion_salud_afp_" name="gj__afiliacion_salud_" type="radio" class="form-control" style="width: 20px;" value="afp">
                  <span>AFP</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__afiliacion_salud_inp_" name="gj__afiliacion_salud_" type="radio" class="form-control" style="width: 20px;" value="inp">
                  <span>INP</span>
                </label>
              </div>
              <select id="gj__nombreAfiliacionSalud_AFP_" class="form-control"></select>
              <select id="gj__nombreAfiliacionSalud_INP_" class="form-control"></select>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">3. FORMA DE PAGO</h5>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Banco</label>
              <select id="gj__banco_" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo de Cuenta</label>
              <select id="gj__tipoCuenta_" class="form-control">
                <option value="-1">Sin asignar</option>
                <option value="CuentaCorriente">Cuenta Corriente</option>
                <option value="CuentaVista">Cuenta Vista</option>
                <option value="ChequeraElectronica">Chequera electrónica</option>
                <option value="CuentaRUT">Cuenta RUT</option>
                <option value="CuentaAhorro">Cuenta de Ahorro</option>
                <option value="NoAplica">No Aplica</option>
              </select>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Nro. Cuenta</label>
              <input id="gj__nroCuenta_" type="text" class="form-control" />
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">4. DOCUMENTOS DE PRESENTACIÓN OBLIGATORIOS, PREVIO A LA CONTRATACIÓN</h5>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Certificados</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_estudios_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Estudios</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_antecedentes_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Antecedentes</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_deExcencion_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>De Excención</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_residencia_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Residencia</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_pension_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Pensión</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_discapacidad_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Discapacidad</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_afp_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>AFP</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_fonasa_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>FONASA</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_isapre_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>ISAPRE</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_seguroCovid19_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Seguro Covid 19</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_conadi_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>CONADI</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_cursoOS10_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Curso OS 10</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_cursoSupervisor_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Curso Supervisor</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_certificadoVacunas_" type="checkbox" class="form-control gj__certificados_" style="width: 20px;">
                  <span>Certificado Vacunas</span>
                </label>
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Otros</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_cedulaDeIdentidad_" type="checkbox" class="form-control gj__certificados_otros_" style="width: 20px;">
                  <span>Cédula de Identidad</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_licenciaDeConducir_" type="checkbox" class="form-control gj__certificados_otros_" style="width: 20px;">
                  <span>Licencia de Conducir</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_curriculum_" type="checkbox" class="form-control gj__certificados_otros_" style="width: 20px;">
                  <span>Currículum</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_hojaDeVida_" type="checkbox" class="form-control gj__certificados_otros_" style="width: 20px;">
                  <span>Hoja De Vida</span>
                </label>
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Cuenta con clave única?</label>
              <label class="switch">
                <input id="gj__tieneClaveUnica_" type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">ANTECEDENTES LABORALES (De uso interno de la empresa)</h5>
            </div>
            
            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Fecha Ingreso Empresa</label>
              <input id="gj__fechaIngresoEmprea_" type="date" class="form-control" />
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo Contrato</label>
              <select id="gj__tipoContrato_" class="form-control">
                <option value="PlazoFijo">Plazo Fijo</option>
                <option value="PorTemporada">Por Temporada</option>
                <option value="Indefinido">Indefinido</option>
              </select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Cargo a Desempeñar</label>
              <select id="gj__cargo_" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Duración Inicial Contrato</label>
              <input id="gj__duracionInicialContrato_" type="text" class="form-control onlyNumbers" />
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Cargo Genérico</label>
              <select id="gj__cargoGenerico_" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">JEAS</label>
              <input id="gj__jeas_" class="form-control" disabled>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">REF1</label>
              <select id="gj__ref1_" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">REF2</label>
              <select id="gj__ref2_" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Plaza/Sector</label>
              <input id="gj__plaza_" class="form-control">
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">ADICIONAL</h5>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Sucursal</label>
              <select id="gj__sucursal_" class="form-control">
              </select>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Empresa</label>
              <select id="gj__empresa_" class="form-control">
              </select>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Centro de Costo</label>
              <select id="gj__centroCosto_" class="form-control">
              </select>
            </div>
        </div>
        <!-- End - New -->
			</div>
			<div class="modal-footer" style="text-align: left;">
				<button id="guardarEditaPersonalOperaciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cancelarEditaPersonalOperaciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>