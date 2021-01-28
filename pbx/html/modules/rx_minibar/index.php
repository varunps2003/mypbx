<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Elastix version 2.0.0-27                                               |
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
  $Id: index.php,v 1.1 2010-07-19 09:07:07 Franck Danard franckd@agmp.org Exp $ */
//include elastix framework
include_once "libs/paloSantoGrid.class.php";
include_once "libs/paloSantoForm.class.php";

function _moduleContent(&$smarty, $module_name)
{
    //include module files
    include_once "modules/$module_name/configs/default.conf.php";
    include_once "modules/$module_name/libs/paloSantoMiniBar.class.php";

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
        case "save_new":
            $content = saveNewMiniBar($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
            break;
        default: // view_form
            $content = viewFormMiniBar($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
            break;
    }
    return $content;
}

function viewFormMiniBar($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf, $arrLang)
{
    $pMiniBar = new paloSantoMiniBar($pDB);
    $arrFormMiniBar = createFieldForm($arrLang, $pDB);
    $oForm = new paloForm($smarty,$arrFormMiniBar);

    //begin, Form data persistence to errors and other events.
    $_DATA  = $_POST;
    $action = getParameter("action");
    $id     = getParameter("id");
    $smarty->assign("ID", $id); //persistence id with input hidden in tpl

    if($action=="view")
        $oForm->setViewMode();
    else if($action=="view_edit" || getParameter("save_edit"))
        $oForm->setEditMode();
    //end, Form data persistence to errors and other events.

    if($action=="view" || $action=="view_edit"){ // the action is to view or view_edit.
        $dataMiniBar = $pMiniBar->getMiniBarById($id);
        if(is_array($dataMiniBar) & count($dataMiniBar)>0)
            $_DATA = $dataMiniBar;
        else{
            $smarty->assign("mb_title", $arrLang["Error get Data"]);
            $smarty->assign("mb_message", $pMiniBar->errMsg);
        }
    }

    $smarty->assign("SAVE", $arrLang["Save"]);
    $smarty->assign("EDIT", $arrLang["Edit"]);
    $smarty->assign("CANCEL", $arrLang["Cancel"]);
    $smarty->assign("REQUIRED_FIELD", $arrLang["Required field"]);
    $smarty->assign("IMG", "/modules/$module_name/images/icone.png");
    $smarty->assign("icon", "/modules/$module_name/images/icone.png");
    $smarty->assign("Digits", $arrLang["Digits"]);
    $smarty->assign("Prices", $arrLang["Prices"]);
    $smarty->assign("Labels", $arrLang["Labels"]);
    $smarty->assign("VAT", $arrLang["VAT"]);

    $arr_MiniBar = $pMiniBar->getMiniBar();

    foreach($arr_MiniBar as $key => $value)
	{	
		$idx_d = "t".$value['digit'];
		$idx_c = "cost_".$value['digit'];
		$_DATA[$idx_d] = $value['label'];
		$_DATA[$idx_c] = $value['price'];
		$_DATA['vat'] = $value['vat'];			
	}

    $htmlForm = $oForm->fetchForm("$local_templates_dir/form.tpl",$arrLang["Mini Bar"], $_DATA);
    $content = "<form  method='POST' style='margin-bottom:0;' action='?menu=$module_name'>".$htmlForm."</form>";

    return $content;
}

function saveNewMiniBar($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf, $arrLang)
{
    $pMiniBar = new paloSantoMiniBar($pDB);
    $arrFormMiniBar = createFieldForm($arrLang, $pDB);
    $oForm = new paloForm($smarty,$arrFormMiniBar);

    $smarty->assign("SAVE", $arrLang["Save"]);
    $smarty->assign("EDIT", $arrLang["Edit"]);
    $smarty->assign("CANCEL", $arrLang["Cancel"]);
    $smarty->assign("REQUIRED_FIELD", $arrLang["Required field"]);
    $smarty->assign("IMG", "/modules/$module_name/images/icone.png");
    $smarty->assign("icon", "/modules/$module_name/images/icone.png");
    $smarty->assign("Digits", $arrLang["Digits"]);
    $smarty->assign("Prices", $arrLang["Prices"]);
    $smarty->assign("Labels", $arrLang["Labels"]);
    $smarty->assign("VAT", $arrLang["VAT"]);

    $_DATA  = $_POST;

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
        $content = viewFormMiniBar($smarty, $module_name, $local_templates_dir, $pDB, $arrConf, $arrLang);
    }
    else{
        //NO ERROR, HERE IMPLEMENTATION OF SAV

        $VATOptions = $pMiniBar->getVat();
	 $n = 1;
	 foreach($VATOptions as $v => $value){
	 	if ($_DATA['vat'] == $n)
	 		$value_vat = $value;
		$n++;
	 }

    	foreach($_DATA as $key => $value)
		{	
			$digit = $key{strlen($key)-1};
			$value_m['digit'] 	= "'".$digit."'";
			
			if (is_numeric($digit))
			{

				if (strlen($key) == '2')
					{
					$value_l = $value;
					$value_m['label'] 	= "'".$value_l."'";
					}
				else
					{
					$value_m['price'] 	= "'".$value."'";
					$value_m['vat'] 	= "'".$value_vat."'";
					$where = "digit = ".$digit;
					$save_MiniBar = $pMiniBar->updateMiniBar('minibar', $value_m , $where );	
					}
			}		  	
		}
	
    	 $htmlForm = $oForm->fetchForm("$local_templates_dir/form.tpl",$arrLang["Mini Bar"], $_DATA);
     	 $content = "<form  method='POST' style='margin-bottom:0;' action='?menu=$module_name'>".$htmlForm."</form>";
    }
    return $content;
}

