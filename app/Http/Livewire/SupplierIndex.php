<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierIndex extends Component
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
        $suppliers = $this->querytable();
        $suppliers = $suppliers->paginate($this->pagination);

        if ($suppliers->currentPage() > $suppliers->lastPage()){
            $this->resetPage();
            $suppliers = $this->querytable();
            $suppliers = $suppliers->paginate($this->pagination);
        }

        $params = [
            'suppliers' => $suppliers,
        ];
        return view('livewire.supplier-index', $params);

        //return view('livewire.supplier-index');
    }

    public function sortBy($columnName){
        
        $this->sortDirection = $this->swapSortDirection();

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){

        return $this->sortDirection == 'asc' ? 'desc' : 'asc'; 

    }

    private function querytable(){

         $query = Supplier::orderBy($this->sortColumnName, $this->sortDirection); 
        if ($this->search != ''){
            $query->where('name','LIKE','%'.$this->search.'%')
                  ->orwhere('contact','LIKE','%'.$this->search.'%')
                  ->orwhere('tin','LIKE','%'.$this->search.'%')
                  ->orderBy($this->sortColumnName,$this->sortDirection);
        }
        return $query;

    }    
}
