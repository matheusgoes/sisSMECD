<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use View;
use Datatables;

class HomeController extends Controller
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
    public function index()
    {
        //current user name
        $username = \Auth::user()->name;

        //usuários cadastrados
        $alunos = DB::table('alunos')->get();
        $acompanhantes = DB::table('acompanhantes')->get();

        return view('home', [
                "nome" => $username,
                "alunos" => $alunos,
                "acompanhantes" => $acompanhantes
        ]);
    }
}
