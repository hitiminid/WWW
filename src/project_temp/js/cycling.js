loadIMG('../../img/map_1.png','panorama-image').
then(loadIMG('../../img/map_1.png',"map_1")).
then(loadIMG('../../img/map_2.png',"map_2")).
then(function() {
    console.log('Wszystko z drugiej czesci się załadowało!');
})
.catch(function() {
    console.log('O kurcze, błąd ładowania!');
});


