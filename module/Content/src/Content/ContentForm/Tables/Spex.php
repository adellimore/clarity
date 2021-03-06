<?php
/**
 * Created by PhpStorm.
 * User: wsalazar
 * Date: 8/12/14
 * Time: 12:47 PM
 */

namespace Content\ContentForm\Tables;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\ExpressionInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Expression;

trait Spex {

    public function productAttribute(Sql $sql, array $columns = array(), $where = null,  $tableType, $filter = null, array $joins = array() )
    {
        $select = $sql->select();
        if(count($columns)) {
            $select->columns($columns);
        }
        if($joinTables = count($joins)) {
            for($i = 0; $i < $joinTables; $i++){
                $alias = $joins[$i][0];
                $on = $joins[$i][1];
                $cols = $joins[$i][2];
                $select->join($alias, $on, $cols);
            }
        }
        $select->from('productattribute_'. $tableType);
        if( $filter instanceof Where ) {
            $filter->notEqualTo($where['left'],$where['right']);
            $select->where($filter);
        } else {
            $select->where($where);
        }
        $select->join(array('u' => 'users'),'u.userid = productattribute_'.$tableType.'.changedby ' ,array('fName' => 'firstname', 'lName' => 'lastname'), Select::JOIN_LEFT);

//        $select->quantifier(Select::QUANTIFIER_DISTINCT);
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        $resultSet = new ResultSet;
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet->initialize($result);
        }
        return $resultSet;

    }

    public function productAttributeLookup(Sql $sql, $where = null)
    {
        $select = $sql->select();
        $select->from('productattribute_lookup');
//        $select->columns(['attId'=>'attribute_id','dataType'=>'backend_type','attCode'=>'attribute_code']);
        $select->columns(['attId'=>'attribute_id','dataType'=>'backend_type','attCode'=>'attribute_code', 'frontend'=>'frontend_label', 'dateModified'=>'lastModifiedDate']);
        if(count($where)){
            $select->where($where);
        }
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        $resultSet = new ResultSet;
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet->initialize($result);
        }
        return $resultSet->toArray();
    }

    public function productUpdateaAttributes(Sql $sql, $tableType, array $set = array(), array $where = array())
    {
        $update = $sql->update('productattribute_'.$tableType);
        $update->set($set);
        $update->where($where);
        $statement = $sql->prepareStatementForSqlObject($update);
        $result = $statement->execute();
        $resultSet = new ResultSet;
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet->initialize($result);
        }
        return $resultSet;
    }
} 