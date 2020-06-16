<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\State;
use App\City;
use Validator;
use DataTables;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function validator(array $data, Request $request) {
        if ($request->method() == "POST") {
            return Validator::make($data, [
                        'name' => 'required|string|max:255',
                        'email' => 'email',
                        'password' => 'required|string|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
                        'country' => 'required|string|max:50',
                        'gender' => 'required|string|max:50',
                        'address' => 'required|string|max:255',
                        'hobbies' => 'required'
                            ], [
                        'password.regex' => 'Your Password must be a combination of alphanumeric characters',
                        'mobile_no.regex' => 'Mobile number should be 10 digit number',
                        'hobbies.regex' => 'Please select the hobbies'
            ]);
        } else {
            return Validator::make($data, [
                        'name' => 'required|string|max:255',
                        'email' => 'email',
                        //'password' => 'required|string|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
                        'country' => 'required|string|max:50',
                        'gender' => 'required|string|max:50',
                        'address' => 'required|string|max:255',
                        'hobbies' => 'required|string|max:50'
                            ], [
                        'password.regex' => 'Your Password must be a combination of alphanumeric characters',
                        'mobile_no.regex' => 'Mobile number should be 10 digit number',
            ]);
        }
    }

    public function deleterecord($token) {
        $id = substr($token, 32);
        User::where('id', $id)->delete();
        return redirect('/userList1');
    }

    public function updaterecord(Request $request, $token) {
        $id = substr($token, 32);
        $user = User::find($id);
        $user->name = $request->get('name');
//         $date=  $request->get('date');
//        dump(date('Y-m-d', strtotime($request->get('date'))));
        $user->date = date('Y-m-d', strtotime($request->get('date')));
//        dd($user->date);
        $user->email = $request->get('email');
        if ($request->get('password') != "") {
            $user->password = bcrypt($request->get('password'));
        }
        $user->country = $request->get('country');
        $user->state = $request->get('state');
        $user->city = $request->get('city');
        $user->gender = $request->get('gender');
        $user->hobbies = $request->get('hobbies');
        $user->address = $request->get('address');
        $user->save();
        return redirect('/userList1');
    }

    public function addUserForm() {
        $countries = Country::all();
        return view('/addUserForm', ['countries' => $countries]);
    }

//    public function editUserForm($id) {    //edit user
//        $user = User::find($id);
//        $countries = Country::all();
//        $hobbies = json_decode($user->hobbies);
//         $academics = json_decode($user->academics,true); 
//         return view('editUserForm', ['user' => $user, "hobbies" => $hobbies, "countries" => $countries,"academics"=>$academics]);
//    }

    public function editUserForm($token) {
        $id = substr($token, 32);
//        dd($token);
        $user = User::find($id);
        $date = date('d-m-Y', strtotime($user->date));
        $countries = Country::all();
        $hobbies = json_decode($user->hobbies);
        $academics = json_decode($user->academics, true);
        return view('editUserForm', ['user' => $user, "hobbies" => $hobbies, "countries" => $countries, "academics" => $academics, "date" => $date]);
    }

    public function addUser(Request $request) {

        $post = $request->all();
//        $this->validator($post, $request)->validate();
           dump($post['date']);
        $post['date'] = date('Y-m-d',strtotime($post['date']));
        dd($post['date']);
        $post['password'] = bcrypt($post['password']);
        $post['hobbies'] = json_encode($post['hobbies']);
        $post['academics'] = json_encode($post['academics']);
        $post['user_type'] = (int) $post['user_type'];
        $user = User::create($post);
        $token = md5($user->id) . $user->id;
        $user->update(['token' => $token]);
//         dd($token);
        return redirect('/userList1');
    }

    public function userList() {
       $users = User::all();
        return view('userList1', ['users' => $users]);
    }

    public function getStates($cid) {
        $states = State::where('country_id', $cid)->get();
        return view('stateList', ['states' => $states]);
    }

    public function getCities($cid) {
        $cities = City::where('state_id', $cid)->get();
        return view('cityList', ['cities' => $cities]);
    }

    public function userList1() {
        $users = User::all();
        return view('userList1', ['users' => $users]);
    }

    public function userDataTable() {
        $users = User::select(['token', 'name', 'email']);

        return DataTables::of($users)
                        ->addColumn('action', function ($users) {
                            return '<center><a href="/editUserForm/' . $users->token . '"  class="btn btn-mini btn-success user_restore_alert" title="Edit User">Edit</a>
                                    <form method="POST" action="/deleterecord/' . $users->token . '" accept-charset="UTF-8" class="delete" style="display:inline">
                                        ' . csrf_field() . '
                                            <input name="_method" value="DELETE" type="hidden">
                                        <button type="button" class="btn btn-mini btn-danger user_delete_alert"  title="Delete User">Delete</button>
                                    </form></center>';
                        })
                        ->make(true);
    }

}
