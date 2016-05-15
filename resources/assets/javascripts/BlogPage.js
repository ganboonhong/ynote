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
                <div>
                    <div className="col-md-3 col-sm-2 col-xs-12 author">
                        <div className="category-wrapper">
                            <BlogNavBar />
                            <span className="socialShare"></span>
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