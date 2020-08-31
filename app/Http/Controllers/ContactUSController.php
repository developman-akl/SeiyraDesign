<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Mail;
class ContactUSController extends Controller
{
   	public function contactUS()
	{
		return view('contactUS');
	} 

	public function contactUSPost(Request $request) 
	{
		$this->validate($request, [ 
			'name' => 'required', 
			'email' => 'required|email', 
			'subject' => 'required', 
			'message' => 'required' 
		]);

		ContactUS::create($request->all()); 

		Mail::send('contact.email',
			array(
				'name' => $request->get('name'),
				'email' => $request->get('email'),
				'subject' => $request->get('subject'),
				'user_message' => $request->get('message')
			), function($message) {
				$message->from('testfrom@seiyra.com');
				$message->to('testto@seiyra.com', 'Admin')->subject('TEST CONTACT FORM');
			}
		);

		return back()->with('success', 'Thanks for contacting us!'); 
	}
}