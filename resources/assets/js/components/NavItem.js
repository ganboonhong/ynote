var React             = require('react');
var NavActionCreators = require('../actions/NavActionCreators');
var BlogPageStore     = require('../stores/BlogPageStore');
var classNames        = require('classnames');

var NavItem = React.createClass({
        getInitialState() {
            return {hover: false};
        },

        _mouseOver(e){
            this.setState({hover:true});
        },

        _mouseOut(e){
            this.setState({hover:false});
        },

        render() {
            var data = this.props.data;
            var side_panel_style = JSON.parse(this.props.user.side_panel_style);
            var category_class = classNames({
                'category finger': true, 
                'selected-category': (this.props.current_category == data.category_id)
            });

            var text_class = classNames({
                'category-name-selected': (this.props.current_category == data.category_id),
                'category-name': (this.props.current_category != data.category_id),
            });

            var navItemStyle = {
                    color: (this.state.hover) ? side_panel_style.nav_item_background : "#fff",
                    backgroundColor: (!this.state.hover) ? side_panel_style.nav_item_background : "#fff",
                };

            if(data.total) {
                return (
                        <li style={navItemStyle} className={category_class} onClick={this._onClick} 
                        onMouseOver={this._mouseOver} onMouseOut={this._mouseOut}>
                            <span className={text_class}>
                                {data.name} ( {data.total} )
                            </span>
                        </li>
                );
            }else{
                return (
                        <li style={navItemStyle} className={category_class} 
                        onMouseOver={this._mouseOver} onMouseOut={this._mouseOut}>
                            <span className={text_class}>
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