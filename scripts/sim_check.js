const regex = /^(9\d{9})$/

$(document).on('input', '#mobile', function (e) {

    let mobileInput = $('#mobile').val();
    let msg;
    if (mobileInput.length == 0) {
        msg = "<span style='color:red'>Must enter a number</span>";
        $("#submit").prop("disabled", true)
    }
    else if (!regex.test(mobileInput)) {
        msg = "<span style='color:red'>Number is not valid</span>";
        $("#submit").prop("disabled", true)
    } else {
        checkNumber(mobileInput);
    }
    $('#number-error').html(msg);
});

function checkNumber(mobileInput) {
    $.ajax({
        method: "POST",
        url: "./scripts/check_number.php",
        data: {
            mobileNum: mobileInput
        },
        success: function (data) {
            console.log(data);
            if (parseInt(data) === 1) {
                $("#submit").prop("disabled", true)
                $("#number-error").html("<span style='color:red'>This number already registered</span>")
                return;
            }
            $("#submit").prop("disabled", false)
            $("#number-error").html("")
        }
    });
}