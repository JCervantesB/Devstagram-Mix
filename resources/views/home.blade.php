@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    <x-listar-post :posts="$posts" />
    <x-listar-postRandom :postRandoms="$postRandoms" />
@endsection