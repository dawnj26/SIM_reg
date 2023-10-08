const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
let email = first = last = address = gender = bday = image = true


function checkValid() {
    if (email && first && last && address && gender && image && bday) {
        $('#submit').prop("disabled", false)
    } else {
        $('#submit').prop("disabled", true)
    }
}
function validateInput(input, errorId, errorMsg) {
    if (input.length == 0) {
        $(`#${errorId}`).html(errorMsg);
        return false;
    } else {
        $(`#${errorId}`).html("");
        return true;
    }
}

$('#email').on('input', function() {
    let input = $('#email').val()
    let isValid = validateInput(input, 'emailError', "<span style='color:red'>Must enter email</span>");
    if (isValid) {
        isValid = emailRegex.test(input);
        if (!isValid) {
            $(`#emailError`).html("<span style='color:red'>Email is not valid</span>");
        }
    }
    email = isValid;
    checkValid()
})

$('#address').on('input', function() {
    let input = $('#address').val()
    address = validateInput(input, 'addressError', "<span style='color:red'>Must enter an address</span>")
    checkValid()
})
$('#firstName').on('input', function() {
    let input = $('#firstName').val()
    first = validateInput(input, 'firstError', "<span style='color:red'>Must enter a name</span>")
    checkValid()
})
$('#lastName').on('input', function() {
    let input = $('#lastName').val()
    last = validateInput(input, 'lastError', "<span style='color:red'>Must enter a name</span>")
    checkValid()
})

$('#image').on('input', function() {
    let input = $('#image').val()
    image = validateInput(input, 'imageError', "<span style='color:red'>Must select an image</span>")
    checkValid()
})
$('#bday').on('input', function() {
    let input = $('#bday').val()
    bday = validateInput(input, 'bdayError', "<span style='color:red'>Must enter birth date</span>")
    checkValid()
})

if ($('#genderMale').attr('checked')) {
    $('#genderMale').prop('checked', true) 
    $('.male').css('border', '2px solid #D90429')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '1px solid #8D99AE')
    gender = true   
    checkValid()
} else if ($('#genderFemale').attr('checked')) {
    $('#genderFemale').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '2px solid #D90429')   
    $('.other').css('border', '1px solid #8D99AE')
    gender = true   
    checkValid()
} else {
    $('#genderOther').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '2px solid #D90429')
    gender = true   
    checkValid()
}

$('.male').on('click', function () {
    $('#genderMale').prop('checked', true) 
    $('.male').css('border', '2px solid #D90429')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '1px solid #8D99AE')
    gender = true   
    checkValid()
});
$('.female').on('click', function () {
    $('#genderFemale').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '2px solid #D90429')   
    $('.other').css('border', '1px solid #8D99AE')
    gender = true   
    checkValid()
});
$('.other').on('click', function () {
    $('#genderOther').prop('checked', true) 
    $('.male').css('border', '1px solid #8D99AE')   
    $('.female').css('border', '1px solid #8D99AE')   
    $('.other').css('border', '2px solid #D90429')
    gender = true   
    checkValid()
});