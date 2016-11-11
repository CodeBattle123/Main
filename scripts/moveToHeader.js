/**
 * Created by AsenJ.Mihaylov on 11/11/2016.
 */
let screen = $(window).width();
let list = document.getElementById('list');
let active = false;

function moveTo() {
    "use strict";

    console.log(screen);

    if (screen.width <= 600 && active != true) {
        active = true;
        let entry = document.createElement('li');
        list.appendChild(entry);
    }
    else {
        active = false;
    }
}