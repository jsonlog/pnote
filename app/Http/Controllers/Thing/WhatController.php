<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
use DB;

class WhatController extends Controller
{
    public function index1() {
        $data = DB::table('what') -> get();
        dd($data);
        return view('thing.what',compact('data'));
    }
    public function index2() {
        //                 $data = What::simplePaginate(1);
        $data = DB::table('what') -> paginate(15);
        return view('thing.what',compact('data'));
    }
    public function index() {
        return DB::table('what') -> get();
    }
    
    //添加方法
    public function create(){
//         $html = mysql_real_escape_string(file_get_contents('php://input'));
//         $result = mysql_query("INSERT INTO $tabela_bd('what') VALUES('$html')");
        $data = json_decode(file_get_contents('php://input'), true);//true Toarray
        //定义关联操作的表
        $db = DB::table('what');
//         //使用insert增加记录
//         $result = $db -> insert([
//             [
//                 'name'	=>	'马冬梅',
//                 'age'	=>	'18',
//                 'email' =>	'madongmei@qq.com'
//             ],
//             [
//                 'name'	=>	'马春梅',
//                 'age'	=>	'19',
//                 'email' =>	'machunmei@qq.com'
//             ],
//         ]);
        // 插入一条记录方法insertGetid
        foreach($data as $key => $value) {
            echo $key . $value; // This will show jsut the value f each key like "var1" will print 9
            // And then goes print 16,16,8 ...
        }
        $result = $db -> insertGetId($data);
        return $result;
        
    }
    //查询方法
    public function retrieve(){
        $sort = $_REQUEST['sort']??'asc';
        $order = $_REQUEST['order']??'onwhen';//TODO
        $limit = $_REQUEST['limit'];
        $offset = $_REQUEST['offset'];
        // $db = DB::table('what');
        // //查询全部的数据
        // $data = $db -> get();
        // //尝试循环下数据
        // foreach ($data as $key => $value) {
        // 	echo "id是：{$value -> id}，名字是：{$value -> name}，邮箱是：{$value -> email}<br/>";
        // }
        
        // //查询id>3的数据
        // $data = $db -> where('id','>','3') -> get();
        //查询id大于2并且年龄小于21的数据
        //$data = $db -> where('id','>','2') -> where('age','<','21') -> get();
        
        
        //取出单行记录
        //$data = $db -> first();
        
        //取出指定字段的值
        // $data = DB::table('member')->where('id','1')->value('email');
        
        //查询指定的一些字段的值
        // $data = DB::table('member')->select('name', 'email')->get();
        $data = DB::table('what') ->orderBy($sort,$order) -> get();
        $count = count($data);
        if(isset($limit) && isset($offset))
            $data = DB::table('what') ->orderBy($sort,$order) -> offset($offset) -> limit($limit) -> get();
        return [ 
            'rows' => $data,
            'total' => $count
        ];
    }
    
    //修改方法
    public function update(){
        $data = json_decode(file_get_contents('php://input'), true);//true Toarray
        //定义需要操作的数据表
        $db = DB::table('what');
        $ressult = $db -> where('id','=',$data['id']) -> update($data);
        return $ressult;
    }
    
    //删除操作
    public function del(){
        $value = $_REQUEST['ids'];
        
        //指定需要操作的数据表
        $db = DB::table('what');
        //删除id为1的记录
        $result = $db->where('id','=',$value)->delete();
        return $result;
    }
}
