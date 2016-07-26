import $ from "jQuery";
var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var BaseStore     = require('../stores/BaseStore');
var CHANGE_EVENT  = 'change';
var _url_params   = _url_params;

var BlogPageStore = assign({}, BaseStore, {

    setUrlParams: function(url_params){
        _url_params = url_params;
    },

    getUrlParams: function(){
        return _url_params;
    },

    startLoading: function(){
        $('body').addClass('mask');
        $('.loading').show();
    },

    completeLoading: function(){
        var loadingInterval = setInterval(function(){
                                    if($('.list-item-container').length > 0){
                                        
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