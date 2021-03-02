<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\ImdbApiRepository;
use App\Repositories\TitleRepository;
use App\Helpers\RegularExpressionHelper;

class FetchFromApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imdb:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store in database.';

    protected $imdb;
    protected $titles;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImdbApiRepository $imdbRepository, TitleRepository $titleRepository)
    {
        parent::__construct();
        $this->imdb = $imdbRepository;
        $this->titles = $titleRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $topRatedMovies = $this->imdb->getTopRatedMovies();

        foreach ( array_slice($topRatedMovies, 0, 20)  as $key => $movie) {
            
            $fetchedTitle = $this->imdb->getDetails(RegularExpressionHelper::matchedId($movie->id));
            
            $fetchedTitle->imdb_id = RegularExpressionHelper::matchedId($movie->id);
            $fetchedTitle->imdb_sort = $key;
            $fetchedTitle->rating = $movie->chartRating;
            
            $this->titles->setTitle($fetchedTitle);
        }

        return 1;
    }
}
