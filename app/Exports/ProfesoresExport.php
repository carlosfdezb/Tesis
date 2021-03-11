<?php

namespace App\Exports;

use App\Profesor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProfesoresExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$profesor = Profesor::orderBy('apellido_paterno', 'asc')->where('estado','Activo')->get();
        return view('certificado.excel_profesor',compact('profesor'));
    }
  }
