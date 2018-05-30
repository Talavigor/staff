<?php

Route::get('/', ['as' => 'app', 'uses' => 'EmployeeController@index']);

Route :: get ( '/employee' , array ( 'as' => 'staff.employee' , 'uses' => 'EmployeeController@getPeople' ));

Route::any('/sort', ['uses' => 'SortController@index']);

Route::get('/search','SortController@search');


