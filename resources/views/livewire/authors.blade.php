<div>
    <div class="page-header d-print-none mb-2">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Autores
                    </h2>
                    <div class="text-muted mt-1">1-18 of 413 autores</div>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" class="form-control d-inline-block w-9 me-3"
                            placeholder="Procurar pessoas…">
                        <a href="#" class="btn btn-primary" data-bs-target="#add_author_modal" data-bs-toggle="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Novo autor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @forelse ($authors as $author)
        <div class="row row-cards">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 rounded-circle"
                            style="background-image: url({{ asset($author->picture) }})"></span>
                        <h3 class="m-0 mb-1"><a href="#">{{ $author->name }}</a></h3>
                        <div class="text-muted">{{ $author->email }}</div>
                        <div class="mt-3">
                            <span class="badge bg-purple-lt">{{ $author->authorType->name }}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="#" class="card-btn">Editar</a>
                        <a href="#" class="card-btn">Excluir autor</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <span class="text-danger">Nenhum autor encontrado!</span>
    @endforelse
</div>

{{-- Modal --}}
@include('modals.modal_new_author')
{{-- /Modal --}}
