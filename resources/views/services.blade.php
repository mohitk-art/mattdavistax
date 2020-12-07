@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Services</h1>
        <p>We offer options to fit your busy schedule!</p>
    </div>
</section>

<section class="pb-5 pt-5" id="services">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-4 col-sm-6">
              <div class="img">
                  <img class="img-responsive w-100" src="{{ url('fornt/images/tax.png')}}">
              </div>
            </div>
        <div class="col-lg-8 col-sm-8">
            <h6 class="walks">WALK-INS</h6>
            <hr />
            <p class="disc-text">We welcome walk-ins and will serve
            those first come first serve around our scheduled appointments. We can also add your name to a text list to allow you to finish other errands and send you a text
​ 				10 minutes prior to your turn in line. </p>
            </div>
          </div>
      <div class="row mb-5">
      <div class="col-lg-8 col-sm-8">
            <h6 class="walk">​DROP-OFFS</h6>
                <hr />
            <p class="disc-text">Simply stop by the office and drop-off your information and we will give you a call or text when it is completed and ready to be reviewed and signed. </p>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="img">
                  <img class="img-responsive w-100" src="{{ url('fornt/images/drop.png')}}">
              </div>
            </div>
        </div>
            <div class="row">
              <div class="col-lg-4 col-sm-6">
              <div class="img">
                  <img class="img-responsive w-100" src="{{ url('fornt/images/appointment.png')}}">
              </div>
            </div>
        <div class="col-lg-8 col-sm-8">
            <h6 class="walk pt">APPOINTMENTS</h6>
            <hr />
            <p class="disc-text pt">Schedule your appointment online or
​by phone. To avoid long wait lines and
secure a set date and time to fit your schedule. Appointments also available for select Sundays and after hour times to increase accommodation.   </p>
            </div>

        </div>
    </div>
</section>

@endsection
