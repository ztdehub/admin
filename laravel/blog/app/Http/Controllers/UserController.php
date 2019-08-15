<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['citysel']]);
    }
    function city(Request $request){
        $id=$request->input('id');
        $arr=DB::select("select * from area where parent_id=$id");
        return response()->json($arr);
    }
    function cityadd(Request $request){
        $user=auth()->user();
        $id=$user->id;
        $name=$user->name;
        $city=$request->input('city');
        DB::insert("insert into city (`name`,city,`user_id`)values('$name','$city','$id')");
        return response()->json($city);
    }
    function citysel(){
        $arr=DB::select("select * from city where user_id =1");
        return response()->json($arr);
    }
}