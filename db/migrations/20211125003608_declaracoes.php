<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Declaracoes extends AbstractMigration
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

    /* - SQL ORIGINAL
    CREATE TABLE IF NOT EXISTS `declaracoes` (
    `codigo` int(11) NOT NULL,
    `declaracao` varchar(50) DEFAULT NULL
    ) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='tipos de declaracoes';
    */

    public function up(): void
    {
        $exists = $this->hasTable('declaracoes');
        if ($exists) {
            $old_table = $this->table('declaracoes');
            $old_table->rename('old_declaracoes')->update();
        }

        $table = $this->table('declaracoes');
        $table
            ->addColumn('declaracao', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $rows = [
            ['declaracao' => 'DES Consolidada'],
            ['declaracao' => 'DES Simplificada'],
            ['declaracao' => 'Simples Nacional'],
            ['declaracao' => 'MEI']
        ];

        $table->insert($rows)->save();
    }

    public function down(): void
    {
        $this->table('declaracoes')->drop()->save();

        $exists = $this->hasTable('old_declaracoes');
        if ($exists) {
            $table = $this->table('old_declaracoes');
            $table->rename('declaracoes')->update();
        }
    }
}
