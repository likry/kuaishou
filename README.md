## 安装
```bash
composer require liukangkun/kuaishou:^1.0
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

//拉取token下授权广告账户
var_dump($auth->getAdvertisers(ACCESS_TOKEN));
```

### 基础调用

参照[所有方法](#所有方法)

```php
$client = new Client(ADVERTISE_ID, TOKEN);
var_dump($client->advertiser->getInfo());
```
## 所有方法

广告主模块|调用方法
---|---
获取广告主信息|$client->advertiser->getInfo()
获取广告账户余额信息|$client->advertiser->getFunds()
获取广告账户流水信息|$client->advertiser->getFlows($params)
账户日预算查询|$client->advertiser->getBudget()

广告计划模块|调用方法
---|---
获取广告计划|$client->campaign->get($params)
创建广告计划|$client->campaign->create($params)
修改广告计划|$client->campaign->update($params)
更新计划状态|$client->campaign->updateStatus($campaignId, $status)

广告组|调用方法
---|---
查询广告组|$client->unit->get($params)
创建广告组|$client->unit->create($params)
修改广告组|$client->unit->update($params)
修改广告组出价|$client->unit->updateBid($unitId, $bid)
修改广告组预算|$client->unit->updateBudget($unitId, $budget)
修改广告组状态|$client->unit->updateStatus($unitId, $status)

广告创意|调用方法
---|---
查询程序化创意|$client->creative->get($params)
创建程序化创意|$client->creative->create($params)
修改程序化创意|$client->creative->update($params)
修改创意状态|$client->creative->updateStatus($creativeId, $status)

数据报表|调用方法
---|---
广告主数据|$client->report->getAdvertiserReports($params)
广告计划数据|$client->report->getCampaignReports($params)
广告组数据|$client->report->getUnitReports($params)
广告创意数据|$client->report->getCreativeReports($params)

工具（文件管理）|调用方法
---|---
广告图片|$client->tool->file->uploadImage($params)
获取图片信息|client->tool->file->getImage($params)
获取图片列表|client->tool->file->getImages($params)
上传视频|$client->tool->file->uploadVideo($params)
文件流式上传|client->tool->file->streamUploadVideo($file)
文件分片上传|client->tool->file->chunkUploadVideo($file)
获取视频列表|$client->tool->file->getVideos($params)




