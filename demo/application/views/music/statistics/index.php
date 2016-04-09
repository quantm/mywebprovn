<html>

<head>
<title>Bieu Do</title>
</head>

<body>

<table border="0" cellpadding="4" cellspacing="0" width="100%" height="266">
  <tr>
    <td align="center" height="38">
      <h4><span lang="en-us"><font face="Arial" color="#FF0000">V&#7868; BI&#7874;U &#272;&#7890;</font></span></h4>
    </td>
    <td height="38">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" width="100%" height="69">
<script Language="JavaScript">
//---------------------------------
// Variables:
// wid,hei - The size of the chart on axes x and y.
// x0, y0 - relative coordinate in which is deduced the chart.
// dat() - The initial data. Any quantity of elements.
// name1,name2,name3 - The names of lines in the table and charts.
// col() - Colours of elements of the diagram. We made 14, if it is necessary more - you add.
//bgCol_Pg - Background of page. Use for Netscape 6.
//---------Variables---------------
wid=200
hei=200
x0=(window.screen.width-wid*1.3-60)/2
y0=20
dat=new Array("15748","24015","11542","20455")
name1="C&#7897;t :"
name2="S&#7889; Li&#7879;u:"
name3="th&#7875; hi&#7879;n bi&#7875;u &#273;&#7891;:"
col =new Array("00ff00","ff0000","ffff00","0000ff","ff00ff","00ffff","000000","00cc00","cc0000","cccc00","0000cc","cc00cc","00cccc","cccccc")
bgCol_Pg="#ffffff"
//----------End Variables----------

//This and others free scripts you can find on a site:  artdhtml.com
//The script works both with Internet Explorer (4-6) and with Netscape (4,6).

y0=y0+hei*1.2  // - correction

function genLayer(sName, sLeft, sTop, sWdh, sHgt, sVis, sBg, copy) 
{
		document.write('<LAYER ' +((sName)?'NAME="'+sName+'"':'') + ' LEFT=' + sLeft + ' TOP=' + sTop + 
		' WIDTH=' + sWdh + ' HEIGHT=' + sHgt + ((sBg)?' bgColor='+sBg:'')+'' + ((sVis)?' VISIBILITY='+sVis:'')+ '' + 
		' z-Index=0>' +((copy)?copy:"")  + '</LAYER>');
}


function recharts(j,he)
{
 if(ns)
 {
	for (i=0; i<100; i=i+1)
	{
		if ((i+0.1)/100>he){document.ilay1.document.layers["n"+j+"y"+i].visibility = "hide"}
		else{document.ilay1.document.layers["n"+j+"y"+i].visibility = "show"}
	}
 }
 if(ie4)
 {
	document.all["n"+j].style.top=0-Math.ceil(he*hei);
	document.all["n"+j].style.height=Math.ceil(he*hei);
 }
 if(ns6)
 {
	document.getElementById("nn"+j).style.height=Math.ceil(hei-he*hei);
	document.getElementById("n"+j).style.height=Math.ceil(he*hei);
	document.getElementById("n"+j).style.top=0-Math.ceil(he*hei);
 }
}

function diagram()
{
d_max=0
for (j=0; j<n_dat; j++)
{
	if(isNaN(document.fData["t"+(j+1)].value)){alert("Error! A field "+(j+1)+". Enter number.");document.fData["t"+(j+1)].value=0}
	dat[j]=document.fData["t"+(j+1)].value*1
	if(dat[j]>d_max){d_max=dat[j]}
}
for (j=0; j<n_dat; j++)
{
	recharts(j,dat[j]/d_max)
}
return false;
}

//-------End functions--------

var ns=document.layers?1:0
var ie4=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0

NN=(document.layers ? true:false)
n_dat=dat.length

//-----Generation of table----

len_max=2
for (j=0; j<n_dat; j++)
{
	if(dat[j].length>len_max){len_max=dat[j].length}
}

