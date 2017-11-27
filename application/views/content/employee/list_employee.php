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
    <h2 style="margin: 0px; padding: 20px; text-align: left;">List Data Pegawai</h2>
    
    <?php
        $this->load->view('filter/employee_filter');
    ?>
    <p style="margin-left:20px;">
        <?php
            $filter = "Semua Pegawai";
            
            if ($this->input->post('keyword')!=null) {
                $filter = $this->input->post('keyword');
            }
        ?>
        
        <i>Filter : <?php echo $filter; ?></i></p>
    <table style="width: 900px; text-align: left; margin-left: 30px; border-spacing: 0px;">
        <thead style="background-color: black; color:white; text-align: center; padding-bottom: 1em">
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Organisasi</th>
        </thead>
    <?php
        foreach ($employees->result() as $row) {
            ?>
            <tr class="emp-data" >
                <td style="padding-left: 10px;"><a style="color:black;" href="emp/view/id/<?php echo $row->emp_num; ?>"><?php echo $row->emp_id; ?></a></td>
                <td style="padding-left: 10px;"><a style="color:black;" href="emp/view/id/<?php echo $row->emp_num; ?>"><?php echo $row->emp_firstname ." ".$row->emp_lastname; ?></a></td>
                <td style="padding-left: 10px;"><a style="color:black;" href="emp/view/id/<?php echo $row->emp_num; ?>"><?php echo $row->emp_email; ?></a></td>
                <td style="padding-left: 10px;"><a style="color:black;" href="emp/view/id/<?php echo $row->emp_num; ?>"><?php echo $row->job_name; ?></a></td>
                <td style="padding-left: 10px;"><a style="color:black;" href="emp/view/id/<?php echo $row->emp_num; ?>"><?php echo $row->org_name; ?></a></td>
            </tr>
            <?php
        }
    ?>
    </table>
    <br/>
    
    <div style="padding-left: 20px; margin-top:40px;"> <p><b> Total : <?php echo $employees->num_rows(); ?> Data Pegawai
            </b></p>
    </div>
    
</div>
