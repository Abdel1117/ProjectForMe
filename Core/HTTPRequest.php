<?php

/**
 * Class to handle httprequest
 */
class HTTPRequest
{


    public function getmethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function postData($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function postExists($key)
    {
        return isset($_POST[$key]);
    }
    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
    public function getBody()
    {

        $body = [];

        if ($this->getmethod() === "post") {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        var_dump($_POST);
        var_dump($body);
        return $body;
    }
}