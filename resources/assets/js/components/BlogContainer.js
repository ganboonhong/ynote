import $ from "jQuery";
import {Link} from 'react-router';

var React     = require('react');
var Blog      = require('./Blog');
var BlogStore = require('../stores/BlogStore');

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
            list: []
        };
    },
    componentDidMount: function() {
        var obj       = this;
        var pathArray = window.location.pathname.split('/');
        var id        = pathArray[2];

        $.getJSON(
            "/"+id+"/article/", 

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
            return (
                <div className="col-md-9 col-sm-12 col-xs-12 list-wrapper">
                    {blog}
                </div>
            );       
    },

    _onChange(){
        this.setState(getStateFromStores());
    }

});

module.exports = BlogContainer;