var React         = require('react');
var Nav           = require('./Nav');
var BlogContainer = require('./BlogContainer');
var Content       = require('./Content');

var BlogPage = React.createClass({
    render() {
        return (
            <div>
                <Content/>
                <Nav />
                <BlogContainer />
            </div>
        );
    }
});

module.exports = BlogPage;