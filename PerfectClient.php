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

    //Consulte sa liste de commande

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

