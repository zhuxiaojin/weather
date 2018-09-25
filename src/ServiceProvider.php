<?php
/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2018/9/25
 * Time: 上午11:17
 */

namespace zhuxiaojin\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register() {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });


        $this->app->alias(Weather::class, 'weather');
    }

    public function provides() {
        return [Weather::class, 'weather'];
    }
}