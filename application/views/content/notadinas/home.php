 <link rel="stylesheet" type="text/css" href="<?php  echo $this->config->item('css') ?>mycss.css">       
 <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>my.js"></script>
 <style type="text/css">
 .frame {
    top: 0;
    left: 0;
    width: 100%;
    height: 1400px;
    border:0px;
}
 </style>
<script type="text/javascript">
 function hapus_nota_folder(id){
 	$.ajax({
                	type:"GET",
                	cache:false,
                	url:"<?php echo site_url('notadinas/nav/hapus_nota_folder')?>/"+id,
                	success:function (data2){
                		alert("nota telah di hapus dari folder ini");
                		$("#folder"+id).remove();
                	}
                });
 }
function click_compose(){

	              $(".tab-pane").removeClass("active");
	              $(".headingtab").removeClass("active");
	               var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             var width = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             hg = document.getElementById('navigasi_kanan').style.height.value+200
	            
	              var url = "<?php echo site_url('notadinas/nav/compose') ?>";
	              var data = "<iframe  src='"+url+"' class='frame' ></iframe>";
	              
	              add_tab(generate_kode_tab(),'Compose',data);
	              
	             
	             $( "#content" ).height( 1400 ).css({
				    height: hg +"px"
				});

			}
function open_search(){
	   $(".tab-pane").removeClass("active");
	              $(".headingtab").removeClass("active");
	               var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             var width = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             hg = document.getElementById('navigasi_kanan').style.height.value+200
	            
	              var url = "<?php echo site_url('notadinas/nav/form_search') ?>";
	              var data = "<iframe  src='"+url+"' class='frame' ></iframe>";
	              
	              add_tab(generate_kode_tab(),'Search',data);
	              
	             
	             $( "#content" ).height( 1400 ).css({
				    height: hg +"px"
				});
}

function get_value_isi(id){
				return tinyMCE.get(id).getContent()
	}
	   	 
    
   
</script>
	<div id="content" class="enable-bootstrap">
		<div class="tengah">

			<div class="navigasi-kiri" id="navigasi_kiri">
				 <div class="btn-group btn-group-justified">
				 	<a class='btn btn-default' role='button' id='compose' onclick='click_compose()'>Compose</a>
				 	<a class='btn btn-default' role='button' onclick='open_folder()'>Folder</a>
				 	<a class='btn btn-default' role='button'  onclick='open_search()'>Search</a>
			      </div>
			      <div class="btn-group btn-group-justified">
			      	<a class="btn btn-default" >Filter 
			      		<select class="combobox" id="filter" selected="selected" value="<?php echo date('m') ?> ">
						  <option value="ALL">ALL</option>
						  <option value="01">Januari</option>
						  <option value="02">Februari</option> 
						  <option value="03">Maret</option>
						  <option value="04">April</option>
						  <option value="05">Mei</option>
						  <option value="06">Juni</option> 
						  <option value="07">Juli</option>
						  <option value="08">Agustus</option>
						  <option value="09">September</option>
						  <option value="10">Oktober</option> 
						  <option value="11">November</option>
						  <option value="12">Desember</option>
						</select>
			      	</a>
			      	<a class="btn btn-default " >Folder 
			      		<?php
						$option = array();
						
						foreach ($folder as $f) {
							$option[$f->folder_id] = $f->folder_name;

						}		
						echo form_dropdown('folder', $option, 'inbox',"id=\"folder-combo\" class='folder-combo combobox'");
						?>
			      	</a>

			      </div>
			      <div class="btn-group btn-group-justified" id="pil-year" style="display:none">
			      		<a class="btn btn-default" >Year 
			      		<select class="combobox" id="year" selected="selected" value="<?php echo date('m') ?> ">
						  <option value="ALL">ALL</option>
						  <option value="2013">2013</option>
						  <option value="2014">2014</option>
						  <option value="2015">2015</option>
						  <option value="2016">2016</option> 
						 </select>
			      	</a>
					
			      </div>
			      <div class="kiri-isi" id="isi_nav">
			      </div>

			</div>
			<div class="konten" id="navigasi_kanan">
				<ul class="nav nav-tabs" id="headtab">
				</ul>
				<div class="tab-content" id="konten">
				</div>
			</div>
		</div>
	</div>
	<?php 

?>

<?php
	include_once("dialog_folder.php");
 ?>
		<script type="text/javascript">
		$.scoped();
	</script>
