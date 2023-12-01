<?php

namespace App\Livewire;

use App\Models\Mascota;
use Livewire\Component;
use App\Models\RazaMascota;
use App\Models\TipoMascota;
use Illuminate\Support\Carbon;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarMascota extends Component
{
    public $mascota_id;
    public $nombre;
    public $edad;
    public $raza;
    public $especie;
    public $genero;
    public $fecha;
    public $descripcion;
    public $imagen;
    public $nueva_imagen;


    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string',
        'edad' => 'required|numeric|min:0|max:19',
        'raza' => 'required',
        'especie' => 'required',
        'genero' => 'required',
        'fecha' => 'required',
        'descripcion' => 'required',
        'nueva_imagen' => 'nullable|image|max:1024',

    ];

    public  function mount(Mascota $mascota)
    {
        $this->mascota_id = $mascota->id;
        $this->nombre = $mascota->nombre;
        $this->edad = $mascota->edad;
        $this->raza = $mascota->raza_mascotas_id;
        $this->especie = $mascota->tipo_mascotas_id;
        $this->genero = $mascota->genero;
        $this->fecha = Carbon::parse($mascota->fecha)->format('Y-m-d');
        $this->descripcion = $mascota->descripcion;
        $this->imagen = $mascota->imagen;
    }

    public function editarMascota()
    {
        $dato = $this->validate();

        // si hay una nueva imagen
         if ($this->nueva_imagen){
            $imagen = $this->nueva_imagen->store('public/mascotas');
            $dato['imagen'] = str_replace('public/mascotas/', '', $imagen);
    
         }

        // encontrar la vacante a editar
        $mascota = Mascota::find($this->mascota_id);

        // asignando los valores 
        $mascota->nombre = $dato['nombre'];
        $mascota->edad = $dato['edad'];
        $mascota->raza_mascotas_id = $dato['raza'];
        $mascota->tipo_mascotas_id = $dato['especie'];
        $mascota->genero = $dato['genero'];
        $mascota->fecha = $dato['fecha'];
        $mascota->descripcion = $dato['descripcion'];
        $mascota->imagen=$dato['imagen']?? $mascota->imagen;

        // guardar la vacante
        $mascota->save();


        // mensaje 
        session()->flash('mensaje', 'La mascota se actualizó correctamente');

        // Redireccionar
        return redirect()->to('/dashboard/listar');
    }



    public function render()
    {

        // consultar a la base de datos
        $tipomascota = TipoMascota::all();
        $razamascota = RazaMascota::all();
        return view('livewire.editar-mascota', [
            'tiposMascota' => $tipomascota,
            'razasMascota' => $razamascota,
        ]);
    }
}
