<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Excel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        echo "ADMIN";
//         dd('here');
        return view('adminHome');
    }
    
    public function importUsers(Request $request) {
        $post = $request->except('import_data');          
        if ($request->hasFile('import_data')) {
            $excel = Excel::toArray(new \App\Imports\UsersImport, $request->file('import_data'))[0];              
            $keys = array_splice($excel, 0, 1);
            foreach ($excel as $key => $value) {
                $f_array = array();
                $f_array = array_combine($keys[0], $value);
                $f_array['date'] = ($f_array['date']) ? date('Y-m-d', strtotime($f_array['date'])) : '';
                $f_array['name'] = $f_array['name'];
                $f_array['email'] = $f_array['email'];
                $f_array['address'] = $f_array['address'];                 
                $data = \App\User::create($f_array);
                $token = md5($data->id) . $data->id;
                $data->update(['token' => $token]);
            }
            echo "Completed Successfully";
            exit;
        }
    }
}
