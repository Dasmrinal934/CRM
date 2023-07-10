<?php
//this function for images resize
if(!function_exists('image_formated')){
  // this function for images resize and move to destination
  function image_formated($data,$folder)
  {
            $image= $data;
            $input = time().'.'.$image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            Image::make($image)->resize(400, 400)->save( public_path('/'.$folder.'/' . $input) );
            return $input;

  }

}
//this code for date formate show user like dd-mm-YYYY
if(!function_exists('date_formated')){
  function date_formated($date){
    $formated_date=date('d-m-Y',strtotime($date));
    return $formated_date;
  }
}
//this code for for set date for databse query like Y-m-d
if(!function_exists('date_query_formated')){
  function date_query_formated($date){
    $query_formated=date('Y-m-d',strtotime($date));
    return $query_formated;
  }
}
