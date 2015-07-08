<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Finnish locale for local_obf.
 *
 * @package    local_obf
 * @copyright  2015, Discendum Oy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$string['activitycompletedby'] = 'Suoritettava viimeistään';
$string['addcourses'] = 'Lisää valitut kurssit';
$string['addcriteria'] = 'Luo uusi myöntämissääntö';
$string['addnewcriterion'] = 'Lisää kurssi';
$string['apierror0'] = 'Yhteys Open Badge Factoryyn epäonnistui. Sivuston ylläpidon tulee tarkistaa'
        . ' Open Badge Factory -lisäosan asetukset.';
$string['apierror400'] = 'Yhteys OBF-palveluun epäonnistui virheellisen tai puuttuvan parametrin vuoksi.';
$string['apierror403'] = 'Yhteys Open Badge Factoryyn epäonnistui virheellisen valtuutusavaimen vuoksi.';
$string['apierror404'] = 'Yhteys OBF-palveluun epäonnistui virheellisen osoitteen vuoksi.';
$string['apierror405'] = '405 Method not allowed';
$string['apierror411'] = '411 Length required';
$string['apierror413'] = '413 Request entity too large';
$string['apierror429'] = '429 Too many requests';
$string['apierror495'] = '495 Cert error';
$string['apierror496'] = 'Open Badge Factoryn käyttö ei ole mahdollista ennen sertifikaatin luontia.'
        . ' Kirjaudu Open Badge Factoryyn luodaksesi valtuutusavaimen ja liitä se oheiseen '
        . 'tekstikenttään.';
$string['apierror500'] = 'Palvelinvirhe';
$string['apierror502'] = '502 Bad gateway';
$string['apierror503'] = 'OBF-palvelu on väliaikaisesti tavoittamattomissa. Ole hyvä ja yritä'
        . ' hetken kuluttua uudelleen.';
$string['authenticate'] = 'Yhdistä';
$string['authenticationsuccess'] = 'Valtuutus onnistui.';
$string['availablecategories'] = 'Sallitut kategoriat';
$string['availablecategoriesselect'] = 'Kategoriat';
$string['availablecategorieshelp'] = 'Valitse merkkikategoriat, joiden osaamismerkkejä '
        . 'sivuston kautta voidaan myöntää. Mikäli yhtään kategoriaa ei ole valittu, '
        . 'merkkejä voidaan myöntää kaikista kategorioista.';
$string['back'] = 'Takaisin';
$string['backpackconnected'] = 'Yhteys muodostettu';
$string['backpackdisconnected'] = 'Yhteyttä ei ole muodostettu';
$string['backpackemail'] = 'Sähköpostiosoite';
$string['backpackemailnotfound'] = 'Sähköpostiosoitteella \'{$a}\' ei löytynyt käyttäjää Mozilla '
        . 'Backpackista.';
$string['backpackemail_help'] = 'Omaan Mozilla OpenBadges Backpack -tiliin liitetty '
        . 'sähköpostiosoitteesi';
$string['backpackemailaddexternalobp'] = '<p>Sähköpostiosoitteella \'<strong>{$a}</strong>\' ' .
        'ei löytynyt käyttäjää Open Badge Passport -palvelusta.</p><p>Lisätäksesi ' .
        'sähköpostiosoitteesi, avaa <a href="https://openbadgepassport.com" target="_blank">' .
        'https://openbadgepassport.com</a> -osoite selaimessasi ja kirjaudu palveluun.</p><p>' .
        'Kirjauduttuasi seuraa ' .
        '<strong><i>Käyttäjätilini &gt; Käyttäjätilin asetukset &gt; Sähköpostiosoitteet</i></strong> ' .
        '-navigointipolkua. </p><p>Ollessasi <i>Sähköpostiosoitteet</i>-sivulla, ' .
        'lisää \'<strong>{$a}</strong>\', sivulla näkyvään, \'Lisää uusi sähköpostiosoite\' -kenttään ' .
        'ja tallenna osoite.</p>';
