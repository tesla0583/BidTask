<?php

namespace App\Http\Controllers;

use App\Http\Contexts\FilterBidContext;
use App\Http\Requests\BidRequest;
use App\Http\Requests\ResponseRequest;
use App\Http\Resources\BidResource;
use App\Http\Services\BidService;
use Illuminate\Http\Request;

class BidController extends Controller
{
    private $bidService;

    public function __construct(BidService $bidService)
    {
        $this->bidService = $bidService;
    }

    public function index()
    {
        $context = new FilterBidContext(\request()->input('status'), \request()->input('date'));

        return BidResource::collection($this->bidService->get($context));
    }

    public function store(BidRequest $request)
    {
//        dd($request);
        return new BidResource($this->bidService->make($request->toContext()));
    }

    public function update(ResponseRequest $request)
    {
        return new BidResource($this->bidService->response($request->toContext()));
    }
}
