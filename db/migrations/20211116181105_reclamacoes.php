<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Reclamacoes extends AbstractMigration
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
    CREATE TABLE `reclamacoes` (
    `codigo` int(10) NOT NULL auto_increment,
    `assunto` varchar(100) default NULL,
    `descricao` text,
    `especificacao` varchar(200) default '',
    `tomador_cnpj` varchar(20) default NULL,
    `tomador_email` varchar(200) default NULL,
    `rps_numero` varchar(100) default NULL,
    `rps_data` date default NULL,
    `rps_valor` float(10,2) default NULL,
    `emissor_cnpjcpf` varchar(200) default NULL,
    `datareclamacao` date default NULL,
    `estado` varchar(10) default NULL,
    `responsavel` varchar(100) default NULL,
    `dataatendimento` date default NULL,
    PRIMARY KEY  (`codigo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    */

    public function up(): void
    {
        $exists = $this->hasTable('reclamacoes');
        if ($exists) {
            $old_legislacao = $this->table('reclamacoes');
            $old_legislacao->rename('old_reclamacoes')->update();
        }

        $table = $this->table('reclamacoes');
        $table
            ->addColumn('assunto', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('descricao', 'text', ['null' => true])
            ->addColumn('especificacao', 'string', ['limit' => 200, 'null' => true])
            ->addColumn('tomador_cnpj', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('tomador_email', 'string', ['limit' => 200, 'null' => true])
            ->addColumn('rps_numero', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('rps_data', 'date', ['null' => true])
            ->addColumn('rps_valor', 'double', ['null' => true])
            ->addColumn('emissor_cnpj', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('data_reclamacao', 'date', ['null' => true])
            ->addColumn('data_atendimento', 'date', ['null' => true])
            ->addColumn('estado', 'string', ['limit' => 10, 'null' => true])
            ->addColumn('responsavel', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_reclamacoes');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'assunto',
                    'descricao',
                    'especificacao',
                    'tomador_cnpj',
                    'tomador_email',
                    'rps_numero',
                    'rps_data',
                    'rps_valor',
                    'emissor_cnpjcpf',
                    'datareclamacao',
                    'dataatendimento',
                    'estado',
                    'responsavel',
                    'datareclamacao',
                    'datareclamacao',
                ])
                ->from('old_reclamacoes');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'assunto',
                    'descricao',
                    'especificacao',
                    'tomador_cnpj',
                    'tomador_email',
                    'rps_numero',
                    'rps_data',
                    'rps_valor',
                    'emissor_cnpj',
                    'data_reclamacao',
                    'data_atendimento',
                    'estado',
                    'responsavel',
                    'created_at',
                    'updated_at',
                ])
                ->into('reclamacoes')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('reclamacoes')->drop()->save();

        $exists = $this->hasTable('old_reclamacoes');
        if ($exists) {
            $table = $this->table('old_reclamacoes');
            $table->rename('reclamacoes')->update();
        }
    }
}
