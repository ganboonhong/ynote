var React             = require('react');
var NavActionCreators = require('../actions/NavActionCreators');
var BlogPageStore     = require('../stores/BlogPageStore');

var NavItem = React.createClass({
        render() {
            var data = this.props.data;

            if(data.total) {
                return (
                        <li className={this.props.category_class} onClick={this._onClick} >
                            <span className={this.props.text_class}>
                                {data.name} ( {data.total} )
                            </span>
                        </li>
                );
            }else{
                return (
                        <li className={this.props.category_class} >
                            <span className={this.props.text_class}>
                                {data.name} ( {data.total} )
                            </span>
                        </li>
                );
            }
        },

        _onClick(){
            NavActionCreators.clickCategory(this.props.data.category_id);
        }
    });

module.exports = NavItem;