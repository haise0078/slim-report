<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyNewMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('DailyReport');
        $table->addColumn('reportDate', 'date')
            ->addIndex('reportDate')
            ->addColumn('taskLength', 'time')
            ->addColumn('taskType', 'string', ['limit' => 20])
            ->addColumn('taskExplanation', 'string', ['limit' => 100])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();        
    }
}
