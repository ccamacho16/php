<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Client;
use App\Models\Master;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class xClientFormBody extends Component
{
    private $client;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($client = null)
    {
        if (is_null($client)){
            $client = Client::make([
                
                'birth_date' => Carbon::now(),
                'status' => '1'
            ]);
        }

        $this->client = $client;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'hola' => 'hola',
            'client' => $this->client,
            'isnew' => !empty($this->client->dni),  
            'sex' => Client::SEX,
            'jobs' => Master::where('entity','job')->get(),
            'status' => Client::STATUS 
        ];
        /* dd($params['sex']); */
        return view('components.x-client-form-body', $params); 
        /* return view('components.x-client-form-body', compact('params')); */
    }

/*
public function render()
    {
        $params = [
            'hola' => ''Hola'',
        ];
        return view('components.x-client-form-body', compact('params'));
    }
*/    
}
