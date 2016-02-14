<?php

	session_start();

	if ($_GET['logout'] == 1 AND $_SESSION['id']) {

		session_destroy();

		$message = "You have been logged out. Have a nice day";

	}

	include("connection.php");

	if ($_POST['submit'] == "Sign Up"){

		if (!$_POST['email']) {

			$error .= "<br />Please enter your email address";

		}
		else if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {

			$error .= "<br />Please enter a valid email address";

		}

		if (!$_POST['password']) {

			$error .= "<br />Please enter a password";

		} else {

			if (strlen($_POST['password']) < 8)
				$error .= "<br />The password should contain atleast 8 characters";

			if (!preg_match('`[A-Z]`', $_POST['password']))
				$error .= "<br />Please include atleast 1 capital letter in your password";

		}

		if ($error){

			$errorMsg = "There were error(s) in your signup details".$error;

		} else {

			$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

			$result = mysqli_query($link, $query);

			$results = mysqli_num_rows($result);

			if ($results) {

				$errorMsg = "That email address is already registered. Do you want to log in?";

			} else {

				$query = "INSERT INTO `users` (`email`, `pass`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";

				mysqli_query($link, $query);

				//echo "You've been signed up";

				$_SESSION['id'] = mysqli_insert_id($link);

				header("Location:mainpage.php");

			}

		}

	}

	if ($_POST['submit'] == "Log In") {

		$query = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND pass='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";

		$result = mysqli_query($link, $query);

		$row = mysqli_fetch_array($result);

		if ($row) {

			$_SESSION['id'] = $row['id'];

			header("Location:mainpage.php");

		} else {

			$errorMsg = "User does not exist. Please try again.";

		}

	}

?>