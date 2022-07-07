<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $employees =  Employees::all();

        /* dd($employees); */

        /*   return view('posts.index', ['posts' => $posts]); */

        return view('home', ['employees' => $employees]);
    }



    public function sort()
    {

        $employeesss =  Employees::all()->sortByDesc('emp_office_name');

        $emplsort = Employees::orderBy('emp_office_name')->get();

        return array('data' => $emplsort);
    }

    public function sorton()
    {

        $employeesss =  Employees::all()->sortByDesc('emp_name');

        $emplsort = Employees::orderBy('emp_name')->get();

        return array('data' => $emplsort);
    }

    public function se()
    {

        $employeesss =  Employees::all()->sortByDesc('emp_email');

        $emplsort = Employees::orderBy('emp_email')->get();

        return array('data' => $emplsort);
    }

    public function get(Request $request)
    {
        /*  $employees =  Employees::all(); */

        /* $ofc_id = $_GET['ofc_id']; */

        /* die($request); */

        $ofc_id = $request['ofc_id'];



        /* dd($employees); */

        /*   return view('posts.index', ['posts' => $posts]); */

        $data = DB::table('offices')->where('id', $ofc_id)->first();
        return array('data' => $data);


        /* return response()->json(['success' => 'Got Simple Ajax Request.']); */
    }

    public function search(Request $request)
    {
        $word = $_POST["value"];

        $data = Employees::where('emp_name', $word)->orWhere('emp_office_name', $word)->orWhere('emp_email', $word)->get();

        return array('data' => $data);
    }

    public function filter(Request $request)
    {
        $word = $_POST["value"];


        $data = Employees::where('emp_name', '!=', $word)->orWhere('emp_office_name', '!=', $word)->get();

        $user = Employees::where('emp_name', '!=', $word)->first();
        $userr = Employees::where('emp_office_name', '!=', $word)->first();
        $userrr = Employees::where('emp_email', '!=', $word)->first();
        if ($user) {
            return array('data' => Employees::where('emp_name', '!=', $word)->get());
        } else if ($userr) {
            return array('data' => Employees::where('emp_office_name', '!=', $word)->get());
        } else if ($userrr) {
            return array('data' => Employees::where('emp_email', '!=', $word)->get());
        }

        /* return array('data' => $data); */
    }
}
