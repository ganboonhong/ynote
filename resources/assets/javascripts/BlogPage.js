import $ from "jQuery";
import {Link} from 'react-router';

var React         = require('react');
var BlogNavBar    = require('./BlogNavBar');
var BlogContainer = require('./BlogContainer');
var Star          = require("./Star");

var BlogPage = React.createClass({

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
                哈囉!

                    <div class="">
                    <div class="col-md-3 col-sm-2 col-xs-12 author">
                        <div class="category-wrapper">
                            <BlogNavBar />
                            <span class="socialShare"></span>

                        </div>
                    </div>

                </div>


                <Star />
                <BlogContainer />

                <Link to="/about">link to about</Link>
                <div>
                    <Link to="/blog_nav_bar">nav bar</Link>
                </div>
            </div>
        );
    }

});

module.exports = BlogPage;