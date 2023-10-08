const regex = /^(9\d{9})$/
let edit = ""
let proceed = ""

$(document).on('input', '#mobile', function (e) {
    let mobileInput = $('#mobile').val();
    let msg;
    if (mobileInput.length == 0) {
        msg = "<span style='color:red'>Must enter a number</span>";
        $("#submit").prop("disabled", true)
        $('#next').attr('href', "");
        $('#next').css('pointer-events', 'none')
    }
    else if (!regex.test(mobileInput)) {
        msg = "<span style='color:red'>Number is not valid</span>";
        $("#submit").prop("disabled", true)
        $('#next').attr('href', "");
        $('#next').css('pointer-events', 'none')
    } else {
        checkNumber(mobileInput);
        $('#next').attr('href', `${edit}&new=${mobileInput}`);
        $('#next').css('pointer-events', 'all')
    }
    $('#number-error').html(msg);

});

function checkNumber(mobileInput) {
    $.ajax({
        method: "POST",
        url: "../scripts/check_number.php",
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

$('.edit').on('click', function () {
    // Get the closest row to the button that was clicked
    let row = $(this).closest('tr');

    // Find the first column in the row
    let firstColumn = row.find('td:first');

    // Get the text of the first column
    let firstColumnText = firstColumn.text();
    let id = firstColumnText.slice(3)
    // Remove the first column from the row
    edit = `../pages/edit.php?id=${id}`
    
    proceed = `../pages/edit.php?id=${id}&new=${id}`
    $('#proceed').attr('href', proceed)
});