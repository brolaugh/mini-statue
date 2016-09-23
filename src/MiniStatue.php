<?php

namespace MiniStatue;

use PHPImageWorkshop\Core\ImageWorkshopLayer;
use PHPImageWorkshop\ImageWorkshop;

class MiniStatue
{
  const THUMBNAIL_MAX = 150;
  const;

  const BOOTSTRAP_MAX_XS = 768;
  const BOOTSTRAP_MAX_SM = 992;
  const BOOTSTRAP_MAX_MD = 1200;

  private $fileformat = '.jpg';

  public function __construct(array $options)
  {
    if($options['savepath'] == NULL) {
      throw new \Exception('No savepath specified');
    }

    if($options['mysqli'] != NULL) {
      //TODO: connect to mysql
    }
    if($options['dbtable'] == NULL) {
      $options['table'] = 'mini_statue';
    }

    if($options['mongodb'] != NULL) {
      //TODO: connect to mongodb
    }

    if($options['mongocollection'] == NULL) {
      $options['mongocollection'] = 'mini_statue';
    }
    if($options['']) {

    }
  }

  public function createBootstrapSizes(Object $image, bool $keepTransparancy = false): void
  {
    if($keepTransparancy /* and MIME TYPE is png */) {
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
      $imageSet[] = $this->createImageSetPiece($imageLayer, self::BOOTSTRAP_MAX_XS);
    }
    if($imageLayer->getWidth() > self::BOOTSTRAP_MAX_SM) {
      $imageSet[] = $this->createImageSetPiece($imageLayer, self::BOOTSTRAP_MAX_SM);
    }
    if($imageLayer->getWidth() > self::BOOTSTRAP_MAX_MD) {
      $imageSet[] = $this->createImageSetPiece($imageLayer, self::BOOTSTRAP_MAX_MD);
    }
  }

  private function createImageSetPiece(ImageWorkshopLayer $image, int $width): ImageWorkshopLayer
  {
    $imageSetPiece = clone $image;
    $imageSetPiece->resizeInPixel($width, NULL, true);
    return $imageSetPiece;
  }

  private function isSVG(ImageWorkshopLayer $image): bool
  {
    // Not sure if ImageWorkshop is the object wanted
    //TODO: Detect if file is an SVG
    return false;
  }

  private function isGIF(ImageWorkshopLayer $image): bool
  {
    // Not sure if ImageWorkshop is the object wanted
    //TODO: Detect if file is a GIF
    return false;
  }
  private  function getExtension($str)
  {
    $i = strrpos($str,".");
    if (!$i)
    {
      return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
  }
}