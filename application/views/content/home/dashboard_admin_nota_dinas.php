<style type="text/css">
#table-karyawan td, #table-karyawan-2 td, #table-karyawan-3 td {
    padding-left: 20px;
    width: 150px;
    text-align: center;
}
table tr td {
    border-bottom: 1px solid #cecece;
}
.modal-backdrop.fade.in{
    background-color: rgba(0,0,0,0.5);
    height: 9999999px;
    width: 100%;
    position: absolute;
    z-index: 1050;
    top:0;
}
#myModal{
    z-index: 1060;
}
body.modal-open{
    overflow: hidden !important;
}
</style>

<div id="content">
<h2 style="margin: 0px; padding: 20px; text-align: left;">List Nota Dinas</h2>
<div id="status" style="text-align: center; font-size: smaller; padding-top:10px; padding-bottom: 10px; background-color: yellow; <?php if (!isset($status)) {
echo 'display:none;';
} ?>" ><b>
        <?php
        if (isset($status)) {
            echo $status;
        }
        ?></b>
</div>
<?php
    //$this->load->view('filter/nota_filter');
?>
<p style="margin-left:20px;">
    <?php
        $filter = "Semua Nota Dinas";
        
        if($this->input->post('keyword')!=null)
        $filter = $this->input->post('keyword');
    ?>
    
    <i>Filter : <?php echo $filter; ?></i></p>
<table style="width: 80%; text-align: left; margin-left: 30px; border-spacing: 0px;">
    <thead style="background-color: black; color:white; text-align: center; padding-bottom: 1em">
        <th width="290">Nomor Nota</th>
        <th width="260">Perihal</th>
        <th>Pengirim</th>
        <th>Tujuan</th>
        <th>Pemeriksa</th>
        <th width="180">Approval Terakhir</th>
    </thead>
    <pre><?php //var_dump($nota_data); ?></pre>
<?php
    foreach($nota_data as $row){  
?>
        <tr class="emp-data " style="" >
            <td style="padding: 0 10px;"><a style="color:black;" href="view_nota_dinas/id/<?php echo $row->nota_id; ?>"><?php echo $row->nota_number; ?></a></td>
            <td style="padding: 0 10px;"><a style="color:black;" href=""><?php echo $row->nota_perihal; ?></a></td>
            <td style="padding: 0 10px;"><a style="color:black;" href=""><?php echo $row->sender_name; ?></a></td>
            <td style="padding: 0 10px;"><ul><?php foreach($row->tujuan_name as $tujuan_item){ ?><li><a style="color:black;" href=""><?php echo $tujuan_item;?></a></li><?php } ?></ul></td>            
            <td style="padding: 0 10px;" class="enable-bootstrap"><a style="color:black;" class="btn btn-default" href="javascript:void(0)" onclick="showApprover(this)" data-info='<?php echo $row->nota_pemeriksa; ?>'><?php echo "Lihat" ?></a></td>
            <td style="padding: 0 10px; text-align: right;"><a style="color:black;" href=""><?php echo $row->exam_date; ?></a></td>
        </tr>
<?php
    }
?>
</table>
<br/>

<div style="padding-left: 20px; margin-top:40px;"> <p><b> Total Data : <?php  /*echo $nota_data->num_rows();*/ echo count($nota_data) ?> Nota Dinas
        </b></p>
</div>

</div>

<div class="enable-bootstrap">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Pemeriksaan Nota</h4>
        </div>
        <div class="modal-body">
          <p style="font-weight: 700;">Semua approver</p>
          <div id="list-approver"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script>
    function showApprover(el){
        $("#myModal").modal();
        var info = el.getAttribute('data-info');

        var list_approver = document.getElementById('list-approver');
        while (list_approver.firstChild) {
            list_approver.removeChild(list_approver.firstChild);
        }
        var ul = document.createElement('UL');


        var data = JSON.parse(info);
        var i = 1;
        data.forEach(function(element) {
            element.status = '';
            
            if(element.ok_status==1) element.status= "Approved";
            else if(element.return_status==1) element.status= "Returned";
            else if(element.reject_status==1) element.status= "Rejected";
            else element.status = "Sedang di Proses";

            var li = document.createElement('LI');
            li.style.marginBottom = '9px';
            li.innerHTML = 'Pemeriksa ke- ' + i +': <span style="font-weight: 700;">' + element.emp_firstname + '</span><br/> Status: <span style="font-weight: 700;">' + element.status + '</span><br/> Pada tanggal: <span style="font-weight: 700;">' + element.exam_date + '</span>'; 
            ul.append(li);
            i++;
        }, this);

        
        list_approver.append(ul);
    }
</script>