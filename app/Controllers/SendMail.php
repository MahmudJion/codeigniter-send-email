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
        $validation = \Config\Services::validation();

        $validation->setRules([
            'mailTo'  => ['label' => 'Recipient Email', 'rules' => 'required|valid_email'],
            'subject' => ['label' => 'Subject', 'rules' => 'required'],
            'message' => ['label' => 'Message', 'rules' => 'required']
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            log_message('error', 'Email send failed: ' . json_encode($errors));
            return $this->response->setStatusCode(400)->setBody('Validation failed: ' . implode(', ', $errors));
        }

        $to      = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom(
            env('email.fromAddress', 'default@example.com'),
            env('email.fromName', 'Default Name')
        );
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            log_message('info', "Email sent to {$to} with subject '{$subject}'.");
            return $this->response->setStatusCode(200)->setBody('Email successfully sent');
        } else {
            $data = $email->printDebugger(['headers']);
            log_message('error', "Email send failed to {$to}: {$data}");
            return $this->response->setStatusCode(500)->setBody($data);
        }
    }

}
