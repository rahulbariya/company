<?php
/**************************************************************************************************************/
function emailValidate($field){     //Email Validate Function
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){     /* Email Validation */
        $errfield = "Enter Email";
        return $errfield;
    }
    elseif (!filter_var($field, FILTER_VALIDATE_EMAIL)){
        $errfield = "Enter Valid Email";
        return $errfield;
    }
}
function passValidate($field){    //Password Validate Function
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){
        $errfield = "Enter Password";
        return $errfield;
    }
    elseif (strlen($field) < 5){
        $errfield = "Enter Valid Password";
        return $errfield;
    }
}
function cpassValidate($pass,$cpass){
    if($pass !== $cpass){
        $errfield = "Confirm Password does not match with Password.";
        return $errfield;
    }
}
function FnameValidation($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){
        $errfield = "Enter Firstname";
        return $errfield;
    }
    elseif (strlen($field) < 2 || !(ctype_alpha($field))){
        $errfield = "Enter Valid Firstname";
        return $errfield;
    }
}
function LnameValidation($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){
        $errfield = "Enter Lastname";
        return $errfield;
    }
    elseif (strlen($field) < 2 || !(ctype_alpha($field))){
        $errfield = "Enter Valid Lastname";
        return $errfield;
    }
}
function mobileValidation($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){
        $errfield = "Enter Mobile";
        return $errfield;
    }
    elseif (strlen($field) !== 10 || !(is_numeric($field)) ){
        $errfield = "Enter Valid Mobile";
        return $errfield;
    }
}
function alphaValidation($field){

    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    //print_r($field); exit();
    if(empty($field)){
        $errfield = "Please Enter";
        return $errfield;
    }
    elseif (strlen($field) < 2 ){
        $errfield = "Please Enter Valid";
        return $errfield;
    }
}


/**************************************************************************************************************/

function moneyFormatIndia($num) {     /************* Money Format India  ***************/
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
?>