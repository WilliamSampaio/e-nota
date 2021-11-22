<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Logs extends AbstractMigration
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

    /*
    CREATE TABLE IF NOT EXISTS `logs` (
    `codigo` int(11) NOT NULL,
    `codusuario` int(11) DEFAULT NULL,
    `ip` varchar(100) DEFAULT NULL,
    `data` datetime DEFAULT NULL,
    `acao` varchar(100) DEFAULT NULL
    ) ENGINE=MyISAM AUTO_INCREMENT=6135 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
    */

    public function up(): void
    {
        $exists = $this->hasTable('logs');
        if ($exists) {
            $old_legislacao = $this->table('logs');
            $old_legislacao->rename('old_logs')->update();
        }

        $legislacao = $this->table('logs');
        $legislacao
            ->addColumn('cod_usuario', 'integer', ['limit' => 11, 'null' => true])
            ->addColumn('ip', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('acao', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_logs');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'codusuario',
                    'ip',
                    'acao',
                    'data',
                    'data'
                ])
                ->from('old_logs');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'cod_usuario',
                    'ip',
                    'acao',
                    'created_at',
                    'updated_at'
                ])
                ->into('logs')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('logs')->drop()->save();

        $exists = $this->hasTable('old_logs');
        if ($exists) {
            $legislacao = $this->table('old_logs');
            $legislacao->rename('logs')->update();
        }
    }
}
