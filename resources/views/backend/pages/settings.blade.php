@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Configuração geral')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status')['msg'] }}
        </div>
    @endif
    <div class="row-align items center">
        <div class="row">
            <h2 class="page-title">
                Configurações
            </h2>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                        role="tab">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                        role="tab">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                        role="tab">Activity</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                    <h4>Descrição teste</h4>
                    <div>
                        @livewire('author-general-settings')
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-profile-8" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Alterar logo</h4>
                            <div class="mb-2" style="max-width: 200px;">
                                <img id="imagemSelecionada" src="{{ \App\Models\GeneralSettings::find(1)->blog_logo }}" alt="Imagem Selecionada" class="img-thumbail">
                            </div>
                            @livewire('author-general-change-logo')
                        </div>
                        <div class="col-md-6">
                            <h3>Alterar icone blog</h3>
                            <div class="mb-2" style="max-width: 100px">
                                <img src="{{ \App\Model\GeneralSettings::find(1)->blog_favicon }}" alt="" class="img-thumbnail">
                            </div>
                            <form action="" id="changeBlogFaviconForm">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="blog_favicon" class="form-control">
                                </div>
                                <button class="btn btn-primary">Altera icone</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-activity-8" role="tabpanel">
                    <h4>Activity tab</h4>
                    <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris
                        accumsan nibh habitant senectus</div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputFile = document.getElementById('blog_logo');
        const changeBlogLogoForm = document.getElementById('changeBlogLogoForm');

        inputFile.addEventListener('change', (event) => {
            const imagemSelecionada = document.getElementById('imagemSelecionada');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagemSelecionada.src = e.target.result;
                    console.log('objeto', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                imagemSelecionada.src = '';
            }
        });

        changeBlogLogoForm.addEventListener('submit', function(event) {
            console.log('entrei submit');
        })
    })
</script>
