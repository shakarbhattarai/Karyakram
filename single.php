<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Steam Website Template | Single :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
 
<body>
    <?php 
		// make connection
		mysql_connect('localhost','root','shakar');
		//select db
		mysql_select_db('Karyakram');
?>
    
    <?php

	 $id= $_GET['id'];
//CATEGORY
	$catinf="SELECT Category FROM Category WHERE Event_id=$id";
	$catinfo=mysql_query($catinf);
while($one=mysql_fetch_assoc($catinfo)){
	$categoryname= $one['Category'];
}
//EVENT_NUMBER
$eventn="SELECT Type_id FROM ISA WHERE Event_id=$id";
$eventno=mysql_query($eventn);
while($one=mysql_fetch_assoc($eventno)){
	$eventnumber= $one['Type_id'];
}
//EVENTNAME
$eventnam="SELECT * FROM Events WHERE Event_id=$id";
$eventnae=mysql_query($eventnam);
while($one=mysql_fetch_assoc($eventnae)){
	$eventname= $one['Event_Name'];
        $eventdescription= $one['Event_Description'];
        $eventpicture=$one['Event_Picture'];
}
 
//DATES
$startdat="SELECT * FROM takesplace WHERE Event_id=$id";
	 
	$startdate=mysql_query($startdat);
	 
while($one=mysql_fetch_assoc($startdate)){
	$sdate= $one['Start_Date'];
        $edate= $one['End_Date'];
}
 


//ORGANIZATION_ID
$orgi="SELECT Organizer_Id FROM Organizes where Event_id=$id";
$orgid=mysql_query($orgi);
while($one=mysql_fetch_assoc($orgid)){
	$oid= $one['Organizer_Id'];
}
//OGARNIZATION_NAME_EMAIL
$orginam="SELECT * FROM Organizer where Organizer_Id=$oid";
	 
	$orginame=mysql_query($orginam);
	 
while($one=mysql_fetch_assoc($orginame)){
	$oname= $one['Name'];
        $oemail= $one['Email'];
}

//PHONE_NUMBER
$phon="SELECT PhoneNumber FROM PhoneNumber where Organizer_Id=$oid";
$phone=mysql_query($phon);
while($one=mysql_fetch_assoc($phone)){
	$onum= $one['PhoneNumber'];
}
$venu="SELECT * FROM Venue where Venue_ID=(SELECT Venue_id from takesplace where Event_id=$id)";
$vene=mysql_query($venu);
while($one=mysql_fetch_assoc($vene)){
	$venue= $one['Name'];
	$venueadd=$one['Address'];
	$venuenum=$one['Phone_Number'];
	$venuewebsite=$one['Website'];
}
?>
 <div class="header-top">
	<div class="wrap">
        <div class="logo">
			<a href="index.php"><img src="web/images/logo.png" alt=""/></a>
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
            <div class="clear"></div></div>
             <h2 class="head"><?php echo $eventname ;?><span class="m_3" > <br>at <?php echo $venue;  ?>  </span> </h2>
     
      
      
    
    
  <div class="wrap">
     <div class="wrap">
      	 <div class="section group">
				<div class="cont span_2_of_blog">
				      <div class="blog-left">
                                          <hr>
                                          <img class="centeredImage" src=
                                               
                                              <?php echo strtolower(trim($eventpicture)); ?> ><hr>
                                                        <p class="f-text1" > 
                                                            <h4 class="m_2">
                                                                <fieldset >
                                                                    <legend><br>Organizer's details </legend><hr>
                                                            <?php echo "<font color=violet>Organizer: </font>".$oname."<br>"?>
                                                            <?php echo "<font color=violet>Phone Number: </font>".$onum." <br>" ?>   
                                                           <?php echo "<font color=violet>Email Address: </font>".$oemail." <br>" ?> 
                                                                </fieldset>
                                                                <fieldset>
                                                                    <legend><br>Venue Details</legend> <hr>
                                                            <?php echo "<font color=violet>Address: </font>".$venueadd."<br> "?>
                                                            <?php echo "<font color=violet>Venue website/facebook page : </font>".$venuewebsite." <br>" ?>
                                                             <?php echo "<font color=violet>Venue phone :</font> ".$venuenum." <br>" ?>
                                                                    
                                                                    </fieldset>
                                                                
                                                                <fieldset><legend><br>Event details</legend><hr>
                                                            <?php echo "<font color=violet>Date: </font>".$sdate ." to ".$edate."<br> " ?> 
                                                            <?php echo "<font color=violet>Description: </font>".$eventdescription. "<br>"; ?>
                                                            </fieldset>
                                                                <fieldset>
                                                                    <legend><br><?php echo $categoryname ; ?> event </legend><hr>
                                                                <?php
                                                                
                                                                if($categoryname=='Educational')	 
                                                                {

                                                                $e="select TargetLevel From Educational where ID=$eventnumber";	
                                                                $elf=mysql_query($e);
                                                                while($one=mysql_fetch_assoc($elf)){
                                                                        $tl= $one['TargetLevel'];
                                                                }    
                                                                
                                                                echo "<font color=violet>Target Student Level: </font>".$tl. "<br>";
                                                                }
                                                                ?>
                                                                    
                                                                <?php
                                                                if($categoryname=='Entertainment')
                                                                {
                                                                //target_low,High,ticketprice

                                                                $e="select * From Entertainment where ID=$eventnumber";	
                                                                $einfo=mysql_query($e);
                                                                while($one=mysql_fetch_assoc($einfo)){
                                                                        $tl= $one['TargetAgeLow'];
                                                                        $th= $one['TargetAgeHigh'];
                                                                        $tp= $one['TicketPrice'];
                                                                }
                                                                echo "<font color=violet>Target age: </font>".$tl." to ".$th. "<br>";
                                                                echo "<font color=violet>Ticket Price: </font>NRs.".$tp. "/- <br>";
                                                                
                                                                } 
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                ?>
                                                                </fieldset>
                                                        </h4>
                                                            
                                                            
                                                            
                                                            
                                                        </h5> 
                                      </div>
                                    
						<div class="links">
			  				<ul>
			  					<li><a href="#"><img src="web/images/blog-icon1.png" title="date">Today<span></span></a></li>
			  					<li><a href="#"><img src="web/images/blog-icon2.png" title="Admin"><span>admin</span></a></li>
			  					<li><a href="#"><img src="web/images/blog-icon3.png" title="Comments"><span>No comments</span></a></li>
			  					<li><a href="#"><img src="web/images/blog-icon4.png" title="Lables"><span>View posts</span></a></li>
			  					<li><a href="#"><img src="web/images/blog-icon5.png" title="permalink"><span>permalink</span></a></li>
			  				</ul>
		  		        </div>
		  		        <div class="comments-area">
							<form>
								<p>
									<label>Name</label>
									<span>*</span>
									<input type="text" value="">
								</p>
								<p>
									<label>Email</label>
									<span>*</span>
									<input type="text" value="">
								</p>
								<p>
									<label>Website</label>
									<input type="text" value="">
								</p>
								<p>
									<label>Subject</label>
									<span>*</span>
									<textarea></textarea>
								</p>
								<p>
									<input type="submit" value="Submit Comment">
								</p>
							</form>
						</div>
				</div>
	 
	   </div>
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
				<div class="clear"></div>
			</ul>
     	  </div>
     	  <div class="footer-bottom">
     	  	<div class="copy">
			   <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
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
