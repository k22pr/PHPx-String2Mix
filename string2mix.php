<?php
	// Make By K22pr - 2017-02-02
	// https://github.com/k22pr/PHPx-String2Mix
	
	// 2개 이상의 문자열을 서로 섞어 줍니다.
	//1글자의 배열들은 섞이지 않습니다.
	function strmix(array $str) : string {return string2mix($str);}
	function str2mix(array $str) : string {return string2mix($str);}
	function string2mix(array $str) : string{
		$value = (string) NULL;
		if(count($str) == 1) return "string2mix say : One array can not mix!";
		else{
			//문자열을 배열에 저장, 해당 배열 사이즈 기록
			foreach($str as $no => $list){
				$list = preg_replace("/\s/",NULL,$list);
				if($list == NULL) return "string2mix say : 0 length array can not mix!";
				else{
					$length[] = mb_strlen($list,"UTF-8");
					$count[] = 0;
					for($i=0; $i<$length[$no]; $i++) $arr[$no][] = mb_substr($list, $i, 1, "UTF-8" ); 
				}
			}
			//섞
			for($i=0;$i<=max($length);$i++){
				for($no = 0;$no < count($str);$no++){
					$get = $length[$no]/max($length);
					if($get == 1 && $i == 0) $get = 0;
					if(floor($count[$no]) != floor($count[$no]+$get)) $value .= $arr[$no][floor($count[$no])];
					$count[$no] += $get;
				}
			}
			return $value;
		}
	}
	
	
	//사용 예제
	//rainbow table방지를 위한 안전한 해쉬 생성 / 생성시 무작위 값을 넣으면 안됩니다! (당연한 거지만...)
	function make_hash(string $pass,$type="sha512") : string{
		$type = strtolower(trim($type));
		$arr = array(NULL,NULL);
		for($i = 0;$i<mb_strlen($pass,"UTF-8");$i++){
			$base = ord(mb_substr($pass, $i, 1, "UTF-8" ));
			$arr[0] .= $base;
			$arr[1] .= strrev($base);
		}
		return hash($type,string2mix($arr));
	}
	function simple_hash(string $pass) : string{
		return md5(string2mix([md5(md5($pass)),strrev(md5($pass))]));
	}
	
	
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