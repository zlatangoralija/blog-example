<?php

Route::post( 'file-uploads', 'App\Repositories\FilesUpload\FilesUpload@postUpload' );
Route::delete( 'file-uploads', 'App\Repositories\FilesUpload\FilesUpload@deleteUpload' );
