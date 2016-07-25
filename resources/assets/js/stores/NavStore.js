var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _categories   = [];
var _current_category;
var _user;
var BlogPageStore = require('../stores/BlogPageStore');
var BaseStore     = require('../stores/BaseStore');

var NavStore = assign({}, BaseStore, {
    init: function(){

        var url_params = BlogPageStore.getUrlParams();
        var user_id    = url_params.user_id;

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

    getCurrentCategory: function(){
        return _current_category;
    }

});

NavStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_category':
            NavStore.init();
        break;

        case 'clickCategory':
            _current_category = action.categoryID;
            NavStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = NavStore;