<html>
<body>
<pre>  
#bosbuencrypt
openssl_encrypt<br>
(PHP 5 >= 5.3.0, PHP 7)
openssl_encrypt — Encrypts data


require_once "encryptv1.inc.php";
$cryptoTDMS = new Tdmsencrypt();

$codeencrypted = "blablabla";
$key_password = ""; // Secret Password. Can change at any time. Password for development : 2OZo71f2q4ShraWppIyVeIV8e3Sjlq6To

$decrypt_str = $cryptoTDMS->decrypt($codeencrypted, $key_password);

Result $decrypt_str
#CUSTCODE#INVNUM#INVDATE#INVTOT|ITEMCODE(1)#PART/SERVICE#QTY|ITEMCODE(2)#PART/SERVICE/QTY|ITEMCODE(3)#PART/SERVICE#QTY

<b>Argument</b>: 
#CUSTCODE => Header Data
|ITEMCODE(1) => Lines
|ITEMCODE(2) => Lines
|ITEMCODE(3) => Lines
</pre>
</body>

</html>

