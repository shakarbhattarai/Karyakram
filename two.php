<?php 
		// make connection
		mysql_connect('localhost','root','shakar');
		//select db
		mysql_select_db('Karyakram');
?>
<html>
	<head>
		<title>Karyakram</title>
		<link rel="stylesheet" type="text/css" href="index1.css" />
	</head>
	<body>
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
$eventnam="SELECT Event_Name FROM Events WHERE Event_id=$id";
$eventnae=mysql_query($eventnam);
while($one=mysql_fetch_assoc($eventnae)){
	$eventname= $one['Event_Name'];
}
//DESCRIPTION
$eventdes="SELECT Event_Description FROM events WHERE Event_id=$id";
$eventdesc=mysql_query($eventdes);
while($one=mysql_fetch_assoc($eventdesc)){
	$eventdescription= $one['Event_Description'];
}
//DATES
$startdat="SELECT Start_Date FROM takesplace WHERE Event_id=$id";
	$enddat="SELECT End_Date FROM takesplace WHERE Event_id=$id";
	$startdate=mysql_query($startdat);
	$enddate=mysql_query($enddat);
while($one=mysql_fetch_assoc($startdate)){
	$sdate= $one['Start_Date'];
}
while($one=mysql_fetch_assoc($enddate)){
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
	$orgiemail=mysql_query($orgiEmai);
while($one=mysql_fetch_assoc($orginame)){
	$oname= $one['Name'];
        $oemail= $one['Email'];
}

//PHONE_NUMBER
$phon="SELECT PhoneNumber FROM Phonenumber where Organizer_Id=$oid";
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
	<div id="container">
		<div id="header">
		<h1>KARYAKRAM</h1>
		</div>
		<div id="content">
		<div id="nav">
		<p style="font-size:25px; color:#9F000F; font-weight:bold;">NAVIGATION</p>

		<ul>
			<li>-------------------------------</li><br>
			<li><A class="selected" href="">Home</a></li><br>
			<li><A class="selected" href="">Description</a></li><br>
			<li><A class="selected" href="#ATO">About The Organizers</a></li><br>
			<li><A class="selected" href="pics.html">Pics</a></li><br>
			<li><A class="selected" href="#contact">Contact</a></li>
		</ul>
		</div>
		<div id="main">
<?php
if(	$categoryname=='Educational')	
{

$e="select TargetLevel From Educational where ID=$eventnumber";	
$elf=mysql_query($e);
while($one=mysql_fetch_assoc($elf)){
	$tl= $one['TargetLevel'];
}


 
?>
		<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;"><?php echo $eventname;?></p>
		<p><?php echo $eventdescription;?></p>
		Target Level:<?php echo $tl;?><br><Br>
		Venue:<br>
		<?php
		echo $venue;?><br>
		<?php echo $venueadd;?><br>
		<?php echo $venuenum;?><br>
		<?php echo $venuewebsite;?><br>

<br>
		Date:<br>	
		<?php echo $sdate;
		echo  ' TO ' ;
		echo $edate;?>
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<?php echo $oname;?>
	
		<Br>
		<A name="contact">
		<Br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		
		Email:
		<?php echo $oemail;?>
		<br><br>
	<?php }
else
{
//target_low,High,ticketprice

$e="select * From Entertainment where ID=$eventnumber";	
$einfo=mysql_query($e);
while($one=mysql_fetch_assoc($einfo)){
	$tl= $one['TargetAgeLow'];
	$th= $one['TargetAgeHigh'];
	$tp= $one['TicketPrice'];
}
$sub="select SubCategory From subcat where Entertainment_id=$eventnumber";	
$subcatinfo=mysql_query($sub);
while($one=mysql_fetch_assoc($subcatinfo)){
	$subcat= $one['SubCategory'];
}

if($subcat=='Fest')
{

?>

	<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;"><?php echo $eventname;?></p>
		<p><?php echo $eventdescription;?></p>
		<br>
	Target Age:<br>
	<?php echo $tl;
echo ' TO ';
echo $th;

?>
<br>
<br>

Ticket Price:
<?php echo $tp; ?>
<br><br>


	
		Venue:<br>
		<?php
		echo $venue;?><br>
		<?php echo $venueadd;?><br>
		<?php echo $venuenum;?><br>
		<?php echo $venuewebsite;?><br>
<br>
<br>
		Date:<br>	
		<?php echo $sdate;
		echo  ' TO ' ;
		echo $edate;?>
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<?php echo $oname;?>
	
		<Br>
		<A name="contact">
		<Br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		
		Email:
		<?php echo $oemail;?>
		<br><br>


<?php 
}
elseif($subcat=='Concert')
{
//subcatid
$s="select * From isasub where Entertainment_id=$eventnumber";	
$scid=mysql_query($s);
while($one=mysql_fetch_assoc($scid)){
	$subcatid= $one['Sub-cat_id'];

}

$g="select Genre From Concert where ID=$subcatid";	
$ge=mysql_query($g);
while($one=mysql_fetch_assoc($ge)){
	$genre= $one['Genre'];

}
$x=0;




?>
	<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;"><?php echo $eventname;?></p>
		<p><?php echo $eventdescription;?></p>
		<br>
Genre:<?php echo $genre;?>

<br>
List of Performers:
<?php
$lop="select * From Performers where ID=$subcatid";	
$list=mysql_query($lop);
while($one=mysql_fetch_assoc($list)){
	$listofperformers= $one['Performer'];
	echo $listofperformers;
	echo "..";
}


?>

<br>

<br>

Ticket Price:
<?php echo $tp; ?>
<br><br>


	
		Venue:<br>
		<?php
		echo $venue;?><br>
		<?php echo $venueadd;?><br>
		<?php echo $venuenum;?><br>
		<?php echo $venuewebsite;?><br>
<br>
<br>
		Date:<br>	
		<?php echo $sdate;
		echo  ' TO ' ;
		echo $edate;?>
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<?php echo $oname;?>
	
		<Br>
		<A name="contact">
		<Br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		
		Email:
		<?php echo $oemail;?>
		<br><br>


<?php }
elseif($subcat=='Party')
{
//subcatid
$s="select * From isasub where Entertainment_id=$eventnumber";	
$scid=mysql_query($s);
while($one=mysql_fetch_assoc($scid)){
	$subcatid= $one['Sub-cat_id'];

}

$p="select * From Party where ID=$subcatid";	
$pa=mysql_query($p);
while($one=mysql_fetch_assoc($pa)){
	$theme= $one['Theme'];
	$supplementry=$one['Supplementary'];
}





?>
	<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;"><?php echo $eventname;?></p>
		<p><?php echo $eventdescription;?></p>
		<br>
Theme:
<?php echo $theme;?>
<br>
Supplementary:
<?php echo $supplementry?>
<Br>

<br>


<br>

<br>

Ticket Price:
<?php echo $tp; ?>
<br><br>


	
		Venue:<br>
		<?php
		echo $venue;?><br>
		<?php echo $venueadd;?><br>
		<?php echo $venuenum;?><br>
		<?php echo $venuewebsite;?><br>
<br>
<br>
		Date:<br>	
		<?php echo $sdate;
		echo  ' TO ' ;
		echo $edate;?>
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<?php echo $oname;?>
	
		<Br>
		<A name="contact">
		<Br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		
		Email:
		<?php echo $oemail;?>
		<br><br>


<?php }
elseif($subcat=='Sports')
{
//subcatid
$s="select * From isasub where Entertainment_id=$eventnumber";	
$scid=mysql_query($s);
while($one=mysql_fetch_assoc($scid)){
	$subcatid= $one['Sub-cat_id'];

}

$s="select * From Sports where ID=$subcatid";	
$sp=mysql_query($s);
while($one=mysql_fetch_assoc($sp)){
	$teamA= $one['Team_A'];
	$teamB=$one['Team_B'];
	$sportsname=$one['Sports_Name'];
	$tournamentname=$one['Tournament_Name'];
	$tournamentposition=$one['Tournament_Posotion'];
}





?>
	<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;"><?php echo $eventname;?></p>
		<p><?php echo $eventdescription;?></p>
		<br>
Teams:
<?php echo $teamA;?>

<br>
<?php echo $teamB;?>
<br>
<Br>
Sports:
<?php echo $sportsname;?>
<br>
Tournament name:
<?php echo $tournamentname;?>
<br>
Tournament Position:

<?php echo $tournamentname?>
<Br>

<br>


<br>

<br>

Ticket Price:
<?php echo $tp; ?>
<br><br>


	
		Venue:<br>
		<?php
		echo $venue;?><br>
		<?php echo $venueadd;?><br>
		<?php echo $venuenum;?><br>
		<?php echo $venuewebsite;?><br>
<br>
<br>
		Date:<br>	
		<?php echo $sdate;
		echo  ' TO ' ;
		echo $edate;?>
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<?php echo $oname;?>
	
		<Br>
		<A name="contact">
		<Br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		
		Email:
		<?php echo $oemail;?>
		<br><br>


<?php }


}?>	
		</div>

		</div>
		
		</div>	
	

	</body>
</html>