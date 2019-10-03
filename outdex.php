
<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$baseUrl = 'http://dev.livrariadummar.com.br/';

// echo "<pre>";

// $request = new SoapClient(
//     "{$baseUrl}soap/?wsdl&services=integrationAdminTokenServiceV1",
//     ['soap_version' => SOAP_1_2]
// );

// // Get authorization token
// $token = $request->integrationAdminTokenServiceV1CreateAdminAccessToken([
//     'username' => 'wsintegration',
//     'password' => 'admin123@'
// ]);

// // Create authorization header
// $opts = [
//     'http' => [
//         'header' => 'Authorization: Bearer ' . $token->result
//     ]
// ];
// $context = stream_context_create($opts);

// // Init SOAP client
// $soapClient = new SoapClient(
//     "{$baseUrl}soap/default?wsdl&services=catalogProductRepositoryV1",
//     ['version' => SOAP_1_2, 'stream_context' => $context]
// );

// $soapResponse = $soapClient->__getTypes();
// print_r($soapResponse);


// $result = $soapClient->customerCustomerRepositoryV1GetById(['customerId' => 1]);
// var_dump($result);


    $wsdl = 'https://www.livrariadummar.com.br/api/v2_soap/?wsdl';
    $proxy = new SoapClient($wsdl);

    $user = 'integracao';
    $key = 'g3eSaKEzKu8TZQ7WQDP3eKQD5dkPDC';

    $session  = current($proxy->login(['username' => $user, 'apiKey' => $key]));

    $filters  = array(
        // Get orders made today
        'filter' => array(),
        'complex_filter' => array(
            array(
            	'key' => 'created_at', 
            	'value' => 
            		array(
            			'key' => 'lteq', 
            			'value' => '2019-09-24'
            		)
            	)
        ),
    );

	$result = $proxy->directoryRegionList(
							(object)array(
								'sessionId' => $session,
								'country' => 'BR'
							)
						)->result;

	echo "<pre>";
	print_r($result);
	exit();

	?>
