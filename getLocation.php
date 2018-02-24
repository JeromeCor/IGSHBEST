<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://booking-int.api-sbb.ch/api/locations?name=lausanne&access_token=curl%20https://sso.sbb.ch/auth/realms/SBB_Public/protocol/openid-connect/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJYNG05MllGS0F3cXI2dnhVMmV3RUM3aFlGLVlFSHRON3BpSmFlVVdHcEkwIn0.eyJqdGkiOiIzMzQ5YWU0NC00OGQ3LTQ1MzItODU4My05YzlhYTJiMzAxZDAiLCJleHAiOjE1MTk0OTE2ODIsIm5iZiI6MCwiaWF0IjoxNTE5NDg0NDgyLCJpc3MiOiJodHRwczovL3Nzby5zYmIuY2gvYXV0aC9yZWFsbXMvU0JCX1B1YmxpYyIsImF1ZCI6IjIwMzA1N2VlIiwic3ViIjoiNDU4NmFjY2QtZjc5Yy00NzhkLTk0MjMtYjM0MDYxZTA4ODU2IiwidHlwIjoiUmVmcmVzaCIsImF6cCI6IjIwMzA1N2VlIiwiYXV0aF90aW1lIjowLCJzZXNzaW9uX3N0YXRlIjoiN2E0OGI5ZTctOWFjNy00ZWI0LTk1YmYtZWVhZTZkOWEyODFiIiwiY2xpZW50X3Nlc3Npb24iOiI1MzI1ZWRlZS0zZjMwLTRiYzUtYTY0Yi0wNTVjMzIyMDg2YWIiLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsidW1hX2F1dGhvcml6YXRpb24iXX0sInJlc291cmNlX2FjY2VzcyI6eyJhcGltLWIycC1pbnQiOnsicm9sZXMiOlsiY29uc3VtZXIxIl19LCJhcGltLWJvb2tpbmctaW50Ijp7InJvbGVzIjpbInVzZXIiXX0sInNlcnZpY2Utc2tpZGFyLWRldiI6eyJyb2xlcyI6WyJ1c2VyIl19LCJhcGltLW5vdmFncC10ZXN0LWRlbHRhLWludCI6eyJyb2xlcyI6WyJub3ZhR1AiXX0sInNlcnZpY2Utc3JlYWV3LWZkcyI6eyJyb2xlcyI6WyJjbGllbnQtcm9sZSJdfSwiYXBpbS1mYmktdGVzdC1pbnQiOnsicm9sZXMiOlsidXNlciJdfSwiYXBpbS1mc3BnLWludCI6eyJyb2xlcyI6WyJ1c2VyIl19LCJhcGltLWZiaS1pbnQiOnsicm9sZXMiOlsidXNlciJdfSwiYWNjb3VudCI6eyJyb2xlcyI6WyJtYW5hZ2UtYWNjb3VudCIsInZpZXctcHJvZmlsZSJdfSwiYXBpbS1taXRhcmJlaXRlcmRhdGVuLWludCI6eyJyb2xlcyI6WyJ1c2VyIl19LCJzZXJ2aWNlLWFubWVsZGV0b29sLXByb2QiOnsicm9sZXMiOlsiY2xpZW50LXJvbGUiXX0sImFwaW0tZnNwZy10ZXN0LWludCI6eyJyb2xlcyI6WyJ1c2VyIl19fX0.TVY_5TdH6P3XmkFFsBhR_m9t5DFyQ6x4IYJzYmTjL0xDLhrxEjev0WMnrM3Ck5tt7AmO6Xm3rdeRSoJN5lSSTsTnJaVNfLyD771Zfg6Gk9qmC_SBTfX5Uov7TKwCS0lPOmsHWDCA7vGTFcrTnioxc9mcvEEAL4zWLPsedJ5mzJ4WdBA5y3jkTGD9KoQZ6ibb3BDtYe1QY73Hbxl9Fe6S6nOURnRbgGtEgNwWJrMkWYW9abcp5Cr0k7wLpMxPmjK35g1zdNU1XW4S40kLAMxgCMDF_5gR10ePhsJRkjNhG4xFFmeykyQMZabBtIHWpEbexNjT6fT5ZM-i9BMobmvs4Q",
    "Cache-Control: no-cache",
    "Postman-Token: 2f66fc56-e572-4846-b461-aa6d1e8977d2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 $donnees = json_decode($response, true);
 echo 'Name : '.$donnees[0]['name'].' - Id :'.$donnees[0]['id'].' - Longitude : '.$donnees[0]['lon'].' - Latitude :'.$donnees[0]['lat'];

//var_dump($donnees);
}




