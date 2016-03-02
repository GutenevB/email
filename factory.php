<?php
require "plugin/PHPMailer-master/PHPMailerAutoload.php";

interface Setting
{
    public function send($email);
}

class Email_mail implements Setting
{
    public function send($email)
    {
        // TODO: Implement send() method.
        $message = new PHPMailer();

        $message->isSMTP();

        $message->Host = 'smtp.mail.ru';

        $message->SMTPAuth = true;
        $message->Username = 'marcus071';
        $message->Password = 'zhanna159753';
        $message->SMTPSecure = 'ssl';
        $message->Port = '465';

        $message->CharSet = 'UTF-8';
        $message->From = 'marcus071@mail.ru';
        $message->FromName = 'Богдан';
        $message->addAddress("$email",'Bogdan');
        $message->isHTML(true);

        $message->Subject = 'Пробное сообщение';
        $message->Body = '<p><strong>Если ты читаешь, значит пришло</strong></p>';

        $message->AltBody = 'Альтернатива';

        if($message->send()){
            echo "OK";
        }else{
            echo "Error". $message->ErrorInfo;
        }
    }
}

class Email_yandex implements Setting
{
    public function send($email)
    {
        // TODO: Implement send() method.
        $message = new PHPMailer();

        $message->isSMTP();

        $message->Host = 'smtp.mail.ru';

        $message->SMTPAuth = true;
        $message->Username = 'marcus071';
        $message->Password = 'zhanna159753';
        $message->SMTPSecure = 'ssl';
        $message->Port = '465';

        $message->CharSet = 'UTF-8';
        $message->From = 'marcus071@mail.ru';
        $message->FromName = 'Богдан';
        $message->addAddress("$email",'Bogdan');
        $message->isHTML(true);

        $message->Subject = 'Пробное сообщение';
        $message->Body = '<p><strong>Если ты читаешь, значит пришло</strong></p>';

        $message->AltBody = 'Альтернатива';

        if($message->send()){
            echo "OK";
        }else{
            echo "Error". $message->ErrorInfo;
        }
    }
}

class Factory
{
    public function email_e()
    {
        $a = 1;
        if($a=1){
            $q = new Email_mail();
            $q ->send('bogdan.cifrovoi@gmail.com');
        }else{
            $r = new Email_yandex();
            $r ->send('bogdan.cifrovoi@gmail.com');
        }
    }
}

$q = new Factory();
$q->email_e();
