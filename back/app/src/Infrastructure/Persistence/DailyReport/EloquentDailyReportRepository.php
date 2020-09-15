<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\DailyReport;

use App\Domain\DailyReport\DailyReport;
use App\Domain\DailyReport\DailyReportRepository;
use App\Infrastructure\Persistence\DailyReport\EloquentDailyReport;

class EloquentDailyReportRepository implements DailyReportRepository
{
    /**
     * {@inheritdoc}
     */
    public function createDailyReport(DailyReport $dailyReport): void
    {
        EloquentDailyReport::create(
            $dailyReport->getCreateData()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return EloquentDailyReport::select('reportDate', 'taskLength', 'taskType', 'taskExplanation')->get()->toArray();
    }
}