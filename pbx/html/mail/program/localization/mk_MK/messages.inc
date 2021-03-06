<?php

/*
+-----------------------------------------------------------------------+
| language/mk_MK/messages.inc                                              |
|                                                                       |
| Language file of the RoundCube Webmail client                         |
| Copyright (C) 2005-2009, RoundCube Dev. - Switzerland                 |
| Licensed under the GNU GPL                                            |
|                                                                       |
+-----------------------------------------------------------------------+
| Author:  Ivan Mishev - mishevivan@gmail.com                           |
+-----------------------------------------------------------------------+

@version $Id$

*/

$messages = array();
$messages['loginfailed'] = 'Неуспешна најава';
$messages['cookiesdisabled'] = 'Вашиот прелистувач не прифаќа cookies';
$messages['sessionerror'] = 'Сесијата е невалидна или е истечена';
$messages['passwordsnotmatch'] = 'The passwords not match.';
$messages['imaperror'] = 'Конектирањето со IMAP е неуспешно';
$messages['nomessagesfound'] = 'Немате пораки во вашата пошта';
$messages['loggedout'] = 'Успешно се одлогиравте. Благодариме!';
$messages['mailboxempty'] = 'Поштенското сандаче е празно.';
$messages['loading'] = 'Вчитувам...';
$messages['loadingdata'] = 'Ги вчитувам податоците...';
$messages['checkingmail'] = 'Проверување за нови пораки...';
$messages['sendingmessage'] = 'Праќање на пораката...';
$messages['messagesent'] = 'Пораката е успешно пратена';
$messages['savingmessage'] = 'Пораката се снима...';
$messages['messagesaved'] = 'Пораката е снимена во Непратени';
$messages['successfullysaved'] = 'Успешно снимено';
$messages['addedsuccessfully'] = 'Името е успешно додадено ви Именик';
$messages['contactexists'] = 'Веќе постои име со зададената Е-маил адреса';
$messages['blockedimages'] = 'За да се заштити вашата приватност, сликите во оваа порака не се прикажани.';
$messages['encryptedmessage'] = 'Оваа порака е кодирана и неможе да се прикаже. Извинете!';
$messages['nocontactsfound'] = 'Нема Имиња во Именикот.';
$messages['contactnotfound'] = 'Бараното име не постои';
$messages['sendingfailed'] = 'Пораката не е пратена';
$messages['senttooquickly'] = 'Ве молиме почекајте $sec секунда/и пред да ја испратите пораката';
$messages['errorsavingsent'] = 'Грешка при снимањето на пратената порака';
$messages['errorsaving'] = 'Грешка при снимањето';
$messages['errormoving'] = 'Пораката неможе да се премести';
$messages['errordeleting'] = 'Пораката неможе да се избрише';
$messages['deletecontactconfirm'] = 'Дали сте сигурни дека сакате да го избришете обележаниот(те) контакт(и)?';
$messages['deletemessagesconfirm'] = 'Дали сте сигурни дека сакате да го избришете обележаниот(те) порака(и)?';
$messages['deletefolderconfirm'] = 'Дали сте сигурни дека сакате да ја избришете оваа папка?';
$messages['purgefolderconfirm'] = 'Дали сте сигурни дека сакате да ги избршете сите пораки во оваа папка?';
$messages['foldercreating'] = 'Папката се креира...';
$messages['folderdeleting'] = 'Папката се брише...';
$messages['folderrenaming'] = 'Папката се преименува...';
$messages['foldermoving'] = 'Папката се преместува...';
$messages['formincomplete'] = 'Имате изоставено непополнети информации';
$messages['noemailwarning'] = 'Внесете валидна емаил адреса';
$messages['nonamewarning'] = 'Внесете име';
$messages['nopagesizewarning'] = 'Внесете ја големината на страната';
$messages['nosenderwarning'] = 'Внесете ја адресата на праќачот';
$messages['norecipientwarning'] = 'Внесете барем еден примач';
$messages['nosubjectwarning'] = 'Немате внесено „Наслов“. Дали сакате да внесете?';
$messages['nobodywarning'] = 'Пораката нема текст во неа. Дали сакате да ја пратите?';
$messages['notsentwarning'] = 'Пораката не е пратена. Дали сакате да ја откажете?';
$messages['noldapserver'] = 'Изберете LDAP сервер за пребарување';
$messages['nocontactsreturned'] = 'Не се најдени имиња';
$messages['nosearchname'] = 'Внесете име или емаил адреса';
$messages['searchsuccessful'] = '$nr пораки се најдени';
$messages['searchnomatch'] = 'Претражувањето нема резлутати';
$messages['searching'] = 'Пребарувам....';
$messages['checking'] = 'Проверувам...';
$messages['nospellerrors'] = 'Нема грешки во спелувањето';
$messages['folderdeleted'] = 'Папката е успешно избришана';
$messages['deletedsuccessfully'] = 'Успешно избришано';
$messages['converting'] = 'Форматирањето на пораката е отстрането...';
$messages['messageopenerror'] = 'Пораката неможе да се вчита од серверот';
$messages['fileuploaderror'] = 'Прикачувањето е неуспешно';
$messages['filesizeerror'] = 'Датотеката што се прикачува го изминува лимитот од $size';
$messages['copysuccess'] = 'Успешно се копирани $nr имиња';
$messages['copyerror'] = 'Неможе да се копираат адресите';
$messages['sourceisreadonly'] = 'Изворот на оваа адреса неможе да се промени';
$messages['errorsavingcontact'] = 'Името неможе да се сними';
$messages['movingmessage'] = 'Пораката се преместува...';
$messages['receiptsent'] = 'Известувањето е успешно пратено';
$messages['errorsendingreceipt'] = 'Известувањето не е пратено';
$messages['nodeletelastidentity'] = 'Овој идентитет неможе да се избрише, тој е последниот.';
$messages['addsubfolderhint'] = 'Оваа папка ќе биде креирана како под-папка на селектираната.';
$messages['forbiddencharacter'] = 'Името на папката содржи несоодветен формат';
$messages['selectimportfile'] = 'Изберете ја датотеката која сакате да ја прикачите';
$messages['addresswriterror'] = 'Одберениот именик не може да се променува';
$messages['importwait'] = 'Импортирам, ве молиме почекајте...';
$messages['importerror'] = 'Импортирањето е неуспешно! Прикачената датотека не е валиден vCard документ.';
$messages['importconfirm'] = '<b>Успешно се импортирани $inserted контакти, $skipped веќе постојат и се прескокнати</b>:<p><em>$names</em></p>';
$messages['opnotpermitted'] = 'Операцијата не е дозволена';
$messages['nofromaddress'] = 'Не е внесена е-пошта во одберениот идентитет';
$messages['editorwarning'] = 'Променување во обичен текст променувач ќе резултира со губење на целото форматирање на текстот. Сакате да продолжите?';
$messages['loginemberror'] = 'Your Issabel interface user does not have an email account assigned.';
?>
