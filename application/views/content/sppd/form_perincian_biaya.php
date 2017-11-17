<html>
    <head>
        <title>Form Perincian Biaya - eOffice</title>
        
        <style type="text/css">
            body{
                font-family: calibri;
            }
        </style>
    </head>
    
    
    <body>
        <div id="header">
            <h2>Form Perincian Biaya SPPD</h2>
               
        </div>
        <div id="content">
            <table style="width:250px;">
                <tr>
                    <td>SPPD ID</td>
                    <td> : </td>
                </tr>
                <tr>
                    <td>Pemohon SPPD</td>
                    <td> : </td>
                </tr>
                <tr>
                    <td>Tujuan Perjalanan</td>
                    <td> : </td>
                </tr>
                <tr>
                    <td>Asal-Tujuan</td>
                    <td> : </td>
                </tr>
                <tr>
                    <td>Tanggal Perjalanan</td>
                    <td> : </td>
                </tr>
            </table>
            <br/>
            <p><b>Rincian Angkutan</b></p>
            <table style="width:850px; text-align: center;">
                <tr style="background-color: black; color:white;">
                    <th rowspan="2">No.</th>
                    <th colspan="7">Angkutan</th>
                </tr>
                <tr style="background-color: black; color: white;">
                    <th>Angkutan</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>T.Angkutan</th>
                    <th>X</th>
                    <th>J.Trans</th>
                    <th>Opsi</th>
                </tr>
                <tr id="row-1" style="border-bottom: 1px dotted black;">
                    <td><input type="text" id="no-1" style="width:30px; text-align: right;" value="1" readonly="readonly"  /></td>
                    <td><input type="text" id="angkutan-1" name="angkutan[]" style="width:200px;" /></td>
                    <td><input type="text" id="asal-1" name="asal[]" style="width:100px;" /></td>
                    <td><input type="text" id="tujuan-1" name="tujuan[]" style="width:100px;" /></td>
                    <td><input type="text" id="trfangkutan-1" name="trfangkutan[]" style="width:100px;" /></td>
                    <td><input type="text" id="jumlah-1" name="jml[]" style="width:40px;" /></td>
                    <td><input type="text" id="jmltrans-1" name="jmltrans[]" style="width:100px;" /></td>
                    <td><button id="add-btn">+</button> Tambah Row</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <td colspan="2">Total Uang Angkutan : </td>
                    <td></td>
                </tr>
            </table>
            <br/>
            <p><b>Rincian Biaya Harian</b></p>
            <table style="text-align: center; width: 750px;">
                <tr style="background-color: black; color:white;">
                    <th colspan="7">Harian</th>
                </tr>
                <tr style="background-color: black; color:white;">
                    <th>Berangkat</th>
                    <th>Kembali</th>
                    <th>Lama</th>
                    <th>J.Harian</th>
                    <th>%</th>
                    <th>T.Harian</th>
                    <th>Opsi</th>
                </tr>
                <tr id="row-harian-1">
                    <td><input type="text" name="fee-berangkat[]" id="fee-berangkat-1" style="width:130px;" /></td>
                    <td><input type="text" name="fee-kembali[]" id="fee-kembali-1" /></td>
                    <td><input type="text" name="lama[]" id="lama-1" style="width:40px;" /></td>
                    <td><input type="text" name="jharian[]" id="jharian-1" /></td>
                    <td><input type="text" name="persen[]" id="persentase-1" style="width:35px;" /></td>
                    <td><input type="text" name="tharian[]" id="tharian-1" /></td>
                    <td><button id="add-harian-btn">+</button></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">Total Uang Harian : </td>
                    <td></td>
                </tr>
                
            </table>
            <p><b>Total uang/biaya perjalanan dinas : </b></p>
        </div>
    </body>
</html>