<script type="text/javascript">
    var compose = false;

		   function nota_edit_form(nota_id){
		   	var url= "<?php echo site_url('notadinas/nav/edit_form/') ?>/"+nota_id;
	              var data = "<iframe  src='"+url+"' class='frame' ></iframe>";

            	  $(".tab-pane").removeClass("active");
	              $(".headingtab").removeClass("active");

	              add_tab(generate_kode_tab(),'Edit'+nota_id,data);
	             
	              init_editor("edit_nota_isi");
	             var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             hg = document.getElementById('navigasi_kanan').style.height.value+200
	             $( "#content" ).height( 1400 ).css({
				    height: hg +"px"
				  });
		}
    
  
    function nota_det(nota_id){
                var url = "<?php echo site_url('notadinas/nav/nota_det/"+nota_id+"') ?>";
	              var data = "<iframe  src='"+url+"' class='frame' ></iframe>";
	              
                  $(".tab-pane").removeClass("active");
                  $(".headingtab").removeClass("active");
                  add_tab(generate_kode_tab(),'inbox'+nota_id,data);
                 var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
                 hg = document.getElementById('navigasi_kanan').style.height.value+200
                 $( "#content" ).height( 1400 ).css({
                    height: hg +"px"
                  });
           
    }
    function sent_det(nota_id){
                var url = "<?php echo site_url('notadinas/nav/sent_det/"+nota_id+"') ?>";
	              var data = "<iframe  src='"+url+"' class='frame' ></iframe>";
	              
                  $(".tab-pane").removeClass("active");
                  $(".headingtab").removeClass("active");
                  add_tab(generate_kode_tab(),'sent'+nota_id,data);
                 var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
                 hg = document.getElementById('navigasi_kanan').style.height.value+200
                 $( "#content" ).height( 1400 ).css({
                    height: hg +"px"
                  });
           
    }
    function nota_det_prog(nota_id,exam_id){
    	var url =  "<?php echo site_url('notadinas/nav/nota_det_prog/') ?>/"+nota_id+"/"+exam_id;
    	          var data = "<iframe  src='"+url+"' class='frame' ></iframe>";
	            
    	          $(".tab-pane").removeClass("active");
	              $(".headingtab").removeClass("active");

	              add_tab(generate_kode_tab(),'Progress',data);
	              
	              init_editor();
	             var hg = document.getElementById('navigasi_kanan').style.height.value+200 ;
	             hg = document.getElementById('navigasi_kanan').style.height.value+200
	             $( "#content" ).height( 1400 ).css({
				    height: hg +"px"
				});    
    }
    		
			$('#folder-combo').on('change', function() {
				var fold = $('.folder-combo option:selected').text();
				if(fold=="archive") document.getElementById("pil-year").removeAttribute("style");
				else {
					document.getElementById("pil-year").setAttribute("style","display:none");
				document.getElementById("year").value = "ALL";
				}
				var filter = document.getElementById("filter").value;
				var year = document.getElementById("year").value;
				
				var site;
				 site = "<?php echo site_url('notadinas/nav/folder_change/') ?>/"+this.value+"/"+filter;
				 site = site + "/"+year;
  				$.ajax({
                type: "GET",
                async: false,
	            url: site,
	            success: function(data)
	            {
	            	ganti_nav(data);
	            }
				});
			});
			$('#filter').on('change', function() {
				var fold = $('.folder-combo option:selected').text();
				var filter = this.value;
				var folder = document.getElementById("folder-combo").value;
				var year = document.getElementById("year").value;
				if(fold=="archive") document.getElementById("pil-year").removeAttribute("style");
				else document.getElementById("pil-year").setAttribute("style","display:none");
				var site;
				site = "<?php echo site_url('notadinas/nav/folder_change/') ?>/"+folder+"/"+filter;
				site = site + "/"+year;
  				$.ajax({
                type: "GET",
                async: false,
	            url: site,
	            success: function(data)
	            {
	            	ganti_nav(data);

	            }
				});
			});
			$('#year').on('change', function() {
				var fold = $('.folder-combo option:selected').text();
				var folder = document.getElementById("folder-combo").value;
				var filter = document.getElementById("filter").value;
				var year = this.value;
				if(fold=="archive") document.getElementById("pil-year").removeAttribute("style");
				else document.getElementById("pil-year").setAttribute("style","display:none");
				var site;
				 site = "<?php echo site_url('notadinas/nav/folder_change/') ?>/"+folder+"/"+filter;
				 site = site + "/"+year;
  				$.ajax({
                type: "GET",
                async: false,
	            url: site,
	            success: function(data)
	            {
	            	ganti_nav(data);

	            }
				});
			});

			$("#navigasi_kiri").resizable({handles:'e'});
			$("#navigasi_kiri").bind("resize", function (event,ui){
				$("#navigasi_kanan").width(1180-(ui.size.width-110));
				$("#navigasi_kanan").css("left",ui.size.width - ui.originalSize.width);

			});
			function hapus_folder(id){
				var konf = confirm("apakah anda yakin akan menghapus folder, karena data semua nota didalamnya pun akan terhapus?")
				if (konf!=true) return false;
				else{
				$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('notadinas/nav/hapus_folder/') ?>/"+id,
	            success: function(data)
	            {
	            	alert("folder_telah Dihapus beserta semua isinya");
	            	location.reload();
	            }
				});
			   }
			}
		</script>
<style type="text/css">
    .ui-tabs .ui-tabs-nav li a {font-size:9pt !important;}
    .ui-tabs-panel {font-size: smaller;}
    #add-pemeriksa {
        height:25px;
    }
    .ui-dialog{
        z-index: 9999;
    }
</style>
<script type="text/javascript">
function folder_ganti(id){
				var  site = "<?php echo site_url('notadinas/nav/folder_change/') ?>/"+id;
  				$.ajax({
                type: "GET",
                async: false,
	            url: site,
	            success: function(data)
	            {
	            	ganti_nav(data);

	            }
				});
}
	$("document").ready(function() {
		 $("#dialog-form-folder").dialog({
            autoOpen: false,
            width: 600,
            height: 500,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
        $("#dialog-form-folder").css("z-index","99999");
		<?php 
			echo "folder_ganti('".$folder_id."');";
		if(isset($notifikasi)){
			if($notifikasi=="progress"){
				echo "nota_det_prog(".$parameter.");";
			}
			if($notifikasi=="inbox"){
				echo "nota_det(".$parameter.");";
			}
		}
		?>

       
    });
    function open_folder(){
    	$("#dialog-form-folder").dialog("open");
    }
</script>
