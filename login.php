  <!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>I-GPS</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

  <div style="position:absolute;z-index: 999;" align="center"><img src="logo.png" style="width:55%;height:auto;"/></div>
  <br /><br />  <br /><br />  <br /><br /><br /><br /><br /><br />
  <section id="content">
    

      <h1>I-GPS</h1>
<h5>The software that optimises train tours for tourists</h5>

<div align="center" class="col-xs-12">
<form id="fcompte" action="Pieces.php" method="post">
                     
                <div id="pieceCompteAjoute">
                </div>
                <input type="button" value="Add a city" onclick="ajouterPieceCompte()" />
                <input type="button" style="display:none" id="supCompte" value="Delete a city" onclick="supprimerPieceCompte()" /></p>
                 
</form>
</div>


  <script type="text/javascript">
  var zoneAjoutPieceCompte;
var nbPieceCompte=0;
function ajouterPieceCompte(){
    if(nbPieceCompte==0){ //si il s'agit du premier ajout
        zoneAjoutPieceCompte = document.getElementById('pieceCompteAjoute') //on séléctionne l'emplacement où on veux effectuer les ajouts de champs
        document.getElementById('supCompte').style.display='inline' //on rend disponible le bouton supprimer
    }
     
    //on ajoute un nouveau champ
    var input = document.createElement("input");
    input.type = "text";
    input.name = "pieceCompteAjoute["+nbPieceCompte+"]";
    input.id  = "username";
    input.placeholder = "City ";
    input.style.display = "block";
    zoneAjoutPieceCompte.appendChild(input);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "pieceCompteAjoute["+nbPieceCompte+"]";
    input.id  = "username";
    input.placeholder = "Number of day";
    input.style.display = "block";
    zoneAjoutPieceCompte.appendChild(input);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "pieceCompteAjoute["+nbPieceCompte+"]";
    input.id  = "username";
    input.placeholder = "Point of Interest";
    input.style.display = "block";
    zoneAjoutPieceCompte.appendChild(input);

    var element = document.createElement('hr');
    element.id="hrr";
    zoneAjoutPieceCompte.appendChild(element);

    nbPieceCompte++;
}
 
function supprimerPieceCompte(){
    nbPieceCompte--;
    zoneAjoutPieceCompte.removeChild(document.getElementById('username')) //on supprime le dernier champs ajouté
    zoneAjoutPieceCompte.removeChild(document.getElementById('username')) //on supprime le dernier champs ajouté
    zoneAjoutPieceCompte.removeChild(document.getElementById('username')) //on supprime le dernier champs ajouté
    zoneAjoutPieceCompte.removeChild(document.getElementById('hrr')) //on supprime le dernier champs ajouté
    if(nbPieceCompte==0){
    document.getElementById('supCompte').style.display='none';// on rend indisponible le bouton supprimer
    }
}
  </script>

      <div align="center">
        <input type="submit" value="Enjoy" id="submitt"/>
      </div>
      <br />
    </form><!-- form -->
    <div class="button">
      <a href="https://www.sbb.ch/en/home.html">SBB CFF FFC</a>
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>


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
    "Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJYNG05MllGS0F3cXI2dnhVMmV3RUM3aFlGLVlFSHRON3BpSmFlVVdHcEkwIn0.eyJqdGkiOiIwY2JiYzJhOC1kOWY5LTQxMmEtOTYxNi03M2IxZDhhMGE1OGMiLCJleHAiOjE1MTk0OTk2ODEsIm5iZiI6MCwiaWF0IjoxNTE5NDk3ODgxLCJpc3MiOiJodHRwczovL3Nzby5zYmIuY2gvYXV0aC9yZWFsbXMvU0JCX1B1YmxpYyIsImF1ZCI6IjIwMzA1N2VlIiwic3ViIjoiNDU4NmFjY2QtZjc5Yy00NzhkLTk0MjMtYjM0MDYxZTA4ODU2IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiMjAzMDU3ZWUiLCJhdXRoX3RpbWUiOjAsInNlc3Npb25fc3RhdGUiOiJkMzlmYTU4NC0zNTBkLTRhMWItYjFjMy1lMWMzMTExMzkxNmEiLCJhY3IiOiIxIiwiY2xpZW50X3Nlc3Npb24iOiJhZWEwNWIxYi1hMDlmLTQ5MjQtOGViNC01NmNlYjFlMTVkNGUiLCJhbGxvd2VkLW9yaWdpbnMiOltdLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsidW1hX2F1dGhvcml6YXRpb24iXX0sInJlc291cmNlX2FjY2VzcyI6eyJhcGltLWIycC1pbnQiOnsicm9sZXMiOlsiY29uc3VtZXIxIl19LCJhcGltLWJvb2tpbmctaW50Ijp7InJvbGVzIjpbInVzZXIiXX0sInNlcnZpY2Utc2tpZGFyLWRldiI6eyJyb2xlcyI6WyJ1c2VyIl19LCJhcGltLW5vdmFncC10ZXN0LWRlbHRhLWludCI6eyJyb2xlcyI6WyJub3ZhR1AiXX0sInNlcnZpY2Utc3JlYWV3LWZkcyI6eyJyb2xlcyI6WyJjbGllbnQtcm9sZSJdfSwiYXBpbS1mYmktdGVzdC1pbnQiOnsicm9sZXMiOlsidXNlciJdfSwiYXBpbS1mc3BnLWludCI6eyJyb2xlcyI6WyJ1c2VyIl19LCJhcGltLWZiaS1pbnQiOnsicm9sZXMiOlsidXNlciJdfSwiYWNjb3VudCI6eyJyb2xlcyI6WyJtYW5hZ2UtYWNjb3VudCIsInZpZXctcHJvZmlsZSJdfSwiYXBpbS1taXRhcmJlaXRlcmRhdGVuLWludCI6eyJyb2xlcyI6WyJ1c2VyIl19LCJzZXJ2aWNlLWFubWVsZGV0b29sLXByb2QiOnsicm9sZXMiOlsiY2xpZW50LXJvbGUiXX0sImFwaW0tZnNwZy10ZXN0LWludCI6eyJyb2xlcyI6WyJ1c2VyIl19fSwiY2xpZW50SG9zdCI6IjEwLjEuMjEuMSIsImNsaWVudElkIjoiMjAzMDU3ZWUiLCJuYW1lIjoiIiwicHJlZmVycmVkX3VzZXJuYW1lIjoic2VydmljZS1hY2NvdW50LTIwMzA1N2VlIiwiY2xpZW50QWRkcmVzcyI6IjEwLjEuMjEuMSIsImVtYWlsIjoic2VydmljZS1hY2NvdW50LTIwMzA1N2VlQHBsYWNlaG9sZGVyLm9yZyJ9.ImywNTnWMdMcw8nNdQwvD-5jLj2SjU7ID010SAXyJn0DJUeG-0NCKV_lLJKBRsygw0uoN0CiD2ABCvFUPXMucHt-ll2uzrnqTBWRblD8JluoUa_NPcVwXwAgRaPaHf2Pc5oVtiaKLmyUN6oyLvtZyV4M779m7m98CphU36IcWwqxUwzHl7tZXWSo9KpW1U7BXJg3KXU6-CoDPsym0IC9QSpVkGYAI4ayajJLPSPxI-uqYTBz19ib0Q7eQT5lc936AOdZnmLweFfKC4yFSmgw-W7KdwuyjjL7pl8TbmjjEs4dkrbV6aaBAkdJtG4v5ZPo98K32HevTcXvFa_omRXfpQ",
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

?>