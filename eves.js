(function(){

	function _init(){
		var now = new Date();
		var thisYear = now.getUTCFullYear();
		var nextYear = thisYear + 1;
		var remainingDays = _daysUntilChristmas(now, thisYear);
		var nextYearDays = _daysUntilChristmas(now, nextYear);
		
		//If the days are a negative number
		//(meaning we are still in the same year, but Christmas is in the past)
		//get the date for Christmas of next year instead
		if(remainingDays < 0) remainingDays = nextYearDays;

		_setTitle(remainingDays);
		_setContent(remainingDays, nextYearDays, nextYear);
	}

	//========================================================================
	function _daysUntilChristmas(now, year){
		var xmasTime = new Date(year, 11, 25); //months are zero indexed!
		var timeDiff = xmasTime.getTime() - now.getTime();
		var diffInDays = Math.ceil(timeDiff/1000/60/60/24);
		return diffInDays;
	}

	function _setTitle(days){
		document.title = days === 0 ? 
		"Today is Christmas!" : 
		days + " eves remain before Christmas!";
	}

	function _setEves(days){
		//Build up the HTML fow many "eves" should display

		var container = document.getElementById("eves");
		var evesHtml = "";

		for (var i = 1; i <= days; i++) {
			evesHtml += "<span class='eve'>Eve</span> ";
		};
		
		container.innerHTML = evesHtml + "!";
	}

	function _setContent(days, nextDays, nextYear){
		var description = document.getElementById('description');
		var subtitle = document.getElementById('subtitle');
		
		if(days === 0){
			//Christmas Day!!!!!
			description.innerHTML = "Today is <span class='eve'>Christmas</span>!";
			subtitle.innerHTML = "( but there are <strong>" + nextDays + "</strong> days until Christmas in " + nextYear + "! )";
		}else if(days === 1){
			//Christmas Eve
			description.innerHTML = "Today is <span class='eve'>Christmas</span> <span class='eve'>Eve</span>!"
			subtitle.innerHTML = "( Tomorrow is Christmas! )";
		}else{
			description.innerHTML = "Today is Christmas&hellip;"
			subtitle.innerHTML = "( There are <strong>" + days + "</strong> days until Christmas )"; 
			//Other Day
			_setEves(days);
		}
	}

	//Start it!
	_init();
})();