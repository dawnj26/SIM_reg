let table = new DataTable('#table')

$('.delete-button').on('click', function () {
    // Get the closest row to the button that was clicked
    let row = $(this).closest('tr');

    // Find the first column in the row
    let firstColumn = row.find('td:first');

    // Get the text of the first column
    let firstColumnText = firstColumn.text();
    let id = firstColumnText.slice(3)
    // Remove the first column from the row
    $('#modal-delete').html(`Are you sure you want to delete ${firstColumnText}?`)

    $('#del').attr('href', `../scripts/img.php?id=${id}`);
});

