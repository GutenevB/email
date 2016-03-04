<?php
require "plugin/PHPMailer-master/PHPMailerAutoload.php";
include "database.php";

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

class Email_gmail implements Setting
{
    public function send($email)
    {
        // TODO: Implement send() method.
        $message = new PHPMailer();

        $message->isSMTP();

        $message->Host = 'smtp.yandex.ua';

        $message->SMTPAuth = true;
        $message->Username = 'marcus071';
        $message->Password = 'zhanna159753';
        $message->SMTPSecure = 'ssl';
        $message->Port = '465';

        $message->CharSet = 'UTF-8';
        $message->From = 'marcus071@yandex.ua';
        $message->FromName = 'Богдан';
        $message->addAddress("$email",'Bogdan');
        $message->addAddress("marcus071@yandex.ru",'Bogdan');
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
    public static function e_email()
    {
        $db = DB::getInstance()->em_email();
        foreach ($db as $value){//print_r($value); - массив
            preg_match('/@([a-z]).([a-z])+/',$value[0],$qwe);//print_r($qwe[0]); - @gmail, @mail
            $val = substr($qwe[0],1);// echo $val."</ br>"; - gmail, mail
            $class = "Email_". $val;
            $obj = new $class;

            return $obj-> send($value[0]);
        }


    }
}
//
$q = new Factory();
$q->e_email();
//var_dump($q->e_email());
