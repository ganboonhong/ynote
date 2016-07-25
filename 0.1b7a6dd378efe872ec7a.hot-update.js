webpackHotUpdate(0,{

/***/ 380:
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	var _jQuery = __webpack_require__(370);

	var _jQuery2 = _interopRequireDefault(_jQuery);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	var AppDispatcher = __webpack_require__(374);
	var EventEmitter = __webpack_require__(379).EventEmitter;
	var assign = __webpack_require__(7);
	var BaseStore = __webpack_require__(381);
	var CHANGE_EVENT = 'change';
	var _url_params = _url_params;

	var BlogPageStore = assign({}, BaseStore, {

	    setUrlParams: function setUrlParams(url_params) {
	        _url_params = url_params;
	    },

	    getUrlParams: function getUrlParams() {
	        return _url_params;
	    },

	    startLoading: function startLoading() {
	        (0, _jQuery2.default)('body').addClass('mask');
	        console.log('startLoading');
	        (0, _jQuery2.default)('.loading').show();
	    },

	    completeLoading: function completeLoading() {
	        (0, _jQuery2.default)('body').removeClass('mask');
	        (0, _jQuery2.default)('.loading').hide();
	    }

	});

	BlogPageStore.dispatchToken = AppDispatcher.register(function (action) {
	    switch (action.type) {

	        default:
	        // do nothing
	    }
	});

	module.exports = BlogPageStore;

/***/ },

/***/ 382:
/***/ function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function(module) {'use strict';

	var _index = __webpack_require__(3);

	var _index2 = _interopRequireDefault(_index);

	var _index3 = __webpack_require__(40);

	var _index4 = _interopRequireDefault(_index3);

	var _react2 = __webpack_require__(4);

	var _react3 = _interopRequireDefault(_react2);

	var _index5 = __webpack_require__(41);

	var _index6 = _interopRequireDefault(_index5);

	var _jQuery = __webpack_require__(370);

	var _jQuery2 = _interopRequireDefault(_jQuery);

	var _reactRouter = __webpack_require__(173);

	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

	var _components = {
	    _component: {}
	};

	var _UsersBoonhongYnoteNode_modulesReactTransformHmrLibIndexJs2 = (0, _index6.default)({
	    filename: '/Users/boonhong/ynote/resources/assets/js/components/BlogContainer.js',
	    components: _components,
	    locals: [module],
	    imports: [_react3.default]
	});

	var _UsersBoonhongYnoteNode_modulesReactTransformCatchErrorsLibIndexJs2 = (0, _index4.default)({
	    filename: '/Users/boonhong/ynote/resources/assets/js/components/BlogContainer.js',
	    components: _components,
	    locals: [],
	    imports: [_react3.default, _index2.default]
	});

	function _wrapComponent(id) {
	    return function (Component) {
	        return _UsersBoonhongYnoteNode_modulesReactTransformHmrLibIndexJs2(_UsersBoonhongYnoteNode_modulesReactTransformCatchErrorsLibIndexJs2(Component, id), id);
	    };
	}

	var React = __webpack_require__(4);
	var Blog = __webpack_require__(383);
	var BlogStore = __webpack_require__(386);
	var ContentStore = __webpack_require__(385);
	var BlogPageStore = __webpack_require__(380);
	var ClassNames = __webpack_require__(387);
	var BlogActionCreators = __webpack_require__(384);
	var Waypoint = __webpack_require__(388);
	var rowsToRetrive = 9;
	var retrivingData = false; // prevent retriving same record twice at the same time

	function getBlog(data) {
	    return React.createElement(Blog, {
	        data: data,
	        key: data.article_id
	    });
	}

	function getStateFromStores() {
	    return { list: BlogStore.getCurrentBlogs() };
	}

	/**
	 * Prevent duplicated key
	 * Returns a random number between min (inclusive) and max (exclusive)
	 */
	function getRandomArbitrary(min, max) {
	    return Math.random() * (max - min) + min;
	}

	var BlogContainer = _wrapComponent('_component')(React.createClass({
	    displayName: 'BlogContainer',
	    _loadMoreItems: function _loadMoreItems() {

	        var obj = this;
	        var url_params = BlogPageStore.getUrlParams();
	        var user_id = url_params.user_id;
	        var _current_category = BlogStore.getCurrentCategory();
	        var rowsToSkip = Object.keys(obj.state.list).length;

	        if (!retrivingData) {
	            retrivingData = true;
	            _jQuery2.default.getJSON("/" + user_id + "/article/", {
	                isBlogContent: true,
	                rowsToSkip: rowsToSkip,
	                rowsToRetrive: rowsToRetrive,
	                category_id: _current_category
	            }, function (data) {

	                for (var key in data) {
	                    data[key]['article_id'] = parseFloat(data[key]['article_id']) + getRandomArbitrary(1000, 999999999);
	                }

	                var current_data = obj.state.list;
	                var result = current_data.concat(data);

	                obj.setState({ list: result });
	                rowsToSkip = rowsToSkip + rowsToRetrive;
	                retrivingData = false;
	            });
	        }
	    },
	    getInitialState: function getInitialState() {
	        return {
	            list: []
	        };
	    },
	    componentWillMount: function componentWillMount() {
	        BlogActionCreators.init_blog();
	    },


	    componentDidMount: function componentDidMount() {
	        var obj = this;
	        var url_params = BlogPageStore.getUrlParams();
	        var user_id = url_params.user_id;

	        _jQuery2.default.getJSON("/" + user_id + "/article/", { isBlogContent: true }, function (data) {
	            obj.setState({ list: data });
	        });

	        BlogStore.addChangeListener(this._onChange);
	    },

	    componentWillUnmount: function componentWillUnmount() {
	        BlogStore.removeChangeListener(this._onChange);
	    },
	    _renderItems: function _renderItems() {
	        return this.state.list.map(getBlog);
	    },
	    _onLeaveHandler: function _onLeaveHandler() {
	        // console.log('on leave');
	    },
	    _renderWaypoint: function _renderWaypoint() {
	        var target = (0, _jQuery2.default)('.classss');
	        var topOffset = (0, _jQuery2.default)(document).height() * .2; // how far the scrollbar left the top

	        if (!this.state.isLoading) {
	            return React.createElement(Waypoint, {
	                onEnter: this._loadMoreItems,
	                onLeave: this._onLeaveHandler,
	                debug: false,
	                topOffset: topOffset + 'px'
	            });
	        }
	    },
	    render: function render() {
	        var myClass = ClassNames({
	            'col-md-9 col-sm-12 col-xs-12 list-wrapper': true
	        });

	        return React.createElement(
	            'div',
	            null,
	            React.createElement(
	                'div',
	                { className: myClass },
	                React.createElement(
	                    'div',
	                    null,
	                    this._renderItems()
	                )
	            ),
	            this._renderWaypoint()
	        );
	    },
	    _onChange: function _onChange() {
	        this.setState(getStateFromStores());
	    }
	}));

	module.exports = BlogContainer;
	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(2)(module)))

