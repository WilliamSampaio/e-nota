<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Tipo extends AbstractMigration
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
    CREATE TABLE IF NOT EXISTS `tipo` (
    `codigo` int(11) NOT NULL,
    `tipo` varchar(30) DEFAULT NULL,
    `nome` varchar(255) DEFAULT NULL
    ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
    */

    public function up(): void
    {
        $exists = $this->hasTable('tipo');
        if ($exists) {
            $old_legislacao = $this->table('tipo');
            $old_legislacao->rename('old_tipo')->update();
        }

        $legislacao = $this->table('tipo');
        $legislacao
            ->addColumn('tipo', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('nome', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_tipo');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'tipo',
                    'nome',
                    'now()',
                    'now()'
                ])
                ->from('old_tipo');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'tipo',
                    'nome',
                    'created_at',
                    'updated_at'
                ])
                ->into('tipo')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('tipo')->drop()->save();

        $exists = $this->hasTable('old_tipo');
        if ($exists) {
            $legislacao = $this->table('old_tipo');
            $legislacao->rename('tipo')->update();
        }
    }
}
