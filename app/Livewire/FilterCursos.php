<?php

namespace App\Livewire;


use App\Models\Cursos;
use Livewire\Component;

class FilterCursos extends Component

{
    public  $search= '';



    public function render()
    {

      
        return view('livewire.filter-cursos',[



            'results'=>$this->search,



        ]);
    }
}
