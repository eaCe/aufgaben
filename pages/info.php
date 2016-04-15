<?php

$func = rex_request('func', 'string');

if ($func == 'import_beispieldaten') {

  $qry = "

  -- Aufgaben

  INSERT IGNORE `rex_aufgaben_aufgaben` VALUES
      (1, 'Fav Icon erstellen', 'Wird immer benötigt',1,1,0,1),
      (2, 'Touch Icon erstellen', '',1,1,0,1),
      (3, 'Meta Infos erstellen', 'Sind Ortsbezogene meta Infos wichtig?',1,1,0,1),
      (4, 'Print.css entwickeln', 'Wird immer vergessen',1,1,0,1),
      (5, 'robots.txt prüfen', ':-)',7,1,0,1);

  -- Kategorien

  INSERT IGNORE `rex_aufgaben_kategorien` VALUES
      (1,'Grundlagen','#9EAEC2'),
      (2,'Backend','#588D76'),
      (3,'Design','#8D588A'),
      (4,'Funktion','#9EAEC2'),
      (5,'Fehler','#72A3A7'),
      (6,'Wunsch','#FFD83D'),
      (7,'SEO','#437047');
  ";

  $sql = rex_sql::factory();
  // $sql->setDebug();
  $sql->setQuery($qry);

  echo '<div class="alert alert-success">Der Beispieldaten wurden eingefügt.</div>';
  $func = '';
}


$content = '<div id="aufgaben">
<h4>Eine ToDo Verwaltung für das Redaxo Backend.</h4>

<ul>
<li>im Beschreibungsfeld kann mit der Eingabe von ***** (5 Sterne) ein Trenner hinzugefügt werden.</li>
<li>durch Klick auf "blaue" Aufgaben wird die Beschreibung angezeigt.</li>
<li>durch Klick auf die Überschriften wird die Tabelle entsprechend sortiert.</li>
<li>durch Klick auf das Auge (rechts im Tabellenkopf) können die erledigten Aufgaben dauerhaft ein- bzw. ausgeblendet werden.</li>
<li>Kategorien werden durch den Admin gepflegt.</li>
</ul>
<hr/>

<p><a href="index.php?page=aufgaben/info&amp;func=import_beispieldaten"><i class="rex-icon rex-icon-module"></i> Beispieldaten importieren</a>
</p>
</div>
';
$fragment = new rex_fragment();
$fragment->setVar('title', 'Aufgaben');
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');


