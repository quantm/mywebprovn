<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tủ sách của <?=$user_name?>" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/bookcase.png" />
<meta property="og:type" content="book" />
<meta property="og:description" content="Thư viện của <?=$user_name?>" />
<!-- end meta  -->

<title>Tủ sách của <?=$user_name?></title>
<link href="/css/elib/reset.css" rel="stylesheet" type="text/css" />
<link href="/css/elib/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/elib/cufon-yui.js"></script>
<script type="text/javascript" src="/js/elib/cufon-replace.js"></script>
<script type="text/javascript" src="/js/elib/segoeui_400.font.js"></script>
<!--[if IE ]> <link href="/css/elib/ie.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript" src="http://raovatnhanh.net.co/js/library/userlibrary.js"></script>
</head>
<body>
<!-- user category selection-->
<ul class="dropdown-menu" id="modal_choice_category" role="menu" aria-labelledby="dLabel">
	<li id="selected_book"></li>
	<li style="clear:both;height:10px"></li>
	<li class="dropdown-divider"></li>                    
	<li>
	<table class="table_user_category">
	<?php foreach($category_names as $key):?>
		<tr>
		<td><?=$key['name']?> </td>
		<td>
			<input class="cb_user_cate" value="<?=$key['id']?>" type="checkbox"/>
			<span style="color:red;margin-left:5px;" class="remove_success"></span>
			<span style="color:green;margin-left:5px;" class="add_success"></span>
		</td>
		</tr>
	<?php endforeach;?>
	</table>
	</li>
	<li class="dropdown-divider"></li>
	<li class="context-add-category" style="display:none">
		<span class="context-category-name"></span>
		<input class="cb_user_cate" type="checkbox" checked="checked" disabled="disabled"/>
		<span style="color:green;margin-left:5px;" class="add_success">Đã thêm vào danh mục</span>
	</li>
	<li><input class="user_create_category" type="text" placeholder="Thêm danh mục mới">
	<input type="button" value="Thêm" class="add_new_category"/>
	<span class="add_new_cate_pending" style="display:none;color:red"><img src="http://raovatnhanh.net.co/images/ajax_load_green.gif">Vui lòng chờ...</span> 
	</li>
	<li class="btn btn-info btn-finish-add-book">Xong</li>
</ul>
<!--//-->

<!-- modal user book add to category-->
<div class="modal hide fade" id="user_add_book_to_bookcase">
<div style="display:none" class="pagination-pending"><img src="http://raovatnhanh.net.co/images/ajax-loader-2.gif"><span style="color:red">Vui lòng chờ...</span></div>
<div class="modal-header">
	<input id="q_lib" name="q_lib" type="text" placeholder="Gõ tên tài liệu bạn cần thêm vào tủ sách"></input>
	<span class="fetch_search_result_pending" style="display:none;color:red"><img src="http://raovatnhanh.net.co/images/ajax_load_green.gif">Vui lòng chờ...</span> 
	<span class="btn btn-inverse btn-search-book" style="height:17px;margin-top: -1px;">Tìm</span>
</div>

<div class="modal-body" id="search_result"></div>
<div class="modal-footer">
	<table class="footer-pagination" style="float:left"></table>
	<span class="btn btn-danger btn-finish btn-return-lib" style="display:none" onclick="window.location.reload()">Hoàn tất</span>
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div style="margin-top:5px" class="519011620" data-ants-zone-id="519011620"></div>
</div>
</div>
<!-- /-->

<!-- modal add book from url-->
<div class="modal hide fade" id="user_add_book_from_url">
	<div class="modal-header">
		Thêm <span class="cate_add_from_url"></span> vào danh mục bên dưới (bạn có thể chọn nhiều danh mục)
		<p style="float:right;color:red;cursor:pointer;font-size:20px;" onclick="window.location.reload()" data-dismiss="modal">×</p>
	</div>
	<div class="modal-body">
		<table class="table_user_category">
		<?php foreach($category_names as $key):?>
		<tr>
		<td><?=$key['name']?> </td>
		<td>
			<input class="cb_user_cate" value="<?=$key['id']?>" type="checkbox"/>
			<span style="color:red;margin-left:5px;" class="remove_success"></span>
			<span style="color:green;margin-left:5px;" class="add_success"></span>
		</td>
		</tr>
		<?php endforeach;?>
		<tr class="ctx_add_from_url_cate" style="display:none">
			<td class="ctx_add_from_url_cate_name"></td>
			<td>
				<input class="cb_user_cate" type="checkbox" disabled='disabled'/>
				<span style="color:green;margin-left:5px;" class="add_success">Đã thêm vào danh mục</span>
			</td>
		</tr>
		</table>
		<div class="must_choice_cate"></div>
		<input type="text" class="text_add_from_url" placeholder="Dán url vào đây"/>
		<input type="button" value="Thêm" class="btn btn-primary btn_add_from_url"/>
		<input type="button" value="Hoàn tất" class="btn btn-inverse btn-return-lib" data-dismiss="modal" style="margin-left:10%;margin-top:-4px;height:30px;"/>
		<span class="add_new_cate_pending" style="display:none;color:red"><img src="http://raovatnhanh.net.co/images/ajax_load_green.gif">Vui lòng chờ...</span> 
	</div>
	<div class="modal-footer">Thêm bất cứ gì bạn đọc cảm thấy hay vào <a href="/book/mybook" target="_blank">tủ sách của bạn</a></div>
