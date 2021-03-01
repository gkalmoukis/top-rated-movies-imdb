<?php
namespace App\Repositories;

use App\Repositories\TitleRepository;

class ImdbApiRepository extends ApiClientRepository {

    protected $titleRepository;

    function __construct(TitleRepository $repository)
    {   
        $this->titleRepository = $repository;
    }
    
    private function matchedId($string) {
        return ( preg_match('/\/title\/(\S*)\//', $string, $matches) ) ? $matches[1] : false; 
    }

    public function getTopRatedMovies() {
        $endpoint = "/title/get-top-rated-movies";
        
        return json_decode($this->get($endpoint));
    }

    public function getDetails($id) {
        $endpoint = "/title/get-details";
        
        $query = [
            "tconst" => $id
        ];
        
        return json_decode($this->get($endpoint, $query));
    }

    public function topRatedMovies() {

        foreach ( array_slice($this->getTopRatedMovies(), 0, 19)  as $key => $movie) {
            dump($this->getDetails($this->matchedId($movie->id)));
        }

        return $this->getTopRatedMovies();
        // foreach ($response as $item) {
        //     dump( $this->matchedId($item->id) );
        // }
        
    }

}
