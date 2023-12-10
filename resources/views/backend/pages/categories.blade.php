@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Categorias')
@section('content')

    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Categorias
                </h2>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h4>
                            Categorias
                        </h4>
                        <li class="nav-items ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#categories_modal">
                                Adicionar categoria
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>N° Subcategoria</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nome</td>
                                    <td class="text-muted">
                                        4
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-sm btn-primary">Editar</a>
                                            <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h4>
                            Categorias
                        </h4>
                        <li class="nav-items ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#subcategoria_modal">
                                Adicionar Subcategoria
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição Subcategoria</th>
                                    <th>Categoria Principal</th>
                                    <th>N° Publicações</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nome</td>
                                    <td class="text-muted">
                                        Faça alguma coisa
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-sm btn-primary">Editar</a>
                                            <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('categories')
@endsection
