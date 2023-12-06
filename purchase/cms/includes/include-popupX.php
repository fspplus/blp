<?php
    error_reporting(E_ALL & ~E_NOTICE);
    $limitpage = 10;
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    $startpage = ($page>1) ? ($page * $limitpage) - $limitpage : 0;
    $pre_tab = mysqli_query($conn, "SELECT * FROM `popup_table`");
    $tab_active = mysqli_query($conn, "SELECT * FROM `popup_table` WHERE popup_status LIKE 'active'");
    $tab_inactive = mysqli_query($conn, "SELECT * FROM `popup_table` WHERE popup_status LIKE 'inactive'");
    $total = mysqli_num_rows($pre_tab);
    $total_a = mysqli_num_rows($tab_active);
    $total_i = mysqli_num_rows($tab_inactive);
    
    $status = $_GET['status'];
    if ($status == "all" || $status == "") {
        $pages = ceil($total/$limitpage);
    }if ($status == "active") {
        $pages = ceil($total_a/$limitpage);
    }if ($status == "inactive") {
        $pages = ceil($total_i/$limitpage);
    }
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="notifLine col-lg-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 style="display: inline-block;">Pop Up Management</h2>
                                <div style="display: inline-block;" class="btnDiv"><a href="<?php get_base_url(); ?>popup?stat=newpost" class="btnAddNew">Add New</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1half marginbottom20px col-all">
                                <a href="?status=all" id="all" class="btnHanwha btntab">All (<span><?php echo $total; ?></span>)</a>
                            </div>
                            <div class="col-lg-1half marginbottom20px col-act">
                                <a href="?status=active" id="act" class="btnHanwha btntab">Active (<span><?php echo $total_a; ?></span>)</a>
                            </div>
                            <div class="col-lg-1half marginbottom20px col-ict">
                                <a href="?status=inactive" id="ict" class="btnHanwha btntab">Inactive (<span><?php echo $total_i; ?></span>)</a>
                            </div>
                            <div class="col-lg-7 text-right">
                                <span>Page: </span>
                                <?php
                                    $currpage = $_GET['page'];
                                    if ($currpage == "") {
                                        $currpage = 1;
                                    }

                                    $prev_page = $currpage - 1;
                                    $next_page = $currpage + 1;

                                    if($currpage>1){
                                        // ********** show the previous page
                                        echo "<a href='?status={$status}&page={$prev_page}' title='Previous Page: {$prev_page}' class='btnpage'> < </a>";

                                        if ($currpage != 2) {
                                            // ********** show the first page
                                            echo "<a href='?status={$status}&page=1' title='First Page' class='btnpage'> 1 </a>";
                                            if ($currpage !=3) {
                                                echo "<span class='pagedot'>. . .</span>";
                                            }
                                        }
                                    }

                                    if ($currpage != 1) {
                                        ?><a id="page<?php echo $prev_page;?>" class="btnpage" href="?status=<?php echo $status; ?>&page=<?php echo $prev_page; ?>"><?php echo $prev_page; ?> </a><?php
                                    }
                                    ?>
                                    <a id="page<?php echo $currpage;?>" class="btnpage" href="?status=<?php echo $status; ?>&page=<?php echo $currpage; ?>"><?php echo $currpage; ?> </a>
                                    <?php
                                    if ($currpage != $pages) {
                                        ?><a id="page<?php echo $next_page;?>" class="btnpage" href="?status=<?php echo $status; ?>&page=<?php echo $next_page; ?>"><?php echo $next_page; ?> </a><?php
                                    }

                                    /*for ($i=1; $i<=$pages ; $i++){ ?>
                                        <a id="page<?php echo $i;?>" class="btnpage" href="?status=<?php echo $status; ?>&page=<?php echo $i; ?>"><?php echo $i; ?> </a>
                                    <?php }*/

                                    if ($currpage != "") {
                                        ?><script>
                                            $(function(){
                                                $('#page<?php echo $currpage;?>').addClass("active");
                                            });
                                        </script><?php
                                    }else{
                                        ?><script>
                                            $(function(){
                                                $('#page1').addClass("active");
                                            });
                                        </script><?php
                                    }

                                    if($currpage<$pages){                               
                                        if ($currpage != $pages-1) {
                                            if ($currpage != $pages-2) {
                                                echo "<span class='pagedot'>. . .</span>";
                                            }
                                            // ********** show the last page
                                            echo "<a href='?status={$status}&page={$pages}' title='Last Page: {$pages}' class='btnpage'> {$pages} </a>";
                                        }

                                        // ********** show the next page
                                        echo "<a href='?status={$status}&page={$next_page}' title='Next Page: {$next_page}' class='btnpage'> > </a>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Popup ID</th>
                                                <th>Title</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if ($status == "all" || $status == "") {
                                                    $sql = "SELECT * FROM `popup_table` LIMIT $startpage, $limitpage";
                                                    ?><script>
                                                        $(function(){
                                                            $('#all').addClass("active");
                                                        });
                                                    </script><?php
                                                }if ($status == "active") {
                                                    $sql = "SELECT * FROM `popup_table` WHERE popup_status LIKE 'active' LIMIT $startpage, $limitpage";
                                                    ?><script>
                                                        $(function(){
                                                            $('#act').addClass("active");
                                                        });
                                                    </script><?php
                                                }if ($status == "inactive") {
                                                    $sql = "SELECT * FROM `popup_table` WHERE popup_status LIKE 'inactive' LIMIT $startpage, $limitpage";
                                                    ?><script>
                                                        $(function(){
                                                            $('#ict').addClass("active");
                                                        });
                                                    </script><?php
                                                }

                                                $query = mysqli_query($conn,$sql);
                                                $no = $startpage + 1;
                                                while($data = mysqli_fetch_array($query)){
                                                    $no++;
                                                    if($data['popup_status'] == "active"){
                                                        $stats = "<label id='switchLabel' class='switch switch-3d switch-success mr-3'><input type='checkbox' id='switch-input' class='switch-input' checked='true' data-type='popup' data-stat='active' data-select='".$data['popup_id']."'><span class='switch-label'></span><span class='switch-handle'></span></label>";
                                                    }else{
                                                        $stats = "<label id='switchLabel' class='switch switch-3d switch-success mr-3'><input type='checkbox' id='switch-input' class='switch-input' data-type='popup' data-stat='inactive' data-select='".$data['popup_id']."'><span class='switch-label'></span><span class='switch-handle'></span></label>";
                                                    }
                                                    
                                                    $data['popup_img'] = substr($data['popup_img'], 2);
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $data['popup_id']; ?></td>
                                                <td><img src="<?php echo $data['popup_img']; ?>" width="150px" class="col-lg-4"><div class="divCmsContent col-lg-8"><?php echo $data['popup_title'] ?><br><div class="selectionMenu"><a href="<?php get_base_url(); ?>popup?stat=edit&post=<?php echo $data['popup_id']; ?>">Edit</a> | <a href="<?php get_base_url(); ?>popup?stat=delete&post=<?php echo $data['popup_id']; ?>" onclick="return confirm_delete()">Delete</a></div></div></td>
                                                <td><?php echo $data['start_date'] ?></td>
                                                <td><?php echo $data['start_date'] ?></td>
                                                <td><?php echo $stats; ?><br><?php echo $data['last_edit']; ?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <?php //include "footer.php"; ?>