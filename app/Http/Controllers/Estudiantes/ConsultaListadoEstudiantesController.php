<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Support\Str;

class ConsultaListadoEstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $search = null)
    {
        $arraySearch = explode(' ', $search);
        $search = Str::replace(' ', '%', $search);

        $students = Estudiante::where('nombre', 'LIKE','%'.$search.'%')
        ->orWhere('apellido', 'LIKE','%'.$search.'%')
        ->orWhere('cedula', 'LIKE','%'.$search.'%')
        ->orWhereRaw("CONCAT(nombre,' ', apellido) LIKE '%".$search."%'");

        foreach ($arraySearch as $item) {
            $students = $students->orWhere('nombre', 'LIKE','%'.$item.'%')
            ->orWhere('apellido', 'LIKE','%'.$item.'%');
        }

        $students = $students->get();
        return $students;
    }

}
