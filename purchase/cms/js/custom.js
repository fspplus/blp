$( '#selectall' ).click( function () {
    $( '.selectObject' ).prop('checked', this.checked)
  })
$("#ifrm").remove();
console.log("#ifrm removed");

$("#ui-datepicker-div .ui-datepicker-header .ui-corner-all").attr("href","#!");
$(".ui-corner-all").addClass("chosen-single");

var baseUrl = "https://koreaversikamu.co.id/cms/";
$(".headercmas li a").click(function(){
    $(".headercms li").removeClass("active");
    $(".headercms a").removeClass("activeLink");
    $(this).addClass("activeLink");
    var url = "";
    var flex = $(this).attr("data-flex"); 
    //alert($(this).attr("data-flex"));
    if(flex == "main"){
        url = "main.php";
    }
    else{
        url = "editor.php?page="+$(this).attr("data-flex");
    }
            $("#pagecontainer .main-content").fadeOut( "slow", function() {
                // Animation complete.
            });;
    $.ajax({
        type: 'POST',
        url: url,
        processData:false,
        contentType:false,
        success: function(dataSum) {
            // data is ur summary
            $('#pagecontainer').html(dataSum);
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            $("#pagecontainer .main-content").fadeIn( "slow", function() {
                // Animation complete.
            });;
        }
    })
})
$('.animsition').fadeIn("slow", function(){
    $('.animsition').css("opacity", "1");
});
$("#newCategory").hide();
$("#removeNew").hide();
$("#addNew").click(function(){
   $("#multiple-select").removeAttr("required");
    $(".inputNewCategory").prop("required", true);
    $(".inputNewCategory").prop("disabled", false);
    $("#newCategory").removeClass("fadeOut");
    $("#newCategory").addClass("fadeIn");
    $("#removeNew").removeClass("fadeOut");
    $("#removeNew").addClass("fadeIn");
    
    $("#addNew").removeClass("fadeIn");
    $("#addNew").addClass("fadeOut");
    $("#addNew").hide();
    $("#newCategory").show();
    $("#removeNew").show();
});
$("#removeNew").click(function(){
    $("#removeNew").hide();
    $(".inputNewCategory").removeAttr("required");
    $(".inputNewCategory").prop("disabled", true);
    $("#multiple-select").prop("required", true);
    $("#addNew").removeClass("fadeOut");
    $("#addNew").addClass("fadeIn");
    $("#newCategory").removeClass("fadeIn");
    $("#newCategory").addClass("fadeOut");
    $("#newCategory").hide();
    $("#addNew").removeClass("fadeOut");
    $("#addNew").addClass("fadeIn");
    $("#addNew").show();
});
$(".switch-input").click(function(){
    console.log("switch click!");
    var val = $(this).attr("data-select");
    var type = $(this).attr("data-type");
    var url = baseUrl+"/controller/switchactivation.php?id="+val+"&type="+type;
    $.ajax({
        type: 'POST',
        url: url,
        processData:false,
        contentType:false,
        success: function(dataSum) {
            // data is ur summary
            //$('#pagecontainer').html(dataSum);
            if($(this).attr("data-stat") == 'active'){
               $( '.activeSpan'+val ).html("Active1");
            }else if($(this).attr("data-stat") == "inactive"){
               $('.activeSpan'+val).html("Active2");
            }
            console.log('.activeSpan'+val);
            //$('html, body').animate({ scrollTop: 0 }, 'slow');
            $('.notifLine').html(dataSum);
            $("#pagecontainer .main-content").fadeIn( "slow", function() {
                // Animation complete.
            });;
        }
    })
})
/*$(".navbar-mobiles").hide();
$(".hamoff").on('click',function(){
    $(".navbar-mobiles").toggle("fast");
})*/

$(".sidebar-mobile").hide();
$(".hamoff").on('click',function(){
    $(".sidebar-mobile").toggle("fast");
})

function back() {
  window.history.back();
}
function confirm_delete() {
  var confirms = confirm('Delete this post?');
  if(!confirms){
      this.preventDefault();
  }
}