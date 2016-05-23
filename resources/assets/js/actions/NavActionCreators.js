var AppDispatcher = require('../dispatcher/AppDispatcher');

module.exports = {
    clickNavItem: function(categoryID){
        AppDispatcher.dispatch({
            type: 'category',
            categoryID: categoryID
        });
    },
    receiveAll: function(categories){
        console.log("NavActionCreators");
        AppDispatcher.dispatch({
            type: 'init_category',
            categories: categories
        });
    }
};