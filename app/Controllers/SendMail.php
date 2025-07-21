<?php
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;

class SendMail extends Controller
{

    public function index()
	{
        return view('form_view');
    }

    public function sendMail()
    {
        $to      = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');

        if (! $to || ! $subject || ! $message) {
            return $this->response->setStatusCode(400)->setBody('Missing required fields');
        }

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('john@test.com', 'Confirm Registration');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return $this->response->setStatusCode(200)->setBody('Email successfully sent');
        } else {
            $data = $email->printDebugger(['headers']);
            return $this->response->setStatusCode(500)->setBody($data);
        }
    }

}
