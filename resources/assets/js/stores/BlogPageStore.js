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
        console.log('startLoading');
        $('.loading').show();
    },

    completeLoading: function(){
        $('body').removeClass('mask');
        $('.loading').hide();
    }
    
});

BlogPageStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        default:
            // do nothing
    }
});

module.exports = BlogPageStore;