import $ from "jQuery";
import {Link} from 'react-router';

var React         = require('react');
var Nav    = require('./Nav');
var BlogContainer = require('./BlogContainer');

var BlogPage = React.createClass({
    render() {
        return (
            <div>
                <Nav />
                <BlogContainer />
            </div>
        );
    }
});

module.exports = BlogPage;