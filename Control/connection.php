<?php
include 'connect_db.php';
include 'Modele/connection.php';
// session_start();

if(isset($_REQUEST['action']))
{
	switch ($_REQUEST['action']) {
		case 'signin':
			signin();
			break;
		case 'signout':
			signout();
			break;
		case 'ajouteUser':
			ajouteUser();
			break;
	}
}

if(isset($_SESSION['user_email']))
{
	include 'Vue/connection/logged_in.php';
}
else 
{
	include 'Vue/connection/connect_form.php';	
}

function ajouteUser()
{
	/*** begin our session ***/
	// session_start();

	/*** first check that both the username, password and form token have been sent ***/
	// if(empty( $_POST['email'])||empty($_POST['password']))
	if(empty($_POST['email'])||empty($_POST['password'])||empty($_POST['verification'])||empty($_POST['form_token']))
	{		
	    $message = 'Please enter a valid username and password';
	}
	/*** check the form token is valid ***/
	elseif( $_POST['form_token'] != $_SESSION['form_token'])
	{
	    $message = 'Invalid form submission';
	}

	/*** check the username is the correct length ***/
	elseif (strlen( $_POST['email']) > 40 )
	{
	    $message = 'Incorrect Length for Username';
	}

	/*** check the password is the correct length ***/
	elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4
	    ||strlen( $_POST['verification']) > 20 || strlen($_POST['verification']) < 4)
	{
	    $message = 'Incorrect Length for Password';
	}

	//check the password has only alpha numeric characters **
	elseif (ctype_alnum($_POST['password']) != true || ctype_alnum($_POST['verification']) != true)
	{
	        /*** if there is no match ***/
	        $message = "Password must be alpha numeric";
	}
	elseif (strcmp($_POST['password'],$_POST['verification'])!= 0) 
	{
	    $message = "You Don't Type Same Password!";
	}

	else
	{
	    /*** if we are here the data is valid and we can insert it into database ***/
	    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	    /*** now we can encrypt the password ***/
	    $password_encrtpt = sha1( $password );
	    // create_user($email,$password_encrtpt);

	    // TODO: si il existe deja
	    create_user($email,$password_encrtpt);
	    $message = 'You have added new user.';
	    /*** unset the form token session variable ***/
	    unset( $_SESSION['form_token'] );
	    $message="bingo";
	    // header("Location:./index.php");
	} 
	if(strcmp($message,'bingo')!=0) // if fail to add user
	{
	    echo "<script language=\"JavaScript\">\r\n"; 
	    echo " alert('$message');\r\n"; 
	    echo " history.back();\r\n"; 
	    echo "</script>"; 
	}
	
}
function signin()
{
	/*** begin our session ***/
	// session_start();
	/*** check if the users is already logged in ***/
	if(isset( $_SESSION['user_email']))
	{
	    $message = 'Users is already logged in';
	}
	/*** check that both the username, password have been submitted ***/
	elseif(empty($_POST['email'])||empty($_POST['password']))
	{

	    $message = 'Please enter a valid username and password';
	}
	/*** check the username is the correct length ***/
	elseif (strlen( $_POST['email']) > 40 )
	{
	    $message = 'Incorrect Length for Username';
	}
	/*** check the password is the correct length ***/
	elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
	{
	    $message = 'Incorrect Length for Password';
	}
	/*** check the password has only alpha numeric characters ***/
	elseif (ctype_alnum($_POST['password']) != true)
	{
	      // ** if there is no match **
	     $message = "Password must be alpha numeric";
	}
	else
	{
	    /*** if we are here the data is valid and we can insert it into database ***/
	    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	    /*** now we can encrypt the password ***/
	    $password_encrtpt = sha1( $password );

	    $user_email = get_email($email,$password_encrtpt);

	    /*** if we have no result then fail boat ***/
	    if($user_email == false)
	    {
	    	
	        $message = 'error!(email or password)';
	     }
	    /*** if we do have a result, all is well ***/
	    else
	    {
	        /*** set the session user_id variable ***/
			$_SESSION['user_email'] = $user_email;			
	    }
	}
		echo "<script language=\"JavaScript\">\r\n"; 
	    echo " alert('$message');\r\n"; 
	    echo " history.back();\r\n"; 
	    echo "</script>"; 
}

function signout()
{
	// Unset all of the session variables.
	session_unset();
	// Destroy the session.
	session_destroy();
}





