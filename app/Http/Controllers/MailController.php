<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;

class MailController extends Controller
{
	
	/*
	 *　入力フォーム
	 */
	public function index()
	{
	  return view('mail.index');
	}
	
	public function confirm(Request $request)
	{
	  $rules = [   # 1)
	    'title' => 'required',
	    'email' => 'required|email',
	    'body' => 'required',
	  ];

	  $this->validate($request, $rules); # 2)

	  $data = $request->all(); #3
	  $request->session()->put($data); # 4)
	  return view('mail.confirm', compact("data")); #5)
	}
	
	/*
	 *　完了フォーム
	 */
	public function complete()
	{

	  $data = session()->all();   # 1）
	  Mail::send(['text' => 'mail.temp'], $data, function($message) use($data){ # 2)
	    $message->to($data["email"])->subject($data["title"])->bcc('info@laraweb.net'); #3
	  });

	return view('mail.complete'); # 4)
	}

}
