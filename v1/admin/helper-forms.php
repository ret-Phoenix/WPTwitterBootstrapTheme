<?php

function disabled_state($disabled)
{
    return (($disabled == 1) ? ' disabled ' : '');
}

function echo_class($param)
{
    return ($param == "") ? "" : ' class = "' . $param . '"';
}

function form_combo($prmName, $prmValue, $prmList, $prmClass = "", $disabled = 0, $field_title = "title")
{
    $arr_list = (array)$prmList;
    $str = '<select name="' . $prmName . '" id="' . $prmName . '"' . echo_class($prmClass) . disabled_state($disabled) . '>';
    foreach ($arr_list as $row) {
        $row = (array)$row;
        if ($row['id'] == $prmValue) {
            $str .= '<option selected value="' . $row['id'] . '">' . $row[$field_title] . '</option>';
        } else {
            $str .= '<option value="' . $row['id'] . '">' . $row[$field_title] . '</option>';
        }
    }
    $str .= '</select>';
    return $str;
}

function form_combo_simple($prmName, $prmValue, $prmList, $prmClass = "", $disabled = 0)
{
    $str = '<select name="' . $prmName . '" id="' . $prmName . '"' . echo_class($prmClass) . disabled_state($disabled) . '>';
    foreach ($prmList as $row) {
        if ($row == $prmValue) {
            $str .= '<option selected value="' . $row. '">' . $row. '</option>';
        } else {
            $str .= '<option value="' . $row . '">' . $row . '</option>';
        }
    }
    $str .= '</select>';
    return $str;
}

function form_checkbox($prm_title, $prmName, $prmValue, $prmClass = "", $disabled = 0)
{
    return '<label><input type="checkbox" name="' . $prmName . '" id="'
        . $prmName . '" ' . (($prmValue == 'on') ? " checked=true " : "")
        . echo_class($prmClass) . disabled_state($disabled) . '>' . $prm_title . '</label>';
}


function form_edit($prmName, $prmSize = 50, $prmValue = "", $prmClass = "", $disabled = 0)
{
    return '<input name="' . $prmName . '" id="' . $prmName . '" type="text" size="' . $prmSize . '"'
        . ' value="' . $prmValue . '" ' . echo_class($prmClass) . disabled_state($disabled) . '>';
}


?>