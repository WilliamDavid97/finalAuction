<?php
include_once "function.php";
$final;
$db = mysqli_connect('localhost','root','','auction');
// input misspelled word
if (isset($_POST['search'])) 
{
	$in = strtolower($_POST['searchbox']);
	$new_str='';
	for ($z=0; $z <strlen($in); $z++) 
	{
		if (!special_chr($in[$z])) 
		{
			$new_str.=$in[$z];
		}
	}

	$input = PorterStemmer::Stem($new_str);
	echo "$input";
	$sql = "select * from product";
	$result  = mysqli_query($db,$sql);
	$i = 0;
	$d = 0;
	while ($words = mysqli_fetch_assoc($result)) 
	{
	
		$word = strtolower($words['product_name']);
		$changes = levenshtein($input, $word);
	    
       	$a = strlen($word);
	    $b = strlen($input);
       // $c=$a+$b;

		if($a > $b)
		{
			$c=$a;
		}else{
			$c=$b;
		}
	     $gg[$i] = 1-($changes/$c);
	     $str[$i] = [$word];
	     $count = count($str);
	     $i++;
	}
	$o = 0;
	$l = max($gg);
	for ($n=0; $n <count($gg) ; $n++) 
	{ 
       	if($l == $gg[$n])
       	{
       		$m[$o] = [$n];
       		$o++;
       	}
    }
	print_r($m);
	for ($p=0; $p <count($m); $p++) 
	{
	 $q = $m[$p][0];
	 echo "<br>";
	 // print_r($str[$q]);
	 echo "Search Result = ".$str[$q][0];
	 $final=$str[$q][0];
	}


	echo "<br>";
	echo "<br>";
	 // print_r($gg);
	 // echo "<br>";
	 // print_r($str) ;
	 // echo "<br>";
	 // print_r($gg[$k]);
	 // echo "<br>";
	 // print_r($str[$k]);
	 //porter algorithm
	echo $final;
	$query="SELECT * FROM product WHERE product_name='$final'";
	$res=mysqli_query($db,$query);
	while ($row=mysqli_fetch_assoc($res)) {
		$product_id=$row['product_id'];
		$row['price'];
		$row['image'];
		header('Location:../product_detail/product_detail.php?product_id='.$product_id.' ');
	}  
}
function special_chr($ch){
    $arr =['!','@','#','%',';','"','?','>','<','%','$','*','{','}','^','(',')','+','_','-','.',':','~','|','&'];

    $a=false;
    for ($i=0; $i < count($arr); $i++) {
       if($arr[$i]==$ch){
        $a=true;
       } 

    }
    return $a;
}

?>
<!-- <form method="post" action="">
	<input type="text" name="name" placeholder="Enter the name">
	<input type="text" name="a" placeholder="Enter the author name">
	<input type="integer" name="year" placeholder="Enter the book year">
	<input type="submit" name="search" value="search">
</form> -->