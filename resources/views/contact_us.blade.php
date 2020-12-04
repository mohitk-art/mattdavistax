@extends('fornt_layouts.app')

@section('content')

<br><br><br><br><br>
<div class="container">
    <div class="innerwrap">

        <section class="section1 clearfix">
            <div class="textcenter">
                <span class="shtext">Contact Us</span>
                <span class="seperator"></span>
                <h1>Get in Touch</h1>
            </div>
        </section>

        <section class="section2 clearfix">
            <div class="col2 column1 first">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div class="sec2map" style='overflow:hidden;height:550px;width:100%;'><div id='gmap_canvas' style='height:100%;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(19.075314480255834,72.88153973865361),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.075314480255834,72.88153973865361)});infowindow = new google.maps.InfoWindow({content:'<strong>My Location</strong><br>mumbai<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <div class="col2 column2 last">
                <div class="sec2innercont">
                    <div class="sec2addr">
                        <p>We have been in the same location for 10 years.
Stop by, schedule an appointment, or contact us by phone for your tax preparation needs.
We are in the office Monday through Saturday 9:00am to 6:00pm  starting January 2, 2020.</p>
<p>
701 N Main Street
Rushville, IN 46173
765.932.8650</p>
                        <p><span class="collig">Phone :</span> +91 976885083</p>
                        <p><span class="collig">Email :</span> vivek.mengu016@gmail.com</p>
                        <p><span class="collig">Fax :</span> +91 9768850839</p>
                    </div>
                </div>
                <div class="sec2contactform">
                    <h3 class="sec2frmtitle">Want to Know More?? Drop Us a Mail</h3>
                    <form action="">
                        <div class="clearfix">
                            <input class="col2 first" type="text" placeholder="FirstName">
                            <input class="col2 last" type="text" placeholder="LastName">
                        </div>
                        <div class="clearfix">
                            <input  class="col2 first" type="Email" placeholder="Email">
                            <input class="col2 last" type="text" placeholder="Contact Number">
                        </div>
                        <div class="clearfix">
                            <textarea name="textarea" id="" cols="30" rows="7">Your message here...</textarea>
                        </div>
                        <div class="clearfix"><input type="submit" value="Send"></div>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>

@endsection
