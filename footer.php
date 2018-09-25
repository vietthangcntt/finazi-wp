<footer id="footer">
	<div class="footer-gird">
		<div class="container">
			<div class="row">
			<?php 	
			if(is_active_sidebar('footer-sidebar')){
				dynamic_sidebar('footer-sidebar');
			}
			else{
				_e('No Sidebar');
			} ?>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<span>Copyright &copy <?php echo date('Y'); ?> <a href="#">FinaziWP</a>, Developed by <a href="#">TNT</a>.</span>
			<div class="consult-scroll-to-top">
				<span>Back to top</span>
				<button id="totop" data-wow-delay=".2s" title="Scroll To Top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</footer>
	<?php wp_footer(); ?>
</body> <!--end body-->
</html> <!--end html -->