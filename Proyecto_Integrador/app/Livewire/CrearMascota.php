<?php

namespace App\Livewire;

use App\Models\Mascota;
use App\Models\RazaMascota;
use App\Models\TipoMascota;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearMascota extends Component
{
    public $nombre;
    public $edad;
    public $raza;
    public $especie;
    public $genero;
    public $fecha;
    public $descripcion;
    public $imagen;

    use WithFileUploads;


    protected $rules = [
        'nombre' => 'required|string',
        'edad' => 'required|numeric|min:0|max:19',
        'raza' => 'required',
        'especie' => 'required',
        'genero' => 'required',
        'fecha' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearMascota()
    {
        $datos = $this->validate();

        //almacenar la imagen
        $imagen = $this->imagen->store('public/mascotas');
        $datos['imagen'] = str_replace('public/mascotas/', '', $imagen);



        // agregar una mascota 
        Mascota::create([
            'nombre' => $datos['nombre'],
            'edad' => $datos['edad'],
            'raza_mascotas_id' => $datos['raza'],
            'tipo_mascotas_id' => $datos['especie'],
            'genero' => $datos['genero'],
            'fecha' => $datos['fecha'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,

        ]);



        // crear un mensaje 

        session()->flash('mensaje', 'La mascota se agregó correctamente');



        //redirecionar al usuario
        return redirect()->to('/dashboard/listar');
    }


    public function render()
    {
        // consulta a base de datos
        $tipomascota = TipoMascota::all();
        $razamascota = RazaMascota::all();

        // Pasar ambas colecciones a la vista
        return view('livewire.crear-mascota', [
            'tiposMascota' => $tipomascota,
            'razasMascota' => $razamascota,
        ]);
    }
}
