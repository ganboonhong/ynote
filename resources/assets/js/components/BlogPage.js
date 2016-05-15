import $ from "jQuery";
import {Link} from 'react-router';

var React         = require('react');
var BlogNavBar    = require('./BlogNavBar');
var BlogContainer = require('./BlogContainer');

var BlogPage = React.createClass({
    render() {
        return (
            <div>
                <BlogNavBar />
                <BlogContainer />
                <Link to="/about">link to about</Link>
                <Link to="/blog_nav_bar">nav bar</Link>
            </div>
        );
    }
});

module.exports = BlogPage;