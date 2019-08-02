<?php
require_once('functions/functions.php');
forbiddenenter();



if(isset($_POST['text'])){
  date_default_timezone_set("Asia/Baku");

    
 



    //db connection
$servername = "localhost";
$username = "root";
$password = "159753852cafarc";
$dbname = "prospect_erp";
//db connection

   //insert
    try {
 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //get_user_id
         $userrequest=$conn->prepare("select * from users where username=?");
         $userrequest->execute(array($_SESSION['username']));
         $userget=$userrequest->fetch(PDO::FETCH_ASSOC);

          //get_user_id

      //insert olunacaqlar
     $text = $_POST['text'];
     $user_id=$userget['id'];
     $date = date('m/d/Y h:i:s a',time());
     //insert olunacaqlar
$insert=$conn->prepare("INSERT INTO posts SET     

posts_metn=:metn,                  
user_id=:id,
post_time=:zaman

");

 $kaydet=$insert->execute(array(
 	'metn'=>$text,
 	'id'=>$user_id,
 	'zaman'=>$date
));

  } 
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


   //insert



        

   








     
    

}

?>