<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use App\Repositories\ImdbApiRepository;
use App\Repositories\TitleRepository;
use Illuminate\Support\Facades\Artisan;

class TitleController extends Controller
{
    protected $titles;

    public function __construct(TitleRepository $titleRepository){
        $this->titles = $titleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('index', [
            "titles" => $this->titles->getAllTitles()
        ]);
    }

    public function fetch()
    {
        Artisan::call('imdb:fetch');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('show', [
            "title" => $this->titles->getTitle($id)
        ]);
    }
}
