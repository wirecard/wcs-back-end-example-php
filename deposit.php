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

  // the basket item count
  $basketItems = 1;

  // the article number of basket item 1
  $basketItem1ArticleNumber = 42;

  // the quantity of basket item 1
  $basketItem1Quantity = 1;

  // the description of basket item 1
  $basketItem1Description = "TestBasketItem1";

  // the name of basket item 1
  $basketItem1Name = "BasketItem1";

  // the unit gross amount of basket item 1
  $basketItem1UnitGrossAmount = $amount;

  // the unit net amount of basket item 1
  $basketItem1UnitNetAmount = $amount * 0.8;

  // the unit tax amount of basket item 1
  $basketItem1UnitTaxAmount = $amount * 0.2;

  // the unit tax rate of basket item 1
  $basketItem1UnitTaxRate = 20;

	// computes the fingerprint based on the request parameters
  $requestFingerprint = computeFingerprint($customerId, $shopId, $password,
                                           $secret, $language, $orderNumber,
                                           $amount, $currency,
                                           $basketItems, $basketItem1ArticleNumber,
                                           $basketItem1Quantity, $basketItem1Description,
                                           $basketItem1Name, $basketItem1UnitGrossAmount,
                                           $basketItem1UnitNetAmount, $basketItem1UnitTaxAmount,
                                           $basketItem1UnitTaxRate);

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
               "basketItems" => $basketItems,
               "basketItem1ArticleNumber" => $basketItem1ArticleNumber,
               "basketItem1Quantity" => $basketItem1Quantity,
               "basketItem1Name" => $basketItem1Name,
               "basketItem1Description" => $basketItem1Description,
               "basketItem1UnitGrossAmount" => $basketItem1UnitGrossAmount,
               "basketItem1UnitNetAmount" => $basketItem1UnitNetAmount,
               "basketItem1UnitTaxAmount" => $basketItem1UnitTaxAmount,
               "basketItem1UnitTaxRate" => $basketItem1UnitTaxRate
             );

  $response = serverToServerRequest($URL_DEPOSIT, $request);
?>
<html>
  <head>
    <title>Wirecard Checkout Seamless Commands</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <h1>Wirecard Checkout Seamless Command: deposit</h1>
    <p>This is a very simple example of the Wirecard Checkout Seamless Commands for demonstration purposes only.</p>
   <?php
      printRequestParameters($request);
      printResponseParameters($response);
    ?>
  </body>
</html>
