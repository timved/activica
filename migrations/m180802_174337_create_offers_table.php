<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offers`.
 */
class m180802_174337_create_offers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{offers}}', [
            'id' => $this->primaryKey(),
            'offer_id' => $this->integer(),
            'offer_available' => $this->string(),
            'url' => $this->string(),
            'price' => $this->float(),
            'optprice' => $this->float(),
            'category_id' => $this->integer(),
            'picture' => $this->string(),
            'name' => $this->string(),
            'articul' => $this->string(),
            'vendor' => $this->string(),
            'description' => $this->string(),
            'status_new' => $this->string(),
            'status_action' => $this->string(),
            'status_top' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('offers');
    }
}
