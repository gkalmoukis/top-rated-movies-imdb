<?php
namespace App\Repositories;

class ImdbApiRepository extends ApiClientRepository {
    
    public function getMostPopularMovies(){
        $endpoint = "/title/get-most-popular-movies";
        return $this->get($endpoint);
    }

}
