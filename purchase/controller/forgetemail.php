<?php
include '../jsonapp/json-hanwha-api.php';
//googlechecker();
if(!isset($_POST)){
    return FALSE;
}else if(isset($_POST)){
    $dataset = forgetpassword($_POST['emailforget']);
}
//enabledebug();
?>
<div class="rowNotifInfluencer">
<?php
if($dataset['result_code'] == -1){
    echo "<script>alert('EROR!'); window.location.href = './';</script>";
}else if($dataset['result_code'] == 6001 || $dataset['result_code'] == 1106){
    ?>
    <h3 class="h3influencer">Permintaan Gagal!</h3>
    <i class="mdi mdi-do-not-disturb" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Mohon maaf, permintaan Anda ditolak. Hal ini disebabkan karena email yang Anda masukkan tidak terdaftar.<br>Terima Kasih!</p>
    <?php
}else if($dataset['result_code'] == 1000){
    ?>
    <h3 class="h3influencer">Request Penggantian Password<br>Berhasil!</h3>
    <i class="mdi mdi-check" style="color: #ff7101; font-size: 120px;"></i><br>
    <span style="color:#ff7101;">Email sudah dikirimkan kepada anda.</span>
    <p class="paraInfluencer">Email untuk mengganti password anda sudah terkirim. Silahkan check inbox anda untuk melakukan penggantian password melalui request ganti password.</p>
    <?php
}else if($dataset['result_code'] == 1105){
    ?>
    <h3 class="h3influencer">System Fail! Wrong Token/Code</h3>
    <i class="mdi mdi-do-not-disturb" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Registration can't be processed due to Wrong Token or Code Input setup! Contact IT Support regarding this matter. Error Code: 1105</p>
    <?php
}else if($dataset['result_code'] == 1220){
    ?>
    <h3 class="h3influencer">Permintaan berhasil!</h3>
    <i class="mdi mdi-check" style="color: #ff7101; font-size: 120px;"></i><br>
    <span style="color:#ff7101;">Email sudah dikirimkan.</span>
    <p class="paraInfluencer">Silahkan periksa kotak masuk anda untuk mengatur ulang password. Jika tidak ada di kotak masuk, silahkan periksa spam</p>
    <?php
}
?>
    <a href="./forgot-password">&lt; BACK</a>
</div>