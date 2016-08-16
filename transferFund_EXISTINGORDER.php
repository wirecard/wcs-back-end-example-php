<?php
  //--------------------------------------------------------------------------------//
  //                                                                                //
  // Wirecard Checkout Seamless Commands                                            //
  //                                                                                //
  // Copyright (c) 2013                                                             //
  // Wirecard Central Eastern Europe GmbH                                           //
  // www.wirecard.at                                                                //
  //                                                                                //
  // THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY         //
  // KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE            //
  // IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A                     //
  // PARTICULAR PURPOSE.                                                            //
  //                                                                                //
  //--------------------------------------------------------------------------------//
  // THIS EXAMPLE IS FOR DEMONSTRATION PURPOSES ONLY!                               //
  //--------------------------------------------------------------------------------//
  // Please read the integration documentation before modifying this file.          //
  //--------------------------------------------------------------------------------//

  // loads the merchant specific parameters from the config file
	require_once("config.inc.php");

  // loads the required PHP functions
  require_once("functions.inc.php");

  // the order number used within this example
  $orderNumber = "23473341";

  // the amount to deposit
  $amount = 1;

  // the curency of the deposit amount
  $currency = "EUR";

  // the description of the order
  $orderDescription = "the description of the order...";

  // the fund transfer type
  $fundTransferType = "EXISTINGORDER";

  // the source order number used within this example
  $sourceOrderNumber = "23473341";

	// computes the fingerprint based on the request parameters
  $requestFingerprint = computeFingerprint($customerId, $shopId, $password,
                                           $secret, $language, $orderNumber,
                                           $orderDescription,
                                           $amount, $currency,
                                           $fundTransferType, $sourceOrderNumber);

  // sets all request parameters as assoziative array
  $request = array(
               "customerId" => $customerId,
               "shopId" => $shopId,
               "password" => $password,
               "language" => $language,
               "requestFingerprint" => $requestFingerprint,
               "orderNumber" => $orderNumber,
               "amount" => $amount,
               "currency" => $currency,
               "orderDescription" => $orderDescription,
               "fundTransferType" => $fundTransferType,
               "sourceOrderNumber" => $sourceOrderNumber
             );

  $response = serverToServerRequest($URL_TRANSFER_FUND, $request);
?>
<html>
  <head>
    <title>Wirecard Checkout Seamless Commands</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <h1>Wirecard Checkout Seamless Command: transferFund (EXISTINGORDER)</h1>
    <p>This is a very simple example of the Wirecard Checkout Seamless Commands for demonstration purposes only.</p>
   <?php
      printRequestParameters($request);
      printResponseParameters($response);
    ?>
  </body>
</html>
