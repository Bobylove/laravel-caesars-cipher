<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Txtcrypte;

class TxtcrypteController extends Controller
{
	public function ajoutMessage(Request $request){
		$message = new Txtcrypte();
		$message->author = $request->author;
		$message->message = $request->message;
		$message->save();
		return back();
	}

	public function getShow(){
		$messages = Txtcrypte::all();
		return view('show.show', ['message'=>$messages]);
	}
	public function getCrypte(){
		$messages = Txtcrypte::all();
		$Clef = 0;
		return view('crypte.crypte', ['message'=>$messages, 'Clef'=>$Clef]);

	}
	public function decalage(Request $request){
		$messages = Txtcrypte::all();
		$Clef = $request->decalage;
		return view('crypte.crypte',['Clef'=>$Clef ,'message'=>$messages]);
	}
}
