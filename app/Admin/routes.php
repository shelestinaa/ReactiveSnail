<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::get('handMadeCrud', ['as' => 'handMadeCrud', function () {
    $content = "<a href='../driverr'>Use the Owl or trash yourself </a>";
    return AdminSection::view($content, 'Handmade CRUD');
}]);
