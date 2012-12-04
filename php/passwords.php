<?php
$USERS["djanders"] = "tacomeat";
$USERS["isaac"] = "isasc";
$USERS["scott"] = "tacotruck";
  
function check_logged(){
     global $_SESSION, $USERS;
     if (!array_key_exists($_SESSION["logged"],$USERS)) {
          header("Location: login.php");
     };
};
?>