<?php
$urlmeta = "Frequently Ask Question";
$urldesc = "Berisi beberapa pertanyaan tentang asuransi yang sering ditanyakan oleh customer kepada Hanwha life sebagai bahan referensi untuk anda";
include 'header-new.php';
?>

<html>
	<body>
		<div class="col-md-12 col-12 align-self-center headerpage" style="background: url('../assets/images/background/Hanwhalife-bucketlist-profile-page.jpg');height: 400px;background-size:cover; padding: 0 -10%">
		</div>

		<div id="faqpage" class="page-titles homehtml" style="padding: 2% 10%; margin: auto;" data-role="page" data-url="faqpage">
			<div class="col-lg-12 col-md-12 col-12 align-self-center" style="padding: 3% 0">
				<h1 style="text-align: center; color: #ff7101"><strong>FAQ</strong></h1>
			</div>

			<div class="align-self-center searchbar" style="padding: 0 5%">
				<input type="text" name="search" class="txedit col-lg-11 col-md-10 col-9" style="float: left;" placeholder="Cari ...">
				<h2 id="searchbtn" class="col-lg-1 col-md-2 col-3" style="float: left; margin-top: 20px; margin-bottom: 40px; text-align: right; color: #666; cursor: pointer;"><i class="fas fa-search"></i></h2>
			</div>

			<div class="row">
				<div id="ah1" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA1()">
					<h2>Manfaat Utama <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc1" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Apa aja sih yang didapat?</h3></li>
						<ul type="circle" style="overflow: auto;">
							<li>Dana cash di akhir masa pembayaran yang besarnya sesuai dengan masa pembayaran dan Plan yang dipilih: </li>
							<table class="acctab">
								<tr>
									<th rowspan="2">Masa Asuransi</th>
									<th colspan="2">Cash Benefit (ribu)</th>
								</tr>
								<tr>
									<th>Plan A</th>
									<th>Plan B</th>
								</tr>
								<tr>
									<td style="background-color: #fdc9a4">1 Tahun</td>
									<td>14.544</td>
									<td>21.816</td>
								</tr>
								<tr>
									<td style="background-color: #fdc9a4">2 Tahun</td>
									<td>14.688</td>
									<td>22.032</td>
								</tr>
								<tr>
									<td style="background-color: #fdc9a4">3 Tahun</td>
									<td>14.832</td>
									<td>22.248</td>
								</tr>
							</table>

							<li>Santunan jiwa jika meninggal: </li>
							<table class="acctab">
								<tr>
									<th rowspan="2">Penyebab</th>
									<th colspan="2">Santunan Jiwa (rupiah)</th>
								</tr>
								<tr>
									<th>Plan A</th>
									<th>Plan B</th>
								</tr>
								<tr>
									<td style="background-color: #fdc9a4">Kecelakaan</td>
									<td>50 juta</td>
									<td>100 juta</td>
								</tr>
								<tr>
									<td style="background-color: #fdc9a4">Non-kecelakaan</td>
									<td colspan="2">Pengembalian seluruh dana yang telah dibayarkan</td>
								</tr>
							</table>
						</ul>
						<li><h3>Jika memang yang didapat adalah dana cash, apakah ini berarti bisa digunakan untuk liburan selain ke Korea?</h3></li>
						<p>Bisa banget. Tim Hanwha akan mengkonfirmasi hal ini pada saat akhir masa Polis.</p>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah2" class="col-lg-12 col-md-12 col-12 align-self-center acchead " onclick="showA2()">
					<h2>Manfaat Spesial <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc2" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Selain Manfaat utama, manfaat apa lagi yang di dapat?</h3></li>
						<ul type="circle" style="margin: 10px 0">
							<li><h4>1 Tahun Platinum Membership Galleria Duty Free, Seoul, Korea</h4></li>
							<p style="margin-bottom: 0">Dengan membership ini, manfaat yang akan didapat adalah:</p>
							<ul type="square" style="margin-bottom: 15px">
								<li>Diskon sampai dengan 20%</li>
								<li>Akses ke Diamond Lounge untuk istirahat sejenak setelah belanja</li>
								<li>Free gift</li>
							</ul>
							<li><h4>Global VIP Membership Galleria Department Store</h4></li>
							<p style="margin-bottom: 0">Dengan membership ini, manfaat yang didapat adalah:</p>
							<ul type="square" style="margin-bottom: 15px">
								<li>Diskon belanja sampai dengan 8%</li>
								<li>Refund pajak 8%</li>
								<li>Akses Global VIP Lounge</li>
								<li>Service pelayan belanja pribadi</li>
							</ul>
							<li><h4>Khusus untuk 100 Pembeli pertama, akan mendapatkan free tiket Landmark of Seout 63 Building Tour Package</h4></li>
						</ul>

						<li><h3>Kapan special benefit diterima oleh nasabah?</h3></li>
						<p>Pengambilan special benefit dilakukan langsung di Galleria Duty Free, Seoul,  Korea dengan cara menunjukan passport.</p>	

						<li><h3>Special benefit ada expirednya atau tidak?</h3></li>
						<p>Special benefit berupa membership bisa diambil dan diaktfikan kapanpun di Galleria Seoul, Korea dan berlaku selama 1 tahun sejak diaktifkan.</p>

						<li><h3>Jika tidak jadi ke Korea special benefitnya bagaimana?</h3></li>
						<p>Special benefit hanya dapat diambil dan diaktifkan langsung di Galleria Seoul, Korea. Jika Manfaat Utama tidak digunakan untuk berlibur ke Korea, maka Special Benefit ini sayangnya tidak akan bisa diambil dan diaktfikan.</p>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah3" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA3()">
					<h2>How to Buy <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc3" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Jika saya berminat dengan plan ini, apa yang harus saya lakukan?</h3></li>
						<p>Langsung saja klik hashtag #Koreaversikamu di pojok kanan atas website ini, dan pilih “Yuk Beli Disini” dan ikuti langkah2 sederhananya.</p>

						<li><h3>Saya kenal Agent Hanwha, apakah pembelian ini bisa saya lakukan melalui Agent?</h3></li>
						<p>Produk ini dibuat dengan segala kemudahan pembelian online langsung melalui website, sehingga pembelian hanya bisa langsung dilakukan sendiri di website tanpa bantuan Agent.</p>

						<li><h3>Jika saat pengisian data dan sudah sanpai step terakhir tapi tidak berhasil?</h3></li>
						<p>Generate password dengan cara Login dengan email yang kamu daftarkan dan forgot password, lalu kamu bisa ubah passwordnya.</p>

						<li><h3>Jika tidak menerima email setelah registrasi?</h3></li>
						<p>Generate password dengan cara Login dengan email yang kamu daftarkan dan forgot password, lalu kamu bisa ubah passwordnya.</p>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah4" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA4()">
					<h2>Pembayaran Pertama <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc4" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Pada saat pembelian pertama, konfirmasi email berisi nomor VA yang saya terima sudah lebih dari 24. Apa yang saya bisa lakukan jika tetap ingin melakukan pembelian?</h3></li>
						<p>Membeli plan baru dengan cara login ke akun yang sudah didaftarkan.</p>

						<li><h3>Apakah ada metode pembayaran lain seperti auto debit/kartu kredit?</h3></li>
						<p>Untuk saat ini metode yang tersedia hanya melalui Virtual Account bank BNI dan Permata.</p>

						<li><h3>Saya lihat bahwa pilihan pembayaran adalah dengan Bank Permata dan BNI. Apakah saya bisa melakukan pembayaran dari Bank selain Permata dan BNI?</h3></li>
						<p>Bisa, dengan cara pilih transfer antar Bank.</p>

						<li><h3>Jika tidak bisa login karena lupa password?</h3></li>
						<p>Klik forgot password, lalu kamu bisa ubah passwordnya.</p>

						<li><h3>Jika tidak punya telfon rumah?</h3></li>
						<p>Bisa diisi dengan nomor handphone (walaupun sama).</p>

						<li><h3>Jika ahli waris tidak mempunyai email?</h3></li>
						<p>Bisa diisi dengan menggunakan email tertanggung (walaupun sama dengan akun email yang didaftarkan untuk membeli).</p>

						<li><h3>Kapan hard copy akan dikirim ke nasabah?</h3></li>
						<p>1 x 24 jam setelah polis diterbitkan.</p>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah5" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA5()">
					<h2>Pembayaran Premi Lanjutan <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc5" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Tanggal berapa pembayaran selanjutnya harus dibayarkan?</h3></li>
						<p>Akan ada email pengingat untuk pembayaran dan nomor VA setiap 14 hari sebelum tanggal jatuh tempo.</p>

						<li><h3>Jika lupa bayar pembayaran selanjutnya bagaimana?</h3></li>
						<p>Akan masuk pada masa grace period selama 30 hari sejak tanggal jatuh tempo.</p>

						<li><h3>Jika dipertengahan bulan tidak ingin melanjutkan?</h3></li>
						<p>Akan mendapatkan nilai tunai sesuai dengan tabel nilai tunai yang tertera pada ringkasan polis.</p>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah6" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA6()">
					<h2>Akhir Masa Pembayaran (Maturity) <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc6" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Saat maturity harus submit dokumen apa?</h3></li>
						<ul type="circle">
							<li>Formulir pengajuan klaim</li>
							<li>Copy KTP/SIM/paspor</li>
							<li>Copy buku tabungan halaman 1 yang sesuai namanya dengan tertanggung</li>
							<li>Copy dokumen ringkasan polis yang asli</li>
						</ul>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="ah7" class="col-lg-12 col-md-12 col-12 align-self-center acchead" onclick="showA7()">
					<h2>Influencer Program <span class="plus" style="float: right;">+</span><span class="minus" style="float: right;">-</span></h2>
				</div>

				<div id="acc7" class="col-lg-12 col-md-12 col-12 align-self-center accbody hide">
					<ul>
						<li><h3>Apa yang dimaksud dengan menjadi influencer?</h3></li>
						<p>Program dari Hanwha yang bekerja sama dengan beberapa orang yang berpengaruh dalam media sosial agar masyarakat lebih mengetahui tentang produk Hanwha Bucket List.</p>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
include 'footer.php';
?>