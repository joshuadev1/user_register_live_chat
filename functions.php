<?php 
function forbiddenenter(){
	session_start(); 
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
        exit();
    }

}
function serverexit(){
	 if (isset($_GET['userstatus'])){
	   $userstatus=$_GET['userstatus'];
	    if ($userstatus=='exit') {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	}
	

}


function getGroupMessages(){
	//db connection

require('db.php');


function convert_user($user_id){


require('db.php');




	   //getuser
	     $userrequest=$conn->prepare("select * from users where id=?");
         $userrequest->execute(array($user_id));
         $userget=$userrequest->fetch(PDO::FETCH_ASSOC);
         echo $user_ad=$userget['username'];
        
}

          //get_messages
         $mesajrequest=$conn->prepare("select * from posts");
         $mesajrequest->execute();
         //get messages

      

          while($mesajget=$mesajrequest->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class='msgln'> (<?php echo $mesajget['post_time'];?>) <b><?php convert_user($mesajget['user_id']);?></b>:<?php echo $mesajget['posts_metn'];?><br></div>
          <?php } 
 
                         

}











 ?>