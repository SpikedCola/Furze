<?php

namespace Base;

use \Song as ChildSong;
use \SongQuery as ChildSongQuery;
use \Exception;
use \PDO;
use Map\SongTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'songs' table.
 *
 *
 *
 * @method     ChildSongQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSongQuery orderByEpisodeId($order = Criteria::ASC) Order by the episode_id column
 * @method     ChildSongQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSongQuery orderByArtist($order = Criteria::ASC) Order by the artist column
 * @method     ChildSongQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 *
 * @method     ChildSongQuery groupById() Group by the id column
 * @method     ChildSongQuery groupByEpisodeId() Group by the episode_id column
 * @method     ChildSongQuery groupByTitle() Group by the title column
 * @method     ChildSongQuery groupByArtist() Group by the artist column
 * @method     ChildSongQuery groupByNotes() Group by the notes column
 *
 * @method     ChildSongQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSongQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSongQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSongQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSongQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSongQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSongQuery leftJoinEpisode($relationAlias = null) Adds a LEFT JOIN clause to the query using the Episode relation
 * @method     ChildSongQuery rightJoinEpisode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Episode relation
 * @method     ChildSongQuery innerJoinEpisode($relationAlias = null) Adds a INNER JOIN clause to the query using the Episode relation
 *
 * @method     ChildSongQuery joinWithEpisode($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Episode relation
 *
 * @method     ChildSongQuery leftJoinWithEpisode() Adds a LEFT JOIN clause and with to the query using the Episode relation
 * @method     ChildSongQuery rightJoinWithEpisode() Adds a RIGHT JOIN clause and with to the query using the Episode relation
 * @method     ChildSongQuery innerJoinWithEpisode() Adds a INNER JOIN clause and with to the query using the Episode relation
 *
 * @method     ChildSongQuery leftJoinSongLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the SongLink relation
 * @method     ChildSongQuery rightJoinSongLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SongLink relation
 * @method     ChildSongQuery innerJoinSongLink($relationAlias = null) Adds a INNER JOIN clause to the query using the SongLink relation
 *
 * @method     ChildSongQuery joinWithSongLink($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SongLink relation
 *
 * @method     ChildSongQuery leftJoinWithSongLink() Adds a LEFT JOIN clause and with to the query using the SongLink relation
 * @method     ChildSongQuery rightJoinWithSongLink() Adds a RIGHT JOIN clause and with to the query using the SongLink relation
 * @method     ChildSongQuery innerJoinWithSongLink() Adds a INNER JOIN clause and with to the query using the SongLink relation
 *
 * @method     \EpisodeQuery|\SongLinkQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSong findOne(ConnectionInterface $con = null) Return the first ChildSong matching the query
 * @method     ChildSong findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSong matching the query, or a new ChildSong object populated from the query conditions when no match is found
 *
 * @method     ChildSong findOneById(int $id) Return the first ChildSong filtered by the id column
 * @method     ChildSong findOneByEpisodeId(string $episode_id) Return the first ChildSong filtered by the episode_id column
 * @method     ChildSong findOneByTitle(string $title) Return the first ChildSong filtered by the title column
 * @method     ChildSong findOneByArtist(string $artist) Return the first ChildSong filtered by the artist column
 * @method     ChildSong findOneByNotes(string $notes) Return the first ChildSong filtered by the notes column *

 * @method     ChildSong requirePk($key, ConnectionInterface $con = null) Return the ChildSong by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSong requireOne(ConnectionInterface $con = null) Return the first ChildSong matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSong requireOneById(int $id) Return the first ChildSong filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSong requireOneByEpisodeId(string $episode_id) Return the first ChildSong filtered by the episode_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSong requireOneByTitle(string $title) Return the first ChildSong filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSong requireOneByArtist(string $artist) Return the first ChildSong filtered by the artist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSong requireOneByNotes(string $notes) Return the first ChildSong filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSong[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSong objects based on current ModelCriteria
 * @method     ChildSong[]|ObjectCollection findById(int $id) Return ChildSong objects filtered by the id column
 * @method     ChildSong[]|ObjectCollection findByEpisodeId(string $episode_id) Return ChildSong objects filtered by the episode_id column
 * @method     ChildSong[]|ObjectCollection findByTitle(string $title) Return ChildSong objects filtered by the title column
 * @method     ChildSong[]|ObjectCollection findByArtist(string $artist) Return ChildSong objects filtered by the artist column
 * @method     ChildSong[]|ObjectCollection findByNotes(string $notes) Return ChildSong objects filtered by the notes column
 * @method     ChildSong[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SongQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SongQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Song', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSongQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSongQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSongQuery) {
            return $criteria;
        }
        $query = new ChildSongQuery();
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
     * @return ChildSong|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SongTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SongTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSong A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, episode_id, title, artist, notes FROM songs WHERE id = :p0';
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
            /** @var ChildSong $obj */
            $obj = new ChildSong();
            $obj->hydrate($row);
            SongTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSong|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SongTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SongTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SongTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SongTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SongTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the episode_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEpisodeId('fooValue');   // WHERE episode_id = 'fooValue'
     * $query->filterByEpisodeId('%fooValue%', Criteria::LIKE); // WHERE episode_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $episodeId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByEpisodeId($episodeId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($episodeId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SongTableMap::COL_EPISODE_ID, $episodeId, $comparison);
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
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SongTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the artist column
     *
     * Example usage:
     * <code>
     * $query->filterByArtist('fooValue');   // WHERE artist = 'fooValue'
     * $query->filterByArtist('%fooValue%', Criteria::LIKE); // WHERE artist LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByArtist($artist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SongTableMap::COL_ARTIST, $artist, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%', Criteria::LIKE); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SongTableMap::COL_NOTES, $notes, $comparison);
    }

    /**
     * Filter the query by a related \Episode object
     *
     * @param \Episode|ObjectCollection $episode The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSongQuery The current query, for fluid interface
     */
    public function filterByEpisode($episode, $comparison = null)
    {
        if ($episode instanceof \Episode) {
            return $this
                ->addUsingAlias(SongTableMap::COL_EPISODE_ID, $episode->getId(), $comparison);
        } elseif ($episode instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SongTableMap::COL_EPISODE_ID, $episode->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEpisode() only accepts arguments of type \Episode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Episode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function joinEpisode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Episode');

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
            $this->addJoinObject($join, 'Episode');
        }

        return $this;
    }

    /**
     * Use the Episode relation Episode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EpisodeQuery A secondary query class using the current class as primary query
     */
    public function useEpisodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEpisode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Episode', '\EpisodeQuery');
    }

    /**
     * Filter the query by a related \SongLink object
     *
     * @param \SongLink|ObjectCollection $songLink the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSongQuery The current query, for fluid interface
     */
    public function filterBySongLink($songLink, $comparison = null)
    {
        if ($songLink instanceof \SongLink) {
            return $this
                ->addUsingAlias(SongTableMap::COL_ID, $songLink->getSongId(), $comparison);
        } elseif ($songLink instanceof ObjectCollection) {
            return $this
                ->useSongLinkQuery()
                ->filterByPrimaryKeys($songLink->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySongLink() only accepts arguments of type \SongLink or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SongLink relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function joinSongLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SongLink');

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
            $this->addJoinObject($join, 'SongLink');
        }

        return $this;
    }

    /**
     * Use the SongLink relation SongLink object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SongLinkQuery A secondary query class using the current class as primary query
     */
    public function useSongLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSongLink($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SongLink', '\SongLinkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSong $song Object to remove from the list of results
     *
     * @return $this|ChildSongQuery The current query, for fluid interface
     */
    public function prune($song = null)
    {
        if ($song) {
            $this->addUsingAlias(SongTableMap::COL_ID, $song->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the songs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SongTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SongTableMap::clearInstancePool();
            SongTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SongTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SongTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SongTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SongTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SongQuery
