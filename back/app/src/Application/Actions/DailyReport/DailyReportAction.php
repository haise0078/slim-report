<?php
declare(strict_types=1);

namespace App\Application\Actions\DailyReport;

use App\Application\Actions\Action;
use App\Domain\DailyReport\DailyReportRepository;
use Psr\Log\LoggerInterface;

abstract class DailyReportAction extends Action
{
    /**
     * @var DailyReportRepository
     */
    protected $dailyReportRepository;

    /**
     * @param LoggerInterface $logger
     * @param DailyReportRepository  $dailyReportRepository
     */
    public function __construct(LoggerInterface $logger, DailyReportRepository $dailyReportRepository)
    {
        parent::__construct($logger);
        $this->dailyReportRepository = $dailyReportRepository;
    }
}
