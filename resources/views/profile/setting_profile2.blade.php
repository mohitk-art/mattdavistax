@extends('back_layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="container mt-5">



                    <!-- --------------<secound-men-bar> -->
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tabs" role="tablist">
                      <li class="nav-item sub-menu">
                        <a class="nav-link active sub-menu" id="pills-info-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-info" aria-selected="true">
                          <img class="text-center" src="http://icons.iconarchive.com/icons/martz90/circle/512/dropbox-icon.png" width="38" height="38"  /> Your Info</a>
                      </li>
                       <li class="nav-item sub-menu">
                        <a class="nav-link" id="pills_Income-tab" data-toggle="pill" href="#pills_Income" role="tab" aria-controls="pills_Income" aria-selected="false"><img class="text-center" src="http://icons.iconarchive.com/icons/martz90/circle/512/dropbox-icon.png" width="38" height="38"  /> Income</a>
                      </li>

                      <li class="nav-item sub-menu">
                        <a class="nav-link" id="pills-Deduction-tab" data-toggle="pill" href="#pills-Deduction" role="tab" aria-controls="pills-Deduction" aria-selected="false">
                        <img class="text-center" src="http://icons.iconarchive.com/icons/martz90/circle/512/dropbox-icon.png" width="38" height="38"  /> Deduction</a>
                      </li>

                    </ul>


                    <!-- <three tab-bar> -->

                    <div class="tab-content bg" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                           <ul class="nav nav-pills mb-3" id="pills-tabs" role="tablist">
                      <li class="nav-item sub-menus">
                        <a class="nav-link active sub-menus" id="pills-Household-tab" data-toggle="pill" href="#pills-Household" role="tab" aria-controls="pills-Household" aria-selected="true">
                          Your Household</a>
                      </li>
                      <li class="nav-item sub-menus">
                        <a class="nav-link" id="pills-Filling-tab" data-toggle="pill" href="#pills-Filling" role="tab" aria-controls="pills-Filling" aria-selected="false">
                          Filling Status</a>
                      </li>
                      <li class="nav-item sub-menus">
                        <a class="nav-link" id="pills-Dependents-tab" data-toggle="pill" href="#pills-Dependents" role="tab" aria-controls="pills-Dependents" aria-selected="false">
                          Dependents</a>
                      </li>
                      <li class="nav-item sub-menus">
                        <a class="nav-link" id="pills-Summary-tab" data-toggle="pill" href="#pills-Summary" role="tab" aria-controls="pills-Summary" aria-selected="false">
                          Summary</a>
                      </li>
                    </ul>


                    <!------------------------ <three show menu bar> -->
                    <div class="tab-pane fade show active" id="pills-Household" role="tabpanel" aria-labelledby="pills-Household-tab">
                    <form id="stepped" action="{{url('your_household')}}" method="POST">
                     <div class="container">
                      <div class="row justify-content-center">
                       <div class="col-md-12">
                        <div class="indicators d-flex justify-content-around py-4 text-light">
                         <div class="rounded-circle bg-secondary px-2 shadow-sm mr-2">1</div>
                         <div class="rounded-circle bg-secondary px-2 shadow-sm mr-2">2</div>
                         <div class="rounded-circle bg-secondary px-2 shadow-sm mr-2">3</div>
                         <div class="rounded-circle bg-secondary px-2 shadow-sm">4</div>
                        </div>
                       </div>
                       <div class="col-md-10">
                        <div class="fix-height position-relative">
                         <div class="steps">
                          <div class="row justify-content-center">


                            <div class="col-sm-6">
                            <div class="form-group">
                             <label for="inp1">Full Name</label>
                             <input type="text" id="inp1" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                           </div>

                           <div class="col-sm-6">
                            <div class="form-group">
                             <label for="inp12">Date of birth</label>
                             <input type="date" id="inp12" class="form-control" name="dob">
                            </div>
                           </div>

                           <div class="col-sm-4">
                            <div class="form-group">
                             <label for="inp12">Marital status</label>
                             <select class="form-control" name="marital_status">
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
                             <input class="ssn form-control" id="ssn" name="ssn"  type="text" placeholder="Social Security number">
                            </div>
                           </div>

                           <div class="col-sm-4">
                            <div class="form-group">
                             <label for="inp12">Phone Number</label>
                             <input class="phone_number form-control" id="phone_number" name="phone_number"  type="text" placeholder="Phone Number">
                            </div>
                           </div>

                          </div>
                         </div>

                         <div class="steps">
                          <div class="form-group"><center>
                              <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/Transition1.svg" style="
                              height: 104px;">
                           <h3 class="title"> Now, let’s answer some simple tax questions.</h3>
                            <span class="sub_litle">This is what you came here for, after all.</span></center>
                          </div>
                         </div>

                         <div class="steps">
                          <div class="form-group">

                            <center>
                                <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                height: 104px;">
                             <h3 class="title">Were you a U.S. citizen in 2019? </h3>
                              <span class="sub_litle">This is what you came here for, after all.</span>
                              <br><br>
                              <label class="switch switch-left-right">
                                <input class="switch-input" type="checkbox" checked name="us_citizen"/>
                                <span class="switch-label" data-on="yes" data-off="no"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </center>
                          </div>
                         </div>
                         <div class="steps">
                          <div class="form-group">
                            <center>
                                <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                height: 104px;">
                             <h3 class="title">Is that person actually claiming you on their return? </h3>
                              <br><br>
                              <label class="switch switch-left-right">
                                <input class="switch-input" type="checkbox" checked name="person_actually_claiming"/>
                                <span class="switch-label" data-on="yes" data-off="no"></span>
                                <span class="switch-handle"></span>
                            </label>
                            </center>

                          </div>
                         </div>

                         <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Can someone else claim you as a dependent?</h3>
                                 <span class="sub_litle">This helps us know what tax breaks we can get you.</span>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="claim_you_dependent"/>
                                    <span class="switch-label" data-on="yes" data-off="no"></span>
                                    <span class="switch-handle"></span>
                                </label>
                                </center>
                            </div>
                           </div>

                           <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Have you been affected by a federal disaster?</h3>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="federal_disaster"/>
                                    <span class="switch-label" data-on="yes" data-off="no"></span>
                                    <span class="switch-handle"></span>
                                </label>
                                </center>
                            </div>
                           </div>




                           <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Were you a student in 2019?</h3>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="student_2019"/>
                                    <span class="switch-label" data-on="yes" data-off="no"></span>
                                    <span class="switch-handle"></span>
                                </label>
                                </center>
                            </div>
                           </div>

                           <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Were you a full- or part-time student?</h3>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="student_type"/>
                                    <span class="switch-label" data-on="I was a full-time student." data-off="I was a part time student."></span>
                                    <span class="switch-handle"></span>
                                </label>
                                </center>
                            </div>
                           </div>

                                                    <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Are you that person’s qualifying child?</h3>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="qualifying_child"/>
                                    <span class="switch-label" data-on="yes" data-off="no"></span>
                                    <span class="switch-handle"></span>
                                 </label>
                                </center>
                            </div>
                           </div>

                           {{-- <div class="steps">
                            <div class="form-group">
                                <center>
                                    <img src="https://taxes.hrblock.com/HRBlock/Templates/Premium/Images/PI/citizenship.svg" style="
                                    height: 104px;">
                                 <h3 class="title">Are you that person’s qualifying child?</h3>
                                  <br><br>
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" checked name="qualifying_child"/>
                                    <span class="switch-label" data-on="yes" data-off="no"></span>
                                    <span class="switch-handle"></span>
                                 </label>
                                </center>
                            </div>
                           </div> --}}

                        </div>
                       </div>
                       <div class="col-md-8 text-right"><br><br><br><br>
                        <button type="button" class="btnPrev btn btn-outline-success">Prev</button>
                        <button type="button" class="btnNext btn btn-outline-success" name="">Next</button><br><br>
                       </div>
                      </div>
                     </div>
                    </form>
                    <!-- /.MultiStep Form -->
                    <!-- <button type="button" class="btn btn-secondary">Back</button>
                    <button type="button" class="btn btn-info">Next</button> -->
                      </div>


                    <div class="tab-pane fade" id="pills-Filling" role="tabpanel" aria-labelledby="pills-Filling-tab">
                        Filling Status
                      </div>
                      <div class="tab-pane fade" id="pills-Dependents" role="tabpanel" aria-labelledby="pills-Dependents-tab">
                      Dependents
                      </div>
                      <div class="tab-pane fade" id="pills-Summary" role="tabpanel" aria-labelledby="pills-Summary-tab">
                      Summary
                      </div>
                      </div>





                    <!-- ---------------<secound show-menu-bar> -->
                      <div class="tab-pane fade" id="pills_Income" role="tabpanel" aria-labelledby="pills_Income-tab">

                               <p class="text-bold">Income</p>
                      </div>
                     <div class="tab-pane fade" id="pills-Deduction" role="tabpanel" aria-labelledby="pills-Deduction-tab">

                               <p class="text-bold">Deduction</p>
                      </div>
                       <div class="tab-pane fade" id="pills-Credits" role="tabpanel" aria-labelledby="pills-Credits-tab">

                               <p class="text-bold">Credits</p>
                      </div>
                       <div class="tab-pane fade" id="pills-Taxes" role="tabpanel" aria-labelledby="pills-Taxes-tab">

                               <p class="text-bold">Taxes</p>
                      </div>
                         <div class="tab-pane fade" id="pills-Wrap" role="tabpanel" aria-labelledby="pills-Wrap-tab">

                               <p class="text-bold">Wrap</p>
                      </div>
                    </div>


                      </div>


                    </div>
                    </div>


            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
    class MultiStep {
     constructor(formId) {
      let myForm = document.querySelector(formId),
       steps = myForm.querySelectorAll(".steps"),
       btnPrev = myForm.querySelector(".btnPrev"),
       btnNext = myForm.querySelector(".btnNext"),
       indicators = myForm.querySelectorAll(".rounded-circle"),
       inputClasses = ".form-control",
       currentTab = 0;

      // we'll need 4 different functions to do this
      showTab(currentTab);

      function showTab(n) {
       steps[n].classList.add("active");
       if (n == 0) {
        btnPrev.classList.add("hidden");
        btnPrev.classList.remove("show");
       } else {
        btnPrev.classList.add("show");
        btnPrev.classList.remove("hidden");
       }
       if (n == steps.length - 1) {
        btnNext.textContent = "Submit";
       } else {
        btnNext.textContent = "Next";
       }
       showIndicators(n);
      }

      function showIndicators(n) {
       for (let i = 0; i < indicators.length; i++) {
        indicators[i].classList.replace("bg-warning", "bg-success");
       }
       indicators[n].className += "bg-warning";
      }

      function clickerBtn(n) {
       if (n == 1 && !validateForm()) return false;
       steps[currentTab].classList.remove("active");
       currentTab = currentTab + n;
       if (currentTab >= steps.length) {
        myForm.submit();
        return false;
       }
       showTab(currentTab);
      }
   // Do whatever validation you want
      function validateForm() {
       let input = steps[currentTab].querySelectorAll(inputClasses),
        valid = true;
       for (let i = 0; i < input.length; i++) {
        if (input[i].value == "") {
         if (!input[i].classList.contains("invalid")) {
          input[i].classList.add("invalid");
         }
         valid = false;
        }
        if (!input[i].value == "") {
         if (input[i].classList.contains("invalid")) {
          input[i].classList.remove("invalid");
         }
        }
       }
       return valid;
      }
      btnPrev.addEventListener("click", () => {
       clickerBtn(-1);
      });
      btnNext.addEventListener("click", () => {
       clickerBtn(1);
      });
     }
    }
    let MS = new MultiStep("#stepped");
   });


   $('.ssn').inputmask('999-99-9999');

   $('.phone_number').inputmask('999-999-9999');



   </script>

@endsection
