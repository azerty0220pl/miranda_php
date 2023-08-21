@extends('layout.layout')

@section('title', 'Details')

@section('content')
    @extends('layout.home')
    @section('home')
    @section('welcome', 'Ultimate Room')
    @parent
@endsection