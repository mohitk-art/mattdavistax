<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use App\Models\Blog;
use Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return UserResource::collection(User::all());
        return view('home');
    }

    public function getFriends()
    {
        return UserResource::collection(User::where('id', '!=', auth()->id())->get());
    }


    public function homePage()
    {
        $blogs=Blog::paginate(3);
        return view('welcome',compact('blogs'));
    }


    public function terms_and_Conditions()
    {
      return view('terms_and_Conditions');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function contactUs(Request $request)
    {
       return view('contact_us');
    }

    public function services()
    {
        return view('services');
    }

    public function guarantee(){
        return view('guarantee');
    }


    public function contactUsMessage(Request $request)
    {
      $email_data = array(
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'messagetxt' => $request->messagetxt,
     );

       // send email with the template
       Mail::send('email.contactus_email', $email_data, function ($message) use ($email_data) {
        $message->to($this->admin_email, $email_data['first_name'])
            ->subject('Welcome to Mattdavis Tax Service')
            ->from($this->admin_email, 'Mattdavis Tax Service');
        });
        return back()->with('success','Enquiry Submit Successfully');
    }


}
