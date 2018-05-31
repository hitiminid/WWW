<?php

namespace MyPage\Base;

use \Exception;
use \PDO;
use MyPage\Captcha as ChildCaptcha;
use MyPage\CaptchaQuery as ChildCaptchaQuery;
use MyPage\Map\CaptchaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'captcha' table.
 *
 *
 *
 * @method     ChildCaptchaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCaptchaQuery orderByQuestion($order = Criteria::ASC) Order by the question column
 * @method     ChildCaptchaQuery orderByAnswer($order = Criteria::ASC) Order by the answer column
 *
 * @method     ChildCaptchaQuery groupById() Group by the id column
 * @method     ChildCaptchaQuery groupByQuestion() Group by the question column
 * @method     ChildCaptchaQuery groupByAnswer() Group by the answer column
 *
 * @method     ChildCaptchaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCaptchaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCaptchaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCaptchaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCaptchaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCaptchaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCaptcha findOne(ConnectionInterface $con = null) Return the first ChildCaptcha matching the query
 * @method     ChildCaptcha findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCaptcha matching the query, or a new ChildCaptcha object populated from the query conditions when no match is found
 *
 * @method     ChildCaptcha findOneById(int $id) Return the first ChildCaptcha filtered by the id column
 * @method     ChildCaptcha findOneByQuestion(string $question) Return the first ChildCaptcha filtered by the question column
 * @method     ChildCaptcha findOneByAnswer(string $answer) Return the first ChildCaptcha filtered by the answer column *

 * @method     ChildCaptcha requirePk($key, ConnectionInterface $con = null) Return the ChildCaptcha by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCaptcha requireOne(ConnectionInterface $con = null) Return the first ChildCaptcha matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCaptcha requireOneById(int $id) Return the first ChildCaptcha filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCaptcha requireOneByQuestion(string $question) Return the first ChildCaptcha filtered by the question column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCaptcha requireOneByAnswer(string $answer) Return the first ChildCaptcha filtered by the answer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCaptcha[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCaptcha objects based on current ModelCriteria
 * @method     ChildCaptcha[]|ObjectCollection findById(int $id) Return ChildCaptcha objects filtered by the id column
 * @method     ChildCaptcha[]|ObjectCollection findByQuestion(string $question) Return ChildCaptcha objects filtered by the question column
 * @method     ChildCaptcha[]|ObjectCollection findByAnswer(string $answer) Return ChildCaptcha objects filtered by the answer column
 * @method     ChildCaptcha[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CaptchaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \MyPage\Base\CaptchaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'my_page', $modelName = '\\MyPage\\Captcha', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCaptchaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCaptchaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCaptchaQuery) {
            return $criteria;
        }
        $query = new ChildCaptchaQuery();
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
     * @return ChildCaptcha|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CaptchaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CaptchaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCaptcha A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, question, answer FROM captcha WHERE id = :p0';
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
            /** @var ChildCaptcha $obj */
            $obj = new ChildCaptcha();
            $obj->hydrate($row);
            CaptchaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCaptcha|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CaptchaTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CaptchaTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CaptchaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CaptchaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CaptchaTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the question column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestion('fooValue');   // WHERE question = 'fooValue'
     * $query->filterByQuestion('%fooValue%', Criteria::LIKE); // WHERE question LIKE '%fooValue%'
     * </code>
     *
     * @param     string $question The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function filterByQuestion($question = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($question)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CaptchaTableMap::COL_QUESTION, $question, $comparison);
    }

    /**
     * Filter the query on the answer column
     *
     * Example usage:
     * <code>
     * $query->filterByAnswer('fooValue');   // WHERE answer = 'fooValue'
     * $query->filterByAnswer('%fooValue%', Criteria::LIKE); // WHERE answer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $answer The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function filterByAnswer($answer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($answer)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CaptchaTableMap::COL_ANSWER, $answer, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCaptcha $captcha Object to remove from the list of results
     *
     * @return $this|ChildCaptchaQuery The current query, for fluid interface
     */
    public function prune($captcha = null)
    {
        if ($captcha) {
            $this->addUsingAlias(CaptchaTableMap::COL_ID, $captcha->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the captcha table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CaptchaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CaptchaTableMap::clearInstancePool();
            CaptchaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CaptchaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CaptchaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CaptchaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CaptchaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CaptchaQuery
