<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Quotation;
use App\aluno;
use Datatables;
use View;
use PDF;
use DB;
use Validator;

class AlunoController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $alunos = DB::table('alunos')->get();

        return view('estudantes.alunos', [
                "alunos" => $alunos
        ]);
    }

    public function load(){
        return datatables()->of(DB::table('alunos'))->toJson();
    }

    public function cadastrar()
    {
        return view('estudantes.registrar_aluno');
    }

    public function submit(Request $request)
    {
        // dd(request()->all()) ;
        $filename = "";
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $filename = $request->input('documento').".".$file->getClientOriginalExtension();
            $file->move(public_path('img/fotos/alunos/'), $filename);
        }else{
            $filename = $request->input('documento').".jpg";
        }

        $aluno = new aluno;
        $aluno::create([
            'nome'        =>  $request->input('nome'),
            'doc'         =>  $request->input('documento'),
            'data_nasc'   =>  $request->input('data_nasc'),
            'escola'      =>  $request->input('escola'),
            'serie'       =>  $request->input('serie'),
            'turno'       =>  ($request->input('turno') == "" ? "-----" : $request->input('turno')),
            'rota'        =>  ($request->input('rota') == "" ? "-----" : $request->input('rota')),
            'residencia'  =>  ($request->input('residencia') == "" ? "-----" : $request->input('residencia')),
            'foto'        =>  $filename,
            'pai'         =>  ($request->input('pai') == "" ? "-----" : $request->input('pai')),
            'mae'         =>  $request->input('mae')
        ]);

        return redirect('/alunos/cadastrar');
    }

    public function generatePDF(){
         $alunos = DB::table('alunos')->get();

        $pdf = PDF::loadView('pdf.pdf',  [
                "alunos" => $alunos
        ]);
        return $pdf->download('alunos.pdf');
    }
}
