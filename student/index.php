<?php
session_start();
if (isset($_SESSION['student'])) {
    $page = "profile";
    include "./header.php";
    include "../database.php";
    $uname = $_SESSION['uname'];
    $query = "SELECT * FROM `studentuser` WHERE `uname` = '$uname'";
    $result = mysqli_query($conn, $query);
    $data = [];
    if ($result) {
        $data = mysqli_fetch_row($result);
    } else {
        echo mysqli_error($conn);
        exit;
    }
?>

    <div class="container" style="min-height: 50rem;">
        <br><br>
        <center>
            <img src="<?php echo $data[11]; ?>" style="width:200px; height:200px; border:inset">
            <br><br>
            <h2><?php echo $data[2]; ?></h2>
            <h3></h3>
            <div style="border: ridge;max-width: 600px; border-radius: 10px; padding:20px;" class="container">
                <h3>
                    Profile
                    <a href="./editprofile.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                </h3>
                <table class="table table-hover">
                    <tr>
                        <td>
                            Enrollment Number :-
                        </td>
                        <td>
                            <?php echo $data[1]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Branch :-
                        </td>
                        <td>
                            <?php echo $data[6]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email ID
                        </td>
                        <td>
                            <?php echo $data[3]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mobile Number
                        </td>
                        <td>
                            <?php echo $data[4]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Semester
                        </td>
                        <td>
                            <?php echo $data[5]; ?>
                        </td>
                    </tr>
                </table>
                <a href="./updatepassword.php" class="btn btn-secondary">Update Password</a>
            </div>
        </center>
    </div>

<?php

} else {
    header('location:../');
}
include "./footer.php";
?>