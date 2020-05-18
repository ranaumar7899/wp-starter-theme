<?php get_header()?>

<?php
$weedweed_theme_settings = get_option('weedweed_theme_settings');
$home_bg_bnr_img=wp_get_attachment_url($weedweed_theme_settings['home_bg_bnr_id']);
?>

<div class="container-fluid home-bg-banner" style="background-image: url(<?php echo $home_bg_bnr_img; ?>);height: 610px;width: 100%;background-size: cover;">
	<div class="home-bg-overlay"></div>

	<?php 
	$terms = get_terms( array(
    'taxonomy' => 'listing-category',
    'hide_empty' => false,
	) );
	?>
	<div class="container">
		<div class="row">
		<?php
		$i=1;
		foreach ($terms as $term) {
			$term_id=$term->term_id;
			$attachment_id=get_term_meta($term_id,'category_image2',true);
			$img_src=wp_get_attachment_url($attachment_id);
		?>
		<div class="col-md-2 <?php if($i==1){echo 'offset-md-2';} ?>">
			<div class="home_cattt_text home_cattt_text_<?php echo $term->term_id; ?>">
				<p><?php echo $term->description; ?></p>
			</div>
			<a href="#"><img src="<?php echo $img_src; ?>" class="img-fluid home-bnr-cat-img"></a>
			<img src="<?php echo site_url().'/wp-content/uploads/2019/06/info.png';?>" class="img-fluid home-bnr-cat-img-inr" onmouseover="hma_show_catt_text(<?php echo $term->term_id ?>)" onmouseout="hma_hide_catt_text(<?php echo $term->term_id ?>)">
		</div>
		<?php
		$i++; 
		}
		?>
	</div>
	</div>
</div>

<?php get_footer()?>
<script type="text/javascript">
	function hma_show_catt_text(id)
{
	jQuery('.home_cattt_text_'+id).css('display','block');
}
function hma_hide_catt_text(id)
{
	jQuery('.home_cattt_text_'+id).css('display','none');
}
</script>