<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Remision;
use App\Models\Documento;
use App\Models\Proveedor;
use App\Models\Cotizacion;
use App\Models\OrdenCompra;
use App\Models\SalidaAlmacen;
use App\Models\TipoDocumento;
use App\Models\EntradaAlmacen;
use App\Models\GarantiaCambio;
use App\Models\DetallesRemision;
use Livewire\Attributes\Validate;
use App\Models\DetallesCotizacion;
use App\Models\DetallesOrdenCompra;
use App\Models\DetallesSalidaAlmacen;
use App\Models\DetallesEntradaAlmacen;
use App\Models\DetallesGarantiaCambio;

class CrearDocumento extends Component
{
    public $selectedOption;
    public $users_id;
    #[Validate('required')]
    public $clientes_id;
    #[Validate('required')]
    public $tipo_documento_id;

    // REMISION
    // tabla remision
    public $fecha;
    public $empresas_id;
    // detalles_remision
    public $cantidad;
    public $unidad;
    public $descripcion;

    // Detalles de los tipos de documentos (NEW)
    public $detalles = [];

    // GARANTÍA Y/O CAMBIO DE EQUIPO
    //tabla garantia_cambios

    //tabla detalles_garantias_cambios
    public $marca_danado;
    public $modelo_danado;
    public $num_serie_danado;
    public $marca_reemplazo;
    public $modelo_reemplazo;
    public $num_serie_reemplazo;
    public $num_inventario;

    // ENTRADA / SALIDA DE MAT/EQ A BODEGA
    // tabla entrada/salida_almacen
    public $name_cliente;
    public $puesto_cliente;
    public $empresa_cliente;

    //tabla detalles_garantias_cambios
    public $marca;
    public $modelo;
    public $num_de_parte;

    // SALIDA DE MAT/EQ A BODEGA

    // ORDEN DE COMPRA
    // tabla orden_de_compra
    public $proveedores_id;
    public $num_orden_compra;
    public $nombre_proyecto;
    public $domicilio;
    public $ubicacion;
    public $codigo_postal;
    public $contacto_cliente;
    public $tel_cliente;
    public $email_cliente;
    public $subtotal;
    public $iva;
    public $total;

    // tabla detalles_orden_de_compras
    public $precio_unitario;
    public $importe;

    // COTIZACIÓN
    // tabla cotizacion
    public $folio;
    public function mount()
    {
        $this->users_id = auth()->user()->id;
    }

    // detallesRemision
    public function detallesDocumentos()
    {
        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            'cantidad' => $this->cantidad,
            'unidad' => $this->unidad,
            'descripcion' => $this->descripcion,
        ];

