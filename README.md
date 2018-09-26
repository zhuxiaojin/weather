# 安装
composer require zhuxiaojin/weather
# 配置
在使用本扩展之前，你需要注册高德开放平台
然后创建应用，获取API KEY
# 使用
    use zhuxiaojin\Weather\Weather;
    $key='XXXXXXXXXXXXXXXXXXXXXXXXX';
    $weather=new Weather($key);
# 获取实时天气
    $response = $weather->getWeather('深圳');
### 示例
````
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "lives": [
        {
            "province": "广东",
            "city": "深圳市",
            "adcode": "440300",
            "weather": "中雨",
            "temperature": "27",
            "winddirection": "西南",
            "windpower": "5",
            "humidity": "94",
            "reporttime": "2018-08-21 16:00:00"
        }
    ]
}
````
## 获取近期天气预报（四天）
    $response = $weather->getWeather('深圳', 'all');

### 示例
```

{
    "status": "1", 
    "count": "1", 
    "info": "OK", 
    "infocode": "10000", 
    "forecasts": [
        {
            "city": "深圳市", 
            "adcode": "440300", 
            "province": "广东", 
            "reporttime": "2018-08-21 11:00:00", 
            "casts": [
                {
                    "date": "2018-08-21", 
                    "week": "2", 
                    "dayweather": "雷阵雨", 
                    "nightweather": "雷阵雨", 
                    "daytemp": "31", 
                    "nighttemp": "26", 
                    "daywind": "无风向", 
                    "nightwind": "无风向", 
                    "daypower": "≤3", 
                    "nightpower": "≤3"
                }, 
                {
                    "date": "2018-08-22", 
                    "week": "3", 
                    "dayweather": "雷阵雨", 
                    "nightweather": "雷阵雨", 
                    "daytemp": "32", 
                    "nighttemp": "27", 
                    "daywind": "无风向", 
                    "nightwind": "无风向", 
                    "daypower": "≤3", 
                    "nightpower": "≤3"
                }, 
                {
                    "date": "2018-08-23", 
                    "week": "4", 
                    "dayweather": "雷阵雨", 
                    "nightweather": "雷阵雨", 
                    "daytemp": "32", 
                    "nighttemp": "26", 
                    "daywind": "无风向", 
                    "nightwind": "无风向", 
                    "daypower": "≤3", 
                    "nightpower": "≤3"
                }, 
                {
                    "date": "2018-08-24", 
                    "week": "5", 
                    "dayweather": "雷阵雨", 
                    "nightweather": "雷阵雨", 
                    "daytemp": "31", 
                    "nighttemp": "26", 
                    "daywind": "无风向", 
                    "nightwind": "无风向", 
                    "daypower": "≤3", 
                    "nightpower": "≤3"
                }
            ]
        }
    ]
}
```
### 获取xml格式数据
 $response = $weather->getWeather('深圳', 'base','xml');

## 示例
``` 
<response>
    <status>1</status>
    <count>1</count>
    <info>OK</info>
    <infocode>10000</infocode>
    <lives type="list">
        <live>
            <province>广东</province>
            <city>深圳市</city>
            <adcode>440300</adcode>
            <weather>中雨</weather>
            <temperature>27</temperature>
            <winddirection>西南</winddirection>
            <windpower>5</windpower>
            <humidity>94</humidity>
            <reporttime>2018-08-21 16:00:00</reporttime>
        </live>
    </lives>
</response>
```
### 参数说明
 
    getWeather($city,$type='base',$format='json')
 
* city 城市名称
* type 数据类型-base:实时信息 all:最近四天天气
* format 返回数据格式：json  xml
## 在laravel中使用
安装方式相同，配置在config/services.php中
```
         'weather' => [
            'key' => env('WEATHER_API_KEY'),
        ],
```
然后在.env中

    WEATHER_API_KEY='#####################'

两种方式获取示例
#### 参数注入
``` 
 public function edit(Weather $weather) 
    {
        $response = $weather->getWeather('深圳');
    }
```
#### 服务名访问
```
   public function edit() 
    {
        $response = app('weather')->getWeather('深圳');
    }
```
### 参考
* [高德天气挨批接口](https://lbs.amap.com/api/webservice/guide/api/weatherinfo/)

### LICENSE

MIT


