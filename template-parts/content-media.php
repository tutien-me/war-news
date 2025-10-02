<?php
if (has_post_format(array('video'))) {
	$war_news_main_content = apply_filters('the_content', get_the_content();
	$war_news_media = get_media_embedded_in_content(
		$war_news_main_content,
		array(
			'video',
			'object',
			'embed',
			'iframe',
		)
	);

	if ($war_news_media) {
		$war_news_media = reset($war_news_media);
		echo '<div class="entry-media">' . wp_kses_post($war_news_media) . '</div>'; /* WPCS: xss ok. */
		return;
	}
}

if (has_post_format('gallery')) {
	$war_news_gallery = get_post_gallery(get_the_id(), false);
	if (!empty($war_news_gallery['ids'])) {
		$war_news_gallery_id = explode(',', $war_news_gallery['ids']); ?>

		<div class="grid-gallery <?php echo war_news_is_amp() ? '' : 'is-hidden' ?>">
			<?php echo war_news_is_amp() ? '<amp-carousel class="amp-slider" layout="responsive" type="slides" width="780" height="500" delay="3500">' : ''; ?>

			<?php
			foreach ($war_news_gallery_id as $id) :
				echo wp_get_attachment_image($id, 'viral-news-600x600');
			endforeach;
			?>

			<?php echo war_news_is_amp() ? '</amp-carousel>' : ''; ?>
		</div>
		<?php
	}
	return;
}

if (has_post_format('quote')) {
	$war_news_content = get_the_content();
	if (preg_match('~<blockquote>([\s\S]+?)</blockquote>~', $war_news_content, $war_news_quote)) {
		echo '<div class="entry-media quote">' . wp_kses_post($war_news_quote[0]) . '</div>';
		return;
	}
}

if (has_post_thumbnail()) :
	?>
	<div class="entry-media">
		<?php the_post_thumbnail('viral-news-600x600'); ?>
	</div>
<?php endif;

if (!has_post_thumbnail()) {
	return;
}
?>
