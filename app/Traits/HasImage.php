<?php
namespace App\Traits;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 *
 */
trait HasImage
{
  public function saveImage($image, $collection, $getMedia = false){
    if ($image) {
      $medias = [];
      if (\is_array($image))
        foreach ($image as $img)
          $medias[] = $this->uploadImage($img, $collection);
      else $medias[] = $this->uploadImage($image, $collection);
      if ($getMedia) {
        return $medias;
      } else {
        return $this->withUrls($collection, \is_array($image), $medias);
      }
    }
  }

  public function withImageUrl($collection, $medias = null, $is_array = false){
    if (!$medias) $medias = $is_array ? $this->getMedia($collection) : $this->getFirstMedia($collection);

    $this->generateCollectionUrl($medias, $is_array, $collection);
    return $this;
  }

  private function generateCollectionUrl(&$medias, $is_array, $collection) {
    if ($medias) {
      $images;
      if ($is_array) {
        $images = [];
        $medias = $this->getMedia($collection);
        for ($i=0; $i < sizeof($medias); $i++) {
          $images[] = $this->imageObj($medias[$i]);
        }
      } else {
        $images = $this->imageObj(is_array($medias) ? $medias[0] : $medias);
      }
      if ($images) $this->$collection = $images;
    } else {
      if (!$is_array) {
        $this->$collection = $this->imageObj(null, true);
      }
    }
  }

  private function generateCollectionsUrl($collection, $medias = false){
    $is_array = $this->collectionIsArray($collection);
    $collection_name_is_array = is_array($collection);
    $collection_name = $collection_name_is_array ? $collection[0] : $collection;
    $collection_medias = !$medias ? $is_array ? $this->getMedia($collection_name) : $this->getFirstMedia($collection_name) : $medias;

    $this->generateCollectionUrl($collection_medias, $is_array, $collection_name);
  }

  public function withUrls($collections, $is_array = false, $medias = null){
    if (is_array($collections)) {
      foreach ($collections as $collection) {
        $this->generateCollectionsUrl($collection, $medias);
      }
    } else {
      $this->generateCollectionsUrl($collections, $medias);
    }
    return $this;
  }

  private function collectionIsArray($collection){
    $collection = $this->getMediaCollection(is_array($collection) ? $collection[0] : $collection);
    return $collection ? $collection->collectionSizeLimit > 1 : false;
  }

  private function imageObj($media, $fallback = false){
    $image = new \stdClass();
    $fallbackUrl = 'https://www.pngitem.com/pimgs/m/30-307416_profile-icon-png-image-free-download-searchpng-employee.png';
    $image->thumb   = $fallback ? $fallbackUrl : $media->getUrl('thumb');
    $image->medium  = $fallback ? $fallbackUrl : $media->getUrl('medium');
    $image->url     = $fallback ? $fallbackUrl : $media->getUrl();
    $image->metas   = $fallback ? ['fallback' => true] : ['fallback' => false] + $media->custom_properties;
    return $image;
  }

  public function uploadImage($image, $collection){
    $name           = $collection;
    $type           = strpos($image, ';');
    $type           = explode(':', substr($image, 0, $type))[1];
    $ext            = explode('/', $type)[1];
    $file_name      = rand().'.'.$ext;

    return $this->addMediaFromBase64($image)
    ->usingName($name)->usingFileName($file_name)
    ->toMediaCollection($collection);
  }

  private function convertionCallback(){
    return (function (Media $media = null) {
      $this->addMediaConversion('thumb')->nonQueued()
      ->width(368)->height(232);
      //->sharpen(10)
      $this->addMediaConversion('medium')->nonQueued()
      ->width(400)->height(400);
    });
  }
}
