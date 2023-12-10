<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;
    public function render()
    {
        return view('livewire.categories');
    }
}
