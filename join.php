<?php
require_once("include.php");
if (isset($_SESSION['id']) && $_SESSION['id'] > 0)
{
  $sql = "SELECT * FROM board WHERE (player1 == ".$_SESSION['id']." OR player2 == ".$_SESSION['id'].") AND status < 2";
  $result = $mysqli->query($sql);
  if(($result == NULL) || mysqli_num_rows($result) == 0)
  {
    $sql = "SELECT * FROM board WHERE status < 1";
    $result = $mysqli->query($sql);
    if(mysqli_num_rows($result) == 0)
    {
      $sql = "INSERT INTO  `board` (
            `id` ,
            `status` ,
            `player1` ,
            `player2` ,
            `data`
            )
            VALUES (
            NULL ,  '0',  '".$_SESSION['id']."',  '0',  ''
            );
            ";
      $mysqli->query($sql) or $mysqli->error;
      $_SESSION['board_id'] = $mysqli->insert_id;
    }
    else
    {
      while($obj = $result->fetch_object()) { 
        {
          $_SESSION['board_id'] = $obj->id;
        }
      }
    }
  }
  else
  {
    while($obj = $result->fetch_object()) { 
        {
          $_SESSION['board_id'] = $obj->id;
        }
      }
  }
  if (isset($_SESSION['board_id']))
  {
    echo "";
  }
}
?>
