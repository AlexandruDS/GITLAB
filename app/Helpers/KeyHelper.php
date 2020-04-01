<?php
/**
 * Created by PhpStorm.
 * User: penicamihai
 * Date: 03/06/2018
 * Time: 23:34
 */

namespace App\Helpers;


use Psy\Util\Json;

class KeyHelper
{


    public static function generateRandomString($length = 8)
    {
        $sub = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        return $sub;

    }

    public static function make2validhex($data)
    {
        $data = (string)$data;
        $len = strlen($data);
        if ($len % 2) {
            return substr($data, 0, $len - 1);
        }
        return $data;
    }

    // Generate key


    /**
     * @param $userId
     * @return Json
     */


    public static function generateKey($userId = NULL)
    {
        //$userId = 1;
        $key_length = 6;
        $matrix_length = 60;
        $min = 111111;
        $max = 999940;
        $nonce = rand($min, $max);
        $serial = rand($min, $max);
        $generated_private_key = self::generateRandomString($key_length);
        $generated_public_key = self::generateRandomString($key_length);
        $key = self::generateRandomString($matrix_length);
        $private_key = base64_encode($generated_private_key);
        $public_key = base64_encode($generated_public_key);
        $nonce_map = array();
        $final_key_map = array();

        for ($i = 0; $i < $matrix_length; $i++) {
            if ($i < $key_length) {
                $final_key_map[$i] = $generated_private_key[$i];
                $nonce_map[$i] = strval($nonce)[$i];

            }
            $key_map[$i] = $key[$i];
        }
        $chunk = array_chunk($key_map, $key_length);
        foreach ($nonce_map as $key => $value) {
            for ($i = 0; $i < $key_length; $i++) {

                $chunk[$key][$value] = $final_key_map[$key];


            }
        }
        foreach ($chunk as $key => $arrayItem) {

            $final_map[$key] = implode($arrayItem);
        }

        $data['user_id'] = $userId;
        $data['private_key'] = $private_key;
        $data['public_key'] = $public_key;
        $data['serial'] = $serial;
        $data['nonce'] = $nonce;
        $data['map'] = implode($final_map);


        return $data;
    }


    /**
     *
     */






    public static function getEncrypted($key = NULL, $value = NULL)
    {
        $cipher = "AES-128-ECB";
        //$value = dechex(150661);
        $pad = 16 - (strlen($value) % 16);
        $clear = $value . str_repeat(chr($pad), $pad);
       // $key ="VG8yNnlo";
        $hexkey = self::strToHex($key);
        //return $hexkey;


        $chiperRaw = openssl_encrypt($clear, $cipher, $hexkey, OPENSSL_ZERO_PADDING);
        $resultText = trim(base64_encode($chiperRaw));
        $resultHex = bin2hex($chiperRaw);


        return   $chiperRaw;

        // Decryption
        $key = 'd41d8cd98f00b204e9800998ecf8427e';
        $chiperRaw = base64_decode($ciphertext);
        $originalPlaintext = openssl_decrypt($chiperRaw, $cipher, $key, OPENSSL_ZERO_PADDING);

    }







    /**
     * @param $key
     * @return string
     * Used for generating onetime pass
     */

    public static function generateOTP($key)
    {

        $moment = date('Hi');
        $time = hex2bin($moment);
        $hmac = hash_hmac("sha1", $time, $key, false);
        $offset = hexdec(substr($hmac, strlen($hmac) - 1));
        $otp = (hexdec(substr($hmac, $offset * 2, 8)) & hexdec("7fffffff")) . "";
        $otp = substr($otp, strlen($otp) - 6, 6);


        return $otp;

    }


    public static function strToHex($string)
    {
        $hex = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0' . $hexCode, -2);
        }
        return strToUpper($hex);
    }

    public static function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }


}
