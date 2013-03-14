<?php

require "vendor/autoload.php";

$app = new \Slim\Slim();

$app->get('/', function () {
    
    Zend_Loader::loadClass('Zend_Gdata');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
	Zend_Loader::loadClass('Zend_Gdata_App_AuthException');
	Zend_Loader::loadClass('Zend_Http_Client');


	try {
          $client = Zend_Gdata_ClientLogin::getHttpClient($email, $password,
                    Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME);
        } catch (Zend_Gdata_App_AuthException $ae) {
          exit("Error: ". $ae->getMessage() ."\nCredentials provided were email: [$email] and password [$password].\n");
        }
});

$app->run();