<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function show()
    {
        return view('user/user');
    }
    public function login(Request $request)
    {
        $name = $request->input('name');
        $pwd = $request->input('pwd');
        $results = DB::select("select * from class where name=$name and class=$pwd");
        if (empty($results)){
            $json=['code'=>'1','status'=>'error','data'=>'账号或密码错误'];
            echo json_encode($json);
        }else{
            $request->session()->put('name', $name);
            $json=['code'=>'0','status'=>'error','data'=>'登录成功'];
            echo json_encode($json);
        }
    }
    public function out(Request $request){
        $request->session()->forget('name');
        return redirect()->action('LoginController@show');
    }
}