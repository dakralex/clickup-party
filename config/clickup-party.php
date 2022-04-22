<?php

return [

	/*
	|--------------------------------------------------------------------------
	| ClickUp API URL
	|--------------------------------------------------------------------------
	| 
	| This option defines the URL to the ClickUp API, which ClickUp Party will
	| connect to for making requests. By default, the production server is 
	| used.
	|
	*/

	'api_url' => env('CLICKUP_API_URL', 'https://api.clickup.com/api/v2'),

	/*
	|--------------------------------------------------------------------------
	| Authentication methods
	|--------------------------------------------------------------------------
	|
	| Here you can configure the authentication methods used for connecting
	| to the ClickUp API. For now, the only implemented method is with a 
	| personal token. In feature releases, the OAuth2 flow will be available
	| too.
	|
	*/

	'auth_method' => env('CLICKUP_PARTY_AUTH', 'token'),

	'auth_methods' => [
		'token' => [
			'token' => env('CLICKUP_API_TOKEN', 'pk_00000000_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'),
		],

		'oauth' => [
			'id' => env('CLICKUP_API_OAUTH_ID', null),
			'secret' => env('CLICKUP_API_OAUTH_SECRET', null),
			'url' => env('CLICKUP_API_OAUTH_URL', null),
		],
	],

];
