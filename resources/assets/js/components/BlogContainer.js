import $ from "jQuery";
import {Link} from 'react-router';

var React        = require('react');
var Blog         = require('./Blog');
var BlogStore    = require('../stores/BlogStore');
var ContentStore = require('../stores/ContentStore');
var ClassNames   = require('classnames');

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

var BlogContainer = React.createClass({

    getInitialState() {
        return {
            list: [],
            prevent_scroll: false,
        };
    },
    componentDidMount: function() {
        var obj     = this;
        var user_id = getParameterByName('user_id');

        $.getJSON(
            "/" + user_id + "/article/", 

            {isBlogContent: true},

            function (data) {
                obj.setState({list: data});
            }
        );
        
        BlogStore.addChangeListener(this._onChange);
    },

    componentWillUnmount() {
        BlogStore.removeChangeListener(this._onChange);  
    },

    render() {
        var blog = this.state.list.map(getBlog);        
        var prevent_scroll = ClassNames({
            'prevent-scroll': this.state.prevent_scroll,
            'col-md-9 col-sm-12 col-xs-12 list-wrapper': true,
        });
            return (
                <div className={prevent_scroll}>
                    {blog}
                </div>
            );       
    },

    _onChange(){
        this.setState(getStateFromStores());
    },

});

module.exports = BlogContainer;