$string['backpackgroups'] = 'Näytettävät ryhmät';
$string['backpackgroups_help'] = 'Valitse ryhmät, joiden osaamismerkit näytetään toisille kurssilaisille.';
$string['backpacksettings'] = 'Backpack-asetukset';
$string['badgeactions'] = 'Toiminnot';
$string['badgeblacklist'] = 'Merkkien piilottaminen';
$string['badgecategories'] = 'Kategoriat';
$string['badgecreated'] = 'Luotu';
$string['badgecriteria'] = 'Myöntämissäännöt';
$string['badgecriteriaurl'] = 'Kriteerisivu';
$string['badgedescription'] = 'Kuvaus';
$string['badgedetails'] = 'Osaamismerkin tiedot';
$string['badgeemail'] = 'Sähköpostiviesti';
$string['badgeexport'] = 'Moodlessa aiemmin luodut merkit';
$string['badgeexportdescription'] = 'Valituista merkeistä luodaan kopio Open Badge Factory -palveluun.';
$string['badgeexportzeroexportable'] = 'Vietäviä merkkejä ei löytynyt, tai kaikki merkit on jo viety.';
$string['badgeexpiresby'] = 'Vanhenee';
$string['badgehistory'] = 'Myöntämishistoria';
$string['badgeimage'] = 'Osaamismerkki';
$string['badgeissued'] = 'Osaamismerkin myöntäminen onnistui.';
$string['badgeissuedwhen'] = 'Tämä merkki myönnetään automaattisesti, kun jokin seuraavista'
        . ' säännöistä täyttyy:';
$string['badgelist'] = 'Osaamismerkit';
$string['badgelisttitle'] = 'Osaamismerkit';
$string['badgename'] = 'Nimi';
$string['badgetags'] = 'Tagit';
$string['badgewasautomaticallyissued'] = 'Osaamismerkki myönnettiin {$a}:lle henkilölle.';
$string['blacklistbadge'] = 'Älä näytä merkkiä';
$string['blacklistsaved'] = 'Muutokset tallennettu.';
$string['blacklistdescription'] = 'Valitse osaamismerkit joita et halua näytettävän profiilissasi. Voit valita minkä tahansa järjestelmän kautta myönnetyn merkin piilotettavaksi.';
$string['cachedef_obf_assertions'] = 'Open Badge Factory merkkien cache';
$string['cachedef_obf_assertions_moz'] = 'Mozilla Backpack merkkien cache';
$string['cachedef_obf_assertions_obp'] = 'Open Badge Passport merkkien cache';
$string['cancel'] = 'Peruuta';
$string['cannoteditcriterion'] = 'Tämän säännön muokkaus ei ole mahdollista, sillä valittu osaamismerkki on jo myönnetty tämän säännön perusteella.';
$string['categorysettings'] = 'Merkkikategoriat';
$string['certrequestfailed'] = 'Sertifikaatin haku OBF-palvelusta epäonnistui.';
$string['closepopup'] = 'Sulje';
$string['completedbycriterion'] = '<strong>{$a}</strong> mennessä';
$string['configurecriteria'] = 'Muokkaa';
$string['confirmcriteriondeletion'] = 'Haluatko varmasti poistaa tämän säännön?';
$string['confirmrevokation'] = 'Haluatko varmasti mitätöidä käyttäjien osaamismerkin?';
$string['connect'] = 'Yhdistä {$a}';
$string['connectionisworking'] = 'Yhteys Open Badge Factoryyn muodostettu. Sertifikaatti '
        . 'vanhentuu <strong>{$a}</strong>.';
