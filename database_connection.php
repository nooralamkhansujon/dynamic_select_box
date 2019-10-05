<?php 
 //database_connection.php

 $connect = new PDO("mysql:host=localhost;dbname=dynamic_select_box;",'root','');

 function fill_select_box($connect,$category_id)
 {

      $query = "SELECT * FROM tbl_category WHERE  parent_category_id='".$category_id."'";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      $output = '';

      foreach($result as $row)
      {
          $output .='<option value="'.$row['category_id'].'">
           '.$row['category_name'].'
          </option>';
      }
      return $output;
 }

?>