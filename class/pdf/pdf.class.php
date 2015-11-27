<?php
class Pdf{

	public $pdf_object;
	public $size;
	public $font_min;
	public $font_title;
	public $width;
	public $height;
	public $in_border;
	public $out_border;
	public $left;
	public $right;
	public $top;
	public $below;
	public $current_line;
	public $next_line;
	public $below_line;
	public $text_align_right;
	public $text_align_center;
	public $text_align_left;
	public $fill_yes;
	public $fill_no;
	public $link_url;

	function __construct(){
		$this->pdf_object 			= new FPDF();
		$this->size 				= 190;
		$this->font_min 			= 8;
		$this->font_title 			= 16;
		$this->in_border			= 1;
		$this->out_border			= 0;
		$this->left					= 'L';
		$this->right 				= 'R';			
		$this->top 					= 'T';
		$this->below 				= 'B';
		$this->current_line 		= 0;			
		$this->next_line 			= 1;
		$this->below_line 			= 2;
		$this->text_align_right 	= 'R';			
		$this->text_align_center 	= 'C';
		$this->text_align_left 		= 'L';
		$this->fill_yes 			= true;
		$this->fill_no	 			= false;
	}

	function cell($params){
		$this->pdf_object->cell();
	}
}