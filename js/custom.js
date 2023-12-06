$(document).ready(function(){

    $(".new-purchase").on("click", function(e){
        window.location.href="../product-page/#purchase";
    })
  $("form").on("submit", function(){
    $("#page-loader").show();
  });//submit
});
$("input[type='tel']").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

$( "#menuproLog" ).click(
  function() {
    $(".menuListSub").addClass("holdListSub");
    $(".menuListSub").show();
  }
);
$( ".row" ).click(
  function() {
    $(".menuListSub").hide();
    $(".menuListSub").removeClass("holdListSub");
  }
);


function autocomplete(inp, inpholder, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inpholder.value = this.getElementsByTagName("input")[0].value;
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
            console.log(val);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
if($("#data-city").length){
    var textCities = document.getElementById("data-city").innerHTML;
    var parsedTest = JSON.parse(textCities);

/*An array containing all the country names in the world:*/
//var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
var countries = parsedTest;
}else{
    var countries = ["null"];
}

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
if($("#myInput").length){
autocomplete(document.getElementById("myInput"), document.getElementById("inputKotaLahir"), countries);
}
if($("#addressCity").length){
autocomplete(document.getElementById("addressCity"), document.getElementById("inputKotaAlamat"), countries);
}

$(function() {
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          /*$('html, body').animate(
            {scrollTop: $(hash).offset().top}, 800, function(){
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            }
          );*/
        } // End if
      });
        
        $(".cblk").on('click', function(e){
            $(".cblk").removeClass("active")
            $(this).addClass("active");
            var ider = "#"+$(this).data("id");
            $(".profilecards").removeClass("profile-active");
            $(ider).addClass("profile-active");
        })
        
    });
    // disable mousewheel on a input number field when in focus
    // (to prevent Cromium browsers change the value when scrolling)
    $('form').on('focus', 'input[type=number]', function (e) {
      $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault()
      })
    })
    $('form').on('blur', 'input[type=number]', function (e) {
      $(this).off('mousewheel.disableScroll')
    })
    
    $(function() {
        $(".preloader").fadeOut();
    });

    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 70;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
            $(".sidebartoggler i").addClass("ti-menu");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
            //$(".sidebartoggler i").removeClass("ti-menu");
        }

        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);

    // topbar stickey on scroll
    //$(".fix-header .topbar").stick_in_parent({});

    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function() {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".sidebartoggler").on('click', function() {
        //$(".sidebartoggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
    });

    // ============================================================== 
    // Auto select left navbar
    // ============================================================== 
    $(function() {
        var url = window.location;
        var element = $('ul#sidebarnav a').filter(function() {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().addClass('active');
            } else {
                break;
            }
        }
    });
    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        // ============================================================== 
        // Sidebarmenu
        // ============================================================== 
    $(function() {
        //$('#sidebarnav').metisMenu();
    });
    // ============================================================== 
    // Slimscrollbars
    // ============================================================== 
    /*$('.scroll-sidebar').slimScroll({
        position: 'left',
        size: "5px",
        height: '100%',
        color: '#dcdcdc'
    });*/
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
});

$(document).ready(function(){
    //button click registration form
    $(".contForm2").click(function(){
        $(".form-1").addClass("hideForm");
        $(".form-1").removeClass("showForm");
        $(".form-2").removeClass("hideForm");
        $(".form-2").addClass("showForm");
    });
    $(".contForm1").click(function(){
        $(".form-2").addClass("hideForm");
        $(".form-2").removeClass("showForm");
        $(".form-1").removeClass("hideForm");
        $(".form-1").addClass("showForm");
    });
    $('.checklimitone').on('change', function() {
       $('.checklimitone').not(this).prop('checked', false);
    });
    $(document).ajaxStart(function(){
        $("#page-loader").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#page-loader").css("display", "none");
    });
    $("#data-tertanggung").submit(function(e) {
        e.preventDefault();
    });
    
    $(".percentage").keyup(function(){
        $("input").css("background-color", "pink");
    });
    
    $('.percentage').on("change", function(){
        var total = 0;
        console.log("Change percentage!");
        $('.percentage').each(function(){
           total += parseInt($(this).val());
        });
        if(total < 100){
            console.log('Total Persentase tidak sampai 100%!');
            $('input[type=submit]').attr("dissabled","dissabled");
        }else if(total > 100){
            console.log('Total Persentase melebihi 100%!');
            $('input[type=submit]').attr("dissabled","dissabled");
        }else if(total == 100){
            console.log("100!");    
            $('input[type=submit]').removeAttr("dissabled");
        }
    });
});

