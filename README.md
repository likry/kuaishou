## 安装
```bash
composer require cloudycity/kuaishou-marketing-sdk:*
```

## 使用说明

### 授权

```php
use Liukangkun\Kuaishou\Auth;

// 获取token
$auth = new Auth(APPID, SECRET);
var_dump($auth->getTokens(AUTH_CODE));

// 刷新token
var_dump($auth->refreshTokens(REFRESH_TOKEN));
```

### 基础调用

参照[所有方法](#所有方法)

```php
$client = new Client(ADVERTISE_ID, TOKEN);
var_dump($client->advertiser->getInfo());
```

### 参照示例

组件提供了一个Interface [`Liukangkun\Kuaishou\Kernel\Contracts\KuaishouService`](src/Kernel/Contracts/KuaishouService.php)

这里以一个实现了Integerface的Service为例：

```php
use Liukangkun\Kuaishou\Client;
use App\Services\KuaishouService;

$apps = KuaishouService::getApps();

// 遍历开发者应用
foreach ($apps as $app) {

    $service = new KuaishouService($app['id'], $app['secret']);
    $advertiserIds = $service->getAdvertiserIds();

    // 遍历应用下授权的广告主
    foreach ($advertiserIds as $advertiserId) {
        $tokens = $service->getTokenByCache($advertiserId);
        $client = new Client($tokens['advertiser_id'], $tokens['access_token']);

        // 处理业务逻辑
        try {
            $result = $client->advertiser->getFunds();
        } catch(\Exception $e) {
            //
        }
    }
}
```

## 所有方法

广告主模块|执行方式
---|---
获取广告主信息|$client->advertiser->getInfo()
创建广告主余额|$client->advertiser->getFunds()
修改广告主流水|$client->advertiser->getFlows($params)

广告计划模块|执行方式
---|---
获取广告计划|$client->campaign->get($params)
创建广告计划|$client->campaign->create($params)
修改广告计划|$client->campaign->update($params)
更新计划状态|$client->campaign->updateStatus($campaignId, $status)

广告组|执行方式
---|---
获取广告组|$client->unit->get($params)
创建广告组|$client->unit->create($params)
修改广告组|$client->unit->update($params)
更新组出价|$client->unit->updateBid($unitId, $bid)
更新组预算|$client->unit->updateBudget($unitId, $budget)
更新组状态|$client->unit->updateStatus($unitId, $status)
获取深度转化类型|$client->unit->getConversionInfo()

广告创意|执行方式
---|---
获取创意列表|$client->creative->get($params)
创建广告创意|$client->creative->create($params)
修改创意信息|$client->creative->update($params)
更新创意状态|$client->creative->updateStatus($creativeId, $status)

数据报表|执行方式
---|---
广告主数据|$client->report->getAdvertiserReports($params)
广告计划数据|$client->report->getCampaignReports($params)
广告组数据|$client->report->getUnitReports($params)
广告创意数据|$client->report->getCreativeReports($params)

DMP 人群管理|执行方式
---|---
上传人群|$client->dmp->population->upload($params)
人群列表查询|$client->dmp->population->get($params)
删除人群包|$client->dmp->population->delete($id)
推送人群包|$client->dmp->population->push($id)

工具（文件管理）|执行方式
---|---
上传视频|$client->tool->file->uploadVideo($params)
获取视频列表|$client->tool->file->getVideos($params)
广告图片|$client->tool->file->uploadImage($params)
获取图片信息|client->tool->file->getImage($params)
获取图片列表|client->tool->file->getImages($params)

工具（动态词包）|执行方式
---|---
获取动态词包|$client->tool->creativeWord->get()
获取贴纸样式|$client->tool->creativeWord->getStyles()

工具（定向标签）|执行方式
---|---
获取定向标签|$client->tool->interestTag->get($type)

工具（应用定向）|执行方式
---|---
获取应用列表|$client->tool->app->get($params)
创建应用|$client->tool->app->create($params)
更新应用|$client->tool->app->update($params)
获取应用定向列表|$client->tool->app->search($appName)

工具（应用定向）|执行方式
---|---
获取地域信息|$client->tool->region->get()

工具（建站工具）|执行方式
---|---
获取落地页列表|$client->tool->landingPage->getPages($params)
获取组件列表|$client->tool->landingPage->getComponents($params)
获取线索列表|$client->tool->landingPage->getLeads($params)
更新线索|$client->tool->landingPage->updateLeads($params)
