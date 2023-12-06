function back(src, pldt){
    var url = "";
    $("#page-loader").css("display", "block");
    $("[class*='form']").addClass("fadeOutLeft");
    if(src == "frm1a"){
        url = "formaplikasi//form1.php";
        //$step = "/simulation";
        //$stepname = "Simulation";
    }else if(src == "frm2p"){
        url = "formaplikasi//form2.php";
        //$step = "/step-2";
        //$stepname = "Step 2";
    }else if(src == "frm3k"){
        url = "formaplikasi//form3.php";
        //$step = "/step-3";
        //$stepname = "Step 3";
    }else if(src == "frm4l"){
        url = "formaplikasi//form4.php";
        //$step = "/step-4";
        //$stepname = "Step 4";
    }else if(src == "frm5q"){
        url = "formaplikasi//form5.php";
        //$step = "/step-5";
        //$stepname = "Step 5";
    }
    setTimeout(function () {
        $.ajax({

         type: "GET",
         url: url,
         data: 'setplan='+pldt, // appears as $_GET['id'] @ your backend side
         success: function(dataSum) {
               // data is ur summary
                $("#page-loader").css("display", "none");
              $('.formloader').html(dataSum);
              $('html, body').animate({ scrollTop: 0 }, 0);
              //window.history.pushState($stepname, 'Title', $step);
         }

       });
    },1000);
}
function planfnc(data){
    
    $("#page-loader").css("display", "block");
    $("#form1").addClass("fadeOutLeft");
    setTimeout(function () {
        var plan = data;
        $.ajax({

         type: "GET",
         url: 'formaplikasi//form2.php',
         data: "setplan=" + plan, // appears as $_GET['id'] @ your backend side
         success: function(dataSum) {
               // data is ur summary
                $("#page-loader").css("display", "none");
              $('.formloader').html(dataSum);
                 $('html, body').animate({ scrollTop: 0 }, 0);
         }

       });
    },1000);
    
    
}
function planselector(data,plan){
    var planver = data;
    var plan = plan;
    
    $("#page-loader").css("display", "block");
    $("#form2").addClass("fadeOutLeft");
    setTimeout(function () {
        $.ajax({

         type: "GET",
         url: 'formaplikasi/form3.php',
         data: "setplan=" + planver + "&pl=" + plan, // appears as $_GET['id'] @ your backend side
         success: function(dataSum) {
               // data is ur summary
                $("#page-loader").css("display", "none");
              $('.formloader').html(dataSum);
                 $('html, body').animate({ scrollTop: 0 }, 0);
         }

       });
    },1000);
}
function plansubmituser(data,plan){
    var planver = data;
    var plan = plan;
    var txt = $(".txedit").val();
    if(txt > 0){
        $("#page-loader").css("display", "block");
        $("#form3").addClass("fadeOutLeft");
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'formaplikasi/form4.php',
             data: "setplan=" + planver + "&pl=" + plan, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $('.formloader').html(dataSum);
                 $('html, body').animate({ scrollTop: 0 }, 0);
             }

           });
        },1000);
    }else{
        alert('Harap isi semua form yang ada!');
    }
}
function loadKTP(){
    $(".sameaddr").change(function() {
        if(this.checked) {
            $("#page-loader").css("display", "block");
            $(".addrktp").addClass("fadeOutRight");
            setTimeout(function () {
                $.ajax({

                 type: "GET",
                 url: 'formaplikasi/form-ktpnot.php',
                 data: '', // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                       // data is ur summary
                $("#page-loader").css("display", "none");
                      $('.ktpRequired').html(dataSum);
                 }

               });
            },1000);
        }else{
            $("#page-loader").css("display", "block");
            $(".addrktp").addClass("fadeOutRight");
            $(".addrktp").css("height","0px");
            setTimeout(function () {
                $.ajax({

                 type: "GET",
                 url: 'formaplikasi/form-ktp.php',
                 data: '', // appears as $_GET['id'] @ your backend side
                 success: function(dataSum) {
                       // data is ur summary
                $("#page-loader").css("display", "none");
                      $('.ktpRequired').html(dataSum);
                 }

               });
            },1000);
        }
    });
}
function sameKTP(){
    $(".addrcheck").change(function() {
        if(this.checked) {
            $("#ktpaddr").hide();
            $("#city1KTP").removeAttr("required");
            $("#city2KTP").removeAttr("required");
            $("#postalKTP").removeAttr("required");
            $("#addr1KTP").removeAttr("required");
            $("#addr2KTP").removeAttr("required");
            $("#inputKotaKTP1").removeAttr("required");
            $("#inputKotaKTP2").removeAttr("required");
        }else{
            $("#ktpaddr").show();
            $("#city1KTP").prop('required',true);
            $("#city2KTP").prop('required',true);
            $("#postalKTP").prop('required',true);
            $("#addr1KTP").prop('required',true);
            $("#addr2KTP").prop('required',true);
            $("#inputKotaKTP1").prop('required',true);
            $("#inputKotaKTP2").prop('required',true);
        }
    });
}
function loadExtra(ctr){
        $("#page-loader").css("display", "block");
        var ctrOld = ctr-1;
        var extra = '.extrabenef'+ctrOld;
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'formaplikasi/form-extraben.php',
             data: "ctr=" + ctr, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $(extra).html(dataSum);
             }

           });
        },1000);
}
function addBenef(ctr){
        $("#page-loader").css("display", "block");
        var ctrOld = ctr;
        var extra = '#addBenef'+ctrOld;
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'view-purchase/view-beneficiary.php',
             data: "ctrbenef=" + ctr, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $(extra).html(dataSum);
             }

           });
        },1000);
}
function addBenefLogged(ctr){
        $("#page-loader").css("display", "block");
        var ctrOld = ctr;
        var extra = '#addBenef'+ctrOld;
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'view-purchase/view-beneficiary-logged.php',
             data: "show=ahliwaris&ahliwaris=exists&ctrbenef=" + ctr, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $(extra).html(dataSum);
             }

           });
        },1000);
}
function removeBenef(){
        $("#page-loader").css("display", "block");
        var ctrOld = $("#hanwhaTtlBenef").attr("value");
    //console.log(ctrOld);
        var extra = '#addBenef'+ctrOld;
    console.log(extra);
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'view-purchase/view-removebeneficiary.php',
             data: "logged=true&ctrbenef=" + ctrOld, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $(extra).html(dataSum);
             }

           });
        },1000);
}