function createFieldForm($arrLang, &$pDB)
{
    $pMiniBar = new paloSantoMiniBar($pDB);
    $arr_MiniBar = $pMiniBar->getMiniBar();
	
    $VATOptions = $pMiniBar->getVat();
    $arrOptions =array('1' => $VATOptions['vat_2'], '2' => $VATOptions['vat_1']);
    If($arr_MiniBar[0]['vat'] == $VATOptions['vat_1'])
    	$arrOptions =array('1' => $VATOptions['vat_1'], '2' => $VATOptions['vat_2']);

    $arrFields = array(
            "t1"       => array(      "LABEL"                        => $arrLang["_1"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_1"   => array(      "LABEL"                        => $arrLang["Cost (1)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t2"       => array(      "LABEL"                         => $arrLang["_2"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_2"   => array(      "LABEL"                        => $arrLang["Cost (2)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t3"       => array(      "LABEL"                        => $arrLang["_3"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_3"   => array(      "LABEL"                        => $arrLang["Cost (3)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t4"       => array(      "LABEL"                        => $arrLang["_4"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_4"   => array(      "LABEL"                        => $arrLang["Cost (4)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t5"       => array(      "LABEL"                        => $arrLang["_5"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_5"   => array(      "LABEL"                        => $arrLang["Cost (5)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t6"       => array(      "LABEL"                        => $arrLang["_6"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_6"   => array(      "LABEL"                        => $arrLang["Cost (6)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t7"       => array(      "LABEL"                        => $arrLang["_7"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_7"   => array(      "LABEL"                        => $arrLang["Cost (7)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t8"       => array(      "LABEL"                        => $arrLang["_8"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_8"   => array(      "LABEL"                        => $arrLang["Cost (8)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t9"       => array(      "LABEL"                        => $arrLang["_9"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_9"   => array(      "LABEL"                        => $arrLang["Cost (9)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "t0"       => array(      "LABEL"                        => $arrLang["_0"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => "",
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "cost_0"   => array(      "LABEL"                        => $arrLang["Cost (0)"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "TEXT",
                                            "INPUT_EXTRA_PARAM"      => array("style" => "width:50px"),
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
                                            ),
            "vat"      => array(    "LABEL"                          => $arrLang["vat"],
                                            "REQUIRED"               => "no",
                                            "INPUT_TYPE"             => "SELECT",
                                            "INPUT_EXTRA_PARAM"      => $arrOptions,
                                            "VALIDATION_TYPE"        => "text",
                                            "VALIDATION_EXTRA_PARAM" => ""
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