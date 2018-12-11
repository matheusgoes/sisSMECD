<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Tonner;
use Datatables;
use View;
use PDF;
use DB;
use Validator;

class TonnerController extends Controller
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
    $tonners = DB::table('tonners')->get();

    return view('tonners.tonners', [
            "tonners" => $tonners
    ]);
  }

  public function load(){
      return datatables()->of(DB::table('tonners')->orderBy('id'))->toJson();
  }

  public function cadastrar()
  {
      return view('tonners.adicionar_tonner');
  }

  public function save_submit(Request $request)
  {

      $tonner = new Tonner;
      $tonner::create([
          'modelo'         =>  $request->input('modelo'),
          'escola'   =>  $request->input('escola'),
          'quantidade'      =>  $request->input('quantidade'),
      ]);

      return redirect('/tonners/cadastrar');
  }

  public function delete($id){
    DB::table('tonners')->where('id',$id)->delete();
    return redirect('/tonners');
  }

  public function editar($id)
  {
    $tonners = DB::table('tonners')->where('id', $id)->get();
    return view('tonners.editar_tonner', [
                  "tonner" => $tonners[0]
   ]);
  }

  public function edit_submit(Request $request, $id)
  {
      DB::table('tonners')
            ->where('id', $id)
            ->update([
              'modelo'         =>  $request->input('modelo'),
              'escola'   =>  $request->input('escola'),
              'quantidade'      =>  $request->input('quantidade'),
            ]);
      return redirect('/tonners');
  }

  public function generatePDF(){
      $tonners = DB::table('tonners')->get();

      $pdf = PDF::loadView('pdf.pdf',  [
              "tonners" => $tonners
      ]);
      return $pdf->download('tonners.pdf');
  }

  public function generatePDF2(Request $request, $ids){
       $id_array = explode("-", $ids);
       $tonners = DB::table('tonners')->whereIn('id', $id_array)->get();

       $pdf = PDF::loadView('pdf.pdf',  [
               "tonners" => $tonners
       ]);
       return $pdf->download('tonners.pdf');
  }
}
