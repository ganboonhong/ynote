import {Link} from 'react-router';
var React = require("react");
var About = React.createClass({
    render: function(){
        return (
            <div>
                About me
                <Link to="/">Blog</Link>
            </div>
        );
    }
});

module.exports = About;