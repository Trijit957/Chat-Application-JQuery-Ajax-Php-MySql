<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));

$id = $_POST['id'];


if($id) {

  $query = "select id,name from users where id <> $id";
  $result = mysqli_query($connection, $query);

  $output = "";
  while($row = mysqli_fetch_assoc($result))
  {
    $output .= "<div class='users' id={$row['id']}>
            <img src='../src/images/avatar.png' width='40' height='40' class='user_image' />
               <div class='user_info'>
               <h4 class='user_name'>{$row["name"]}</h4>
               <p class='last_msg'>This is the last message!</p>
               </div>
             <p class='timestamp'>30 minutes ago</p>
    </div>
";

  }
  echo $output;
}
else {
  echo $error = "No Users Found Except You!";
}




?>
