<?php
require "simple_html_dom.php";
require "conn.php";
$qr = "SELECT * FROM config";
$result = $conn->query($qr);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	    if (strlen(strstr($_POST["add_web"], $row["Domain"])) > 0) {
	    	$html = file_get_html($_POST["add_web"]);

			// find title
			$title = $html->find($row["TagTitle"]);

			// find image
			$img = $html->find($row["TagLink"]);
			if (empty($img)) {
				$img = $html->find(".image-list img");
			}
			// find content
			$content = $html->find($row["TagContent"]);
			if (empty($content)) {
				$content = $html->find("div.detail.text-content");
			}

			// find price
			$price = $html->find($row["TagPrice"]);

			// find address
			$address = $html->find($row["TagAddress"]);

			// find square
			$square = $html->find($row["TagSquare"]);

			// find contact
			$contact = $html->find($row["TagContact"]);

			// create empty string and array
			$t = "";
			$c = "";
			$a = "";
			$s = "";
			$p = "";
			$ct ="";
			$l = $_POST["add_web"];
			$i = array();

			foreach ($title as $tl) {
				$t.=$tl->innertext;
			}

			foreach($content as $content){
				$c.=strip_tags($content->innertext);
			}
			foreach($price as $pr){
				$p.=$pr->innertext;
			}
			foreach ($address as $add) {
				$a.=$add->innertext;
			}
			foreach ($square as $sq) {
				$s.=strip_tags($sq->innertext);
			}
			foreach ($contact as $contact) {
				$ct.=strip_tags($contact->innertext);
			}
			foreach($img as $img){
				array_push($i, basename($img->src)) ;
			}

			// Create Array
			$value = [$t,$c,$a,$s,$p,$ct,$l,$i];
			$key = ['title','content','address','square','price','contact','link','image'];
			$arr = array_combine($key,$value);

			// Convert Array to Json
			$json = json_encode($arr,JSON_UNESCAPED_UNICODE);

			// Write File
			$myfile = fopen("detail.txt","a");
			fwrite($myfile,$json);
			fclose($myfile);

			// Go to back
			if (isset($_SERVER["HTTP_REFERER"])) {
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
		}
		else{
			echo "<span>This Domain is not supported</span>";
			for ($j=5; $j <=0 ; $j--) { 
				echo "<div>Back to the previous page </div>";
			}
			// Go to back
			if (isset($_SERVER["HTTP_REFERER"])) {
				echo " <a href='".$_SERVER["HTTP_REFERER"]."'>Go to back</a>";
			}
		}
	}	
}
// Disconnect 
mysqli_close($conn);

