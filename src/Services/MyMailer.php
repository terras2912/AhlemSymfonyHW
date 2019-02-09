<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 09/02/2019
 * Time: 15:13
 */

namespace App\Services;


use Monolog\Logger;
use Psr\Log\LoggerInterface;

class MyMailer
{
    public function __construct(\Swift_Mailer $mailer,LoggerInterface $logger)
    {
        //echo "constracter called";
        $this->logger=$logger;
        $this->mailer=$mailer;
    }
    public function sendEmail(){
        //echo "email sent!!!";
        $message=new \Swift_Message('Hello First Homework Symfony by Ahlem');
        $message->setFrom('hugecoders.team@gmail.com');
        $message->setTo('promohotels2016@gmail.com');
        $message->addPart('Wecome To Exercice Mailer!!');
        $this->mailer->send($message);
        $this->logger->info("Mail sent!!!!");
    }

}