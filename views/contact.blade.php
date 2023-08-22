@extends('layout.layout')

@section('title', 'Contact')

@section('content')
    @extends('components.home')
    @section('home')
    @section('welcome', 'New Details')
    @parent
@endsection