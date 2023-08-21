@extends('layout.layout')

@section('title', 'Contact')

@section('content')
    @extends('layout.home')
    @section('home')
    @section('welcome', 'New Details')
    @parent
@endsection