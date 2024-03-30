<?php

namespace Map;

use \Song;
use \SongQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'songs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SongTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.SongTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'songs';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Song';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Song';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Song';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'songs.id';

    /**
     * the column name for the episode_id field
     */
    public const COL_EPISODE_ID = 'songs.episode_id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'songs.title';

    /**
     * the column name for the artist field
     */
    public const COL_ARTIST = 'songs.artist';

    /**
     * the column name for the track_number field
     */
    public const COL_TRACK_NUMBER = 'songs.track_number';

    /**
     * the column name for the notes field
     */
    public const COL_NOTES = 'songs.notes';

    /**
     * the column name for the created_datetime field
     */
    public const COL_CREATED_DATETIME = 'songs.created_datetime';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'EpisodeId', 'Title', 'Artist', 'TrackNumber', 'Notes', 'CreatedDatetime', ],
        self::TYPE_CAMELNAME     => ['id', 'episodeId', 'title', 'artist', 'trackNumber', 'notes', 'createdDatetime', ],
        self::TYPE_COLNAME       => [SongTableMap::COL_ID, SongTableMap::COL_EPISODE_ID, SongTableMap::COL_TITLE, SongTableMap::COL_ARTIST, SongTableMap::COL_TRACK_NUMBER, SongTableMap::COL_NOTES, SongTableMap::COL_CREATED_DATETIME, ],
        self::TYPE_FIELDNAME     => ['id', 'episode_id', 'title', 'artist', 'track_number', 'notes', 'created_datetime', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'EpisodeId' => 1, 'Title' => 2, 'Artist' => 3, 'TrackNumber' => 4, 'Notes' => 5, 'CreatedDatetime' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'episodeId' => 1, 'title' => 2, 'artist' => 3, 'trackNumber' => 4, 'notes' => 5, 'createdDatetime' => 6, ],
        self::TYPE_COLNAME       => [SongTableMap::COL_ID => 0, SongTableMap::COL_EPISODE_ID => 1, SongTableMap::COL_TITLE => 2, SongTableMap::COL_ARTIST => 3, SongTableMap::COL_TRACK_NUMBER => 4, SongTableMap::COL_NOTES => 5, SongTableMap::COL_CREATED_DATETIME => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'episode_id' => 1, 'title' => 2, 'artist' => 3, 'track_number' => 4, 'notes' => 5, 'created_datetime' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Song.Id' => 'ID',
        'id' => 'ID',
        'song.id' => 'ID',
        'SongTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'songs.id' => 'ID',
        'EpisodeId' => 'EPISODE_ID',
        'Song.EpisodeId' => 'EPISODE_ID',
        'episodeId' => 'EPISODE_ID',
        'song.episodeId' => 'EPISODE_ID',
        'SongTableMap::COL_EPISODE_ID' => 'EPISODE_ID',
        'COL_EPISODE_ID' => 'EPISODE_ID',
        'episode_id' => 'EPISODE_ID',
        'songs.episode_id' => 'EPISODE_ID',
        'Title' => 'TITLE',
        'Song.Title' => 'TITLE',
        'title' => 'TITLE',
        'song.title' => 'TITLE',
        'SongTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'songs.title' => 'TITLE',
        'Artist' => 'ARTIST',
        'Song.Artist' => 'ARTIST',
        'artist' => 'ARTIST',
        'song.artist' => 'ARTIST',
        'SongTableMap::COL_ARTIST' => 'ARTIST',
        'COL_ARTIST' => 'ARTIST',
        'songs.artist' => 'ARTIST',
        'TrackNumber' => 'TRACK_NUMBER',
        'Song.TrackNumber' => 'TRACK_NUMBER',
        'trackNumber' => 'TRACK_NUMBER',
        'song.trackNumber' => 'TRACK_NUMBER',
        'SongTableMap::COL_TRACK_NUMBER' => 'TRACK_NUMBER',
        'COL_TRACK_NUMBER' => 'TRACK_NUMBER',
        'track_number' => 'TRACK_NUMBER',
        'songs.track_number' => 'TRACK_NUMBER',
        'Notes' => 'NOTES',
        'Song.Notes' => 'NOTES',
        'notes' => 'NOTES',
        'song.notes' => 'NOTES',
        'SongTableMap::COL_NOTES' => 'NOTES',
        'COL_NOTES' => 'NOTES',
        'songs.notes' => 'NOTES',
        'CreatedDatetime' => 'CREATED_DATETIME',
        'Song.CreatedDatetime' => 'CREATED_DATETIME',
        'createdDatetime' => 'CREATED_DATETIME',
        'song.createdDatetime' => 'CREATED_DATETIME',
        'SongTableMap::COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'created_datetime' => 'CREATED_DATETIME',
        'songs.created_datetime' => 'CREATED_DATETIME',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('songs');
        $this->setPhpName('Song');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Song');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('episode_id', 'EpisodeId', 'VARCHAR', 'episodes', 'id', true, 20, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', true, null, null);
        $this->addColumn('artist', 'Artist', 'LONGVARCHAR', true, null, null);
        $this->addColumn('track_number', 'TrackNumber', 'INTEGER', false, null, 1);
        $this->addColumn('notes', 'Notes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_datetime', 'CreatedDatetime', 'DATETIME', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Episode', '\\Episode', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':episode_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('SongLink', '\\SongLink', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':song_id',
    1 => ':id',
  ),
), null, null, 'SongLinks', false);
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? SongTableMap::CLASS_DEFAULT : SongTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Song object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SongTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SongTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SongTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SongTableMap::OM_CLASS;
            /** @var Song $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SongTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SongTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SongTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Song $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SongTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SongTableMap::COL_ID);
            $criteria->addSelectColumn(SongTableMap::COL_EPISODE_ID);
            $criteria->addSelectColumn(SongTableMap::COL_TITLE);
            $criteria->addSelectColumn(SongTableMap::COL_ARTIST);
            $criteria->addSelectColumn(SongTableMap::COL_TRACK_NUMBER);
            $criteria->addSelectColumn(SongTableMap::COL_NOTES);
            $criteria->addSelectColumn(SongTableMap::COL_CREATED_DATETIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.episode_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.artist');
            $criteria->addSelectColumn($alias . '.track_number');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.created_datetime');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(SongTableMap::COL_ID);
            $criteria->removeSelectColumn(SongTableMap::COL_EPISODE_ID);
            $criteria->removeSelectColumn(SongTableMap::COL_TITLE);
            $criteria->removeSelectColumn(SongTableMap::COL_ARTIST);
            $criteria->removeSelectColumn(SongTableMap::COL_TRACK_NUMBER);
            $criteria->removeSelectColumn(SongTableMap::COL_NOTES);
            $criteria->removeSelectColumn(SongTableMap::COL_CREATED_DATETIME);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.episode_id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.artist');
            $criteria->removeSelectColumn($alias . '.track_number');
            $criteria->removeSelectColumn($alias . '.notes');
            $criteria->removeSelectColumn($alias . '.created_datetime');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(SongTableMap::DATABASE_NAME)->getTable(SongTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Song or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Song object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Song) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SongTableMap::DATABASE_NAME);
            $criteria->add(SongTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SongQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SongTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SongTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the songs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SongQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Song or Criteria object.
     *
     * @param mixed $criteria Criteria or Song object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Song object
        }

        if ($criteria->containsKey(SongTableMap::COL_ID) && $criteria->keyContainsValue(SongTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SongTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SongQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
