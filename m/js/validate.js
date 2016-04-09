function trim(stringToTrim) {
    return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function validateEmail(email)
{
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null )
    {
        var regexp_user=/^\"?[\w-_\.]*\"?$/;
        if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
        var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
        if(splitted[2].match(regexp_domain) == null) 
        {
            var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
            if(splitted[2].match(regexp_ip) == null) return false;
        }// if
        return true;
    }
    return false;
}

function IsCheckSelected(objValue,chkValue)
{
    var selected=false;
    var objcheck = objValue.form.elements[objValue.name];
    if(objcheck.length)
    {
        var idxchk=-1;
        for(var c=0;c < objcheck.length;c++)
        {
            if(objcheck[c].value == chkValue)
            {
                idxchk=c;
                break;
            }//if
        }//for
        if(idxchk>= 0)
        {
            if(objcheck[idxchk].checked=="1")
            {
                selected=true;
            }
        }//if
    }
    else
    {
        if(objValue.checked == "1")
        {
            selected=true;
        }//if
    }//else	

    return selected;
}
function TestDontSelectChk(objValue,chkValue,strError)
{
    var pass = true;
    pass = IsCheckSelected(objValue,chkValue)?false:true;

    if(pass==false)
    {
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestShouldSelectChk(objValue,chkValue,strError)
{
	alert(objValue.name);
	alert(chkValue);
    var pass = true;

    pass = IsCheckSelected(objValue,chkValue)?true:false;

    if(pass==false)
    {
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestRequiredInput(objValue,strError)
{
    var ret = true;
    var val = objValue.value;
    val = val.replace(/^\s+|\s+$/g,"");//trim
 	
    if(eval(val.length) == 0) 
    { 	
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }else{
        document.getElementById("ERR"+objValue.name).innerHTML = "";
        return true;
    }
}
function TestMaxLen(objValue,strMaxLen,strError)
{
    var ret = true;
    if(eval(objValue.value.length) > eval(strMaxLen)) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestMinLen(objValue,strMinLen,strError)
{
    var ret = true;
    if(eval(objValue.value.length) <  eval(strMinLen)) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestInputType(objValue,strRegExp,strError,strDefaultError)
{
    var ret = true;

    var charpos = objValue.value.search(strRegExp); 
    if(objValue.value.length > 0 &&  charpos >= 0) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestEmail(objValue,strError)
{
    var ret = true;
    if(objValue.value.length > 0 && !validateEmail(objValue.value)	 ) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestLessThan(objValue,strLessThan,strError)
{
    if(eval(objValue.value) >=  eval(strLessThan)) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;        
}
function TestGreaterThan(objValue,strGreaterThan,strError)
{
    if(eval(objValue.value) <=  eval(strGreaterThan)) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;          
}

function TestRegExp(objValue, strRegExp, strError)
{
    var ret = true;
    if( objValue.value.length > 0 && 
        !objValue.value.match(strRegExp) ) 
        { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestDontSelect(objValue,dont_sel_index,strError)
{
    if(objValue.selectedIndex == eval(dont_sel_index)) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                          
    } 
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestSelectOneRadio(objValue,strError)
{
    var objradio = objValue.form.elements[objValue.name];
    var one_selected=false;
    for(var r=0;r < objradio.length;r++)
    {
        if(objradio[r].checked)
        {
            one_selected=true;
            break;
        }
    }
    if(false == one_selected)
    {
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestSelectOneCheck(objValue,strError)
{
    var objradio = document.getElementsByName(objValue);
    var one_selected=false;
    for(var r=0;r < objradio.length;r++)
    {
        if(objradio[r].checked)
        {
            one_selected=true;
            break;
        }
    }
    if(false == one_selected)
    {
        return false;
    }
    return true;
}
function TestEquals(objValue,strValue,strError)
{
    var ret = true;
    if(objValue.value != strValue ) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                 
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestNEquals(objValue,strValue,strError)
{
    var ret = true;
    if(objValue.value == strValue ) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                 
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestYear(objValue,strError){
    var minyear = 1900;
    var maxyear = 3000;
    var ret = true;
    ret = TestInputType(objValue,"[^0-9]",strError, 
        objValue.name+": Only digits allowed ");
    if(ret== false) return false;
    if(objValue.value > maxyear || objValue.value < minyear ) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                 
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}

var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
    var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
    var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
    // February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
    for (var i = 1; i <= n; i++) {
        this[i] = 31
        if (i==4 || i==6 || i==9 || i==11) {
            this[i] = 30
            }
        if (i==2) {
            this[i] = 29
            }
    } 
    return this
}

function TestDate(objValue,strError){
    dtStr = objValue.value;
    var daysInMonth = DaysArray(12)
    var pos1=dtStr.indexOf(dtCh)
    var pos2=dtStr.indexOf(dtCh,pos1+1)
    var strDay=dtStr.substring(0,pos1)
    var strMonth=dtStr.substring(pos1+1,pos2)
    var strYear=dtStr.substring(pos2+1)
    strYr=strYear
    if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
    if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
    for (var i = 1; i <= 3; i++) {
        if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
    }
    month=parseInt(strMonth)
    day=parseInt(strDay)
    year=parseInt(strYr)
    if (pos1==-1 || pos2==-1){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
		
    }
    if (strMonth.length<1 || month<1 || month>12){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function TestGreaterThanDate(objValue,strValue,strError)
{
    var ret = true;

    if(objValue.value < strValue ) 
    { 
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;                 
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
}
function CompareDate(src,desc){
    var srcdate = src.split(" "); 
    var srcday = srcdate[0].split("/"); 
    var srctime = srcdate[1].split(":"); 
    var descdate = desc.split(" "); 
    var descday = descdate[0].split("/"); 
    var desctime = descdate[1].split(":");
    src = srcday[2]*60*24*30*365+srcday[1]*60*24*30+srcday[0]*60*24+srctime[0]*60+srctime[1];
    desc = descday[2]*60*24*30*365+descday[1]*60*24*30+descday[0]*60*24+desctime[0]*60+desctime[1];
    if(src>desc)return -1;
    if(src==desc)return 0;
    if(src<desc)return 1;
}
function TestHourMinus(objValue,strError){
    objValue.value = trim(objValue.value);
    var arr = objValue.value.split(":"); 
    var hour = arr[0];
    var minus = arr[1];
    if(isInteger(hour) == false || (hour > 24 || hour <0 )){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    if(isInteger(minus) == false || (minus > 59 || minus <0 )){
        document.getElementById("ERR"+objValue.name).innerHTML = strError;
        return false;
    }
    document.getElementById("ERR"+objValue.name).innerHTML = "";
    return true;
} 
function validateInput(strValidateStr,objValue,strError) 
{ 
    var ret = true;
    var epos = strValidateStr.search("="); 
    var  command  = ""; 
    var  cmdvalue = ""; 
    if(epos >= 0) 
    { 
        command  = strValidateStr.substring(0,epos); 
        cmdvalue = strValidateStr.substr(epos+1); 
    } 
    else 
    { 
        command = strValidateStr; 
    } 
    switch(command) 
    { 
        case "req": 
        case "required":
{ 
            ret = TestRequiredInput(objValue,strError)
            break;             
        }//case required 
        case "maxlength": 
        case "maxlen":
{ 
            ret = TestMaxLen(objValue,cmdvalue,strError)
            break; 
        }//case maxlen 
        case "minlength": 
        case "minlen":
{ 
            ret = TestMinLen(objValue,cmdvalue,strError)
            break; 
        }//case minlen 
        case "alnum": 
        case "alphanumeric":
{ 
            ret = TestInputType(objValue,"[^A-Za-z0-9_]",strError, 
                objValue.name+": Only alpha-numeric characters allowed ");
            break; 
        }
        case "alnum_s": 
        case "alphanumeric_space":
{ 
            ret = TestInputType(objValue,"[^A-Za-z0-9_\\s]",strError, 
                objValue.name+": Only alpha-numeric characters and space allowed ");
            break; 
        }		   
        case "num": 
        case "numeric":
{ 
            ret = TestInputType(objValue,"[^0-9]",strError, 
                objValue.name+": Only digits allowed ");
            break;               
        }
        case "dec": 
        case "decimal":
{ 
            ret = TestInputType(objValue,"[^0-9\.]",strError, 
                objValue.name+": Only numbers allowed ");
            break;               
        }
        case "alphabetic": 
        case "alpha":
{ 
            ret = TestInputType(objValue,"[^A-Za-z]",strError, 
                objValue.name+": Only alphabetic characters allowed ");
            break; 
        }
        case "alphabetic_space": 
        case "alpha_s":
{ 
            ret = TestInputType(objValue,"[^A-Za-z\\s]",strError, 
                objValue.name+": Only alphabetic characters and space allowed ");
            break; 
        }
        case "email":
{ 
            ret = TestEmail(objValue,strError);
            break; 
        }
        case "lt": 
        case "lessthan":
{ 
            ret = TestLessThan(objValue,cmdvalue,strError);
            break; 
        }
        case "gt": 
        case "greaterthan":
{ 
            ret = TestGreaterThan(objValue,cmdvalue,strError);
            break; 
        }//case greaterthan 
        case "regexp":
{ 
            ret = TestRegExp(objValue,cmdvalue,strError);
            break; 
        }
        case "dontselect":
{ 
            ret = TestDontSelect(objValue,cmdvalue,strError)
            break; 
        }
        case "dontselectchk":
        {
            ret = TestDontSelectChk(objValue,cmdvalue,strError)
            break;
        }
        case "shouldselchk":
        {
            ret = TestShouldSelectChk(objValue,cmdvalue,strError)
            break;
        }
		case "check_selected":
		{
			ret = check_selected(objValue,strError)
		}
        case "selone_radio":
        {
            ret = TestSelectOneRadio(objValue,strError);
            break;
        }
        case "selone_check":
        {
            ret = TestSelectOneCheck(objValue,strError);
            break;
        }
        case "equ":
        {
            ret = TestEquals(objValue,cmdvalue,strError);
            break;
        }
        case "nequ":
        {
            ret = TestNEquals(objValue,cmdvalue,strError);
            break;
        }
        case "year":
        {
            ret = TestYear(objValue,strError);
            break;
        }
        case "date":
        {
            ret = TestDate(objValue,strError);
            break;
        }
        case "gtdate": 
        case "greaterthandate":
{ 
            ret = TestGreaterThanDate(objValue,cmdvalue,strError);
            break; 
        }//case greaterthan 
        case "hour:minus" :
        {
            ret = TestHourMinus(objValue,strError);
            break;
        }
    }//switch 
    return ret;
}
function checkvalue(re_obj,re_value,msg){
    var t="";
    t=re_value.value.match(re_obj);
    if(t){
        return true;
    }else{
        if(msg!=''){
            alert(msg);
            re_value.focus();
        }
        return false;
    }
}
function getFullDate(obj){
    var re_date_dd=/^[0-9]{1,2}$/;
    var re_date_dds=/^[0-9]{1,2}[\\\/]$/;
    var re_date_ddmm=/^[0-9]{1,2}[\\\/][0-9]{1,2}$/;
    var re_date_ddmms=/^[0-9]{1,2}[\\\/][0-9]{1,2}[\\\/]$/;
    var s=obj.value;
    var d=new Date();
    if(checkvalue(re_date_dd,obj,'')){
        d.getDate();
        obj.value=s+"/"+(d.getMonth()+1)+"/"+d.getFullYear();
    }else if(checkvalue(re_date_dds,obj,'')){
        d.getDate();
        obj.value=s+d.getMonth()+"/"+d.getFullYear();
    }else if(checkvalue(re_date_ddmm,obj,'')){
        d.getDate();
        obj.value=s+"/"+d.getFullYear();
    }else if(checkvalue(re_date_ddmms,obj,'')){
        d.getDate();
        obj.value=s+d.getFullYear();
    }
}
function getMinDate(obj){
    var re_date_dd=/^[0-9]{1,2}$/;
    var re_date_dds=/^[0-9]{1,2}[\\\/]$/;
    var re_date_ddmm=/^[0-9]{1,2}[\\\/][0-9]{1,2}$/;
    var re_date_ddmms=/^[0-9]{1,2}[\\\/][0-9]{1,2}[\\\/]$/;
    var s=obj.value;
    var d=new Date();
    if(checkvalue(re_date_dd,obj,'')){
        d.getDate();
        obj.value=s+"/"+(d.getMonth()+1);
    }else if(checkvalue(re_date_dds,obj,'')){
        d.getDate();
        obj.value=s+d.getMonth();
    }else if(checkvalue(re_date_ddmm,obj,'')){
        d.getDate();
        obj.value=s;
    }else if(checkvalue(re_date_ddmms,obj,'')){
        d.getDate();
        obj.value=s;
    }
}
function getFullTime(obj){
    var s=obj.value;
    if(s!=""){
        var arrs = s.split(":");
        if(arrs.length==1){
            if(isInteger(arrs[0])){
                if(parseInt(arrs[0],10)>23){
                    obj.value="";
                }else{
                    obj.value = parseInt(arrs[0],10)+":"+"00";
                }
            }else{
                obj.value = "";
            }
        }else if(arrs.length>=2){
            if(isInteger(arrs[0]) && isInteger(arrs[1])){
                if(parseInt(arrs[0],10)>23){
                    obj.value="";
                }else{
                    if(parseInt(arrs[1],10)>59){
                        obj.value="";
                    }else{
                        obj.value = parseInt(arrs[0],10)+":"+parseInt(arrs[1],10);
                    }
                }
            }else{
                obj.value = "";
            }
        }
    }
}