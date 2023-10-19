@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Autores')
@section('content')
    @livewire('authors')
@endsection
@push('scripts')
    <script>
        $(window).on('hidden.bs.modal', function() {
            livewire.emit('resetForms');
        });

        window.addEventListener('hide_add_author_modal', function(event) {
            $('#add_author_modal').modal('hide');
        });

        window.addEventListener('showEditAuthorModal', function(event) {
            $('#edit_author_modal').modal('show');
        });

        window.addEventListener('closeUpdateAuthorModal', function(event){
            $('#edit_author_modal').modal('hide');
        });
    </script>
@endpush
