var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _categories   = [];
var current_category;
var _user;

var NavStore = assign({}, EventEmitter.prototype, {
    init: function(url_params){

        var user_id  = url_params.user_id;

        $.getJSON(

            "/" + user_id + "/article/",

            { isNavBar: true },

            function (data) {

                for(var key in data.categories){
                    var obj = data.categories[key];
                    _categories[obj.category_id] = obj;
                }
            }
        );
    },

    emitChange: function(){
        this.emit(CHANGE_EVENT);
    },

    addChangeListener: function(callback){
        this.on(CHANGE_EVENT, callback);
    },

    getCurrentCategory: function(){
        return current_category;
    }

});

NavStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_category':
        NavStore.init(action.url_params);
        // NavStore.emitChange();
        break;

        // case 'clickCategory':
        // current_category = _categories[action.categoryID];
        // NavStore.emitChange();
        // break;

        default:
            // do nothing
    }
});

module.exports = NavStore;