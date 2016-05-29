var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var _blogs = [];
var _current_blogs = [];

var BlogStore = assign({}, EventEmitter.prototype, {
    init: function(data){

        var user_id  = getParameterByName('user_id');

        $.getJSON(

            "/" + user_id + "/article/",

            { isBlogContent: true },

            function (data) {
                for(var key in data){
                    var obj = data[key];
                    _blogs[obj.article_id] = obj;
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

    getCurrentBlogs: function(){
        return _current_blogs;
    }

});

BlogStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_blog':
            BlogStore.init();
        break;

        case 'clickCategory':
        var category_id = action.categoryID;
        _current_blogs  = []; // clear previous blogs

        if( category_id == 'all'){
            _current_blogs = _blogs;
        }else{
            for(var key in _blogs){
                var temp = _blogs[key];
                if( category_id == temp.category_id ){
                    _current_blogs[key] = temp;
                }
            }
        }

        BlogStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = BlogStore;