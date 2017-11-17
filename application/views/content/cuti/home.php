<style type="text/css">
#kiri{
	width: 50%;
	float: left;
}
#kanan{
	width: 40%;
	float: right;
}
</style>
<div id="content">
	<div id="kiri">
	<h2>PROFILE DATA KARYAWAN</h1>
	<div>
		<table>
			<tr>
				<td>NAMA / NIK</td>
				<td>:</td>
				<td><?php echo $user_aktif->emp_firstname." ".$user_aktif->emp_lastname." / ".$user_aktif->emp_id; ?></td>
			</tr>
			<tr>
				<td>BAND / JABATAN</td>
				<td>:</td>
				<td><?php echo $user_aktif->job_name ?></td>
			</tr>
			<tr>
				<td>UNIT KERJA</td>
				<td>:</td>
				<td><?php echo $user_aktif->org_name ?></td>
			</tr>
		</table>
	</div>
	<h2>PROFILE DATA CUTI</h2>
	<div style="height:120px;overflow-y:scroll">
	<table style="width:100%;">
		<thead>
			<tr style="background-color: black; color:white; text-align: center;">
				<td>Kode Cuti</td>
				<td>Jenis Cuti</td>
				<td>Sekaligus</td>
				<td>Alokasi</td>
				<td>Telah ambil</td>
				<td>Sisa Ambil</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($cutiData as $key) {
					$sisa=$key->alokasi;
					if($key->sekaligus==1){
						$sk = "Ya";
						if($key->telahAmbil>0)
							$sisa=0;
					}
					else{
						$sk = "Tidak";
						if($key->telahAmbil>0)
							$sisa=$key->alokasi - $key->telahAmbil;

					}
					echo "
					<tr>
					<td>".$key->kode."</td>
					<td>".$key->jenis."</td>
					<td>".$sk."</td>
					<td>".$key->alokasi." Hari</td>
					<td>".$key->telahAmbil." Hari</td>
					<td>".$sisa." Hari</td>
				</tr>
					";
				}
			?>
		</tbody>
	</table>
</div>
	<h3>Asip Cuti</h3>
	<div style="height:350px;overflow-y:scroll">
	<table style="width:100%">
		<thead>
			<tr style="background-color: black; color:white; text-align: center;">
				<td>Mulai</td>
				<td>Selesai</td>
				<td>Kode</td>
				<td>Nama</td>
				<td>Jml Hari</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($cuti_data as $key) {
					if($key->hari==0){
						$dateMulai = strtotime($key->mulai);
                        $dateSelesai = strtotime($key->selesai);
                        $hari=0;
                        while($dateMulai<=$dateSelesai){
                            $dateMulai = strtotime("+1 day",$dateMulai);
                            $indexHari= date("N",$dateMulai);
                            if($indexHari==6||$indexHari==7){

                            }
                            else{
                                $libura = $liburannya;
                                $temu=false;
                                foreach ($libura as $k => $value) {
                                    if($value==date("Y-m-d",$dateMulai)){
                                        $temu=true;
                                        break;
                                    }
                                }
                                if(!$temu)
                                    $hari++;
                            }
                        }
					}
					else{
						$dateMulai = strtotime($key->mulai);
                        $dateSelesai = strtotime($key->selesai);
                        $seconds_diff = $dateSelesai-$dateMulai+1 ;
                        $hari = floor($seconds_diff/3600/24);
					}
					$hari+=1;
					echo"				
						<tr>
							<td>".$key->mulai."</td>
							<td>".$key->selesai."</td>
							<td>".$key->kode."</td>
							<td>".$key->jenis."</td>
							<td>".$hari." Hari</td>
						</tr>
					";
				}
			?>
		</tbody>
	</table>
	</div>
</div>s
	<div id="kanan">
		<h2>Notifikasi Cuti</h2>
		<div>
			<table>
			<tr>
				<td>Draft</td>
				<td>:</td>
				<td><a href="<?php echo site_url('cuti/home/page/draft') ?>"><?php echo $draftData ?> Dokumen</a></td>
			</tr>
			<tr>
				<td>Perlu Progress</td>
				<td>:</td>
				<td><a href="<?php echo site_url('cuti/home/page/approve') ?>"><?php echo $approveData ?> Dokumen</a></td>
			</tr>
			<tr>
				<td>Sedang Progress</td>
				<td>:</td>
				<td><a href="<?php echo site_url('cuti/home/page/progress') ?>"><?php echo $onProgressData ?> Dokumen</a></td>
			</tr>
			<tr>
				<td>Returned</td>
				<td>:</td>
				<td><a href="<?php echo site_url('cuti/home/page/return') ?>"><?php echo $returnData ?> Dokumen</a></td>
			</tr>
		</table>
		</div>
		<h3>Daftar Libur Tahun Ini</h3>
	
		<div style="height:520px;width:300px;overflow-y:scroll"> 
			<table style="width:100%">
				<thead>
					<tr style="background-color: black; color:white; text-align: center;">
						<td>Tanggal</td>
						<td>Keterangan Libur</td>
					</tr>
				</thead>		
				<tbody>
					<?php 
						foreach ($libur as $key) {
							if($key->tanggal_mulai!=$key->tanggal_akhir)
							{
								$i=1;
								while($key->tanggal_mulai!=$key->tanggal_akhir)
								{
									echo"<tr>
										<td>".$key->tanggal_mulai."</td>
										<td>".$key->nama." ke-".$i."</td>
										</tr>";
									$key->tanggal_mulai = strtotime($key->tanggal_mulai);
									$key->tanggal_mulai = strtotime("+1 day",$key->tanggal_mulai);
									$key->tanggal_mulai = date("Y-m-d",$key->tanggal_mulai);
									$i++;
								}echo"<tr>
										<td>".$key->tanggal_mulai."</td>
										<td>".$key->nama." ke-".$i."</td>
										</tr>";
							}
							else{
								echo"<tr>
							<td>".$key->tanggal_mulai."</td>
							<td>".$key->nama."</td>
							</tr>";
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>