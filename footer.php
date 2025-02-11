</div>
</div>
<div id="footer">
	<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo">
	<?php $footermenu = wp_nav_menu( array( 'theme_location' => 'footer','fallback_cb' => '','echo' => '0' ) ); if($footermenu){ echo '<div class="footermenu">'.$footermenu.'</div>'; } ?>
		<div class="footermenu">
			<div class="menu-footer-container"><ul id="menu-footer" class="menu">
<li id="menu-item-28059" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28059">
<a href="https://nightscans.org/privacy-policy/" itemprop="url">Privacy Policy</a>
</li>
<li id="menu-item-28055" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28055">
<a href="https://nightscans.org/dmca-notice/" itemprop="url">Dmca notice</a>
</li>
<li id="menu-item-28056" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28056">
<a href="https://nightscans.org/contact-us/" itemprop="url">Contact us</a>
</li>
</ul></div></div>
	<div class="footercopyright">
		<?php get_template_part('footer-az'); ?>
		<?php get_template_part('template-parts/general/social'); ?>
		<div class="copyright">
			<div class="txt">
				<p><?php echo GOV_lang::get('footer_disclaimer'); ?></p>
			</div>
		</div>
	</div>
	</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>