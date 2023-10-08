@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Autores')
@section('content')
    @livewire('authors')
@endsection
@push('scripts')
    <script>
        $(window).on('hidden.bs.modal', funtion() {
            Livewire.emit('resetForm');
        })
    </script>
@endpush
