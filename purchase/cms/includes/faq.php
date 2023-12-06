            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="notifLine col-lg-12"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 style="display: inline-block;">FAQ Management</h2>
                                <div style="display: inline-block;" class="btnDiv"><a href="<?php get_base_url(); ?>faq?stat=newpost" class="btnAddNew">Add New</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 marginbottom20px">
                                <a href="">Active (<span>13</span>)</a>
                            </div>
                            <div class="col-lg-2 marginbottom20px">
                                <a href="">Inactive (<span>13</span>)</a>
                            </div>
                            <div class="col-lg-8 text-right">Page: 1 2 3</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM `faq_table` ORDER BY `faq_table`.`faq_id` DESC";
                                                $query = mysqli_query($conn,$sql);
                                                while($data = mysqli_fetch_array($query)){
                                                    if($data['faq_status'] == "active"){
                                                        $stats = "<label id='switchLabel' class='switch switch-3d switch-success mr-3'><input type='checkbox' id='switch-input' class='switch-input' checked='true' data-type='faq' data-stat='active' data-select='".$data['faq_id']."'><span class='switch-label'></span><span class='switch-handle'></span></label>";
                                                    }else{
                                                        $stats = "<label id='switchLabel' class='switch switch-3d switch-success mr-3'><input type='checkbox' id='switch-input' class='switch-input' data-type='faq' data-stat='inactive' data-select='".$data['faq_id']."'><span class='switch-label'></span><span class='switch-handle'></span></label>";
                                                    }
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['faq_category']; ?></td>
                                                    <td><?php echo $data['faq_question']; ?><br><div class="selectionMenu"><a href="<?php get_base_url(); ?>faq?stat=edit&post=<?php echo $data['faq_id']; ?>">Edit</a> | <a href="<?php get_base_url(); ?>faq?stat=delete&post=<?php echo $data['faq_id']; ?>" onclick="return confirm_delete()">Delete</a></div></td>
                                                    <td><?php echo $data['faq_answers']; ?></td>
                                                    <td><?php echo $stats; ?><br><?php echo $data['faq_date']; ?></td>
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