<?php

return [
	'USER' => [
			'DEFAULT_IMAGE'   => '/images/user-profile.png',
		],
    'IMAGE_EXTENTIONS' => ['png','jpg','jpeg','gif'],

    'PER_PAGE_LIMIT' => 10,
	'DEFAULT_IMAGE'   => '/images/default.jpg',

    'USER_SAVE_IMAGE_PATH'   => '/uploads/profile-image',

    'MAIL_SETTING' => [
        'MAIL_MAILER' => env('MAIL_MAILER'),
        'MAIL_HOST' => env('MAIL_HOST'),
        'MAIL_PORT' => env('MAIL_PORT'),
        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
        'MAIL_USERNAME' => env('MAIL_USERNAME'),
        'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
    ],

    'CONFIGURATION' => [
        'APP_NAME' => env('APP_NAME'),
        'APP_SLOGUN' => env('App_SLOGUN')
    ],

    'ONESIGNAL' => [
        'ONESIGNAL_API_KEY' => env('ONESIGNAL_API_KEY'),
        'ONESIGNAL_REST_API_KEY' => env('ONESIGNAL_REST_API_KEY'),
        'ONESIGNAL_APP_ID_PROVIDER' => env('ONESIGNAL_APP_ID_PROVIDER'),
        'ONESIGNAL_REST_API_KEY_PROVIDER' => env('ONESIGNAL_REST_API_KEY_PROVIDER'),
    ],

    'MAIL_PLACEHOLDER' => [
        'MAIL_MAILER' => 'smtp',
        'MAIL_HOST' => 'smtp.gmail.com',
        'MAIL_PORT' => '587',
        'MAIL_ENCRYPTION' => 'tls',
        'MAIL_USERNAME' => 'youremail@gmail.com',
        'MAIL_PASSWORD' => 'Password',
        'MAIL_FROM_ADDRESS' => 'youremail@gmail.com',
        'MAIL_FROM_NAME' => env('APP_NAME')
    ],
    'SUBSCRIPTION_STATUS' =>[
        'PENDING' => 'pending',
        'ACTIVE' => 'active',
        'INACTIVE' => 'inactive',
    ],
    'GOOGLE_MAP_KEY' =>[
        'GOOGLE_MAP_KEY' => '',
    ],
    'POST_STATUS' =>[
        'REQUESTED' => 'requested',
        'CANCELLED' => 'cancelled',
    ],

];
