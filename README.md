<html>
<body>
<pre>  

openssl_encrypt<br>
(PHP 5 >= 5.3.0, PHP 7)
openssl_encrypt — Encrypts data
<br>

require_once "encryptv1.inc.php";
$tdmsencrypt = new Tdmsencrypt();
$key_password = "2OZo71f2q4ShraWppIyVeIV8e3Sjlq6To";  
//Password can change at any time. Password for development : 2OZo71f2q4ShraWppIyVeIV8e3Sjlq6To

#To Encrypt String
#String => #CUSTCODE#INVNUM#INVDATE#INVTOT|ITEMCODE(1)#PART/SERVICE#QTY|ITEMCODE(2)#PART/SERVICE/QTY|ITEMCODE(3)#PART/SERVICE#QTY
$string_invoice = ""; 
$string_encrypt = $tdmsencrypt->encrypt($string_invoice, $key_password);


#To Decrypt String
$decrypt_str = $tdmsencrypt->decrypt($string_encrypt, $key_password);

//Format hasil Decrypt 
#CUSTCODE#INVNUM#INVDATE#INVTOT|ITEMCODE(1)#PART/SERVICE#QTY|ITEMCODE(2)#PART/SERVICE/QTY|ITEMCODE(3)#PART/SERVICE#QTY

<b>Argument</b>: 
#CUSTCODE => Header Data
|ITEMCODE(1) => Lines
|ITEMCODE(2) => Lines
|ITEMCODE(3) => Lines
</pre>
</body>

</html>

