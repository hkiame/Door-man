<?php
$handle = fopen('php://stdin', 'r');
$num = fgets($handle);
$str = fgets($handle);
$q = str_split(trim($str));
$male = 0;
$female = 0;
$total = 0;  

function look($q, $n, $i, $male, $female, $flag){
	$a = $i + 1;
	if($flag == 'female'){
		if($q[$a] == 'M'){
			$maleA = $male + 1;
			if($female - $maleA > $n){
				return true;
			}
		}else{
			return true;
		}
	}else if($flag == 'male'){
		if($q[$a] == 'W'){
			$femaleA = $female + 1;
			if($male - $femaleA > $n){
				return true;
			}
		}else{
			return true;
		}

	}

	return false;

}

for($i = 0; $i < count($q); $i++){
	if($q[$i] == 'W'){
		$female += 1;
	}elseif($q[$i] == 'M'){
		$male += 1;
	}

	if((($female - $male) > $num)){
        if(look($q, $num, $i, $male, $female, 'female')){
			break;
		}
	}elseif((($male - $female) > $num)){
		if(look($q, $num, $i, $male, $female, 'male')){
			break;
		}
	} 
	$total += 1;
}

echo $total;
