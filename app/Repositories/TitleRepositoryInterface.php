<?php
 namespace App\Repositories;
 
 interface TitleRepositoryInterface {
    
      public function getAllTitles();

      public function getTitle($id);
   
      public function setTitle($fetchedTitle);
      
   }

?>