<?php
defined('BASEPATH') OR exit('No direct script access allowed');





$route['default_controller'] = 'home';
$route['home'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['administracion'] = 'admin/administracion';
$route['qr'] = 'admin/qr';
$route['getOptions'] = 'admin/getOptions';
$route['actualizarColorAcentuado'] = 'admin/actualizarColorAcentuado';
$route['actualizarColorPrecio'] = 'admin/actualizarColorPrecio';
$route['actualizarColorCategorias'] = 'admin/actualizarColorCategorias';
$route['actualizareAlergenos'] = 'admin/actualizareAlergenos';
$route['actualizarredes'] = 'admin/actualizarredes';
$route['actualizarcontacto'] = 'admin/actualizarcontacto';
$route['actualizarFace'] = 'admin/actualizarFace';
$route['actualizartwitter'] = 'admin/actualizartwitter';
$route['actualizarTel'] = 'admin/actualizarTel';
$route['actualizarMovil'] = 'admin/actualizarMovil';
$route['actualizarMail'] = 'admin/actualizarMail';
$route['actualizarInsta'] = 'admin/actualizarInsta';
$route['actualizarestiloCarta'] = 'admin/actualizarestiloCarta';
$route['actualizarNombreLogo'] = 'admin/actualizarNombreLogo';
$route['actualizarLogo'] = 'admin/actualizarLogo';
$route['actualizarlogopreloader'] = 'admin/actualizarlogopreloader';
$route['actualizarcolor1qr'] = 'admin/actualizarcolor1qr';
$route['actualizarcolor2qr'] = 'admin/actualizarcolor2qr';
$route['actualizarlogoqr'] = 'admin/actualizarlogoqr';
$route['actualizarpxLogo'] = 'admin/actualizarpxLogo';
$route['actualizarfuenteCabecera'] = 'admin/actualizarfuenteCabecera';
$route['actualizarfuenteCategorias'] = 'admin/actualizarfuenteCategorias';
$route['actualizarfuenteDescCat'] = 'admin/actualizarfuenteDescCat';
$route['actualizarcolorDescCat'] = 'admin/actualizarcolorDescCat';
$route['actualizarpxFuenteDescCat'] = 'admin/actualizarpxFuenteDescCat';
$route['actualizarcolorCategoriasAcento'] = 'admin/actualizarcolorCategoriasAcento';
$route['actualizarfuentePrecio'] = 'admin/actualizarfuentePrecio';
$route['actualizarpxFuentePrecio'] = 'admin/actualizarpxFuentePrecio';
$route['actualizarfuentePlato'] = 'admin/actualizarfuentePlato';
$route['actualizarcolorPlato'] = 'admin/actualizarcolorPlato';
$route['actualizarpxFuentePlato'] = 'admin/actualizarpxFuentePlato';
$route['actualizarfuenteAlergenos'] = 'admin/actualizarfuenteAlergenos';
$route['actualizarpxFuenteAlergenos'] = 'admin/actualizarpxFuenteAlergenos';
$route['actualizarcolorAlergenos'] = 'admin/actualizarcolorAlergenos';
$route['actualizarfuenteContacto'] = 'admin/actualizarfuenteContacto';
$route['actualizarcolorContacto'] = 'admin/actualizarcolorContacto';
$route['actualizarpxFuenteContacto'] = 'admin/actualizarpxFuenteContacto';
$route['actualizarpxFuenteCabecera'] = 'admin/actualizarpxFuenteCabecera';
$route['actualizarpxFuenteCategorias'] = 'admin/actualizarpxFuenteCategorias';
$route['actualizarcolorfondoCabecera'] = 'admin/actualizarcolorfondoCabecera';
$route['familias'] = 'admin/familias';
$route['opciones'] = 'admin/opciones';
$route['actualizarNombre'] = 'admin/actualizarNombre';
$route['loginAdmin'] = 'admin/loginAdmin';
$route['importar'] = 'admin/importar';
$route['actualizarPlato'] = 'admin/actualizarPlato';
$route['actualizarFamilia'] = 'admin/actualizarFamilia';
$route['crearPlato'] = 'admin/crearPlato';
$route['crearFamilia'] = 'admin/crearFamilia';
$route['borrarPlato'] = 'admin/borrarPlato';
$route['borrarCategoria'] = 'admin/borrarCategoria';
$route['getItemsFamilia/(:any)'] = 'home/getItemsFamilia/$1';
$route['getAlergenos/(:any)'] = 'home/getAlergenos/$1';
$route['quitarAlergenos/(:any)/(:any)'] = 'admin/quitarAlergenos/$1/$2';
$route['activarAlergenos/(:any)/(:any)'] = 'admin/activarAlergenos/$1/$2';
