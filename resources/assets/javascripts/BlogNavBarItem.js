var React = require('react');

var BlogNavBarItem = React.createClass({
        render() {
            var message = this.props.message;
            return (
                <a href={'/' + message.user_id + '/article-category/' + message.category_id}>
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