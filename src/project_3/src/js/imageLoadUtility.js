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