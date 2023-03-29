<div id="modalIngresarPersonalOperaciones" class="modal modal-fullscreen fade" role="dialog">
  <div class="modal-dialog  modal-xl" role="document" style="min-width: 90%; width: 90%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:gray;" id="tituloIngresarPersonalOperaciones"><span class="fas fa-user-plus"></span>&nbsp;&nbsp;Ingresar personal</h5>
      </div>
      <div id="bodyIngresarPersonalOperaciones" class="modal-body alerta-modal-body" style="overflow-y: scroll;">
        <!-- Begin - New -->
        <div class="row" style="margin: 10pt 0; padding-bottom: 10pt; border: 1px solid #efefef; width: 100%; text-align: left;">
            <div class="col-xl-12" style="background-color: #ededed;">
              <h5 style="font-weight: bold;">1. ANTECEDENTES PERSONALES</h5>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">
                RUT
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <input id="gj__rut" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Provisorio?</label>
              <label class="switch">
                <input id="gj__provisorio" type="checkbox" title="Provisorio">
                <span class="slider round"></span>
              </label>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">
                Email
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <input id="gj__email" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Nombres</label>
              <input id="gj__nombres" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Apellidos</label>
              <input id="gj__apellidos" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-12 col-md-12" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Domicilio</label>
              <input id="gj__domicilio" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Comuna</label>
              <!--<input name="gj__comuna" class="form-control" type="text" value="">-->
              <select id="gj__comuna" class="form-control">
              </select>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Ciudad</label>
              <input id="gj__ciudad" class="form-control" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Fono</label>
              <input id="gj__fono" class="form-control onlyNumbers" type="text" value="">
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Fecha Nacimiento</label>
              <input id="gj__fechaNacimiento" class="form-control" type="text" value="" readonly>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Nacionalidad</label>
              <select id="gj__nacionalidad" class="form-control"></select>
            </div>

            <div class="col-xl-4 col-md-4" style="margin-top: 10pt;">
              <label disabled style="font-weight: bold;">Sexo</label>
              <select id="gj__sexo" class="form-control">
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
                    <input id="gj__esPuebloOriginario" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__puebloOriginario" class="form-control" type="text" value="" placeholder="Especifique..." disabled>
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Habla español?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__esHispanoHablante" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Nivel de Estudios</label>
              <select id="gj__nivelEstudios" class="form-control"></select>
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Lee?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__sabeLeer" type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="display: grid; margin-top: 10pt;">
              <label style="font-weight: bold;">¿Escribe?</label>
              <div style="display: flex;">
                <label class="switch">
                  <input id="gj__sabeEscribir" type="checkbox">
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
                    <input id="gj__tieneLicencia" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <select id="gj__claseLicencia" class="form-control" disabled></select>
              </div>
            </div>

            <div class="col-xl-2 col-md-2" style="margin-top: 10pt;">
              <label>Fecha de Vencimiento</label>
              <input id="gj__fechaVencimientoLicencia" type="text" class="form-control" readonly disabled />
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Estado Civil</label>
              <select id="gj__estadoCivil" class="form-control"></select>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Contacto de Emergencia</label>
              <div style="display: flex; gap: 20px;">
                <input id="gj__nombreContactoEmergencia" type="text" class="form-control" placeholder="Nombre" />
                <input id="gj__fonoContactoEmergencia" type="text" class="form-control onlyNumbers" placeholder="Fono" />
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tallas Uniforme</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Camisa</span>
                  <input id="gj__talla_camisa" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Guantes</span>
                  <input id="gj__talla_guantes" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Pantalón</span>
                  <input id="gj__talla_pantalon" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Zapatos</span>
                  <input id="gj__talla_zapatos" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Casco</span>
                  <input id="gj__talla_casco" type="text" class="form-control" style="width: 100px;">
                </label>
                <label style="display: flex; align-items: center; justify-content: space-between; gap: 10px; width: 200px;">
                  <span>Otros</span>
                  <input id="gj__talla_otros" type="text" class="form-control" style="width: 100px;">
                </label>
              </div>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 68pt;">
              <input id="gj__otraTallaUniforme" type="text" placeholder="Especifique..." class="form-control" />
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Tiene familiares trabajando en la empresa?</label>
              <div style="display: flex; align-items: center; justify-content: center; gap: 20px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__tieneFamiliarEmpresa" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__nombreFamiliarEmpresa" type="text" class="form-control" placeholder="Nombre completo familiar" disabled />
                <input id="gj__cargoFamiliarEmpresa" type="text" class="form-control" placeholder="Cargo que desempeña" disabled />
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo de Parentesco</label>
              <select id="gj__parentescoFamiliarEmpresa" class="form-control" disabled>
                <option value="-1">Sin asignar</option>  
                <option value="Padre">Padre/Madre</option>
                <option value="Pareja">Pareja</option>
                <option value="Hijo">Hijo(a)</option>
                <option value="Otro">Otro</option>
              </select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold; color: white;">Otro</label>
              <input id="gj__otroParentescoFamiliarEmpresa" type="text" placeholder="Especifique..." class="form-control" disabled />
            </div>
            
            <div class="col-xl-6 col-md-6" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Trabajo anteriormente en la empresa?</label>
              <div style="display: flex; align-items: center; justify-content: center; gap: 20px;">
                <div style="width: 100px;">
                  <label class="switch">
                    <input id="gj__esRepitente" type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <input id="gj__cargoRepitente" type="text" class="form-control" placeholder="Cargo que desempeñó" disabled />
                <input id="gj__razonRepitente" type="text" class="form-control" placeholder="Razón Fin Relación Laboral" disabled />
              </div>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">2. ANTECEDENTES PREVISIONALES</h5>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">
                Afiliado a Previsión:
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input name="gj__afiliacion_prevision" type="radio" class="form-control" style="width: 20px;" value="fonasa">
                  <span>FONASA</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input name="gj__afiliacion_prevision" type="radio" class="form-control" style="width: 20px;" value="isapre">
                  <span>ISAPRE</span>
                </label>
              </div>
              <select id="gj__nombreAfiliacionPrevision_FONASA" class="form-control"></select>
              <select id="gj__nombreAfiliacionPrevision_ISAPRE" class="form-control"></select>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">
                Afiliado a Salud:
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input name="gj__afiliacion_salud" type="radio" class="form-control" style="width: 20px;" value="afp">
                  <span>AFP</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input name="gj__afiliacion_salud" type="radio" class="form-control" style="width: 20px;" value="inp">
                  <span>INP</span>
                </label>
              </div>
              <select id="gj__nombreAfiliacionSalud_AFP" class="form-control"></select>
              <select id="gj__nombreAfiliacionSalud_INP" class="form-control"></select>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">3. FORMA DE PAGO</h5>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Banco</label>
              <select id="gj__banco" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo de Cuenta</label>
              <select id="gj__tipoCuenta" class="form-control">
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
              <input id="gj__nroCuenta" type="text" class="form-control" />
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">4. DOCUMENTOS DE PRESENTACIÓN OBLIGATORIOS, PREVIO A LA CONTRATACIÓN</h5>
            </div>

            <div class="col-xl-6 col-md-6" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Certificados</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_estudios" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Estudios</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_antecedentes" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Antecedentes</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_deExcencion" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>De Excención</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_residencia" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Residencia</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_pension" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Pensión</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_discapacidad" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Discapacidad</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_afp" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>AFP</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_fonasa" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>FONASA</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_isapre" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>ISAPRE</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_seguroCovid19" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Seguro Covid 19</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_conadi" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>CONADI</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_cursoOS10" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Curso OS 10</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_cursoSupervisor" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Curso Supervisor</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; width: 180px;">
                  <input id="gj__certificados_certificadoVacunas" type="checkbox" class="form-control gj__certificados" style="width: 20px;">
                  <span>Certificado Vacunas</span>
                </label>
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Otros</label>
              <div style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; column-gap: 40px;">
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_cedulaDeIdentidad" type="checkbox" class="form-control gj__certificados_otros" style="width: 20px;">
                  <span>Cédula de Identidad</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_licenciaDeConducir" type="checkbox" class="form-control gj__certificados_otros" style="width: 20px;">
                  <span>Licencia de Conducir</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_curriculum" type="checkbox" class="form-control gj__certificados_otros" style="width: 20px;">
                  <span>Currículum</span>
                </label>
                <label style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                  <input id="gj__certificados_otros_hojaDeVida" type="checkbox" class="form-control gj__certificados_otros" style="width: 20px;">
                  <span>Hoja De Vida</span>
                </label>
              </div>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt; display: grid;">
              <label style="font-weight: bold;">¿Cuenta con clave única?</label>
              <label class="switch">
                <input id="gj__tieneClaveUnica" type="checkbox">
                <span class="slider round"></span>
              </label>
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">ANTECEDENTES LABORALES (De uso interno de la empresa)</h5>
            </div>
            
            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Fecha Ingreso Empresa</label>
              <input id="gj__fechaIngresoEmprea" type="date" class="form-control" />
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Tipo Contrato</label>
              <select id="gj__tipoContrato" class="form-control">
                <option value="-1">Sin asignar</option>
                <option value="PlazoFijo">Plazo Fijo</option>
                <option value="PorTemporada">Por Temporada</option>
                <option value="Indefinido">Indefinido</option>
              </select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Cargo a Desempeñar</label>
              <select id="gj__cargo" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Duración Inicial Contrato</label>
              <input id="gj__duracionInicialContrato" type="text" class="form-control onlyNumbers" />
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Cargo Genérico</label>
              <select id="gj__cargoGenerico" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">JEAS</label>
              <input id="gj__jeas" class="form-control" disabled>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">REF1</label>
              <select id="gj__ref1" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">REF2</label>
              <select id="gj__ref2" class="form-control"></select>
            </div>

            <div class="col-xl-3 col-md-3" style="margin-top: 10pt;">
              <label style="font-weight: bold;">Plaza/Sector</label>
              <input id="gj__plaza" type="text" class="form-control">
            </div>

            <div class="col-xl-12" style="background-color: #ededed; margin-top: 20pt;">
              <h5 style="font-weight: bold;">ADICIONAL</h5>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">
                Sucursal
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <select id="gj__sucursal" class="form-control">
              </select>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">
                Empresa
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <select id="gj__empresa" class="form-control">
              </select>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 10pt;">
              <label style="font-weight: bold;">
                Centro de Costo
                <span style="font-weight: bold; color: red;">*</span>
              </label>
              <select id="gj__centroCosto" class="form-control">
              </select>
            </div>
        </div>
        <!-- End - New -->
			</div>
			<div class="modal-footer" style="text-align: left;">
				<button id="guardarIngresarPersonalOperaciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary">Guardar</button>
				<button id="cerrarIngresarPersonalOperaciones" style="margin-top: 10px; display: block;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>