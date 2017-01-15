/**
 * Created by Conrad on 25/6/2016.
 */
//Function for showing or hiding the items contained in a directory
$(document).ready(function () {
    $(".btn-directory").click(function () {
        var id = event.target.id;
        var identifier = "dir-";
        var found = id.indexOf(identifier);
        if(found >= 0){
            var startIdx = found + identifier.length;
            var dir_id = id.substr(startIdx, id.length - 1);
            var child_class = ".childof-" + dir_id;
            $(child_class).toggle();
        }
        else{
            document.write("id not found " + id);
        }
    });
});
