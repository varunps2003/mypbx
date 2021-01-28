<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Elastix version 2.0.0-18                                               |
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
  $Id: paloSantoAddRoom.class.php,v 1.1 2010-04-03 04:04:58 Franck Danard franckd@agmp.org Exp $ */
class paloSantoModel {
    var $_DB;
    var $errMsg;

    function paloSantoModel(&$pDBM)
    {
        // Se recibe como parámetro una referencia a una conexión paloDB
        if (is_object($pDBM)) {
            $this->_DB =& $pDBM;
            $this->errMsg = $this->_DB->errMsg;
        } else {
            $dsn = (string)$pDBM;
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

    function getNumAddRoomModel($table, $filter_field, $filter_value)
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

    function getModel($table, $where)
    {
        $query   = "SELECT * FROM $table $where";
        $result=$this->_DB->fetchTable($query, true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return array();
        }
        return $result;
    }

    function get_Room($table, $where)
    {
        $query   = "SELECT * FROM $table $where";

        $result=$this->_DB->fetchTable($query, true);
        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return array();
        }
        return $result[0];
    }

    function updateQuery($sTabla, $arrValores, $where ){
	// call function construirUpdate
	$query = $this->_DB->construirUpdate($sTabla, $arrValores, $where);

	// now execute the query with genQuery(fucntion of the paloSantoDB.class)
	$result = $this->_DB->genQuery($query);

	// catch the error
	if($result==FALSE)
       	return;
       return; 
    }

    function DeleteRoom($filter_field, $filter_value)
    {
        $where = "";
        if(isset($filter_field) & $filter_field !="")
            $where = "where $filter_field = '$filter_value'";

        $query   = "DELETE FROM rooms $where";

        $result=$this->_DB->genQuery($query);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return 0;
        }
        return $result[0];
    }


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

    function getAddModelById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id=$id";

        $result=$this->_DB->getFirstRowQuery($query,true);

        if($result==FALSE){
            $this->errMsg = $this->_DB->errMsg;
            return null;
        }
        return $result;
    }
}
?>