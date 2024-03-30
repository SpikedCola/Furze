<?php

namespace Map;

use \Episode;
use \EpisodeQuery;
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
 * This class defines the structure of the 'episodes' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class EpisodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.EpisodeTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'episodes';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Episode';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Episode';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Episode';

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
    public const COL_ID = 'episodes.id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'episodes.title';

    /**
     * the column name for the description field
     */
    public const COL_DESCRIPTION = 'episodes.description';

    /**
     * the column name for the uploaded_datetime field
     */
    public const COL_UPLOADED_DATETIME = 'episodes.uploaded_datetime';

    /**
     * the column name for the processed field
     */
    public const COL_PROCESSED = 'episodes.processed';

    /**
     * the column name for the created_datetime field
     */
    public const COL_CREATED_DATETIME = 'episodes.created_datetime';

    /**
     * the column name for the processed_datetime field
     */
    public const COL_PROCESSED_DATETIME = 'episodes.processed_datetime';

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
        self::TYPE_PHPNAME       => ['Id', 'Title', 'Description', 'UploadedDatetime', 'Processed', 'CreatedDatetime', 'ProcessedDatetime', ],
        self::TYPE_CAMELNAME     => ['id', 'title', 'description', 'uploadedDatetime', 'processed', 'createdDatetime', 'processedDatetime', ],
        self::TYPE_COLNAME       => [EpisodeTableMap::COL_ID, EpisodeTableMap::COL_TITLE, EpisodeTableMap::COL_DESCRIPTION, EpisodeTableMap::COL_UPLOADED_DATETIME, EpisodeTableMap::COL_PROCESSED, EpisodeTableMap::COL_CREATED_DATETIME, EpisodeTableMap::COL_PROCESSED_DATETIME, ],
        self::TYPE_FIELDNAME     => ['id', 'title', 'description', 'uploaded_datetime', 'processed', 'created_datetime', 'processed_datetime', ],
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'Title' => 1, 'Description' => 2, 'UploadedDatetime' => 3, 'Processed' => 4, 'CreatedDatetime' => 5, 'ProcessedDatetime' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'uploadedDatetime' => 3, 'processed' => 4, 'createdDatetime' => 5, 'processedDatetime' => 6, ],
        self::TYPE_COLNAME       => [EpisodeTableMap::COL_ID => 0, EpisodeTableMap::COL_TITLE => 1, EpisodeTableMap::COL_DESCRIPTION => 2, EpisodeTableMap::COL_UPLOADED_DATETIME => 3, EpisodeTableMap::COL_PROCESSED => 4, EpisodeTableMap::COL_CREATED_DATETIME => 5, EpisodeTableMap::COL_PROCESSED_DATETIME => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'title' => 1, 'description' => 2, 'uploaded_datetime' => 3, 'processed' => 4, 'created_datetime' => 5, 'processed_datetime' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Episode.Id' => 'ID',
        'id' => 'ID',
        'episode.id' => 'ID',
        'EpisodeTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'episodes.id' => 'ID',
        'Title' => 'TITLE',
        'Episode.Title' => 'TITLE',
        'title' => 'TITLE',
        'episode.title' => 'TITLE',
        'EpisodeTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'episodes.title' => 'TITLE',
        'Description' => 'DESCRIPTION',
        'Episode.Description' => 'DESCRIPTION',
        'description' => 'DESCRIPTION',
        'episode.description' => 'DESCRIPTION',
        'EpisodeTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
        'COL_DESCRIPTION' => 'DESCRIPTION',
        'episodes.description' => 'DESCRIPTION',
        'UploadedDatetime' => 'UPLOADED_DATETIME',
        'Episode.UploadedDatetime' => 'UPLOADED_DATETIME',
        'uploadedDatetime' => 'UPLOADED_DATETIME',
        'episode.uploadedDatetime' => 'UPLOADED_DATETIME',
        'EpisodeTableMap::COL_UPLOADED_DATETIME' => 'UPLOADED_DATETIME',
        'COL_UPLOADED_DATETIME' => 'UPLOADED_DATETIME',
        'uploaded_datetime' => 'UPLOADED_DATETIME',
        'episodes.uploaded_datetime' => 'UPLOADED_DATETIME',
        'Processed' => 'PROCESSED',
        'Episode.Processed' => 'PROCESSED',
        'processed' => 'PROCESSED',
        'episode.processed' => 'PROCESSED',
        'EpisodeTableMap::COL_PROCESSED' => 'PROCESSED',
        'COL_PROCESSED' => 'PROCESSED',
        'episodes.processed' => 'PROCESSED',
        'CreatedDatetime' => 'CREATED_DATETIME',
        'Episode.CreatedDatetime' => 'CREATED_DATETIME',
        'createdDatetime' => 'CREATED_DATETIME',
        'episode.createdDatetime' => 'CREATED_DATETIME',
        'EpisodeTableMap::COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'COL_CREATED_DATETIME' => 'CREATED_DATETIME',
        'created_datetime' => 'CREATED_DATETIME',
        'episodes.created_datetime' => 'CREATED_DATETIME',
        'ProcessedDatetime' => 'PROCESSED_DATETIME',
        'Episode.ProcessedDatetime' => 'PROCESSED_DATETIME',
        'processedDatetime' => 'PROCESSED_DATETIME',
        'episode.processedDatetime' => 'PROCESSED_DATETIME',
        'EpisodeTableMap::COL_PROCESSED_DATETIME' => 'PROCESSED_DATETIME',
        'COL_PROCESSED_DATETIME' => 'PROCESSED_DATETIME',
        'processed_datetime' => 'PROCESSED_DATETIME',
        'episodes.processed_datetime' => 'PROCESSED_DATETIME',
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
        $this->setName('episodes');
        $this->setPhpName('Episode');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Episode');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 255, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', true, null, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', true, null, null);
        $this->addColumn('uploaded_datetime', 'UploadedDatetime', 'DATETIME', true, null, null);
        $this->addColumn('processed', 'Processed', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_datetime', 'CreatedDatetime', 'DATETIME', true, null, null);
        $this->addColumn('processed_datetime', 'ProcessedDatetime', 'DATETIME', false, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Song', '\\Song', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':episode_id',
    1 => ':id',
  ),
), null, null, 'Songs', false);
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
        return (string) $row[
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
        return $withPrefix ? EpisodeTableMap::CLASS_DEFAULT : EpisodeTableMap::OM_CLASS;
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
     * @return array (Episode object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = EpisodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EpisodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EpisodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EpisodeTableMap::OM_CLASS;
            /** @var Episode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EpisodeTableMap::addInstanceToPool($obj, $key);
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
            $key = EpisodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EpisodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Episode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EpisodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EpisodeTableMap::COL_ID);
            $criteria->addSelectColumn(EpisodeTableMap::COL_TITLE);
            $criteria->addSelectColumn(EpisodeTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(EpisodeTableMap::COL_UPLOADED_DATETIME);
            $criteria->addSelectColumn(EpisodeTableMap::COL_PROCESSED);
            $criteria->addSelectColumn(EpisodeTableMap::COL_CREATED_DATETIME);
            $criteria->addSelectColumn(EpisodeTableMap::COL_PROCESSED_DATETIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.uploaded_datetime');
            $criteria->addSelectColumn($alias . '.processed');
            $criteria->addSelectColumn($alias . '.created_datetime');
            $criteria->addSelectColumn($alias . '.processed_datetime');
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
            $criteria->removeSelectColumn(EpisodeTableMap::COL_ID);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_TITLE);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_DESCRIPTION);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_UPLOADED_DATETIME);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_PROCESSED);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_CREATED_DATETIME);
            $criteria->removeSelectColumn(EpisodeTableMap::COL_PROCESSED_DATETIME);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.description');
            $criteria->removeSelectColumn($alias . '.uploaded_datetime');
            $criteria->removeSelectColumn($alias . '.processed');
            $criteria->removeSelectColumn($alias . '.created_datetime');
            $criteria->removeSelectColumn($alias . '.processed_datetime');
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
        return Propel::getServiceContainer()->getDatabaseMap(EpisodeTableMap::DATABASE_NAME)->getTable(EpisodeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Episode or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Episode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EpisodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Episode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EpisodeTableMap::DATABASE_NAME);
            $criteria->add(EpisodeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = EpisodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EpisodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EpisodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the episodes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return EpisodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Episode or Criteria object.
     *
     * @param mixed $criteria Criteria or Episode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EpisodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Episode object
        }


        // Set the correct dbName
        $query = EpisodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
