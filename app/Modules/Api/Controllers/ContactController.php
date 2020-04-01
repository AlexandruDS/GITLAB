<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Modules\Api\Controllers
 */
class ContactController extends Controller
{
    function sendContactFooter(Request $request)
    {

        $to = "office@pathways-consulting.net";
        $subject = "Pathways Consulting | Solicitare contact footer";
        $message = "
            Nume: {$request->input('name')}<br>
            Telefon: {$request->input('phone')}<br>
            Limba: {$request->input('language_code')}
            ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <office@pathways-consulting.net>' . "\r\n";

        mail($to, $subject, $message, $headers);

    }

    function sendContact(Request $request)
    {

        $to = "office@pathways-consulting.net";
        $subject = "Pathways Consulting | Solicitare contact";
        $message = "
            Numele intreg: {$request->input('name')}<br>
            Email: {$request->input('email')}<br>
            Telefon: {$request->input('phone')}<br>
            Subiect: {$request->input('subject')}<br>
            Mesaj: {$request->input('message')}<br>
            Limba: {$request->input('language_code')}
            ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <office@pathways-consulting.net>' . "\r\n";

        mail($to, $subject, $message, $headers);

    }

}
