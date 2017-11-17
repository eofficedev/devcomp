<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>chart/highchart/js/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>chart/highchart/js/highcharts.js"></script>
<script type="text/javascript">
    $(function () {
function requestData() {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/sppd_ci/index.php/site/admin_dashboard/print_chart()",
                success: function(data) {
                    var a = JSON.parse(data);
                    var i = 0;
                    var chartdata = [];

                    for (i = 0; i < a.length; i++) {
                        chartdata.push([Date.UTC(a[i].tahun, (parseInt(a[i].bulan) - 1)), parseInt(a[i].total)]);
                    }
                    chart.series[0].setData(chartdata);
                }
            });
        }
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25,
                    events: {
                        load: requestData
                    }
                },
                title: {
                    text: 'Your profile statistic',
                    x: -20 //center
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        month: '%d %b'
                    },
                    tickInterval: 86400000 * 31
                },
                yAxis: {
                    title: {
                        text: 'People'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + this.series.name + '</b><br/>' +
                                Highcharts.dateFormat('%b', this.x) + ': ' + this.y + ' people';
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                series: [{
                        name: 'People',
                        data: []
                    }]
            });
        });    
        
        
        $('#content').highcharts({
            title: {
                text: 'Pengeluaran SPPD',
                x: -20 //center
            },
            subtitle: {
                text: 'Source : Pointer.com',
                x: -20
            },
            xAxis: {
                categories: ['21-08-2013','16-09-2013','17-10-2013','22-10-2013','24-10-2013','26-10-2013','29-10-2013']
            },
            yAxis: {
                title: {
                    text: 'Biaya'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Pengeluaran',
                data: [700000, 690000, 950000, 145000, 1820000, 2150000, 2520000]
            }]
        });
    });

</script>
<div id="content";>
<!--    <h2 style="margin: 0px; padding: 20px; text-align: left;">Dashboard</h2>
    <div id="container" style="width:100%; height:400px;"></div>
    <div id="content-right">
        <div id="content-right-data">
            <p><b>Akun Anda :</b></p>
            <img width="80" style="margin-left: 105px; margin-top: 20px;" height="80" src="<?php echo base_url(); ?>css/unknown-prof-pic.png"/>
            <table style="margin-left: 50px; margin-top: 40px;" >
                <?php $row = $total->row(); ?><?php $baris = $tahun->row(); ?>
                <tr>
                <tr>Years</tr>
                <td><?php echo $baris->q; ?></td>
                <tr>Jumlah SPPD</tr>
                <td><?php echo $row->stat; ?></td>
                <tr>Biaya</tr>
                </tr>
                <tr>
                    <td>Tipe Akun</td>
                    <td> : Administrator</td>
                </tr>

                <br/>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>-->
</div>
