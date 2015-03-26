<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); 
include_once('../config/includes.php');
include_once('../libraries/phpseclib0.3.10/File/X509.php');
require_once('../libraries/phpseclib0.3.10/Crypt/RSA.php');

// Create key pair.
$rsa		= new Crypt_RSA();
$key		= $rsa->createKey();
$privkey	= new Crypt_RSA();
$privkey->loadKey($key['privatekey']);
$pubkey		= new Crypt_RSA();
$pubkey->loadKey($key['publickey']);
$pubkey->setPublicKey();

echo $key['privatekey']."<br>";
echo $key['publickey']."<br>";
// Create certificate request.
$csr		= new File_X509();
$csr->setPrivateKey($privkey);
$csr->setPublicKey($pubkey);
$csr->setDN('CN=www.example.org');
$csr->loadCSR($csr->saveCSR($csr->signCSR()));

// Set CSR attribute.
$csr->setAttribute('pkcs-9-at-unstructuredName', array('directoryString' => array('utf8String' => 'myCSR')), FILE_X509_ATTR_REPLACE);

// Set extension request.
$csr->setExtension('id-ce-keyUsage', array('encipherOnly'));

// Generate CSR.
echo $csr->saveCSR($csr->signCSR()) . "\n";