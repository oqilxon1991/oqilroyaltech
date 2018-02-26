<?php

use yii\db\Migration;

/**
 * Handles adding image to table `post`.
 */
class m180103_110715_add_image_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('news', 'image', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('news', 'image');
    }
}
