<?php



function getTextImageByTitle($file_name , $title = "Avanish Shukla" , $width =  300 , $height = 200){

        $names = explode(' ' , preg_replace("/[^A-Za-z0-9 ]/", '', $title ) , 2);
         $name='';
        if($names[1]) {
           foreach($names as $value) {
                $name .= substr($value, 0 ,1);
            }
        } else {$name .= substr($names[0], 0 ,2); }  

        $colors=array("tomato","lightgreen","lightblue","lightgrey","INDIANRED","skyblue");
        $random_colors=$colors[array_rand($colors,1)];
               

		/****************** text converting into image started here *********************/


        $image = new Imagick();    									// Create a new instance an $image class
        $draw = new ImagickDraw();    								//Create a new drawing class (?)
        $pixel = new ImagickPixel( $random_colors ); 				// Create a new instance an ImagickPixel class
        $image->newImage( $width, $height, $pixel );
        $draw->setFillColor('white');    							// Set up some colors to use for fill and outline
        $draw->circle( 150, 100, 100, 150 );    					// Draw the rectangle
        $image->drawImage( $draw );
        $draw->setFillColor('black');    							// Apply the stuff from the draw class to the image canvas
        $draw->setFontSize( 65 );
        $image->annotateImage($draw, 110, 128, 0,  $name);			// Give the text which will come into image example : $name = 'Avanish'
        $image->setImageFormat('jpeg');  							// Give the image a format
        $image->setImageCompression(imagick::COMPRESSION_JPEG); 
        $image->setImageCompressionQuality(100);
        $image = $image->flattenImages();   
        $image->writeImage($file_name);  							// Save image into file example: $file_name = $file_path/image_name.jpeg
        $image->clear();
        $image->destroy();
       // return $image;               

         


}






?>