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

    /* - SQL ORIGINAL
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
            $old_table = $this->table('tipo');
            $old_table->rename('old_tipo')->update();
        }

        $table = $this->table('tipo');
        $table
            ->addColumn('tipo', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('nome', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $rows = [
            ['tipo' => 'prestador', 'nome' => 'Prestador'],
            ['tipo' => 'simples', 'nome' => 'Simples Nacional'],
            ['tipo' => 'empreiteira', 'nome' => 'Empreiteira'],
            ['tipo' => 'orgao_publico', 'nome' => 'Orgão Público'],
            ['tipo' => 'instituicao_financeira', 'nome' => 'Instituição Financeira'],
            ['tipo' => 'cartorio', 'nome' => 'Cartório'],
            ['tipo' => 'operadora_credito', 'nome' => 'Operadora de Crédito'],
            ['tipo' => 'grafica', 'nome' => 'Gráfica'],
            ['tipo' => 'contador', 'nome' => 'Contador'],
            ['tipo' => 'tomador', 'nome' => 'Tomador'],
            ['tipo' => 'diversao', 'nome' => 'Diversão Pública']
        ];

        $table->insert($rows)->save();
    }

    public function down(): void
    {
        $this->table('tipo')->drop()->save();

        $exists = $this->hasTable('old_tipo');
        if ($exists) {
            $table = $this->table('old_tipo');
            $table->rename('tipo')->update();
        }
    }
}
