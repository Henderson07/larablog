@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Autores')
@section('content')
    @livewire('authors')
@endsection
