var at_max_display = 8, 
    at_object_id = null, 
    at_object_name = null, 
    at_container = null,
    at_data = null,
    at_compare = true, 
    at_onok = "",
    at_curpos = 0,
    at_temp_data = null,
    at_begin_view = 0,
    at_end_view = 9;


$(document)
    .on("keydown", "#search", at_keydown)
    .on("keyup", "#search", at_Display)
    .on("click", ".search_game_name", click_search)
    .on("mouseover", ".search_game_name", set_value_search)
    
function set_value_search ()  {
    $("#search").val($(this).html().replace("<b>","").replace("</b>",""))
}   

function click_search ()
{   
    $("#game_header_search").submit()    
}              
function at_Load(name,id,data,fullcompare,onokfunction){	
	at_object_name = document.getElementById(name);
	at_object_id = document.getElementById(id);
	at_container = document.getElementById("atAutoComplete");
	at_data = data;
	at_curpos = -1;
	at_curtimeout = 5;
	at_compare = fullcompare;
	at_onok = onokfunction;
	at_Display();

}

function at_Display(event){
	var keycode = 0;
	if(event==null) event =  window.event;
	if(document.all){
		keycode = event.keyCode;
	}else{
		keycode = event.which;
	}
	//at_object_id.value = event.which;
	if (keycode == 9 || keycode == 38 || keycode == 40 || keycode == 13){
		return;
	}
	if(at_curpos==-1 && keycode > 0 && keycode != undefined)at_curpos=0;
	at_MakeView();
	at_FillData();
	at_Show();
}
function at_Show(){
	at_container.style.left = at_curLeft(at_object_name)+"px";
	at_container.style.top = (at_curTop(at_object_name)+at_object_name.offsetHeight)+"px";
	at_container.style.display = '';
}
function at_Hide(accept){
	var oldvalue = at_object_id.Value;
	at_container.style.display = 'none';
	if(accept){
		//alert(at_curpos);
		if(at_curpos>-1 && at_temp_data.length>0){
			at_object_id.value=at_temp_data[at_curpos][0];
			//at_object_name.value=at_temp_data[at_curpos][1];
		}else if(at_compare){
			if(at_object_id.value==0){
				at_object_id.value="0";
				at_object_name.value="";
			}
		}else{
			at_object_id.value="0";
		}
		if(oldvalue!=at_object_id.value){
			eval(at_onok);
		}
	}else{
		//alert(at_curpos);
		if(at_curpos>-1 && at_temp_data.length>0){
			if(at_object_name.value!=""){
				at_object_id.value=at_temp_data[at_curpos][0];
				//at_object_name.value=at_temp_data[at_curpos][1];
			}else{
				at_object_id.value="0";
				at_object_name.value="";
			}
		}else if(at_compare){
			if(at_object_id.value==0){
				at_object_id.value="0";
				at_object_name.value="";
			}
		}else{
			at_object_id.value="0";
		}
		if(oldvalue!=at_object_id.value){
			eval(at_onok);
		}
	}
	at_object_name.title = at_object_id.value;	    
}
function at_MakeView(){
	var txt = at_object_name.value, re = new RegExp(txt.replace(/[\/\\]/gi,""),"i");
	at_temp_data = new Array();
	for(var i=0;i<at_data.length;i++){
		if(at_data[i][1].toString().toLocaleUpperCase().indexOf(txt.toLocaleUpperCase())>=0){
			at_temp_data[at_temp_data.length]=new Array(at_data[i][0],at_data[i][1],at_data[i][2], at_data[i][3]);
		}
	}
	at_begin_view = 0;
	at_end_view = (at_temp_data.length-1)>=at_max_display-1?at_max_display-1:at_temp_data.length-1;
}
function at_FillData(){
	var html = '', txt = at_object_name.value,re = new RegExp(txt.replace(/[\/\\]/gi,""),"i");       
	html +="<table id=at_table>";
	for(var i=at_begin_view;i<=at_end_view;i++){
		if(i==at_curpos){		  
			html +="<tr>" +
				"<td class='td_thumbs' id='at_cell_"+i+"'>"+"<img  class='autocomple_thumbs' src="+at_temp_data[i][2]+">"+"</td>" +
				"<td style='background:#e8e8e8' id='at_cell_"+i+"' >"
                   + "<span class='search_game_name'>"+at_temp_data[i][1].replace(re,"<b>"+txt+"</b>")+ "</span>" 
                   + "<span class='search_game_category'>" +at_temp_data[i][3].replace(re,"<b><font color=red>"+txt+"</font></b>")+ "</span>" +
                "</td>" +
				"</tr>";
		}else{
			html +="<tr>" +
			"<td class='td_thumbs' id='at_cell_"+i+"' onmouseover='at_MouseOver("+i+")' onmouseout='at_MouseOut("+i+")' >"+"<img class='autocomple_thumbs'  src="+at_temp_data[i][2]+">"+"</td>" +
			"<td class='search_tr_td_black' id='at_cell_"+i+"' onmouseover='at_MouseOver("+i+")' onmouseout='at_MouseOut("+i+")'>"
                    + "<span class='search_game_name'>" + at_temp_data[i][1].replace(re,"<b>"+txt+"</b>")+ "</span>" 
                    + "<span class='search_game_category'>" + at_temp_data[i][3].replace(re,"<b>"+txt+"</b>") + "</span>" +
                "</td>" +
			"</tr>";	 
		}
	}
	html +="</table>"; 
	//alert(html);
	at_container.innerHTML = html;
	if(document.getElementById('at_table').offsetWidth<at_object_name.offsetWidth){
		document.getElementById('at_table').style.width = at_object_name.offsetWidth+"px";
	}
}
function at_MouseOver(i){
	document.getElementById('at_cell_'+i).style.background="#C6E7FF";
}
function at_MouseOut(i){
	document.getElementById('at_cell_'+i).style.background="#FFFFFF";
}
function at_curTop(obj){
    r = 0;
    while(obj){
        r += obj.offsetTop;
        obj = obj.offsetParent;
        if(obj==at_container.offsetParent)break;
    }
    return r;
}
function at_curLeft(obj){
    r = 0;
    while(obj){
        r += obj.offsetLeft;
        obj = obj.offsetParent;
        if(obj==at_container.offsetParent)break;
    }
    return r;
}

