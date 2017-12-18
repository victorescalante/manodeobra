<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_Setup extends CI_Migration
{
    
    private function timestamps()
    {
        $this->dbforge->add_field(array(
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
    }

    public function up()
    {

        // create a user table for admin login

        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 80
            ),
            'user_login' => array(
                'type' => 'VARCHAR',
                'constraint' => 80
            ),
            'user_email' => array(
                'type' => 'VARCHAR',
                'constraint' => 80
            ),
            'user_password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        ));

        $this->timestamps();
        
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users');

        $this->db->set('created_at', 'NOW()', FALSE);
        $this->db->insert('users',
            array(
            'user_name' => 'Administrator',
            'user_login' => 'admin',
            'user_email' => 'admin@admin',
            'user_password' => password_hash('password', PASSWORD_DEFAULT)
            )
        );
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}