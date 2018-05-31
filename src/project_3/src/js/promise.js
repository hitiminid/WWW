function loadBigImage(imageURL) {
    return new Promise(function(resolve,reject){
        var img = new Image();
        img.onload = function() {
            resolve(url);
        }
        img.onerror = function() { 
            reject(url);
        }
        img.src = url;
    });
}

loadBigImage('img/most.JPG').then (
    (url) =>  { document.getElementById('obrazek').src = url; },
    (url) =>  { console.log('Error loading ' + url); }
);
 
  
function loadIMG(url, id){
return new Promise( function (resolve, reject) {
    var parent = document.getElementById(id);
    var element = document.createElement('img');
    element.onload  = function() { resolve(url); };
    element.onerror = function() { reject(url); };
    element['src']  = url;
    parent.appendChild(element);
    }
);
}
  
  
//   Promise.all([
//       loadCSS('../W10/css/simple.css'),
//       loadIMG('img/im0.JPG','galery1'),
//       loadIMG('img/im1.JPG','galery1'),
//       loadIMG('img/im2.JPG','galery1'),
//     ]).then(function() {
//       console.log('Wszystko z pierwszej czesci się załadowało!');
//     }).catch(function() {
//       console.log('O kurcze, błąd ładowania!');
//     });
  
//   console.log("PART II");
  
  
  loadIMG('img/im3.JPG','galery2').
  then(loadIMG('img/im4.JPG','galery2')).
  then(loadIMG('img/im5.JPG','galery2')).
  then(function() {
      console.log('Wszystko z drugiej czesci się załadowało!');
  })
  .catch(function() {
      console.log('O kurcze, błąd ładowania!');
  });
  
  const jokes = new Promise((resolve, reject) => {
    const request = new XMLHttpRequest();
  
    request.open('GET', 'https://api.icndb.com/jokes/random');
    request.onload = () => {
      if (request.status === 200) {
        resolve(request.response); // mamy dane, wiec dotrzymujemy (resolve) obietnicy
      } else {
        reject(Error(request.statusText)); // status jest różny od 200 (OK), wiec odrzucamy (reject)
      }
    };
    request.onerror = () => {
      reject(Error('Blad pobierania danych.')); // error occurred, reject the  Promise
    };
    request.send(); // wyslanie żądania
  });
  
  console.log('Asynchroniczne zadanie zasobu.');
  
  jokes.then((data) => {
    console.log('Dane zostale pobrane! Obietnica zostala spelniona.');
    var el = document.getElementById("joke");
    el.innerHTML = JSON.parse(data).value.joke;
  }, (error) => {
    console.log('Obietnica zostala odrzucona.');
    console.log(error.message);
  });
  