<?php 
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB; 

class DateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login(){
        return view('My\login');
	}
	public function show(){
       	$username  = $_POST['username'];
		$password  = $_POST['password'];
		//$username =  Input::all();
		$res=DB::select("select * from user where username = '$username' and password = '$password'");
		if($res)
		{		
			return view('My\date');
		}else
		{
			
			return view('My\login');
		}
	}
	public function rcadd()
	{
		$time = $_POST['time'];
		$shi = $_POST['shi'];
		$fen = $_POST['fen'];
		$newtime = $time.''.$shi.':'.$fen.':00'; 
		$content = $_POST['content'];
		$type = $_POST['type'];
		$res=DB::table('richeng')->insert(['newtime'=>$newtime,'content'=>$content,'type'=>$type]);     
		if($res)
		{
			if($type == '1')
			{
				$arr = array(
					'newtime'=>$newtime,
					'content'=>$content,
					'type'=>$type
				);
				$newarr=json_encode($arr);
				// echo $newarr;die;
				 Redis::rpush('redis',$newarr);
				// $hei = Redis::rpop('redis');
				// echo $hei;die;
			}   
			return view('My\date');
		}else{
			return view('My\login');
		}

	}

}










































































































































































































































































































































































































































































































































































































































































































