@extends('back_layouts.app')
@section('content')


            <div class="card mb-0 p-4">
            @include('error_message')

            <div class="tax-top-nav">
                <button class="tablink" onclick="openPage('Home', this, '#4CAF50')" id="defaultOpen">Your Information</button>
                <button class="tablink" onclick="openPage('Income', this, '#4CAF50')">Income</button>
                <button class="tablink" onclick="openPage('Deductions', this, '#4CAF50')" >Deductions</button>
                <button class="tablink" onclick="openPage('Credits', this, '#4CAF50')" >Credits</button>
                <button class="tablink" onclick="openPage('About', this, '#4CAF50')">File Status</button>
            </div>

                <div id="Home" class="tabcontent">
                            <div class="tab">
                                <button class="tablinks2 active" onclick="openCity(event, 'Your_Household')" id="defaultOpen2">Your Household</button>
                                <button class="tablinks2" onclick="openCity(event, 'Address')">Address</button>
                                <button class="tablinks2" onclick="openCity(event, 'Summary')" id="defaultOpen22">Summary</button>
                            </div>

                            <div id="Your_Household" class="tabcontent2">
                            <form id="regForm" action="{{url('your_household',$users->id)}}" method="POST">
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab2">
                                    
                                <div class="form-row" oninput="this.className = ''">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                         <label for="inp1">Full Name</label>
                                        <input type="text" id="inp1" class="form-control" name="name" value="{{$users->name}}" required>
                                        </div>
                                       </div>

                                       <div class="col-sm-6">
                                        <div class="form-group">
                                         <label for="inp12">Date of birth</label>

                                         <input type="date" id="inp12" class="form-control" min="1900-01-01" max="2020-12-01" name="dob" required  value="{{isset($user_details) ? $user_details->dob : ''}}">
                                        </div>
                                       </div>

                                       <div class="col-sm-4">
                                        <div class="form-group">
                                         <label for="inp12">Marital status</label>
                                         <select class="form-control" name="marital_status" required>
                                             <option value="Single">Single</option>
                                             <option value="Married">Married</option>
                                             <option value="Legally separated">Legally separated</option>
                                             <option value="Widowed">Widowed</option>
                                         </select>
                                        </div>
                                       </div>

                                       <div class="col-sm-4">
                                        <div class="form-group">
                                         <label for="inp12">Social Security number (SSN)</label>
                                         <input class="ssn form-control" id="ssn" name="ssn"  type="text" placeholder="Social Security number" required value="{{$user_details ? $user_details->ssn : ''}}">
                                        </div>
                                       </div>

                                       <div class="col-sm-4">
                                        <div class="form-group">
                                         <label for="inp12">Phone Number</label>
                                         <input class="phone_number form-control" id="phone_number" name="phone_number"  type="text" placeholder="Phone Number" required value="{{$users ? $users->phone : ''}}">
                                        </div>
                                       </div>


                                    </div>
                                </div>

                                <div class="tab2 next_question">
                                    <div oninput="this.className = ''">
                                        <img src="{{ url('images/Transition1.png')}}" class="image_top">
                                    <h3 class="title"> Now, let’s answer some simple tax questions.</h3>
                                    <span class="sub_litle">This is what you came here for, after all.</span></center>
                                    </div>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                     <h3 class="title">Were you a U.S. citizen in 2019? </h3>
                                      <span class="sub_litle">This is what you came here for, after all.</span>
                                      <div class="middle">
                                        <label><input type="radio" name="us_citizen_in_2019" value="yes" {{$user_details ? $user_details->us_citizen_in_2019 == 'yes' ? 'checked': '' : ''}}/>
                                        <div class="front-end box"><span>Yes</span></div>
                                      </label>
                                        <label><input type="radio" name="us_citizen_in_2019" value="no" {{$user_details ? $user_details->us_citizen_in_2019 == 'no' ? 'checked': '' : ''}}/>
                                         <div class="back-end box"><span>No</span></div>
                                       </label>
                                      </div>
                                     </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                     <h3 class="title">Is that person actually claiming you on their return? </h3>
                                        <div class="middle">
                                            <label><input type="radio" name="person_actually_claiming" value="yes" {{$user_details ? $user_details->person_actually_claiming == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="person_actually_claiming" value="no" {{$user_details ? $user_details->person_actually_claiming == 'no' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                     <h3 class="title">Can someone else claim you as a dependent?</h3>
                                     <span class="sub_litle">This helps us know what tax breaks we can get you.</span>
                                        <div class="middle">
                                            <label><input type="radio" name="claim_you_dependent" value="yes" {{$user_details ? $user_details->claim_you_dependent == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="claim_you_dependent" value="no" {{$user_details ? $user_details->claim_you_dependent == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                     <h3 class="title">Did you live in the U.S for more than six months in 2019?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="live_us_more_than_six" value="yes" {{$user_details ? $user_details->live_us_more_than_six == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="live_us_more_than_six" value="no" {{$user_details ? $user_details->live_us_more_than_six == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                         <h3 class="title">Have you been affected by a federal disaster?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="federal_disaster" value="yes" {{$user_details ? $user_details->federal_disaster == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="federal_disaster" value="no" {{$user_details ? $user_details->federal_disaster == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                           <h3 class="title">Were you a student in 2019?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="student_2019" value="yes" {{$user_details ? $user_details->student_2019 == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="student_2019" value="no" {{$user_details ? $user_details->student_2019 == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                             <h3 class="title">Were you a full- or part-time student?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="student_type" value="yes" {{$user_details ? $user_details->student_type == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="student_type" value="no" {{$user_details ? $user_details->student_type == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="{{ url('images/citizenship.png')}}" class="image_top">
                                              <h3 class="title">Are you that person’s qualifying child?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="qualifying_child" value="yes" {{$user_details ? $user_details->qualifying_child == 'yes' ? 'checked': '' : ''}}/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="qualifying_child" value="no" {{$user_details ? $user_details->qualifying_child == 'yes' ? 'checked': '' : ''}}/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>



                                
                                <div class="mt-4 text-center">
                                    <button type="button" class="btn btn-secondary mr-2" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                                

                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span>
                                <span class="step"></span><span class="step"></span><span class="step"></span><span class="step"></span>
                                <span class="step"></span><span class="step"></span>
                                </div>
                            </form>
                            </div>

                            <div id="Address" class="tabcontent2 p-6">
                                
                                <form action="{{url('post_address',$users->id)}}" method="POST" class="form-row">

                                <div class="text-center mb-4">
                                    <img src="{{ url('images/Address.png')}}" style="
                                    height: 104px;">
                                 <h3 class="mb-4"> What's your current address?</h3>

                                </div>

                        

                                 <div class="col-sm-8">
                                    <div class="form-group">
                                     <label for="inp12">Address</label>
                                     <input class="form-control" id="address" name="address"  type="text" max="150" value="{{$user_details ? $user_details->address : ''}}">
                                    </div>
                                   </div>

                                   <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="inp12">Apt</label>
                                     <input class="form-control" id="atp" name="atp"  type="text" max="20" value="{{$user_details ? $user_details->atp : ''}}">
                                    </div>
                                   </div>

                                   <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="inp12">ZIP</label>
                                     <input class="form-control zip" id="zip" name="zip"  type="text" value="{{$user_details ? $user_details->zip : ''}}">
                                    </div>
                                   </div>

                                   <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="inp12">State</label>
                                     <input class="form-control" id="state" name="state"  type="text" value="{{$user_details ? $user_details->state : ''}}">
                                    </div>
                                   </div>

                                   <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="inp12">In care of</label>
                                     <input class="form-control" id="ico" name="ico"  type="text" value="{{$user_details ? $user_details->ico : ''}}">
                                    </div>
                                   </div>

                                   <div class="text-right col-md-12">
                                       <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                                    </div>

                                   
                                </form>
                            
                            </div>

                            <div id="Summary" class="tabcontent2 p-6 text-center">
                                
                                    <h3 class="mb-4">We've enjoyed getting to know you, himahh!</h3>
                                    <div class="mb-4">Here's everything you've told us so far.</div>

                                    <hr/>

                                    
                                <span class="bold_title"> Your Household  <i class="fa fa-pencil-square-o fafaicon" aria-hidden="true"  onclick="openCity(event, 'Your_Household')"></i><br><br></span>
                                <span class="lbl_cls">  Name: </span> <span class="lbl2_cls">{{isset($users) ? $users->name : ''}}</span><br>
                                <span class="lbl_cls"> Phone :</span><span class="lbl2_cls">{{isset($users) ? $users->phone : ''}}</span><br>
                                <span class="lbl_cls"> Date Of Birth :</span><span class="lbl2_cls">{{isset($user_details) ? $user_details->dob : ''}}</span><br>
                                <span class="lbl_cls"> SSN :</span><span class="lbl2_cls">{{isset($user_details) ? $user_details->ssn : ''}}</span><br>
                                <span class="lbl_cls"> Marital status:</span><span class="lbl2_cls">{{isset($user_details) ? $user_details->marital_status : ''}}</span><br><br>

                                <hr/>

                                @if(isset($user_details))
                                <span class="qus_cls">Were you a U.S. citizen in 2019? </span>
                                <span class="ans_cls"></span>{{$user_details->us_citizen_in_2019}}<br><br>

                                <span class="qus_cls">Is that person actually claiming you on their return? </span>
                                <span class="ans_cls">{{$user_details->person_actually_claiming_you}}<br></span><br>


                                <span class="qus_cls">Can someone else claim you as a dependent?</span>
                                <span class="ans_cls">{{$user_details->claim_you_dependent}}<br></span><br>


                                <span class="qus_cls">Did you live in the U.S for more than six months in 2019?</span>
                                <span class="ans_cls">{{$user_details->live_us_more_than_six}}<br></span><br>


                                <span class="qus_cls">Have you been affected by a federal disaster?</span>
                                <span class="ans_cls">{{$user_details->federal_disaster}}<br></span><br>


                                <span class="qus_cls">Were you a student in 2019?</span>
                                <span class="ans_cls">{{$user_details->student_2019}}<br></span><br>


                                <span class="qus_cls">Were you a full- or part-time student?</span>
                                <span class="ans_cls">{{$user_details->student_type}}<br></span><br>


                                <span class="qus_cls">Are you that person’s qualifying child?</span>
                                <span class="ans_cls">{{$user_details->qualifying_child}}<br></span>
                                @endif


                                <hr class="hr_line">

                                <span class="bold_title">Your Address   <i class="fa fa-pencil-square-o fafaicon" aria-hidden="true"  onclick="openCity(event, 'Address')"></i>
                                </span><br><br>
                                <span class="lbl_cls">Address :</span> <span class="lbl2_cls">{{isset($user_details) ? $user_details->address : ''}}</span><br>
                                <span class="lbl_cls"> Zip :</span><span class="lbl2_cls">{{isset($user_details) ? $user_details->zip : ''}}</span><br>
                                <span class="lbl_cls"> State: </span><span class="lbl2_cls">{{isset($user_details) ? $user_details->state : ''}}</span><br>
                                <span class="lbl_cls"> Apt: </span><span class="lbl2_cls">{{isset($user_details) ? $user_details->atp : ''}}</span><br>
                                <span class="lbl_cls"> In care of: </span><span class="lbl2_cls">{{isset($user_details) ? $user_details->ico : ''}}</span><br>
                                <hr class="hr_line">

                            
                            </div>
                </div>


                <div id="Deductions" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2" onclick="openCity(event, 'upload_document')" id="defaultOpen4">Upload Deductions Document </button>
                        <button class="tablinks2" onclick="openCity(event, 'Uploaded_document')" id="defaultOpen44">Summary</button>
                    </div>

                    <div id="upload_document" class="tabcontent2 p-6 text-center">
                    
                        <h3 class="mb-4"> Now, let’s upload your FORM 1098</h3>
                        
                        <form action="{{ route('users.deductionDocument',1) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                            @csrf
                            <div class="dz-message" data-dz-message><span>Drag and drop all of your 1098s into the box below (or click to upload).</span></div>
                            <input type="hidden" value="{{$users->id}}" name="userId">
                        </form>
                    
                    </div>
                    <div id="Uploaded_document" class="tabcontent2 p-6">
                        <p>Here is All Deduction Upload Document List:</p>
                        
                        @if(count($userDocuments) > 0)
                         <div class="form-row images-row">
                            @foreach($userDocuments as $userDocument)
                            
                                @if($userDocument->document_name == "Deductions")
                                <div class="col-sm-4">
                                    @if($userDocument->document_type =='pdf')
                                    <a href="{{ url('deduction_documents',$userDocument->document_url) }}" title="{{$userDocument->document_url}}" target="_blank" class="view_pdf"/>
                                        <div class="pdf">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                        <span>{{$userDocument->document_url}}</span>
                                    </a>
                                    @else
                                    <a href="{{ url('deduction_documents',$userDocument->document_url) }}" title="{{$userDocument->document_url}}" target="_blank">
                                        <img src="{{ url('deduction_documents',$userDocument->document_url) }}" class="img" />
                                        <spam class="image_name_save">{{$userDocument->document_url}}</spam>
                                    </a>
                                    @endif
                                </div>
                                @endif
                            
                            @endforeach
                        </div>
                         @endif
                    </div>
                </div>

                <div id="Income" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2 active" onclick="openCity(event, 'upload_income')" id="defaultOpen3">Upload Income Document</button>
                        <button class="tablinks2" onclick="openCity(event, 'income_document')" id="defaultOpen33">Summary</button>
                    </div>
                    <div id="upload_income" class="tabcontent2 text-center p-6">
                
                            <h3 class="mb-4"> Now, let’s upload your Income Document</h3>
                            
                

                
                            <form action="{{ route('users.deductionDocument',3) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                                @csrf
                                <div class="dz-message" data-dz-message><span>Drag and drop all of your Income.</span></div>

                            <input type="hidden" value="{{$users->id}}" name="userId">
                            </form>
                        
                    </div>

                    <div id="income_document" class="tabcontent2 p-6">
                        <p>Here is All Income Upload Document List:</p>
                        
                        @if(count($userDocuments) > 0)
                            <div class="form-row images-row">
                            @foreach($userDocuments as $userDocument)
                            
                                @if($userDocument->document_name == "Income")
                                <div class="col-sm-4">
                                    @if($userDocument->document_type =='pdf')
                                    <a href="{{ url('income_documents',$userDocument->document_url) }}" target="_blank"/>
                                        <div class="pdf"><i class="fa fa-file-pdf-o"></i></div>
                                        <span>{{$userDocument->document_url}}</span>
                                    </a>
                                    @else
                                    <a href="{{ url('income_documents',$userDocument->document_url) }}" target="_blank">
                                        <img src="{{ url('income_documents',$userDocument->document_url) }}"  class="img" />
                                        <span class="image_name_save">{{$userDocument->document_url}}</span>
                                    </a>
                                    @endif
                                    </div>
                                @endif
                            
                            @endforeach
                            </div>
                         @endif

                    </div>
                </div>


                <div id="Credits" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2" onclick="openCity(event, 'upload_credits')" id="defaultOpen5">Upload Credits Document</button>
                        <button class="tablinks2" onclick="openCity(event, 'credits_document')" id="defaultOpen55">Summary</button>
                    </div>
                    <div id="upload_credits" class="tabcontent2 p-6 text-center">
                        
                            <h3>1098-T Tuition and expenses for college and other higher education</h3>
                        
                            <form action="{{ route('users.deductionDocument',2) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                                @csrf
                                <div class="dz-message" data-dz-message><span>Click here to upload the file</span></div>
                            <input type="hidden" value="{{$users->id}}" name="userId">
                            </form>
                        
                    </div>

                    <div id="credits_document" class="tabcontent2 p-6">
                        <p>Here is All Deduction Upload Document List:</p>
                    
                        @if(count($userDocuments) > 0)
                         <div class="form-row images-row">
                            @foreach($userDocuments as $userDocument)
                            
                                @if($userDocument->document_name == "Credits")
                                <div class="col-sm-4">
                                    @if($userDocument->document_type =='pdf')
                                    <a href="{{ url('credit_documents',$userDocument->document_url) }}" title="{{$userDocument->document_url}}" target="_blank" class="view_pdf"/>
                                        <div class="pdf">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                        <span>{{$userDocument->document_url}}</span>
                                    </a>
                                    
                                    @else
                                    <a href="{{ url('credit_documents',$userDocument->document_url) }}" title="{{$userDocument->document_url}}" target="_blank">
                                        <img src="{{ url('credit_documents',$userDocument->document_url) }}" class="img" />
                                        <spam class="image_name_save">{{$userDocument->document_url}}</spam>
                                    </a>
                                
                                    @endif
                                </div>
                                @endif
                            
                            @endforeach
                        </div>
                         @endif

                    </div>
                </div>


                <div id="About" class="tabcontent">
                    <div class="progressclg">

                        <input type="hidden" name="userId" id="userId" value="{{$users->id}}">
                        <div>
                            <div class="form-group">
                             <label for="inp12">Document Status</label>

                             @role('customer')
                             @if(!($userDocuments->isEmpty()))
                                    @if($userDocuments[0]->status == '1')
                                            File In Processing
                                    @elseif($userDocuments[0]->status == '2')
                                            Staff Recived You Uploaded
                                    @elseif($userDocuments[0]->status == '3')
                                            File In Processing
                                    @else
                                            Document Approved
                                    @endif
                             @endif

                             @else
                                <select class="form-control" name="document_status" id="document_status">
                                    <option value="2">Document Recived</option>
                                    <option value="3">File in processing</option>
                                    <option value="4">Done</option>
                                </select>
                             @endrole
                            </div>
                           </div>


                           @if($userRoleName[0] == 'customer')
                              @if(!($userDocuments->isEmpty()))
                                <div>
                                    <div class="form-group">
                                        <div class="progress">

                                            @if($userDocuments[0]->status == '1')
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                            40% Complete
                                            </div>
                                            @elseif($userDocuments[0]->status == '2')
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                50% Complete
                                                </div>
                                            @elseif($userDocuments[0]->status == '3')
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                70% Complete
                                                </div>

                                            @else
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                            100% Complete
                                            </div>
                                            @endif
                                       </div>
                                    </div>
                                  </div>
                                 @endif
                               @endif


                    </div>
                </div>


            </div>
@endsection


@section('script')
<script type="text/javascript">
    $("select[id='document_status']").change(function(){
        var document_status_id = $(this).val();
        var userId             =$("#userId").val();

        $.ajax({
            url: "<?php echo route('update_doc_status') ?>",
            method: 'POST',
            data: {document_status_id:document_status_id,userId:userId},
            success: function(data) {
            //   console.log("Done");

              swal({
                title: "Good job!",
                text: "Document Update Successfully",
                icon: "success",
              });
            }
        });
    });
  </script>


<script type="text/javascript">
   $('.ssn').inputmask('999-99-9999');
   $('.phone_number').inputmask('999-999-9999');
   $('.zip').inputmask('99999-9999');
</script>

<script type="text/javascript">
var userId  =$("#userId").val();
     Dropzone.options.imageUpload ={
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
           };

</script>

<script type="text/javascript">

var userRoleName    ='<?php echo $userRoleName[0] ?>';

if(userRoleName == 'staff'){
    window.onload = function () {
        startTab();
    };

    function startTab() {
        document.getElementById("defaultOpen22").click();


    }


}else{
    window.onload = function () {
        startTab2();
    };

    function startTab2() {
        document.getElementById("defaultOpen2").click();
    }

}
document.getElementById("defaultOpen").click();
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

    var userRoleName    ='<?php echo $userRoleName[0] ?>';
    if(pageName == 'Income'){
        if(userRoleName == 'staff'){
            document.getElementById("defaultOpen33").click();
        }else{
            document.getElementById("defaultOpen3").click();
        }
    }
    if(pageName == 'Deductions') {
        if(userRoleName == 'staff'){
            document.getElementById("defaultOpen44").click();
        }else{
            document.getElementById("defaultOpen4").click();
        }
    }

    if(pageName == 'Credits') {
        if(userRoleName == 'staff'){
            document.getElementById("defaultOpen55").click();
        }else{
            document.getElementById("defaultOpen5").click();
        }
    }

    if(pageName == 'Home') {
        if(userRoleName == 'staff'){
            document.getElementById("defaultOpen22").click();
        }else{
            document.getElementById("defaultOpen2").click();
        }
    }

        document.getElementById(pageName).style.display = "block";
  }

</script>
@endsection
