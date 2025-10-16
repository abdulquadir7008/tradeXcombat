<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletDepositResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public function toArray($request)
    {
        return [
            'id'                  => $this->id,
            'deposit_method_id'  => $this->deposit_method_id,
            'sub_method_id'      => $this->sub_method_id,
            'amount'             => $this->amount,
            'currency'           => $this->currency,
            'converted_amount'   => $this->converted_amount,
            'converted_currency' => $this->converted_currency,
            'wallet_address'     => $this->wallet_address,
            'receiptFileUrl'        => $this->receiptFileUrl ? asset('storage/app/public/' . $this->receiptFileUrl) : null,
            'status'             => $this->status,
            'transaction_type' => $this->transaction_type,
            'created_at'         => $this->created_at->toDateTimeString(),
        ];
    }
}
