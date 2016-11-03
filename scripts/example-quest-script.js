/**
 * Created by Antonia on 3.11.2016 г..
 */
$('#btn-submit-quest-example').click( function () {
    "use strict";
    let result = false;

    if ($('#ex-quest-input-1').text() != '1'){
        result = false;
    }else if ($('#ex-quest-input-2').text() != '11'){
        result = false;
    }else if ($('#ex-quest-input-3').text() != "+=1"){
        result = false;
    }

    if(result == false){
        $('#example-quest-result').textContent = "Corrent."
    }
    else {
        $('#example-quest-result').textContent = "Something is wrong.Try Again"
    }

});