function at_keydown(event) {
    var keycode = 0;
	if(event==null) event =  window.event;
	if(document.all){
		keycode = event.keyCode;
	}else{
		keycode = event.which;
	}
	//at_object_id.value = event.which;
	if (keycode == 9){
		if(at_object_name.value==""){
			at_object_name.value = "";
			at_object_id.value = "0";
			at_curpos = -1;
		}else if(at_compare){
			if(at_temp_data.length==0){
				at_object_name.value = "";
				at_object_id.value = "0";
				at_curpos = -1;
			}
		}
		at_Hide(true);
		return;
	}
	if (keycode == 38){
		if(at_curpos==at_begin_view){
			if(at_begin_view>0){
				at_begin_view--;
				at_end_view--;
			}
		}
		at_curpos--;
		if(at_curpos==-1)at_curpos=0;
	}
	if(keycode == 40){
		if(at_curpos==at_end_view){
			if(at_end_view<at_temp_data.length-1){
				at_begin_view++;
				at_end_view++;
			}
		}
		at_curpos++;
		if(at_curpos>=at_temp_data.length)at_curpos=at_temp_data.length-1;
	}
	if (keycode == 13){
        if(at_compare){
			if(at_temp_data.length==0){
				at_object_name.value = "";
				at_object_id.value = "0";
				at_curpos = -1;
			}                        
		}
        $("#game_header_search").submit();        
		at_Hide(true);
		return;
    }
    at_FillData();
	at_Show();
}
    


