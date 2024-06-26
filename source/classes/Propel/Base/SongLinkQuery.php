<?php

namespace Base;

use \SongLink as ChildSongLink;
use \SongLinkQuery as ChildSongLinkQuery;
use \Exception;
use \PDO;
use Map\SongLinkTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `song_links` table.
 *
 * @method     ChildSongLinkQuery orderByTag($order = Criteria::ASC) Order by the tag column
 * @method     ChildSongLinkQuery orderBySongId($order = Criteria::ASC) Order by the song_id column
 * @method     ChildSongLinkQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildSongLinkQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSongLinkQuery orderByCreatedDatetime($order = Criteria::ASC) Order by the created_datetime column
 *
 * @method     ChildSongLinkQuery groupByTag() Group by the tag column
 * @method     ChildSongLinkQuery groupBySongId() Group by the song_id column
 * @method     ChildSongLinkQuery groupByUrl() Group by the url column
 * @method     ChildSongLinkQuery groupByTitle() Group by the title column
 * @method     ChildSongLinkQuery groupByCreatedDatetime() Group by the created_datetime column
 *
 * @method     ChildSongLinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSongLinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSongLinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSongLinkQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSongLinkQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSongLinkQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSongLinkQuery leftJoinSong($relationAlias = null) Adds a LEFT JOIN clause to the query using the Song relation
 * @method     ChildSongLinkQuery rightJoinSong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Song relation
 * @method     ChildSongLinkQuery innerJoinSong($relationAlias = null) Adds a INNER JOIN clause to the query using the Song relation
 *
 * @method     ChildSongLinkQuery joinWithSong($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Song relation
 *
 * @method     ChildSongLinkQuery leftJoinWithSong() Adds a LEFT JOIN clause and with to the query using the Song relation
 * @method     ChildSongLinkQuery rightJoinWithSong() Adds a RIGHT JOIN clause and with to the query using the Song relation
 * @method     ChildSongLinkQuery innerJoinWithSong() Adds a INNER JOIN clause and with to the query using the Song relation
 *
 * @method     \SongQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSongLink|null findOne(?ConnectionInterface $con = null) Return the first ChildSongLink matching the query
 * @method     ChildSongLink findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSongLink matching the query, or a new ChildSongLink object populated from the query conditions when no match is found
 *
 * @method     ChildSongLink|null findOneByTag(int $tag) Return the first ChildSongLink filtered by the tag column
 * @method     ChildSongLink|null findOneBySongId(int $song_id) Return the first ChildSongLink filtered by the song_id column
 * @method     ChildSongLink|null findOneByUrl(string $url) Return the first ChildSongLink filtered by the url column
 * @method     ChildSongLink|null findOneByTitle(string $title) Return the first ChildSongLink filtered by the title column
 * @method     ChildSongLink|null findOneByCreatedDatetime(string $created_datetime) Return the first ChildSongLink filtered by the created_datetime column
 *
 * @method     ChildSongLink requirePk($key, ?ConnectionInterface $con = null) Return the ChildSongLink by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSongLink requireOne(?ConnectionInterface $con = null) Return the first ChildSongLink matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSongLink requireOneByTag(int $tag) Return the first ChildSongLink filtered by the tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSongLink requireOneBySongId(int $song_id) Return the first ChildSongLink filtered by the song_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSongLink requireOneByUrl(string $url) Return the first ChildSongLink filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSongLink requireOneByTitle(string $title) Return the first ChildSongLink filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSongLink requireOneByCreatedDatetime(string $created_datetime) Return the first ChildSongLink filtered by the created_datetime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSongLink[]|Collection find(?ConnectionInterface $con = null) Return ChildSongLink objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSongLink> find(?ConnectionInterface $con = null) Return ChildSongLink objects based on current ModelCriteria
 *
 * @method     ChildSongLink[]|Collection findByTag(int|array<int> $tag) Return ChildSongLink objects filtered by the tag column
 * @psalm-method Collection&\Traversable<ChildSongLink> findByTag(int|array<int> $tag) Return ChildSongLink objects filtered by the tag column
 * @method     ChildSongLink[]|Collection findBySongId(int|array<int> $song_id) Return ChildSongLink objects filtered by the song_id column
 * @psalm-method Collection&\Traversable<ChildSongLink> findBySongId(int|array<int> $song_id) Return ChildSongLink objects filtered by the song_id column
 * @method     ChildSongLink[]|Collection findByUrl(string|array<string> $url) Return ChildSongLink objects filtered by the url column
 * @psalm-method Collection&\Traversable<ChildSongLink> findByUrl(string|array<string> $url) Return ChildSongLink objects filtered by the url column
 * @method     ChildSongLink[]|Collection findByTitle(string|array<string> $title) Return ChildSongLink objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildSongLink> findByTitle(string|array<string> $title) Return ChildSongLink objects filtered by the title column
 * @method     ChildSongLink[]|Collection findByCreatedDatetime(string|array<string> $created_datetime) Return ChildSongLink objects filtered by the created_datetime column
 * @psalm-method Collection&\Traversable<ChildSongLink> findByCreatedDatetime(string|array<string> $created_datetime) Return ChildSongLink objects filtered by the created_datetime column
 *
 * @method     ChildSongLink[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSongLink> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SongLinkQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SongLinkQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SongLink', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSongLinkQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSongLinkQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSongLinkQuery) {
            return $criteria;
        }
        $query = new ChildSongLinkQuery();
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
     * @return ChildSongLink|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SongLinkTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SongLinkTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSongLink A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tag, song_id, url, title, created_datetime FROM song_links WHERE tag = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSongLink $obj */
            $obj = new ChildSongLink();
            $obj->hydrate($row);
            SongLinkTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildSongLink|array|mixed the result, formatted by the current formatter
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
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(SongLinkTableMap::COL_TAG, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(SongLinkTableMap::COL_TAG, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the tag column
     *
     * Example usage:
     * <code>
     * $query->filterByTag(1234); // WHERE tag = 1234
     * $query->filterByTag(array(12, 34)); // WHERE tag IN (12, 34)
     * $query->filterByTag(array('min' => 12)); // WHERE tag > 12
     * </code>
     *
     * @param mixed $tag The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTag($tag = null, ?string $comparison = null)
    {
        if (is_array($tag)) {
            $useMinMax = false;
            if (isset($tag['min'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_TAG, $tag['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tag['max'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_TAG, $tag['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SongLinkTableMap::COL_TAG, $tag, $comparison);

        return $this;
    }

    /**
     * Filter the query on the song_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySongId(1234); // WHERE song_id = 1234
     * $query->filterBySongId(array(12, 34)); // WHERE song_id IN (12, 34)
     * $query->filterBySongId(array('min' => 12)); // WHERE song_id > 12
     * </code>
     *
     * @see       filterBySong()
     *
     * @param mixed $songId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySongId($songId = null, ?string $comparison = null)
    {
        if (is_array($songId)) {
            $useMinMax = false;
            if (isset($songId['min'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_SONG_ID, $songId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($songId['max'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_SONG_ID, $songId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SongLinkTableMap::COL_SONG_ID, $songId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * $query->filterByUrl(['foo', 'bar']); // WHERE url IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $url The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUrl($url = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SongLinkTableMap::COL_URL, $url, $comparison);

        return $this;
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $title The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTitle($title = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SongLinkTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the created_datetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedDatetime('2011-03-14'); // WHERE created_datetime = '2011-03-14'
     * $query->filterByCreatedDatetime('now'); // WHERE created_datetime = '2011-03-14'
     * $query->filterByCreatedDatetime(array('max' => 'yesterday')); // WHERE created_datetime > '2011-03-13'
     * </code>
     *
     * @param mixed $createdDatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreatedDatetime($createdDatetime = null, ?string $comparison = null)
    {
        if (is_array($createdDatetime)) {
            $useMinMax = false;
            if (isset($createdDatetime['min'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_CREATED_DATETIME, $createdDatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdDatetime['max'])) {
                $this->addUsingAlias(SongLinkTableMap::COL_CREATED_DATETIME, $createdDatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SongLinkTableMap::COL_CREATED_DATETIME, $createdDatetime, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \Song object
     *
     * @param \Song|ObjectCollection $song The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySong($song, ?string $comparison = null)
    {
        if ($song instanceof \Song) {
            return $this
                ->addUsingAlias(SongLinkTableMap::COL_SONG_ID, $song->getId(), $comparison);
        } elseif ($song instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(SongLinkTableMap::COL_SONG_ID, $song->toKeyValue('PrimaryKey', 'Id'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterBySong() only accepts arguments of type \Song or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Song relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinSong(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
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
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
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
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \SongQuery The inner query object of the EXISTS statement
     */
    public function useSongExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \SongQuery */
        $q = $this->useExistsQuery('Song', $modelAlias, $queryClass, $typeOfExists);
        return $q;
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
        /** @var $q \SongQuery */
        $q = $this->useExistsQuery('Song', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to Song table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \SongQuery The inner query object of the IN statement
     */
    public function useInSongQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \SongQuery */
        $q = $this->useInQuery('Song', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to Song table for a NOT IN query.
     *
     * @see useSongInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \SongQuery The inner query object of the NOT IN statement
     */
    public function useNotInSongQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \SongQuery */
        $q = $this->useInQuery('Song', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSongLink $songLink Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($songLink = null)
    {
        if ($songLink) {
            $this->addUsingAlias(SongLinkTableMap::COL_TAG, $songLink->getTag(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the song_links table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongLinkTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SongLinkTableMap::clearInstancePool();
            SongLinkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongLinkTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SongLinkTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SongLinkTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SongLinkTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
