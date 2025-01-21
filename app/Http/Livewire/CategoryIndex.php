<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class CategoryIndex extends Component
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
        $categories = $this->querytable();
        $categories = $categories->paginate($this->pagination);

        if ($categories->currentPage() > $categories->lastPage()){
            $this->resetPage();
            $categories = $this->querytable();
            $categories = $categories->paginate($this->pagination);
        }

        $params = [
            'categories' => $categories,
        ];
        return view('livewire.category-index', $params);
             
    }

    public function sortBy($columnName){
        
        $this->sortDirection = $this->swapSortDirection();

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection == 'asc' ? 'desc' : 'asc'; 
    }

    private function querytable(){
         $query = Category::orderBy($this->sortColumnName, $this->sortDirection); 
        if ($this->search != ''){
            $query->where('name','LIKE','%'.$this->search.'%')
                  ->orderBy($this->sortColumnName,$this->sortDirection);
        }
        return $query;
    }
/*     public function render()

    {
        return view('livewire.category-index');
    } */
}
