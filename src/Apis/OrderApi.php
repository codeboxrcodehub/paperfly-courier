<?php

namespace Codeboxr\PaperflyCourier\Apis;

use Codeboxr\PaperflyCourier\Exceptions\PaperflyException;
use GuzzleHttp\Exception\GuzzleException;

class OrderApi extends BaseApi
{
    /**
     * New Order Create
     *
     * @param $array
     * @return mixed
     * @throws PaperflyException
     * @throws GuzzleException
     */
    public function create($array)
    {
        $response = $this->authorization()->send("POST", "OrderPlacement", $array);
        return $response->success;
    }

    /**
     * Order Tracking
     *
     * @param $referenceNumber
     * @return mixed
     * @throws GuzzleException
     * @throws PaperflyException
     */
    public function tracking($referenceNumber)
    {
        $response = $this->authorization()
            ->send("POST", "API-Order-Tracking", [
                "ReferenceNumber" => $referenceNumber
            ]);
        return $response->success;
    }

    /**
     * invoice details
     *
     * @param $referenceNumber
     * @return mixed
     * @throws GuzzleException
     * @throws PaperflyException
     */
    public function invoice($referenceNumber)
    {
        $response = $this->authorization()->send("POST", "api/v1/invoice-details/", [
            "ReferenceNumber" => $referenceNumber
        ]);
        return $response->success;
    }

    public function cancel($referenceNumber)
    {
        $response = $this->authorization()->send("POST", "api/v1/cancel-order/", [
            "ReferenceNumber" => $referenceNumber
        ]);
        return $response;
    }

}
