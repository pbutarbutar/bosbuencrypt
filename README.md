<html>
<body>
  
# bosbuencrypt<br>
openssl_encrypt<br>
(PHP 5 >= 5.3.0, PHP 7)<br>
openssl_encrypt — Encrypts data<br>


require_once "encryptv1.inc.php";<br>
$cryptoTDMS = new Tdmsencrypt();<br>

$codeencrypted = "blablabla";<br>
$key_password = ""; // Secret Password. Can change at any time. Password for development : 2OZo71f2q4ShraWppIyVeIV8e3Sjlq6To<br>


$decrypt_str = $cryptoTDMS->decrypt($codeencrypted, $key_password);<br>

Result format<br>
#CUSTCODE#INVNUM#INVDATE#INVTOT|ITEMCODE(1)#PART/SERVICE#QTY|ITEMCODE(2)#PART/SERVICE/QTY|ITEMCODE(3)#PART/SERVICE#QTY<br>
$result_str = $decrypt_str;<br>
</html>

