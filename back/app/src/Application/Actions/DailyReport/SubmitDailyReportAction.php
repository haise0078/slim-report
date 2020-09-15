<?php
declare(strict_types=1);

namespace App\Application\Actions\DailyReport;

use App\Application\Actions\ActionPayload;
use App\Domain\DailyReport\DailyReport;
use App\Domain\DailyReport\DailyReportRepository;
use Psr\Http\Message\ResponseInterface as Response;

class SubmitDailyReportAction extends DailyReportAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $dataList = $this->getFormData();
        foreach ($dataList as $data) {
            $dailyReport = new DailyReport((array)$data);
            $this->dailyReportRepository->createDailyReport($dailyReport);
        }
        $this->logger->info('report submitted');
        return $this->respond(new ActionPayload(200));
    }
}
