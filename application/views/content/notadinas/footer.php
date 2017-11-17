
		<footer>
		</footer>
	</body>
		<script type="text/javascript">
			$("#compose").click(function(){
				$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('nav/compose') ?>",
	            success: function(data)
	            {
	              $(".tab-pane").removeClass("active");
	              $(".headingtab").removeClass("active");

	              add_tab(generate_kode_tab(),'Compose',data);
	              init_editor();
	            }
				});
			});
			$('.folder-combo').on('change', function() {
  				$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('nav/folder_change/') ?>/"+this.value,
	            success: function(data)
	            {
	            	ganti_nav(data);

	            }
				});
			});
			$("#navigasi_kiri").resizable({handles:'e'});
			$("#navigasi_kiri").bind("resize", function (event,ui){
				$("#navigasi_kanan").width(850-(ui.size.width-480));
				$("#navigasi_kanan").css("left",ui.size.width - ui.originalSize.width);

			});

		</script>
</html>