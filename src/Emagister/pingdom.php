<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pingdom
 *
 * @author jcruz
 */
namespace Emagister;

use \Emagister\check;

class pingdom {
    //put your code here
    private $_mail;
    private $_password;
    private $_key;

    public function __construct($mail, $password, $key)
    {
        $this->_mail = $mail;
        $this->_password = $password;
        $this->_key = $key;
    }

    public function getStatus()
    {
        $curl = \curl_init();
          // Set target URL
        \curl_setopt($curl, CURLOPT_URL, "https://api.pingdom.com/api/2.0/checks");
          // Set the desired HTTP method (GET is default, see the documentation for each request)
        \curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
          // Set user (email) and password
        \curl_setopt($curl, CURLOPT_USERPWD, "$this->_mail:$this->_password");
          // Add a http header containing the application key (see the Authentication section of this document)
        \curl_setopt($curl, CURLOPT_HTTPHEADER, array("App-Key: $this->_key"));
          // Ask cURL to return the result as a string
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

          // Execute the request and decode the json result into an associative array
        $response = \json_decode(curl_exec($curl),true);

          // Check for errors returned by the API
        if (isset($response['error'])) {
            return \json_encode(array());
            exit;
        }

          // Fetch the list of checks from the response
        $checksList = $response['checks'];
          // Print the names and statuses of all checks in the list
        $checks = array();
        foreach ($checksList as $check) {
            $tmpCheck = new check();
            $tmpCheck->setNombre($check['name']);
            $tmpCheck->setStatus($check['status']);
            $checks[]= $tmpCheck;
            //print $check['name'] . " is " . $check['status'] . "\n";
        }
        return $checks;
    }
}
?>
