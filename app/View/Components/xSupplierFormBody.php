<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Supplier;
use App\Models\Master;


class xSupplierFormBody extends Component
{
    private $supplier;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($supplier = null)
    {
        if (is_null($supplier)){
            $supplier = Supplier::make([
                
                //'birth_date' => Carbon::now(),
                'status' => '1'
            ]);
        }

        $this->supplier = $supplier;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'supplier' => $this->supplier,
            'isnew' => !empty($this->supplier->tin),  /*atributo para validar si es Create o Edit  */
            'citys' => Master::where('entity','city')->get(),
            'status' => Supplier::STATUS
        ];
        return view('components.x-supplier-form-body', $params);

    }
}
