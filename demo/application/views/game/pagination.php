<tr class="tr_game_loading" align="center"><td colspan="9"><div class="game_fetch"><i class="fa fa-spinner fa-spin fa-3x"></i></div></td></tr>
<tr>
<?php $condition = empty($game_index) || !is_array($game_index) ? 0 : count($game_index); ?>
			<?php if ($condition) {
                $loop = -1;
                foreach ($game_index as $key) {                    
					$loop++; ?>
                            <?php if ($loop && $loop % 8 == 0) { ?>
                        <tr>
        <?php } ?>
                        <td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 8 ?>%">
        <?php if ($key["THUMBS"]) { ?>
                                <a style="color:rgb(143,13,13)"href='/play?id=<?=$key['ID']?>'>
								<div class="game_div_item" id="game_div_item_<?= $key['ID'] ?>">
                                    <div class="wrapper_youtube_icon">
										<input type="hidden" value="<?=$key['VIDEO_DESCRIPTION']?>"/>
										<input type="hidden" id="game_name_video_description" value="<?=$key['NAME']?>"/>
                                        <i  title="Xem video" data-toggle="tooltip" data-placement="top"  class="<?if($key['VIDEO_DESCRIPTION'] != '') echo 'fa fa-play-circle'?>"></i>
                                    </div>
                                    <img class="game_thumbs" alt="<?=$key['NAME']?>" title="<?= $key['DESCRIPTION'] ?>" src="<?= $key['THUMBS'] ?>" />
                                    <div class="div_clear_both"></div>
                                    <span><?= $key['NAME'] ?></span>
                                    <button id="game_item_<?= $key['ID'] ?>" data-toggle="modal" href="#modal_game_list" data-name="<?= $key['NAME'] ?>"  data-href="<?= $key['EMBED_PATH'] ?>" class="game_list btn btn-primary" >Chơi ngay</button>
                                    <input type="hidden" value='<?=$key['DESCRIPTION']?>'/>           
                                </div>
								</a>
                        <?php } ?>
                        </td>
    <?php }
} ?>
</tr>
</tr>
<input type="hidden" value="<?=$num_row_per_page?>" id="num_row_per_page" />
