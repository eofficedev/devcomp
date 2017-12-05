<style type="text/css">
    #table-karyawan td, #table-karyawan-2 td, #table-karyawan-3 td {
        padding-left: 20px;
        width: 150px;
        text-align: center;
    }
    #table-karyawan tr {

    }
</style>

<div id="content">
    <div id="status" style="text-align: center; font-size: smaller; padding-top:10px; padding-bottom: 10px; background-color: yellow; <?php
    if (!isset($status)) {
        echo 'display:none;';
    }
    ?>" ><b>
                 <?php
                 if (isset($status)) {
                     echo $status;
                 }
                 ?></b>
    </div>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">List Semua Jabatan</h2>

    <?php
    $this->load->view('filter/job_filter');
    ?>

<?php if ($this->input->post('filter') != null) {
    ?>

        <p style="margin-left:20px;"><i>Filter Organisasi : <?php echo $job->row()->org_name; ?></i></p>
        <?php
    } else {
        ?>
        <p style="margin-left:20px;"><i>Filter : Semua Jabatan</i></p>
        <?php
    }
    ?>

    <table style="width: 900px; text-align: left; margin-left: 30px;  border-collapse: collapse;">
        <thead style="background-color: black; color:white;">
        <th>ID Jabatan</th>
        <th>Nama Jabatan</th>
        <th>Deskripsi Jabatan</th>
        <th>Organisasi</th>
        </thead>
        <?php
        // foreach ($job->result() as $row) {
        if($job != null){
            foreach ($job as $row) {
                ?>
                <tr class="emp-data">
                    <td style="padding-left: 10px;"><a href="jobs/upd/id/<?php echo $row->job_num; ?>"><?php echo $row->job_id; ?></a></td>
                    <td style="padding-left: 10px;"><a href="jobs/upd/id/<?php echo $row->job_num; ?>"><?php echo $row->job_name; ?></a></td>
                    <td style="padding-left: 10px;"><a href="jobs/upd/id/<?php echo $row->job_num; ?>"><?php echo $row->job_description; ?></a></td>
                    <td style="padding-left: 10px;"><a href="jobs/upd/id/<?php echo $row->job_num; ?>"><?php // echo $row->org_name; ?></a></td>
                </tr>
                <?php
            }
        }
        ?>

    </table>
    <p style="margin-left:20px; margin-top: 50px"><b>Total Data : <?php echo $job->num_rows(); ?> Jabatan</b></p>
</div>
