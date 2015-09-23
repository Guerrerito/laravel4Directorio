<?php
//index
Route::any('/','usuarioController@actionLogin');
//usuario
Route::any('/usuario/insertar','usuarioController@actionInsertar');
Route::any('/usuario/login','usuarioController@actionLogin');
//mantenimiento CRUD
Route::get('/usuario/cerrarsesion','usuarioController@actionCerrar' );
Route::get('/usuario/verpornombreusuario','usuarioController@actionVerPorNombre');
Route::any('/usuario/editar/{idUsuario?}','usuarioController@actionEditar');
// directorio
Route::any('/directorio/insertar','DirectorioController@actionInsertar');
Route::get('/directorio/verporidusuario','DirectorioController@actionVerPorIdUsuario');
Route::any('/directorio/editar/{idDirectorio?}','DirectorioController@actionEditar');





