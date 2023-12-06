<?php
include '../jsonapp/json-hanwha-api.php';
googlechecker();
if(!isset($_POST)){
    return FALSE;
}else if(isset($_POST)){
    $_POST['key'] = urlencode($_POST['key']);
    $_POST['key'] = str_replace("+","%2B", $_POST['key']);
    $_POST['key'] = urldecode($_POST['key']);
    $dataset = setnewpassword($_POST);
}
?>
<div class="rowNotifInfluencer">
<?php
if($dataset['result_code'] == -1){
    echo "<script>alert('EROR!');</script>";
    ?>
        <h3 style="color: white;">Check enabled debug mode above!</h3>
    <?php
}else if($dataset['result_code'] == 3103){
    ?>
    <h3 class="h3influencer">Atur ulang Password Gagal!</h3>
    <i class="mdi mdi-do-not-disturb" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Pastikan link yang anda gunakan benar.
Silahkan menghubungi care@hanwhalife.co.id untuk informasi lebih lanjut</p>
    <?php
}else if($dataset['result_code'] == 3102){
    ?>
    <h3 class="h3influencer">Atur ulang password berhasil!</h3>
    <i class="mdi mdi-check" style="color: #ff7101; font-size: 120px;"></i>
    <p class="paraInfluencer">Password anda berhasil diubah. Silahkan coba login kembali menggunakan password baru </p>
    <?php
}
?>
    <a href="./forgot-password">&lt; BACK</a>
</div>