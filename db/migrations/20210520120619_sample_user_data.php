<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SampleUserData extends AbstractMigration
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
    public function up()
    {
        
        $rows = [
            [
              'id'    => 1,
              'username'  => 'ganesan',
              'password'  => '$2y$10$Hxlq4JFfgScEDRFnfPCRjuCIW6LHfbPddxI8ke4BfjloBJ.3yn.HS',
              'email'  => 'rmdganesan@gmail.com',
              'first_name'  => 'Ganesan',
              'last_name'  => 'Murugesan',
              'created'  => date('Y-m-d H:i:s')
            
            ],
            [
                'id'    => 2,
                'username'  => 'ganesan2',
                'password'  => '$2y$10$wjsgpj3oeNA2Jv1yAkb/fe8z4/JMJoYAP5QRCj8KeYYiw247i5WoS',
                'email'  => 'rmdganesan2@gmail.com',
                'first_name'  => 'Ganesan2',
                'last_name'  => 'Murugesan2',
                'created'  => date('Y-m-d H:i:s'),
              
              ],
              [
                  'id'    => 3,
                  'username'  => 'ganesan3',
                  'password'  => '$2y$10$Bz0M0MzLvP3A6TA/5RPYGuTgef/zu/OuHs0h6wTEZGKqh520B3KHG',
                  'email'  => 'rmdganesan3@gmail.com',
                  'first_name'  => 'Ganesan3',
                  'last_name'  => 'Murugesan3',
                  'created'  => date('Y-m-d H:i:s'),
                
                ],
                [
                    'id'    => 4,
                    'username'  => 'ganesan4',
                    'password'  => '$2y$10$efdVsmFmjOtRD2t2BUxwouSpWAF3YdtOb2YuCervGn1glc5KEZVMe',
                    'email'  => 'rmdganesan4@gmail.com',
                    'first_name'  => 'Ganesan4',
                    'last_name'  => 'Murugesan4',
                    'created'  => date('Y-m-d H:i:s'),
                  
                  ],
                  [
                      'id'    => 5,
                      'username'  => 'ganesan5',
                      'password'  => '$2y$10$efdVsmFmjOtRD2t2BUxwouSpWAF3YdtOb2YuCervGn1glc5KEZVMe',
                      'email'  => 'rmdganesan2@gmail.com',
                      'first_name'  => 'Ganesan5',
                      'last_name'  => 'Murugesan2',
                      'created'  => date('Y-m-d H:i:s'),
                    
                    ]
        ];

            $users = $this->table('users')
                ->insert($rows)
                ->save();

    }
    public function down()
    {
        $this->execute('DELETE FROM users');
    }
}
