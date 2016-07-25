var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {

    init_blog: function(){
        AppDispatcher.dispatch({
            type:'init_blog',
        });
    },
    
    clickBlog: function(content){
        AppDispatcher.dispatch({
            type: 'clickBlog',
            content: content
        });
    },
}