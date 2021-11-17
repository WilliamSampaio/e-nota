<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Legislacao extends AbstractMigration
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
    CREATE TABLE `legislacao` (
    `codigo` int(10) NOT NULL auto_increment,
    `titulo` varchar(200) default NULL,
    `texto` text,
    `data` date default NULL,
    `arquivo` varchar(255) default NULL,
    `estado` char(1) default 'A' COMMENT 'A=ativo;I=inativo;',
    `tipo` char(1) default 'I' COMMENT 'N=nfe,I=iss;T=todos',
    PRIMARY KEY  (`codigo`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
    INSERT INTO `legislacao` VALUES (default,'Lei Municipal 2490/10 - Institui a Nota Fiscal Eletrônica de Serviços.','Institui a Nota Fiscal Eletrônica de Serviços, a Declaração Eletrônica de Serviços, dispõe sobre a geração e utilização de créditos tributários para tomadores de serviços, e de outras providências.','2010-12-24','63281.pdf','A','N');
    INSERT INTO `legislacao` VALUES (default,'Decreto 2654/11 - Regulamenta a Emissão da Nota Fiscal Eletrônica de Serviços','Regulamenta a emissão da Nota Fiscal Eletrônica de Serviços a NFS-e, a apresentação da Declaração Mensal de Serviços e da outras providências.','2011-02-24','51925.pdf','A','N');
    INSERT INTO `legislacao` VALUES (default,'Decreto 2702/11 - Regulamenta critérios para geração de créditos de ISS','Regulamenta critérios para geração de créditos aos tomadores de serviços sujeitos ao Imposto sobre Serviços de Qualquer Natureza - ISSQN do Município de Feliz.','2011-07-08','1843.pdf','A','N');
    */

    public function up(): void
    {
        $exists = $this->hasTable('legislacao');
        if ($exists) {
            $old_legislacao = $this->table('legislacao');
            $old_legislacao->rename('old_legislacao')->update();
        }

        $legislacao = $this->table('legislacao');
        $legislacao
            ->addColumn('titulo', 'string', ['limit' => 200, 'null' => true])
            ->addColumn('texto', 'text', ['null' => true])
            ->addColumn('data_criacao', 'date', ['null' => true])
            ->addColumn('arquivo', 'string', ['limit' => 200, 'null' => true])
            ->addColumn('estado', 'char', ['default' => 'A', 'limit' => 1, 'null' => true, 'comment' => 'A=ativo;I=inativo;'])
            ->addColumn('tipo', 'char', ['default' => 'I', 'limit' => 1, 'null' => true, 'comment' => 'N=nfe,I=iss;T=todos'])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_legislacao');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select(['titulo', 'texto', 'data', 'arquivo', 'estado', 'tipo', 'data', 'data'])
                ->from('old_legislacao');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert(['titulo', 'texto', 'data_criacao', 'arquivo', 'estado', 'tipo', 'created_at', 'updated_at'])
                ->into('legislacao')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('legislacao')->drop()->save();

        $exists = $this->hasTable('old_legislacao');
        if ($exists) {
            $legislacao = $this->table('old_legislacao');
            $legislacao->rename('legislacao')->update();
        }
    }
}