function deleteAddBenef(){
        var ctrs = 0;
        $("input[type=hidden][name=ctrs]").each(function() {
            ctrs++;
        });
        var clickNew = ctrs - 1;
        $("#page-loader").css("display", "block");
        var extra = '.extrabenef'+clickNew;
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'formaplikasi/form-tambahbenef.php',
             data: "ctr=" + clickNew, // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $(extra).html(dataSum);
             }

           });
        },1000);
}

function selectPayment(){
        $("#page-loader").css("display", "block");
        $("#form5").addClass("fadeOutLeft");
        setTimeout(function () {
            $.ajax({

             type: "GET",
             url: 'formaplikasi/form6.php#top',
             data: '', // appears as $_GET['id'] @ your backend side
             success: function(dataSum) {
                   // data is ur summary
                $("#page-loader").css("display", "none");
                  $('.formloader').html(dataSum);
                 $('html, body').animate({ scrollTop: 0 }, 0);
             }

           });
        },1000);
}

function showmenu() {
    var menu3 = document.getElementById("menu3");
    var mobile = document.getElementById("mobile");

    menu3.classList.add("hide");
    mobile.classList.remove("hide");
}

function hidemenu() {
    var menu3 = document.getElementById("menu3");
    var mobile = document.getElementById("mobile");

    menu3.classList.remove("hide");
    mobile.classList.add("hide");
}

function showB() {
    var btn3a = document.getElementById("btn3a");
    var btn3b = document.getElementById("btn3b");
    var profile1 = document.getElementById("profile1");
    var profile2 = document.getElementById("profile2");

    btn3a.classList.remove("white");
    btn3b.classList.remove("white");

    profile1.classList.remove("hide");
    profile2.classList.remove("hide");

    btn3a.classList.add("white");
    profile1.classList.add("hide");
}

function showA() {
    var btn3a = document.getElementById("btn3a");
    var btn3b = document.getElementById("btn3b");
    var profile1 = document.getElementById("profile1");
    var profile2 = document.getElementById("profile2");

    btn3a.classList.remove("white");
    btn3b.classList.remove("white");

    profile1.classList.remove("hide");
    profile2.classList.remove("hide");

    btn3b.classList.add("white");
    profile2.classList.add("hide");
}
function contSDKB(){
    var btnskdb = document.getElementById("contskdb");
    var btnilustrasi = document.getElementById("backillust");
    var skdb = document.getElementById("sdkb");
    var ilustrasi = document.getElementById("ilustrasi");
    
    btnskdb.classList.add("animate");
    btnskdb.classList.add("fadeOutLeft");
    ilustrasi.classList.add("animate");
    ilustrasi.classList.add("fadeOutLeft");
    
    btnilustrasi.classList.add("animate");
    btnilustrasi.classList.add("fadeInRight");
    skdb.classList.add("animate");
    skdb.classList.add("fadeInRight");
}
function backilust(){
    var btnskdb = document.getElementById("contskdb");
    var btnilustrasi = document.getElementById("backillust");
    var skdb = document.getElementById("sdkb");
    var ilustrasi = document.getElementById("ilustrasi");
    
    btnskdb.classList.add("animate");
    btnskdb.classList.add("fadeInRight");
    ilustrasi.classList.add("animate");
    ilustrasi.classList.add("fadeInRight");
    
    btnilustrasi.classList.add("animate");
    btnilustrasi.classList.add("fadeOutLeft");
    skdb.classList.add("animate");
    skdb.classList.add("fadeOutLeft");
}
function openTab(evt, idname) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("block");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(idname).style.display = "flex";
    evt.currentTarget.className += " active";
}

function getKTP(){
    var filektp = document.getElementById("filektp").files[0].name;
    document.getElementById("txtktp").innerHTML = filektp;
}
