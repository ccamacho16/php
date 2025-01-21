<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;

class xProductFormBody extends Component
{
    private $product;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product = null)
    {
        if (is_null($product)){
            $product = Product::make([
                
                //'birth_date' => Carbon::now(),
                //'name' => '',
                'quantity_min' => '0',
                'quantity_max' => '0',
                'barcode' => '0',
                'status' => '1'
            ]);
        }

        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'product' => $this->product,
            'isnew' => !empty($this->product->code),  /*atributo para validar si es Create o Edit  */
            'categories' => Category::where('status',1)->get(),
            //'category_rel' => Category::find($this->product->category_id),

            'status' => product::STATUS 
            
        ];
        return view('components.x-product-form-body', $params);
    }
}
