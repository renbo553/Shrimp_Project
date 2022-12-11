<?php 
/* utility.php
 *      A general utility library.
 */

/*** function definition ***/

/* utility_window_msg:
 * 		show window message
 * param:
 * 		msg: output message
 * 		url: destination url (may be null)
 */

function utility_window_msg($msg, $url) : void{
	echo "<script type='text/javascript'>";
	echo "window.alert('{$msg}');";
    // set url if need
	if(!is_null($url)){
		// url is not empty
		echo "window.location.href='{$url}'";
	}
	echo "</script>";
}


/* utility_window_msg_back:
 * 		show window message and back to previous page
 * param:
 * 		msg: output message
 */

function utility_window_msg_back($msg) : void{
	echo "<script type='text/javascript'>";
	echo "window.alert('{$msg}');";
	echo "history.back()";
	echo "</script>";
}


/* utility_input_textbox:
 * 		create a input textbox
 * param:
 * 		name: the name and id of input item
 *      label: the label text of input item
 */

function utility_input_textbox($name = "", $label = "") : void{
    /* check arguments */
    if($name == "" && $label == ""){
        echo "utility_input_textbox error: this input item needs a name and label";
        return;
    }

    /* create a input text box */
    echo "<label for='{$name}'>{$label}</label>";
    echo "<input type='text' class='form-control' name='{$name}' id='{$name}'>";
}


/* utility_input_date:
 * 		create a input date
 * param:
 * 		name: the name and id of input item
 *      label: the label text of input item
 * note:
 *      submission without selecting a date will insert a empty string into $_POST or $_GET
 */

function utility_input_date($name = "", $label = "") : void{
    /* check arguments */
    if($name == "" && $label == ""){
        echo "utility_input_date error: this input item needs a name and label";
        return;
    }

    /* create a input date item */
    echo "<label for='{$name}'>{$label}</label>";
    echo "<input type='date' class='form-control' name='{$name}' id='{$name}'>";
}


/* utility_input_selectbox:
 * 		create a input select box
 * param:
 * 		name: the name and id of input item
 *      label: the label text of input item
 *      option_arr: option array,
 *                  array key is option label, array value is option value
 * note:
 *      this function automatically add default option "none"
 *      "none" option will not insert anything into $_POST and $_GET
 *      Please use isset() to check whether a meaningful option was selected.
 */

function utility_input_selectbox($name = "", $label = "", $option_arr) : void{
    /* check arguments */
    if($name == "" && $label == ""){
        echo "utility_input_select error: this input item needs a name and label";
        return;
    }
    if(count($option_arr) == 0){
        echo "utility_input_select error: this input item needs a option array";
        return;
    }

    /* create html select box */
    echo "<label for='{$name}'>{$label}</label>";
    echo "<select class='form-control' name='{$name}' id='{$name}'>";
    // create none option
    echo "<option value='none' selected disabled hidden></option>";
    // create options
    foreach($option_arr as $key => $value)
        echo "<option value='{$value}'>{$key}</option>";
    echo "</select>";
}


/* utility_button:
 * 		create a button
 * param:
 * 		type: a html button attribute
 *            only three option: "button", "reset", "submit"
 *      label: the text of button
 */

function utility_button($type, $label) : void{
    echo "<button type='{$type}' class='btn btn-primary'>{$label}</button>";
}


/* utility_button_onclick:
 * 		create a button with an onclick event
 * param:
 * 		url: the destination url (need file extension)
 *      label: the text of button
 */

function utility_button_onclick($url, $label) : void{
    echo "<button type='button' onclick=\"location.href='{$url}'\" class='btn btn-primary'>{$label}</button>";
}


/* utility_session_insert:
 *      insert a variable into session
 * param:
 *      index: the index of variable in the session
 *      var: the variable to be inserted
 */

function utility_session_insert($index, $var) : void{
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION[$index]))
        unset($_SESSION[$index]);
    $_SESSION[$index] = $var;
}


/* utility_session_check:
 *      check if a variable is in the session
 * param:
 *      index: the index of variable in the session
 * return:
 *      true, if this index corresponds to a variable
 *      false, otherwise
 */

function utility_session_check($index) : bool{
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION[$index]))
        return true;
    return false;    
}

?>