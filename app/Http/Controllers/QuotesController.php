<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Quotes;

/**
 * Class QuotesController
 * @package App\Http\Controllers
 */
class QuotesController extends Controller
{
    /**
     * All available quotes.
     * @var Quotes
     */
    private $quotes;

    /**
     * QuotesController constructor. Loads the $quotes variable
     */
    public function __construct()
    {
        $this->quotes = new Quotes();

    }

    /**
     * Displays index page with default quote of the day.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('index')->with(
            ['quote'=> $this->quotes->quotd()]
        );
    }

    /**
     * returns quote of the day for specific date if date is given,
     * else sends today's quote of the day.
     * @param  mixed $date
     * @return false|string
     */
    public function quotd($date = null){
        return json_encode($this->quotes->quotd($date));
    }

    /**
     * provides a random quote from the pool of quotes.
     * @return false|string
     */
    public function random() {
        $random_quote = $this->quotes->random();
        return json_encode($random_quote);
    }

    /**
     * provides an array of quotes that match a given search term.
     * @param mixed $term
     * @return false|string
     */
    public function search($term = null) {
        $results = $this->quotes->search($term);
        return json_encode($results);
    }
}
