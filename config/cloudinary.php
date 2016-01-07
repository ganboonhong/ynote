<?php

return [
	
	/*
    |--------------------------------------------------------------------
    | Cloudinary Config
    |--------------------------------------------------------------------
    |
    | Modify this config file to match your cloudinary.com credentials.
    | 
    */
   
	'cloudName'  => env('CLOUDINARY_CLOUD_NAME'),
	'apiKey'     => env('CLOUDINARY_API_KEY'),
    'apiSecret'  => env('CLOUDINARY_API_SECRET'),
    'baseUrl'    => env('CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
    'secureUrl'  => env('CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME')),
    'apiBaseUrl' => env('CLOUDINARY_API_BASE_URL', 'https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME')),
    
    /*
    |--------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------
    |
    | You may make multiple options. Just copy the 'default' array and
    | then specify the name and the options.
    | Please refer to the options format.
    | 
    */

    'default' => 'h_100,w_100',

    /*
    |--------------------------------------------------------------------
    | Options Format
    |--------------------------------------------------------------------
    | Refer to http://cloudinary.com/documentation/image_transformations 
    |
    | w_{pixel}     = Width             example     w_200 
    | h_{pixel}     = Height            example     h_200
    | c_{type}      = Crop type         example     c_fill
    | r_{pixel}     = Corner radius     example     r_20
    | x_{pixel}     = x coordinate      example     x_100
    | y_{pixel}     = y coordinate      example     y_100
    | g_face        = Face detection    example     g_face or g_faces
    | 
    | 
    */
];