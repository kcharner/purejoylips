<?php include_once("blog.html");

	if (empty($_POST) === false) {

            // echo("submitted");
            $errors = array();

            $name = $_POST["name"];
            $email = $_POST["email"];
            $emailSubject = $_POST["emailSubject"];
            $message = $_POST["message"];

            if (empty($name) === true || empty($email) === true || empty($emailSubject) === true || empty($message) === true) {

            	$errors[] = "Please fill out all of the fields";
            }
            else {

                  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                        $errors[] = "Invalid email address, please review";
                  }

                  if (ctype_alpha($name) === false ) {
                        $errors[] = "Name field can only contain letters";
                  }
            }

            if (empty($errors) === false) {
                  echo "<ul>";
                  foreach ($errors as $error) {
                       echo "<li>", $error, "</li>";
                  }
                  echo "</ul>";
            }

            if (empty($errors) === true) {
                  mail("hannah@purejoybody.com", $emailSubject, $message, "From: " . $email);
                  exit();
            }

        }

?>