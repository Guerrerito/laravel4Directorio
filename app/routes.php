<?php

Route::any('/','usuarioController@actionLogin');

Route::any('/usuario/insertar','usuarioController@actionInsertar');
Route::any('/usuario/login','usuarioController@actionLogin');

Route::get('/usuario/cerrarsesion','usuarioController@actionCerrar' );
Route::get('/usuario/verpornombreusuario','usuarioController@actionVerPorNombre');
Route::any('/usuario/editar/{idUsuario?}','usuarioController@actionEditar');
// directorio
Route::any('/directorio/insertar','DirectorioController@actionInsertar');
Route::get('/directorio/verporidusuario','DirectorioController@actionVerPorIdUsuario');





