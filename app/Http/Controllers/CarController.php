<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'plate_id' => ['required', 'string', 'max:255', 'unique:cars'],

         ]);
     }

    public function index()
    {
        $cars=Car::get();
        // dd($car);
        return view('cars.cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices=Office::get();
        return view('cars.create_car',compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $car = Car::create([
            'car_brand' => $request->brand,
            'car_model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'office_id' => $request->office_id,
            'plate_id' => $request->plate_id,
            'color' => $request->color,
        ]);

        $car
        ->addMediaFromRequest('image')
        ->toMediaCollection();
        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $offices= Office::get();
        return view('cars.update_car',compact('car','offices'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car= Car::find($id);
        $car->update([
            'car_brand' => $request->brand,
            'car_model' => $request->model,
            'plate_id' => $request->plate_id,
            'year' => $request->year,
            'price' => $request->price,
            'office_id' => $request->office_id,
            'color' => $request->color
        ]);
        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::find($id)->delete();
        return back();
    }

    public function search(Request $request)
    {
        $random=cars

        if($request->ajax()) {
            // @dd($request);
            $output = '';
            $cars = car::where('car_brand', 'LIKE', '%'.$request->searchs.'%')->get()->take(3);
                            if($cars) {
                                // @dd($cars);
                                foreach($cars as $car) {
                    $output .=
                     '
                     <form action="">
                    <button  class="list-group-item list-group-item-action btn btn-link" >
                    <img src="'. $car->getFirstMediaUrl() .'" alt="" height="120px" width="200px">
                    <span class="ps-5 h4">   '.$car->car_brand.' </span>
                    <span class="ps-5 h4">  '.$car->car_model .' </span>
                    </button>
                    </form>
                    <div class="pt-1"></div>
                  ';
        if(!$request->searchs){
            $output = '';
        }

                }

                return response()->json($output);

            }

        }

        return view('main');

    }

    public function advanced()
    {
        $brands=Car::select('car_brand')->distinct()->get();
        $models=Car::select('car_model')->distinct()->get();
        $offices=Office::get();
        return view('cars.advanced',compact('brands','models','offices'));
    }

    public function model(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $cars = car::where('car_brand', 'LIKE', '%'.$request->brands.'%')->get();
                            if($cars) {
                                $output .='<option value ="not null" > </option>';
                                foreach($cars as $car) {
                    $output .=
                     '
                     <option value=" '.$car->car_model.' " >  '.$car->car_model .'</option>

                  ';
                }

                return response()->json($output);

            }
        }



        return view('cars.advanced');

    }
}
