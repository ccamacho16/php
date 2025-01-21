<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class BranchIndex extends Component
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
        $branches = $this->querytable();
        $branches = $branches->paginate($this->pagination);

        if ($branches->currentPage() > $branches->lastPage()){
            $this->resetPage();
            $branches = $this->querytable();
            $branches = $branches->paginate($this->pagination);
        }

        $params = [
            'branches' => $branches,
        ];
        return view('livewire.branch-index', $params);

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

         $query = Branch::orderBy($this->sortColumnName, $this->sortDirection); 
        if ($this->search != ''){
            $query->where('name','LIKE','%'.$this->search.'%')
                  ->orwhere('code','LIKE','%'.$this->search.'%')
                  ->orderBy($this->sortColumnName,$this->sortDirection);
        }
        return $query;

    }        

}
