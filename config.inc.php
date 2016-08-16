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

  // customer id
  // e.g. D200001 for demonstration purposes only
  // for production mode, please use your personal customer id obtained by Wirecard
  $customerId = "D200001";

  // shop id
  // please use this parameter only if it is enabled by Wirecard
  $shopId = "seamless";

  // password for accessing the commands
  $password = "jcv45z";

  // secret
  // pre-shared key, used to sign the transmitted data
  // e.g. B8AKTPWBRMNBV455FG6M2DANE99WU2 for testing purposes
  // for production mode, please use your personal secret obtained by Wirecard
  $secret = "B8AKTPWBRMNBV455FG6M2DANE99WU2";

  // shortcut for selected language for all texts returned by a command
  $language = "en";

	//--------------------------------------------------------------------------------//

  // URLs for accessing the Wirecard Checkout Platform
  $URL_WIRECARD_CHECKOUT = "https://checkout.wirecard.com";
  $URL_APPROVE_REVERSAL = $URL_WIRECARD_CHECKOUT . "/seamless/backend/approveReversal";
  $URL_DEPOSIT = $URL_WIRECARD_CHECKOUT . "/seamless/backend/deposit";
  $URL_DEPOSIT_REVERSAL = $URL_WIRECARD_CHECKOUT . "/seamless/backend/depositReversal";
  $URL_GET_ORDER_DETAILS = $URL_WIRECARD_CHECKOUT . "/seamless/backend/getOrderDetails";
  $URL_RECUR_PAYMENT = $URL_WIRECARD_CHECKOUT . "/seamless/backend/recurPayment";
  $URL_REFUND = $URL_WIRECARD_CHECKOUT . "/seamless/backend/refund";
  $URL_REFUND_REVERSAL = $URL_WIRECARD_CHECKOUT . "/seamless/backend/refundReversal";
  $URL_TRANSFER_FUND = $URL_WIRECARD_CHECKOUT . "/seamless/backend/transferFund";

	//--------------------------------------------------------------------------------//

?>

