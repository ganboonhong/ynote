import $ from "jQuery";
import {Link} from 'react-router';

var React = require('react');
var BlogNavBarItem = require('./BlogNavBarItem');

function getBlogNavBarItem(message){
    return(
        <BlogNavBarItem
            message={message}
            key={message.category_id}
        />
    )
}

var BlogPage = React.createClass({

    getInitialState() {
        return {
            list: []
        };
    },
    componentDidMount: function() {
       var obj = this;
        $.getJSON("admin/category/", function (data) {
          obj.setState({list: data});
        });
    },
    render() {
        var blogNavBarItem = this.state.list.map(getBlogNavBarItem);
        return (
            <div class="col-md-3 col-sm-2 col-xs-12 author">
                <Link to="/about">link to about</Link>                    
                    <div>
                        <ul style={{paddingLeft: 0}}>
                                {blogNavBarItem}
                        </ul>
                    </div>
            </div>
        );
    }

});

module.exports = BlogPage;