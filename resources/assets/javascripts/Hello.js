import $ from "jQuery";

var React = require('react');

var Star = require("./Star");

var Hello = React.createClass({

    getInitialState() {
        return {
            list: []
        };
    },
    componentDidMount: function() {
       var obj = this;
       var test = '';
        this.reqHandle = $.getJSON("http://y-note.local/admin/article/", function (data) {
            console.log(data);
          obj.setState({list: data});
        });
    },


    render() {
        console.warn("我在 home!");
        return (
            <div>
                哈囉!
                <Star />
                <a href="/#/about">link to about</a>
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

module.exports = Hello;