<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $pagination = 10;
    protected $queryString=[
        'search' => ['except' => ''],
        'pagination' => ['except' => 10]
    ];

    public $sortColumnName = 'id';
    public $sortDirection = 'desc';


    public function render()
    {
        $products = $this->querytable();
        $products = $products->paginate($this->pagination);

        if ($products->currentPage() > $products->lastPage()){
            $this->resetPage();
            $products = $this->querytable();
            $products = $products->paginate($this->pagination);
        }

        $params = [
            'products' => $products,
        ];
        return view('livewire.product-index', $params);
             
    }

    public function sortBy($columnName){
        
        $this->sortDirection = $this->swapSortDirection();

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection == 'asc' ? 'desc' : 'asc'; 
    }

    private function querytable(){
         $query = Product::join('categories','products.category_id','=','categories.id')->select('products.*','categories.name as categoryname')->orderBy($this->sortColumnName, $this->sortDirection);
        if ($this->search != ''){
            $query->where('code','LIKE','%'.$this->search.'%')
                  ->orwhere('products.name','LIKE','%'.$this->search.'%')
                  ->orwhere('tradename','LIKE','%'.$this->search.'%')
                  ->orwhere('categories.name','LIKE','%'.$this->search.'%')
                  ->orderBy($this->sortColumnName,$this->sortDirection);
         
        }
        return $query;
    }

}
