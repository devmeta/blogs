/*!
 * Desktop js v0.3 (http://devmeta.net)
 * Copyright 2011-2015 Devemta, Inc.
 * Licensed under GNU GENERAL PUBLIC LICENSE
 */
var timer = 0;
var sleeptimer = 0;
var Desktop = {};

$(document).on('display','body',function(){
  Desktop.app.updateAll();
});  

$(document).on('click','a:not([href=#])',function(e){   
    Desktop.avoidscroll = 0;

    if($(this).data('external')){
        return true;
    }

    if($(this).data('avoidscroll') != undefined){
        Desktop.avoidscroll = 1;
    }

    if($(this).data('close-modal')){
        BootstrapDialog.closeAll();
    }

    if($(this).attr('href')=="#" || $(this).data('toggle')!=null || $(this).data('toggle')=="link"){
        location.search = $(this).data('link');
        return false;
    }

    if($(this).attr('href')=="#" || $(this).data('toggle')!=null || $(this).data('toggle')=="tab" || $(this).data('toggle')=="lightbox" || $(this).parent().hasClass('selector')){
        return false;
    }
    
    if($(this).attr("target")=="_blank"||$(this).data('external')){
        return true;
    }
    
    e.preventDefault();
    Desktop.link(this,e);
    return false;
});

window.onpopstate = function(event) {
    Desktop.load(location.pathname);
}; 

(function($){

    Desktop = {
        cache : [],
        currentslide : "",
        avoidscroll : 0,
        defaults : {
            startpage : "/",
            loaderbar : true,
            transition : "fade"
        },
        app : {
            updateAll : function(){
                Desktop.app.cleanAll();
                Desktop.app.updateCurrent();
            },
            updateCurrent : function(){
                var arr = location.pathname.split('/');
                arr = $.grep(arr, function(n){ return (n); });
                var callback = arr.length ? arr.join('_'):'landing';

                if(Desktop.options.controllers[callback] != undefined){
                    Desktop.currentslide = callback;
                    Desktop.options.controllers[callback].init();
                }
            },
            cleanAll : function(){
                var arr = location.pathname.split('/');
                arr = $.grep(arr, function(n){ return (n); });
                if(Desktop.currentslide && Desktop.currentslide != arr[0] && typeof Desktop.options.controllers[Desktop.currentslide].clean == 'function'){
                    return Desktop.options.controllers[Desktop.currentslide].clean();
                }
            }
        },
        init : function(options){
            Desktop.options  = $.extend(true, {}, Desktop.defaults, options);
            Desktop.app.updateCurrent();
        },
        nav : function(url){

            var arr = location.pathname.split('/');
            arr = $.grep(arr, function(n){ return (n); });
            var callback = arr.length ? arr.join('_'):'landing';

            $('body').removeClass().addClass(arr[0]?arr[0]:callback);
            $("a").removeClass("active");  

            if($('a[href="'+url+'"]').length){
                $('a[href="'+url+'"]').addClass("active");
            }
        },
        link : function(a,e){

            if($(a).attr("target")=="_blank"||$(a).attr('href').indexOf('javascript')!=-1||$(a).data('external')){
                return true;
            }

            var href = $(a).attr("href").replace(location.origin,'');
            var container = $(a).data("target")||".wrapper";

            Desktop.load(href,container);
            history.pushState('', 'New URL: '+href, href);

            e.preventDefault();

            return false;
        },
        load : function(url,container){

            var arr = url.split('?');
            var url = $.inArray(arr[0],["/",""])>-1 ? Desktop.options.startpage : arr[0] ;
            var search="";

            if(arr[1] && arr[1].length) search = arr[1];
            if(url.substr(0,1)!='/') url = '/'+url;
        
            $('body')
                .removeClass()
                .addClass("loading");
                
            $('.tooltip').remove();

            if( container == undefined || ! $(container).length){
                container = ".wrapper";
            }

            $.ajax({
                type:       "get",
                cache:      false, 
                url:        url,
                async:      true, 
                data:       search,
            }).done(function(json){

                if(json.redirect){
                    return location.href = json.redirect;
                }
                
                $('body').removeClass("loading");

                $container.html(json);

                $('body').trigger("display");

                Desktop.nav(url);

                if(Desktop.options.transition == 'fade'){
                }

                if( ! Desktop.avoidscroll ){
                    $('body,html').animate({scrollTop: 0}, 100);
                }
            }).error(function(response) {
                eval(response.responseText);
                $('body').removeClass("loading");
            });
        }
    };

    $.fn.desktop = function( method,b ) {
        $container = $(this);
        if ( Desktop[method] ) {
            return Desktop[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return Desktop.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.Desktop!' );
        }    
    };        
}(jQuery));
