<?php

class Filter
{
	private $objImage;
	private $objWidth;
	private $objHeight;
	
    public function __construct($objImage)
    {
    	$this->objImage = $objImage;
    	
	  	$vWidth = imagesx($this->objImage);
	  	$vHeight = imagesy($this->objImage);
    }
    
    public function noise($pRuns = 30)
    {
      	for ($n=0; $n<$pRuns; $n++)
      	{
        	for ($i=1; $i<=$this->vHeight; $i++)
        	{
          		$vColor = imagecolorallocate($this->objImage, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
          		imagesetpixel($this->objImage, mt_rand(1, $this->vWidth), mt_rand(1, $this->vHeight), $vColor);
        	}
      	}
      	
      	return $this->objImage;
	}
    
	public function signs($pFont, $pCells = 3)
	{
   	  	for ($i=0; $i<$pCells; $i++)
   	  	{
	   	  	$vAmount = mt_rand(1, 15);
	   	  	$vCenterX = mt_rand(1, $this->vWidth);
	   	  	$vCenterY = mt_rand(1, $this->vHeight);
	   	  	
	        $vColor = imagecolorallocate($this->objImage, 200, 200, 200);
   	  	
   	  		for ($n=0; $n<$vAmount; $n++)
   	  		{
          		$vSigns = range('A', 'Z');
          		$vSign  = $vSigns[mt_rand(0, count($vSigns) - 1)];
   	  	  		imagettftext($this->objImage, 25, mt_rand(-15, 15), $vCenterX + mt_rand(-50, 50), $vCenterY + mt_rand(-50, 50), $vColor, $pFont, $vSign);   	  	
   	  		}
   	  	}
	  
	  	return $this->objImage;
    }
    
    public function blur($pRadius = 3)
    {
	  	$pRadius  = round(max(0, min($pRadius, 50)) * 2);

	  	$objBlurImage = imagecreate($this->vWidth, $this->vHeight);

	  	for ($i=0; $i<$pRadius; $i++)
	  	{
			imagecopy($objBlurImage, $this->objImage, 0, 0, 1, 1, $this->vWidth - 1, $this->vHeight - 1);
			imagecopymerge($objBlurImage, $this->objImage, 1, 1, 0, 0, $this->vWidth, $this->vHeight, 50.0000);
			imagecopymerge($objBlurImage, $this->objImage, 0, 1, 1, 0, $this->vWidth - 1, $this->vHeight, 33.3333);
			imagecopymerge($objBlurImage, $this->objImage, 1, 0, 0, 1, $this->vWidth, $this->vHeight - 1, 25.0000);
			imagecopymerge($objBlurImage, $this->objImage, 0, 0, 1, 0, $this->vWidth - 1, $this->vHeight, 33.3333);
			imagecopymerge($objBlurImage, $this->objImage, 1, 0, 0, 0, $this->vWidth, $this->vHeight, 25.0000);
			imagecopymerge($objBlurImage, $this->objImage, 0, 0, 0, 1, $this->vWidth, $this->vHeight - 1, 20.0000);
			imagecopymerge($objBlurImage, $this->objImage, 0, 1, 0, 0, $this->vWidth, $this->vHeight, 16.6667);
			imagecopymerge($objBlurImage, $this->objImage, 0, 0, 0, 0, $this->vWidth, $this->vHeight, 50.0000);
			imagecopy($this->objImage, $objBlurImage, 0, 0, 0, 0, $this->vWidth, $this->vHeight);
	  	}
	  
	  	imagedestroy($objBlurImage);
	  
	  	return $this->objImage;
    }

}

?>