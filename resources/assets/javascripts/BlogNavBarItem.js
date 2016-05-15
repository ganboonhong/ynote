var React = require('react');

var BlogNavBarItem = React.createClass({
        render() {
            var message = this.props.message;
            return (
                <a >
                    <li className="category">
                            <span>
                                {message.name}
                            </span>
                    </li>
                </a>
            );
        }
    });

module.exports = BlogNavBarItem;