var NavActionCreators = require('../actions/NavActionCreators');

module.exports = {
    init: function(){
        NavActionCreators.receiveAll();
    }
}