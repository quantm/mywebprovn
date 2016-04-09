<meta charset='UTF-8'/>
<?php foreach($seo as $key):?>
<a href="/dulich/blog/<? $path=str_replace('http://dulich.vnexpress.net/','',$key['link']);$path=str_replace('/','--',$path); echo $path;?>" target="_new"><h2><?=$key['name']?></h2></a>
<?php endforeach;?>