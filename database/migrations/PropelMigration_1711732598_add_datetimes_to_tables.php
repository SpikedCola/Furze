<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1711732596.
 * Generated on 2024-03-29 17:16:36  */
class PropelMigration_1711732598_add_datetimes_to_tables{
    /**
     * @var string
     */
    public $comment = 'Add created_datetime to all tables, processed_datetime to episodes table.';

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
ADD `created_datetime` DATETIME NULL AFTER `processed`, 
ADD `processed_datetime` DATETIME NULL AFTER `created_datetime`;

ALTER TABLE `songs` 
ADD `created_datetime` DATETIME NULL;

ALTER TABLE `song_links` 
ADD `created_datetime` DATETIME NULL;

UPDATE episodes SET created_datetime = '2024-03-29 00:00:00';
UPDATE episodes SET processed_datetime = '2024-03-29 00:00:00' where processed = 1;
UPDATE songs SET created_datetime = '2024-03-29 00:00:00';
UPDATE song_links SET created_datetime = '2024-03-29 00:00:00';

ALTER TABLE `episodes` CHANGE `created_datetime` `created_datetime` DATETIME NOT NULL;
ALTER TABLE `songs` CHANGE `created_datetime` `created_datetime` DATETIME NOT NULL;
ALTER TABLE `song_links` CHANGE `created_datetime` `created_datetime` DATETIME NOT NULL;

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
DROP COLUMN `created_datetime`,
DROP COLUMN `processed_datetime`;

ALTER TABLE `songs` 
DROP COLUMN `created_datetime`;

ALTER TABLE `song_links` 
DROP COLUMN `created_datetime`;

EOT;

        return [
            'default' => $connection_default,
        ];
    }

}
