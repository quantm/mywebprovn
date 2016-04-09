//document.write('<scr' + 'ipt type="text/javascript" src="/js/json/Base64.js"></scr' + 'ipt>');
function AjaxEngine () {}

AjaxEngine.prototype.createXMLHttp = function(){
	
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

AjaxEngine.prototype.loadDivFromForm = function (divId, frmOject ) 
{
    var oXmlHttp = this.createXMLHttp();
    oXmlHttp.open("post", frmOject.action , false); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    var post = this.getDataFromFrm(frmOject);
    //var post="";
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                updateData(oXmlHttp.responseText,divId); 
            } else { 
            //Tu tu lam
            } 
        } 
    }; 
   
    oXmlHttp.send(post);
}
AjaxEngine.prototype.loadDivFromUrlAndForm = function (divId, url, frmOject ) 
{ 	
    var oXmlHttp = this.createXMLHttp();
    oXmlHttp.open("post", url , true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    var post = this.getDataFromFrm(frmOject);
    //var post="";
    oXmlHttp.onreadystatechange = function () 
    {
        if (oXmlHttp.readyState == 4) 
        { 
            if (oXmlHttp.status == 200) { 
    
                updateData(oXmlHttp.responseText,divId); 
            } else { 
            //Tu tu lam
            } 
        } 
    }; 
   
    oXmlHttp.send(post);
}
AjaxEngine.prototype.loadDivFromObject = function (divId, odata, action ){
	
    var str_json = JSON.stringify(odata);
    var oXmlHttp = this.createXMLHttp();
    oXmlHttp.open("post", action , true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    var post = 'data='.str_json;
    
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                updateData(oXmlHttp.responseText,divId); 
            } else { 
            //Tu tu lam
            } 
        } 
    }; 
   
    oXmlHttp.send(post);
	
}

//goi ajax theo url theo method get
AjaxEngine.prototype.loadDivFromUrl = function (DivId, url ){
    var oXmlHttp = this.createXMLHttp();
    oXmlHttp.open("get", url , true);
   
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                //alert(oXmlHttp.responseText);
                updateData(oXmlHttp.responseText,DivId); 
            } else { 
            } 
        } 
    }; 
   
    oXmlHttp.send(null);
	
}

AjaxEngine.prototype.loadDivFromUrlAndHideImage = function (DivId, url,id_img ){
    var oXmlHttp = this.createXMLHttp();
    oXmlHttp.open("get", url , true);
   
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                //alert(oXmlHttp.responseText);
                updateData(oXmlHttp.responseText,DivId); 
                var oimg_load = document.getElementById(id_img);
                oimg_load.style.display = "none";
            } else { 
            } 
        } 
    }; 
   
    oXmlHttp.send(null);
	
}

updateData = function (htmlData,DivId){
	
    document.getElementById(DivId).innerHTML = htmlData;
	
}

AjaxEngine.prototype.hideDiv = function(DivId){
    document.getElementById(DivId).style.display = 'none';
}

AjaxEngine.prototype.displayDiv = function(DivId){
    document.getElementById(DivId).style.display = '';
}


getValueById = function (idEle){
    var ele = document.getElementById(idEle);
    return ele.value;
}

getValuesById = function (arr){
    var oData = new Object();
    for(i = 0 ; i< arr.length ;i++){
        oData.eval(arr[i])= getValueById(arr[i]);
    }
    return oData;
}

/**
 * The sendRequestToServer
 * Gửi request lên server
 * 
 * @param string url địa chỉ server cần send request
 * @param string type kiểu là post hay get
 * @param function success gọi hàm success được truyền từ client khi server trả về
 * @param function fail gọi hàm fail được truyền từ client khi server gặp lỗi trả về
 * @return
 */

sendRequestToServer = function (url,type,success,fail){	
    var AE = new AjaxEngine();
    var oXmlHttp = AE.createXMLHttp(); 	
    oXmlHttp.open(type, url , true);
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) {             	
                // thực hiện hàm success() nếu server trả dữ liệu về đúng   
                //alert(oXmlHttp.responseText);      		
                success(oXmlHttp.responseText);
            } else { 
                // thực hiện hàm fail() nếu server gặp lỗi trả dữ liệu
                fail();
            }            
        } 
    };  
    oXmlHttp.send(null);   
}

AjaxSubmit= function (url,type){	
    var AE = new AjaxEngine();
    var oXmlHttp = AE.createXMLHttp(); 	
    oXmlHttp.open(type, url , true);
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) {             	
                // thực hiện hàm success() nếu server trả dữ liệu về đúng   
                //alert(oXmlHttp.responseText);        		
                success(eval(oXmlHttp.responseText));
            } else { 
                // thực hiện hàm fail() nếu server gặp lỗi trả dữ liệu
                fail();
            }            
        } 
    };  
    oXmlHttp.send(null);   
}

CheckDataOnServer = function (url,type,success,fail){	
    var AE = new AjaxEngine();
    var oXmlHttp = AE.createXMLHttp(); 	
    oXmlHttp.open(type, url , true);
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) {             	
                // thực hiện hàm success() nếu server trả dữ liệu về đúng   
                //alert(oXmlHttp.responseText);        		
                success(eval(oXmlHttp.responseText));
            } else { 
                // thực hiện hàm fail() nếu server gặp lỗi trả dữ liệu
                fail();
            }            
        } 
    };  
    oXmlHttp.send(null);   
}


