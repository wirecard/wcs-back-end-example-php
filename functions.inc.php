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


	//--------------------------------------------------------------------------------//

  function computeFingerprint() {
    $seed = "";
    for ($i=0; $i<func_num_args(); $i++) {
      $seed .= func_get_arg($i);
    }
    return hash("sha512", $seed);
  }

	//--------------------------------------------------------------------------------//

  function serverToServerRequest($url, $params) {
    $postFields = "";
    foreach ($params as $key => $value) {
      $postFields .= $key . "=" . $value . "&";
    }
    $postFields = substr($postFields, 0, strlen($postFields)-1);

    $curl = curl_init();
  	curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_PORT, 443);
    curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
  	curl_setopt($curl, CURLOPT_POST, true);
  	curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
  	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  	$response = curl_exec($curl);
  	curl_close($curl);
    return $response;
  }

	//--------------------------------------------------------------------------------//

  function printRequestParameters($params) {
    echo '<p>The request has been initialized with the following values:</p>';
    echo '<table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">';
    foreach ($params as $key => $value) {
      echo '  <tr><td align="right"><b>' . $key . '</b></td><td>' . $value . '</td></tr>';
    }
    echo '</table>';
  }

	//--------------------------------------------------------------------------------//

  function printResponseParameters($response) {
    echo "<p>The Wirecard Checkout Platform returned the following values after executing the command:</p>";
    echo '<table border="1" bordercolor="lightgray" cellpadding="10" cellspacing="0">';
    foreach (explode('&', $response) as $keyvalue) {
      $param = explode('=', $keyvalue);
      if (sizeof($param) == 2) {
        $key = urldecode($param[0]);
        $value = urldecode($param[1]);
        echo "<tr><td align='right'><b>" . $key . "</b></td><td>" . $value . "</td></tr>\n";
      }
    }
    echo '</table>';
  }

	//--------------------------------------------------------------------------------//
?>

