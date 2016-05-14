var React = require('react');

var BlogNavBarItem = React.createClass({
        render() {
            var message = this.props.message;
            return (
                <a>
                    <li className="category">
                            <span className="">
                                {message.name}
                            </span>
                    </li>
                </a>
            );
        }
    });

module.exports = BlogNavBarItem;