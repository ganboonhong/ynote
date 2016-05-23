import $ from "jQuery";
import {Link} from 'react-router';

var React = require('react');
var Blog = require('./Blog');

function getBlog(data){
    return(
        <Blog 
            data={data}
            key={data.article_id}
        />
    )
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
    },
    render() {
        var blog = this.state.list.map(getBlog);        
            return (
                <div className="col-md-9 col-sm-12 col-xs-12 list-wrapper">
                    {blog}
                </div>
            );       
    }

});

module.exports = BlogContainer;