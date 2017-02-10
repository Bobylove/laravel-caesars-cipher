@extends('welcome')

@section('content')
<h1>Ajoute ton message crypté !</h1>


<br>
<br>
<form class="ui form" action="edit/edit/new" method="post">
{{csrf_field()}}
	<h5><label for="author">pseudo</label></h5>
	<input type="text" name="author" id="author">
	<br>
	<br>
	<h5><label for="message">message</label></h5>
	<input type="text" name="message" id="message">
	<br>
	<br>
	<input class="ui green button" type="submit" value="Enregistré">
</form>

@stop