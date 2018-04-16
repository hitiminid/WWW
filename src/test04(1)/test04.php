<?php
require_once(__DIR__."/PHP/myPage04.php");
require_once(__DIR__."/PHP/procpom.php");

$OPIS = "Główna strona witryny Jacka Cichonia poświęconej Informatyce Teoretycznej oraz Matematyce.";
$STYL =<<<EOT
body {
  background: gray;
}
EOT;

// generujemy licznik do mierzenia czasu wykonania
$licznik = new ExecutionTime();
$licznik->start(); 

// generuejmy stronę i ustawiamy jej parametry
$P =  new myPage("JCI: maths");
$P->SetDescription($OPIS);
$P->AddInnerStyle($STYL);

// Wyświetlamy początek strony
echo $P->Begin();
echo $P->PageHeader();
?>

<h1>To jest strona główna</h1>
<p>
  To jest pierwszy paragraf na stronie.
</p>

<div class="row">
  <div class="col-6-12">
    <section class="panel red"   >
      <header>To jest pierwszy nagłowek</header>
      <p>To jest treść</p>
    </section>
    
    <section class="panel yellow">
      <header>To jest drugi nagłowek   </header>
      <p>To jest treść</p>
    </section>
  </div>
  
  <div class="col-6-12">
    <section class="panel green" >
      <header>To jest trzeci nagłowek  </header>
      <p>To jest treść</p>
    </section>
    
    <section class="panel blue"  >
      <header>To jest czwarty nagłowek </header>
      <p>To jest treść</p>
    </section>
  </div>
</div>

<p>
  Licznik odwiedzin : <?php echo GetVisitCounter("countlog.txt"); ?> 
</p>

<p>
  Czas wykonania:  <?php $licznik->stop(); echo $licznik->diff(); ?>  ms
</p>

<?php
// generujemy zamknięcie strony 
echo $P->End();
// zapisujemy log z wizyty
LogClientVisit(__FILE__);
?>