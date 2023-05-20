<?php
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://shopping-service.herokuapp.com',
            'verify' => false,
        ]);

    $account = "cl2";

    try {
        $response = $client->request('GET', "/shopping_service/book/9782070541279/customer/cl2", []);

        echo $response->getStatusCode(); 
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); 
        
        $response_buy = $client->request('GET', "/shopping_service/book/9782070541279/quantity/15/customer/cl2");
        echo $response_buy->getStatusCode(); 
        echo $response_buy->getHeader('content-type')[0];
        echo $response_buy->getBody();
        
    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }
    
    try {
        $response = $client->request('GET', "/order_book/db/customer/" . $account, []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //They are X Book(s)

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

