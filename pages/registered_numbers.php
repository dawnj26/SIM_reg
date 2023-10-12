<?php
require "../database/config.php";

$query = "SELECT * FROM registered_sims";
$result = $conn->query($query);

function searchIMG($search)
{
    $directory = '../database/images/';

    // Use scandir to get a list of filenames in the directory
    $files = scandir($directory);
    foreach ($files as $file) {
        // Exclude "." and ".." entries
        if ($file != "." && $file != "..") {
            if (str_contains($file, $search)) {
                return "$directory$file" . PHP_EOL;
            }
        }
    }
    return "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered SIM</title>
    <link rel="stylesheet" href="../styles/reg_numbers.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>


    <div class="main-container">
        <a href="../index.php"><button class='btn btn-primary'><svg class="svg" xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>Back</button></a>
        <h1 class="my-4">Registered numbers</h1>
        <table id="table">
            <thead>
                <tr>
                    <th>Mobile number</th>
                    <th>Full name</th>
                    <th>Birth date</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Email address</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . "+63" . $row['mobile_number'] . "</td>";
                    echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                    echo "<td>" . $row['birth_date'] . "</td>";
                    echo "<td>" . $row['sex'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['email_address'] . "</td>";
                    echo "<td><img src='" . searchIMG($row['mobile_number']) . "'></td>";
                    echo "<td class='buttons'> <a href='#' class='edit'><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#edit'><svg class='mx-1' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                  </svg>Edit</button></a><button class='btn btn-danger delete-button' data-bs-toggle='modal' data-bs-target='#confirmation'><svg class='mx-1' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-archive-fill' viewBox='0 0 16 16'>
                    <path d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/>
                    </svg>Delete</button></td>";
                    echo "</tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="confirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-delete">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="del" href=""><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="confirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <label for="mobile" class="form-label">New number(+63):</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10">
                        <div id="number-error">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="" id="proceed"><button type="button" id="proceed" class="btn btn-primary">Proceed with default</button></a>
                        <a href="" id="next"><button type="button" id="submit" class="btn btn-primary" disabled>Update number</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Scripts for tables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/reg_numbers.js"></script>
    <script src="../scripts/sim_check_edit.js"></script>
</body>

</html>