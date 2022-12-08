/**
 * This file simply proves that we can import our own javascript from views.
 * This file is included from app/views/partials/footer
 * 
 */
console.log("My Script");

function base64img(obj){
    var reader = new FileReader();
    reader.readAsDataURL(obj.files[0]);
    reader.onload = function() {
        //document.getElementById('base64').innerText = reader.result;
        //document.getElementById('b64img').scr = reader.result;
    document.getElementById('img').value = reader.result;
    }
}
