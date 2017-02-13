<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Txtcrypte;

class TxtcrypteController extends Controller
{
	public function ajoutMessage(Request $request){
		
		$décalage = $request->decalage;
		$arr = str_split($request->message,1);
		$arr2 = range('a','z');
		$chiffre = "";


		foreach ($arr as $value) {

			$val = $value;
			$val3 = array_search($val,$arr2);
			$pos = ($val3 +$décalage) %25;
			$val = $arr2[$pos];
			$chiffre .= $val;

		}

		$message = new Txtcrypte();
		$message->author = $request->author;
		$message->message = $chiffre;
		$message->decalage = $request->decalage;
		

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

	public function getDelete($id){
		$messages = Txtcrypte::find($id);
		$messages->delete();
		return back();
	}
}