/***/ },

/***/ 386:
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	var AppDispatcher = __webpack_require__(374);
	var EventEmitter = __webpack_require__(379).EventEmitter;
	var assign = __webpack_require__(7);
	var CHANGE_EVENT = 'change';
	var BlogPageStore = __webpack_require__(380);
	var BlogActionCreators = __webpack_require__(384);
	var BaseStore = __webpack_require__(381);
	var _blogs = [];
	var _current_blogs = [];
	var rowsToRetrive = 9;
	var _current_category = 'all';

	var BlogStore = assign({}, BaseStore, {

	    init: function init() {
	        var url_params = BlogPageStore.getUrlParams();
	        var user_id = url_params.user_id;

	        $.getJSON("/" + user_id + "/article/", {
	            isBlogContent: true
	        }, function (data) {
	            for (var key in data) {
	                var obj = data[key];
	                _blogs[obj.article_id] = obj;
	            }

	            if (url_params.article_id && url_params.preview == 1) {
	                // pop up modal when loading page
	                _current_blogs = _blogs[url_params.article_id];
	                BlogActionCreators.clickBlog(_current_blogs.content);
	            }
	        });
	    },

	    getCurrentCategory: function getCurrentCategory() {
	        return _current_category;
	    },

	    getCurrentBlogs: function getCurrentBlogs() {
	        return _current_blogs;
	    },

	    updateCurrentBlogs: function updateCurrentBlogs(category_id) {
	        var url_params = BlogPageStore.getUrlParams();
	        var user_id = url_params.user_id;
	        BlogPageStore.startLoading();

	        $.ajax({
	            async: false,
	            url: "/" + user_id + "/article/",
	            data: {
	                isBlogContent: true,
	                rowsToRetrive: rowsToRetrive,
	                category_id: category_id
	            },
	            dataType: 'json',
	            success: function success(data) {

	                _blogs = [];
	                for (var key in data) {
	                    var obj = data[key];
	                    _blogs[obj.article_id] = obj;
	                }

	                BlogPageStore.completeLoading();

	                // setTimeout(function(){
	                //     BlogPageStore.completeLoading();
	                // }, 3000);
	            }
	        });
	    }

	});

	BlogStore.dispatchToken = AppDispatcher.register(function (action) {
	    switch (action.type) {

	        case 'init_blog':

	            BlogStore.init();
	            break;

	        case 'clickCategory':

	            var category_id = action.categoryID;
	            _current_category = category_id;

	            if (category_id == 'all') {
	                BlogStore.updateCurrentBlogs();
	            } else {
	                BlogStore.updateCurrentBlogs(category_id);
	            }

	            BlogStore.emitChange();
	            break;

	        default:
	        // do nothing
	    }
	});

	module.exports = BlogStore;

/***/ }

})