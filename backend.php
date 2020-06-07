<?php

$_POST["hash"];

if(($_POST["hash"]==="") && ($_POST["hash"]===" "))
{
    echo '<script type="text/javascript"> alert("Enter Something Bitch"); </script>';
}

else
{
    $url = 'https://www.instagram.com/web/search/topsearch/?context=hashtag&query='.$_POST["hash"];
    $data = file_get_contents($url); // put the contents of the file into a variable
    $characters = json_decode($data, true); // decode the JSON feed

    $i=0;
    echo'
    <html>
    	<h1>Top Hashtags</h1>
    </html>';
    $temp="";
	while($i < 30)
	{
		//echo "#".$characters["hashtags"][$i]["hashtag"]["name"]." ";
		$temp= $temp."#".$characters["hashtags"][$i]["hashtag"]["name"]." ";
		$i++;
	}
	echo '<html><textarea style="margin: 0px; width: 396px; height: 122px;" name="select1">'.$temp.'</textarea>
	      
	      <button>Copy All</button>
	      <script type="text/javascript">
	      		document.querySelector("button").onclick=function(){
	      			document.querySelector("textarea").select();
	      			document.execCommand("copy");
	      			alert("Hashtags Copied");
	      		};
	      </script>
	      </html>';
}	
?>