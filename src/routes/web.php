<?php

Route::get('hello', function(){
    return "hello";
});

Route::post('getImageMainColor', 'image\colordetect\Controller\ColorController@getImageMainColor');