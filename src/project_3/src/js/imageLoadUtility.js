// function loadIMG(url, id){
//     return new Promise( function (resolve, reject) {
//         // console.log(id);
//         var parent = document.getElementById(id);
//         var element = document.createElement('img');
//         element.onload  = function() { resolve(url); };
//         element.onerror = function() { reject(url); };
//         element['src']  = url;
//         parent.replaceWith(element);
//         }
//     );
// }


function getImage(url){
    return new Promise(function(resolve, reject){
        var img = new Image()
        img.onload = function(){
            resolve(url)
        }
        img.onerror = function(){
            reject(url)
        }
        img.src = url
    })
}

changeImage = (id, url) => {
    document.getElementById(id).src = url;
}

logError = (url) => {
    console.log('Error loading ' + url);
}

getHighResolutionImage = (id, url) => {
    getImage(url).then (
        (url) =>  { changeImage(id, url); },
        (url) =>  { logError(url); }
    );
}


sequentionalImageLoad = (page) => {

    // loadIMG(page.panoramaLink, page.panoramaID).
    // then(loadIMG(page.firstImageLink, page.firstImageID)).
    // // then(loadIMG(page.secondImageLink, page.secondImageID)).
    // getHighResolutionImage(page.panoramaID, page.panoramaLink).
    // then(function() {
    //     console.log('High resolution images successfully loaded');
    // })
    // .catch(function() {
    //     console.log('Error!');
    // });
} 

// getImage('../../img/cycling_bg.png').then (
//     function(successurl){
//         document.getElementById('panorama-image').src = successurl;
//     },
//     function(errorurl){
//         console.log('Error loading ' + errorurl)
//     }
// ).then()