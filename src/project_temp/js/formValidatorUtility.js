var myForm  = document.querySelector('#createComment');
var myInput = document.querySelector('#comment-text-area');

// console.log(213)

myForm.addEventListener('submit', function(pEvent) {
    if(myInput.value === '') {
        pEvent.preventDefault(); //Prevents the form to be sent
        alert('Ho! Stop!');
        //Do whatever you want
    }
});