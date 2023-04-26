<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /*
    |--------------------------------------------------------------------------
    | Protocol
    |--------------------------------------------------------------------------
    |
    | The mail sending protocol. Valid options: mail, sendmail, smtp
    |
    */
    public $protocol = 'smtp';

    /*
    |--------------------------------------------------------------------------
    | SMTP Host
    |--------------------------------------------------------------------------
    |
    | The hostname of your SMTP server.
    |
    */
    public $SMTPHost = 'smtp.gmail.com';

    /*
    |--------------------------------------------------------------------------
    | SMTP Port
    |--------------------------------------------------------------------------
    |
    | The SMTP port used by your server.
    |
    */
    public $SMTPPort = 465;

    /*
    |--------------------------------------------------------------------------
    | SMTP Timeout
    |--------------------------------------------------------------------------
    |
    | The SMTP connection timeout in seconds.
    |
    */
    public $SMTPTimeout = 30;

    /*
    |--------------------------------------------------------------------------
    | SMTP User
    |--------------------------------------------------------------------------
    |
    | The SMTP username for your email account.
    |
    */
    public $SMTPUser = 'your_email@example.com';

    /*
    |--------------------------------------------------------------------------
    | SMTP Password
    |--------------------------------------------------------------------------
    |
    | The SMTP password for your email account.
    |
    */
    public $SMTPPass = 'your_email_password';

    /*
    |--------------------------------------------------------------------------
    | SMTP Encryption
    |--------------------------------------------------------------------------
    |
    | The SMTP encryption method. Valid options: ssl, tls
    |
    */
    public $SMTPCrypto = 'ssl';

    /*
    |--------------------------------------------------------------------------
    | CRLF Replacement
    |--------------------------------------------------------------------------
    |
    | The replacement string for the newline characters. Valid options: "\r\n", "\n", "\r"
    |
    */
    public $CRLF = "\r\n";

    /*
    |--------------------------------------------------------------------------
    | Newline Replacement
    |--------------------------------------------------------------------------
    |
    | The replacement string for the newline characters. Valid options: "\r\n", "\n", "\r"
    |
    */
    public $newline = "\r\n";

    /*
    |--------------------------------------------------------------------------
    | Mail Type
    |--------------------------------------------------------------------------
    |
    | The type of email. Valid options: text, html
    |
    */
    public $mailType = 'text';

    /*
    |--------------------------------------------------------------------------
    | Character Set
    |--------------------------------------------------------------------------
    |
    | The character encoding scheme for the email.
    |
    */
    public $charset = 'UTF-8';

    /*
    |--------------------------------------------------------------------------
    | Word Wrap
    |--------------------------------------------------------------------------
    |
    | Enable word-wrap. Valid options: true, false
    |
    */
    public $wordWrap = true;

    /*
    |--------------------------------------------------------------------------
    | Wrap Length
    |--------------------------------------------------------------------------
    |
    | The number of characters to wrap at.
    |
    */
    public $wrapChars = 76;

    /*
    |--------------------------------------------------------------------------
    | Multi-Part Format
    |--------------------------------------------------------------------------
    |
    | The multi-part email format. Valid options: mixed, related
    |
    */
    public $multipart = 'mixed';

    /*
    |--------------------------------------------------------------------------
    | SMTP Keep Alive
    |--------------------------------------------------------------------------
    |
    | Enable persistent SMTP connections. Valid options: true, false
    |
    */
    public $SMTPKeepAlive = false;

    /*
    |--------------------------------------------------------------------------
    | SMTP Debug
    |--------------------------------------------------------------------------
    |
    | Enable SMTP debug information. Valid options: 0, 1, 2, 3, 4, 5
    |
    */
    public $SMTPDebug = 0;
}
