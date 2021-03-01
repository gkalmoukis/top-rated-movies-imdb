<?php
    namespace App\Repositories;

    use GuzzleHttp\Client;

    class ApiClientRepository implements ApiClientInterface{

        public function get($endpoint, $query = [] ){

            $client = new Client();
            
            $url = config('api.base_url').$endpoint;

            
            $response = $client->request(
                'GET',
                $url, 
                [
                    'headers' => config('api.headers'),
                    'query'   => $query
                ]
            );

            return $response->getBody()->getContents();
        }

    }
