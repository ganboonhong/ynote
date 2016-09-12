import $ from "jQuery";
import {Link} from 'react-router';

var React             = require('react');
var NavItem           = require('./NavItem');
var NavStore          = require('../stores/NavStore');
var BlogPageStore     = require('../stores/BlogPageStore');
var NavActionCreator  = require('../actions/NavActionCreators');
var NavActionCreators = require('../actions/NavActionCreators');
var classNames        = require('classnames');

function getCurrentCategory(){
    return NavStore.getCurrentCategory();
}

var Nav = React.createClass({

    getInitialState() {
        return {
            list:  [],
            user:  [],
            current_category: 'all',
            hover: false,
        };
    },

    _mouseOver(e){
        this.setState({hover:true});
    },

    _mouseOut(e){
        this.setState({hover:false});
    },

    componentWillMount() {
        NavActionCreator.init_category();
    },

    componentDidMount: function() {
        var data = this.props.navData;

        this.setState({ 
                        list: data.categories, 
                        user: data.user
                    });

        NavStore.addChangeListener(this._onChange);

    },

    render() {
        var current_category   = this.state.current_category;
        var user               = this.state.user;
        var navItemStyle       = {};
        var navBarStyle        = {};
        var all_category_class = classNames({
            'finger category': true,
            'selected-category': (current_category == 'all')
        });

        if( user.side_panel_style != undefined ){

            var side_panel_style = JSON.parse(user.side_panel_style);

            navItemStyle = {
                color: (this.state.hover) ? side_panel_style.nav_item_background : "#fff",
                backgroundColor: (!this.state.hover) ? side_panel_style.nav_item_background : "#fff",
            };

            navBarStyle = {
                backgroundColor: side_panel_style.side_panel_background,
            }

        }

        navItemStyle['fontWeight'] = (current_category == 'all') ? 'bold' :'';

        var blogNavBarItem = this.state.list.map(function(data){
                return (
                    <NavItem
                        user={user}
                        data={data}
                        key={data.category_id}
                        current_category={current_category}
                    />
                )
        });

        return (
                    <div style={navBarStyle} className="col-md-3 col-sm-2 col-xs-12 author">

                        <div>
                            <img src={'/server/php/files/'+user.list_pic} id="profile-pic" />
                        </div>

                        <p id="author-description">{user.description}</p>

                        <Link to="/about"></Link>         
                                   
                            <div  className="category-wrapper">
                                <ul style={{paddingLeft: 0}}>

                                    <li 
                                    style={navItemStyle} 
                                    className={all_category_class} 
                                    onClick={this._onClick}
                                    onMouseOver={this._mouseOver} onMouseOut={this._mouseOut}>
                                        <span>
                                            All ( {this.props.navData.article_amount.total} )
                                        </span>
                                    </li>

                                    {blogNavBarItem}

                                </ul>

                                <span className="socialShare"></span>
                            </div>
                    </div>
                );
    },

    _onClick(){
        NavActionCreators.clickCategory('all');
    },

    _onChange() {
        this.setState({current_category: getCurrentCategory()});
    },

});

module.exports = Nav;