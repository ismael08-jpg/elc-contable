@extends('layouts.main', ['activePage' => 'maestro-proveedor', 'titlePage' => __('Maestro Proveedor')])
@section('title', 'Maestro de Proveedor')

@section('content')
<style>
    b{
        color: red;
    }

            
</style>


@include('maestros.ProveedorModalDelete')
@include('maestros.proveedorModalUpdate')


<div>
    <x-table>
        <div class="row justify-content-center pt-5">
            <h4>Gestión de Maestros de Proveedores</h4>
        </div>
        <div class="m-5 my-2">
            <div class="pb-2">
            </div>
            <section style="margin: auto">
                <div class="container-fluid">
                    <form action="{{route('maestroProveedor.store')}}" name="frm1" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <center><h3>Datos generales del proveedor</h3></center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre del Proveedor<b>*</b></label>
                                        <input type="text" maxlength="50"  class="txt-form" name="nombre_proveedor" value="{{old('nombre_proveedor')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>N° Proveedor ICG<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" name="numero_proveedor_icg" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Otro número de proveedor</label>
                                        <input type="text" maxlength="50" class="txt-form" name="numero_proveedor">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nombre Comercial <b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" name="nombre_comercial">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nombre del Sujeto<b>*</b></label><br>
                                        <div id="nombre_sujeto" >
                                            <input type="radio" id="natural" required name="nombre_del_sujeto" value="Natural" >
                                            <label for="male">Natural</label><br>
                                            <input type="radio" id="juridico" name="nombre_del_sujeto" value="Juridico" >
                                            <label for="female">Juridico</label><br> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>¿Es paraiso fiscal?</label><br>
                                        <div id="paraiso_fiscal">
                                            <input type="radio" id="natural" name="paraiso_fiscal" required value="Si" onclick="des(this.form,0)">
                                            <label for="male">Si</label><br>
                                            <input type="radio" id="juridico" name="paraiso_fiscal" value="No" onclick="des(this.form,1)">
                                            <label for="female">No</label><br> 
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <center><h3 class="mt-3">Persona de Contacto</h3></center>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <label>Nombre<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" required name="nombre_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Cargo<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" required name="cargo_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Página web</label>
                                        <input type="text" maxlength="50" class="txt-form"  name="pagina_web_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo <b>*</b></label>
                                        <input type="email" placeholder="someone@example.com"  class="txt-form" required name="correo_contacto">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Teléfono Móvil Contacto</label>
                                        <input type="text" maxlength="50" class="txt-form" name="telefono_contacto">
                                    </div>
                                    
                                </div>
                        </div>

                            
                            <div class="col-6">
                                <center><h3> Dirección</h3></center>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <label>Dirección<b>*</b></label>
                                        <textarea class="txt-form" name="direccion" required    maxlength="100">

                                        </textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label>País<b>*</b></label>
                                        <select  class="select-css" required id="txtPais" name="pais">
                                            <option value="">Seleccione un país</option>
                                            @foreach ($pais as $pais)
                                                <option value="{{$pais->id}}">
                                                    {{$pais->nombre_pais}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Código país (según mh)<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" required name="codigo_pais" id="codigoPais">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ciudad<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" required name="ciudad">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Departamento/Estado<b>*</b></label>
                                        {{-- <input type="text" maxlength="50" class="txt-form" required name="departamento"> --}}
                                        <select name="departamento" id="txtEstado" required class="select-css"></select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Municipio</label>
                                        <div id="hiddenMunicipio">
                                            <input type="text" maxlength="50" id="txtMunicipio" class="txt-form" name="municipio">
                                        </div>
                                        <div id="hiddenSelectMunicipio" >
                                            <select name="municipio" disabled id="selectMunicipio" class="select-css"></select>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <hr>
                                        <center><h3 class="mt-3"> Contacto</h3></center>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <label>Teléfono fijo<b>*</b></label>
                                        <input type="text" maxlength="50" class="txt-form" required name="telefono_fijo">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Página web</label>
                                        <input type="text" maxlength="50" class="txt-form" name="pagina_web">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo<b>*</b></label>
                                        <input type="email" placeholder="someone@example.com"  class="txt-form" required name="correo">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Teléfono Móvil</label>
                                        <input type="text" maxlength="50" class="txt-form" name="telefono_celular">
                                    </div>
                                </div>

                                
                            </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        
                        <div class="mt-8 col-12"><center><h3 class="mt-10">Información general</h3></center></div>
                            
                        <div class="col-6">
                                <label>Moneda principal<b>*</b></label>
                                <select name="moneda_principal" class="select-css" required >
                                    <option value="">Seleccione una moneda</option>
                                    @foreach ($moneda as $m)
                                        <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Tipo de cambio</label>
                                <select name="tipo_cambio" class="select-css" required >
                                    <option value="">Seleccione un tipo de cambio</option>
                                    @foreach ($moneda as $m)
                                        <option value="{{$m->nombre_moneda}} ({{$m->simbolo}})">{{$m->nombre_moneda}} ({{$m->simbolo}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Giro Fiscal del negocio<b>*</b></label>
                                <input type="text" maxlength="50" class="txt-form" required name="giro_fical_negocio">
                            </div>
                            <div class="col-md-3">
                                <label>Tipo contribuyente<b>*</b></label><br>
                                <div id="tipoContribuyente">
                                    <input type="radio" name="tipo_contribuyente" required value="Grande">
                                    <label for="grande">Grande</label><br>
                                    <input type="radio"  name="tipo_contribuyente" value="Mediano">
                                    <label for="mediano">Mediano</label><br> 
                                    <input type="radio" name="tipo_contribuyente" value="Pequeño">
                                    <label for="Pequeño">Pequeño</label><br> 
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>NIT/NIFF<b>*</b></label>
                                <div id="hiddenNit_niff">
                                    <input type="text" maxlength="50" class="txt-form" required id="txtNit_niff" name="nit_niff">
                                </div>
                                <div id="hiddenNitValidado">
                                    <input type="text" maxlength="50" disabled placeholder="0000-000000-000-0" pattern="[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}" class="txt-form" required id="txtNitValidado" name="nit_niff">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>N° Registro fiscal<b>*</b></label>
                                <div id="hiddenNRegistro">
                                    <input type="text" maxlength="50" class="txt-form" required  name="n_registro_fiscal" required id="txtNRegistro" >
                                </div>
                                <div id="hiddenNRegistroValidado">
                                    <input type="text" maxlength="50" name="n_registro_fiscal" class="txt-form" disabled   required id="nRegistroValidado" >
                                </div>
                            </div>
    
                            <div class="col-md-3">
                                <label>¿Se cobra IVA?<b>*</b></label><br>
                                <div id="cobraIva">
                                    <input type="radio" name="cobra_iva" required value="Si" >
                                    <label  for="si">Si</label>
                                    <input class="ml-4"  type="radio" name="cobra_iva" value="No" >
                                    <label for="no">No</label><br> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>¿Se entera IVA?<b>*</b></label><br>
                                <div id="enteraIva">
                                    <input type="radio" name="entera_iva" required value="Si">
                                    <label for="si">Si</label>
                                    <input class="ml-4" type="radio" name="entera_iva" value="No">
                                    <label for="no">No</label><br> 
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Emitirá N/C<b>*</b></label><br>
                                <div id="emitiraNc">
                                    <input type="radio" name="emitira_nc" required value="Si">
                                    <label for="si">Si</label>
                                    <input class="ml-4"  type="radio" name="emitira_nc" value="No">
                                    <label for="no">No</label><br> 
                                </div>
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Retención Fiscal (%)<b>*</b></label>
                                <input type="number" required class="txt-form" min="0"  name="porc_retencion">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Percepción<b>*</b></label>
                    
                                <div id="percepcion">
                                    <input type="radio" name="percepcion" required value="Si">
                                    <label for="si">Si</label>
                                    <input class="ml-4"  type="radio" name="percepcion" value="No">
                                    <label for="no">No</label><br> 
                                </div>
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Pasivo #1<b>*</b></label>
                                <input type="text" maxlength="50" class="txt-form" required name="cta_pasivo_uno">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Pasivo #2</label>
                                <input type="text" maxlength="50" class="txt-form" name="cta_pasivo_dos">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Activo #1<b>*</b></label>
                                <input type="text" maxlength="50" class="txt-form" required name="cta_activo_uno">
                            </div>
                            <div class="mt-2 col-md-3">
                                <label>Cuenta Activo #2</label>
                                <input type="text" maxlength="50" class="txt-form" name="cta_activo_dos">
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>% Comisión<b>*</b></label>
                                <input type="number" max="100"  required class="txt-form" min="0" name="comision">
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>Condiciones de la operación</label>
                                <textarea maxlength="50" name="condiciones_operacion" class="txt-form" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label>Condiciones del crédito </label>
                                <textarea name="condiciones_credito" maxlength="50"  class="txt-form" cols="30" rows="3"></textarea>
                            </div>
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" value="Crear" class=" mt-5 btn btn-radius btn-azul">
                    </div>
                    </form>    
                </div>
                <br>
                    
                        <div>
                            @include('maestros.proveedorTable')   
                        </div>
                    
                <br>

                
            </section>
        
        </div>
    </x-table>
</div>

@endsection

@push('js')

@if ($alerta == "create"){
    <script>
        toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
    </script>
}
@endif
@if ($alerta == "update")
    <script>
        toastr["success"]("Maestro Actualizado Correctamente", "Operación correcta");
        toastr["warning"]("Usted cambió los datos del maestro. Estos cambios no afectaran a las ventas registradas anteriormente a este cambio", "Operación correcta");
    </script>
@endif
@if ($alerta == "deleteError")
    <script>
        toastr["error"]("El maestro no se puede eliminar. Tiene Compras ligadas", "Error");
    </script>
@endif
@if ($alerta == "delete")
    <script>
        toastr["info"]("Maestro Eliminado Correctamente", "Operación correcta");
    </script>
@endif

<script type="text/javascript" src="{{asset('assets/js/maestroProveedor.js')}}"></script>

@endpush