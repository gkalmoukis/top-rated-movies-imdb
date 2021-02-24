<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImdbApiRepository;

class TitlesController extends Controller
{
    protected $client;

    public function __construct(ImdbApiRepository $repository){
        $this->client = $repository;
    }

    public function index() {
        // $this->client->getMostPopularMovies()
        return view('welcome');
    }
}
