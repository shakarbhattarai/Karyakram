<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $servername = "localhost";
$username = "root";
$password = "shakar";
$dbname = "Karyakram";
$id= 0;
if (isset($_GET['id']))
$id=$_GET['id']; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$eventquery="SELECT Events.Event_id,Events.Event_Name,Events.Event_Picture,Events.Event_Description,takesplace.Start_Date,takesplace.End_Date,Venue.Name,Venue.Address  from Events,takesplace,Venue WHERE Events.Event_id=takesplace.Event_id AND Venue.Venue_id=takesplace.Venue_id AND Events.Event_id>$id;";
 
$event=$conn->query($eventquery) ; 
  $final_array=array();
    
while ($eacheventarray=$event->fetch_assoc()){
    
    $final_array[]=$eacheventarray;
}   
print_r(json_encode($final_array));
 ?>


