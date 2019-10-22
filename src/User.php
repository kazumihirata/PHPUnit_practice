<?php

class User
{
    /**
     * @var string $firstName
     */
    public $firstName;

    /**
     * @var string $lastName
     */
    public $lastName;

    /**
     * @var string $email
     */
    public $email;

    /**
     * @var Mailer class
     */
    protected $mailer;


    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @return string FullName
     */
    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    /**
     * @param string $message
     * @return bool
     *
     * Mockをつかいたい。
     */
    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
//        return true;
    }
}