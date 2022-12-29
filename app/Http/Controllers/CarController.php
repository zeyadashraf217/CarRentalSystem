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
        return view('cars.details',compact('car'));
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

        if($request->ajax()) {
            $output = '';
            $cars = car::where('car_brand', 'LIKE', '%'.$request->searchs.'%')->get()->take(3);
                            if($cars) {
                                foreach($cars as $car) {
                    $output .=
                     '
                     <form action="'. route("car.show",$car->car_id) .'">
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

        return redirect()->route('car.random');

    }

    public function advanced()
    {
        $brands=Car::select('car_brand')->distinct()->get();
        $models=Car::select('car_model')->distinct()->get();
        $colors=Car::select('color')->distinct()->get();
        $prices=Car::select('price')->distinct()->get();
        $min_year=Car::min('year');
        $max_year=Car::max('year');
        $min_price=Car::min('price');
        $max_price=Car::max('price');
        $offices=Office::get();
        return view('cars.advanced',compact('brands','models','offices','colors','prices','min_year','max_year','min_price','max_price'));
    }

    public function model(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $cars = car::where('car_brand', 'LIKE', '%'.$request->brands.'%')->select('car_model')->distinct()->get();
                            if($cars) {
                                $output .='<option value ="true" > </option>';
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
    public function change(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $x1='%';
            $x2='%';
            $x3='%';
            $x6='%';
            if ($request->offices != "true") {
                $x1=$request->offices;
            }
            if ($request->brands != "true") {
                $x2= $request->brands;
            }
            if ($request->models != "true") {
                $x3=$request->models;
            }
            if ($request->colors != "true") {
                $x6=$request->colors;
            }
            $x4=$request->min_years;
            $x5=$request->max_years;
            $x7=$request->min_prices;
            $x8=$request->max_prices;

            $cars = car::where('office_id' ,'like', $x1)
                        ->where('car_brand','like',$x2)
                        ->where('car_model','like' ,$x3)
                        ->where('color','like' ,$x6)
                        ->whereBetween('year',[$x4,$x5])
                        ->whereBetween('price',[$x7,$x8])
                        ->get();
                        $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Price</th>
                                    <th>office</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>';
                            if($cars) {
                                foreach($cars as $car) {
                    $output .=
                     '
                                 <tr>
                                     <td> '.$car->car_id.' </td>
                                     <td>  '.$car->car_brand.'  </td>
                                     <td> '.$car->car_model.' </td>
                                     <td> '.$car->year .'</td>
                                     <td>'.$car->price .'</td>
                                     <td> '.$car->office->city .'</td>
                                     <td><img src="'.$car->getFirstMediaUrl().'" alt="" height="110px"
                                             width="200px"></td>
                                     <td>
                                     </td>
                                 </tr>
                  ';
                }
                $output .= '
                </tbody>
                </table>
            </div>';

                return response()->json($output);

            }
        }



        return view('cars.advanced');

    }
    public function random (){
        $random_products = Car::inRandomOrder()->get()->take(5);
        return view('main',compact('random_products'));
    }
}
