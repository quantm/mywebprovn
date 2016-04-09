<?php foreach($element_content as $key):?>
			<div class="music_title" id="music_title_<?=$key['id']?>">
				<p><?=$key['name_element']?></p>
				<?php if($key['data_audio'] != null):?>
					<video src="<?=$key['data_audio']?>" controls="" title="Nghe (nhạc không lời)" data-toggle="tooltip" data-placement="left"  class="html5_video"></video>
				<?php endif;?>	
				<?php if($key['data_audio'] == null):?>
					<?php if($key['data_lyric'] != null):?><video src="<?=$key['data_lyric']?>" controls="" title="Nghe (nhạc có lời)" data-toggle="tooltip" data-placement="left"  class="html5_video"></video><?php endif;?>	
				<?php endif;?>	
				<?php if($key['data_lyric'] != ''):?>
						<input type="hidden" value="<?=$key['data_lyric']?>"/>
				<?php endif;?>	
				<div class="music_key">
					<? if($key['content'] != ''):?><?=$key['content']?><?php endif;?>
					<? if($key['content'] == ''):?><?=$key['lyric']?><?php endif;?>
					<div  id="music_lyric_<?=$key['id']?>" class="music_lyric">
						<?=$key['lyric']?>
						<?php if($key['data_lyric'] != null):?>
							<video src="<?=$key['data_lyric']?>" controls="" title="Nghe (nhạc có lời)" data-toggle="tooltip" data-placement="left"  class="html5_video_lyric"></video>
						<?php endif;?>		
					</div>
				</div>
				<a class="click_to_view_lyric" data-toggle="tooltip" data-placement="right" title="<?=$key['name_element']?>"><i><?php if($key['lyric'] != ''):?><?php echo "Click để xem lời bài hát" ?><?php endif;?></i></a>
		   </div>
<?php endforeach;?>