<?php
include '../header.php';
$data_keuangan=get_wparticles_categories(107);
$data_liburan=get_wparticles_categories(106);
$data_tren=get_wparticles_categories(108);
?>
<div style='padding-top: 6%;'></div>
<div class="row">
    <div class="col-8">
        <?php get_wparticles_detail();?>
    </div>
    <div class="col-4">
        <div>
            <h4>Keuangan</h4>
            <div class="list-group">
            <?php
            foreach($data_keuangan as $row){
                echo '<a href="'.'http://uat.koreaversikamu.co.id/articles/'.$row['slug'].'.html" class="list-group-item list-group-item-action flex-column">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">'.$row['title']['rendered'].'</h5>
                    <small><small>'.date('d M Y', strtotime($row['date_gmt'])).'</small></small>
                  </div>
                  <p class="mb-1"><small>'.substr(strip_tags($row['content']['rendered']),0,100).'...</small></p>
                </a>';
                //echo '<li>'.$row['title']['rendered'].'</li>';
            }?>
            </div>
            <br/>
            <h4>Liburan</h4>
            <div>
            <?php foreach($data_liburan as $row){
                echo '<a href="'.'http://uat.koreaversikamu.co.id/articles/'.$row['slug'].'.html" class="list-group-item list-group-item-action flex-column">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">'.$row['title']['rendered'].'</h5>
                    <small><small>'.date('d M Y', strtotime($row['date_gmt'])).'</small></small>
                  </div>
                  <p class="mb-1"><small>'.substr(strip_tags($row['content']['rendered']),0,100).'...</small></p>
                </a>';
            }?>
            </div>
            <br/>
            <h4>Tren</h4>
            <div>
            <?php foreach($data_tren as $row){
                echo '<a href="'.'http://uat.koreaversikamu.co.id/articles/'.$row['slug'].'.html" class="list-group-item list-group-item-action flex-column">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">'.$row['title']['rendered'].'</h5>
                    <small><small>'.date('d M Y', strtotime($row['date_gmt'])).'</small></small>
                  </div>
                  <p class="mb-1"><small>'.substr(strip_tags($row['content']['rendered']),0,100).'...</small></p>
                </a>';
            }?>
            </div>
        </div>
    </div>
</div>
<?php
include '../footer.php';
?>