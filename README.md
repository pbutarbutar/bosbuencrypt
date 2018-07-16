# bosbuencrypt
Encrypt for QRCode


require_once "encryptv1.inc.php";
$cryptoTDMS = new Tdmsencrypt();

$codeencrypted = "blablabla";
$key_password = ""; // Secret Password. Can change at any time
$decrypt_str = $cryptoTDMS->decrypt($codeencrypted, $key_password);

Result format
#CUSTCODE#INVNUM#INVDATE#INVTOT-#ITEMCODE(1)#QTY-#ITEMCODE(2)#QTY#ITEMCODE(3)#QTY
$result_str = $decrypt_str;

