<?php
	// Make By K22pr - 2017-02-02
	// https://github.com/k22pr/PHPx-String2Mix
	
	// 2개 이상의 문자열을 서로 섞어 줍니다.
	//1글자의 배열들은 섞이지 않습니다.
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
	echo string2mix(["hello"])."<br>";
	echo string2mix(["hello","  "])."<br>";
	echo string2mix(["hello","world"])."<br>";
	echo string2mix([2,4,8,16,32,64])."<br>";
	echo string2mix(["HTML5","PHP7","CSS3","SCSS","jQuery","ANIA"])."<br>";
	echo string2mix(["이걸 왜 만들고 있는 걸까?","그걸 왜 나한테 물어봐ㅠ"])."<br>";


	function make_hash(string $pass,$type="sha512") : string{
		$type = strtolower(trim($type));
		return hash($type,string2mix([$pass,hash($type,$pass)]));
	}
	$pass = "password";
	echo make_hash($pass,"md5")."<br>";
?>