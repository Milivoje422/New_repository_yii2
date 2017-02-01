<html>
   <head>
      <title>Zipa Photo Agency</title>
      <link rel="shortcut icon" href= "http://zipaphoto.net/favicon.ico" type="image/x-icon"/>      
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> 
      <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> 
      <style>
         
         .html, .body {padding: 0px; margin: 0px; text-align: center; }
      </style>
   </head>

   <body>  
      <div class="fotorama" data-nav="thumbs" >
                  <?php
                  $dir = "./";
                  $dh = opendir($dir);
                  while (false !== ($filename = readdir($dh))) {
                     $files[] = $filename;
                  }
                  $images = preg_grep('/\.jpg$/i', $files);

                  if (is_array($images))
                     for ($i = 0; $i < count($images); $i++) {
                        if ($images[$i] != "")
                          // echo "<a href='" . $images[$i] . "' target='_blank'><img width='25%' src='" . $images[$i] . "' /></a>";
                           echo "<img  src='" . $images[$i] . "' />";
                        if($i>500) break;
                     }
                  ?>
         </div>

   </body>   
</html>

