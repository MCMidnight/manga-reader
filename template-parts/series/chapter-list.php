<?php defined("ABSPATH") || die("!");?>
<ul <?php if(get_option('chstyle')=='2'){ echo ' class="clstyle"'; } ?>>
<?php foreach ($chapters as $k => $v) { 
	if($v['title'] !== ''){
		$chtitle = '<i> - '.$v['title'].'</i>';
	} else {
		$chtitle = '';
	}
	?>
	<li data-num="<?php echo esc_attr($v['number']); ?>"<?php if ($v['is_first']) echo ' class="first-chapter"'; ?>>
		<div class="chbox">
			<div class="eph-num">
				<a href="<?php echo $v['url']; ?>">
					<span class="chapternum"><?php echo GOV_lang::get('widget_chapter_label'); ?> <?php echo esc_html($v['number']); ?><?php echo $chtitle; ?></span>
					<span class="chapterdate"><?php echo $v['date']; ?></span>
				</a>
			</div>
			<?php if ($v['dl_link']) { ?>
			<div class="dt">
				<a href="<?php echo $v['dl_link']; ?>" rel="nofollow" class="dload" target="_blank"><i class="fas fa-cloud-download-alt"></i></a>
			</div>
			<?php } ?>
		</div>
	</li>
<?php } ?>
</ul>
