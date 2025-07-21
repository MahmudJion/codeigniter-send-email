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
}