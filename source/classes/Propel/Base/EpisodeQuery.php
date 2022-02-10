<?php

namespace Base;

use \Episode as ChildEpisode;
use \EpisodeQuery as ChildEpisodeQuery;
use \Exception;
use \PDO;
use Map\EpisodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'episodes' table.
 *
 *
 *
 * @method     ChildEpisodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEpisodeQuery orderByUploadDate($order = Criteria::ASC) Order by the upload_date column
 * @method     ChildEpisodeQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildEpisodeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildEpisodeQuery orderByProcessed($order = Criteria::ASC) Order by the processed column
 * @method     ChildEpisodeQuery orderByMusic($order = Criteria::ASC) Order by the music column
 *
 * @method     ChildEpisodeQuery groupById() Group by the id column
 * @method     ChildEpisodeQuery groupByUploadDate() Group by the upload_date column
 * @method     ChildEpisodeQuery groupByTitle() Group by the title column
 * @method     ChildEpisodeQuery groupByDescription() Group by the description column
 * @method     ChildEpisodeQuery groupByProcessed() Group by the processed column
 * @method     ChildEpisodeQuery groupByMusic() Group by the music column
 *
 * @method     ChildEpisodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEpisodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEpisodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEpisodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEpisodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEpisodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEpisodeQuery leftJoinSong($relationAlias = null) Adds a LEFT JOIN clause to the query using the Song relation
 * @method     ChildEpisodeQuery rightJoinSong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Song relation
 * @method     ChildEpisodeQuery innerJoinSong($relationAlias = null) Adds a INNER JOIN clause to the query using the Song relation
 *
 * @method     ChildEpisodeQuery joinWithSong($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Song relation
 *
 * @method     ChildEpisodeQuery leftJoinWithSong() Adds a LEFT JOIN clause and with to the query using the Song relation
 * @method     ChildEpisodeQuery rightJoinWithSong() Adds a RIGHT JOIN clause and with to the query using the Song relation
 * @method     ChildEpisodeQuery innerJoinWithSong() Adds a INNER JOIN clause and with to the query using the Song relation
 *
 * @method     \SongQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEpisode|null findOne(ConnectionInterface $con = null) Return the first ChildEpisode matching the query
 * @method     ChildEpisode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEpisode matching the query, or a new ChildEpisode object populated from the query conditions when no match is found
 *
 * @method     ChildEpisode|null findOneById(string $id) Return the first ChildEpisode filtered by the id column
 * @method     ChildEpisode|null findOneByUploadDate(string $upload_date) Return the first ChildEpisode filtered by the upload_date column
 * @method     ChildEpisode|null findOneByTitle(string $title) Return the first ChildEpisode filtered by the title column
 * @method     ChildEpisode|null findOneByDescription(string $description) Return the first ChildEpisode filtered by the description column
 * @method     ChildEpisode|null findOneByProcessed(int $processed) Return the first ChildEpisode filtered by the processed column
 * @method     ChildEpisode|null findOneByMusic(string $music) Return the first ChildEpisode filtered by the music column *

 * @method     ChildEpisode requirePk($key, ConnectionInterface $con = null) Return the ChildEpisode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOne(ConnectionInterface $con = null) Return the first ChildEpisode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEpisode requireOneById(string $id) Return the first ChildEpisode filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOneByUploadDate(string $upload_date) Return the first ChildEpisode filtered by the upload_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOneByTitle(string $title) Return the first ChildEpisode filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOneByDescription(string $description) Return the first ChildEpisode filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOneByProcessed(int $processed) Return the first ChildEpisode filtered by the processed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEpisode requireOneByMusic(string $music) Return the first ChildEpisode filtered by the music column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEpisode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEpisode objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> find(ConnectionInterface $con = null) Return ChildEpisode objects based on current ModelCriteria
 * @method     ChildEpisode[]|ObjectCollection findById(string $id) Return ChildEpisode objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findById(string $id) Return ChildEpisode objects filtered by the id column
 * @method     ChildEpisode[]|ObjectCollection findByUploadDate(string $upload_date) Return ChildEpisode objects filtered by the upload_date column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findByUploadDate(string $upload_date) Return ChildEpisode objects filtered by the upload_date column
 * @method     ChildEpisode[]|ObjectCollection findByTitle(string $title) Return ChildEpisode objects filtered by the title column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findByTitle(string $title) Return ChildEpisode objects filtered by the title column
 * @method     ChildEpisode[]|ObjectCollection findByDescription(string $description) Return ChildEpisode objects filtered by the description column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findByDescription(string $description) Return ChildEpisode objects filtered by the description column
 * @method     ChildEpisode[]|ObjectCollection findByProcessed(int $processed) Return ChildEpisode objects filtered by the processed column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findByProcessed(int $processed) Return ChildEpisode objects filtered by the processed column
 * @method     ChildEpisode[]|ObjectCollection findByMusic(string $music) Return ChildEpisode objects filtered by the music column
 * @psalm-method ObjectCollection&\Traversable<ChildEpisode> findByMusic(string $music) Return ChildEpisode objects filtered by the music column
 * @method     ChildEpisode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildEpisode> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EpisodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EpisodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Episode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEpisodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEpisodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEpisodeQuery) {
            return $criteria;
        }
        $query = new ChildEpisodeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEpisode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EpisodeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EpisodeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEpisode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, upload_date, title, description, processed, music FROM episodes WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEpisode $obj */
            $obj = new ChildEpisode();
            $obj->hydrate($row);
            EpisodeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEpisode|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EpisodeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EpisodeTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the upload_date column
     *
     * Example usage:
     * <code>
     * $query->filterByUploadDate('2011-03-14'); // WHERE upload_date = '2011-03-14'
     * $query->filterByUploadDate('now'); // WHERE upload_date = '2011-03-14'
     * $query->filterByUploadDate(array('max' => 'yesterday')); // WHERE upload_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $uploadDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByUploadDate($uploadDate = null, $comparison = null)
    {
        if (is_array($uploadDate)) {
            $useMinMax = false;
            if (isset($uploadDate['min'])) {
                $this->addUsingAlias(EpisodeTableMap::COL_UPLOAD_DATE, $uploadDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uploadDate['max'])) {
                $this->addUsingAlias(EpisodeTableMap::COL_UPLOAD_DATE, $uploadDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_UPLOAD_DATE, $uploadDate, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the processed column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessed(1234); // WHERE processed = 1234
     * $query->filterByProcessed(array(12, 34)); // WHERE processed IN (12, 34)
     * $query->filterByProcessed(array('min' => 12)); // WHERE processed > 12
     * </code>
     *
     * @param     mixed $processed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByProcessed($processed = null, $comparison = null)
    {
        if (is_array($processed)) {
            $useMinMax = false;
            if (isset($processed['min'])) {
                $this->addUsingAlias(EpisodeTableMap::COL_PROCESSED, $processed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($processed['max'])) {
                $this->addUsingAlias(EpisodeTableMap::COL_PROCESSED, $processed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_PROCESSED, $processed, $comparison);
    }

    /**
     * Filter the query on the music column
     *
     * Example usage:
     * <code>
     * $query->filterByMusic('fooValue');   // WHERE music = 'fooValue'
     * $query->filterByMusic('%fooValue%', Criteria::LIKE); // WHERE music LIKE '%fooValue%'
     * </code>
     *
     * @param     string $music The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterByMusic($music = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($music)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EpisodeTableMap::COL_MUSIC, $music, $comparison);
    }

    /**
     * Filter the query by a related \Song object
     *
     * @param \Song|ObjectCollection $song the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEpisodeQuery The current query, for fluid interface
     */
    public function filterBySong($song, $comparison = null)
    {
        if ($song instanceof \Song) {
            return $this
                ->addUsingAlias(EpisodeTableMap::COL_ID, $song->getEpisodeId(), $comparison);
        } elseif ($song instanceof ObjectCollection) {
            return $this
                ->useSongQuery()
                ->filterByPrimaryKeys($song->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySong() only accepts arguments of type \Song or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Song relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function joinSong($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Song');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Song');
        }

        return $this;
    }

    /**
     * Use the Song relation Song object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SongQuery A secondary query class using the current class as primary query
     */
    public function useSongQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSong($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Song', '\SongQuery');
    }

    /**
     * Use the Song relation Song object
     *
     * @param callable(\SongQuery):\SongQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withSongQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useSongQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Song table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \SongQuery The inner query object of the EXISTS statement
     */
    public function useSongExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Song', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Song table for a NOT EXISTS query.
     *
     * @see useSongExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \SongQuery The inner query object of the NOT EXISTS statement
     */
    public function useSongNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Song', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildEpisode $episode Object to remove from the list of results
     *
     * @return $this|ChildEpisodeQuery The current query, for fluid interface
     */
    public function prune($episode = null)
    {
        if ($episode) {
            $this->addUsingAlias(EpisodeTableMap::COL_ID, $episode->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the episodes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EpisodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EpisodeTableMap::clearInstancePool();
            EpisodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EpisodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EpisodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EpisodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EpisodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EpisodeQuery