$(document).on("keyup", ".percentageNew", function() {
    var sum = 0;
    $(".percentageNew").each(function(){
        sum += +$(this).val();
    });
    if(sum < 100){
        $('.limit').html("Jumlah persentase tidak sampai 100%!");
        $(".limit").css("opacity", '1');
        $('input[type=submit]').attr("disabled","disabled");
    } else if(sum > 100){
        $('.limit').html("Jumlah persentase melebihi 100%!");
        $(".limit").css("opacity", '1');
        $('input[type=submit]').attr("disabled","disabled");
    }else if(sum == 100){
        $('.limit').html("");
        $(".limit").css("opacity", '0');
        $('input[type=submit]').removeAttr("disabled");
    }
});

            function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".percentage").each(function() {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    }
                    else if (this.value.length != 0){
                        $(this).css("background-color", "red");
                    }
                });

                if(sum < 100){
                    $('.warning').html("Jumlah persentase tidak sampai 100%!");
                    $(".warning").css("opacity", '1');
                    $('input[type=submit]').attr("disabled","disabled");
                    $('.submitform4btn').removeAttr("id");
                } else if(sum > 100){
                    $('.warning').html("Jumlah persentase melebihi 100%!");
                    $(".warning").css("opacity", '1');
                    $('input[type=submit]').attr("disabled","disabled");
                    $('.submitform4btn').removeAttr("id");
                }else if(sum == 100){
                    $('.warning').html("");
                    $(".warning").css("opacity", '0');
                    $('input[type=submit]').removeAttr("disabled");
                    $('.submitform4btn').attr('id', 'submitbtn');
                }
                console.log(sum);
                console.log("running");
            }

    function counterbenef(){
        var len = $("input[type=checkbox]:checked").length;
        var counter = len+1;
	    $('.addextra').attr('onclick', 'loadExtra('+counter+')');
        $('#extrabenefDefault').addClass('extrabenef'+counter);
    }

$(document).on("click",".acchead", function () {
	var acc = $(this);
    var all = $(".acchead");
    var allPlus = all.find(".plus");
    var allMinus = all.find(".minus");
	var plus = $(this).find('.plus');
    var minus = $(this).find('.minus');

    var panel = $('.accbody');
    if (acc.hasClass("active")){
        //console.log(acc.text());
        acc.next(".accbody").addClass("hide");
        //acc.closest('div').find('.accbody').addClass("hide");
  		//panel.addClass("hide");
    	acc.removeClass("active");
        minus.removeClass("fadeIn");
    	minus.addClass('fadeOut');
    	plus.removeClass('fadeOut');
    	plus.addClass('fadeIn');
    } else {
        //acc.closest('div').find('.accbody').removeClass("hide");
        //acc.next(".accbody").removeClass("hide");
        //console.log(acc.next(".accbody").text());
        panel.addClass("hide");
        acc.next(".accbody").removeClass("hide");
        all.removeClass("active");
        allPlus.removeClass("fadeOut");
        allMinus.removeClass("fadeIn");
    	//panel.removeClass("hide");
    	acc.addClass("active");
    	plus.removeClass('fadeIn');
    	plus.addClass('fadeOut');
    	minus.removeClass('fadeOut');
    	minus.addClass('fadeIn');

        $('body').animate({
            scrollTop: $(".accbody").offset().top
        }, 1000);
    } 
});

