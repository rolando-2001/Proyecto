<?php

namespace App\Livewire;

use App\Models\Mascota;
use Livewire\Component;

class MostrarMascotas extends Component
{
    protected $listeners = ['EliminarMascota'];

    public function EliminarMascota($id)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
    }





    public function render()
    {
        $mascotas = Mascota::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-mascotas', [
            'mascotas' => $mascotas
        ]);
    }
}
