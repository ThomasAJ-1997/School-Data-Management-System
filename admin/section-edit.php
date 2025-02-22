<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['section_id'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../db_connection.php";
        include "data/section.php";

        $sections = allSections($conn);
        $section_id = $_GET['section_id'];
        $section = getSectionById($section_id, $conn);

        if ($section == 0) {
            header("Location: section.php");
            exit;
        }



?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Edit Section</title>
            <!-- BOOTSTRAP -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <!-- SASS/SCSS -->
            <link rel="stylesheet" href="../css/style.css">
            <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
            <!-- ICON -->
            <link rel="icon" href="../imgs/icon.png">
            <!-- JQuery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        </head>

        <body>
            <main class="main-wrap">
                <?php include "includes/navbar.php";
                ?>

                <div class="move-left container mt-5">
                    <a class="btn btn-dark" href="section.php">Go Back</a>

                    <form method="POST" class="shadow p-3 mt-4" action="req/section-edit.php">
                        <div class=" form-group form-w">
                            <h3 class="mt-1">Edit Section</h3>
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_GET['success'] ?>
                                </div>
                            <?php } ?>

                            <label class="mt-4">Section Name</label>
                            <input type="text" class="form-control mt-2" id="sectionInput"
                                value="<?= $section['section_name'] ?>"
                                name="section_name">

                            <input type="text"
                                class="form-control"
                                value="<?= $section['section_id'] ?>"
                                name="section_id"
                                hidden>


                            <button type="submit" class="btn btn-primary mt-4">Edit Section</button>
                    </form>



                </div>
                </div>


                <!-- BOOTSTRAP -->
                <script src="js/script.js"></script>
                <script src="../js/generatePass.js"></script>
                <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $("#navLinks li:nth-child(5) a").addClass("active");
                    });
                </script>


        </body>

        </html>

<?php
    } else {
        header("Location: section.php");
        exit;
    }
} else {
    header("Location: section.php");
    exit;
}

?>