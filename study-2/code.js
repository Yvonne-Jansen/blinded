function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}



function validateRadioButtons(field) {
        var radios = document.getElementsByName(field);
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    //if (!formValid) alert("Your answer is incomplete.");
    return formValid;

}

function finishedReplication() {
    //var x = document.forms["answers"]["fname"].value;
    if (!validateRadioButtons("how_effective_is_the_new_medication")) {
        alert("You didn't answer the question.");
        return false;
    } else    {

    document.getElementById("replication").style.display = 'none';
    document.getElementById("comprehension").style.display = 'inline';
    document.getElementById("comprehension_input").focus();
    }
    
}

function finishedComprehension() {
    var x = document.forms["answers"]["comprehension"].value;
    if (x === '') {
        alert("You didn't answer the question.");
        return false;
    } else if (! (x >= 0 && x <= 20)) {
        alert("Your answer is not valid.");
        return false;
    } else    {
        document.getElementById("comprehension").style.display = 'none';
        var radios = document.getElementsByName("does_the_medication_really_reduce_illness");
        document.getElementById("previous-studies").style.display = 'inline';
    }
}

function finishedPreviousStudies() {

    if (!validateRadioButtons("participated_in_previous_study")) {
        alert("Your answer for the question about previous studies is missing.");
        return false;
    } else if (!document.forms["answers"]["age"].value){
        alert("Please enter your age.");
        return false;
    } else if (!validateRadioButtons("gender")) {
        alert("Please select one of the gender options.");
        return false;
    } else if (!validateRadioButtons("education")) {
        alert("Please select your highest level of education.");
        return false;
    } else  {

        document.getElementById("previous-studies").style.display = 'none';
        document.getElementById("test_and_comments").style.display = 'inline';
}
}

// function confirmExit()
// {
//  //alert("If you reload the page you will be excluded from the study and won't receive payment.");
//  //console.log("Reloading page. Excluding and redirecting user...");
//  //window.location.replace='./reload.html';
//  return true;
// }

function checkForReload() {
    console.log("Checking if cookie exists...");
    var myCookie = getCookie("studypage");

    if (myCookie === null) {
        console.log("No cookie. Creating one...");
        setCookie("studypage", "loaded", 10);
    }
    else {
        console.log("Cookie exists. Excluding and redirecting user...");
        setCookie("reload", "excluded", 30);
        document.location.replace("./reload.php");
    }

}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 


// window.onload = checkForReload;
// window.onbeforeunload = confirmExit;