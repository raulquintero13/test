<?php 
// namespace Libs\Traits;

namespace Core\Libs\Traits;

trait Openssl{

    function encode($texto)
    {
        $pub_key = openssl_pkey_get_public(file_get_contents(__DIR__ . '/public.pem'));
        openssl_public_encrypt($texto, $encriptado, $pub_key, OPENSSL_PKCS1_PADDING);
        return base64_encode($encriptado);
    }

    function decode($texto)
    {
// var_dump($texto);die;
        $priv_key = openssl_pkey_get_private(file_get_contents(__DIR__ . '/private.pem'));
        $texto = base64_decode($texto);
        openssl_private_decrypt($texto, $desencriptado, $priv_key, OPENSSL_PKCS1_PADDING);
        return $desencriptado;
    }

}



