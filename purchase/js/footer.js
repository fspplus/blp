               $(function() {
                    // Get the form.
                    var form = $('#formAll');

                    // Get the messages div.

                    // TODO: The rest of the code will go here...
                    $(form).submit(function(event) {
                        var isFormValid = true;

                        $("input:not(.addrline2)").each(function(){
                            if ($.trim($(this).val()).length == 0){
                                $(this).addClass("highlight");
                                isFormValid = false;
                            }
                            else{
                                $(this).removeClass("highlight");
                            }
                        });

                        if (!isFormValid) {
                            alert("Please fill in all the required input!");
                        }else{
                            // TODO
                            // Serialize the form data.
                            $("#page-loader").css("display", "block");
                            
                            var files = $("#inputfoto")[0].files;
                            
                            var formData = $(form).serializeArray();
                            var formArrayData = new FormData();
                            
                            for(var i = 0; i < files.length; i++){
                                formArrayData.append("portrait", files[i]);
                            }
                            $(formData).each(function(index,element){
                                formArrayData.append(element.name, element.value);
                            })
                            
                            $.ajax({
                                type: 'POST',
                                url: $(form).attr('action'),
                                data: formArrayData,
                                processData:false,
                                contentType:false,
                                success: function(dataSum) {
                                       // data is ur summary
                                      $("#page-loader").css("display", "none");
                                      $('.formloader').html(dataSum);
                                      $('html, body').animate({ scrollTop: 0 }, 'slow');
                                 }
                            })
                        }
                        // Stop the browser from submitting the form.
                        event.preventDefault();
                        
                    });
                    
                });