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
  $Id: index.php,v 1.1 2010-03-28 08:03:53 Franck Danard franckd@agmp.org Exp $ */
//include elastix framework
include_once "libs/paloSantoGrid.class.php";
include_once "libs/paloSantoForm.class.php";

function _moduleContent(&$smarty, $module_name)
{
    //include module files
    include_once "modules/$module_name/configs/default.conf.php";
    include_once "modules/$module_name/libs/paloSantoHome.class.php";

    //include file language agree to issabel configuration
    //if file language not exists, then include language by default (en)
    $lang=get_language();
    $base_dir=dirname($_SERVER['SCRIPT_FILENAME']);
    $lang_file="modules/$module_name/lang/$lang.lang";
    if (file_exists("$base_dir/$lang_file")) include_once "$lang_file";
    else include_once "modules/$module_name/lang/en.lang";

    //global variables
    global $arrConf;
    global $arrConfModule;
    global $arrLang;
    global $arrLangModule;
    $arrConf = array_merge($arrConf,$arrConfModule);
    $arrLang = array_merge($arrLang,$arrLangModule);

    //folder path for custom templates
    $templates_dir=(isset($arrConf['templates_dir']))?$arrConf['templates_dir']:'themes';
    $local_templates_dir="$base_dir/modules/$module_name/".$templates_dir.'/'.$arrConf['theme'];

    //conexion resource
    $pDB = new paloDB($arrConf['dsn_conn_database']);
	$pDB_Trk = new paloDB("sqlite3:///$arrConf[issabel_dbdir]/trunk.db");

    //actions
    $action = getAction();
    $content = "";
	
    switch($action){
        case "save_new":
            $content = saveNewHome($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
            break;
        default: // view_form
            $content = viewFormHome($smarty, $module_name, $local_templates_dir, $pDB, $pDB_Trk, $arrConf, $arrLang);
            break;
    }
    return $content;
}

function check_trunk_billing(&$pDB_Trk, $arrLang)
{
	$pDB_trunk_Billing = new paloSantoHome($pDB_Trk);
	$is_trunk = $pDB_trunk_Billing -> gettrunk();
	$popup = "";
	$message_trunk = $arrLang["No trunk Billable !!!"];
    if(!isset($is_trunk['0']))
		$popup = '<script type="text/javascript">Popup_Alert("'.$message_trunk.'")</script>';
	return $popup;
}

function viewFormHome($smarty, $module_name, $local_templates_dir, &$pDB, &$pDB_Trk, $arrConf, $arrLang)
{
    $pHome = new paloSantoHome($pDB);
    $arrFormHome = createFieldForm($arrLang, $pDB);
    $oForm = new paloForm($smarty,$arrFormHome);
	$DocumentRoot = (isset($_SERVER['argv'][1]))?$_SERVER['argv'][1]:"/var/www/html";
    require_once("$DocumentRoot/libs/misc.lib.php");
	
	check_trunk_billing($pDB_Trk, $arrLang);

    // Moving context file at first using.
    //------------------------------------
    $context	= "modules/rx_general/extensions_roomx.conf";

    //begin, Form data persistence to errors and other events.
    $_DATA  = $_POST;
    $action = getParameter("action");
    $id     = getParameter("id");

    $smarty->assign("ID", $id); 		//persistence id with input hidden in tpl
    $smarty->assign("Rooms_Free", $arrLang["Rooms Free"]);
    $smarty->assign("Rooms_Busy", $arrLang["Room Busy"]);
    $smarty->assign("Number_Rooms", $arrLang["Number of Rooms"]);
    $smarty->assign("title",_tr("Home"));
    $smarty->assign("icon","/modules/$module_name/images/icone.png");
	$smarty->assign("popup",check_trunk_billing($pDB_Trk, $arrLang));

    if($action=="view")
        $oForm->setViewMode();
    else if($action=="view_edit" || getParameter("save_edit"))
        $oForm->setEditMode();
    //end, Form data persistence to errors and other events.

    if($action=="view" || $action=="view_edit"){ // the action is to view or view_edit.
        $dataHome = $pHome->getHomeById($id);
        if(is_array($dataHome) & count($dataHome)>0)
            $_DATA = $dataHome;
        else{
            $smarty->assign("mb_title", $arrLang["Error get Data"]);
            $smarty->assign("mb_message", $pHome->errMsg);
        }
    }

    // Clean every old booking.
    //-------------------------
    $Cb	= $pHome->Clean_booking();

    $booking  = $pHome->getBookingStatus();
    $free	= $pHome->getNumHome("free","1");
    $total	= $pHome->getNumHome("","");
    $busy	= $total-$free;
    $version	= $pHome->getVersion();
    $today	= $pHome->ToDay();
    $intro	= $arrLang['Intro'].$version['version'].".";

    $smarty->assign("SAVE", $arrLang["Save"]);
    $smarty->assign("EDIT", $arrLang["Edit"]);
    $smarty->assign("CANCEL", $arrLang["Cancel"]);
    $smarty->assign("REQUIRED_FIELD", $arrLang["Required field"]);
    $smarty->assign("IMG", "images/list.png");
    $smarty->assign("LOGO", "./modules/$module_name/images/logo-roomx.png");
    $smarty->assign("Roomx_intro", $intro);
    $smarty->assign("FREE",$free);  
    $smarty->assign("BUSY",$busy); 
    $smarty->assign("Booking_Today", $arrLang["No Booking Today"]);
    if ($booking > 0){
    	$smarty->assign("BOOKING","<a style='text-decoration: none;' href='index.php?menu=rx_booking_list&filter_field=date_ci&filter_value=$today'><button type='button'>".$booking." ".$arrLang["Booking Today"]."</button></a>");   
    	$smarty->assign("Booking_Today","");
    }
    $smarty->assign("TOTAL",$total);

    $Warning 	= $busy + $booking;
    if ($Warning == $total)
    	$smarty->assign("mb_message", $arrLang["Potentially full"] );
    if ($busy == $total)
	$smarty->assign("mb_message", $arrLang["Full"] );

    $htmlForm = $oForm->fetchForm("$local_templates_dir/form.tpl",$arrLang["Home"], $_DATA);
    $content = "<form  method='POST' style='margin-bottom:0;' action='?menu=$module_name'>".$htmlForm."</form>";

    return $content;
}

function saveNewHome($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf, $arrLang)
{
    $pHome = new paloSantoHome($pDB);
    $arrFormHome = createFieldForm($arrLang, $pDB);
    $oForm = new paloForm($smarty,$arrFormHome);

    if(!$oForm->validateForm($_POST)){
        // Validation basic, not empty and VALIDATION_TYPE 
        $smarty->assign("mb_title", $arrLang["Validation Error"]);
        $arrErrores = $oForm->arrErroresValidacion;
        $strErrorMsg = "<b>{$arrLang['The following fields contain errors']}:</b><br/>";
        if(is_array($arrErrores) && count($arrErrores) > 0){
            foreach($arrErrores as $k=>$v)
                $strErrorMsg .= "$k, ";
        }
        $smarty->assign("mb_message", $strErrorMsg);
        $content = viewFormHome($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
    }
    else{
        //NO ERROR, HERE IMPLEMENTATION OF SAVE
        //$content = "Code to save yet undefined.";
        $smarty->assign("SAVE", $arrLang["Save"]);
        $smarty->assign("EDIT", $arrLang["Edit"]);
        $smarty->assign("CANCEL", $arrLang["Cancel"]);
        $smarty->assign("REQUIRED_FIELD", $arrLang["Required field"]);
        $smarty->assign("IMG", "images/list.png");

        $local_templates_dir = "/var/www/html/modules/rx_check_in/themes/default";
        $module_name = "rx_check_in";
        $htmlForm = $oForm->fetchForm("$local_templates_dir/form.tpl",$arrLang["Home"], $_POST);
        $content = "<form  method='POST' style='margin-bottom:0;' action='?menu=$module_name>".$htmlForm."</form>";
    }
    return $content;
}

function createFieldForm($arrLang, &$pDB)
{

    $pCI= new paloSantoHome($pDB);
    $free=$pCI->getNumHome("free","1");
    $total=$pCI->getNumHome("","");
    $arrOptions="";

    $arrFields = array(
            "room"   => array(      "LABEL"                  => $arrLang["room"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "SELECT",
                                            "INPUT_EXTRA_PARAM"      => $arrOptions,
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => "",
                                            "EDITABLE"               => "si",
                                            ),

            );
    return $arrFields;
}

function getAction()
{
    if(getParameter("save_new")) //Get parameter by POST (submit)
        return "save_new";
    else if(getParameter("save_edit"))
        return "save_edit";
    else if(getParameter("delete")) 
        return "delete";
    else if(getParameter("new_open")) 
        return "view_form";
    else if(getParameter("action")=="view")      //Get parameter by GET (command pattern, links)
        return "view_form";
    else if(getParameter("action")=="view_edit")
        return "view_form";
    else
        return "report"; //cancel
}
?>