<?php
 $servername = "localhost";
    $username = "root";
    $password = "shakar";
    $dbname = "Karyakram";
    $conn = new mysqli($servername, $username, $password, $dbname);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
      $category=$_GET['event_cat'];    
      //$startdate=$_GET['startdate'];
       //$enddate=$_GET['enddate'];
      
       // $eventname=$_GET['eventname'];
         //$venuename=$_GET['venuename'];
         
      
       $finalwhere="SELECT Events.Event_id FROM Events JOIN takesplace ON Events.Event_id=takesplace.Event_id"
               . " JOIN Venue on takesplace.Venue_id=Venue.Venue_Id ";

       if((($_GET['eventname'])!="")||( ($_GET['venuename'])!="")||( ($_GET['startdate']))!=""||(($_GET['enddate']))!=""){
        $finalwhere=$finalwhere."WHERE TRUE";
    if (($_GET['eventname'])!=""){
         $eventname=$_GET['eventname'];
        $query=" AND Events.Event_Name='$eventname'";
        $finalwhere=$finalwhere.$query;
    }
     if (($_GET['venuename'])!=""){
          $venuename=$_GET['venuename'];
        $query=" AND Venue.Name='$venuename'";
        $finalwhere=$finalwhere.$query;
    }
     if (($_GET['startdate'])!=""){
          $startdate=$_GET['startdate'];
           
        $query=" AND takesplace.Start_Date>=STR_TO_DATE('$startdate','%m/%d/%Y')";
        $finalwhere=$finalwhere.$query;
    }
     if (($_GET['enddate'])!=""){
         $enddate=$_GET['enddate'];
         
        $query=" AND takesplace.End_Date<=STR_TO_DATE('$enddate','%m.%d.%Y')";
        $finalwhere=$finalwhere.$query;
    }
   
    } 
   
    $firstquerydata=$conn->query($finalwhere);
     $first_array=[];
     echo $finalwhere;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     while ($eachcasearray= $firstquerydata->fetch_assoc()){
     $eventid=$eachcasearray['Event_id'];
     array_push($first_array,$eventid);
     
     }
     print_r($first_array);
     
     
      $sec_array=[];
     if (($_GET['event_cat'])!=""){
         $finalwherecat="SELECT Event_id FROM Category WHERE Category.Category='$category'";
         
            $firstquerydata=$conn->query($finalwherecat);

              echo $finalwherecat;
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
             while ($eachcasearray= $firstquerydata->fetch_assoc()){
             $eventid=$eachcasearray['Event_id'];
             array_push($sec_array,$eventid);

            }
        
     
         }
         else{
       
             
            $sec_array=$first_array;
            
         } 
         echo "yp";
         print_r($sec_array);
         $thirdarray=[];
         
         
         
         
         if (($_GET['organizername'])!=""){
            $orgname=$_GET['organizername'];    
            $finalwhereorg="SELECT Event_id FROM Organizes WHERE Organizes.Organizer_Id IN (SELECT "
                    . "Organizer_Id FROM Organizer WHERE Name LIKE '%$orgname%');";

            $firstquerydata=$conn->query($finalwhereorg);

            echo $finalwhereorg;
           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }

            while ($eachcasearray= $firstquerydata->fetch_assoc()){
            $eventid=$eachcasearray['Event_id'];
            array_push($thirdarray,$eventid);

            }
          

            }
            else{
             
               $thirdarray=$first_array;

            }  
            print_r( $thirdarray);
          
          
     $finalarray=array_intersect($sec_array,$first_array,$thirdarray);
     foreach ($finalarray as $key=>$value){
         $finalestfinalarray["case[$key]"]=$value;
         
         
     }
     print_r($finalestfinalarray);
        
         $url="display.php?".http_build_query($finalestfinalarray);
         
         header("Location:$url");
         exit();    
         
?>