</div>
<!--/-->

<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div style="position: fixed;margin-left: 89.7%;margin-top: 8.6%;z-index:10000000" class="517324793" data-ants-zone-id="517324793"></div>

<div style="width: 245px;" class="book_category">
<?php foreach($category_names as $key):?>
	<div>
		<a href="/book/mybook?category=<?=$key['name']?>"><?=$key['name']?></a>
	</div></br>
<?php endforeach;?>
</div>

<div class="btn btn-success add-to-mybookcase dropdown">
<span id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">Thêm sách vào tủ</span>
	<ul class="dropdown-menu"  role="menu" aria-labelledby="dLabel">
		<li title="Thêm sách vào tủ từ cơ sở dữ liệu của website" id="add_from_db">Thêm từ database</li>
		<li class="dropdown-divider" style="clear:both;height:5px"></li> 
		<li title="Thêm sách vào tủ từ URL bên ngoài" id="add_from_url">Thêm từ URL</li>
		<!--<li title="Tải lên từ máy tính của bạn" id="add_from_url">Tải lên từ máy tính</li>-->
	</ul>
</div>

<form action="/book/mybook" method="post">
	<input type="text" style="border-bottom: none;border-top: none;border-right: none;border-left: none;" class="q_search_the_lib" name="q" placeholder="Gõ từ khóa và Enter để tìm sách trong tủ"/>
	<input type="hidden" name="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
<div class="fb-share-button" data-href="http://myweb.pro.vn/book/mybook?user_id=<?=$user_id?>" data-layout="button_count"></div>
<div id="main" style="margin-left: 5%;">
  <div id="outer">
    <div id="top_pad">
      <div id="name_outer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="name">
          <tr>
            <td id="name_left">&nbsp;</td>
            <td align="center" valign="middle" class="pad">
				<a href="/book/mybook">Tủ sách của <?=$user_name?></a>
			</td>
            <td id="name_right">&nbsp;</td>
          </tr>
        </table>
      </div>
    </div>
<div id="top">
      <div id="top_r_bg">
        <div class="center column">
          <div class="corner">
            <div id="letters"><?=$cate?></div>
          </div>
        </div>
              </div>
</div>

<!-- start body -->
<?php $loop = -1; foreach($elib as $key):?>
<?php $loop++; if ($loop % 4 == 0) { ?>
<div class="shelf_container bookcase" id="shelf_container_<?=$loop?>" id_db="<?=$key['ID']?>">
	  <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
			<a href="/<? if($key['REFERER']=='tailieuhoctapvn') {echo 'doc-sach-tham-khao?id='.$key['ID'];} if($key['REFERER']!='tailieuhoctapvn') {echo 'mydoc?id='.$key['ID']; }?>" title='<?=$key['NAME']?>' target="_new">
				<button  class="btn btn-primary btn-read" style="display:none" >Đọc</button>
				<img src="<?=$key['THUMBS']?>" onerror='this.src="http://raovatnhanh.net.co/images/err_thumb.jpg"' alt="<?=$key['NAME']?>" width="100" height="130" />
			</a>
			</div>
		  </div>
        </div>
      </div>
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<?php } ?>

	<?php if ($loop % 4 != 0) { ?>
	<div class="append_container"  style="display:none" id="shelf_container_<?=$loop?>">
      <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
			<a href="/<? if($key['REFERER']=='tailieuhoctapvn') {echo 'doc-sach-tham-khao?id='.$key['ID'];} if($key['REFERER']!='tailieuhoctapvn') {echo 'mydoc?id='.$key['ID']; }?>" title='<?=$key['NAME']?>' target="_new">
			<button  class="btn btn-primary btn-read" style="display:none" >Đọc</button>
			<img src="<?=$key['THUMBS']?>" onerror='this.src="http://raovatnhanh.net.co/images/err_thumb.jpg"' alt="<?=$key['NAME']?>" width="100" height="130" /></a>
			</div>
		  </div>
        </div>
      </div>
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
	</div>
	<?php } ?>

<?php endforeach;?>
<!-- end body -->

	<div id="bottom">
      <div class="center column">
        <div class="corner">&nbsp;</div>
      </div>
      <div class="left column"> 
		<ul class="breadcrumb">
			<li class="active footer_pagination"><?=$pagination?></li>
		</ul>
		</div>
      <div class="right column">
        <div class="pad">Tổng số: <?=$count_elib?> ebook</div>
      </div>
    </div>
  </div>
</div>
<input id="count_elib" value="<?=$count_elib?>" type="hidden"/>
<input id="id_category" value="<?=$id_category?>" type="hidden"/>
<input id="id_doc" type="hidden"/>
</body>
</html>	