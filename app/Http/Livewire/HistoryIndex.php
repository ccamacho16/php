<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $pagination = 10;
    public $date;

    public function __construct()
    {
        $this->date = date('Y-m-d');
    }

    protected $queryString=[
        'search' => ['except' => ''],
        'pagination' => ['except' => 10]
    ]; 
    /*
    Al establecer estos valores en la propiedad $queryString, Livewire automáticamente manejará los parámetros
    de consulta en la URL y los actualizará en consecuencia al realizar acciones dentro del componente, como 
    cambiar el número de elementos por página o realizar una búsqueda.
    */

    public $sortColumnName = 'id';
    public $sortDirection = 'desc';

    public function render()
    {
        $histories = $this->querytable();
        $histories = $histories->paginate($this->pagination);

        if ($histories->currentPage() > $histories->lastPage()){
            $this->resetPage();
            $histories = $this->querytable();
            $histories = $histories->paginate($this->pagination);
        }

        $params = [
            'histories' => $histories,
        ];
        return view('livewire.history-index', $params);
             
    }

    public function sortBy($columnName){
        
        $this->sortDirection = $this->swapSortDirection();

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection(){
        return $this->sortDirection == 'asc' ? 'desc' : 'asc'; 
    }

    private function querytable(){
        $userid = Auth::id();
        $query = History::where('user_id',$userid)->whereDate('date', $this->date)->orderBy($this->sortColumnName, $this->sortDirection); 
        if ($this->search != ''){
            $query->where('name','LIKE','%'.$this->search.'%')
                  ->orwhere('description','LIKE','%'.$this->search.'%')
                  ->orwhere('locker','LIKE','%'.$this->search.'%')
                  ->whereDate('date', $this->date)
                  ->where('user_id',$userid)
                  ->orderBy($this->sortColumnName,$this->sortDirection);
        } 
        return $query;
    }    
}
