<?php



function sanitiz($input) {

    return trim(htmlspecialchars(htmlentities($input))) ;
}


function emp($input) { 
    if(empty($input)) { 
        return true ;
    }

    return false ;
}

function MinVal($input,$number) {
    if(strlen($input) < $number) { 
        return true ;
    }

    return false ;
}

function MaxVal($input,$number) {
    if(strlen($input) > $number) { 
        return true ;
    }

    return false ;
}
