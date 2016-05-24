var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    clickCategory: function(categoryID){
        AppDispatcher.dispatch({
            type: 'clickCategory',
            categoryID: categoryID
        });
    },
    receiveAll: function(){
        AppDispatcher.dispatch({
            type: 'init_category'
        });
    },

};