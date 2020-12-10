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
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\isEmpty;

class UsersController extends Controller
{

    private $admin_email;

    public function __construct()
    {
        $this->admin_email="aimanshugupta@gmail.com";

        $this->middleware('auth');

    }



    public function index()
    {
      $role = auth()->user()->roles[0]['name'];
       if($role == 'admin'){
       $users     =User::whereNotIn('id',['1'])->with('roles','userDetails')->paginate(20);
       }elseif($role == 'staff'){
         $users   =User::role('customer')->with('userDetails')->paginate(20);
       }else{
         $users   =User::whereNotIn('id',['1'])->with('roles','userDetails')->paginate(20);
       }
        $query=null;
       return view('users.list',compact('users','query'));
    }


    public function create($id)
    {
        $id= base64_decode($id);
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
        $id= base64_decode($id);

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

        $this->validate($request, [
            'name' => 'required|min:5',
            'phone' => 'required|min:10|max:10',
        ]);


        $user               =User::where('id',$id)->first();

        if(isset($request->file)){
            $imagename=explode('.',$request->file->getClientOriginalName());
            $file =$imagename[0].time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('profile_images'), $file);
            $user->profile_photo_path = $file;
        }

        if($request->password !=null){
            $user->password     =Hash::make($request->password);
        }

        $user->name         =$request->name;
        $user->phone        =$request->phone;
        $user->save();


        return back()->with('success','User Updated Successfull');
    }



    public function tax(Request $request,$UserID)
    {

        $UserID= base64_decode($UserID);
        $user = Auth::user();
        $userRoleName=$user->getRoleNames();
        //   $users = auth()->user();
      $users=User::where('id',$UserID)->with('roles')->first();
      $user_details=UserDetails::where('user_id',$UserID)->first();
      $userDocuments=UserDocument::where('user_id',$UserID)->get();
       return view('profile.setting_profile',compact('users','user_details','userDocuments','userRoleName'));
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
        if($doc_type == 1){
            $docType="Deductions";
            $folder_name="deduction_documents";
        }elseif($doc_type == 2) {
            $docType="Credits";
            $folder_name="credit_documents";
        }elseif($doc_type == 3){
            $docType="Income";
            $folder_name="income_documents";
        }

        $id=base64_encode($request->userId);

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName().'#'.$id;

        //For Save Data into DB
        $UserDocument                        =new UserDocument();
        $UserDocument->user_id               =$request->userId;
        $UserDocument->document_name         =$docType;
        $UserDocument->document_type         =$image->extension();
        $UserDocument->document_url          =$imageName;
        $UserDocument->status                ='1';
        $UserDocument->upload_by             =auth()->user()->id;
        $UserDocument->save();

        $image->move(public_path($folder_name),$imageName);

        Response::json(array('success' => true, 'message' => 'Successfully uploaded file.'), 200);
    }


    public function fileRemove(Request $request)
    {
        $id=base64_encode($request->userId);
        $filename = $request->id.'#'.$id;
        $uploaded_image = UserDocument::where('user_id', $request->userId)->where('document_url',$filename)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        if($uploaded_image->document_name = "Income"){
            $file_location='income_documents';
        }elseif($uploaded_image->document_name = "Deductions"){
            $file_location='deduction_documents';
        }else{
            $file_location='credit_documents';
        }

        $file_path = $file_location . $uploaded_image->document_url;

        if (file_exists($file_path)) {
            // Storage::delete($file_path);
            unlink($file_path);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }
        return Response::json(['message' => 'File successfully delete'], 200);
    }





    public function updateDocStatus(Request $request)
    {
        $UserDocuments      =UserDocument::where('user_id',$request->userId)->get();
        foreach($UserDocuments as $UserDocument){
            $UserDocument->status            =$request->document_status_id;
            $UserDocument->doc_approve_by    =auth()->user()->id;
            $UserDocument->save();
        }

       return response()->json(['success'=>auth()->user()->id]);
    }


    public function searchCustomer(Request $request)
    {
         $query=$request->gsearch;

        $subtitle = \DB::table('users')
        ->where('name', 'LIKE', '%'.$query.'%');

        $tagtitle = \DB::table('users')
            ->where('email', 'LIKE', '%'.$query.'%');

        // $tagsubtitle = \DB::table('user_details')
        //     ->where('ssn', 'LIKE', '%'.$query.'%');

      $users = User::where('phone', 'LIKE', '%'.$query.'%')
            ->union($subtitle)
            ->union($tagtitle)
            // ->union($tagsubtitle)
            ->paginate(20);

        if(isEmpty($users)){
            $UserDetails=UserDetails::where('ssn','LIKE',"%{$request->gsearch}%")->first();
            if($UserDetails !=null){
              $users=User::where('id',$UserDetails->user_id)->paginate(20);
            }
        }

        $role = auth()->user()->roles[0]['name'];
        return view('users.list',compact('users','query'));
    }








}
