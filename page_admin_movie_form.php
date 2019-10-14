<?php require_once 'init.php' ?>
<?php require_once 'include_admin_header.php';?>
  <form name="movie_form" action="class_admin_movie_form.php" method="GET">
    Enter movie title
    <br>
    <input type="text" name="title" placeholder="Title..">
    <br>
    Enter the total number of DVDs:
    <br>
    <input type="number" name="num_dvd" min="1"max=200>
    <br>
    Enter the total number of BDs:
    <br>
    <input type="number" name="num_bd" min="1"max=200>
    <br>
    Enter the movies producer:
    <br>
    <input type="text" name="producer" placeholder="Producer..">
    <br>
    Enter the movies director:
    <br>
    <input type="text" name="director" placeholder="Director..">
    <br>
    Enter the movies lead actors:
    <br>
    <textarea type="text" name="actors" placeholder="Ex: Seth Rogan, Bill Murray, and Emma Stone" ></textarea>
    <br>
    Enter the movies Category:
    <br>
    <input type="text" name="category" placeholder="Ex: Comedy">
    <br>
    <input type="submit" value="submit">
  </form>
<?php require_once 'include_admin_footer.php';?>
