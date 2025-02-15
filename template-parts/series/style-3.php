<div class="terebody">
<div class="postbody seriestu seriestere">
	<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> hentry" itemscope="itemscope" itemtype="http://schema.org/CreativeWorkSeries">
		<div class="seriestucon">
			<div class="seriestuheader">
				<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
				<?php $meta = rwmb_get_value( 'ero_japanese' ); if($meta){ ?>
				<div class="seriestualt">
					<?php echo $meta; ?>
				</div>
				<?php } ?>
			</div>
			<div class="seriestucontent">
				<div class="seriestucontl">
						<div class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<?php the_post_thumbnail('',array('title'=> get_the_title(),'alt'=> get_the_title(),'itemprop'=>'image')); ?>
							<?php 
							$type = rwmb_get_value( 'ero_type' );
							$colored = rwmb_get_value( 'ero_colored' );
							$clr = get_option('tscolorlabel'); 
							if($clr){
								if($type!=='Novel') {
									if($colored=='1'){ ?>
										<span class="colored"><i class="fas fa-palette"></i> <?php echo GOV_lang::get('thumbnail_color_label'); ?></span>
									<?php } else if($colored!=='0'){
									if($type!=='Manga'){ ?>
										<span class="colored"><i class="fas fa-palette"></i> <?php echo GOV_lang::get('thumbnail_color_label'); ?></span>
									<?php } } } 
							} ?>
						</div>
						<?php if (GOV_bookmark::is_enabled()) { ?>
							<div data-id="<?php echo get_the_ID();?>" class="bookmark"><i class="far fa-bookmark" aria-hidden="true"></i> Bookmark</div>
							<?php $bc = get_post_meta(get_the_ID(),'ero_bookmark_count',true); if($bc){ ?>
								<div class="bmc"><?php echo GOV_lang::get('series_bookmarked_by', ['count' => $bc]);?></div>
							<?php } ?>
						<?php } ?>
						<?php
						$score = get_post_meta( get_the_ID(), 'ero_score', true );
						if(!$score || ! is_numeric($score)){ $score = get_option('tsscore'); }
						if($score){ $scorepros = $score * 10; ?>
							<div class="rating bixbox">
							<div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
								<meta itemprop="worstRating" content="1">
								<meta itemprop="bestRating" content="10">
								<meta itemprop="ratingCount" content="10">
								<div class="rtp">
									<div class="rtb"><span style="width:<?php echo $scorepros; ?>%"></span></div>
								</div>
								<div class="num" itemprop="ratingValue" content="<?php echo $score; ?>"><?php echo $score; ?></div>
							</div>
							</div>
						<?php } ?>
				</div>

				<div class="seriestucontentr">
					<div class="seriestuhead">			
						<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>
								<?php echo get_post_meta($post->ID, "manga", true); ?>
									<div class="entry-content entry-content-single" itemprop="description"><?php the_content(); ?></div>
								<?php endwhile; ?>
						<?php endif; ?>

						<?php if(get_option('firstnewchapter')=='1'){ 
						$ep = GOV_manga::get_latest_chapters(get_the_ID(), TRUE);
						$latest = $ep['chapter']??"";
						if ($latest == "") $latest = " ?";
						?>
						<div class="lastend">
								<div class="inepcx">
									<a href="#/">
										<span><?php echo GOV_lang::get('seriestu_first_chapter_label'); ?></span>
										<span class="epcur epcurfirst"><?php echo GOV_lang::get('widget_chapter_label');?> ?</span>
									</a>
								</div>
								<div class="inepcx">
									<a href="<?php echo chapter_url($ep['permalink']); ?>">
										<span><?php echo GOV_lang::get('seriestu_new_chapter_label'); ?></span>
										<span class="epcur epcurlast"><?php echo GOV_lang::get('widget_chapter_label');?> <?php echo $latest; ?></span>
									</a>
								</div>
						</div>

						<?php } ?>
					</div>

					<div class="seriestucont">				
						<div class="seriestucontr">
							<table class="infotable">
								<tbody>
									<?php $meta = rwmb_get_value( 'ero_status' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_status_label'); ?></td>
										<td><?php rwmb_the_value('ero_status'); ?></td>
									</tr>
									<?php } ?>
									<?php $meta = rwmb_get_value( 'ero_type' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_type_label'); ?></td>
										<td><?php rwmb_the_value('ero_type'); ?></td>
									</tr>
									<?php } ?>
									<?php $meta = rwmb_get_value( 'ero_published' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_released_label'); ?></td>
										<td><?php rwmb_the_value('ero_published'); ?></td>
									</tr>
									<?php } ?>
									<?php $meta = rwmb_get_value( 'ero_author' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_author_label'); ?></td>
										<td><?php rwmb_the_value('ero_author'); ?></td>
									</tr>
									<?php } ?>
									<?php $meta = rwmb_get_value( 'ero_artist' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_artist_label'); ?></td>
										<td><?php rwmb_the_value('ero_artist'); ?></td>
									</tr>
									<?php } ?>
									<?php $meta = rwmb_get_value( 'ero_serialization' ); if($meta){ ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_serialization_label'); ?></td>
										<td><?php rwmb_the_value('ero_serialization'); ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td><?php echo GOV_lang::get('series_info_posted_by_label'); ?></td>
										<td>
											<span itemprop="author" itemscope itemtype="https://schema.org/Person" class="author vcard">
												<i itemprop="name"><?php echo gov_get_the_post_author(); ?></i>
											</span>
										</td>
									</tr>
									<tr>
										<td><?php echo GOV_lang::get('series_info_posted_on_label'); ?></td>
										<td>
											<time itemprop="datePublished" datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y'); ?></time>
										</td>
									</tr>
									<tr>
										<td><?php echo GOV_lang::get('series_info_updated_on_label'); ?></td>
										<td>
											<time itemprop="dateModified" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date('F j, Y'); ?></time>
										</td>
									</tr>
								</tbody>
							</table>
							<?php echo get_the_term_list( get_the_ID(), 'genres', '<div class="seriestugenre">', ' ', '</div>' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( has_term( array('adult','mature','smut'), 'genres' ) ) { ?>
						<div class="alr"><?php echo GOV_lang::get('series_nsfw', ['manga_title' => get_the_title()]);?></div>
					<?php } ?>
			<?php $kln = get_option('tseries1'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>
			<?php if(get_option('gallerymanga')=='1'){ $images = rwmb_meta('ero_gallery'); if($images){ ?>
			<div class="bixbox image-list">
				<div class="releases"><h2><?php echo GOV_lang::get('series_gallery_label', ["manga_title" => get_the_title()]);?></h2></div>
				<div id="gallery"  class="owl-carousel">
					<?php
						foreach ( $images as $image ) {
							echo '<a href="', $image['full_url'], '"><img src="', $image['full_url'], '"></a>';
						} ?>
				</div>
			</div>
			<?php } } ?>
			<?php $batch = get_batchdl(get_the_ID()); if($batch){ ?>
			<div class="bixbox">
				<div class="releases"><h2><?php echo GOV_lang::get('series_info_additional_label'); ?></h2></div>
				<div class="additional-content">
					<?php echo $batch; ?>
				</div>
			</div>
			<?php } ?>
		<?php 
			$ts_sh = new GOV_series_history();
			if ($ts_sh->is_enabled()) {
				get_template_part('template-parts/series/series-history'); 
			}
		?>
		<div class="bixbox bxcl epcheck">
				<div class="releases">
					<h2><?php echo GOV_lang::get('series_chapter_list', ['manga_title' => get_the_title()]);?></h2>
				</div>
				<?php if(get_option('seriessocial')=='1'){ get_template_part('template-parts/general/social-share'); } ?>
				<?php if(get_option('searchchapter')=='1'){ ?>
				<div class="search-chapter">
					<input id="searchchapter" type="text" placeholder="<?php echo GOV_lang::get('search_chapter_placeholder')?>" autocomplete="off">
				</div>
				<?php } ?>
				<div class="eplister" id="chapterlist"><?php getChapterList(); ?></div>
		</div>
		
		<script>
			var chapterSearchNotFound = "<?php echo GOV_lang::get('series_chapter_search_no_result'); ?>";
			series_chapters.setFirstChapterData();
			series_chapters.controlSearchInput();
		</script>
		
		<?php $kln = get_option('tseries2'); if($kln) { ?><div class="kln"><?php echo $kln; ?></div><br/><?php } ?>
	
		<?php
		if(get_option('relatedmanga')=='1'){
		$terms = get_the_terms( $post->ID , 'genres', 'string');
		if($terms){
		$metas = get_the_ID();
		$term_ids = wp_list_pluck($terms,'term_id');
		$term_ids = array_slice($term_ids, 0, 2);
		$args=array(
		'post_type' => 'manga',
		'tax_query' => array(
						array(
							'taxonomy' => 'genres',
							'field' => 'id',
							'terms' => $term_ids,
							'operator'=> 'AND'
						 )),
		'post__not_in' => array($metas),
		'posts_per_page'=> 5,
		'orderby' => 'rand',
		'ignore_sticky_posts'=>1
		);
		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) { ?>
		<div class="bixbox">
			<div class="releases"><h2><span><?php echo GOV_lang::get('recommended_series');?></span></h2></div>
			<div class="listupd">
				<?php while( $my_query->have_posts() ) { $my_query->the_post(); get_template_part('template-parts/general/main'); } ?>
			</div>
		</div>
		<?php } wp_reset_query(); ?>
		<?php } } ?>
		<?php if(comments_open()){ ?>
		<div id="comments" class="bixbox comments-area">
			<div class="releases"><h2><span><?php echo GOV_lang::get('comment_label');?></span></h2></div>
			<div class="cmt commentx">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php echo get_post_meta(get_the_ID(), "manga", true); ?>
					<?php comments_template(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php } ?>
		<span style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<span style="display: none;" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="<?php echo get_option('logo'); ?>">
			</span>
			<meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</span>
	</article>
</div>
<?php get_sidebar(); ?>
</div>