document.write('<table border=0 cellpadding=0 cellspacing=0 align=center><tr bgcolor=#CCCCCC><td align=right>'+name1+'</td>')
for (j=0; j<n_dat; j++)
{
	document.write('<td align=center>'+(j+1)+'</td>')
}
document.write('<td>&nbsp;</td></tr><form  name="fData" method="POST" action="charts.htm" onSubmit="return diagram()";><tr bgcolor=#CCCCCC><td align=right>'+name2+'</td>')
for (j=0; j<n_dat; j++)
{
	document.write('<td align=center><input type=text name="t'+(j+1)+'" size='+len_max+' value='+dat[j]+'></td>')
}
document.write('<td>&nbsp;&nbsp;&nbsp;<input type="submit" value="v&#7869;" name="B3" >&nbsp;&nbsp;</td></tr></form></table>')

document.write("<p align=center><font face=Arial size=3><b>"+name3+"</b></font></p>")

//----------End table-------
if (ns){document.write("<ilayer name=ilay1>")}
else {document.write("<div style='position:relative; left:"+x0+";top:"+y0+";width:"+wid*1.3+";height:"+hei*1.3+"'>")}
if (ns)
{
	genLayer("", x0-2, y0, wid*1.2, 2, "show", "#000000", "")
	genLayer("", x0-2, y0-hei*1.2, 2, hei*1.2, "show", "#000000", "")
}
else
{
	document.write("<div border=0 style='position:absolute; left:"+(0-2)+";top:"+(0)+";width:"+(wid*1.2)+";height:"+2+";background:#000000'><img src=http://artdhtml.com/1x1.gif width=1 height=1></div>")
	document.write("<div border=0 style='position:absolute; left:"+(0-2)+";top:"+(0-hei*1.2)+";width:"+2+";height:"+(hei*1.2)+";background:#000000'><img src=http://artdhtml.com/1x1.gif width=1 height=1></div>")
}

wid=wid/n_dat
for (j=0; j<n_dat; j++)
{
	if (ns)
	{
		for (i=0; i<100; i=i+1)
		{
			genLayer("n"+j+"y"+i+"", x0+j*wid, y0-(i+1)*hei/100, wid, hei/100, "show", col[j], "")
		}
	}
	if (ie4)
	{
		document.write("<a href=http://www.echip.com.vn><img src=http://www.echip.com.vn/1x1.gif  id=n"+j+" border=0 style='position:absolute; left:"+(0+j*wid)+";top:"+(0-hei)+";width:"+wid+";height:"+hei+";background:#"+col[j]+"'></a>")
	}
	if (ns6)
	{
		document.write("<div id=n"+j+"  border=0 style='position:absolute; left:"+(0+j*wid)+";top:"+(0-hei)+";width:"+wid+";height:"+hei+";background:#"+col[j]+"'></div>")
		document.write("<div id=nn"+j+" border=0 style='position:absolute; left:"+(0+j*wid)+";top:"+(0-hei)+";width:"+wid+";height:"+hei+";background:#"+bgCol_Pg+"'></div></a>")
	}

}
if (ns){document.write("</ilayer>")}
else {document.write("</div>")}

tim=window.setTimeout("diagram()",1000)
    </script>





     
     <form method="POST">
      <p align="center"></p>
     </form>
      <p>&nbsp;</p>

<form method="POST" name=form_s>
<div align="right">
  <table border="0" cellspacing="0" cellpadding="0" width="658">
    <tr>
      <td width="642"><font color="#FF0000">
      <marquee width="642">S&#432;u T&#7847;m B&#7903;i LÊ TH&#7882; NGA</marquee></font></td>
      <td width="8">
&nbsp;</td>
      <td width="8">&nbsp;</td>
    </tr>
  </table>
</div>
</form>
<SCRIPT LANGUAGE="JavaScript" src=../sponsors/sponsors.js></script>


   <td valign="top" height="69"><div  style='font-size:8pt;fontsize:8pt;font-family:Arial;fontfamily:Arial'><script language=javascript src="../search/results.asp?words=html%20code&type=adv&nickname=artdhtml"></script></div></td>
  </tr>
  <tr>
    <td align="center" height="66"><script language=JavaScript src=../banners/serv4.asp?us=alex2></script>
    
      <marquee width="642"><img border="0" src="logo.gif" align="left" width="123" height="47"></marquee></td>
    <td height="66">
    <p align="left"></td>
  </tr>
  <tr>
    <td align="center" height="62">
&nbsp;</td>
    <td height="62">&nbsp;</td>
  </tr>
</table>
</body>
</html>