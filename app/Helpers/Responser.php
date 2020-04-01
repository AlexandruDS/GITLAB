<?php
/**
 * Created by PhpStorm.
 * Date: 18/01/2018
 * Time: 17:00
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Responser
{
    /**
     * Return a response object that contain the error code and
     * an array of error/s
     *
     * @param int $code Code to be put in the response object
     * @param string|array $errors Error or array of errors to be put
     * in the response object
     * @return mixed
     */
    public static function throwErrors($code = 400, $errors = 'Unknown error occurred!')
    {
        if (!is_array($errors)) {
            $errors = [$errors];
        }

        $data = [
            'code' => $code,
            'errors' => $errors
        ];


        return Response::json($data, $code);
    }
}