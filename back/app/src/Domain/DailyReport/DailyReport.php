<?php
declare(strict_types=1);

namespace App\Domain\DailyReport;

use JsonSerializable;

class DailyReport implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $reportDate;

    /**
     * @var string
     */
    private $taskLength;

    /**
     * @var string
     */
    private $taskType;

    /**
     * @var string
     */
    private $taskExplanation;

    /**
     * @var string|null
     */
    private $created;

    /**
     * @var string|null
     */
    private $updated;

    /**
     * @param int|null  $id
     * @param string    $username
     * @param string    $firstName
     * @param string    $lastName
     */
    public function __construct(Array $dailyReport)
    {
        $this->setId(isset($dailyReport['id'])?$dailyReport['id']:null);
        $this->setReportDate($dailyReport['reportDate']);
        $this->setTaskLength($dailyReport['taskLength']);
        $this->setTaskType($dailyReport['taskType']);
        $this->setTaskExplanation($dailyReport['taskExplanation']);
        $this->setCreated(isset($dailyReport['created'])?$dailyReport['created']:null);
        $this->setUpdated(isset($dailyReport['updated'])?$dailyReport['updated']:null);
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return [
            'id' => $this->id,
            'reportDate' => $this->reportDate,
            'taskLength' => $this->taskLength,
            'taskType' => $this->taskType,
            'taskExplanation' => $this->taskExplanation,
            'created' => $this->created,
            'updated' => $this->updated,
        ];
    }
    
    /**
     * @return array
     */
    public function getCreateData(): array
    {
        return [
            'reportDate' => $this->reportDate,
            'taskLength' => $this->taskLength,
            'taskType' => $this->taskType,
            'taskExplanation' => $this->taskExplanation,
        ];
    }

    /**
     * @param int|null
     * @return void
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $reportDate
     * @return void
     */
    public function setReportDate(string $reportDate): void
    {
        $this->reportDate = $reportDate;
    }

    /**
     * @param string $taskLength
     * @return void
     */
    public function setTaskLength(string $taskLength): void
    {
        $this->taskLength = $taskLength;
    }

    /**
     * @param string $taskType
     * @return void
     */
    public function setTaskType(string $taskType): void
    {
        $this->taskType = $taskType;
    }

    /**
     * @param string $taskExplanation
     * @return void
     */
    public function setTaskExplanation(string $taskExplanation): void
    {
        $this->taskExplanation = $taskExplanation;
    }

    /**
     * @param string|null $created
     * @return void
     */
    public function setCreated(?string $created): void
    {
        $this->created = $created;
    }

    /**
     * @param string|null $updated
     * @return void
     */
    public function setUpdated(?string $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'reportDate' => $this->reportDate,
            'taskLength' => $this->taskLength,
            'taskType' => $this->taskType,
            'taskExplanation' => $this->taskExplanation,
            'created' => $this->created,
            'updated' => $this->updated,
        ];
    }
}