        // Limpiar los campos de entrada después de agregar el detalle
        $this->cantidad = null;
        $this->unidad = null;
        $this->descripcion = null;
    }

    // detallesGarantiaCambios
    public function detallesGarantiaCambios()
    {
        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            // Equipo dañado
            'marca_danado' => $this->marca_danado,
            'modelo_danado' => $this->modelo_danado,
            'num_serie_danado' => $this->num_serie_danado,
            // Equipo reemplazo
            'marca_reemplazo' => $this->marca_reemplazo,
            'modelo_reemplazo' => $this->modelo_reemplazo,
            'num_serie_reemplazo' => $this->num_serie_reemplazo,
            'num_inventario' => $this->num_inventario,
        ];

        // Limpiar los campos de entrada después de agregar el detalle
        // Equipo dañado
        $this->marca_danado = null;
        $this->modelo_danado = null;
        $this->num_serie_danado = null;
        // Equipo reemplazo
        $this->marca_reemplazo = null;
        $this->modelo_reemplazo = null;
        $this->num_serie_reemplazo = null;
        $this->num_inventario = null;
    }

    // detallesEntradaAlmacen
    public function detallesEntradaAlmacen()
    {
        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            'cantidad' => $this->cantidad,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'num_de_parte' => $this->num_de_parte,
            'descripcion' => $this->descripcion,
        ];

        // dd($this->detalles);
        // Limpiar los campos de entrada después de agregar el detalle
        $this->cantidad = null;
        $this->marca = null;
        $this->modelo = null;
        $this->num_de_parte = null;
        $this->descripcion = null;
    }

    // detallesSalidaAlmacen
    public function detallesSalidaAlmacen()
    {
        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            'cantidad' => $this->cantidad,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'num_de_parte' => $this->num_de_parte,
            'descripcion' => $this->descripcion,
        ];

        // dd($this->detalles);
        // Limpiar los campos de entrada después de agregar el detalle
        $this->cantidad = null;
        $this->marca = null;
        $this->modelo = null;
        $this->num_de_parte = null;
        $this->descripcion = null;
    }

    // detallesOrdenCompra
    public function detallesOrdenCompra()
    {
        // Calcular el importe
        $importe = $this->cantidad * $this->precio_unitario;

        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            'cantidad' => $this->cantidad,
            'num_de_parte' => $this->num_de_parte,
            'descripcion' => $this->descripcion,
            'precio_unitario' => $this->precio_unitario,
            'importe' => $importe,
        ];

        // Limpiar los campos de entrada después de agregar el detalle
        $this->cantidad = null;
        $this->num_de_parte = null;
        $this->descripcion = null;
        $this->precio_unitario = null;
        $this->importe = null;
    }

    // detallesCotizacion
    public function detallesCotizacion()
    {
        // Calcular el importe
        $importe = $this->cantidad * $this->precio_unitario;

        // Agregar los datos del detalle actual al arreglo de detalles
        $this->detalles[] = [
            'cantidad' => $this->cantidad,
            'unidad' => $this->unidad, // Asegúrate de que $this->unidad tenga un valor aquí
            'num_de_parte' => $this->num_de_parte,
            'descripcion' => $this->descripcion,
            'precio_unitario' => $this->precio_unitario,
            'importe' => $importe,
        ];        

        // Limpiar los campos de entrada después de agregar el detalle
        $this->cantidad = null;
        $this->unidad = null;
        $this->num_de_parte = null;
        $this->descripcion = null;
        $this->precio_unitario = null;
        $this->importe = null;
    }

    public function save()
    {
        $this->validate();
        // Guardar en Documento
        $documento = Documento::create([
            'users_id' => $this->users_id,
            'tipo_documento_id' => $this->tipo_documento_id,
            'clientes_id' => $this->clientes_id
        ]);

        // Remisión
        if ($this->validate()['tipo_documento_id'] === '1') {
            // Validar campos de remision
            $this->validate([
                'fecha' => 'required',
                'empresas_id' => 'required',
            ]);
            // Tabla remision
            $remision = new Remision();
            $remision->fecha = $this->fecha;
            $remision->empresas_id = $this->empresas_id;
            // Asignar el ID del documento a la remisión
            $remision->documentos_id = $documento->id;
            $remision->save();

            // Guardar cada detalle en la base de datos asociado con la remisión
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesRemision y asignar los valores
                $detalleRemision = new DetallesRemision();
                $detalleRemision->cantidad = $detalle['cantidad'];
                $detalleRemision->unidad = $detalle['unidad'];
                $detalleRemision->descripcion = $detalle['descripcion'];
                // Asociar el detalle con la remisión recién creada y guardarlo
                $remision->detalles_remision()->save($detalleRemision);
            }
            // Cotización
        } elseif ($this->validate()['tipo_documento_id'] === '2') { // COTIZACIÓN - Crear elseif para cada tipo
            // Validar campos de cotizacion
            $this->validate([
                'fecha' => 'required',
                'clientes_id' => 'required',
                'empresas_id' => 'required',
            ]);

            // Calcular el subtotal sumando los importes de cada detalle
            $subtotal = 0;
            foreach ($this->detalles as $detalle) {
                $subtotal += $detalle['cantidad'] * $detalle['precio_unitario'];
            }

            // Calcular el IVA aplicando el porcentaje del 16%
            $iva = $subtotal * 0.16;

            // Calcular el total sumando el subtotal y el IVA
            $total = $subtotal + $iva;

            // Obtener las siglas del usuario autenticado
            $siglasUsuario = strtoupper(substr(auth()->user()->name, 0, 2)); // Por ejemplo, tomar las primeras dos letras en mayúsculas

            // Generar un número aleatorio o utilizar un contador autoincrementable
            $numeroAleatorio = mt_rand(10000, 99999); // Generar un número aleatorio de 5 dígitos

            // Concatenar las siglas con el número generado
            $folio = $siglasUsuario . $numeroAleatorio; // Por ejemplo, "OM12345"

            // Tabla cotizacion
            $cotizacion = new Cotizacion();
            $cotizacion->fecha = $this->fecha;
            $cotizacion->folio = $folio; // Asignar el folio generado
            $cotizacion->empresas_id = $this->empresas_id;
            $cotizacion->clientes_id = $this->clientes_id;
            $cotizacion->subtotal = $subtotal;
            $cotizacion->iva = $iva;
            $cotizacion->total = $total;
            // Asignar el ID del documento a la cotizacion
            $cotizacion->documentos_id = $documento->id;
            $cotizacion->save();


            // Guardar cada detalle en la base de datos asociado con la cotizacion
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesCotizacion y asignar los valores
                $detalleCotizacion = new DetallesCotizacion();
                $detalleCotizacion->cantidad = $detalle['cantidad'];
                $detalleCotizacion->unidad = $detalle['unidad'];
                $detalleCotizacion->num_de_parte = $detalle['num_de_parte'];
                $detalleCotizacion->descripcion = $detalle['descripcion'];
                $detalleCotizacion->precio_unitario = $detalle['precio_unitario'];
                $detalleCotizacion->importe = $detalle['importe'];
                // Asociar el detalle con la cotizacion recién creada y guardarlo
                $cotizacion->detalles_cotizacion()->save($detalleCotizacion);
            }
            // Orden de compra
        } elseif ($this->validate()['tipo_documento_id'] === '3') { // ORDEN DE COMPRA - Crear elseif para cada tipo
            // Validar campos de orden_de_compras
            $this->validate([
                'fecha' => 'required',
                'clientes_id' => 'required',
                'empresas_id' => 'required',
                'proveedores_id' => 'required',
                'num_orden_compra' => 'required',
                'nombre_proyecto' => 'required',
                'name_cliente' => 'required',
                'domicilio' => 'required',
                'ubicacion' => 'required',
                'codigo_postal' => 'required',
                'contacto_cliente' => 'required',
                'tel_cliente' => 'required',
                'email_cliente' => 'required',
            ]);

            // Calcular el subtotal sumando los importes de cada detalle
            $subtotal = 0;
            foreach ($this->detalles as $detalle) {
                $subtotal += $detalle['cantidad'] * $detalle['precio_unitario'];
            }

            // Calcular el IVA aplicando el porcentaje del 16%
            $iva = $subtotal * 0.16;

            // Calcular el total sumando el subtotal y el IVA
            $total = $subtotal + $iva;

            // Tabla orden_de_compras
            $orden_compra = new OrdenCompra();
            $orden_compra->fecha = $this->fecha;
            $orden_compra->empresas_id = $this->empresas_id;
            $orden_compra->clientes_id = $this->clientes_id;
            $orden_compra->proveedores_id = $this->proveedores_id;
            $orden_compra->num_orden_compra = $this->num_orden_compra;
            $orden_compra->nombre_proyecto = $this->nombre_proyecto;
            $orden_compra->name_cliente = $this->name_cliente;
            $orden_compra->domicilio = $this->domicilio;
            $orden_compra->ubicacion = $this->ubicacion;
            $orden_compra->codigo_postal = $this->codigo_postal;
            $orden_compra->contacto_cliente = $this->contacto_cliente;
            $orden_compra->tel_cliente = $this->tel_cliente;
            $orden_compra->email_cliente = $this->email_cliente;
            $orden_compra->subtotal = $subtotal;
            $orden_compra->iva = $iva;
            $orden_compra->total = $total;
            // Asignar el ID del documento a la orden de compra
            $orden_compra->documentos_id = $documento->id;
            $orden_compra->save();

            // Guardar cada detalle en la base de datos asociado con la orden de compra
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesOrdenCompra y asignar los valores
                $detalleOrdenCompra = new DetallesOrdenCompra();
                $detalleOrdenCompra->cantidad = $detalle['cantidad'];
                $detalleOrdenCompra->num_de_parte = $detalle['num_de_parte'];
                $detalleOrdenCompra->descripcion = $detalle['descripcion'];
                $detalleOrdenCompra->precio_unitario = $detalle['precio_unitario'];
                $detalleOrdenCompra->importe = $detalle['importe'];
                // dd($detalleGarantia);
                // Asociar el detalle con la orden de compra recién creada y guardarlo
                $orden_compra->detalles_orden_compra()->save($detalleOrdenCompra);
            }
        } elseif ($this->validate()['tipo_documento_id'] === '4') { // GARANTÍA Y/O CAMBIO DE EQUIPOS - Crear elseif para cada tipo
            // Validar campos de garantias_cambios
            $this->validate([
                'fecha' => 'required',
                'clientes_id' => 'required',
                'empresas_id' => 'required',
                'users_id' => 'required',
            ]);
            // Tabla GarantiaCambio
            $garantia_cambio = new GarantiaCambio();
            $garantia_cambio->fecha = $this->fecha;
            $garantia_cambio->clientes_id = $this->clientes_id;
            $garantia_cambio->empresas_id = $this->empresas_id;
            $garantia_cambio->users_id = $this->users_id;
            $garantia_cambio->descripcion = $this->descripcion;
            // Asignar el ID del documento a la garantia y/o cambio de equipo
            $garantia_cambio->documentos_id = $documento->id;
            $garantia_cambio->save();

            // Guardar cada detalle en la base de datos asociado con la garantia y/o cambio de equipo
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesGarantiaCambio y asignar los valores
                $detalleGarantia = new DetallesGarantiaCambio();
                $detalleGarantia->marca_danado = $detalle['marca_danado'];
                $detalleGarantia->modelo_danado = $detalle['modelo_danado'];
                $detalleGarantia->num_serie_danado = $detalle['num_serie_danado'];
                $detalleGarantia->marca_reemplazo = $detalle['marca_reemplazo'];
                $detalleGarantia->modelo_reemplazo = $detalle['modelo_reemplazo'];
                $detalleGarantia->num_serie_reemplazo = $detalle['num_serie_reemplazo'];
                $detalleGarantia->num_inventario = $detalle['num_inventario'];
                // Asociar el detalle con la garantia y/o cambio de equipo recién creada y guardarlo
                $garantia_cambio->detalles_garantia_cambio()->save($detalleGarantia);
            }
            // Entrada de Mat/Eq a bodega
        } elseif ($this->validate()['tipo_documento_id'] === '5') { // ENTRADA DE MAT/EQ A BODEGA - Crear elseif para cada tipo
            // Validar campos de entrada_almacen
            $this->validate([
                'fecha' => 'required',
                'users_id' => 'required',
                'name_cliente' => 'required',
                'puesto_cliente' => 'required',
                'empresa_cliente' => 'required',
            ]);
            // Tabla entrada_almacen
            $entrada_almacen = new EntradaAlmacen();
            $entrada_almacen->fecha = $this->fecha;
            $entrada_almacen->users_id = $this->users_id;
            $entrada_almacen->name_cliente = $this->name_cliente;
            $entrada_almacen->puesto_cliente = $this->puesto_cliente;
            $entrada_almacen->empresa_cliente = $this->empresa_cliente;
            // Asignar el ID del documento a la entrada de mat/qe a bodega
            $entrada_almacen->documentos_id = $documento->id;
            $entrada_almacen->save();

            // Guardar cada detalle en la base de datos asociado con la entrada de mat/qe a bodega
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesEntradaAlmacen y asignar los valores
                $detalleEntradaAlmacen = new DetallesEntradaAlmacen();
                $detalleEntradaAlmacen->cantidad = $detalle['cantidad'];
                $detalleEntradaAlmacen->marca = $detalle['marca'];
                $detalleEntradaAlmacen->modelo = $detalle['modelo'];
                $detalleEntradaAlmacen->num_de_parte = $detalle['num_de_parte'];
                $detalleEntradaAlmacen->descripcion = $detalle['descripcion'];
                // dd($detalleGarantia);
                // Asociar el detalle con la entrada de mat/qe a bodega recién creada y guardarlo
                $entrada_almacen->detalles_entrada_almacen()->save($detalleEntradaAlmacen);
            }

            // Salida de Mat/Eq a bodega
        } elseif ($this->validate()['tipo_documento_id'] === '6') { // SALIDA DE MAT/EQ A BODEGA - Crear elseif para cada tipo
            // Validar campos de salida_almacen
            $this->validate([
                'fecha' => 'required',
                'users_id' => 'required',
                'name_cliente' => 'required',
                'puesto_cliente' => 'required',
                'empresa_cliente' => 'required',
            ]);
            // Tabla salida_almacen
            $salida_almacen = new SalidaAlmacen();
            $salida_almacen->fecha = $this->fecha;
            $salida_almacen->users_id = $this->users_id;
            $salida_almacen->name_cliente = $this->name_cliente;
            $salida_almacen->puesto_cliente = $this->puesto_cliente;
            $salida_almacen->empresa_cliente = $this->empresa_cliente;
            // Asignar el ID del documento a la salida de mat/eq a bodega
            $salida_almacen->documentos_id = $documento->id;
            $salida_almacen->save();

            // Guardar cada detalle en la base de datos asociado con la salida de mat/eq a bodega
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesSalidaAlmacen y asignar los valores
                $detalleSalidaAlmacen = new DetallesSalidaAlmacen();
                $detalleSalidaAlmacen->cantidad = $detalle['cantidad'];
                $detalleSalidaAlmacen->marca = $detalle['marca'];
                $detalleSalidaAlmacen->modelo = $detalle['modelo'];
                $detalleSalidaAlmacen->num_de_parte = $detalle['num_de_parte'];
                $detalleSalidaAlmacen->descripcion = $detalle['descripcion'];
                // Asociar el detalle con la salida de mat/eq a bodega recién creada y guardarlo
                $salida_almacen->detalles_salida_almacen()->save($detalleSalidaAlmacen);
            }
        }

        return redirect(route('documentos.index'))->with('alerta', 'El documento se ha creado correctamente.');
    }

    public function render()
    {

        $clientes = Cliente::orderBy('name', 'asc')->get();
        $empresas = Empresa::orderBy('name', 'asc')->get();
        $proveedores = Proveedor::orderBy('name', 'asc')->get();
        $tiposDocumentos = TipoDocumento::orderBy('name', 'asc')->get();

        return view('livewire.crear-documento', [
            'clientes' => $clientes,
            'tiposDocumentos' => $tiposDocumentos,
            'empresas' => $empresas,
            'proveedores' => $proveedores,
        ]);
    }
}
