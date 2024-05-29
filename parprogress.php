<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adding The Data</title>

<SCRIPT LANGUAGE="JavaScript">


function Minutes(data)
 {
for (var i = 0; i < data.length; i++)

if (data.substring(i, i + 1) == ":")
break;
return (data.substring(0, i));
}

function Seconds(data) {
for (var i = 0; i < data.length; i++)
if (data.substring(i, i + 1) == ":")
break;
return (data.substring(i + 1, data.length));
}
function Display(min, sec) {
var disp;
if (min <= 9) disp = " 0";
else disp = " ";
disp += min + ":";
if (sec <= 9) disp += "0" + sec;
else disp += sec; 
return (disp);
}

function Down()
 { 
sec--;      
if (sec == -1) 
{ sec = 59; min--; 
}

document.timerform.clock.value = Display(min, sec);
window.status = "Session will time out in: " + Display(min, sec);
if (min == 0 && sec == 0) 
{
window.alert("Your Content Has been Posted Sucessfully");
window.location="stu.html";
final();

}
else down = setTimeout("Down()", 1000);
}
function timeIt()
 {
min = 1 * Minutes(document.timerform.clock.value);
sec = 0 + Seconds(document.timerform.clock.value);
Down();
}
function final()
{
parent.main.location.href="hostellermovement.jsp";

}
</script>
<script> 

document.attachEvent("onkeydown", my_onkeydown_handler); 
function my_onkeydown_handler() 
{ 
switch (event.keyCode) 
{ 

case 116 : // 'F5' 
event.returnValue = false; 
event.keyCode = 0; 
window.status = "We have disabled F5"; 
break; 
} 
} 
</script>
<script language ="javascript">

test()
function test()
{
window.onbeforeunload = function(){

 return false;};
}


</script>
</head>


<body bgcolor="#FFFFFF" onLoad="timeIt();">
<script language=JavaScript>
<!--

var message="You Are Not Authorized - MAM INFOTECH!";
///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")
// --> 
</script>
<form name="timerform">
  <p>
  <div align="center">
    <table width="925" border="1">
    <tr>
       <td width="1029"></td>
    </tr>
    <tr>
      <td><p>
        <input type="hidden" name="clock" size="7" value="00:02" >
      </p>
        <p align="center"><strong>Please Wait For Some Seconds...,Don't Press Any Key </strong></p>
        <p align="center"><img src="cliping/loader.gif" width="300" height="300" alt="p" /></p>
	 
 
	  

	     
	 
      </td>
	  
    </tr>
  </table>
</div>
</form>

</body>
</html>
