<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ProductService
{
    protected $apiURL = 'https://dummyjson.com/products';
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getProducts(): mixed
    {
        try {
            $response = $this->client->get($this->apiURL);

            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error('Error fetching products: ' . $e->getMessage());
            throw new \Exception('Failed to fetch products');
        }
    }

    public function searchProducts($query = ''): mixed
    {
        try {
            $response = $this->client->get($this->apiURL. "/search?q=$query");

            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error('Error fetching products: ' . $e->getMessage());
            throw new \Exception('Failed to fetch products');
        }
    }
}
