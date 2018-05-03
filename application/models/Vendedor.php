<?php

class Application_Model_Vendedor {
    public function fetchAll() {
        
        $url = "https://app.alegra.com/api/v1/sellers/";
        $client = new Zend_Http_Client($url);
        $client->setAuth('ingcarlosrivas20@gmail.com', '64bd477542d8bc12462b', Zend_Http_Client::AUTH_BASIC);

        try {

            $result = $client->request();
            //echo "call success:";
            //print_r($result->getVersion());
        }
// Step 4. handle exception
        catch (Zend_Http_Client_Exception $e) {
// catch Zend Http Client Exception
            echo "eror message:" . $e->getMessage();
            echo "trace: " . var_dump($e->getTrace(), true);
        }
        $ctype = $result->getHeader('Content-type');
        //echo $ctype;
        if (is_array($ctype))
            $ctype = $ctype[0];
        $body = $result->getBody();
        if ($ctype == 'application/json' || $ctype == 'text/xml') {
            //$body = json_decode ($body);
            $body = json_decode($body, True);
        }
        //$body == json_encode($body);
        return $body;
    }
}