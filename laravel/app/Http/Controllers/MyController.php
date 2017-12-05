<?php 
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class MyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function nicai()
	{
		// echo "111";die;
		return view('My\my_welcome');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	//添加创建
	public function create()
	{

		$name=$_POST['name'];  
        $pwd=$_POST['pwd'];
        $content=$_POST['content'];
        // $interference = ['&', '*'];
		// $filename = 'D:\PHPstudy\WWW\month\laravel\vendor\yankewei\laravel-sensitive\demo\words.txt'; //每个敏感词独占一行
		// Sensitive::interference($interference); //添加干扰因子
		// Sensitive::addwords($filename); //需要过滤的敏感词
		// $content = Sensitive::filter($content);//过滤的字段
        // echo $content;die;
        // print_r($pwd);die;
        $res=DB::table('lianxi1')->insert(['name'=>$name,'pwd'=>MD5($pwd),'content'=>$content]);  
        // print_r($res);die;
        if($res)  
        {  
            return redirect('show_do');
        }else
        {
           echo "失败";
        }      
	}
  
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	//展示
	public function show_do()  
    {  
        $res = DB::table('lianxi1')->get();  
        return view('My/show',['res'=>$res]);  
    } 

    //删除
	public function del()  
    {  
         $id=$_GET['id'];  
        // print_r($id);die;
        $res= DB::table('lianxi1')
            ->where('id',$id)
            ->delete();
        if($res)
        {
            return redirect('show_do');
        }     
  
    } 

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
 
        $id=$_GET['id'];  
        // print_r($id);die;
        $res = DB::table('lianxi1')->where('id',$id)->first();  
        // print_r($re);die;  
        return view('My/upd',['res'=>$res]);
   
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$name=$_POST['name'];
        $content=$_POST['content'];
        $id=$_POST['id'];
        
        $arr=array('id'=>$id,'name'=>$name,'content'=>$content);
        $res=DB::table('lianxi1')  
            ->where('id','=',$id )  
            ->update($arr);
	      if($res) 
	      {  
	         return redirect('show_do');
	      }else
	      {
	    	echo "不对";
	      }
	}


}
