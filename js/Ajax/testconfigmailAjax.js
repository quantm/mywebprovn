function testconfigmailAjax () {}

testconfigmailAjax.prototype.createXMLHttp = function(){
	
	if (typeof XMLHttpRequest != "undefined") { 
        return new XMLHttpRequest(); 
    } else if (window.ActiveXObject) { 
      var aVersions = [ "MSXML2.XMLHttp.5.0", 
        "MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0", 
        "MSXML2.XMLHttp","Microsoft.XMLHttp" 
      ]; 
 
      for (var i = 0; i < aVersions.length; i++) { 
        try { 
            var oXmlHttp = new ActiveXObject(aVersions[i]); 
            return oXmlHttp; 
        } catch (oError) { 
            //Do nothing 
        } 
      } 
    } 
    throw new Error("XMLHttp object could be created."); 
}

testconfigmailAjax.prototype.getResultFromserver = function (frmOject, test_id , url , value ) 
{ 	
	var oXmlHttp = this.createXMLHttp();
 	url = url+"?test_id="+test_id+"&value="+value;
	//alert(url);
 	oXmlHttp.open("post", url , true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
 	var post="";
    if(frmOject != null)
 	post= this.getDataFromFrm(frmOject);
    oXmlHttp.onreadystatechange = function () 
    {
        if (oXmlHttp.readyState == 4) 
        { 
            if (oXmlHttp.status == 200) { 
    			
            	var re = oXmlHttp.responseText;
            	if(isInteger(re) == true){
    				if(test_id>0 && test_id <=4){
    					 updateState(test_id,re,"check_"+test_id); 
    				}
    			}else{
					updateState(test_id,0,"check_"+test_id);
				}
				//alert(oXmlHttp.responseText);
            } else { 
                //Tu tu lam
            } 
        } 
    }; 
   
   oXmlHttp.send(post);
}

testconfigmailAjax.prototype.getDataFromFrm = function (frmOject){
	 
    var aParams = new Array();
 	for (var i=0 ; i < frmOject.elements.length; i++) { 
        var sParam = encodeURIComponent(frmOject.elements[i].name); 
        sParam += "="; 
        if(frmOject.elements[i].type=="checkbox")
        	if(frmOject.elements[i].checked== true)
        		sParam += encodeURIComponent(frmOject.elements[i].value);
        	else
        		continue;
        	
        else
        	sParam += encodeURIComponent(frmOject.elements[i].value); 
        aParams.push(sParam); 
    } 
 	return aParams.join("&");
}

appendDivHTML = function (htmlData,divId){
	
	document.getElementById(divId).innerHTML += htmlData;
	
}

updateState = function (test_id,result,divId){
	
	var img_su = document.getElementById("check_"+test_id+"_suc");
	var img_fa = document.getElementById("check_"+test_id+"_err");
	var check_1_pro = document.getElementById("check_"+test_id+"_pro");
	var check_1_lbl_dis = document.getElementById("check_"+test_id+"_lbl_dis");
	if(result == 1){
		img_su.style.display = "";
		img_fa.style.display = "none";
		check_1_lbl_dis.style.color = "green";
	}else if(result == 0){
		img_fa.style.display = "";
		img_su.style.display = "none";
		check_1_lbl_dis.style.color = "red";
	}
	
	check_1_pro.style.display = "none";
	//var img_su = createImSuccess();
	//odiv.appendChild(img_su);
	//tao image
	//odiv.innerHTML += createImSuccess();
	
}

createImSuccess = function(){
	
	return "<img id='check_1_succ' src='/images/header/icon-48-checkin.png' width='16' height='16' border='0'></img>";
	
}

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

