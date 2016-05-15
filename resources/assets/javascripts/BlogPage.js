import $ from "jQuery";
import {Link} from 'react-router';

var React         = require('react');
var BlogNavBar    = require('./BlogNavBar');
var BlogContainer = require('./BlogContainer');
var Star          = require("./Star");

var BlogPage = React.createClass({
    render() {
        return (
            <div>
                <BlogNavBar />
                <Star />
                <BlogContainer />
                <Link to="/about">link to about</Link>
                <Link to="/blog_nav_bar">nav bar</Link>
            </div>
        );
    }

});

module.exports = BlogPage;