<?php

/*

+-----------------------------------------------------------------------+
| language/hr/messages.inc                                              |
|                                                                       |
| Language file of the RoundCube Webmail client                         |
| Copyright (C) 2005-2009, RoundCube Dev. - Switzerland                 |
| Licensed under the GNU GPL                                            |
|                                                                       |
+-----------------------------------------------------------------------+
| Author: Edi Budimilic <edi@gemstudio.hr>                              |
+-----------------------------------------------------------------------+

@version $Id: messages.inc 2237 2009-01-17 01:55:39Z till $

*/

$messages = array();
$messages['loginfailed'] = 'Prijava neuspješna';
$messages['cookiesdisabled'] = 'Vaš Web preglednik ne podržava kolačiće (cookies)';
$messages['sessionerror'] = 'Morate se ponovno ulogirati';
$messages['passwordsnotmatch'] = 'The passwords not match.';
$messages['imaperror'] = 'Neuspješna veza na IMAP server';
$messages['nomessagesfound'] = 'Nema poruka u sandučiću';
$messages['loggedout'] = 'Uspješna odjava.';
$messages['mailboxempty'] = 'Sandučuć je prazan';
$messages['loading'] = 'Učitavanje...';
$messages['loadingdata'] = 'Učitavanje podataka...';
$messages['checkingmail'] = 'Provjera novih poruka u tijeku...';
$messages['sendingmessage'] = 'Poruka se šalje...';
$messages['messagesent'] = 'Poruka je uspješno poslana';
$messages['savingmessage'] = 'Poruka se sprema...';
$messages['messagesaved'] = 'Poruka uspješno spremljena u \'Predlošci\'';
$messages['successfullysaved'] = 'Spremanje uspješno obavljeno';
$messages['addedsuccessfully'] = 'Kontakt uspješno dodan u imenik';
$messages['contactexists'] = 'Kontakt sa ovom e-mail adresom već postoji u imeniku';
$messages['blockedimages'] = 'Zbog zaštite privatnosti, slike sa udaljenih servera su blokirane.';
$messages['encryptedmessage'] = 'Ova poruka je zaštićena pa se ne može prikazati';
$messages['nocontactsfound'] = 'Imenik je prazan';
$messages['contactnotfound'] = 'Traženi kontakt nije pronađen';
$messages['sendingfailed'] = 'Greška pri slanju poruke';
$messages['senttooquickly'] = 'Molimo sačekajte $sec sek. prije slanja ove poruke';
$messages['errorsavingsent'] = 'Greška pri spremanju poslane poruke';
$messages['errorsaving'] = 'Greška pri spremanju';
$messages['errormoving'] = 'Greška pri premještanju poruke';
$messages['errordeleting'] = 'Greška pri brisanju poruke';
$messages['deletecontactconfirm'] = 'Želite li obrisati izabrane kontakte?';
$messages['deletemessagesconfirm'] = 'Sigurno želite obrisati odabrane poruke?';
$messages['deletefolderconfirm'] = 'Želite li obrisati ovu mapu?';
$messages['purgefolderconfirm'] = 'Želite li obrisati sve poruke u mapi?';
$messages['foldercreating'] = 'Kreiram mapu...';
$messages['folderdeleting'] = 'Brišem mapu...';
$messages['folderrenaming'] = 'Mijenjam naziv mape...';
$messages['foldermoving'] = 'Premještam mapu...';
$messages['formincomplete'] = 'Obrazac nije u cjelosti popunjen';
$messages['noemailwarning'] = 'Unesite valjanu e-mail adresu';
$messages['nonamewarning'] = 'Unesite ime';
$messages['nopagesizewarning'] = 'Unesite veličinu stranice';
$messages['nosenderwarning'] = 'Unesite e-mail adresu pošiljatelja';
$messages['norecipientwarning'] = 'Unesite primatelja (ZA)';
$messages['nosubjectwarning'] = 'Polje \'Naslov\' je prazno. Želite li unijeti naslov?';
$messages['nobodywarning'] = 'Želite li poslati poruku bez teksta?';
$messages['notsentwarning'] = 'Poruka nije poslana. Želite li odbaciti ovu poruku?';
$messages['noldapserver'] = 'Unesite LDAP poslužitelj za pretragu';
$messages['nocontactsreturned'] = 'Nije pronađen niti jedan kontakt';
$messages['nosearchname'] = 'Unesite ime ili e-mail adresu';
$messages['searchsuccessful'] = 'Broj pronađenih poruka: $nr';
$messages['searchnomatch'] = 'Traženi termin nije pronađen ni u jednoj poruci';
$messages['searching'] = 'Pretraga u tijeku...';
$messages['checking'] = 'Provjera u tijeku...';
$messages['nospellerrors'] = 'Nije pronađena niti jedna pravopisna greška';
$messages['folderdeleted'] = 'Mapa uspješno obrisana';
$messages['deletedsuccessfully'] = 'Uspješno obrisano';
$messages['converting'] = 'Formatiranje poruke';
$messages['messageopenerror'] = 'Nije moguće ';
$messages['fileuploaderror'] = 'Prijenos datoteke nije uspio';
$messages['filesizeerror'] = 'Datoteka je prevelika. Maksimalna veličina je $size';
$messages['copysuccess'] = 'Uspješno kopirano $n adresa';
$messages['copyerror'] = 'Nije uspjelo kopiranje adresa';
$messages['sourceisreadonly'] = 'Ovaj resurs adresa je samo za čitanje';
$messages['errorsavingcontact'] = 'Nije uspjelo spremanje adrese kontakta';
$messages['movingmessage'] = 'Premještanje poruke...';
$messages['receiptsent'] = 'Uspješno poslana potvrda (pročitano)';
$messages['errorsendingreceipt'] = 'Ne može poslati potvrdu';
$messages['nodeletelastidentity'] = 'Ne možete izbrisati zadnji identitet.';
$messages['addsubfolderhint'] = 'Ova mapa će biti stvorena kao podmapa na trenutno označenoj';
$messages['forbiddencharacter'] = 'Naziv mape sadrži zabranjene znakove';
$messages['selectimportfile'] = 'Odaberite datoteku za prijenos';
$messages['addresswriterror'] = 'U odabrani adresar nije moguće zapisivat...';
$messages['importwait'] = 'Uvozim, molimo sačekajte...';
$messages['importerror'] = 'Greška pri uvozu! Datoteka ne sadrži pravilan vCard format.';
$messages['importconfirm'] = '<b>Uspješno je uvezeno $inserted kontakt(a), preskočeno $skipped već postojećih</b>:<p><em>$names</em></p>';
$messages['opnotpermitted'] = 'Operacija nije dozvoljena!';
$messages['nofromaddress'] = 'Nije upisana e-mail adresa u odabrani identitet';
$messages['editorwarning'] = 'Prebacivanje u čisti tekstualni uređivač će prouzrokovati gubljenje formatiranje teksta. Želite li nastaviti?';
$messages['loginemberror'] = 'Your Issabel interface user does not have an email account assigned.';
?>
