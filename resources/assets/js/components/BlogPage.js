var React         = require('react');
var Nav           = require('./Nav');
var BlogContainer = require('./BlogContainer');
var Content       = require('./Content');
var BlogPageStore = require('../stores/BlogPageStore');

var BlogPage = React.createClass({
    componentWillMount() {
        BlogPageStore.setUrlParams(this.props.params);
    },
    render() {
        return (
            <div>
                <Content/>
                <Nav/>
                <BlogContainer/>
            </div>
        );
    }
});

module.exports = BlogPage;