<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Array
(
    [file_upload] => Arrlay
    (
        [name] => e4f.png
        [type] => image/png
        [tmp_name] => /Applications/MAMP/tmp/php/phpodzfRk
        [error] => 0
        [size] => 328119
    )
)
 */
 
// Check for errors
if($_FILES['file_upload']['error'] > 0){
     echo ('An error ocurred when uploading.No image taken');
      
}
else {

if(!getimagesize($_FILES['file_upload']['tmp_name'])){
     die('Please ensure you are uploading an image.');
}

// Check filetype
if  (!(in_array(($_FILES['file_upload']['type']), array('image/png','image/jpg','image/jpeg','image/bmp')))){
     die('Unsupported filetype uploaded.');
}

// Check filesize
if($_FILES['file_upload']['size'] >2000000){
     die('File uploaded exceeds maximum upload size.');
}

// Check if the file exists
if(file_exists('upload/' . $_FILES['file_upload']['name'])){
    die('File with that name already exists.');
}

// Upload file
if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'uploads/' .strtolower($_FILES['file_upload']['name']))){
     die('Error uploading file - check destination is writeable.');
}


echo "('File uploaded successfully.')";
$imagename="uploads/".$_FILES['file_upload' ]['name'];


}
        
        
        
        
        
        
        
        
        
        
        

session_start();
$servername="localhost";
$database="Karyakram";
$username="root";
$password="shakar";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

// Getting username and password
$user_name= addslashes($_POST["username"]);
$name_user= addslashes($_POST["name_user"]);
echo $name_user;   
echo $user_name;  

// Getting organizer's information

$organizer_name= addslashes($_POST["org_name"]);
$organizer_email=addslashes($_POST["org_email"]);
$organizer_numberone=  addslashes($_POST["org_number1"]);
$organizer_numbertwo=  addslashes($_POST["org_number2"]);

//Getting event's information
$event_name=addslashes($_POST["event_name"]);
 
$event_desc=addslashes($_POST["event_desc"]);
$event_category=addslashes($_POST["event_cat"]);

$final_category="";


//Getting venue's information
$venue_name=addslashes($_POST["venue_name"]);
$venue_site=addslashes($_POST["venue_site"]);
$venue_number=$_POST["venue_no"];
$venue_address=$_POST["venue_address"];

$start_date=$_POST['startdate'];
$end_date=$_POST['enddate'];



?>


<html>
<head> 
<title></title>
<link href="web/css/formstyle.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
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
				<li><span> </span></li>
				<li><span> </span></li>
				<li></li>
				<li></li>
				
			</ul>
		    </nav>
		  </div>
		  <div class="buttons">
				<div class="login_btn">
					<a href="login.html">Browse events</a>
				</div>
				<div class="get_btn">
					<a href="form.html">Get Listed Today</a>
				</div>
				<div class="clear"></div>
		   </div>
	     <div class="clear"></div>
		<h2 class="head">Welcome <span class="m_1">to karyakram </span></h2> <br><h3 class="head">Find all the Events, you will want <span class="m_1">to attend</span></h3>
     </div>
    </div>
    <h4 class="head"  align="left" > Fill out accurate details to the fields below:</h4> 
    <div  class="main" >
  <form action="final.php" method="post"  >
  <fieldset class="basic-grey">
<fieldset >
    <h1 class="basic-grey"> <?php echo '<font size="6" color="brown">'.stripcslashes( $event_name).'<font  size="6" color="grey">  by  </font>'.$organizer_name.'</font>'; ?></h1>

        <?php