$string['connectionstatus'] = 'Backpack-yhteyden tila';
$string['coursealreadyincriterion'] = 'Myöntämissääntöä ei voi muokata, sillä tällä kurssilla on jo myöntämissääntö valittuun merkkiin liittyen ja sääntö sisältää muitakin kursseja.';
$string['coursebadgelisttitle'] = 'Tähän kurssiin liittyvät osaamismerkit';
$string['coursecompletedby'] = 'Suoritettava viimeistään';
$string['courseeventhistory'] = 'Kurssin myöntämishistoria';
$string['courserequired'] = 'Valitse ainakin yksi kurssi';
$string['courseobfbadges'] = 'Osaamismerkit';
$string['courseuserbadges'] = 'Käyttäjien osaamismerkit';
$string['criteriaaddcourse'] = 'Lisää kurssi';
$string['criteriacompletedwhen'] = 'Tämä sääntö täyttyy, kun...';
$string['criteriacompletedwhenall'] = 'Kaikki seuraavat kurssit on suoritettu:';
$string['criteriacompletedwhenany'] = 'Mikä tahansa seuraavista kursseista on suoritettu:';
$string['criteriacompletionmethodall'] = 'Kaikki valitut kurssit on suoritettu';
$string['criteriacompletionmethodany'] = 'Mikä tahansa valituista kursseista on suoritettu';
$string['criteriacourses'] = 'Tähän sääntöön liittyvät kurssit';
$string['criteriapreview'] = 'Osaamismerkin myöntämiskriteeri';
$string['criteriatypeactivity'] = 'Suoritusmerkintä aktiviteeteista';
$string['criteriatypecourse'] = 'Suoritusmerkintä kursseista';
$string['criteriatypecourseset'] = 'Suoritusmerkintä kursseista';
$string['criteriatypetotaracertif'] = 'Suoritusmerkintä sertifikaatista';
$string['criteriatypetotaraprogram'] = 'Suoritusmerkintä ohjelmasta';
$string['criteriatypeunknown'] = 'Keskeneräinen kriteeri';
$string['criteriondeleted'] = 'Myöntämissääntö poistettu.';
$string['criterionsaved'] = 'Myöntämissääntö tallennettu';
$string['csrexportfailed'] = 'Sertifikaatin valtuutuksessa tapahtui virhe';
$string['dateformatdate'] = '%d.%m.%Y';
$string['deauthenticate'] = 'Katkaise yhteys';
$string['deauthenticationsuccess'] = 'Yhteys Open Badge Factoryyn katkaistu.';
$string['deletecriterion'] = 'Poista sääntö';
$string['disablemoodlebadges'] = 'Piilota Moodlen vanhat merkit.';
$string['disablemoodlebadges_help'] = 'Vanhat merkit piilotetaan käyttöliittymästä, ' .
        'mutta käyttäjien Backpackiin tallentamia merkkejä voidaan yhä näyttää ja ' .
        'Open Badge Factory -palveluun vietyjä merkkejä voidaan yhä myöntää.';
$string['disconnect'] = 'Katkaise {$a} -yhteys';
$string['editemailmessage'] = 'Muokkaa sähköpostiviestiä';
$string['emailbadgerevokedsubject'] = 'Osaamismerkki mitätöity';
$string['emailbadgerevokedbody'] = 'Aiemmin ansaitsemasi osaamismerkki ({$a->revokedbadgename}) on mitätöity. Osaamismerkin mitätöinyt käyttäjä: {$a->revokername}.';
$string['emailbody'] = 'Viestin alkuosa';
$string['emailfooter'] = 'Viestin loppuosa';
$string['emailmessage'] = 'Sähköpostiviesti';
$string['emailsubject'] = 'Viestin otsikko';
$string['emailtemplatesaved'] = 'Sähköpostiviesti tallennettu.';
$string['emailtemplatedescription'] = 'Voit asettaa tälle osaamismerkille sähköpostiviestin, joka '
        . 'lähetetään osaamismerkin saajalle myöntämishetkellä. Viestiä voi muokata vielä ennen merkin'
        . ' myöntämistä.';
