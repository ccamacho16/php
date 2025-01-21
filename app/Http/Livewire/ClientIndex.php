<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;


class ClientIndex extends Component
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
        $clients = $this->querytable();
        $clients = $clients->paginate($this->pagination);

        if ($clients->currentPage() > $clients->lastPage()){
            $this->resetPage();
            $clients = $this->querytable();
            $clients = $clients->paginate($this->pagination);
        }

        $params = [
            'clients' => $clients,
        ];
        return view('livewire.client-index', $params);
             
    }

    public function sortBy($columnName){
        
        $this->sortDirection = $this->swapSortDirection();

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        /* if ($this->sortDirection == 'asc'){
            return 'desc';
        }else{
            return 'asc';
        } */
        return $this->sortDirection == 'asc' ? 'desc' : 'asc'; 
    }

    private function querytable(){
         $query = Client::orderBy($this->sortColumnName, $this->sortDirection); 
         /* $query = Client::query($this->sortColumnName);  */
         /* $query = Client::get(); */
        if ($this->search != ''){
            $query->where('name','LIKE','%'.$this->search.'%')
                  ->orwhere('last_name','LIKE','%'.$this->search.'%')
                  ->orwhere('dni','LIKE','%'.$this->search.'%')
                  ->orderBy($this->sortColumnName,$this->sortDirection);
        }
        return $query;
    }
}