if (in_array($event_category, array("Fest", "Concert", "Party", "Sports"))) {
    $final_category="Entertainment";
?>

       
<form action="" method="post">

	
	Target Age:<br>
	
	<select name="TargetAgeLow">
	 <?php
	 	for ($j=12;$j<=90;$j++){
		echo "<option value=".$j." >".$j."</option>";
	}
         
	 
	 ?>
         
	</select>
        <br> <h4> to </h4>
        <select name="TargetAgeHigh">
	 <?php
	 	for ($j=12;$j<=90;$j++){
		echo "<option value=".$j." >".$j."</option>";
	}
	 
	 ?>
         
	</select>
	
	
	
	<br>
	Ticket Price:<br>
	<input type="text" name="TicketPrice"><br>
	
	</fieldset>

    <fieldset>
       <?php 
        if ($event_category=="Fest"){ ?>
            
	 
	
	Theme:<br>
	<textarea  name="Themefest" rows="2" cols="25"></textarea>
	<br>
	Description:<br>
        <textarea  name="Descriptionfest" rows="6" cols="100"></textarea>
	<br>
	
	
            
        <?php } 
        else if ($event_category=="Concert") { ?>
            
            
            <fieldset>
	
	Performer1:<br>
	<input  type="text" name="Performer1">
	<br>
	Performer2:<br>
        <input  type="text" name="Performer2">

	<br>
	Performer3:<br>
	<input  type="text" name="Performer3">
        <br>
	Genre:<br>
	<input type="text" name="genre" size="20">
	<br>
	<input type="submit" value="SUBMIT">
	</fieldset>
       
        <?php
        }
         else if ($event_category=="Party") { ?>
            
            
        Theme:<br>
	<textarea  name="Theme" rows="2" cols="25"></textarea>
	<br>
	Supplementary:<br>
	<textarea  name="Supplementary" rows="2" cols="25"></textarea>
	<br>
	<input type="submit" value="SUBMIT">
       tar
        <?php
        }
          else if ($event_category=="Sports")  {?>
            Name of the sport:
                <input type="text" name="Name_of_the_sport"> <br>
                Team A:
                <input type="text" name="TeamA"><br>
                Team B:
                <input type="text" name="TeamB"><br>
                Tournament name:
                <input type="text" name="Tournamentname"><br>
                Tournament position:
                <input type="text" name="Tournamentposition"><br>

         <?php
        }
        ?>
    </fieldset>
	

<?php }
    elseif ($event_category=="Educational"){ 
        $final_category="Educational";
        ?>
        Target Level:<br>
	<select name="Target">
	<option value="School">School</option>
	<option value="HighSchool">High School</option>
	<option value="UnderGraduate">UnderGraduate</option>
	<option value="Graduate">Graduate</option>
	<option value="One of these">One of these</option>
	<option value="All">All</option>
	</select>
	<br>
	Description:<br>
	<textarea  name="description" rows="5" cols="100"></textarea>
	<br>
	


    <?php }
    else {
         $final_category="Others";
        
        
    }
?>
  </fieldset>
 <input type="submit" class="button" value="Submit" />
</form>
      
   
    


<?php

$sql = "INSERT INTO Organizer (Name,Email)
VALUES ('$organizer_name','$organizer_email');";
$event= "INSERT INTO Events (Event_Name,Event_picture,Event_Description) VALUES ('$event_name','$imagename','$event_desc');";
$venue="INSERT INTO Venue (Name,Address,Phone_Number,Website) VALUES ('$venue_name','$venue_address','$venue_number','$venue_site');";  
$logindata="INSERT INTO LoginData VALUES ('$user_name','$name_user');"; 
$_SESSION['usernames']=$user_name;
// For logindata
if ($connection->query($logindata) === TRUE) {
    
    echo "New record created successfully for";
     
      
     
} else {
    echo ( "Error: " . $logindata . "<br>" . $connection->error);
} 


// For Organizer
if ($connection->query($sql) === TRUE) {
    echo "New record created successfully";
    $inserted_organizer_id = $connection->insert_id ;
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
} 
$PhoneNumber="INSERT INTO PhoneNumber (Organizer_Id,PhoneNumber)"
        . " VALUES ('$inserted_organizer_id','$organizer_numberone'), ('$inserted_organizer_id','$organizer_numbertwo');";

// For phone number
if ($connection->query($PhoneNumber)=== TRUE ){
    echo "New record created successfully venue";
    
   
    
    
   
} else {
    echo "Error: " . $PhoneNumber . "<br>" . $connection->error;
}




// For Venue
if ($connection->query($venue)=== TRUE ){
    echo "New record created successfully venue";
    
    $inserted_venue_id = $connection->insert_id;
    
    
    $_SESSION['venue_id']=$inserted_venue_id;
} else {
    echo "Error: " . $venue . "<br>" . $connection->error;
}
// For Event
if ($connection->query($event)=== TRUE ){
    
    $inserted_event_id = $connection->insert_id;
    
    $_SESSION['event_id']=$inserted_event_id;
} else {
    echo "Error: " . $event . "<br>" . $connection->error;
}


$takesplace="INSERT INTO takesplace (Event_id,Venue_id,Start_Date,End_Date) VALUES
      ('$inserted_event_id','$inserted_venue_id',STR_TO_DATE('$start_date','%m/%d/%Y'),STR_TO_DATE('$end_date','%m.%d.%Y'));";
$organizes="INSERT INTO Organizes (Organizer_id,Event_id) VALUES ('$inserted_organizer_id','$inserted_event_id');"; 
$category="INSERT INTO Category (Event_id,Category) VALUES ('$inserted_event_id','$final_category');";

if ($connection->query($category)=== TRUE ){
    
   echo "Succesfull";
} 
else {
    echo "Error: " . $category. "<br>" . $connection->error;
}



// For takesplace
if ($connection->query($takesplace)=== TRUE ){
    
   echo "Succesfull";
} 
else {
    echo "Error: " . $takesplace. "<br>" . $connection->error;
}
if ($connection->query($organizes)=== TRUE ){
    
   
} 
else {
    echo "Error: " . $organizes. "<br>" . $connection->error;
}

$_SESSION['categoryofevent'] = $event_category;



$connection->close();



