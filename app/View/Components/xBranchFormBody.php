<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Master;

class xBranchFormBody extends Component
{
    private $branch;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branch = null)
    {
        if (is_null($branch)){
            $branch = Branch::make([
                'status' => '1'
            ]);
        }

        $this->branch = $branch;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //$categories = Category::get();
        $params = [
            'branch' => $this->branch,
            'isnew' => !empty($this->branch->name),  /*atributo para validar si es Create o Edit  */
            'citys' => Master::where('entity','city')->get(),
            'countrys' => Master::where('entity','country')->get(),            
            'status' => Branch::STATUS
        ];
        return view('components.x-branch-form-body', $params);
    }
}
