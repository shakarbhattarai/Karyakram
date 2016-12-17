  
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>KaryaKram: All events in one place</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="web/css/style_1.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="web/css/calendar-eightysix-default.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/calendar-eightysix-osx-dashboard.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/calendar-eightysix-vista.css" rel="stylesheet" type="text/css" media="all" />
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
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
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
  console.log(response);
    var eleme = document.getElementById("usernameharu");
        eleme.value = response.id;
  
});
  }
  
  function eventharu(){
     document.getElementById("bujau").click();
      
  }
  
</script>
 
<script src="web/js/jquery.min.js"></script>

<script type="text/javascript" src="web/js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="web/js/mootools-1.2.4.2-more.js"></script>
<script type="text/javascript" src="web/js/calendar-eightysix-v1.0.1.js"></script>
<script type="text/javascript">
		window.addEvent('domready', function() {
			new CalendarEightysix('exampleI', 	 { 'offsetY': -4 });
			new CalendarEightysix('exampleII', 	 { 'startMonday': true, 'format': '%m.%d.%Y', 'slideTransition': Fx.Transitions.Back.easeOut, 'draggable': true, 'offsetY': -4 });
	});	
        
</script>
 
</head>

<body>
  <div class="header-top">
	<div class="wrap">
        <div class="logo">
			<a href="index.php"><img src="web/images/logo.png" alt=""/></a></div><br>
                       
		
		 
		  <div class="buttons">
				<div class="login_btn">
					<a href="search.php">Search Events</a>
				</div>
                                 
			 	<div class="login_btn">
                                    <a href="form.php"><div id="join">Sign up Today</div></a>
				</div>
                       <div class="get_btn">
                           <a href="#"><div id="viewevents" onclick="eventharu()"> View your events </div>
                                      
                                      </a>
                           </div>
				<div class="clear"></div>
		   </div>
	     <div class="clear"></div>
             <h2 class="head">Welcome to<span class="m_1" ><font color=red> Karyakram </font></span></h2> <br><h2 class="head"> Find all the Events, you will want <span class="m_1">to attend</span></h2>
     </div>
      
      <form action="displayyour.php" method="POST">
          <input type="hidden" name="usernames" id="usernameharu"/>
          <input type="submit" id="bujau" style="color: transparent; background-color: transparent; border-color: transparent; cursor: default;" />
          
      </form>
    </div>
     <div class="map">
     	<img src="web/images/map.jpg" width=100% alt=""/>
     </div>
     <div class="content-box">
     	<div class="wrap">
     		<ul class="events">
				<li class="active"><a href="index.html">Featured events</a></li> 
				 
			</ul>
			 
     	   <div class="clear"></div>
     	</div>
     </div>
     
     <div class="main">
     	<div class="wrap">
            
            <?php
             
$servername = "localhost";
$username = "root";
$password = "shakar";
$dbname = "Karyakram";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$eventquery="SELECT * from Events;";
 $event=$conn->query($eventquery) ;
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
                while ($eacheventarray= $event->fetch_assoc()){
                      $eventid=$eacheventarray['Event_id'];
                       $eacheventpic=  strtolower($eacheventarray['Event_Picture']);
                $eventname=$eacheventarray['Event_Name'];
                    
                $eventdesc=$eacheventarray['Event_Description'];
                 
                    $venue="SELECT Name,Address  From Venue WHERE Venue_id="
                            . "(SELECT Venue_id FROM takesplace WHERE Event_id=$eventid)";
                    $venuedetails=$conn->query($venue);
                
                     $venuefinal=$venuedetails->fetch_assoc();
                      $venuename=$venuefinal ['Name'];
                     $venueaddress=$venuefinal['Address'];
                     
 
                
                
                
                echo '
                                  
     		                  <div class="col_1_of_3 span_1_of_3">
                                 <a href="single.php?id=';echo$eventid;echo'">
							<img src="';
                                                        echo trim($eacheventpic);echo'" alt="image01" width="100%">
							 
						</a>    
						 
						 
					 
					<ul class="m_fb">
						<li>
							<span class="m_22"><a href="#"><img src="web/images/fb.png" alt=""/></a></span><span class="middle">Aug 17, 2013 02:00pm-08-00pm IST</span>
						    <span class="m_23"><a href="#"><img src="web/images/heart.png" alt=""/></a></span>
						     <div class="clear"></div>
						</li>
					</ul>
					  <div class="desc">
						<h3 align="center"> <a href="single.php?id=';echo$eventid;echo'">'  ;
                                                echo strtoupper($eventname);
                                                if (strlen($eventname)<16){
                                                    
                                                    echo '<br><br>';
                                                }
                                                echo '</a> </h3>
						<h4 class="m_2" align="center">';echo ($venuename) ; echo'</h4>
						<h5 class="m_3" align="center"> ';echo "in ".$venueaddress;echo'</h5>
                                                 
					   </div>
                                           
					   <div class="section group example"> 
						<div class="col_1_of_2 span_1_of_2">
						   <ul>
							  <li><img src="web/images/men.png" alt=""/><div class="m_desc"><span class="m_2">13%</span><br><span class="m_3">Male</span></div> <div class="clear"></div></li>
						   </ul>
		 				</div>
						<div class="col_1_of_2 span_1_of_2">
						  <ul>
							 <li><img src="web/images/women.png" alt=""/><div class="m_desc"><span class="m_2">87%</span><br><span class="m_3">Fe male</span></div> <div class="clear"></div></li>
						  </ul>
						</div>
						<div class="clear"></div>
		    		  </div>
				</div>
                                 
				
			 
		 ' ;
                }
                ?>
                
                 <div class="clear"></div> 
            </div>
        </div>
    
             
     <div class="footer">
     	<div class="wrap">
     	  <div class="footer-menu">
     		<ul>
				<li class="active"><a href="index.html">Home</a></li> 
				<li><a href="about.html">About eco</a></li> 
				<li><a href="work.html">How it works</a></li> 
				<li><a href="industries.html">Industries</a></li> 
				<li><a href="features.html">Features</a></li>
				<li><a href="pricing.html">Pricing</a></li>
				<li><a href="faq.html">Faq's</a></li>
				<li><a href="features.html">Privacy policy</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="work.html">Terms of service</a></li>
				 
			</ul>
     	  </div>
     	  <div class="footer-bottom">
     	  	<div class="copy">
			   <p>� 2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
		    </div>
		    <div class="social">	
			   <ul>	
				  <li class="facebook"><a href="#"><span> </span></a></li>
				  <li class="twitter"><a href="#"><span> </span></a></li>
				  <li class="linked"><a href="#"><span> </span></a></li>	
				  <li class="arrow"><a href="#"><span> </span></a></li>	
				  <li class="dot"><a href="#"><span> </span></a></li>
				  <li class="rss"><a href="#"><span> </span></a></li>		
			   </ul>
		    </div>
		    <div class="clear"></div>
     	  </div>
       </div>
     </div>
       
         
</body>
</html>

