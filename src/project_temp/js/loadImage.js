
function loadIMG(url, id){
    return new Promise( function (resolve, reject) {
        console.log(id);
        var parent = document.getElementById(id);
        var element = document.createElement('img');
        element.onload  = function() { resolve(url); };
        element.onerror = function() { reject(url); };
        element['src']  = url;
        parent.replaceWith(element);
        }
    );
}


function abc() { 
    console.log(123);
}