var React         = require('react');
var Nav           = require('./Nav');
var BlogContainer = require('./BlogContainer');
var Content       = require('./Content');

var BlogPage = React.createClass({
    render() {
        return (
            <div>
                <Content url_params={this.props.params}/>
                <Nav url_params={this.props.params}/>
                <BlogContainer url_params={this.props.params}/>
            </div>
        );
    }
});

module.exports = BlogPage;