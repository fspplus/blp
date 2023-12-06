$(document).ready(function(){

    
    $('.pcode').keypress(function() {
        if (this.value.length >= 5) {
            return false;
        }
    });
    $('.phone').keypress(function() {
        if (this.value.length >= 13) {
            return false;
        }
    });
    //EmailAddress
	$('#verifyemail').hide();
	$('#otpemail').hide();
    $('#txtotp').hide();

    $('#indivPayor').hide();

    //MobilePhone
    $('#verifyphone').hide();
	$('#otpphone').hide();
    $('#txtotpphone').hide();

    
	var emailOri = $('#txtemailori').val();
    var emailInput = $('#txtemail').val();
    var phoneori = 	$('#txtphoneori').val();
    var phoneInput = $('#mobilePhone').val();

    var valid = $('#txtvalid').val();
    var validphone = $('#txtvalidphone').val();
    
    $('.messageblock').css("color", "#ff7101");

	if (emailOri == emailInput){
		$('#txtmessage').show();
		$('#txtmessage').css("color", "green");
		$('#txtmessage').text("Email sudah diverifikasi")
		$('#txtvalid').val("1");
    }
    if (phoneori == phoneInput){
		$('#txtmessagephone').show();
		$('#txtmessagephone').css("color", "green");
		$('#txtmessagephone').text("No. Telp. sudah diverifikasi")
		$('#txtvalidphone').val("1");
    }
    //---------- Job--------//
    var job= "";
    if ($('#pekerjaan').val()==null){
        job;
    }else{
        job = $('#pekerjaan').val().toLowerCase();
    }
     
    if (job == 'job8' || job == 'job19') { //job8 = Karyawan Swasta ; job19 = Wiraswasta/Pengusaha
        $('.up').hide();
        $('.np').show();
        $('.bu').show();
    }else if (job == 'job7' || job == 'job20'){ //job7 = PNS/Pegawai Pemerintah ; job20 = Anggota Militer/Anggota Kepolisian/Anggota Partai Politik
        $('.up').show();
        $('.np').show();
        $('.bu').hide();  
    }else if (job == 'job23'){
        $('.up').show();
        $('.np').show();
        $('.bu').show();
    }else{
        $('.up').hide();
        $('.np').hide();
        $('.bu').hide();
    }

    //----------End job ----------//

    			
		$("#txtemail").on('keyup', function(e) {
            var value = $(this).val();
            //processData:false,
            event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/cekemailphone',
                    data: {paramValue: value},
                    success: function(data) {
					var obj = $.parseJSON(data);
					var result_code = obj .result_code;
					var emailAddress = obj.emailAddress;
					if (result_code == 1000){
						if (emailAddress == emailInput) {
							$('#txtmessage').show();
							$('#txtmessage').css("color", "green");
							$('#txtmessage').text("Email sudah diverifikasi")
							$('#txtvalid').val("1");
							$('#verifyemail').hide();
							$('#otpemail').hide();
							$('#txtotp').hide();
						}else{
							$('#txtvalid').val("0");
							$('#txtmessage').show();
							$('#txtmessage').css("color", "red");	
							$('#txtmessage').text("Email sudah terdaftar")
							$('#verifyemail').hide();
							$('#otpemail').hide();
							$('#txtotp').hide();
						}
					}else{
						$('#txtvalid').val("1");
						$('#txtmessage').show();
						$('#txtmessage').css("color", "green");
						$('#txtmessage').text("Email tersedia")
						$('#verifyemail').hide();
						$('#otpemail').show();
						$('#txtotp').hide();
					}	
                    }
            });
        });
        $("#mobilePhone").on('keyup', function(e) {
            var value = $(this).val();
            //processData:false,
            event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/cekemailphone',
                    data: {paramValue: value},
                    success: function(data) {
					var obj = $.parseJSON(data);
					var result_code = obj .result_code;
					var mobilePhone = obj.mobilePhone;
					if (result_code == 1000){
						if (mobilePhone == phoneInput) {
							$('#txtmessagephone').show();
							$('#txtmessagephone').css("color", "green");
							$('#txtmessagephone').text("No. Telp. sudah diverifikasi")
							$('#txtvalidphone').val("1");
							$('#verifyphone').hide();
							$('#otpphone').hide();
							$('#txtotpphone').hide();
						}else{
							$('#txtmessagephone').show();
							$('#txtmessagephone').css("color", "red");	
                            $('#txtmessagephone').text("No. Telp. sudah terdaftar")
                            $('#txtvalidphone').val("0");
							$('#verifyphone').hide();
							$('#otpphone').hide();
							$('#txtotpphone').hide();
						}
					}else{
						$('#txtvalidphone').val("1");
						$('#txtmessagephone').show();
						$('#txtmessagephone').css("color", "green");
						$('#txtmessagephone').text("No. Telp. tersedia")
						$('#verifyphone').hide();
						$('#otpphone').show();
						$('#txtotpphone').hide();
					
					}	
                    }
            });
	    });
	

	$(".verifyotp").click(function () {
		$('#verifyemail').show();
		$('#otpemail').hide();
        $('#txtotp').show();
        var val = $('#txtemail').val();
        var otp = $('#txtotp').val();
         
        event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/verifyotp',
                    data: {paramValue1: val,paramValue2:otp},
                    success: function(data) {
                        var obj = $.parseJSON(data);
                        var status = obj.result_code;
                        if (status == 1000){
                            $('#txtmessage').show();
							$('#txtmessage').css("color", "green");
							$('#txtmessage').text("Email sudah diverifikasi")
							$('#txtvalid').val("1");
							$('#verifyemail').hide();
							$('#otpemail').hide();
							$('#txtotp').hide();
                        }else{
                            $("#txtemail").prop('disabled', false);
                            $('#txtmessage').show();
							$('#txtmessage').css("color", "red");
							$('#txtmessage').text("wrong code")
							$('#txtvalid').val("0");
							$('#verifyemail').show();
							$('#otpemail').hide();
							$('#txtotp').show();    
                        }
                        // console.log(status);
                    }
            }); 

    });
    $(".verifyotpphone").click(function () {
		$('#verifyphone').show();
		$('#otpphone').hide();
        $('#txtotpphone').show();
        var val = $('#mobilePhone').val();
        var otp = $('#txtotpphone').val();
         
        event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/verifyotp',
                    data: {paramValue1: val,paramValue2:otp},
                    success: function(data) {
                        var obj = $.parseJSON(data);
                        var status = obj.result_code;
                        if (status == 1000){
                            $('#txtmessagephone').show();
							$('#txtmessagephone').css("color", "green");
							$('#txtmessagephone').text("No. Telp. sudah diverifikasi")
							$('#txtvalidphone').val("1");
							$('#verifyphone').hide();
							$('#otpphone').hide();
							$('#txtotpphone').hide();
                        }else{
                            $("#mobilePhone").prop('disabled', false);
                            $('#txtmessagephone').show();
							$('#txtmessagephone').css("color", "red");
							$('#txtmessagephone').text("wrong code")
							$('#txtvalidphone').val("0");
							$('#verifyphone').show();
							$('#otpphone').hide();
							$('#txtotpphone').show();    
                        }
                        // console.log(status);
                    }
            }); 
	});


	$(".getotp").click(function () {
		$('#verifyemail').show();
		$('#otpemail').hide();
        $('#txtotp').show();
        var val = $('#txtemail').val();
        var flagotp = '';
        var fullname = $('#txtfullname').val();
        $("#txtemail").prop('disabled', true);
        event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/getotp',
                    data: {paramValue1: val,paramValue2:flagotp,paramValue3:fullname},
                    success: function(data) {
                        var obj = $.parseJSON(data);
                        if (obj.result_code== 1000){
                            Swal.fire({
                                position: 'center',  
                                title: 'SUKSES, OTP TERKIRIM',
                                text: "Pastikan email Anda sudah sesuai",
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }else{
                            Swal.fire({
                                position: 'center',  
                                title: 'GAGAL, Ulangi kembali',
                                text: "Pastikan email Anda sudah sesuai",
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }
                        
                        // console.log(obj);
                        // console.log(obj.result_code);
                        // console.log(obj.message);
                    }
            });        
    });
    $(".getotpphone").click(function () {
		$('#verifyphone').show();
		$('#otpphone').hide();
        $('#txtotpphone').show();
        var valphone = $('#mobilePhone').val();
        var flagotp = '';
        var fullname = $('#txtfullname').val();
        $("#mobilePhone").prop('disabled', true);
        event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: './formaplikasi/getotp',
                    data: {paramValue1: valphone,paramValue2:flagotp,paramValue3:fullname},
                    success: function(data) {
                        var obj = $.parseJSON(data);
                        if (obj.result_code== 1){
                            Swal.fire({
                                position: 'center',  
                                title: 'SUKSES, OTP TERKIRIM',
                                text: "Pastikan nomer Anda sudah sesuai dan terinstall Whatsapp",
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }else{
                            Swal.fire({
                                position: 'center',  
                                title: 'GAGAL, Ulangi kembali',
                                text: "Pastikan nomer Anda sudah sesuai dan terinstall Whatsapp",
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }
                        // console.log(obj);
                        // console.log(obj.result_code);
                        // console.log(obj.message);
                    }
            });        
    });

    //pekerjaan
    $("#pekerjaan").on('change', function()
    {
        var value = this.value.toLowerCase();
        if (value == 'job8' || value == 'job19') { //job8 = Karyawan Swasta ; job19 = Wiraswasta/Pengusaha
            $('.up').hide();
            $('.np').show();
            $('.bu').show();

            // $('#uraianPekerjaan').attr('readonly', 'true');
            // $('#namaLembaga').attr('readonly', 'false');
            // $('#bidangUsaha').attr('readonly', 'false');

        }else if (value == 'job7' || value == 'job20'){ //job7 = PNS/Pegawai Pemerintah ; job20 = Anggota Militer/Anggota Kepolisian/Anggota Partai Politik
            $('.up').show();
            $('.np').show();
            $('.bu').hide();

            // $('#uraianPekerjaan').attr('readonly', 'false');
            // $('#namaLembaga').attr('readonly', 'false');
            // $('#bidangUsaha').attr('readonly', 'true');    
        }else if (value == 'job23'){
            $('.up').show();
            $('.np').show();
            $('.bu').show();

            // $('#uraianPekerjaan').attr('readonly', 'false');
            // $('#namaLembaga').attr('readonly', 'false');
            // $('#bidangUsaha').attr('readonly', 'false'); 
        }else{
            $('.up').hide();
            $('.np').hide();
            $('.bu').hide();
        }
        
    });
    // $(".btnsubmit2").click(function () {
    //     Swal.fire({
    //         position: 'center',
    //         icon: 'success',
    //         title: '<p style="color:#ff7101";>Perubahan berhasil disimpan</p>',
    //         showConfirmButton: false,
    //         timer: 1500
    //       }, function(){
    //                 window.location.href = "../profile";
    //         });
    // });
    
    //Submit Update
    $(".btnsubmit").click(function () {
        var validEmail = $('#txtvalid').val();
        var email = $('#txtemail').val();
        var validPhone =$('#txtvalidphone').val();
        var mobilePhone = $('#mobilePhone').val();
        var birthPlace = $('#birthPlace').val();
        var lineAddress1 = $('#lineAddress1').val();
        var lineAddress2 = $('#lineAddress2').val();
        var cityAddress = $('#cityAddress').val();
        var postalCode = $('#postalCode').val();
        var homePhone = $('#homePhone').val();
        var statmerit = $('#statmerit').val();
        var incomeSource = $('#incomeSource').val();
        var pekerjaan = $('#pekerjaan').val().toLowerCase();
        var uraianPekerjaan = $('#uraianPekerjaan').val();
        var namaLembaga = $('#namaLembaga').val();
        var bidangUsaha = $('#bidangUsaha').val();
        var memberId = $('#vldnm').val();
        var indivPayor = $('#indivPayor').text();

        //console.log("indivPayor = " + indivPayor);
        //console.log("validEmail = " + validEmail);
        //console.log("validPhone = " + validPhone);
        ///*
        if (statmerit.toLowerCase() == 'menikah'.toLowerCase()){
            statmerit = "Y";
        }else{
            statmerit = "N";
        }


        if (validEmail == 0){
            $('.demail').addClass("error");
            $('#txtemail').focus();
            $('#txtemail').setCursorPosition(1);
        }else
        if (validPhone == 0){
            $('.dphone').addClass("error");
            $('#mobilePhone').focus();
            $('#mobilePhone').setCursorPosition(1);
        }else
        // if (birthPlace.length == 0){
        //     $('.dtl').addClass("error");
        //     $('#birthPlace').focus();
        //     $('#birthPlace').setCursorPosition(1);
        // }
        if (lineAddress1.length == 0){
            $('.dad1').addClass("error");
            $('#lineAddress1').focus();
            $('#lineAddress1').setCursorPosition(1);
        }else
        if (lineAddress2.length == 0){
            $('.dad2').addClass("error");
            $('#lineAddress2').focus();
            $('#lineAddress2').setCursorPosition(1);
        }else
        if (cityAddress.length == 0){
            $('.dct').addClass("error");
            $('#cityAddress').focus();
            $('#cityAddress').setCursorPosition(1);
        }else
        if (postalCode.length == 0){
            $('.dpcode').addClass("error");
            $('#postalCode').focus();
            $('#postalCode').setCursorPosition(1);
        }else
        if (homePhone.length == 0){
            $('.dtelp').addClass("error");
            $('#homePhone').focus();
            $('#homePhone').setCursorPosition(1);
        }else
        if (incomeSource.length == 0){
            $('.dincome').addClass("error");
            $('#incomeSource').focus();
            $('#incomeSource').setCursorPosition(1);
        }else if (pekerjaan.length == 0){
            $('.djob').addClass("error");
            $('#pekerjaan').focus();
            $('#pekerjaan').setCursorPosition(1);        
        }else{
            if (pekerjaan == 'job8' || pekerjaan == 'job19'){
                if (namaLembaga.length == 0){
                    $('.np').addClass("error");
                    $('#namaLembaga').focus();
                    $('#namaLembaga').setCursorPosition(1);
                }else if (bidangUsaha.length == 0){
                    $('.bu').addClass("error");
                    $('#bidangUsaha').focus();
                    $('#bidangUsaha').setCursorPosition(1);
                }
            }else if (pekerjaan == 'job7' || pekerjaan == 'job20'){
                if (uraianPekerjaan.length == 0){
                    $('.up').addClass("error");
                    $('#uraianPekerjaan').focus();
                    $('#uraianPekerjaan').setCursorPosition(1);
                }else
                if (namaLembaga.length == 0){
                    $('.np').addClass("error");
                    $('#namaLembaga').focus();
                    $('#namaLembaga').setCursorPosition(1);
                }
            }else if (pekerjaan == 'job23'){
                if (uraianPekerjaan.length == 0){
                    $('.up').addClass("error");
                    $('#uraianPekerjaan').focus();
                    $('#uraianPekerjaan').setCursorPosition(1);
                }else
                if (namaLembaga.length == 0){
                    $('.np').addClass("error");
                    $('#namaLembaga').focus();
                    $('#namaLembaga').setCursorPosition(1);
                }else
                if (bidangUsaha.length == 0){
                    $('.bu').addClass("error");
                    $('#bidangUsaha').focus();
                    $('#bidangUsaha').setCursorPosition(1);
                }
            }
        //     alert("oke submit");
            console.log(validEmail +";"+ email+";"+ validPhone+";"+ mobilePhone+";"+ birthPlace+";"+ lineAddress1+";"+ lineAddress2+";"+ postalCode
        +";"+ homePhone+";"+ statmerit+";"+ incomeSource+";"+ pekerjaan+";"+ uraianPekerjaan+";"+ namaLembaga+";"+ bidangUsaha+";"+ memberId
        );
            event.preventDefault();
            // $dataUpdate = {vldnm: val,paramValue2:flagotp,paramValue3:fullname};

            $.ajax({
                    type: 'POST',
                    url: './controller/data-updateprofile',
                    data: {vldnm: memberId,lineAddress1:lineAddress1,lineAddress2:lineAddress2,postalCode:postalCode,homePhone:homePhone,
                            birthPlace:birthPlace,statmerit:statmerit,uraianPekerjaan:uraianPekerjaan,namaLembaga:namaLembaga,
                            emailAddress:email,mobilePhone:mobilePhone,bidangUsaha:bidangUsaha,cityAddress:cityAddress,jobType:pekerjaan,
                            indivPayor:indivPayor},
                    success: function(data2) {
                        console.log(data2);
                        var obj = $.parseJSON(data2);
                        if (obj == 1210){
                            // Swal.fire({
                            //     position: 'center',
                            //     icon: 'success',
                            //     title: '<p style="color:#ff7101";>Perubahan berhasil disimpan</p>',
                            //     showConfirmButton: false,
                            //     timer: 1500
                            // });
                            // Swal.fire(
                            //     'Selamat',
                            //     'Profile anda telah berhasil di perbaharui',
                            //     'success'
                            //   );
                              Swal.fire({
                                position: 'center',  
                                title: 'Selamat',
                                text: "Profile anda telah berhasil di perbaharui",
                                icon: 'success',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }else{
                            // Swal.fire({
                            //     position: 'center',
                            //     icon: 'error',
                            //     title: '<p style="color:red";>Perubahan gagal disimpan</p>',
                            //     showConfirmButton: false,
                            //     timer: 1500
                            // });
                            Swal.fire({
                                position: 'center',  
                                title: 'Opss..',
                                text: "Profile anda telah gagal di perbaharui",
                                icon: 'error',
                                showConfirmButton: true,
                                confirmButtonColor: '#ff7101',
                              });
                        }
                        console.log(obj);
                                
                        
                    }
            });  
        }
        //*/
    });
    
    $('.numbersOnly').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
		if ((charCode >= 48 && charCode <= 57) || (charCode >=37 && charCode <=40 ) || charCode === 8 || charCode === 46 || charCode === 9)
		   // || charCode == 46 .
		   // || charCode == 44) ,
		{return true;}
		return false;
     });

     $('#txtemail').on('keyup', function(e){
        if($(this).val()){
            $(".demail").removeClass("error");
        }
    });
    $('#mobilePhone').on('keyup', function(e){
        if($(this).val()){
            $(".dphone").removeClass("error");
        }
    });
    // $('#birthPlace').on('keyup', function(e){
    //     if($(this).val()){
    //         $(".dtl").removeClass("error");
    //     }
    // });
    $('#lineAddress1').on('keyup', function(e){
        if($(this).val()){
            $(".dad1").removeClass("error");
        }
    });
    $('#lineAddress2').on('keyup', function(e){
        if($(this).val()){
            $(".dad2").removeClass("error");
        }
    });
    $('#cityAddress').on('keyup', function(e){
        if($(this).val()){
            $(".dct").removeClass("error");
        }
    });
    $('#postalCode').on('keyup', function(e){
        if($(this).val()){
            $(".dpcode").removeClass("error");
        }
    });
    $('#homePhone').on('keyup', function(e){
        if($(this).val()){
            $(".dtelp").removeClass("error");
        }
    });
    $('#incomeSource').on('change', function(e){
        if($(this).val()){
            $(".dincome").removeClass("error");
        }
    });
    $('#pekerjaan').on('change', function(e){
        if($(this).val()){
            $(".djob").removeClass("error");
        }
    });
    $('#uraianPekerjaan').on('keyup', function(e){
        if($(this).val()){
            $(".up").removeClass("error");
        }
    });
    $('#namaLembaga').on('keyup', function(e){
        if($(this).val()){
            $(".np").removeClass("error");
        }
    });
    $('#bidangUsaha').on('keyup', function(e){
        if($(this).val()){
            $(".bu").removeClass("error");
        }
    });
});