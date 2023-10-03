$('.male').on('click', function () {
    $('#genderMale').prop('checked', true) 
    $('.male').css('border', '2px solid darkgreen')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '1px solid #8D99AE')   
});
$('.female').on('click', function () {
    $('#genderFemale').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '2px solid darkgreen')   
    $('.other').css('border', '1px solid #8D99AE')   
});
$('.other').on('click', function () {
    $('#genderOther').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '2px solid darkgreen')   
});