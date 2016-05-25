import $ from "jQuery";
import {Link} from 'react-router';

var React              = require('react');
var NavItem            = require('./NavItem');
var NavStore           = require('../stores/NavStore');
var NavActionCreator   = require('../actions/NavActionCreators');
var BlogActionCreators = require('../actions/BlogActionCreators');
var article_amount;
var total;

function getNavItem(data){
    return(
        <NavItem
            data={data}
            key={data.category_id}
        />
    )
}

function getStateFromStores(){
    // var test = [NavStore.getCurrentCategory()];
    // return {list: test};
}

var BlogPage = React.createClass({

    getInitialState() {
        return {
            list:  []   ,
            user:  [],
        };
    },
    componentDidMount: function() {
        var obj       = this;
        var pathArray = window.location.pathname.split('/');
        var id        = pathArray[2];

        $.getJSON(

            "/" + id + "/article/",

            { isNavBar: true },

            function (data) {
                article_amount = data.article_amount;
                obj.setState({list:  data.categories});
                obj.setState({user:  data.user})
            }
        );

        NavStore.addChangeListener(this._onChange);

    },

    render() {

        var blogNavBarItem = this.state.list.map(getNavItem);
        var user = this.state.user;
        var pic_url = '';
        if(article_amount) {
            total = article_amount.total;
        }

        if(user.cloudinary_api_response){
            var cloudinary_api_response = JSON.parse(user.cloudinary_api_response);
            pic_url = cloudinary_api_response.secure_url;
        }

        return (
                    <div className="col-md-3 col-sm-2 col-xs-12 author">

                        <div>
                            <img src={pic_url} id="profile-pic" />
                        </div>

                        <p id="author-description">
                            {user.description}
                        </p>

                        <Link to="/about">link to about</Link>                    
                            <div  className="category-wrapper">
                                <ul style={{paddingLeft: 0}}>
                                        <a>
                                            <li className="category" onClick={this._onClick}>
                                                <span>
                                                    All ( {total} )
                                                </span>
                                            </li>
                                        </a>
                                        {blogNavBarItem}
                                </ul>

                                <span className="socialShare"></span>
                            </div>
                    </div>
                );
    },

    _onClick(){
        BlogActionCreators.clickCategory('all');
    },

    _onChange() {
        console.log("Nav _onChange");
        this.setState(getStateFromStores());
    },

});

module.exports = BlogPage;