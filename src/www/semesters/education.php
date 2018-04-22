<?php
  require_once(__DIR__."/../../php/EducationGenerator.php");
  require_once(__DIR__."/../../php/PageGenerator.php");
  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/grid.css",
                     "../../css/main_style.css",
                     "../../css/timeline.css",
                     "../../css/panorama.css",
                     // "../../css/semesters_style.css",
                     "../../css/education.css");
  $head = $pageGenerator->generateHead("Piotr Kawa - Moja przygoda z edukacją", $cssStyles, null); //TODO: change title

  $contentGenerator   = new EducationGenerator;
  $description = $contentGenerator->generateDescription("W przeciągu 3 lat na Politechnice Wrocławskiej brałem udział w wielu przydatnych i ciekawych kursach z zakresu zarówno matematyki jak i informatyki. Poniższa oś czasu pokazuje każdy z semestrów, które odbyłem wraz z kursami które obejmowały.");
  $panorama = $contentGenerator->generatePanorama("Edukacja", "../../img/pwr.png");
  $timelineElements = array(
    $contentGenerator->generateTimelineElement("left",  "Semestr letni 2017/2018",  "semester_6.php"),
    $contentGenerator->generateTimelineElement("right", "Semestr zimowy 2017/2018", "semester_5.php"),
    $contentGenerator->generateTimelineElement("left",  "Semestr letni 2016/2017",  "semester_4.php"),
    $contentGenerator->generateTimelineElement("right", "Semestr zimowy 2016/2017", "semester_3.php"),
    $contentGenerator->generateTimelineElement("left",  "Semestr letni 2015/2018",  "semester_2.php"),
    $contentGenerator->generateTimelineElement("right", "Semestr zimowy 2015/2016", "semester_1.php"),
  );
  $timeline = $contentGenerator->generateTimeline($timelineElements);

  $navbar = $contentGenerator->generateNavbar("../index.php", "../../img/logo.png", "", "../hobbies/hobbies.php");
  $main   = $contentGenerator->generateMain(array($panorama, $description, $timeline));

  $body = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator->generatePageStructure(array($head, $body));
?>
