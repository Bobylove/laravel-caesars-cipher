@extends('welcome')

@section('content')

<h1>show message non codé</h1>
<br>
<br>
<br>
@foreach($message as $value)
<h3>message : {{$value->id}}  :  {{$value->message}} </h3>
@endforeach

@stop