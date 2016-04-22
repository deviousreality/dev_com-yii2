<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        // Tables
        $this->createTable('{{%category}}', [
            'siteID' => $this->integer()->notNull(),
            'categoryID' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()
        ], $tableOptions);

        $this->createTable('{{%posts}}', [
            'siteID' => $this->integer()->notNull(),
            'postID' => $this->primaryKey(),
            'userID' => $this->integer()->notNull(),
            'createddate' => $this->dateTime()->notNull(),
            'publisheddate' => $this->dateTime()->notNull(),
            'modifieddate' => $this->dateTime()->notNull(),
            'title' => $this->string(255)->notNull(),
            'alias' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'categoryID' => $this->integer()->notNull(),
            'status' => $this->string(20)->defaultValue('publish'),
            'type' => $this->string(20)->defaultValue('post'),
        ], $tableOptions);

        $this->createTable('{{%siteconfig}}', [
            'siteID' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'sitedomain' => $this->string(255),
            'homedirectory' => $this->string(255),
            'admindirectory' => $this->string(255),
            'uploaddirectory' => $this->string(255),
            'tempdirectory' => $this->string(255),
            'adminemail' => $this->string(100)
        ], $tableOptions);

        $this->createTable('{{%users}}', [
            'siteID' => $this->integer()->notNull(),
            'userID' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'username' => $this->string(255)->notNull(),
            'email' => $this->string(100)->notNull()->unique(),
            'password_hash' => $this->string(64)->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'auth_key' => $this->string()->unique(),
            'status' => $this->boolean()->notNull()->defaultValue(0),
            'roleID' => $this->integer()->notNull(0),
            'createddate' => $this->dateTime()->notNull(),
            'modifieddate' => $this->dateTime()->notNull(),
        ], $tableOptions);

        // Seeds
        $this->insert('{{%siteconfig}}', [
            'name' => 'Website',
            'sitedomain' => 'deviousreality.com',
            'homedirectory' => '',
            'admindirectory' => 'admin',
            'uploaddirectory' => 'uploads',
            'tempdirectory' => 'tmp',
            'adminemail' => 'dev@deviousreality.com'
        ]);

        $this->insert('{{%category}}', [
            'siteID' => 1,
            'title' => 'Default Category'
        ]);

        $this->insert('{{%users}}', [
            'siteID' => 1,
            'name' => 'Mister Foo Bar',
            'username' => 'admin',
            'password_hash' => '$2a$08$vYq0Qa08r67tEgVYks0CP.ik9qpICkaQU/fCGPoXHjMOWldLJ1I5a', //password
            'auth_key' => '',
            'email' => 'me@example.com',
            'status' => 10,
            'roleID' => 10,
            'createddate' => date("c",time()),
            'modifieddate' => date("c",time()),
        ]);

        $this->insert('{{%posts}}', [
            'siteID' => 1,
            'userID' => 1,
            'createddate' => date("c",time()),
            'publisheddate' => date("c",time()),
            'modifieddate' => date("c",time()),
            'title' => 'My First Post',
            'alias' => 'my-first-post',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet lobortis arcu. Praesent vitae euismod odio. Quisque in neque a urna tincidunt maximus. Praesent congue feugiat mauris. Sed dapibus tellus non lacus fringilla, id sollicitudin risus molestie. Suspendisse pretium velit at pulvinar lacinia. Aliquam non orci sapien. Cras porttitor mauris efficitur malesuada viverra. In iaculis viverra erat, a accumsan urna pretium ac. Maecenas a mauris lorem.</p>
                 <p><!--readmore--></p>
                 <p>Suspendisse porttitor mattis ex, quis pellentesque dolor iaculis sed. Vivamus et orci id dui iaculis bibendum et a ante. Sed et sapien a lectus molestie ultricies eu at lorem. Aliquam sit amet volutpat libero. Nullam at imperdiet nisl. Nullam imperdiet magna eu libero molestie accumsan. Integer maximus rutrum tellus ultrices consequat. Praesent convallis ultrices ligula at vulputate. Fusce hendrerit mi dictum, hendrerit dui ac, semper est.</p>',
            'categoryID' => 1,
            'status' => 'publish',
            'type' => 'post'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
        $this->dropTable('{{$posts}}');
        $this->dropTable('{{%siteconfig}}');
        $this->dropTable('{{%user}}');
    }
}
