<?php
require("Mail.php");
use PHPUnit\Framework\TestCase;

class MailTest extends TestCase
{

    public function testEmail_true()
    {
        $mail = new Mail();
        
        $this->assertSame('celia@test.fr', $mail->addRecipients('celia@test.fr'));
    
    }

    public function testEmail_false()
    {
        $mail = new Mail();

        $this->assertSame('Destinataire non valide !', $mail->addRecipients('celia@test'));
    
    }

    public function testCc_true()
    {
        $mail = new Mail();
        
        $this->assertSame('celia@test.fr', $mail->addCc('celia@test.fr'));
    
    }

    public function testCc_false()
    {
        $mail = new Mail();

        $this->assertSame('Cc non valide !', $mail->addCc('celia@test'));
    
    }

    public function testCci_true()
    {
        $mail = new Mail();
        
        $this->assertSame('celia@test.fr', $mail->addCci('celia@test.fr'));
    
    }

    public function testCci_false()
    {
        $mail = new Mail();

        $this->assertSame('Cci non valide !', $mail->addCci('celia@test'));
    
    }

    public function testFile_empty()
    {
        $mail = new Mail();

        $this->assertSame('Fichiers non valide !',  $mail->addFile([]));
    
    }

    public function testFile_Notempty()
    {
        $mail = new Mail();
        $file = [
            "name" => "file.png",
            "type" => "image/png",
            "size" => "454044",
            "tmp_name" => "./file.png"
        ];
        $this->assertSame($file,  $mail->addFile($file));
    
    }


    public function testFile_invalideExtension()
    {
        $mail = new Mail();
        $file = [
            "name" => "file.json",
            "type" => "application/json",
            "size" => "454044",
            "tmp_name" => "./file.png"
        ];
        $this->assertSame('Le format du fichier '.$file['name'].' n\'est pas valide !',  $mail->addFile($file));
    
    }


    public function testFile_invalideSize()
    {
        $mail = new Mail();
        $file = [
            "name" => "file.png",
            "type" => "image/png",
            "size" => "2097153",
            "tmp_name" => "./file.png"
        ];
        $this->assertSame('La taille du fichier '.$file['name'].' n\'est pas valide !',  $mail->addFile($file));
    
    }

    public function testSendmail_true()
    {
        $mail = new Mail();
        $mail->addRecipients('celiabellod@gmail.com');
        
        $this->assertTrue($mail->sendMail());
    
    }

    public function testSendmail_withoutRecipient()
    {
        $mail = new Mail();
       
        $this->assertSame('Le destinataire n\'est pas rempli !', $mail->sendMail());
    
    }
}
