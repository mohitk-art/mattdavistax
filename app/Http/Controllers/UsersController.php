<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Roles;
use HTML,Form,Validator,Mail,Response,Session,Auth,DB,Redirect,Image,Password,Cookie,File,View,Hash,JsValidator,URL,Notification;

//For Role and Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\UserDetails;
use App\Models\UserDocument;


class UsersController extends Controller
{

    private $admin_email;

    public function __construct()
    {
        $this->admin_email="aimanshugupta@gmail.com";
    }



    public function index()
    {
       $users   =User::whereNotIn('id',['1'])->with('roles')->paginate(20);
       return view('users.list',compact('users'));
    }


    public function create($id)
    {
        if($id== '0'){
            $user           =null;
            $role_name      =null;
        }else{
            $user           =User::where('id',$id)->first();
            $role_name      =$user->getRoleNames()->first();
        }

        $roles      = Role::whereNotIn('id',['1'])->get();
        return view('users.post_user',compact('user','roles','role_name'));
    }


    public function store(Request $request)
    {
        // return $request->all();
        $user               =New User();
        $user->name         =$request->name;
        $user->email        =$request->email;
        $user->password     =Hash::make($request->password);
        $user->phone        =$request->phone;
        $user->save();

        $user->assignRole($request->roles);

        $email_data = array(
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        );

        // send email with the template
        Mail::send('email.welcome_email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to Mattdavis Tax Service')
                ->from($this->admin_email, 'Mattdavis Tax Service');
        });

        return redirect('users')->with('success','User Added Successfull');
    }

    public function show($id)
    {
        if($id== '0'){
            $user=null;
        }else{
            $user=User::where('id',$id)->first();
        }
        $role_name = $user->getRoleNames()->first();
        return view('users.show_user',compact('user','role_name'));
    }


    public function edit($id,Request $request)
    {
        $user               =User::where('id',$id)->first();
        $role_name          = $user->getRoleNames()->first();

        $user->name         =$request->name;
        $user->password     =Hash::make($request->password);
        $user->phone        =$request->phone;
        $user->save();

        $user->removeRole($role_name);
        $user->assignRole($request->roles);

        return redirect('users')->with('success','User Updated Successfull');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function tax(Request $request,$UserID)
    {

    //   $users = auth()->user();
      $users=User::where('id',$UserID)->first();
      $user_details=UserDetails::where('user_id',$UserID)->first();
      $userDocuments=UserDocument::where('user_id',$UserID)->get();
       return view('profile.setting_profile',compact('users','user_details','userDocuments'));
    }


    public function yourHousehold(Request $request,$UserID)
    {
        // return $request->all();
        $user               =User::where('id',$UserID)->first();
        $user->name         =$request->name;
        $user->phone        =$request->phone_number;
        $user->save();


        $user_details=UserDetails::where('user_id',$UserID)->first();
        if($user_details == null){
            $user_details               =new UserDetails();
            $user_details->user_id      =$UserID;
        }

        $user_details->dob                              =$request->dob;
        $user_details->marital_status                   =$request->marital_status;
        $user_details->ssn                              =$request->ssn;
        $user_details->us_citizen_in_2019               =$request->us_citizen_in_2019;
        $user_details->person_actually_claiming_you     =$request->person_actually_claiming;
        $user_details->claim_you_dependent              =$request->claim_you_dependent;
        $user_details->live_us_more_than_six            =$request->live_us_more_than_six;
        $user_details->federal_disaster                 =$request->federal_disaster;
        $user_details->student_2019                     =$request->student_2019;
        $user_details->student_type                     =$request->student_type;
        $user_details->qualifying_child                 =$request->qualifying_child;
        $user_details->save();

        return back()->with('success','Profile Updated successfully!');

    }

    public function postAddress(Request $request,$UserId)
    {
        $user_details=UserDetails::where('user_id',$UserId)->first();
        if($user_details == null){
            $user_details               =new UserDetails();
            $user_details->user_id      =$UserId;
        }

        $user_details->address          =$request->address;
        $user_details->atp              =$request->atp;
        $user_details->zip              =$request->zip;
        $user_details->state            =$request->state;
        $user_details->ico              =$request->ico;
        $user_details->save();

        return back()->with('success','Profile Updated successfully!');
    }


    //For Upload Doduction
    public function deductionDocument(Request $request,$doc_type)
    {

        if($doc_type ==1){
            $docType="Income";
            $folder_name="income_documents";
        }if ($doc_type ==2) {
            $docType="Credits";
            $folder_name="credit_documents";
        }else{
            $docType="Deductions";
            $folder_name="deduction_documents";
        }


        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();

        //For Save Data into DB
        $UserDocument               =new UserDocument();
        $UserDocument->user_id      =$request->userId;
        $UserDocument->document_name         =$docType;
        $UserDocument->document_type         =$image->extension();
        $UserDocument->document_url          =$imageName;
        $UserDocument->status                ='1';
        $UserDocument->upload_by             =auth()->user()->id;
        $UserDocument->save();

        $image->move(public_path($folder_name),$imageName);

        Response::json(array('success' => true, 'message' => 'Successfully uploaded file.'), 200);
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


}
