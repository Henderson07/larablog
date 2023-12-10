<div>
    <div wire:ignore-self class="modal modal-blur fade" id="categories_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST"
                @if ($updateCategoryMode) wire:submit.prevent='updateCategory()'
                @else
                    wire:submit.prevent='addCategory()' @endif>
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateCategoryMode ? 'Alterar Categoria' : 'Adicionar Categoria' }}</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateCategoryMode)
                        <input type="hidden" wire:model='selected_category_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" class="form-control" name="name_category"
                            placeholder="Insira o nome da categoria" wire:model='category_name'>
                        <span class="text-danger">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit"
                        class="btn btn-primary">{{ $updateCategoryMode ? 'Alterar' : 'Salvar' }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal modal-blur fade" id="subcategoria_modal" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Subcategoria</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Categoria principal</div>
                        <select class="form-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome da Subcategoria</label>
                        <input type="text" class="form-control" name="name_category"
                            placeholder="Insira o nome da subcategoria">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
