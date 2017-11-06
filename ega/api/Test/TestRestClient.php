<?php

    require_once("../conn/RestClient.php");

    //Search http
    $test = ega\api\conn\RestClient::init("164.115.32.76", "80");
    $response = $test->requestGET("search_virtuoso/api/dataset/query?dsname=vir_29_1497171729&path=vir_29_1497171729&loadAll=1&pageNo=0&limit=100&offset=0", false);
    echo "<pre>response1: $response </pre></br></br>";

    //Search http
    $response = $test->requestGET("search_virtuoso/api/dataset/query?dsname=vir_29_1497171729&path=vir_29_1497171729&loadAll=1&pageNo=2&limit=1&offset=0", false);
    echo "<pre>response2: $response </pre></br></br>";

    //Search https
    $test2 = ega\api\conn\RestClient::init("ws.ega.or.th", "443");
    $test2->setHeader(array('Consumer-Key: 8e2ed330-200d-4d7e-afea-8b240dfa986b', 'Content-Type: application/x-www-form-urlencoded'));
    $response = $test2->requestGET("ws/auth/validate?ConsumerSecret=Ea1hOqtJnG6&AgentID=1260300068146", true);
    echo "<pre>response3: $response </pre></br></br>";

?>