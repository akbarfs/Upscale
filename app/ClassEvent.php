<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassEvent extends Model
{
    //
    public $table = 't_class';
    protected $connection = 'erpo_bootcamp';
    protected $primaryKey = 'class_id';
    protected $fillable = ['parent_id',
                            'class_name',
                            'order'];
	public $timestamps = false;

    protected $dates = ['created_date'];

    public function buildMenu($menu, $parentid = 0) 
{ 
  $result = null;
  foreach ($menu as $item) 
    if ($item->parent_id == $parentid) { 
      $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->class_id}'>
      <div class='dd-handle nested-list-handle'>
        <span class='glyphicon glyphicon-move'></span>
      </div>
      <div class='nested-list-content'>{$item->class_name}
        <div class='pull-right'>
          <a href='".url("admin/bootcamp/class/editclass/{$item->class_id}")."'>Edit</a> |
          <a href='#' class='delete_toggle' rel='{$item->class_id}'>Delete</a>
        </div>
      </div>".$this->buildMenu($menu, $item->class_id) . "</li>"; 
    } 
  return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null; 
} 

	// Getter for the HTML menu builder
	public function getHTML($items)
	{
		return $this->buildMenu($items);
	}
}
