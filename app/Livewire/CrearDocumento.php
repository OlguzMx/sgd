<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesRemision;
use Livewire\Component;
use App\Models\Documento;
use App\Models\Empresa;
use App\Models\Remision;
use App\Models\TipoDocumento;
use Livewire\Attributes\Validate;

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
        }
        // Crear elseif para cada tipo

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
