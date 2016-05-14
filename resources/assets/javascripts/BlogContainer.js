import $ from "jQuery";
import {Link} from 'react-router';

var React = require('react');

var BlogContainer = React.createClass({

    getInitialState() {
        return {
            list: []
        };
    },
    componentDidMount: function() {
       var obj = this;
        $.getJSON("admin/article/", function (data) {
          obj.setState({list: data});
        });
    },


    render() {
        return (
            <div>
                {this.state.list.map(function(msg, i) {
                    return (
                        <div key={i}>
                            {msg.title} <br/>
                            {msg.updated_at} <hr/>
                        </div>
                    );
                })}
            </div>
        );
    }

});

module.exports = BlogContainer;