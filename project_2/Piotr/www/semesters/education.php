<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>PHP intro</title>
  <!-- <link rel="stylesheet" href="css/intro.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/main_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/grid.css">
  <link rel="stylesheet" type="text/css" href="../../css/timeline.css">
  <link rel="stylesheet" type="text/css" href="../../css/semesters_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/education.css">
</head>

<body>
  <?php
    require_once(__DIR__."/../../php/EducationGenerator.php");
    $generator   = new EducationGenerator;
    $navbar      = $generator->generateNavbar("", "", "", "");
    $description = $generator->generateDescription("W przeciągu 3 lat na Politechnice Wrocławskiej brałem udział w wielu przydatnych i ciekawych kursach z zakresu zarówno matematyki jak i informatyki. Poniższa oś czasu pokazuje każdy z semestrów, które odbyłem wraz z kursami które obejmowały.");
    $panorama = $generator->generatePanorama("Edukacja", "../../img/pwr.png");
    $timelineElements = array(
      $generator->generateTimelineElement("left","Semestr letni 2017/2018",""),
      $generator->generateTimelineElement("right","Semestr zimowy 2017/2018",""),
      $generator->generateTimelineElement("left","Semestr letni 2016/2017",""),
      $generator->generateTimelineElement("right","Semestr zimowy 2016/2017",""),
      $generator->generateTimelineElement("left","Semestr letni 2015/2018",""),
      $generator->generateTimelineElement("right","Semestr zimowy 2015/2016",""),
    );
    $timeline = $generator->generateTimeline($timelineElements);
    echo $generator->renderMain(array($navbar, $panorama, $description, $timeline));
  ?>
</body>
</html>
