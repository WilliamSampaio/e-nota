<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Servicos extends AbstractMigration
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
    CREATE TABLE IF NOT EXISTS `servicos` (
    `codigo` bigint(11) NOT NULL COMMENT 'Codigo do banco de dados para servicos',
    `codcategoria` int(11) DEFAULT NULL,
    `codservico` varchar(200) DEFAULT NULL COMMENT 'Codigo do servico pela prefeitura municipal',
    `descricao` text COMMENT 'Descricao do servico',
    `tipopessoa` varchar(10) DEFAULT NULL COMMENT 'Tipo de pessoa PJ Pessoa Juridica PF Pessoa Fisica',
    `aliquota` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota para servicos',
    `aliquotair` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota para servicos com iss retido',
    `aliquotainss` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota de INSS',
    `aliquotairrf` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliq. Imposto de Renda Retido na Fonte',
    `basecalculo` float(10,2) DEFAULT '0.00' COMMENT 'Base de calculo para ISS 0 igual ao preco servico',
    `incidencia` varchar(50) DEFAULT 'mensal' COMMENT 'incidencia do periodo do iss padrao eh mensal',
    `valor_rpa` float(10,2) DEFAULT '0.00',
    `datavenc` int(2) DEFAULT NULL COMMENT 'Data de vencimento do iss por dia',
    `docfiscal` varchar(50) DEFAULT NULL COMMENT 'Documento fiscal exigido',
    `estado` char(3) DEFAULT NULL COMMENT 'Estado do servico, valores A ou I'
    ) ENGINE=InnoDB AUTO_INCREMENT=375 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    */

    public function up(): void
    {
        $exists = $this->hasTable('servicos');
        if ($exists) {
            $old_legislacao = $this->table('servicos');
            $old_legislacao->rename('old_servicos')->update();
        }

        $table = $this->table('servicos');
        $table
            ->addColumn('cod_categoria', 'integer', ['null' => true])
            ->addColumn('cod_servico', 'string', [
                'limit' => 200, 
                'null' => true, 
                'comment' => 'Codigo do servico pela prefeitura municipal'])
            ->addColumn('descricao', 'text', [
                'null' => true, 
                'comment' => 'Descricao do servico'])
            ->addColumn('tipo_pessoa', 'string', [
                'limit' => 10,
                'null' => true, 
                'comment' => 'Tipo de pessoa PJ Pessoa Juridica PF Pessoa Fisica'])
            ->addColumn('aliquota', 'double', [
                'null' => true, 
                'default' => 0.00, 
                'comment' => 'Porcentagem de aliquota para servicos'])
            ->addColumn('aliquota_ir', 'double', [
                'null' => true, 
                'default' => 0.00, 
                'comment' => 'Porcentagem de aliquota para servicos com iss retido'])
            ->addColumn('aliquota_inss', 'double', [
                'null' => true, 
                'default' => 0.00, 
                'comment' => 'Porcentagem de aliquota de INSS'])
            ->addColumn('aliquota_irrf', 'double', [
                'null' => true, 
                'default' => 0.00, 
                'comment' => 'Porcentagem de aliq. Imposto de Renda Retido na Fonte'])
            ->addColumn('base_calculo', 'double', [
                'null' => true, 
                'default' => 0.00, 
                'comment' => 'Base de calculo para ISS 0 igual ao preco servico'])
            ->addColumn('incidencia', 'string', [
                'limit' => 50, 
                'null' => true,
                'default' => 'mensal', 
                'comment' => 'Incidencia do periodo do iss padrao eh mensal'])
            ->addColumn('valor_rpa', 'double', [
                'null' => true, 
                'default' => 0.00])
            ->addColumn('data_venc', 'integer', [
                'limit' => 2, 
                'null' => true, 
                'comment' => 'Data de vencimento do iss por dia'])
            ->addColumn('doc_fiscal', 'string', [
                'limit' => 50, 
                'null' => true, 
                'comment' => 'Documento fiscal exigido'])
            ->addColumn('estado', 'char', [
                'limit' => 3, 
                'null' => true, 
                'comment' => 'Estado do servico, valores A ou I'])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_servicos');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select([
                    'codcategoria',
                    'codservico',
                    'upper(descricao)',
                    'tipopessoa',
                    'aliquota',
                    'aliquotair',
                    'aliquotainss',
                    'aliquotairrf',
                    'basecalculo',
                    'incidencia',
                    'valor_rpa',
                    'datavenc',
                    'docfiscal',
                    'estado',
                    'now()',
                    'now()'
                ])
                ->from('old_servicos');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert([
                    'cod_categoria',
                    'cod_servico',
                    'descricao',
                    'tipo_pessoa',
                    'aliquota',
                    'aliquota_ir',
                    'aliquota_inss',
                    'aliquota_irrf',
                    'base_calculo',
                    'incidencia',
                    'valor_rpa',
                    'data_venc',
                    'doc_fiscal',
                    'estado',
                    'created_at',
                    'updated_at'
                ])
                ->into('servicos')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('servicos')->drop()->save();

        $exists = $this->hasTable('old_servicos');
        if ($exists) {
            $table = $this->table('old_servicos');
            $table->rename('servicos')->update();
        }
    }
}
