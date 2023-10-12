<?php

// Define constants for maximum number of requests and timeout period
define("MAX_REQUESTS", 10);
define("TIMEOUT", 60);

// Load data from JSON file into an array
$data = file_get_contents(__DIR__ . "/dos.json");
$data = json_decode($data, true);

// Check if the current IP address has made too many requests
if (isset($data[$_SERVER["REMOTE_ADDR"]])) {
    if (count($data[$_SERVER["REMOTE_ADDR"]]) >= MAX_REQUESTS) {
        // If too many requests have been made within the timeout period, block the request
        if (time() - $data[$_SERVER["REMOTE_ADDR"]][0] <= TIMEOUT) {
            http_response_code(429);
            die("Too many requests!");
        } else {
            // Otherwise, remove old requests from the array and add the current request
            $data[$_SERVER["REMOTE_ADDR"]][] = time();
            for ($i = 0; $i < count($data[$_SERVER["REMOTE_ADDR"]]) - MAX_REQUESTS; $i++) {
                array_shift($data[$_SERVER["REMOTE_ADDR"]]);
            }
        }
    } else {
        // If the maximum number of requests has not been reached, add the current request to the array
        $data[$_SERVER["REMOTE_ADDR"]][] = time();
    }
    // Add the current request to the array
    $data[$_SERVER["REMOTE_ADDR"]][] = time();
} else {
    // If no requests have been made from this IP address, add the current request to a new array
    $data[$_SERVER["REMOTE_ADDR"]] = array(
        time(),
    );
}

// Save the updated data to the JSON file
file_put_contents(__DIR__ . "/dos.json", json_encode($data));

// Paste the rest of the code here...
