<div id="dialog-tambah" title="Tambahkan"  style="z-index:99999">
    <div id="tabs">
        <?php echo form_open("cuti/config/edit_simpan","id='form-tambah'") ?>
        <div id="tabs-1" style="font-size: smaller;">
            <table>
                <tr>
                    <td>Jenis Cuti</td>
                    <td><input type="text" name="jenis"></td>
                </tr>
                <tr>
                    <td>Alokasi Cuti 1 Tahun(Hari)</td>
                    <td><input type="number" name="alokasi"></td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="radio" value="0" name="hari"> Hari Kerja </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="radio" value="1" name="hari"> Semua Hari </td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="checkbox" value="1" name="sekaligus"> Harus di ambil sekaligus </td>
                </tr>
                <tr>
                    <td>Interval(Tahun)</td>
                    <td><input type="number" name="interval"></td>
                </tr>
            </table>
           
        </div>

        <?php echo form_close() ?>
    </div>
</div>