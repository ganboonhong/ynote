var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    receiveAll: function(url_params){
        AppDispatcher.dispatch({
            type:'init_blog',
            url_params: url_params,
        });
    },
    clickBlog: function(content){
        AppDispatcher.dispatch({
            type: 'clickBlog',
            content: content
        });
    },
}