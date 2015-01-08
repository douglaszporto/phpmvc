<?php require_once dirname(__FILE__) . "/../../config.php" ?>
<html><head><style>html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}body{line-height:1;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}table{border-collapse:collapse;border-spacing:0;}html,body,form,input{height:30px;width:30px;overflow:hidden;}
</style></head>
	<body>
		<form action="<?php echo SITE_DOMAIN; ?>/tools/ajax/image-upload/<?php echo (isset($_GET["call"])?'?call='.$_GET["call"]:'') ?>" method="POST" enctype="multipart/form-data" id="formulario">
			<input type="file" onchange='parent.AddImageContainer("<?php echo (isset($_GET["call"])?$_GET["call"]:'') ?>",this.value); document.getElementById("formulario").submit()' name="image" style="position:absolute;top:0;left:0;cursor:pointer;height:30px;width:30px;display:block;float:left;">
		</form>
		<?php
			if(!empty($_FILES["image"])){
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["image"]["name"]);
				$extension = end($temp);

				if (in_array($_FILES["image"]["type"],array("image/gif","image/jpeg","image/jpg","image/pjpeg","image/x-png","image/png")) &&
				    $_FILES["image"]["size"] < 200000 &&
				    in_array($extension, $allowedExts)) {

					if ($_FILES["image"]["error"] > 0) {
						echo '<script>parent.ErrorOnImageUpload("'.$_FILES["image"]["error"].'")</script>';
					} else {
						$name   = str_replace(' ','_',$_FILES["image"]["name"]);
						$unique = mktime();
						move_uploaded_file($_FILES["image"]["tmp_name"], dirname(__FILE__) . "/../../statics/images/uploads/" . $unique . $name);
						echo '<script>parent.LoadImageUpload("',(isset($_GET["call"])?$_GET["call"]:''),'","'.str_replace(array(" ",".","-"),"_",$_FILES["image"]["name"]).'","/statics/images/uploads/' . $unique . $name .'")</script>';
					}

				}
			}
		?>
	</body>
</html>