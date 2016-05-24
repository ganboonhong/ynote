var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    receiveAll: function(){
        AppDispatcher.dispatch({
            type:'init_blog',
        });
    },
    clickCategory: function(categoryID){
        AppDispatcher.dispatch({
            type: 'clickCategory',
            categoryID: categoryID
        });
    },
}