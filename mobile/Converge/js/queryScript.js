// JavaScript Document

// Detect if the browser is IE or not.
// If it is not IE, we assume that the browser is NS.

var shake=0;

var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
var IE = document.all?true:false

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE)

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0;
var tempY = 0;

var objectArray = new Array();

fillObjectArray();
positionDivs();

function fillObjectArray(){
	console.log("sttart");
	var arr = document.getElementsByClassName("event");
	for(var i=0;i<arr.length;i++){
		var div1 = arr.item(i);
		var div1X = (windowWidth - 536)/2; //position div from half width of the page
		var div1Y = (windowHeight - 592)/2;
		var div1Factor = 0.05 + 0.02*i; //parallax shift factor, the bigger the value, the more it shift for parallax movement
		var div1Array = new Array();
		div1Array.push(div1, div1X, div1Y, div1Factor);
		objectArray.push(div1Array);
	}
	arr = [];
	arr = document.getElementsByClassName("meet-team");
	for(i=0;i<arr.length;i++){
		var div1 = arr.item(i); 
		var div1X = (windowWidth - 458)/2; //position div from half width of the page
		var div1Y = (windowHeight - 640)/2;
		var div1Factor = i*0.009 + 0.011; //parallax shift factor, the bigger the value, the more it shift for parallax movement
		var div1Array = new Array();
		div1Array.push(div1, div1X, div1Y, div1Factor);
		objectArray.push(div1Array);
	}
}

// Main function to retrieve mouse x-y pos.s

function getMouseXY(e)
{	
	if(shake==0)
		return;
	if (IE)
	{
		// grab the x-y pos.s if browser is IE
		tempX = event.clientX + document.body.scrollLeft
		tempY = event.clientY + document.body.scrollTop
	} 
	else 
	{
		// grab the x-y pos.s if browser is NS
		tempX = e.pageX
		tempY = e.pageY
	}  
	  // catch possible negative values in NS4
	if (tempX < 0){
		tempX = 0;
	}
	if (tempY < 0){
		tempY = 0;
	}
	moveDiv(tempX,tempY);
	  
	return true
}

function moveDiv(tempX,tempY)
{
	if(shake==1){
		for (var i=0;i<2;i++)
		{
			var yourDivPositionX = objectArray[i][3] * (0.5 * windowWidth - tempX) + objectArray[i][1];
			var yourDivPositionY = objectArray[i][3] * (0.5 * windowHeight - tempY) + objectArray[i][2];
			objectArray[i][0].style.left = yourDivPositionX + 'px';
			objectArray[i][0].style.top = yourDivPositionY + 'px';
		}
	}else{
		for (var i=2;i<objectArray.length;i++)
		{
			var yourDivPositionX = objectArray[i][3] * (0.5 * windowWidth - tempX) + objectArray[i][1];
			var yourDivPositionY = objectArray[i][3] * (0.5 * windowHeight - tempY) + objectArray[i][2];
			objectArray[i][0].style.left = yourDivPositionX + 'px';
			objectArray[i][0].style.top = yourDivPositionY + 'px';
		}
	}
}

function positionDivs()
{
	for (var i=0;i<objectArray.length;i++)
	{
		objectArray[i][0].style.left = objectArray[i][1] + "px";
		objectArray[i][0].style.top = objectArray[i][2] + "px";
	}
}