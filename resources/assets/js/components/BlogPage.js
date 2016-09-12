import $ from "jQuery";
var React         = require('react');
var Nav           = require('./Nav');
var BlogContainer = require('./BlogContainer');
var Content       = require('./Content');
var BlogPageStore = require('../stores/BlogPageStore');

var BlogPage = React.createClass({
    componentWillMount() {
        BlogPageStore.setUrlParams(this.props.params);
    },
    render() {
        var url_params = BlogPageStore.getUrlParams();
        var navData;

        $.ajax({
            async: false,
            url: "/" + url_params.user_id + "/article/",
            data: { isNavBar: true},
            dataType: 'json',
            success: function(data){
                navData = data;
                var userCustomStyle = JSON.parse(data.user.side_panel_style);
                $("body").css("background-color", userCustomStyle.website_background);
            }
        });

        return (
            <div>
                <Content/>
                <Nav navData={navData}/>
                <BlogContainer/>
            </div>
        );
    }
});

module.exports = BlogPage;