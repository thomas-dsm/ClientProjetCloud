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
    $quantity = 15;
    $isbn2 = "9782070541271";
    $quantity2 = 5;

    //Show list of Book
    try {
        $response = $client->request('GET', "/book/db", []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //They are X Book(s)

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    try {
        $response = $client->request('GET', "/shopping_service/book/".$isbn."/customer/".$account, []);

        echo $response->getStatusCode(); 
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); 
         
       $response_livre2 = $client->request('GET', "/shopping_service/book/".$isbn2."/customer/".$acccount, []);

        echo $response_livre2->getStatusCode(); 
        echo $response_livre2->getHeader('content-type')[0];
        echo $response_livre2->getBody(); 
        
        $response_buy = $client->request('GET', "/shopping_service/book/".$account."/quantity/".$quantity."/customer/".$account);
        echo $response_buy->getStatusCode(); 
        echo $response_buy->getHeader('content-type')[0];
        echo $response_buy->getBody();
        
       $response_buy = $client->request('GET', "/shopping_service/book/".$isbn2."/quantity/".$quantity2."/customer/".$account);
        echo $response_buy->getStatusCode(); 
        echo $response_buy->getHeader('content-type')[0];
        echo $response_buy->getBody();
        
        
        $response = $client->request('GET', "/shopping_service/book/".$isbn."/customer/".$account, []);

        echo $response->getStatusCode(); 
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); 
         
       $response_livre2 = $client->request('GET', "/shopping_service/book/".$isbn2."/customer/".$account, []);

        echo $response_livre2->getStatusCode(); 
        echo $response_livre2->getHeader('content-type')[0];
        echo $response_livre2->getBody(); 
        
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

