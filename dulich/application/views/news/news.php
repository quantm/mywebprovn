<?php 
//.............................................../
// http://nguyenhuuhuan.org						./
// Modules cap nhat tin tu cac bao dien tu				./
// Bien soan Nguyen Van Khoi theo y tuong cua quanphp
//.............................................../
include("tudong.class.php"); 

$item = 1; 
$item = empty($_GET['item'])? $item : $_GET['item']; 
$sid = 1;
$sid = empty($_GET['sid'])? $sid : $_GET['sid'];
$url = empty($url) ? "" : $url; 
if ($url == '') { 
switch ($item) { 

   case 1: 
      $default = "http://vnexpress.net/";//"http://vnexpress.net/GL/Home/"; 
      $file = "vnexpress.php"; 
      $copy_right = "VnExpress";
	  $index = 1;
      break; 
   case 2:
      $default = "http://www.zing.vn/news/";
      $file = "zing.php";
      $copy_right = "Zing.vn";
	  $index = 1;
      break;
/*   case 2: 
      $default = "http://www.thongtincongnghe.com/"; 
      $file = "congnghe.php"; 
      $copy_right = "Thông tin công nghệ";
      $index = 1;
      break; */
   case 3: 
      switch ($sid) {
      	case 1:
      	   $default = "http://ngoisao.net/News/Thoi-cuoc/"; 
	   $ptitle = "Thời cuộc";
	   break;
	case 2:
      	   $default = "http://ngoisao.net/News/Hau-truong/"; 
	   $ptitle = "Hậu trường";
	   break;
	case 3:
      	   $default = "http://ngoisao.net/News/The-thao/"; 
	   $ptitle = "Thể thao";
	   break;
	case 4:
      	   $default = "http://ngoisao.net/News/Chang-nang/"; 
	   $ptitle = "Tâm tình";
	   break;
	case 5:
      	   $default = "http://ngoisao.net/News/Hinh-su/"; 
	   $ptitle = "Hình sự";
	   break;
	case 6:
      	   $default = "http://ngoisao.net/News/Choi-blog/"; 
	   $ptitle = "Chơi blog";
	   break;
	case 7:
      	   $default = "http://ngoisao.net/News/Lam-dep/"; 
	   $ptitle = "Làm đẹp";
	   break;
	case 8:
      	   $default = "http://ngoisao.net/News/Buon-chuyen/"; 
	   $ptitle = "Chuyện lạ";
	   break;
	case 9:
      	   $default = "http://ngoisao.net/News/Thoi-trang/"; 
	   $ptitle = "Thời trang";
	   break;
	case 10:
      	   $default = "http://ngoisao.net/News/Choi-gi/"; 
	   $ptitle = "Giải trí";
	   break;
	}
      $file = "ngoisao.php"; 
      $copy_right = "Ngôi sao.net";
      $index = 1;
      break; 
   case 4: 
      $default = "http://dantri.com.vn/"; 
      $file = "dantri.php"; 
      $copy_right = "Dân Trí";
	  $index = 1;
      break; 
   case 5: 
      $default = "http://www.thanhnien.com.vn/Pages/default.aspx"; 
      $file = "thanhnien.php"; 
      $copy_right = "Thanh Nien";
      $index = 1;
      break; 
   case 6: 
      $default = "http://www.thanhnien.com.vn/Pages/default.aspx"; 
      $file = "thanhnien_gd.php"; 
      $copy_right = "Thanh Nien";
      $index = 1;
      break; 
   case 7: 
      $default = "http://vnexpress.net/";//"http://vnexpress.net/GL/Home/"; 
      $file = "vnexpress_vh.php"; 
      $copy_right = "VnExpress";
      $index = 1;
      break; 
   case 8: 
      $default = "http://www.thanhnien.com.vn/Pages/default.aspx"; 
      $file = "thanhnien_gd1.php"; 
      $copy_right = "Thanh Nien";
      $index = 1;
      break; 
   case 9: 
      $default = "http://vnexpress.net/";//"http://vnexpress.net/GL/Home/"; 
      $file = "vnexpress_vh1.php"; 
      $copy_right = "VnExpress";
      $index = 1;
      break; 
   case 10: 
      $default = "http://www.giaoduc.edu.vn/"; 
      $file = "giaoduc.php"; 
      $copy_right = "Giao Duc";
      $index = 1;
      break; 
   case 11:
      $default = "http://tintuconline.com.vn/vn/index.html";
      $file = "vietnamnet.php";
      $copy_right = "VietNamNet";
	  $index = 1;
      break;
   case 12:
      $default = "http://www.zing.vn/news/";
      $file = "zing.php";
      $copy_right = "Zing.vn";
	  $index = 1;
      break;
   case 13:
      $default = "http://www.khoahoc.com.vn/";
      $file = "khoahoc.php";
      $copy_right = "Khoahoc.com.vn";
	  $index = 1;
      break;
   case 14:
      $default = "http://laodong.com.vn/";
      $file = "laodong.php";
      $copy_right = "laodong.vn";
	  $index = 1;
      break;
   case 15:
      $default = "http://vtc.vn/";
      $file = "vtcnews.php";
      $copy_right = "VTC_News";
	  $index = 1;
      break;
   case 16:
      $default = "http://www.tienphong.vn/trang-chu/index.html";
      $file = "tienphong.php";
      $copy_right = "Tien Phong Online";
	  $index = 1;
      break;
   case 17:
      $default = "http://suckhoedoisong.vn/home.htm";
      $file = "suckhoe.php";
      $copy_right = "Suc khoe";
	  $index = 1;
      break;
   case 18:
      $default = "http://giadinh.net.vn/";
      $file = "giadinh.php";
      $copy_right = "Suc khoe";
	  $index = 1;
      break;
   case 19:
      $default = "http://www.dulichvn.org.vn/";
      $file = "dulich.php";
      $copy_right = "Du lich";
	  $index = 1;
      break;
   case 20:
      $default = "http://thethaovanhoa.vn/home.htm";
      $file = "thethaovanhoa.php";
      $copy_right = "The thao & Van hoa";
	  $index = 1;
      break;
   case 21:
      $default = "http://sohoa.vnexpress.net/";
      $file = "sohoa.php";
      $copy_right = "The gioi nghe nhin";
	  $index = 1;
      break;
   default: 
      $default = "http://vnexpress.net/";//"http://vnexpresss.net/GL/Home"; 
      $file = "vnexpress.php"; 
      $copy_right = "Giadinh.net";
      $index = 1;
      break; 
} 
//end of if 
} 

$indexpage = "?language=vi&nv=autonews&item=$item"; 
$url = empty($_GET['id'])? $default : $_GET['id']; 
$news = new AUTONEWS($url,$indexpage); 
$news->converturl($url,$base); 
include ($file); 

?> 