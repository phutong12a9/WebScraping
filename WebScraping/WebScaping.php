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

			// read data
			foreach ($title as $tl) {
				echo "Title: ".$tl->innertext;
				echo "<hr>";
				$t.=$tl->innertext;				
			}
			foreach($content as $content){
				echo strip_tags($content->innertext)."";
				$c .=strip_tags($content->innertext);				
			}
			foreach($price as $pr){
				echo "<hr>";
				echo "Price: ".$pr->innertext;
				echo "<hr>";
				$p .=$pr->innertext;					
			}
			foreach ($address as $add) {
				echo "Address: ".$add->innertext;
				echo "<hr>";
				$a .=$add->innertext;					
			}
			foreach ($square as $sq) {
				echo "Square: ".strip_tags($sq->innertext);
				echo "<hr>";
				$s .=strip_tags($sq->innertext);					
			}
			foreach ($contact as $contact) {
				echo "Contact: ".strip_tags($contact->innertext);
				echo "<hr>";
				$ct .=strip_tags($contact->innertext);					
			}
			echo "Link: ".$_POST["add_web"];
			echo "<hr>";
			foreach($img as $img){
				$src = $img->src;
				echo "<img src='https://alonhadat.com.vn/$src' style='width:1000px'>";
				echo "<hr>";
				array_push($i,"https://alonhadat.com.vn".$src) ;	
			}

			// Query DataBase
			// Insert content
			$sql = "INSERT INTO detail VALUES(null,'$t','$c','$p','$a','$s','$ct','$l')";
			// Perform additional records
			if (mysqli_query($conn, $sql)) {
			    $last_id = mysqli_insert_id($conn);
			    // Insert Image
			   foreach ($i as $key => $value) {
				   	$sql_img = "INSERT INTO image VALUES(null,'$last_id','$value')";
				   	mysqli_query($conn,$sql_img);
			   }
			} 
			else {
			    echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
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