<table style="border-radius: 10px;" id="maestroClienteTable"  class="w-100 align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th>ID Cliente</th>
             <th>Nombre</th>
             <th>Número de cliente ICG</th>
             <th>Otro número de cliente</th>
             <th>Nombre comercial</th>
             <th>Nombre del sujeto</th>
             
             <th>País</th>
             <th>Código país</th>
             <th>Ciudad</th>
             <th>Departamento</th>
             <th>Municipio</th>
             <th>Teléfono fijo</th>
             <th>Página web</th>
             <th>Correo</th>

             <th>Teléfono célular</th>
             <th>Paraiso fiscal</th>
             <th>Nombre contacto</th>
             <th>Cargo contacto</th>

             <th>Página web contacto</th>
             <th>Correo contacto</th>
             <th>Moneda principal</th>
             <th>Tipo cambio</th>
             <th>Giro fical de negocio</th>
             <th>Tipo contribuyente</th>
             <th>NIT/NIFF</th>
             <th>N° Registro fical</th>
             <th>¿Cobra IVA?</th>
             <th>¿Entera IVA?</th>
             
             
             <th>% Retención</th>
             <th>Percepcion</th>
             <th>Cuenta Pasivo #1</th>
             <th>Cuenta Pasivo #2</th>
             <th>Cuenta Activo #1</th>
             <th>Cuenta Activo #2</th>
             <th>% Comisión</th>
             <th>¿Emitirá N/C?</th>
             <th>Condiciones de la operación</th>
             <th>Dirección</th>
             <th>-</th>
             <th>-</th>
             
        </tr>
    </thead>
    <tbody>
        @foreach ($maestro as $us)
         <tr>
             <td>{{$us->id_maestro_cliente}}</td>
             <td>{{$us->id_cliente}}</td>
             <td>{{$us->nombre_cliente}}</td>
             <td>{{$us->numero_cliente_icg}}</td>
             <td>{{$us->numero_cliente}}</td>
             <td>{{$us->nombre_comercial}}</td>


             <td>{{$us->nombre_del_sujeto}}</td>
             
             <td>{{$us->pais}}</td>
             <td>{{$us->codigo_pais}}</td>
             <td>{{$us->ciudad}}</td>
             <td>{{$us->departamento}}</td>
             <td>{{$us->municipio}}</td>
             <td>{{$us->telefono_fijo}}</td>
             <td>{{$us->pagina_web}}</td>
             <td>{{$us->correo}}</td>

             <td>{{$us->telefono_celular}}</td>
             <td>{{$us->paraiso_fiscal}}</td>
             <td>{{$us->nombre_contacto}}</td>
             <td>{{$us->cargo_contacto}}</td>

             <td>{{$us->pagina_web_contacto}}</td>
             <td>{{$us->correo_contacto}}</td>
             <td>{{$us->moneda_principal}}</td>
             <td>{{$us->tipo_cambio}}</td>
             <td>{{$us->giro_fical_negocio}}</td>
             <td>{{$us->tipo_contribuyente}}</td>
             <td>{{$us->nit_niff}}</td>
             <td>{{$us->n_registro_fiscal}}</td>
             <td>{{$us->cobra_iva}}</td>
             <td>{{$us->entera_iva}}</td>
             
             
             <td>{{$us->porc_retencion}}</td>
             <td>{{$us->percepcion}}</td>
             <td>{{$us->cta_pasivo_uno}}</td>
             <td>{{$us->cta_pasivo_dos}}</td>
             <td>{{$us->cta_activo_uno}}</td>
             <td>{{$us->cta_activo_dos}}</td>
             <td>{{$us->comision}}</td>
             <td>{{$us->emitira_nc}}</td>
             <td>{{$us->condiciones_operacion}}</td>
             <td>{{$us->direccion}}</td>


             <td>
                <input type="image" onclick="eliminarM({{$us->id_maestro_cliente}},{{$us->id_cliente}});" form="formulario1" class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarM({{$us->id_maestro_cliente}},{{$us->id_cliente}}, '{{$us->nombre_cliente}}','{{$us->numero_cliente_icg}}','{{$us->numero_cliente}}','{{$us->nombre_comercial}}','{{$us->nombre_del_sujeto}}','{{$us->direccion}}','{{$us->pais}}','{{$us->codigo_pais}}','{{$us->ciudad}}','{{$us->departamento}}','{{$us->municipio}}','{{$us->telefono_fijo}}','{{$us->pagina_web}}','{{$us->correo}}','{{$us->telefono_celular}}','{{$us->paraiso_fiscal}}','{{$us->nombre_contacto}}','{{$us->cargo_contacto}}','{{$us->pagina_web_contacto}}','{{$us->correo_contacto}}','{{$us->moneda_principal}}','{{$us->tipo_cambio}}','{{$us->giro_fical_negocio}}','{{$us->tipo_contribuyente}}','{{$us->nit_niff}}','{{$us->n_registro_fiscal}}','{{$us->cobra_iva}}','{{$us->entera_iva}}',{{$us->porc_retencion}},'{{$us->percepcion}}','{{$us->cta_pasivo_uno}}','{{$us->cta_pasivo_dos}}','{{$us->cta_activo_uno}}','{{$us->cta_activo_dos}}',{{$us->comision}},'{{$us->emitira_nc}}','{{$us->condiciones_operacion}}', '{{$us->telefono_contacto}}')" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>
             
             
         </tr>    
         @endforeach
    </tbody>
</table>