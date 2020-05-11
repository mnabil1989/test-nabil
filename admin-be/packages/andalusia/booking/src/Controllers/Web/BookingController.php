<?php

namespace Andalusia\Booking\Controllers\Web;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index()
    {
        return view('booking::index');
    }
}
