@extends('layout.layout')

@section('title', 'Details')

@section('content')
    @extends('components.home')
    @section('home')
    @section('welcome', 'Ultimate Room')
    @parent
@endsection