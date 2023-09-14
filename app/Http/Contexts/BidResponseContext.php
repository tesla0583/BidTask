<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 13.09.2023
 * Time: 16:41
 */

namespace App\Http\Contexts;


class BidResponseContext
{

    private $bidId;
    private $comment;

    public function __construct(int $bidId, string $comment)
    {
        $this->bidId = $bidId;
        $this->comment = $comment;
    }

    public function getBidId(): int
    {
        return $this->bidId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}