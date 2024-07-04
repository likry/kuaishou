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

    /**
     * 拉取token下授权的广告账户列表
     * @param $accessToken
     * @param $pageNo
     * @param $pageSize
     * @return array|bool|float|int|object|string|null
     * @throws Kernel\Exception\KuaishouException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function approvalList($accessToken, $pageNo = 1, $pageSize = 10)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'secret' => $this->getSecret(),
            'access_token' => $accessToken,
            'page_no' => $pageNo,
            'page_size' => $pageSize
        ];
        return $this->httpPostJson('oauth2/authorize/approval/list', $params);
    }
}
