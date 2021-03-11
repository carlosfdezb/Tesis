<?php

namespace App\Exports;

use App\Curso;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CursosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$curso = Curso::all();
        return view('certificado.excel_curso',compact('curso'));
    }
  }
