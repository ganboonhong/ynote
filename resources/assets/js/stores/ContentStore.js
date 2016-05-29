var AppDispatcher = require('../dispatcher/AppDispatcher');
var EventEmitter  = require('events').EventEmitter;
var assign        = require('object-assign');
var CHANGE_EVENT  = 'change';
var contentObj      = {};

var ContentStore = assign({}, EventEmitter.prototype, {
    init: function(data){

    },

    emitChange: function(){
        this.emit(CHANGE_EVENT);
    },

    addChangeListener: function(callback){
        this.on(CHANGE_EVENT, callback);
    },

    getContent: function(){
        return contentObj;
    },
    
});

ContentStore.dispatchToken = AppDispatcher.register(function(action){
    switch(action.type){

        case 'init_blog':
            ContentStore.init();
        break;

        case 'clickBlog':
            contentObj.content = action.content;
            ContentStore.emitChange();
        break;

        default:
            // do nothing
    }
});

module.exports = ContentStore;