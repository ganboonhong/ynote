var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    receiveAll: function(){
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