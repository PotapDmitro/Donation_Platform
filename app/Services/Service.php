<?php

namespace App\Services;

use App\Repositories\WidgetRepository;

class Service
{
    public function __construct(public WidgetRepository $widgetRepository)
    {
    }

    /**
     * Get Data for Google Chart
     *
     * @return array
     */
    public function chartData(): array
    {
        $amountDate = $this->widgetRepository->allDate();
        $result = [];
        foreach ($amountDate as $date) {
            $result[$date->date] = $date->amount;
        };
        return $result;
    }

    /**
     * All time amount
     *
     * @return float
     */
    public function allSum(): float
    {
        return $this->widgetRepository->allAmount()->sumData;
    }

    /**
     * Top Donator (amount)
     *
     * @return float|null
     */
    public function topDonate(): ?float
    {
        return $this->widgetRepository->topAmount()?->amountDonator;
    }

    /**
     * Top Donator (name)
     *
     * @return string
     */
    public function topName(): string
    {
        return $this->widgetRepository->nameDonator()?->nameDonator;
    }

    /**
     * Get Last Month
     *
     * @return float
     */
    public function lastMonth(): float
    {
        $lastMonth = $this->widgetRepository->monthDate();
        $resultSumMonth = [];
        foreach ($lastMonth as $resultMonth) {
            $resultSumMonth[] += $resultMonth->amount;
        }
        return array_sum($resultSumMonth);
    }
}
