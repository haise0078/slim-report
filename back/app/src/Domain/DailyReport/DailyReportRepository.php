<?php
declare(strict_types=1);

namespace App\Domain\DailyReport;

interface DailyReportRepository
{
    /**
     * @return void
     */
    public function createDailyReport(DailyReport $dailyReport): void;

    /**
     * @return array
     */
    public function findAll(): array;
}
