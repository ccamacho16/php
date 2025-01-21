<?php

namespace App\View\Components;


use Illuminate\View\Component;
use App\Models\Category;

class xCategoryFormBody extends Component
{
    private $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($category = null)
    {
        if (is_null($category)){
            $category = Category::make([
                'status' => '1'
            ]);
        }

        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'category' => $this->category,
            'isnew' => !empty($this->category->name),  /*atributo para validar si es Create o Edit  */
            'status' => Category::STATUS
        ];
        return view('components.x-category-form-body', $params);
    }
}
