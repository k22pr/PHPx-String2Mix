<?php
	// Make By K22pr - 2017-02-02
	// https://github.com/k22pr/PHPx-String2Mix
	
	// 2개 이상의 문자열을 서로 섞어 줍니다.
	//1글자의 배열들은 섞이지 않습니다.
	require_once("./source.php");
	
	//example list
	echo string2mix(["hello"])."<br>";
	echo string2mix(["hello","  "])."<br>";
	echo string2mix(["hello","world"])."<br>";
	echo string2mix([2,4,8,16,32,64])."<br>";
	echo string2mix(["HTML5","PHP7","CSS3","SCSS","jQuery","ANIA"])."<br>";
	echo string2mix(["비밀번호","안알랴줌"])."<br>";
	
	$pass = "password";
	
	echo "make_hash() :  ".make_hash($pass)."<br>";
	echo "simple_hash() :  ".simple_hash($pass)."<br>";
	
?>