<?php

Route::get('email',[
	'uses'=>'PageController@email',
	'as'=>'sendemail'
]);

Route::get('/',[
	'uses'=>'PageController@getWelcome',
	'as'=>'home'
]);

Route::get('rreth-nesh',[
	'uses'=>'PageController@getAbout',
	'as'=>'about'
]);

Route::get('kontaktoni',[
	'uses'=>'PageController@getContact',
	'as'=>'contact'
]);

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'admin'], function (){
		Route::group(['prefix'=>'admin'],function (){
			Route::get('profile',[
			'uses'=>'AdminController@getProfile',
			'as'=>'admin-profile'
			]);
		});

		Route::group(['prefix'=>'control-center'],function (){
			Route::get('/',[
			'uses'=>'AdminController@getAdminControlCenter',
			'as'=>'admin-control-center'
			]);
			/*
				Route for managing users in the auth and admin middleware
			*/
			Route::group(['prefix'=>'users'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getUsersIndex',
				'middleware'=>'rolemid:manage-users',
				'as'=>'user-index'
				]);

				Route::get('/{user_id}/edit',[
				'uses'=>'AdminController@getUsersEdit',
				'middleware'=>'rolemid:manage-users',
				'as'=>'user-edit'
				]);

				Route::post('/{user_id}/update',[
				'uses'=>'AdminController@userUpdate',
				'middleware'=>'rolemid:manage-users',
				'as'=>'user-update'
				]);

				Route::post('delete/{user_id}',[
					'uses'=>'AdminController@deleteUser',
					'middleware'=>'rolemid:manage-users',
					'as'=>'user-delete'
				]);
			});

			/*
				Route for managing categories in the auth and admin middleware
			*/
			Route::group(['prefix'=>'category'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getCategoryIndex',
				'middleware'=>'rolemid:manage-categories',
				'as'=>'category-index'
				]);

				Route::post('create',[
					'uses'=>'AdminController@categoryStore',
					'middleware'=>'rolemid:manage-categories',
					'as'=>'category-store'
				]);

				Route::get('/{category_id}/edit',[
				'uses'=>'AdminController@getCategoryEdit',
				'middleware'=>'rolemid:manage-categories',
				'as'=>'category-edit'
				]);

				Route::post('/{category_id}/update',[
				'uses'=>'AdminController@categoryUpdate',
				'middleware'=>'rolemid:manage-categories',
				'as'=>'category-update'
				]);

				Route::post('/delete/{category_id}',[
				'uses'=>'AdminController@deleteCategory',
				'middleware'=>'rolemid:manage-categories',
				'as'=>'category-delete'
				]);
			});

			/*
				Route for managing cities in the auth and admin middleware
			*/

			Route::group(['prefix'=>'city'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getCityIndex',
				'middleware'=>'rolemid:manage-cities',
				'as'=>'city-index'
				]);

				Route::post('create',[
					'uses'=>'AdminController@cityStore',
					'middleware'=>'rolemid:manage-cities',
					'as'=>'city-store'
				]);

				Route::get('/{city_id}/edit',[
				'uses'=>'AdminController@getCityEdit',
				'middleware'=>'rolemid:manage-cities',
				'as'=>'city-edit'
				]);

				Route::post('/{city_id}/update',[
				'uses'=>'AdminController@cityUpdate',
				'middleware'=>'rolemid:manage-cities',
				'as'=>'city-update'
				]);

				Route::post('/delete/{city_id}',[
					'uses'=>'AdminController@deleteCity',
					'middleware'=>'rolemid:manage-cities',
					'as'=>'city-delete'
				]);
			});

			/*
				Route for managing permissions in the auth and admin middleware
			*/

			Route::group(['prefix'=>'permission'],function (){
				Route::get('/',[
					'uses'=>'AdminController@getPermissionIndex',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-index'
				]);

				Route::get('/create',[
					'uses'=>'AdminController@permissionCreate',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-create'
				]);

				Route::post('/store',[
					'uses'=>'AdminController@permissionStore',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-store'
				]);

				Route::get('/{permission_id}/edit',[
					'uses'=>'AdminController@getPermissionEdit',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-edit'
				]);

				Route::post('/{permission_id}/update',[
					'uses'=>'AdminController@permissionEdit',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-update'
				]);

				Route::post('/delete/{permission_id}',[
					'uses'=>'AdminController@permissionDelete',
					'middleware'=>'rolemid:manage-permissions',
					'as'=>'permission-delete'
				]);
			});

			/*
				Route for managing cities in the auth and admin middleware
			*/

			Route::group(['prefix'=>'role'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getRoleIndex',
				'middleware'=>'rolemid:manage-roles',
				'as'=>'role-index'
				]);

				Route::get('/{user_id}/edit',[
				'uses'=>'AdminController@getRoleEdit',
				'middleware'=>'rolemid:manage-roles',
				'as'=>'role-edit'
				]);

				Route::post('/{user_id}/update',[
				'uses'=>'AdminController@roleEdit',
				'middleware'=>'rolemid:manage-roles',
				'as'=>'role-update'
				]);

				Route::get('/{role_id}/permissions',[
				'uses'=>'AdminController@getRolePermissions',
				'middleware'=>'rolemid:manage-roles',
				'as'=>'role-permissions'
				]);

				Route::get('/{role}/addPermission',[
					'uses'=>'AdminController@addPermissionToRole',
					'middleware'=>'rolemid:manage-roles',
					'as'=>'add-permission-to-role'
				]);

				Route::post('/{role_id}/assignPermission',[
					'uses'=>'AdminController@assignPermission',
					'middleware'=>'rolemid:manage-roles',
					'as'=>'assign-permission-to-role'
				]);

				Route::post('/delete/{role_id}',[
					'uses'=>'AdminController@deleteRole',
					'middleware'=>'rolemid:manage-roles',
					'as'=>'role-delete'
				]);
			});

			Route::group(['prefix'=>'needs'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getNeedsIndex',
				'as'=>'admin-need-index'
				]);

				Route::post('delete/{need_id}',[
				'uses'=>'AdminController@needDelete',
				'as'=>'admin-need-delete'
				]);
			});/* End of Need prefix route*/

			Route::group(['prefix'=>'products'],function (){
				Route::get('/',[
				'uses'=>'AdminController@getProductsIndex',
				'as'=>'admin-product-index'
				]);

				Route::post('delete/{product_id}',[
				'uses'=>'AdminController@productDelete',
				'as'=>'admin-product-delete'
				]);

			});/* End of Need prefix route*/

		});/*End of control center prefix routes*/
	});/*End of admin middleware routes*/

	// Routes for view,edit and other things for profile
	// In this group I use the role middleware which looks if a user has any role, if so the user can view the profile
	Route::group(['middleware'=>'role'],function (){
		Route::group(['prefix'=>'profile'],function (){
			Route::get('my',[
				'uses'=>'UserController@getProfile',
				'as'=>'user-profile'
			]);

			Route::get('edit',[
				'uses'=>'UserController@getEdit',
				'as'=>'user-profile-edit'
			]);
		});
	}); // End of profile routes

	// Routes for edit,create,update,delete for products and needs in the auth middleware
	Route::get('{user_id}/products',[
		'uses'=>'ProductsController@getMyProducts',
		'middleware'=>'onlyforuser',
		'as'=>'my-products'
	]);

	Route::get('products/create',[
		'uses'=>'ProductsController@create',
		'as'=>'add.product'
	]);

	Route::post('products/add',[
		'uses'=>'ProductsController@store',
		'as'=>'store.product'
	]);

	Route::get('product/{product_id}/edit',[
		'uses'=>'ProductsController@edit',
		'as'=>'edit.product'
	]);

	Route::post('product/{product_id}/update',[
		'uses'=>'ProductsController@update',
		'as'=>'update.product'
	]);

	Route::post('product/{product_id}/delete',[
		'uses'=>'ProductsController@delete',
		'as'=>'delete.product'
	]);

	Route::get('{user_id}/needs/',[
		'uses'=>'NeedsController@getMyNeeds',
		'as'=>'my-needs'
	]);

	Route::get('need/{need_id}/edit',[
		'uses'=>'NeedsController@getEdit',
		'as'=>'edit.need'
	]);

	Route::post('need/{need_id}/update',[
		'uses'=>'NeedsController@update',
		'as'=>'update.need'
	]);

	Route::post('need/{need_id}/delete',[
		'uses'=>'NeedsController@delete',
		'as'=>'delete.need'
	]);

	Route::get('needs/create',[
		'uses'=>'NeedsController@create',
		'as'=>'add.need'
	]);

	Route::post('needs/add',[
		'uses'=>'NeedsController@store',
		'as'=>'store.need'
	]);

	Route::get('myneed/{need_id}',[
		'uses'=>'NeedsController@getMySingleNeed',
		'as'=>'myneed.single'
	]);


	Route::get('buyers-for/{need?}',[
		'uses'=>'NeedsController@findBuyersForNeed',
		'as'=>'buyer.for.need'
	]);

	Route::get('messages/',[
		'uses'=>'PageController@getMessagesPage',
		'as'=>'messages'
	]);

	Route::get('message/compose/{user_id}',[
		'uses'=>'PageController@getComposeMessage',
		'as'=>'compose'
	]);

	Route::post('message/send/{user_id}',[
		'uses'=>'PageController@sendMessage',
		'as'=>'send-message'
	]);

	Route::get('message/view/{msg_id}',[
		'uses'=>'PageController@viewMessage',
		'as'=>'view-message'
	]);
});

// No middleware routes

// View a users profile
Route::get('user/{user_id}',[
	'uses'=>'UserController@viewUserProfile',
	'as'=>'view-user-profile'
]);

Route::get('need/{need_id}',[
	'uses'=>'NeedsController@getSingleNeed',
	'as'=>'need.single'
]);

Route::get('product/{product_id}',[
	'uses'=>'ProductsController@getSingleProduct',
	'as'=>'product.single'
]);

// Get All Needs
Route::get('all-needs/',[
	'uses'=>'NeedsController@getAllNeeds',
	'as'=>'needs.all'
]);

// Get All Products
Route::get('all-products/',[
	'uses'=>'ProductsController@getAllProducts',
	'as'=>'products.all'
]);

Route::get('search',[
	'uses'=>'SearchController@search',
	'as'=>'search'
]);


Route::get('results',[
	'uses'=>'SearchController@filter',
	'as'=>'search-res'
]);

Auth::routes();
Route::get('logout','Auth\LoginController@logout')->name('logout');
