<?php
require 'core/init.php';
session_start();
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}

if (isset($_POST['submit'])) {

    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['department']) || empty($_POST['year']) || empty($_POST['mobile_no']) || empty($_POST['info'])) {

        $errors_new[] = 'All fields are required.';


    } else {

        if (!ctype_alpha($_POST['first_name'])) {
            $errors_new[] = 'First name should not contain number/s';
        }
        if (!ctype_alpha($_POST['last_name'])) {
            $errors_new[] = 'Last name should not contain number/s';
        }
        if (!ctype_alpha($_POST['department'])) {
            $errors_new[] = 'Department should not contain number/s';
        }
        if (!ctype_alnum($_POST['year'])) {
            $errors_new[] = 'Year should be in proper format like 2nd or 2 or II. It should not contain any special character.';
        }
        if (!ctype_alnum($_POST['mobile_no'])) {
            $errors_new[] = 'Mobile number should not contain number/s';
        }
        /*        if (!ctype_alnum($_POST['info'])){
                    $errors_new[] = 'Your info should not contain special character';
                }
        /*		if (!preg_match('/(\d\d)-(\w+)-(\d\d\d\d)$/', $_POST['birth'])){
                    $errors_new[] = 'Plese enter date with proper format(10-june-1992)';
                }
                if (!($_POST['gender']=='male'||$_POST['gender']=='female')){
                    $errors_new[] = 'Please enter a valid gender(male/female)';
                }
        */
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000)
        ) {

            if ($_FILES["file"]["error"] > 0) {
                $errors_new[] = "error in file uploading";
            } else {
                if (file_exists("~/upload/" . $user_name . "_" . $_FILES["file"]["name"])) {
                    $errors_new[] = $user_name . "_" . $_FILES["file"]["name"] . " already exists. ";
                } else {
                    $path = './uploads/';
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        $path . $_POST['first_name'] . $_POST['last_name'] . "_" . $_FILES["file"]["name"]);

                }
            }
        } else {
            $errors_new[] = "Invalid file";
        }
    }

    if (empty($errors_new) === true) {
        $users->updateUserData($user_name, $_POST['first_name'], $_POST['last_name'], $_POST['department'], $_POST['year'], $_POST['mobile_no'], $_POST['info'], $path . $_POST['first_name'] . $_POST['last_name'] . "_" . $_FILES["file"]["name"]);
        header('Location: profile.php?successvalid');
        exit();
    }

    if (empty($errors_new) === false) {

        echo '<p>' . implode('</p><p>', $errors_new) . '</p>';
    } else {

    }


}
?>
press back to re-enter values