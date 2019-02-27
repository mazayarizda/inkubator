<?php

use yii\db\Migration;

/**
 * Class m180208_025122_add_first_admin
 */
class m180208_025122_add_first_admin extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->execute('INSERT INTO `admin` (`id`, `username`, `email`, `nama`, `password_hash`, `password_reset_token`, `auth_key`, `avatar`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, \'root\', \'root@inkubator.com\', \'Super Admin\', \'$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he\', NULL, \'Pwys0TRico7Ha4YSyX2fmjABrFskscxh\', \'profile.jpg\', NULL, NULL, NULL, 10, \'2018-02-08 09:48:14\', \'2018-02-08 09:48:14\');');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {


        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180208_025122_add_first_admin cannot be reverted.\n";

        return false;
    }
    */
}
