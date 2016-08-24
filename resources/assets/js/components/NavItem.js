var React             = require('react');
var NavActionCreators = require('../actions/NavActionCreators');
var BlogPageStore     = require('../stores/BlogPageStore');

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

            var navItemStyle = {
                    color: (this.state.hover) ? side_panel_style.nav_item_background : "#fff",
                    backgroundColor: (!this.state.hover) ? side_panel_style.nav_item_background : "#fff",
                };

            if(data.total) {
                return (
                        <li style={navItemStyle} className={this.props.category_class} onClick={this._onClick} 
                        onMouseOver={this._mouseOver} onMouseOut={this._mouseOut}>
                            <span className={this.props.text_class}>
                                {data.name} ( {data.total} )
                            </span>
                        </li>
                );
            }else{
                return (
                        <li style={navItemStyle} className={this.props.category_class} 
                        onMouseOver={this._mouseOver} onMouseOut={this._mouseOut}>
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