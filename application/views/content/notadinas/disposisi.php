<script type="text/javascript">

  function pilih_folder(id){
    var idnota = "<?php echo $nota[0]->nota_id ?>";
    $.ajax({
                  type:"GET",
                  cache:false,
                  url:"<?php echo site_url('notadinas/nav/copy_folder') ?>/"+id +"/"+idnota,
                  success:function (data2){
                    alert("nota sudah di copy ke folder");
                  }
                });
    $("#dialog-form-pilih-folder").dialog("close");
  }
  function show_disposisi(){
    document.getElementById("disp").setAttribute("style","");
    document.getElementById("btn_show").setAttribute("style","display:none");
    document.getElementById("btn_close").setAttribute("style","");
  }
  function close_disposisi(){
    document.getElementById("disp").setAttribute("style","display:none");
    document.getElementById("btn_show").setAttribute("style","");
    document.getElementById("btn_close").setAttribute("style","display:none");
  }
  function send_disposisi(nota_id){
    var konf = confirm("Apakah Anda yakin akan submit nota dinas ini?");
    if (konf==true){
        document.getElementById("form_disposisi").submit();
      }
    }
</script>

<div id="disp" style="display:none">
<select id="sel_disposisi" style="display:none" class="form-control" size="4" >
</select>
<form id="form_disposisi" method="post" action="<?php echo site_url('notadinas/nav/disposisi/'.$user_aktif->emp_num.'/'.$nota[0]->nota_id); ?>">
<table  id="tindakan">
  <tr>
    <td>
      Tujuan :
    </td>
    <td></td>
    <td>
      Tindakan / Catatan :
    </td>
  </table>

</form>
<a class='btn btn-default' id='btn-show-kepada' onclick="open_dialog('sel_disposisi')">Adress Book</a>
 <a class='btn btn-default' id='btn-delete-kepada' onclick="send_disposisi('<?php echo $nota[0]->nota_id; ?>')">Send</a></td>

</div>
