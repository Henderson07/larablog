<div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar autor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="addAuthor()" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Insira um nome" wire:modal="name">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="example-text-input"
                            placeholder="Insira um e-mail" wire:model="email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuário</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Insira um usuário" wire:model="username">
                        <span class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tipo do autor</label>
                        <div class="">
                            <select name="" id="" class="form-select" wire:model="author_type">
                                <option value="">-- Nenhum item selecionado --</option>
                                @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('author_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">É editor direto?</div>
                        <div>
                            <label for="" class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="direct_publisher" value="0"
                                    wire:model="direct_publisher">
                                <span class="form-check-label">Não</span>
                            </label>
                            <label for="" class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="direct_publisher" value="1"
                                    wire:model="direct_publisher">
                                <span class="form-check-label">Sim</span>
                            </label>
                            <span class="text-danger">
                                @error('direct_publisher')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
