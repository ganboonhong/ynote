var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _blogs = [];
var _current_blog;

var BlogStore = assign({}, EventEmitter.prototype, {
    init: function(data){

        var pathArray = window.location.pathname.split('/');
        var id        = pathArray[2];

        $.getJSON(

            "/" + id + "/article/",

            { isBlogContent: true },

            function (data) {
                // _blogs = data;
                for(var key in data){
                    var obj = data[key];
                    _blogs[obj.category_id] = obj;
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

    getCurrentBlog: function(){
        return _current_blog;
    }

});

BlogStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_blog':
            BlogStore.init();
        break;

        case 'clickCategory':
        _current_blog = _blogs[action.categoryID];
        console.log(_blogs);
        // console.log(_blogs);
        // console.log(action.categoryID);
        console.log(_current_blog);

        BlogStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = BlogStore;
