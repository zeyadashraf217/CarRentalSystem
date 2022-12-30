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
        $car=Car::find($request->car_id);
        $price = $car->price;
        $x=date("Y-m-d");
        $pickup= $request->pickups;
        $return= $request->returns;
        $days = strtotime($return) - strtotime($pickup);
        $days = $days/86400;
        $payment= $days * $price;
        Mycart::create(['user_id'=> $request->user_id,
        'car_id'=> $request->car_id,
        'reserved'=> $x,
        'pickup' => $request->pickups,
        'return' => $request->returns,
        'payment' => $payment]);
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
        $items= Mycart::get();
        foreach ($items as $item)
        {
            if ($item->user_id == Auth::user()->id){
                $car_id=$item->car->car_id;
                $car =Car::find($car_id);
                $price=$car->price;
                $reserved=$item->reserved;
                $pickup=$item->pickup;
                $return=$item->return;
                $days = strtotime($return) - strtotime($pickup);
                $days = $days/86400;
                $payment= $days * $price;
                CarUser::create(['user_id' => Auth::user()->id,
                'car_id'=>$car_id,
                'reserved'=>$reserved,
                'pickup'=>$pickup,
                'return'=>$return,
                'payment'=>$payment
            ]);
                Mycart::find($item->id)->delete();
            }
        }

        return redirect()->route('car.random')->with('message', 'Order has been made successfully!');

    }
}
