<?php
session_start();?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Try upload!</title>

<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />

<link rel="stylesheet" type="text/css" href="css/component.css" />
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

</head>
<body>
		<div class="container">
			<div class="content">
				<div class="box">
                    <form action="index.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>选择一个文件上传</span></label>
                    <input type="submit" name="submit" value="UP!" />
                    </form>
				</div>

			</div>

		</div>

		<script src="js/custom-file-input.js"></script>

<div style="text-align:center;margin:10px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>
</body>
</html>

<?php

//error_reporting(0);



if(isset($_FILES["file"])) 
{
	echo "Come and upload some files!";

    $uploaded = $_FILES["file"];
    
    $name = $uploaded['name'];

    $temp = strrev($name);
    $arr = explode('.', $temp);
    $ext = $arr[0];

    $size = $uploaded['size'];
    $tmpname  = $uploaded['tmp_name'];
    $mime = $uploaded["type"];
    
    $path  = getcwd() . "/upload/" . ($_SESSION['source']);

    $position = $path . "/" . basename($name);

    if(!($mime === "image/jpeg"))
        die("Bad bad hacker!");
    
    if($size >= 1024*1024)
        die("Bad bad hacker!");
    
    $content = file_get_contents($tmpname);

    if(strpos("$content",";") !== false)
        die("Bad bad hacker!");
    if(strpos("$content","php") !== false)
        die("Bad bad hacker!");
    
    @mkdir($path, 0777, true);

    move_uploaded_file($tmpname, $position);
    echo "okk";
    

}
?>