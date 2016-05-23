var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _categories;
var _user;

var NavStore = assign({}, EventEmitter.prototype, {
    init: function(data){
        
    },

    emitChange: function(){
        this.emit(CHANGE_EVENT);
    },

    addChangeListener: function(callback){
        this.on(CHANGE_EVENT, callback);
    },

    getNavs: function(){
        return _categories;
    },

    getUser: function(){
        return _user;
    },

});

NavStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_category':
        NavStore.init(action.categories);
        NavStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = NavStore;