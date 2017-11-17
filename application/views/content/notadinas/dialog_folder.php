
<div id="dialog-form-folder" title="Data Folder">
    <div id="tabs">
        <div id="tabs-1" style="font-size: smaller;">
            <h4> Nota Dinas</h4>
            Tambah Folder : <input type='text' id='folder_name'/><button onclick="tambah_folder()">add</button>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;" id="list-pem-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama Folder</th>
                    <th>Set</th>
                </tr>
                <?php
                foreach ($folder as $f) {
                    if($f->folder_name<>"inbox" and $f->folder_name<>"sent" and $f->folder_name<>"draft" and $f->folder_name<>"progress" and $f->folder_name<>"archive"){ 
                        ?>
                    <tr id="pilihan-<?php echo $f->folder_id; ?>">
                        <td id="fold-<?php echo $f->folder_id; ?>" style="padding-left:20px;"><?php echo $f->folder_name ?></td>
                        <td ><button onclick='hapus_folder("<?php echo $f->folder_id; ?>")'>Hapus</button></td>                        
                    </tr>
                    <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">
    function tambah_folder(){
        var folder = document.getElementById("folder_name").value;
        if(folder=="") {
            alert("isi dulu nama folder nya!");
            return false;
        }
            var fdata = new FormData();
            fdata.append("folder_name",folder);
             $.ajax({
                type:"POST",
                cache:false,
                url:"<?php echo site_url('notadinas/nav/add_folder/') ?>",
                data: fdata,
                 processData: false,
                 contentType: false,
                success: function (data){
                    alert("folder telah di tambahkan!");
                    location.reload();
                }
            });
    }
</script>

