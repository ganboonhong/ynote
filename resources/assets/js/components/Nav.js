import $ from "jQuery";
import {Link} from 'react-router';

var React             = require('react');
var NavItem           = require('./NavItem');
var NavStore          = require('../stores/NavStore');
var BlogPageStore     = require('../stores/BlogPageStore');
var NavActionCreator  = require('../actions/NavActionCreators');
var NavActionCreators = require('../actions/NavActionCreators');
var article_amount;
var total;

function getCurrentCategory(){
    return NavStore.getCurrentCategory();
}

var Nav = React.createClass({

    getInitialState() {
        return {
            list:  [],
            user:  [],
            current_category: 'all'
        };
    },

    componentWillMount() {
        NavActionCreator.init_category();
    },

    componentDidMount: function() {
        var obj        = this;
        // var url_params = this.props.url_params;
        // var user_id    = url_params.user_id;
        var data = this.props.navData;


        article_amount = data.article_amount;
        obj.setState({list:  data.categories});
        obj.setState({user:  data.user})

        NavStore.addChangeListener(this._onChange);

    },

    render() {
        var current_category = this.state.current_category;

        var blogNavBarItem = this.state.list.map(function(data){

            var category_class = (data.category_id == current_category) ? "category finger selected-category" : "finger category";
            var text_class     = (data.category_id == current_category) ? "category-name-selected" : "category-name";

                return (
                    <NavItem
                        data={data}
                        key={data.category_id}
                        category_class={category_class}
                        text_class={text_class}
                    />
                )
        });

        var user               = this.state.user;
        var pic_url            = '/server/php/files/'+user.list_pic;
        var _url_params        = BlogPageStore.getUrlParams();
        var all_category_class_neccessary = "finger category";
        var all_category_class = (this.state.current_category == 'all') ? all_category_class_neccessary + " selected-category" : all_category_class_neccessary;
        var all_text_class     = (this.state.current_category == 'all') ? "category-name-selected" : "";

        if(article_amount) {
            total = article_amount.total;
        }

        // if(user.cloudinary_api_response){
        //     var cloudinary_api_response = JSON.parse(user.cloudinary_api_response);
        //     pic_url = cloudinary_api_response.secure_url;
        // }

        return (
                    <div className="col-md-3 col-sm-2 col-xs-12 author">

                        <div>
                            <img src={pic_url} id="profile-pic" />
                        </div>

                        <p id="author-description">
                            {user.description}
                        </p>

                        <Link to="/about"></Link>         
                                   
                            <div  className="category-wrapper">
                                <ul style={{paddingLeft: 0}}>

                                    <li className={all_category_class} onClick={this._onClick}>
                                        <span className={all_text_class}>
                                            All ( {total} )
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