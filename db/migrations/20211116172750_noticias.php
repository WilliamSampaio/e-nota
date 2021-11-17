<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Noticias extends AbstractMigration
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
    CREATE TABLE `noticias` (
    `codigo` int(11) NOT NULL auto_increment,
    `titulo` varchar(100) default '',
    `texto` varchar(500) default NULL,
    `data` date default NULL,
    `sistema` varchar(255) default NULL,
    PRIMARY KEY  (`codigo`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
    */

    public function up(): void
    {
        $exists = $this->hasTable('noticias');
        if ($exists) {
            $old_legislacao = $this->table('noticias');
            $old_legislacao->rename('old_noticias')->update();
        }

        $legislacao = $this->table('noticias');
        $legislacao
            ->addColumn('titulo', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('texto', 'string', ['limit' => 500, 'null' => true])
            ->addColumn('data_criacao', 'date', ['null' => true])
            ->addColumn('sistema', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['null' => true])
            ->addColumn('updated_at', 'timestamp', ['null' => true])
            ->create();

        $exists = $this->hasTable('old_noticias');
        if ($exists) {

            $namesQuery = $this->getQueryBuilder();
            $namesQuery
                ->select(['titulo', 'texto', 'data', 'sistema', 'data', 'data'])
                ->from('old_noticias');

            $builder = $this->getQueryBuilder();
            $builder
                ->insert(['titulo', 'texto', 'data_criacao', 'sistema', 'created_at', 'updated_at'])
                ->into('noticias')
                ->values($namesQuery)
                ->execute();
        }
    }

    public function down(): void
    {
        $this->table('noticias')->drop()->save();

        $exists = $this->hasTable('old_noticias');
        if ($exists) {
            $legislacao = $this->table('old_noticias');
            $legislacao->rename('noticias')->update();
        }
    }
}
