<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarUser;
use App\Models\Mycart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MycartController extends Controller
{

    public function add_item(Request $request)
    {
        $x=date("Y-m-d");
        Mycart::create(['user_id'=> $request->user_id ,
        'car_id'=> $request->car_id ,
        'reserved'=> $x,
        'pickup' => $request->pickup,
        'return' => $request->return]);
        return redirect()->route('car.random')->with('message', 'item has been added successfully!');
    }
    public function mycart()
    {
        $items= Mycart::get();
        return view('mycart',compact('items'));
    }
    public function destroy($id)
    {
        Mycart::find($id)->delete();
        return back();
    }
    public function checkout()
    {
        $total=0;
        $items= Mycart::get();
        $time = 5;
        foreach ($items as $item)
        {
            if ($item->user_id == Auth::user()->id){
                $car_id=$item->car->car_id;
                $car =Car::find($car_id);
                $total+=$car->price * $item->quantity;
                CarUser::create(['user_id' => Auth::user()->id,'car_id'=>$car_id,'quantity'=>$item->quantity,'price'=>$car->price * $item->quantity]);
                Mycart::find($item->id)->delete();
            }
        }

        return redirect()->route('random')->with('message', 'Order has been made successfully!');

    }
}
