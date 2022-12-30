<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'phonenumber' => ['required','string','unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],

         ]);
    }
    protected function UpdateValidator(array $data,$id)
    {
        $user=User::find($id);
        return Validator::make($data, [
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phonenumber' => 'required|unique:users,phonenumber,'.$user->id,

        ]);
   }

    public function index()
    {
        $users=User::get();
        return view('user.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create_user');
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
        user::create(['name' => $request->name , 'email' => $request->email,'phonenumber' => $request->phonenumber , 'password' =>md5($request->password)]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Myaccount',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= user::find($id);
        return view('user.update_user',compact('user'));
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
        $this->UpdateValidator($request->all(),$id)->validate();
        $user= user::find($id);
        $user->update(['name' => $request->name , 'email' => $request->email,'phonenumber' => $request->phonenumber , 'password' =>md5($request->password)]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::find($id)->delete();
        return back();
    }




    public function useradvanced()
    {
        $names=User::select('name')->distinct()->get();
        $users=User::get();
        return view('User.advanced_user',compact('names','users'));
    }

    public function change(Request $request)
    {
        if($request->ajax()) {
            $output = '';
            $x1='%';
            $x2='%';
            $x3='%';
            if ($request->names != "true") {
                $x1=$request->names;
            }
            if ($request->emails != "true") {
                $x2= $request->emails;
            }
            if ($request->phones != "true") {
                $x3=$request->phones;
            }

            $users = User::where('name' ,'like', $x1)
                        ->where('email','like',$x2)
                        ->where('phonenumber','like' ,$x3)
                        ->get();
                        $output .= ' <div class="card-body table-responsive p-0" style="height: 550px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>type</th>
                                </tr>
                            </thead>
                            <tbody>';
                            if($users) {
                                foreach($users as $user) {
                    $output .=

                    '<tr>

                    <td>  '.$user->name.'  </td>
                    <td> '.$user->email.' </td>
                    <td> '.$user->phonenumber.' </td>
                                        <td> '.$user->type.' </td>
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



        return view('user.advanced_user');

    }
}
