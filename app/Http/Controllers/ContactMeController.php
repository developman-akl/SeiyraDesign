<?php
namespace App\Http\Controllers;

use App\ContactMe as ContactMeModel;
use App\Mail\ContactMe as ContactMeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class ContactMeController extends Controller
{
	const SUBJECT_SELECT = [
        'UX/UI Design' => "UX/UI Design",
        'Logo Design' => "Logo Design",
        'Photo Editing' => "Photo Editing",
        'Social Media Creative Design' => "Social Media Creative Design",
    ];

	public function contactMePost(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|string', 
			'email' => 'required|email', 
			'subject' => 'required|string', 
			'message' => 'required|string' 
		]);

		if ($validator->fails()) {
			return response()->json(['success' => false, 'messages' => [['Please fill in all fields.']]]);
		}

		ContactMeModel::create($request->all());
		
		Mail::to(env('MAIL_FROM_ADDRESS'))
			->send(new ContactMeMail(
					$request->get('name'), 
					$request->get('email'), 
					$request->get('subject'), 
					$request->get('message')
				)
			);
      
        return response()->json(['success' => true, 'messages' => [['Thank you for contacting me! I will be in touch as soon as possible.']]]);
	}
}