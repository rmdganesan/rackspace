<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Users extends AbstractMigration
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
        $users = $this->table('users');
        $users->addColumn('username', 'string', ['limit' => 100])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('password_salt', 'enum', ['default' => 'password_hash,PASSWORD_DEFAULT', 'values' => ['md5', 'password_hash,PASSWORD_DEFAULT', 'password_hash,PASSWORD_BCRYPT']])
              ->addColumn('email', 'string', ['limit' => 100])
              ->addColumn('first_name', 'string', ['limit' => 30])
              ->addColumn('last_name', 'string', ['limit' => 30])
              ->addColumn('status', 'enum', ['default' => 'enabled', 'values' => ['enabled', 'disabled']])
              ->addColumn('created', 'datetime')
              ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addIndex(['username', 'email'], ['unique' => true])
              ->create();
    }
}