$(document).ready(function(){
    
    $( function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		});
        
        $(function() {
             // Get the form.
             var form = $('#formlogin');

             // Get the messages div.
             var formMessages = $('#form-messages');

             // TODO: The rest of the code will go here...

             $(form).submit(function(event) {
                 // Stop the browser from submitting the form.
                 event.preventDefault();
                 // TODO
                 // Serialize the form data.
                 $("#page-loader").css("display", "block");
                 var formData = $(form).serialize();
                 $.ajax({
                     type: 'POST',
                     method: 'POST',
                     url: "../controller/login-proc.php",
                     data: form.serialize(),
                     success: function(dataSum) {
                            // data is ur summary
                           $('.scriptloader').html(dataSum);
                            $("#page-loader").css("display", "none");
                      }
                 })
             });

         });

    $(function() {
             // Get the form.
             var form = $('#formloginpurch');

             // Get the messages div.
             var formMessages = $('#form-messages');

             // TODO: The rest of the code will go here...

             $(form).submit(function(event) {
                 // Stop the browser from submitting the form.
                 event.preventDefault();
                 // TODO
                 // Serialize the form data.
                 $("#page-loader").css("display", "block");
                 var formData = $(form).serialize();
                 console.log(formData);
                 $.ajax({
                     type: 'POST',
                     method: 'POST',
                     url: "../purchase/controller/login-purchase.php",
                     data: form.serialize(),
                     success: function(dataSum) {
                            // data is ur summary
                           $('.otpnotif').html(dataSum);
                            $("#page-loader").css("display", "none");
                      }
                 })
             });

         });

         $(function() {
            // Get the form.
            var form = $('#formloginpurchOTP');

            // Get the messages div.
            var formMessages = $('#form-messages');

            // TODO: The rest of the code will go here...

            $(form).submit(function(event) {
                // Stop the browser from submitting the form.
                event.preventDefault();
                // TODO
                // Serialize the form data.
                $("#page-loader").css("display", "block");
                var formData = $(form).serialize();
                $.ajax({
                    type: 'POST',
                    method: 'POST',
                    url: "../controller/login-purchase.php",
                    data: form.serialize(),
                    success: function(dataSum) {
                           // data is ur summary
                          $('.scriptloader').html(dataSum);
                           $("#page-loader").css("display", "none");
                     }
                })
            });

        });

    
    $('#search_text').keyup(function(e){

        var search = $(this).val();
        if(search != ''){
            $('#searchResult').removeClass("hide");
            $.ajax({
                url:"../faqsearch.php",
                method:"get",
                data:{query:search},
                success:function(data){
                    $('#searchResult').html(data);
                }
            });

            $(".acchead").addClass("hide");
            $(".accbody").addClass("hide");
        }else{
            $('#searchResult').addClass("hide");
            $(".acchead").removeClass("hide").removeClass("active");
            $(".acchead").find('.plus').removeClass('fadeOut').addClass('fadeIn');
        }
    });

    $(document).on("click","#mmenu2", function () {
        var menu = $(this);
        var plus = $(this).find('.plus');
        var minus = $(this).find('.minus');
        var submenu = $('#mmenu2-sub');

        if (menu.hasClass("active")){
            submenu.addClass("hide");
            menu.removeClass("active");
            minus.removeClass("fadeIn");
            minus.addClass('fadeOut');
            plus.removeClass('fadeOut');
            plus.addClass('fadeIn');
        } else {
            submenu.removeClass("hide");
            menu.addClass("active");
            plus.removeClass('fadeIn');
            plus.addClass('fadeOut');
            minus.removeClass('hide');
            minus.removeClass('fadeOut');
            minus.addClass('fadeIn');
        } 
    });
});

    $(function(){
        var tableselector = $('.table-selector');
        
        tableselector.click(function(){
            $('.table-selector').removeClass("active-selector");
            $(this).addClass("active-selector");
            var classlogger = "#"+$(this).data("val");
            console.log(classlogger);
            $(".table-content").addClass("table-noshow");
            $(classlogger).removeClass("table-noshow");
        });
    });
    $(function(){
        var tableselector = $('.table-selector2');
        
        tableselector.click(function(){
            $('.table-selector2').removeClass("active-selector");
            $(this).addClass("active-selector");
            var classlogger = "#"+$(this).data("val");
            console.log(classlogger);
            $(".table-content2").addClass("table-noshow");
            $(classlogger).removeClass("table-noshow");
        });
    });
var profilePic = document.getElementById('uploadKTP'); /* finds the input */

function changeLabelText() {
    var profilePicValue = profilePic.value; /* gets the filepath and filename from the input */
    var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
    profilePicValue = profilePicValue.substr(fileNameStart + 1); /* isolates the filename */
    var profilePicLabelText = document.getElementById("labelKTP"); /* finds the label text */
    if (profilePicValue !== '') {
        profilePicLabelText.textContent = profilePicValue; /* changes the label text */
    }
}
if($("#uploadKTP").length){
profilePic.addEventListener('change',changeLabelText,false); /* runs the function whenever the filename in the input is changed */
}



$('#workselector').on('change', function() {
    if(this.value == "Job7" || this.value == "Job20"){
        $("#hanwhaposition").prop("required",true);
        $("#hanwhaposition").prop("disabled",false);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",false);
        $("#hanwhasector").prop("disabled",true);
    }
    else if(this.value == "Job8" || this.value == "Job19"){
        $("#hanwhaposition").prop("required",false);
        $("#hanwhaposition").prop("disabled",true);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",true);
        $("#hanwhasector").prop("disabled",false);
    }
    else if(this.value == "Job23"){
        $("#hanwhaposition").prop("required",true);
        $("#hanwhaposition").prop("disabled",false);
        $("#hanwhacompanyname").prop("required",true);
        $("#hanwhacompanyname").prop("disabled",false);
        $("#hanwhasector").prop("required",true);
        $("#hanwhasector").prop("disabled",false);
    }else{
        
        $("#hanwhaposition").prop("required",false);
        $("#hanwhaposition").prop("disabled",true);
        $("#hanwhacompanyname").prop("required",false);
        $("#hanwhacompanyname").prop("disabled",true);
        $("#hanwhasector").prop("required",false);
        $("#hanwhasector").prop("disabled",true);
    }
});


    $(".active-faq").click(function(){
        alert("active!");
        $(".inside-faq", this).css("height","0px");
        $(".inside-faq", this).css("padding","0px");
        $(this).removeClass("active-faq");
    });
    $(".wrapper-faq:not(active-faq)").click(function(){
        $(".inside-faq", this).css("height","auto");
        $(".inside-faq", this).css("padding","10px");
        $(this).addClass("active-faq");
    });



    $("#ref_table").DataTable({
        "searching": false,
        "lengthChange": false
    });