import $ from "jQuery";
import {Link} from 'react-router';

var React = require('react');
var NavItem = require('./NavItem');
var NavStore = require('../stores/NavStore');
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
    console.log('getStateFromStores');
    console.log(NavStore.getNavs());
        // return {
        //     list: NavStore.getNavs(),
        //     user: NavStore.getUser()
        // }
    }

var BlogPage = React.createClass({

    getInitialState() {
        console.log('getInitialState');
        return {
            list:  []   ,
            user:  [],
        };
    },
    componentDidMount: function() {
       var obj = this;
        $.getJSON(

            "/2/article/",

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
                                            <li className="category">
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

    _onChange() {
        console.log("Nav _onChange");
    }

});

module.exports = BlogPage;