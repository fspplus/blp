var picker = new Pikaday({ 
    field: $('.datepicker')[0],  
    format: 'D/M/YYYY',
    maxDate: new Date(),
    toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    },
    parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
});

$('.disable-keypress').on('keypress', function(e) {
    e.preventDefault();
});

function readURL(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(imgId).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

if("#nik-upload".length){
    $("#nik-upload").on("change",function(){
        readURL(this, "#nik-preview");
    });
}
if("#bukutabungan-upload".length){
    $("#bukutabungan-upload").on("change",function(){
        readURL(this, "#bukutabungan-preview");
    });
}
if("#profilepic".length){
    $("#profilepic").on("change",function(){
        readURL(this, "#photo-preview");
    });
}