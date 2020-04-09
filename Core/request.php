<?php
    namespace Core;

    class Request
    {
        public $url;

        public function __construct()
        {
            $this->url = $_SERVER["QUERY_STRING"];
        }
    }

?>