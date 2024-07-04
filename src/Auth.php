<?php

namespace Liukangkun\Kuaishou;

use Liukangkun\Kuaishou\Kernel\AuthClient;


class Auth extends AuthClient
{
    /**
     * 获取token
     * @param $authCode
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * 刷新token
     * @param $refreshToken
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
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
