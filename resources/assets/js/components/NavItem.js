var React = require('react');
var NavActionCreators = require('../actions/NavActionCreators');

var NavItem = React.createClass({
        render() {
            var data = this.props.data;
            return (
                <a>
                    <li className="category" onClick={this._onClick} >
                        <span>
                            {data.name} ( {data.total} )
                        </span>
                    </li>
                </a>
            );
        },

        _onClick(){
            NavActionCreators.clickCategory(this.props.data.category_id);
        }
    });

module.exports = NavItem;