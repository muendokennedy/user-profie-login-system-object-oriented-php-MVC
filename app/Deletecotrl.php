<?php
namespace profile\app;
class DeleteCotrl extends Delete
{
  private $user_id;
  private $item_id;

  public function __construct($user_id, $item_id)
  {
    $this->user_id = $user_id;
    $this->item_id = $item_id;
  }
  public function delete_gallery_photo($table)
  {
    // Delete the specified photo from the database
    $this->deletePhoto($table, $this->user_id, $this->item_id);
  }
}