<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m240804_183940_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name'=> $this->string()->notNull(),
            'email'=>$this->string()->notNull()->unique(),
            'login'=> $this->string()->notNull()->unique(),
            'password'=> $this->string()->notNull(),
            'created_at'=>$this->timestamp()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
