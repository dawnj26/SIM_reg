
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
        html {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>
<body>
<?php
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!'
      })</script>";

    header('Refresh: 2; url=../index.php');
?>    
</body>
</html>
