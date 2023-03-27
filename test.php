
<?php
function register(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $username, $email,$fullnames,$contact, $location, $gender,$password;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $username    =  e($_POST['username']);
    $email       =  e($_POST['email']);
    $fullnames = e($_POST['full-name']);
    $contact = e($_POST['contact']);
    $location = e($_POST['location']);
    $gender = e($_POST['gender']);
    $password_1  =  e($_POST['password']);
    $password_2  =  e($_POST['cpassword']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($fullnames)) { 
        array_push($errors, "Full names  is required"); 
    }
    if (empty($contact)) { 
        array_push($errors, "Contact is required"); 
    }
    if (empty($location)) { 
        array_push($errors, "Location is required"); 
    }
    if (empty($gender)) { 
        array_push($errors, "Gender is required"); 
    }
    if (empty($email)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($location)) { 
        array_push($errors, "Location is required"); 
    }
    if (empty($password_1)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // check if the username or email already exists in the database
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            // //insert query goes here
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fullnames,username, email, contact, gender, location, user_type, password) 
                      VALUES('$fullnames','$username', '$email', '$contact','$gender','$location','$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
            header('location: home.html');
        }
        else{
			$query = "INSERT INTO users (fullnames,username, email, contact, gender, location,user_type, password) 
					  VALUES('$fullnames','$username', '$email','$contact','$gender','$location' ,'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['logged_in_user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: home.html');				
		}
	}
	}