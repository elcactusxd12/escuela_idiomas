<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\Grupo;
use App\Models\Matricula;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // =====================================
        // ESTADÍSTICAS GENERALES
        // =====================================

        $totalAlumnos = Alumno::count();

        $totalProfesores = Profesor::count();

        $totalCursos = Curso::count();

        $totalGrupos = Grupo::count();


        // =====================================
        // ÚLTIMOS 5 ALUMNOS REGISTRADOS
        // =====================================

        $alumnosRecientes = Alumno::latest()
            ->take(5)
            ->get();


        // =====================================
        // MATRÍCULAS DE LOS ÚLTIMOS 6 MESES
        // =====================================

        $matriculasLabels = [];
        $matriculasDatos = [];

        $fechaInicio = now()->startOfMonth()->subMonths(5);

        for ($i = 0; $i < 6; $i++) {

            $fecha = $fechaInicio->copy()->addMonths($i);

            $matriculasLabels[] = $fecha->locale('es')->translatedFormat('M');

            $matriculasDatos[] = Matricula::whereYear(
                'fecha_matricula',
                $fecha->year
            )
            ->whereMonth(
                'fecha_matricula',
                $fecha->month
            )
            ->count();
        }


        // =====================================
        // DISTRIBUCIÓN DE ALUMNOS POR IDIOMA
        // =====================================

        $idiomasDistribucion = DB::table('matriculas')
            ->join('grupos', 'matriculas.grupos_id', '=', 'grupos.id')
            ->join('cursos', 'grupos.cursos_id', '=', 'cursos.id')
            ->join('idiomas', 'cursos.idiomas_id', '=', 'idiomas.id')
            ->select(
                'idiomas.nombre',
                DB::raw('COUNT(DISTINCT matriculas.alumnos_id) as total')
            )
            ->groupBy('idiomas.id', 'idiomas.nombre')
            ->orderBy('idiomas.nombre')
            ->get();


        // =====================================
        // ENVIAR INFORMACIÓN AL HOME
        // =====================================

        return view('home', compact(
            'totalAlumnos',
            'totalProfesores',
            'totalCursos',
            'totalGrupos',
            'alumnosRecientes',
            'matriculasLabels',
            'matriculasDatos',
            'idiomasDistribucion'
        ));
    }
}