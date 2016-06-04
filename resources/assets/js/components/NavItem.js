var React              = require('react');
var NavActionCreators = require('../actions/NavActionCreators');

var NavItem = React.createClass({
        render() {
            var data = this.props.data;
            return (
                    <li className={this.props.category_class} onClick={this._onClick} >
                        <span className={this.props.text_class}>
                            {data.name} ( {data.total} )
                        </span>
                    </li>
            );
        },

        _onClick(){
            NavActionCreators.clickCategory(this.props.data.category_id);
        }
    });

module.exports = NavItem;