$string['eventrevoked'] = 'Tapahtuma mitätöity ({$a} osoitteiden osalta.)';
$string['evidence'] = 'Todiste';
$string['expiresby'] = 'Vanhenee';
$string['expired'] = 'Vanhentunut';
$string['expiringcertificate'] = 'Open Badge Factoryn sertifikaatti vanhenee <b>{$a->days}</b> '
        . 'päivän kuluttua. Voit uusia sertifikaatin <a href="{$a->obfurl}">kirjautumalla Open Badge '
        . 'Factoryyn</a> organisaatiosi ylläpitotunnuksella ja menemällä Admin tools -> Edit '
        . 'Organisation Details -> More settings -kohtaan. Sen jälkeen luo valtuutusavain ja liitä '
        . 'se Moodleen OBF-asetussivulla.';
$string['expiringcertificatesubject'] = 'Open Badge Factoryn sertifikaatti on vanhentumassa.';
$string['exportsettings'] = 'Vientiasetukset';
$string['exportextrasettings'] = 'Vientiasetukset';
$string['gradecriterion'] = 'vähintään <strong>arvosanalla {$a}</strong>';
$string['history'] = 'Myöntämishistoria';
$string['historyrecipients'] = '{$a} vastaanottajaa';
$string['invalidtab'] = 'Sivua ei löytynyt';
$string['issue'] = 'Myönnä osaamismerkki';
$string['issuancedetails'] = 'Myöntämistiedot';
$string['issuebadge'] = 'Myönnä osaamismerkki';
$string['issueandexpiration'] = 'Myöntämis- ja vanhenemisaika';
$string['issuedon'] = 'Myönnetty';
$string['issuer'] = 'Myöntäjä';
$string['issuerdescription'] = 'Kuvaus';
$string['issuerdetails'] = 'Myöntäjän tiedot';
$string['issueremail'] = 'Sähköpostiosoite';
$string['issuername'] = 'Nimi';
$string['issuerurl'] = 'Osoite';
$string['issuethisbadge'] = 'Myönnä tämä merkki';
$string['makeexporteddrafts'] = 'Viedyt merkit ovat luonnoksia';
$string['messageprovider:revoked'] = 'Myönnetty merkki on mitätöity';
$string['minimumgrade'] = 'Arvosana vähintään';
$string['nobadgehistory'] = 'Tätä merkkiä ei ole vielä myönnetty.';
$string['nobackpackgroups'] = 'Luo vähintään yksi julkinen osaamismerkkiryhmä Backpackiisi.';
$string['nobadges'] = 'Ei osaamismerkkejä.';
$string['nobadgesincourse'] = 'Kurssiin ei ole  liitetty osaamismerkkejä.';
$string['nobadgestoexport'] = 'Järjestelmässä ei ole luotu aiempia osaamismerkkejä.';
$string['nocourseswithcompletionenabled'] = 'Jotta osaamismerkkien automaattinen myöntäminen '
        . 'olisi mahdollista, kurssista täytyy olla mahdollista saada suoritusmerkintä. Tarkista '
        . 'kurssien asetukset.';
$string['nocriteriayet'] = 'Ei vielä myöntämissääntöjä.';
$string['nohistory'] = 'Yhtään osaamismerkkiä ei ole vielä myönnetty.';
$string['noparticipants'] = 'Ei osallistujia.';
$string['nouserbadges'] = 'Ei ansaittuja osaamismerkkejä.';
$string['novalidcourses'] = 'Kaikilla valittavissa olevilla kursseilla on jo myöntämissääntö tähän'
        . ' merkkiin liittyen.';
