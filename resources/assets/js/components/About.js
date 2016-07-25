import {Link} from 'react-router';
var React = require("react");
var About = React.createClass({
    render: function(){
        return (
            <div>
                About mexx
                <Link to="/">{this.props.params.aboutName}</Link>
            </div>
        );
    }
});

module.exports = About;