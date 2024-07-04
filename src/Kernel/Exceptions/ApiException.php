<?php

namespace Liukangkun\Kuaishou\Kernel\Exceptions;

use Psr\Http\Message\ResponseInterface;

class ApiException extends Exception
{
    /**
     * @var ResponseInterface|null
     */
    public $response;

    /**
     * @var mixed|null
     */
    public $formattedResponse;

    /**
     * @param $message
     * @param ResponseInterface|null $response
     * @param $formattedResponse
     * @param $code
     */
    public function __construct($message, ResponseInterface $response = null, $formattedResponse = null, $code = null)
    {
        parent::__construct($message, $code);

        $this->response = $response;
        $this->formattedResponse = $formattedResponse;

        if ($response) {
            $response->getBody()->rewind();
        }
    }
}
