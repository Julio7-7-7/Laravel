@extends('layouts.app')

@section('content')

  <h2>Restar dos números</h2>

  <form action="/resta" method="POST">
    @csrf
    <label for="num1">Numero 1</label>
    <input type="number" name="num1" id="num1" required>
    <br>
    <label for="num2">Numero 2</label>
    <input type="number" name="num2" id="num2" required>  
    <br>
    <button type="submit">Restar</button> 
    <br>
    
    @if(isset($res))
      <h3>Resultado: {{ $res }}</h3>
    @endif
@endsection
