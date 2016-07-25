var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var BaseStore     = require('../stores/BaseStore');
var CHANGE_EVENT  = 'change';
var contentObj      = {};

var ContentStore = assign({}, BaseStore, {

    getContent: function(){
        return contentObj;
    },
    
});

ContentStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'clickBlog':
            contentObj.content = action.content;
            ContentStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = ContentStore;