<?php
declare(strict_types=1);

namespace App\Application\Actions\DailyReport;

use App\Application\Actions\ActionPayload;
use App\Domain\DailyReport\DailyReport;
use Psr\Http\Message\ResponseInterface as Response;

class ListDailyReportAction extends DailyReportAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $dailyReportLists = $this->dailyReportRepository->findAll();
        $this->logger->info('report listed');
        return $this->respondWithData($dailyReportLists);
    }
}
