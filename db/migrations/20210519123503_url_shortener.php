<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UrlShortener extends AbstractMigration
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
    public function change()
    {
        $shortener = $this->table('url_shortener');
        $shortener->addColumn('url', 'string', ['limit' => 25])
              ->addColumn('shortener', 'string', ['limit' => 25])
              ->addColumn('created', 'datetime')
              ->addColumn('updated', 'datetime', ['null' => true])
              ->addIndex(['url', 'shortener'], ['unique' => true])
              ->create();

    }
}
