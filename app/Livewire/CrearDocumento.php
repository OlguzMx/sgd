<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Remision;
use App\Models\Documento;
use App\Models\TipoDocumento;
use App\Models\GarantiaCambio;
use App\Models\DetallesRemision;
use Livewire\Attributes\Validate;
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

    // COTIZACIÓN

    // ORDEN DE COMPRA

    // GARANTÍA Y/O CAMBIO DE EQUIPO
    //tabla garantia_cambios

    //tabla detalles_garantias_cambios
    public $marca;
    public $modelo;
    public $num_serie_danado;
    public $num_serie_reemplazo;
    public $num_inventario;

    // ENTRADA DE MAT/EQ A BODEGA

    // SALIDA DE MAT/EQ A BODEGA
    public function mount()
    {
        $this->users_id = auth()->user()->id;
    }

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

    public function detallesGarantiaCambios()
    {
        // Agregar los datos del detalle actual al arreglo de detalles
        
            $this->detalles[] = [
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'num_serie_danado' => $this->num_serie_danado,
                'num_serie_reemplazo' => $this->num_serie_reemplazo,
                'num_inventario' => $this->num_inventario,
            ];

            // Limpiar los campos de entrada después de agregar el detalle
            $this->marca = null;
            $this->modelo = null;
            $this->num_serie_danado = null;
            $this->num_serie_reemplazo = null;
            $this->num_inventario = null;
        
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
                // 'cantidad' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
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
        } elseif ($this->validate()['tipo_documento_id'] === '2') { // Crear elseif para cada tipo
            // Validar campos de cotización
            $this->validate([
                // 'fecha' => 'required',
                // 'clientes_id' => 'required',
                // 'empresas_id' => 'required',
                // 'cantidad' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
            ]);
            // Tabla cotización
            // $remision = new Remision();
            // $remision->fecha = $this->fecha;
            // $remision->empresas_id = $this->empresas_id;
            // Asignar el ID del documento a la remisión
            // $remision->documentos_id = $documento->id;
            // $remision->save();

            // Orden de compra
        } elseif ($this->validate()['tipo_documento_id'] === '3') { // Crear elseif para cada tipo
            // Validar campos de orden_de_compras
            $this->validate([
                // 'fecha' => 'required',
                // 'clientes_id' => 'required',
                // 'empresas_id' => 'required',
                // 'cantidad' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
            ]);
            // Tabla remision
            // $remision = new Remision();
            // $remision->fecha = $this->fecha;
            // $remision->empresas_id = $this->empresas_id;
            // Asignar el ID del documento a la remisión
            // $remision->documentos_id = $documento->id;
            // $remision->save();

            // Garantía y/o cambio de equipo
        } elseif ($this->validate()['tipo_documento_id'] === '4') { // Crear elseif para cada tipo
            // Validar campos de garantias_cambios
            $this->validate([
                'fecha' => 'required',
                'clientes_id' => 'required',
                'empresas_id' => 'required',
                'users_id' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
            ]);
            // Tabla remision
            $garantia_cambio = new GarantiaCambio();
            $garantia_cambio->fecha = $this->fecha;
            $garantia_cambio->clientes_id = $this->clientes_id;
            $garantia_cambio->empresas_id = $this->empresas_id;
            $garantia_cambio->users_id = $this->users_id;
            // Asignar el ID del documento a la remisión
            $garantia_cambio->documentos_id = $documento->id;
            $garantia_cambio->save();

            // Guardar cada detalle en la base de datos asociado con la remisión
            foreach ($this->detalles as $detalle) {
                // Crear una nueva instancia de DetallesRemision y asignar los valores
                $detalleGarantia = new DetallesGarantiaCambio();
                $detalleGarantia->marca = $detalle['marca'];
                $detalleGarantia->modelo = $detalle['modelo'];
                $detalleGarantia->num_serie_danado = $detalle['num_serie_danado'];
                $detalleGarantia->num_serie_reemplazo = $detalle['num_serie_reemplazo'];
                $detalleGarantia->num_inventario = $detalle['num_inventario'];
                // dd($garantia_cambio);

                // Asociar el detalle con la remisión recién creada y guardarlo
                $garantia_cambio->detalles_garantia_cambio()->save($detalleGarantia);
            }
            // Entrada de Mat/Eq a bodega
        } elseif ($this->validate()['tipo_documento_id'] === '5') { // Crear elseif para cada tipo
            // Validar campos de entrada_almacen
            $this->validate([
                // 'fecha' => 'required',
                // 'clientes_id' => 'required',
                // 'empresas_id' => 'required',
                // 'cantidad' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
            ]);
            // Tabla remision
            // $remision = new Remision();
            // $remision->fecha = $this->fecha;
            // $remision->empresas_id = $this->empresas_id;
            // Asignar el ID del documento a la remisión
            // $remision->documentos_id = $documento->id;
            // $remision->save();

            // Salida de Mat/Eq a bodega
        } elseif ($this->validate()['tipo_documento_id'] === '6') { // Crear elseif para cada tipo
            // Validar campos de salida_almacen
            $this->validate([
                // 'fecha' => 'required',
                // 'clientes_id' => 'required',
                // 'empresas_id' => 'required',
                // 'cantidad' => 'required',
                // 'unidad' => 'required',
                // 'descripcion' => 'required'
            ]);
            // Tabla remision
            // $remision = new Remision();
            // $remision->fecha = $this->fecha;
            // $remision->empresas_id = $this->empresas_id;
            // Asignar el ID del documento a la remisión
            // $remision->documentos_id = $documento->id;
            // $remision->save();
        }
        return redirect(route('documentos.index'))->with('alerta', 'El documento se ha creado correctamente.');
    }

    public function render()
    {

        $clientes = Cliente::orderBy('name', 'asc')->get();
        $empresas = Empresa::orderBy('name', 'asc')->get();
        $tiposDocumentos = TipoDocumento::orderBy('name', 'asc')->get();

        return view('livewire.crear-documento', [
            'clientes' => $clientes,
            'tiposDocumentos' => $tiposDocumentos,
            'empresas' => $empresas
        ]);
    }
}
