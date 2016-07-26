import $ from "jQuery";
import {Link} from 'react-router';

var React              = require('react');
var Blog               = require('./Blog');
var BlogStore          = require('../stores/BlogStore');
var ContentStore       = require('../stores/ContentStore');
var BlogPageStore      = require('../stores/BlogPageStore');
var ClassNames         = require('classnames');
var BlogActionCreators = require('../actions/BlogActionCreators')
var Waypoint           = require('react-waypoint');
var rowsToRetrive      = 7;
var retrivingData      = false; // prevent retriving same record twice at the same time

function getBlog(data){
    return(
        <Blog 
            data={data}
            key={data.article_id}
        />
    )
}

function getStateFromStores(){
    return {list: BlogStore.getCurrentBlogs()};
}

/**
 * Prevent duplicated key
 * Returns a random number between min (inclusive) and max (exclusive)
 */
function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}

var BlogContainer = React.createClass({

    _loadMoreItems(){

        var obj               = this;
        var url_params        = BlogPageStore.getUrlParams();
        var user_id           = url_params.user_id;
        var _current_category = BlogStore.getCurrentCategory();
        var rowsToSkip        = Object.keys(obj.state.list).length;

        if (!retrivingData) {
            retrivingData = true;
            $.getJSON(

                "/" + user_id + "/article/", 

                {   
                    isBlogContent: true,
                    rowsToSkip:    rowsToSkip,
                    rowsToRetrive: rowsToRetrive,
                    category_id:   _current_category,
                },

                function (data) {

                    for(var key in data){
                        data[key]['article_id'] = parseFloat(data[key]['article_id']) + getRandomArbitrary(1000, 999999999);
                    }

                    var current_data = obj.state.list;
                    var result = current_data.concat(data);

                    obj.setState({list: result});
                    rowsToSkip  = rowsToSkip + rowsToRetrive;
                    retrivingData = false;
                }
            );
        }
    },

    getInitialState() {
        return {
            list: [],
        };
    },

    componentWillMount() {
        BlogActionCreators.init_blog();
    },

    componentDidMount: function() {
        var obj        = this;
        var url_params = BlogPageStore.getUrlParams();
        var user_id    = url_params.user_id;

        BlogPageStore.startLoading();

        $.getJSON(
            "/" + user_id + "/article/", 

            {isBlogContent: true},

            function (data) {
                obj.setState({list: data});
            }
        );

        BlogPageStore.completeLoading();
        
        BlogStore.addChangeListener(this._onChange);
    },

    componentWillUnmount() {
        BlogStore.removeChangeListener(this._onChange);  
    },

    componentDidUpdate(){
        // console.log('componentDidUpdate');
    },

    _renderItems(){
        return this.state.list.map(getBlog);
    },

    _onLeaveHandler(){
        // console.log('on leave');
    },

    _renderWaypoint(){
        var target    = $('.classss');
        var topOffset = $(document).height()*.2;    // how far the scrollbar left the top

        if(!this.state.isLoading){
            return (
                <Waypoint
                    onEnter={this._loadMoreItems}
                    onLeave={this._onLeaveHandler}
                    debug={false}
                    topOffset={topOffset+'px'}
                />
            )
        }
    },

    render() { 
        var myClass = ClassNames({
            'col-md-9 col-sm-12 col-xs-12 list-wrapper': true,
        });

        return (

            <div>
                <div className={myClass} >
                  <div>
                    {this._renderItems()}
                  </div>
                </div>
                {this._renderWaypoint()}
            </div>

        );       
    },

    _onChange(){
        this.setState(getStateFromStores());
    },

});

module.exports = BlogContainer;