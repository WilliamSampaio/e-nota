<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Notas extends AbstractMigration
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
    CREATE TABLE IF NOT EXISTS `notas` (
    `codigo` bigint(20) NOT NULL,
    `numero` int(10) DEFAULT NULL,
    `codverificacao` varchar(9) DEFAULT NULL,
    `datahoraemissao` datetime DEFAULT NULL,
    `codemissor` int(10) DEFAULT NULL,
    `codtomador` int(11) DEFAULT NULL,
    `rps_numero` varchar(20) DEFAULT NULL,
    `rps_data` date DEFAULT NULL,
    `tomador_nome` varchar(100) NOT NULL DEFAULT '',
    `tomador_cnpjcpf` varchar(18) NOT NULL DEFAULT '',
    `tomador_inscrmunicipal` varchar(20) DEFAULT NULL,
    `tomador_inscrestadual` varchar(255) DEFAULT NULL,
    `tomador_endereco` varchar(100) DEFAULT NULL,
    `tomador_logradouro` varchar(80) DEFAULT NULL,
    `tomador_numero` int(11) DEFAULT NULL,
    `tomador_complemento` varchar(80) DEFAULT NULL,
    `tomador_bairro` varchar(80) DEFAULT NULL,
    `tomador_cep` varchar(9) DEFAULT NULL,
    `tomador_municipio` varchar(100) DEFAULT NULL,
    `tomador_uf` char(2) DEFAULT NULL,
    `tomador_email` varchar(100) DEFAULT NULL,
    `discriminacao` varchar(400) DEFAULT NULL,
    `observacao` text,
    `valortotal` double(10,2) DEFAULT NULL,
    `valordeducoes` float(10,2) DEFAULT NULL,
    `valoracrescimos` float(10,2) DEFAULT NULL,
    `basecalculo` double(10,2) DEFAULT NULL,
    `valoriss` float(10,2) DEFAULT NULL,
    `issretido` float(10,2) DEFAULT NULL COMMENT 'Valor do iss retido',
    `valorinss` float(10,2) DEFAULT NULL,
    `cofins` decimal(10,2) DEFAULT NULL,
    `contribuicaosocial` decimal(10,2) DEFAULT NULL,
    `aliqinss` float(10,2) DEFAULT NULL,
    `valorirrf` float(10,2) DEFAULT NULL,
    `aliqirrf` float(10,2) DEFAULT NULL,
    `deducao_irrf` float(11,2) DEFAULT NULL,
    `total_retencao` float(11,2) DEFAULT NULL,
    `credito` float(10,2) DEFAULT NULL,
    `pispasep` float(10,2) DEFAULT NULL,
    `estado` varchar(20) DEFAULT NULL COMMENT 'Estado da nfe, valores N  para normal, B boleto gerado, E nota escriturada',
    `tipoemissao` varchar(10) DEFAULT 'online' COMMENT 'Tipo da nfe emitida, "online" ou "importada"',
    `motivo_cancelamento` text CHARACTER SET utf8,
    `aliq_percentual` float(10,2) DEFAULT NULL,
    `id_municipio` int(11) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=3606 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    */

    public function up(): void
    {
        $exists = $this->hasTable('notas');
        if ($exists) {
            $old_table = $this->table('notas');
            $old_table->rename('old_notas')->update();
        }

        $table = $this->table('notas');
        $table
            ->addColumn('numero', 'integer', ['null' => true])
            ->addColumn('cod_verificacao', 'string', ['limit' => 9, 'null' => true])
            ->addColumn('cod_emissor', 'integer', ['null' => true])
            ->addColumn('cod_tomador', 'integer', ['null' => true])
            ->addColumn('rps_numero', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('rps_data', 'date', ['null' => true])
            ->addColumn('discriminacao', 'string', ['limit' => 400, 'null' => true])
            ->addColumn('observacao', 'text', ['null' => true])
            ->addColumn('valor_total', 'double', ['null' => true])
            ->addColumn('valor_deducoes', 'double', ['null' => true])
            ->addColumn('valor_acrescimos', 'double', ['null' => true])
            ->addColumn('base_calculo', 'double', ['null' => true])
            ->addColumn('valor_iss', 'double', ['null' => true])
            ->addColumn('iss_retido', 'double', ['null' => true])
            ->addColumn('valor_inss', 'double', ['null' => true])
            ->addColumn('cofins', 'double', ['null' => true])
            ->addColumn('contribuicao_social', 'double', ['null' => true])
            ->addColumn('aliq_inss', 'double', ['null' => true])
            ->addColumn('valor_irrf', 'double', ['null' => true])
            ->addColumn('aliq_irrf', 'double', ['null' => true])
            ->addColumn('deducao_irrf', 'double', ['null' => true])
            ->addColumn('total_retencao', 'double', ['null' => true])
            ->addColumn('credito', 'double', ['null' => true])
            ->addColumn('pispasep', 'double', ['null' => true])
            ->addColumn('aliq_percentual', 'double', ['null' => true])
            ->addColumn('estado', 'string', ['limit' => 20, 'null' => true, 'comment' => 'Estado da nfe, valores N  para normal, B boleto gerado, E nota escriturada'])
            ->addColumn('tipo_emissao', 'string', ['limit' => 10, 'null' => true, 'default' => 'online', 'comment' => 'Tipo da nfe emitida, "online" ou "importada"'])
            ->addColumn('motivo_cancelamento', 'text', ['null' => true])
            ->addColumn('id_municipio', 'integer', ['null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_notas');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'numero',
                    'codverificacao',
                    'codemissor',
                    'codtomador',
                    'rps_numero',
                    'rps_data',
                    'discriminacao',
                    'observacao',
                    'valortotal',
                    'valordeducoes',
                    'valoracrescimos',
                    'basecalculo',
                    'valoriss',
                    'issretido',
                    'valorinss',
                    'cofins',
                    'contribuicaosocial',
                    'aliqinss',
                    'valorirrf',
                    'aliqirrf',
                    'deducao_irrf',
                    'total_retencao',
                    'credito',
                    'pispasep',
                    'aliq_percentual',
                    'estado',
                    'tipoemissao',
                    'motivo_cancelamento',
                    'id_municipio',
                    'datahoraemissao',
                    'datahoraemissao'
                ])
                ->from('old_notas');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'numero',
                    'cod_verificacao',
                    'cod_emissor',
                    'cod_tomador',
                    'rps_numero',
                    'rps_data',
                    'discriminacao',
                    'observacao',
                    'valor_total',
                    'valor_deducoes',
                    'valor_acrescimos',
                    'base_calculo',
                    'valor_iss',
                    'iss_retido',
                    'valor_inss',
                    'cofins',
                    'contribuicao_social',
                    'aliq_inss',
                    'valor_irrf',
                    'aliq_irrf',
                    'deducao_irrf',
                    'total_retencao',
                    'credito',
                    'pispasep',
                    'aliq_percentual',
                    'estado',
                    'tipo_emissao',
                    'motivo_cancelamento',
                    'id_municipio',
                    'created_at',
                    'updated_at'
                ])
                ->into('notas')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('notas')->drop()->save();

        $exists = $this->hasTable('old_notas');
        if ($exists) {
            $table = $this->table('old_notas');
            $table->rename('notas')->update();
        }
    }
}
