<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
// use Input;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function upload(Request $request){
        if($request -> method() == "POST"){
            if($request -> hasFile('uploadFile') && $request -> file('uploadFile') -> isVaild()){
                //获取文件的原始名称
                dd($request -> file('uploadFile') -> getClientOriginalName());
                //获取文件的大小
                // dd($request -> file('uploadFile') -> getClientSize());
                // $path = md5(time() . rand(100000,999999)) . '.' . $request -> file('uploadFile') -> getClientOriginalExtension();
                // $request -> file('uploadFile') -> move('./uploads',$path);
                // //获取全部的数据
                // $data = $request -> all();
                // //将路径添加到数组中
                // $data['uploadFile'] = './uploads/' . $path;
                // $result = Member::create($data);
                // //判断是否成功
                // if($result){
                //     return redirect('/');
                // }
            }
        }else
            return view("thing/upload");
    }
}
