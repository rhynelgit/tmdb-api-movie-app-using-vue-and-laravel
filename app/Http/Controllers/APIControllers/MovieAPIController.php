<?php

namespace App\Http\Controllers\APIControllers;

use GuzzleHttp;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class MovieAPIController
{    
    /**
    * Get Popular Movies Function - This function will return all the popular movies.
    * It uses GuzzleHttp PHP feeature to request an API from TMDB Server.
    * 
    */
    public function getPopularMovies($page)
    {        
        // Validating page number input when if it is numerical.
        if(!is_numeric($page))
        {
           return response(["Message" => "Invalid Page!"], 400); 
        }

        try {

            $client = new GuzzleHttp\Client;

            $response = $client->get('https://api.themoviedb.org/3/discover/movie?page='.$page.'&sort_by=popularity.desc&api_key='.env("TMDB_KEY"));  

            return response(
                       $response->getBody(), 
                       $response->getStatusCode()
                   ); 
 
        } catch (RequestException $e) {

            if ($e->hasResponse()) 
            {
                return response(
                   Psr7\Message::toString($e->getResponse()), 
                   400
                ); 
            }
        }
    }
    
    /**
    * Get Single Movie Function - This function will return a single movie. 
    * This will get a movie by id.
    * 
    */
    public function getSingleMovie($id)
    {        
        // Validating movie id input when if it is numerical.
        if(!is_numeric($id))
        {
           return response(["Message" => "Invalid Movie ID!"], 400); 
        }

        try {

            $client = new GuzzleHttp\Client;

            $response = $client->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.env("TMDB_KEY")); 

            return response(
                       $response->getBody(), 
                       $response->getStatusCode()
                   );  
 
        } catch (RequestException $e) {
            
            if ($e->hasResponse()) 
            {
                return response(
                   Psr7\Message::toString($e->getResponse()), 
                   400
                ); 
            }
        }
    }
}