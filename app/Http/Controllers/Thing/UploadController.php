<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
// use Input;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
// use Excel;

class UploadController extends Controller
{
    //
    public function upload(Request $request){
        if($request -> method() == "POST"){
            if($request -> hasFile('uploadFile')){// && $request -> file('uploadFile') -> isVaild()){// Illuminate\Http\UploadedFile::isValid()
                //获取文件的原始名称
                // dd($request -> file('uploadFile') -> getClientOriginalName());
                //获取文件的大小
                // dd($request -> file('uploadFile') -> getClientSize());
                $path = md5(time() . rand(100000,999999)) . '.' . $request -> file('uploadFile') -> getClientOriginalExtension();
                $request -> file('uploadFile') -> move('./uploads',$path);
                //获取全部的数据
                $data = $request -> all();
                //将路径添加到数组中
                $data['uploadFile'] = './uploads/' . $path;
                // $result = Member::create($data);
                //判断是否成功
                // if($result){
                //     return redirect('/');
                // }
                
                Excel::import(new ProductsImport, $data['uploadFile']);
                var_dump($data);
            }
//             try {
//                 //获取上传的excel文件
//                 $filePath = $request->get('uploadFile');
//                 Excel::load($filePath, function($reader) {
//                     $data = $reader->all();
//                     //批量存储
//                     $value=[];
//                     $count = '';
//                     foreach ($data as $k => $v ){
//                         $count++;
//                         //存储表格每行的值
//                         $value['value1']=$v['行1'];
//                         $value['value2']=$v['行2'];
//                         $value['value3']=$v['行3'];
//                         $value['value4']=$v['行4'];
//                         $value['value5']=$v['行5'];
//                         Adver::create($value);
//                     }
//                     //返回导入结果
//                     throw new Exception("成功导入了".$count."条数据");
//                 });
//             }catch(Exception $e){
//                 return $this->doFailure($e);
//             }

//             $path1 = $request->file('uploadFile')->store('temp');
//             $path = storage_path('app').'/'.$path1;
//             dd($path);
//             $data = Excel::import(new ProductsImport(), $path);
//             return redirect('/')->with('success', 'All good!');
//             return $this->response()->success('导入完成！')->refresh();
        }else
            return view("thing/upload");
    }
}