sendRequestToServerWithMessage = function (url,type,success,fail){	
    var AE = new AjaxEngine();
    var oXmlHttp = AE.createXMLHttp(); 	
    oXmlHttp.open(type, url , true);
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) {             	
                // thực hiện hàm success() nếu server trả dữ liệu về đúng          		  		     		
                success(oXmlHttp.responseText);
            } else { 
                // thực hiện hàm fail() nếu server gặp lỗi trả dữ liệu
                fail();
            }            
        } 
    };  
    oXmlHttp.send(null);   
}
sendDataToServer = function (oData,action){
    var str_json = JSON.stringify(oData);
    var post = "data=" + Base64.encode(str_json);
    //alert(post);
    var aj = new AjaxEngine();
    var oXmlHttp = aj.createXMLHttp();
    oXmlHttp.open("post", action ,true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                //alert(oXmlHttp.responseText);
                eval(oXmlHttp.responseText);
    	      	
            } else { 
                
            } 
        } 
    }; 
   
    oXmlHttp.send(post);
}




sendDataObjectNameToServer = function (name,action,iseval,IdDiv){
    var aj = new AjaxEngine();
    var post = aj.getDataFromObject(name);
	
    var oXmlHttp = aj.createXMLHttp();
    oXmlHttp.open("post", action ,true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                if(typeof(iseval) == "undefined" || iseval == true ){
                    //alert(oXmlHttp.responseText);
                    eval(oXmlHttp.responseText);
                }else{
                    updateData(oXmlHttp.responseText,IdDiv);
                }
            } else { 
                
            } 
        } 
    }; 
   
    oXmlHttp.send(post);
}
execfunction = function (modulename,controllername,functionname,parameter){
    var aj = new AjaxEngine();
    var oXmlHttp = aj.createXMLHttp();
    oXmlHttp.open("post", "/"+modulename+"/"+controllername+"/"+functionname+"/"+parameter,true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                if(oXmlHttp.responseText!=""){
                    //alert(oXmlHttp.responseText);
                    eval(oXmlHttp.responseText);
                }
            } else { 
            } 
        } 
    };  
    oXmlHttp.send(null);
}
getvalue = function (modulename,controllername,functionname,parameter,action){
    if(!action)
        action='UpdateRet'
    var aj = new AjaxEngine();
    var oXmlHttp = aj.createXMLHttp();
    oXmlHttp.open("post", "/"+modulename+"/"+controllername+"/"+functionname+"?"+parameter,true); 
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    oXmlHttp.onreadystatechange = function () { 
        if (oXmlHttp.readyState == 4) { 
            if (oXmlHttp.status == 200) { 
                if(oXmlHttp.responseText!=""){
                    //alert(oXmlHttp.responseText);
                    retvalue = oXmlHttp.responseText;
                    if(typeof(eval(action))=="function")eval(action+"()");
            		
                }
            } else { 
            } 
        } 
    };  
    oXmlHttp.send(null);
}

loadDivFromUrl = function (IdDiv,url,isreload){
    var aj = new AjaxEngine();
    var div = document.getElementById(IdDiv);
    if(div.innerHTML == "")
    {		
        aj.loadDivFromUrl(IdDiv,url);
        aj.displayDiv(IdDiv);
        return false;
		
    }
    if(isreload ==1 ){
        aj.loadDivFromUrl(IdDiv,url);
        if(div.style.display == 'none')
            aj.displayDiv(IdDiv);
    }
    else{
        if(div.style.display == 'none'){
			
            aj.displayDiv(IdDiv);
			
        }else{
            aj.hideDiv(IdDiv);
        }
    }
    return false;
	
}

loadDiv = function (IdDiv,action,isreload,idObject,isTemp,year){

    var url  = action+"?idObject="+idObject+"&isTemp="+isTemp+"&year="+year+"&IdDiv="+IdDiv;
    //alert(url);
	
    var aj = new AjaxEngine();
    var div = document.getElementById(IdDiv);
    if(div.innerHTML == "" || isreload ==1){
        aj.loadDivFromUrl(IdDiv,url);
        if(div.style.display == 'none')
            aj.displayDiv(IdDiv);
    }
    else{
        if(div.style.display == 'none'){
            aj.displayDiv(IdDiv);
        }else{
            aj.hideDiv(IdDiv);
        }
    }
	
}



AjaxEngine.prototype.getDataFromFrm = function (frmOject){
	 
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
AjaxEngine.prototype.getDataFromObject = function (dataobj){
	
    var aParams = new Array();
    var element = document.getElementsByName(dataobj);
    //alert(element.length);
    for (var i=0 ; i < element.length; i++) { 
        var sParam = encodeURIComponent(element[i].name); 
        //alert(sParam);
        sParam += "="; 
        if(element[i].type=="checkbox")
            if(element[i].checked== true){
                sParam += encodeURIComponent(element[i].value);
            //alert(sParam);
            }
            else{
                continue;
            }
        	
        else
            sParam += encodeURIComponent(element[i].value); 
        
        aParams.push(sParam); 
    } 
 	
    return aParams.join("&");
}