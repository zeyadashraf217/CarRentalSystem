<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarUser;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     protected function updatevalidator(array $data,$id)
     {
        $car=car::find($id);
         return Validator::make($data, [
            'plate_id' => ['required', 'string', 'max:255',\Illuminate\Validation\Rule::unique('cars')->ignore($car->car_id,'car_id')],
         ]);
     }

    public function index()
    {
        $cars=Car::get();
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
            'status' => $request->state
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
        $this->updatevalidator($request->all(),$id)->validate();
        $car= Car::find($id);
        $car->update([
            'car_brand' => $request->brand,
            'car_model' => $request->model,
            'plate_id' => $request->plate_id,
            'year' => $request->year,
            'price' => $request->price,
            'office_id' => $request->office_id,
            'color' => $request->color,
            'status' => $request->state
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
            $cars = car::where('car_brand', 'LIKE', '%'.$request->searchs.'%')->where('status','active')->get();
                            if($cars) {
                    $output.='<div class="list-group overflow-auto" id="lists" style="height: 200px">';
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
                }
                $output.='</div>';
            }
                if(!$request->searchs || sizeof($cars)==0){
                    $output = '';
                }
                return response()->json($output);


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
            if (Auth::user()->type=='admin')
            {
                $x9='%';
            }
            else {
                $x9='active';
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
                        ->where('status','like',$x9)
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
                                    <th>Rent</th>
                                </tr>
                            </thead>
                            <tbody>';
                            if($cars) {
                                foreach($cars as $car) {
                    $output .=

                    '<tr>

                                        <td> '.$car->car_id.' </td>
                                        <td>  '.$car->car_brand.'  </td>
                                        <td> '.$car->car_model.' </td>
                                        <td> '.$car->year .'</td>
                                        <td>'.$car->price .'</td>
                                        <td> '.$car->office->city .'</td>
                                        <td><img src="'.$car->getFirstMediaUrl().'" alt="" height="110px"
                                                width="200px"></td>
                                        <td class="pt-5">
                                        <form action="'. route("car.show",$car->car_id) .' class="pt-2">
                                        <button class="btn btn-danger">Rent Now</button>
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



    public function reservation (Request $request){
        $Reservations=CarUser::where('car_id',$request->car_id)->get();
        $CurrentDate=date("Y-m-d");
        if($request->ajax()) {
            $flag1=0;
            $flag2=0;
            $output = '';
            $pickup=$request->pickups;
            $return =$request->returns;
            if ($pickup && $return){

                if(strtotime($CurrentDate) > strtotime($pickup) || strtotime($CurrentDate) >strtotime($return) || strtotime($return) < strtotime($pickup) || strtotime($pickup) == strtotime($return) )
                {
                    $flag1=1;
                    $output .= '<img src="https://i.kym-cdn.com/entries/icons/original/000/018/489/nick-young-confused-face-300x256-nqlyaa.jpg" height="250px" width="250px">';

                }

                foreach($Reservations as $rent)
                {
                    if ((((strtotime($pickup) >= strtotime($rent->pickup)) && (strtotime($pickup) < strtotime($rent->return)))
                         || ((strtotime($return) >= strtotime($rent->pickup))) && (strtotime($pickup) < strtotime($rent->return)))
                         && $flag1==0)
                    {
                        $output .= '<h3 class="text-danger" >This Car is already rented between '.$rent->pickup.' and '.$rent->return.'</h3>' ;
                        $flag2=1;
                        break;
                    };
                }
                if ($flag1==0 && $flag2==0)
                {

                        $output .= ' <button type="submit" class="btn btn-labeled btn-success">
                        <span class="btn-label pe-3"><i class="fa-solid fa-cart-shopping"></i></span>Add to my Cart
                    </button>' ;

                }
            }

            return response()->json($output);
        }

        return redirect()->route('car.random');
    }

    public function ReservationSearch (Request $request){
        $Reservations=CarUser::where('reserved',$request->reservations)->get();
        if($request->ajax()) {
            $output = '';

            $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Price</th>
                        <th>office</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>';

                if($Reservations ) {
                    foreach($Reservations as $reserve) {
        $output .=

        '<tr>
                            <td> '.$reserve->car_id.' </td>
                            <td>  '.$reserve->car->car_brand.'  </td>
                            <td> '.$reserve->car->car_model.' </td>
                            <td> '.$reserve->user->id.' </td>
                            <td> '.$reserve->user->name.' </td>
                            <td> '.$reserve->car->price.' </td>
                            <td> '.$reserve->car->office->city.' </td>
                            <td> '.$reserve->pickup.' </td>
                            <td> '.$reserve->return.' </td>
                            <td><img src="'.$reserve->car->getFirstMediaUrl().'" alt="" height="110px"
                            width="200px"></td>
         </tr>
      ';
    }
    $output .= '
    </tbody>
    </table>
</div>';

            }

            return response()->json($output);
        }

        return redirect()->route('reservation.search');
    }


    public function IntervalSearch (Request $request){
        $Reservations=CarUser::get();
        if($request->ajax()) {
            $output = '';
            if($request->starts && $request->ends)
            {
            $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Price</th>
                        <th>office</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>';
                if($Reservations) {
                    foreach($Reservations as $reserve) {
                        if ((strtotime($reserve->pickup) >= strtotime($request->starts)) && (strtotime($reserve->return) <= strtotime($request->ends)) )
        $output .=

        '<tr>
                            <td> '.$reserve->car_id.' </td>
                            <td>  '.$reserve->car->car_brand.'  </td>
                            <td> '.$reserve->car->car_model.' </td>
                            <td> '.$reserve->user->id.' </td>
                            <td> '.$reserve->user->name.' </td>
                            <td> '.$reserve->car->price.' </td>
                            <td> '.$reserve->car->office->city.' </td>
                            <td> '.$reserve->pickup.' </td>
                            <td> '.$reserve->return.' </td>
                            <td><img src="'.$reserve->car->getFirstMediaUrl().'" alt="" height="110px"
                            width="200px"></td>
         </tr>
      ';
    }
    $output .= '
    </tbody>
    </table>
</div>';
}

            }

            return response()->json($output);
        }

        return redirect()->route('interval.search');
    }


    public function platesearch (){
        $cars=Car::get();
        return view('report.reservation2',compact('cars'));
    }



    public function IntervalSearch2 (Request $request){
        $car=Car::where('plate_id',$request->plates)->get()->last();
        $Reservations=CarUser::where('car_id',$car->car_id)->get();
        if($request->ajax()) {
            $output = '';
            if($request->starts && $request->ends && $request->plates)
            {
            $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Price</th>
                        <th>office</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>';
                if($Reservations) {
                    foreach($Reservations as $reserve) {
                        if ((strtotime($reserve->pickup) >= strtotime($request->starts)) && (strtotime($reserve->return) <= strtotime($request->ends)) )
        $output .=

        '<tr>
                            <td> '.$reserve->car_id.' </td>
                            <td>  '.$reserve->car->car_brand.'  </td>
                            <td> '.$reserve->car->car_model.' </td>
                            <td> '.$reserve->user->id.' </td>
                            <td> '.$reserve->user->name.' </td>
                            <td> '.$reserve->car->price.' </td>
                            <td> '.$reserve->car->office->city.' </td>
                            <td> '.$reserve->pickup.' </td>
                            <td> '.$reserve->return.' </td>
                            <td><img src="'.$reserve->car->getFirstMediaUrl().'" alt="" height="110px"
                            width="200px"></td>
         </tr>
      ';
    }
    $output .= '
    </tbody>
    </table>
</div>';
}

            }

            return response()->json($output);
        }

        return redirect()->route('interval.search2');
    }

    public function status (Request $request){
        $date =$request->dates;
        $cars=Car::get();
        $reservation=CarUser::get();
        // $Reservations=CarUser::where('pickup','<', $date)
        //                        ->where('return','>',$date )
        //                        ->get();
        // $Reservations2=CarUser::Car()-> where('car_id',$Reservations->car->car_id )->get();
        // $Reservations2=Car::get();
        if($request->ajax()) {
            $output = '';


            $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Car ID</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Office</th>
                        <th>Status</th>
                        <th>Rented</th>
                        <th>Img</th>

                    </tr>
                </thead>
                <tbody>';
                if($cars) {
                    foreach($cars as $car) {
                        $flag='no';
                        foreach ($reservation as $reserve){
                            if ($reserve->car_id == $car->car_id ){
                                if($reserve->pickup <= $date && $reserve->return >= $date){
                                        $flag='yes';
                                }
                            }
                        }

        $output .=

        '<tr>
                            <td> '.$car->car_id.' </td>
                            <td>  '.$car->car_brand.'  </td>
                            <td> '.$car->car_model.' </td>
                            <td> '.$car->office->city.' </td>
                            <td> '.$car->status.' </td>
                            <td>'. $flag.' </td>
                            <td><img src="'.$car->getFirstMediaUrl().'" alt="" height="110px"
                            width="200px"></td>


         </tr>';
    }
    $output .= '
    </tbody>
    </table>
</div>';

            }
            return response()->json($output);
        }

        return redirect()->route('report.status');
    }


    public function daily (Request $request){
        $Reservations=CarUser::get();


        if($request->ajax()) {
            $output = '';
            $start=strtotime($request->starts);
            if($request->starts && $request->ends)
            {
            $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                <th>Day</th>
                <th>Count</th>
                </thead>
                <tbody>';
                while($start <= strtotime($request->ends)){
                    $count=0;
                    foreach($Reservations as $reserve) {
                        if ( (strtotime($reserve->pickup) <= $start ) && (strtotime($reserve->return) >= $start ) ){
                        $count+=$reserve->car->price;
                    }
                }
                        $output .=
                        '<tr>
                        <td> '.date('d/m/Y', $start).'</td>
                       <td>  '.$count.'  </td>
                         </tr>';
 $start+=86400;
 }
    $output .= '
    </tbody>
    </table>
</div>';
}
return response()->json($output);
        }

        return redirect()->route('daily');
    }

}
