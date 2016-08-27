import $ from "jQuery";
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var BaseStore     = require('../stores/BaseStore');
var CHANGE_EVENT  = 'change';
var _url_params   = _url_params;
var original_background_color;

var BlogPageStore = assign({}, BaseStore, {

    setUrlParams: function(url_params){
        _url_params = url_params;
    },

    getUrlParams: function(){
        return _url_params;
    },

    startLoading: function(){
        original_background_color = $('body').css('background-color');
        $('body').css('background-color', 'black')
        $('body').addClass('mask');
        $('.loading').show();
    },

    completeLoading: function(){
        var loadingInterval = setInterval(function(){
                                    if($('.list-item-container').length > 0){
                                        $('body').css('background-color', original_background_color);
                                        $('body').removeClass('mask');
                                        $('.loading').hide();
                                        clearInterval(loadingInterval);
                                    }
                                }, 500);
    }
    
});

BlogPageStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        default:
            // do nothing
    }
});

module.exports = BlogPageStore;