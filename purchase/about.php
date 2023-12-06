<!DOCTYPE html>
<html>
<head>
  <title>Hanwha Insurance - About</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" sizes="16x16" href="../assets/images/favicon.png?v=2">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <!-- Bootstrap Core CSS -->
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- chartist CSS -->
  <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
  <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <!--This page css - Morris CSS -->
  <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css?03:15:16am" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="css/colors/orange.css" id="theme" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
    .container-fluid{padding: 0}
    #btn{
      width:200px;
      border:3px solid #ff7101;
      border-radius:10px;
      font-family: "Varela Round", sans-serif;
      font-size:24px;
      color:#ff7101;
      padding:10px;
      margin: auto;
      text-align: center;
    }

    #btnBuy{
      width:150px;
      border: none;
      border-radius:10px;
      font-family: "Varela Round", sans-serif;
      font-size:14px;
      background-color: #ff7101;
      color: white;
      padding:10px;
    }

    #row1{
      margin-bottom: 3%;
    }
    .row p{
      vertical-align: top;
      font-size: 20px;
      color: #ff7101;
    }

    .history{
      color: white !important;
      text-align: center;
      margin: 3% 10%;
    }

    .accordion{
      background-color: #e4e4e4;
      color: #ff7101;
      padding: 10px;
      border-radius: 50px;
      font-size: 24px;
      text-align: center;
      font-weight: bold;
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <!--Header-->
  <div class="header" style="width:100%; height: 60px; background: black; position:fixed; padding: 10px; z-index:1;">
    <div id="logo" style="float: left; height: inherit;"><img src="../assets/images/hanwha-logo.png" height="40px"></div>
    <div class="menu" id="idmenu">
      <ul style="width : 70%; position:relative; margin-top: 0; margin-bottom:0; margin-right:20px; list-style-type :none; float: right">
        <li style="display: block; padding: 8px 25px; float: right;"><a href="#!" id="btnBuy">Buy Now</a></li>
        <li style="display: block; padding: 10px 25px; float: right; color:white; font-size: 14px"><b>Get in Touch</b></li>
        <li style="display: block; padding: 10px 25px; float: right; color:white; font-size: 14px"><b>Investor Relations</b></li>
        <li style="display: block; padding: 10px 25px; float: right; color:white; font-size: 14px"><b>Hanwha Stories</b></li>
        <li style="display: block; padding: 10px 25px; float: right; color:white; font-size: 14px"><b>Company</b></li>
        <li style="display: block; padding: 10px 25px; float: right; color:white; font-size: 14px"><b>Services</b></li>
      </ul>
    </div>
  </div>

  <div class="row page-titles homehtml" style="background: url('../assets/images/background/'); padding-bottom: 0;">
    <div class="col-md-12 col-12 align-self-center.headerpage" style="background: url('../assets/images/background/dashboard-header.jpg'); background-size: cover;">
      <div class="row" id="row1">
        <div class="col-md-12 col-12 align-self-center" style="margin: 20% 0%; padding: 0% 10%">
          <h1 style="font-size: 48px; color: #ff7101; text-align: center; line-height: 72px;">
            TENTANG <span style="font-weight: 800">KAMI</span>
          </h1>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-12 align-self-center">
      <h1 style="text-align: center; margin: 50px 0px 30px; color: #ff7101; font-weight: 800">VISI & MISI</h1>
      <div class="row" id="row1">
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <img src="../assets/images/about/terkemuka.png">
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <img src="../assets/images/about/inovatif.png">
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <img src="../assets/images/about/famous.png">
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <img src="../assets/images/about/nilaitambah.png">
        </div>
      </div>

      <div class="row" id="row1">
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <p>Menjadi perusahaan asuransi jiwa terkemuka di Indonesia.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <p>Menyediakan produk yang inovatif.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <p>Memberikan pelayanan prima dengan menjunjung tinggi etika bisnis dan integritas.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-3 align-self-center" style="text-align: center;">
          <p>Memberikan nilai tambah kepada seluruh pemangku kepentingan.</p>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-12 align-self-center" style="background-color: #ff7101">
      <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800">PERMULAAN ASURANSI JIWA DI KOREA</h2>
      <p class="history">
        Setelah kemerdekaan Korea, perusahaan asuransi jiwa nasional yang pertama ditemukan di 18, Namdaemun 1-ga, Seoul, tanggal 9 September 1946. Itulah permulaan dari Hanwha Life, Korea Life. Sejarah yang hebat berawal saat itu. Sejak itu, perusahaan kami telah melanjutkan penemuan holistik yang bertujuan untuk memuaskan pelanggan kami. Kompetisi dan profesionalisme yang berbeda membawa kami sebagai pemimpin di industri asuransi, Hanwha Life mencetak sejarah dalam pasar asuransi Korea, baik dalam nama dan secara nyata.
      </p>

      <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800">BERGABUNG SEBAGAI ANGGOTA HANWHA GROUP</h2>
      <p class="history">
        Dengan cita-cita menjadi sebuah perusahaan yang lebih besar, Hanwha Life menjadi anggota Hanwha Group pada 12 Desember 2002. Hanwha Life telah melewati sejumlah hambatan selama 66 tahun terakhir, namun sejak menjadi anggota keluarga besar Hanwha Group, Hanwha Life secara bertahap memperbaiki kualitas dirinya. Dengan pencapaian total aset melebihi 50 triliun won di tahun 2008 dan 70 triliun won di tahun 2012, Hanwha Life mampu berkembang dengan berpijak pada nilai-nilai dasarnya, yaitu Challenge, Dedication, dan Integrity.
      </p>

      <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800">AWAL YANG BARU UNTUK HANWHA LIFE</h2>
      <p class="history">
        Pada 9 Oktober 2012, di peringatan ulang tahun Hanwha Group ke-60, Korea Life membuat sebuah awal baru dengan mengubah namanya menjadi 'Hanwha Life'. Hanwha Life sekarang berada di sebuah awal baru, sebagai perusahaan yang memperbaiki kehidupan pelanggannya dengan visinya, 'A Global Insurance Company, Growing Together With Customers', dan slogan produknya, 'Financial Solution for Tomorrow'.
      </p>

      <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800">BERGERAK KE PASAR DUNIA YANG LEBIH BESAR</h2>
      <p class="history">
        Untuk menjadi sebuah perusahaan asuransi global yang tumbuh bersama pelanggannya, Hanwha Life berjuang memasuki pasar global. Diawali dengan Kantor Perwakilan Beijing di tahun 2003, Hanwha Life membuat terobosan ke New York, London, dan terus memperluas bisnisnya ke Asia - Tokyo, Vietnam juga menjalankan joint venture di Hangzhou, Cina pada tahun 2012. Melalui ekspansinya pada negara-negara berkembang, Hanwha Life melanjutkan perluasannya ke Indonesia untuk menumbuhkan bisnis asuransi secara global.
      </p>

      <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800">HANWHA LIFE DI INDONESIA</h2>
      <p class="history">
        Memasuki pasar Indonesia, pada 20 Desember 2012, Hanwha Life mengakuisisi PT Multicorlife Insurance dan mengubah namanya menjadi PT Hanwha Life Insurance Indonesia pada tanggal 23 Mei  2013. PT Hanwha Life Insurance Indonesia secara resmi diluncurkan tanggal 24 Oktober 2013 untuk mencapai perkembangan yang berkelanjutan melalui kompetisi inovatif dalam bisnis asuransi di Indonesia. Persetujuan resmi dari Otoritas Jasa Keuangan untuk lisensi bisnis di bawah nama PT Hanwha Life Insurance Indonesia diperoleh tanggal 23 Juli 2013 berdasarkan Keputusan Dewan Komisioner Otoritas Jasa Keuangan Nomor: KEP-421/NB.1/2013.
      </p>
    </div>

    <div class="col-md-12 col-12 align-self-center">
      <h1 style="text-align: center; margin: 50px 0px 30px; color: #ff7101; font-weight: 800">COMMISSIONERS & BOARD OF DIRECTORS</h1>
      <table style="margin: 0 5%; border-spacing: 0">
        <tr>
          <td><img src="../assets/images/about/amran.jpg" width="100%"></td>
          <td style="background-color: #ff7101; color: white">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Amran Nangasan</h2>
            <p style="color: white; font-size: 20px; text-align: center;">INDEPENDENT COMMISSIONER</p>
          </td>
          <td><img src="../assets/images/about/ichsan.jpg" width="100%"></td>
          <td style="background-color: #ff7101; color: white">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Muhamad Ichsan</h2>
            <p style="color: white; font-size: 20px; text-align: center;">INDEPENDENT COMMISSIONER</p>
          </td>
          <td><img src="../assets/images/about/goodokyo.jpg" width="100%"></td>
          <td style="background-color: #ff7101; color: white; text-align: center;">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Goo Do Kyo</h2>
            <p style="color: white; font-size: 20px">PRESIDENT COMMISSIONER</p>
          </td>
        </tr>

        <tr>
          <td style="background-color: #ff7101; color: white">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Yeom Kyung Seon</h2>
            <p style="color: white; font-size: 20px; text-align: center;">PRESIDENT DIRECTOR</p>
          </td>
          <td><img src="../assets/images/about/yeomkyungseon.jpg" width="100%"></td>
          <td style="background-color: #ff7101; color: white">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Kwon Gihan</h2>
            <p style="color: white; font-size: 20px; text-align: center;">DIRECTOR</p>
          </td>
          <td><img src="../assets/images/about/kwongihan.jpg" width="100%"></td>
          <td style="background-color: #ff7101; color: white">
            <h2 style="text-align: center; margin-top: 3%; color: white; font-weight: 800; font-size: 18px">Francisca M. Roeswita</h2>
            <p style="color: white; font-size: 20px; text-align: center;">DIRECTOR</p>
          </td>
          <td><img src="../assets/images/about/fransisca.jpg" width="100%"></td>
        </tr>
      </table>
    </div>

    <div class="col-md-12 col-12 align-self-center">
      <h1 style="text-align: center; margin: 50px 0px 30px; color: #ff7101; font-weight: 800">EXECUTIVE MANAGEMENT</h1>
      <table class="table table-striped" style="text-align:left; margin: auto; max-width: 90%">
        <thead>
          <tr>
            <th width="30%">Name</th>
            <th width="70%">Position</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td width="30%">WIDIA SJOEKRI</td>
            <td width="70%">CHIEF GROUP BUSINESS & BANCASSURANCE</td>
          </tr>
          <tr>
            <td width="30%">DWITA AMEILIA</td>
            <td width="70%">CHIEF HUMAN RESOURCE DEVELOPMENT</td>
          </tr>
          <tr>
            <td width="30%">STEVEN NAMKOONG</td>
            <td width="70%">DEPUTY CAO</td>
          </tr>
          <tr>
            <td width="30%">GERALD WUHANBINO</td>
            <td width="70%">DEPUTY BANCASSURANCE</td>
          </tr>
          <tr>
            <td width="30%">ROBERTUS DEDDY GUNAWAN</td>
            <td width="70%">HEAD OF FINANCE, ACCOUNTING & INVESTMENT</td>
          </tr>
          <tr>
            <td width="30%">Dr. YUDI TAFIATI, HIA, CPLHI</td>
            <td width="70%">HEAD OF UNDERWRITING</td>
          </tr>
          <tr>
            <td width="30%">ADHI NUGRAHA</td>
            <td width="70%">HEAD OF MARKETING GROUP LIFE</td>
          </tr>
          <tr>
            <td width="30%">ADITYA RIZKI PRAKOSA</td>
            <td width="70%">HEAD OF COMPLIANCE</td>
          </tr>
          <tr>
            <td width="30%">EKO NUGROHO</td>
            <td width="70%">HEAD OF PRODUCT DEVELOPMENT</td>
          </tr>
          <tr>
            <td width="30%">SISKA DAMAYANTI</td>
            <td width="70%">HEAD OF AGENCY SUPPORT</td>
          </tr>
          <tr>
            <td width="30%">REZA UTAMA</td>
            <td width="70%">HEAD OF NEW BUSINESS</td>
          </tr>
          <tr>
            <td width="30%">MICKY RENO ADHITYA</td>
            <td width="70%">HEAD OF MARKETING GROUP HEALTH</td>
          </tr>
          <tr>
            <td width="30%">YADI PADLI NURYAYI ASGAR</td>
            <td width="70%">HEAD OF BANCASSURANCE SUPPORT</td>
          </tr>
          <tr>
            <td width="30%">IRENE HEDWIGA JONATAN</td>
            <td width="70%">HEAD OF LEGAL & CORPORATE SECRETARY</td>
          </tr>
          <tr>
            <td width="30%">ACHMAD ANWARUDIN</td>
            <td width="70%">APPOINTED AND HEAD OF ACTUARY</td>
          </tr>
          <tr>
            <td width="30%">FABIANUS WIDYARTO</td>
            <td width="70%">HEAD OF MARKETING PLANNING</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-md-12 col-12 align-self-center" style="margin-top: 5%">
      <div class="row">
        <div class="accordion">Pesan CEO</div>
        <div class="accordion">Struktur Organisasi</div>
        <div class="accordion">Brand & Values</div>
        <div class="accordion">Tata Kelola Perusahaan</div>
      </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>