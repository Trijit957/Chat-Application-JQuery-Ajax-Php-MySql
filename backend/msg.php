<?php

$connection = mysqli_connect("localhost","root","","project") or die(mysqli_error($connection));

if(isset($_POST['msg']))
{
  $msg = $_POST['msg'];
}

if(isset($_POST['id']) && isset($_POST['user_id']))
{
  $s_id = $_POST['id'];
  $r_id = $_POST['user_id'];

  $id = $_POST['id'];
  $user_id = $_POST['user_id'];

}


if(isset($msg))
    {
         $query_2 = "INSERT INTO msg(s_id,r_id,msg) VALUES($s_id,$r_id,'$msg')";
         $result_2 = mysqli_query($connection,$query_2);
         $flag = 1;
    }


        $query = "select * from msg";
        $result = mysqli_query($connection, $query);

        $query_1 = "select id,name from users where id = $user_id";
        $result_1 = mysqli_query($connection, $query_1);

        while($row_1 = mysqli_fetch_assoc($result_1))
        {
          $user_id = $row_1['id'];
          $user_name = $row_1['name'];
        }

        $output = "";

        while($row = mysqli_fetch_assoc($result))
        {
           if($row['s_id'] == $id && $row['r_id'] == $user_id)
           {
             $output .= "<h5 class='chat_body_msg_send'>{$row['msg']}</h5>";
           }
           else if($row['s_id'] == $user_id && $row['r_id'] == $id)
           {
             $output .= "<h5 class='chat_body_msg_rec'>{$row['msg']}</h5>";
           }

        }

        if(isset($flag)) {
          $final_output = array('flag' => $flag, 'user_id' => $user_id, 'user_name' => $user_name, 'msg' => $output);
        }else {
          $final_output = array('user_id' => $user_id, 'user_name' => $user_name, 'msg' => $output);
        }


        echo json_encode($final_output);

        // header("location:homePage.php?id=".$id."&user_id=".$user_id);


?>
