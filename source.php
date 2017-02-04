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
		$arr = array();
		$bin = NULL;
		$hex = NULL;
		for($i = 0;$i<mb_strlen($pass,"UTF-8");$i++){
			$arr[] = mb_substr($pass, $i, 1, "UTF-8" );
		}
		foreach($arr as $no => $list){
			$hex .= base_convert(bin2hex($list),16,2);
		}
		
		for($i=0;$i < 4;$i++){
			$size = floor(strlen($hex/4));
			$ceil[] = substr($hex,$size*$i,$size);
			if($i%2 == 1) $str[] = (hash($type,$ceil[$i]) ^ hash($type,$ceil[$i-1]));
		}
		
		return hash($type,string2mix([$str[0],$str[1]]));
	}
	function simple_hash(string $pass) : string{
		return md5(string2mix([md5(md5($pass)),strrev(md5($pass))]));
	}
	
	
?>