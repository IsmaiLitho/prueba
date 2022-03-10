<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Session;
use DataTables;

class clientesController extends Controller
{
    public function index(){
        return view('clientes.index');
    }
	
	public function getClientes(){
    	$cliente = cliente::all();
        
        return DataTables::of($cliente)->toJson();;
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $r){
		$idcli = $r->idcli;    	
		$nombre = $r->nombre; 
		$genero = $r->genero; 
		$fecha_nac = $r->fecha_nac; 

		//return $r;
		$clientes = cliente::create($r->all());
		
        Session::flash('m',"cliente $r->nombre registrado correctamente");

		return redirect('/Clientes');

    }

    public function edit($idcli){
    	$clientes = cliente::find($idcli);
        return view('clientes.edit', compact('clientes'));
    }

    public function update(Request $r){
    	$idcli = $r->idcli;    	
		$nombre = $r->nombre;
		$genero = $r->genero; 
		$fecha_nac = $r->fecha_nac;

		$ca = cliente::find($idcli);

		$ca->idcli = $r->idcli;    	
		$ca->nombre = $r->nombre;
		$ca->genero = $r->genero; 
		$ca->fecha_nac = $r->fecha_nac;
		$ca->save();

        Session::flash('m','cliente modificado correctamente');
		return redirect('/Clientes');
    }

    public function delete($idcli){
        $ca = cliente::find($idcli);
    	$ca->delete();

        Session::flash('m','cliente eliminado del sistema correctamente');
        
        return back();
    }
}
