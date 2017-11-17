	var kode_tab="tab0";
  function close_tab(id,nama){
        var konf = confirm("are you sure close this tab? unsave change");
	    if (konf==true){
	        $("#"+id).remove();
	        $("."+id).remove();
	        var kode = kode_tab.substring(3,kode_tab.length);
			var jumlah = $(".headingtab").length;	  
	        	$(".headingtab").removeClass("active");
	        	$(".tab-pane").removeClass("active");
	        	
	        	$(".headingtab").first().addClass("active");
	        	$(".tab-pane").first().addClass("active");
	        	
	        
	    }
    }
		function add_tab(id,nama,isi){
                var head = ' <li class="headingtab active '+id+' '+nama+'"><a href="#'+id+'" data-toggle="tab">'+nama+'  <span class="close-tab glyphicon glyphicon-off" onClick=close_tab("'+id+'","'+nama+'")></span></a></li>';
                var konten = '<div  class="tab-pane active" id="'+id+'">'+isi+'</div>';
                document.getElementById('headtab').innerHTML = document.getElementById('headtab').innerHTML+head;
                document.getElementById('konten').innerHTML = document.getElementById('konten').innerHTML+konten;
        }
	function ganti_nav(isi){
		document.getElementById("isi_nav").innerHTML=isi;
	}
	function delete_option(option){
		var x = document.getElementById(option);
        var empnum = x.value;
		x.remove(x.selectedIndex);
        if(option=="sel_disposisi"){

            $("#dis"+empnum).remove();
        }
	}

   function print_window(url)
{
window.open(url, 'Print Nota Dinas', 'width=500,height=500,scrollbars=yes');
}
function get_value_isi(id){
   
        var node = CKEDITOR.instances.nota_isi.getData();
        return node;
    }
	function generate_kode_tab(){
		var kode = kode_tab.substring(3,kode_tab.length);
		kode++;
		kode_tab = 'tab'+kode;
		return kode_tab;
	}
    
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

var pil;
var del_index=0;
 function add_file(){

            var isi = "<br class='att"+del_index+"'><input  class='att"+del_index+" attachments' type=\"file\" name=\"nota_att[]\" id=\"nota_att[]\" /><a class='att"+del_index+"' onclick='remove_att("+del_index+")'>remove</a>";
            var t = document.getElementById("kolom_attachment");
            del_index++;
            t.innerHTML = t.innerHTML + isi
        }
 function remove_att(id){
    $(".att"+id).remove();
 }
function open_dialog(nama){
	$("#dialog-form").dialog('open');
    pil = nama;
}
function open_dialog_pemeriksa(nama){
    $("#dialog-form-pemeriksa").dialog('open');
    pil = nama;
}

   