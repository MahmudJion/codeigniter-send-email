<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;

class SendMailTest extends CIUnitTestCase
{
    use ControllerTester;

    public function testSendMailMissingFields()
    {
        $result = $this->withUri('http://localhost/sendmail/sendMail')
            ->controller(\App\Controllers\SendMail::class)
            ->execute('sendMail');

        $this->assertEquals(400, $result->response()->getStatusCode());
        $this->assertStringContainsString('Missing required fields', $result->response()->getBody());
    }

    public function testSendMailSuccess()
    {
        // Mock the email service
        $email = $this->getMockBuilder(\CodeIgniter\Email\Email::class)
            ->onlyMethods(['send'])
            ->getMock();
        $email->method('send')->willReturn(true);

        \Config\Services::injectMock('email', $email);

        $result = $this->withUri('http://localhost/sendmail/sendMail')
            ->controller(\App\Controllers\SendMail::class)
            ->execute('sendMail', [
                'mailTo' => 'test@example.com',
                'subject' => 'Test Subject',
                'message' => 'Test Message'
            ]);

        $this->assertEquals(200, $result->response()->getStatusCode());
        $this->assertStringContainsString('Email successfully sent', $result->response()->getBody());
    }

    public function testSendMailFailure()
    {
        // Mock the email service to fail
        $email = $this->getMockBuilder(\CodeIgniter\Email\Email::class)
            ->onlyMethods(['send', 'printDebugger'])
            ->getMock();
        $email->method('send')->willReturn(false);
        $email->method('printDebugger')->willReturn('Error sending email');

        \Config\Services::injectMock('email', $email);

        $result = $this->withUri('http://localhost/sendmail/sendMail')
            ->controller(\App\Controllers\SendMail::class)
            ->execute('sendMail', [
                'mailTo' => 'test@example.com',
                'subject' => 'Test Subject',
                'message' => 'Test Message'
            ]);

        $this->assertEquals(500, $result->response()->getStatusCode());
        $this->assertStringContainsString('Error sending email', $result->response()->getBody());
    }
}