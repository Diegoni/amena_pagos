<?php

/*----------------------------------------------------------------------------
		Trabajar con certificados
----------------------------------------------------------------------------*/

function set_pkcs($doc, $pass)
{
	// Abrir el certificado
	$p12cert		= array();
	$file			= $doc;
	$pass			= $pass;
	$fd				= fopen($file, 'r');
	$p12buf			= fread($fd, filesize($file));
	
	echo $p12buf;
		
	fclose($fd);
	
	echo "<h1>Mi Primer Test</h1>";
	if (openssl_pkcs12_read($p12buf, $p12cert, $pass))
	{
		echo "Funciona";
	}
	else
	{
		echo "No funciona";
	}
	
	$privatekey		= $p12cert["pkey"];
	$res			= openssl_pkey_new();
	openssl_pkey_export($res, $p12cert["pkey"]);
	$publickey		= openssl_pkey_get_details($res);
	$publickey		= $publickey["key"];

	echo "	<h2>Private Key:</h2>
				$privatekey
				<br>
			<h2>Public Key:</h2>
				$publickey
				<BR>";

	$cleartext = htmlentities('<center><b>Texto HTML</b></center>');

	echo "	<h2>Original:</h2>
				$cleartext
				<BR><BR>";

	openssl_public_encrypt($cleartext, $crypttext, $publickey);

	echo "	<h2>Encriptada:</h2>
				$crypttext
				<BR><BR>";

	$PK2		= openssl_get_privatekey($p12cert["pkey"]);
	
	$Crypted	= openssl_private_decrypt($crypttext, $Decrypted, $PK2);
	if (!$Crypted) {
		$MSG	.= "<p class='error'>Imposible desencriptar ($CCID).</p>";
	}else{
		echo "<h2>Desencriptada:</h2>" . $Decrypted;
	}
}


function set_X509($doc, $pass)
{
	$cert		= file_get_contents($doc);
	$ssl		= openssl_x509_parse($cert);
	
	if(openssl_x509_check_private_key ($cert , $pass ))
	{
		echo "Funciona<br>";	
	}
	else
	{
		echo "No<br>";
	}
	
	foreach ($ssl as $key => $value) {
		echo "<b>KEY: ".$key."</b><br>";
		if(is_array($value))
		{
			echo "Array 2 Value:";
			foreach ($value as $key_2 => $value_2)
			{
				if(is_array($value_2))
				{
					echo "<br>----Array 3 Value:";
					foreach ($value_2 as $key_3 => $value_3)
					{
						echo "<br>----".$key_3." ".$value_3."<br>";
					}
				}
				else
				{
					echo "<br>--".$key_2." ".$value_2."<br>";	
				}
			}
		}
		else
		{
			echo "Value: ".$value."<br>";
		}
	}
}



/*----------------------------------------------------------------------------
		Post de datos
----------------------------------------------------------------------------*/


function post_curl($url_post, $datos_post)
{
	$ch			= curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $url_post);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	            	"CodigoComunidad=".$datos_post['CodigoComunidad']."&
	            	CantidadTransacciones=1&
	            	WindowPopUp=True");
	
	curl_exec ($ch);
	curl_close ($ch); 
}
	