<?php

  require_once 'init.php';

  $title = addslashes(trim($_GET['title']));
  $num_dvd = addslashes(trim($_GET['num_dvd']));
  $num_bd = addslashes(trim($_GET['num_bd']));
  $producer = addslashes(trim($_GET['producer']));
  $director = addslashes(trim($_GET['director']));
  $actors = addslashes(trim($_GET['actors']));
  $category = addslashes(trim($_GET['category']));

  $sql = "INSERT INTO  movie  VALUES (NULL,'$title','$num_dvd','$num_bd', '0')";
  lib::db_query($sql);

  $sql = "SELECT * FROM movie WHERE  movie_title='$title'";
  $result = lib::db_query($sql);
  $row = $result->fetch_assoc();
  $pid = $row['movie_id'];

  $sql = "INSERT INTO  movie_info  VALUES ('$pid','$title','$num_dvd',
                                            '$num_bd', '$producer','$director',
                                          '$actors', '$category')";
  lib::db_query($sql);

  header("Location: page_admin_menu.php");
  exit;


?>
