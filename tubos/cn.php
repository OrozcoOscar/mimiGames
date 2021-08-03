<?php 
error_reporting(0);
$c =mysqli_connect("localhost","id13984700_black_panter239","^ku%K pan de queso f+9_$!7rhS","id13984700_modelos");
if($c);
else echo "100";

function set_sql($sql,$s=null){

	$r=mysqli_query($GLOBALS["c"],$sql);
	if($s==null)return mysqli_fetch_assoc($r);
	if($s==1)return $r;
}

function encode($value=''){
	return base64_encode(bin2hex($value));
}
function decode($value=''){
return hex2bin(base64_decode($value));
}

function cod(){
$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
return substr(str_shuffle($permitted_chars), 0, 16);
 
}
function filtro($value)
{
	if(preg_match('/^[a-zA-ZéáíóúñÑÁÉÍÓÚ0-9@. ]+$/', $value))return true;
	return false;

}