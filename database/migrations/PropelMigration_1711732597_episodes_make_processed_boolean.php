<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1711732596.
 * Generated on 2024-03-29 17:16:36  */
class PropelMigration_1711732597_episodes_make_processed_boolean{
    /**
     * @var string
     */
    public $comment = 'Change episodes.processed column to boolean.';

    /**
     * @param \Propel\Generator\Manager\MigrationManager $manager
     *
     * @return null|false|void
     */
    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    /**
     * @param \Propel\Generator\Manager\MigrationManager $manager
     *
     * @return null|false|void
     */
    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * @param \Propel\Generator\Manager\MigrationManager $manager
     *
     * @return null|false|void
     */
    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    /**
     * @param \Propel\Generator\Manager\MigrationManager $manager
     *
     * @return null|false|void
     */
    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL(): array
    {
        $connection_default = <<< 'EOT'

ALTER TABLE `episodes` 
CHANGE `processed` `processed` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0';

UPDATE episodes set processed = 1 where processed = 2;
		
EOT;

        return [
            'default' => $connection_default,
        ];
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL(): array
    {
        $connection_default = <<< 'EOT'

ALTER TABLE `episodes` 
CHANGE `processed` `processed` INTEGER(11) UNSIGNED NOT NULL DEFAULT '0';
		
EOT;

        return [
            'default' => $connection_default,
        ];
    }

}
