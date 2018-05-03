<?php

//require_once 'Zend/Rest/Client.php';

class Application_Model_Api {

    

    public function fetchAll() {
        
        $url = "https://app.alegra.com/api/v1/contacts/";
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
            $body = json_decode ($body);
        }
        //$body == json_encode($body);
        return $body;
    }

    public function find($id) {
        
        $url = "https://app.alegra.com/api/v1/contacts/";
        $url = $url . $id;
        $client = new Zend_Http_Client($url);
        $client->setAuth('ingcarlosrivas20@gmail.com', '64bd477542d8bc12462b', Zend_Http_Client::AUTH_BASIC);

        try {

            $result = $client->request();
           // echo "call success:";
         //   print_r($result->getBody());
        }
        catch (Zend_Http_Client_Exception $e) {

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
        
        
        
        
        return $body;
    }
    
    
    
    public function add($id,$name,$identification,$email,$phonePrimary,$phoneSecondary,$fax,$mobile,$observations,$address,$type,$seller,$term,$priceList) {
        
        $url = "https://app.alegra.com/api/v1/contacts/";
        $url = $url;
        
        /*$data=array ( 'name' => 'LOOOOOOOOOOOOOOOOOOLLL',
            'address' => array ( 'address' => 'dddd' ,'city' => 'dddd' ) ,
            'term' => array ( 'id' => '1' ,'name' => 'De contado' ,'days' => '0' ) ,
            );
        
         * 
         */
        
        $data=Array ('name' => 'Dedesdasdlkalassvnv', 
            'identification' => 'adsad' ,
            'email' => 'j@j.com' ,
            'phonePrimary' => 'k' ,
            'phoneSecondary' => 'j', 
            'fax' => 'bk' ,
            'mobile' => 'jb', 
            'observations' => 'Aqui estoy' ,
            'address' => Array ( 'address' => 'asdsdk' ,'city' => 'jkhjk' ) ,
            'type' => Array ( '0' => 'client' ,'1' => 'provider' ) ,
            'seller' => Array ( 'id' => '1' ) ,
            'term' => Array ( 'id' => '5' ) ,
            'priceList' => Array ( 'id' => '1' ) );
        
        $json = json_encode($data);
        
        $client = new Zend_Http_Client($url);
        $client->setAuth('ingcarlosrivas20@gmail.com', '64bd477542d8bc12462b', Zend_Http_Client::AUTH_BASIC);

        echo $data;
        echo $json;
        
        
        $body=$client->setRawData($json, 'application/json')->request('POST');
        return $body;
    }
    public function edit($id,$name,$identification,$email,$phonePrimary,$phoneSecondary,$fax,$mobile,$observations,$address,$type,$seller,$term,$priceList) {
        
        $url = "https://app.alegra.com/api/v1/contacts/";
        $url = $url;
        
        
        
        $data=Array ("id"=> $id,
    "name"=> $name,
    "identification"=> $identification,
    "email"=> $email,
    "phonePrimary"=> $phonePrimary,
    "phoneSecondary"=> $phoneSecondary,
    "fax"=> $fax,
    "mobile"=> $mobile,
    "observations"=> $observations,
    "address"=> $address,
    "type"=> $type,
    "seller"=> $seller,
    "term"=> $term,
    "priceList"=> $priceList,
               
        );
        
        $json = json_encode($data);
        
        $client = new Zend_Http_Client($url);
        $client->setAuth('ingcarlosrivas20@gmail.com', '64bd477542d8bc12462b', Zend_Http_Client::AUTH_BASIC);

        echo $data;
        echo $json;
        
        
        $result=$client->setRawData($json, 'application/json')->request('PUT');
        return $result;
    }
    public function delete($id) {
        
        $url = "https://app.alegra.com/api/v1/contacts/";
        $url = $url . $id;
        
        /*$data=array ( 'name' => 'LOOOOOOOOOOOOOOOOOOLLL',
            'address' => array ( 'address' => 'dddd' ,'city' => 'dddd' ) ,
            'term' => array ( 'id' => '1' ,'name' => 'De contado' ,'days' => '0' ) ,
            );
        
         * 
         */
        
        $data=array ("id"=> "4",);
        
        $json = json_encode($data);
        
        $client = new Zend_Http_Client($url);
        $client->setAuth('ingcarlosrivas20@gmail.com', '64bd477542d8bc12462b', Zend_Http_Client::AUTH_BASIC);

        echo $data;
        echo $json;
        
        
        $result= $client->setRawData('application/json')->request('DELETE');
        return $result;
    }

}
