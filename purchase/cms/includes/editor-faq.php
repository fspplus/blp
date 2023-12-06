
        <form action="<?php get_base_url(); ?>/controller/newfaq" method="post" enctype="multipart/form-data" class="form-horizontal" id="formfaq">    
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
                                        <strong>Question</strong> Input
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <input type="text" id="text-input" name="faq_question" placeholder="Question" class="form-control" required>
                                                    <small class="form-text text-muted">Type in the question of the F.A.Q for Koreaversikamu</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Answer</strong> Input
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <textarea name="faq_answer" id="textarea-input" rows="25" placeholder="Content..." class="form-control"></textarea >
                                                </div>
                                            </div>
                                            <div class="card-footer" style="margin-bottom: 20px;"></div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">CSS Styles</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="faq_css" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
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
                                        <strong>Category</strong> Settings
                                    </div>
                                    <div class="card-body card-block">
                                        <div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Choose Category</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="faq_category" id="multiple-select"  class="form-control" multiple="" required>
                                                        <?php get_category(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group animated">
                                                <div class="col col-md-12">
                                                    <span id="addNew" class="animated btnHanwha">+ Add New Category</span>
                                                </div>
                                            </div>
                                            <div class="row form-group animated" id="newCategory">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">New Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="faq_category" placeholder="New Category" class="form-control inputNewCategory" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group animated">
                                                <div class="col col-md-12">
                                                    <span id="removeNew" class="animated btnHanwha">Remove</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="vendor/jquery-3.2.1.min.js"></script>
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
                                
                            </form>