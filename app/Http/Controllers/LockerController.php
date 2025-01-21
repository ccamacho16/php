<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class LockerController extends Controller
{
    //protected $idUser;

/*     public function __construct()
    {
        $this->idUser = Auth::id();
    } */

    public function index()
    {
        $id = Auth::id();
        //dd($this->idUser);
        $lockers = Locker::where('user_id',$id)->orderBy('id')->get();
        
        return view('sgcc.locker.index', compact('lockers'));   
    }

    // No se lo esta utilizando.
    public function update(Request $request){

        $locker = Locker::find($request->idlocker); 

        if ($locker->name == $request->namelocker) {
            $d = [
                'name' => $request->namelocker,
                'description' => $request->descriptionlocker,
            ];
        }else{
            $time = null;
            if (strlen($request->namelocker)>0){
                $time = Carbon::now()->format('H:i:s');
            }
            $d = [
                'name' => $request->namelocker,
                'description' => $request->descriptionlocker,
                'time_access'=> $time
            ];
        }

        //$locker = Locker::find($request->idlocker);
        $locker->update($d);

        return redirect()->route('locker.index');
    }

    public function clear(){
        /* $lockers = Locker::all(); */
        $id = Auth::id();
        $lockers = Locker::where('user_id',$id)->get();
        foreach ($lockers as $locker) {
            $locker->name = null;
            $locker->description = null;
            $locker->time_access = null;
            $locker->save();
        }

        $time_current = Carbon::now()->format('H:i:s');
        History::where('user_id', $id)->whereNull('check_out')->update(['check_out'=>$time_current]);

        return redirect()->route('locker.index');
    }
    
    // crea los loockers que el usuario requiere.
    public function create(Request $request){
        $id = Auth::id();
        Locker::where('user_id',$id)->delete(); 

        $numlockers = $request->numLockers;

        for ($i=1; $i <= $numlockers ; $i++) { 
            $locker = new Locker();
            $locker->number = $i;
            $locker->user_id = $id;
            $locker->save();
        }
        return redirect()->route('locker.index');
    }

    public function statusLockers(){
        $id = Auth::id();
        $in_use = Locker::whereRaw('length(name) > 0 AND user_id = ?', $id)->count();
        $lockers = Locker::selectRaw('count(number) as total')->whereRaw('user_id = ?',$id)->value('total');
        $available = $lockers - $in_use;  

        $data = [
            'in_use' => $in_use,
            'lockers' => $lockers,
            'available' => $available 
        ];

        
        //return response()->json($data);
        return response($data);
    }

    public function saveLocker(Request $request){

        $xid = $request->input('idlocker');
        
        $xname = $request->input('namelocker');
        $xdescription = $request->input('descriptionlocker');
        

        $iduser = Auth::id();

        $locker = Locker::find($xid);

        $time = null;
        $date_current = date('Y-m-d');

        $hb =  History::where('locker',$locker->number)
                      ->where('user_id',$iduser)
                      ->whereDate('date', $date_current)
                      ->latest()
                      ->first();    

        if ($locker->name == $xname) {
            $d = [
                'description' => $xdescription,
            ];
            $time = $locker->time_access;

            if (isset($hb)){
                $hb->description = $xdescription;
                $hb->update();  
            }                
        }else{

            $time_current = Carbon::now()->format('H:i:s');

            if (isset($hb)){
                $hb->check_out = $time_current;
                $hb->update();  
            }    

            if (strlen($request->namelocker)>0){  // si es un nuevo nombre
                $time = $time_current;

                $hn = new History();
                $hn->date = $date_current;
                $hn->check_in = $time;
                $hn->check_out = null;
                $hn->locker = $locker->number;
                $hn->name = $xname;
                $hn->description = $xdescription;
                $hn->user_id = $iduser;
                $hn->save(); 
            }
            $d = [
                'name' => $xname,
                'description' => $xdescription,
                'time_access'=> $time
            ];
        } 

        $locker->update($d); 
        return response()->json(['message' => $time]);        

    }
}

