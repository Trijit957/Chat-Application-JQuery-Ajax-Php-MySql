<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(isset($_GET['user_id']))
    {
        $user_id = $_GET['user_id'];
    }


    $query = "select name from users where id= $id";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result))
      {
          $name = $row['name'];
      }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/homePage.css">
    <title></title>
  </head>
  <body>
    <div class="container1">
     <div class="sidebar">
       <div class="header">
         <div class="avatar">
           <!-- <i class="bi bi-person-circle"></i> -->
           <img src="../src/images/avatar.png" width="50" height="50" />
           <h4><?php if(isset($name)) { echo $name; } ?></h4>
         </div>

       </div>

       <div class="search">
         <form class="search_form">
           <input type="text" placeholder="Search...">
           <button><img src="../src/images/search.png" width="35" height="35" /></button>
         </form>
       </div>

       <div class="test"></div>

     </div>

     <div class="chat">
        <div class="chat_header">
           <img src="../src/images/avatar.png" alt="avatar" width="50" height="50" />
           <h4 class="USER_name"></h4>
        </div>

        <div class="chat_body"></div>


        <div class="send_msg">
          <form>
            <button class="msg_submit" disabled><img class="attach" src="../src/images/attach.png" alt="attach" width="30" height="30" /></button>
            <input type="text" class="msg" placeholder="Type a message..." />
            <input class="hidden_user_id" type="hidden" value="">
            <button class="msg_submit" disabled><img src="../src/images/send.png" alt="send" width="30" height="30" /></button>
          </form>
        </div>
     </div>
   </div>

   <input class="my_id" type="hidden" value=<?php if(isset($id)) { echo $id; } ?>>
   <input class="user_id" type="hidden" value=<?php if(isset($user_id)) { echo $user_id; } ?>>

   <script src="scripts/homePage.js"></script>

  </body>

</html>
