<?php

namespace Liukangkun\Kuaishou;

use Liukangkun\Kuaishou\Kernel\AuthClient;
use Liukangkun\Kuaishou\Kernel\Exceptions\AuthException;


class Auth extends AuthClient
{
    /**
     * @param $authCode
     *
     * @return array|Kernel\Http\Response|Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Kernel\Exceptions\InvalidArgumentException
     *
     * @throws AuthException
     */
    public function getTokens($authCode)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'secret' => $this->getSecret(),
            'auth_code' => $authCode,
        ];

        return $this->httpPostJson('oauth2/authorize/access_token', $params);
    }

    /**
     * @param $refreshToken
     *
     * @return array|Kernel\Http\Response|Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface
     * @throws Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws AuthException
     */
    public function refreshTokens($refreshToken)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'secret' => $this->getSecret(),
            'refresh_token' => $refreshToken,
        ];

        return $this->httpPostJson('oauth2/authorize/refresh_token', $params);
    }


}
