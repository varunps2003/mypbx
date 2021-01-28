<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Elastix version 2.0.0-23                                               |
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
  $Id: index.php,v 1.1 2010-06-16 08:06:19 Franck Danard franckd@agmp.org Exp $ */
//include elastix framework
include_once "libs/paloSantoGrid.class.php";
include_once "libs/paloSantoForm.class.php";

function _moduleContent(&$smarty, $module_name)
{
    //include module files
    include_once "modules/$module_name/configs/default.conf.php";
    include_once "modules/$module_name/libs/paloSantoBillingreport.class.php";

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
    //$pDB = "";


    //actions
    $action = getAction();
    $content = "";

    switch($action){
        case "save_new" :
            $content = savePaid($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
            break;
        default:
            $content = reportBillingreport($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
            break;
    }
    return $content;
}

function savePaid($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf, $arrLang)
{
    $pBillingreport 		= new paloSantoBillingreport($pDB);
    $filter_field 		= getParameter("filter_field");
    $filter_value 		= getParameter("filter_value");
    $_DATA 			= $_POST;

    foreach ($_DATA['paid_idx'] as $key => $value){
      $where			= "WHERE id = $value";
      $arrRegister		= $pBillingreport->getRegister($where);
      $arrValue['id']	= "'".$value."'";
      $arrValue['paid']	= "'1'";
      $save_paid 		= $pBillingreport->UpdateBilling("register", $arrValue);
    }

    $content 		= reportBillingreport($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);

    return $content;
    
}

function reportBillingreport($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf, $arrLang)
{
    $pBillingreport = new paloSantoBillingreport($pDB);
    $filter_field = getParameter("filter_field");
    $filter_value = getParameter("filter_value");
    $action = getParameter("nav");
    $start  = getParameter("start");
    $as_csv = getParameter("exportcsv");

    //begin grid parameters
    $oGrid  = new paloSantoGrid($smarty);
    $totalBillingreport = $pBillingreport->getNumBillingreport($filter_field, $filter_value);

    $limit  = 20;
    $total  = $totalBillingreport;
    $oGrid->setLimit($limit);
    $oGrid->setTotal($total);
    $oGrid->enableExport();   // enable csv export.
    $oGrid->pagingShow(true); // show paging section.

    $oGrid->calculatePagination($action,$start);
    $offset = $oGrid->getOffsetValue();
    $end    = $oGrid->getEnd();
    $url    = "?menu=$module_name&filter_field=$filter_field&filter_value=$filter_value";

    $arrData = null;
    $arrResult =$pBillingreport->getBillingreport($limit, $offset, $filter_field, $filter_value);

    $smarty->assign("SAVE", $arrLang["Save"]);
    $smarty->assign("CANCEL", $arrLang["Cancel"]);

    if(is_array($arrResult) && $total>0){
        foreach($arrResult as $key => $value){ 
	    $value_chk = $value['id'];
	    $paid 	 = "<img src='modules/$module_name/images/1.png'>";
	    if ($value['paid'] == 0)
		$paid   = "<input name='paid_idx[".$value_chk."]' type='checkbox' value='$value_chk'>";
    	    $arrRoom   = $pBillingreport->getRoomBillingreport('id',$value['room_id']);	// Get the real room's name.
           $arrGuest  = $pBillingreport->getGuestBillingreport('id',$value['guest_id']);	// Get the real guest's name
	    $arrTmp[0] = $value['date_ci'];
	    $arrTmp[1] = $value['date_co'];
	    $arrTmp[2] = $arrRoom['room_name'];
	    $arrTmp[3] = $arrGuest['first_name']." ".$arrGuest['last_name'];
	    $arrTmp[4] = $paid;
	    $arrTmp[5] = "<a style='text-decoration: none;' href='./roomx_billing/".$value['billing_file']."' target='_new'><button type='button'>".$arrLang['View']."</button></a>" ;
           $arrData[] = $arrTmp;
        }
    }


    $arrGrid = array("title"    => $arrLang["Billing report"],
                        "icon"     => "modules/$module_name/images/icone.png",
                        "width"    => "99%",
                        "start"    => ($total==0) ? 0 : $offset + 1,
                        "end"      => $end,
                        "total"    => $total,
                        "url"      => $url,
                        "columns"  => array(
			0 => array("name"      => $arrLang["Checkin Date"],
                                   "property1" => ""),
			1 => array("name"      => $arrLang["Checkout Date"],
                                   "property1" => ""),
			2 => array("name"      => $arrLang["Room"],
                                   "property1" => ""),
			3 => array("name"      => $arrLang["Guest"],
                                   "property1" => ""),
			4 => array("name"      => $arrLang["Paid"],
                                   "property1" => ""),
			5 => array("name"      => $arrLang["File"],
                                   "property1" => ""),
                                        )
                    );


    //begin section filter
    $arrFormFilterBillingreport = createFieldFilter($arrLang);
    $oFilterForm = new paloForm($smarty, $arrFormFilterBillingreport);
    $smarty->assign("SHOW", $arrLang["Show"]);

    $htmlFilter = $oFilterForm->fetchForm("$local_templates_dir/filter.tpl","",$_POST);
    //end section filter

    if($as_csv == 'yes'){
        $name_csv = "Billingreport_".date("d-M-Y").".csv";
        header("Cache-Control: private");
        header("Pragma: cache");
        header("Content-Type: application/octec-stream");
        header("Content-disposition: inline; filename={$name_csv}");
        header("Content-Type: application/force-download");
        $content = $oGrid->fetchGridCSV($arrGrid, $arrData);
    }
    else{
        $oGrid->showFilter(trim($htmlFilter));
        //$content = "<form  method='POST' style='margin-bottom:0;' action=\"$url\">".$oGrid->fetchGrid($arrGrid, $arrData,$arrLang)."</form>";
		$content = $oGrid->fetchGrid($arrGrid, $arrData,$arrLang);
    }
    //end grid parameters

    return $content;
}


function createFieldFilter($arrLang){
    $arrFilter = array(
	    "date_ci" => $arrLang["Checkin Date"],
	    "date_co" => $arrLang["Checkout Date"],
	    "paid"    => $arrLang["Paid"],
	    //"room_id" => $arrLang["Room"],
	    //"guest_id" => $arrLang["Guest"],
	    "billing_file" => $arrLang["File"],
                    );

    $arrFormElements = array(
            "filter_field" => array("LABEL"                  => $arrLang["Search"],
                                    "REQUIRED"               => "no",
                                    "INPUT_TYPE"             => "SELECT",
                                    "INPUT_EXTRA_PARAM"      => $arrFilter,
                                    "VALIDATION_TYPE"        => "text",
                                    "VALIDATION_EXTRA_PARAM" => ""),
            "filter_value" => array("LABEL"                  => "",
                                    "REQUIRED"               => "no",
                                    "INPUT_TYPE"             => "TEXT",
                                    "INPUT_EXTRA_PARAM"      => "",
                                    "VALIDATION_TYPE"        => "text",
                                    "VALIDATION_EXTRA_PARAM" => ""),
                    );
    return $arrFormElements;
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