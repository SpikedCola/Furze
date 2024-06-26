<?php

namespace Map;

use \SongLink;
use \SongLinkQuery;
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
 * This class defines the structure of the 'song_links' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SongLinkTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.SongLinkTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'song_links';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'SongLink';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\SongLink';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'SongLink';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the tag field
     */
    public const COL_TAG = 'song_links.tag';

    /**
     * the column name for the song_id field
     */
    public const COL_SONG_ID = 'song_links.song_id';

    /**
     * the column name for the url field
     */
    public const COL_URL = 'song_links.url';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'song_links.title';

    /**
     * the column name for the created_datetime field
     */
    public const COL_CREATED_DATETIME = 'song_links.created_datetime';

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
        self::TYPE_PHPNAME       => ['Tag', 'SongId', 'Url', 'Title', 'CreatedDatetime', ],
        self::TYPE_CAMELNAME     => ['tag', 'songId', 'url', 'title', 'createdDatetime', ],
        self::TYPE_COLNAME       => [SongLinkTableMap::COL_TAG, SongLinkTableMap::COL_SONG_ID, SongLinkTableMap::COL_URL, SongLinkTableMap::COL_TITLE, SongLinkTableMap::COL_CREATED_DATETIME, ],
        self::TYPE_FIELDNAME     => ['tag', 'song_id', 'url', 'title', 'created_datetime', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
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
        self::TYPE_PHPNAME       => ['Tag' => 0, 'SongId' => 1, 'Url' => 2, 'Title' => 3, 'CreatedDatetime' => 4, ],
        self::TYPE_CAMELNAME     => ['tag' => 0, 'songId' => 1, 'url' => 2, 'title' => 3, 'createdDatetime' => 4, ],
        self::TYPE_COLNAME       => [SongLinkTableMap::COL_TAG => 0, SongLinkTableMap::COL_SONG_ID => 1, SongLinkTableMap::COL_URL => 2, SongLinkTableMap::COL_TITLE => 3, SongLinkTableMap::COL_CREATED_DATETIME => 4, ],
        self::TYPE_FIELDNAME     => ['tag' => 0, 'song_id' => 1, 'url' => 2, 'title' => 3, 'created_datetime' => 4, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Tag' => 'TAG',
        'SongLink.Tag' => 'TAG',
        'tag' => 'TAG',
        'songLink.tag' => 'TAG',
        'SongLinkTableMap::COL_TAG' => 'TAG',
        'COL_TAG' => 'TAG',
        'song_links.tag' => 'TAG',
        'SongId' => 'SONG_ID',
        'SongLink.SongId' => 'SONG_ID',
        'songId' => 'SONG_ID',
        'songLink.songId' => 'SONG_ID',
        'SongLinkTableMap::COL_SONG_ID' => 'SONG_ID',
        'COL_SONG_ID' => 'SONG_ID',
        'song_id' => 'SONG_ID',
        'song_links.song_id' => 'SONG_ID',
        'Url' => 'URL',
        'SongLink.Url' => 'URL',
        'url' => 'URL',
        'songLink.url' => 'URL',
        'SongLinkTableMap::COL_URL' => 'URL',
        'COL_URL' => 'URL',
        'song_links.url' => 'URL',
        'Title' => 'TITLE',
        'SongLink.Title' => 'TITLE',
        'title' => 'TITLE',
        'songLink.title' => 'TITLE',
        'SongLinkTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'song_links.title' => 'TITLE',
        'CreatedDatetime' => 'CREATED_DATETIME',
        'SongLink.CreatedDatetime' => 'CREATED_DATETIME',
        'createdDatetime' => 'CREATED_DATETIME',
        'songLink.createdDatetime' => 'CREATED_DATETIME',
        'SongLinkTableMap::COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'created_datetime' => 'CREATED_DATETIME',
        'song_links.created_datetime' => 'CREATED_DATETIME',
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
        $this->setName('song_links');
        $this->setPhpName('SongLink');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SongLink');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('tag', 'Tag', 'INTEGER', true, null, null);
        $this->addForeignKey('song_id', 'SongId', 'INTEGER', 'songs', 'id', true, null, null);
        $this->addColumn('url', 'Url', 'LONGVARCHAR', true, null, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', true, null, null);
        $this->addColumn('created_datetime', 'CreatedDatetime', 'DATETIME', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Song', '\\Song', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':song_id',
    1 => ':id',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Tag', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SongLinkTableMap::CLASS_DEFAULT : SongLinkTableMap::OM_CLASS;
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
     * @return array (SongLink object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SongLinkTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SongLinkTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SongLinkTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SongLinkTableMap::OM_CLASS;
            /** @var SongLink $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SongLinkTableMap::addInstanceToPool($obj, $key);
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
            $key = SongLinkTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SongLinkTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SongLink $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SongLinkTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SongLinkTableMap::COL_TAG);
            $criteria->addSelectColumn(SongLinkTableMap::COL_SONG_ID);
            $criteria->addSelectColumn(SongLinkTableMap::COL_URL);
            $criteria->addSelectColumn(SongLinkTableMap::COL_TITLE);
            $criteria->addSelectColumn(SongLinkTableMap::COL_CREATED_DATETIME);
        } else {
            $criteria->addSelectColumn($alias . '.tag');
            $criteria->addSelectColumn($alias . '.song_id');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.title');
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
            $criteria->removeSelectColumn(SongLinkTableMap::COL_TAG);
            $criteria->removeSelectColumn(SongLinkTableMap::COL_SONG_ID);
            $criteria->removeSelectColumn(SongLinkTableMap::COL_URL);
            $criteria->removeSelectColumn(SongLinkTableMap::COL_TITLE);
            $criteria->removeSelectColumn(SongLinkTableMap::COL_CREATED_DATETIME);
        } else {
            $criteria->removeSelectColumn($alias . '.tag');
            $criteria->removeSelectColumn($alias . '.song_id');
            $criteria->removeSelectColumn($alias . '.url');
            $criteria->removeSelectColumn($alias . '.title');
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
        return Propel::getServiceContainer()->getDatabaseMap(SongLinkTableMap::DATABASE_NAME)->getTable(SongLinkTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a SongLink or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or SongLink object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SongLinkTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SongLink) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SongLinkTableMap::DATABASE_NAME);
            $criteria->add(SongLinkTableMap::COL_TAG, (array) $values, Criteria::IN);
        }

        $query = SongLinkQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SongLinkTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SongLinkTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the song_links table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SongLinkQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SongLink or Criteria object.
     *
     * @param mixed $criteria Criteria or SongLink object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongLinkTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SongLink object
        }

        if ($criteria->containsKey(SongLinkTableMap::COL_TAG) && $criteria->keyContainsValue(SongLinkTableMap::COL_TAG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SongLinkTableMap::COL_TAG.')');
        }


        // Set the correct dbName
        $query = SongLinkQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
