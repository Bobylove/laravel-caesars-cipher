@extends('welcome')

@section('content')


<h1>message codé</h1>
<br>
<br>

<form  class="ui form" action="/crypte" method="post">
	{{csrf_field()}}
	<label for="decalage">decalage cryptage</label>
	<input type="text" name="decalage" id="decalage" value="">
	<input type="submit" value="modif decalage" class="ui orange button">
</form>
@foreach($message as $value)

<?php

$Msg = $value->message;
$Charset = 'abcdefghijklmnopqrstuvwxyz';
$CharsetLen = strlen($Charset); 
$MsgLen = strlen($value->message);
// $Clef = $_POST['decalage'];
$Action = True;
for ( $i=0; $i<$MsgLen; $i++ )
{
	if ( ($Pos = strpos($Charset, $Msg[$i])) !== FALSE )
	{
		if ( $Action === true )
		{
			if ( ($Result = $Pos + $Clef) > $CharsetLen )
				$Result = $Result - $CharsetLen;
			if ( ($Result = $Pos - $Clef) < 0 )
				$Result = $CharsetLen - ($Result * (-1));
			$Msg[$i] = $Charset[$Result]; 
			if (($Result = $Pos - $Clef) > 26) {
				$Result = $CharsetLen - ($Result % (26));
				$Msg[$i] = $Charset[$Result];
			}	
		}	
		
	}	

}

?>
<h6>{{$value->message}}</h6>
<h3>message : {{$value->id}}  :  {{$Msg}} </h3>

@endforeach
@stop