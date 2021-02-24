<?php
    namespace App\Repositories;

    use GuzzleHttp\Client;

    class ApiClientRepository implements ApiClientInterface{

        public function get($endpoint){

            $client = new Client();
            $url = config('api.base_url').$endpoint;

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];

            
            $response = $client->request(
                'GET',$url, [
                    'headers' => config('api.headers')
                ]
            );

            return $response->getBody()->getContents();
        }

    }
