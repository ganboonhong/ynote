var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    clickCategory: function(categoryID){
        AppDispatcher.dispatch({
            type: 'clickCategory',
            categoryID: categoryID
        });
    },
    receiveAll: function(categories){
        AppDispatcher.dispatch({
            type: 'init_category',
            categories: categories
        });
    },

};