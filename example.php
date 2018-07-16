<?php
require_once "encryptv1.inc.php";
$cryptoTDMS = new Tdmsencrypt();

$codeencrypted = "blablabla";
$key_password = ""; // Secret Password. Can change at any time
$decrypt_str = $cryptoTDMS->decrypt($codeencrypted, $key_password);

/*
	Result format
	#CUSTCODE#INVNUM#INVDATE#INVTOT|ITEMCODE(1)#PART/SERVICE#QTY|ITEMCODE(2)#PART/SERVICE/QTY|ITEMCODE(3)#PART/SERVICE#QTY
*/
$result_str = $decrypt_str;


?>
