
        <form action="<?php get_base_url(); ?>/controller/newpop" method="post" enctype="multipart/form-data" class="form-horizontal" id="formfaq">    
        <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row formloader">
                            <div class="col-lg-12">
                                <clicker onclick="back()" class="clicker">&lt; back</clicker>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Popup</strong> Title
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <input type="text" id="text-input" name="popup_title" placeholder="Title" class="form-control" required>
                                                    <small class="form-text text-muted">Type in the title for this popup.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Set Image</strong> Input
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12" >
                                                    <input type="file" name="popup_img" onchange="readURL(this);">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12" style="margin:auto;">
                                                    <div id="imgPreview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                                            
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-footer text-right">
                                        <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                                            
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Date</strong> Range
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <span>Start Date</span>
                                                    <input type="text" class="daterpick form-control" id="from" placeholder="Start Date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <span>End Date</span>
                                                    <input type="text" class="daterpick form-control" id="to" placeholder="End Date" name="end_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: none;">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">New Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="faq_category" placeholder="New Category" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Choose Category</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="faq_category" id="multiple-select"  class="form-control" multiple="">
                                                        <?php get_category(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="vendor/jquery-3.2.1.min.js"></script>
                            <script type="text/javascript">
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#imgPreview').html('<img src="'+e.target.result+'" style="max-height: 250px; object-fit: contain !important;">');
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <!--<script>
                               $(function() {
                                   console.log('function-starts');
                                    // Get the form.
                                    var form = $('#formfaq');

                                    // Get the messages div.
                                    //var formMessages = $('#form-messages');

                                    // TODO: The rest of the code will go here...
                                    $(form).submit(function(event) {
                                        console.log("click!");
                                        // Stop the browser from submitting the form.
                                        //event.preventDefault();

                                        // TODO
                                        // Serialize the form data.
                                        var formData = $(form).serialize();
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php get_base_url(); ?>controller/upfaq.php',
                                            data: formData,
                                            success: function(dataSum) {
                                                   // data is ur summary
                                                  $('.formloader').html(dataSum);
                                                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                                             }
                                        })
                                    });

                                });
                            </script>-->
                            
                        </div></div></div></div>
                            </form>