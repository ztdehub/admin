<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['product','goods','sort','tree','floor','sel']]);
    }
    function sel(){
        $results = DB::select("select * from goods order by id desc");
        return response()->json($results);
    }
    function tree($arr,$pid,$level){
         $list = [];
        foreach ($arr as $k=>$v){
            if ($v->parent_id == $pid){
                $v->src=$level;
                $v->sos = $this->tree($arr,$v->id,$level+1);
                $list[] = $v;
            }
        }
        return $list;
    }
    function sort(){
        $arr = DB::select("select * from sort");
        $ass=$this->tree($arr,0,0);
        return response()->json($ass);
    }
    function floor(){
         $arr = DB::select("select floor.name as f_name,goods.name,goods.id from  floor left join goods on floor.id = goods.goods_sn");
         $floor=[];
        foreach ($arr as $key=>$value){
            $floor[$value->f_name][]=[$value->name,$value->id];
        }
        return response()->json($floor);
    }
    //商品详情
    function goods(Request $request){
        $id=$request->input('id');
        $arr=DB::select("select goods.name,attr_details.name as d_name,attribute.name as b_name,attr_details.attr_id as d_id,attribute.id as b_id,attr_details.id from goods_attr inner join goods on goods_attr.goods_id=goods.id inner join attribute on goods_attr.attr_id=attribute.id inner join attr_details on goods_attr.attr_details_id=attr_details.id where goods_attr.goods_id=$id");
        $attr=[];
        foreach ($arr as $key => $value){
            $attr[$value->b_name][]=[$value->d_name,$value->id];
        }
        $ass['name']=$arr[0]->name;
        $ass['data']=$attr;
        return response()->json($ass);
    }
//    购车展示
}
//不登录不能加人购物车，加入购物车的api一定要走中间件，需要u_id，货品id，购买数量，