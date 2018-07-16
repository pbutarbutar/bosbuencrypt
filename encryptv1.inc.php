<?php
/*
	encrypt V1. created By Parul
*/

class Tdmsencrypt {
	function Tdmsencrypt() {
	}	
	
	function encrypt($code, $key) {
		$num_key_cipher = $this->getRanKey();
		$cipher_method = $this->getCipherMethod($num_key_cipher);
		$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);	
		$genencode = openssl_encrypt($code, $cipher_method, $key, false, $iv);
		$code_encrypt = $this->getSalt8().$genencode.$num_key_cipher.$this->getSalt8();
		$re_encrypt = $this->encode_code($code_encrypt, $key);
		$end_encrypt = $this->getSalt8().$re_encrypt.$this->getSalt8();
		return $end_encrypt;
	}
	function decrypt($code_encrypt, $key) {
		$transalate = $this->do_transalate_first($code_encrypt);
		$transalate = $this->decode_code($transalate, $key);
		$extraxct_code = $this->transalate_encrypt($transalate);
		$new_code_encrypt = $extraxct_code["text_orginal"];
		$cihper_methode_key = $this->getCipherMethod($extraxct_code["key_methode"]);
		$decrypted = openssl_decrypt($new_code_encrypt, $cihper_methode_key, $key);
		return $decrypted;
	}
	function getCipherMethod($keyMethod) {
		switch ($keyMethod) {
			case "1":
				$method = "AES-256-CFB1";
				break;
			break;
			case "2":
				$method = "AES-128-CFB";
				break;
			break;
			case "3":
				$method = "AES-128-CFB1";
				break;
			break;
			case "4":
				$method = "AES-128-CFB8";
				break;
			break;
			case "5":
				$method = "AES-128-OFB";
				break;
			break;
			case "6":
				$method = "AES-256-CFB8";
				break;
			break;
			case "7":
				$method = "AES-256-OFB";
				break;
			break;
			case "8":
				$method = "aes-256-cbc";
				break;
			default:
				$method = "";
			break;
		}
		//echo $method;
		return $method;
	}
	
	function getSalt8() {
		return $this->randAlphaNum(8);
	}
	function getRanKey() {
		return rand (1,8);
	}
	function randAlphaNum($length) {
		$pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
		$key = "";
		for($i=0; $i < $length; $i++) {
			$key .= $pool[mt_rand(0, count($pool) - 1)];
		}
		return $key;
	}
	function encode_code($str, $kunci="") {
		$result = "";
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$result .= $karakter;     
		}
		return urlencode(base64_encode($result));
	}
	function decode_code($str, $kunci="") {
		$str = base64_decode(urldecode($str));
		$result = '';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$result .= $karakter;	
		}
		return $result;
	}
	function do_transalate_first($code) {
		return substr($code, 8, -8);
	}
	function transalate_encrypt($code) {
		$length = strlen($code);
		$str_orginal = substr($code, 8, -9);
		$str_right = substr($code,($length-9));
		$right_key = substr($str_right,0,1);
		return array("text_orginal"=>$str_orginal,"key_methode"=>$right_key);
	}
	
}



?>