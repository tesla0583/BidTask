<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 13.09.2023
 * Time: 16:41
 */

namespace App\Http\Contexts;


class FilterBidContext
{
    private $status;
    private $date;

    public function __construct(string $status = null, string $date = null)
    {
        $this->status = $status;
        $this->date = $date;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }
}