<?php
include ("connect_db.php");
include ("Modele/connection.php");
/*** begin our session ***/
session_start();
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
        /*** if there is no match ***/
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
		/*** tell the user we are logged in ***/
        // $message = 'You are now logged in';
        header("Location:./index.php");
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<?php
    echo "<script language=\"JavaScript\">\r\n"; 
    echo " alert('$message');\r\n"; 
    echo " history.back();\r\n"; 
    echo "</script>"; 
?>
</body>
</html>