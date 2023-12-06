<?php
if(!isset($_SESSION['registid']) || $_SESSION['registid'] == NULL){
    ?>
        <script>alert('Session server telah berakhir! Silahkan ulangi kembali jika anda sedang tahap ingin transaksi.'); window.location.href= "../../form";</script>
    <?php
}
?>