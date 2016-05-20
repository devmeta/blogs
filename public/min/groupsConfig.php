<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/

return array(
    'js.plain' => array(
        '//assets/js/jquery-2.1.4.min.js',
        '//assets/js/bootstrap.min.js'        
    ),
    'css.plain' => array(
        '//assets/css/bootstrap.min.css', 
        '//assets/css/typicons/font/typicons.min.css', 
        '//assets/css/theme.css',
        '//assets/css/slick.css',
        //'//assets/css/roboto.css',
        '//assets/css/gibson.css',
        '//assets/css/circle-tiles.css'
    ),
    'js.default' => array(
        '//assets/js/jquery-1.11.2.min.js',
        '//assets/js/bootstrap.js',
        '//assets/js/jquery.waypoints.min.js',
        '//assets/js/modernizr.js',
        '//assets/js/rubick_pres.js',
        '//assets/js/jquery.sharrre.js',
        '//assets/js/desktop.jquery.js',
        '//assets/js/typed.js',
        '//assets/js/common.js',
    ),
    'css.default' => array(
        '//assets/css/bootstrap.css', 
        '//assets/css/typicons/font/typicons.min.css', 
        //'//assets/css/slick.css',
        '//assets/css/rubick.css',
        '//assets/css/gibson.css',
        '//assets/css/typed.css',


        //'//assets/css/roboto.css',
        //'//assets/css/circle-tiles.css'
        //'//assets/css/foam.css'
    ),
    'js.account' => array(
        '//assets/js/jquery-2.1.4.min.js',
        '//assets/js/jquery-ui-1.10.4.custom.min.js',
        '//assets/js/bootstrap.min.js',
        '//assets/js/summernote.min.js',
        '//assets/js/dropzone.js',
        '//assets/js/typed.js',
        '//assets/js/common.js',        
        '//assets/js/account/app.js'
    ),
    'css.account' => array(
        '//assets/css/bootstrap.min.css', 
        '//assets/css/font-awesome.min.css', 
        '//assets/css/typicons/font/typicons.min.css', 
        '//assets/css/summernote.css', 
        '//assets/css/dropzone.css', 
        //'//assets/css/roboto.css',
        //'//assets/css/source-sans-pro.css',
        '//assets/css/gibson.css',
        '//assets/css/typed.css',
        '//assets/css/theme.css',
        '//assets/css/account.css'
    )
);
