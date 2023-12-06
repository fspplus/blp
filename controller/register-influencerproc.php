<?php
include '../jsonapp/json-hanwha-api.php';
googlechecker();
enabledebug();
if(!isset($_POST)){
    return FALSE;
}else if(isset($_POST)){
    $dataset = registerinfluencer($_POST);
    //echo $dataset['result_code'];
}
?>
<div class="rowNotifInfluencer">
<?php
if($dataset['result_code'] == -1){
    echo "<script>alert('EROR!');</script>";
    ?>
        <h3 style="color: white;">Check enabled debug mode above!</h3>
    <?php
    print_r($dataset);
}else if($dataset['result_code'] == 6001){
    ?>
    <h3 class="h3influencer">Registrasi Influencer Gagal!</h3>
    <i class="mdi mdi-do-not-disturb" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Mohon maaf, tapi registrasi anda gagal. Sepertinya email anda sudah terdaftar dan masuk dalam waiting list. Jika anda merasa belum pernah mendaftar sebelumnya atau tidak menerima email konfirmasi, silahkan coba beberapa waktu lagi, atau hubungi Hanwha Life Support.<br>Terima Kasih!</p>
    
    <a href="./apply-influencer">&lt; BACK</a>
    <?php
}else if($dataset['result_code'] == 1000){
    ?>
    <h3 class="h3influencer">Registrasi Berhasil!</h3>
    <i class="mdi mdi-check" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Saat ini registrasi anda telah kami terima dan akan kami proses. Email aktivasi akan terkirim pada email yang sudah diinput melalui form registrasi.<br>Terima Kasih!</p>
    <a href="../">&lt; BACK</a>
    <?php
}else if($dataset['result_code'] == 1105){
    ?>
    <h3 class="h3influencer">System Fail! Wrong Token/Code</h3>
    <i class="mdi mdi-check" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Registration can't be processed due to Wrong Token or Code Input setup! Contact IT Support regarding this matter. Error Code: 1105</p>
    
    <a href="./apply-influencer">&lt; BACK</a>
    <?php
}
?>
</div>