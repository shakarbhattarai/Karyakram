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
	$catinf="SELECT Category FROM category WHERE Event_id=$id";
         
	$catinfo=mysql_query($catinf);
         
while($one=mysql_fetch_assoc($catinfo)){
	$categoryname= $one['Category'];
        
}
print_r ($categoryname);
//EVENT_NUMBER
$eventn="SELECT Type_id FROM isa WHERE Event_id=$id";
$eventno=mysql_query($eventn);
while($one=mysql_fetch_assoc($eventno)){
	$eventnumber= $one['Type_id'];
}
//EVENTNAME
$eventnam="SELECT Event_Name FROM events WHERE Event_id=$id";
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
$orgi="SELECT Organizer_Id FROM organizers where Event_id=$id";
$orgid=mysql_query($orgi);
while($one=mysql_fetch_assoc($orgid)){
	$oid= $one['Organizer_Id'];
}
//echo $oid;
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
		
		<p style="font-size:25px; color:#E42217; font-weight:bold; font-style:italic;">Description</p>
		<p>hello this is karyakram in this content we will actually have our content so wait up hello listen how i say oooooooooo</p>
		<p>adn yes asdfasdfasdf asdf asdf asdf asdf d f rg3 rdfb dfb df bd fb df bd fvb dv sdv sd fv</p>
		<p>asdfasdfadsfasdfadsfadsf these are the guestsasdfasdfasdfasdfasdfadsfasdfadsfadsfadsfadsfadf<p>
		<p>asdfadsfadsfasdfjgasdjfgaljsdfgalksdf kalsdhgfaksdhf aksdfh aksdfh aklsdhf aksdjf aksdfh aksdf haksdjf alskdjg klsad hfkasd faklsd hfakd shfakld hfka dshf</p>
		Venue:<br>
		Time:<br>	
		
		<br>
		<A name="ATO">
		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;">About the Organizers</p>
		<p> kk events</p>
		<Br>
		<A name="contact">
		<Br><br>

		<p style="font-size:23px; color:#E42217; font-weight:bold; font-style:italic;"> Contact</p>
		Phone:65465321321<br>
		Email:asdfadfadf
		<br><br>
		
		</div>
		</div>
		
		</div>	
	
	</body>
</html>