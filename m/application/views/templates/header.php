<link href="/css/menu.css" rel="Stylesheet">
<link href="/css/general.css" rel="Stylesheet">
<meta charset="utf-8">
<div class="h_green" id="border-top">
		<div>
			<div>
				<div style="float:left;padding:12px;background:none;position:absolute;">
					<span class="title">Văn phòng điện tử</span><br>
					<span class="title">Phiên bản 1.0</span><br>
					<span class="title"></span><br>
				</div>
				<div style="float:right;background:none;margin:0;padding:0px;padding-right:12px;">
					<br>
					<div style="float:right;background:none;" id="Layer1">
						<img width="80" height="80" src="/images/user.gif">
					</div>
						<span><a href="/auth/user/changepassword">Quản trị  hệ thống</a></span>
				</div>
			</div>
		</div>
	</div>
	
<div id="header-box">
		<div id="module-status">
			<div style="float:right;clear:right">
				<a href="/user/logout"><span><img src="/images/icon-16-logout.png"></span></a>
			</div>			
		</div>

<!--
		 <div class='MainNavigator'>
				<ul id='menu'>
						<?php foreach($parentmenu as $parent):?>
						<li class='node'>
							 <a href=''><?php echo $parent['name'] ?></a>
								<ul>
										<?php foreach($childmenu as $child):?>
										<li class='node'>
											 <a href=''>
												<?php echo $child['name']?>
											  </a>
										</li>
										<?php endforeach;?>
								</ul>
						</li>
						<?php endforeach;?>
				</ul>
		 </div>

-->	  

         <div class="mainNavigator"> 
         
         <ul id="menu">
          
			<li class="node">
							<a href="/home/">Trang chủ</a>
						</li>
			<li class="node">
							<a href="qtht/config/index">Quản lý</a>
							<ul style="width: 165px;">
						<li style="width: 165px;">
							<a href="qtht/danhmucnguoidung/index">Nhân sự</a>
								<ul style="width: 101px;">
									<li style="width: 101px;">
											<a href="/user/userlist/">Danh sách</a>
									</li>
									<li style="width: 101px;">
											<a href="/user/adduser/">Thêm mới</a>
									</li>
								</ul>
						</li>
					
						<li style="width: 165px;" class="node">
							<a href="qtht/config/index">Văn bản</a>
							<ul style="width: 101px;">
					
						<li style="width: 101px;">
							<a href="qtht/menus/index">Danh sách</a>
						</li>
					
						<li style="width: 101px;">
							<a href="qtht/actions/index">Thêm mới</a>
						</li>
					
						<li style="width: 101px;">
							<a href="qtht/modules/index">Modules</a>
						</li>
					</ul></li>
						<li style="width: 165px;">
							<a href="qtht/departments/index">Phòng vụ</a>
						</li>
					
						<li style="width: 165px;">
							<a href="qtht/groups/index">Nhóm người dùng</a>
						</li>
					</ul></li>
						
						<li class="node">
							<a href="qtht/danhmuccoquan/index">Lịch</a>
							<ul style="width: 165px;">				
						
									<li style="width: 165px;">
										<a href="qtht/danhmucnhomnguoidung/index">Lịch cơ quan</a>
									</li>
								
									<li style="width: 165px;">
										<a href="qtht/chuyenmuc/index">Lịch phòng ban</a>
									</li>


									<li style="width: 165px;">
										<a href="qtht/chuyenmuc/index">Lịch cá nhân</a>
									</li>
						
							</ul>
					
						</li>

						<li class="node">
							<a href="vbden/vbden/list">Tài liệu</a>
							<ul style="width: 118px;">
					
						<li style="width: 118px;">
							<a href="vbden/vbden/list">Danh sách</a>
						</li>
					
						<li style="width: 118px;">
							<a href="vbden/vbden/input">Thêm mới</a>
						</li>
					</ul></li>
						<li class="node">
							<a href="qtht/qlnv/index">Tin nhắn</a>
							<ul style="width: 239px;">
					
						<li style="width: 118px;">
							<a href="qtht/qhgd/index">Hộp thư</a>
						</li>

						<li style="width: 118px;">
							<a href="qtht/qhgd/index">Soạn tin</a>
						</li>

					</ul></li>
						<li class="node">
							<a href="search/search/index">Họp trực tuyến</a>
							<ul style="width: 158px;">
					
						<li style="width: 158px;">
							<a href="search/search/doctrine">Tham gia</a>
						</li>
				
					
					</ul></li>
						<li class="node">
							<a href="qtht/album/index">Kiến thức</a>
						</li>
                 </ul>
			</div>
   	
		
	