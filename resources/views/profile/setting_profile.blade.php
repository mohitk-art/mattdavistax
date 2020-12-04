@extends('back_layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            @include('error_message')
                <button class="tablink" onclick="openPage('Home', this, '#4CAF50')" id="defaultOpen">Your Information</button>
                <button class="tablink" onclick="openPage('Income', this, '#4CAF50')">Income</button>
                <button class="tablink" onclick="openPage('Deductions', this, '#4CAF50')" >Deductions</button>
                <button class="tablink" onclick="openPage('Credits', this, '#4CAF50')" >Credits</button>
                <button class="tablink" onclick="openPage('About', this, '#4CAF50')">About</button>

                <div id="Home" class="tabcontent">
                            <div class="tab">
                                <button class="tablinks2 active" onclick="openCity(event, 'Your_Household')" id="defaultOpen2">Your Household</button>
                                {{-- <button class="tablinks2" onclick="openCity(event, 'Dependents')">Dependents</button> --}}
                                <button class="tablinks2" onclick="openCity(event, 'Address')">Address</button>
                                <button class="tablinks2" onclick="openCity(event, 'Summary')">Summary</button>
                            </div>

                            <div id="Your_Household" class="tabcontent2">
                            <form id="regForm" action="{{url('your_household',$users->id)}}" method="POST">
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab2">
                                    <br><br><br>
                                <div oninput="this.className = ''">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                         <label for="inp1">Full Name</label>
                                        <input type="text" id="inp1" class="form-control" name="name" value="{{$users->name}}" required>
                                        </div>
                                       </div>

                                       <div class="col-sm-6">
                                        <div class="form-group">
                                         <label for="inp12">Date of birth</label>

                                         <input type="date" id="inp12" class="form-control" name="dob" required  value="{{isset($user_details) ? $user_details->dob : ''}}">
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
                                    <div style="margin-top: 25%"></div>
                                </div>

                                <div class="tab2 next_question">
                                    <div oninput="this.className = ''">
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/Transition1.svg" style="
                                        height: 104px;">
                                    <h3 class="title"> Now, let’s answer some simple tax questions.</h3>
                                    <span class="sub_litle">This is what you came here for, after all.</span></center>
                                    </div>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                     <h3 class="title">Were you a U.S. citizen in 2019? </h3>
                                      <span class="sub_litle">This is what you came here for, after all.</span>
                                      <div class="middle">
                                        <label><input type="radio" name="us_citizen_in_2019" checked value="yes"/>
                                        <div class="front-end box"><span>Yes</span></div>
                                      </label>
                                        <label><input type="radio" name="us_citizen_in_2019" value="no"/>
                                         <div class="back-end box"><span>No</span></div>
                                       </label>
                                      </div>
                                     </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                     <h3 class="title">Is that person actually claiming you on their return? </h3>
                                        <div class="middle">
                                            <label><input type="radio" name="person_actually_claiming" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="person_actually_claiming" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                     <h3 class="title">Can someone else claim you as a dependent?</h3>
                                     <span class="sub_litle">This helps us know what tax breaks we can get you.</span>
                                        <div class="middle">
                                            <label><input type="radio" name="claim_you_dependent" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="claim_you_dependent" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                     <h3 class="title">Did you live in the U.S for more than six months in 2019?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="live_us_more_than_six" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="live_us_more_than_six" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                         <h3 class="title">Have you been affected by a federal disaster?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="federal_disaster" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="federal_disaster" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                           <h3 class="title">Were you a student in 2019?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="student_2019" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>
                                            <label><input type="radio" name="student_2019" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                             <h3 class="title">Were you a full- or part-time student?</h3>
                                        <div class="middle">
                                            <label><input type="radio" name="student_type" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="student_type" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                              <h3 class="title">Are you that person’s qualifying child?</h3>


                                        <div class="middle">
                                            <label><input type="radio" name="qualifying_child" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="qualifying_child" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>

                                <div class="tab2">
                                    <center>
                                        <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                        height: 104px;">
                                              <h3 class="title">Are you that person’s qualifying child?</h3>


                                        <div class="middle">
                                            <label><input type="radio" name="qualifying_child" checked value="yes"/>
                                            <div class="front-end box"><span>Yes</span></div>
                                          </label>

                                            <label><input type="radio" name="qualifying_child" value="no"/>
                                             <div class="back-end box"><span>No</span></div>
                                           </label>
                                          </div>
                                    </center>
                                </div>


                                <div style="overflow:auto;">
                                <div style="margin-top: 10%;text-align: center;">
                                    <button type="button" class="prevBtn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="nextBtn" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                </div>
                            </form>
                            </div>

                            <div id="Dependents" class="tabcontent2">
                                <h3>Paris</h3>
                                <p>Paris is the capital of France.</p>
                            </div>



                            <div id="Address" class="tabcontent2">
                                <center>
                                <form action="{{url('post_address',$users->id)}}" method="POST">
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/Address.svg" style="
                                    height: 104px;">
                                 <h3 class="title"> What's your current address?</h3>

                                 <div style="margin-top: 5%"></div>

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

                                   <button type="submit" name="submit" value="Submit" class="nextBtn">Submit</button>

                                   <div style="margin-top: 5%"></div>
                                </form>
                            </center>
                            </div>

                            <div id="Summary" class="tabcontent2">
                                <center>
                                    <h3 class="title">We've enjoyed getting to know you, himahh!</h3>
                                    <span class="sub_litle">Here's everything you've told us so far.</span>

                                    <br>   <br>   <br>
                                <span class="bold_title"> Your Household  <i class="fa fa-pencil-square-o fafaicon" aria-hidden="true"  onclick="openCity(event, 'Your_Household')"></i><br><br></span>
                                {{isset($users) ? $users->name : ''}}<br>
                                {{isset($users) ? $users->phone : ''}}<br>
                                <hr class="hr_line">


                                <span class="bold_title">Your Address   <i class="fa fa-pencil-square-o fafaicon" aria-hidden="true"  onclick="openCity(event, 'Address')"></i>
                                </span><br><br>
                                {{isset($user_details) ? $user_details->address : ''}}
                                <br>
                                {{isset($user_details) ? $user_details->zip : ''}}<br>
                                {{isset($user_details) ? $user_details->state : ''}}
                                <hr class="hr_line">

                                <span class="bold_title">
                                    Your Filing Status  <i class="fa fa-pencil-square-o fafaicon" aria-hidden="true"  onclick="openCity(event, 'Your_Household')"></i><br><br></span>
                                    {{isset($user_details) ? $user_details->marital_status : ''}}
                                <hr class="hr_line">

                            </center>
                            </div>
                </div>

                <div id="Deductions" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2" onclick="openCity(event, 'upload_document')">Upload Deductions Document </button>
                        <button class="tablinks2" onclick="openCity(event, 'Uploaded_document')">Summary</button>
                    </div>

                    <div id="upload_document" class="tabcontent2">
                    <center>
                        <h3 class="title"> Now, let’s upload your FORM 1098</h3>
                        <span class="sub_litle">Drag and drop all of your 1098s into the box below (or click to upload).</span></center>
                        <form action="{{ route('users.deductionDocument',0) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                            @csrf
                            <input type="hidden" value="{{$users->id}}" name="userId">
                        </form>
                    </center>
                    </div>
                    <div id="Uploaded_document" class="tabcontent2">
                        Here is All Deduction Upload Document List:
                        <br> <br> <br> <br>
                         @if(count($userDocuments) > 0)
                            @foreach($userDocuments as $userDocument)
                            <div class="col-sm-4">
                                @if($userDocument->document_name == "Deductions")
                                    @if($userDocument->document_type =='pdf')
                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="display: unset;"><a href="{{ url('deduction_documents',$userDocument->document_url) }}" target="_blank" class="view_pdf"/>View Pdf</a></i>
                                    @else
                                        <img src="{{ url('deduction_documents',$userDocument->document_url) }}" style="height:100px" class="view_document">
                                    @endif
                                @endif
                            </div>
                            @endforeach
                         @endif
                         <div style="margin-top: 20%"></div>
                    </div>
                </div>

                <div id="Income" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2 active" onclick="openCity(event, 'upload_income')" id="defaultOpen3">Upload Income Document</button>
                        <button class="tablinks2" onclick="openCity(event, 'income_document')">Summary</button>
                    </div>
                    <div id="upload_income" class="tabcontent2">
                        <center>
                            <h3 class="title"> Now, let’s upload your Income Document</h3>
                            <span class="sub_litle">Drag and drop all of your Income.</span></center>
                            <form action="{{ route('users.deductionDocument',1) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                                @csrf
                            <input type="hidden" value="{{$users->id}}" name="userId">
                            </form>
                        </center>
                    </div>

                    <div id="income_document" class="tabcontent2">
                        Here is All Deduction Upload Document List:
                        <br> <br> <br> <br>
                         @if(count($userDocuments) > 0)
                            @foreach($userDocuments as $userDocument)
                            <div class="col-sm-4">
                                @if($userDocument->document_name == "Income")
                                    @if($userDocument->document_type =='pdf')
                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="display: unset;"><a href="{{ url('income_documents',$userDocument->document_url) }}" target="_blank"/>View Pdf</a></i>
                                    @else
                                        <img src="{{ url('income_documents',$userDocument->document_url) }}" style="height:100px">
                                    @endif
                                @endif
                            </div>
                            @endforeach
                         @endif
                       <div style="margin-top: 20%"></div>

                    </div>
                </div>


                <div id="Credits" class="tabcontent">
                    <div class="tab">
                        <button class="tablinks2" onclick="openCity(event, 'upload_credits')">Upload Credits Document</button>
                        <button class="tablinks2" onclick="openCity(event, 'credits_document')">Summary</button>
                    </div>
                    <div id="upload_credits" class="tabcontent2">
                        <center>
                            <h3 class="title">1098-T Tuition and expenses for college and other higher education</h3>
                          </center>
                            <form action="{{ route('users.deductionDocument',2) }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                                @csrf
                            <input type="hidden" value="{{$users->id}}" name="userId">
                            </form>
                        </center>
                    </div>

                    <div id="credits_document" class="tabcontent2">
                        Here is All Deduction Upload Document List:
                        <br> <br> <br> <br>
                         @if(count($userDocuments) > 0)
                            @foreach($userDocuments as $userDocument)
                            <div class="col-sm-4">
                                @if($userDocument->document_name == "Credits")
                                    @if($userDocument->document_type =='pdf')
                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="display: unset;"><a href="{{ url('credit_documents',$userDocument->document_url) }}" target="_blank"/>View Pdf</a></i>
                                    @else
                                        <img src="{{ url('credit_documents',$userDocument->document_url) }}" style="height:100px">
                                    @endif
                                @endif
                            </div>
                            @endforeach
                         @endif
                       <div style="margin-top: 20%"></div>

                    </div>
                </div>


                <div id="About" class="tabcontent">
                  <h3>About</h3>
                  <p>Who we are and what we do.</p>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script type="text/javascript">
   $('.ssn').inputmask('999-99-9999');
   $('.phone_number').inputmask('999-999-9999');
   $('.zip').inputmask('99999-9999');
</script>

<script type="text/javascript">
     Dropzone.options.imageUpload ={
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
    };



</script>
@endsection
