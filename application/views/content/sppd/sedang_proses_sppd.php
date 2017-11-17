<script type="text/javascript">

    $('document').ready(function() {
        $('#sedang-proses-link').click(function() {
            $('#content-ditolak').hide();
            $('#content-sedang-diproses').fadeIn();

            return false;
        });

        $('#sppd-ditolak-link').click(function() {
            $('#content-sedang-diproses').hide();
            $('#content-ditolak').fadeIn();

            return false;
        });
    });

</script>

<style>
    #links a {
        color:white;
        text-decoration: underline;
    }
</style>
<div id="content">
    <div id="status" style="text-align: center; font-size: smaller; padding-top:10px; padding-bottom: 10px; background-color: yellow; <?php if (!isset($status)) {
    echo 'display:none;';
} ?>" ><b>
            <?php
            if (isset($status)) {
                echo $status;
            }
            ?></b>
    </div>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style2.css"/>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">SPPD Sedang Diproses</h2>

    <div id="content-sppd-left" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>Search SPPD</b></p>
            <form method="post" action="<?php echo base_url(); ?>index.php/sppd/proses_sppd" >
            <table>
                <tr>
                    <td><input style='margin-left: 20px;' type='text' name='keyword'/></td>
                </tr>
                <tr>
                    <td><input type="submit" style='margin-left: 20px;' value="Search" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><b style='margin-left: 20px;'>Show SPPD By :</b></td>
                </tr>
                <style>
                    #sedang-proses-link, #sppd-ditolak-link {
                        color:black;
                    }
                    #sedang-proses-link:hover, #sppd-ditolak-link:hover {
                        text-decoration: underline;
                    }
                </style>
                <tr>
                    <td style="padding-left:20px; font-size: smaller;"><a href="#" id="sedang-proses-link">SPPD Sedang Diproses</a></td>
                </tr>
                <tr>
                    <td style="padding-left:20px; font-size: smaller;"><a href="#" id="sppd-ditolak-link">SPPD Ditolak</a></td>
                </tr>
            </table>
            </form>
        </div>
    </div>

    <div id="content-sedang-diproses" class="content-sppd-right" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh SPPD Sedang Diproses : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Filter By : All</i></p>
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;' id="links">Page : <?php echo $this->pagination->create_links(); ?></p>
            </div>

        </div>
        <?php
        if ($sppd_list->num_rows() == 0) {
            ?>
            <p style='text-align: center;'><b>Data Tidak Ada</b></p>
            <?php
        } else {

            foreach ($sppd_list->result() as $row) {
                ?>
                <div class='sppd-content'>
                    <div class='sppd-img'>
                        <img style="margin-left: 15px; margin-top: 15px;" height="100" width="100" src='<?php echo base_url(); ?>css/paper-sppd.png' h/>
                    </div>
                    <div class='sppd-data'>
                        <p style='margin-left: 10px; margin-top: 10px;'><b><?php echo $row->sppd_id; ?> - <?php echo $row->sppd_tuj; ?></b></p>
                        <p style='margin-left:10px; font-size: smaller'>Tanggal : <?php echo $row->sppd_tgl; ?> | Pemohon : <?php echo $row->emp_id . "-" . $row->emp_firstname . ' ' . $row->emp_lastname; ?> | Pembuat : <?php echo $row->pem_fname . " " . $row->pem_lname; ?></p>
                        <p style='margin-left:10px; font-size: smaller'>Current : <?php echo $row->curr_empid . "-" . $row->curr_fname . " " . $row->curr_lname; ?><i> - On Progress</i></p>

                    </div>
                    <div class='sppd-opsi'>
                        <p style='padding-top: 30px; margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/sppd/view_sedang_proses_sppd/id/<?php echo $row->sppd_num; ?>' style='color:black;'>View</a></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div id="content-ditolak" class="content-sppd-right" style='border-top: 1px dotted black; display: none;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh SPPD Ditolak : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Filter By : All</i></p>
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;'>Page : 1</p>
            </div>

        </div>
        <?php
        if ($sppd_tolak->num_rows() == 0) {
            ?>
            <p style='text-align: center;'><b>Data Tidak Ada</b></p>
            <?php
        } else {
            foreach ($sppd_tolak->result() as $row2) {
                ?>
                <div class='sppd-content'>
                    <div class='sppd-img'>
                        <img style="margin-left: 15px; margin-top: 15px;" height="100" width="100" src='<?php echo base_url(); ?>css/paper-sppd.png' h/>
                    </div>
                    <div class='sppd-data'>
                        <p style='margin-left: 10px; margin-top: 10px;'><b><?php echo $row2->sppd_id; ?> - <?php echo $row2->sppd_tuj; ?></b></p>
                        <p style='margin-left:10px; font-size: smaller'>Tanggal : <?php echo $row2->sppd_tgl; ?> | Pemohon : <?php echo $row2->emp_id . "-" . $row2->emp_firstname . ' ' . $row2->emp_lastname; ?> | Pembuat : <?php echo $row2->pem_fname . " " . $row2->pem_lname; ?></p>
                        <p style='margin-left:10px; font-size: smaller'><b>Rejected</b></p>

                    </div>
                    <div class='sppd-opsi'>
                        <p style='padding-top: 30px; margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/sppd/view_sedang_proses_sppd/id/<?php echo $row2->sppd_num; ?>' style='color:black;'>View</a></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

</div>