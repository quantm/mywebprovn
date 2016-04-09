<?

include "../library.php";
require_once("../upload.lib.php");

switch ($_POST[mode]){

	case "InsertImage":

		$_POST[idx] += 0;
		$_POST['mini_url'] = trim($_POST['mini_url']);

		if ($_POST['mini_url'] != '' && $_POST['mini_url'] != 'http://'){
			$src = $_POST['mini_url'];
		}
		else {
			//$dir = "data/";
			$dir = "../../data/editor/";

			if (!preg_match("/^image/",$_FILES[mini_file][type])){
				echo "<script>alert('이미지 파일만 업로드가 가능합니다');</script>";
				exit;
			}

			if (is_uploaded_file($_FILES[mini_file][tmp_name])){
				$div = explode(".",$_FILES[mini_file][name]);
				$filename = time().".".$div[count($div)-1];
				$upload = new upload_file($_FILES['mini_file'],$dir.$filename,'image');
				if(!$upload -> upload()){
					echo "<script>alert('이미지 파일만 업로드가 가능합니다');</script>";
					exit;
				}
				setDu('editor'); # 계정용량 계산
			}
			$src = dirname($_SERVER[PHP_SELF])."/".$dir.$filename;
		}

		if ($_POST[imgWidth] && $_POST[imgHeight]) $size = " width='$_POST[imgWidth]' height='$_POST[imgHeight]'";

		if ($src) echo "<script>parent.opener.mini_set_html($_POST[idx],\"<img src='$src' $size>\");</script>";
		echo "<script>parent.window.close();</script>";
		break;

}

?>