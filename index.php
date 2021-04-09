<?php

require("Mail.php");

$mail = new Mail();
$mail->addRecipients('celia@gmail.com');
$mail->addRecipients('benjamin@gmail.com');
$mail->addCc('jade@gmail.com');
$mail->addCc('test@gmail.com');
$mail->addCci('jade@gmail.com');
$mail->addCci('test@gmail.com');
$mail->addSubject('Test file');
$mail->addContentType('Content-type: text/HTML;charset=UTF-8');
$mail->addBody('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla ea mollitia eos explicabo laboriosam cum obcaecati enim omnis, distinctio hic cumque, eveniet rerum necessitatibus, autem nesciunt officiis ipsam tempore debitis.');
if(isset($_FILES) && !empty($_FILES)){
    foreach($_FILES as $file){
        $mail->addFile($file);
    }
}

$res = $mail->sendMail();
var_dump($res);
