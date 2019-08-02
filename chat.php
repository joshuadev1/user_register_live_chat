<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">

        /* CSS Document */
        body {
    font:12px arial;
    color: #222;
    text-align:center;
    padding:35px; }
  
form, p, span {
    margin:0;
    padding:0; }
  
input { font:12px arial; }
  
a {
    color:#0000FF;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#EBF4FB;
    width:504px;
    border:1px solid #ACD8F0; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:430px;
    border:1px solid #ACD8F0;
    overflow:auto; }
  
#usermsg {
    width:75%;
    border:1px solid #ACD8F0; }
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; color:blue; }
  
.logout { float:right;}
.logout>a{
     color:red;
     font-style: italic;

}
  
.msgln { margin:0 0 2px 0; }

        </style>
<title>Live Çat</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>

<?php
require_once('functions/functions.php');
    forbiddenenter();


?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
        <p class="logout"><a id="exit" href="index.php?userstatus=exit">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>    
    <div id="chatbox">
<?php 
 getGroupMessages();
 
 ?>

        

    </div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Live chatdan çıxmaq istəyirsinizmi?");
        if(exit==true){window.location = "index.php?logout='1'";}      
    });
    //If user submits the form
    $("#submitmsg").click(function(){   
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});              
        $("#usermsg").attr("value","");
        return false;
    });
    //Load the file containing the chat log
    function loadLog(){     
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({
            url: "log.php",
            cache: false,
            success: function(data){        
                $("#chatbox").html(data); //Insert chat log into the #chatbox div   
                
                //Auto-scroll           
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }               
            },
        });
    }
    setInterval (loadLog, 1000);



});
</script>



</body>
</html>