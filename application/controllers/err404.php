<?php class err404 extends CI_Controller {
		function index(){
			echo '<meta charset="UTF-8"/>';
			echo '<h1>Không tìm thấy trang</h1>';
			die('<title>Không tìm thấy trang</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
		}
}?>