$string['numberofbadgessingle'] = ' merkki';
$string['numberofbadgesmany'] = ' merkkiä';
$string['obf'] = 'Osaamismerkit';
$string['obf:configure'] = 'Voi muokata järjestelmän osaamismerkkiasetuksia';
$string['obf:configureuser'] = 'Voi muokata omia osaamismerkkiasetuksia';
$string['obf:earnbadge'] = 'Voi ansaita osaamismerkin';
$string['obf:editcriterion'] = 'Voi muokata osaamismerkin myöntämissääntöä';
$string['obf:issuebadge'] = 'Voi myöntää osaamismerkin';
$string['obf:revokeallevents'] = 'Voi mitätöidä merkin';
$string['obf:revokecourseevents'] = 'Voi mitätöidä kurssiin littyvän merkin';
$string['obf:seeparticipantbadges'] = 'Voi nähdä kurssin osallistujien merkit';
$string['obf:viewallbadges'] = 'Voin nähdä kaikki osaamismerkit';
$string['obf:viewallevents'] = 'Voin nähdä kaikki osaamismerkin myöntämistapahtumat';
$string['obf:viewcourseevents'] = 'Voin nähdä kurssin osaamismerkin myöntämistapahtumat';
$string['obf:viewbackpack'] = 'Voin nähdä Backpackit';
$string['obf:viewdetails'] = 'Voi nähdä osaamismerkin tiedot';
$string['obf:viewhistory'] = 'Voi nähdä osaamismerkkien myöntämishistorian';
$string['obf:viewownbackpack'] = 'Voi nähdä oman Backpackin';
$string['obfuserpreferences'] = 'Osaamismerkki-asetukset';
$string['obpbackpacksettings'] = 'Open Badge Passport -asetukset';
$string['pkidirnotwritable'] = 'WWW-palvelimen käyttäjän (yleensä "www-data") tulee pystyä kirjoittamaan sertifikaatin tallennushakemistoon <i>{$a}</i>.';
$string['pluginname'] = 'Open Badge Factory';
$string['previewbadge'] = 'Merkin esikatselu';
$string['previewcriteria'] = 'Esikatselu';
$string['previewemail'] = 'Esikatselu';
$string['profilebadgelist'] = 'Osaamismerkit';
$string['profilebadgelistmoz'] = 'Backpack osaamismerkit';
$string['profilebadgelistobp'] = 'Open Badge Passport osaamismerkit';
$string['pubkeyextractionfailed'] = 'Julkisen avaimen purkaminen sertifikaatista epäonnistui.';
$string['pubkeyrequestfailed'] = 'Julkisen avaimen haku Open Badge Factory API:sta epäonnistui.';
$string['readmeenablecompletion'] = 'Osaamismerkkien ansaintakriteerit';
$string['readmeenablecompletion_help'] = '<p>Jotta osaamismerkkien automaattiset ' .
        'ansaintakriteerit toimivat, ' .
        'on kurssien suoritusten seurannan oltava käytössä. </p>' .
        '<p>Helpoin tapa ottaa suoritusten seuranta käyttöön, on seuraava:</p><ol>' .
        '<li>Paikanna "Asetukset" -lohko.</li>' .
        '<li>Kirjoita lohkon hakupalkkiin "enablecompletion".</li>' .
        '<li>Ota opiskelijoiden suoritusten seuranta käyttöön: Kyllä.</li>' .
        '<li>Valinnainen, mutta suositeltava: Ota suoritusten seuranta käyttöön kurssioletuksissa.</li>' .
        '</ol>' .
        '<strong>Kurssiasetusket</strong>' .
        '<p>Jos suoritusten seuranta ei ole käytössä kurssioletuksissa, ' .
        'tai suoritusten seuranta on pois käytöstä yksittäisellä kurssilla, ' .
        'voidaan seuranta ottaa käyttöön kurssin ' .
        '<i>Kurssin ylläpitö-&gt;Muokkaa asetuksia</i> -sivulla.</p>';
$string['recipients'] = 'Vastaanottajat';
$string['recipientcandidates'] = 'Hakuun täsmäävät käyttäjät';
$string['requesttoken'] = 'Valtuutusavain';
$string['requesttoken_help'] = '<p>Liitä kenttään Open Badge Factory API:in yhdistämiseen käytettävä '
        . 'valtuutusavain.</p><p>' .
        'Luodaksesi tarvittavan valtuutusavaimen, kirjaudu <a href="https://openbadgefactory.com">Open Badge Factoryyn</a>, avaa ' .
        '\'<i>Admin-työkalut</i>\' -sivulla sijaitseva \'<i>Valtuutusavain</i>\' -linkki, ' .
        'ja paina \'<i>Luo valtuutusavain</i>\' -linkkiä. ' .
        'Kopioi generoitu valtuutusavain Moodleen.</p>';
