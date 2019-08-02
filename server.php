<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '159753852cafarc', 'prospect_erp');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, trim($_POST['username']));
		$email = mysqli_real_escape_string($db, trim($_POST['email']));
		$password_1 = mysqli_real_escape_string($db, trim($_POST['password_1']));
		$password_2 = mysqli_real_escape_string($db, trim($_POST['password_2']));

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Emailin formatı düzgün deyil!!");
        }

		// register user if there are no errors in the form
		if (count($errors) == 0) {

			$password = md5($password_1);//encrypt the password before saving in the database

			/*------------------------------Test-------------------------*/
            $sql="select * from users where (username='$username' or email='$email');";
            $res=mysqli_query($db,$sql);
            if (mysqli_num_rows($res) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($username==$row['username'])
            {
                array_push($errors, "Username movcuddur");
            }
            elseif($email==$row['email'])
            {
               array_push($errors, "Email movcuddur");
            }
        }else { 
        //here you need to add else condition
            $query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
        }

      			/*------------------------------Test-------------------------*/


			
		}

	}



	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db,trim($_POST['username']));
		$password = mysqli_real_escape_string($db,trim($_POST['password']));

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

		// LOGIN USER

?>