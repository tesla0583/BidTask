<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 13.09.2023
 * Time: 16:42
 */

namespace App\Http\Services;


use App\Http\Contexts\BidRequestContext;
use App\Http\Contexts\BidResponseContext;
use App\Http\Contexts\FilterBidContext;
use App\Mail\SendResponseEmail;
use App\Models\Bid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class BidService
{
    public function get(FilterBidContext $context): Collection
    {
        $query = Bid::query();

        if (!is_null($context->getStatus())) {
            $query->where('status', $context->getStatus());
        }

        if (!is_null($context->getDate())) {
            $query->where('created_at', $context->getDate());
        }

        return $query->get();
    }

    public function make(BidRequestContext $context): Bid
    {
        return Bid::create([
            'email' => $context->getEmail(),
            'message' => $context->getMessage(),
            'status' => Bid::STATUS_ACTIVE
        ]);
    }

    public function response(BidResponseContext $context): Bid
    {
        $bid = Bid::findOrFail($context->getBidId());

        $bid->update([
            'comment' => $context->getComment(),
            'status' => Bid::STATUS_RESOLVED
        ]);

        Mail::send(new SendResponseEmail($bid->email));

        return $bid;
    }
}