$string['resetfilter'] = 'Näytä kaikki';
$string['reviewcriterionaftersave'] = 'Tarkista sääntö tallennettaessa';
$string['reviewcriterionaftersave_help'] = 'Jos automaattinen tarkistus on valittu, tämä sääntö '
        . 'tarkistetaan tallennuksen yhteydessä ja valittu merkki myönnetään kaikille käyttäjille, '
        . 'jotka ovat säännön kurssit suorittaneet.';
$string['revoke'] = 'Peruuta';
$string['revokeuserbadges'] = 'Peruuta käyttäjille myönnettyjä merkkejä';
$string['saveconfiguration'] = 'Jatka';
$string['savecriteria'] = 'Tallenna';
$string['selectactivity'] = 'Valitse aktiviteetti';
$string['selectatleastonerecipient'] = 'Valitse ainakin yksi vastaanottaja';
$string['selectbadge'] = 'Valitse osaamismerkki';
$string['selectbadgestoexport'] = 'Valitse Open Badge Factoryyn vietävät osaamismerkit';
$string['selectcourses'] = 'Valitse kurssit';
$string['selectcourses_help'] = 'Valitse kurssit, jotka käyttäjän on suoritettava tämän osaamismerkin '
        . 'ansaitakseen.';
$string['selectcriteriatype'] = 'Valitse...';
$string['selectcriteriatype_help'] = 'Valitse tapa, jola osaamismerkki ansaitaan.';
$string['selectcompletionmethod'] = 'Valitse suoritustapa';
$string['selectcompletionmethod_help'] = 'Valitse tapa, jolla osaamismerkki ansaitaan.';
$string['selectprogram'] = 'Valitse ohjelma';
$string['selectrecipients'] = 'Vastaanottajat';
$string['settings'] = 'Asetukset';
$string['showassertion'] = 'Tiedot';
$string['showbadgecriteria'] = 'Avaa kriteerisivu';
$string['showbadges'] = 'Näytä osaamismerkit';
$string['showbadgesonmyprofile'] = 'Näytä osaamismerkit profiilisivulla';
$string['showcategories'] = 'Suodata merkkejä:';
$string['showconnectionconfig'] = 'Haluan päivittää valtuutusavaimen siitä huolimatta.';
$string['showmorerecipients'] = 'lisää';
$string['toearnthisbadge'] = 'Osaamismerkin ansaitseminen edellyttää tämän kurssin suorittamista';
$string['tokendecryptionfailed'] = 'Valtuutusavain on virheellinen. Tarkista, että olet kopioinut ja liittänyt koko valtuutusavaimen.';
$string['totaraprogram'] = 'Ohjelma';
$string['totaraprogramselectexpires'] = 'Valitse miten myönnetty merkki vanhenee';
$string['totaraprogramexpiresbybadge'] = 'Vanhenee osaamismerkkiasetusten mukaisesti';
$string['totaraprogramexpiresbycertificate'] = 'Vanhenee sertifikaattiasetusten mukaisesti';
$string['unknowncriterion'] = 'Keskeneräinen kriteeri';
$string['userpreferences'] = 'Käyttäjä-asetukset';
$string['userpreferencessaved'] = 'Käyttäjä-asetukset tallennettu.';
$string['verification_failed'] = 'Sähköpostiosoitteen tarkistus epäonnistui. Virheviesti: {$a}';
$string['warningcannoteditafterreview'] = 'Sääntöä ei voi muokata, jos merkki on myönnetty automaattisen myöntämissäännön perusteella. Tarkista siis sääntö huolellisesti ennen tallennusta.';
