<?php

namespace Codeboxr\PaperflyCourier\Apis;

use Codeboxr\PaperflyCourier\Exceptions\PaperflyException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Codeboxr\PaperflyCourier\Exceptions\PaperflyValidationException;

class BaseApi
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var Client
     */
    private $request;

    /**
     * @var array
     */
    private $headers;

    public function __construct()
    {
        $this->setBaseUrl();
        $this->setHeaders();
        $this->request = new Client([
            'base_uri' => $this->baseUrl,
            'headers'  => $this->headers
        ]);
    }

    /**
     * Set Base Url on sandbox mode
     */
    private function setBaseUrl()
    {
        if (config("paperfly.sandbox") == true) {
            $this->baseUrl = "https://sandbox.paperfly-bd.com";
        } else {
            $this->baseUrl = "https://api.paperfly.com.bd";
        }
    }

    /**
     * Set Default Headers
     */
    private function setHeaders()
    {
        $this->headers = [
            "Accept"       => "application/json",
            "Content-Type" => "application/json",
        ];
    }


    /**
     * Authorization set to header
     *
     * @return $this
     */
    public function authorization()
    {
        $basicAuth = config("paperfly.username") . ":" . config("paperfly.password");

        $this->headers = [
            "Accept"        => "application/json",
            "Content-Type"  => "application/json",
            "paperflykey"   => config("paperfly.key"),
            'Authorization' => 'Basic ' . base64_encode($basicAuth)
        ];

        return $this;
    }

    /**
     * Sending Request
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     *
     * @return mixed
     * @throws GuzzleException
     * @throws PaperflyException
     */
    public function send($method, $uri, $body = [])
    {
        try {
            $response = $this->request->request($method, $uri, [
                "headers" => $this->headers,
                "body"    => json_encode($body)
            ]);
            return json_decode($response->getBody());
        } catch (ClientException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents());
            $message       = $errorResponse->error->message;
            $errors        = $response->errors ?? [];
            throw new PaperflyException($message, $e->getCode(), $errors);
        }
    }
    

    /**
     * Ecourier validation
     *
     * @param array $data
     * @param array $requiredFields
     *
     * @throws PaperflyValidationException
     */
    public function validation($data, $requiredFields)
    {
        if (!is_array($data) || !is_array($requiredFields)) {
            throw new \TypeError("Argument must be of the type array", 500);
        }

        if (!count($data) || !count($requiredFields)) {
            throw new PaperflyValidationException("Invalid data!", 422);
        }

        $requiredColumns = array_diff($requiredFields, array_keys($data));
        if (count($requiredColumns)) {
            throw new PaperflyValidationException($requiredColumns, 422);
        }

        foreach ($requiredFields as $filed) {
            if (isset($data[$filed]) && empty($data[$filed])) {
                throw new PaperflyValidationException("$filed is required", 422);
            }
        }

    }

}
