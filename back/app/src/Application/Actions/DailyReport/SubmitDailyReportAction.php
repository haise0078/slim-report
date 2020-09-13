<?php
declare(strict_types=1);

namespace App\Application\Actions\DailyReport;

use App\Application\Actions\ActionPayload;
use App\Domain\DailyReport\DailyReport;
use Psr\Http\Message\ResponseInterface as Response;

class SubmitDailyReportAction extends DailyReportAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();
        var_dump($data);
        $dailyReport = new DailyReport((array)$data);
        $this->dailyReportRepository->createDailyReport($dailyReport);
        return $this->respond(new ActionPayload(200));
    }
}
