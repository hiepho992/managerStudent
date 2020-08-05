var teacher =  teacher || {};

teacher.uploadAvatar = function(element){
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function(){
        $("#avatar").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

function  teacher.uploadAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
            $('#blah').css("display", "block");
        };
        reader.readAsDataURL(input.files[0]);
    }
}
