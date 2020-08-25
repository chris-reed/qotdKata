<?php


namespace App\Http\Helpers;

/**
 * Class Quotes
 * @package App\Http\Helpers
 */
class Quotes
{
    /**
     * @var array
     */
    public $all = [];

    /**
     * Quotes constructor.
     * @param array $new_quotes
     */
    public function __construct($new_quotes = [])
    {

        // load all quotes
        $this->all = $this->getQuotes();
        // attempt to load new quotes if an array is presented
        if (!empty($new_quotes)) {
            $this->all = $this->setQuotes($new_quotes);
        }
    }

    /**
     * Pull quotes from config file quotes.php
     * @return array
     */
    public function getQuotes()
    {
        $quotes = config('quotes');
        // make sure the array loaded correctly
        if ((is_null($quotes)) || (empty($quotes))) {
            $quotes = ['error' => 'error loading array.'];
        }
        return $quotes;
    }

    /**
     * Load a new set of quotes
     * @param array $new_quotes
     * @return bool
     */
    public function setQuotes($new_quotes)
    {
        $outcome = false;
        // check that there are enough data to cover an entire month.
        $check_count = count($new_quotes) >= 31;
        // check that new array keys match.
        $match_keys = array_intersect_key($new_quotes[0], $this->all[0]);
        if ($check_count && $match_keys === 2) {
            $outcome = true;
            $this->all = $new_quotes;
        }
        return $outcome;
    }

    /**
     * Returns quote for a specified date,
     * or if no date specified, returns today's quote
     * @param mixed $date
     * @return array
     */
    public function quotd($date = null)
    {
        $format = 'Y-m-d';
        // set quote as today's quote
        $quote = $this->all[date('d') - 1];
        if (!is_null($date)) {
            $date_check = \DateTime::createFromFormat($format, $date);
            // check to make sure it's a valid date.
            if ($date === $date_check->format($format)) {
                $quote = $this->all[$date_check->format('d') - 1];
            }
        }
        return $quote;
    }

    /**
     * returns a random quote
     * @return array
     */
    public function random()
    {
        $min = 0;
        $max = array_key_last($this->all);
        return $this->all[rand($min, $max)];
    }

    /**
     * Search quotes for given term
     * @param string $term
     * @return array
     */
    public function search($term = null)
    {
        $results = $this->all;
        if (!is_null($term)) {
            $results = [];
            foreach ($this->all as $key => $quote) {
                $term_check = strpos($quote['text'], $term);
                if ($term_check) {
                    array_push($results, $quote);
                }
            }
        }
        if(count($results) < 1){
            $results = ['message' => "No results found for '$term' "];
        }
        return $results;

    }
}