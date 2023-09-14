<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 13.09.2023
 * Time: 16:41
 */

namespace App\Http\Contexts;


class BidRequestContext
{
    private $email;
    private $message;

    public function __construct(string $email, string $message)
    {
        $this->email = $email;
        $this->message = $message;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}