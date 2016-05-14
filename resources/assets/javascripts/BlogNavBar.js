import $ from "jQuery";
import {Link} from 'react-router';

var React = require('react');

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
        return (
            <div>
                <Link to="/about">link to about</Link>
                {this.state.list.map(function(msg, i) {
                    return (
                        <div key={i}>
                            {msg.name} <br/>
                            {msg.updated_at} <hr/>
                        </div>
                    );
                })}
            </div>
        );
    }

});

module.exports = BlogPage;