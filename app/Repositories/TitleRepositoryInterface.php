<?php
 namespace App\Repositories;

 interface TitleRepositoryInterface {
    
      public function getAllTitles();

      public function getDistinctYears();

      public function getTitle($id);
   
      public function setTitle($fetchedTitle);
      
   }

?>