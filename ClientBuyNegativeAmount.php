<?php
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://shopping-service.herokuapp.com',
            'verify' => false,
        ]);

    $account = "cl2";
    $isbn = "9782070541270";
    $quantity = -5;

    try {
        $response = $client->request('GET', "/shopping_service/book/".$isbn."/customer/".$account, []);

        echo $response->getStatusCode(); 
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); 
        
        $response_buy = $client->request('GET', "/shopping_service/book/".$isbn."/quantity/".$quantity."/customer/".$account);
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

