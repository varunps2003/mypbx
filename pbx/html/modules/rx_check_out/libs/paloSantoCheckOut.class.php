<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Elastix version 2.0.0-22                                               |
  | http://www.elastix.org                                               |
  +----------------------------------------------------------------------+
  | Copyright (c) 2006 Palosanto Solutions S. A.                         |
  +----------------------------------------------------------------------+
  | Cdla. Nueva Kennedy Calle E 222 y 9na. Este                          |
  | Telfs. 2283-268, 2294-440, 2284-356                                  |
  | Guayaquil - Ecuador                                                  |
  | http://www.palosanto.com                                             |
  +----------------------------------------------------------------------+
  | The contents of this file are subject to the General Public License  |
  | (GPL) Version 2 (the "License"); you may not use this file except in |
  | compliance with the License. You may obtain a copy of the License at |
  | http://www.opensource.org/licenses/gpl-license.php                   |
  |                                                                      |
  | Software distributed under the License is distributed on an "AS IS"  |
  | basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See  |
  | the License for the specific language governing rights and           |
  | limitations under the License.                                       |
  +----------------------------------------------------------------------+
  | The Original Code is: Elastix Open Source.                           |
  | The Initial Developer of the Original Code is PaloSanto Solutions    |
  +----------------------------------------------------------------------+
  $Id: paloSantoCheckOut.class.php,v 1.1 2010-05-08 11:05:33 Franck Danard franckd@agmp.org Exp $ */
class paloSantoCheckOut {
    var $_DB;
    var $errMsg;

    function paloSantoCheckOut(&$pDB)
    {
        // Se recibe como parámetro una referencia a una conexión paloDB
        if (is_object($pDB)) {
            $this->_DB =& $pDB;
            $this->errMsg = $this->_DB->errMsg;
        } else {
            $dsn = (string)$pDB;
            $this->_DB = new paloDB($dsn);

            if (!$this->_DB->connStatus) {
                $this->errMsg = $this->_DB->errMsg;
                // debo llenar alguna variable de error
            } else {
                // debo llenar alguna variable de error
            }
        }
    }

    /*HERE YOUR FUNCTIONS*/

    function insertQuery($sTabla, $arrValores){
	// call function construirInsert
	$query = $this->_DB->construirInsert($sTabla, $arrValores) ;

	// now execute the query with genQuery(fucntion of the paloSantoDB.class)
	$result = $this->_DB->genQuery($query);

	// catch the error
	if($result==FALSE)
         return false;
         return true; 
    }

    function updateQuery($sTabla, $arrValores, $where){
	// call function construirInsert
	$query = $this->_DB->construirUpdate($sTabla, $arrValores, $where);

	// now execute the query with genQuery(fucntion of the paloSantoDB.class)
	$result = $this->_DB->genQuery($query);

	// catch the error
	if($result==FALSE)
         return false;
         return true; 
    }

    function getNumCheckOut($table, $filter_field, $filter_value)
    {
        $where = "";
        if(isset($filter_field) & $filter_field !="")
            $where = "where $filter_field like '$filter_value%'";

        $query   = "SELECT COUNT(*) FROM $table $where";

        $result=$this->_DB->getFirstRowQuery($query);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return 0;
        }
        return $result[0];
    }

    function getGroupCheckOut()
    {

        $query = "SELECT DISTINCT groupe FROM `rooms` WHERE 1 ";

        $result=$this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return 0;
        }
        return $result;
    }

    function getCheckOut($table, $where)
    {

        $query   = "SELECT * FROM $table $where";

        $result=$this->_DB->fetchTable($query, true);
        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return array();
        }
        return $result;
    }

    function getNightNumber($ci, $co, $id)
    {
        $query   = "SELECT DATEDIFF('".$co."','".$ci."') FROM `register` WHERE id ='".$id."'";

        $result=$this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return array();
        }
        return $result[0];
    }

    function getCDR($where)
    {
        $query   = "SELECT `calldate`, `dst`, `billsec`, `dstchannel`, `lastdata`  FROM cdr $where";

        $result=$this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return array();
        }
        return $result;
    }

    function getCheckOutById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id=$id";

        $result=$this->_DB->getFirstRowQuery($query,true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return null;
        }
        return $result;
    }

    function loadCurrency()
    {
        $query = "SELECT * FROM settings WHERE key='currency'";
        $result = $this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return false;
        }

        $result = $result[0];
        $curr = $result['value'];

        return $curr;
    }

    function loadRates()
    {
        $query = "select * from rate where prefix != '' and estado = 'activo' and fecha_creacion <=  '".date('Y-m-d H:i:s')."'";

        $result = $this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return false;
        }

        return $result;
    }

    function load_Def_Rate()
    {
        $query = "select * from rate where name = 'Default' and estado = 'activo' and fecha_creacion <=  '".date('Y-m-d H:i:s')."'";
        $result = $this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return false;
        }

        return $result[0];
    }

    function loadtrunk()
    {
        $query = "select `trunk` FROM `trunk_bill`";
        $result = $this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return false;
        }

        return $result;
    }
}
?>