var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {

    clickCategory: function(categoryID){
        AppDispatcher.dispatch({
            type: 'clickCategory',
            categoryID: categoryID
        });
    },
    
    receiveAll: function(url_params){
        AppDispatcher.dispatch({
            type: 'init_category',
            url_params: url_params
        });
    },

};