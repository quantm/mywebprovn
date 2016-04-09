<?php
require_once 'application/controllers/web_transfer.php';
class analytic extends CI_Controller{
//start function
function myweb($type){
$date = getdate();
$pageview_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
$pageview=$this->db->select('pageview')->from('analytic_'.$type.'')->where('date',$pageview_date)->get()->result_array();

//start switch
switch($type){
//general analytic
case "general":
if($pageview){
foreach($pageview as $key);
$pageview=$key['pageview']+1;
$update=array('pageview'=>$pageview);
$this->db->where('date',$pageview_date);
$this->db->update('analytic_general',$update);
}
else {
$this->db->insert('analytic_general',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end general

//book analytic
case "book":
if($pageview){
foreach($pageview as $key);
$pageview=$key['pageview']+1;
$update=array('pageview'=>$pageview);
$this->db->where('date',$pageview_date);
$this->db->update('analytic_book',$update);
}
else {
$this->db->insert('analytic_book',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end book analytic

//game analytic
case "game":
if($pageview){
foreach($pageview as $key);
$pageview=$key['pageview']+1;
$update=array('pageview'=>$pageview);
$this->db->where('date',$pageview_date);
$this->db->update('analytic_game',$update);
}
else {
$this->db->insert('analytic_game',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end game analytic

//game analytic
case "music":
if($pageview){
foreach($pageview as $key);
$pageview=$key['pageview']+1;
$update=array('pageview'=>$pageview);
$this->db->where('date',$pageview_date);
$this->db->update('analytic_music',$update);
}
else {
$this->db->insert('analytic_music',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end game analytic

//video analytic
case "video":
if($pageview){
foreach($pageview as $key);
$pageview=$key['pageview']+1;
$update=array('pageview'=>$pageview);
$this->db->where('date',$pageview_date);
$this->db->update('analytic_video',$update);
}
else {
$this->db->insert('analytic_video',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end video analytic

}
//end switch

}
//end function

}
?>