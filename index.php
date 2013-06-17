<?php 
	function daysUntilChristmas($y){
		$seconds = (int)(mktime (0,0,0,12,25,$y) - time());
		$days = ceil($seconds/60/60/24);
		return $days;
	}
	
	//Some global vars used here and below for display text
	$days = daysUntilChristmas(date("Y"));
	$nextYear=date("Y")+1;
	$nextDays = daysUntilChristmas($nextYear);

	//If the days are a negative number, get the date for the next year
	if($days <0){
		$days = $nextDays;
	}
	
	//Loop through and add "Eve" for each day until Christmas
	$eves="";
	for($i=1; $i<=$days; $i++){
		$eves.="\t\t<span class='".($i % 2 == 0 ? 'even' : 'odd')."'>Eve</span>\r";
	}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<meta name="description" content="How many eves remain before Christmas?" />
<meta name = "viewport" content = "width = device-width, user-scalable = no">
<title><?php
	if($days == 0){
		echo "Today is Christmas!";
	}else{
		echo $days. " eves remain before Christmas!";
	}
	
?></title>
<!--
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	For unto us a child is born, unto us a son is given;
	and the government shall be upon his shoulder:
	and his name shall be called Wonderful, Counsellor,
	Mighty God, Everlasting Father, Prince of Peace
	– Isaiah 9:6
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
-->
<style>
	@import url(http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:extralight&subset=latin);
	html,
	body{
		font-family:'Yanone Kaffeesatz', arial, serif;
		margin:0;
		padding:0;
	}
	body{
		padding:10px;
	}
	p{
		margin:0;
	}
	.even{
		color:#da0000;
	}
	.odd{
		color:#00da00;
	}
	#christmas{
		font-size:70px;
	}
	#eves{
		font-size:50px;
		line-height:40px;
	}
	#description{
		font-size:18px;
		padding-top:25px;
		text-align:center;
	}
	#credits{
		font-size:16px;
		text-align:right;
		position: absolute;
		right:10px;
		bottom:10px;
	}
</style>

<style media="only screen and (max-device-width: 480px)">
	#description{
		margin-bottom: 20px;
	}

	#credits{
		background-color: #FFF;
		right:3px;
		bottom:3px;
		position:fixed;
		padding:3px;
		border-radius:4px;
		font-size: 18px;
	}
</style>
</head> 
<body>
	<?php
		//Show how many eves until Christmas
		if($days==1){
			//Christmas Eve
			echo "<p id='christmas'>Today is <span class='green'>Christmas</span> <span class='red'>Eve</span>!</p>\r";
		}else if($days==0){
			//Christmas Day
			echo "<p id='christmas'>Today is <span class='green'>Christmas</span>!</p>\r";
		}else{
			//Other day
			echo "<p id='christmas'>Today is <span class='green'>Christmas&hellip;</span></p>\r";
			echo "\t<p id='eves'>\r".$eves."\t\t!\r\t</p>\r";
		}
		
		//Show the number of days left
		echo "\t<p id='description'>";
			if($days==1){
				//Christmas Eve
				echo "( Tomorrow is Christmas! )"; 
			}else if($days==0){
				//Christmas Day
				echo "( but there are <strong>".$nextDays."</strong> days until Christmas in ".$nextYear."! )"; 
			}else{
				//Other Days
				echo "( There are <strong>".$days."</strong> days until Christmas )"; 
			}
		echo "</p>";
	?>

	<p id='credits'>
		<a href="http://chris-barr.com">Chris Barr</a> | <a href="http://twitter.com/chrismbarr">@ChrisMBarr</a>
	</p>
	
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try{var pageTracker = _gat._getTracker("UA-2692727-27");pageTracker._trackPageview();}catch(err){}
	</script>
</body>
</html>