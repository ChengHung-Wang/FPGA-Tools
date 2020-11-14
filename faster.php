<?PHP
	$g = $_GET;
	$p = $_POST;
	$c = $_COOKIE;
	function q($cmd){
		global $conn;
		return $conn->query($cmd);
	}
	function f($cmd){
		return q($cmd)->fetchAll(PDO::FETCH_ASSOC);
	}
	function find($table,$data){
		if($data == ""){
			return f("SELECT * FROM `$table`");
		}else{
			foreach($data as $k => $v){
				$tmp[] = sprintf("`%s` = '%s'",$k,$v);
			}
			return f("SELECT * FROM `$table` WHERE " . join(" AND ",$tmp));
		}
	}
	function auto_insert($table,$id,$data){
		global $conn;
		if($id == ""){
			q("INSERT INTO `$table`(`id`)VALUES(null)");
			$id = $conn->lastInsertId();
		}
		foreach($data as $k => $v){
			q("UPDATE `$table` SET `$k` = '$v' WHERE `id` = $id");	
		}
		return $id;
	}
	function alert($mess,$url){
		echo "<script>alert('$mess');location.href='$url';</script>";
		exit();
	}
	function gprint(){
		global $g;
		foreach($g as $k => $v){
			$tmp[] = sprintf("%s=%s",$k,$v);
		}
		return "?" . join("&",$tmp);
	}
	function popover($title,$mess){
		echo "data-title='$title' data-content='$mess' data-placement='top'";
	}