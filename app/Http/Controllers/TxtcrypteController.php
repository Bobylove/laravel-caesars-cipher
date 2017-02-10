<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Txtcrypte;

class TxtcrypteController extends Controller
{
    public function ajoutMessage(Request $request){
		$message = new Txtcrypte();
		$message->id = $request->id;
		$message->author = $request->author;
		$message->message = $request->message;
		$message->save();
		return back();
	}

	public function getShow(){
		$messages = Txtcrypte::all();
		return view('show.show', ['message'=>$messages]);
	}
}
