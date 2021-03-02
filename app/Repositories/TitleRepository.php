<?php

namespace App\Repositories;

use App\Models\Title;

class TitleRepository implements TitleRepositoryInterface {
 
    public function getAllTitles()
    {
        $titles = Title::all();

        if(request()->filled('year')){
            $titles = $titles->where('release_year', request()->year);
        }
        
        return $titles;
        
    }

    public function getDistinctYears()
    {
        return Title::select('release_year')
            ->distinct()
            ->orderBy('release_year', 'asc')
            ->get();
    }
    
    public function getTitle($id)
    {
        return Title::where('imdb_id', $id)->firstOrFail();
    }
 
    public function setTitle($fetchedTitle)
    {
        return Title::updateOrCreate(
            [
                'imdb_id' =>  $fetchedTitle->imdb_id,
                'imdb_sort' =>$fetchedTitle->imdb_sort
            ],
            [
                'title' => $fetchedTitle->title,
                'image' => $fetchedTitle->image->url,
                'duration' => $fetchedTitle->runningTimeInMinutes,
                'release_year' => $fetchedTitle->year,
                'rating' => $fetchedTitle->rating
            ]
        );
    }


}