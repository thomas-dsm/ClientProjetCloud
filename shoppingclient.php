<?php
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://shopping-service.herokuapp.com',
            //For local use
            //'base_uri' => 'http://localhost:8080',
        ]);

    $account = "cl1";
    $isbn = "9782070541270";
    $quantity = 12;

    //BookReq
    try {
        $response = $client->request('GET', "/shopping_service/book/". $isbn."/customer/" . $account, []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //They are X Book(s)

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    //BookReq with Bad Book
    try {
        $response = $client->request('GET', "/shopping_service/book/9782070541269/customer/" . $account, []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //They are X Book(s)

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    //BookReq with Bad Customer
    try {
        $response = $client->request('GET', "/shopping_service/book/". $isbn."/customer/cl0", []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //They are X Book(s)

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    //BuyReq
    try {
        $response = $client->request('GET', "/shopping_service/book/". $isbn."/quantity/5/customer/" . $account, []);

        echo $response->getStatusCode(); //200
        echo $response->getHeader('content-type')[0];
        echo $response->getBody(); //Order of X Book(s) (isbn) has been created

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    //BuyReq with bad Book
    try {
        $response = $client->request('GET', "/shopping_service/book/9782070541269/quantity/5/customer/" . $account, []);

        echo $response->getStatusCode(); //404
        echo $response->getHeader('content-type')[0];
        echo $response->getBody();

    } catch (Exception $exception){
        echo $exception->getCode(); //404
        echo $exception->getMessage(); //Customer not found
    }

    echo "<br>";

    //BuyReq with Bad Customer
    try {
        $response = $client->request('GET', "/shopping_service/book/". $isbn."/quantity/5/customer/cl3", []);

        echo $response->getStatusCode();
        echo $response->getHeader('content-type')[0];
        echo $response->getBody();

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

    //BuyReq with Quantity equals 0
    try {
        $response = $client->request('GET', "/shopping_service/book/". $isbn."/quantity/0/customer/" . $account , []);

        echo $response->getStatusCode();
        echo $response->getHeader('content-type')[0];
        echo $response->getBody();

    } catch (Exception $exception){
        echo $exception->getCode();
        echo $exception->getMessage();
    }

    echo "<br>";

