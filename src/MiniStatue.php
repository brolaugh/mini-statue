<?php

namespace MiniStatue;


use mysqli;
use PHPImageWorkshop\ImageWorkshop;

class MiniStatue
{
  const THUMBNAIL_MAX = 150;
  const ;

  const BOOTSTRAP_MAX_XS = 768;
  const BOOTSTRAP_MAX_SM = 992;
  const BOOTSTRAP_MAX_MD = 1200;

  private $fileformat = '.jpg';

  public function __construct(array $options = [])
  {
    if($options['savepath'] == NULL) {
      throw new \Exception('No savepath specified');
    }
    if($options['mysqli'] == NULL) {

    }
    if($options['mongodb'] == NULL) {

    }
  }

  public function createBootstrapSizes(Object $image, bool $keepTransparancy): void
  {
    if($keepTransparancy /* and MIME TYPE is png */){
        $this->fileformat = '.png';
    }

    $imageLayer = ImageWorkshop::initFromResourceVar($image);
    $imageSet = [];

    if($this->isSVG($imageLayer)) {
      //TODO: Skip the code below
    }
    if($this->isGIF($imageLayer)) {
      //TODO: Skip the code below
    }
    if($imageLayer->getWidth() > self::BOOTSTRAP_MAX_XS) {
      $imageSetPiece = clone $imageLayer;
      $imageSetPiece->resizeInPixel(self::BOOTSTRAP_MAX_XS, NULL, true);
      $imageSet[] = $imageSetPiece;
    }
    if($imageLayer->getWidth() > self::BOOTSTRAP_MAX_SM) {
      $imageSetPiece = clone $imageLayer;
      $imageSetPiece->resizeInPixel(self::BOOTSTRAP_MAX_SM, NULL, true);
      $imageSet[] = $imageSetPiece;
    }
    if($imageLayer->getWidth() > self::BOOTSTRAP_MAX_MD) {
      $imageSetPiece = clone $imageLayer;
      $imageSetPiece->resizeInPixel(self::BOOTSTRAP_MAX_MD, NULL, true);
      $imageSet[] = $imageSetPiece;
    }

  }

  public function
  private function isSVG(ImageWorkshop $image): bool
{
  // Not sure if ImageWorkshop is the object wanted
  //TODO: Detect if file is an SVG
  return false;
}
   private function minifySVG($svg)
   {
     //TODO: Do minification magic
     return $svg;
   }
}