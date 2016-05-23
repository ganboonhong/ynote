var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _categories   = [];
var _user;

var NavStore = assign({}, EventEmitter.prototype, {
    init: function(data){

        var pathArray = window.location.pathname.split('/');
        var id        = pathArray[2];

        $.getJSON(

            "/" + id + "/article/",

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
        NavStore.init();
        NavStore.emitChange();
        break;

        case 'clickCategory':
        console.log(_categories[action.categoryID]);
        NavStore.emitChange();
        break;
        default:
            // do nothing
    }
});

module.exports = NavStore;