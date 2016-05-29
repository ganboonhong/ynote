import $ from "jQuery";
import {Link} from 'react-router';

var React              = require('react');
var Blog               = require('./Blog');
var BlogStore          = require('../stores/BlogStore');
var ContentStore       = require('../stores/ContentStore');
var BlogPageStore      = require('../stores/BlogPageStore');
var ClassNames         = require('classnames');
var BlogActionCreators = require('../actions/BlogActionCreators')

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
        };
    },

    componentWillMount() {
        BlogActionCreators.init_blog();
    },

    componentDidMount: function() {
        var obj        = this;
        var url_params = BlogPageStore.getUrlParams();
        var user_id    = url_params.user_id;

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
        var myClass = ClassNames({
            'col-md-9 col-sm-12 col-xs-12 list-wrapper': true,
        });
            return (
                <div className={myClass}>
                    {blog}
                </div>
            );       
    },

    _onChange(){
        this.setState(getStateFromStores());
    },

});

module.exports = BlogContainer;