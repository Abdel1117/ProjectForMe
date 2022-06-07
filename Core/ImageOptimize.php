<?php

namespace Hp\SpaceExplorer;



class ImageOptimizer {

    public $path;
	

    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public static function compressedImage($src, $dest, $quality){

        $info = getimagesize($src);
 
	    if ($info['mime'] == 'image/jpeg') {
		    $image = imagecreatefromjpeg($src);
	    }
	    elseif ($info['mime'] == 'image/gif') {
		    $image = imagecreatefromgif($src);
	    }
	    elseif ($info['mime'] == 'image/png') {
		    $image = imagecreatefrompng($src);
        }
	    else{
		    die('Format de fichier inconnue ');
	    }
 
	    //compress and save file to jpg
        //unlink($src);
	    imagejpeg($image, $dest, $quality);
 
	    //return destination file
	    return $dest;

    }   

    public static function checkImage(? string $img_name ){

		$array_of_allowed_ext = array("jpg",  "jpeg", "png");
		
		$img = $_FILES["$img_name"]["name"];
		$image_Tmp =  $_FILES["$img_name"]["tmp_name"];
		$size_of_image = $_FILES["$img_name"]["size"];
		$ext_of_image = $_FILES["$img_name"]['type'];
		$file_response = $_FILES["$img_name"]['error'];
                	
		$name_of_image =  explode("." ,$_FILES["$img_name"]["name"]);
	
		$ext = end($name_of_image);
	
		if(in_array(strtolower($ext), $array_of_allowed_ext)){
			
			if($file_response === 0){                        
		
				if($size_of_image < 5000000){
				
				
				$path = "src\\image\\uploads\\$img";    
				move_uploaded_file($image_Tmp , "$path");
				
				$compress_file = $img;
				$compressed_img = ".\\src\\image\\uploads\\" . $compress_file;
				
				ImageOptimizer::compressedImage($path,$compressed_img, 50);
				
				$data_to_send = [
					":title" => $name,
					":img_path" => $path,
					":description"=> $desc,
				];
				
					Model::getPdo()->query("INSERT INTO image_galerie (titre_image, image, description) VALUES (:title , :img_path, :description)", $data_to_send);
				
					$_SESSION["succes"] = "Image ajouté avec succes";    
			}    
			else{
				 $_SESSION['err_mode'] = "Le fichier est trop volumineux il dois faire moins de 5MO";
				}
		}else{
			  $_SESSION["err_mode"] = "Une erreur inconnue c'est produite";
			}
		}
	else{
		 $_SESSION["err_mode"] = "Le fichier dois etre une image JPEG, JPG ou PNG !";
		}	

	}
	public static function checkImageOfVideo($img_name ){
		$array_of_allowed_ext = array("jpg",  "jpeg", "png");
		
		$img = $_FILES["$img_name"]["name"];
		$image_Tmp =  $_FILES["$img_name"]["tmp_name"];
		$size_of_image = $_FILES["$img_name"]["size"];
		$ext_of_image = $_FILES["$img_name"]['type'];
		$file_response = $_FILES["$img_name"]['error'];
                	
		$name_of_image =  explode("." ,$_FILES["$img_name"]["name"]);

		
		$ext = end($name_of_image);
	
		if(in_array(strtolower($ext), $array_of_allowed_ext)){
			

			if($file_response === 0){                        
				if($size_of_image < 5000000){
					
					return true;
				}
				else{
					return $_SESSION["err_mode"] = "Le fichier est trop volumineux il dois faire moins de 5MO !";
					 
				}
			}
			else{
				return	$_SESSION["err_mode"] = "Une erreur inconnue c'est produite";
				 
			}
		}
		else{
			return $_SESSION["err_mode"] = "Le fichier dois etre une image JPEG, JPG ou PNG !";
		}
	}

}


    