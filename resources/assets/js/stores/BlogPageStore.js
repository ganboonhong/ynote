var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _url_params   = _url_params;

var BlogPageStore = assign({}, EventEmitter.prototype, {

    emitChange: function(){
        this.emit(CHANGE_EVENT);
    },

    addChangeListener: function(callback){
        this.on(CHANGE_EVENT, callback);
    },

    setUrlParams: function(url_params){
        _url_params = url_params;
    },

    getUrlParams: function(){
        return _url_params;
    }
    
});

BlogPageStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        default:
            // do nothing
    }
});

module.exports = BlogPageStore;