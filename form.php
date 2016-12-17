<!DOCTYPE html> 
<html>
<head> 
<title></title>
<link href="web/css/formstyle.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="web/css/calendar-eightysix-default.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/calendar-eightysix-osx-dashboard.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/calendar-eightysix-vista.css" rel="styllesheet" type="text/css" media="all" /> 
<script type="text/javascript" src="web/js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="web/js/mootools-1.2.4.2-more.js"></script>
<script type="text/javascript" src="web/js/calendar-eightysix-v1.0.1.js"></script>
<script type="text/javascript">
		window.addEvent('domready', function() {
			new CalendarEightysix('exampleI', 	 { 'offsetY': -4 });
			new CalendarEightysix('exampleII', 	 { 'startMonday': true, 'format': '%m.%d.%Y', 'slideTransition': Fx.Transitions.Back.easeOut, 'draggable': true, 'offsetY': -4 });
	});	
</script>
 <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      console.log(response.authResponse.accessToken);
       
       
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
       
        window.location.href = "checklogin.php? ";    
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
       
       
        window.location.href = "checklogin.php";  
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '695016313978068',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('join').innerHTML =
        'Get Listed Today';
 
       
      
    });
    FB.api('/me?fields=id,name', function(response) {
        
  
        var eleme = document.getElementById("idhoyo");
        eleme.value = response.id;
        
        var elem = document.getElementById("idhoyonaam");
        elem.value = response.name;
        
        
  
});
  }
  
</script>
 
 <script>
     function countChar(val) {
        var len = val.value.length;
        if (len >= 150) {
          val.value = val.value.substring(0, 150);
        } else {
          $('#remain').text(150- len+" characters left");
        }
      };
 </script>
     <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 250px;
        width:50%
        margin: 0px;
        padding: 0px
      }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

    

    </style>
   
<link rel="stylesheet" href="jquery/jqueryCalendar.css">
 
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

    <script>
function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(27.7089603,85.3261328),
    zoom: 13
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
 var latform = /** @type {HTMLInputElement} */(
      document.getElementById('latitude'));
 var longform = /** @type {HTMLInputElement} */(
      document.getElementById('longitude'));

  var types = document.getElementById('type-selector');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    var lat = place.geometry.location.lat(),
        lng = place.geometry.location.lng();
    console.log(lat,lng);


    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    } 
   
    

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
 
</head>
      
 <body >
  
 <div class="header-top">
	<div class="wrap">
        <div class="logo">
			<a href="index.html"><img src="web/images/logo.png" alt=""/></a>
		</div>
		<div class="cssmenu">
		  <nav id="nav" role="navigation">
			<a href="#nav" title="Show navigation">Show navigation</a>
			<a href="#" title="Hide navigation">Hide navigation</a>
			<ul class="clearfix">
				<li class="active"><a href="index.html"> </a></li>
				<li><a href="start.html"><span> </span></a></li>
				<li><a href="work.html"><span> </span></a></li>
				<li><a href="pricing.html"> </a></li>
				<li><a href="support.html"> </a></li>
				 
			</ul>
		    </nav>
		  </div> 
		  <div class="buttons">
				<div class="login_btn">
					<a href="login.html">Browse events</a>
				</div>
				<div class="get_btn">
                                    <a href="form.html"><div id='join'>Sign up</div></a>
				</div>
				<div class="clear"></div>
		   </div>
	     <div class="clear"></div>
		<h2 class="head">Welcome <span class="m_1">to karyakram </span></h2>  
     </div>
    </div>
    <fieldset >
    <legend>   <h4 class="head"> Fill out accurate details to the fields below:</h4>   </legend>
    <div  class="main" >
  <form action="submit.php" method="post"  enctype="multipart/form-data" >
  <h1 class="basic-grey"> Step 1 of 2</h1>
   
       
      
        
        <input  id="idhoyo" type="hidden" name="username" placeholder="Username" required />
        
      
        
        <input   id="idhoyonaam" type="hidden" name="name_user" placeholder="Password" required/>
     
     
  <fieldset class="basic-grey">
    <h1>Organizer 
        
    </h1>
    <label>
        <span > Name :</span>
        <input  type="text" name="org_name" placeholder="Full Name of the Organizer" required />
    </label>
   
    <label>
        <span>Email :</span>
        <input type="email" name="org_email" placeholder="Valid Email Address" />
    </label>
   
    <label>
        <span>Contact Number (Primary) :</span>
        <input id="contact" type="text" name="org_number1" placeholder="Valid Contact Number with country code" />
    </label>
       <label>
        <span>Contact Number (Alternate) :</span>
        <input id="contact" type="text" name="org_number2" placeholder="Valid Contact Number with country code" />
    </label>
      
   
    </fieldset>    
   <fieldset class="basic-grey"  >
    <h1>Event 
        
    </h1>
    <label>
        <span > Event Name :</span>
        <input  type="text" name="event_name" placeholder="Full Name of the Event" required >
    </label>
   
     
       <label>
        <span>Event Picture :</span>
        <input type="file" name="file_upload" ><br><br>
        
        </label>
        <label>
        <span>Start Date :</span>
        
	 
             <input id="exampleI" name="startdate" value="name" type="text" maxlength="10" > 
	 
			  
       
         
    </label>
       <label>
        <span>End Date :</span>
            <input id="exampleII" name="enddate" value="name" type="text" maxlength="10" > 

    </label>
     
    <label>
        <span>Event Description :</span>
        <textarea id="event_desc" name="event_desc" placeholder="Write descriptive words about your event in a maximum of 150 characters"  
               onkeyup="countChar(this)" onblur="  $('#remain').style.color='white';"></textarea>
    </label>
   
     <label>
     <span>Event Category</span>
     <select name="event_cat">
  <option value="Educational">Educational</option>
  <optgroup label="Entertainment">
  <option value="Sports">Sports</option>
  <option value="Concert">Concert</option>
  <option value="Party">Party</option>
  <option value="Fest">Fest</option>
  <option value="Others">Others</option>
</optgroup>
  <option value="Seminar">Seminar</option>
  
 
</select>
</label>
    
   
    </fieldset>    
    
    
    <fieldset class="basic-grey">
    <h1>Venue
        
    </h1>
    <label>
        <span > Name :</span>
        <input  type="text" name="venue_name" placeholder="Full Name of the Venue" required />
    </label>
   
    <label>
        <span>Venue website/Facebook Page Url :</span>
        <input id="email" type="text" name="venue_site" placeholder="https://www.facebook.com/VenueName" />
    </label>
   
    <label>
        <span>Contact Number  :</span>
        <input id="contact" type="text" name="venue_no" placeholder="Valid Contact Number with country code" />
    </label>
    <label>
	<span>Address</span>
<input id="pac-input" class="controls" type="text"
        placeholder="Enter a location" name="venue_address">
<input id="latitude" class="controls" type="text"
          name="latitudes">
<input id="longitude" class="controls" type="text"
         name="longitudes">
    
    <div id="map-canvas"></div>
      </label> 
     
    </fieldset>   
     <label class="basic-grey">
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Next" />
    </label> 
</form> 
 
<fieldset>
</div>
</fieldset>
 
     </body>
      </html>
<?php
?>