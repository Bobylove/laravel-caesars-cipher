@extends('welcome')

@section('content')

<h1>show message non codé</h1>
<br>
<br>
<br>
@foreach($message as $value)

<h3>message : {{$value->id}}  :  {{$value->message}} </h3>
<form action="/{{$value->id}}" method="post">
{{csrf_field()}}
	<input class="ui red button" type="submit" value="Delete">
</form>
@endforeach

@stop