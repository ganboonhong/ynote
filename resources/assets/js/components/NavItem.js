var React = require('react');

var NavItem = React.createClass({
        render() {
            var data = this.props.data;
            return (
                <a href={'/' + data.user_id + '/article-category/' + data.category_id}>
                    <li className="category">
                        <span>
                            {data.name} ( {data.total} )
                        </span>
                    </li>
                </a>
            );
        }
    });

module.exports = NavItem;