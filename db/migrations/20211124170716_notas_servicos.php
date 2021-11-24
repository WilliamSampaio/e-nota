<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class NotasServicos extends AbstractMigration
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
    CREATE TABLE IF NOT EXISTS `notas_servicos` (
    `codigo` int(11) NOT NULL,
    `codnota` int(11) DEFAULT NULL,
    `codservico` bigint(11) DEFAULT NULL,
    `basecalculo` double(10,2) DEFAULT NULL,
    `issretido` float(10,2) DEFAULT NULL,
    `iss` float(10,2) DEFAULT NULL,
    `discriminacao` text
    ) ENGINE=InnoDB AUTO_INCREMENT=3933 DEFAULT CHARSET=latin1;
    */

    public function up(): void
    {
        $exists = $this->hasTable('notas_servicos');
        if ($exists) {
            $old_legislacao = $this->table('notas_servicos');
            $old_legislacao->rename('old_notas_servicos')->update();
        }

        $table = $this->table('notas_servicos');
        $table
            ->addColumn('cod_nota', 'integer', ['null' => true])
            ->addColumn('cod_servico', 'integer', ['null' => true])
            ->addColumn('base_calculo', 'double', ['null' => true])
            ->addColumn('iss_retido', 'double', ['null' => true])
            ->addColumn('iss', 'double', ['null' => true])
            ->addColumn('discriminacao', 'text', ['null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_notas_servicos');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'codnota',
                    'codservico',
                    'basecalculo',
                    'issretido',
                    'iss',
                    'now()',
                    'now()'
                ])
                ->from('old_notas_servicos');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'cod_nota',
                    'cod_servico',
                    'base_calculo',
                    'iss_retido',
                    'iss',
                    'created_at',
                    'updated_at'
                ])
                ->into('notas_servicos')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('notas_servicos')->drop()->save();

        $exists = $this->hasTable('old_notas_servicos');
        if ($exists) {
            $table = $this->table('old_notas_servicos');
            $table->rename('notas_servicos')->update();
        }
    }
}
