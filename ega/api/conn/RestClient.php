<?php
    namespace ega\api\conn;
    class RestClient{
    
        private $server = "";
        private $port = "443";
        private $requestURI = "";
        private $conn = null;
        
        private function __construct(){ 
        }

        public static function init( $server, $port ){
            $instance = new self();
            $instance->server = $server;
            $instance->port = $port; 
            return $instance;
        }

        public static function closeConnection(){

            if( !is_null($this->conn) ){
                curl_close($this->conn);
            }
            $this->conn = null;

        }

        public function requestGET($urlPath, $SSL=true){
            
            if( is_null($this->conn) ){
                $this->conn = curl_init();
            }

            if( !is_null($this->conn) ) {

                if( $SSL == true){
                    curl_setopt($this->conn, CURLOPT_URL, "https://$this->server:$this->port/$urlPath");
                }else{
                    curl_setopt($this->conn, CURLOPT_URL, "http://$this->server:$this->port/$urlPath");
                }

                curl_setopt($this->conn, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($this->conn);

                if ($response === false) {
                    $info = curl_getinfo($this->conn);
                    curl_close($this->conn);
                    die('error occured during curl exec. Additioanl info: ' . var_export($info));
                }

                if( !is_null($this->conn) ){
                    curl_close($this->conn);
                }

                $this->conn = null;

                return $response;
            }
        }

        public function requestPOST($urlPath, $msg, $SSL=true){

            if( !is_null($this->conn) ){

                if( $SSL == true){
                    curl_setopt($this->conn, CURLOPT_URL, "https://$this->server:$this->port/$urlPath");
                }else{
                    curl_setopt($this->conn, CURLOPT_URL, "http://$this->server:$this->port/$urlPath");
                }

                $playLoad = json_decode( array("customer" => $msg ));
                curl_setopt($this->conn, CURLOPT_POSTFIELDS, $playLoad);
                curl_setopt($this->conn, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($this->conn);

                if ($response === false) {
                    $info = curl_getinfo($this->conn);
                    curl_close($this->conn);
                    die('error occured during curl exec. Additioanl info: ' . var_export($info));
                }

                curl_close($this->conn);
                return $response;
            }
        }

        public function setHeader($headerArrays){

            if( is_null($this->conn) ){
                $this->conn = curl_init();
            }
            curl_setopt($this->conn, CURLOPT_HTTPHEADER, $headerArrays);

        }

    }


?>