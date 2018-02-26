<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_tags`.
 * Has foreign keys to the tables:
 *
 * - `news`
 * - `tags`
 */
class m180103_111620_create_junction_table_for_news_and_tags_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_tags', [
            'news_id' => $this->integer(),
            'tags_id' => $this->integer(),
            'created_at' => $this->integer(),
            'PRIMARY KEY(news_id, tags_id)',
        ]);

        // creates index for column `news_id`
        $this->createIndex(
            'idx-news_tags-news_id',
            'news_tags',
            'news_id'
        );

        // add foreign key for table `news`
        $this->addForeignKey(
            'fk-news_tags-news_id',
            'news_tags',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );

        // creates index for column `tags_id`
        $this->createIndex(
            'idx-news_tags-tags_id',
            'news_tags',
            'tags_id'
        );

        // add foreign key for table `tags`
        $this->addForeignKey(
            'fk-news_tags-tags_id',
            'news_tags',
            'tags_id',
            'tags',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `news`
        $this->dropForeignKey(
            'fk-news_tags-news_id',
            'news_tags'
        );

        // drops index for column `news_id`
        $this->dropIndex(
            'idx-news_tags-news_id',
            'news_tags'
        );

        // drops foreign key for table `tags`
        $this->dropForeignKey(
            'fk-news_tags-tags_id',
            'news_tags'
        );

        // drops index for column `tags_id`
        $this->dropIndex(
            'idx-news_tags-tags_id',
            'news_tags'
        );

        $this->dropTable('news_tags');
    }
}
