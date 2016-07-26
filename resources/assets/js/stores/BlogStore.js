var AppDispatcher      = require('../dispatcher/AppDispatcher');
var EventEmitter       = require('events').EventEmitter;
var assign             = require('object-assign');
var CHANGE_EVENT       = 'change';
var BlogPageStore      = require('../stores/BlogPageStore');
var BlogActionCreators = require('../actions/BlogActionCreators');
var BaseStore          = require('../stores/BaseStore');
var _blogs             = [];
var _current_blogs     = [];
var rowsToRetrive      = 9;
var _current_category  = 'all';


var BlogStore = assign({}, BaseStore, {

    init: function(){
        var url_params = BlogPageStore.getUrlParams();
        var user_id    = url_params.user_id;

        $.getJSON(

            "/" + user_id + "/article/",

            { 
                isBlogContent: true 
            },

            function (data) {
                for(var key in data){
                    var obj = data[key];
                    _blogs[obj.article_id] = obj;
                }

                if(url_params.article_id && url_params.preview == 1 ){
                    // pop up modal when loading page
                    _current_blogs = _blogs[url_params.article_id];
                    BlogActionCreators.clickBlog(_current_blogs.content);
                }

            }
        );
    },

    getCurrentCategory: function(){
        return _current_category;
    },

    getCurrentBlogs: function(){
        return _current_blogs;
    },

    updateCurrentBlogs: function(category_id){
        var url_params = BlogPageStore.getUrlParams();
        var user_id    = url_params.user_id;
        BlogPageStore.startLoading();

        $.ajax({
            async: false,
            url:   "/" + user_id + "/article/",
            data:  { 
                isBlogContent: true,
                rowsToRetrive: rowsToRetrive,
                category_id:   category_id,
            },
            dataType: 'json',
            success: function(data){

                _blogs = [];
                for(var key in data){
                    var obj = data[key];
                    _blogs[obj.article_id] = obj;
                }

                BlogPageStore.completeLoading();
            }
        });

    },

});

BlogStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_blog':

            BlogStore.init();
            break;

        case 'clickCategory':

            var category_id   = action.categoryID;
            _current_category = category_id;

            if( category_id == 'all'){
                BlogStore.updateCurrentBlogs();
            }else{
                BlogStore.updateCurrentBlogs(category_id);
            }

            BlogStore.emitChange();
            break;

        default:
            // do nothing
    }
});

module.exports = BlogStore;