/**
 * Created by Conrad on 24/6/2016.
 */
function downloadfile(source, filepath){
    $.ajax(source, {
        type: 'POST',
        path: filepath
    })
}

//
// function hideDirectoryChildren(dir){
//     document.getElementById('#'.id).style.display = 'block';
//     // hide the lorem ipsum text
//     document.getElementById(text).style.display = 'none';
//     // hide the link
//     btn.style.display = 'none';
// }
