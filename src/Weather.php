<?php
/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2018/9/23
 * Time: 上午10:55
 */

namespace zhuxiaojin\Weather;


use GuzzleHttp\Client;
use zhuxiaojin\Weather\Exceptions\Exception;
use zhuxiaojin\Weather\Exceptions\HttpException;
use zhuxiaojin\Weather\Exceptions\InvalidArgumentException;

class Weather
{
    protected $key;
    protected $guzzleOptions = [];
    const URL = 'https://restapi.amap.com/v3/weather/weatherInfo';

    public function __construct(string $key) {
        $this->key = $key;
    }

    public function getHttpClient() {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions($arr = []) {
        $this->guzzleOptions = $arr;
    }

    public function getWeather($city, $type = 'base', $format = 'json') {
        if (!in_array(strtolower($format), ['json', 'xml'])) {
            throw new InvalidArgumentException('argument is not allow ' . $format);
        }
        if (!in_array(strtolower($type), ['all', 'base'])) {
            throw new InvalidArgumentException('argument is not allow ' . $format);
        }
        $query = array_filter([
            'city' => $city,
            'key' => $this->key,
            'output' => $format,
            'extensions' => $type
        ]);
        try {
            $response = $this->getHttpClient()->get(self::URL, [
                'query' => $query
            ])->getBody()->getContents();
            return 'json' == $format ? json_decode($response, true) : $response;
        } catch (Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

    }
}