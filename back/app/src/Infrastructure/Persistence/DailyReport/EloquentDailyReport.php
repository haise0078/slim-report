<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\DailyReport;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class EloquentDailyReport extends EloquentModel
{
    protected $table = 'DailyReport';

    protected $fillable = ['reportDate', 'taskLength', 'taskType', 'taskExplanation'];
}
