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
    $navbar      = $generator->generateNavbar("../index.php", "../../img/logo.png", "", "../hobbies/hobbies.php");
    $description = $generator->generateDescription("W przeciągu 3 lat na Politechnice Wrocławskiej brałem udział w wielu przydatnych i ciekawych kursach z zakresu zarówno matematyki jak i informatyki. Poniższa oś czasu pokazuje każdy z semestrów, które odbyłem wraz z kursami które obejmowały.");
    $panorama = $generator->generatePanorama("Edukacja", "../../img/pwr.png");
    $timelineElements = array(
      $generator->generateTimelineElement("left","Semestr letni 2017/2018","semester_6.php"),
      $generator->generateTimelineElement("right","Semestr zimowy 2017/2018","semester_5.php"),
      $generator->generateTimelineElement("left","Semestr letni 2016/2017","semester_4.php"),
      $generator->generateTimelineElement("right","Semestr zimowy 2016/2017","semester_3.php"),
      $generator->generateTimelineElement("left","Semestr letni 2015/2018","semester_2.php"),
      $generator->generateTimelineElement("right","Semestr zimowy 2015/2016","semester_1.php"),
    );
    $timeline = $generator->generateTimeline($timelineElements);
    echo $navbar;
    echo $generator->renderMain(array($panorama, $description, $timeline));
  ?>
</body>
</html>
