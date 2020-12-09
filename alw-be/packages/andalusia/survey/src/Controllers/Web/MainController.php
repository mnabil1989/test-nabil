<?php

namespace Andalusia\Survey\Controllers\Web;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index()
    {
        return view('survey::index');
    }
}