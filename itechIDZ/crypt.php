<?php 

// $key = 'asibvjb124weugvbr412124uv124bwei12ybwb1v';
// $msg = 'hello bobby';

$mc_d = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_CFB, '');

function EncryptData($input_text='', $secrert_key='')
{
	global $mc_d;
	$iv_s = mcrypt_enc_get_iv_size($mc_d);
	$iv = mcrypt_create_iv($iv_s, MCRYPT_RAND);

	mcrypt_generic_init($mc_d, $secrert_key, $iv);

	$encrypt_text = mcrypt_generic($mc_d, $input_text);

	mcrypt_generic_deinit($mc_d);

	return base64_encode($iv.$encrypt_text);
}

function DecryptData($input_text='', $secrert_key='')
{
	global $mc_d;

	$txt = base64_decode($input_text);

	$iv_s = mcrypt_enc_get_iv_size($mc_d);
	$iv = substr($txt, 0, $iv_s);

	$encrypted_text = substr($txt, $iv_s);

	mcrypt_generic_init($mc_d, $secrert_key, $iv);

	$decrypted_text = mdecrypt_generic($mc_d, $encrypted_text);

	mcrypt_generic_deinit($mc_d);

	return $decrypted_text;
}

// $cryp = EncryptData($msg, $key);
// $decryp = DecryptData($cryp, $key);

// echo $cryp;

// echo "<br><br>";

// echo $decryp;

?>