<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['product']]);
    }

    function product(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $a = substr($id, 1);
        $arr = DB::select("select * from goodsattr where goods_id=$name and goods_attr_id='$a'");
        return response()->json($arr);
    }

    //添加购物车
    function products(Request $request)
    {
        $name = $request->input('name');
        $num = $request->input('num');
        $goods = $request->input('goods');
        $user = $request->input('user');
        $attr = $request->input('attr');
        $price = $request->input('price');
        $ass = DB::select("select * from users where `name` = '$user'");
        $user_id = $ass[0]->id;
        $arr = DB::select("select * from product where goods_id=$goods");
        if (empty($arr)) {
            if ($goods != '') {
                DB::insert("insert into product (user_id,goods_id,`number`,`name`,attr_name,`price`)values('$user_id',$goods,$num,'$name','$attr',$price)");
                echo '添加成功';
            } else {
                echo '请先登录';
            }
        } else {
            $number = $arr[0]->number + $num;
            $id = $arr[0]->id;
            DB::update("update product set number = $number where id = $id and user_id=$user_id");
            echo '添加成功';
        }
    }

    //购物车展示
    function car()
    {
        $thoen = auth()->user();
        $id = $thoen->id;
        $arr = DB::select("select * from product  where user_id=$id");
        return response()->json($arr);
    }

//    修改购物车内数量
    function number(Request $request)
    {
        $id = $request->input('id');
        echo $number = $request->input('number');
        DB::update("update product set number = $number WHERE id = $id");
    }

    function area()
    {
        $arr = DB::select("select * from area where area_type=1");
        return response()->json($arr);
    }

    function orders(Request $request)
    {
        $number = $request->input('number');
        $arr = explode(',', substr($number, '1'));
        $order = [];
        foreach ($arr as $key => $value) {
            $ass = DB::select("select * from product where id=$value");
            $order['data'][] = $ass;
        }
        return response()->json($order);
    }

    function orders_add(Request $request)
    {
        $user = auth()->user();
        $u_id = $user->id;
        $arr = DB::table('orders_add')->insertGetId(['u_id' => $u_id, 'status' => '0']);
        $number = $request->input('number');
        $ass = explode(',', substr($number, '1'));
        $money=0;
        foreach ($ass as $key => $value) {
//            DB::table('product')->delete('id','=',$value);
            $commt = DB::select("select * from product where id=$value");
            $name = $commt[0]->name;
            $type = $commt[0]->attr_name;
            $number = $commt[0]->number;
            $h_id = $commt[0]->id;
            $price = $number * $commt[0]->price;
            $money+=$price;
            DB::table("orders")->insert(['h_goods' => $name, 'h_type' => $type, 'price' => $price, 'num' => $number, 'h_id' => $h_id, 'order_id' => $arr]);
//            DB::delete("delete from product where id=$value");
        }
        $arr=[$money,$arr];
        return response()->json($arr);
    }
}
//添加订单的时候生成一个总订单然后查询总订单讲总订单的id与字订单关联从而可以知道这个总订单下有哪些具体的产品