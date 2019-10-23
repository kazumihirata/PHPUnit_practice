<?php

class WeatherMonitor
{
    /**
     * @var TemperatureService
     */
    protected $service;

    /**
     * WeatherMonitor constructor.
     * @param TemperatureService $service
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $start
     * @param string $end
     * @return int
     */
    public function getAverageTemperature(string $start, string $end)
    {
        $startTemp = $this->service->getTemperature($start);
        $endTmp = $this->service->getTemperature($end);

        return ($startTemp + $endTmp) / 2;
    }
}