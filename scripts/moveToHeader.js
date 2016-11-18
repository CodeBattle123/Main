/**
 * Created by AsenJ.Mihaylov on 11/11/2016.
 */


let isActivated = false;

function moveToHeader() {

    if ($('body').width() <= 600 ) {
        if (isActivated == false) {
            isActivated = true;

            var listChildren = $('#sidebarList').children();

            console.log(listChildren[0]);
        }
    }
    else{
        isActivated = false;
    }
}
