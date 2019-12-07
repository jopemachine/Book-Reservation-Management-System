<?php

  session_start();

  $UserID = $_SESSION['user_id'];

  // 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
  if(!isset($UserID)){
    echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
    echo ("<script>location.href='../../View/SignIn.php';</script>");
    exit();
  }

  require_once('../../MySQLConection.php');

  $connect_object = MySQLConnection::DB_Connect('db_hw') or die("Error Occured in Connection to DB");

  $ISBN = $_POST["ISBN"];

  $updateBookRecord = "
    UPDATE book SET
      ReturnRequest = 1
      WHERE ISBN = '$ISBN'
  ";

  mysqli_query($connect_object, $updateBookRecord) or die("Error Occured in Updating data in DB");
